@extends('layouts.admin')
@section('content')

<!-- Chartlist chart css -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/morris.js/css/morris.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/widget.css')}}">

<link rel="stylesheet" href="{{asset('files/bower_components/nvd3/css/nv.d3.css')}}" type="text/css" media="all">
<style type="text/css">
	.icon-arrow-down:before {
		content: "\e82a" !important; 
	}
	.icon-arrow-up:before {
		content: "\e82d" !important;
	}
</style>



<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{$base_url}}">
							<i class="feather icon-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item">
						<a>Dashboard </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<div class="row">
						<!-- subscribe start -->
						<div class="col-md-12 col-lg-3">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-mail text-c-green d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-green">{{$todays_order_count}}</span></h4>
									<p class="m-b-20">Your Today's Orders</p>
									<a class="text-white hide" href="{{$base_url}}/admin/order/todays"><button class="btn btn-success btn-sm btn-round">Manage Orders</button></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-file-text text-info d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-info">{{$all_order_count}}</span></h4>
									<p class="m-b-20">All Orders</p>
									<a class="text-white hide" href="{{$base_url}}/admin/order/all"><button class="btn btn-info btn-sm btn-round">Manage Orders</button></a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-users text-warning d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-yellow">{{$total_product_count}}</span></h4>
									<p class="m-b-20">Total Products</p>
									<a class="text-white hide" href="{{$base_url}}/admin/product/all"><button class="btn btn-warning btn-sm btn-round">Manage Products</button></a>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-3">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-package text-c-red d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-red">{{$total_sales_count}}</span></h4>
									<p class="m-b-20">Total Sales</p>
									<a class="text-white hide" href="{{$base_url}}/admin/order/all"><button class="btn btn-danger btn-sm btn-round">Manage Sales</button></a>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Revenue</h5>
								</div>
								<div class="card-block">
									<div id="revenue-map" style="height: 215px;"></div>
								</div>
							</div>
						</div>
					</div> -->

					<div class="row">

						<div class="col-xl-6 col-md-12">
							<div class="card">
								<div class="card-block">

									<div class="card-header">
										<h5>Last 7 days Revenue</h5>
										<span>This graph shows last 7 seven days revenue</span>
									</div>
									<div class="card-block">
										<div style="height: 170px" id="revenueLimited" class="nvd-chart"></div>
									</div>

								<!-- 	<div class="row justify-content-center text-center b-t-default m-t-15 p-t-20">
										<div class="col-3 b-r-default">
											<h5>85%</h5>
											<p class="text-muted m-b-0">Satisfied</p>
										</div>
										<div class="col-3 b-r-default">
											<h5>6%</h5>
											<p class="text-muted m-b-0">Unsatisfied</p>
										</div>
										<div class="col-3">
											<h5>9%</h5>
											<p class="text-muted m-b-0">NA</p>
										</div>
									</div> -->
								</div>
							</div>
						</div>


						<!-- seo ecommerce end -->
						<div class="col-xl-6 col-md-12">
							<div class="card">
								<div class="card-block">
									
									<div class="card-header">
										<h5>Last 7 days Order Count</h5>
										<span>This graph shows last 7 seven days order frequency</span>
									</div>
									<div class="card-block">
										<div style="height: 170px" id="barchart" class="nvd-chart"></div>
									</div>

									<!-- <div class="row justify-content-center text-center b-t-default m-t-15 p-t-20">
										<div class="col-3 b-r-default">
											<h5>85%</h5>
											<p class="text-muted m-b-0">Satisfied</p>
										</div>
										<div class="col-3 b-r-default">
											<h5>6%</h5>
											<p class="text-muted m-b-0">Unsatisfied</p>
										</div>
										<div class="col-3">
											<h5>9%</h5>
											<p class="text-muted m-b-0">NA</p>
										</div>
									</div> -->
								</div>
							</div>
						</div>
						<!-- seo ecommerce end -->
					</div>

					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="card text-center order-visitor-card">
								<div class="card-block">
									<h6 class="m-b-0">Today's Cart</h6>
									<h4 class="m-t-15 m-b-15"><i class="icon feather icon-shopping-cart m-r-15 text-c-red"></i>{{$todays_cart_count}}</h4>
									<!-- <p class="m-b-0">48% From Last 24 Hours</p> -->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card text-center order-visitor-card">
								<div class="card-block">
									<h6 class="m-b-0">Total Cart</h6>
									<h4 class="m-t-15 m-b-15"><i class="icon feather icon-shopping-cart m-r-15 text-c-green"></i>{{$total_cart_count}}</h4>
									<!-- <p class="m-b-0">36% From Last 6 Months</p> -->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card text-center order-visitor-card">
								<div class="card-block">
									<h6 class="m-b-0">Today's Wishlist</h6>
									<h4 class="m-t-15 m-b-15"><i class="icon feather icon-heart-on m-r-15 text-c-red"></i>{{$todays_wishlist_count}}</h4>
									<!-- <p class="m-b-0">36% From Last 6 Months</p> -->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card text-center order-visitor-card">
								<div class="card-block">
									<h6 class="m-b-0">Total Wishlist</h6>
									<h4 class="m-t-15 m-b-15"><i class="icon feather icon-heart-on m-r-15 text-c-green"></i>{{$total_wishlist_count}}</h4>
									<!-- <p class="m-b-0">36% From Last 6 Months</p> -->
								</div>
							</div>
						</div>
						<!-- order-visitor end -->
					</div>
					

					<div class="row ">
						<div class="col-md-12 col-lg-12 ">
							<div class="card">
								<div class="card-header">
									<h5>Monthly Revenue</h5>
									<span>Monthwise revenue for current year</span>
								</div>
								<div class="card-block ">
									<div id="month_wise_revenue" class="nvd-chart"></div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('files/assets/pages/widget/amchart/amcharts.js')}}"></script>
	<script src="{{asset('files/assets/pages/widget/amchart/gauge.js')}}"></script>
	<script src="{{asset('files/assets/pages/widget/amchart/serial.js')}}"></script>
	<script src="{{asset('files/assets/pages/widget/amchart/light.js')}}"></script>
	<script src="{{asset('files/assets/pages/widget/amchart/pie.min.js')}}"></script>
	<script src="{{asset('files/assets/pages/widget/amchart/ammap.min.js')}}"></script>
	<script src="{{asset('files/assets/pages/widget/amchart/usaLow.js')}}"></script>



	<script src="{{asset('files/bower_components/d3/js/d3.js')}}"></script>
	<script src="{{asset('files/bower_components/nvd3/js/nv.d3.js')}}"></script>



	<script type="text/javascript">

		$(document).ready(function() {

		// revenue map start
		var chart = AmCharts.makeChart("revenue-map", {
			"type": "serial",
			"theme": "light",
			"dataDateFormat": "YYYY-MM-DD",
			"precision": 2,
			"valueAxes": [{
				"id": "v1",
				"title": "Sales",
				"position": "left",
				"autoGridCount": false,
				"labelFunction": function(value) {
					return "$" + Math.round(value) + "M";
				}
			}, {
				"id": "v2",
				"title": "Revenue Market",
				"gridAlpha": 0,
				"autoGridCount": false
			}],
			"graphs": [{
				"id": "g1",
				"valueAxis": "v2",
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 5,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"lineColor": "#448aff",
				"type": "smoothedLine",
				"title": "Market Days",
				"useLineColorForBulletBorder": true,
				"valueField": "market1",
				"balloonText": "[[title]]<br /><b style='font-size: 90%'>[[value]]</b>"
			}, {
				"id": "g2",
				"valueAxis": "v2",
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 5,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"lineColor": "#9ccc65",
				"type": "smoothedLine",
				"title": "Market Days ALL",
				"useLineColorForBulletBorder": true,
				"valueField": "market2",
				"balloonText": "[[title]]<br /><b style='font-size: 90%'>[[value]]</b>"
			}],
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha": 0,
				"valueLineAlpha": 0.2
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": true
			},
			"legend": {
				"useGraphSettings": true,
				"position": "top"
			},
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"export": {
				"enabled": true
			},
			"dataProvider": [{
				"date": "2013-01-16",
				"market1": 85,
				"market2": 75
			}, {
				"date": "2013-01-17",
				"market1": 74,
				"market2": 80
			}, {
				"date": "2013-01-18",
				"market1": 78,
				"market2": 88
			}, {
				"date": "2013-01-19",
				"market1": 85,
				"market2": 75
			}, {
				"date": "2013-01-20",
				"market1": 82,
				"market2": 89
			}, {
				"date": "2013-01-21",
				"market1": 83,
				"market2": 78
			}, {
				"date": "2013-01-22",
				"market1": 72,
				"market2": 92
			}, {
				"date": "2013-01-23",
				"market1": 85,
				"market2": 76
			}]
		});

		var last_seven_day_revenue=<?php echo json_encode($last_seven_day_revenue)?>;

		
		// 7 days revenue
		var chart = AmCharts.makeChart("revenueLimited", {
			"type": "serial",
			"theme": "light",
			"dataProvider": last_seven_day_revenue,
			"gridAboveGraphs": true,
			"startDuration": 1,
			"graphs": [{
				"balloonText": "Revenue : <b>[[value]]</b>",
				"fillAlphas": 1,
				"lineAlpha": 1,
				"lineColor": "#9CCC65",
				"type": "column",
				"valueField": "value",
				"columnWidth": 0.5
			}],
			"chartCursor": {
				"categoryBalloonEnabled": false,
				"cursorAlpha": 0,
				"zoomable": false
			},
			"categoryField": "label",
			"categoryAxis": {
				"labelRotation": 45,
				"gridPosition": "start",
				"gridAlpha": 0,
				"axesAlpha": 0,
				"lineAlpha": 0,
				"tickLength": 0
			},
			"export": {
				"enabled": true
			}

		});


		// 7 days order count
		var last_seven_day_order_count=<?php echo json_encode($last_seven_day_order_count)?>;
		
		var chart = AmCharts.makeChart("barchart", {
			"type": "serial",
			"theme": "light",
			"dataProvider": last_seven_day_order_count,
			"gridAboveGraphs": true,
			"startDuration": 1,
			"graphs": [{
				"balloonText": "Order Count : <b>[[value]]</b>",
				"fillAlphas": 1,
				"lineAlpha": 1,
				"lineColor": "#448AFF",
				"type": "column",
				"valueField": "value",
				"columnWidth": 0.5
			}],
			"chartCursor": {
				"categoryBalloonEnabled": false,
				"cursorAlpha": 0,
				"zoomable": false
			},
			"categoryField": "label",
			"categoryAxis": {
				"labelRotation": 45,
				"gridPosition": "start",
				"gridAlpha": 0,
				"axesAlpha": 0,
				"lineAlpha": 0,
				"tickLength": 0
			},
			"export": {
				"enabled": true
			}

		});



		// 12 month revenue
		nv.addGraph(function() {
			var chart = nv.models.discreteBarChart()
			.x(function(d) {
                return d.label }) //Specify the data accessors.
			.y(function(d) {
				return d.value })
            .staggerLabels(true) //Too many bars and not enough room? Try staggering labels.
            /* .tooltips(false)    */ //Don't show tooltips
            .showValues(true) //...instead, show the bar value right on top of each bar.
            /*     .transitionDuration(350)*/
            ;

            d3.select('#month_wise_revenue').append('svg')
            .datum(month_wise_revenue())
            .call(chart);

            nv.utils.windowResize(chart.update);

            return chart;
        });


		/*Bar chart start*/	
		function month_wise_revenue() {

			var month_wise_revenue=<?php echo json_encode($month_wise_revenue)?>;

			return [{
				key: "Cumulative Return",
				values: month_wise_revenue
			}]

		}



	//Stacked/Group chart start
	nv.addGraph(function() {
		var chart = nv.models.multiBarChart()
		/* .transitionDuration(350)*/
            .reduceXTicks(true) //If 'false', every single x-axis tick label will be rendered.
            .rotateLabels(0) //Angle to rotate x-axis labels.
            .showControls(true) //Allow user to switch between 'Grouped' and 'Stacked' mode.
            .groupSpacing(0.1) //Distance between each group of bars.
            ;

            chart.xAxis
            .tickFormat(d3.format(',f'));

            chart.yAxis
            .tickFormat(d3.format(',.1f'));

            d3.select('#stackedchart').append('svg')
            .datum(stackedData())
            .call(chart);

            nv.utils.windowResize(chart.update);

            return chart;
        });

        //Generate some nice data.
        function stackedData() {
        	return stream_layers(3, 10 + Math.random() * 100, .1).map(function(data, i) {
        		return {
        			key: 'Stream #' + i,
        			values: data
        		};
        	});
        }

        function stream_layers(n, m, o) {
        	if (arguments.length < 3) o = 0;
        	function bump(a) {
        		var x = 1 / (.1 + Math.random()),
        		y = 2 * Math.random() - .5,
        		z = 10 / (.1 + Math.random());
        		for (var i = 0; i < m; i++) {
        			var w = (i / m - y) * z;
        			a[i] += x * Math.exp(-w * w);
        		}
        	}
        	return d3.range(n).map(function() {
        		var a = [], i;
        		for (i = 0; i < m; i++) a[i] = o + o * Math.random();
        			for (i = 0; i < 5; i++) bump(a);
        				return a.map(stream_index);
        		});
        }



        function stream_index(d, i) {
        	return {x: i, y: Math.max(0, d)};
        }

    });
var seller_id=<?php echo json_encode($seller_id); ?>;


if (seller_id!=null) {

	$('.hide').hide();
}
</script>

@endsection