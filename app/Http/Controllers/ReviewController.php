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
        return view('reviews.index', ['reviews' => $reviews]);        
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

}
