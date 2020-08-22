<?php
namespace App\Services;
class ReviewService
{
    /**
     *
     * @return \App\Review|null
     */
    public function getReviews(): ?\Illuminate\Database\Eloquent\Collection
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