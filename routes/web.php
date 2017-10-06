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
})->name('application.create');

Route::post('/', 'ApplicationController@store')->name('application.store');

Route::prefix('rates')->middleware('auth')->group( function ()
{
	# code...
	Route::get('/', 'RatesController@index')->name('rates.index');
	Route::get('/{rate}', 'RatesController@show')->name('rate.show');
	Route::get('/{rate}/edit', 'RatesController@edit')->name('rate.edit');
	Route::post('/{rate}', 'RatesController@update')->name('rate.update');
	Route::post('/{rate}/delete', 'RatesController@delete')->name('rate.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('applications');
