
@extends('layouts.admin')
@section('content')


<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
<style type="text/css">

	.Zebra_DatePicker_Icon_Wrapper button{
		top: 9.5px !important;
		left: 630px !important;
	} 
</style>
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-8">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{$base_url}}">
							<i class="feather icon-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{$base_url}}/admin/home">Admin</a>
					</li>
					<li class="breadcrumb-item"><a href="all">Customers</a>
					</li> 
					<li class="breadcrumb-item">
						<a>Customer details</a>
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
					<div class="col-lg-12">
						<div class="cover-profile">
							<div class="profile-bg-img">
								<img class="profile-bg-img img-fluid" src="{{$base_url}}/files/assets/images/bg-img1.jpg" alt="bg-img">
								<div class="card-block user-info">
									<div class="col-md-12">
										<div class="media-left">
											<a href="#" class="profile-image">
												<img class="user-img img-radius" src="{{$base_url}}/files/assets/images/user.png" alt="user-img" style="height: 90px !important;width: 90px !important;">
											</a>
										</div>
										<div class="media-body row">
											<div class="col-lg-12">
												<div class="user-title">
													<h2>@if($customer->name!=""){{$customer->name}}@else User @endif</h2>
													<span class="text-white"> Superior</span>
												</div>
											</div>
											<div>
									<!-- <div class="pull-right cover-btn">
										<button type="button" class="btn btn-primary m-r-10 m-b-10"><i class="icofont icofont-plus"></i> Follow</button>
										<button type="button" class="btn btn-primary m-b-10"><i class="icofont icofont-ui-messaging"></i> Message</button>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 p-0">
			<div class="col-sm-12">
				<div class="tab-header card no-border"> 	
					<ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#user_info" role="tab">@if($customer->name!=""){{$customer->name}}@else User @endif Details</a>
							<div class="slide"></div>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#order" role="tab">@if($customer->name!=""){{$customer->name}}@else User @endif's Order</a>
							<div class="slide"></div>
						</li>
					
						<!-- <li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#review" role="tab">@if($customer->name!=""){{$customer->name}}@else User @endif</a>
							<div class="slide"></div>
						</li> -->
					</ul>
				</div>
			</div>
			<div class="tab-content">
				<!-- tab panel personal start -->
				<div class="tab-pane active" id="user_info" role="tabpanel">
					<form id="personal-info-form" method="post" action="{{$customer->id}}" enctype='multipart/form-data'>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header no-border">
									<h5><a>{{$customer->name}}</a></h5>
									<span class="upper-buttons pull-right">
										@if($my_permissions->contains('CUSTOMER_UPDATE'))
										<button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif

										@if($my_permissions->contains('CUSTOMER_UPDATE'))
										@if($customer->status_id==1)
										<button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
										</button>
										@else
										<button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
										@endif
										@endif
										<a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
										</button></a>
									</span>
									<span class="text-muted">You can modify information for customer according to required types and representations to a given part of your online business .</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 p-0">
							<div class="col-md-7">
								<div class="card">
									<div class="card-block">

										<h6>Profile</h6>

										<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
											<label class="form-control-label">Name *</label>
											<input type="text" name="name" value="{{$customer->name}}" class="form-control thresold-i" maxlength="40" placeholder="Enter customer name">
											@if ($errors->has('name'))
											<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
											@endif
										</div>

										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
											<label class="form-control-label">Email *</label>
											<input type="email" name="email" value="{{$customer->email}}"  class="form-control thresold-i" maxlength="40" placeholder="Enter customer email">
											@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
											@endif
										</div>

										<div class="form-group {{ $errors->has('contact_number') ? ' has-error' : '' }} ">
											<label class="form-control-label">Contact No. <span>*</span></label>
											<input type="text" name="contact_number" value="{{$customer->contact_number}}" class="form-control thresold-i" maxlength="15" placeholder="Enter customer contact number">
											@if ($errors->has('contact_number'))
											<span class="help-block">
												<strong>{{ $errors->first('contact_number') }}</strong>
											</span>
											@endif
										</div>

										

									</div>
								</div>


								<div class="card">
									<div class="card-block">

										<h6>Reset Password</h6>

										<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} ">
											<label class="form-control-label">Password *</label>
											<input type="password" name="password" value="" class="form-control thresold-i" maxlength="20" placeholder="Enter password">
											@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
											@endif
										</div>

										<div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
											<label class=" form-control-label">Confirm Password *</label>
											<input type="password" name="confirm_password" value=""  class="form-control thresold-i" maxlength="20" placeholder="Confirm above password">
											@if ($errors->has('confirm_password'))
											<span class="help-block">
												<strong>{{ $errors->first('confirm_password') }}</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							@include('user.sellerLocation')


						</div>

						<div class="col-sm-12">
							<div class="main-footer">
								@if($my_permissions->contains('CUSTOMER_UPDATE'))
								<button type="submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
								@if($my_permissions->contains('CUSTOMER_UPDATE'))
								@if($customer->status_id==1)
								<button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
								</button>
								@else
								<button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
								@endif
								@endif
								<a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
								</button></a>
							</div>
						</div>
					</form>
				</div>


				<!-- tab panel personal start -->
				<div class="tab-pane" id="order" role="tabpanel">
					<div class="col-sm-12 m-t-30">
						<div class="card">
							<div class="card-header">
								<h6> {{$customer->name}} Orders </h6>
							</div>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<table id="footer-search" class="table nowrap">
										<thead>
											<tr>
												<th>Order ID</th>
												<th>Contact no.</th>
												<th>Payment status</th>
												<th>Delivery status</th>
												<th> Order Date</th>
												<th>Action</th>   
											</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
											<tr>
												<th>Order ID</th>
												<th>Contact no.</th>
												<th>Disabled</th>
												<th>Disabled</th>
												<th>Order Date</th>
												<th>Disabled</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>



				<!-- tab panel personal start -->
				<div class="tab-pane" id="review" role="tabpanel">

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
@php
$address=$address;
@endphp
<!-- Date-range picker js -->
<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

