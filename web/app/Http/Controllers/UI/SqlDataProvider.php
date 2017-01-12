<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:28
 */

namespace App\Http\Controllers\UI;

use Illuminate\Support\Facades\DB;

class SqlDataProvider extends DataProvider
{
    function __construct() {
    }

    public function getData() {
        $data = DB::select($this->param);
        $map = array();
        foreach ($data as $d){
            $map[$d->key] = $d->value;
        }
        return $map;
    }
}