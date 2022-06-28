@extends('layouts.admin')
@section('content')

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
  img#product_image{
    width: 100%;
    max-height: 300px;
    padding: 20px;
  }

  .custom-file{
    width: 100%;

  }

  .bootstrap-tagsinput{
    width: 400px !important;
  }

  .bootstrap-tagsinput input{
    width:100%!important;
  }

  .table>thead>tr>th {
    font-size: .8375rem !important;
  }


.grid-input-text {
    width: 45px;
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
    width: 45px;
    padding: 5px 2px 5px 2px;
    margin: 0px 0px 17px 0px;
}


</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="{{asset('files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />
<!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
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
            <a>Add Product </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row mobile-responsive">
          <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5> Add Product</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('PRODUCT_ADD'))
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right"> Cancel
                    </button></a>
                  </span>
                  <span>Add new product according to required types and representations to a given part of your online business .</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 p-0">
              <div class="col-md-8">

                <div class="card">
                  <div class="card-block">

                    <div class="form-group {{ $errors->has('product_name') ? ' has-error' : '' }}">
                      <label class="form-control-label">Title <span>*</span></label>
                      <input id="product_name" type="text" name="product_name" value="{{old('product_name')}}" class="form-control thresold-i" placeholder="Product Name">
                      @if ($errors->has('product_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('product_name') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('product_url') ? ' has-error' : '' }}">
                      <label class="form-control-label">Product Url *</label>
                      <input id="product_url" type="text" name="product_url" value="{{old('product_url')}}"  class="form-control thresold-i"  placeholder="Product Url" >
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
                      <label class="form-control-label">Short Description</label>
                      <textarea name="description" class="form-control summernote-editor" rows="5" placeholder="Enter product Short description">{{old('description')}}</textarea>
                      @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                      @endif
                    </div>
                     
      <div class="form-group {{ $errors->has('long_description') ? ' has-error' : '' }}">
                      <label class="form-control-label">Long Description</label>
                      <textarea name="long_description" class="form-control summernote-editor" rows="5" placeholder="Enter product Long description">{{old('long_description')}}</textarea>
                      @if ($errors->has('long_description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('long_description') }}</strong>
                      </span>
                      @endif
                    </div>

        <div class="form-group {{ $errors->has('additional_information') ? ' has-error' : '' }}">
                      <label class="form-control-label">Additional Information</label>
                      <textarea name="additional_information" class="form-control summernote-editor" rows="5" placeholder="Enter Additional Information">{{old('additional_information')}}</textarea>
                      @if ($errors->has('additional_information'))
                      <span class="help-block">
                        <strong>{{ $errors->first('additional_information') }}</strong>
                      </span>
                      @endif
                    </div>


      <div class="form-group {{ $errors->has('dimension') ? ' has-error' : '' }}">
                      <label class="form-control-label">Dimension <!-- <span>*</span> --></label>
                      <input id="dimension" type="text" name="dimension" value="{{old('dimension')}}" class="form-control thresold-i" placeholder="Enter Dimension" >
                      @if ($errors->has('dimension'))
                      <span class="help-block">
                        <strong>{{ $errors->first('dimension') }}</strong>
                      </span>
                      @endif
                    </div>


                    <div class="form-group {{ $errors->has('imprint_area') ? ' has-error' : '' }}">
                        <label class="form-control-label">Imprint Area</label>
                        <textarea name="imprint_area" class="form-control summernote-editor" rows="5" placeholder="Imprint Area">{{old('imprint_area')}}</textarea>
                        @if ($errors->has('imprint_area'))
                        <span class="help-block">
                          <strong>{{ $errors->first('imprint_area') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('pricing_information') ? ' has-error' : '' }}">
                        <label class="form-control-label">Pricing Information</label>
                        <textarea name="pricing_information" class="form-control summernote-editor" rows="5" placeholder="Pricing Information">{{old('pricing_information')}}</textarea>
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
                                  <input id="quantity_per_box" type="number" name="quantity_per_box" value="{{old('quantity_per_box')}}" class="form-control thresold-i" placeholder="Qunatity Per Box" >
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
                                    <input id="shipping_additional_type" type="text" name="shipping_additional_type" value="{{old('shipping_additional_type')}}" class="form-control thresold-i" placeholder="Shipping Additional Type" >
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
                                  <input id="weight_box" type="number" name="weight_box" value="{{old('weight_box')}}" class="form-control thresold-i" placeholder="Weight of the Box" >
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
                                    <input id="shipping_additional_value" type="text" name="shipping_additional_value" value="{{old('shipping_additional_value')}}" class="form-control thresold-i" placeholder="Shipping Additional Value" >
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
                                  <input id="shipping_from_zip_code" type="number" name="shipping_from_zip_code" value="{{old('shipping_from_zip_code')}}" class="form-control thresold-i" placeholder="Shipping From Zip Code">
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
                                            <input id="production_time_from" type="number" name="production_time_from" value="{{old('production_time_from')}}" class="form-control thresold-i" placeholder="From" >
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
                                            <input id="production_time_to" type="number" name="production_time_to" value="{{old('production_time_to')}}" class="form-control thresold-i" placeholder="To" >
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
                                  <!-- <input id="custom_method" type="text" name="custom_method" value="{{old('custom_method')}}" class="form-control thresold-i" placeholder="Custom Method" > -->
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
                                    <input id="custom_cost" type="text" name="custom_cost" value="{{old('custom_cost')}}" class="form-control thresold-i" placeholder="Custom Cost" >
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



<!-- price grid end  -->

                <div class="card">
                  <div class="card-block price_product_grid_div" id="price_product_grid_div">



                      <div class="row">
                      <div class="col-md-12">
                        <h5>Price Grid </h5>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12 text-left">
                        On sale&nbsp;&nbsp;&nbsp;<input id="is_sale" type="checkbox" name="is_sale" value="1" class="" >
                      </div>
                    </div>

                    <br>

                    <div class="row pl-3">

                    <div class="col-md-3">
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
                        <input id="count_from" type="number" name="count_from[]" class="form-control thresold-i grid-input-text" placeholder="" required="">
                        @if ($errors->has('count_from'))
                        <span class="help-block">
                        <strong>{{ $errors->first('count_from') }}</strong>
                        </span>
                        @endif
                        </div> 


                        <div class="col {{ $errors->has('setup_price') ? ' has-error':'' }}">
                        <input id="setup_price" type="text" name="setup_price[]"  class="form-control thresold-i grid-input-text" placeholder="" required="">
                        @if ($errors->has('setup_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('setup_price') }}</strong>
                        </span>
                        @endif
                        </div>  


                        <div class="col  {{ $errors->has('per_item_price') ? ' has-error' : '' }}">
                        <input id="per_item_price" type="text" name="per_item_price[]" class="form-control thresold-i grid-input-text" placeholder="" required="">
                        @if ($errors->has('per_item_price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('per_item_price') }}</strong>
                        </span>
                        @endif
                        </div>                          

                        <div class="col  {{ $errors->has('per_item_sale_price') ? ' has-error' : '' }}">
                        <input id="per_item_sale_price" type="text" name="per_item_sale_price[]" class="form-control thresold-i grid-input-text" placeholder="" required="">
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

                  </div>
                </div>


<input type="hidden" id="my_price" name="my_price" value="{{old('my_price')}}"  class="form-control thresold-i" value="1" placeholder="Rs. 100.00" maxlength="10">

<input type="hidden" id="market_price" name="market_price" value="{{old('market_price')}}"  class="form-control thresold-i" value="1" placeholder="Rs. 120.00" maxlength="10">


<!-- price grid end  -->
<!-- vendor start -->

                <div class="card">
                  <div class="card-block">
                    <h5>Vendors</h5><br>

                    <div class="form-group row">
                   
                     <div class="col-6">

                    <div class="col-md-6 {{ $errors->has('vendor_id') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Vendors</label>

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
                    </div>
               
                
                    <div class="col-md-6 {{ $errors->has('sage_id') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Sage Id</label>
                        <input type="text" id="sage_id" name="sage_id" value="{{old('sage_id')}}"  class="form-control thresold-i" placeholder="Enter Sage Id" maxlength="10">
                        @if ($errors->has('sage_id'))
                        <span class="help-block">
                          <strong>{{ $errors->first('sage_id') }}</strong>
                        </span>
                        @endif
                      </div>

                   </div>
 

                  <div class="col-md-6">
                  
                      <div class="col-md-6">
                        <label class="form-control-label">SKU #-</label>
                        <input type="text" id="sku" name="sku" value="{{old('sku')}}"  class="form-control thresold-i" maxlength="30" placeholder="Stock keeping unit">
                      </div>


                      <div class="col-md-6">
                        <label class="form-control-label">SKU #18858 -HIT</label>
                        <input type="text" id="sku_HIT" name="sku_HIT" value="{{old('sku_HIT')}}"  class="form-control thresold-i" maxlength="30" placeholder="Stock keeping unit">
                      </div>


                     </div>
                    </div>
                  </div>
                </div>

<!-- Option Data Start -->
                <div class="card">
                  <div class="card-block option_data_main_content">
                    <div class="option_data_content">

                <div class="option_data_content_new">

                  <div class="form-group row add_new_option_all_row">
                        <div class="col-12 text-right">
                          <button class="btn btn-info add_new_option_all" type="button">Add Product Option</button>
                        </div>
                    </div>

                    <h5>Product Options 1</h5>

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

<!-- Option Data End -->



<!-- Apparel -->

                <div class="card">
                  <div class="card-block">
                    <h5>ADD Product Apparel(Ex.XL,XXL)</h5><br>
                    <div class="form-group row">
                    <div class="col-md-12 {{ $errors->has('apparel_id') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Select Product Apparel</label>

                        <select id="apparel_id" name="apparel_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach($apparel as $app)
                            <option value="{{$app->id}}">{{$app->apparel_name}}</option>
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


<!--  -->



<!-- Imprint card data start -->
                <div class="card">
                  <div class="card-block imprint_data_main_content">
                    <!-- imprint data started -->
                    <div class="imprint_data_content">

                    
                     <div class="form-group row add_new_imprint_all_row">
                        <div class="col-12 text-right">
                          <button class="btn btn-info add_new_imprint_all" type="button">Add Imprint</button>
                        </div>
                    </div>


                    <div class="imprint_data_content_new">

                    <h5>Imprints</h5>
                    <div class="form-group row">

                      <div class="col-md-6 {{ $errors->has('imprint_name') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Name</label>
                          <input type="text" id="imprint_name" name="imprint_name[]"   class="form-control thresold-i" placeholder="imprint name">
                          @if ($errors->has('imprint_name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('imprint_name') }}</strong>
                          </span>
                          @endif
                      </div>

                      <div class="col-md-6 {{ $errors->has('max_colors') ? ' has-error' : '' }}">
                          <label class="form-control-label">Maximum Colors</label>
                          <input type="number" id="max_colors" name="max_colors[]"   class="form-control thresold-i" placeholder="Max Colors" maxlength="10">
                          @if ($errors->has('max_colors'))
                          <span class="help-block">
                            <strong>{{ $errors->first('max_colors') }}</strong>
                          </span>
                          @endif
                      </div>

                    </div>

                    <div class="form-group row">

                      <div class="col-md-12 {{ $errors->has('color_group_id') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Color Group</label>
                          <!-- <input type="text" id="imprint_name" name="imprint_name"   class="form-control thresold-i" placeholder="imprint name" maxlength="10"> -->
                          <select id="color_group_id" name="color_group_id[]" class="form-control thresold-i" >
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
                    </div>

                     <div class="form-group row">
                      <div class="col-md-12 {{ $errors->has('color_id') ? ' has-error' : '' }} ">
                          <label class="form-control-label">Custom Color</label>
                          <!-- <input type="text" id="imprint_name" name="imprint_name"   class="form-control thresold-i" placeholder="imprint name" maxlength="10"> -->
                          <select id="color_id" name="color_id[0][]" multiple="multiple" class="form-control js-example-basic-multiple" >
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
                    </div>



<!-- imprint price grid row -->


                    <div class="form-group row">
                      <div class="col-md-12 add_new_imprint_values">
                          
                        <div class="row pl-3">
                          
                        <div class="col-md-3">
                        <div class="row form-control-label pt-2 pb-2">CountFrom</div>
                        <div class="row form-control-label pt-2 pb-2">Location Setup</div>
                        <div class="row form-control-label pt-2 pb-2">Additional Location Running Fee</div>
                        <div class="row form-control-label pt-2 pb-2">Additional ColorSetupFee</div>
                        <div class="row form-control-label pt-2 pb-2">Additional Color Running Fee</div>
                        <div class="row form-control-label pt-2 pb-2">Actions</div>
                        <div class="row form-control-label pt-2 pb-2">
                        <button class="form-control grid-input-text add_imprint_child" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                        </div>

                        
                  <div class="col-md-9 pt-1">

                   <div class="row price-grid-append-container-scroll" id="imprint-price-grid-append-container">

                       <div class="col-md-2  imprint-price-grid-input-container">
                          
                              <div class="col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}">
                                  <input type="number" id="imprint_count_from" name="imprint_count_from[0][]"  class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">
                                  @if ($errors->has('imprint_count_from'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_count_from') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}">
                                  <input type="text" id="imprint_location_setup_fee" name="imprint_location_setup_fee[0][]"  class="form-control thresold-i grid-input-text-imprint" placeholder="" maxlength="10">
                                  @if ($errors->has('imprint_location_setup_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_location_setup_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}">
                                  <input type="text" id="imprint_additinal_location_running_fee" name="imprint_additinal_location_running_fee[0][]"   class="form-control thresold-i grid-input-text-imprint" placeholder=" " maxlength="10">
                                  @if ($errors->has('imprint_additinal_location_running_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}">
                                  <input type="text" id="imprint_additional_setup_fee" name="imprint_additional_setup_fee[0][]"   class="form-control thresold-i grid-input-text-imprint" placeholder=" " maxlength="10">
                                  @if ($errors->has('imprint_additional_setup_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>

                              <div class="col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}">
                                  <input type="text" id="imprint_additional_running_fee" name="imprint_additional_running_fee[0][]" class="form-control thresold-i grid-input-text-imprint" placeholder=" " maxlength="10">
                                  @if ($errors->has('imprint_additional_running_fee'))
                                  <span class="help-block">
                                    <strong>{{ $errors->first('imprint_additional_running_fee') }}</strong>
                                  </span>
                                  @endif
                              </div>


                                <div class="col-md-2">
                                <button class="form-control grid-input-text-imprint delete_imprint_child" type="button"><i class="fa fa-trash"></i></button>
                                </div>
 

                        </div>

                        </div>

                      </div>


                          </div>
                          <!-- end imprint data row -->
                      </div>

                    </div>



<!-- imprint price grid row -->





                  </div>

                    <!-- Imprint Data Ended -->


                  </div>

                </div>

                </div>

                <!-- Imprint data end -->


                <div class="card">
                  <div class="card-block">

                      <h5>Item Color Groups</h5><br>

                    <div class="form-group row">

                    <div class="col-md-6{{ $errors->has('item_color_group_id') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Select Item color</label>
                        <select id="item_color_group_id" name="item_color_group_id[]" class="form-control js-example-basic-multiple" multiple="multiple">
                          @foreach($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
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
                         <input type="text" name="item_color_group_name" value="{{old('item_color_group_name')}}"  class="form-control thresold-i" placeholder="Color Group Name">
                        @if ($errors->has('item_color_group_name'))
                        <span class="help-block">
                          <strong>{{ $errors->first('item_color_group_name') }}</strong>
                        </span>
                        @endif
                    </div>
                  </div>

                  </div>
                </div>



                <!-- select Return policy for products -->
                <div class="card">
                  <div class="card-block">
                    <div class="form-group">
                      <label class="form-control-label">Add Return Policy (optional)</label>
                      <select class="form-control select-box" id="return_policy_id" name="return_policy_id">
                        <option value="">Select Policy</option>
                        @foreach($return_policies as $return_policy)
                        <option value="{{$return_policy->return_policy_id}}">{{$return_policy->default_return_policy_translation->return_policy_title}}</option>
                        @endforeach
                      </select>
                      <small id="emailHelp" class="form-text text-muted">If you want to add this product under any Return Policy then select that policy.</small>
                    </div>
                  </div>
                </div>
                <!-- select Return policy END -->
                <div class="card">
                  <div class="card-block">



<!--                     <div class="form-group row">
                      <div class="col-md-12">
                        <label class="form-control-label">SKU (Stock Keeping Unit)</label>
                        <input type="text" id="sku" name="sku" value="{{old('sku')}}"  class="form-control thresold-i" maxlength="30" placeholder="Stock keeping unit">
                      </div>
                    </div> -->
                   
                    <div class="form-group row">

                      <div class="col-md-6">
                        <label class="form-control-label">Inventory policy</label>

                        <select class="form-control select-box" id="track_inventory" name="track_inventory">
                          <option value="0">Don't track inventory</option>
                          <option value="1">track this product's inventory</option>
                        </select>
                      </div>


                      <div class="col-md-6 quantity {{ $errors->has('quantity') ? ' has-error' : '' }} ">
                        <label class="form-control-label">Quanity</label>
                        <input  id="quantity" name="quantity" value="{{old('quantity')}}" class="inventory form-control thresold-i" maxlength="10">
                        @if ($errors->has('quantity'))
                        <span class="help-block">
                          <strong>{{ $errors->first('quantity') }}</strong>
                        </span>
                        @endif
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
                      <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta title">
                      @if ($errors->has('meta_title'))
                      <span class="help-block">
                        <strong>{{ $errors->first('meta_title') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                      <label class="form-control-label">Meta keywords </label>
                      <input type="text" name="meta_keywords" value="{{old('meta_keywords')}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta keywords">
                      @if ($errors->has('meta_keywords'))
                      <span class="help-block">
                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                      <label class="form-control-label">Meta Description</label>
                      <textarea name="meta_description" class="form-control" rows="5" maxlength="1000" placeholder="Enter meta description">{{old('meta_description')}}</textarea>
                      @if ($errors->has('meta_description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('google_product_category') ? ' has-error' : '' }}">
                      <label class="form-control-label">Google Product Category</label>
                      <input type="text" name="google_product_category" value="{{old('google_product_category')}}" class="form-control thresold-i" maxlength="1000" placeholder="Google Product Category">
                      @if ($errors->has('google_product_category'))
                      <span class="help-block">
                        <strong>{{ $errors->first('google_product_category') }}</strong>
                      </span>
                      @endif
                    </div>


                    <div class="meta form-group {{ $errors->has('image_alt_text') ? ' has-error' : '' }}">
                      <label class="form-control-label">Image Alt Text</label>
                      <input type="text" name="image_alt_text" value="{{old('image_alt_text')}}" class="form-control thresold-i" maxlength="1000" placeholder="Image Alt text">
                      @if ($errors->has('image_alt_text'))
                      <span class="help-block">
                        <strong>{{ $errors->first('image_alt_text') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                      <label class="form-control-label">Gender</label>
                      <input type="text" name="gender" value="{{old('gender')}}" class="form-control thresold-i" maxlength="1000" placeholder="Gender">
                      @if ($errors->has('gender'))
                      <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('age_group') ? ' has-error' : '' }}">
                      <label class="form-control-label">Age Group</label>
                      <input type="text" name="age_group" value="{{old('age_group')}}" class="form-control thresold-i" maxlength="1000" placeholder="Age Group">
                      @if ($errors->has('age_group'))
                      <span class="help-block">
                        <strong>{{ $errors->first('age_group') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('material') ? ' has-error' : '' }}">
                      <label class="form-control-label">Material</label>
                      <input type="text" name="material" value="{{old('material')}}" class="form-control thresold-i" maxlength="1000" placeholder="Material">
                      @if ($errors->has('material'))
                      <span class="help-block">
                        <strong>{{ $errors->first('material') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="meta form-group {{ $errors->has('pattern') ? ' has-error' : '' }}">
                      <label class="form-control-label">Pattern</label>
                      <input type="text" name="pattern" value="{{old('pattern')}}" class="form-control thresold-i" maxlength="1000" placeholder="Pattern">
                      @if ($errors->has('pattern'))
                      <span class="help-block">
                        <strong>{{ $errors->first('pattern') }}</strong>
                      </span>
                      @endif
                    </div>
  

                  </div>

                </div>
               
              </div>

              <div class="col-md-4">
                <div class="card">
                  <div class="card-block">
                    <div class="form-group {{ $errors->has('product_image') ? ' has-error' : '' }}">
                      <label for="file"  class="col-form-label form-control-label">Product Main Image</label>
                      <img  src="{{$base_url}}/files/assets/images/preview.png" id="product_image" alt="">
                      <label for="file" class="custom-file">
                        <input type="file" name="product_image" class="form-control " accept="image/*" value="{{old('product_image')}}" onchange="document.getElementById('product_image').src = window.URL.createObjectURL(this.files[0])"/>
                        <span class="custom-file-control"></span>
                      </label>
                      @if ($errors->has('product_image'))
                      <span class="help-block">
                        <strong>{{ $errors->first('product_image') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-block">
                   
                      <div class="form-group row">
                        <div class="col-md-12 {{ $errors->has('files') ? ' has-error' : '' }}">
                          
                          <img class="img-fluid" src="{{$base_url}}/files/assets/images/preview.png" id="variant_image_preview" alt="">
                          <label for="file"  class="col-form-label form-control-label">Multipe Image *</label>
                          <label for="file" class="custom-file">
                           
                            <input type="file" id="variant_image" name="files[]" class="custom-file-input form-control"  onchange="document.getElementById('variant_image_preview').src = window.URL.createObjectURL(this.files[0])" multiple/>
                            <span class="custom-file-control"></span>

                          </label>
                          <span class="help-block">
                            <strong id="error_product_image"></strong>
                          </span>
                        </div>
                        
                      </div>

                     <!--  <button id="save-image" type="button" value="Submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">Save</button> -->
                  
                  </div>
                </div>
                <div class="card">
                  <div class="card-block">
                   <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                    <label class="form-control-label">Category</label>


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
                      <option value="{{$category->category_id}}">{{$category->default_category_translation->category_name}}</option>

                      @endforeach
                    </select>
                    @if ($errors->has('category'))
                    <span class="help-block">
                      <strong>{{ $errors->first('category') }}</strong>
                    </span>
                    @endif
                    <small id="emailHelp" class="form-text text-muted">If you want to add this under any category then select category.</small>
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
                    <input type="number" name="product_minimum_quantity" value="{{old('product_minimum_quantity')}}"  class="form-control thresold-i" placeholder="Product Minimum Quantity " maxlength="40">
                    @if ($errors->has('product_minimum_quantity'))
                    <span class="help-block">
                      <strong>{{ $errors->first('product_minimum_quantity') }}</strong>
                    </span>
                    @endif
                     <small id="emailHelp" class="form-text text-muted">if you don't want set product minimum qunaty then please keep it blank</small>
                  </div>

                </div>
              </div>
            
             
              <div class="card">
                <div class="card-block">
                  <div class="form-group {{ $errors->has('delivery_message') ? ' has-error' : '' }}">
                    <label class="form-control-label">Delivery message (optional)</label>
                    <input type="text" name="delivery_message" value="{{old('delivery_message')?:' DELIVERY in 7 days'}}"  class="form-control thresold-i" value="Free delivery" maxlength="40">
                    @if ($errors->has('delivery_message'))
                    <span class="help-block">
                      <strong>{{ $errors->first('delivery_message') }}</strong>
                    </span>
                    @endif
                    <small class="form-text text-muted">This message will be displayed at product description.</small>
                  </div>

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
            <div class="col-md-12">
              <div class="col-md-12">
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('PRODUCT_ADD'))
                  <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right"> Cancel
                  </button></a>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



<!-- Tags js -->
<script src="{{asset('files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
<script type="text/javascript">

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>



<script type="text/javascript">


  var gst=<?php echo json_encode($gst);?>;

  $.each(gst,function(index,item){
    select_text=item.gst+' %';
    select_value=item.gst_id;
    var o= new Option(select_text,select_value);
    $("#gst_id").append(o);
  });

  //Brand
  var oldBrand="{{old('brand_id')}}";
  if(oldBrand!=""){
    $("#brand_id option[value="+oldBrand+"]").prop('selected',true);
  }


  //kg g
  var oldWeightUnit="{{old('weight_unit')}}";
  if(oldWeightUnit!=""){
    $("#weight_unit option[value="+oldWeightUnit+"]").prop('selected',true);
  }

  //gst
  var oldGst="{{old('gst_id')}}";
  if(oldGst!=""){
    $("#gst_id option[value="+oldGst+"]").prop('selected',true);
  }


  /*$.each(categories,function(index,item){
    select_text=item.category_name;
    select_value=item.category_id;
    var o= new Option(select_text,select_value);
    $("#category_id").append(o);
  });*/


  function showVariantValues(parent_variant_value,child_variant_value){

    parent_variant_value=parent_variant_value.replace(/ /g,'');
    child_variant_value=child_variant_value.replace(/ /g,'');

    parent_variant_value=parent_variant_value.split(",");
    child_variant_value=child_variant_value.split(",");

    my_price=$("#my_price").val();
    if(my_price==""){
      my_price=0;
    }
    market_price=$("#market_price").val();
    if(market_price==""){
      market_price=0;
    }
    sku=$("#sku").val();
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
        $("#variant_values").append("<tr><td>"+item+" <input name='parent_variant_values[]' class='form-control' value='"+item+"' type='hidden'/><input class='form-control' name='child_variant_values[]' type='hidden' value='' /></td><td><input class='form-control number_type' name='variant_my_prices[]' type='text' value='"+my_price+"' /></td><td><input class='form-control number_type' name='variant_market_prices[]' type='text' value='"+market_price+"' /></td><td class='shipping'><input name='variant_weights[]' value='"+weight+"' class='weight form-control number_type' type='text'/></td><td class='shipping'><select class='variant_weight_unit form-control select-box' id='variant_weight_unit' name='variant_weight_units[]'><option value='1'>Kg</option><option value='2'>g</option></select></td><td class='quantity'><input name='variant_quantities[]' value='"+quantity+"' class='inventory form-control number_type' type='number'/></td><td><input name='variant_skues[]' value='"+sku+"' class='form-control' type='text'/></td><td><button class='delete_variant btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");

      }); 
    }else if(child_variant_value!="" && parent_variant_value==""){
      $.each(child_variant_value, function(index, item){
        $("#variant_values").append("<tr><td>"+item+"<input name='parent_variant_values[]' class='form-control' value='' type='hidden'/><input class='form-control' name='child_variant_values[]' value='"+item+"' type='hidden'/></td><td><input class='form-control number_type' name='variant_my_prices[]' type='number' value='"+my_price+"' /></td><td><input class='form-control number_type' name='variant_market_prices[]' type='number' value='"+market_price+"' /></td><td class='shipping'><input name='variant_weights[]' value='"+weight+"' class='weight form-control number_type' type='number'/></td><td class='shipping'><select class='variant_weight_unit form-control select-box' id='variant_weight_unit' name='variant_weight_units[]'><option value='1'>Kg</option><option value='2'>g</option></select></td><td class='quantity'><input name='variant_quantities[]' value='"+quantity+"' class='inventory form-control number_type' type='number'/></td><td><input name='variant_skues[]' value='"+sku+"' type='text' class='form-control'/></td><td><button class='delete_variant btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");
      });
    }else if(child_variant_value!="" && parent_variant_value!=""){
      $.each(parent_variant_value, function(index, parentItem){
        $.each(child_variant_value, function(index, childItem){
          $("#variant_values").append("<tr><td>"+parentItem+"<input class='form-control' name='parent_variant_values[]' value='"+parentItem+"' type='hidden'/> : "+childItem+"<input class='form-control' name='child_variant_values[]' value='"+childItem+"' type='hidden'/></td><td><input  class='form-control number_type' name='variant_my_prices[]' type='number' value='"+my_price+"' /></td><td><input class='form-control number_type' name='variant_market_prices[]' type='number' value='"+market_price+"' /></td><td class='shipping'><input name='variant_weights[]' value='"+weight+"' class='weight form-control number_type' type='number'/></td><td class='shipping'><select class='variant_weight_unit form-control select-box' id='variant_weight_unit' name='variant_weight_units[]'><option value='1'>Kg</option><option value='2'>g</option></select></td><td class='quantity'><input name='variant_quantities[]' value='"+quantity+"' class='inventory form-control number_type' type='number'/></td><td><input name='variant_skues[]' value='"+sku+"' class='form-control' type='text'/></td><td><button class='delete_variant btn btn-danger'><i class='fa fa-trash'></i></button></td></tr>");
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
</script>

<script type="text/javascript">
  $("#product_name").keyup(function(){
    var Text = $(this).val();
       /* Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');*/
        $("#product_url").val(Text);        
      });

  $("#2nd-variant").hide();
  $("#another-variant").hide();
  $(".1st-variant").hide();
  $("#cancel-variant").hide();
  $("#variant_table").hide();
  $("#add-variant").click(function(){
    $(".1st-variant").show();
    $("#another-variant").show();
    $("#add-variant").hide();
    $("#cancel-variant").show();
    $("#variant_table").show();
  });
  $("#another-variant").click(function(){
    $("#2nd-variant").show();
    $("#another-variant").hide();
  });

  $("#cancel-variant").click(function(){
    $("#parent_variant_value").tagsinput('removeAll');
    $("#child_variant_value").tagsinput('removeAll');
    $("#variant_values").html("");
    $("#variant_table").hide();
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

  $("#track_inventory").change(function(){
    track_inventory=$("#track_inventory").val();
    if(track_inventory==1){
      $(".quantity").show();
    }else{
      $(".inventory").val("");
      $(".quantity").hide();
    }
  });
  
  $("#is_product_shipping").click(function(){

    if ($(this).is(':checked')){
      $(".shipping").show();
    }else{
      $(".weight").val("");
      $(".shipping").hide();
    }

  });

  //track inventory
  var oldTrackInventory="{{old('track_inventory')}}";
  if(oldTrackInventory!=""){
    $("#track_inventory option[value="+oldTrackInventory+"]").prop('selected',true);
  }else{
    $(".inventory").val("");
    $(".quantity").hide();
  }

  //old is shipping
  var oldIsProductShipping="{{old('is_product_shipping')}}";
  if(oldIsProductShipping!=""){
    $('#is_product_shipping').prop('checked', true);
  }else{
    $(".weight").val("");
    $(".shipping").hide();
  }

  var oldAllowCustomerStockOut="{{old('allow_customer_stock_out')}}";
  if(oldIsProductShipping!=""){
    $('#allow_customer_stock_out').prop('checked', true);
  }

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

  $('#parent_variant_value').tagsinput({
    maxChars: 15
  });
  $('#child_variant_value').tagsinput({
    maxChars: 15
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
 
        $('#price-grid-append-container').append("<div class='col-md-2  price-grid-input-container'><div class='col  {{ $errors->has('count_from') ? ' has-error' : '' }}'><input id='count_from' type='number' name='count_from[]' class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('count_from'))<span class='help-block'><strong>{{ $errors->first('count_from') }}</strong></span>@endif</div> <div class='col {{ $errors->has('setup_price') ? ' has-error':'' }}'><input id='setup_price' type='text' name='setup_price[]'class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('setup_price'))<span class='help-block'><strong>{{ $errors->first('setup_price') }}</strong></span>@endif</div><div class='col  {{ $errors->has('per_item_price') ? ' has-error' : '' }}'><input id='per_item_price' type='text' name='per_item_price[]' class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('per_item_price'))<span class='help-block'><strong>{{ $errors->first('per_item_price') }}</strong></span>@endif</div><div class='col  {{ $errors->has('per_item_sale_price') ? ' has-error' : '' }}'><input id='per_item_sale_price' type='text' name='per_item_sale_price[]' class='form-control thresold-i grid-input-text' placeholder='' required=''>@if ($errors->has('per_item_sale_price'))<span class='help-block'><strong>{{ $errors->first('per_item_sale_price') }}</strong></span>@endif</div> <div class='col {{ $errors->has('custom_cost') ? ' has-error' : '' }}'><button  type='button' class='form-control thresold-i grid-input-text product_price_minus_button'><i class='fa fa-trash'></i></button></div></div>");   
         }
        });


$('#price-grid-append-container').on('click','.product_price_minus_button',function(e){       
e.preventDefault(); 
$(this).parents('.price-grid-input-container').remove();
x--;
});

});
</script>


<!-- Main Imprints Start -->
<script type="text/javascript">
  $(document).ready(function(){
    var max_filds_new = 10;
    var y = 1;
$('.imprint_data_main_content').on('click','.add_new_imprint_all',function(e){
  if(y<max_filds_new){
    y++;
    var yvalue = y-1;
    // alert(y);
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


// Add New imprint value 2 Start======================================
   $(".imprint_data_main_content").on('click','.imprint_data_content .add_new_imprint_values2 .add_imprint_child2',function(e){
    var a = 1;
  if(a<max_filds_new){
    a++;

$("#imprint-price-grid-append-container2").append("<div class='col-md-2  imprint-price-grid-input-container2'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[1][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[1][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[1][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[1][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[1][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child2' type='button'><i class='fa fa-trash'></i></button></div></div>");
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

          $("#imprint-price-grid-append-container4").append("<div class='col-md-2  imprint-price-grid-input-container4'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[3][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[3][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[3][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[3][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[3][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child4' type='button'><i class='fa fa-trash'></i></button></div></div>");


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


          $("#imprint-price-grid-append-container7").append("<div class='col-md-2  imprint-price-grid-input-container7'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[6][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[6][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[6][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[6][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[6][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child7' type='button'><i class='fa fa-trash'></i></button></div></div>");

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

      $("#imprint-price-grid-append-container8").append("<div class='col-md-2 imprint-price-grid-input-container8'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[7][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[7][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[7][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[7][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[7][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child8' type='button'><i class='fa fa-trash'></i></button></div></div>");

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

$("#imprint-price-grid-append-container10").append("<div class='col-md-2  imprint-price-grid-input-container10'><div class='col {{ $errors->has('imprint_count_from') ? ' has-error' : '' }}'><input type='number' id='imprint_count_from' name='imprint_count_from[9][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_count_from'))<span class='help-block'><strong>{{ $errors->first('imprint_count_from') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_location_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_location_setup_fee' name='imprint_location_setup_fee[9][]'  class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_location_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_location_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additinal_location_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additinal_location_running_fee' name='imprint_additinal_location_running_fee[9][]'   class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additinal_location_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additinal_location_running_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_setup_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_setup_fee' name='imprint_additional_setup_fee[9][]'class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if ($errors->has('imprint_additional_setup_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_setup_fee') }}</strong></span>@endif</div><div class='col {{ $errors->has('imprint_additional_running_fee') ? ' has-error' : '' }}'><input type='text' id='imprint_additional_running_fee' name='imprint_additional_running_fee[9][]' class='form-control thresold-i grid-input-text-imprint' placeholder='' maxlength='10'>@if($errors->has('imprint_additional_running_fee'))<span class='help-block'><strong>{{ $errors->first('imprint_additional_running_fee') }}</strong></span>@endif</div><div class='col-md-2'><button class='form-control grid-input-text-imprint delete_imprint_child10' type='button'><i class='fa fa-trash'></i></button></div></div>");


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

<script type="text/javascript">

  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    // $('.imprint_data_main_content .imprint_data_content .imprint_data_content_new .form-group .js-example-basic-multiple').select2();

    // $('.imprint_data_content').children('.imprint_data_content_new .form-group .js-example-basic-multiple').select2();
});
</script>



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
      $(this).parents('.sub-option-area').append('<div class="sub-option-area_new sub-option-area_new'+index+'"><div class="option_data_content_new_product_sub"><h5>Product Sub Options</h5><div class="form-group row"><div class="col-md-6 {{$errors->has('sub_option_name') ? ' has-error' : ''}}"><label class="form-control-label">Sub Option Name</label><input type="text" id="sub_option_name" name="sub_option_name['+index+']['+rowCount+']"class="form-control thresold-i" placeholder="Sub Option Name">@if ($errors->has('sub_option_name'))<span class="help-block"><strong>{{ $errors->first('sub_option_name')}}</strong></span>@endif</div><div class="col-6 text-right"><button class="btn btn-danger remove_added_sub_option"><i class="fa fa-minus"></i></button></div></div></div><!-- option Retail Price Start --><div class="form-group row"><div class="col-md-12 add_new_option_values  add_new_option_values'+index+'" ><div class="row"><div class="col-md-3 {{ $errors->has('option_count_from') ? ' has-error' : '' }}"><label class="form-control-label">Count From</label><input type="text" id="option_count_from" name="option_count_from['+index+']['+rowCount+'][]" class="form-control thresold-i" placeholder="Count From">@if ($errors->has('option_count_from'))<span class="help-block"><strong>{{ $errors->first('option_count_from') }}</strong></span>@endif</div><div class="col-md-3 {{ $errors->has('option_setup_fee') ? ' has-error' : '' }}"><label class="form-control-label">Setup Fee</label><input type="text" id="option_setup_fee" name="option_setup_fee['+index+']['+rowCount+'][]"  class="form-control thresold-i" placeholder="Setup Fee">@if ($errors->has('option_setup_fee'))<span class="help-block"><strong>{{ $errors->first('option_setup_fee') }}</strong></span>@endif</div><div class="col-md-3 {{ $errors->has('option_additional_fee') ? ' has-error' : '' }}"><label class="form-control-label">Additional Fee</label><input type="text" id="option_additional_fee" name="option_additional_fee['+index+']['+rowCount+'][]"  class="form-control thresold-i" placeholder="Additional Fee">@if($errors->has('option_additional_fee'))<span class="help-block"><strong>{{ $errors->first('option_additional_fee') }}</strong></span>@endif</div><div class="col-md-3"><label class="form-control-label">Actions</label><button class="form-control add_option_child" type="button" index="'+index+''+suboption_count+'" ind="['+index+']['+rowCount+'][]"><i class="fa fa-plus"></i></button></div></div></div></div></div>'); 
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
              $(this).parents('.option_data_content').append('<div class="option_data_content_new"><hr style="border-top:2px solid rgb(20 19 19 / 97%);"><div class="row"><div class="col-10"><h5>Product Options '+y+'</h5></div><div class="col-2 text-right"><button class="btn btn-danger remove_added_option"><i class="fa fa-minus"></i></button></div></div><div class="form-group row"><div class="col-md-6"><label class="form-control-label">Option Name</label><input type="text" id="option_name" name="option_name['+yvalue+']" class="form-control thresold-i option_name" placeholder="Option Name" index="'+yvalue+'"></div><div class="col-md-6"><label class="form-control-label">Show As</label><select id="show_as" name="show_as['+yvalue+']" class="form-control thresold-i"><option value="0">Drop Down</option></select></div></div><div class="sub-option-area sub-option-area_new'+yvalue+'"><div class="option_data_content_new_product_sub"><h5>Product Sub Options</h5><div class="form-group row"><div class="col-md-6 {{ $errors->has('sub_option_name') ? ' has-error' : '' }} "><label class="form-control-label">Sub Option Name</label><input type="text" id="sub_option_name" name="sub_option_name['+yvalue+'][0]" class="form-control thresold-i" placeholder="Sub Option Name">@if ($errors->has('sub_option_name'))<span class="help-block"><strong>{{ $errors->first('sub_option_name') }}</strong></span>@endif</div><div class="col-6 text-right suboption-btn"><button class="btn btn-info add_new_sub_option_all" index="'+yvalue+'" type="button">Add Sub Option</button></div></div></div> <!-- count area --><div class="form-group row"><div class="col-md-12 add_new_option_values add_new_option_values'+yvalue+'"><div class="row"><div class="col-md-3"><label class="form-control-label">Count From</label><input type="text" id="option_count_from" name="option_count_from['+yvalue+'][0][]"  class="form-control thresold-i" placeholder="Count From"></div><div class="col-md-3"><label class="form-control-label">Setup Fee</label><input type="text" id="option_setup_fee" name="option_setup_fee['+yvalue+'][0][]"  class="form-control thresold-i" placeholder="Setup Fee"></div><div class="col-md-3"><label class="form-control-label">Additional Fee</label><input type="text" id="option_additional_fee" name="option_additional_fee['+yvalue+'][0][]"  class="form-control thresold-i" placeholder="Additional Fee"></div><div class="col-md-3"><label class="form-control-label">Actions</label><button class="form-control add_option_child" ind="['+yvalue+'][0][]" type="button" index="'+yvalue+'0"><i class="fa fa-plus"></i></button></div></div></div></div></div></div>');
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
             $(this).parents('.add_new_option_values').append('<div class="row row_append row_append_sub_count'+ct+'"><div class="col-md-3"><input type="text" name="option_count_from'+count_index+'" value=""  class="form-control thresold-i" placeholder="Count From" maxlength="10"></div><div class="col-md-3"><input type="text" name="option_setup_fee'+count_index+'" value=""  class="form-control thresold-i" placeholder="Setup Fee" ></div><div class="col-md-3"><input type="text" name="option_additional_fee'+count_index+'" value=""  class="form-control thresold-i" placeholder="Additional Fee"></div><div class="col-md-3"><button class="form-control delete_option_child" type="button"><i class="fa fa-minus"></i></button></div></div>'); 
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
<!-- script of Option all new  start-->

<!-- select 2 -->
<script type="text/javascript" src="{{asset('files/bower_components/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script type="text/javascript" src="{{asset('files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
</script>
<script type="text/javascript" src="{{asset('files/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('files/assets/pages/advance-elements/select2-custom.js')}}"></script>

@endsection