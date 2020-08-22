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

    /**
     *
     * @param  int          $id
     * @return \App\Review|null
     */
    public function find($id) {
        return \App\Review::with('company', 'user')->find($id);
    }
}