<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: poll_management_system Admin login::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
</head>

<style >
    body 
    {
        margin:  0 auto;
        background-image: URL("assets/images/profile-bg.jpg");
        background-repeat: no-repeat;
        background-size: 100% 900px;
    }
  </style> 
<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <h1>Poll Admin</h1>
                    </div>                        
                </div>
                <form class="col-lg-12" id="sign_in" method="post" action="{{ \Illuminate\Support\Facades\URL::to('login-store')}}">
                	 {{csrf_field()}}

                    <h5 class="title">Sign in to your Account</h5>
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
                            <input type="text" value="{{old("email")}}" class="form-control" required name="email" id="email" />
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" required name="password" id="password" />
                            <label class="form-label">Password</label>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-raised btn-primary" >SIGN IN
                       </button>
                        <!-- <a href="sign-up.html" class="btn btn-raised btn-default waves-effect">SIGN UP</a>    -->
                    </div>
                </form>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                    <br>
                </div>                    
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
</body>
</html>
