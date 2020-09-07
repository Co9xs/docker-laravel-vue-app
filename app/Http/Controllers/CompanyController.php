<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Company;

class CompanyController extends Controller
{
    public function search(Request $request) {
        $encoded_name = urlencode($request->name);
        $url = 
        'https://api.houjin-bangou.nta.go.jp/4/name?id=KGpBHpB6erjnk&name='.$encoded_name.'&type=12&mode=2&kind=03&target=2';
        $client = new Client();
        $method = "GET";
        $response = $client->request($method, $url);
        $xml = $response->getBody();
        $target = simplexml_load_string($xml);
        $json = json_encode($target, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        return $json;
    }

    public function show(Request $request) {
        $corporate_number = $request->number;
        $url = 
        'https://api.houjin-bangou.nta.go.jp/4/num?id=KGpBHpB6erjnk&number='.$corporate_number.'&type=12';
        $client = new Client();
        $method = "GET";
        $response = $client->request($method, $url);
        $xml = $response->getBody();
        $target = simplexml_load_string($xml);
        $json = json_encode($target, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        return $json;
    }

    public function store(Request $request) {
        // $company->name = $request->name;
        // $company->average_point = $request->average_point;
        // $company->area = $request->area;
        // $company->corporate_number = $request->corporate_number;
        $company = Company::updateOrCreate(
            ['corporate_number' => $request->corporate_number],
            ['name' => $request->name, 
            'average_point' => $request->average_point, 
            'area' => $request->area,
            'corporate_number' => $request->corporate_number]
        );
        return $company;
    } 
    
    public function reviews(Company $company) 
    {
        return $company->reviews()->with('user', 'company')->get();
    }
}
