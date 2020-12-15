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
                            <h2>All Requested Poll</h2>
                        </div>
                        <div class="body">
                            @if(\Illuminate\Support\Facades\Session::has('message'))
                                <div class="alert alert-success">
                                    {{\Illuminate\Support\Facades\Session::get('message')}}
                                </div>
                            @endif
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Poll Title</th>
                                        <th>Package</th>
                                        <th>Amount</th>
                                        <th>Order Date</th>
                                        <!-- <th>age</th> -->
                                        <th>Pay. Status</th>
                                        <th>Poll Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($payments->count() > 0)
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{$payment->poll_title}}</td>
                                                <td>{{$payment->packageName}}</td>
                                                <td>{{$payment->price}}</td>
                                                <td>{{$payment->created_at}}</td>
                                                <td style="font-weight: bold; font-style: italic" class="{{$payment->payment_status == "succeeded" ? 'text-success' : 'text-warning'}}">{{$payment->payment_status == "succeeded" ? 'Paid' : 'Un-Paid'}}</td>
                                                <td style="font-weight: bold; font-style: italic" class="{{\App\Helper\Helper::getPollStatusClass($payment->poll_status)}}">{{$payment->poll_status == "pending" ? 'Waiting' : $payment->poll_status}}</td>
                                                <td>
                                                    @if($payment->poll_status == "pending")
                                                        <a class="btn btn-small btn-info"
                                                           href="{{url("/poll-change/{$payment->poll_id}/1")}}">Approve</a>
                                                    @elseif($payment->payment_status == "succeeded" && ($payment->poll_status == "approved" || $payment->poll_status == "rejected"))
                                                        <a class="btn btn-small btn-primary"
                                                           href="{{url("/poll-change/{$payment->poll_id}/2")}}">{{$payment->poll_status == "rejected" ? 'Re-Publish' : 'Publish'}}</a>
                                                    @elseif($payment->poll_status == "published")
                                                        <a class="btn btn-small btn-danger"
                                                           href="{{url("/poll-change/{$payment->poll_id}/3")}}">Reject</a>
                                                    @endif
                                                        <a class="btn btn-small btn-primary"
                                                           href="{{url("/poll-details/{$payment->poll_id}")}}">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-danger">Not any poll Requested yet !</p>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop