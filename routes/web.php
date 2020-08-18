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
Route::view('/', 'welcome');
Route::get('/reviews', 'ReviewController@index');
Route::get('/companies/{company}/reviews/create', 'ReviewController@create')->middleware('auth');
Route::post('/companies/{company}/reviews','ReviewController@store')->middleware('auth');
Route::get('/companies', 'CompanyController@index');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
