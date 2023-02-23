<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {        
        //return $next($request);
         /*
        if (! $request->expectsJson()) {
            return route('login');
        }
        if(auth()->user()->isAdmin == 1)
        {
            return route('login/admin');    
        }
        if (Auth::user()) {
            return route('/tenant');    
        }
         */
       // return $next($request);
    }
    protected function authenticated(Request $request, $user)
    {
        return response([' Login Successful!']);
    }
}
