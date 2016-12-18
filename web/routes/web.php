<?php

use Illuminate\Support\Facades\DB;
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
    //首页
    Route::get('/index', 'IndexController@index');
    //登录
    Route::get('/login', 'UserController@login');
    //注册
    Route::get('/signup', 'UserController@signup');
    //创建文章
    Route::post('/article/create', 'ArticleController@create');
    Route::post('/article/update', 'ArticleController@update');
    Route::get('/article/delete', 'ArticleController@delete');
    Route::get('/article/edit', 'ArticleController@edit_article');
    //创建用户
    Route::post('/user/create', 'UserController@create');
    Route::get('/article/write', 'ArticleController@write');
    Route::get('/article/list', 'ArticleController@article_list');

    Route::get('/user', 'UserController@index');
    Route::get('/article', 'ArticleController@index');
    Route::get('/article/list', 'ArticleController@article_list');

    Route::get('/user/list', 'UserController@user_list');
    Route::get('/user/update', 'UserController@update');
});

Route::group(['namespace' => 'Admin'], function (){
    Route::get('admin/form', 'AdminIndexController@form');
    Route::get('admin/do/{action}', 'AdminIndexController@formDo');
    Route::get('/admin/list', 'AdminIndexController@list');
    Route::get('/admin/delete', 'AdminIndexController@delete');
    Route::post('/admin/upload', 'AdminUploadController@upload');

    Route::get('/admin/welcome', function(){
        return view('admin.welcome');
    });
    Route::get('/admin/index', function(){
        return view('admin.index');
    });

    Route::get('/admin/t', function (){
        return public_path("upload");
    });

    /*
    Route::get('/admin/login', 'LoginController@login');
    Route::get('/admin/dologin', 'LoginController@dologin');
    Route::get('/admin', 'LoginController@index');
    Route::get('/admin/article/list', 'ArticleController@list');


    Route::get('/check', 'TestController@check');\
    */
});