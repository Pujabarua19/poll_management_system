@extends('frontend.layouts.index')
@section('content')
<section>

<!-- <div class="main"> -->
 
<div class="container">
            <h2><strong>Create A Poll </strong></h2>
            <form method="POST" id="signup-form" class="signup-form">
                <h3>
                    <span class="title_text"> Manage Poll</span>
                </h3>
                <!-- <li> <a href="{{ url('/userlogin') }}">log out</a></li> -->
                <fieldset>
                    <div class="fieldset-content">
                        <div class="form-group">
                           <label for="sel1">Enter Title:</label>
                                       <input type="textarea" class="form-control" id="sel1">
                                     </div>
                                     <div class="form-group" class="col-sm-5">
                                      
                                       <label>Select Option Type:</label>
                                        <select class="form-control show-tick">
                                         <option>--Please select--</option>
                                         <option>Checkbox</option>
                                         <option>Radio Button</option>
                                         <option>Textbox</option>
                                         <option>Textarea</option>
                                       </select>
                                     </div>
                                      <div class="form-group form-float">
                                    <label for="sel1">Enter number of option:</label>
                                       <input type="text" class="form-control" id="sel1">
                                     </div>
                                      <div class="form-group form-float">
                                    <label for="sel1">Enter Title:</label>
                                       <input type="text" class="form-control" id="sel1">
                                     </div>

                                     <div class="form-group">
                                       <label >Select Additional Field:</label>
                                       <select class="form-control show-tick">
                                         <option>--Please select--</option>
                                         <option>Textarea</option>
                                         <option>Text </option>
                                       </select>  
                                </div>
                              
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
                            <section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-3">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Package name</h5>
            
            <hr>
            <ul class="fa-ul">
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li> -->
             <li><span class="fa-li"><i class="fas fa-check"></i></span>Quentity</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>price</li>
             
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">select package</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
     <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Package name</h5>
            
            <hr>
            <ul class="fa-ul">
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li> -->
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Quentity</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>price</li>
             
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Select Package</a>
          </div>
        </div>
      </div>
       
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Package name</h5>
            
            <hr>
            <ul class="fa-ul">
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li> -->
             <li><span class="fa-li"><i class="fas fa-check"></i></span>Quentity</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>price</li>
             
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Select Package</a>
          </div>
        </div>
      </div>




     
    </div>
  </div>
</section>
                        </div>
    
                        <!-- <div class="form-textarea">
                            <label for="about_us" class="form-label">About us</label>
                            <textarea name="about_us" id="about_us" placeholder="Who are you ..."></textarea>
                        </div> -->
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
                                        <select class="form-control show-tick">
                                         <option>--Please select--</option>
                                         <option>18-25</option>
                                         <option>26-35</option>
                                         <option>36-45</option>
                                         <option>above 45</option>
                                       </select>
                                     </div>
                                     <div class="form-group">
                                       <label ><strong>Select Gender: </strong></label>
                                       <select class="form-control show-tick">
                                         <option>--Please select--</option>
                                         <option>Male</option>
                                         <option>Female </option>
                                       </select>  
                                </div>
                                  <div class="form-group">
                                       <label ><strong>Select location: </strong></label>
                                       <select class="form-control show-tick">
                                         <option>--Please select--</option>
                                         <option>Chawkbazar</option>
                                         <option>Muradpur </option>
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
                 <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                          
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input type="tel" class="form-control" name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                       
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                       
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">COUPON CODE</label>
                                    <input type="text" class="form-control" name="couponCode" />
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="subscribe btn btn-success btn-lg btn-block" type="button">Start Subscription</button>
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



</div>

 </div>
                  </div>

                    <div class="fieldset-footer">
                        <span>Step 3 of 4</span>
                    </div>

                          
        </div>

    </div>
  </fieldset>
</form>
</section>
@stop