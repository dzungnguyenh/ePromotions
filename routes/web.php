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

Route::get('',function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function()
{
    Route::resource('point', 'Admin\PointController');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'promotions'], function () {
    
    Route::get('', 'PromotionController@index')->name('list');

    Route::get('show-add-form', 'PromotionController@showAddForm')->name('show-add-form');

    Route::post('add', ['as' => 'add', 'uses' => 'PromotionController@store']);

    Route::get('show-edit-form/{id}', ['as' => 'show-edit-form', 'uses' => 'PromotionController@showEditForm']);

    Route::put('show-edit-form/{id}', ['as' => 'update', 'uses' => 'PromotionController@update']);
    
    Route::get('delete/{id}', ['as' => 'delete', 'uses' => 'PromotionController@delete']);
});