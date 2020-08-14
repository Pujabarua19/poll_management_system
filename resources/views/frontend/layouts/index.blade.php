
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Poll </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets(a)/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets(a)/css/bootstrap.min.css')}}">
   
    <link rel="stylesheet" href="{{asset('assets(a)/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/themify-icons.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets(a)/css/slick.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets(a)/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('asset1/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/package.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('asset1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/payment.css')}}">

</head>

<body class="body-bg">
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
             <p>please wait</p>  <!-- <img src="assets/img/logo/loder.jpg" alt=""> -->
            </div>
        </div>
    </div>
</div>
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                       <h1>Poll Management System</h1>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                      <nav>
                            <ul id="navigation">
                                <li><a href="{{ url('/index') }}">Home</a></li>
                                <li><a href="{{ url('/addpoll') }}">Poll</a></li>
                              
                                <li><a href="#">Login</a>
                                    <ul class="submenu">
                                <li><a href="{{ url('/register') }}">Register</a></li>
                                <li> <a href="{{ url('/userlogin') }}">log in</a></li>
                                        <!-- <li><a href="elements.html">Elements</a></li> -->
                                    </ul>
                                </li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>          
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
 
<main>
   
<div class="slider-area">
<div class="slider-active dot-style">
            <!-- Single Slider -->
    <div class="single-slider slider-height hero-overly d-flex align-items-center">
               
                <div class="container">
              
                @yield('content')
               
                   
                    </div>
                </div>
            </div>
 
          

 
</main>
 <footer>
   
   <div>
       <p>To evaluate the functions of a web-based poll management system</p>
   </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('assets(a)/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('assets(a)/js/vendor/jquery-1.12.4.min.js')}}"></script>
    
    <script src="{{asset('assets(a)/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('assets(a)/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('assets(a)/js/pages/payment/payment.js')}}"></script>
    <!-- <script src="{{asset('assets(a)/js/slick.min.js')}}"></script> -->
    <!-- One Page, Animated-HeadLin -->
    

    <!-- Nice-select, sticky -->
    <script src="{{asset('assets(a)/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets(a)/js/jquery.sticky.js')}}"></script>
    
    <!-- contact js -->
    <script src="{{asset('assets(a)/js/contact.js')}}"></script>
    <script src="{{asset('assets(a)/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets(a)/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets(a)/js/mail-script.js')}}"></script>
    <script src="{{asset('assets(a)/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->  
    <script src="{{asset('assets(a)/js/plugins.js')}}"></script>
    <script src="{{asset('assets(a)/js/main.js')}}"></script>
     <script src="{{asset('asset1/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset1/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('asset1/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('asset1/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('asset1/vendor/minimalist-picker/dobpicker.js')}}"></script>
    <script src="{{asset('asset1/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
    <script src="{{asset('asset1/js/main.js')}}"></script>






<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->

@yield('scripts')
    
</body>
</html>