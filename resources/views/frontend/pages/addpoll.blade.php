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
{{--            <li><a href="#"><i class="fas fa-envelope-open"></i>{{\Illuminate\Support\Facades\Session::get('user_email')}}</a></li>--}}
{{--            <li><a href="#"><i class="fas fa-location-arrow"></i>{{\Illuminate\Support\Facades\Session::get('user_location')}}</a></li>--}}
            <li><a href="{{ url('/profile') }}"><i class="fas fa-sign-out-alt"></i></i>Profile</a></li>
            <li><a href="" onclick="document.getElementById('logout').submit(); return false;"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
            <li><a href="{{url('/poll')}}"><i class="fas fa-location-arrow"></i>Available Poll</a></li>
            <li><a href="{{ url('/view-poll') }}"><i class="fas fa-sign-out-alt"></i></i>My Poll</a></li>
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
      <h2><strong>Create A Poll </strong></h2>
      <form method="POST" id="signup-form" class="signup-form" action= "{{ \Illuminate\Support\Facades\URL::to('/store-poll') }}" >
         {{csrf_field()}}
         <!-- poll question step started -->
          <h3>
            <span class="title_text"> Manage Poll</span>
          </h3>
          <fieldset>
              <div class="fieldset-content">
                  @foreach($errors->all() as $error)
                      <p style="color:red">{{$error}}</p>
                  @endforeach
                  @if(\Illuminate\Support\Facades\Session::has("message"))
                      <p style="color: green;">{{\Illuminate\Support\Facades\Session::get("message")}}</p>
                  @endif
                  @if(\Illuminate\Support\Facades\Session::has("error"))
                      <p style="color: red;">{{\Illuminate\Support\Facades\Session::get("error")}}</p>
                  @endif
                  <div class="form-group" class="col-sm-5">
                      <label>Category:</label>
                      <select class="form-control show-tick" id="category" name="category[]" multiple="multiple" required>
                          <option value="">--Select category--</option>
                          @if(!empty($categorys))
                              @foreach($categorys as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                          @endif
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="poll_title">Enter Title:</label>
                      <input type="text" class="form-control" id="poll_title" name="poll_title">
                  </div>
                  <div class="form-group" class="col-sm-5">
                      <label>Option Type:</label>
                      <select class="form-control show-tick" id="option_type" name="option_type">
                          <option value="">--Please select--</option>
                          <option value="checkbox">Checkbox</option>
                          <option value="radio">Radio Button</option>
                          <option value="textbox">Textbox</option>
                          <option value="textarea">Textarea</option>
                      </select>
                  </div>
                  <div class="form-group form-float" id="section_poll_num">
                      <label for="sel1">No of Options:</label>
                      <select class="form-control show-tick" id="option_num" name="option_num" >
                        <option value="">--Please select--</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                  </div>

                  <div id="options" >
                  </div>
            </div>
              <div class="fieldset-footer">
                  <span>Step 1 of 2</span>
              </div>
          </fieldset>
          <!-- Package selection step started -->
                   <!-- manage filter step started -->
            <h3>
              <span class="title_text">Manage Filter</span>
          </h3>
          <fieldset>
              <div class="fieldset-content">
                  <div class="form-group">
                    <label><strong>Select Age: </strong></label>
                    <select class="form-control show-tick"  id="age" name="age">
                      <option value="">--Please select--</option>
                      <option value="18-25">18-25</option>
                      <option value="26-35">26-35</option>
                      <option value="36-45">36-45</option>
                      <option value="45-150">above 45</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label ><strong>Select Gender: </strong></label>
                      <select class="form-control show-tick" id="gender" name="gender">
                        <option value="">--Please select--</option>
                        <option value="male">Male</option>
                        <option value="female">Female </option>
                         <option value="other">Other </option>
                      </select>  
                  </div>
                  <div class="form-group">
                        <label ><strong>Select location: </strong></label>
                        <select class="form-control show-tick" id="location" name="location[]" multiple="multiple">
                          <option value="">--Please select--</option>
                          <option value="Chawkbazar">Chawkbazar</option>
                          <option value="Muradpur">Muradpur </option>
                        </select>  
                  </div>
              </div>
              <div class="fieldset-footer">
                  <span>Step 2 of 2</span>
              </div>
          </fieldset>
     </form>
  </div>
      </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('asset1/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset1/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('asset1/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
<script src="{{asset('asset1/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('asset1/vendor/minimalist-picker/dobpicker.js')}}"></script>
<script src="{{asset('asset1/vendor/jquery.pwstrength/jquery.pwstrength.js')}}"></script>
<script src="{{asset('asset1/js/main.js')}}"></script>
    
<script src="{{asset('assets/js/pages/payment/payment1.js')}}"></script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{asset('assets/js/option.js')}}"></script>


<!-- select package script -->
<!-- <script>
  function addPackage(package_id)
  {
    let package = package_id;
    document.getElementById('selectedPackage').value = package;
  }

</script>
 -->


@section('scripts')
<script>
  $("select").bsMultiSelect();
</script>
@stop


</body>

</html>

