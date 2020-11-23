<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Role
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        
        // admin only
        if (Auth::user() && Auth::user()->role_id == 1) {
            return $next($request);
        }
       
        else if (!Auth::user() || Auth::user()->role_id == 2) {
            return redirect('/');
        }

        
    }

}