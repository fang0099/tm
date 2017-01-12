<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 17-1-8
 * Time: 下午1:35
 */

namespace App\Model;


class Activities extends BaseModel
{
    protected $table = 'activities';

    public function user(){
        return $this->belongsTo('App\Model\User', 'uid')->where('del_flag', '=', 0);
    }

    public function _ref(){
        if($this->type == 0){
            return $this->belongsTo('App\Model\Article', 'ref_id')->where('del_flag', '=', 0)->first();
        }else if($this->type == 1){
            return $this->belongsTo('App\Model\Tag', 'ref_id')->where('del_flag', '=', 0)->first();
        }else if($this->type == 3){
            return $this->belongsTo('App\Model\User', 'ref_id')->where('del_flag', '=', 0)->first();
        }
    }
}