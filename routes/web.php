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
Route::group(['prefix' => 'admin'], function()
{
    Route::resource('point', 'Admin\PointController');
});

Auth::routes();

Route::get('/home', 'Admin\HomeController@index');

Route::get('/redirect/{provider}', 'SocialAccountController@redirect');
Route::get('/callback/{provider}', 'SocialAccountController@callback');
