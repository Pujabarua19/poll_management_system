
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>:: poll-sign up::</title>
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
                        <div class="logo"></div>
                        <h1>poll Management System</h1>
                        
                    </div>                        
                </div>
    <form class="col-lg-12" id="submit" method="POST"  action="{{ URL::to('registerStore')}}">
        {{csrf_field()}}
                    <h5 class="title">Register</h5>
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
                    <div>
                         <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>  
                    <div class="col-lg-12">
                    <button type="submit" class="btn btn-raised btn-primary" >SIGN UP
                   </button>
                    <a href="{{ url('/userlogin') }}"  class="btn btn-raised btn-default waves-effect">SIGN IN</a>                        
                </div>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                </div>                        
                </form>
                             
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js --> 
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
</body>
</html>
