@section('reorderRequestItems')
<script type="text/javascript">
	$(".datepicker").datepicker();
</script>
							@if($orders!="[]")
								@foreach($orders as $order)
											<div class="row item-list">
												@if($order->order_item!="")
													@if($order->order_item->product!="")
														<div class="col-2">
															<img class="product-img" src="{{$base_url}}/storage/app/{{$order->order_item->product->product_image}}">
														</div>
													@endif
												@endif

												<div class="col-3">
													<p>Item : </p>
													<p>Product Name : </p>
													<p>Status : </p>
												</div>

												<div class="col-7" style="float:left">
													@if($order->order_item!="")

														@if($order->order_item->product!="")
															<p class="text-font-weight-500">
																#{{$order->order_item->product->product_id}}

															</p>
														@endif
													@endif


													@if($order->order_item!="")
														@if($order->order_item->product!="")	
															@if($order->order_item->product->product_translation!="")
																<p class="text-font-weight-500">
																	{{$order->order_item->product->product_translation->product_name}}
																</p>
															@endif
														@endif
													@endif


													@if($order->order_item!="")
														@if($order->order_item->stage!="")
															<p class="text-font-weight-500">
																New Order Received - {{$order->order_item->stage->name}}
															</p>
														@endif
													@endif
												</div>
											</div>
											<br>
										
											@php 

										if($order->order_item!=""){
											$product_id_for_quantity_change = $order->order_item->product_id;
										}else{
											$product_id_for_quantity_change = '';
										}
									@endphp
											
								<div class="row"> <!-- Row Start -->
									<!-- col-6 start -->
									<div class="col-7 questions-main">
										<div class="row question-content-row">
											<div class="col-12">
												<p class="text-font-weight-500">
													Are the contents of this reorder going to be exactly the same?
												</p>
											</div>
											<div class="col-12 d-inline-flex">
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx exactly_same_checkbox_yes exactly_same_checkbox_yes_{{$order->id}}" order_id="{{$order->id}}" checked="">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx exactly-same-no-checkbox exactly-same-no-checkbox-{{$order->id}}" order_id="{{$order->id}}" product_id="{{$product_id_for_quantity_change}}">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>
											</div>
										</div>
										<div class="row question-content-row">
											<div class="col-12">
												<p class="text-font-weight-500">When do you need this order delivered by?</p>
											</div>
											<div class="col-12" style="display:inline-flex;">
												
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx order_delivered_by_checkbox_yes order_delivered_by_checkbox_yes_{{$order->id}}" order_id="{{$order->id}}" checked="">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">ASAP</p>&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx order_delivered_by_No_checkbox order_delivered_by_No_checkbox_{{$order->id}}" order_id="{{$order->id}}" style="margin-left: -13px;">&nbsp;&nbsp;<p class="text-font-weight-normal">SPECIFIC DATE</p>
												
											</div>
										</div>

										<div class="row question-content-row">
											<div class="col-12">
												<p class="text-font-weight-500">Is the shipping address for this order the same as before?</p>
											</div>
											<div class="col-12" style="display:inline-flex;">
												
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx ship_addr_ord_same_as_before_checkbox_yes ship_addr_ord_same_as_before_checkbox_yes_{{$order->id}}" order_id="{{$order->id}}" checked="">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="" class=" check-radio reorder-request-checkobx shipp_addr_ord_same_as_befr_checkbox shipp_addr_ord_same_as_befr_checkbox_{{$order->id}}" order_id="{{$order->id}}">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>
												
											</div>
										</div>

										<div class="row question-content-row">
											<div class="col-12">
												<p class="text-font-weight-500">Is the billing address for this order the same as before?</p>
											</div>
											<div class="col-12" style="display:inline-flex;">
												
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx bill_addr_ord_same_as_befr_checkbox_yes bill_addr_ord_same_as_befr_checkbox_yes_{{$order->id}}" order_id="{{$order->id}}" checked="">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx bill_addr_ord_same_as_befr_checkbox bill_addr_ord_same_as_befr_checkbox_{{$order->id}}" order_id="{{$order->id}}">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>
												
											</div>
										</div>

										<div class="row question-content-row">
											<div class="col-12">
												<p class="text-font-weight-500">Should the same payment on file be used for this reorder?</p>
											</div>
											<div class="col-12" style="display:inline-flex;">
												
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx same_payment_reorder_checkbox_yes same_payment_reorder_checkbox_yes_{{$order->id}}" order_id="{{$order->id}}" checked="">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="" class="check-radio reorder-request-checkobx same_payment_reorder_checkbox same_payment_reorder_checkbox_{{$order->id}}" order_id="{{$order->id}}">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>
												
											</div>
										</div>

										<!-- <div class="row question-content-row">
											<div class="col-12">
												<p class="text-font-weight-500">
													Specific Comments about your reorder (shipping, billing , design etc..)
												</p>
											</div>
											<div class="col-12">
												<textarea class="reorder-request-textarea" rows="7" cols="75" placeholder="Write your comment"></textarea>
											</div>
										</div>
 -->
										<div class="row" style="margin-top:10px;">
											
											<div class="col-12">
												<button class="btn-reorder-request btn-reorder-request-back" order_id="{{$order->id}}">Back</button>
												<button class="btn-reorder-request btn-reorder-request-clear" order_id="{{$order->id}}">Clear</button>

												@if($order->order_item!="")
													@if($order->order_item->product!="")
														<button class="btn-reorder-request submit_reorder_request_button" order_id="{{$order->id}}" product_id="{{$order->order_item->product->product_id}}">
															Submit Reorder Request
														</button>
													@endif
												@endif


											</div>
										</div>
										<br>
										<br>
										<br>
										</div>
									<!-- col-6 end -->

									
							<div class="col-5 all_reorder_content_data_show_{{$order->id}}">

								
									<!-- start Exactly Same No-->
									<div class="exactly-same-no exactly-same-no-{{$order->id}} hidden" style="margin-right: -1px;margin-left: -15px;">
										<!-- <p class="text-font-weight-500">Is the quantity going to change?</p>
										<div class="row">
											<div class="col-12 d-inline-flex">
												<input type="checkbox" name="" class="checkbox exactly_same_is_quantity_change_yes exactly_same_is_quantity_change_yes_{{$order->id}}" order_id="{{$order->id}}">&nbsp;&nbsp;
												<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="" class="checkbox exactly_same_is_quantity_change_no exactly_same_is_quantity_change_no_{{$order->id}}" order_id="{{$order->id}}" checked="">&nbsp;&nbsp;
												<p style="margin-top: 5px;">No</p>
											</div>



											<div class="pricing_table_quantity_color_imprint_artwork pricing_table_quantity_color_imprint_artwork_{{$order->id}}" id="pricing_table_quantity_color_imprint_artwork_{{$order->id}}" order_id="{{$order->id}}">
												
											

											</div>
										</div> -->
										<div class="pricing_table_quantity_color_imprint_artwork pricing_table_quantity_color_imprint_artwork_{{$order->id}}" id="pricing_table_quantity_color_imprint_artwork_{{$order->id}}" order_id="{{$order->id}}">
										</div>
									</div>
										
									<!-- End Exactly same No-->

									
									

									<div class="order-delivered-by-date order-delivered-by-date-{{$order->id}} hidden" style="margin-right: -15px;margin-left: -15px;">
										<!-- <input id="order_deliver_select_date" type="text" name="" class="datepicker order-delivered-by-date-input-{{$order->id}}" placeholder="Select a date"> -->
										<div class="row pt-3 pb-3 orderbydate">
        <div class="col-md-12">
            <div class="form-group form-check ">
                <input type="checkbox" class="reorder-request-checkobx ASAP_date_format form-check-input nodeadline as_soon_as_possible_reorder_receive_date_{{$order->id}}" id="exampleCheck1" checked=""  order_id="{{$order->id}}"> 
                <label class="form-check-label dead-lbl " for="exampleCheck1">&nbsp;&nbsp;&nbsp;&nbsp;ASAP - No Deadline. Regular production time</label> 
            </div>

        </div>   

        <div class="col-md-12 orderbydate"> 
           
           <div class="row">
            <div class="col-md-5">
            <div class="form-group form-check">
                <input type="checkbox" class="reorder-request-checkobx need_this_order_date form-check-input deadline-date need_this_reorder_received_date_{{$order->id}}" id="exampleCheck3" order_id="{{$order->id}}">
                <label class="form-check-label dead-lbl" for="exampleCheck3">&nbsp;&nbsp;&nbsp;&nbsp;Need this order by</label>
            </div>
            </div>

         <div class="col-md-5 p-0">
          <input type="date" class="date-input ship-date-{{$order->id}}" id="ship-delivery-date" name="trip-start" value="" >
         </div>
        
        </div>

        </div>
     
 </div>
									</div>



