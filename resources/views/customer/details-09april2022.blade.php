
@extends('layouts.admin')
@section('content')
<style type="text/css">
	select.form-control, select.form-control:focus, select.form-control:hover {
    border-top: 1px solid #ccc !important;
    border-right: 1px solid #ccc !important;
    border-left: 1px solid #ccc !important;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.hidden{
	display: none !important;
}
</style>

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">

<style type="text/css">
	.Zebra_DatePicker_Icon_Wrapper button{
		top: 9.5px !important;
		left: 630px !important;
	} 
</style>

<input type="hidden" id="editable_customer_id" value="{{$customer->id}}"  name="customer_id">
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-8">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="">
							<i class="feather icon-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="/admin/home">Admin</a>
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
								<img class="profile-bg-img img-fluid" src="/files/assets/images/bg-img1.jpg" alt="bg-img">
								<div class="card-block user-info">
									<div class="col-md-12">
										<div class="media-left">
											<a href="#" class="profile-image">
												<img class="user-img img-radius" src="/files/assets/images/user.png" alt="user-img" style="height: 90px !important;width: 90px !important;">
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





								<div class="card">
									<div class="card-block">


									<h6>Address</h6>

									<div class="row">
										<div class="col-sm-12">
											<div class="row">

												<div class="col-sm-6">
													<div class="main-billing-address-div">
														<button type="button" class="btn btn-success addNewBillingAddress">Add Billing Address</button>
									
										@if($billing_addresses!="[]")
											@foreach($billing_addresses as $address)
												<!-- bill start -->
												<div class="row billing_address_row" style="margin-top: 15px;" id="append_edit_billing_address_{{$address->address_id}}">
													<div class="col-md-12" id="delete_billing_address_content_{{$address->address_id}}">
														<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
															<div class="row">
																<div class="col-md-1">
																	<input type="checkbox" name="" style="width: 25px; height: 25px;">
																</div>
																<div class="col-md-11">
																	<p class="text-font-weight-500">{{$address->name}}</p>
																	<p>{{$address->address}}</p>
																	<p>Phone Number :  {{$address->telephone}}</p>
																	<p class="mb-2">
																	<a class="a_proof_color" href="javascript:void(0);">
																		Add Delivery Instructions
																	</a>
																</p>
																	<p class="edit_address_para">
																		<a class="a_proof_color edit_bill_address" href="javascript:void(0);" id="{{$address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;
																		<!-- <a class="a_proof_color" class="a_proof_color" href="javascript:void(0);">Make Default</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
																		<a class="a_proof_color remove_bill_address" href="javascript:void(0);" address_id="{{$address->address_id}}">Remove</a>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- bill end -->
											@endforeach
										@endif
										<div class="div-bill-address-append" id="div-bill-address-append">
											
										</div>
													</div>
												</div>


												<div class="col-sm-6">


													<div class="main-shipping-address-div" id="main-shipping-address-div">
														<button type="button" class="add_new_shipping_address btn btn-success">Add Shipping Address</button>
														@if($user_address!="")
														<!-- bill start -->
														<div class="make_default_div_add" id="make_default_div_add">
															<div class="row make_default_div_add_child" style="margin-top: 15px;" id="append_edit_shipping_address_{{$user_address->address_id}}" address_id="{{$user_address->address_id}}">
																	<div class="col-md-12" id="delete_shipping_address_content_{{$user_address->address_id}}">
																		<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
																			<div class="row">
																				<div class="col-md-1">
																					<input type="checkbox" name="" style="width: 25px; height: 25px;">
																				</div>
																				<div class="col-md-11">
																					<p><b>{{$user_address->name}} </b></p>
																					<p>{{$user_address->address}}</p>
																					<p>Phone Number :  {{$user_address->telephone}}</p>
																					<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
																					<p class="edit_address_para">
																						<a class="a_proof_color edit_shipp_address" href="javascript:void(0);" id="{{$user_address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;
																						@if($user_address->is_default_add=="0")
																						<a class="a_proof_color" href="javascript:void(0);" id="">Make Default</a>
																						@else
																						<a class="a_proof_color" class="a_proof_color" href="javascript:void(0);">Default</a>
																						@endif
																						&nbsp;&nbsp;&nbsp;&nbsp;
																						<a class="a_proof_color remove_shipping_address" href="javascript:void(0);" address_id="{{$user_address->address_id}}">Remove</a>
																					</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- bill end -->
										@endif




												@if($shipping_addresses!="[]")
													@foreach($shipping_addresses as $address)
												@php
													if($user_address!=""){
														$user_address_id = $user_address->address_id;
													}else{
													$user_address_id = "";
												}
												@endphp

												@if($user_address_id!=$address->address_id)
												<div class="row shipping-address-show" style="margin-top: 15px;" id="append_edit_shipping_address_{{$address->address_id}}">
													<div class="col-md-12" id="delete_shipping_address_content_{{$address->address_id}}">
														<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
															<div class="row">
																<div class="col-md-1">
																	<input type="checkbox" name="" style="width: 25px; height: 25px;">
																</div>
																<div class="col-md-11">
																	<p><b>{{$address->name}}</b></p>
																	<p>{{$address->address}}</p>
																	<p>Phone Number :  {{$address->telephone}}</p>
																	<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
																	<p class="edit_address_para">
																		<a class="a_proof_color edit_shipp_address text-info" href="javascript:void(0);" id="{{$address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;
																		@if($address->is_default_add=="0")
																			<a class="a_proof_color make_default_shipping_address text-success" href="javascript:void(0);" address_id="{{$address->address_id}}">Make Default</a>
																		@else
																			<a class="a_proof_color " href="javascript:void(0);">Default</a>
																		@endif
																		&nbsp;&nbsp;&nbsp;&nbsp;
																		<a class="a_proof_color remove_shipping_address text-danger" href="javascript:void(0);" address_id="{{$address->address_id}}">Remove</a>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>

												@endif
												<!-- bill end -->
											@endforeach
										@endif

										<div class="div-ship-append" id="div-ship-append">
											
										</div>



										</div>



													</div>
												</div>
												<hr>


												<!-- Edit Billing Address Start-->
												<div class="col-sm-12 edit_billing_address_form hidden">
													<h6>Edit Billing Address</h6>
													<hr>
													<div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
				                                        <div class="form-group form-check">
				                                            <input type="checkbox" class="form-check-input united-staten" id="billing_united_state_checkbox" checked="">&nbsp;
				                                            <label class="form-check-label check-checkout mr-2" for="united-staten">United States</label>
						                                       &nbsp;&nbsp;
						                                       &nbsp;&nbsp;
				                                            <input type="checkbox" class="form-check-input canadan" id="billing_canada_checkbox">&nbsp;
				                                            <label class="form-check-label check-checkout" for="canadan">Canada</label>
				                                        </div>
			                                     	</div>

			                                     	<input type="hidden" class="form-control txt-lbl" placeholder="David" id="billing_address_id" name="add-id" value="">
                                      				

                            
		                                            <div class="form-group">
		                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
		                                                <input type="text" class="form-control " placeholder="Enter First Name" id="billing_first_name" name="fname">
		                                            </div>
		                                       

                                  
		                                            <div class="form-group">
		                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
		                                                <input type="text" class="form-control txt-lbl" id="billing_last_name" placeholder="Enter Last Name" name="lname">
		                                            </div>
		                                     
		                                  



				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
				                                        <input type="text" class="form-control txt-lbl" id="billing_company_name" name="companyname" placeholder="Enter Company Name">
				                                    </div>

				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Address First<span class="required">*</span></label>
				                                        <input type="text" class="form-control txt-lbl" id="billing_address_first" name="add1" placeholder="Enter Address First">
				                                    </div>

				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Address Second<span class="required"></span></label>
				                                        <input type="text" class="form-control txt-lbl" id="billing_address_second" name="add2" placeholder="Enter Address Second">
				                                    </div>



		                                     
			                                    		<div class="form-group mb-2">
					                                        <label class="form-lbl">City<span class="required">*</span></label>
					                                        <select name="cityn" id="billing_city" class="form-control txt-lbl">
					                                            <option value="" selected="selected">
					                                                Select City
					                                            </option>
					                                            @foreach($data['Allcity'] as $city)
					                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
					                                            @endforeach
					                                        </select>
				                                    	</div>

			                                     
				                                      <div class="form-group mb-2">
						                                        <label class="form-lbl">State<span class="required">*</span></label>
						                                        <select name="staten" id="billing_state" class="form-control">
						                                            <option value="" selected="selected">Select State</option>
						                                            @foreach($data['Allstates'] as $state)
						                                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
						                                            @endforeach
						                                        </select>
					                                       </div>
				                                      


				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
				                                        <input type="number" class="form-control txt-lbl" id="billing_zip_code" name="zip-coden" placeholder="Enter Zipcode">
				                                    </div>                                         
			                                    

		                                 


                                     

                                        
		                                            <div class="form-group">
		                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
		                                                <input type="number" class="form-control txt-lbl" placeholder="Enter Day Telephone" id="billing_day_telephone" name="teln">
		                                            </div>
		                                        

                                        
		                                            <div class="form-group">
		                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
		                                                <input type="text" class="form-control txt-lbl" id="billing_ext" placeholder="Enter Ext" name="extn" >
		                                            </div>
		                                        

				                                    <!-- <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
				                                        <input type="text" class="form-control txt-lbl" id="billing_fax" name="faxn" placeholder="Enter FAX" >
				                                    </div> -->

				                                    

				                                    <div class="form-group mb-2 ml-3">
				                                    	<div class="row">
				                                    		<div class="bill_edit_address">
					                                         	<button type="button" class="btn-save-changes btn btn-success">Save Change</button> 
					                                        </div>&nbsp;&nbsp;
					                                        <div class="bill_edit_cancel">
					                                          	<button type="button" class="btn-cancel btn btn-default btn_billing_address_cancel">Cancel</button>  
					                                        </div>
					                                    </div>
				                                    </div>

												</div>
												<!-- Edit Billing Address End -->




												<script type="text/javascript">
													$(document).ready(function(){
														$("#shipping_united_state_checkbox").on("click",function(){
															if($(this).is(":checked")){
																$('#shipping_canada_checkbox').prop('checked',false);
															}else{
																$('#shipping_canada_checkbox').prop('checked',true);
															}
														});

														$("#shipping_canada_checkbox").on("click",function(){
															if($(this).is(":checked")){
																$('#shipping_united_state_checkbox').prop('checked',false);
															}else{
																$('#shipping_united_state_checkbox').prop('checked',true);
															}
														});
													});
												</script>

											<!-- Edit Shipping Address Start -->
												<div class="col-sm-12 edit_shipping_address_form hidden">
													<h6>Edit Shipping Address</h6>
													<hr>
													<div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
				                                        <div class="form-group form-check">
				                                            <input type="checkbox" class="form-check-input united-staten" id="shipping_united_state_checkbox" checked="">&nbsp;
				                                            <label class="form-check-label check-checkout mr-2" for="united-staten">United States</label>
						                                       &nbsp;&nbsp;
						                                       &nbsp;&nbsp;
				                                            <input type="checkbox" class="form-check-input canadan" id="shipping_canada_checkbox">&nbsp;
				                                            <label class="form-check-label check-checkout" for="canadan">Canada</label>
				                                        </div>
			                                     	</div>


                                      				<input type="hidden" class="form-control txt-lbl" placeholder="David" id="shipping_address_id" name="add-id" value="">
                            
		                                            <div class="form-group">
		                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
		                                                <input type="text" class="form-control " placeholder="Enter First Name" id="shipping_first_name" name="fname">
		                                            </div>
		                                       

                                  
		                                            <div class="form-group">
		                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
		                                                <input type="text" class="form-control txt-lbl" id="shipping_last_name" placeholder="Enter Last Name" name="lname">
		                                            </div>
		                                     
		                                  



				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
				                                        <input type="text" class="form-control txt-lbl" id="shipping_company_name" name="companyname" placeholder="Enter Company Name" >
				                                    </div>

				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Address First<span class="required">*</span></label>
				                                        <input type="text" class="form-control txt-lbl" id="shipping_address_first" name="add1" placeholder="Enter Address First">
				                                    </div>

				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Address Second<span class="required"></span></label>
				                                        <input type="text" class="form-control txt-lbl" id="shipping_address_second" name="add2" placeholder="Enter Address Second">
				                                    </div>



		                                     
			                                    		<div class="form-group mb-2">
					                                        <label class="form-lbl">City<span class="required">*</span></label>
					                                        <select name="cityn" id="shipping_city" class="form-control txt-lbl">
					                                            <option value="" selected="selected">
					                                                Select City
					                                            </option>
					                                            @foreach($data['Allcity'] as $city)
					                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
					                                            @endforeach
					                                        </select>
				                                    	</div>

			                                     
				                                      <div class="form-group mb-2">
						                                        <label class="form-lbl">State<span class="required">*</span></label>
						                                        <select name="staten" id="shipping_state" class="form-control">
						                                            <option value="" selected="selected">Select State</option>
						                                            @foreach($data['Allstates'] as $state)
						                                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
						                                            @endforeach
						                                        </select>
					                                       </div>
				                                      


				                                    <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
				                                        <input type="number" class="form-control txt-lbl" id="shipping_zip_code" name="zip-coden" placeholder="Enter Zipcode">
				                                    </div>                                         
			       
		                                            <div class="form-group">
		                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
		                                                <input type="number" class="form-control txt-lbl" placeholder="Enter Day Telephone" id="shipping_day_telephone" name="teln">
		                                            </div>
		                                        

                                        
		                                            <div class="form-group">
		                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
		                                                <input type="text" class="form-control txt-lbl" id="shipping_ext" placeholder="Enter Extension" name="extn" >
		                                            </div>
		                                        

				                                    <!-- <div class="form-group mb-2">
				                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
				                                        <input type="text" class="form-control txt-lbl" id="shipping_fax" name="faxn" placeholder="Enter FAX" >
				                                    </div> -->

				                                    <div class="form-group form-check">
				                                            <input type="checkbox" class="form-check-input shipping_default_ship_add" id="shipping_default_ship_add">
				                                            <label class="form-check-label check-checkout" for="default-ship-addn">&nbsp;&nbsp;&nbsp;Make this my default shipping address</label>
				                                    </div>

				                                    <div class="form-group mb-2 ml-3">
				                                    	<div class="row">
				                                    		<div class="edit-ad-new">
					                                         	<button type="button" class="btn-save-changes btn btn-success">Save Change</button>   
					                                        </div>&nbsp;&nbsp;
					                                        <div class="new-add-cancel">
					                                          	<button type="button" class="btn-cancel btn btn-default btn_shipping_address_cancel">Cancel</button>  
					                                        </div>
					                                    </div>
				                                    </div>

												</div>
												<!-- Edit Shipping Address End -->




					<!-- Add Billing Address Start ----------------------------------------- -->

					<div class="col-sm-12 add_billing_address_form hidden">

                        <span class="add-add pb-3">Add a New Billng Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-3">
                            <div class="account-content">
                                <form id="addnewbillingaddressform">

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="form-check-input united-state-bill" id="add_billing_united_state_checkbox" checked="">&nbsp;&nbsp;
                                            <label class="form-check-label check-checkout mr-5" for="united-state-bill">United States</label>
                                       		
                                            <input type="checkbox" class="form-check-input canada-bill" id="add_billing_canada_checkbox">&nbsp;&nbsp;
                                            <label class="form-check-label check-checkout" for="canada-bill">Canada</label>

                                          </div>
                                     </div>
                                     

                                     
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="Enter First Name" id="add_billing_first_name" name="fname-bill">
                                            </div>
                                       
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="add_billing_last_name" placeholder="Enter Last Name" name="lname-bill">
                                            </div>
                                   



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_billing_company_name" name="companyname-bill" placeholder="Enter Company Name" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address First<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_billing_address_first" name="add1-bill" placeholder="Enter First Address">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Second<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_billing_address_second" name="add2-bill" placeholder="Enter Second Address" >
                                    </div>



                                   <div class="row">     
                                    <div class="col">
                                    <div class="select-custom">
                                        <label class="form-lbl">City<span class="required">*</span></label>
                                        <select name="city-bill" id="add_billing_city" class="form-control txt-lbl">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>

                                     
                                      <div class="col">
                                       <div class="select-custom">
                                        <label class="form-lbl">State<span class="required">*</span></label>
                                        <select name="state-bill" id="add_billing_state" class="form-control txt-lbl">
                                            <option value="" selected="selected">Selecte State
                                            </option>
                                            @foreach($data['Allstates'] as $state)
                                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                            @endforeach
                                        </select>
                                       </div>
                                      </div>


                                    <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
                                        <input type="number" class="form-control txt-lbl" id="add_billing_zipcode" name="zip-code-bill" placeholder="Enter Zipcode">
                                    </div>                                         
                                    </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="number" class="form-control txt-lbl" placeholder="Enter Day Telephone" id="add_billing_day_telephone" name="tel-bill">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext : <span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="add_billing_Ext" placeholder="Enter Ext" name="ext-bill">
                                            </div>
                                        </div>

                                    </div>  



                                    <!-- <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_billing_Fax" name="faxn-bill" placeholder="Enter Fax" >
                                    </div> -->

                                   		<div class="form-group mb-2 ml-3">
                                   			<div class="row">
                                        <div class="add_new_billing_address d-inline-block">
                                         <button type="button" class="btn-save-changes btn btn-success">Save Change</button>   
                                        </div>&nbsp;&nbsp;
                                        <div class="add_new_billing_cancel">
                                          <button type="button" class="btn btn-danger btn-cancel cancel_new_billing_address">Cancel</button> 
                                        </div>
                                    </div>
                                </div>
                                    
                                </form>
                            </div>
                        </div>
                     
													</div>

												<!-- Add Billing Address End ------------------------------>





			<!-- Add Shipping Address Start------------- ------------------------------------- -->

					<div class="col-sm-12 add_shipping_address_form hidden">

                        <span class="add-add pb-3">Add a New Shipping Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-3">
                            <div class="account-content">
                                <form id="addnewaddressform">

                                   	<div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
                                         <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input united-staten" id="add_shipping_united_state_checkbox" checked="">&nbsp;
                                            <label class="form-check-label check-checkout mr-2" for="united-staten">United States</label>
                                       &nbsp;&nbsp;
                                       &nbsp;&nbsp;
                                            <input type="checkbox" class="form-check-input canadan" id="add_shipping_canada_checkbox">&nbsp;
                                            <label class="form-check-label check-checkout" for="canadan">Canada</label>
                                          </div>
                                    </div>


                                      
                                        
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="Enter First Name" id="add_shippinng_first_name" name="fname">
                                            </div>
                                        

                                        
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="add_shipping_last_name" placeholder="Enter Last Name" name="lname">
                                            </div>
                                        
                              



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_shipping_company_name" name="companyname" placeholder="Enter Company Name" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address First<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_shipping_first_address" name="add1" placeholder="Enter Address First">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Second<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_shipping_second_address" name="add2" placeholder="Enter Address Second" >
                                    </div>



                                      
                                    
                                    <div class="select-custom">
                                        <label class="form-lbl">City<span class="required">*</span></label>
                                        <select name="cityn" id="add_shipping_city" class="form-control txt-lbl">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    

                                     
                                      
                                       <div class="select-custom">
                                        <label class="form-lbl">State<span class="required">*</span></label>
                                        <select name="staten" id="add_shipping_state" class="form-control txt-lbl">
                                            <option value="" selected="selected">Select State
                                            </option>
                                            @foreach($data['Allstates'] as $state)
                                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                            @endforeach
                                        </select>
                                       </div>
                                      


                                    
                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
                                        <input type="number" class="form-control txt-lbl" id="add_shipping_zip_code" name="zip-coden" placeholder="Enter Zipcode">
                                    </div>                                         
                                    

                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="number" class="form-control txt-lbl" placeholder="Enter Day Telephone" id="add_shipping_day_telephone" name="teln">
                                            </div>
                                        

                                        
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="add_shipping_ext" placeholder="Enter Ext" name="extn" >
                                            </div>
                                        

                                   


                                    <!-- <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add_shipping_fax" name="faxn" placeholder="Enter Fax" >
                                    </div> -->


                                    <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input default-ship-addn" id="add_shipping_default">
                                            <label class="form-check-label check-checkout" for="default-ship-addn">&nbsp;&nbsp;&nbsp;Make this my default shipping address</label>
                                    </div>

                                    <div class="form-group mb-2 ml-3">
                                    <div class="row">
                                        <div class=" add_new_shipping_address">
                                         <button type="button" class="btn-save-changes btn btn-success">Save Change</button>   
                                        </div>
                                        &nbsp;&nbsp;
                                        <div class=" add_new_shipping_address_cancel">
                                          <button type="button" class="btn-cancel btn_shipping_address_cancel btn btn-danger">Cancel</button>  
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                      

					</div>

				<!-- Add Shipping Address End ----------------------------------------------------- -->




											</div>
										</div>	
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


