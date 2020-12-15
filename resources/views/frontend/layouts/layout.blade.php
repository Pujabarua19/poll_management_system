<!DOCTYPE html>
<html lang="en">
<head>
    <title>POll Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets(a)/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('assets(a)/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets(a)/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('assets(a)/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{asset('assets(a)/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('assets(a)/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/package1.css')}}">

</head>
<body>

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="site-wrap">


    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

        <div class="container">
            <div class="site-navbar bg-light">
                <div class="row align-items-center">
                    <div class="col-2">

                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                          class="site-menu-toggle js-menu-toggle text-black"><span
                                                class="icon-menu h3"></span></a></div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li>
                                        <a href="{{url('/about')}}">About</a>

                                    </li>
                                <!-- <li><a href="{{url('/contact')}}">Contact</a></li> -->
                                    @if(empty(Session::get("user_email")))
                                        <li><a href="{{url('/user-login')}}">Login</a></li>
                                        <li><a href="{{url('/register')}}">Registration</a></li>
                                    @endif
                                    @if(Session::get("user_email"))
                                        <li class="has-children">
                                            <a href="about.html">{{\Illuminate\Support\Facades\Session::get('user_firstname')}} {{\Illuminate\Support\Facades\Session::get('user_lastname')}}</a>
                                            <ul class="dropdown arrow-top">
                                                 <li><a href="{{url('/view-poll')}}">Dashboard</a></li>
                                                <li><a href=""
                                                       onclick="document.getElementById('logout').submit(); return false;"><i
                                                                class="fas fa-sign-out-alt"></i></i>Logout</a></li>
                                                <form id="logout" method="post"
                                                      action="{{ \Illuminate\Support\Facades\URL::to('/user-logout') }}">
                                                    {{csrf_field()}}
                                                </form>
                                                @endif

                                            </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')


    <footer class="site-footer bg-dark">
        <div class="container">


            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3 class="footer-heading mb-4 text-white">About</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat
                        amet.</p>
                    <p><a href="#" class="btn btn-primary text-white px-4">Read More</a></p>
                </div>
                <div class="col-md-5 mb-4 mb-md-0 ml-auto">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3 class="footer-heading mb-4 text-white">Free Templates</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">HTML5 / CSS3</a></li>
                                <li><a href="#">Clean Design</a></li>
                                <li><a href="#">Responsive</a></li>
                                <li><a href="#">Multi Purpose Template</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4 text-white">Stay up to date</h3>
                            <form action="#" class="d-flex footer-subscribe">
                                <input type="text" class="form-control rounded-0" placeholder="Enter your email">
                                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-2">

                    <div class="row">
                        <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
                        <div class="col-md-12">
                            <p>
                                <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                                <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                                <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                                <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="icon-heart text-danger"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>


                </div>

            </div>
        </div>
    </footer>

</div>
<script src="{{asset('assets(a)/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets(a)/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets(a)/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets(a)/js/popper.min.js')}}"></script>
<script src="{{asset('assets(a)/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets(a)/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets(a)/js/jquery.stellar.min.js')}}"></script>

<script src="{{asset('assets(a)/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets(a)/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('assets(a)/js/aos.js')}}"></script>

<script src="{{asset('assets(a)/js/main.js')}}"></script>


</body>
</html>