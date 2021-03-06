<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user', function() {
  return Auth::user();
})->name('user');
Route::post('/users/{user}', 'UserController@update');

Route::get('/users/{user}/reviews', 'UserController@reviews');


Route::get('/v1/reviews', 'ReviewController@index');
Route::post('/v1/reviews', 'ReviewController@store');
Route::get('/v1/reviews/{review}', 'ReviewController@show');
Route::post('/v1/reviews/{review}/edit', 'ReviewController@update');
Route::post('/v1/reviews/{review}', 'ReviewController@destroy');
Route::get('/v1/companies/{company}/reviews', 'CompanyController@reviews');
Route::post('/v1/companies/search', 'CompanyController@search');
Route::post('/v1/companies', 'CompanyController@show');
Route::get('/v1/companies', 'CompanyController@index');
Route::post('/v1/companies/add', 'CompanyController@store');