<script type="text/javascript">
	$(document).ready(function(){
		$('.shipping_address_edit').on('click',function(){
			var address = $(this).attr('address');
			address = JSON.parse(address);
			// $('#shipping_united_state_checkbox').
			//$('#shipping_canada_checkbox').

			$('#shipping_first_name').val(address.name);
			$('#shipping_last_name').val(address.last_name);
			$('#shipping_company_name').val(address.company_name);
			$('#shipping_address_first').val(address.address);
			$('#shipping_address_second').val(address.address2);
			$('#shipping_city option[value='+address.city_id+']').prop('selected',true);
			$('#shipping_state option[value='+address.state_id+']').prop('selected',true);
			$('#shipping_zip_code').val(address.zip_code);
			$('#shipping_day_telephone').val(address.telephone);

		});
	});
</script>



<script type="text/javascript">
	// My Account all Dat
	//Shipping Address Data
	$('#main-shipping-address-div').on('click','.edit_address_para a.edit_shipp_address', function(event){
			$('.edit_shipping_address_form').removeClass('hidden');
			$('.edit_billing_address_form').addClass('hidden');
			$('.add_billing_address_form').addClass('hidden');
			$('.add_shipping_address_form').addClass('hidden');

			var address=$(this).attr('id');
			var address = JSON.parse(address);

			var address_id=$('#shipping_address_id').val(address.address_id);

			var fname=$('#shipping_first_name').val(address.name);
			var lname=$('#shipping_last_name').val(address.last_name);
			var companyname=$('#shipping_company_name').val(address.company_name);
			var add1=$('#shipping_address_first').val(address.address);
			var add2=$('#shipping_address_second').val(address.address2);
			var zipcode=$('#shipping_zip_code').val(address.zip_code);
			var telephone=$('#shipping_day_telephone').val(address.telephone);
			var ext=$('#shipping_ext').val(address.ext);
			var fax=$('#shipping_fax').val(address.fax);

				$('#shipping_city option[value='+address.city_id+']').prop('selected',true);
				$('#shipping_state option[value='+address.state_id+']').prop('selected',true);

				if(address.is_default_add==1){
					$('.shipping_default_ship_add').prop('checked',true);
				}else{
					$('.shipping_default_ship_add').prop('checked',false);
				}
				
			/*$('.s-edit-address').removeClass("hidden");*/

});


	$('.edit_shipping_address_form').on('click',".edit-ad-new .btn-save-changes",function(){

		var UnitedStates=$('#shipping_united_state_checkbox').is(':checked');
		var Canada=$('#shipping_canada_checkbox').is(':checked');

		if(UnitedStates==true){
		    var Country=190;
		} else {
		   var Country=35;
		}

		var is_default_add=$('.shipping_default_ship_add').is(':checked');
		var address_id=$('#shipping_address_id').val(); 
		var fname=$('#shipping_first_name').val();
		var lname=$('#shipping_last_name').val();
		var companyname=$('#shipping_company_name').val();
		var add1=$('#shipping_address_first').val();
		var add2=$('#shipping_address_second').val();
		var city=$('#shipping_city').val();
		var state=$('#shipping_state').val();
		var zipcode=$('#shipping_zip_code').val();
		var telephone=$('#shipping_day_telephone').val();
		var ext=$('#shipping_ext').val();
		// var fax=$('#shipping_fax').val();
		var customer_id = $('#editable_customer_id').val();

		form_data = new FormData();
		form_data.append('Country',Country);
		form_data.append('is_default_add',is_default_add); 
		form_data.append('address_id',address_id);
		form_data.append('fname',fname);
		form_data.append('lname',lname);
		form_data.append('companyname',companyname);
		form_data.append('add1',add1);
		form_data.append('add2',add2);
		form_data.append('city',city);
		form_data.append('state',state);
		form_data.append('telephone',telephone);
		form_data.append('zipcode',zipcode);
		form_data.append('ext',ext);
		// form_data.append('fax',fax);
		form_data.append('customer_id',customer_id);
		form_data.append( "_token", "{{ csrf_token() }}");

		$.ajaxSetup
		({
		    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
		});

		if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
		    $.ajax({
		    method: "POST",
		    // url: "/checkout-edit-address",
		    url: "/my-acc/shipp-address/edit",
		    dataType:'json',
		    cache: false,
		    contentType: false,
		    processData: false,
		    data: form_data,

		    success: function(data)
		    {    

		    	// alert(data.data.data.sections);
		    	var address_id = data.data.data.address_id;
		    	$('#delete_shipping_address_content_'+address_id).html('');
		    	// $('#delete_shipping_address_content_'+address_id).innerHTML=data.data.data.sections;
		        document.getElementById("delete_shipping_address_content_"+address_id).innerHTML=data.data.data.sections;
		        var address_id=$('#shipping_address_id').val(''); 
				var fname=$('#shipping_first_name').val('');
				var lname=$('#shipping_last_name').val('');
				var companyname=$('#shipping_company_name').val('');
				var add1=$('#shipping_address_first').val('');
				var add2=$('#shipping_address_second').val('');
				var city=$('#shipping_city').val('');
				var state=$('#shipping_state').val('');
				var zipcode=$('#shipping_zip_code').val('');
				var telephone=$('#shipping_day_telephone').val('');
				var ext=$('#shipping_ext').val('');
				// var fax=$('#shipping_fax').val('');

		        $('.edit_shipping_address_form').addClass('hidden');
    },

    error: function(data){
    }           
});


}
else{
     
     alert("Please enter all mandetory fileds!!!!");
}

	});





