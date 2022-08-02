@section('search-ord-hist')


	@php

	$order = $order_history;

	@endphp

	<br><br>

                    				@if($order->orderitems!="[]")

                    				@foreach($order->orderitems as $orderitem)





										<div class="order-placed-content">
											<!-- row start -->
											<div class="row order-placed-content-header">
												<div class="col-12 col-md-2 col-lg-2">
													<p class="order-place-paragraph-title">Order Placed</p>
													<p class="order-place-paragraph-value">
														
															

															<?php echo date("m-d-Y", strtotime($orderitem->created_at)); ?>
														
														
															

														</p>
												</div>
												<div class="col-12 col-md-2 col-lg-2">
													<p class="order-place-paragraph-title">Total</p>
													<p class="order-place-paragraph-value">${{$orderitem->item_price}}</p>
												</div>
												<div class="col-12 col-md-2 col-lg-2">
													<p class="order-place-paragraph-title">Ship To</p>
													<select class="order-placed-select-box order-place-paragraph-value">
														<option disabled="">select</option>
														<option class="" selected="">Boris Kagan</option>
														<option>Kagan</option>
													</select>
												</div>
												<div class="col-12 col-md-2 col-lg-2">
													<p class="order-place-paragraph-title">In Hand Date</p>
													<p class="order-place-paragraph-value">
														
														@php

															if($orderitem->received_date=="ASAP"){
																$received_date = $today_current_date;

															}else{
																$received_date = $orderitem->received_date;
															}

														@endphp
														
														{{$received_date}}

													</p>
												</div>
												<div class="col-12 col-md-4 col-lg-4 text-right">
													<p class="order-place-paragraph-title">Order #{{$orderitem->order_id}}</p>
												</div>
											</div>
											<!-- row end -->

											


										<!-- order-placed-content-body start -->
										<div class="order-placed-content-body">

											<!-- order-history-content-main start  -->
											<div class="order-history-content-main">

												<div class="order-history-content order-history-content-{{$orderitem->id}} row">



														<div class="col-sm-12 col-md-9 col-lg-9 col-12 order-history-content-col">
															<p class="d-inline-block mt-2 item_content_para">Item - #<span style="font-weight: 500;">


																@if($orderitem!="")
																	@if($orderitem->product!="")
																		{{$orderitem->product->product_id}}
																	@endif
																@endif

															</span></p>

															@if($orderitem!="")
																@if($orderitem->stage!="")
																	<p class="d-inline-block ml-5 item_content_para">
																		Current Status : <span style="font-weight: 500;">{{$orderitem->stage->name}}</span>
																	</p>
																@endif
															@endif


															<div class="clearfix"></div>
															<div class="row">
																<div class="col-3">
																	@if($orderitem!="")
																		@if($orderitem->product!="")
								                							<img src="/storage/app/{{$orderitem->product->product_image}}">
								                						@else
								                							<img src="/files/assets/images/product.png">
								                						@endif
								                					@else
								                						<img src="/files/assets/images/product.png">
																	@endif


																</div>
																<div class="col-6">
																	<br>
																	<br>
																	<br>
																	<p class="normal-text-content">
																		@if($orderitem!="")
																			@if($orderitem->product!="")
																				@if($orderitem->product_translation!="")
																					{{$orderitem->product->product_translation->product_name}}
																				@endif
																			@endif
																		@endif

																	</p>
																	<div class="d-inline-flex">
																		<!-- <input class="reorder_checkbox_reorder_request" type="checkbox" name="reorder_request" order_id="{{$order->id}}" style="width: 25px;height: 25px;">&nbsp;&nbsp;<span class="normal-text-content" style="margin-top: 5px;">Reorder</span> -->
																		<button class="reorder-btn reorder_single_element" order_id="{{$order->id}}">Reorder</button>
																	</div>
																	
																</div>
															</div>
														</div>





														<div class="col-sm-12 col-md-3 col-lg-3 col-12">
															<button class="mt-2 btn-track-shipment">Track Shipment</button>
															<button class="btn-ord">View Order Confirmation</button>
															<button class="btn-view-order-detail" order_item_id="{{$orderitem->id}}">View Order Details</button>
															<button class="btn-ord ">View / Print Invoice</button>
															<button class="btn-ord btn_order_history_view_art_proofs" order_id="{{$orderitem->order_id}}" order_item_id="{{$orderitem->id}}">View Art Proofs</button>
															<button class="btn-ord">Write Product Reviews</button>
														</div>
												</div>
												<br><br>
												<!-- view-order-details-row start -->

												<div class="row view-order-details-row view-order-details-row-{{$orderitem->id}}" >
														<div class="col-12">
															<div class="row">
																<div class="col-6"><h3 class="text-left sub-reference">Sub-Reference #{{$orderitem->id}}</h3></div>
																<div class="col-6">
																	<h3 class="text-right sub-reference">Detail - Item #{{$orderitem->product_id}}</h3>
																</div>
															</div>	
															
															
														</div>
														<div class="clearfix">
															
														</div>
												          <div class="col-sm-4 col-12 text-left imprint-option">
												              <h5 class="heading-size-height-weight-18-21-bold">Imprint Option & Artwork</h5>
												              <div class="recipient-info my-2">


												              	@if($orderitem->cart_item!="")
												              		
												              		
												              		@if($orderitem->cart_item->cartitemimprint!="[]")
												              			
												              			@foreach($orderitem->cart_item->cartitemimprint as $cartitemimprint)

													                      <p><span class="span-normal">Location :</span> <span class="span-500">{{$cartitemimprint->imprint_name}}</span></p>

													                      
													                     
													                     	@if($cartitemimprint->cartitemimprintcolors!="[]")
													                     		@foreach($cartitemimprint->cartitemimprintcolors as $cartitemimprintcolor)

													                     			<p>
															                      	<span class="span-normal">
															                      			Color #{{$cartitemimprintcolor->color_id}} :
															                      	</span><span class="span-500">{{$cartitemimprintcolor->name}}</span>
														                  		</p>

													                     		@endforeach
													                     	@endif



													                     @endforeach

												                     @endif
												              		
												                @endif

												                      <!-- <p><span class="span-normal">Location :</span><span class="span-500">Back</span></p>
												                      <p><span class="span-normal">Color # 1 : </span><span class="span-500">Red</span></p> -->
												                      <br>


												                      <p class="heading-size-height-weight-18-21-bold">Art Comments:</p>
												                      <p class="heading-size-height-weight-18-21-normal">Please center the logo</p>
												                      <br>
												                      <p><span class="span-normal">In-Hand Date : </span>
												                      	<span class="span-500">
												                      		@php
												                      		if($orderitem->received_date=="ASAP"){
																				$received_date_in_hand = $today_current_date;

																			}else{
																				$received_date_in_hand = $orderitem->received_date;
																			}


																			@endphp

																			{{$received_date_in_hand}}


												                      	</span>
												                  		</p>
												                      <p><span class="span-normal">Using your own <br>shipper account:</span><span class="span-500">
												                      	@if($orderitem->own_account_number!="")
												                      		Yes, {{$orderitem->own_account_number}}
												                      	@else
												                      		No
												                      	@endif
												                      </span></p>
												                     
												                      
												              </div>
												              
												          </div>

												          

												          <div class="col-sm-4 col-12 text-left ship-to">
												          	 <h5 class="heading-size-height-weight-18-21-bold">Ship To</h5>
												              <div class="recipient-info my-2">
												                      <!-- <p><span class="span-normal">Boris Kagan</span></p>
												                      <p><span class="span-normal">Sperior Promos</span></p>
												                      <p><span class="span-normal">72923 Main st Main</span></p>
												                      <p><span class="span-normal">NJ07522</span></p> -->


												                      <p><span class="span-normal">{{$orderitem->shipping_first_name}} {{$orderitem->shipping_last_name}} <br>
										                    			{{$orderitem->shipping_address_line_1}}
										                    			<br>
										                    			@if($orderitem->shipping_city!="") 
										                    				{{$orderitem->shipping_city}}, 
										                    			@endif

										                    			@if($orderitem->shipping_state!="")
										                    			 	{{$orderitem->shipping_state}},
										                    			 	<br> 
										                    			@endif
										                    			 
										                    			 @if($orderitem->shipping_country!="")
										                    			 	{{$orderitem->shipping_country}}, 
										                    			 @endif

										                    			{{$orderitem->shipping_zip}}</span></p>

												                      
												                      <br>
												                      <p>
												                      	<span class="span-normal">Current Status :</span>
												                      	<span class="span-500">
												                      		@if($orderitem->stage!="")
												                      			{{$orderitem->stage->name}}
												                      		@endif
												                      	</span>
												                      </p>

												                      <p>
												                      	<span class="span-normal">Date Shipped :</span>
												                      	<span class="span-500">10/26/2021</span>
												                  	  </p>
												                      <p>
												                      	<span class="span-normal">Shipping Courier :</span>
												                      	<span class="span-500">UPS</span>
												                      </p>
												                      <p>
												                      		@php
												                      			if($orderitem->tracking_informations!="[]"){
												                      				$tracking_info = $orderitem->tracking_informations->first();
												                      			}else{
												                      				$tracking_info = "";
												                      			}

												                      		@endphp
												                      	<span class="span-normal">Tracking # :</span> 
												                      	<span class="span-500">
												                      			@if($tracking_info!="")
												                      				{{$tracking_info->tracking_number}}
												                      			@endif
												                      	</span>
												                      </p>
												              </div>
												              
												          </div>
												          <div class="col-sm-4 col-12 text-left pricing-summary">
												              <h5 class="heading-size-height-weight-18-21-bold">Pricing Summary</h5>
												              <div class="company-info my-2">
												                      <p><span class="span-normal">Quantity :</span><span class="span-500">{{$orderitem->quantity}}</span></p>

												                      <p><span class="span-normal">Unit Price :</span><span class="span-500">${{$orderitem->item_price}}</span></p>

												                      	@if($orderitem->cart_item!="")
												              				@if($orderitem->cart_item->cartitemimprint!="[]")
												              					@foreach($orderitem->cart_item->cartitemimprint as $cartitemimprint)



												                      				

												                      				@if($cartitemimprint->cartitemimprintcolors!="[]")
															                     		@foreach($cartitemimprint->cartitemimprintcolors as $cartitemimprintcolor)

															                     			<p><span class="span-normal">{{$cartitemimprint->imprint_name}} ({{$cartitemimprintcolor->name}}) setup fee :</span><span class="span-500">${{$cartitemimprint->setup_price}}</span></p>

															                     		@endforeach
														                     	@endif




												                      			@endforeach
												                      		@endif
												                      	@endif

												                      <!-- <p><span class="span-normal">Back (Black) setup fee :</span><span class="span-500">$50.00</span></p> -->

												                      <p><span class="span-normal">Shipping :</span><span class="span-500"> @if($orderitem->shipping_price) ${{$orderitem->shipping_price}} @endif</span></p>
												                      <p><span class="span-normal"><b>Item Total : </b></span><span class="span-500">${{$orderitem->price}}</span></p>
												              </div>


												             
												          </div>
												      <div class="col-12 text-right">
												      		<button class="view-order-detail-btn-close" order_item_id="{{$orderitem->id}}">close</button>
												      </div>
												      
												</div>
												<!--  view-order-details-row end -->

												<!-- View Art Proof Details Start -->
												


												<div class="  view-art-proofs-row view-art-proofs-row-{{$orderitem->id}} hidden">

													@if($orderitem!="")
														@if($orderitem->artproofs!="[]")
															@foreach($orderitem->artproofs as $artproof)


													<div class="art-proof-seperate row">
														<div class="col-12">
															<div class="row">
																<div class="col-6"><h3 class="text-left sub-reference">Art Proofs For - Item #{{$orderitem->product_id}} </h3></div>
															</div>	
															
															
														</div>
														<div class="clearfix">
															
														</div>

														
														<!-- pending art proofs start -->
														<div class="col-12  pendign_art_proof_change_{{$artproof->id}}">
															
														</div>

														@if($artproof->approved==2)
														<div class="col-12 pending_befor_art_proof_{{$artproof->id}}">

															<div class="row"  style="margin-left: 10px;margin-right: 10px;">

																<div class="col-3">
																	<p>Artproof #{{$artproof->id}}</p>
																</div>

																<div class="col-3">
																	<p><?php echo date("m-d-Y", strtotime($artproof->created_at)); ?></p>

																</div>

																<div class="col-3">
																	<a href="/storage/app/{{$artproof->path}}" target="_blank">
																	<p>
																		<i class="fa fa-file-pdf-o preview_pdf_class" aria-hidden="true" style=""></i> &nbsp; <span style="color: #68bee5;">Preview PDF</span> 
																	</p>
																	</a>
																</div>

																<div class="col-3">
																	<p class="pending_art_proof_collapse" artproof_id="{{$artproof->id}}">
																		<span class="text-font_weight-500 pending_change_order_history_name_art_proof_{{$artproof->id}}" style="color: #FF7A00;">Pending</span>
																		<span class="text-success text-font_weight-500 approved_change_order_history_name_art_proof_{{$artproof->id}} hidden">Approved</span>
																		<span class="text-danger ext-font_weight-500 delclined_change_order_history_name_art_proof_{{$artproof->id}} hidden">Declined</span>
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  class="text-right">
																		<img id="pending_collapse_image_up_down_{{$artproof->id}}" class="d-inline" src="/resources/views/superior/assets/images/down-collapse.png"></span>
																	</p>
																</div>
															</div>

															

															<div id="pending_artproof_div_{{$artproof->id}}" class="row hidden art_proof_content_all">
																<div class="col-12">
																	<p class="pending_note_from_art_department_{{$artproof->id}}">Note from Art Department : <span class="text-font-weight-500">Proof</span></p>
																	<textarea style="width: 72rem;padding-left: 5px;padding-top: 5px; border-radius: 5px;" rows="3" class="art_proof_customer_note_{{$artproof->id}}"></textarea><br>
																	<div class="d-inline-flex pendign_terms_conditions_{{$artproof->id}}">
																		<input type="checkbox" class="checkbox art_prooof_order_history_terms_conditions_{{$artproof->id}}" name="">&nbsp;&nbsp;&nbsp;<span>I agree to the terms and conditions of <span style="color:#68bee5;"><a href="javascript:void(0);" class="a_proof_color" data-toggle="modal" data-target="#ArtProofTermsAndConditions">Art Approval</a></span></span>
																	</div>
																	

																	<div class="approved_declined_button_list_{{$artproof->id}}">
																		<button class="order-history-art-proof-detail-approved" artproof_id="{{$artproof->id}}">Approved</button>
																		<button class="order-history-art-proof-detail-decline" artproof_id="{{$artproof->id}}">Decline</button>
																	</div>
																	
																</div>
															</div>


															<hr style="max-width: 1679px;margin: 2rem 1rem 1rem 1rem; border: 0;border-top: 1px solid #dfdfdf;">
														</div>
														@endif
														<!-- pending art proofs end -->







														<!-- Approved Art proofs start -->
														@if($artproof->approved==1)
														<div class="col-12">
															<div class="row"  style="margin-left: 10px;margin-right: 10px;">
															<div class="col-3">
																<p>Artproof #{{$artproof->id}}</p>
															</div>
															<div class="col-3">
																<p><?php echo date("m-d-Y", strtotime($artproof->created_at)); ?></p>
															</div>
															<div class="col-3">
																<a href="/storage/app/{{$artproof->path}}" target="_blank">
																<p>
																	<i class="fa fa-file-pdf-o preview_pdf_class" aria-hidden="true"></i> &nbsp; <span style="color: #68bee5;">Preview PDF</span> 
																</p>
															</a>
															</div>
															<div class="col-3">
																<p class="approved_art_proof_collapse" artproof_id="{{$artproof->id}}"><span class="text-success text-font_weight-500">Approved</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right"><!-- <i class="fa fa-angle-down" aria-hidden="true"></i> --><img id="approved_collapse_image_up_down_{{$artproof->id}}" class="d-inline" src="/resources/views/superior/assets/images/down-collapse.png"></span></p>
															</div>
															</div>


															<div id="approved_artproof_div_{{$artproof->id}}" class="hidden art_proof_content_all row">
																<div class="col-12">
																	<!-- <textarea style="width: 72rem;padding-left: 5px;padding-top: 5px;border-radius: 5px;" rows="3"></textarea><br> -->

																	<div style="width: 72rem;height:64px;padding-left: 5px;padding-top: 5px;border-radius: 5px;border: 1px solid #dfdfdf;">
																		<?php echo $artproof->customer_note; ?>
																	</div><br>
																</div>
															</div>


															<hr style="max-width: 1679px;margin: 2rem 1rem 1rem 1rem; border: 0;border-top: 1px solid #dfdfdf;">
														</div>
														@endif
														<!-- Approved Art proofs end -->



														<!-- Declined Art proofs start -->
														@if($artproof->approved==0)
														<div class="col-12">
															<div class="row"  style="margin-left: 10px;margin-right: 10px;">
															<div class="col-3">
																<p>Artproof #{{$artproof->id}}</p>
															</div>
															<div class="col-3">
																<p><?php echo date("m-d-Y", strtotime($artproof->created_at)); ?></p>
															</div>
															<div class="col-3">
																<a href="/storage/app/{{$artproof->path}}" target="_blank">
																<p>
																	<i class="fa fa-file-pdf-o preview_pdf_class" aria-hidden="true" ></i> &nbsp; <span style="color: #68bee5;">Preview PDF</span> 
																</p>
															</a>
															</div>
															<div class="col-3">
																<p class="declined_art_proof_collapse" artproof_id="{{$artproof->id}}"><span class="text-danger ext-font_weight-500">Declined</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right"><img id="declined_collapse_image_up_down_{{$artproof->id}}" class="d-inline" src="/resources/views/superior/assets/images/down-collapse.png"></span></p>
															</div>
															</div>


															<div id="delined_art_proof_div_{{$artproof->id}}" class="row hidden art_proof_content_all" >
																<div class="col-12">
																	
																	<!-- <textarea style="width: 72rem;padding-left: 5px;padding-top: 5px;border-radius: 5px;" rows="3"></textarea><br> -->

																	<div style="width: 72rem;height:64px;padding-left: 5px;padding-top: 5px;border-radius: 5px;border: 1px solid #dfdfdf;">
																		<?php echo $artproof->customer_note; ?>
																	</div><br>
																	
																	
																	
																</div>
															</div>


															<hr style="max-width: 1679px;margin: 2rem 1rem 1rem 1rem; border: 0;border-top: 1px solid #dfdfdf;">
														</div>
														@endif
														<!-- Declined Art proofs end -->

														<!-- <div class="col-12 text-right">
															<button class="order-history-art-proof-close-btn mr-5" order_id="{{$orderitem->order_id}}">Close</button>
														</div>
														 -->
														
												         

												          

												          
												          
												      </div>




												      	@endforeach

												      	@else

												      	<div class="empty_artproofs_height">
												      		<p class="text-info text-center mt-5">No Artproofs Found</p>
												      	</div>
												      @endif
												    @endif
												    <div class="row">
												    <div class="col-12 text-right">
															<button class="order-history-art-proof-close-btn mr-5" order_item_id="{{$orderitem->id}}">Close</button>
														</div>
														</div>
												</div>
												<!-- View Art Proof Details Start -->

											</div>
											<!-- order-history-content-main end -->

											<!-- view order detail content start -->
											<!-- <div class="view-order-detail-content">
												

											</div> -->
											<!-- view order detail content end -->
												

										</div>
											<!-- order-placed-content-body end -->
										</div>

										@endforeach

										@endif


@endsection