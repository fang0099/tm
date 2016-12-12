<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:24
 */

namespace App\Http\Controllers\UI;


abstract class DataProvider
{
    function __construct() {
    }

    public $param;

    abstract public function getData();
}