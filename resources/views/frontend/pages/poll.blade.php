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
                            <h5 class="card-title">{{strip_tags($poll->poll_title)}}</h5>
                            @if($poll->answers->count() > 0)
                                <form action="{{route("user.vote")}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="poll_id" value="{{$poll->id}}">
                                    <input type="hidden" name="option_type" value="{{$poll->option_type}}">
                                    {!! \App\Helper\Helper::buildAns($poll) !!}
                                    <button type="submit" name="vote" class="btn btn-primary">Vote</button>
                                </form>
                                <br/>
                                <h6>Total Vote <span class="badge badge-secondary">{{\App\Helper\Helper::getTotalVote($poll)}}</span></h6>
                                <hr/>
                                {!!  \App\Helper\Helper::getSingleVote($poll) !!}
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
    

  

  