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
        return $this->belongsTo('App\Model\User', 'author_id')->where('del_flag', '=', 0)->first();
    }

    public function checker(){
        return $this->belongsTo('App\Model\User', 'checker_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag', 'tag_article_rel', 'article_id', 'tag_id');
    }

    public function _tagsCount(){
        return $this->tags()->count();
    }

    public function comments(){
        return $this->hasMany('App\Model\Comments', 'article_id')->where('type', '=', '0')->where('del_flag', '=', '0');
    }
}