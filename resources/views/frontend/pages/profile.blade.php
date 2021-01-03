<!DOCTYPE html>
<html>
<head>
    <title>POll</title>
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap'>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="{{asset('asset1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>{{\Illuminate\Support\Facades\Session::get('user_firstname')}} {{\Illuminate\Support\Facades\Session::get('user_lastname')}}</h2>
        <ul>
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a></li>
            <li><a><i class="fas fa-sign-out-alt"></i></i>Profile</a></li>
            <li><a href="{{url('/poll')}}"><i class="fas fa-location-arrow"></i>Available Poll</a></li>
            <li><a href="" onclick="document.getElementById('logout').submit(); return false;"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
            <form id="logout" method="post" action="{{ \Illuminate\Support\Facades\URL::to('/user-logout') }}">
                {{csrf_field()}}
            </form>
        </ul>
    </div>
    <div class="main_content">
        <div class="info">
            <!-- wizard from started     -->
            <div class="container">
                <h2><strong>User Details</strong></h2>
                <div class="row" style="margin: 10px; padding: 50px">
                        <div class="card align-center">
                            <div class="card-body">
                                <p class="card-text">First Name : <span style="font-weight: bold "> {{\Illuminate\Support\Facades\Session::get('user_firstname')}}</span></p>
                                <p class="card-text">Last Name : {{\Illuminate\Support\Facades\Session::get('user_lastname')}}</p>
                                <p class="card-text">Birth Date : {{\Illuminate\Support\Facades\Session::get('user_age')}}</p>
                                <p class="card-text">Location : {{\Illuminate\Support\Facades\Session::get('user_location')}}</p>
                                <p class="card-text">Gender : {{\Illuminate\Support\Facades\Session::get('user_gender')}}</p>
                            </div>
                            <div class="card-body">
                                <legend>Security Information</legend>
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
                                <form role="form" method="post" action="{{url('/change-profile')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{\Illuminate\Support\Facades\Session::get('user_email')}}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Old Password</label>
                                        <input type="password" class="form-control" name="old_password" id="old_password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" name="password" id="password" />
                                    </div>
                                    <div class="form-group">
                                        <label for="c_password">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" />
                                    </div>
                                    <div class="form-group" style="padding: 10px; margin-top: 10px">
                                        <div style="position: absolute; right: 0">
                                            <button type="submit" class="btn btn-primary">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>

