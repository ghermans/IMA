<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/settings', 'AccountController@AccountInformation')->name('profile.settings');
Route::post('/profile/settings/information', 'AccountController@StoreInformation')->name('profile.settings.information');
Route::get('/home', 'HomeController@index');
