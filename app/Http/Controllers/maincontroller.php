<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Helper\Helper;
use App\Package;
use App\Poll;
use App\Register;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function default()
    {
        //calculate all
        $totalPolls = Poll::all()->count();
        $allMembers  = Register::all()->count();

        $totalIncome =DB::table("polls")
            ->join("payments","payments.poll_id","=", "polls.id")
            ->join("packages", "polls.package_id","=", "packages.id")
            ->where("payments.payment_status","=","succeeded")
            ->selectRaw("SUM(Packages.price) AS Total")->first()->Total;

        $allPollsByStatus = DB::table("polls")
            ->selectRaw("polls.status, COUNT(polls.id) as total_poll")
            ->groupBy("polls.status")
            ->get();

        $rejectedCount = $allPollsByStatus->where("status","=", "rejected")->first() != null ?$allPollsByStatus->where("status","=", "pending")->first()->total_poll : 0;
        $approvedCount = $allPollsByStatus->where("status","=", "approved")->first() != null ?  $allPollsByStatus->where("status","=", "approved")->first()->total_poll : 0;
        $publishedCount =$allPollsByStatus->where("status","=", "published")->first() != null ? $allPollsByStatus->where("status","=", "published")->first()->total_poll : 0;
        $pendingCount = $allPollsByStatus->where("status","=", "pending")->first() ? $allPollsByStatus->where("status","=", "pending")->first()->total_poll : 0;


        //calculate weekly data
        $weeklyTotalPolls = Poll::where("created_at",">=", Carbon::today()->subDays(7))->count();
        $weeklyTotalMember = Register::where("created_at",">=", Carbon::today()->subDays(7))->count();

        $weekTotalIncome = DB::table("polls")
            ->join("payments","payments.poll_id","=", "polls.id")
            ->join("packages", "polls.package_id","=", "packages.id")
            ->where("payments.payment_status","=","succeeded")
            ->where("polls.created_at",">=", Carbon::today()->subDays(7))
            ->selectRaw("SUM(Packages.price) AS Total")->first()->Total;

        $weeklyPollsByStatus = DB::table("polls")
            ->where("polls.created_at",">=", Carbon::today()->subDays(7))
            ->selectRaw("polls.status, COUNT(polls.id) as total_poll")
            ->orderByRaw("polls.created_at DESC")
            ->groupBy("polls.status")
            ->get();

        $weekRejectedCount = $weeklyPollsByStatus->where("status","=", "rejected")->first() != null ? $weeklyPollsByStatus->where("status","=", "rejected")->first()->total_poll : 0;
        $weekApprovedCount = $weeklyPollsByStatus->where("status","=", "approved")->first() != null ?  $weeklyPollsByStatus->where("status","=", "approved")->first()->total_poll : 0;
        $weekPublishedCount =$weeklyPollsByStatus->where("status","=", "published")->first() != null ? $weeklyPollsByStatus->where("status","=", "published")->first()->total_poll : 0;
        $weekPendingCount = $weeklyPollsByStatus->where("status","=", "pending")->first() ? $weeklyPollsByStatus->where("status","=", "pending")->first()->total_poll : 0;


        //calculate for today

        $todayTotalPolls = Poll::where("created_at","=", Carbon::today())->count();
        $lastTotalPolls = Poll::where("created_at","=", Carbon::today()->subDays(1))->count();


        $todayTotalIncome = DB::table("polls")
            ->join("payments","payments.poll_id","=", "polls.id")
            ->join("packages", "polls.package_id","=", "packages.id")
            ->where("payments.payment_status","=","succeeded")
            ->where("polls.created_at","=", Carbon::today())
            ->selectRaw("SUM(Packages.price) AS Total")->first()->Total;

        $todayPollsByStatus = DB::table("polls")
            ->where("polls.created_at","=", Carbon::today())
            ->selectRaw("polls.status, COUNT(polls.id) as total_poll")
            ->orderByRaw("polls.created_at DESC")
            ->groupBy("polls.status")
            ->get();

        $todayRejectedCount =  $todayPollsByStatus->where("status","=", "rejected")->first() != null ?  $todayPollsByStatus->where("status","=", "rejected")->first()->total_poll : 0;
        $todayApprovedCount =  $todayPollsByStatus->where("status","=", "approved")->first() != null ?   $todayPollsByStatus->where("status","=", "approved")->first()->total_poll : 0;
        $todayPublishedCount = $todayPollsByStatus->where("status","=", "published")->first() != null ?  $todayPollsByStatus->where("status","=", "published")->first()->total_poll : 0;
        $todayPendingCount =   $todayPollsByStatus->where("status","=", "pending")->first() ?  $todayPollsByStatus->where("status","=", "pending")->first()->total_poll : 0;

        //recent Active User
        $recentActiveUsers = DB::table("registers")
            ->whereDay("updated_at",date('d'))
            ->where("isLogin","=", 1)
            ->selectRaw("firstname, lastname, email, location, gender")
            ->orderByRaw("registers.updated_at DESC")
            ->get();

        //latest poll

        $latestPolls = DB::table("polls")
            ->join("packages","polls.package_id","=","packages.id")
            ->where("polls.created_at",">=", Carbon::today()->subDays(7))
            ->where("polls.status","!=", "rejected")
            ->selectRaw("polls.id, polls.poll_title, polls.status, polls.created_at, packages.price")
            ->orderByRaw("polls.created_at DESC")
            ->get();

        //Latest Member
        $latestUsers = DB::table("registers")
            ->where("created_at",">=", Carbon::today()->subDays(7))
            ->selectRaw("firstname, lastname, email, location, gender")
            ->orderByRaw("created_at DESC")
            ->get();


        //build chart data
        $allPolls = DB::table("polls")
            ->selectRaw("YEAR(created_at) year , monthname(created_at) AS month, status, COUNT(polls.id) as total_poll")
            ->whereYear("created_at", date("Y"))
            ->groupByRaw("status, month, year")
            ->get();

        //dd($allPolls);

        $chartData= array(
            'published' => [],
            'pending' => [],
            'approved' => [],
            'rejected' => [],
        );

        if(!empty($allPolls)){
            foreach ($allPolls as $poll){
                if($poll->status == "pending"){
                    $chartData['pending'][] = $poll->total_poll;
                }

                if($poll->status == "approved"){
                    $chartData['approved'][] = $poll->total_poll;
                }

                if($poll->status == "published"){
                    $chartData['published'][] = $poll->total_poll;
                }

                if($poll->status == "rejected"){
                    $chartData['rejected'][] = $poll->total_poll;
                }

            }
        }
        //$chartData['published'] = array_values($chartData['published']);

        //dd($chartData);

        return view('backend.pages.dashbord', compact('totalPolls','allPollsByStatus','rejectedCount','approvedCount','publishedCount','pendingCount','allMembers','totalIncome','weeklyTotalPolls','weeklyTotalMember','weekTotalIncome','weekRejectedCount','weekApprovedCount','weekPublishedCount','weekPendingCount','todayTotalPolls','lastTotalPolls','todayPendingCount','todayApprovedCount','todayRejectedCount','todayPublishedCount','todayTotalIncome','recentActiveUsers','latestPolls','latestUsers','chartData'));
    }

    public function login()
    {
        return view('backend.pages.login');
    }

    private function getLoginRule()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    private function getRuleMessage()
    {
        return [
            'email.unique' => 'Email already exist',
            'email.required' => 'Email required',
        ];
    }

    public function loginStore(Request $request)
    {
        $validator = Validator::make($request->all(), $this->getLoginRule(), $this->getRuleMessage());

        if ($validator->fails()) {
            return redirect()->route("admin.login")->withInput($request->only(["email"]))->withErrors($validator);
        }

        if ($this->attempt($request)) {
            return redirect()->route("admin.default");
        } else {
            return redirect()->back()->with('message', 'invalid password or email.');
        }
    }

    public function viewPoll()
    {
        $query = DB::table("payments")
            ->join("polls", "payments.poll_id", "=", "polls.id")
            ->join("packages", "payments.package_id", "=", "packages.id");

        $query->select("payments.*", "polls.poll_title","polls.status AS poll_status", "packages.packageName", "packages.price")
            ->orderBy("payments.created_at","DESC");
        $payments = $query->get();
        return view('backend.pages.viewpoll', compact('payments'));
    }

    public function changePoll($pollId = null, $status = null)
    {
        if ($pollId != null && intval($pollId) > 0 && $status != null && intval($status) > 0) {
            $poll = Poll::where('id', "=", intval($pollId))->first();
            if ($poll != null) {
                $status = Helper::getPollStatus(intval($status));
                $poll->status = $status ;
                $poll->save();
                return redirect()->back()->with("message", "Poll {$status} Successfully!");
            } else {
                return redirect()->back()->with("message", "Poll Not Actived");
            }
        } else {
            return redirect()->back()->with("message", "Invalid Poll id");
        }
    }

    public function detailsPoll($pollid){
        if(intval($pollid) > 0) {
            $poll = Poll::with("answers","textanswers","package","user")->where("polls.id", intval($pollid))->first();
            return view('backend.pages.details', compact('poll'));
        }else{
            return redirect()->back()->with("message", "Invalid id:{$pollid}");
        }
    }

    private function attempt(Request $request)
    {
        $email = strip_tags($request->input("email"));
        $password = strip_tags($request->input("password"));
        $user = User::where('email', '=', $email)->first();
        if ($user != null && Hash::check($password, $user->password)) {
            Session::put('a_id', $user->id);
            Session::put('a_email', $user->email);
            return true;
        } else {
            return false;
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route("admin.login");
    }

//switch($poll->status){
//case "published":
//if($chartData['published'] == null) {
//$chartData['published'] = new Chart();
//$chartData['published']->label = "Published";
//$chartData['published']->year = $poll->year;
//$chartData['published']->month = $poll->month;
//$chartData['published']->fillColor = "rgba(60,141,188,0.9)";
//$chartData['published']->pointColor = "#3b8bba";
//}
//$chartData['published']->data[] = $poll->total_poll ?? 0;
//break;
//case "pending":
//                        if($chartData['pending']  == null) {
//                            $chartData['pending'] = new Chart();
//                            $chartData['pending']->label = "Pending";
//                            $chartData['pending']->year = $poll->year;
//                            $chartData['pending']->month = $poll->month;
//                            $chartData['pending']->fillColor = "rgb(255,207,100)";
//                            $chartData['pending']->pointColor = "rgb(255,207,100)";
//                        }
//                       $chartData['pending']->data[] = $poll->total_poll ?? 0;
//                        break;
//                    case "approved":
//                        if($chartData['approved'] == null) {
//                            $chartData['approved'] = new Chart();
//                            $chartData['approved']->label ="Approved";
//                            $chartData['approved']->year = $poll->year;
//                            $chartData['approved']->month = $poll->month;
//                            $chartData['approved']->fillColor = "rgba(41,188,39,0.9)";
//                            $chartData['approved']->pointColor = "#29bc27";
//                        }
//                        $chartData['approved']->data[]= $poll->total_poll ?? 0;
//                        break;
//                    case "rejected":
//                        if($chartData['rejected'] == null) {
//                            $chartData['rejected'] = new Chart();
//                            $chartData['rejected']->label = "Rejected";
//                            $chartData['rejected']->year = $poll->year;
//                            $chartData['rejected']->month = $poll->month;
//                            $chartData['rejected']->fillColor = "rgba(255,68,48,0.9)";
//                            $chartData['rejected']->pointColor = "#ff4430";
//                        }
//                        $chartData['rejected']->data[] = $poll->total_poll ?? 0;
//                        break;
//                    default:
//                        break;
//                }
}
