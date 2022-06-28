@section('unMakeDefaultShippAddress')
	<div class="row shipping-address-show" style="margin-top: 15px;" id="append_edit_shipping_address_{{$address->address_id}}">
													<div class="col-md-12" id="delete_shipping_address_content_{{$address->address_id}}">
														<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
															<div class="row">
																<!-- <div class="col-md-1">
																	<input type="checkbox" name="" style="width: 25px; height: 25px;">
																</div> -->
																<div class="col-md-12">
																	<p><b>{{$address->name}}</b></p>
																	<p>{{$address->address}}</p>
																	<p>Phone Number :  {{$address->telephone}}</p>
																	<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
																	<p class="edit_address_para">
																		<a class="a_proof_color edit_shipp_address" href="javascript:void(0);" id="{{$address}}" address="{{$address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;
																		
																			<a class="a_proof_color make_default_shipping_address make_default_shipping_address_{{$address->address_id}}" href="javascript:void(0);" address_id="{{$address->address_id}}">	Make Default
																				
																			</a>
																		
																		&nbsp;&nbsp;&nbsp;&nbsp;
																		<a class="a_proof_color remove_shipping_address" href="javascript:void(0);" address_id="{{$address->address_id}}">Remove</a>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
@endsection