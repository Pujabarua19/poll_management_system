@extends('backend.layouts.default')
@section("style")
    <link rel="stylesheet" href="{{asset('assets/css/admin.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/_all-skins.css')}}">
@endsection
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
                            <h2>Welcome Admin</h2>
                        </div>
                        <div class="body">
                            @if(\Illuminate\Support\Facades\Session::has('message'))
                                <div class="alert alert-success">
                                    {{\Illuminate\Support\Facades\Session::get('message')}}
                                </div>
                            @endif
                                <h3>Total Review</h3>
                                <div class="row">
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner align-center">
                                                <h3>{{$totalPolls}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">All Poll <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-green">
                                            <div class="inner align-center">
                                                <h3>{{$approvedCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">All Approved polls<i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner align-center">
                                                <h3>{{$publishedCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">All Published polls<i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-yellow">
                                            <div class="inner align-center">
                                                <h3>{{$pendingCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">All Pending poll  <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-red">
                                            <div class="inner align-center">
                                                <h3>{{$rejectedCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">All Rejected Poll <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-gray-active">
                                            <div class="inner align-center">
                                                <h3>{{$allMembers}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Total Members <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-light-blue">
                                            <div class="inner align-center">
                                                <h3>${{$totalIncome}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Total Income <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                </div><!-- /.row -->
                                <h3>Weekly Review</h3>
                                <div class="row">
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner align-center">
                                                <h3>{{$weeklyTotalPolls}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">All POll <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-green">
                                            <div class="inner align-center">
                                                <h3>{{$weekApprovedCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Approved POll <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-aqua">
                                            <div class="inner align-center">
                                                <h3>{{$weekPublishedCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-stats-bars"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Published polls<i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-yellow">
                                            <div class="inner align-center">
                                                <h3>{{$weekPendingCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Pending Poll <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-red">
                                            <div class="inner align-center">
                                                <h3>{{$weekRejectedCount}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Rejected POll <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-gray-active">
                                            <div class="inner align-center">
                                                <h3>{{$weeklyTotalMember}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Total Members <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                    <div class="col-lg-3 col-xs-6">
                                        <!-- small box -->
                                        <div class="small-box bg-light-blue">
                                            <div class="inner align-center">
                                                <h3>${{$weekTotalIncome}}</h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-pie-graph"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Total Income <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div><!-- ./col -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Monthly Recap Report</h3>
{{--                                                <div class="box-tools pull-right">--}}
{{--                                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>--}}
{{--                                                    <div class="btn-group">--}}
{{--                                                        <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>--}}
{{--                                                        <ul class="dropdown-menu" role="menu">--}}
{{--                                                            <li><a href="#">Action</a></li>--}}
{{--                                                            <li><a href="#">Another action</a></li>--}}
{{--                                                            <li><a href="#">Something else here</a></li>--}}
{{--                                                            <li class="divider"></li>--}}
{{--                                                            <li><a href="#">Separated link</a></li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
{{--                                                </div>--}}
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="text-center">
                                                            <strong>Polls: 1 Jan, {{\Carbon\Carbon::now()->year}} - 31 Dec, {{\Carbon\Carbon::now()->year}}</strong>
                                                        </p>
                                                        <div class="chart">
                                                            <!-- Sales Chart Canvas -->
                                                            <canvas id="salesChart" style="height: 300px;"></canvas>
                                                        </div><!-- /.chart-responsive -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                                <!-- Main row -->
                                                <br>
                                                <div class="row">
                                                    <!-- Left col -->
                                                    <div class="col-md-8">
                                                        <!-- MAP & BOX PANE -->
                                                        <div class="box box-info">
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">Latest Polls</h3>
                                                            </div><!-- /.box-header -->
                                                            <div class="box-body">
                                                                <div class="table-responsive">
                                                                    <table class="table no-margin">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>&nbsp;</th>
                                                                            <th>Title</th>
                                                                            <th>Status</th>
                                                                            <th>Price</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @if($latestPolls->count() > 0)
                                                                            @foreach($latestPolls as $poll)
                                                                                <tr>
                                                                                    <td><a href="{{\Illuminate\Support\Facades\URL::to("poll-details",[$poll->id])}}">View</a></td>
                                                                                    <td>{{$poll->poll_title}}</td>
                                                                                    <td><span class="{{\App\Helper\Helper::getPollStatusClass($poll->status)}}">{{$poll->status}}</span></td>
                                                                                    <td><div class="sparkbar" data-color="#00a65a" data-height="20">{{$poll->price}}</div></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div><!-- /.table-responsive -->
                                                            </div><!-- /.box-body -->
                                                            <div class="box-footer clearfix">
                                                                <a href="{{\Illuminate\Support\Facades\URL::to('all-poll')}}" class="btn btn-sm btn-default btn-flat pull-right">View All Polls</a>
                                                            </div><!-- /.box-footer -->
                                                        </div><!-- /.box -->
                                                        <!-- TABLE: LATEST ORDERS -->
                                                        <div class="box box-info">
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">New Member</h3>
                                                            </div><!-- /.box-header -->
                                                            <div class="box-body">
                                                                <div class="table-responsive">
                                                                    <table class="table no-margin">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>User Name</th>
                                                                            <th>Location</th>
                                                                            <th>Email</th>
                                                                            <th>Gender</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @if($latestUsers->count() > 0)
                                                                            @foreach($latestUsers as $user)
                                                                                <tr>
                                                                                    <td>{{$user->firstname." ". $user->lastname}}</td>
                                                                                    <td>{{$user->location}}</td>
                                                                                    <td>{{$user->email}}</td>
                                                                                    <td>{{$user->gender}}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div><!-- /.table-responsive -->
                                                            </div><!-- /.box-body -->
{{--                                                            <div class="box-footer clearfix">--}}
{{--                                                                <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>--}}
{{--                                                                <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>--}}
{{--                                                            </div><!-- /.box-footer -->--}}
                                                        </div><!-- /.box -->
                                                    </div><!-- /.col -->

                                                    <div class="col-md-4">
                                                        <div class="info-box bg-indigo">
                                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Last Day Polls</span>
                                                                <span class="info-box-number">{{$lastTotalPolls}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div><!-- /.info-box -->
                                                        <!-- Info Boxes Style 2 -->
                                                        <div class="info-box bg-info">
                                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Today Polls</span>
                                                                <span class="info-box-number">{{$todayTotalPolls}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div><!-- /.info-box -->
                                                        <div class="info-box bg-gray-active">
                                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Today Income</span>
                                                                <span class="info-box-number">{{$todayTotalIncome ?? '0'}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div><!-- /.info-box -->
                                                        <div class="info-box bg-yellow">
                                                            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Today Pending Polls</span>
                                                                <span class="info-box-number">{{$todayPendingCount}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div>
                                                        <div class="info-box bg-green">
                                                            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Todays Approved Polls</span>
                                                                <span class="info-box-number">{{$todayApprovedCount}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div><!-- /.info-box -->
                                                        <div class="info-box bg-red">
                                                            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Todays Rejected Polls</span>
                                                                <span class="info-box-number">{{$todayRejectedCount}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div><!-- /.info-box -->
                                                        <div class="info-box bg-aqua">
                                                            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                                                            <div class="info-box-content">
                                                                <span class="info-box-text">Todays Published Polls</span>
                                                                <span class="info-box-number">{{$todayPublishedCount}}</span>
                                                            </div><!-- /.info-box-content -->
                                                        </div><!-- /.info-box -->

                                                        <!-- PRODUCT LIST -->
                                                        <div class="box box-primary">
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">Recently Actived Users</h3>
                                                            </div><!-- /.box-header -->
                                                            <div class="box-body">
                                                                <ul class="products-list">
                                                                    @if($recentActiveUsers->count() > 0)
                                                                        @foreach($recentActiveUsers as $recentUser)
                                                                            <li class="item">
                                                                                <div class="product-img">
                                                                                    @if($recentUser->gender == "male")
                                                                                        <img src="{{asset('male.jpg')}}" alt="Product Image">
                                                                                    @else
                                                                                        <img src="{{asset('female.jpg')}}" alt="Product Image">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="product-info">
                                                                                    <a href="javascript::;" class="product-title">{{$recentUser->firstname .' '. $recentUser->lastname}} <span class="label label-warning pull-right">{{$recentUser->location}}</span></a>
                                                                                    <span class="product-description">{{$recentUser->email}}</span>
                                                                                </div>
                                                                            </li><!-- /.item -->
                                                                         @endforeach
                                                                    @endif
                                                                </ul>
                                                            </div><!-- /.box-body -->
{{--                                                            <div class="box-footer text-center">--}}
{{--                                                                <a href="javascript::;" class="uppercase">View All Poll</a>--}}
{{--                                                            </div><!-- /.box-footer -->--}}
                                                        </div><!-- /.box -->
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>
                        </div>
        </div>
    </section>

@stop

@section("script")
    <script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script>
  $(document).ready(function(){
      var $published = @json($chartData['published']);
      var $pending = @json($chartData['pending']);
      var $approved = @json($chartData['approved']);
      var $rejected = @json($chartData['rejected']);
      console.log($published);
      console.log($pending);
      console.log($approved);
      console.log($rejected);
      // Get context with jQuery - using jQuery's .get() method.
      var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var salesChart = new Chart(salesChartCanvas);

      var salesChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July","Aug","Sept","Oct","Nov","Dec"],
          datasets: [
              {
                  label: "Published",
                  fillColor: "rgba(60,141,188,0.9)",
                  pointColor: "#3b8bba",
                  pointHighlightFill: "#fff",
                  highlightFill: "#fff",
                  data:$published
                  //[28, 48, 40, 19, 86, 27, 90, 40, 35, 41, 50, 55]
              },
              {
                  label: "Pending",
                  fillColor: "rgb(255,207,100)",
                  pointColor: "rgb(255,207,100)",
                  pointHighlightFill: "#fff",
                  highlightFill: "#fff",
                  data:$pending
                  //[65, 59, 80, 81, 56, 55, 40,35, 41, 50, 55, 60 ]
              },
              {
                  label: "Approved",
                  fillColor: "rgba(41,188,39,0.9)",
                  pointColor: "#29bc27",
                  pointHighlightFill: "#fff",
                  highlightFill: "#fff",
                  data:$approved
                      //[28, 48, 40, 19, 86, 27, 90, 40, 35, 41, 50, 55]
              },
              {
                  label: "Rejected",
                  fillColor: "rgba(255,68,48,0.9)",
                  pointColor: "#ff4430",
                  pointHighlightFill: "#fff",
                  highlightFill: "#fff",
                  data:$rejected
                      //[28, 48, 40, 19, 86, 27, 90, 40, 35, 41, 50, 55]
              }
          ]
      };

      var salesChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines:true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: true,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 4,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i]label%><%}%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };
  //Create the line chart
 salesChart.Bar(salesChartData, salesChartOptions);

  });
</script>
@endsection