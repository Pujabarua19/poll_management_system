<!DOCTYPE html>
<html>
<head>
    <title>POll</title>
    <link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap'>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="{{asset('asset1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset1/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/package1.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h5>{{\Illuminate\Support\Facades\Session::get('user_firstname')}} {{\Illuminate\Support\Facades\Session::get('user_lastname')}}</h5>
        <ul>
            <li><a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-envelope-open"></i>{{\Illuminate\Support\Facades\Session::get('user_email')}}</a></li>
            <li><a href="#"><i class="fas fa-location-arrow"></i>{{\Illuminate\Support\Facades\Session::get('user_location')}}</a></li>
            <li><a href="" onclick="document.getElementById('logout').submit(); return false;"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
            <li><a href="{{ url('/stripe') }}"><i class="fas fa-sign-out-alt"></i></i>Payment</a></li>
            <li><a><i class="fas fa-sign-out-alt"></i></i>My Poll</a></li>
            <form id="logout" method="post" action="{{ \Illuminate\Support\Facades\URL::to('/user-logout') }}">
                {{csrf_field()}}
            </form>
        </ul>
    </div>
    <div class="main_content">
        <div class="header">Welcome!! Have a nice day.</div>
        <div class="info">
      <!-- wizard from started     -->
        <div class="container">
            <a class="btn btn-primary pull-right" href="{{route("home.index")}}">+Create Poll</a>
            <h2><strong>My Poll</strong></h2>
            <div class="table-responsive">
                <table class="table">
                <thead>
                <tr>
                    <th>Poll Title</th>
                    <th>Package</th>
                    <th>Amount</th>
                    <th>Order Date</th>
                    <th>Pay.Status</th>
                    <th>Poll Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($payments->count() > 0)
                    @foreach($payments as $payment)
                        <tr>
                         <td>{{$payment->poll_title}}</td>
                         <td>{{$payment->packageName}}</td>
                         <td>{{$payment->price}}</td>
                         <td>{{$payment->created_at}}</td>
                         <td style="font-weight: bold; font-style: italic" class="{{$payment->payment_status == "succeeded" ? 'text-success' : 'text-info'}}">{{$payment->payment_status == "succeeded" ? 'Paid' : 'Un-Paid'}}</td>
                         <td style="font-weight: bold; font-style: italic" class="{{\App\Helper\Helper::getPollStatusClass($payment->poll_status)}}">{{$payment->payment_status == "succeeded" && $payment->poll_status == "approved" ? "Publishing" : $payment->poll_status}}</td>
                         <td>
                            @if($payment->poll_status == "approved" && $payment->payment_status != "succeeded")
                                 <a class="btn btn-primary" href="{{url("/stripe/{$payment->package_id}/{$payment->poll_id}")}}">PayNow</a>
                            @endif
                        </td>
                        </tr>
                    @endforeach
                @else
                    <p class="text-danger">Not any poll created yet !</p>
                @endif
                </tbody>
            </table>
            </div>
         </div>
      </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>

