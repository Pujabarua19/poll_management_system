@extends('frontend.layouts.layout')
@section('content')
    
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover inner-page overlay" style="background-image:url('assets/images/orange.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
              <h1 class="font-secondar text-uppercase">Welcome to Poll Management System</h1>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover inner-page overlay" style="background-image: url('assets(a)/images/hero_2.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="font-secondary font-weight-bold text-uppercase">People's opinion matters</h1>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <div class="slant-1"></div>

    <div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade"> 
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Package Price</h2>
          </div>
        </div>
        <center>
       <div class="row">
           @if(\Illuminate\Support\Facades\Session::has("message"))
               <p style="color:red;">{{\Illuminate\Support\Facades\Session::get("message")}}</p>
           @endif
               @foreach($packages as $package)
                   <div class="container1">
                    <div class="box">
                      <div class="icon1">  
                        </div>
                      <div class="content">
                       
                        <h4>{{$package->packageName}}</h4><br>
                        <p>Quantity :{{$package->quantity}}<br>
                         Price: {{$package->price}}
                        </p>
                  <!--   <button type="button" class="btn btn-primary  Valid" onclick="addPackage({{ $package->id }})">Select Package</button> -->
                        <br>
                      <a href="{{url('add-poll',['pkg' => $package->id])}}">Select Package</a>

                    </div>
                  
                    </div> 

                </div>
                @endforeach
                </div>

                <input type="hidden" name="package_id" id="selectedPackage">
            

      </div>
    </div>
</center>
    
  <div class="site-half">
    <div class="img-bg-1" style="background-image: url('assets(a)/images/img_1.jpg');" data-aos="fade"></div>
    <div class="container">
      <div class="row no-gutters align-items-stretch">
        <div class="col-lg-5 ml-lg-auto py-5">
          <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
          <h2 class="site-section-heading text-uppercase font-secondary mb-5">Clean Design</h2>
          <p>Poll Management System (PMS) is a web-enabled application that facilitates creating, managing and publishing professional surveys and collecting feedback to provide assistance in business decision making process.

             </p>

            
        </div>
      </div>
    </div>
  </div>

  <div class="site-half block">
    <div class="img-bg-1 right" style="background-image: url('assets(a)/images/img_4.jpg');" data-aos="fade"></div>
    <div class="container">
      <div class="row no-gutters align-items-stretch">
        <div class="col-lg-5 mr-lg-auto py-5">
          <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
          <h2 class="site-section-heading text-uppercase font-secondary mb-5"></h2>
          <p>Violet Poll Management System allows effective management of surveys to help an organization know the opinion of their audience on various aspects like company policies, facilities, leadership, etc. It simplifies the process of creating, analysing and deploying questionnaire and surveys and generates reports for business analysis. It provides detailed information and statistical data based on the surveys filled by the users.

              </p>

         
        </div>
      </div>
    </div>
  </div>
    

<div class="site-half block">
    <div class="img-bg-1 right" style="background-image: url('assets(a)/images/img_5.jpg');" data-aos="fade"></div>
    <div class="container">
      <div class="row no-gutters align-items-stretch">
        <div class="col-lg-5 mr-lg-auto py-5">
          <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
          <h2 class="site-section-heading text-uppercase font-secondary mb-5">Benefits</h2>
          <li>Easy to Create</li>
          <li>Maintains Confidentiality</li>
          <li>Enables Quick Survey Distribution</li>
          <li>Sends questionnaire and Reminders</li>
          <li>Provides useful Reporting</li>
        </div>
      </div>
    </div>
  </div>

    
  <!--   <div class="py-5 bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center mb-3 mb-md-0">
            <h2 class="text-uppercase text-white mb-4" data-aos="fade-up">Try For Your Next Project</h2>
            <a href="#" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">Contact Us</a>
          </div>
        </div>
      </div>
    </div> -->

@stop
    

  

  