//

	$('#main-shipping-address-div').on('click','.edit_address_para a.make_default_shipping_address', function(event){
		alert('jsdf');
	var address_id = $(this).attr('address_id');
	var customer_id = $('#editable_customer_id').val();
	form_data = new FormData();
	form_data.append('address_id',address_id);
	form_data.append('customer_id',customer_id);
	form_data.append("_token", "{{csrf_token()}}");
	$.ajax({
    method: "POST",
    url: "/my-acc/shipp-address/make-default",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,

    success: function(data){
    	if(data!=""){
    		var address_id = data.data.data.address_id;
    		$('#append_edit_shipping_address_'+address_id).remove();
    		var address_id_current = $('.make_default_div_add_child').attr('address_id');
    		$('#append_edit_shipping_address_'+address_id_current).remove();
    		document.getElementById("make_default_div_add").innerHTML=data.data.data.sections;
    		
    		document.getElementById('div-ship-append').innerHTML=data.data.data.sections2;
    	}
    },
    error: function(data){

    }           
});
});


	$('#main-shipping-address-div').on('click','.edit_address_para a.remove_shipping_address', function(event){
		
	var address_id = $(this).attr('address_id');
	var customer_id = $('#editable_customer_id').val();
	form_data = new FormData();
	form_data.append('address_id',address_id);
	form_data.append('customer_id',customer_id);
	form_data.append("_token", "{{csrf_token()}}");
	$.ajax({
    method: "POST",
    url: "/my-acc/shipp-address/delete",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,

    success: function(data){    
    	if(data!=""){
    		if(data['success']=="true"){
    			var address_id = data['address_id'];
    			$('#append_edit_shipping_address_'+address_id).remove();
    			alert('Address Remove Successfully');
    		}else if(data['success']=="false"){
    			var address_id = data['address_id'];
    			alert("No Type of Address Available");
    		}
    	}	
    },
    error: function(data){

    }           
});
});

	//Cancel Shipping Address
	$('.edit_shipping_address_form').on("click",".new-add-cancel .btn_shipping_address_cancel",function(){
		$('.edit_shipping_address_form').addClass('hidden');
	});

