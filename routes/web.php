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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/home', 'RequestController@index');

Auth::routes();

Route::get('/settings', 'SettingsController@View')->name('settings');

Route::get('/requests', 'RequestController@index')->name('requests');
Route::get('/requests/show/{id}', 'RequestController@show')->name('requests.show');
Route::get('/requests/me', 'RequestController@myRequests')->name('requests.me');
Route::get('/requests/register', 'RequestController@create')->name('requests.register');
Route::get('/requests/destroy/{id}', 'RequestController@destroy')->name('requests.destroy');
Route::post('/requests/register', 'RequestController@store')->name('requests.store');

Route::get('/departments', 'DepartmentsController@index')->name('departments');
Route::get('/departments/show/{did}', 'DepartmentsController@show')->name('department.specific');
Route::get('/departments/create', 'DepartmentController@create')->name('department.create');
Route::get('/departments/destroy/{did}', 'DepartmentController@destroy')->name('department.destroy');

Route::post('/comment/add/{rid}', 'CommentController@store')->name('comment.new');
Route::get('/comments/destroy/{rid}/{cid}', 'CommentController@destroy')->name('comment.destroy');

Route::get('/permissions', 'PermsController@index')->name('permissions');
Route::post('/permissions/insert', 'PermsController@insertPermission')->name('permission.new');
Route::post('/permissions/insert/application', 'PermsController@insertApplication')->name('application.new');

Route::get('/staff', 'StaffController@index')->name('staff');
Route::get('/staff/register', 'StaffController@register')->name('staff.register');

Route::get('/profile/settings', 'AccountController@AccountInformation')->name('profile.settings');
Route::post('/profile/settings/information', 'AccountController@StoreInformation')->name('profile.settings.information');
Route::post('/profile/settings/password', 'AccountController@StorePassword')->name('profile.settings.password');
