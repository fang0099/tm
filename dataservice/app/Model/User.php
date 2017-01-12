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
        return $this->belongsToMany('App\Model\User', 'user_follows', 'user_id', 'follower_id')->where('del_flag', '=', 0);
    }

    public function _followersCount(){
        return$this->followers()->count();
    }

    public function follows(){
        return $this->belongsToMany('App\Model\User', 'user_follows', 'follower_id', 'user_id')->where('del_flag', '=', 0);
    }

    public function _followsCount(){
        return $this->follows()->count();
    }

    public function articles(){
        return $this->hasMany('App\Model\Article', 'author_id')->where('del_flag', '=', '0');
    }

    public function _articlesCount(){
        return $this->articles()->count();
    }

    public function checkedArticles(){
        return $this->hasMany('App\Model\Article', 'checker_id');
    }

    public function likeArticles(){
        return $this->belongsToMany('App\Model\Article', 'user_like_article', 'user_id', 'article_id')->where('del_flag', '=', 0);
    }

    public function _likeCount(){
        return $this->likeArticles()->count();
    }

    public function collectArticles(){
        return $this->belongsToMany('App\Model\Article', 'user_collect_article', 'user_id', 'article_id')->where('del_flag', '=', 0);
    }

    public function _collectCount(){
        return $this->collectArticles()->count();
    }

    public function subscribeTags(){
        return $this->belongsToMany('App\Model\Tag', 'tag_subscriber', 'subscriber_id', 'tag_id')->where('del_flag', '=', 0);
    }

    public function _tagCount(){
        return $this->subscribeTags()->count();
    }

    public function notices(){
        return $this->hasMany('App\Model\Notice', 'to_user')->where('del_flag', '=', 0)->orderBy('publish_time', 'desc');
    }

    public function _unreadNoticeCount(){
        return $this->notices()->where('status', '=', 0)->count();
    }

    public function activities(){
        return $this->hasMany('App\Model\Activities', 'uid')->where('del_flag', '=', 0)->orderBy('publish_time', 'DESC');
    }

    public function _activitiesCount(){
        return $this->activities()->count();
    }

    public function optLogs(){
        return $this->hasMany('App\Model\OptLog', 'user_id');
    }

}