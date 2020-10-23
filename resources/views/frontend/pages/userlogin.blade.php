@extends('frontend.layouts.auth')

@section('title', 'Poll - singin')

@section('main-content')
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        
                        <h1>Poll User</h1>

                    </div>                        
                </div>
                <form class="col-lg-12" id="submit" method="get" action="{{ URL::to('userloginstore')}}">
                   {{csrf_field()}}

                    <h5 class="title">Sign in to your Account</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" required="email" name="email" id="email">
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" required="password" name="password" id="password">
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                                          
               
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-raised btn-primary" >SIGN IN
                   </button>
                    <a href="{{ url('/register') }}"  class="btn btn-raised btn-default waves-effect">SIGN UP</a>                        
                </div>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot-password.html">Forgot Password?</a>
                </div>                    
             </div>
           </div>
        </div>
     </div>
   <br>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                    {{Session::get('message')}}
                    </div>
                    @endif
 </form>

@endsection