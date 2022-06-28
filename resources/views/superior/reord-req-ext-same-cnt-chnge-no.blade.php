@section('reord_req_same_cnt_chnge_no')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<style type="text/css">
	.select-max-colors {
    width: 150px;
    height: 35px;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
}

.maxcolor-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
    margin: 0 0px 0.6rem;
}

.file-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
    
}
.priceing-title{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.file-icon {
    position: absolute;
    font-size: 30px;
    line-height: 38px;
    left: 0px;
    color: #68bee5;
}

.upload-text {
    width: 560px;
    height: 44px;
    background: #FFFFFF;
    border: none;
    box-sizing: border-box;
    box-shadow: none;
    position: relative;
    left: 50px;
}

.u-here{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height:40px;
    letter-spacing: -0.017em;
    color: #212121;
}

.file-box {
    display: inline-block;
    width: 100%;
    /*border: 1px solid;*/
    padding: 0px 0px 0px 10px;
    box-sizing: border-box;
    /*height: calc(2rem - 2px);
*/}
.art-work{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
  
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

    .inputfile-box {
  position: relative;
}
.inputfile {
  display: none;
}
</style>
<style type="text/css">
    @media only screen and (min-width: 1024px){
    .radios {
      flex-wrap: wrap;
  }
}
.radios label input[type=radio] {
    opacity: 0;
    visibility: hidden;
    position: absolute;
    z-index: 1;
}
.radios.proposerAddress label input[type=radio]+span {
    display: block;
    padding-top:0px;
    text-align: center;
}

.radios label input[type=radio]+span {
    background: #fff;
    border-radius: 8px;
    box-shadow: none;
    display: block;
    position: absolute;
    z-index: 2;
    width: 80px;
    height: 82px;
    padding: 0px;
    display: flex;
    align-items: center;
    border: solid 1px #979797;
    transition: border .3s ease-in;
}


.radios.proposerAddress label {
    margin-right: 60px;
    margin-bottom: 25px;
}

.radios label input[type=radio]:checked+span {
    border: 4px solid #68BEE5;
    background: -moz-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: -webkit-gradient(left top,left bottom,color-stop(0,#e5e5e56e),color-stop(100%,#e5e5e56e));
    background: -webkit-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: -o-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: -ms-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: linear-gradient(to bottom,#e5e5e56e 0,#e5e5e56e 100%);
    color: #fff;
}



.radios.proposerAddress label input[type=radio]+span .address_icon {
    margin: 0px auto; 
}

.radios label input[type=radio]+span .address_icon {
    width:100%;
    height:100%;
    display: block;
    margin-right:12px;
}


.radios {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.cart-status-button {
    border: 1px solid #68bee5;
    border-radius: 4px;
    padding: 8px 5px 8px 5px;
    background-color: #fff;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #68BEE5;
}

.marg-left-15{
    margin-left: 15px;
}
</style>                                   




                                        <p class="text-font-weight-500 marg-left-15">Is the quantity going to change?</p>
                                        <div class="row " style="margin-left: -2px;">
                                            <div class="col-12 d-inline-flex">
                                                <input type="checkbox" name="" class="check-radio checkbox exactly_same_is_quantity_change_yes exactly_same_is_quantity_change_yes_{{$order_id}}" order_id="{{$order_id}}">&nbsp;&nbsp;
                                                <p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="" class="check-radio checkbox exactly_same_is_quantity_change_no exactly_same_is_quantity_change_no_{{$order_id}}" order_id="{{$order_id}}" checked="">&nbsp;&nbsp;
                                                <p style="margin-top: 5px;">No</p>
                                            </div>



                                            <!-- <div class="pricing_table_quantity_color_imprint_artwork pricing_table_quantity_color_imprint_artwork_{{$order_id}}" id="pricing_table_quantity_color_imprint_artwork_{{$order_id}}" order_id="{{$order_id}}">
                                                
                                            

                                            </div> -->
                                        </div>

                                        <!-- Pricing and  -->
                                        <div class="pricing_and_quantity_table_{{$order_id}} hidden">
                                            <div class="col-12">
											<p class="pr-tb-exactly-same-no"> Pricing Table </p>	
											</div>


											<!-- Pricing table Start-->
											<div class="col-12">
												<div class="row">
													<div class="col-8">
														<form>
															<table class="table">
															  <thead>
															    <tr>
															      
															      <th scope="col">Quantity</th>
															      <th scope="col">Regular<br> Price</th>
															      <th scope="col">Sale</th>
															    </tr>
															  </thead>
															  <tbody>
															  	<?php $count=0;?>
															  	
															  				@if($product_prices!="[]")
                                                                                @php 
                                                                                    $max_count_from = 0;
                                                                                @endphp
															  					@foreach($product_prices as $price)

															  						<?php $count++;?>
																				    <tr>
																				    	@if($count==1)
																		                	<input type="hidden" class="min-quantity min-quantity-{{$order_id}}" name="min-quantity" value="{{$price->count_from}}" >

																		                @endif
																		                @if($count==1)
																				      		<td><span>Min</span>{{$price->count_from}}</td>
																				      	@else
																				      		<td>{{$price->count_from}}</td>
																				      	@endif
																				      <td>${{$price->per_item_price}}</td>
																				      
                                                                                      <td>
                                                                                        <span class="color-67a03c">
                                                                                            ${{$price->per_item_sale_price}}
                                                                                        </span>
                                                                                      </td>

                                                                                      @php
                                                                                        if($price->count_from>$max_count_from){
                                                                                            $max_count_from = $price->count_from;
                                                                                        }
                                                                                      @endphp
                                                                                        
                                                                                           
                                                                                          
                                                                                      


																				    </tr>

																			    @endforeach
                                                                                <input type="hidden" class="max_quantity max_quantity_{{$order_id}}" name="max-quantity" value="{{$max_count_from}}">

																	    	@endif
																	       




															  </tbody>
															</table>
														</form>
													</div>

													
													<!-- Type Quantity Start-->
													<div class="col-4">
														<div class="type-quantity-main-div">
															
																	<label class="text-font-weight-500 color-212121">
                                                                        Type Quantity
                                                                    </label>

																	<input type="number" placeholder="Enter Quantity" name="" class="type_quantity_input type_quantity_input_{{$order_id}}" product_id="{{$product->product_id}}">

                                                                    <input type="hidden" name="product_id" class="product_id" value="{{$product->product_id}}"/>
																

														</div>
													</div>	
													<!-- Type Quantity End -->
												</div>
											</div>
											<!-- Pricing Table End -->

                                            </div>  


                                            <hr style="margin-top: 13px;margin-bottom: 10px;width: 300px;">



											<div class="col-12">
												<p class="text-font-weight-500">Is item color going to change?</p>
											</div>
											<div class="col-12">

												<div class="d-inline-flex">
													<input type="checkbox" name="" class="check-radio checkbox item_color_going_to_change_yes item_color_going_to_change_yes_{{$order_id}}" order_id="{{$order_id}}" >&nbsp;&nbsp;
													<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="checkbox" name="" class="check-radio checkbox item_color_going_to_change_no item_color_going_to_change_no_{{$order_id}}" order_id="{{$order_id}}" checked="">&nbsp;&nbsp;
													<p style="margin-top: 5px;">No</p>
												</div>

												<div class="item-color-going-to-change">




<style type="text/css">
	.dropdown-menu {         
  max-height: 200px;
  overflow-y: auto;
}

.btn-select-item-color{
	border: 1px solid #68BEE5 !important;
    border-radius: 5px;
    width: 179px !important;
    height: 37px;
    background: white!important;
    color: #68BEE5;
}

</style>

   <div class="price-box price_box_{{$order_id}} hidden">
               <div class="item-selection">
                <span class="item-selection">Item Color Selection</span><br><br>

                <div class=" mt-2 mb-3">
                       
                            @if($product_colors!="[]")

                            
                                  <!-- <button class=" btn-select-item-color dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Item Color Selection
                                  </button> -->
                                <div class="row" style="margin-left: 0px;">
                            @foreach($product_colors as $product_sub_image)

                            

                             @if($product_sub_image->image_src!="")

                         <!-- <p>{{$product_sub_image->image_src}}</p>  -->

                            
            
            <div class="col-md-2" style="margin-left: -2px;margin-right: -2px;">
                <div class=" item_color_select  radios proposerAddress mb-2" style="margin-left:-6px;margin-right:-6px;">
             <label> 
                <input type="radio" name="address" c-name="{{$product_sub_image->color->name}}" value="{{$product_sub_image->color_id}}" class="color-id-selected"> 
                <span style="    width: 41px !important;
    height: 33px !important;"><i class="address_icon select_icon" id="selected-color-main">
                    <img class="color-image" src="{{$base_url}}/storage/app/{{$product_sub_image->image_src}}" alt="product-thumbnail">
                </i>
            </span>
        </label>
    </div>
            </div>                     
                               
             

                                     
                                        
                                  
                              
                            @else
                                 
                                 <div class="col-md-2" style="margin-left: -2px;margin-right: -2px;">

                                     <div class="item_color_select radios proposerAddress mb-2" style="margin-left:-6px;margin-right:-6px;">
<label><input type="radio" name="address" c-name="{{$product_sub_image->color->name}}" value="{{$product_sub_image->color_id}}" class="color-id-selected" id=""> <span style="background-color:{{$product_sub_image->color->color_hex}};    width: 41px !important;
    height: 33px !important;">
</span></label> 
</div>
                                 </div>
                              
                                    



                                
                            @endif
                        @endforeach
                           
                        </div>




                        @endif
                    </div>
                </div>
            </div>

<!-- End .price-box -->


		<!-- Item Color Start --------------------------------- -->

			<!-- <div class="price-box price_box_{{$order_id}}">
               <div class="item-selection">
                <span class="item-selection">Item Color Selection</span><br><br>

                <div class=" mt-2 mb-3">
                       
                            @if($product_colors!="[]")

                            <div class="dropdown">
								  <button class=" btn-select-item-color dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Item Color Selection
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 178px !important;">
                            @foreach($product_colors as $product_sub_image)

                            

                             @if($product_sub_image->image_src!="")

							// <p>{{$product_sub_image->image_src}}</p> 

							
									    <a class="dropdown-item" href="javascript:void(0);" style="height: 60px !important;">
									    	<figure class="figure-content">
             <div class="item_color_select d-inline-block radios proposerAddress">
             <label> 
                <input type="radio" name="address" c-name="{{$product_sub_image->color->name}}" value="{{$product_sub_image->color_id}}" class="color-id-selected"> 
                <span style="    width: 148px !important;
    height: 60px !important;"><i class="address_icon select_icon" id="selected-color-main">
                    <img class="color-image" src="{{$base_url}}/storage/app/{{$product_sub_image->image_src}}" width="80" height="110" alt="product-thumbnail">
                </i>
            </span>
        </label>
    </div>
</figure>
									    </a>
									    
								  
                              
                            @else
                            	// <p>{{$product_sub_image->color->color_hex}}</p> 
                            	<a class="dropdown-item" href="javascript:void(0);">
                            		// {{$product_sub_image->color->color_hex}} 
                            		<figure class="figure-content">
<div class="item_color_select d-inline-block radios proposerAddress mb-2">
<label><input type="radio" name="address" c-name="{{$product_sub_image->color->name}}" value="{{$product_sub_image->color_id}}" class="color-id-selected" id=""> <span style="background-color:{{$product_sub_image->color->color_hex}}; margin: 0px 2px 0px 2px!important;    width: 148px !important;
    height: 60px !important;">
</span></label> 
</div>
</figure>

                            	</a>
                            @endif
                        @endforeach
                            </div>
							</div>




                        @endif
                    </div>
				</div>
			</div> -->

<!-- End .price-box -->
			<!-- Item Color End ----------------------------------- -->









												</div>

												
											</div>

                                            <hr style="margin-top: 13px;margin-bottom: 10px;width: 300px;">

<!-- Imprint Colors Start main----------------------------------------------------------------------------------------- -->
											<div class="col-12">
												<p class="text-font-weight-500">Is the imprint color going to change?</p>
											</div>
											<div class="col-12 d-inline-flex">
												<input type="checkbox" name="" class="check-radio checkbox imprint_color_going_to_change_yes imprint_color_going_to_change_yes_{{$order_id}}" order_id="{{$order_id}}" >&nbsp;&nbsp;
												<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="" class="check-radio checkbox imprint_color_going_to_change_no imprint_color_going_to_change_no_{{$order_id}}" order_id="{{$order_id}}" checked="">&nbsp;&nbsp;
												<p style="margin-top: 5px;">No</p>
											</div>

											<div class="col-12 imprint_data_options_{{$order_id}} hidden">

												<!-- Imprint import detail start -->
<style type="text/css">
    h5.imprint_my_account_h5{
        font-size: 14px !important;
    }
</style>
												<div class="imprint-options">
    <h5 class="imprint_my_account_h5">Imprint Options</h5>
    <div class="pb-4 ml-4">


        <div class="d-inline-flex">
        	<input class="checkbox form-check-input decorated_imprint decorated_imprint_{{$order_id}}" order_id="{{$order_id}}" type="checkbox" name="decorated" checked="" id="decorated">&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="form-check-label file-txt mt-1" for="decorated">Decorated (With Your logo or text)</label>
        </div>
        <br><br>
        <div class=""> 
        	<input class="checkbox form-check-input blank_goods_imprint blank_goods_imprint_{{$order_id}}" type="checkbox" name="blank-goods" id="blank-product" order_id="{{$order_id}}">&nbsp;&nbsp;&nbsp;&nbsp;
           <label class="form-check-label file-txt mt-1" for="blank-product">Blank Goods (Nothing will be imprinted) </label>
       </div>
   </div>
   <div class="clearfix mb-1"></div>
   <span class="warning-msg">
    Please select an imprint location(s) below, additional cost may apply for multiple locations.
  </span>
  </div>

  
<hr style="margin-top: 13px;margin-bottom: 1px;">

<div class="imprint_content_show_hide_{{$order_id}}">

@if($imprints!="[]")
@foreach($imprints as $imprint)
<div class="front-imprint-options">

    <div class="row">
        <div class="col-12 available-imnt pt-3 ml-4 mb-2">
            <span class="file-txt"><input class="checkbox form-check-input front-imprint-input imprint_option_select_change imprint-main-check-<?php echo $imprint->id;?>" type="checkbox" name="imprintcheck" value="<?php echo $imprint->id;?>"id="{{$imprint->id}}impnt" imprint_id="{{$imprint->id}}" max_colors="{{$imprint->max_colors}}">&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="form-check-label file-txt" for="{{$imprint->id}}impnt">{{$imprint->name}}</label>
            </span>
        </div>
        

        @php
        $imprint_prices=$imprint->imprint_price;
        if($imprint_prices!="[]"){
            $setup_price=$imprint_prices[0]->setup_price;
            $item_price=$imprint_prices[0]->item_price;
            $color_setup_price=$imprint_prices[0]->color_setup_price;
            $color_item_price=$imprint_prices[0]->color_item_price;
        }
        @endphp
        <div class="col-12">
            <span class=" warning-msg">
                Price includes 1 color imprint
            </span>
            <br>
            <span class="file-txt">
             <b class="set-fee-{{$imprint->id}} file-txt" value="{{$setup_price}}">Set Fee : ${{$setup_price}}</b>
         </span>
         <br>
         <span class="file-txt">
            <b class="file-txt">Additional Color Setup fee : ${{$color_setup_price}}</b>
        </span>
        <br>
        <span class="file-txt">
         <b class="file-txt">Additional Color fee (per item): ${{$color_item_price}}</b>  
     </span>
     <span class="clearfix"></span>
 </div>

</div>



<div class="row max-color-row">

    <div class="col-12" id="select-color-option-<?php echo $imprint->id;?>">
        <label class="maxcolor-txt">Max Colors :{{$imprint->max_colors}}</label><br>
        
        <div class="col-md-12 pl-0">
            <select class="select-max-colors select-max-colors-{{$imprint->id}} imp_color_{{$imprint->id}}" name="imp_color_{{$imprint->id}}" color_id="">
                
                @foreach($imprint->imprint_colors as $imprint_color)
                <option value="{{$imprint_color->colors->id}}">{{$imprint_color->colors->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="add_max_color_button_{{$imprint->id}}" id="add_max_color_button_{{$imprint->id}}">
            
        </div>

    </div>

    

    <div class="col-md-12 ">
     <button class="cart-status-button mt-2 mb-2 hidden" id="add-color-btn-<?php echo $imprint->id;?>">Add color +</button>
 </div>

</div>


</div>
@endforeach
@endif    
</div>
												<!-- Imprint import detail end -->
												
											</div>
<!-- Imprint Color End Main---------------------------------------------------------------------------- -->

<hr style="margin-top: 13px;margin-bottom: 10px;">

<!-- Art Work going to provide start main -->
											<div class="col-12">
												<p class="text-font-weight-500">
                                                    Are you going to be providing new artwork for this reorder?
                                                </p>
											</div>
											<div class="col-12 d-inline-flex">
												<input type="checkbox" name="" class="check-radio checkbox artwork_new_going_to_provide_yes artwork_new_going_to_provide_yes_{{$order_id}}" order_id="{{$order_id}}">&nbsp;&nbsp;
												<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="" class="check-radio checkbox artwork_new_going_to_provide_no artwork_new_going_to_provide_no_{{$order_id}}" order_id="{{$order_id}}" checked="">&nbsp;&nbsp;
												<p style="margin-top: 5px;">No</p>
											</div>

											<div class="artwork_going_to_providing_reorder_{{$order_id}} ml-4 hidden">


	<span class="art-work pt-2 pb-2">Artwork/ Comments</span><br>

    <span class="file-txt">Click here to upload your art files.</span><br>

    <span class="doc-txt pt-2 pb-2">Uploaded Format :<br>JPGE, PNG, PDF, DOC, PSD, EPS, AI, GIF,  TIFF</span><br>



    <div class="inputfile-box pt-3 pb-3">
        <input type="file" id="file" class="inputfile" name="files[]" onchange='uploadFile(this)'>
        <label for="file">
            <span id="file-name" class="file-box u-here upload-text">Upload File</span>
            <i class="fa fa-upload file-icon" aria-hidden="true"></i>  
        </label>
    </div>

    <div class="pt-3 pb-3">
        <span class="mail-txt">Or Click here to email your artwork/logo or email directly to &nbsp;<a href="mailto:business_email" class="color-b">art@superiorpromos.com</a></span>
    </div>


    <!-- <div id="" class="summernote pt-4 pb-4">sgrf</div> -->

    <!-- <textarea class="artwork_textarea summernote pt-4 pb-4" id="summernote">
    	
    </textarea> -->

    <br>
    <hr class="short-divider short_divider">
    <br>



											</div>
<!-- Art work going to provide End main -->

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>   


<script type="text/javascript">
    
</script>
@endsection