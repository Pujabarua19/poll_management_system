<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
use App\Register;

  class indexController extends Controller

{
    public function index()
    {
    return view ('frontend.layouts.index');
    }
   

    public function userlogin()
    {
   	return view('frontend.pages.userlogin');
     }

      public function userloginstore(Request $request){
        

        $email  =$request->email;
        $password  =$request->password;

        $userlogin   = Register::where('email','=',$email)
                      ->where('password','=',$password)
                      ->first();
        if($userlogin)
        {
            Session::put('userid',$userlogin->id);
            Session::put('user_email',$userlogin->email);
            return redirect('/addpoll');
        }
        else{
            
            return redirect('/userlogin')->with('message','invalid password or email.');
           }
          
         }
       

        public function register(){
         
        return view('frontend.pages.register' );
         }

        public function registerStore(Request $request){
        DB:: table('registers')->insert(
        [
            'firstname'=>$request->firstName,
            'lastname'=> $request->lastName,
            'location'=>$request->location,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);

    return redirect('/register')->with('message','successfully Inserted.');
    }
      
public function about(){
  return view('frontend.pages.about');
}



 }
