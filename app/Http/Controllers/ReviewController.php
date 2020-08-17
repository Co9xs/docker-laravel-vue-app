<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index () {
        $reviews = [
            (object) [
                'id' => 1,
                'title' => '口コミ1',
                'body' => '本文1',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                    'sex' => '男性',
                    'graduation_year' => '22卒',
                    'school_name' => '東北大学',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => '口コミ2',
                'body' => '本文2',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                    'sex' => '男性',
                    'graduation_year' => '20卒',
                    'school_name' => '大阪大学',
                ],
            ],
            (object) [
                'id' => 3,
                'title' => '口コミ3',
                'body' => '本文3',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                    'sex' => '女性',
                    'graduation_year' => '21卒',
                    'school_name' => '早稲田大学',
                ],
            ],
        ];
        return view('reviews.index', ['reviews' => $reviews]);
    }
}
