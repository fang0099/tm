<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午9:04
 */

namespace App\Model;


class Article extends BaseModel
{
    protected $table = 'article';

    public function likeUsers(){
        return $this->belongsToMany('App\Model\User', 'user_like_article', 'article_id', 'user_id');
    }

    public function collectUsers(){
        return $this->belongsToMany('App\Model\User', 'user_collect_article', 'article_id', 'user_id');
    }

    public function _author(){
        return $this->belongsTo('App\Model\User', 'author');
    }

    public function _checker(){
        return $this->belongsTo('App\Model\User', 'checker');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag', 'tag_article_rel', 'article_id', 'tag_id');
    }

    public function comments(){
        return $this->hasMany('App\Model\Comments', 'article_id')->where('type', '=', '0')->where('del_flag', '=', '0');
    }
}