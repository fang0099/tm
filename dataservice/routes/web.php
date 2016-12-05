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
Route::get('/friendlink/get/{id}', 'FriendLinkController@get');
Route::get('/friendlink/create', 'FriendLinkController@create');
Route::get('/friendlink/list', 'FriendLinkController@list');
Route::post('/friendlink/update', 'FriendLinkController@update');
Route::get('/friendlink/delete/{ids}', 'FriendLinkController@delete');

// users
Route::get('/user/get/{id}', 'UserController@get');
Route::post('/user/create', 'UserController@create');
Route::get('/user/list', 'UserController@list');
Route::post('/user/update', 'UserController@update');
Route::get('/user/delete/{ids}', 'UserController@delete');
Route::get('/user/followers/{id}/{page?}', 'UserController@followers');


// article
Route::get('/article/get/{id}', 'ArticleController@get');
Route::post('/article/create', 'ArticleController@create');
Route::get('/article/list', 'ArticleController@list');
Route::post('/article/update', 'ArticleController@update');
Route::get('/article/delete/{ids}', 'ArticleController@delete');
Route::get('/article/check/{id}/{operator}', 'ArticleController@check');
Route::get('/article/collect/{id}/{userid}', 'ArticleController@collect');
Route::get('/article/uncollect/{id}/{userid}', 'ArticleController@uncollect');
Route::get('/article/like/{id}/{userid}', 'ArticleController@like');
Route::get('/article/unlike/{id}/{userid}', 'ArticleController@unlike');
Route::post('/article/comment', 'ArticleController@comment');

// tag
Route::get('/tag/get/{id}', 'TagController@get');
Route::post('/tag/create', 'TagController@create');
Route::get('/tag/list', 'TagController@list');
Route::post('/tag/update', 'TagController@update');
Route::get('/tag/delete/{ids}', 'TagController@delete');
Route::get('/tag/check/{id}/{operator}', 'TagController@check');
Route::get('/tag/subscribe/{id}/{userid}', 'TagController@subscribe');
Route::get('/tag/unsubscribe/{id}/{userid}', 'TagController@unsubscribe');
Route::get('/tag/articles/{id}/{page?}', 'TagController@articles');
Route::get('/tag/subscriber/{id}/{page?}', 'TagController@get');


Route::get('/key/fucs', 'KeyController@functionsCount');




















//Route::get('/get', 'WebInfoController@get');