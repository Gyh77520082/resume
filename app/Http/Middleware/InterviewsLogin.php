<?php

namespace App\Http\Middleware;

use Closure;

class InterviewsLogin
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
         if(session()->get('interviewer')){
            return $next($request);
        }else{
            return redirect('interviewer/login')->with('errors','请登陆');
        }
      
    }
}
