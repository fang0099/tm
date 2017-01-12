<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:01
 */

namespace App\Http\Controllers\UI;


abstract class Control
{
    function __construct() {
    }

    public $attribute = array();


    abstract public function render();
}