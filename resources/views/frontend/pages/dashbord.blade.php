<!DOCTYPE html>
<html>
<head>
    <title>POll</title>
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap'>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="{{asset('asset1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/admin.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/_all-skins.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>{{\Illuminate\Support\Facades\Session::get('user_firstname')}} {{\Illuminate\Support\Facades\Session::get('user_lastname')}}</h2>
        <ul>
            <li><a href="{{ url('/dashbord') }}"><i class="fas fa-home"></i>Dashbord</a></li>
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="{{ url('/profile') }}"><i class="fas fa-sign-out-alt"></i></i>Profile</a></li>
            <li><a href="{{url('/poll')}}"><i class="fas fa-location-arrow"></i>Available Poll</a></li>
            <li><a href="{{url('/view-poll')}}"><i class="fas fa-location-arrow"></i>My Poll</a></li>
            <li><a href="" onclick="document.getElementById('logout').submit(); return false;"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
            <form id="logout" method="post" action="{{ \Illuminate\Support\Facades\URL::to('/user-logout') }}">
                {{csrf_field()}}
            </form>
        </ul>
    </div>
    <div class="main_content">
        <div class="info">
            <h6>Welcome {{\Illuminate\Support\Facades\Session::get("user_firstname")." ". \Illuminate\Support\Facades\Session::get("user_lastname")}}</h6>
            <!-- wizard from started     -->
            <div class="container">

                <div class="row" style="margin: 10px; padding: 50px">
                    <h4>Your Review</h4>
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner align-center">
                                    <h3>{{$totalPolls}}</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">All Poll <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner align-center">
                                    <h3>{{$approvedCount}}</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">All Approved polls<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner align-center">
                                    <h3>{{$publishedCount}}</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">All Published polls<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner align-center">
                                    <h3>{{$pendingCount}}</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">All Pending poll  <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner align-center">
                                    <h3>{{$rejectedCount}}</h3>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">All Rejected Poll <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                </div>
                </div>
            </div>
        </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>