<!-- add-new-shipping-address -->
									<!-- Shipping Adddress Same As Before Start -->
									<div class="shipping_address_same_as_before shipping_address_same_as_before_{{$order->id}} hidden">
										
										<!-- Add New Address Shippin Start -->
											<div class="row add_new_shipping_address_same_as_before pt-3">
                        <div class="col-md-12">
                        <!-- <span class="add-add pb-3">Add a New Address</span> -->
                         <!-- <p>Starred(*) Fields are required.</p> -->

                        <h4>Is the shipping address for this order the same as before?</h4>
                        <div class="row  pt-3 pl-3">
                            <div class="account-content">
                                <form id="address_shipp_same_as_before" class="address_shipp_same_as_before">

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="check-radio form-check-input united-staten shipp_united_state_checkbox_reorder" id="united-state-shipp-same-before-{{$order->id}}" checked="" order_id="{{$order->id}}">&nbsp;
                                            <label class="form-check-label check-checkout mr-2" for="united-staten">United States</label>
                                       &nbsp;&nbsp;
                                       &nbsp;&nbsp;
                                            <input type="checkbox" class="check-radio form-check-input canadan shipp_canada_state_checkbox_reorder" id="canada-shipp-same-before-{{$order->id}}" order_id="{{$order->id}}">&nbsp;
                                            <label class="form-check-label check-checkout" for="canadan">Canada</label>

                                          </div>
                                     </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="" id="first_name_{{$order->id}}" name="fname" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="last_name_{{$order->id}}" placeholder="" name="lname" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="company_name_{{$order->id}}" name="companyname" placeholder="" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="address_one_{{$order->id}}" name="add1" placeholder="" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="address_two_{{$order->id}}" name="add2" placeholder="" >
                                    </div>



                                   <div class="row">     
                                    <div class="col">
                                    <!-- <div class="select-custom"> -->
                                        <label class="form-lbl">City<span class="required">*</span></label>

                                        <input placeholder=""  name="cityn" list="city_name_shipp_ord_hist_{{$order->id}}"  id="shipp_city_{{$order->id}}" class="form-control txt-lbl">
					                      <datalist id="city_name_shipp_ord_hist_{{$order->id}}">
					                        @if($data['Allcity']!="[]")
					                          @foreach($data['Allcity'] as $city)
					                            <option value="{{$city->city_name}}">
					                            
					                             @endforeach
					                           @endif
					                      </datalist>

                                        <!-- <select name="cityn" id="shipp_city_{{$order->id}}" class="form-control txt-lbl"  required=" ">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select> -->


                                    <!-- </div> -->
                                    </div>

                                     
                                      <div class="col">
                                       <div class="select-custom">
                                        <label class="form-lbl shipping_address_state_label_reoder_{{$order->id}}">State<span class="required">*</span></label>
                                        <label class="form-lbl hidden shipping_address_province_label_reoder_{{$order->id}}">Province<span class="required">*</span></label>
                                        <select name="staten" id="shipp_state_{{$order->id}}" class="form-control txt-lbl" required="">
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
                                        <label for="acc-text" class="form-lbl shipping_address_zipcode_label_reorder_{{$order->id}}">Zip Code<span class="required">*</span></label>
                                        <label for="acc-text" class="form-lbl hidden shipping_address_postalcode_label_reorder_{{$order->id}}">Postal Code<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl shipp_address_order_same_before_zip_code" id="ship_zip_code_{{$order->id}}" name="zip-coden" placeholder=""  order_id="{{$order->id}}">

                                    </div>                                         
                                    </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="number" class="form-control txt-lbl" placeholder="" id="day_telephone_{{$order->id}}" name="teln" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="shipp_ext_{{$order->id}}" placeholder="" name="extn" >
                                            </div>
                                        </div>

                                    </div>  



                                   <!--  <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="shipp_fxn_{{$order->id}}" name="faxn" placeholder="Fax" >
                                    </div> -->


                                    <!-- <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input default-ship-addn" id="ship-addr-same-before-default-{{$order->id}}">
                                            <label class="form-check-label check-checkout text-font-weight-normal" for="default-ship-addn">&nbsp;&nbsp;&nbsp;Make this my default shipping address</label>
                                    </div> -->


                                    <div class="row">
                                        <div class="col add_new_addr_shipp_same_as_before" order_id="{{$order->id}}">
                                         <button type="button" class="btn-save-changes" order_id="{{$order->id}}">Save Change</button> 
                                        </div>
                                        <div class="col new-add-cancel">
                                          <button type="button" class="btn-cancel btn_shipping_address_cancel">Cancel</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div> 
          </div>
										<!-- Add New Address Shippin End -->

									</div>
									<!-- Shipping Adddress Same As Before Start -->



