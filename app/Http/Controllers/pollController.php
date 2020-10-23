<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
use App\Package;
use App\Addpoll;
class pollController extends Controller
{
    public function addpoll()
    {
        $packages= Package::all();
        return view ('frontend.pages.addpoll' ,compact('packages'));
    	
    }

   
    public function logout(Request $request){
        if($request->session()->has('user_email')){
            echo 'user found';
        $request->session()->flush();
        }
        else{
            echo 'user not found';
        }               
    }


 public function pollStore(Request $request){
        $addpolls  = new Addpoll();
        $addpolls->poll_title = $request->poll_title;
        $addpolls->option_num = $request->option_num;
        $addpolls->option_type= $request->option_type;

        $options= $request->options;
        $addpolls->options = implode(',',$options);
        $addpolls->package_id= $request->package_id;
        $addpolls->age= $request->age;
        $addpolls->gender= $request->gender;
        $addpolls->location= $request->location;
        $addpolls->save();
        return redirect('/addpoll')->with('message','successfully Inserted.');
    }


    public function viewPoll(){
        $addpolls= Addpoll::all();
        return view('backend.pages.viewPoll' ,compact('addpolls'));


    }






public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                // "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }


public function  createPoll(){
    return view('backend.pages.createPoll');
}































































   

    
}
