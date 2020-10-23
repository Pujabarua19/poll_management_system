<!DOCTYPE html>
<html>
<head>
  <title>POll</title>
<link rel="stylesheet" href="{{asset('assets/css/nav.css')}}">
<link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap'>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" href="{{asset('asset1/css/style.css')}}">
<!-- <link rel="stylesheet" href="{{asset('assets/css/payment.css')}}"> -->
<link rel="stylesheet" href="{{asset('asset1/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
 <link rel="stylesheet" href="{{asset('assets/css/package1.css')}}">
    <!-- Main css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>  
    

</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>{{session::get('user_firstname')}} {{session::get('user_lastname')}}</h2>
        <ul>
            <li><a href="{{ url('/index') }}"><i class="fas fa-home"></i>Home</a></li>
           
            <li><a href="#"><i class="fas fa-envelope-open"></i>{{session::get('user_email')}}</a></li>
            <li><a href="#"><i class="fas fa-location-arrow"></i>{{session::get('user_location')}}</a></li>
            <li><a href="{{ url('/userlogin') }}"><i class="fas fa-sign-out-alt"></i></i>Logout</a></li>
        </ul> 
       <!--  <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
      </div> -->
    </div>
    <div class="main_content">
        <div class="header">Welcome!! Have a nice day.</div>  
        <div class="info">
          
  <div class="container">
      <h2><strong>Create A Poll </strong></h2>
      <form method="POST" id="signup-form" class="signup-form" action= "{{ URL::to('/pollStore') }}" >
         {{csrf_field()}}
          <h3>
            <span class="title_text"> Manage Poll</span>
          </h3>
          <fieldset>
              <div class="fieldset-content">
                  <div class="form-group">
                      <label for="poll_title">Enter Title:</label>
                      <input type="textarea" class="form-control" id="poll_title" name="poll_title">
                  </div>
                  <div class="form-group form-float">
                      <label for="sel1">No of Options:</label>
                      <select class="form-control show-tick" id="option_num" name="option_num">
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
                  <div class="form-group" class="col-sm-5" id="section_poll_type">
                      <label>Option Type:</label>
                      <select class="form-control show-tick" id="option_type" name="option_type">
                        <option>--Please select--</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="radio">Radio Button</option>
                        <option value="textbox">Textbox</option>
                        <option value="textarea">Textarea</option>
                      </select>
                  </div>

                  <div id="options" >
                  
                  </div>
                  
                  
                  <!-- <div class="form-group" id="options"> 
                  </div> -->
                  
                  

                  <!-- <div class="form-group">
                    <label >Select Additional Field:</label>
                    <select class="form-control show-tick">
                      <option>--Please select--</option>
                      <option>Textarea</option>
                      <option>Text </option>
                    </select>  
                  </div>      -->
                  
              </div>
              <div class="fieldset-footer">
                  <span>Step 1 of 4</span>
              </div>
          </fieldset>
          <h3>
            <span class="title_text">Choose Package</span>
          </h3>
          <fieldset>
          
             <div class="fieldset-content">
             
                <div class="form-group">
               @foreach($packages as $package)
                   <div class="container1">
                    <div class="box">
                      <div class="icon1">  
              </div>
                      <div class="content">
                       
                        <h4>{{$package->packageName}}</h4>
                        <p>Quantity :{{$package->quantity}}<br>
                         Price: {{$package->price}}
                        </p>
                    <button type="button" class="btn btn-primary  Valid" onclick="addPackage({{ $package->id }})">Select Package</button>

                      <!-- <a id="package_id">Select Package</a> -->

                    </div>
                  
                    </div> 

                </div>
                @endforeach
                </div>

                <input type="hidden" name="package_id" id="selectedPackage">
            </div>

            <div class="fieldset-footer">
                <span>Step 2 of 4</span>
            </div>
          </fieldset>
            <h3>
              <span class="title_text">Manage Filter</span>
          </h3>
          <fieldset>
              <div class="fieldset-content">
                  <div class="form-group">
                    <label><strong>Select Age: </strong></label>
                    <select class="form-control show-tick"  id="age" name="age">
                      <option>--Please select--</option>
                      <option value="18-25">18-25</option>
                      <option value="26-35">26-35</option>
                      <option value="36-45">36-45</option>
                      <option value="above 45">above 45</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label ><strong>Select Gender: </strong></label>
                      <select class="form-control show-tick" id="gender" name="gender">
                        <option>--Please select--</option>
                        <option value="male">Male</option>
                        <option value="female">Female </option>
                         <option value="other">Other </option>
                      </select>  
                  </div>
                  <div class="form-group">
                        <label ><strong>Select location: </strong></label>
                        <select class="form-control show-tick" id="location" name="location">
                          <option>--Please select--</option>
                          <option value="Chawkbazar">Chawkbazar</option>
                          <option value="Muradpur">Muradpur </option>
                        </select>  
                  </div>
              </div>
              <div class="fieldset-footer">
                  <span>Step 3 of 4</span>
              </div>
          </fieldset>
          <h3>
            <span class="title_text">Select Payment</span>
          </h3>
      <fieldset>
              <div class="fieldset-content">
                  <div class="form-group">
                    
                        
  
<div class="container">
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h2 class="panel-title display-td" >Payment Details</h2>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                  <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                    id="payment-form">
                       {{csrf_field()}}
  
                        <div class='form-row1 row1'>

                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row1 row1'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row1 row1'>
                            <div class='col-xs-2 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='8'
                                    type='text'>
                            </div>
                            <div class='col-xs-2 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-2 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='8'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row1 row1'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row1">
                            <div class="col-xs-12">
                      <button class="btn btn-success btn-lg btn-block" id="payment-form" type="submit" ">start subscription </button>
                      <!-- <input type="button" name="submit" id="submit" value="pay" ></input> -->
                            </div>
                        </div>
                          
                    </form>
                  <!--  <script type="text/javascript">
 
$(document).ready(function(){
  $("#payment-form").submit(function(event){
    
    alert(test);
  })
})
</script> -->



                </div>
            </div>        
        </div>
    </div>
      
<!-- </div> -->
  

                  
                    </div>
                  </div>
              </div>
              <div class="fieldset-footer">
                  <span>Step 3 of 4</span>
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

<script>
  function addPackage(package_id)
  {
    let package = package_id;
    document.getElementById('selectedPackage').value = package;
  }

</script>
<!-- 
<script type="text/javascript">
 
$(document).ready(function(){
  $("#payment-form").submit(function(event){
    
    alert(test);
  })
  // var postdata=$("#payment-form").serialize();
  // $.post("stripe.post", postdata,function(response){
  //   $("#resp").show().html("submited");
  // })
  //  return false;
  // })
})
</script> -->




</body>

</html>

