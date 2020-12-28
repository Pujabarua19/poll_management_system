@extends('frontend.layouts.auth')

@section('title', 'Poll - singin')

@section('main-content')
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <h1>New Password</h1>
                    </div>
                    <br>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('message'))
                    <div class="alert alert-success">
                        {{\Illuminate\Support\Facades\Session::get('message')}}
                    </div>
                @endif
                <form class="col-lg-12" id="submit" method="post" action="{{ \Illuminate\Support\Facades\URL::to('verify')}}">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$email}}" name="email"/>
{{--                    <div class="form-group form-float">--}}
{{--                        <div class="form-line">--}}
{{--                            <input type="password" class="form-control" value=""  name="old_password" id="o_password">--}}
{{--                            <label class="form-label">Old Password</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" value="" name="password" id="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" value=""  name="c_password" id="c_password">
                            <label class="form-label">Confirm Password</label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-raised btn-primary" >Change</button>
                    </div>
                </form>

                <div class="col-lg-12 m-t-20">
                    <a style="margin:10px" href="{{ url('/register') }}"  class="btn btn-raised btn-default waves-effect">SIGN UP</a>
                    <a href="{{ url('/user-login') }}"  class="btn btn-raised btn-default waves-effect">SIGN IN</a>
                </div>
             </div>
           </div>
        </div>
     </div>
   <br>



@endsection