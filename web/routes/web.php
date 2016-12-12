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


Route::group(['namespace' => 'Front'], function (){
    Route::get('/index', 'IndexController@index');
});

Route::group(['namespace' => 'Admin'], function (){
    Route::get('/create', 'TestController@create');
    Route::get('/delete', 'TestController@delete');
    Route::get('/update', 'TestController@update');
    Route::get('/list', 'TestController@lists');
    Route::get('/get', 'TestController@get');
    Route::get('/check', 'TestController@check');
});