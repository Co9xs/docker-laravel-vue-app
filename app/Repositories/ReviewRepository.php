<?php

namespace App\Repositories;

class ReviewRepository
{
    /**
     *
     * @param  int          $id
     * @return \App\User|null
     */
    public function all(): ?\Illuminate\Database\Eloquent\Collection
    {
        return \App\Review::with('user', 'company')->get();
    }
}