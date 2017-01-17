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
Route::get('/friendlink/page', 'FriendLinkController@page');
Route::post('/friendlink/update', 'FriendLinkController@update');
Route::get('/friendlink/delete', 'FriendLinkController@delete');

// users
Route::get('/user/get', 'UserController@get');
Route::post('/user/create', 'UserController@create');
Route::get('/user/list', 'UserController@list');
Route::get('/user/page', 'UserController@page');
Route::post('/user/update', 'UserController@update');
Route::get('/user/delete', 'UserController@delete');
Route::get('/user/followers', 'UserController@followers');
Route::get('/user/tags', 'UserController@tags');
Route::get('/user/follows', 'UserController@follows');
Route::get('/user/follow', 'UserController@follow');
Route::get('/user/unfollow', 'UserController@unfollow');
Route::get('user/lastedarticles', 'UserController@lastedArticles');
Route::get('user/hotestarticles', 'UserController@hotestArticles');
Route::get('user/notice', 'UserController@notice');
Route::get('user/optlog', 'UserController@optLog');
Route::get('user/getbyname', 'UserController@getByUsername');
Route::get('/user/hasfollower', 'UserController@hasFollower');
Route::get('/user/haslike', 'UserController@hasLike');
Route::get('/user/hascollect', 'UserController@hasCollect');

Route::post('/user/savedraft', 'UserController@saveDraft');
Route::get('/user/getdraft', 'UserController@getDraft');
Route::get('/user/deldraft', 'UserController@deleteDraft');
Route::get('/user/delarticle', 'UserController@deleteArticle');
Route::get('/user/deletenotice', 'UserController@deleteNotice');

Route::get('user/articlescollect', 'UserController@collectArticles');
Route::get('user/articlesfollowers', 'UserController@followerArticles');
Route::get('user/articlestags', 'UserController@tagArticles');
Route::get('user/articleslasted', 'UserController@lastedArticles');
Route::get('user/articleshotest', 'UserController@hotestArticles');
Route::get('user/articlesrecommend', 'UserController@recommend');
Route::get('user/articlesdraft', 'UserController@draft');
Route::get('user/articleschecking', 'UserController@checking');
Route::get('user/articlesreject', 'UserController@reject');

Route::get('user/activities', 'UserController@activities');


// article
Route::get('/article/get', 'ArticleController@get');
Route::get('/article/read', 'ArticleController@read');
Route::get('/article/next', 'ArticleController@next');
Route::get('/article/prev', 'ArticleController@prev');
Route::post('/article/create', 'ArticleController@create');
Route::get('/article/list', 'ArticleController@list');
Route::get('/article/page', 'ArticleController@page');
Route::get('/article/apage', 'ArticleController@apage');
Route::post('/article/update', 'ArticleController@update');
Route::get('/article/delete', 'ArticleController@delete');
Route::get('/article/check', 'ArticleController@check');
Route::get('/article/bcheck', 'ArticleController@bcheck');
Route::get('/article/collect', 'ArticleController@collect');
Route::get('/article/uncollect', 'ArticleController@uncollect');
Route::get('/article/like', 'ArticleController@like');
Route::get('/article/unlike', 'ArticleController@unlike');
Route::post('/article/comment', 'ArticleController@comment');
Route::get('/article/commentdelete', 'ArticleController@deleteComment');
Route::get('/article/lscomment', 'ArticleController@listComment');
Route::get('/article/up', 'ArticleController@upArticles');
Route::get('/article/addtags', 'ArticleController@addTags');
Route::get('/article/deltags', 'ArticleController@delTags');
Route::get('/article/hotest', 'ArticleController@hot');
Route::get('/article/recommend', 'ArticleController@recommend');
Route::post('/article/savedraft', 'ArticleController@saveDraft');
Route::get('/article/getdraft', 'ArticleController@getDraft');
Route::get('/article/relate', 'ArticleController@relate');



// tag
Route::get('/tag/get', 'TagController@get');
Route::get('/tag/page', 'TagController@page');
Route::post('/tag/create', 'TagController@create');
Route::get('/tag/list', 'TagController@list');
Route::post('/tag/update', 'TagController@update');
Route::get('/tag/delete', 'TagController@delete');
Route::get('/tag/check', 'TagController@check');
Route::get('/tag/subscribe', 'TagController@subscribe');
Route::get('/tag/unsubscribe', 'TagController@unsubscribe');
Route::get('/tag/articles', 'TagController@articles');
Route::get('/tag/subscriber', 'TagController@subscriber');
Route::get('/tag/menutags', 'TagController@menuTags');
Route::get('/tag/indextags', 'TagController@indexTags');
Route::get('/tag/hassubscriber', 'TagController@hasSubscribe');

// news flash
Route::get('/newsflash/get', 'NewsFlashController@get');
Route::post('/newsflash/create', 'NewsFlashController@create');
Route::get('/newsflash/list', 'NewsFlashController@list');
Route::get('/newsflash/page', 'NewsFlashController@page');
Route::post('/newsflash/update', 'NewsFlashController@update');
Route::get('/newsflash/delete', 'NewsFlashController@delete');

// sponsors
Route::post('/sponsors/create', 'SponsorsController@create');
Route::get('/sponsors/get', 'SponsorsController@get');
Route::get('/sponsors/list', 'SponsorsController@list');
Route::get('/sponsors/page', 'SponsorsController@page');
Route::post('/sponsors/update', 'SponsorsController@update');
Route::get('/sponsors/delete', 'SponsorsController@delete');

// slider
Route::get('/slider/get', 'SliderController@get');
Route::get('/slider/list', 'SliderController@list');
Route::get('/slider/page', 'SliderController@page');
Route::post('/slider/create', 'SliderController@create');
Route::post('/slider/update', 'SliderController@update');
Route::get('/slider/delete', 'SliderController@delete');

Route::post('/notice/create', 'NoticeController@create');
Route::get('/notice/delete', 'NoticeController@delete');


// comment
// params : see article/comment
Route::post('/comment/create', 'CommentController@create');
Route::post('/comment/update', 'CommentController@update');

// params : id, userid
Route::get('/comment/delete', 'CommentController@delete');
// params : id, userid
Route::get('/comment/up', 'CommentController@up');
// params : id, userid
Route::get('/comment/cancleup', 'CommentController@cancleUp');


Route::get('/key/fucs', 'KeyController@functionsCount');















//Route::get('/get', 'WebInfoController@get');
