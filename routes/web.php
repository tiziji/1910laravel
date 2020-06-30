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
Route::get("/test/hello","TestController@hello");
//商品
Route::any("/goods/detail","Goods\GoodsController@detail");//商品详情
Route::get("/test/redis1","TestController@redis1");
Route::get("/test1","TestController@test1");
Route::get("/secret","TestController@secret");
Route::get("/test/www","TestController@www");
Route::get("/test/senddata","TestController@sendData");
Route::get("/test/postdata","TestController@postData");
Route::any("/test/encrypt1","TestController@encrypt1");


Route::get("/user/reg","User\IndexController@reg");
Route::post("/user/reg","User\IndexController@regDo");
Route::get("/user/login","User\IndexController@login");
Route::post("/user/loginDo","User\IndexController@loginDo");
Route::get("/user/center","User\IndexController@center");


Route::post("/api/user/reg","Api\UserController@reg");
Route::post("/api/user/login","Api\UserController@login");
Route::get("/api/user/center","Api\UserController@center")->middleware('check.pri','access.filter');
Route::get("/api/my/orders","Api\UserController@orders")->middleware('check.pri','access.filter');
Route::get("/api/my/cart","Api\UserController@cart")->middleware('check.pri','access.filter');
Route::get("/api/a","Api\TestController@a");
Route::get("/api/b","Api\TestController@b");

