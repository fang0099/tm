<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午9:05
 */

namespace App\Model;


class Comments extends BaseModel
{
    protected $table = 'comments';

    public function article(){
        return $this->belongsTo('App\Model\Article', 'article_id');
    }


}