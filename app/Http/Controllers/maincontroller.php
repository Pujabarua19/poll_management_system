<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function default()
    {
        return view('backend.layouts.default');
    }

    public function login()
    {
        return view('backend.pages.login');
    }

    private function getLoginRule()
    {
        return [
            'email' => 'required|email|unique:registers,email',
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

        if ($validator->failed()) {
            return redirect()->route("admin.login")->withInput($request->only(["email"]));
        }

        if ($this->attempt($request)) {
            return redirect()->intended("admin.default");
        } else {
            return redirect()->back()->with('message', 'invalid password or email.');
        }
    }


    private function attempt(Request $request)
    {
        $email = strip_tags($request->input("email"));
        $password = strip_tags($request->input("password"));
        $user = User::where('email', '=', $email)->first();
        if ($user != null && Hash::check($password, $user->password)) {
            Session::put('userid', $user->id);
            Session::put('u_email', $user->email);
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

}
