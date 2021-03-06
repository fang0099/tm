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

    public function _collectCount(){
        return $this->collectUsers()->count();
    }

    public function _author(){
        return $this->belongsTo('App\Model\User', 'author_id')->where('del_flag', '=', 0)->first();
    }
    public function author(){
        return $this->belongsTo('App\Model\User', 'author_id')->where('del_flag', '=', 0);
    }

    public function checker(){
        return $this->belongsTo('App\Model\User', 'checker_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag', 'tag_article_rel', 'article_id', 'tag_id')->where('del_flag', '=', '0');
    }

    public function _tagList(){
        return $this->tags()->get();
    }

    public function _tagsCount(){
        return $this->tags()->count();
    }

    public function comments(){
        return $this->hasMany('App\Model\Comments', 'article_id')->where('type', '=', '0')->where('del_flag', '=', '0');
    }

    public function _readTime(){
        $time = intval($this->word_count / 10 / 60);
        return $time > 0 ? $time : 1;
    }
}