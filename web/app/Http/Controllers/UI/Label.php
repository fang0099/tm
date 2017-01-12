<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:34
 */

namespace App\Http\Controllers\UI;


class Label extends Control
{
    function __construct() {
    }

    public $name;

    public function render() {
        $label = "<label ";
        foreach ($this->attribute as $key => $val){
            $label .= $key . "='" . $val . "' ";
        }
        $label .= ">" . $this->name . "</label>";
        return $label;
    }
}