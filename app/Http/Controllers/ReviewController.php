<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Company;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index () 
    {
        $service = new \App\Services\ReviewService();
        $reviews = $service->getReviews();
        return $reviews; 
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
