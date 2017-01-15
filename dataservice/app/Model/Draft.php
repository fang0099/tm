<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-15
 * Time: 下午3:59
 */

namespace App\Model;



class Draft extends BaseModel
{
    protected $table = 'draft';

    public function _author(){
        return $this->belongsTo('App\Model\User', 'author_id')->where('del_flag', '=', 0)->first();
    }
}