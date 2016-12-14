<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-14
 * Time: 下午10:46
 */

namespace App\Model;


class Slider extends BaseModel
{
    protected $table = 'sliders';

    public function article(){
        return $this->hasOne('App\Model\Article', 'article_id');
    }
}