</script>




























<script type="text/javascript">

	$('.main-shipping-address-div').on('click','.add_new_shipping_address',function(event){
		$('.add_shipping_address_form').removeClass('hidden');
		$('.edit_billing_address_form').addClass('hidden');
		$('.edit_shipping_address_form').addClass('hidden');
		$('.add_billing_address_form').addClass('hidden');
		

	});

	$('.add_shipping_address_form').on('click','.add_new_shipping_address_cancel .btn_shipping_address_cancel',function(){
		$('.add_shipping_address_form').addClass('hidden');
	});



//Add New Shipping Address
$('.add_shipping_address_form').on("click",'.add_new_shipping_address .btn-save-changes',function(event){
		var UnitedStates=$('#add_shipping_united_state_checkbox').is(':checked');
		var Canada=$('#add_shipping_canada_checkbox').is(':checked');
		if(UnitedStates==true){
		    var Country=190;
		}else
		{
		   var Country=35;
		}

		var is_default_add=$('#add_shipping_default').is(':checked');  
		var fname=$('#add_shippinng_first_name').val();
		var lname=$('#add_shipping_last_name').val();
		var companyname=$('#add_shipping_company_name').val();
		var add1=$('#add_shipping_first_address').val();
		var add2=$('#add_shipping_second_address').val();
		var city=$('#add_shipping_city').val();
		var state=$('#add_shipping_state').val();
		var zipcode=$('#add_shipping_zip_code').val();
		var telephone=$('#add_shipping_day_telephone').val();
		var ext=$('#add_shipping_ext').val();
		// var fax=$('#add_shipping_fax').val();
		var customer_id = $('#editable_customer_id').val();

		form_data = new FormData();
		form_data.append('Country',Country);
		form_data.append('is_default_add',is_default_add);
		form_data.append('fname',fname);
		form_data.append('lname',lname);
		form_data.append('companyname',companyname);
		form_data.append('add1',add1);
		form_data.append('add2',add2);
		form_data.append('city',city);
		form_data.append('state',state);
		form_data.append('telephone',telephone);
		form_data.append('zipcode',zipcode);
		form_data.append('ext',ext);
		// form_data.append('fax',fax);
		form_data.append('customer_id',customer_id);
		form_data.append( "_token", "{{ csrf_token() }}");

		/*for(var pair of form_data.entries()) {
		   console.log(pair[0]+ ', '+ pair[1]); 
		}
		*/

		$.ajaxSetup
		({
		    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
		});

		if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
		    $.ajax({
		    method: "POST",
		    url: "/my-acc/shipp-address/add",
		    dataType: 'json',
		    cache: false,
		    contentType: false,
		    processData: false,
		    data: form_data,
		    success: function(data)
		    {    
		 
		        	document.getElementById("div-ship-append").innerHTML=data.data.data;        	
			        $('.add_shipping_address_form').addClass("hidden");        
		    },

		     error: function(data){

		    }           
		});

		}
		else{     
		     alert("Please enter all mandetory fileds!!!!");
		}

});	

</script>


















<script type="text/javascript">
	//Billing Address All Concept
	$('.main-billing-address-div').on('click','.edit_address_para a.edit_bill_address', function(event){
		$('.edit_billing_address_form').removeClass('hidden');
		$('.edit_shipping_address_form').addClass('hidden');
		$('.add_billing_address_form').addClass('hidden');
		$('.add_shipping_address_form').addClass('hidden');


	var address=$(this).attr('id');
	var address = JSON.parse(address);
	var address_id=$('#billing_address_id').val(address.address_id);
	var fname=$('#billing_first_name').val(address.name);
	var lname=$('#billing_last_name').val(address.last_name);
	var companyname=$('#billing_company_name').val(address.company_name);
	var add1=$('#billing_address_first').val(address.address);
	var add2=$('#billing_address_second').val(address.address2);
	var zipcode=$('#billing_zip_code').val(address.zip_code);
	var telephone=$('#billing_day_telephone').val(address.telephone);
	var ext=$('#billing_ext').val(address.ext);
	var fax=$('#billing_fax').val(address.fax);
	$('#billing_city option[value='+address.city_id+']').prop('selected',true);
	$('#billing_state option[value='+address.state_id+']').prop('selected',true);
});





//Billing Address Save
$('.edit_billing_address_form').on('click','.bill_edit_address .btn-save-changes',function(){

var UnitedStates=$('#billing_united_state_checkbox').is(':checked');
var Canada=$('#billing_canada_checkbox').is(':checked');

if(UnitedStates==true){
    var Country=190;
}else
{
   var Country=35;
}

var address_id=$('#billing_address_id').val(); 
var fname=$('#billing_first_name').val();
var lname=$('#billing_last_name').val();
var companyname=$('#billing_company_name').val();
var add1=$('#billing_address_first').val();
var add2=$('#billing_address_second').val();
var city=$('#billing_city').val();
var state=$('#billing_state').val();
var zipcode=$('#billing_zip_code').val();
var telephone=$('#billing_day_telephone').val();
var ext=$('#billing_ext').val();
// var fax=$('#billing_fax').val();
var customer_id = $('#editable_customer_id').val();

form_data = new FormData();
form_data.append('Country',Country);
form_data.append('address_id',address_id);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append('customer_id',customer_id);
form_data.append( "_token", "{{ csrf_token() }}");


$.ajaxSetup
({
    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
    $.ajax({
    method: "POST",
    // url: "/checkout/edit/billing/address",
    url: "/my-acc/bill-address/edit",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(data){
    	var address_id = data.data.data.address_id;
    	$('#delete_billing_address_content_'+address_id).html('');
    	document.getElementById("delete_billing_address_content_"+address_id).innerHTML=data.data.data.sections;
        var address_id=$('#billing_address_id').val(''); 
		var fname=$('#billing_first_name').val('');
		var lname=$('#billing_last_name').val('');
		var companyname=$('#billing_company_name').val('');
		var add1=$('#billing_address_first').val('');
		var add2=$('#billing_address_second').val('');
		var city=$('#billing_city').val('');
		var state=$('#billing_state').val('');
		var zipcode=$('#billing_zip_code').val('');
		var telephone=$('#billing_day_telephone').val('');
		var ext=$('#billing_ext').val('');
		// var fax=$('#billing_fax').val('');
		var empty = "";
		$('.edit_billing_address_form').addClass('hidden');
		
    },

    error: function(data){
    }           
});

}
else{
     
     alert("Please enter all mandetory fileds!!!!");
}

});

//Remove Bill Address
$('.main-billing-address-div').on('click','.edit_address_para a.remove_bill_address', function(event){

	var address_id = $(this).attr('address_id');
	var customer_id = $('#editable_customer_id').val();
	form_data = new FormData();
	form_data.append('address_id',address_id);
	form_data.append('customer_id',customer_id);
	form_data.append( "_token", "{{ csrf_token() }}");

	$.ajax({
    method: "POST",
    url: "/my-acc/bill-address/delete",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,

    success: function(data){    

    	if(data!=""){
    		if(data['success']=="true"){
    			var address_id = data['address_id'];
    			$('#append_edit_billing_address_'+address_id).remove();
    			alert('Address Remove Successfully');
    		}else if(data['success']=="false"){
    			var address_id = data['address_id'];
    			alert("No Type of Address Available");
    		}
    	}
    	
    },

    error: function(data){

    }           
});
});

//Cancel Billing Edit btn

$('.edit_billing_address_form').on('click','.bill_edit_cancel .btn_billing_address_cancel',function(){
	$('.edit_billing_address_form').addClass('hidden');
});
</script>




<script type="text/javascript">
	//Add Billing Address
	$('.main-billing-address-div').on('click','button.addNewBillingAddress',function(){
		$('.add_billing_address_form').removeClass('hidden');
		$('.edit_billing_address_form').addClass('hidden');
		$('.edit_shipping_address_form').addClass('hidden');
		$('.add_shipping_address_form').addClass('hidden');
	});

	$('.add_billing_address_form').on('click','.add_new_billing_cancel .cancel_new_billing_address',function(){
		$('.add_billing_address_form').addClass('hidden');
	});





	$('.add_billing_address_form').on('click','.add_new_billing_address .btn-save-changes',function(){

				var UnitedStates=$('#add_billing_united_state_checkbox').is(':checked');
				var Canada=$('#add_billing_canada_checkbox').is(':checked');
				if(UnitedStates==true){
				    var Country=190;
				}else
				{
				   var Country=35;
				}

				var fname=$('#add_billing_first_name').val();
				var lname=$('#add_billing_last_name').val();
				var companyname=$('#add_billing_company_name').val();
				var add1=$('#add_billing_address_first').val();
				var add2=$('#add_billing_address_second').val();
				var city=$('#add_billing_city').val();
				var state=$('#add_billing_state').val();
				var zipcode=$('#add_billing_zipcode').val();
				var telephone=$('#add_billing_day_telephone').val();
				var ext=$('#add_billing_Ext').val();
				// var fax=$('#add_billing_Fax').val();
				var customer_id = $('#editable_customer_id').val();

				form_data = new FormData();
				form_data.append('Country',Country);
				form_data.append('fname',fname);
				form_data.append('lname',lname);
				form_data.append('companyname',companyname);
				form_data.append('add1',add1);
				form_data.append('add2',add2);
				form_data.append('city',city);
				form_data.append('state',state);
				form_data.append('telephone',telephone);
				form_data.append('zipcode',zipcode);
				form_data.append('ext',ext);
				// form_data.append('fax',fax);
				form_data.append('customer_id',customer_id);
				form_data.append( "_token", "{{ csrf_token() }}");


				$.ajaxSetup
				({
				    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
				});

				if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
				    $.ajax({
				    method: "POST",
				    url: "/my-acc/bill-address/add",
				    dataType: 'json',
				    cache: false,
				    contentType: false,
				    processData: false,
				    data: form_data,

				    success: function(data){
				        	document.getElementById("div-bill-address-append").innerHTML=data.data.data;        
				        $(".billing-address").addClass("hidden");
				    },

				    error: function(data){
				    }           
				});

				}
				else{     
				     alert("Please enter all mandetory fileds!!!!");
				}


	});





		//save billing address ===========================================================




