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
                                @if($poll->option_type == 'radio' || $poll->option_type == 'checkbox')
                                    <h4>Options: </h4>
                                    {!! \App\Helper\Helper::getSingleVote($poll) !!}
                                @elseif($poll->option_type == 'textbox' || $poll->option_type == 'textarea')
                                    <p>Comments: </p>
                                    @if($poll->textanswers->count() > 0 )
                                        @foreach($poll->textanswers as $comment)
                                            <p>{{ $poll->option_type == 'textbox' && !empty($comment->short_ans) ? strip_tags($comment->short_ans) : ($poll->option_type == 'textarea' && !empty($comment->big_ans) ? strip_tags($comment->big_ans) : 'No Comments yet')}} <span class="badge badge-secondary">{{$comment->user->lastname}}</span></p>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <hr/>
                            @if($poll->option_type == 'checkbox')
                                @php
                                    $total = $poll->total_vote
                                @endphp
                            @else
                                @php
                                    $total = \App\Helper\Helper::getTotalVote($poll)
                                @endphp
                            @endif
                            @if(!empty($poll->location))
                              <h6>Vote Location(s): <span class="badge badge-primary">{{$poll->location}}</span>
                            @endif
                            @if(!empty($poll->gender))
                                <hr/>
                                <h6>Female Vote(s): <span class="badge badge-primary">{{\App\Helper\Helper::getVoteByGender($poll)['female'] ?? 'NA'}}</span>
                                <h6>Male Vote(s): <span class="badge badge-primary">{{\App\Helper\Helper::getVoteByGender($poll)['male'] ?? 'NA'}} </span>
                            @endif
                                    <h3 class="card-title text-info">
                                        {{$poll->option_type == 'textbox' || $poll->option_type == 'textarea' ? 'Give Comment' : 'Give Vote'}}: {{abs(intval($total))}} person(s)</h3>
                                    <h3 class="card-text">{{$poll->option_type == 'radio' || $poll->option_type == 'checkbox' ? 'Total Vote' : 'Total Comments'}}: {{$total}}</h3>
                                    <h3 class="card-text">{{$poll->option_type == 'radio' || $poll->option_type == 'checkbox' ? 'Available Vote' : 'Available Comments'}}: {{intval($poll->package->quantity) - $total }}</h3>
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