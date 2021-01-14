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
                <center><h2>Package List
                <!-- <small class="text-muted">Welcome to Nexa Application</small> -->
                </h2>
                </center>
            </div>
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th data-breakpoints="sm xs">Id</th>
                                    <th>Package Name</th>
                                    <th data-breakpoints="sm xs">Quantity</th>
                                    <th data-breakpoints="sm xs">Price</th>
                                    <th data-breakpoints="sm xs">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @foreach($packages as $package) 
                                  <tr>
                                    <td>{{$package->id}} </td>
                                    <td>{{$package->packageName}} </td>
                                     <td>{{$package->quantity}} </td>
                                      <td>{{$package->price}} </td>
                                      <td>
                                          <a href="{{route('package.edit',$package->id) }}" class="btn btn-default waves-effect waves-float waves-green"><i class="zmdi zmdi-edit"></i></a>|
                                          <a href="{{route('package.delete',$package->id)}}" onclick="return confirm('Are you sure ?')" class="btn btn-default waves-effect waves-float waves-red"><i class="zmdi zmdi-delete"></i></a>
                                      </td>
                                  </tr>
{{--                                  <div id="{{$package->id}}" class="modal fade" role="dialog">--}}
{{--                                      <div class="modal-dialog">--}}
{{--                                          <div class="modal-content">--}}
{{--                                              <div class="modal-header">--}}
{{--                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                                                  <h4 class="modal-title">delete confirmation</h4>--}}
{{--                                              </div>--}}
{{--                                              <div class="modal-body">--}}
{{--                                                  <p>Are you sure you want to delete this?</p>--}}
{{--                                              </div>--}}
{{--                                              <div class="modal-footer">--}}
{{--                                                  <a href="{{route('package.delete',$package->id)}}" class="btn btn-default waves-effect m-r-20" >yes</a>--}}
{{--                                                  <button type="button" class="btn btn-default waves-effect m-r-20" data-dismiss="modal">Close</button>--}}
{{--                                              </div>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
{{--                                  </div>--}}
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