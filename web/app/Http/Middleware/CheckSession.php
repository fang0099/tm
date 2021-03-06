<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-28
 * Time: 下午11:26
 */

namespace App\Http\Middleware;
use Closure;

class CheckSession
{
    public function handle($request, Closure $next)
    {
        if($request->session()->get('id')){
            $response = $next($request);
            return $response;
        }
        return redirect('/account#login');
    }
}