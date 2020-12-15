<?php

namespace App\Http\Controllers;

use App\Answer;
use App\UserVote;
use Illuminate\Http\Request;
use App\Package;
use App\Poll;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PollController extends Controller
{
    public function addPoll($pkg = null)
    {
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
        $age = explode("-", $request->age);
        $addpolls->min_age = intval(trim($age[0]));
        $addpolls->max_age = intval(trim($age[1]));
        $addpolls->gender = trim($request->gender);
        $addpolls->location = implode(",", $request->location);

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

                    return redirect()->route("user.polls");

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


    public function vote(Request $request)
    {
        //dd(Session::get("user_age"));
        if($request->isMethod("POST") && $request->has("poll_id")) {
            $pollId = intval($request->input("poll_id"));
            if ($pollId > 0 ) {
                $poll = Poll::where("id", $pollId)->first();

                $totalVote = DB::table("answeres")->where("poll_id", 21)
                    ->selectRaw("poll_id, SUM(vote) AS totalVote")
                    ->groupBy("poll_id")->first()->totalVote;
                $package = $poll->package;

                if(intval($package->quantity) == intval($totalVote))
                    return redirect()->back()->with("error", "Vote is not accepted : " . $poll->poll_title);

                //check user already voted or not
                $userVote = DB::table("user_vote")
                    ->where("user_id", intval(Session::get("userid")))->where("poll_id", $pollId)->first();

                if($userVote != null) {
                    return redirect()->back()->with("error", "You already give vote: " . $poll->poll_title);
                }

                $options = $request->input("options");
                $optionType = $request->input("option_type");
                //dd($options);
                try {
                    if($optionType == "radio" || $optionType == "checkbox") {
                        if (!empty($options)) {
                            if (is_array($options)) {
                                foreach ($options as $option) {
                                    $ans = Answer::where('id', intval($option))->where('poll_id', $pollId)->first();
                                    if ($ans != null) {
                                        $ans->vote = $ans->vote + 1;
                                        $ans->save();
                                    }
                                }
                            } else {
                                $ans = Answer::where('id', intval($options))->where('poll_id', $pollId)->first();
                                if ($ans != null) {
                                    $ans->vote = $ans->vote + 1;
                                    $ans->save();
                                }
                            }

                            if($userVote == null)
                                $userVote = new UserVote();

                            $userVote->user_id = intval(Session::get("userid"));
                            $userVote->poll_id = $pollId;
                            $userVote->save();
                        } else {
                            return redirect()->back()->with("error", "You must be need select a option for vote");
                        }
                    }

                    return redirect()->back()->with("message", "vote take successfully");
                } catch (\Exception $exception) {
                    //dd($exception);
                    return redirect()->back()->with("error", "Something is wrong");
                }
            }else{
                return redirect()->back()->with("error", "Invalid poll select for vote");
            }

        }else{
            return redirect()->back();
        }

    }

    public function viewPoll()
    {
        $query = DB::table("payments")
            ->join("polls", "payments.poll_id","=", "polls.id")
            ->join("packages", "payments.package_id","=", "packages.id")
            ->where("payments.user_id","=", Session::get("userid"));

        $query->select("payments.*","polls.poll_title","polls.status AS poll_status","packages.packageName","packages.price")
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
