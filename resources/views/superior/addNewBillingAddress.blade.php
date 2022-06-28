@section('addNewBillAddress')
												<!-- bill start -->
												<div class="row" style="margin-top: 15px;" id="append_edit_billing_address_{{$address_new->address_id}}">
													<div class="col-md-12" id="delete_billing_address_content_{{$address_new->address_id}}">
														<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
															<div class="row">
																<!-- <div class="col-md-1">
																	<input type="checkbox" name="" style="width: 20px; height: 20px;">
																</div> -->
																<div class="col-md-12">
																	<p><b>{{$address_new->name}}</b></p>
																	<p>{{$address_new->address}}</p>
																	<p>Phone Number :  {{$address_new->telephone}}</p>
																	<p class="mb-2">
																	<a class="a_proof_color" href="javascript:void(0);">
																		Add Delivery Instructions
																	</a>
																</p>
																	<p class="edit_address_para">
																		<a class="a_proof_color edit_bill_address" href="javascript:void(0);" id="{{$address_new}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;
																		<!-- <a class="a_proof_color" class="a_proof_color" href="javascript:void(0);">Make Default</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
																		<a class="a_proof_color remove_bill_address" href="javascript:void(0);" address_id="{{$address_new->address_id}}">Remove</a>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- bill end -->
@endsection