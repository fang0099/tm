<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-28
 * Time: 下午11:26
 */

namespace App\Http\Middleware;


class WebAuth
{
    public function handle($request, Closure $next)
    {

        if($request->session()->get('id')){
            $response = $next($request);
            return $response;
        }
        return redirect(env('APP_URL').'/login');
    }
}