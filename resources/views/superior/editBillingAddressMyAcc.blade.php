@section('editBillAddressMyAcc')
														<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
															<div class="row">
																<!-- <div class="col-md-1">
																	<input type="checkbox" name="" style="width: 20px; height: 20px;">
																</div> -->
																<div class="col-md-12">
																	<p><b>{{$address->name}}</b></p>
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
@endsection