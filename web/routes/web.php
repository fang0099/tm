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
    Route::post('/article/create_draft', 'ArticleController@create_draft');
    Route::get('/article/delete_draft', 'ArticleController@delete_draft');
    Route::post('/article/update', 'ArticleController@update');
    Route::post('/article/update_draft', 'ArticleController@update_draft');
    Route::post('/article/comment', 'ArticleController@comment_article');
    Route::get('/article/delete', 'ArticleController@delete');
    Route::get('/article/like', 'ArticleController@like');
    Route::get('/article/unlike', 'ArticleController@unlike');
    Route::get('/article/collect', 'ArticleController@collect');
    Route::get('/article/uncollect', 'ArticleController@uncollect');
    //Route::get('/article/edit', 'ArticleController@edit_article');
    Route::get('/article/edit', 'ArticleController@show_edit');
    Route::get('/article', 'ArticleController@show_article');


    Route::get('/article/ajax_article_list', 'ArticleController@ajax_article_list');
    Route::get('/article/ajax_comment_list', 'ArticleController@ajax_comment_list');
    Route::get('/article/ajax_list', 'ArticleController@show_list_ajax');
    //Route::get('/article', 'ArticleController@show_article');
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

    Route::post("/upload_img", 'IndexController@upload_img');

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

    //user-center
    Route::get('/uc', 'UserCenterController@index');
    Route::get('/uc/activities/{page?}', 'UserCenterController@activities');
    Route::get('/uc/notices/{page?}', 'UserCenterController@notices');
    Route::get('/uc/articles/{type}/{page?}', 'UserCenterController@articles');
    Route::get('/uc/subscribe/{page?}', 'UserCenterController@subscribe');
    Route::get('/uc/follows/{page?}', 'UserCenterController@follows');
    Route::get('/uc/followers/{page?}', 'UserCenterController@followers');
    Route::get('/uc/info', 'UserCenterController@info');
    Route::post('/uc/update', 'UserCenterController@update');
    Route::post('/uc/upload', 'UserCenterController@upload');
    Route::post('/uc/uncollect/{id}', 'UserCenterController@uncollect');
    Route::post('/uc/unfollow/{id}', 'UserCenterController@unfollow');
    Route::post('/uc/unsubscribe/{id}', 'UserCenterController@unsubscribe');
    Route::get('/uc/deletenotice/{id}', 'UserCenterController@deleteNotice');
    Route::get('/uc/deletedraft/{id}', 'UserCenterController@delDraft');
    Route::get('/uc/deletearticle/{id}', 'UserCenterController@delArticle');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['webAuth']], function (){
//Route::group(['namespace' => 'Admin'], function (){
    Route::get('admin/form', 'AdminIndexController@form');
    Route::get('admin/page', 'AdminIndexController@page');

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

    Route::get('/admin/articletag', 'AdminArticleController@articleTags');
    Route::get('/admin/articletag/delete', 'AdminArticleController@delTags');
    Route::get('/admin/articletag/add', 'AdminArticleController@addTags');
    Route::get('/admin/article/bcheck', 'AdminArticleController@bcheck');
    Route::get('/admin/checkarticle', 'AdminArticleController@checkarticle');
    Route::post('/admin/article/check', 'AdminArticleController@check');

    Route::get('/select/articles', 'AdminSelectController@articles');

    /*
    Route::get('/admin/login', 'LoginController@login');
    Route::get('/admin/dologin', 'LoginController@dologin');
    Route::get('/admin', 'LoginController@index');
    Route::get('/admin/article/list', 'ArticleController@list');


    Route::get('/check', 'TestController@check');\
    */
});

Route::get('/captcha', function(){
    return Captcha::src();
});

Route::get('/mail', function(){
    Mail::send('mail',['name'=>'Bean'],function($message){
        $to = '234616116@qq.com';
        $message ->to($to)->subject('邮件测试');
    });
});
