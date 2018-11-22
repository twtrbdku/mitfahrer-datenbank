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
	Route::get('/suche', 'JourneyController@index')->name('journey.search');
	Route::post('/suche', 'JourneyController@index')->name('journey.search');
	Route::get('/anstehend', 'JourneyController@index')->name('journey.booked');
	Route::get('/anstehend/{id}', 'JourneyController@index')->name('journey.booked.cancel');
	Route::get('/anbieten', 'JourneyController@index')->name('journey.create');
	Route::post('/anbieten', 'JourneyController@index')->name('journey.create');
	Route::post('/anbieten/{id}', 'JourneyController@index')->name('journey.offered.cancel');
});

Route::group(['prefix' => 'benutzer', 'middleware' => 'verified'], function (){
	Route::get('/einstellungen', 'UserController@edit')->name('user.edit');
	Route::post('/einstellungen', 'UserController@edit')->name('user.edit');
});