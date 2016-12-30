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
Route::get('acceptbook/{id}', 'API\BookDetailController@handleAcceptBook');

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
    Route::get('user/block-user', 'Admin\UserController@getBlockUser');
    Route::put('users/{id}/unlock', 'Admin\UserController@unlock');
    Route::resource('voucher', 'Admin\VoucherController', ['except' => ['delete']]);
    Route::get('voucher/del/{id}', ['uses' => 'Admin\VoucherController@destroy', 'as' => 'admin.voucher.del']);
    Route::resource('category', 'Category\CategoryController');
});

Route::group(['middleware' => 'business', 'prefix' =>'business'], function(){
    Route::resource('product','Product\ProductController');
    Route::resource('event', 'Business\EventController');
    Route::resource('promotions', 'Business\PromotionController');
    Route::resource('order','Business\OrderController');
    Route::get('accept-order/{id}', 'API\ProductController@handleAcceptOrder');
    Route::get('searchorder',['as' => 'searchorder', 'uses' => 'Business\OrderController@search']);
    Route::get('/add_promotion/{productId}', 'Business\PromotionController@addPromotion')->name('add_promotion');
    Route::get('/show_promotion/{productId}', 'Business\PromotionController@showBy')->name('show_promotion');
    Route::post('/filter_promotion', 'Business\PromotionController@showByDate')->name('filter_promotion');
});

Route::group(['middleware' => ['auth', 'checkuser']], function()
{
    Route::resource('user', 'User\UserController' , [
        'only' => ['index', 'edit', 'update']
    ]);
    Route::get('/event/{id}/join', 'User\RegisterEventController@join');
    Route::get('/event/history-event', [
        'as' => 'history-join-event',
        'uses' => 'User\RegisterEventController@getJoinEvent',
        ]);
    Route::resource('book', 'Book\BookController');
    Route::get('vote-product/{id}', 'API\ProductController@handlingAjaxVote');
    Route::get('user/history/voted', [
            'uses' => 'Admin\UserController@getHistoryVoted',
            'as' => 'user.history.voted',
        ]);
    Route::get('user/orders','Book\BookDetailController@showList');

});

Route::group(['middleware' => 'user', 'prefix' => 'user'],function()
{
    Route::resource('userorder','User\UserOrderController');
    Route::get('/voucher', 'User\UserController@listVoucher')->name('user.voucher');
    Route::get('/register-voucher/{id}', 'API\VoucherController@handledRegisterVoucher');
    Route::get('/delete-voucher/{id}', 'API\VoucherController@handledDelVoucher');
});

Route::get('/redirect/{provider}', 'SocialAccountController@redirect');
Route::get('/callback/{provider}', 'SocialAccountController@callback');

Auth::routes();

Route::get('/filter/{id}','Product\ProductController@filterProduct');
Route::get('/', 'HomeController@index');
Route::get('/product', 'HomeController@product');
Route::get('/event', 'HomeController@event');
Route::get('/event-detail/{id}', 'HomeController@eventDetail');
Route::get('/home','Auth\HomeController@index');
Route::get('/category/{id}', 'Product\ProductController@showByIdCategory');

Route::get('/logout', 'UserController@logout');
Route::get('/research', 'HomeController@research')->name('research');

Route::get('/product/{id}', 'Product\ProductController@showDetail');
Route::get('/promotion/{promotionId}', 'Business\PromotionController@showDetail')->name('show-detail');