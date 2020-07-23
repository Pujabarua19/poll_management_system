@extends('backend.layouts.default')
@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<section class="content">
    <div class="block-header">
      <div class="header"> 
      </div> 
    </div>
    <div class="container-fluid">
        <!-- Basic Example | Horizontal Layout -->
        
     
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    
                    <div class="body">
                        <form id="wizard_with_validation" method="POST">
                            <!-- <div id="wizard_horizontal"> -->
                            <h3>Step 1</h3>
                            <fieldset>
                                <h4> </h4>
                                <div class="form-group form-float">
                                    <label for="sel1">Enter Title:</label>
                                       <input type="text" class="form-control" id="sel1">
                                     </div>
                                     <div class="form-group">
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
                                    <label for="sel1">Enter Title:</label>
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
                                         <option>Input </option>
                                       </select>  
                                </div>
                              
                            </fieldset>
                           
                             <h3>Step 2</h3>
                            <fieldset>
                                <div class="form-group form-float">
                                      <section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center"></h5>
            <h6 class="card-price text-center"><span class="period"></span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span></li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span></li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span></li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span></li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">select package</a>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center"></h5>
            <h6 class="card-price text-center"><span class="period"></span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong></strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span></li>
              <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span></li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">select package</a>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
       <!--  <div class="card">
          <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
            <h6 class="card-price text-center">$49<span class="period">/month</span></h6>
            <hr>
            <ul class="fa-ul">
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited Users</strong></li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private Projects</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone Support</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>Unlimited</strong> Free Subdomains</li>
              <li><span class="fa-li"><i class="fas fa-check"></i></span>Monthly Status Reports</li>
            </ul>
            <a href="#" class="btn btn-block btn-primary text-uppercase">Select Package</a>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>
                                </div>
                               </fieldset>
                                <h3>step 3</h3>
                            <fieldset>
                                <div class="form-group form-float">
                                   <label>Manage filter</label>
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

                               
                               
                            </fieldset>
                             <h3>step 4</h3>
                            <fieldset>
                                <div class="form-group form-float">
                                   <label>Select Payment</label>
                                
<div class="container">
    <div class="row">
        <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-12 col-md-8">
        
        
            <!-- CREDIT CARD FORM STARTS HERE -->
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
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
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
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
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
                                        required
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
            <!-- CREDIT CARD FORM ENDS HERE -->
            
            
        </div>            
        
       
                                

                               
                               
                            </fieldset>
                           <!--  <h3>Terms & Conditions - Finish</h3>
                            <fieldset>
                                <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                            </fieldset> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Advanced Form Example With Validation --> 
    </div>
</section>

@stop