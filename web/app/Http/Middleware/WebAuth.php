<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-28
 * Time: 下午11:26
 */

namespace App\Http\Middleware;
use Closure;

class WebAuth
{
    public function handle($request, Closure $next)
    {
        $request->session()->set('is_admin', '1');
        $response = $next($request);
        return $response;
        /*
        if($request->session()->get('id')){
            $response = $next($request);
            return $response;
        }

        return redirect('/login');
        */
    }
}