<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:24
 */

namespace App\Http\Controllers\UI;


class ArrayDataProvider extends DataProvider
{
    function __construct() {
    }

    public function getData() {
        $data = $this->param;
        $res = array();
        foreach ($data as $d){
            foreach ($d as $k=>$v){
                $res[$v] = $k;
            }
        }
        return $res;
    }
}