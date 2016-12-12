<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:23
 */

namespace App\Http\Controllers\UI;


class Select extends Control
{
    function __construct() {
    }

    public $dataProvider;

    public function render() {
        $data = $this->dataProvider->getData();
        $select = "<select ";
        foreach ($this->attribute as $key => $val){
            $select .= $key . "='" . $val . "' ";
        }
        $select .= ">";
        foreach($data as $k => $v){
            $select .= "<option value='$v'>" . $k . "</option>";
        }
        $select .= "</select>";
        return $select;
    }
}