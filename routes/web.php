<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');
// Route::view('/', 'app');
// Reviewへのルート
// Route::get('/reviews', 'ReviewController@index');
// Route::get('/companies/{company}/reviews/create', 'ReviewController@create')->middleware('auth');
// Route::post('/companies/{company}/reviews','ReviewController@store')->middleware('auth');
// Route::get('/reviews/{review}/edit', 'ReviewController@edit');
// Route::get('/reviews/{review}', 'ReviewController@show');
// Route::post('/reviews/{review}', 'ReviewController@update');
// Route::delete('/reviews/{review}', 'ReviewController@destroy');
// Route::get('/companies', 'CompanyController@index');
// Route::get('/home', 'HomeController@index')->name('home');

