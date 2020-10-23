<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>@yield('title')</title>
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
        @yield('main-content')
    </div>
    <!-- Jquery Core Js --> 
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
    <script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
</body>
</html>
