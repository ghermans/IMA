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

Route::get('/settings', 'SettingsController@View')->name('settings');

Route::get('/requests', 'RequestController@index')->name('requests');
Route::get('/requests/register', 'RequestController@create')->name('requests.register');

Route::get('/staff', 'StaffController@index')->name('staff');
Route::get('/staff/register', 'StaffController@register')->name('staff.register');

Route::get('/profile/settings', 'AccountController@AccountInformation')->name('profile.settings');
Route::post('/profile/settings/information', 'AccountController@StoreInformation')->name('profile.settings.information');
Route::post('/profile/settings/password', 'AccountController@StorePassword')->name('profile.settings.password');
Route::get('/home', 'HomeController@index');