<!-- -------------------------------------------------- Billing Address Same as Before Start ------------------------------------------------ -->

							<style type="text/css">
								.bill_addr_same_before{
						font-weight: normal;
						font-size: 16px;
						line-height: 19px;
						letter-spacing: -0.017em;
						color: #212121;
					}

					.bill_addr_same_before form#addnewbillingaddressform_same_befor label{
						font-weight: normal;
						font-size: 16px;
						line-height: 19px;
						letter-spacing: -0.017em;
						color: #212121;
					}

					.bill_addr_same_before form#addnewbillingaddressform_same_befor input{
						font-weight: normal;
						font-size: 14px;
						line-height: 16px;
						letter-spacing: -0.017em;
						color: #212121;
					}
							</style>


							

								<div class="billing_address_same_as_before billing_address_same_as_before_{{$order->id}} hidden">

									<div class="row bill_addr_same_before pt-3">
                   
                     <div class="col-md-12">
                        <span class="add-add pb-3">Add a New Billng Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-4">
                            <div class="account-content">
                                <form id="addnewbillingaddressform_same_befor">

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="check-radio form-check-input united_state_bill_address_reorder united_state_bill_address_reorder_{{$order->id}}" id="united_state_bill_address_reorder_{{$order->id}}" checked="" order_id="{{$order->id}}">&nbsp;&nbsp;
                                            <label class="form-check-label check-checkout mr-5" for="united-state-bill">United States</label>
                                       		
                                            <input type="checkbox" class="check-radio form-check-input canada_bill_address_reorder" id="canada_bill_address_reorder_{{$order->id}}" order_id="{{$order->id}}">&nbsp;&nbsp;
                                            <label class="form-check-label check-checkout" for="canada-bill">Canada</label>

                                          </div>
                                     </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="" id="first_name_bill_addr_reorder_{{$order->id}}" name="fname-bill" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="last_name_bill_addr_reorder_{{$order->id}}" placeholder="" name="lname-bill" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="companyname_bill_addr_reorder_{{$order->id}}" name="companyname-bill" placeholder="" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="address_line_1_bill_addr_reorder_{{$order->id}}" name="add1-bill" placeholder="" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="address_line_2_bill_addr_reorder_{{$order->id}}" name="add2-bill" placeholder="" >
                                    </div>



                                   <div class="row">     
                                    <div class="col">
                                    <!-- <div class="select-custom"> -->
                                        <label class="form-lbl">City<span class="required">*</span></label>


                                        <input placeholder=""  name="city-bill" list="city_name_bill_address_ord_{{$order->id}}"  id="city_bill_addr_reorder_{{$order->id}}" class="form-control txt-lbl">
					                      <datalist id="city_name_bill_address_ord_{{$order->id}}">
					                        @if($data['Allcity']!="[]")
					                          @foreach($data['Allcity'] as $city)
					                            <option value="{{$city->city_name}}">
					                            
					                             @endforeach
					                           @endif
					                      </datalist>



                                        <!-- <select name="city-bill" id="city_bill_addr_reorder_{{$order->id}}" class="form-control txt-lbl"  required=" ">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select> -->

                                    <!-- </div> -->
                                    </div>

                                     
                                      <div class="col">
                                       <div class="select-custom">
                                        <label class="form-lbl bill_address_state_label_{{$order->id}}">State<span class="required">*</span></label>
                                        <label class="form-lbl hidden bill_address_province_label_{{$order->id}}">Province<span class="required">*</span></label>
                                        <select name="state-bill" id="state_bill_addr_reorder_{{$order->id}}" class="form-control txt-lbl" required="">
                                            <option value="" selected="selected">Select State</option>
                                            @foreach($data['Allstates'] as $state)
                                            <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                                            @endforeach
                                        </select>
                                       </div>
                                      </div>


                                    <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl bill_address_zipcode_label_{{$order->id}}">Zip Code<span class="required">*</span></label>
                                        <label for="acc-text" class="form-lbl hidden bill_address_postalcode_label_{{$order->id}}">Postal Code<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl bill_address_order_same_before_zip_code" id="zip_code_bill_addr_reorder_{{$order->id}}" name="zip-code-bill" placeholder="" required="" order_id="{{$order->id}}">
                                    </div>                                         
                                    </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="number" class="form-control txt-lbl" placeholder="" id="tel_bill_addr_reorder_{{$order->id}}" name="tel-bill" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="ext_bill_addr_reorder_{{$order->id}}" placeholder="" name="ext-bill" >
                                            </div>
                                        </div>

                                    </div>  



                                   <!--  <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="fax_bill_addr_reorder_{{$order->id}}" name="faxn-bill" placeholder="Fax" >
                                    </div> -->


