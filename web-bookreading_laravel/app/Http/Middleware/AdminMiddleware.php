<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if (Auth::user()->role_users == '1') # role_users == '1'-> admin, '0'->user
            {
                return $next($request);
            } 
            else 
            {
                return redirect('/home')->with('message', 'Access Deny, You\'re not Admin!!!');
            }
        }
        else
        {
            return redirect('/login');
            // ->with('message', 'Please Login first!!!');
        }
        
    }
}
