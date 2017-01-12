<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午10:55
 */

namespace App\Model;


class Notice extends BaseModel
{
    protected $table = 'notice';

    public function user(){
        return $this->belongsTo('App\Model\User', 'to_user');
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