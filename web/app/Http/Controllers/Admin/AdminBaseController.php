<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-12
 * Time: 下午11:55
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBaseController extends Controller
{

    protected function jsonResult($success, $message = '', $data = []){
        return json_encode([
            'success' => $success,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function getParams(Request $request){
        return $request->input('params');
    }

}