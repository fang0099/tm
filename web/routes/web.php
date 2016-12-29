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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::group(['namespace' => 'Front'], function (){
    //首页
    Route::get('/', 'IndexController@show_index');
    Route::get('/index', 'IndexController@show_index');
    //登录
    Route::get('/login', 'UserController@login');
    Route::get('/logout', 'UserController@logout');
    //注册
    Route::get('/signup', 'UserController@signup');
    //创建文章
    Route::post('/article/create', 'ArticleController@create');
    Route::post('/article/update', 'ArticleController@update');
    Route::post('/article/comment', 'ArticleController@comment_article');
    Route::get('/article/delete', 'ArticleController@delete');
    Route::get('/article/like', 'ArticleController@like');
    Route::get('/article/unlike', 'ArticleController@unlike');
    Route::get('/article/collect', 'ArticleController@collect');
    Route::get('/article/uncollect', 'ArticleController@uncollect');
    //Route::get('/article/edit', 'ArticleController@edit_article');
    Route::get('/article/edit', 'ArticleController@show_edit');
    Route::get('/article', 'ArticleController@show_article');
    //创建用户
    Route::post('/user/create', 'UserController@create');
    Route::post('/user/signin', 'UserController@signin');
    Route::get('/article/write', 'ArticleController@write');
    //Route::get('/article/list', 'ArticleController@article_list');

    Route::get('/article/list', 'ArticleController@show_list');
    Route::get('/article/comment_delete', 'ArticleController@delete_comment');


    Route::get('/user', 'UserController@index');
    Route::get('/user/logout', 'UserController@logout');
    Route::get('/user/follow', 'UserController@follow');
    Route::get('/user/unfollow', 'UserController@unfollow');
    Route::get('/user/follow', 'UserController@follow');
    Route::get('/user/follower', 'UserController@show_subscribers_list');
    Route::get('/user/liker', 'UserController@show_likers_list');
    Route::get('/user/liker_article_list', 'UserController@show_liker_article_list');
    Route::get('/user/collect_article_list', 'UserController@show_collect_article_list');
    Route::get('/user/tag_article_list', 'UserController@show_tag_article_list');
    //Route::get('/article', 'ArticleController@index');
    //Route::get('/article/list', 'ArticleController@article_list');

    Route::get('/article/voters', 'ArticleController@voters');

    //Route::get('/user/list', 'UserController@user_list');
    Route::get('/user/list', 'ArticleController@show_user_list');
    Route::get('/user/profile', 'UserController@show_edit');
    Route::post('/user/update', 'UserController@update');

    Route::get('/tag/index','TagController@index');
    Route::get('/tag/list','TagController@tag_list');
    Route::get('/tag/add', 'TagController@show_create');
    Route::get('/tag/edit', 'TagController@show_edit');
    Route::post('/tag/create', 'TagController@create');
    Route::post('/tag/update', 'TagController@update');
    Route::get('/tag/article', 'ArticleController@tag_article_list');
    Route::get('/tag/subscribe', 'TagController@subscribe');
    Route::get('/tag/unsubscribe', 'TagController@unsubscribe');

    Route::get('/tag/subscribers', 'TagController@show_subscribers_list');
});

Route::group(['namespace' => 'Admin'], function (){
    Route::get('admin/form', 'AdminIndexController@form');

    Route::post('admin/do/{action}', 'AdminIndexController@formDo');

    Route::get('/admin/list', 'AdminIndexController@list');
    Route::get('/admin/delete', 'AdminIndexController@delete');
    Route::post('/admin/upload', 'AdminUploadController@upload');

    Route::get('/admin/welcome', function(){
        return view('admin.welcome');
    });
    Route::get('/admin/index', function(){
        return view('admin.index');
    });

    Route::get('/select/articles', 'AdminSelectController@articles');

    /*
    Route::get('/admin/login', 'LoginController@login');
    Route::get('/admin/dologin', 'LoginController@dologin');
    Route::get('/admin', 'LoginController@index');
    Route::get('/admin/article/list', 'ArticleController@list');


    Route::get('/check', 'TestController@check');\
    */
});