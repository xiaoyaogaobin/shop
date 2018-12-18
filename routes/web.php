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
Route::group( ['prefix' => 'home' , 'namespace' => 'Home' , 'as' => 'home.'] , function ()
{
    Route::get ('/','IndexController@index')->name ('home');
    Route::get ('list/{list}','ListController@index')->name ('list');
    Route::get ('content/{content}','ContentController@index')->name ('content');
    //根据规格请求对应的库存
    Route::post ('spec_to_get_total','ContentController@specGetTotal')->name ('spec_to_get_total');
});
*/
//设置首页
Route::get('/','HomeCotroller@home')->name('home');
Route::get('home','HomeCotroller@home')->name('home');

Route::group( ['prefix' => 'home' , 'namespace' => 'Home' , 'as' => 'home.'] , function ()
{
    //设置首页
//    Route::get('/','HomeCotroller@home')->name('home');
    //商品详情页面
    Route::get('list/{list}','ListController@index')->name('list');
    //商品页面
    Route::get('content/{content}','ContentController@index')->name('content');
    //发送异步请求
    //根据规格请求对应的库存
    Route::post ('spec_to_get_total','ContentController@specGetTotal')->name ('spec_to_get_total');
    //购物车
    Route::resource('cart','CartController');
    //地址
    Route::resource('address','AdressController');
    //是否默认选择地址
    Route::get('address/push/{address}','AdressController@push')->name('address.push');

});


// 后台路由
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
    // 加载会员首页
    Route::get('/','AdminController@index')->name('index');
    //注销登录
    Route::get('loginout','LoginController@loginout')->name('loginout');
    //加载模版
    Route::get('config/create/{name}','ConfigController@create')->name('config.create');
    //  后台配置项增加更新数据
    Route::post('config/update/{name}','ConfigController@update')->name('config.update');
    //后台轮播图控制
    Route::resource('slid','SlidController');

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
    //上传处理
    Route::any('/','Upload@upload')->name('upload');
    //验证码处理
    Route::any('code','Code@SendCode')->name('code');

});

//前台登录处理
Route::group(['prefix'=>'user','namespace'=>'User','as'=>'user.'],function (){
    //登录管理
    Route::get('login','UserController@login')->name('login');
    //登录验证处理
    Route::post('login_form','UserController@login_form')->name('login_form');
    //注册页面加载
    Route::get('register','UserController@register')->name('register');
    //注册页面认证
    Route::post('register_form','UserController@register_form')->name('register_form');
    //重置页面加载
    Route::get('reset','UserController@reset')->name('reset');
    //重置页面
    Route::post('reset_form','UserController@reset_form')->name('reset_form');
    //退出管理
    Route::get('logout','UserController@logout')->name('logout');

});


