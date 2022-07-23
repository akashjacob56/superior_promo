@extends('layouts.admin')
@section('content')
<script src="{{asset ('files\assets\js\session.js')}}"></script>
<!-- Tags css -->
<style type="text/css">

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

	.variant_weight_unit{
		width: 60px;
		padding: 5px !important;

	}
	
.table td{
    padding: 1rem 0.2rem !important;
}

	img#variant_image_preview{
		width: 100%;
		max-height: 300px;
		padding: 20px;
	}
	.delete_variant{
		height: 35px !important;
	}
	.table>thead>tr>th {
		font-size: .8375rem !important;
	}
	.note-frame .panel{
		display: grid !important;

	}
	.note-editor .note-frame .panel{
		display: grid !important;

	}

	.form-control:disabled {
    	cursor: not-allowed;
    	opacity: 1.5;
	}


.grid-input-text {
    width: 50px;
    padding: 5px 2px 5px 2px;
    margin: 0px 0px 5px 0px;
}

.disabled-item{
    cursor: not-allowed;
    opacity: 1.5;
}


.price-grid-append-container-scroll{
overflow: scroll;
overflow-y: hidden;
overflow-x: auto;
flex-wrap: unset !important;
max-width: 450px;
}





.grid-input-text-imprint{
    width: 50px;
    padding: 5px 0px 5px 0px;
    margin: 0px 0px 15px 0px;
}

</style>

