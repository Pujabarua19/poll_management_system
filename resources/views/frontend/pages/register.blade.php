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
                <form class="col-lg-12" id="submit" method="POST"  action="{{ URL::to('register-store')}}" onsubmit="if(document.getElementById('terms').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                 {{csrf_field()}}
                    <h5 class="title">Register</h5>
                     <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('message'))
                        <div class="alert alert-success">
                        {{\Illuminate\Support\Facades\Session::get('message')}}
                        </div>
                    @endif 
                    <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control"  id="firstName" name="firstname" required>
                                <label class="form-label"> First Name</label>
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                                <label class="form-label">Last Name</label>
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="radio" name="gender" value="male" id="male" class="with-gap">
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="female" class="with-gap">
                                <label for="female" class="m-l-20">Female</label>
                            </div>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="location" name="location" required>
                                <label class="form-label">Location</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" class="form-control" id="email" name="email" required>
                                <label class="form-label">Email Address</label>
                            </div>
                        </div>
                         <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                <label class="form-label">Date of Birth</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" id="password" name="password" required>
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
                    <a class="" href="{{url('/forgot-pass')}}">Forgot Password?</a>
                </div>  

                </form>
                             
            </div>
        </div>
    </div>
@endsection


