<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index () {
        $service = new \App\Services\ReviewService();
        $reviews = $service->fetchReviews();
        return view('reviews.index', ['reviews' => $reviews]);        
    }
}
