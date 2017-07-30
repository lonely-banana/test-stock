<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/stock', function () {
    return view('stock.index');
});


//Stock
Route::match(['get','post'],'/stock','Stock\IndexController@index');
Route::match(['get','post'],'/stock/userCenter','Stock\UserInfoController@index');
Route::match(['get','post'],'/stock/category','Stock\CategoryController@index');
Route::match(['get','post'],'/stock/categoryDetail','Stock\CategoryController@detail');
Route::match(['get','post'],'/stock/categoryEdit','Stock\CategoryController@edit');


Route::group([
    	'prefix' => 'lease',
	'namespace' => 'LeaseStore'
    ], function () {
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']); 
    Route::get('/products/{product_id}', ['uses' => 'ProductController@detail', 'as' => 'product-detail']);	
});

Route::match(['get','post'],'wechat_oauth_callback','WeChat\WeChatController@oauthCallback');


Route::group([
    'prefix' => 'store',
    'middleware' => 'wechat.auth',
], function () {
    Route::get('/', ['uses' => 'DemoController@index', 'as' => 'store']);
});



