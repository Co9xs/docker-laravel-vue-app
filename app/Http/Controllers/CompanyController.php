<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CompanyController extends Controller
{
    public function index () {
        $service = new \App\Services\CompanyService();
        $companies = $service->fetchCompanies();
        return view('companies.index', ['companies' => $companies]);        
    }

    public function getComp() {
        $url = 'https://api.houjin-bangou.nta.go.jp/4/diff?id=KGpBHpB6erjnk&from=2018-05-09&to=2018-06-09&type=12';
        $method = "GET";
        $client = new Client();
        $response = $client->request($method, $url);
        $xml = $response->getBody();
        $target = simplexml_load_string($xml);
        $json = json_encode($target, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        return view('company')->with('json', $json);
    }
}
