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

/*
Route::group(['middleware' => 'auth'], function(){

});
*/

// webinfo
Route::get('/webinfo/get', 'WebInfoController@get');
Route::post('/webinfo/update', 'WebInfoController@update');

// friendlink
Route::get('/friendlink/get', 'FriendLinkController@get');
Route::post('/friendlink/create', 'FriendLinkController@create');
Route::get('/friendlink/list', 'FriendLinkController@list');
Route::post('/friendlink/update', 'FriendLinkController@update');
Route::get('/friendlink/delete', 'FriendLinkController@delete');

// users
Route::get('/user/get', 'UserController@get');
Route::post('/user/create', 'UserController@create');
Route::get('/user/list', 'UserController@list');
Route::post('/user/update', 'UserController@update');
Route::get('/user/delete', 'UserController@delete');
Route::get('/user/followers', 'UserController@followers');
Route::get('user/lastedarticles', 'UserController@lastedArticles');
Route::get('user/hotestarticles', 'UserController@hotestArticles');
Route::get('user/notice', 'UserController@notice');
Route::get('user/optlog', 'UserController@optLog');
Route::get('user/getbyname', 'UserController@getByUsername');

// article
Route::get('/article/get', 'ArticleController@get');
Route::post('/article/create', 'ArticleController@create');
Route::get('/article/list', 'ArticleController@list');
Route::post('/article/update', 'ArticleController@update');
Route::get('/article/delete', 'ArticleController@delete');
Route::get('/article/check', 'ArticleController@check');
Route::get('/article/collect', 'ArticleController@collect');
Route::get('/article/uncollect', 'ArticleController@uncollect');
Route::get('/article/like', 'ArticleController@like');
Route::get('/article/unlike', 'ArticleController@unlike');
Route::post('/article/comment', 'ArticleController@comment');

// tag
Route::get('/tag/get', 'TagController@get');
Route::post('/tag/create', 'TagController@create');
Route::get('/tag/list', 'TagController@list');
Route::post('/tag/update', 'TagController@update');
Route::get('/tag/delete', 'TagController@delete');
Route::get('/tag/check', 'TagController@check');
Route::get('/tag/subscribe', 'TagController@subscribe');
Route::get('/tag/unsubscribe', 'TagController@unsubscribe');
Route::get('/tag/articles', 'TagController@articles');
Route::get('/tag/subscriber', 'TagController@get');

// news flash
Route::post('/newsflash/create', 'NewsFlashController@create');
Route::get('/newsflash/list', 'NewsFlashController@list');
Route::post('/newsflash/update', 'NewsFlashController@update');
Route::get('/newsflash/delete/{ids}', 'NewsFlashController@delete');

// sponsors
Route::post('/sponsors/create', 'SponsorsController@create');
Route::get('/sponsors/list', 'SponsorsController@list');
Route::post('/sponsors/update', 'SponsorsController@update');
Route::get('/sponsors/delete/{ids}', 'SponsorsController@delete');

Route::get('/key/fucs', 'KeyController@functionsCount');

Route::get('/test', 'KeyController@t');














//Route::get('/get', 'WebInfoController@get');
