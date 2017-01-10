<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午9:06
 */

namespace App\Model;


class Tag extends BaseModel
{
    protected $table = 'tag';

    public function subscriber(){
        return $this->belongsToMany('App\Model\User', 'tag_subscriber', 'tag_id', 'subscriber_id')->where('del_flag', '=', 0);
    }

    public function _subscriberCount(){
        return $this->subscriber()->count();
    }

    public function articles(){
        return $this->belongsToMany('App\Model\Article', 'tag_article_rel', 'tag_id', 'article_id')->where('del_flag', '=', '0');
    }

    public function _articleCount(){
        return $this->articles()->count();
    }
}