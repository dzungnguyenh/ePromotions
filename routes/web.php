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
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function()
{
    Route::resource('point', 'Admin\PointController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('business', 'Admin\BusinessController', [
    'only' => ['index', 'show', 'destroy']
]);

});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{
    Route::resource('voucher', 'Admin\VoucherController');
});
Route::group(['middleware' => ['auth', 'admin'], 'prefix' =>'business'], function(){
	Route::resource('event', 'Business\EventController');
});
Route::group(['middleware' => 'auth'], function()
{
    Route::resource('user', 'User\UserController');
});

Auth::routes();

Route::get('/home', 'Admin\HomeController@index');

Route::get('/redirect/{provider}', 'SocialAccountController@redirect');
Route::get('/callback/{provider}', 'SocialAccountController@callback');

Route::resource('product','Product\ProductController');
