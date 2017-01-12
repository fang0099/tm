<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:33
 */

namespace App\Http\Controllers\UI;


class Input extends Control
{
    function __construct() {
    }

    public function render() {
        $html = "<input ";
        foreach ($this->attribute as $k => $v){
            $html .= $k . "='" . $v . "' ";
        }
        $html .= " />";
        return $html;
    }
}