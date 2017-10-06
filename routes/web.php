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
Route::get('/', function () {
    return view('welcome');
});

Route::post('/', 'ApplicationController@store')->name('request');
Route::post('/', 'RatesController@store')->name('request');

Auth::routes();

Route::get('/home', 'HomeController@index');
