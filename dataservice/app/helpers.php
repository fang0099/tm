<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午1:41
 */

if(!function_exists('json_result')){
    function json_result($business_line, $code, $message = '', $data = array()){
        $res = array();
        $res['code'] = $business_line . $code;
        $res['success'] = $code == \App\StatusCode::OPERATE_SUCCESS;
        $res['message'] = $message;
        $res['data'] = $data;
        $json = json_encode($res, JSON_UNESCAPED_UNICODE);
        return response($json);
    }
}



