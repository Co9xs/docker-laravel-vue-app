<?php
namespace App\Services;
class ReviewService
{
    /**
     *
     * @return \App\Review|null
     */
    public function fetchReviews(): ?\Illuminate\Database\Eloquent\Collection
    {
        $repository = new \App\Repositories\ReviewRepository();
        return $repository->all();
    }
}