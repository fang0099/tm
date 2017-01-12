<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:32
 */

namespace App\Http\Controllers\UI;


class Button extends Control
{
    function __construct() {
    }

    public $name;

    public function render() {
        $html = "<button ";
        foreach ($this->attribute as $key => $val){
            $html .= $key . "='" . $val . "' ";
        }
        $html .= ">" . $this->name . "</button>";
        return $html;
    }
}