<!--                                     <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input default-ship-addn" id="default-ship-addn">
                                            <label class="form-check-label check-checkout" for="default-ship-addn">Make this my default shipping address</label>
                                    </div> -->


                                    <div class="row">
                                        <div class="col bill-addr-new-reorder">
                                         <button type="button" class="btn-save-changes" order_id="{{$order->id}}">Save Change</button>   
                                        </div>
                                        <div class="col bill-addr-new-reorder-cancel">
                                          <button type="button" class="btn-cancel cancel_new_billing_address">Cancel</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div> 
          </div>




								</div>



								

<!-- ------------------------------------------------- Billing Address Same as Before End --------------------------------------------------- -->



									<!-- Same Payment Reorder Start -->
									<div class="same-payment-reorder-div same-payment-reorder-div-{{$order->id}} hidden">
										<select name="bank_acc" id="bank_account_select" class="select_bank_account">
											<option selected="" disabled="">Select Account</option>
											<option value="central">Central Bank</option>
											<option value="sbi">SBI</option>
											<option value="boi">BOI</option>
										</select>
										<div class="acc-add">
											<button class="add-new-account add_new_account_main add_new_account_main_{{$order->id}}" order_id="{{$order->id}}">Add New Account</button>
										</div>

										<div class="new-acc-fill-info hidden new-acc-fill-info-{{$order->id}}" order_id="{{$order->id}}">
											

													<div class="row mt-3">
														<div class="col-12">
															<label>Cart Holder<span style="color:red;">*</span></label>
														</div>
														<div class="col-12 ">
															<input type="text" name="" placeholder="David" class="same_payment_reorder_paument_input">
														</div>
													</div>

													<div class="row mt-3">
														<div class="col-12">
															<label>Card Number<span style="color:red;">*</span></label>
														</div>
														<div class="col-12">
															<input type="text" name="" placeholder="2543  0042 3562 0210" class="same_payment_reorder_paument_input">
														</div>
													</div>


													<div class="row mt-3">
														<div class="col-6">
															<div class="row">
																<div class="col-12">
																	<label>Card Security Code<span style="color:red;">*</span></label>
																</div>
																<div class="col-12">
																	<input type="text" name="" placeholder="234" class="col-6-input-box">
																</div>
															</div>
														</div>

														<div class="col-6">
															<div class="row">
																<div class="col-12">
																	<label>Expiration Date<span style="color:red;">*</span></label>
																</div>
																<div class="col-12">
																	<input type="text" name="" placeholder="01 / 2025" class="col-6-input-box">
																</div>
															</div>
														</div>
													</div>

													<div class="row mt-3">
														<div class="col-12">
															<button class="btn-save-cart">Save</button>
														</div>
													</div>

										</div>
										
									</div>

									<!-- Same Payment Reorder End -->

						<!-- </div> -->
				</div> <!-- Row End -->






								@endforeach
							@endif

















@endsection