</script>

<script type="text/javascript">
                                     	$(document).ready(function(){
                                     		$('#add_billing_united_state_checkbox').on('click',function(){
                                     			if($(this).is(":checked")){
                                     				$('#add_billing_canada_checkbox').prop('checked',false);
                                     			}else{
                                     				$('#add_billing_canada_checkbox').prop('checked',true);                                     				
                                     			}
                                     		});

                                     		$('#add_billing_canada_checkbox').on('click',function(){
                                     			if($(this).is(":checked")){
                                     				$('#add_billing_united_state_checkbox').prop('checked',false);
                                     			}else{
                                     				$('#add_billing_united_state_checkbox').prop('checked',true);                                     				
                                     			}
                                     		});
                                     	});
</script>

<script type="text/javascript">
													$(document).ready(function(){
														$('#billing_united_state_checkbox').on('click',function(){
															if($(this).is(":checked")){
																$('#billing_canada_checkbox').prop('checked',false);
															}else{
																$('#billing_canada_checkbox').prop('checked',true);
															}
														});

														$('#billing_canada_checkbox').on('click',function(){
															if($(this).is(":checked")){
																$('#billing_united_state_checkbox').prop('checked',false);
															}else{
																$('#billing_united_state_checkbox').prop('checked',true);
															}
														});
														
													});
</script>

<script type="text/javascript">
                                    	$(document).ready(function(){
                                    		$('#add_shipping_united_state_checkbox').on('click',function(){
                                    			if($(this).is(':checked')){
                                    				$('#add_shipping_canada_checkbox').prop("checked",false);
                                    			}else{
                                    				$('#add_shipping_canada_checkbox').prop("checked",true);
                                    			}
                                    		});

                                    		$('#add_shipping_canada_checkbox').on('click',function(){
                                    			if($(this).is(':checked')){
                                    				$('#add_shipping_united_state_checkbox').prop("checked",false);
                                    			}else{
                                    				$('#add_shipping_united_state_checkbox').prop("checked",true);
                                    			}
                                    		});
                                    		
                                    	});
</script>




@endsection






