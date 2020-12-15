<?php
   
namespace App\Http\Controllers;
   
use App\Package;
use App\Payment;
use App\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * succeeded response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($pkg=null, $poll_id=null)
    {
        if($pkg != null && intval($pkg) > 0)
            Session::put("pkg", intval($pkg));
        if($poll_id != null && intval($poll_id) > 0)
            Session::put("poll_id", intval($poll_id));
        return view('frontend.pages.stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // $packages= Package::all();
        if ($request->isMethod("POST")
            && Session::has("pkg") && Session::has("poll_id")) {
            $currencyCode = "USD";
            $package = Package::where("id", intval(Session::get("pkg")))->first();
            if($package != null) {
                $amount = $package->price;
                Stripe\Stripe::setApiKey("sk_test_51HH8neLFqG0kjbHlnod5McXM0xYgBCUdHR2YvhcsjtXDJYKGo927n72jKVhPHN2tXebB57wTzzQVHIpIp1WFATHY00aYScBcgF");
                try {

                    $charge = Stripe\Charge::create([
                        "amount" => floatval($amount),
                        "currency" => $currencyCode,
                        "source" => $request->stripeToken,
                        "description" => $package->packageName . " and ".$package->id." Transaction processed"
                    ]);

                    $result = $charge->jsonSerialize();

                    if ($result['amount_refunded'] == 0
                        && empty($result['failure_code'])
                        && $result['paid'] == 1
                        && $result['captured'] == 1 && $result['status'] == 'succeeded') {

                        $payment  = Payment::where("user_id", intval(Session::get("userid")))
                                    ->where("poll_id", intval(Session::get("poll_id")))
                                    ->where("package_id", $package->id)->first();

                        if($payment == null) {
                            $payment = new Payment();
                            $payment->user_id = intval(Session::get("userid"));
                            $payment->poll_id = intval(Session::get("poll_id"));
                            $payment->package_id = $package->id;
                        }

                        //$payment->card_name = trim(strip_tags($request->get("card_name")));
                        //$payment->card_num = trim(strip_tags($request->get("card_number")));
                        //$payment->cvc = trim(strip_tags($request->get("card_cvc")));
                        //$payment->month = trim(strip_tags($request->get("card_expire_month")));
                        //$payment->year = trim(strip_tags($request->get("card_expire_year")));
                        $payment->currency_code = $currencyCode;
                        $payment->txn_id = $result["balance_transaction"];
                        $payment->payment_status = $result["status"];
                        $payment->payment_response = json_encode($result);
                        $payment->save();

//                        $poll = Poll::where("id", intval(Session::get("poll_id")))->first();
//                        $poll->pay_status = 'completed';
//                        $poll->save();

                        return redirect()->route("user.polls");
                    }else{
                        $message = "Payment Unavailable";
                    }
                }catch (\Exception $e){
                    $message = "Payment Failed.(Error)";
                }
                Session::flash('success', $message);
                return back();
            }else{
                return back()->with("success", "Package Not Found in Database");
            }
        }else{
            return back()->with("success", "Package Or Poll Missing");
        }
    }
}
