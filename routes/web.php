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
// 后台路由
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
    // 加载会员首页
    Route::get('/','AdminController@index')->name('index');
    //注销登录
    Route::get('loginout','LoginController@loginout')->name('loginout');

});
//后台登录
Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){

    // 加载首页
    Route::get('login','LoginController@index')->name('login');
    //注册页面登录
    Route::post('login','LoginController@login')->name('login');
    // 栏目管理
    Route::resource('category','CategoryController');
    //商品管理
    Route::resource('goods','GoodsController');
});
//上传管理
Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function (){
    Route::any('/','Upload@upload')->name('upload');

});
