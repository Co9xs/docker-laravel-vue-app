<?php
namespace App\Services;
class ReviewService
{
    /**
     *
     * @return \App\Review|null
     */
    public function getReviews()
    {
        $repository = new \App\Repositories\ReviewRepository();
        return $repository->all();
    }

    public function fetchReview($id)
    {
        $repository = new \App\Repositories\ReviewRepository();
        return $repository->find($id);
    }
}