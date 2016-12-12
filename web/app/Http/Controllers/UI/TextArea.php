<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:35
 */

namespace App\Http\Controllers\UI;


class TextArea extends Control
{
    function __construct() {
    }


    public function render() {
        $textArea = "<textarea ";
        foreach ($this->attribute as $key => $value){
            $textArea .= $key . "='" . $value . "' ";
        }
        $textArea .= "></textarea>";
        return $textArea;
    }
}