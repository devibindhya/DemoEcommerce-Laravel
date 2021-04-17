<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     /*Once a user logged in , he will not see the login page again, after logout only he can see login. */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="login" && $request->session()->has('user') )
        {
            return redirect('/');
        }
        return $next($request);
    }
}
