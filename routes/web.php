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
    return redirect()->route('application.create');
});


Route::prefix('rates')->group( function ()
{
	# code...
	Route::get('/', 'RatesController@index')->name('rates.index');
	Route::get('/create', 'RatesController@create')->name('rate.create');
	Route::post('/', 'RatesController@store')->name('rate.store');
	Route::get('/{rate}', 'RatesController@show')->name('rate.show');
	Route::get('/{rate}/edit', 'RatesController@edit')->name('rate.edit');
	Route::post('/{rate}', 'RatesController@update')->name('rate.update');
	Route::post('/{rate}/delete', 'RatesController@delete')->name('rate.delete');
});

Route::prefix('applications')->group( function ()
{
	# code...
	Route::get('/', 'ApplicationController@index')->name('applications.index');
	Route::get('/create', 'ApplicationController@create')->name('application.create');
	Route::post('/', 'ApplicationController@store')->name('application.store');
	Route::get('/{application}', 'ApplicationController@show')->name('application.show');
	Route::get('/{application}/edit', 'ApplicationController@edit')->name('application.edit');
	Route::post('/{application}', 'ApplicationController@update')->name('application.update');
	Route::post('/{application}/delete', 'ApplicationController@delete')->name('application.delete');
});

Auth::routes();
