@extends('frontend.layouts.auth')

@section('title', 'Poll - sign up')

@section('main-content')
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"></div>
                        <h1>poll Management System</h1>
                        
                    </div>                        
                </div>
                <form class="col-lg-12" id="submit" method="POST"  action="{{ URL::to('register-store')}}" onsubmit="if(document.getElementById('terms').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }"

>
                 {{csrf_field()}}
                    <h5 class="title">Register</h5>
                     <br>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                    {{Session::get('message')}}
                    </div>
                    @endif 
                    <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"  id="firstName" name="firstName" required="firstName">
                                <label class="form-label"> First Name</label>
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="lastName" name="lastName" required="lastName">
                                <label class="form-label">Last Name</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="location" name="location" required="location">
                                <label class="form-label">Location</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" id="email" name="email" required="email">
                                <label class="form-label">Email Address</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" id="password" name="password" required="password">
                                <label class="form-label"> Password</label>
                            </div>
                        </div>
                       <!--  <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control">
                                <label class="form-label">Confirm Password</label>
                            </div>
                        </div> -->
                    <div>
                        <input type="checkbox" name="terms"  id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>  
                    <div class="col-lg-12">
                    <button type="submit" class="btn btn-raised btn-primary" >SIGN UP
                   </button>
                    <a href="{{ url('/user-login') }}"  class="btn btn-raised btn-default waves-effect">SIGN IN</a>
                </div>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                </div>  

                </form>
                             
            </div>
        </div>
    </div>
@endsection


