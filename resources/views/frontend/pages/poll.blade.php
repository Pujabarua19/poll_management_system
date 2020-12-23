@extends('frontend.layouts.layout')
@section('content')
    <div class="slant-1"></div>
    <div class="site-section first-section">
        <div class="container">
            @if(\Illuminate\Support\Facades\Session::has("message"))
                <p style="color:green;">{{\Illuminate\Support\Facades\Session::get("message")}}</p>
            @endif
            @if(\Illuminate\Support\Facades\Session::has("error"))
                <p style="color:red;">{{\Illuminate\Support\Facades\Session::get("error")}}</p>
            @endif
            <div class="row mb-5">
                <div class="col-md-12 text-center" data-aos="fade">
                    <h2 class="site-section-heading text-uppercase text-center font-secondary">Active Poll</h2>
                </div>
                @if($polls->count() > 0)
                    @foreach($polls as $poll)
                        <div class="col-sm-4 py-2">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body py-2">
                                    <h6 class="card-title text-info">
                                        @if($poll->option_type == 'checkbox')
                                            @php
                                                $diff = 0;
                                                $totalVote = intval(\App\Helper\Helper::getTotalVote($poll));
                                                $votePick = intval(\App\Helper\Helper::getCheckBoxVote($poll));
                                                if($totalVote - $votePick > 0){
                                                    $diff =  abs($totalVote - $votePick);
                                                }
                                                if($diff > 0)
                                                  $totalVote = abs($totalVote - $diff);
                                            @endphp
                                        @else
                                            @php
                                                $totalVote = \App\Helper\Helper::getTotalVote($poll)
                                            @endphp
                                        @endif
                                        Left: {{abs(intval($poll->package->quantity) - $totalVote )}} Vote available</h6>
                                    <h5 class="card-title">{{strip_tags($poll->poll_title)}}</h5>
                                    @if($poll->option_type == 'radio' || $poll->option_type == 'checkbox')
                                        @if($poll->answers->count() > 0 && $totalVote < intval($poll->package->quantity))
                                            <form action="{{route("user.vote.post")}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="poll_id" value="{{$poll->id}}">
                                                <input type="hidden" name="option_type" value="{{$poll->option_type}}">
                                                {!! \App\Helper\Helper::buildAns($poll) !!}
                                                @if(!in_array($poll->id, $votedIds))
                                                    <button type="submit" name="vote" class="btn btn-primary">Vote</button>
                                                @endif
                                            </form>
                                            <br/>
                                            <h6>Total Vote <span class="badge badge-secondary">{{$totalVote}}</span>
                                            </h6>
                                            <hr/>
                                            {!!  \App\Helper\Helper::getSingleVote($poll) !!}
                                        @else
                                            <p class="text-danger">Vote aren't accept more.</p>
                                            <h6>Total Vote <span class="badge badge-secondary">{{$totalVote}}</span>
                                            </h6>
                                        @endif
                                    @elseif($poll->option_type == 'textbox' || $poll->option_type == 'textarea')
                                        @if($poll->textanswers->count() > 0 && ($totalVote = \App\Helper\Helper::getTotalVote($poll)) < intval($poll->package->quantity))
                                            <form action="{{route("user.vote.post")}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="poll_id" value="{{$poll->id}}">
                                                <input type="hidden" name="option_type" value="{{$poll->option_type}}">
                                                {!! \App\Helper\Helper::buildAns($poll) !!}
                                                @if(!in_array($poll->id, $votedIds))
                                                    <button type="submit" name="vote" class="btn btn-primary">Post</button>
                                                @endif
                                            </form>
                                            <br/>
                                            <h6>Total Comment(s) <span
                                                        class="badge badge-secondary">{{\App\Helper\Helper::getTotalVote($poll)}}</span>
                                            </h6>
                                            <hr/>
                                        @else
                                            <p class="text-danger">Vote aren't accept more.</p>
                                            <h6>Total Comment(s): <span class="badge badge-secondary">{{$totalVote}}</span>
                                            </h6>
                                        @endif
                                        <div class="form-group" style="width: 250px;height:120px;overflow-y:scroll">
                                            @if($poll->textanswers->count() > 0 )
                                                <p>Comments: </p>
                                                @foreach($poll->textanswers as $comment)
                                                    <p>{{ $poll->option_type == 'textbox' && !empty($comment->short_ans) ? strip_tags($comment->short_ans) : ($poll->option_type == 'textarea' && !empty($comment->big_ans) ? strip_tags($comment->big_ans) : 'No Comments yet')}} <span class="badge badge-secondary">{{$comment->user->lastname}}</span></p>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row" style="width: 18rem;">
                        <div class="card-body py-2">
                            <h5 class="card-title">No any Poll for you</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </center>
@stop
    

  

  