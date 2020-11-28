<?php

namespace App\Http\Controllers;

use App\Poll;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $query->select("payments.*", "polls.poll_title", "polls.pay_status AS poll_status", "packages.packageName", "packages.price")
            ->orderBy("payments.created_at");
        $payments = $query->get();
        return view('backend.pages.viewpoll', compact('payments'));
    }

    public function approvedPoll($pollId = null)
    {
        if ($pollId != null && intval($pollId) > 0) {
            $poll = Poll::where('id', "=", intval($pollId))->where("pay_status", "=", "completed")->first();
            if ($poll != null) {
                $poll->pay_status = "approved";
                $poll->save();
                return redirect()->back()->with("message", "Poll Approved Successfully!");
            } else {
                return redirect()->back()->with("message", "Poll Not Actived");
            }
        } else {
            return redirect()->back()->with("message", "Invalid Poll id");
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
