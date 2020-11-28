<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Poll;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PollController extends Controller
{
    public function addPoll($pkg = null)
    {
        //dd($pkg);
        $packages = Package::all();
        return view('frontend.pages.addpoll', compact('packages'));
    }

    public function allPoll()
    {
        //dd($pkg);
        $packages = Package::all();
        return view('frontend.pages.allpoll', compact('packages'));
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('user_email')) {
            echo 'user found';
            $request->session()->flush();
        } else {
            echo 'user not found';
        }
    }

    private function getPollRule()
    {
        return [
            'poll_title' => 'required|max:120',
            'option_num' => 'required',
            'option_type' => 'required',
            'age' =>'required',
            'gender' => 'required',
            'location' => 'required',
        ];

    }

    private function getPollRuleMessage()
    {
        return [
            'poll_title.required' => 'Title is required',
            'poll_title.max' => 'Title max 120 character Long',
            'option_num.required' => 'Option number is required',
            'option_type' => 'Option type is required',
            'age' => 'Age is required',
            'gender' => 'gender is required',
            'location' => 'location is required',
        ];
    }

    public function pollStore(Request $request)
    {

        $this->validate($request, $this->getPollRule(), $this->getPollRuleMessage());

        $addpolls = new Poll();
        $addpolls->user_id = intval(Session::get("userid"));
        $addpolls->poll_title = $this->filter($request->poll_title);
        $addpolls->option_num = intval($request->option_num);
        $addpolls->option_type = trim($request->option_type);
        $addpolls->package_id = intval(Session::get("pkg"));
        $addpolls->age = trim($request->age);
        $addpolls->gender = trim($request->gender);
        $addpolls->location = trim($request->location);

        try {
            if($addpolls->save()){
                $options = $request->options;
                $ans = [];
                foreach ($options as $option){
                    if(trim($option) != '')
                        $ans[] = $option;
                }

                if(count($ans) == intval($request->option_num)){
                    foreach ($ans as $ansTitle){
                        DB::table("answeres")->insert([
                           'poll_id' => $addpolls->id,
                           'ans_title' => $ansTitle
                        ]);
                    }

                    DB::table("payments")->insert([
                        'user_id' => intval(Session::get("userid")),
                        'poll_id' => intval($addpolls->id),
                        'package_id' => intval(Session::get("pkg"))
                    ]);

                    Session::put("poll_id", intval($addpolls->id));

                    return redirect()->route("stripe.get");

                }else{
                    if($addpolls != null)
                        $addpolls->delete();
                    return redirect()->back()->with('error', 'Option at least 2 required Or Not match your options num and options');
                }

            }else{
                return redirect()->back()->with('error', 'Inserted failed');
            }
        }catch (\Exception $exception){
            //dd($exception);
            abort(404, "Something is wrong");
        }

    }

    private function filter($value){
        return trim(strip_tags($value));
    }


    public function viewPoll()
    {
        $query = DB::table("payments")
            ->join("polls", "payments.poll_id","=", "polls.id")
            ->join("packages", "payments.package_id","=", "packages.id")
            ->where("payments.user_id","=", Session::get("userid"));
        $query->select("payments.*","polls.poll_title","packages.packageName","packages.price")
        ->orderBy("payments.created_at");
        $payments = $query->get();
        return view('frontend.pages.viewpoll', compact('payments'));
    }


    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,

        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }


    public function createPoll()
    {
        return view('backend.pages.createPoll');
    }

    public function profile()
    {
        // $packages= Package::all();
        return view('frontend.pages.profile');

    }


}
