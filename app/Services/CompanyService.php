<?php
namespace App\Services;
class CompanyService
{
    /**
     *
     * @return \App\Company|null
     */
    public function fetchCompanies(): ?\Illuminate\Database\Eloquent\Collection
    {
        $repository = new \App\Repositories\CompanyRepository();
        return $repository->all();
    }
}