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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'fahrten', 'middleware' => 'verified'], function (){
	Route::get('/suche', 'JourneyController@search')->name('journey.search');
	Route::post('/suche', 'JourneyController@search')->name('journey.search');
	Route::get('/buchen/{id}', 'JourneyController@book')->name('journey.book');
	Route::get('/anstehend', 'JourneyController@booked')->name('journey.booked');
	Route::get('/anstehend/{id}', 'JourneyController@cancel_booked')->name('journey.booked.cancel');
	Route::get('/anbieten', 'JourneyController@create')->name('journey.create');
	Route::post('/anbieten', 'JourneyController@create')->name('journey.create');
	Route::get('/angeboten', 'JourneyController@offered')->name('journey.offered');
	Route::get('/angeboten/{id}', 'JourneyController@cancel_offered')->name('journey.offered.cancel');
});

Route::group(['prefix' => 'benutzer', 'middleware' => 'verified'], function (){
	Route::get('/einstellungen', 'UserController@edit')->name('user.edit');
	Route::post('/einstellungen', 'UserController@edit')->name('user.edit');
});