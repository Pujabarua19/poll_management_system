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
                <form class="col-lg-12" id="sign_in" method="get" action="{{ URL::to('loginstore')}}">
                	 {{csrf_field()}}

                    <h5 class="title">Sign in to your Account</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" required="email" name="email" id="email">
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" required="password" name="password" id="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                                          
               
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-raised btn-primary" >SIGN IN
                   </button>
                    <!-- <a href="sign-up.html" class="btn btn-raised btn-default waves-effect">SIGN UP</a>    -->                     
                </div>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                </div>                    
            </div>
        </div>
    </div>
</div>
<br>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                    {{Session::get('message')}}
                    </div>
                    @endif
 </form>

<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>    
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
</body>
</html>
