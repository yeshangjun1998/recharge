<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $merchant_id = Cookie::get('adminuser');
        if($merchant_id){
            return $next($request);
        }else{
            return redirect('/admin/login')->with('error','请登录');
        }
    }
}
