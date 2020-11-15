<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
use App\Package;

class maincontroller extends Controller
{
    public function default()
    {
    	return view ('backend.layouts.default');
    }

    public function login()
    {
    	return view ('backend.pages.login');
    }
    public function loginstore(Request $request){

        $email  =$request->email;
        $password  =$request->password;

        $user   = User::where('email','=',$email)
                      ->where('password','=',$password)
                      ->first();
        if($user)
        {
            Session::put('userid',$user->id);
            Session::put('u_email',$user->email);
            return redirect('/default');
        }
        else{
           return redirect('/login')->with('message','invalid password or email.');
           }
    }

  public function logout(Request $request){
        if($request->session()->has('u_email')){
            echo 'user found';
        $request->session()->flush();
        }
        else{
            echo 'user not found';
        }               
    }
   
}
