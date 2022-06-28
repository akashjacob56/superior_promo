@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">

<style type="text/css">
	.Zebra_DatePicker_Icon_Wrapper button{
		top: 9.5px !important;
		left: 630px !important;
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
						<li class="breadcrumb-item"><a href="all">All Admins</a>
						</li> 
						<li class="breadcrumb-item">
							<a>Admin details
								@if($appearance->is_multilanguage==1) 
								<b class="language-title-color">({{$appearance->language->default_language_translation->language_name}} )</b>
								@endif
							</a>
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
						<form id="personal-info-form" method="post" action="{{$admin->id}}" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header no-border">
										<h5><a>{{$admin->name}}</a></h5>
										<span class="upper-buttons pull-right">
											@if($my_permissions->contains('ADMIN_UPDATE'))
											<button type="submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
											@if($my_permissions->contains('ADMIN_UPDATE'))
											@if($admin->status_id==1)
											<button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
											</button>
											@else
											<button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
											@endif
											@endif
											<a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
											</button></a>
										</span>
										<span class="text-muted">You view, add, modify, and organize admin  from the admin page in the @if($appearance->is_vshopy==1) vshopy @endif admin.</span>
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
												<input type="text" name="name" value="{{$admin->name}}" class="form-control thresold-i" maxlength="40" placeholder="Enter admin name" >
												@if ($errors->has('name'))
												<span class="help-block">
													<strong>{{ $errors->first('name') }}</strong>
												</span>
												@endif
											</div>

											<div class="form-group {{ $errors->has('business_name') ? ' has-error' : '' }}">
												<label class="form-control-label">Business name *</label>
												<input type="text" name="business_name" value="{{$admin->business_name}}" class="form-control thresold-i" maxlength="100" placeholder="Enter business name" >
												@if ($errors->has('business_name'))
												<span class="help-block">
													<strong>{{ $errors->first('business_name') }}</strong>
												</span>
												@endif
											</div>

											<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
												<label class="form-control-label">Email *</label>
												<input type="email" name="email" value="{{$admin->email}}"  class="form-control thresold-i" maxlength="40" placeholder="Enter admin email">
												@if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
												@endif
											</div>

											<div class="form-group {{ $errors->has('contact_number') ? ' has-error' : '' }} ">
												<label class="form-control-label">Contact no. <span>*</span></label>
												<input type="text" name="contact_number" value="{{$admin->contact_number}}" class="form-control thresold-i" maxlength="15" placeholder="Enter admin contact number">
												@if ($errors->has('contact_number'))
												<span class="help-block">
													<strong>{{ $errors->first('contact_number') }}</strong>
												</span>
												@endif
											</div>

											<div class="form-group {{ $errors->has('optional_contact_number') ? ' has-error' : '' }} ">
												<label class="form-control-label">2nd Contact no. (optional)</label>
												<input type="text" name="optional_contact_number" value="{{$admin->optional_contact_number}}" class="form-control thresold-i" maxlength="15" placeholder="Enter admin optional contact number">
												@if ($errors->has('optional_contact_number'))
												<span class="help-block">
													<strong>{{ $errors->first('optional_contact_number') }}</strong>
												</span>
												@endif
											</div>

											<div class="form-group">
												<label class="form-control-label">DOB (optional)</label>
												<input type="text" name="dob" id="datepicker-from" value="{{$admin->DOB}}"  class="form-control thresold-i" placeholder="Select DOB" >    
											</div>

											@if(Auth::user()->role_id==1)
											<div class="form-group">
												<label class="form-control-label">Wallet</label>
												<input type="text" name="wallet" value="{{$admin->wallet}}"  class="form-control thresold-i" placeholder="Wallet Money" >    
											</div>
											@endif

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
												<label class=" form-control-label">Confirm password *</label>
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
									@if($my_permissions->contains('ADMIN_UPDATE'))
									<button type="submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif

									@if($my_permissions->contains('ADMIN_UPDATE'))
									@if($admin->status_id==1)
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
				</div>
			</div>
		</div>
	</div>
	<!-- Date-range picker js -->
	<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

	<script src="{{asset('files/assets/js/core.js')}}"></script>

	<script type="text/javascript">
		my_address="<?php echo $address->address ?>";

		$('#address').val(my_address);

		seller_state="<?php echo $address->state->default_state_translation->state_name ?>";
		seller_city="<?php echo $address->city->default_city_translation->city_name ?>";
		seller_pincode="<?php echo $address->pincode->pincode ?>";
		seller_area="<?php echo $address->area->default_area_translation->area ?>";

		$("#state_name").val(seller_state);
		$("#city_name").val(seller_city);
		$("#pincode").val(seller_pincode);
		$("#area_name").val(seller_area);
		$("#country_id option[value={{$address->country->country_id}}]").prop('selected',true);

		$("#address_id option[value={{$address->address_id}}]").prop('selected',true);
	</script>
	@endsection






