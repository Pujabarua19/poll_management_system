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
            <li><a href="{{ url('/profile') }}"><i class="fas fa-sign-out-alt"></i></i>Profile</a></li>
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
                <h2><strong>Details</strong></h2>
                <div class="row" style="margin: 10px; padding: 50px">
                    @if($poll != null)
                        <div class="card align-center">
                            <div class="card-body">
                                <h4 class="card-title">Title:</h4>
                                <hr/>
                                <h5 class="card-title" style="padding: 10px">{{$poll->poll_title}}</h5>
                                <hr/>
                                <h4 class="card-text">Poll Options:</h4>
                                <div class="card-title" style="padding: 20px">
                                    @if($poll->option_type == 'radio' || $poll->option_type == 'checkbox')
                                    {!! \App\Helper\Helper::getSingleVote($poll, true ) !!}
                                    @elseif($poll->option_type == 'textbox' || $poll->option_type == 'textarea')
                                        @if($poll->textanswers->count() > 0 )
                                            <p>Comments: </p>
                                            @foreach($poll->textanswers as $comment)
                                                <p>{{ $poll->option_type == 'textbox' && !empty($comment->short_ans) ? strip_tags($comment->short_ans) : ($poll->option_type == 'textarea' && !empty($comment->big_ans) ? strip_tags($comment->big_ans) : 'No Comments yet')}} <span class="badge badge-secondary">{{$comment->user->lastname}}</span></p>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                                <hr/>
                                @if($poll->option_type == 'checkbox')
                                    @php
                                    $diff = 0;
                                    $total = intval(\App\Helper\Helper::getTotalVote($poll));
                                    $votePick = intval(\App\Helper\Helper::getCheckBoxVote($poll));
                                    if($total  > $votePick){
                                        $diff =  $total - $votePick;
                                        $total = abs($total - $diff);
                                    }elseif ($total < $votePick ){
                                         $diff =  $votePick - $total;
                                         $total = $total + $diff;
                                    }
                                    @endphp
                                @else
                                    @php
                                        $total = \App\Helper\Helper::getTotalVote($poll)
                                    @endphp
                                @endif
                                <h3 class="card-text">{{$poll->option_type == 'radio' || $poll->option_type == 'checkbox' ? 'Total Vote' : 'Total Comments'}}: {{$total}}</h3>
                                <h3 class="card-text">{{$poll->option_type == 'radio' || $poll->option_type == 'checkbox' ? 'Available Vote' : 'Available Comments'}}: {{intval($poll->package->quantity) - $total }}</h3>
                                <p class="card-text">Poll Type: {{$poll->option_type}}</p>
                                <p class="card-text">Poll Created: {{$poll->created_at}}</p>
                                <p class="card-text">Package : {{$poll->package->packageName}}</p>
                                <p class="card-text">Package Quantity : {{$poll->package->quantity}}</p>
                                <p class="card-text">Package Price : {{$poll->package->price}}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>

