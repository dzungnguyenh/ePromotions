<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|routes/web.php
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{
    Route::resource('point', 'Admin\PointController');
    Route::resource('business', 'Admin\BusinessController');
    Route::resource('business', 'Admin\BusinessController', [
    'only' => ['index', 'show', 'destroy']
]);

});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{
    Route::resource('voucher', 'Admin\VoucherController');
    Route::resource('users', 'Admin\UserController');
    Route::resource('voucher', 'Admin\VoucherController', ['except' => ['delete']]);
    Route::get('voucher/del/{id}', ['uses' => 'Admin\VoucherController@destroy', 'as' => 'admin.voucher.del']);
    Route::resource('category', 'Category\CategoryController');
});

Route::group(['middleware' => 'business', 'prefix' =>'business'], function(){
    Route::resource('product','Product\ProductController');
    Route::resource('event', 'Business\EventController');
    Route::resource('promotions', 'Business\PromotionController');
    Route::get('/add_promotion/{id}', 'Business\PromotionController@addPromotion')->name('add_promotion');
    Route::get('/show_promotion/{attribute?}/{id}', 'Business\PromotionController@showBy')->name('show_promotion');
});

Route::group(['middleware' => 'checkuser'], function()
{
    Route::resource('user', 'User\UserController' , [
        'only' => ['index', 'edit', 'update']
    ]);
    Route::get('product/{id}', 'API\ProductController@handlingAjaxVote');
    Route::get('user/history/voted', [
            'uses' => 'Admin\UserController@getHistoryVoted',
            'as' => 'user.history.voted',
        ]);
});

Route::group(['middleware' => 'user', 'prefix' => 'user'],function()
{
    Route::resource('userorder','User\UserOrderController');
});

Route::get('/redirect/{provider}', 'SocialAccountController@redirect');
Route::get('/callback/{provider}', 'SocialAccountController@callback');

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/product', 'HomeController@product');

Route::get('/category/{id}', 'Product\ProductController@showByIdCategory');

Route::get('/logout', 'UserController@logout');
