<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
use App\Register;
use App\Package;

  class indexController extends Controller

{
    public function index()
    {
    $packages= Package::all();
    return view ('frontend.layouts.index' ,compact('packages'));
    }
   

    public function userlogin()
    {
   	return view('frontend.pages.userlogin');
     }


 public function register(){
         
        return view('frontend.pages.register' );
         }

  public function registerStore(Request $request){



        $request->validate([


        'email' => 'required|unique:registers,email',
        'password' => 'required',
          ],
       [
         'email.required'=> 'Email already exist',


        ]);


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


      public function userloginstore(Request $request){
        

        $email  =$request->email;
        $password  =$request->password;

        $userlogin   = Register::where('email','=',$email)
                      ->where('password','=',$password)
                      ->first();
      
        if($userlogin)
        {
            Session::put('userid',$userlogin->id);
            Session::put('user_firstname',$userlogin->firstname);
            Session::put('user_lastname',$userlogin->lastname);
            Session::put('user_email',$userlogin->email);
            Session::put('user_location',$userlogin->location);
            
            return redirect('/addpoll');
 
        }
        else{
            
            return redirect('/userlogin')->with('message','invalid password or email.');
           }
          
         }
       



public function contact(){
  return view('frontend.pages.contact');
}


      
public function about(){
  return view('frontend.pages.about');
}



 }
