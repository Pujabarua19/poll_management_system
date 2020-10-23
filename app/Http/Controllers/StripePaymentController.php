<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use cartalyst\Stripe;
   

class StripePaymentController extends Controller
{
    
   
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => " " 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }

}

