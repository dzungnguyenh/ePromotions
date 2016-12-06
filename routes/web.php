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

Route::group(['prefix' => 'promotions'], function () {
    
    Route::get('', 'PromotionController@index')->name('list');

    Route::get('show-add-form', 'PromotionController@show_add_form')->name('show-add-form');

    Route::post('add', ['as' => 'add', 'uses' => 'PromotionController@store']);

    Route::post('show-edit-form', ['as' => 'show-edit-form', 'uses' => 'PromotionController@show_edit_form']);

    Route::post('edit', ['as' => 'edit', 'uses' => 'PromotionController@update']);
    
    Route::post('delete', ['as' => 'delete', 'uses' => 'PromotionController@delete']);
});

Route::resource('photos', 'PhotoController');



