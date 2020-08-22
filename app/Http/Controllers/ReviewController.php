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
        $reviews = $service->fetchReviews();
        return $reviews; 
    }

    public function create(Company $company)
    {
        return view('reviews.create', ['company' => $company]);    
    }

    public function store(ReviewRequest $request, Review $review,Company $company)
    {
        $review->body = $request->body;
        $review->user_id = $request->user()->id;
        $review->company_id = $company->id;
        $review->save();
        return redirect('/reviews');
    }

    public function show(Article $article)
    {
        return view('reviews.show', ['review' => $review]);
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
