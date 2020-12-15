@extends('backend.layouts.default')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Poll Details</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <h4>Poll Info</h4>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Poll Title</th>
                                        <th>Option Num</th>
                                        <th>Option Type</th>
                                        <th>Order Date</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Location</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{$poll->poll_title}}</th>
                                        <th>{{$poll->option_num}}</th>
                                        <th>{{$poll->option_type}}</th>
                                        <th>{{$poll->created_at}}</th>
                                        <th>{{$poll->min_age}} - {{$poll->max_age}}</th>
                                        <th>{{$poll->gender}}</th>
                                        <th>{{$poll->location}}</th>
                                       <!--  <th class="{{\App\Helper\Helper::getPollStatusClass($poll->status)}}">{{$poll->status}}</th> -->
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <h4>Options: </h4>
                                <hr/>
                                    @if($poll->answers->count() > 0)
                                        @foreach($poll->answers as $ans)
                                            <p>{{$ans->ans_title}}</p>
                                        @endforeach
                                    @else
                                        <p class="text-danger">No any answer found !</p>
                                    @endif
                            </div>
                            <hr/>
                            @if($poll->user != null)
                                 <h4>User info:</h4>
                                 <p>User name: {{$poll->user->firstname}} {{$poll->user->lastname}}</p>
                                 <p>User email: {{$poll->user->email}}</p>
                                 <p>User location: {{$poll->user->location}}</p>
                            @endif
                            <hr/>
                            @if($poll->package != null)
                                <h4>Package info:</h4>
                                <p>Package name: {{$poll->package->packageName}}</p>
                                <p>Quantity: {{$poll->package->quantity}}</p>
                                 <p>Price: {{$poll->package->price}}</p>
                            @endif
                        </div>
                        <a href="{{route('admin.polls')}}"class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop