<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * 发送短信
 */
Route::post('/sendMsg', 'PublicController@sendMsg')->name('sendMsg');
/**
 * 注册 登录
 */
Route::group(['namespace'=>'Api','prefix'=>'login'],function (){
   //注册
   Route::get('registered','LoginController@registered')->name('api.login.registered');
   //登录
   Route::post('login','LoginController@login')->name('api.login.login');
});

/**
 * 售后,故障报修,投诉建议
 * 
 */
Route::group(['prefix'=>'serrpair','namespace'=>'Api','middleware'=>['member']], function () {
			//提交故障报修
			Route::post('store','SerrepairController@store')->name('api.serrpair.store');
			//查看提交的故障报修
			Route::get('index','SerrepairController@index')->name('api.serrpair.index');


});
