@section('makeDefaultShippAddress')
											<div class="row make_default_div_add_child" style="margin-top: 15px;" id="append_edit_shipping_address_{{$user_address->address_id}}" address_id="{{$user_address->address_id}}">
													<div class="col-md-12" id="delete_shipping_address_content_{{$user_address->address_id}}">
														<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
															<div class="row">
																<!-- <div class="col-md-1">
																	<input type="checkbox" name="" style="width: 20px; height: 20px;">
																</div> -->
																<div class="col-md-12">
																	<p><b>{{$user_address->name}}</b></p>
																	<p>{{$user_address->address}}</p>
																	<p>Phone Number :  {{$user_address->telephone}}</p>
																	<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
																	<p class="edit_address_para d-inline-block">
																		<a class="a_proof_color edit_shipp_address d-inline-block" href="javascript:void(0);" id="{{$user_address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;


																		<!-- @if($user_address->is_shipping=="0")
																		<a class="a_proof_color make_default_shipping_address" href="javascript:void(0);" id="">Make Default</a>
																		@else
																		<a class="a_proof_color" class="a_proof_color" href="javascript:void(0);">Default</a>
																		@endif -->


																		<div class="make_and_unmake_div_{{$user_address->address_id}} d-inline-block">
																			
																				@if($user_address->is_shipping=="0")

																					<a class="a_proof_color make_default_shipping_address make_default_shipping_address_{{$user_address->address_id}} " href="javascript:void(0);" id="" address_id="{{$user_address->address_id}}" >Make Default</a>

																				@else
																				
																					<a class="a_proof_color default_value default_value_{{$user_address->address_id}}" href="javascript:void(0);" address_id="{{$user_address->address_id}}">Default</a>

																				@endif

																		</div>


																		&nbsp;&nbsp;&nbsp;&nbsp;


																		<a class="a_proof_color remove_shipping_address" href="javascript:void(0);" address_id="{{$user_address->address_id}}">Remove</a>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
@endsection