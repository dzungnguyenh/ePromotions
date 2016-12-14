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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function()
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

Route::group(['middleware' => ['business'], 'prefix' =>'business'], function(){
	Route::resource('event', 'Business\EventController');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('user', 'User\UserController');
});


Route::get('/redirect/{provider}', 'SocialAccountController@redirect');
Route::get('/callback/{provider}', 'SocialAccountController@callback');

Route::resource('product','Product\ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('promotions', 'Business\PromotionController');
Route::get('/add_promotion/{id}', 'Business\PromotionController@addPromotion')->name('add_promotion');