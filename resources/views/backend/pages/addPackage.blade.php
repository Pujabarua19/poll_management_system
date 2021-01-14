@extends('backend.layouts.default')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2> ADD NEW PACKAGE</h2>
                    </div>
                    <div class="body">
                        <form id="addPackage" method="post" action={{ \Illuminate\Support\Facades\URL::to('/store-package') }}>
                            {{csrf_field()}}
                        <form class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="packageName"><strong>Package Name : </strong></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required=" text" id="packageName" class="form-control" name="packageName" placeholder="Enter Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="quantity"> <strong>Quantity : </strong></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="number" id="quantity"  name= "quantity" class="form-control" placeholder="Enter  Quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2"> <strong>Price : </strong></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="number" id="price" class="form-control" placeholder="Enter Price" name="price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect"> save</button>
                                </div>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-success">
      {{Session::get('message')}}
</div>
@endif
</section>
@stop