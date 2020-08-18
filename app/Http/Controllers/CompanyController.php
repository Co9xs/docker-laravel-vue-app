<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index () {
        $service = new \App\Services\CompanyService();
        $companies = $service->fetchCompanies();
        return view('companies.index', ['companies' => $companies]);        
    }
}
