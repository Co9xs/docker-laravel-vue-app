<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Company;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index (Request $request) 
    {
        $keyword = $request->input('keyword');
        $is_front = $request->input('IsFront');
        $is_back = $request->input('IsBack');
        $is_infra = $request->input('IsInfra');
        $is_designer = $request->input('IsDesigner');
        $is_mobile = $request->input('IsMobile');
        $is_machine = $request->input('IsMachineLearning');
        $is_others = $request->input('IsOthers');
        $result = [];
        if (empty($is_front)) {
            $reviews = Review::with('user', 'company')->get();
            return $reviews;
        }
        if ($is_front === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', 'フロントエンドエンジニア');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        if ($is_back === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', 'バックエンドエンジニア');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        if ($is_infra === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', 'インフラエンジニア');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        if ($is_designer === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', 'デザイナー');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        if ($is_mobile === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', 'iOS&Androidエンジニア');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        if ($is_machine === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', '機械学習系エンジニア');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        if ($is_others === "true") {
            $query = Review::query();
            $query->with('user', 'company')->where('body', 'LIKE', "%{$keyword}%")->where('type_of_occupation', '=', 'その他');
            $reviews = $query->get();
            foreach ($reviews as $review) {
                $result[] = $review;
            }
        }
        return $result;
    }

    public function create(Company $company)
    {
        return view('reviews.create', ['company' => $company]);    
    }

    public function store(ReviewRequest $request, Review $review)
    {
        $review->work_style = $request->work_style;
        $review->type_of_occupation = $request->type_of_occupation;
        $review->evaluation = $request->evaluation;
        $review->body = $request->body;
        $review->user_id = $request->user_id;
        $review->company_id = $request->company_id;
        $review->save();
        return $review;
    }

    public function show(Review $review)
    {
        $service = new \App\Services\ReviewService();
        $result = $service->fetchReview($review->id);
        return $result;
    }   

    public function edit(Review $review)
    {
        return view('reviews.edit', ['review' => $review]);
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $review->body=$request->body;
        $review->save();
        return redirect('/reviews');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect('/reviews');
    }

}
