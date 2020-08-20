<?php

namespace App\Http\Middleware;

use Closure;

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
         if(session()->get('user')){
            return $next($request);
        }else{
            return redirect('admin/login')->with('errors','请登陆');
        }

    }
}
