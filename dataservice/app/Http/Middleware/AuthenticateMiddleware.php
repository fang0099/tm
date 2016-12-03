<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 上午9:35
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

class AuthenticateMiddleware
{


    public function handle(Request $request, Closure $next){
        if($this->checkSign($request)){
            return next($request);
        }else {
            return json_result();
        }
    }

    private function checkSign(Request $request){
        if( $request->has('app_key')
            && $request->has('t')
            && $request->has('sign')){
            $app_key = $request->input('app_key');
            $t = $request->input('t');
            $sign = $request->input('sign');


        }else {
            return false;
        }
    }

}