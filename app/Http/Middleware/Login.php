<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class Login
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
        $merchant_id = Cookie::get('merchant');
        if($merchant_id){
            return $next($request);
        }else{
            return redirect('/login')->with('error','请登录');
        }
    }
}