<script src="{{asset('files/assets/js/core.js')}}"></script>


<script type="text/javascript">
	'use strict';
	$(document).ready(function() {
		/*$('#state_id').change();*/



		$('#footer-search').DataTable($.extend({

			"ajax": {
				url: "orderData/{{$customer->id}}",
				type: "GET",
				bFilter: true,
				contentType: "application/json;charset=UTF-8",
				dataType: "json",
			},

			"order": [[ 1, "asc" ]],                                
			"columns": [{ 
				"data": "order_id" 
			},{ 
				"data": "delivery_contact_number" 
			},{
				"bSortable": false,
				"ilter":false,
				"mData": "payment_status.payment_status_name",
				"mRender": function(data, type, row) {
					if(row.payment_status.payment_status_id==1){
						return '<span class="label label-danger">'+row.payment_status.payment_status_name+'</span>';
					}else if(row.payment_status.payment_status_id==2){
						return '<span class="label label-warning">'+row.payment_status.payment_status_name+'</span>';  
					}else{
						return '<span class="label label-success">'+row.payment_status.payment_status_name+'</span>';  
					}
				}
			},{
				"bSortable": false,
				"ilter":false,
				"mRender": function(data, type, row) {
					return '<span class="label" style="background-color:#'+row.delivery_status.delivery_status_color+'">'+row.delivery_status.delivery_status_translation.delivery_status_name+'</span>';
				}
			},{ 
				"data": "created_at" 
			},{
				"bSortable": false,
				"ilter":false,
				"mRender": function(data, type, row) {
					return '<h6><a class=" waves-effect waves-light"  href="../order/'+row.order_id+'"><i class="fa fa-eye"></i>Detail </a></h6>';        
				}
			}]
		},dataTableDesign) );
	} );
</script>
<script type="text/javascript">
	'use strict';
	$(document).ready(function() {
		/*$('#state_id').change();*/



		$('#footer-search1').DataTable($.extend({

			"ajax": {
				url: "walletData/{{$customer->id}}",
				type: "GET",
				bFilter: true,
				contentType: "application/json;charset=UTF-8",
				dataType: "json",
			},
			"order": [[ 1, "asc" ]], 

			"columns": [{ 
				"data": "wallet_transactions_id" 
			},{ 
				"data": "old_wallet" 
			},{ 
				"data": "amount" 
			},{ 
				"data": "new_wallet" 
			},{ 
				"data": "transaction_title" 
			},{ 
				"data": "narration" 
			},{ 
				"data": "created_at" 
			}]
		},dataTableDesign) );
	} );
</script>
@endsection






