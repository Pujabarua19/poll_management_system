<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class Uislogged
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
        if(!Session::has('user_email')){
           return redirect('/userlogin');
            // echo "not found";
        }
        return $next($request);
    }
}
