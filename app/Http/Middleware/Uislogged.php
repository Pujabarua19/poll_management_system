<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Uislogged
{

    public function handle($request, Closure $next)
    {
        // $pkgId = intval($request->route("pkg"));
        // if (Session::has('user_email'))
        // return redirect()->back()->with("message", "You must login Or need to select package");
        // Session::put("pkg", $pkgId);
        // if (!Session::has('user_email')) {
        //     return redirect('/user-login');
        // }
        // return $next($request);
        $pkgId = intval($request->route("pkg"));
        if(empty($pkgId) && !Session::has('user_email'))
            return redirect()->back()->with("message", "You must need to select package");
        Session::put("pkg", $pkgId);
        if(! Session::has('user_email')){
           return redirect('/user-login');
        }
        return $next($request);
    }
}