<?php

namespace App\Repositories;

class CompanyRepository
{
    /**
     *
     * @param  int          $id
     * @return \App\Company|null
     */
    public function all(): ?\Illuminate\Database\Eloquent\Collection
    {
        return \App\Company::all();
    }
}