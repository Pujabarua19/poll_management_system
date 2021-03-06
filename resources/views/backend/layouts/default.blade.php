<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>::poll_management_system Admin Panel::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.css')}}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/blog.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">

<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    @yield("style", false);
</head>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">        
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <p>Please wait...</p>
      
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore Nexa..." />
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="#">POll MANAGEMENT SYSTEM</a>
        </div>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
            <li><a href="index.html" class="inbox-btn hidden-sm-down" data-close="true"><i class="zmdi zmdi-home"></i></a></li>
            <li class="dropdown menu-app hidden-sm-down"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-apps"></i> </a>
              
                    </li>
                </ul>
            </li>
        </ul>
      
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar"> 
    <!-- User Info -->
    <div class="user-info">
        <div class="image"> <img src="{{asset('assets/images/black.jpg')}}" width="48" height="48" alt="User" /> </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Admin</div>
            <div class="email">{{\Illuminate\Support\Facades\Session::get('a_email')}}</div>
             <div class="btn-group user-helper-dropdown"> <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu pull-right">
                    <li class="divider"></li>
                    <li><a href="#" onclick="document.getElementById('logout').submit(); return false;"><i class="material-icons">input</i>Sign Out</a></li>
                    <form id="logout" method="post" action="{{ \Illuminate\Support\Facades\URL::to('/logout') }}">
                        {{csrf_field()}}
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info --> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>                
            <li><a href="{{ url('/default') }}"><i class="zmdi zmdi-home"></i><span>Home</span> </a> </li>
                          
            
            <li class="header">Manu</li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label col-red"></i><span>Packages</span> </a>
                <ul class="ml-menu">
                   
                    <li><a href="{{ url('/add-package') }}">Add New</a> </li>
                     <li><a href="{{ url('/all-packages') }}">All Packages</a> </li>
                </ul>
                <!-- <li><a href="{{ url('/view-poll') }}" class="waves-effect waves-block"><i class="zmdi zmdi-label col-green"></i><span>View polls</span></a></li> -->
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label col-red"></i><span>Polls</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{ url('/all-poll') }}">All Polls</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu --> 
</aside>
<!-- Right Sidebar -->
<!-- <aside id="rightsidebar" class="right-sidebar">
 
 -->
<style >
    body 
    {
        margin:  0 auto;
        background-image: URL("assets/images/pic3.jpg");
        background-repeat: no-repeat;
        background-size: 100% 900px;
    }
  </style> 

    @yield('content')

<!-- Jquery Core Js --> 
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script> <!-- Jquery Validation Plugin Css -->
<script src="{{asset('assets/plugins/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->
<script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>
<!-- <script src="{{asset('assets/js/pages/payment/payment.js')}}"></script> -->
<!-- Custom Js --> 
 <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>


<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@yield("script", false);


<!--  --> 
</body>
</html>

