@extends('layouts.admin')
@section('content')
<style type="text/css">
    .gray-color {
        color:#E7E7E7;
    }
    #number_of_time_use_number{
        width: 130px;
        margin-left: 50px !important;

    }
    .Zebra_DatePicker_Icon_Wrapper button{
     top: 9.5px !important;
     left: 285px !important;
 }
</style>

<!-- 
-->
<style type="text/css">
  #image{
    height: 100px !important;
    width: auto;
    margin:10px;
}
</style>

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">


<script type="text/javascript">
    $("input:radio.checked:checked");
</script>
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
                    <li class="breadcrumb-item"><a href="all">Discount code</a>
                    </li> 
                    <li class="breadcrumb-item">
                        <a>Add discount code 
                        </a>
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
                <div class="row">
                    <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header no-border">
                                    <h5> Add promocodes</h5>
                                    <span class="upper-buttons pull-right">

                                        <button id="save_button" type="submit" class="btn btn-primary waves-effect waves-light pull-right save_button">Save</button>
                                        <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                                        </button></a>  
                                    </span>
                                    <span class="text-muted">You can add discounts  by discount volume, coupons and special offer to attract customer to your online business.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="col-md-7 discounts">
                                <div class="card">
                                    <div class="card-block">
                                       <div class="form-group {{ $errors->has('discount_code') ? ' has-error' : '' }}">
                                        <label class="form-control-label">Title *</label>
                                        <input type="text" name="title" value="{{old('title')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter discount Title">
                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="form-control-label">Description *</label>
                                        <textarea type="text" name="description" value="{{old('description')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter discount description"></textarea>
                                        @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class=" form-group {{ $errors->has('image') ? ' has-error' : '' }}" >
                                      <label class="form-control-label" for="usr">Image *</label>
                                      <div class="slider_img">
                                         <img   src="{{$base_url}}/files/assets/images/preview.png" id="image" alt="">
                                     </div>
                                     <input type="file" class="form-control" name="image" value="{{old('image')}}" accept="image/*"  onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

                                     @if ($errors->has('image'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('discount_code') ? ' has-error' : '' }}">
                                    <label class="form-control-label">Discount code *</label>
                                    <input type="text" name="discount_code" value="{{old('discount_code')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter discount code">
                                    @if ($errors->has('discount_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-block">
                                <h6>Options</h6>
                                <div class="form-group row {{ $errors->has('discount_type_id') ? ' has-error' : '' }}">
                                    <div class="col-md-6">
                                        <label for="exampleSelect1" class="form-control-label"> Discount type *</label>
                                        <select class="form-control select-box" id="discount_type_id" name="discount_type_id">
                                            @foreach($discount_types as $discount_type)
                                            <option value="{{$discount_type->discount_type_id}}">{{$discount_type->discount_type_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('discount_type_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discount_type_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('discount_value') ? ' has-error' : '' }}">
                                            <label class="form-control-label">Discount value *</label>
                                            <i class="fa fa-percent gray-color"></i>
                                            <input type="text" id="discount_value" name="discount_value" value="{{old('discount_value')}}"  class="form-control thresold-i" maxlength="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57 " title="Integer Numbers only">

                                            @if ($errors->has('discount_value'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('discount_value') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-block">
                                <h6>Applies to *</h6>
                                <div class="form-group {{ $errors->has('applies_to_id') ? ' has-error' : '' }}">
                                    <div class="form-radio m-b-10" id="applies_to">

                                        @php
                                        $checked="checked";
                                        @endphp
                                        @foreach($applies_tos as $applies_to)
                                        <div class="radio">
                                            <label>
                                                <input type="radio"  class="applies_to" class="{{$checked}}" value="{{$applies_to->applies_to_id}}" name="applies_to_id">
                                                <i class="helper"></i>{{$applies_to->applies_to_name}}
                                            </label>
                                        </div>
                                        @php
                                        $checked="";
                                        @endphp
                                        @endforeach
                                    </div>

                                    @if ($errors->has('applies_to_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('applies_to_id') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                           <!--  <button type="button" class="btn btn-primary default-view" data-toggle="modal" data-target="#search-category">
                                                Search category
                                            </button> -->
<!-- 
                                            <button type="button" class="btn btn-primary 
                                            search_product" data-toggle="modal" data-target="#search-product">
                                            Search product
                                        </button> -->

                                        <table id="applies_to_table" class="table">

                                        </table>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-block">
                                        <h6>Minimum requirement *</h6>
                                        <div class="form-group {{ $errors->has('minimum_purchase_amount') ? ' has-error' : '' }}">
                                            <!-- <label class="pull-left">Minimum purchase amount </label> -->
                                            <!-- <div class="form-radio">
                                             @php
                                             $checked="checked";
                                             @endphp
                                             @foreach($minimum_requirements as $minimum_requirement)
                                             <div class="radio">
                                                <label>
                                                    <input type="radio" class="{{$checked}}" value="{{$minimum_requirement->minimum_requirement_id}}" name="minimum_requirement_id" checked="checked">
                                                    <i class="helper"></i>{{$minimum_requirement->minimum_requirement_name}}
                                                </label>
                                            </div>
                                            @php
                                            $checked="";
                                            @endphp
                                            @endforeach

                                        </div>   -->
                                        <input type="text" name="minimum_purchase_amount" value="{{old('minimum_purchase_amount')}}" placeholder="Minimum purchase amount"  class="pull-left minimum_purchase_amount form-control thresold-i" onkeypress="return event.charCode >= 48 && event.charCode <= 57 "> 

                                        @if ($errors->has('minimum_purchase_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('minimum_purchase_amount') }}</strong>
                                        </span>
                                        @endif 


                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-block">
                                    <h6>Customer Eligibility *</h6>
                                    <div class="form-group {{ $errors->has('customer_eligibility_id') ? ' has-error' : '' }}">
                                        <div class="form-radio">
                                         @php
                                         $checked="checked";
                                         @endphp
                                         @foreach($customer_eligibilities as $customer_eligibility)
                                         <div class="radio">
                                            <label>
                                                <input type="radio"  class="{{$checked}} customer_eligibility" value="{{$customer_eligibility->customer_eligibility_id}}" name="customer_eligibility_id" checked="checked">
                                                <i class="helper"></i>{{$customer_eligibility->customer_eligibility_name}}
                                            </label>
                                        </div>
                                        @php
                                        $checked="";
                                        @endphp
                                        @endforeach
                                    </div> 
                                    @if ($errors->has('customer_eligibility_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_eligibility_id') }}</strong>
                                    </span>
                                    @endif 

                                    <button type="button" class="btn btn-primary customer_search" data-toggle="modal" data-target="#search-customer">
                                        Search customer
                                    </button>
                                    <table id="customer_eligibility_table" class="table">

                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- usage limits -->
                        <div class="card">
                            <div class="card-block">
                              <h6>Usage Limits</h6>
                              <div class="row m-t-25 text-left">
                                <div class="col-md-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox" id="number_of_time_use" name="is_number_of_time_use" value="1">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            <span class="text-inverse">

                                            Limit number of times this discount can be used. </span>
                                        </label>
                                    </div>
                                    
                                </div>
                                <input type="number" id="number_of_time_use_number" name="number_of_time_use_number" value="{{old('number_of_time_use_number')}}" placeholder="" min="0" class="pull-left  form-control thresold-i m-2" onkeypress="return event.charCode >= 48 && event.charCode <= 57 ">
                                <div class="col-md-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox" value="1" id="one_use_per_customer" name="one_use_per_customer">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            <span class="text-inverse">Limit to only one use per customer.</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end usage limits -->

                    <div class="card">
                        <div class="card-block">
                            <h6>Dates</h6>
                            <div class="form-group row {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <div class="col-md-6 Zebra_DatePicker_Icon_Wrapper">
                                    <label for="exampleSelect1" class="form-control-label"> Start from *</label>
                                    <input type="text" id="datepicker-to"  name="start_date" value="{{old('start_date')}}" placeholder="Date from" class="form-control thresold-i" maxlength="30">
                                    @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif 

                                </div>

                                <div class="col-md-6 form-group {{ $errors->has('start_time') ? ' has-error' : '' }}">
                                    <label class="form-control-label">Start time *</label>
                                    <input type="time" id="start_time" name="start_time" value="{{old('start_time')}}"  class="form-control thresold-i" maxlength="30">

                                    @if ($errors->has('start_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                    @endif 
                                </div>
                            </div>

                            <div class="form-group row Zebra_DatePicker_Icon_Wrapper {{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <label for="exampleSelect1" class="form-control-label"> End to *</label>
                                    <input type="text" id="datepicker" name="end_date" value="{{old('end_date')}}" placeholder="End date"  class="form-control thresold-i" maxlength="30" >


                                    @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                    @endif 
                                </div>

                                <div class="col-md-6 form-group {{ $errors->has('end_time') ? ' has-error' : '' }}" >
                                    <label class="form-control-label">End time *</label>
                                    <input type="time" id="end_time" name="end_time" value="{{old('end_time')}}"  class="form-control thresold-i" maxlength="30">

                                    @if ($errors->has('end_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_time') }}</strong>
                                    </span>
                                    @endif 
                                </div>
                            </div>
                        </div>
                    </div>

                                  <!-- usage limits -->
                        <div class="card">
                            <div class="card-block">
                              <h6>Hide</h6>
                              <div class="row m-t-25 text-left">
                                <div class="col-md-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox" id="is_hide" name="is_hide" value="1">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            <span class="text-inverse">

                                            Check this checkbox if you want to hide this coupon</span>
                                        </label>
                                    </div>
                                    
                                </div>
                   
                            </div>
                        </div>
                    </div>
                    <!-- end usage limits -->

                </div>
            </div>

            <div class="col-sm-12">
                <div class="main-footer">

                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right save_button" id="save_button">Save</button>
                    <a href="all"> <button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                </div>
            </div>
        </form>
    </div>



    <div class="modal fade bd-example-modal-lg" id="search-category" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Search category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
            <label class="form-control-label">Search product name</label>
            <input class="form-control" id="category_id" value="" name="category_id">
        </div>

        <div class="card table-card">
            <div class="card-block" style="padding: 0rem !important;">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Category name</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody id="applies_to_data">
                <td colspan="3" align="center">Please search category</td>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- modal for product -->

<div class="modal fade bd-example-modal-lg" id="search-product" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Search category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
        <label class="form-control-label">Search product name</label>
        <input class="form-control" id="product_id" value="" name="product_id">
    </div>

    <div class="card table-card">
        <div class="card-block" style="padding: 0rem !important;">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Category name</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody id="applies_to_data2">
            <td colspan="3" align="center">Please search category</td>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<!-- modal end -->

<!-- modal for customer -->
<div class="modal fade bd-example-modal-lg" id="search-customer" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Search customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
      <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
        <label class="form-control-label">Search customer name</label>
        <input class="form-control" id="customer_id" value="" name="customer_id">
    </div>

    <div class="card table-card">
        <div class="card-block" style="padding: 0rem !important;">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>customer name</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody id="customer_eligibility_data">
            <td colspan="3" align="center">Please search customer</td>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- end modal for cutomer -->
<div class="md-overlay"></div>

</div>
</div>
</div>
</div>

<script type="text/javascript">


   $("#number_of_time_use_number").hide();

   $("#number_of_time_use").click(function(){
    if ($(this).is(':checked')){    
      $("#number_of_time_use_number").show();
  }else{
      $("#number_of_time_use_number").hide();
  }
});

   $('.customer_search').click(function(){
    $('#customer_id').keyup();
});

   $('.checked').prop('checked', true);

   $('.fa-percent').hide();
   discount_type_id=$('#discount_type_id').val();
   if(discount_type_id==1){
    $('.fa-percent').show();
}

$('#discount_type_id').change(function(){
    discount_type_id=$('#discount_type_id').val();
    if(discount_type_id==1){
        $('.fa-percent').show();
    }else{
        $('.fa-percent').hide();
    }

});



$(".default-view").hide();
$(".search_product").hide();
/*$('.applies_to').change(function(){
    applies_to=$(this).val();
    
    if(applies_to==2){
        $(".search_product").hide();
        $(".default-view").show();
        $("#applies_to_table").empty();
    }
    else if(applies_to==3){
        $(".default-view").hide();
        $(".search_product").show();
        $("#applies_to_table").empty();
    }
    else{
       $(".search_product").hide();
       $(".default-view").hide();
       $("#applies_to_table").empty();
   }
});*/
$(".customer_search").hide();
$('.customer_eligibility').change(function(){
   customer_eligibility=$(this).val();
   if(customer_eligibility==2){
    $(".customer_search").show();
}
else{
    $(".customer_search").hide();
}
});

ids=[];

$('#category_id').keyup(function(){
    category_search_keyword=$('#category_id').val();
    $.ajax({
        type: 'post',
        url: baseURL+"/admin/discount/vk/showAllSpecificCategory",
        data: {'category_search_keyword':category_search_keyword},
        success: function (result) {
            if(result.status=="true"){
                var categories=result.data.data;
                $("#applies_to_data").empty();
                $.each(categories, function(index, item){
                    var category_item='<tr><td><div class="d-inline-block align-middle"><img src="{{$base_url}}/storage/app/'+item.category_image+'" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; width=60 height=60></td><td>'+item.default_category_translation.category_name+'</td><td class=""><button type="button" id="'+item.category_id+'" class="applies_to_add_button btn btn-success waves-effect waves-light add ">Apply</button></td></tr>';
                    $("#applies_to_data").append($(category_item));
                });
            }else{
               $("#applies_to_data").empty();
               notify(result.msg);
           }
       },
       error: function (xhr, textStatus, errorThrown) {
       }
   });
});

$("#applies_to_data").on("click",".applies_to_add_button",function(){
    var img=$(this).parent().parent().find("td:nth-child(1)").find(".d-inline-block img").attr('src');
    var name=$(this).parent().parent().find("td:nth-child(2)").text();

    var category_id=parseInt($(this).attr('id'));

    ids.push(category_id);

    $("#applies_to_table").append('<tr><td>ID</td><td><div class="d-inline-block align-middle"><img src="'+img+'" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; width=60 height=60></td><td>'+name+'</td><td><button type="button" class="delete_applies_to_item btn btn-danger"><i class="fa fa-trash-o"></i></button></td></tr>');
});
$('#product_id').keyup(function(){

    category_search_keyword=$('#product_id').val();
    $.ajax({
        type: 'post',
        url: baseURL+"/admin/discount/vk/showAllSpecificProduct",
        data: {'category_search_keyword':category_search_keyword},
        success: function (result) {

            if(result.status=="true"){
                var products=result.data.data;
                $("#applies_to_data2").empty();
                $.each(products, function(index, item){
                    var product_item='<tr><td><div class="d-inline-block align-middle"><img src="{{$base_url}}/storage/app/'+item.product_image+'" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; width=60 height=60></td><td>'+item.default_product_translation.product_name+'</td><td class="text-right"><button type="button" id="'+item.product_id+'" class="applies_to_add_button2 btn btn-success waves-effect waves-light add pull-right">Apply</button></td></tr>';
                    $("#applies_to_data2").append($(product_item));
                });

            }else{
               $("#applies_to_data2").empty();
               notify(result.msg);
           }
       },
       error: function (xhr, textStatus, errorThrown) {
       }
   });
});
$("#applies_to_data2").on("click",".applies_to_add_button2",function(){
    var product_id=parseInt($(this).attr('id'));

    ids.push(product_id);
    var img=$(this).parent().parent().find("td:nth-child(1)").find(".d-inline-block img").attr('src');
    var name=$(this).parent().parent().find("td:nth-child(2)").text();

    $("#applies_to_table").append('<tr><td>ID</td><td><div class="d-inline-block align-middle"><img src="'+img+'" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; width=60 height=60></td><td>'+name+'</td><td><button type="button" class="m-b-10 delete_applies_to_item btn btn-danger"><i class="fa fa-trash-o"></i></button></td></tr>' );

    
});

search_customers=[];
$('#customer_id').keyup(function(){

    customer_search_keyword=$('#customer_id').val();
    $.ajax({
        type: 'post',
        url: baseURL+"/admin/discount/vk/showAllSpecificCustomer",
        data: {'customer_search_keyword':customer_search_keyword},
        success: function (result) {
            if(result.status=="true"){
                var customers=result.data.data;
                $("#customer_eligibility_data").empty();
                $.each(customers, function(index, item){
                    var customers_item='<tr><td><div class="d-inline-block align-middle"><img src="{{$base_url}}/files/assets/images/user.png" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; width=60 height=60></td><td>'+item.name+'</td><td class="text-right"><button type="button" id="'+item.id+'" class="customer_eligibility_add_button btn btn-success waves-effect waves-light add pull-right">Apply</button></td></tr>';
                    $("#customer_eligibility_data").append($(customers_item));
                });
            }else{
               $("#customer_eligibility_data").empty();
               notify(result.msg);
           }
       },
       error: function (xhr, textStatus, errorThrown) {
       }
   });
});
$("#customer_eligibility_data").on("click",".customer_eligibility_add_button",function(){
    var customer_id=parseInt($(this).attr('id'));

    alert(customer_id);


    var stats = $.inArray(customer_id, search_customers);
    if (stats == -1) {
        search_customers.push(customer_id);
        
        


        var img=$(this).parent().parent().find("td:nth-child(1)").find(".d-inline-block img").attr('src');
        var name=$(this).parent().parent().find("td:nth-child(2)").text();


        $("#customer_eligibility_table").append('<tr><td>Customer</td><td><div class="d-inline-block align-middle"><img src="'+img+'" class="img-radius img-40 align-top m-r-15" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; width=60 height=60></td><td>'+name+'</td><td><button type="button" class="m-b-10 delete_applies_to_item btn btn-danger"><i class="fa fa-trash-o"></i></button></td></tr>' );
    }

});

$('.save_button').click(function(event){
    applies_to_discount='<input type="hidden" name="ids" value="'+ids+'" id="ids" > <input type="hidden" name="customer_ids" value="'+search_customers+'" id="customer_ids" > ';
    $("#applies_to_table").append($(applies_to_discount)); 

});
</script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#datepicker').Zebra_DatePicker({
            direction: 0

            
        });

        $('.discounts').on("click",'.delete_applies_to_item',function(){
            $(this).parent().parent().remove();
        });
    });
</script>

<!-- Date-range picker js -->
<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

<script src="{{asset('files/assets/js/core.js')}}"></script>

@endsection