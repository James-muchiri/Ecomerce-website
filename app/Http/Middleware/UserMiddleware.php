<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class UserMiddleware
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
        {if(Auth::guard('userauth')->user('email')){

            return $next($request);
        }else{
    
            return redirect()->route('user_signIn');
        }
    }
}
