<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午9:07
 */

namespace App\Model;


class User extends BaseModel
{
    protected $table = 'users';

    public function followers(){
        return $this->belongsToMany('App\Model\User', 'user_follows', 'user_id', 'follower_id');
    }

    public function follows(){
        return $this->belongsToMany('App\Model\User', 'user_follows', 'follower_id', 'user_id');
    }

    public function articles(){
        return $this->hasMany('App\Model\Article', 'author');
    }

    public function checkedArticles(){
        return $this->hasMany('App\Model\Article', 'checker');
    }

    public function likeArticles(){
        return $this->belongsToMany('App\Model\Article', 'user_like_article', 'user_id', 'article_id');
    }

    public function collectArticles(){
        return $this->belongsToMany('App\Model\Article', 'user_collect_article', 'user_id', 'article_id');
    }



}