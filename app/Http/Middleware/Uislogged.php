<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Uislogged
{
    public function handle($request, Closure $next)
    {
        $pkgId = intval($request->route("pkg"));
        if(intval($pkgId) > 0 && !Session::has('user_email'))
            return redirect()->back()->with("message", "You must need to select package");
        Session::put("pkg", $pkgId);
        if(! Session::has('user_email')){
           return redirect('/user-login');
        }
        return $next($request);
    }
}