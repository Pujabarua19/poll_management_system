<?php

namespace App\Http\Controllers;

use App\Register;
use App\Package;
use Illuminate\Http\Request;
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
                'date_of_birth' => trim(strip_tags($request->date_of_birth)),
                'password' => Hash::make(trim(strip_tags($request->password))),
            ]);

        if($isInserted)
            return redirect()->back()->with('message', 'successfully Inserted.');
        else
            return redirect()->back()->with('message', 'Insertion failed. due to server disconnection');
    }


    public function userLoginStore(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => 'required|email','password' => 'required|min:8']);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only(["email"]))->withErrors($validator);
        }

        if ($this->attempt($request)){
            if(Session::has("pkg"))
                return redirect()->route("poll.add",['pkg' => Session::get("pkg")]);
            else
                return redirect()->route("user.polls");
        } else {
            return redirect()->back()->with('message', 'invalid password or email.');
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
