<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
class pollController extends Controller
{
    public function addpoll()
    {
    	return view ('frontend.pages.addpoll');
    }

   
    public function U_logout(Request $request){
        if($request->session()->has('user_email')){
            echo 'user found';
        $request->session()->flush();
        }
        else{
            echo 'user not found';
        }               
    }
   

    
}