<!-- <link rel="stylesheet" href="{{asset('bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}"/> -->
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/component.css')}}">
<link rel="stylesheet" href="{{asset('files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />

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
					<li class="breadcrumb-item"><a href="all">Products</a>
					</li> 
					<li class="breadcrumb-item">
						<a>Product Details 
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
					<form class="w-100" id="personal-info-form" method="post" action="{{$product->product_id}}" enctype='multipart/form-data'>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header no-border">
					<h5>Product #{{$product->product_id}} ({{$product->default_product_translation->product_name}})</h5>
									<span class="upper-buttons pull-right">
										@if($my_permissions->contains('PRODUCT_UPDATE'))
										<button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
										@if($my_permissions->contains('PRODUCT_UPDATE'))
										@if($product->status_id==1)
										<button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
										</button>
										@else
										<button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
										@endif
										@endif
										<a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
										</button></a>
										
									</span>
									<span class="text-muted">You can modify information for products according to required types and representations to a given part of your online business.</span>
								</div>
							</div>
						</div>
						<div class="col-md-12 p-0">
							<div class="col-md-8">
								<div class="card">
									<div class="card-block">

										<div class="form-group {{ $errors->has('product_name') ? ' has-error' : '' }}">
											<label class="form-control-label">Title <span>*</span></label>
											<input id="product_name" type="text" name="product_name" value="{{$product->default_product_translation->product_name}}" class="form-control thresold-i" placeholder="Product Name">
											@if ($errors->has('product_name'))
											<span class="help-block">
												<strong>{{ $errors->first('product_name') }}</strong>
											</span>
											@endif
										</div>
										<!-- @php
										$product_url = str_replace('-', ' ', $product->product_url);
										@endphp -->

										<div class="form-group {{ $errors->has('product_url') ? ' has-error' : '' }}">
											<label class="form-control-label">Product Url *</label>
											<input id="product_url" type="text" name="product_url" value="{{$product->product_url}}"  class="form-control thresold-i"  placeholder="Product Url" >
											@if ($errors->has('product_url'))
											<span class="help-block">
												<strong>{{ $errors->first('product_url') }}</strong>
											</span>
											@endif

										</div>

                    <div class="form-group {{ $errors->has('is_stock_collection') ? ' has-error' : '' }}">
                      
                      <input id="is_stock_collection" type="checkbox" name="is_stock_collection" value="1" class=" thresold-i">
                      <label class="ml-1">Is stock collection</label>
                      @if ($errors->has('is_stock_collection'))
                      <span class="help-block">
                        <strong>{{ $errors->first('is_stock_collection') }}</strong>
                      </span>
                      @endif
                    </div>



										<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
											<label class="form-control-label">Description</label>
											<textarea name="description" class="form-control summernote-editor" rows="5" placeholder="Enter product description" >{{$product->default_product_translation_full->description}}</textarea>
											@if ($errors->has('description'))
											<span class="help-block">
												<strong>{{ $errors->first('description') }}</strong>
											</span>
											@endif
										</div>
                                                                                    
                     <div class="form-group {{ $errors->has('long_description') ? ' has-error' : '' }}">
                      <label class="form-control-label">Long Description</label>
                      <textarea name="long_description" class="form-control summernote-editor" rows="5" placeholder="Enter product Long description">{{$product->default_product_translation_full->long_description}}</textarea>
                      @if ($errors->has('long_description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('long_description') }}</strong>
                      </span>
                      @endif
                    </div>

      <div class="form-group {{ $errors->has('additional_information') ? ' has-error' : '' }}">
                      <label class="form-control-label">Additional Information</label>
                      <textarea name="additional_information" class="form-control summernote-editor" rows="5" placeholder="Enter Additional Information">{{$product->default_product_translation_full->additional_information}}</textarea>
                      @if ($errors->has('additional_information'))
                      <span class="help-block">
                        <strong>{{ $errors->first('additional_information') }}</strong>
                      </span>
                      @endif
                    </div>


										<div class="form-group">
											<label for="file"  class="col-form-label form-control-label">Current product Main image</label>
											<div class="col-md-12 p-0 product-div">
												<img class="img-fluid" src="{{$base_url}}/storage/app/{{$product->product_image}}" id="current_product_image" style="max-height:150px;max-width:150px;" onerror="this.src='{{$base_url}}/files/assets/images/product.png';">
											</div>
										</div>

										<div class="form-group {{ $errors->has('product_image') ? ' has-error' : '' }}">
											<label for="file"  class="col-form-label form-control-label">Image</label>
											<input type="file" name="product_image" class="form-control" onchange="document.getElementById('current_product_image').src = window.URL.createObjectURL(this.files[0])" accept="image/x-png,image/gif,image/jpeg" />
											@if ($errors->has('product_image'))
											<span class="help-block">
												<strong>{{ $errors->first('product_image') }}</strong>
											</span>
											@endif
										</div>



										<div class="form-group {{ $errors->has('dimension') ? ' has-error' : '' }}">
                      <label class="form-control-label">Dimension <!-- <span>*</span> --></label>
                      <input id="dimension" type="text" name="dimension" value="{{old('dimension',$product->dimension)}}" class="form-control thresold-i" placeholder="Enter Dimension" >
                      @if ($errors->has('dimension'))
                      <span class="help-block">
                        <strong>{{ $errors->first('dimension') }}</strong>
                      </span>
                      @endif
                    </div>
                   

                    <div class="form-group {{ $errors->has('imprint_area') ? ' has-error' : '' }}">
                        <label class="form-control-label">Imprint Area</label>
                        <textarea name="imprint_area" class="form-control summernote-editor" rows="5" placeholder="Imprint Area">{{old('imprint_area',$product->imprint_area)}}</textarea>
                        @if ($errors->has('imprint_area'))
                        <span class="help-block">
                          <strong>{{ $errors->first('imprint_area') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('pricing_information') ? ' has-error' : '' }}">
                        <label class="form-control-label">Pricing Information</label>
                        <textarea name="pricing_information" class="form-control summernote-editor" rows="5" placeholder="Pricing Information">{{old('pricing_information',$product->pricing_information)}}</textarea>
                        @if ($errors->has('pricing_information'))
                        <span class="help-block">
                          <strong>{{ $errors->first('pricing_information') }}</strong>
                        </span>
                        @endif
                    </div>


									</div>
								</div>



			         <div class="card">
                  <div class="card-block">
                    
                    <div class="row">
                      <div class="col-md-12">
                        <h5>Shipping </h5>
                      </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('quantity_per_box') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Quantity Per Box <!-- <span>*</span> --></label>
                                  <input id="quantity_per_box" type="number" name="quantity_per_box" value="{{old('quantity_per_box',$product->quantity_per_box)}}" class="form-control thresold-i" placeholder="Qunatity Per Box" >
                                  @if ($errors->has('quantity_per_box'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('quantity_per_box') }}</strong>
                                    </span>
                                  @endif
                              </div>        
                        </div>
                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('shipping_additional_type') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Shipping Additional Type <!-- <span>*</span> --></label>
                                    <input id="shipping_additional_type" type="text" name="shipping_additional_type" value="{{old('shipping_additional_type',$product->shipping_additional_type)}}" class="form-control thresold-i" placeholder="Shipping Additional Type" >
                                    @if ($errors->has('shipping_additional_type'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('shipping_additional_type') }}</strong>
                                      </span>
                                    @endif
                              </div>        
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('weight_box') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Weight of the Box <!-- <span>*</span> --></label>
                                  <input id="weight_box" type="number" name="weight_box" value="{{old('weight_box',$product->weight_box)}}" class="form-control thresold-i" placeholder="Weight of the Box">
                                  @if ($errors->has('weight_box'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('weight_box') }}</strong>
                                    </span>
                                  @endif
                              </div>        
                        </div>
                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('shipping_additional_value') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Shipping Additional Value <!-- <span>*</span> --></label>
                                    <input id="shipping_additional_value" type="text" name="shipping_additional_value" value="{{old('shipping_additional_value',$product->shipping_additional_value)}}" class="form-control thresold-i" placeholder="Shipping Additional Value">
                                    @if ($errors->has('shipping_additional_value'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('shipping_additional_value') }}</strong>
                                      </span>
                                    @endif
                              </div>        
                        </div>  
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('shipping_from_zip_code') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Shipping From ZIP Code <!-- <span>*</span> --></label>
                                  <input id="shipping_from_zip_code" type="number" name="shipping_from_zip_code" value="{{old('shipping_from_zip_code',$product->shipping_from_zip_code)}}" class="form-control thresold-i" placeholder="Shipping From Zip Code">
                                  @if($errors->has('shipping_from_zip_code'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('shipping_from_zip_code') }}</strong>
                                    </span>
                                  @endif
                              </div>        
                        </div>
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-7">
                                          <div class="form-group {{ $errors->has('production_time_from') ? ' has-error' : '' }}">
                                          <label class="form-control-label">Production Time From <!-- <span>*</span> --></label>
                                            <input id="production_time_from" type="number" name="production_time_from" value="{{old('production_time_from',$product->production_time_from)}}" class="form-control thresold-i" placeholder="From" >
                                            @if ($errors->has('production_time_from'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('production_time_from') }}</strong>
                                              </span>
                                            @endif
                                      </div> 
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group {{ $errors->has('production_time_to') ? ' has-error' : '' }}">
                                          <label class="form-control-label"> To <!-- <span>*</span> --></label>
                                            <input id="production_time_to" type="number" name="production_time_to" value="{{old('production_time_to',$product->production_time_to)}}" class="form-control thresold-i" placeholder="To" >
                                            @if ($errors->has('production_time_to'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('production_time_to') }}</strong>
                                              </span>
                                            @endif
                                      </div>
                                    </div>
                                </div>
                                   

                        </div>  
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('custom_method') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Custom Method <!-- <span>*</span> --></label>
                                  
                                  <select class="form-control thresold-i" id="custom_method" name="custom_method">
                                    <option disabled="" selected="">Select</option>
                                    <option value="ground">Ground</option>
                                    <option value="3day">3 Day</option>
                                    <option value="2day">2 Day</option>
                                    <option value="overnight">Overnight</option>
                                    <option value="overnight_am">Overnight AM</option>
                                    <option value="overnight_saturday_delivery">Overnight Saturday Delivery</option>
                                  </select>
                                  @if ($errors->has('custom_method'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('custom_method') }}</strong>
                                    </span>
                                  @endif
                              </div>        
                        </div>

                        <div class="col-md-6">
                              <div class="form-group {{ $errors->has('custom_cost') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Custom Cost <!-- <span>*</span> --></label>
                                    <input id="custom_cost" type="text" name="custom_cost" value="{{old('custom_cost',$product->custom_cost)}}" class="form-control thresold-i" placeholder="Custom Cost" >
                                    @if ($errors->has('custom_cost'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('custom_cost') }}</strong>
                                      </span>
                                    @endif
                              </div>        
                        </div>  
                    </div>
                    

                  </div>
                  </div>





<!-- already available options  -->

                  <div class="card">
                  <div class="card-block price_product_grid_div" id="price_product_grid_div">
                    @if($product->product_prices!="[]")
                      <div class="row pl-1">
                      <div class="col-md-12">
                        <h5>Added Price Grid </h5>
                      </div>
                     </div>
                     <br>
                     @endif
                    <div class="row">

                 @if($product->product_prices!="[]")
                    <div class="row pl-4">

                    <div class="col-md-3">
                      <div class="row form-control-label pt-2 pb-2">Countfrom</div>
                      <div class="row form-control-label pt-2 pb-2">SetupPrice</div>
                      <div class="row form-control-label pt-2 pb-2">Per Item Price</div>
                      <div class="row form-control-label pt-2 pb-2">Per Item Sale Price</div>
                      <div class="row form-control-label pt-2 pb-2">Actions</div>
                    </div>

                     <div class="col-md-9">

                      <div class="row price-grid-append-container-scroll Added-price-grid">

                       @foreach($product->product_prices as $product_price)
                       <div class="col-md-2  price-grid-input-container">

                          <div class="col  {{ $errors->has('count_from') ? ' has-error' : '' }}">
													<input id="count_from" type="number" name=""  class="form-control thresold-i grid-input-text count_from-{{$product_price->product_price_id}}" placeholder="Count From" value="{{$product_price->count_from}}">   </div>																				                        
                         

                        <div class="col {{ $errors->has('setup_price') ? ' has-error':'' }}">
                         <input id="setup_price" type="text" name=""  class="form-control thresold-i grid-input-text setup_price-{{$product_price->product_price_id}}" placeholder="Setup Price" value="{{$product_price->setup_price}}" >
                        </div>  


                        <div class="col  {{ $errors->has('per_item_price') ? ' has-error' : '' }}">
                           <input id="per_item_price" type="text" name="" class="form-control thresold-i grid-input-text per_item_price-{{$product_price->product_price_id}}" placeholder="Per Item Price" value="{{$product_price->per_item_price}}" >
                        </div>  



                        <div class="col  {{ $errors->has('per_item_sale_price') ? ' has-error' : '' }}">
 													<input id="per_item_sale_price" type="text" name=""  class="form-control thresold-i grid-input-text per_item_sale_price-{{$product_price->product_price_id}}" placeholder="Per Item Sale Price" value="{{$product_price->per_item_sale_price}}">                                 
                        </div>


                        <div class="col {{ $errors->has('custom_cost') ? ' has-error' : '' }}">
		                      <a href="{{$base_url}}/productPriceDelete?product_price_id={{$product_price->product_price_id}}">
		                        <button id="" type="button" class="form-control thresold-i grid-input-text"><i class="fa fa-trash"></i></button>
		                      </a>
                        </div> 


                        <div class="col save-grid-col-parent">
                          <a href="javascript:void(0);" class="save-grid-col  save-grid-col-{{$product_price->product_price_id}}" value="{{$product_price->product_price_id}}">
                            <button type="button" class="btn btn-info grid-input-text">save</button>
                          </a>
                        </div> 


                        <input type="hidden" class="is_sale_data" value="{{$product_price->is_sale}}" name="">                        
                      </div>
                    @endforeach
                    </div>
                  </div>
                </div>
               @endif




                    <div class="row" style="display: contents;">
                    	<div class="col-md-12 text-right">
                    		<button type="button" class="btn btn-link pull-right add-product-price">Add New Product Price</button>
                    		<button type="button" class="btn btn-link pull-right cancel-product-price">Cancel Product Price</button>
                    	</div>
                    </div>





                    <div class=" new_product_price_row">
                     
                      <div class="row pl-2">
                      <div class="col-md-12">
                        <h5>Add New Price Grid </h5>
                      </div>
                    </div>
                    <br>



                    <div class="row pl-4">

                    <div class="col-md-3" style="min-width: 135px;">
                      <div class="row form-control-label pt-2 pb-2">Countfrom</div>
                      <div class="row form-control-label pt-2 pb-2">SetupPrice</div>
                      <div class="row form-control-label pt-2 pb-2">Per Item Price</div>
                      <div class="row form-control-label pt-2 pb-2">Per Item Sale Price</div>
                      <div class="row form-control-label pt-2 pb-2">Actions</div>

                      <div class="row form-control-label pt-2 pb-2">
                        <button id="price_grid_button" type="button" class="form-control thresold-i grid-input-text disabled"><i class="fa fa-plus"></i></button>
                      </div>

                    </div>

                     <div class="col-md-9">

                      <div class="row price-grid-append-container-scroll" id="price-grid-append-container">

                       <div class="col-md-2  price-grid-input-container">
                        <div class="col  {{ $errors->has('count_from') ? ' has-error' : '' }}">
                        <input id="count_from" type="number" name="count_from[]" class="form-control thresold-i grid-input-text" placeholder="" >
                        @if ($errors->has('count_from'))
                        <span class="help-block">
                        <strong>{{ $errors->first('count_from') }}</strong>
                        </span>
                        @endif
                        </div> 


                        <div class="col {{ $errors->has('setup_price') ? ' has-error':'' }}">
                        <input id="setup_price" type="text" name="setup_price[]"  class="form-control thresold-i grid-input-text" placeholder="" >
                        @if ($errors->has('setup_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('setup_price') }}</strong>
                        </span>
                        @endif
                        </div>  


                        <div class="col  {{ $errors->has('per_item_price') ? ' has-error' : '' }}">
                        <input id="per_item_price" type="text" name="per_item_price[]" class="form-control thresold-i grid-input-text" placeholder="" >
                        @if ($errors->has('per_item_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('per_item_price') }}</strong>
                        </span>
                        @endif
                        </div>                          

                        <div class="col  {{ $errors->has('per_item_sale_price') ? ' has-error' : '' }}">
                        <input id="per_item_sale_price" type="text" name="per_item_sale_price[]" class="form-control thresold-i grid-input-text" placeholder="">
                        @if ($errors->has('per_item_sale_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('per_item_sale_price') }}</strong>
                        </span>
                        @endif                                    
                        </div> 

                        <div class="col {{ $errors->has('custom_cost') ? ' has-error' : '' }}">
                        <button  type="button" class="form-control product_price_minus_button thresold-i grid-input-text"><i class="fa fa-trash"></i></button>
                        </div> 
                      
                      </div>

                    </div>

                  </div>

                </div>
       

<input type="hidden" id="my_price" name="my_price" value="{{old('my_price')}}"  class="form-control thresold-i" value="1" placeholder="Rs. 100.00" maxlength="10">

<input type="hidden" id="market_price" name="market_price" value="{{old('market_price')}}"  class="form-control thresold-i" value="1" placeholder="Rs. 120.00" maxlength="10">


                    </div>
                  </div>
                </div>
              </div>



                <div class="card">
                  <div class="card-block">
                    <h5>Vendors</h5>
                    <div class="form-group row">
                    <div class="col-md-6 {{ $errors->has('vendor_id') ? ' has-error' : '' }} ">
                        <div class="row">
                         <div class="col-12">
                            @if($product_vendors!="[]")
                            <h6 class="pt-2 pb-2">Added Vendors</h6>
                            @foreach($product_vendors as $product_vendor)
                            <div class="col-md-auto pb-3">
                            <a class="form-control-label" href="{{$base_url}}/admin/product/product_vendor_delete/{{$product_vendor->id}}">
                            	    <span>{{$product_vendor->vendors->name}}</span>
                                  <i class="fa fa-trash"></i>
                              </a>
                              </div>
                            @endforeach
                            @endif
                           </div>                          
                        </div>



                      <hr style="border: solid black 1px;margin-top:0rem;margin-bottom:1rem;">
                      <label class="form-control-label">Add(select) New Vendors</label> 
                        <select id="vendor_id" name="vendor_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach($vendors as $vendor)
                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('vendor_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('vendor_id') }}</strong>
                        </span>
                        @endif


                        <label class="form-control-label pt-1">Sage Id</label>
                        @if($product_vendors!="[]")
                         <input type="text" id="sage_id" name="sage_id" value="{{old('sage_id',$product_vendors[0]->sage_id)}}"  class="form-control thresold-i" placeholder="Enter Sage Id" maxlength="10">
                        @else
                          <input type="text" id="sage_id" name="sage_id" value="{{old('sage_id')}}"  class="form-control thresold-i" placeholder="Enter Sage Id" maxlength="10">
                        @endif
                        @if ($errors->has('sage_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('sage_id') }}</strong>
                        </span>
                        @endif


                    </div>
               


                
                    <div class="col-md-6 {{ $errors->has('sage_id') ? ' has-error' : '' }} ">

                      <div class="col-md-6">
                        <label class="form-control-label">SKU #-</label>
                        <input type="text" id="sku" name="sku" value="{{old('sku')}}"  class="form-control thresold-i" maxlength="30" placeholder="Stock keeping unit">
                      </div>

                      <div class="col-md-6">
                        <label class="form-control-label">SKU #18858 -HIT</label>
                        <input type="text" id="sku_HIT" name="sku_HIT" value="{{$product->sku_hit}}"  class="form-control thresold-i" maxlength="30" placeholder="Stock keeping unit">
                      </div>

                      </div>
                    </div>


                  </div>
                </div>






                <!-- Option Data Start -->
               @if($product_options!=""&&$product_options!="[]")
                <div class="card">
                  <div class="card-block option_data_main_content">
                    <div class="option_data_content">
                      <!-- foreach loop start-->
                       
                

                <h5>Added Product Options</h5>
                @php
                $count=0;
                @endphp 
                

                @foreach($product_options as $option)
                @php
                $count++;
                @endphp 
                <div class="option_data_content_old">                    
                    <div class="form-group row">
            
                     <div class="col-md-12 text-right">
                     	<h6 class="float-left pt-2">Product Option {{$count}}</h6>

                     	<a href="{{$base_url}}/delete/main-option/{{$option->id}}">
                      <button type="button" class="btn btn-danger"><i class="fa fa-minus"></i></button>
                      </a>
                     </div>

                      
                      <div class="col-md-6 {{ $errors->has('option_name_old') ? ' has-error' : '' }} ">
                         <label class="form-control-label">Option Name</label>
                         <input type="text" id="option_name_old" name="option_name_old"class="form-control thresold-i option_name" placeholder="Option Name"value="{{$option->name}}"disabled="">
                          @if ($errors->has('option_name_old'))
                          <span class="help-block">
                            <strong>{{ $errors->first('option_name_old') }}</strong>
                          </span>
                          @endif
                      </div>


                      <div class="col-md-6 {{ $errors->has('show_as_old') ? ' has-error' : '' }}">
                          <label class="form-control-label">Show As</label>
                          
                         <select id="show_as" name="show_as_old" class="form-control thresold-i" disabled="">
                              <option value="0">Drop Down</option>
                          </select>
                          @if ($errors->has('show_as_old'))
                          <span class="help-block">
                            <strong>{{ $errors->first('show_as_old') }}</strong>
                          </span>
                          @endif
                      </div>

                    </div>
			                @php
			                $count1=0;
			                @endphp 

                      @foreach($option->product_sub_option as $suboption)
			                @php
			                $count1++;
                      $is_delete_sub=count($option->product_sub_option);
			                @endphp 
                    <div class="sub-option-area_old">
                    <div class="option_data_content_new_product_sub">

                      <h5>Product Sub Options {{$count1}}</h5>
                     <div class="form-group row">

                      <div class="col-md-9 {{ $errors->has('sub_option_name_old') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Sub Option Name</label>
                          <input type="text" id="sub_option_name" name="sub_option_name"   class="form-control thresold-i" value="{{$suboption->name}}" placeholder="Sub Option Name" disabled>
                          @if ($errors->has('sub_option_name_old'))
                          <span class="help-block">
                            <strong>{{ $errors->first('sub_option_name_old') }}</strong>
                          </span>
                          @endif
                      </div>
                      @if($is_delete_sub>1)
                      <div class="col-md-3 {{ $errors->has('count_from') ? ' has-error' : '' }}">
                      <label class="form-control-label">Actions</label>
                      <a href="{{$base_url}}/delete/product-suboption/{{$suboption->id}}">
                        <button style="cursor: pointer;" style="" class="form-control" type="button"><i class="fa fa-trash"></i></button>
                      </a>
                      </div>
                      @endif
                
                    </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-md-3">
                                  <label class="form-control-label">Count From</label>
                            </div>
                            
                            <div class="col-md-3">
                                  <label class="form-control-label">Setup Fee</label>
                              </div>
                            
                            <div class="col-md-3">
                                  <label class="form-control-label">Additional Fee</label>
                              </div>
                              
                              <div class="col-md-3">
                                  <label class="form-control-label">Actions</label>
                                   
                            </div>
                            
                     </div>

                    @foreach($suboption->product_sub_option_prices as $option_prices)
                    @php
                    $is_delete=count($suboption->product_sub_option_prices);
                    @endphp
                    <div class="form-group row">
                      <div class="col-md-12 ">
                          <div class="row">
                              <div class="col-md-3 {{ $errors->has('option_count_from_old') ? ' has-error' : '' }}">
                                  <!--<label class="form-control-label">Count From</label>-->
                                  <input type="number" id="option_count_from_old" name="option_count_from_old" value="{{$option_prices->quantity}}"  class="form-control thresold-i" placeholder="Count From" disabled>
                                  @if ($errors->has('option_count_from_old'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('option_count_from_old') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-3 {{ $errors->has('option_setup_fee_old') ? ' has-error' : '' }}">
                                  <!--<label class="form-control-label">Setup Fee</label>-->
                                  <input type="text" id="option_setup_fee_old" name="option_setup_fee_old" value="{{$option_prices->setup_price}}" class="form-control thresold-i" placeholder="Setup Fee" disabled>
                                  @if ($errors->has('option_setup_fee_old'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('option_setup_fee_old') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-3 {{ $errors->has('option_additional_fee_old') ? ' has-error' : '' }}">
                                  <!--<label class="form-control-label">Additional Fee</label>-->
                                  <input type="text" id="option_additional_fee_old" name="option_additional_fee_old" value="{{$option_prices->item_price}}" class="form-control thresold-i" placeholder="Additional Fee" disabled>
                                  @if ($errors->has('option_additional_fee_old'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('option_additional_fee_old') }}</strong>
                                  </span>
                                  @endif
                              </div>

                            
                           @if($is_delete>1)
                           <div class="col-md-3 {{ $errors->has('count_from') ? ' has-error' : '' }}">
                                  <!--<label class="form-control-label">Actions</label>-->
                                   <a href="{{$base_url}}/delete/suboption/subcount/{{$option_prices->id}}">
                                    <button style="cursor: pointer;" style="" class="form-control" type="button"><i class="fa fa-trash"></i></button>
                                 </a>  
                            </div>
                            @endif
                          </div>
                      </div>
                    </div>
                  @endforeach
                    </div>
                   @endforeach
                    <hr style="border: solid black 1px;">
                  </div>
                  @endforeach
                 
                  </div>
                  </div>
                </div>
               @endif
<!-- Option availabvle  Data End -->


<!-- product option add new sart -->
                <div class="card">
                  <div class="card-block option_data_main_content">
                    <div class="option_data_content">

                <div class="option_data_content_new">

                  <div class="form-group row add_new_option_all_row">
                        <div class="col-12 text-right">
                          <button class="btn btn-info add_new_option_all" type="button">Add Product Option</button>
                        </div>
                    </div>

                    <h5>Product Options</h5>

                    <div class="form-group row">

                      <div class="col-md-6 {{ $errors->has('option_name') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Option Name</label>
                          <input type="text" id="option_name" name="option_name[0]"   class="form-control thresold-i option_name" placeholder="Option Name" index="0">
                          @if ($errors->has('option_name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('option_name') }}</strong>
                          </span>
                          @endif
                      </div>


                      <div class="col-md-6 {{ $errors->has('show_as') ? ' has-error' : '' }}">
                          <label class="form-control-label">Show As</label>
                          <!-- <input type="text" id="show_as" name="show_as[]"   class="form-control thresold-i" placeholder="Show as" maxlength="10"> -->
                          <select id="show_as" name="show_as[0]" class="form-control thresold-i">
                              <option value="0">Drop Down</option>
<!--                               <option value="1">Radio</option>
                              <option value="2">Checkbox</option> -->
                          </select>
                          @if ($errors->has('show_as'))
                          <span class="help-block">
                            <strong>{{ $errors->first('show_as') }}</strong>
                          </span>
                          @endif
                      </div>

                    </div>


                    <div class="sub-option-area sub-option-area_new0">
                    <div class="option_data_content_new_product_sub">

                      <h5>Product Sub Options</h5>
                     <div class="form-group row">

                      <div class="col-md-6 {{ $errors->has('sub_option_name') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Sub Option Name</label>
                          <input type="text" id="sub_option_name" name="sub_option_name[0][0]"   class="form-control thresold-i" placeholder="Sub Option Name">
                          @if ($errors->has('sub_option_name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('sub_option_name') }}</strong>
                          </span>
                          @endif
                      </div>
                        <div class="col-6 text-right suboption-btn">
                          <button class="btn btn-info add_new_sub_option_all" index="0" type="button">Add Sub Option</button>
                        </div>
                    </div>
                    </div>
 



                   
                    <div class="form-group row">
                      <div class="col-md-12 add_new_option_values add_new_option_values0">
                          <div class="row">
                              <div class="col-md-3 {{ $errors->has('option_count_from') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Count From</label>
                                  <input type="number" id="option_count_from" name="option_count_from[0][0][]"  class="form-control thresold-i" placeholder="Count From">
                                  @if ($errors->has('option_count_from'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('option_count_from') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-3 {{ $errors->has('option_setup_fee') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Setup Fee</label>
                                  <input type="text" id="option_setup_fee" name="option_setup_fee[0][0][]"  class="form-control thresold-i" placeholder="Setup Fee">
                                  @if ($errors->has('option_setup_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('option_setup_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-3 {{ $errors->has('option_additional_fee') ? ' has-error' : '' }}">
                                  <label class="form-control-label">Additional Fee</label>
                                  <input type="text" id="option_additional_fee" name="option_additional_fee[0][0][]"  class="form-control thresold-i" placeholder="Additional Fee">
                                  @if ($errors->has('option_additional_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('option_additional_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col-md-3">
                                  <label class="form-control-label">Actions</label>
                                  <button class="form-control add_option_child" type="button" index="00" ind="[0][0][]"><i class="fa fa-plus" ></i></button>
                                  
                              </div>

                          </div>
                      </div>
                    </div>

                    </div>

                    <!-- option Retail Price End -->
                  </div>


                  </div>

                  </div>
                </div>
<!-- product option add new end -->


 <!-- product Apparel -->


                <div class="card">
                  <div class="card-block">
                    <h5>Product Apparel</h5>
                    <div class="form-group row">
                    <div class="col-md-12 {{ $errors->has('vendor_id') ? ' has-error' : '' }}">
                        <div class="row">
                         <div class="col-12">
                            @if($product_Apparel!="[]")
                            <h6 class="pt-2 pb-2">Added Apparel</h6>
                            @foreach($product_Apparel as $product_App)
                            <div class="col-md-auto pb-3">
                            <a class="form-control-label" href="{{$base_url}}/admin/apparel/product_apparel_delete/{{$product_App->id}}">
                            	    <span>{{$product_App->apparel->apparel_name}}</span>
                                  <i class="fa fa-trash"></i>
                              </a>
                              </div>
                            @endforeach
                            @endif
                           </div>                          
                        </div>

                      <hr style="border: solid black 1px;margin-top:0rem;margin-bottom:1rem;">
                      <label class="form-control-label">Add(select) New Apprel</label> 
                        <select id="apparel_id" name="apparel_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach($All_Apparel as $Apparel)
                            <option value="{{$Apparel->id}}">{{$Apparel->apparel_name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('apparel_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('apparel_id') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>

                </div>
              </div>




<!-- --------------------------------------------------------------------- -->

           <!--Imprint card data start-->
            <div class="card">
            <div class="card-block imprint_data_main_content">
                   
            <div class="imprint_data_content">
              @if($imprints!="[]")
                @foreach($imprints as $imprint)
                  <div class="imprint_data_content_new">
                    <div class="row">
                      <div class="col-10"><h5>Imprints(default)</h5></div>
                      <div class="col-2 text-right">
                     
                            <button type="button" class="btn btn-danger delete_imprint_data{{$imprint->id}}"><i class="fa fa-minus"></i></button>
                       
                      </div>
                    </div>
                    <!-- <h5>Imprints</h5> -->

                    <!-- border for row start -->
                    <div style="border: 1px solid #ccc;padding: 10px;margin-top: 10px;margin-bottom: 10px;">
                    <div class="form-group row">

                      <div class="col-md-6 {{ $errors->has('imprint_name') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Name</label>
                          <input type="text" id="imprint_name{{$imprint->id}}" name="imprint_name_edit[]"   class="form-control thresold-i" placeholder="imprint name" value="{{$imprint->name}}">
                          @if ($errors->has('imprint_name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('imprint_name') }}</strong>
                          </span>
                          @endif
                      </div>

                      <div class="col-md-6 {{ $errors->has('max_colors') ? ' has-error' : '' }}">
                          <label class="form-control-label">Maximum Colors</label>
                          <input type="number" id="max_colors{{$imprint->id}}" name="max_colors_edit[]"   class="form-control thresold-i" placeholder="Max Colors" value="{{$imprint->max_colors}}">
                          @if ($errors->has('max_colors'))
                          <span class="help-block">
                            <strong>{{ $errors->first('max_colors') }}</strong>
                          </span>
                          @endif
                      </div>

                    </div>



                    <div class="form-group row">
                      <div class="col-md-8 {{ $errors->has('color_group_id') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Color Group</label>
                          <select id="color_group_id{{$imprint->id}}" name="color_group_id_edit[]" class="form-control thresold-i color_group_id_{{$imprint->id}}" >
                            <option selected="" disabled="">Select Color Group</option>
                            @foreach($color_groups as $color_group)
                            <option value="{{$color_group->id}}">{{$color_group->name}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('color_group_id'))
                          <span class="help-block">
                            <strong>{{ $errors->first('color_group_id') }}</strong>
                          </span>
                          @endif
                      </div>
                      <div class="col-md-4 text-right"><br>
                        <button type="button" class="btn btn-info imprint_data_save{{$imprint->id}}">save</button>
                      </div>
                    </div>


                    </div>
                    <!-- border for row end -->

                    <div  style="border: 1px solid #ccc;padding: 10px;margin-top: 10px;margin-bottom: 10px;">
                     <div class="form-group row" style="
                     ">
                      <div class="col-md-9 {{ $errors->has('color_id') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Custom Color</label>
                          <div class="row">
                         <div class="col-12">
                            @foreach($imprint->imprint_colors as $imprint_color)
                                <div style="margin-bottom:5px !important; " class="d-inline-flex">
                                    {{$imprint_color->colors->name}}&nbsp;<a href="{{$base_url}}/admin/product/imprint_color_delete/{{$imprint_color->id}}">
                                    <button class="btn btn-danger imprint_color_delete_button" type="button"><i class="fa fa-trash"></i></button>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                              
                            @endforeach
                           </div>
                        </div>
                        
<style>
button.imprint_color_delete_button {
    border-radius: 2px;
    text-transform: capitalize;
    padding: 0px 0px 0px 5px;
    cursor: pointer;
}
</style>
                        
                        
                          <select  name="color_id_edit[0][]" multiple="multiple" class="form-control js-example-basic-multiple color_id_{{$imprint->id}}" >
                            <option disabled="">Select Color</option>
                            @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('color_id'))
                          <span class="help-block">
                            <strong>{{ $errors->first('color_id') }}</strong>
                          </span>
                          @endif
                      </div>
                      <div class="col-md-3 text-right"><br><br><br>
                          <button type="button" class="btn btn-info imprint_color_id_edit_save{{$imprint->id}}">save</button>
                      </div>
                    </div>

                    </div>


                    <div class="row pl-4">

                    <div class="col-md-3">
                      <div class="row form-control-label pt-2 pb-2">CountFrom</div>
                      <div class="row form-control-label pt-2 pb-2">Location SetupFee</div>
                      <div class="row form-control-label pt-2 pb-2">Additional Location Running Fee</div>
                      <div class="row form-control-label pt-2 pb-2">Additional ColorSetupFee</div>
                      <div class="row form-control-label pt-2 pb-2">Additional Color Running Fee</div>
                      <div class="row form-control-label pt-2 pb-2">Action</div>

                    </div>

                     <div class="col-md-9 pt-2">

                     <div class="row price-grid-append-container-scroll">

                     @foreach($imprint->imprint_price as $imprint_price)
                       <div class="col-md-2  price-grid-input-container">

                        <div class="col  {{ $errors->has('count_from') ? ' has-error' : '' }}">
                          <input type="number" id="imprint_count_from{{$imprint_price->id}}" name=""  class="form-control thresold-i thresold-i grid-input-text-imprint" placeholder="Count From" maxlength="10" value="{{$imprint_price->quantity}}" >
                        </div> 


                        <div class="col {{ $errors->has('setup_price') ? ' has-error':'' }}">
                         <input type="text" id="imprint_location_setup_fee{{$imprint_price->id}}" name=""  class="form-control thresold-i thresold-i grid-input-text-imprint" placeholder="Location Setup" maxlength="10" value="{{$imprint_price->setup_price}}" >
                        </div>  


                        <div class="col  {{ $errors->has('per_item_price') ? ' has-error' : '' }}">
                         <input type="text" id="imprint_additinal_location_running_fee{{$imprint_price->id}}" name=""   class="form-control thresold-i thresold-i grid-input-text-imprint" placeholder="Additional Location" maxlength="10" value="{{$imprint_price->item_price}}" >
                        </div>                          

                        <div class="col  {{ $errors->has('per_item_sale_price') ? ' has-error' : '' }}">
                         <input type="text" id="imprint_additional_setup_fee{{$imprint_price->id}}" name=""   class="form-control thresold-i thresold-i grid-input-text-imprint" placeholder="addn setup fee" maxlength="10" value="{{$imprint_price->color_setup_price}}" >                                   
                        </div> 


                  <div class="col">
                      <input type="text" id="imprint_additional_running_fee{{$imprint_price->id}}" name=""  class="form-control thresold-i thresold-i grid-input-text-imprint" placeholder="addn runn fee" maxlength="10" value="{{$imprint_price->color_item_price}}" >
                  </div>


                        <div class="col {{ $errors->has('custom_cost') ? ' has-error' : '' }}">

                        <a href="{{$base_url}}/admin/product/imprintProductPriceDelete/{{$imprint_price->id}}">
                          <button style="cursor: pointer;" style="" class="form-control grid-input-text-imprint" type="button"><i class="fa fa-trash "></i></button>
                        </a>
                        
                        </div>

                       <div class="col {{ $errors->has('custom_cost') ? ' has-error' : '' }}">
                        	
                       <button style="cursor: pointer;" class="grid-input-text-imprint btn btn-info form-control imprint_price_edit{{$imprint_price->id}}" type="button">Save</button>

                       </div> 

                      </div>
                     @endforeach
                    </div>

                  </div>

                </div>

              </div>
                    <!-- Imprint Data Ended -->
                  @endforeach
                  @endif
                    <div class="form-group row add_new_imprint_all_row">
                        <div class="col-12 text-right">
                          <button class="btn btn-info add_new_imprint_all" type="button">Add Imprint</button>
                        </div>
                    </div>

                  </div>
                </div>
                </div>




                <!-- Imprint data end -->

                <div class="card">
                  <div class="card-block">

                      <h5>Item Color Groups</h5><br>
			
                    @if($product_colors!="[]")
                       <div class="row">
                       <div class="col-12">
                      <h6 class="pt-2 pb-2">Added Item color</h6>
												<div class="form-group row">
												@if($product_colors!="")
												@if($product_colors->product_colors!="[]")
												@foreach($product_colors->product_colors as $color)
												<div class="col-md-auto pb-3">
												<a class="form-control-label" href="{{$base_url}}/admin/product/product_color_delete/{{$color->color->id}}">
												<span>{{$color->color->name}}</span>
												<i class="fa fa-trash"></i>
												</a>
												</div>
												@endforeach
												@endif
												@endif
												</div>
                        </div>
                      </div>
                      <hr style="border: solid black 1px;margin-top:0rem;margin-bottom:1rem;">	
                       @endif  
                   <div class="form-group row">

                    <div class="col-md-6{{ $errors->has('item_color_group_id') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Select Item color </label>
                        <select id="item_color_group_id" name="item_color_group_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                          @foreach($colors as $color1)
                            <option value="{{$color1->id}}">{{$color1->name}}</option>
                          @endforeach
                        </select>

                        @if ($errors->has('item_color_group_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('item_color_group_id') }}</strong>
                        </span>
                        @endif
                    </div>



                  
                    <div class="col-md-6 {{ $errors->has('item_color_group_name') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Custom Color Group</label>
                       
                         <input type="text" name="item_color_group_name" value="{{old('item_color_group_name',$item_color_group['product_color_name'])}}"  class="form-control thresold-i" placeholder="Color Group Name">
                        
                        @if ($errors->has('item_color_group_name'))
                        <span class="help-block">
                          <strong>{{ $errors->first('item_color_group_name') }}</strong>
                        </span>
                        @endif
                    </div>

                  </div>

                  </div>
                </div>

                <div class="card">
                  <div class="card-block">
                    <form class="w-100" id="uploadForm" enctype="multipart/form-data" action="" method="post">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="product_id" value="{{$product->product_id}}">
                      <div class="form-group row">
                        <div class="col-md-6 {{ $errors->has('files') ? ' has-error' : '' }}">
                          
                          <img class="img-fluid" src="{{$base_url}}/files/assets/images/preview.png" id="color_image_preview" alt="">
                          <label for="file"  class="col-form-label form-control-label">Product Color Image *</label>
                          <label for="file" class="custom-file">
                            <input type="file" id="variant_image_product" name="files[]" class="custom-file-input form-control"  onchange="document.getElementById('color_image_preview').src = window.URL.createObjectURL(this.files[0])"/>
                            <span class="custom-file-control"></span>
                          </label>
                          <span class="help-block">
                            <strong id="newerror_product_image"></strong>
                          </span>
                        </div>

                        <div class="col-md-4">
                          <label class="form-control-label">Select Product Color</label>
                          <select class="form-control select-box parent_variant_id_value" id="parent_variant_id" name="parent_variant_id">
                            <option value="">Select Product Color</option>
                            @if($get_product_colors!="[]")
                            @foreach($get_product_colors as $get_product_color)
                            <option value="{{$get_product_color->color_id}}">{{$get_product_color->color->name}}</option>
                            @endforeach
                            @endif
                          </select>
                          <!-- <small id="emailHelp" class="form-text text-muted">If you want to add this product under any category then select category.</small> -->
                        </div>
                        
                      </div>

                      <button id="color-save-image" type="button" value="Submit" name="save" class="btn btn-primary waves-effect waves-light pull-right product_color_and_image_button">Save</button>

                      
                    </form>

                    <div class="row">
                        <div class="col-12 row" id="product_color_image_show">
                        	@if($product_color_new!="[]")
                          @foreach($product_color_new as $colorimage)
                          @if($colorimage->image_src!="")
                          <div class="col-md-3" style="border:1px solid #eee;height: 170px;">
                              <i id="{{$colorimage->id}}" class="delete-product-color fa fa-check fa fa-trash-o" aria-hidden="true"></i>
                              <img src="{{$base_url}}/storage/app/{{$colorimage->image_src}}" style="height:100px;width: 100%;">
                          </div>
                          @endif
                          @endforeach
                          @endif
                        </div>
                    </div>

                  </div>
                </div>







								<div class="card">
									<div class="card-block">
										<form class="w-100" id="uploadForm" enctype="multipart/form-data" action="" method="post">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="product_id" value="{{$product->product_id}}" class="product_id_value">
											<div class="form-group row">
												<div class="col-md-4 {{ $errors->has('files') ? ' has-error' : '' }}">
													
													<img  src="{{$base_url}}/files/assets/images/preview.png" id="variant_image_preview" alt="">
													<label for="file"  class="col-form-label form-control-label">Multipe Images *</label>
													<label for="file" class="custom-file">

														

														<input type="file" id="variant_image" name="files[]" class="custom-file-input form-control"  onchange="document.getElementById('variant_image_preview').src = window.URL.createObjectURL(this.files[0])" multiple/>
														<span class="custom-file-control"></span>

													</label>
													<span class="help-block">
														<strong id="error_product_image"></strong>
													</span>
												</div>
												
											</div>

											<button id="save-image" type="button" value="Submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
										</form>

										<div class="col-md-12 row" id="product-images-div">
											@foreach($product_images as $product_image)
											<div class="col-md-3" style="border:1px solid #eee;height: 170px;">
												<i id="{{$product_image->product_image_id}}" class="delete-variant-image fa fa-trash-o" aria-hidden="true"></i>
												<img src="{{$base_url}}/storage/app/{{$product_image->product_image}}" style="height:100px;width: 100%;">
											</div>
											@endforeach

										</div>
									</div>
								</div>
								


															
									<!-- inventory and product quantity -->

									
									<div class="card">
										<div class="card-block">

										<div class="form-group row">
											<div class="col-md-6">
												<label class="form-control-label">Inventory policy</label>
												<select class="form-control select-box" id="track_inventory" name="track_inventory">
													<option value="0">Don't track inventory</option>
													<option value="1">tracks this product's inventory</option>
												</select>
											</div>

										</div>
										<div class="quantity">
											<div class="checkbox-fade fade-in-primary">
												<label class="pull-left">
													<input type="checkbox" id="allow_customer_stock_out" name="allow_customer_stock_out" value="1">      
													<span class="cr"><i class="cr-icon fa fa-check"></i></span>
												</label>
												<label class="form-control-label pull-left">Allow customers to purchase this product when it's out of stock</label>
											</div>
										</div>
									</div>
								</div>
								
								
								
								<div class="card">
									<div class="card-block">
										<h6>Search engine listing preview (optional)</h6>

										<div class="form-group">
											<button id="edit-seo" class="btn btn-link pull-right" type="button">Edit website SEO</button>
											<button  id="cancel-seo" class="btn btn-link pull-right" type="button">Cancel</button>
											<p class="text-muted">Add a title and description to see how this product might appear in a search engine listing.</p>
										</div>

										<div class="meta form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
											<label class="form-control-label">Meta title</label>
											<input type="text" name="meta_title" value="{{$product->default_product_translation_full->meta_title}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta title">
											@if ($errors->has('meta_title'))
											<span class="help-block">
												<strong>{{ $errors->first('meta_title') }}</strong>
											</span>
											@endif
										</div>

										<div class="meta form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
											<label class="form-control-label">Meta keywords </label>
											<input type="text" name="meta_keywords" value="{{$product->default_product_translation_full->meta_keywords}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta keywords">
											@if ($errors->has('meta_keywords'))
											<span class="help-block">
												<strong>{{ $errors->first('meta_keywords') }}</strong>
											</span>
											@endif
										</div>

										<div class="meta form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
											<label class="form-control-label">Meta Description</label>
											<textarea name="meta_description" class="form-control" rows="5" maxlength="1000" placeholder="Enter meta description">{{$product->default_product_translation_full->meta_description}}</textarea>
											@if ($errors->has('meta_description'))
											<span class="help-block">
												<strong>{{ $errors->first('meta_description') }}</strong>
											</span>
											@endif
										</div>


					<div class="meta form-group {{ $errors->has('google_product_category') ? ' has-error' : '' }}">
	                      <label class="form-control-label">Google Product Category</label>
	                      <input type="text" name="google_product_category" value="{{old('google_product_category',$product->default_product_translation_full->google_product_category)}}" class="form-control thresold-i" maxlength="1000" placeholder="Google Product Category">
	                      @if ($errors->has('google_product_category'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('google_product_category') }}</strong>
	                      </span>
	                      @endif
                    </div>


                    <div class="meta form-group {{ $errors->has('image_alt_text') ? ' has-error' : '' }}">
	                      <label class="form-control-label">Image Alt Text</label>
	                      <input type="text" name="image_alt_text" value="{{old('image_alt_text',$product->default_product_translation_full->image_alt_text)}}" class="form-control thresold-i" maxlength="1000" placeholder="Image Alt text">
	                      @if ($errors->has('image_alt_text'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('image_alt_text') }}</strong>
	                      </span>
	                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
	                      <label class="form-control-label">Gender</label>
	                      <input type="text" name="gender" value="{{old('gender',$product->default_product_translation_full->gender)}}" class="form-control thresold-i" maxlength="1000" placeholder="Gender">
	                      @if ($errors->has('gender'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('gender') }}</strong>
	                      </span>
	                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('age_group') ? ' has-error' : '' }}">
	                      <label class="form-control-label">Age Group</label>
	                      <input type="text" name="age_group" value="{{old('age_group',$product->default_product_translation_full->age_group)}}" class="form-control thresold-i" maxlength="1000" placeholder="Age Group">
	                      @if ($errors->has('age_group'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('age_group') }}</strong>
	                      </span>
	                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('material') ? ' has-error' : '' }}">
	                      <label class="form-control-label">Material</label>
	                      <input type="text" name="material" value="{{old('material',$product->default_product_translation_full->material)}}" class="form-control thresold-i" maxlength="1000" placeholder="Material">
	                      @if ($errors->has('material'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('material') }}</strong>
	                      </span>
	                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('pattern') ? ' has-error' : '' }}">
                      <label class="form-control-label">Pattern</label>
                      <input type="text" name="pattern" value="{{old('pattern',$product->default_product_translation_full->pattern)}}" class="form-control thresold-i" maxlength="1000" placeholder="Pattern">
                      @if ($errors->has('pattern'))
                      <span class="help-block">
                        <strong>{{ $errors->first('pattern') }}</strong>
                      </span>
                      @endif
                    </div>



									</div>

								</div>
								

								<!-- end inventory -->
								<!-- select Return policy for products -->
								<div class="card">
									<div class="card-block">
										<div class="form-group">
											<label class="form-control-label">Add Return Policy (optional)</label>
											<select class="form-control select-box" id="return_policy_id" name="return_policy_id">
												<option value="">Select Policy </option>
												@foreach($return_policies as $return_policy)
												<option value="{{$return_policy->return_policy_id}}">{{$return_policy->default_return_policy_translation->return_policy_title}}</option>
												@endforeach
											</select>
											<small id="emailHelp" class="form-text text-muted">If you want to add this product under any Return Policy then select that policy.</small>
										</div>
									</div>
								</div>
								<!-- select Return policy END -->
							</div>



							<div class="col-md-4">
								<div class="card">
									<div class="card-block">
										<div class="form-group">
											<label class="form-control-label">Upadte Category</label>


											<select class="js-example-placeholder-multiple1 col-sm-12" multiple="multiple" id="category_id" name="category_id[]" >
												<option value="">Select category</option>
												@foreach($categories as $category)
												@php

												$string=$category->default_category_translation->description;             
												if(strlen($string)>17)
												{
													$result =substr($string, 0, 17)."...";
												}
												else
												{
													$result =substr($string, 0, 17);
												}

												@endphp
												<option value="{{$category->category_id}}">{{$category->default_category_translation->category_name}} </option>

												@endforeach
											</select>
											<small id="emailHelp" class="form-text text-muted">If you want to add this seller under any category then select category.</small>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-block">
										<div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
											<label class="form-control-label">Brand (optional)</label>
											<select class="form-control select-box" id="brand_id" name="brand_id">
												<option value="">Select brand</option>
												@foreach($brands as $brand)
												<option value="{{$brand->brand_id}}">{{$brand->default_brand_translation->brand_name}}</option>
												@endforeach
											</select>
											@if ($errors->has('brand_id'))
											<span class="help-block">
												<strong>{{ $errors->first('brand_id') }}</strong>
											</span>
											@endif
											<small id="emailHelp" class="form-text text-muted">If your product does not have any brand, then please keep it blank.</small>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-block">
										<div class="form-group {{ $errors->has('product_minimum_quantity') ? ' has-error' : '' }}">
											<label class="form-control-label">Product Minimum Qunatity</label>
											<input type="number" name="product_minimum_quantity" value="{{old('product_minimum_quantity',$product->product_minimum_quantity)}}"  class="form-control thresold-i" placeholder="Product Minimum Quantity" maxlength="40">
											@if ($errors->has('product_minimum_quantity'))
											<span class="help-block">
												<strong>{{ $errors->first('product_minimum_quantity') }}</strong>
											</span>
											@endif
										</div>

									</div>
								</div>
								

								
								<div class="card">
									<div class="card-block">
										<div class="form-group {{ $errors->has('delivery_message') ? ' has-error' : '' }}">
											<label class="form-control-label">Delivery message (optional)</label>
											<input type="text" name="delivery_message" value="{{$product->default_product_translation->delivery_message}}"  class="form-control thresold-i" value="Free delivery" maxlength="40">
											@if ($errors->has('delivery_message'))
											<span class="help-block">
												<strong>{{ $errors->first('delivery_message') }}</strong>
											</span>
											@endif
										</div>
										<small class="form-text text-muted">This message will be displayed at product description.</small>
									</div>
								</div>


                <div class="card">
                <div class="card-block">
                  <div class="form-group {{ $errors->has('additional_specification') ? ' has-error' : '' }}">
                      <label class="form-control-label">Additional Specification <!-- <span>*</span> --></label>
                      <input id="additional_specification" type="file" name="additional_specification" value="{{old('additional_specification')}}" class="form-control thresold-i" placeholder="Choose Additional Specification">
                      @if ($errors->has('additional_specification'))
                      <span class="help-block">
                        <strong>{{ $errors->first('additional_specification') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
              </div>



              <div class="card">
                <div class="card-block">
                    <div class="form-group {{ $errors->has('video') ? ' has-error' : '' }}">
                      <label class="form-control-label">Video <!-- <span>*</span> --></label>
                      <input id="video" type="file" name="video" value="{{old('video')}}" class="form-control thresold-i" placeholder="Choose file" >
                      @if ($errors->has('video'))
                      <span class="help-block">
                        <strong>{{ $errors->first('video') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
              </div>

							</div>
							<!-- Add Variant -->



							
							<!-- End Question Answere -->
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="main-footer">
										<span class="lower-buttons">
											
											@if($my_permissions->contains('PRODUCT_UPDATE'))
											<button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
											@if($my_permissions->contains('PRODUCT_UPDATE'))
											@if($product->status_id==1)
											<button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
											</button>
											@else
											<button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
											@endif
											@endif
											<a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
											</button></a>
											
											
										</span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				
				<div class="md-modal md-effect-13 addcontact" id="modal-13" >
					<div class="md-content">
						<h3 class="f-26">Add Variant </h3>
						<div class="modal-body" style="height: 400px !important;">						

							<div id="parent" class="col-md-8">
								<div class="tags_add_multiple">
									<div class="form-group">
										@if($is_parent_variant==1)
										

										@if($product->parent_variant!="")
										

										@if($product->parent_variant->default_variant_translation!="")
										<label class="form-control-label">{{$product->parent_variant->default_variant_translation->variant_name}}</label>
										<input type="text" id="parent_variant_value" name="parent_variant_value" class="form-control"  placeholder="">
										<input type="hidden" id="p_v_id" name="parent_variant_id" value="{{$product->parent_variant->default_variant_translation->parent_variant_id}}">
										

										@endif
										@endif
										@endif
									</div>
								</div>
							</div>
							<div id="child" class="col-md-8">
								<div class="tags_add_multiple">
									<div class="form-group">
										@if($is_child_variant==1)
										
										@if($product->child_variant!="")
										@if($product->child_variant->default_variant_translation!="")
										<label class="form-control-label">{{$product->child_variant->default_variant_translation->variant_name}}</label>
										<input type="text" name="child_variant_value" id="child_variant_value" class="form-control" multiple="multiple" placeholder="" >
										<input id="c_v_id" type="hidden" name="child_variant_id" value="{{$product->child_variant->default_variant_translation->child_variant_id}}">
										@endif
										@endif
										@endif
										
										
									</div>
								</div>
							</div>
							<div id="market_price" class="col-md-8">
								<div class="tags_add_multiple">
									<div class="form-group">
										
										<label class="form-control-label">Retail Selling Price</label>
										<input type="text" name="my_price" id="my_price" class="form-control" placeholder="" >

									</div>
								</div>
							</div>
							<div id="market_price" class="col-md-8">
								<div class="tags_add_multiple">
									<div class="form-group">
										<label for="market_price" class="form-control-label">MRP</label>
										<input type="text" name="market_price" id="market_price" class="form-control"  placeholder="" >

									</div>
								</div>
							</div>
							<button id="save_variants" type="button" class="btn btn-primary waves-effect waves-light ">Save</button>
						</div>
					</div>
				</div>
				<div class="md-overlay"></div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$( document ).ready(function() {
		$(".variant_quantities").on("change",function(){
			quantity=$(this).val();
			if(quantity<0){
				$(this).val(1);
				// notify("@lang("product.quantity_should_be_greater_than_zero")");
			}

		});
	});




/*for price grid single grid update*/
var product_price_grid=<?php echo json_encode($product->product_prices);?>;

$.each(product_price_grid,function(index,item){
$('.save-grid-col-'+item.product_price_id).on('click',function(){

console.log(item);

product_price_id= item.product_price_id;
price_count_from = $('.count_from-'+item.product_price_id).val();
price_setup_price=$('.setup_price-'+item.product_price_id).val();
price_per_item_price=$('.per_item_price-'+item.product_price_id).val();
price_per_item_sale_price=$('.per_item_sale_price-'+item.product_price_id).val();


// alert(imprint_additional_running_fee);

$.ajax({
type:'POST',
url:"{{$base_url}}/admin/product/editPricGridData",
data:{'product_price_id':product_price_id,'price_setup_price':price_setup_price,'price_count_from':price_count_from,'price_per_item_price':price_per_item_price,'price_per_item_sale_price':price_per_item_sale_price,"_token": "{{csrf_token()}}"},

success:function(data) {
alert("Prices Data Updated Successfully");
}

});
});
});
//Imprint price data end




</script>



<script type="text/javascript">
	$( document ).ready(function() {

		$("#product_name").keyup(function(){
			var Text = $(this).val();
       /* Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');*/
        $("#product_url").val(Text);        
    });

		if($("#track_inventory").val()==1){
			$(".quantity").show();
		}else{
			$(".inventory").val("");
			$(".quantity").hide();
		}

		$(".inventory_section").hide();
		$("#track_inventory").change(function(){
			track_inventory=$("#track_inventory").val();
			if(track_inventory==1){
				$(".inventory_section").show();
				$(".quantity").show();
			}else{
				$(".inventory").val("");
				$(".inventory_section").hide();
				$(".quantity").hide();
			}
		});

		var is_inventory='{{$product->track_inventory}}';
		if(is_inventory==1){
			$(".inventory_section").show();
		}
//=======
		var oldBrand="{{old('brand_id')}}";
		if(oldBrand!=""){
			$("#brand_id option[value="+oldBrand+"]").prop('selected',true);
		}
		$("#brand_id option[value={{$product->brand_id}}]").prop('selected',true);
//========

//is collection stock
    var is_stock_collection = '{{$product->is_stock_collection}}';
    if(is_stock_collection==1){
      $("#is_stock_collection").prop('checked',true);
    }
    
//==========
   

    // var product_vendors=<?php echo json_encode($product_vendors);?>;
    // $.each(product_vendors,function(index,item){
    //   $("#vendor_id option[value="+item.vendor_id+"]").prop('selected',true);
    // });
//==========

//==============
      var item_color_group_id = "{{$item_color_group['group_id']}}";
      if(item_color_group_id!=""){
        $(".item_color_group_id option[value="+item_color_group_id+"]").prop('selected',true);
      }
      
    
//=========
		var custom_method="{{old('custom_method')}}";
		if(custom_method!=""){
			$("#custom_method  option[value="+custom_method+"]").prop('selected',true);
		}
		$("#custom_method  option[value={{$product->custom_method}}]").prop('selected',true);



		var oldSeller="{{old('seller_id')}}";
		if(oldBrand!=""){
			$("#seller_id option[value="+oldSeller+"]").prop('selected',true);
		}
		$("#seller_id option[value={{$product->seller_id}}]").prop('selected',true);


		@if($product->return_policy!="")
		$("#return_policy_id option[value={{$product->return_policy->return_policy_id}}]").prop('selected',true);
		@endif

		
		var oldTrackInventory="{{$product->track_inventory}}";
		if(oldTrackInventory==1){
			$("#track_inventory option[value="+oldTrackInventory+"]").prop('selected',true);
			$(".quantity").show();
		}else{
			$("#track_inventory option[value=0]").prop('selected',true);
			$(".inventory").val("");
			$(".quantity").hide();
		}

        
		
   //    $.each(category_products,function(index,item){
   //     $("#category_id option[value="+item.category_id+"]").prop('selected',true);
   //   });

		var allow_customer_stock_out="{{$product->allow_customer_stock_out}}";

		if(allow_customer_stock_out==1){
			$('#allow_customer_stock_out').prop('checked', true);
		}

		var gst=<?php echo json_encode($gst);?>;
		$.each(gst,function(index,item){
			select_text=item.gst+' %';
			select_value=item.gst_id;
			var o= new Option(select_text,select_value);
			$("#gst_id").append(o);
		});
		var gst_id="{{$product->gst_id}}";
		if(gst_id!=""){
			$("#gst_id option[value="+gst_id+"]").prop('selected',true);
		}


		$(function() {
			var options = $.extend(true, {lang: '' , codemirror: {theme: 'monokai', mode: 'text/html', htmlMode: true, lineWrapping: true} } , {
				"toolbar": [
				["style", ["style"]],
				["font", ["bold", "underline", "italic", "clear"]],
				["color", ["color"]],
				["para", ["ul", "ol", "paragraph"]],
				["table", ["table"]],
				["insert", ["link"]],
				["view", ["fullscreen", "codeview", "help"]],
				['fontname', ['fontname']
				],
				['fontNames', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
				['fontNamesIgnoreCheck', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
				]
			});
			$("textarea.summernote-editor").summernote(options);
		});
		$(".delete_variant").click(function(){
			var id=this.id;
			$.ajax({
				type: 'post',
				url: 'deleteVariant',
				data: {"_token": "{{ csrf_token() }}",'id':id},
				success: function (result) {
					if(result==1){
						var title="Product deleted successfully";
						// notify(title);
						$tr=$("#variant_table").find("#"+id).parent().parent().remove();
					}if(result==4){
						var title="you cannot delete this product";
						// notify(title);
					}else if(result==2){
						var title="you can not delete last variant";
						// notify(title);
					}else{
						var title="Product already deleted";
						// notify(title);
					}
				},
				error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
			});
		});


//==================================================================



//==================================================================

    $(".product_color_and_image_button").on('click',(function(){
      /*var file_data = $("#variant_image").prop("files")[0];*/
      form_data = new FormData();
      jQuery.each($("#variant_image_product")[0].files, function(i, file) {
        form_data.append('files['+i+']', file);
      });

        // var file = $("#variant_image_product").val();
        // form_data.append('file', file);
        
      var product_color_id = $('.parent_variant_id_value').val();
      if(product_color_id=="" ){
        alert('Please Select Product Color');
        return false;
      }
      else{
        var is_file=$('#variant_image_product').val();
         if(is_file==""){
           alert("Please Choose product color file");
          return false;       	
         }else{
 
      form_data.append("product_color_id", product_color_id);
      var product_id="{{$product->product_id}}";
      
      form_data.append("product_id", product_id);
      /*  form_data.append("variant_image", file_data);*/

      form_data.append( "_token", "{{ csrf_token() }}" );

      $.ajaxSetup
      ({
        headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
      });

      $.ajax({
        method: "POST",
        url: "{{$base_url}}/admin/product/editProductColor",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(result){
          console.log(result);
          $('#select-box-parent_variant_id-container').text("Select Product Color");
          $('#parent_variant_id').val("");
          $('#variant_image_product').val("");
         image_src = result["product_color"]["image_src"];
          /*$("#product_color_image_show").html('');*/
          $("#product_color_image_show").append('<div class="col-md-3" style="border:1px solid #eee;height: 170px;"><i id="'+result["product_color"]["id"]+'" class="delete-product-color fa fa-check fa fa-trash-o" aria-hidden="true"></i><img src="{{$base_url}}/storage/app/'+image_src+'" style="height:100px;width: 100%;"></div>');
           alert(" Product color Image added successfully...");

        },
        error: function(result){
        }  


      });

    }
}

}));



    $('#product_color_image_show').on('click','.delete-product-color',function(){
        var product_color_id = $(this).attr('id');
        $(this).parent('div').remove();
        $.ajax({
        type: 'post',
        url: 'product-color/image_src/delete',
        data: {"_token": "{{ csrf_token() }}",'product_color_id':product_color_id},
        success: function(result){
          alert('product color image deleted successfully');
        },
        error: function(result){
        }           
      });
    });

    // delete-product-color

//=================================================================

		$("#save-image").on('click',(function(){
			form_data = new FormData();
			jQuery.each($("#variant_image")[0].files, function(i, file) {
				form_data.append('files['+i+']', file);
			});

			var product_id="{{$product->product_id}}";
			form_data.append("product_id", product_id);
			form_data.append( "_token", "{{ csrf_token() }}" );

			$.ajaxSetup
			({
				headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
			});

			$.ajax({
				method: "POST",
				url: "{{$base_url}}/admin/product/image/add",
				dataType: 'json',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				success: function(result){
					if(result.status=="true"){
						$("#product-images-div").html("");
						$.each(result.data.data,function(index,item){
							

							

							$("#product-images-div").append('<div class="col-md-3" style="border:1px solid #eee;height: 170px;"><i id="'+item.product_image_id+'" class="delete-variant-image fa fa-check fa fa-trash-o" aria-hidden="true"></i><img src="{{$base_url}}/storage/app/'+item.product_image+'" style="height:100px;width: 100%;"></div>');
						});
					}
					// notify(result.data.msg);
				},
				error: function(result){
				} 	        
			});
		}));



		$("#save_variants").on("click",function(){
			$.ajaxSetup
			({
				headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
			});

			parent_variant_value=$("#parent_variant_value").val();
			child_variant_value=$("#child_variant_value").val();
			my_price=$('#my_price').val();
			market_price=$('#market_price').val();
			var form_data = new FormData();

			var parent_variant_id=$('#p_v_id').val();
			var child_variant_id=$("#c_v_id").val();

			form_data.append("parent_variant_value", parent_variant_value);
			form_data.append("child_variant_value", child_variant_value);
			form_data.append("parent_variant_id",  parent_variant_id);
			form_data.append("child_variant_id", child_variant_id);
			form_data.append("my_price",my_price);
			form_data.append("market_price",market_price);

			$.ajax({
				type: "post",
				url: "{{$base_url}}/admin/product/variantsAdd",
				data:  new FormData(this),
				dataType: 'script',
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				success: function (result) {

				},
				error: function (error) {
					
				}
			});	

		});


		$("#product-images-div").on("click",".delete-variant-image",function(){
			var product_image_id=this.id;
			var product_id="{{$product->product_id}}";

			$.ajax({
				type: 'post',
				url: 'image/delete',
				data: {"_token": "{{ csrf_token() }}",'product_image_id':product_image_id,'product_id':product_id},
				success: function (data) {
					$("#product-images-div").html("");

					$.each(data,function(index,item){
						parent_variant="";
						child_variant=""
						variant="";
						variants="";

						parent_variant=item.parent_variant.default_variant_option_translation.variant_option_name;
						child_variant=item.child_variant.default_variant_option_translation.variant_option_name;
						

						if(parent_variant!=null && child_variant!=null){
							variant=parent_variant+", "+child_variant;
						}else if(parent_variant!=null){
							variant=parent_variant;
						}else if(child_variant!=null){
							variant=child_variant;
						}



						if(variant!=null){
							variants=variant;
							
						}
						$("#product-images-div").append('<div class="col-md-3" style="border:1px solid #eee;height: 170px;"><i id="'+item.product_image_id+'" class="delete-variant-image fa fa-trash-o" aria-hidden="true"></i><img src="{{$base_url}}/storage/app/'+item.product_image+'" style="height:100px;width: 100%;"><p>'+variants+'</p></div>');
					});
					title="Product image deleted successfully";
					// notify(title);
				},
				error: function (xhr, textStatus, errorThrown) { 
				}
			});

		});

		$("#brand_id option[value={{$product->brand_id}}]").prop('selected',true);

	});
$("#2nd-variant").hide();
$("#another-variant").hide();
$(".1st-variant").hide();
$("#cancel-variant").hide();
$("#variant_new_table").hide();
$("#add-variant").click(function(){
	$(".1st-variant").show();
	$("#another-variant").show();
	$("#add-variant").hide();
	$("#cancel-variant").show();
	$("#variant_new_table").show();
});
$("#another-variant").click(function(){
	$("#2nd-variant").show();
	$("#another-variant").hide();
});

$("#cancel-variant").click(function(){
	$("#parent_variant_value").tagsinput('removeAll');
	$("#child_variant_value").tagsinput('removeAll');
	$("#variant_values").html("");
	$("#variant_new_table").hide();
	$("#2nd-variant").hide();
	$(".1st-variant").hide();
	$("#add-variant").show();
	$("#cancel-variant").hide();
	$("#another-variant").hide();
});

$("#variant_values").on("focusout",".number_type",function(){
	value=$(this).val();
	if(value==""){
		$(this).val(0);
	}
});

function showVariantValues(parent_variant_value,child_variant_value){

	parent_variant_value=parent_variant_value.split(",");
	child_variant_value=child_variant_value.split(",");

	my_price=$(".my_price").val();
	if(my_price==""){
		my_price=0;
	}
	market_price=$(".market_price").val();
	if(market_price==""){
		market_price=0;
	}
	sku=$(".sku").val();
	quantity=$("#quantity").val();
	if(quantity==""){
		quantity=0;
	}
	weight=$("#weight").val();
	if(weight==""){
		weight=0;
	}

	weight_unit=$("#weight_unit").val();




	$("#variant_values").html("");
	if(child_variant_value=="" && parent_variant_value!=""){
		$.each(parent_variant_value, function(index, item){
			$("#variant_values").append("<tr><td>"+item+" <input name='parent_variant_values_new[]' class='form-control' value='"+item+"' type='hidden'/><input class='form-control' name='child_variant_values_new[]' type='hidden' value='' /></td><td><input class='form-control number_type' name='variant_my_prices_new[]' type='text' value='"+my_price+"' /></td><td><input class='form-control number_type' name='variant_market_prices_new[]' type='text' value='"+market_price+"' /></td><td class='shipping'><input name='variant_weights_new[]' value='"+weight+"' class='weight form-control number_type' type='text'/></td><td class='shipping'><select class='variant_weight_unit form-control select-box' id='variant_weight_unit' name='variant_weight_units_new[]'><option value='1'>Kg</option><option value='2'>g</option></select></td><td class='quantity'><input name='variant_quantities_new[]' value='"+quantity+"' class='inventory form-control number_type' type='number'/></td><td><input name='variant_skues_new[]' value='"+sku+"' class='form-control' type='text'/></td><td><button class='delete_variant btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");

		}); 
	}else if(child_variant_value!="" && parent_variant_value==""){
		$.each(child_variant_value, function(index, item){
			$("#variant_values").append("<tr><td>"+item+"<input name='parent_variant_values_new[]' class='form-control' value='' type='hidden'/><input class='form-control' name='child_variant_values_new[]' value='"+item+"' type='hidden'/></td><td><input class='form-control number_type' name='variant_my_prices_new[]' type='number' value='"+my_price+"' /></td><td><input class='form-control number_type' name='variant_market_prices_new[]' type='number' value='"+market_price+"' /></td><td class='shipping'><input name='variant_weights_new[]' value='"+weight+"' class='weight form-control number_type' type='number'/></td><td class='shipping'><select class='variant_weight_unit form-control select-box' id='variant_weight_unit' name='variant_weight_units_new[]'><option value='1'>Kg</option><option value='2'>g</option></select></td><td class='quantity'><input name='variant_quantities_new[]' value='"+quantity+"' class='inventory form-control number_type' type='number'/></td><td><input name='variant_skues_new[]' value='"+sku+"' type='text' class='form-control'/></td><td><button class='delete_variant btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");
		});
	}else if(child_variant_value!="" && parent_variant_value!=""){
		$.each(parent_variant_value, function(index, parentItem){
			$.each(child_variant_value, function(index, childItem){
				$("#variant_values").append("<tr><td>"+parentItem+"<input class='form-control' name='parent_variant_values_new[]' value='"+parentItem+"' type='hidden'/> : "+childItem+"<input class='form-control' name='child_variant_values_new[]' value='"+childItem+"' type='hidden'/></td><td><input  class='form-control number_type' name='variant_my_prices_new[]' type='number' value='"+my_price+"' /></td><td><input class='form-control number_type' name='variant_market_prices_new[]' type='number' value='"+market_price+"' /></td><td class='shipping'><input name='variant_weights_new[]' value='"+weight+"' class='weight form-control number_type' type='number'/></td><td class='shipping'><select class='variant_weight_unit form-control select-box' id='variant_weight_unit' name='variant_weight_units_new[]'><option value='1'>Kg</option><option value='2'>g</option></select></td><td class='quantity'><input name='variant_quantities_new[]' value='"+quantity+"' class='inventory form-control number_type' type='number'/></td><td><input name='variant_skues_new[]' value='"+sku+"' class='form-control' type='text'/></td><td><button class='delete_variant btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");
			});
		});
	}

	$(".variant_weight_unit option[value="+weight_unit+"]").prop('selected',true);

	if($("#track_inventory").val()==1){
		$(".quantity").show();
	}else{
		$(".inventory").val("");
		$(".quantity").hide();
	}


	if($("#is_product_shipping").is(':checked')){
		$(".shipping").show();
	}else{
		$(".weight").val("");
		$(".shipping").hide();
	}

}

$("#variant_values").on("click",".delete_variant",function(){
	$(this).parent().parent().remove();
});

  //Product Description
  $(function() {

  	$('#parent_variant_value, #child_variant_value').on('itemAdded itemRemoved', function(event) {
  		var parent_variant_value=$("#parent_variant_value").val();
  		var child_variant_value=$("#child_variant_value").val();
  		showVariantValues(parent_variant_value,child_variant_value);
  	});

  	var options = $.extend(true, {lang: '' , codemirror: {theme: 'monokai', mode: 'text/html', htmlMode: true, lineWrapping: true} } , {
  		"toolbar": [
  		["style", ["style"]],
  		["font", ["bold", "underline", "italic", "clear"]],
  		["color", ["color"]],
  		["para", ["ul", "ol", "paragraph"]],
  		["table", ["table"]],
  		["insert", ["link"]],
  		["view", ["fullscreen", "codeview", "help"]],
  		['fontname', ['fontname']
  		],
  		['fontNames', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
  		['fontNamesIgnoreCheck', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
  		]
  	});
  	$("textarea.summernote-editor").summernote(options);
  });

    //Product Description
    $(function() {

    	$("#cancel-seo").hide();
    	$(".meta").hide();
    	$("#edit-seo").click(function(){
    		$(".meta").show();
    		$("#cancel-seo").show();
    		$("#edit-seo").hide();
    	});

    	$("#cancel-seo").click(function(){
    		$("#edit-seo").show();
    		$(".meta").hide();
    		$("#cancel-seo").hide();
    	});
    });

</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('.new_product_price_row').hide();
		$('.cancel-product-price').hide();

		$('.add-product-price').on('click',function(){
			$('.new_product_price_row').show();
			$('.cancel-product-price').show();
			$('.add-product-price').hide();
		});
		$('.cancel-product-price').on('click',function(){
			$('.new_product_price_row').hide();
			$('.cancel-product-price').hide();
			$('.add-product-price').show();
			$('.row_appended').remove();

			$('.onclick_count_from').val('');
			$('.onclick_setup_price').val('');
			$('.onclick_per_item_price').val('');
			$('.onclick_per_item_sale_price').val('');
		});
	});
</script>


<script type="text/javascript">
//price product grid
$(document).ready(function(){
var max_fields = 10; 
var x = 1; 
$('#price_grid_button').on('click',function(e){
e.preventDefault();
if(x<max_fields){
 x++; 

        $('#price-grid-append-container').append("<div class='col-md-2  price-grid-input-container'><div class='col  {{ $errors->has('count_from') ? ' has-error' : '' }}'><input id='count_from' type='number' name='count_from[]' class='form-control thresold-i grid-input-text' placeholder='' >@if ($errors->has('count_from'))<span class='help-block'><strong>{{ $errors->first('count_from') }}</strong></span>@endif</div> <div class='col {{ $errors->has('setup_price') ? ' has-error':'' }}'><input id='setup_price' type='text' name='setup_price[]'class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('setup_price'))<span class='help-block'><strong>{{ $errors->first('setup_price') }}</strong></span>@endif</div><div class='col  {{ $errors->has('per_item_price') ? ' has-error' : '' }}'><input id='per_item_price' type='text' name='per_item_price[]' class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('per_item_price'))<span class='help-block'><strong>{{ $errors->first('per_item_price') }}</strong></span>@endif</div><div class='col  {{ $errors->has('per_item_sale_price') ? ' has-error' : '' }}'><input id='per_item_sale_price' type='text' name='per_item_sale_price[]' class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('per_item_sale_price'))<span class='help-block'><strong>{{ $errors->first('per_item_sale_price') }}</strong></span>@endif</div> <div class='col {{ $errors->has('custom_cost') ? ' has-error' : '' }}'><button  type='button' class='form-control thresold-i grid-input-text product_price_minus_button'><i class='fa fa-trash'></i></button></div></div>");   
         }
        });
        
$('#price-grid-append-container').on('click','.product_price_minus_button',function(e){       
e.preventDefault(); 
$(this).parents('.price-grid-input-container').remove();
x--;
});

});


</script>


<script type="text/javascript">
	$(document).ready(function(){
		var sale_data = $('.is_sale_data').val();
		// alert(sale_data);
		if(sale_data==1){
			$('#is_sale').prop('checked',true);
		}
	});
</script>



<!-- Imprint data started -->\
<script type="text/javascript">
    var imprint_values=<?php echo json_encode($imprints);?>;
    if(imprint_values!="[]"){
      $.each(imprint_values,function(index,item){         
          $(".color_group_id_"+item.id+" option[value="+item.color_group_id+"]").prop('selected',true);

          //delete imprint data
          $('.delete_imprint_data'+item.id).on('click',function(){
              var imprint_id = item.id;

              $.ajax({
                        type:'POST',
                        url:"{{$base_url}}/admin/product/imprint/delete",
                        data:{'imprint_id':imprint_id,"_token": "{{csrf_token()}}"},
                        success:function(data){
                          if(data['message']=='true'){
                                $('imprint_data_content_new'+data['imprint_id']).html('');
                                alert("Imprint remove successfully");
                                window.location.reload();
                          }else{
                                alert("Imprint not found");
                          }
                            
                       }
                    });

          });

      });  
    }
        

        


</script>

<script type="text/javascript">
      

$(window).on('load', function() {
    var imprints=<?php echo json_encode($imprints);?>;
        $.each(imprints,function(index,item){         
        }); 
});
</script>



<!-- Main Imprints Start -->
<script type="text/javascript">
  $(document).ready(function(){
  	var imprint_count="{{$imprint_counts}}";
    imprint_count = parseInt(imprint_count);
    var max_filds_new =10;
    var y=0;
        // y =  parseInt(y);
          $('.imprint_data_main_content').on('click','.add_new_imprint_all',function(e){
            if(y<max_filds_new){
              y++;
              imprint_count++;
              var yvalue =y-1;
              e.preventDefault();

				$(this).parents('.imprint_data_content').append('<div class="imprint_data_content_new"><hr style="border-top:2px solid rgb(20 19 19 / 97%);"><div class="row"><div class="col-10"><h5>Imprints</h5></div><div class="col-2 text-right"><button class="btn btn-danger remove_added_imprints"><i class="fa fa-minus"></i></button></div></div><div class="form-group row"><div class="col-md-6 "><label class="form-control-label">Name</label><input type="text" name="imprint_name[]" value=""  class="form-control thresold-i" placeholder=""></div><div class="col-md-6"><label class="form-control-label">Maximum Colors</label><input type="number" name="max_colors[]" value=""  class="form-control thresold-i" placeholder="" maxlength="10"></div></div><div class="form-group row"><div class="col-md-12"><label class="form-control-label">Color Group</label><select name="color_group_id[]" class="form-control thresold-i" ><option selected="" disabled="">Select Color Group</option>@foreach($color_groups as $color_group)<option value="{{$color_group->id}}">{{$color_group->name}}</option>@endforeach</select></div></div><div class="form-group row"><div class="col-md-12"><label class="form-control-label">Custom Color</label><select name="color_id['+yvalue+'][]" multiple="multiple" class="form-control js-example-basic-multiple" ><option disabled="">Select Color</option>@foreach($colors as $color)<option value="{{$color->id}}">{{$color->name}}</option>@endforeach</select></div></div><div class="form-group row"><div class="col-md-12 add_new_imprint_values'+y+'"><div class="row pl-3"><div class="col-md-3"><div class="row form-control-label pt-2 pb-2">CountFrom</div><div class="row form-control-label pt-2 pb-2">Location Setup</div><div class="row form-control-label pt-2 pb-2">Additional Location Running Fee</div><div class="row form-control-label pt-2 pb-2">Additional ColorSetupFee</div><div class="row form-control-label pt-2 pb-2">Additional Color Running Fee</div><div class="row form-control-label pt-2 pb-2">Actions</div><div class="row form-control-label pt-2 pb-2"><button class="form-control grid-input-text add_imprint_child'+y+'" type="button"><i class="fa fa-plus"></i></button></div></div><div class="col-md-9 pt-1"><div class="row price-grid-append-container-scroll" id="imprint-price-grid-append-container'+y+'"><div class="col-md-2  imprint-price-grid-input-container'+y+'"><div class="col {{ $errors->has("imprint_count_from") ? " has-error" : " " }}"><input type="number" id="imprint_count_from" name="imprint_count_from['+yvalue+'][]"  class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">@if ($errors->has("imprint_count_from"))<span class="help-block"><strong>{{ $errors->first("imprint_count_from") }}</strong></span>@endif</div><div class="col {{ $errors->has("imprint_location_setup_fee") ? " has-error" : "" }}"><input type="text" id="imprint_location_setup_fee" name="imprint_location_setup_fee['+yvalue+'][]"  class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">@if ($errors->has("imprint_location_setup_fee"))<span class="help-block"><strong>{{ $errors->first("imprint_location_setup_fee") }}</strong></span>@endif</div><div class="col {{ $errors->has("imprint_additinal_location_running_fee") ? " has-error": "" }}"><input type="text" id="imprint_additinal_location_running_fee" name="imprint_additinal_location_running_fee['+yvalue+'][]"   class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">@if ($errors->has("imprint_additinal_location_running_fee"))<span class="help-block"><strong>{{ $errors->first("imprint_additinal_location_running_fee") }}</strong></span>@endif</div><div class="col {{ $errors->has("imprint_additional_setup_fee") ? " has-error" : "" }}"><input type="text" id="imprint_additional_setup_fee" name="imprint_additional_setup_fee['+yvalue+'][]" class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">@if ($errors->has("imprint_additional_setup_fee"))<span class="help-block"><strong>{{ $errors->first("imprint_additional_setup_fee") }}</strong></span>@endif</div><div class="col {{ $errors->has("imprint_additional_running_fee") ? "has-error" : " " }}"><input type="text" id="imprint_additional_running_fee" name="imprint_additional_running_fee['+yvalue+'][]" class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">@if ($errors->has("imprint_additional_running_fee"))<span class="help-block"><strong>{{ $errors->first("imprint_additional_running_fee") }}</strong></span>@endif</div><div class="col-md-2"><button class="form-control grid-input-text-imprint delete_imprint_child'+y+'" type="button"><i class="fa fa-trash"></i></button></div></div></div></div></div></div></div></div>');


              }else{

						  alert("Limit cross!!!....");
						}


              $('.imprint_data_content_new').children('.form-group').children('.col-md-12').children('select.js-example-basic-multiple').select2();
          });


          $('.imprint_data_content').on('click','.remove_added_imprints',function(e){       
              e.preventDefault(); 
              $(this).parents('.imprint_data_content_new').remove('.imprint_data_content_new');
              y--;
          });



          // Add New imprint value 1 Start======================================


/*          $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values0 .add_imprint_child0',function(e){
              var a = 1;
            if(a<max_filds_new){
              a++;

             $(this).parents('.add_new_imprint_values0').append('<div class="row row_append0"><div class="col-md-2"><input type="number" name="imprint_count_from[0][]" value=""  class="form-control thresold-i" placeholder="Count From" maxlength="10"></div><div class="col-md-2"><input type="number" id="imprint_location_setup_fee" name="imprint_location_setup_fee[0][]" value=""  class="form-control thresold-i" placeholder="Location Setup" maxlength="10"></div><div class="col-md-2"><input type="number" id="imprint_additinal_location_running_fee" name="imprint_additinal_location_running_fee[0][]" value=""  class="form-control thresold-i" placeholder="Additional Location" maxlength="10"></div><div class="col-md-2"><input type="number" id="imprint_additional_setup_fee" name="imprint_additional_setup_fee[0][]" value=""  class="form-control thresold-i" placeholder="addn set up fee" maxlength="10"></div><div class="col-md-2"><input type="number" id="imprint_additional_running_fee" name="imprint_additional_running_fee[0][]" value=""  class="form-control thresold-i" placeholder="addn runninf fee maxlength="10"></div><div class="col-md-2 "><button class="form-control delete_imprint_child0" type="button"><i class="fa fa-minus"></i></button></div></div>');

           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values1 .delete_imprint_child0',function(e){       
        e.preventDefault(); 
        $(this).parents('.row').remove('.row_append');
        a--;
    });
*/




      // Add New imprint value 1 Start======================================

        $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values1 .add_imprint_child1',function(e){
             var a = 1;
            if(a<max_filds_new){
              a++;


        $("#imprint-price-grid-append-container1").append("<div class='col-md-2  imprint-price-grid-input-container1'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[0][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[0][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[0][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[0][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[0][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child1' type='button'><i class='fa fa-trash'></i></button></div></div>");


           }

          });

    $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values1 .delete_imprint_child1',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container1').remove();
        a--;
    });

      // Add New Imprint value 1 End


              
        // Add New imprint value 2 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values2 .add_imprint_child2',function(e){
              var a = 1;
            if(a<max_filds_new){
              a++;


    $("#imprint-price-grid-append-container2").append("<div class='col-md-2  imprint-price-grid-input-container2'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[1][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[1][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[1][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[1][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[1][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child2' type='button'><i class='fa fa-trash'></i></button></div></div>");


           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values2 .delete_imprint_child2',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container2').remove();
        a--;
    });

      // Add New Imprint value 2 End



       // Add New imprint value 3 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values3 .add_imprint_child3',function(e){
              var b = 1;
            if(b<max_filds_new){
              b++;

       $("#imprint-price-grid-append-container3").append("<div class='col-md-2  imprint-price-grid-input-container3'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[2][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[2][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[2][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[2][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[2][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child3' type='button'><i class='fa fa-trash'></i></button></div></div>");            
  

           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values3 .delete_imprint_child3',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container3').remove();
        b--;
    });

      // Add New Imprint value 3 End


      // Add New imprint value 4 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values4 .add_imprint_child4',function(e){
              var c = 1;
            if(c<max_filds_new){
              c++;


    $("#imprint-price-grid-append-container4").append("<div class='col-md-2  imprint-price-grid-input-container4'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[3][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[3][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[3][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[3][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[3][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child4' type='button'><i class='fa fa-trash'></i></button></div></div>");
            

           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values4 .delete_imprint_child4',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container4').remove();
        c--;
    });

      // Add New Imprint value 4 End

       // Add New imprint value 5 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values5 .add_imprint_child5',function(e){
              var d = 1;
            if(d<max_filds_new){
              d++;

 $("#imprint-price-grid-append-container5").append("<div class='col-md-2  imprint-price-grid-input-container5'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[4][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[4][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[4][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[4][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[4][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child5' type='button'><i class='fa fa-trash'></i></button></div></div>");



           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values5 .delete_imprint_child5',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container5').remove();
        d--;
    });

      // Add New Imprint value 5 End===================================

       // Add New imprint value 6 Start======================================
         $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values6 .add_imprint_child6',function(e){
              var f = 1;
            if(f<max_filds_new){
              f++;


  $("#imprint-price-grid-append-container6").append("<div class='col-md-2  imprint-price-grid-input-container6'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[5][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[5][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[5][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[5][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[5][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child6' type='button'><i class='fa fa-trash'></i></button></div></div>");

           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values6 .delete_imprint_child6',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container6').remove();
        f--;
    });

      // Add New Imprint value 6 End===================================

      // Add New imprint value 7 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values7 .add_imprint_child7',function(e){
              var g = 1;
            if(g<max_filds_new){
              g++;

  $("#imprint-price-grid-append-container7").append("<div class='col-md-2 imprint-price-grid-input-container7'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[6][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[6][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[6][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[6][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[6][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child7' type='button'><i class='fa fa-trash'></i></button></div></div>");


           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values7 .delete_imprint_child7',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container7').remove();
        g--;
    });

      // Add New Imprint value 7 End===================================

            // Add New imprint value 8 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values8 .add_imprint_child8',function(e){
              var h = 1;
            if(h<max_filds_new){
              h++;


    $("#imprint-price-grid-append-container8").append("<div class='col-md-2  imprint-price-grid-input-container8'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[7][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[7][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[7][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[7][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[7][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child8' type='button'><i class='fa fa-trash'></i></button></div></div>");


           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values8 .delete_imprint_child8',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container8').remove();
        h--;
    });

      // Add New Imprint value 8 End===================================

                  // Add New imprint value 9 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values9 .add_imprint_child9',function(e){
              var i = 1;
            if(i<max_filds_new){
              i++;

   $("#imprint-price-grid-append-container9").append("<div class='col-md-2  imprint-price-grid-input-container9'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[8][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[8][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[8][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[8][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[8][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child9' type='button'><i class='fa fa-trash'></i></button></div></div>");


           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values9 .delete_imprint_child9',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container9').remove();
        i--;
    });

      // Add New Imprint value 9 End===================================

                        // Add New imprint value 10 Start======================================
             $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values10 .add_imprint_child10',function(e){
              var j = 1;
            if(j<max_filds_new){
              j++;


     $("#imprint-price-grid-append-container10").append("<div class='col-md-2  imprint-price-grid-input-container10'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[9][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[9][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[9][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[9][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[9][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child10' type='button'><i class='fa fa-trash'></i></button></div></div>");


           }
          });

        $('.imprint_data_main_content').on('click','.imprint_data_content .add_new_imprint_values10 .delete_imprint_child10',function(e){       
        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container10').remove();
        j--;
    });

      // Add New Imprint value 10 End===================================
          

  });
</script>
<!-- Main Imprint End -->


<!-- script of imprint all new  start-->
<script type="text/javascript">
    $(document).ready(function(){
          
          $(".add_new_imprint_values").on('click','.add_imprint_child',function(e){


					$("#imprint-price-grid-append-container").append("<div class='col-md-2  imprint-price-grid-input-container'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[0][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[0][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[0][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[0][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[0][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child' type='button'><i class='fa fa-trash'></i></button></div></div>");

       
          });

        $('.add_new_imprint_values').on('click','.delete_imprint_child',function(e){   

        e.preventDefault(); 
        $(this).parents('.imprint-price-grid-input-container').remove();
        
    });
    });
</script>
<!-- script of imprint all new  start-->



<!-- Imprint Edit Data Start -->
<script type="text/javascript">
  $(document).ready(function(){
        var imprints=<?php echo json_encode($imprints);?>;
        $.each(imprints,function(index,item){         
          
          //imprint data save start
          $(".imprint_data_save"+item.id).on('click',function(){
            var imprint_id = item.id;
            var imprint_name = $('#imprint_name'+item.id).val();
            var max_colors = $('#max_colors'+item.id).val();
            var color_group_id=$('#color_group_id'+item.id).val();
            if(imprint_name==""){
              alert('Name field Required');
              return false;
            }
            $.ajax({
              type:'POST',
              url:"{{$base_url}}/admin/product/editImprintData",
              data:{'imprint_id':imprint_id,'imprint_name':imprint_name,'max_colors':max_colors,'color_group_id':color_group_id,"_token": "{{csrf_token()}}"},
              success:function(data) {
                  alert("Imprint Data Updated Successfully");
             }
          });

          });
          //Imprint data save end

          //imprint_color_id_edit_save start
            $(".imprint_color_id_edit_save"+item.id).on('click',function(){

            var imprint_id = item.id;
            var color_ids = $('.color_id_'+item.id).val();
            if(color_ids==""){
              alert('Please Choose at least one color');
              return false;
            }
          
            $.ajax({
              type:'POST',
              url:"{{$base_url}}/admin/product/editImprintColorData",
              data:{'imprint_id':imprint_id,'color_ids':color_ids,"_token": "{{csrf_token()}}"},
              success:function(data) {
                  alert("Imprint Color Data Updated Successfully");
             }
          });

          });
          //imprint_color_id_edit_save end

          //Imprint price data start
          var imprint_prices = item.imprint_price;

          $.each(imprint_prices,function(index,item){

                $('.imprint_price_edit'+item.id).on('click',function(){

                    imprint_price_id = item.id;
                    imprint_count_from = $('#imprint_count_from'+item.id).val();
                    imprint_location_setup_fee=$('#imprint_location_setup_fee'+item.id).val();
                    imprint_additinal_location_running_fee=$('#imprint_additinal_location_running_fee'+item.id).val();
                    imprint_additional_setup_fee=$('#imprint_additional_setup_fee'+item.id).val();
                    imprint_additional_running_fee=$('#imprint_additional_running_fee'+item.id).val();
                    // alert(imprint_additional_running_fee);
                    $.ajax({
                        type:'POST',
                        url:"{{$base_url}}/admin/product/editImprintPriceData",
                        data:{'imprint_price_id':imprint_price_id,'imprint_count_from':imprint_count_from,'imprint_location_setup_fee':imprint_location_setup_fee,'imprint_additinal_location_running_fee':imprint_additinal_location_running_fee,'imprint_additional_setup_fee':imprint_additional_setup_fee,'imprint_additional_running_fee':imprint_additional_running_fee,"_token": "{{csrf_token()}}"},
                        success:function(data) {
                            alert("Imprint Price Data Updated Successfully");
                       }
                    });

                });
          });
          //Imprint price data end


        });  
  });  
</script>
<!-- Imprint Edit Data End -->

<!-- script of Option all new  start-->
<script type="text/javascript">
// for suboption 
$(document).ready(function(){
    var max_filds_new=10;
    var y=1;
$('.option_data_main_content').on('click','.add_new_sub_option_all',function(e){
     var index=$(this).attr('index');
     var rowCount=$('.sub-option-area_new'+index).length;
     var suboption_count=$('.add_new_option_values'+index).length;
     y++;
      var yvalue = y-1;
      e.preventDefault();
      if(rowCount<10){
      $(this).parents('.sub-option-area').append('<div class="sub-option-area_new sub-option-area_new'+index+'"><div class="option_data_content_new_product_sub"><h5>Product Sub Options</h5><div class="form-group row"><div class="col-md-6 {{$errors->has('sub_option_name') ? ' has-error' : ''}}"><label class="form-control-label">Sub Option Name</label><input type="text" id="sub_option_name" name="sub_option_name['+index+']['+rowCount+']"class="form-control thresold-i" placeholder="Sub Option Name">@if ($errors->has('sub_option_name'))<span class="help-block"><strong>{{ $errors->first('sub_option_name')}}</strong></span>@endif</div><div class="col-6 text-right"><button class="btn btn-danger remove_added_sub_option"><i class="fa fa-minus"></i></button></div></div></div><!-- option Retail Price Start --><div class="form-group row"><div class="col-md-12 add_new_option_values  add_new_option_values'+index+'" ><div class="row"><div class="col-md-3 {{ $errors->has('option_count_from') ? ' has-error' : '' }}"><label class="form-control-label">Count From</label><input type="number" id="option_count_from" name="option_count_from['+index+']['+rowCount+'][]" class="form-control thresold-i" placeholder="Count From">@if ($errors->has('option_count_from'))<span class="help-block"><strong>{{ $errors->first('option_count_from') }}</strong></span>@endif</div><div class="col-md-3 {{ $errors->has('option_setup_fee') ? ' has-error' : '' }}"><label class="form-control-label">Setup Fee</label><input type="text" id="option_setup_fee" name="option_setup_fee['+index+']['+rowCount+'][]"  class="form-control thresold-i" placeholder="Setup Fee">@if ($errors->has('option_setup_fee'))<span class="help-block"><strong>{{ $errors->first('option_setup_fee') }}</strong></span>@endif</div><div class="col-md-3 {{ $errors->has('option_additional_fee') ? ' has-error' : '' }}"><label class="form-control-label">Additional Fee</label><input type="text" id="option_additional_fee" name="option_additional_fee['+index+']['+rowCount+'][]"  class="form-control thresold-i" placeholder="Additional Fee">@if($errors->has('option_additional_fee'))<span class="help-block"><strong>{{ $errors->first('option_additional_fee') }}</strong></span>@endif</div><div class="col-md-3"><label class="form-control-label">Actions</label><button class="form-control add_option_child" type="button" index="'+index+''+suboption_count+'" ind="['+index+']['+rowCount+'][]"><i class="fa fa-plus"></i></button></div></div></div></div></div>'); 
      }else{
        alert("limit cross");
      }

});
        
        $('.option_data_main_content').on('click','.remove_added_sub_option',function(e){       
        e.preventDefault(); 
        $(this).parents('.sub-option-area_new').remove('.sub-option-area_new');
        y--;
        });      
});




//Option Main content new add start==========================
$(document).ready(function(){
    var max_filds_new = 10;
    var y = 1;

          $('.option_data_main_content').on('click','.add_new_option_all',function(e){
            if(y<max_filds_new){
              y++;
              var yvalue = y-1;              
              e.preventDefault();
              $(this).parents('.option_data_content').append('<div class="option_data_content_new"><hr style="border-top:2px solid rgb(20 19 19 / 97%);"><div class="row"><div class="col-10"><h5>Product Options '+y+'</h5></div><div class="col-2 text-right"><button class="btn btn-danger remove_added_option"><i class="fa fa-minus"></i></button></div></div><div class="form-group row"><div class="col-md-6"><label class="form-control-label">Option Name</label><input type="text" id="option_name" name="option_name['+yvalue+']" class="form-control thresold-i option_name" placeholder="Option Name" index="'+yvalue+'"></div><div class="col-md-6"><label class="form-control-label">Show As</label><select id="show_as" name="show_as['+yvalue+']" class="form-control thresold-i"><option value="0">Drop Down</option></select></div></div><div class="sub-option-area sub-option-area_new'+yvalue+'"><div class="option_data_content_new_product_sub"><h5>Product Sub Options</h5><div class="form-group row"><div class="col-md-6 {{ $errors->has('sub_option_name') ? ' has-error' : '' }} "><label class="form-control-label">Sub Option Name</label><input type="text" id="sub_option_name" name="sub_option_name['+yvalue+'][0]" class="form-control thresold-i" placeholder="Sub Option Name">@if ($errors->has('sub_option_name'))<span class="help-block"><strong>{{ $errors->first('sub_option_name') }}</strong></span>@endif</div><div class="col-6 text-right suboption-btn"><button class="btn btn-info add_new_sub_option_all" index="'+yvalue+'" type="button">Add Sub Option</button></div></div></div> <!-- count area --><div class="form-group row"><div class="col-md-12 add_new_option_values add_new_option_values'+yvalue+'"><div class="row"><div class="col-md-3"><label class="form-control-label">Count From</label><input type="number" id="option_count_from" name="option_count_from['+yvalue+'][0][]"  class="form-control thresold-i" placeholder="Count From"></div><div class="col-md-3"><label class="form-control-label">Setup Fee</label><input type="text" id="option_setup_fee" name="option_setup_fee['+yvalue+'][0][]"  class="form-control thresold-i" placeholder="Setup Fee"></div><div class="col-md-3"><label class="form-control-label">Additional Fee</label><input type="text" id="option_additional_fee" name="option_additional_fee['+yvalue+'][0][]"  class="form-control thresold-i" placeholder="Additional Fee"></div><div class="col-md-3"><label class="form-control-label">Actions</label><button class="form-control add_option_child" ind="['+yvalue+'][0][]" type="button" index="'+yvalue+'0"><i class="fa fa-plus"></i></button></div></div></div></div></div></div>');
              }else{
                alert("limit cross");
              }

          });

          $('.option_data_content').on('click','.remove_added_option',function(e){       
              e.preventDefault(); 
              $(this).parents('.option_data_content_new').remove('.option_data_content_new');
              y--;
          });

 });


  //========================================== Default Value 0 Start==========================
    $(document).ready(function(){
         
          $(".option_data_main_content").on('click','.add_option_child',function(e){
            var ct=$(this).attr('index');             
             var count =$('.row_append_sub_count'+ct).length;
             var count_index=$(this).attr('ind');
             if(count<=8){
             /*alert(count);*/ /*option_data_main_content add_new_option_values*/
             $(this).parents('.add_new_option_values').append('<div class="row row_append row_append_sub_count'+ct+'"><div class="col-md-3"><input type="number" name="option_count_from'+count_index+'" value=""  class="form-control thresold-i" placeholder="Count From" maxlength="10"></div><div class="col-md-3"><input type="text" name="option_setup_fee'+count_index+'" value=""  class="form-control thresold-i" placeholder="Setup Fee" ></div><div class="col-md-3"><input type="text" name="option_additional_fee'+count_index+'" value=""  class="form-control thresold-i" placeholder="Additional Fee"></div><div class="col-md-3"><button class="form-control delete_option_child" type="button"><i class="fa fa-minus"></i></button></div></div>'); 
              }else{
                alert("limit cross");
              }
             });

        $('.option_data_main_content').on('click','.delete_option_child',function(e){  
        e.preventDefault(); 
        $(this).parents('.row').remove('.row_append');
       });
    });

</script>

<!-- script of Option all new  end-->



<!-- option select and check show data start-->
<script type="text/javascript">
  $(document).ready(function(){
    var product_option_values=<?php echo json_encode($product_options);?>;
        $.each(product_option_values,function(index,item){

          //product option select and check data start
          if(item.show_as=="drop_down"){
            var show_as = 0;
          }else if(item.show_as=="radio"){
            var show_as = 1;
          }else if(item.show_as=="checkbox"){
            var show_as = 2;
          }
          $("#show_as_edit"+item.id+" option[value="+show_as+"]").prop('selected',true);
          if(item.required==1){
            $("#show_blank_edit"+item.id).prop('checked', true);
          }else{
            $("#show_blank_edit"+item.id).prop('checked',false);
          } 
          //product option select and check data end


          //prduct option save start
            $('.save_product_option_content'+item.id).on('click',function(){
                var product_id = "{{$product->product_id}}";
                var product_option_id = item.id;
                var option_name_value = $('#option_name_edit'+item.id).val();
                var show_as_value = $('#show_as_edit'+item.id).val();
                var show_blank_check = $('#show_blank_edit'+item.id).is(':checked');
                if(show_blank_check){
                  var show_blank_value=1;
                }else{
                  var show_blank_value=0;
                }

                if(option_name_value==""){
                  alert('Name Field is Required');
                  return false;
                }
                

                $.ajax({
                        type:'POST',
                        url:"{{$base_url}}/admin/product/edit/product-option",
                        data:{'product_option_id':product_option_id,'product_id':product_id,'option_name':option_name_value,'show_as':show_as_value,'show_blank':show_blank_value,"_token": "{{csrf_token()}}"},
                        success:function(data){
                            alert("Product Option Data Updated Successfully");
                       }
                    });

            });
             
          //product option save end

          //Delete option defaul come from controller start
          $('.delete_product_option_data'+item.id).on('click',function(){
              var product_option_id=item.id;
              $.ajax({
                        type:'POST',
                        url:"{{$base_url}}/admin/product/product-option/delete",
                        data:{'product_option_id':product_option_id,"_token": "{{csrf_token()}}"},
                        success:function(data){
                          if(data['message']=='true'){
                                $('option_data_content_new'+data['product_option_id']).html('');
                                alert("product option remove successfully");
                                window.location.reload()
                          }else{
                                alert("Option data not found");
                          }
                            
                       }
                    });


          });
          //Delete option defaul come from controller start


          //product option price data start
                var product_option_price_values = item.product_option_prices;
              $.each(product_option_price_values,function(index,item){

                  //Save product option price start
                  $('.save_product_option_price'+item.id).on('click',function(){
                      var product_option_price_id = item.id;
                      var count_from = $('#option_count_from'+item.id).val();
                      var setup_fee = $('#option_setup_fee'+item.id).val();
                      var additional_fee = $('#option_additional_fee'+item.id).val();
                      
                      $.ajax({
                        type:'POST',
                        url:"{{$base_url}}/admin/product/edit/product-option-price",
                        data:{'product_option_price_id':product_option_price_id,'count_from':count_from,'setup_fee':setup_fee,'additional_fee':additional_fee,"_token": "{{csrf_token()}}"},
                        success:function(data){
                            alert("Product Option Price Data Updated Successfully");
                       }
                    });
                  });
                  //Save product option price end

                  //Delete product option price start
                    $('.delete_option_price_child'+item.id).on('click',function(){
                        var product_option_price_id = item.id;
                        $.ajax({
                        type:'POST',
                        url:"{{$base_url}}/admin/product/product-option-price/delete",
                        data:{'product_option_price_id':product_option_price_id,"_token": "{{csrf_token()}}"},
                        success:function(data){
                            if(data['message']=="true"){
                              // alert('Product Option Price Deleted Successfully');
                              $('.product_option_price_multiple'+data['product_option_price_id']).remove();
                               // location.reload();
                            }else{
                              alert('No Data Found');
                            }
                       }
                    });
                    });
                  //Delete product option price end


              });
            
          //product option price data start

          
          
        }); 
  });
   
</script>

<!-- option select and check show data end-->




<script src="{{asset('files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<!-- Model animation js -->
<script src="{{asset('files/assets/js/classie.js')}}"></script>
<script src="{{asset('files/assets/js/modalEffects.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script type="text/javascript" src="{{asset('files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
</script>
<script type="text/javascript" src="{{asset('files/bower_components/multiselect/js/jquery.multi-select.js')}}"></script> <!-- Custom js -->
<script type="text/javascript" src="{{asset('files/assets/pages/advance-elements/select2-custom.js')}}"></script>

@endsection