<?php
namespace App\Http\Controllers;

use App\Mail\ChangeProfileMail;
use App\Mail\ForgotPasswordMail;
use App\Poll;
use App\Register;
use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class IndexController extends Controller
{

    public function default()
    {
        //calculate all
        $totalPolls = Poll::where("user_id", Session::get("userid"))->count();

        $allPollsByStatus = DB::table("polls")
            ->where("user_id", Session::get("userid"))
            ->selectRaw("polls.status, COUNT(polls.id) as total_poll")
            ->groupBy("polls.status")
            ->get();

        $rejectedCount = $allPollsByStatus->where("status","=", "rejected")->first() != null ?$allPollsByStatus->where("status","=", "pending")->first()->total_poll : 0;
        $approvedCount = $allPollsByStatus->where("status","=", "approved")->first() != null ?  $allPollsByStatus->where("status","=", "approved")->first()->total_poll : 0;
        $publishedCount =$allPollsByStatus->where("status","=", "published")->first() != null ? $allPollsByStatus->where("status","=", "published")->first()->total_poll : 0;
        $pendingCount = $allPollsByStatus->where("status","=", "pending")->first() ? $allPollsByStatus->where("status","=", "pending")->first()->total_poll : 0;

        $totalIncome = DB::table("polls")
            ->join("packages", "polls.package_id","=", "packages.id")
            ->join("payments","payments.poll_id","=", "polls.id")
            ->where("payments.payment_status","=","succeeded")
            ->where("polls.user_id","=",Session::get('userid'))
            ->selectRaw("SUM(Packages.price) AS Total")->first()->Total;

        return view('frontend.pages.dashbord', compact('totalPolls','rejectedCount','approvedCount','publishedCount','pendingCount','totalIncome'));
    }

    public function index()
    {
        $packages = Package::all();
        $popularCategories = DB::table("category_poll")
            ->join("polls","category_poll.poll_id","=","polls.id")
            ->join("categorys","category_poll.category_id","=","categorys.id")
            ->whereRaw("polls.total_vote > 0")
            ->selectRaw("categorys.id, categorys.name, SUM(polls.total_vote) AS total_vote, COUNT(polls.id) as total_poll")
            ->orderByRaw("total_vote DESC")
            ->groupBy("categorys.id","categorys.name")
            ->get();
        //dd($popularCategories);
        return view('frontend.layouts.index', compact('packages','popularCategories'));
    }

    public function allPoll(){
        $age = Session::get("user_age");
        try {
            $age = Carbon::now()->year - Carbon::parse($age)->year;
        } catch (\Exception $e) {
            return redirect()->back()->with("message", "Invalid Date");
        }
//        $q->where("gender","=", strtolower(Session::get("user_gender")))
//            ->orWhere("gender","")
//            ->where("min_age","<=" , intval($age))
//            ->where("max_age",">=" , intval($age))
         $polls = Poll::with("answers","textanswers","package")
//             ->join("packages","polls.package_id","packages.id")
             ->where("status","=","published")
             ->where("user_id","!=", intval(Session::get("userid")))
//             ->whereRaw("polls.total_vote < packages.quantity")
             ->orderBy("polls.created_at","DESC")->get();

        if($polls->count() > 0){
            $polls = $polls->filter(function ($poll){
                return $poll->package->quantity > $poll->total_vote;

            });
        }
        //dd($polls);
//             ->where(function($q) use($age){
//                 $q->whereRaw("`gender` ='". strtolower(Session::get("user_gender")."' OR `gender` IS NULL"))
//                     ->orWhereRaw("`min_age` <= ".intval($age) ." OR `min_age` IS NULL")
//                     ->orWhereRaw("`max_age` >=". intval($age)." OR `max_age` IS NULL");
//             })->orderBy("created_at","ASC")->get();

            if($polls->count() > 0){
                $polls = $polls->filter(function ($poll){
                    if(!empty($poll->gender)){
                        return ($poll->gender == strtolower(Session::get("user_gender")));
                    } else
                        return true;
                });
            }

            if($polls->count() > 0){
                $polls = $polls->filter(function ($poll) use($age){
                    if (!is_null($poll->min_age)){
                        return ($poll->min_age <= intval($age) && $poll->max_age >= intval($age));
                    }else
                        return true;
                });
            }

             if($polls->count() > 0){
                 $polls= $polls->filter(function ($poll){
                     if(!is_null($poll->location)) {
                         $pollLocations = explode(",", $poll->location);
                         return in_array(Session::get("user_location"), $pollLocations);
                     }else
                        return true;
                 });
             }

        //dd($polls);
         $votedIds = DB::table("user_vote")
                ->join("polls","user_vote.poll_id","=","polls.id")
                ->join("registers","user_vote.user_id","=","registers.id")
                ->where("registers.id","=",intval(Session::get("userid")))
                ->get()->pluck("poll_id")->toArray();

       //dd($votedIds);
        return view('frontend.pages.poll', compact('polls','votedIds'));
    }

    public function userLogin()
    {
        if(Session::get('user_email') != "")
            if(!empty(Session::get("pkg")))
                return redirect()->route("poll.add",['pkg' => intval(Session::get("pkg"))]);
            else{
                return redirect()->route("home.index")->with("message","You need to select at least one package");
            }
        return view('frontend.pages.userlogin');
    }

    public function forgotPassword(){
        return view('frontend.pages.forgot');
    }

    public function register()
    {
        return view('frontend.pages.register');
    }

    private function getRegisterRule()
    {
        return [
            'email' => 'required|email|unique:registers,email',
            'password' => 'required|min:8',
            'firstname' => 'required',
            'lastname' =>'required',
            'location' => 'required',
        ];

    }

    private function getRegisterMessage()
    {
        return [
            'email.unique' => 'Email already exist',
            'email.required' => 'Email is required',
            'firstname' => 'First name is required',
            'lastname' =>'Last name is required',
            'location' => 'Location is required',
            'date_of_birth' => 'date_of_birth is required'
        ];
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), $this->getRegisterRule(), $this->getRegisterMessage());

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->except(["password"]))->withErrors($validator);
        }

        $isInserted = DB:: table('registers')->insert(
            [
                'firstname' => trim(strip_tags($request->firstname)),
                'lastname' => trim(strip_tags($request->lastname)),
                'location' => trim(strip_tags($request->location)),
                'email' => trim(strip_tags($request->email)),
                'gender' => trim(strip_tags($request->gender)),
                'date_of_birth' => trim(strip_tags($request->date_of_birth)),
                'password' => Hash::make(trim(strip_tags($request->password))),
            ]);

        if($isInserted)
            return redirect()->back()->with('message', 'successfully Inserted.');
        else
            return redirect()->back()->with('message', 'Insertion failed. due to server disconnection');
    }

    public function generateOTP()
    {
        $OTP = rand(100000, 999999);
        return $OTP;
    }

    public function setCache($key, $opt, $time)
    {
        Cache::put($key, $opt, now()->addSeconds(60 * $time));
    }

    public function userLoginStore(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email','password' => 'required|min:8']);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only(["email"]))->withErrors($validator);
        }
        if ($this->attempt($request)){
            //dd($request->all());
            if(Session::has("pkg"))
                return redirect()->route("poll.add",['pkg' => Session::get("pkg")]);
            else
                return redirect()->route("user.default");
        } else {
            return redirect()->back()->with('message', 'invalid password or email.');
        }
    }

    public function forgotPasswordRequest(Request $request){
        $validator = Validator::make($request->all(), ['email' => 'required|email']);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only(["email"]))->withErrors($validator);
        }

        if (($user = $this->checkUser($request->input("email"))) != null){
            $token = $this->generateOTP();
            $email  = $user->email;
            $this->setCache("forgot-token", $token, 60);
            $this->setCache("forgot-email", $email, 60);
            try{
                Mail::to("mohammadeyasin@gmail.com")->send(new ForgotPasswordMail($email, $token));
                return redirect()->back()->with('message', 'Password notification send your email');
            } catch (\Exception $e) {
                //echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
                return redirect()->back()->with('message', 'invalid email.');
            }
        } else {
            return redirect()->back()->with('message', 'User not found');
        }
    }

    public function forgotPasswordRequestDep(Request $request){

        $validator = Validator::make($request->all(), ['email' => 'required|email']);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only(["email"]))->withErrors($validator);
        }

        if (($user = $this->checkUser($request)) != null){
            $token = $this->generateOTP();
            $email  = $user->email;
            $url = route("home.confirm.code",['code'=>$token,'token'=> Hash::make($email)]);
            $this->setCache("forgot-token", $token, 60);
            $this->setCache("forgot-email", $email, 60);
            $html ='<p>Please click to verify your email address. <a dir="ltr" id="iAccount" class="link" style="color:#2672ec; text-decoration:none" href="'. $url.'">Verify Email Address</a></p>'; //view("mail.forgot",compact('url'))->render();
            $mail = new PHPMailer(true);
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

                $mail->isSMTP();
                $mail->Host       ='smtp.gmail.com'; //'smtp.mailtrap.io';
                $mail->SMTPAuth   = true;
                $mail->Username ='baruapuja2020@gmail.com';
                $mail->Password ='kvwnctzfxnfwrkdy';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                //Recipients
                $mail->setFrom('noreplay@gmail.com', 'Poll Management');
                $mail->addAddress($email, $user->firstname.' '. $user->lastname);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Forgot Password';
                $mail->msgHTML(trim($html));
                $mail->AltBody = 'Forgot password verification mail';

                $mail->send();
                //echo "Message sent.:";

                return redirect()->back()->with('message', 'Password notification send your email');
            } catch (Exception $e) {
                //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                //return redirect()->back()->with('message', 'invalid email.');
            }

        } else {
            return redirect()->back()->with('message', 'invalid email.');
        }
    }

    public function changeProfile(Request $request){
       //dd($request->all());
        if($request->isMethod("POST")) {
            $rules = [];
            $authEmail = Session::get('user_email');

            if (!empty(($email = $request->get("email"))) && $email != $authEmail)
                $rules = array_merge($rules, ['email' => 'required|email|unique:registers,email']);

            if ($request->has("password") && !empty($request->get("password")))
                $rules = array_merge($rules, ['old_password' => 'required', 'password' => 'required|min:8', 'confirm_password' => 'required|same:password']);

            //dd($rules);
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withInput($request->only(["email"]))->withErrors($validator);
            }

            if (!empty($authEmail)
                    && ($user = $this->checkUser($authEmail)) != null
                    && Hash::check(trim(strip_tags($request->input("old_password"))), $user->password)) {

                $user->email = trim(strip_tags($request->input("email")));
                $newPassword = trim(strip_tags($request->input("old_password")));

                if (!empty($request->get("password"))) {
                    $newPassword = trim(strip_tags($request->input("password")));
                    $user->password = Hash::make($newPassword);
                }

                try {
                    $user->save();
                    Mail::to($email)->send(new ChangeProfileMail($user->email, $newPassword));
                    $request->session()->invalidate();
                    $request->session()->flush();
                    return redirect('/user-login')->with('message', 'Profile info change successfully');
                } catch (\Exception $e) {
                    //echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
                    return redirect()->back()->with('message', 'Profile info change not successfully');
                }
            } else {
                return redirect()->back()->with('message', 'User not found Or Password not match');
            }
        }else{
            return redirect()->back()->with('message', 'Invalid');
        }
    }

    public function verifyCode(Request $request){
        if($request->isMethod("post")){
            $validator = Validator::make($request->all(), ['email' => 'required|email','password' => 'required|min:8','c_password' => 'required|min:8|same:password']);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            if(($user = $this->checkUser($request)) != null){
                $user->password = Hash::make(trim(strip_tags($request->input("password"))));
                try{
                    $user->save();
                    Cache::forget("forgot-token");
                    Cache::forget("forgot-email");
                    return redirect("/user-login")->with("message","Password changed successfully");
                }catch (\Exception $exception){
                    return redirect()->back()->with("message","Password changed error");
                }
            }else{
                return redirect()->back()->with("error","Invalid user");
            }
        }
    }

    public function confirmPassword(Request $request){
        //dd($request->all());
        $email = trim(Cache::get("forgot-email"));
        $code = trim(Cache::get("forgot-token"));

        if(!Hash::check($email, trim(strip_tags($request->get("token"))))){
            abort(404,"Expired");
        }
        if(strip_tags(trim($request->get("code"))) != $code){
            abort(404,"Expired");
        }

        return view('frontend.pages.confirm',compact('email'));
    }

    private function checkUser($email)
    {
        $user = Register::where('email', '=', strip_tags($email))->first();
        if ($user != null && $user->email == $email) {
            return $user;
        } else {
            return null;
        }
    }

    private function attempt(Request $request)
    {
        $email = trim(strip_tags($request->input("email")));
        $password = trim(strip_tags($request->input("password")));
        $user = Register::where('email', '=', $email)->first();

        if ($user != null && Hash::check($password, $user->password)) {
            Session::put('userid', $user->id);
            Session::put('user_firstname', $user->firstname);
            Session::put('user_lastname', $user->lastname);
            Session::put('user_email', $user->email);
            Session::put('user_location', $user->location);
            Session::put('user_age', $user->date_of_birth);
            Session::put('user_gender', $user->gender);
            DB::table("registers")->where('email',"=", $email)->update([
                'isLogin'=>true
            ]);
            return true;
        } else {
            return false;
        }
    }

    public function profile(){
        return view('frontend.pages.profile');
    }

    public function userLogout(Request $request){
        $email =  Session::get('user_email');
        DB::table("registers")->where('email',"=", $email)->update([
            'isLogin'=> false
        ]);
        $request->session()->invalidate();
        $request->session()->flush();
        return redirect()->route("home.index");
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

}
      