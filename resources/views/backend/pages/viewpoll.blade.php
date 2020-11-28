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
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Poll Title</th>
                                            <th>Package</th>
                                            <th>Amount</th>
                                            <th>Order Date</th>
                                            <th>Pay. Status</th>
                                            <th>Poll Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($payments))
                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td>{{$payment->poll_title}}</td>
                                                    <td>{{$payment->packageName}}</td>
                                                    <td>{{$payment->price}}</td>
                                                    <td>{{$payment->created_at}}</td>
                                                    <td class="{{$payment->payment_status == "succeeded" ? 'text-success' : 'text-info'}}">{{$payment->payment_status}}</td>
                                                    <td class="{{$payment->poll_status == "approved" ? 'text-success' : 'text-info'}}">{{$payment->poll_status}}</td>
                                                    <td>
                                                        @if($payment->payment_status == "succeeded" && $payment->poll_status != "approved")
                                                            <a class="btn btn-primary" href="{{url("/poll-approved/{$payment->poll_id}")}}">Approve Poll</a>
                                                        @endif
{{--                                                        @if($payment->payment_status == "succeeded" && $payment->poll_status == "approved")--}}
{{--                                                            <a class="btn btn-primary">View Poll</a>--}}
{{--                                                        @endif--}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>Not any poll Requested yet !</p>
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