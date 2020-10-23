@extends('backend.layouts.default')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
           
            <div class="col-lg-5 col-md-6 col-sm-12">
               
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">

                <div class="card product_item_list">
                    <div class="body table-responsive">
                         <div class="col-lg-7 col-md-6 col-sm-12">
                <center><h2> List
                <!-- <small class="text-muted">Welcome to Nexa Application</small> -->
                </h2>
                </center>
            </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th data-breakpoints="sm xs">Id</th>
                                    <th>poll title</th>
                                   
                                    
                                    <th data-breakpoints="sm xs">Number of option</th>
                                    <th data-breakpoints="sm xs">Type</th>
                                     <th data-breakpoints="sm xs">Options</th>
                                     <th data-breakpoints="sm xs">Package_id</th>
                                      <th data-breakpoints="sm xs">Age</th>
                                       <th data-breakpoints="sm xs">Gender</th>
                                        <th data-breakpoints="sm xs">Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach($addpolls as $addpolls) 
                                  <tr>
                                    <td>{{$addpolls->id}} </td>
                                    <td>{{$addpolls->poll_title}} </td>
                                     <td>{{$addpolls->option_num}} </td>
                                      <td>{{$addpolls->option_type}} </td>
                                       <td>{{$addpolls->options}} </td>
                                        <td>{{$addpolls->package_id}} </td>
                                        <td>{{$addpolls->age}} </td>
                                         <td>{{$addpolls->gender}} </td>
                                          <td>{{$addpolls->location}} </td>
                                                                     </tr>  

                                  @endforeach    
                            </tbody>
                        </table>
                    </div>        
                </div>
            </div>
        </div>
    </div>   
</section>

@stop