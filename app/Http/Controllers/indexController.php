<?php

namespace App\Http\Controllers;

use App\Register;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller

{
    public function index()
    {
        $packages = Package::all();
        return view('frontend.layouts.index', compact('packages'));
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
        ];
    }

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), $this->getRegisterRule(), $this->getRegisterMessage());

        if ($validator->failed()) {
            return redirect()->back()->withInput($request->except(["password"]));
        }

        $isInserted = DB:: table('registers')->insert(
            [
                'firstname' => trim(strip_tags($request->firstName)),
                'lastname' => trim(strip_tags($request->lastName)),
                'location' => trim(strip_tags($request->location)),
                'email' => trim(strip_tags($request->email)),
                'password' => Hash::make(trim(strip_tags($request->password))),
            ]);

        if($isInserted)
            return redirect()->back()->with('message', 'successfully Inserted.');
        else
            return redirect()->back()->with('message', 'Insertion failed. due to server disconnection');
    }


    public function userLoginStore(Request $request)
    {

        $validator = Validator::make($request->all(), Arr::except($this->getRegisterRule(),
            ['firstname', 'lastname', 'location']));

        if ($validator->failed()) {
            return redirect()->back()->withInput($request->only(["email"]));
        }

        if ($this->attempt($request)) {
            if(Session::has("pkg"))
                return redirect()->route("poll.add",['pkg' => Session::get("pkg")]);
            else
                return redirect()->route("home.index");
        } else {
            return redirect()->back()->with('message', 'invalid password or email.');
        }

//        $email = $request->email;
//        $password = $request->password;
//
//        $userlogin = Register::where('email', '=', $email)
//            ->where('password', '=', $password)
//            ->first();
//
//        if ($userlogin) {
//            Session::put('userid', $userlogin->id);
//            Session::put('user_firstname', $userlogin->firstname);
//            Session::put('user_lastname', $userlogin->lastname);
//            Session::put('user_email', $userlogin->email);
//            Session::put('user_location', $userlogin->location);
//
//            return redirect('/addpoll');
//
//        } else {
//
//            return redirect('/userlogin')->with('message', 'invalid password or email.');
//        }

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
            return true;
        } else {
            return false;
        }
    }

    public function userLogout(Request $request){
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
