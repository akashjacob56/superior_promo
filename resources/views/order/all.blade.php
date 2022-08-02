@extends('layouts.admin')
@section('content')

 @php 

 @endphp
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<style type="text/css">
  /*.modal-backdrop {
    position: absolute !important;

}*/
.hidden{
  display: none !important;
}

input[type=checkbox]{
    margin: 4px 0px 5px 0 !important;
}

  .search-row{
      margin-bottom:5px;
  }

input.input-width{
  width: 300px;
  /*border-radius: 3px;*/
}

select.select-width{
  width: 300px;
  /*border-radius: 3px;*/
}
/*.modal.fade.show{
  display: block;
}
*/
.modal {
  background: rgba(0, 0, 0, 0.5); 
}
.modal-backdrop {
  display: none;
}
.modal-backdrop {
  position: fixed;
  z-index: -1 !important;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #000000;
}
.small-inpul-len{
  width: 134px;
}
</style>

<style type="text/css">
.all-button-div{
    padding-top: 20px;
}

.all-button-div>i{
    color: deepskyblue;
    font-size: 30px;
    width: 50px;
}

.admin-modal{
    width: 950px;
    right: 202px;
    top: 25px;
}

.border-text{
    border: solid 1px !important;
}

 .btn-stage{
    width: 150px;
    height: 40px;
    background-color: #F0F0F0;
    border-color: #EAEAEA;
    border: solid 0px #F0F0F0;
}

.note-table{
    overflow: scroll;
}


.head-color{
    background: #6bd1fc;
}

.note-editor .note-toolbar>.note-btn-group, .note-popover .popover-content>.note-btn-group {
    margin-top: 5px;
    margin-left: 0;
    margin-right: 5px;
    overflow: visible;
}


.short_divider {
        margin: 0 0 0.2rem;
        width: 100%;
    }


.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    width:100%;
    max-width: 100%;
    padding: 25px;
    border-radius: 3px;
    transition: 0.2s
    background: #F8F8F8;
    border: 5px dashed #DDD;
    height: 150px;
    text-align: center;
    padding-top: 55px;
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0
}

.mt-100 {
    margin-top: 100px
}

.input-width{
    width: 100%;
}


input.art_proof_request_checkbox{
  margin-left: -15px !important;
}

  .color_orange{
    background-color: rgb(255, 130, 130) !important;
  }

  p.paid-unpaid-status{
                            border:1px solid #337ab7;background-color: #337ab7; width: 20px;height: 24px;color: white;font-weight: 500;font-size:16px;text-align: center;
                          }

  .note-editable p{
    margin-top: 38px !important;
  }
</style>

<!-- for summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- for summernote -->

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#summernote2').summernote();
        $('.summernote').summernote();
    });
  </script>



  <script type="text/javascript">
$(document).on('change', '.file-input', function() {
var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
});
  </script>
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item">
            <a>All orders</a>
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
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Orders</h4>
                  <span class="text-muted">You can view all orders, Process order, as well as print invoices slip for orders placed from your online business store.</span>
                </div>

                <!-- Filter Start -------------------------------------->
                <div class="card-block">

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">Order ID</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" type="number" name="order_id" id="search_order_id" placeholder="Order ID" value="{{$data['order_id']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Sub-Order ID</label></div>
                            <div class="col-8"><input id="search_sub_order_id" class="input-width" type="number" name="sub_order_id" placeholder="Sub Order ID" disabled="" value="{{$data['sub_order_id']}}"></div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">User Name</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="search_user_name" type="text" name="user_name" placeholder="Customer Name" value="{{$data['customer_name']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">User ID</label></div>
                            <div class="col-8">
                                <input id="search_user_id" class="input-width" type="number" name="user_id" placeholder="User ID" value="{{$data['customer_id']}}">
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">P.O. ID</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="search_purchase_order_id" type="number" name="purchase_order_id" placeholder="Purchase Order ID" disabled="" value="{{$data['purchase_order_id']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Vendor ID</label></div>
                            <div class="col-8">
                                <!-- <input id="user_id" class="input-width" type="text" name="user_id" placeholder="User ID"> -->
                                <select class="select-width" name="vendor_id" id="search_vendor_id">
                                  <option selected="" disabled="">Select Vendor</option>
                                  <option value="1">mahesh</option>
                                  <option value="2">akshay</option>
                                  <option value="3">kiran</option>
                                </select>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">Product ID</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="search_product_id" type="number" name="product_id" placeholder="Product ID" value="{{$data['product_id']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Creation Date</label></div>
                            <div class="col-4">
                                <input id="search_from_date" class="small-inpul-len" type="date" name="from_date" placeholder="From" value="{{$data['creation_from_date']}}">
                            </div>

                            <div class="col-4">
                                <input id="search_to_date" class="small-inpul-len" type="date" name="to_date" placeholder="To" value="{{$data['creation_to_date']}}">
                            </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Check Notes</label></div>
                            <div class="col-8">
                                <select class="select-width" name="check_notes" id="search_check_notes" disabled="">
                                  <option selected="" disabled="">Check Notes</option>
                                  <option value="1">Have</option>
                                  <option value="0">Have Not</option>
                                </select>
                            </div>
                      </div>
                    </div>  
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Frequency</label></div>
                            <div class="col-8">
                                <select class="select-width" name="frequency" id="search_frequency">
                                  <option selected="" disabled="">Frequency</option>
                                  <option value="today">Today</option>
                                  <option value="3">Last 3 Days</option>
                                  <option value="5">Last 5 Days</option>
                                  <option value="7">Last 7 Days</option>
                                  <option value="14">Last 14 Days</option>
                                  <option value="30">Last 30 Days</option>
                                  <option value="60">Last 60 Days</option>
                                  <option value="90">Last 90 Days</option>
                                </select>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">State</label></div>
                            <div class="col-8">
                                <select class="select-width" name="state_id" id="search_state_id">
                                  <option selected="" disabled="">Select State</option>
                                  @if($states!="[]")
                                    @foreach($states as $state)
                                      <option value="{{$state->state_translation->state_name}}">{{$state->state_translation->state_name}}</option>
                                    @endforeach
                                  @endif
                                </select>
                            </div>
                      </div>
                    </div>  
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Payment</label></div>
                            <div class="col-8">
                                <select class="select-width" name="payment_method" id="search_payment_method">
                                  <option selected="" disabled="">Payment</option>
                                  <option value="not_paid">Not Paid</option>
                                  <option value="paid">Paid</option>
                                </select>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Stage</label></div>
                            <div class="col-8">
                                <select class="select-width" name="stage_id" id="search_stage_id">
                                  <option selected="" disabled="">Select Stage</option>
                                  @if($production_stages!="[]")
                                  @foreach($production_stages as $production_stage)
                                    <option value="{{$production_stage->id}}">{{$production_stage->name}}</option>
                                  @endforeach
                                  @endif
                                </select>
                            </div>
                      </div>
                    </div>  
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Order Sample</label></div>
                            <div class="col-8">
                                <select class="select-width" name="order_sample" id="search_order_sample" disabled="">
                                  <option selected="" disabled="">Order Sample</option>
                                  <option value="yes">Yes</option>
                                  <option value="no">No</option>
                                </select>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-12 text-right">
                          <button type="button" class="btn btn-secondary search-filter-button">Search</button>
                          <button type="button" class="btn btn-secondary reset-filter-button">Reset</button>
                          <button type="button" class="btn btn-secondary clear-filter-button">Clear</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- row end -->

                </div>
                <!-- Filter End ------------------------------------>

                

                <!-- Production Stage Start--------------------------- -->
                <div class="card-block">
                  <h5>Production Stages</h5>
                  @foreach($production_stages as $product_stage)
                    <div class="row">
                      <div class="col-12">
                      <a href="/admin/order/all?stage_id={{$product_stage->id}}">
                        {{$product_stage->name}}
                        @if($product_stage->order_count!="")
                        ({{$product_stage->order_count->total_stage}})
                        @endif
                      </a>
                      </div>
                    </div>
                  @endforeach
                </div>
                <!-- Production Stage Start--------------------------- -->

                <style type="text/css">
                  #footer-search{
                    border: 1px solid black;
                  }
                  select.production_stage_select_box{
                        padding: 0px 12px;
                  }
                  input.stage_management_input_checkbox{
                    margin-left: -15px !important;
                  }


                </style>

                <!-- ----------------------All Order Datatable Start ----------------- -->

                <script type="text/javascript">
                  $(document).ready(function(){
                    //Detail Of Order Item
                    $('input.detail_checkbox').on('click',function(){
                        var order_item_id = $(this).attr('order_item_id');

                        if($(this).is(':checked')){
                          $('.detail_checkbox_information_'+order_item_id).removeClass('hidden');
                        }else{
                          $('.detail_checkbox_information_'+order_item_id).addClass('hidden');
                        }
                    });

                    //Vendor Detail Information
                    $('input.vendor_details').on('click',function(){
                      var order_item_id = $(this).attr('order_item_id');
                        if($(this).is(':checked')){
                          $('.order_item_vendor_detail_'+order_item_id).removeClass('hidden');
                        }else{
                          $('.order_item_vendor_detail_'+order_item_id).addClass('hidden');
                        }
                    });
                  });
                </script>
      @if($orders!="[]")
          @foreach($orders as $order)

                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>
                          <td><a href="/admin/order/edit/{{$order->id}}">{{$order->id}}</a></td>
                       
                          <td></td>
                          <td><?php echo date("m-d-Y H:i A", strtotime($order->created_at)); ?></td>
                          <td></td>
                          <td>@if($order->user!="") {{$order->user->name}}(<a href="/admin/customer/{{$order->user_id}}">{{$order->user_id}}</a>) @endif</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>${{$order->total_price}}</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Ref #</td>
                          <td>Item #</td>
                          <td>Item name</td>
                          <td>Details</td>
                          <td>Total</td>
                          <td>IHD</td>
                          <td>Vendor</td>
                          <td>PO # </td>
                          <td>P.Stage</td>
                          <td>Actions</td>
                          <td>Status</td>
                        </tr>

                        @if($order->orderitems!="[]")
                        @foreach($order->orderitems as $orderitem)

                          @php
                            if($orderitem->is_important==1){
                                $is_important_color = "color_orange";
                            }else{
                                $is_important_color = "";
                            }
                          @endphp
                        <tr class="{{$is_important_color}} selection_excla_sign_{{$orderitem->id}}">
                            <td><a href="/admin/order/order_item/edit/{{$orderitem->id}}">{{$orderitem->order_id}}S{{$orderitem->id}}</a></td>
                            <td><a href="javascript:void(0);">{{$orderitem->product_id}}</a></td>
                            <td>@if($orderitem->product!="") @if($orderitem->product->product_translation!="") {{$orderitem->product->product_translation->product_name}} @endif @endif</td>
                            <td>
                              <input class="detail_checkbox" type="checkbox" name="" order_item_id="{{$orderitem->id}}"><br>
                              
                              <div class="detail_checkbox_information_{{$orderitem->id}} hidden">
                                  @if($orderitem->cart_item!="")
                                    @if($orderitem->cart_item->cartitemcolor!="")
                                    <span><b>Colors:</b></span><br>
                                      &nbsp;&nbsp;{{$orderitem->cart_item->cartitemcolor->color_name}}<br>
                                    @endif

                                    @if($orderitem->cart_item->cartitemimprint!="[]")
                                         <span><b>Imprints:</b></span><br>
                                        @foreach($orderitem->cart_item->cartitemimprint as $cartitemimprint)
                                           &nbsp;&nbsp;{{$cartitemimprint->imprint_name}},&nbsp;<br>
                                        @endforeach
                                    @endif
                                  @endif
                              </div>
                              
                            </td>
                            <td>${{$orderitem->price}}</td>
                            <td></td>
                            <td>
                              @if($orderitem->vendor) {{$orderitem->vendor->name}}  @endif<input class="vendor_details" type="checkbox" name="" order_item_id="{{$orderitem->id}}"><br>

                              <div class="order_item_vendor_detail_{{$orderitem->id}} hidden" style="margin-top: 5px;">
                                @if($all_vendors!="[]")
                                    <select class="select_vendor" id="select_vendor" name="select_vendor_id" order_item_id="{{$orderitem->id}}">
                                      <option selected="" disabled="">Select Vendor</option>
                                      @foreach($all_vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}} {{$vendor->last_name}}</option>
                                      @endforeach
                                    </select>
                                    <br>
                                @endif


                                @if($orderitem->product!="")
                                <img style="width: 50px;height: 60px;" src="/storage/app/{{$orderitem->product->product_image}}"><br>
                                @endif

                                <div class="vendor_show_data_{{$orderitem->id}}">
                                    ID: {{$orderitem->vendor_id}}<br>
                                    @if($orderitem->vendor!="")
                                      Name: {{$orderitem->vendor->name}}
                                    @endif
                                </div>
                                
                              </div>
                             



                            </td>
                            <td></td>
                            <td>@if($orderitem->stage!="") {{$orderitem->stage->name}} @endif</td>
                            <td>
                              <i class="fa fa-database modalnew" style="font-size:15px;" data-toggle="modal" data-target="#exampleModalLong{{$orderitem->id}}"></i>&nbsp;<i class="fa fa-folder-open" data-toggle="modal" data-target="#exampleModalLong-model-second-{{$orderitem->id}}"></i>&nbsp;<i class="fa fa-usd dollar_clickable" dollar_clickable" order_item_id="{{$orderitem->id}}" data-toggle="modal" data-target="#exampleModalLong-model-third-{{$orderitem->id}}" style="font-size:15px;"></i>&nbsp;<i class="fa fa-magic "  style="font-size:15px;" data-toggle="modal" data-target="#exampleModalLong-model-fourth-{{$orderitem->id}}"></i><!-- &nbsp;<i style="font-size:15px;" class="fa fa-file-text"data-toggle="modal" data-target="#exampleModalLong-model-fifth"></i> -->&nbsp;<i style="font-size:15px;" class="fa fa-exclamation exclamation_click_order" order_item_id="{{$orderitem->id}}"></i>

                  <!-- ------------------------------------- Stage Management Start - --------------------------------->
                        <!-- model for first button  -->
                          <div class="modal fade" id="exampleModalLong{{$orderitem->id}}">
                          <div class="modal-dialog">
                          <div class="modal-content admin-modal">
                          <div class="modal-header">
                          <div class="row">
                            <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Stage Management</h4></div>
                            <div class="col-md-12"><h6 class="modal-title">Order # {{$order->id}}</h6></div>
                          </div>
                          <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                          <div class="row">
                          <div class="col-md-6">
                          <div class="col-md-12"><h6>Production Stage Management</h6></div>
                          <div class="col-md-12">
                          <div class="select-custom">
                              <label class="lbl-ship">Set new stage<span class="required"></span></label>
                              <select name="orderby" class="form-control border-text production_stage_select_box" id="production_stage_id_{{$orderitem->id}}">
                                <option value="0" selected="" disabled="">Select Production Stages</option>
                                @if($production_stages!="[]")
                                @foreach($production_stages as $production_stage)
                                  <option value="{{$production_stage->id}}">{{$production_stage->name}}</option>
                                @endforeach
                                @endif
                              </select>
                          </div>
                          </div>
                          <div class="col-md-12 pt-2">
                                  <div class="form-group form-check ">
                                      <input type="checkbox" class="form-check-input stage_management_input_checkbox" id="notifycustomer">&nbsp;&nbsp;
                                      <label for="notifycustomer">Notify Customer</label>
                                 </div>
                          </div>
                          <div class="col-md-12 pb-2 btn-stage-section">
                            <button class="btn-stage" order_item_id="{{$orderitem->id}}">Set New Stage</button>
                          </div>
                          <div class="col-md-12 pt-2">
                                  <div class="form-group form-check ">
                                      <input type="checkbox" class="form-check-input stage_management_input_checkbox" id="autoremind">&nbsp;&nbsp;
                                      <label for="autoremind">Auto Remind</label>
                                 </div>
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="col-md-12">
                            <h6>Stage History</h6>
                          </div>
                          <div class="col-md-12">
                          <table class="table table-bordered" id="stage_history_table_{{$orderitem->id}}">
                            <tbody class="stage-historydata stage-historydata-{{$orderitem->id}}">
                              <!-- <tr>
                                <td>Jan/14/2022 07:17</td>
                                <td>New Sample Request</td>
                                <td>Arun</td>
                              </tr> -->

                              @if($orderitem->order_item_stage!="[]")

                                @foreach($orderitem->order_item_stage as $order_item_stage)
                                <tr>
                                  <!-- <td>Jan/14/2022 07:17</td> -->
                                  <td><?php echo date("m-d-Y H:i:s", strtotime($order_item_stage->created_at)); ?></td>
                                  <td>@if($order_item_stage->stage!="") {{$order_item_stage->stage->name}} @endif</td>
                                  <td>@if($order_item_stage->user!="") {{$order_item_stage->user->name}} @endif</td>
                                </tr>
                                @endforeach
                              @endif
                            </tbody>
                          </table>
                          </div> 
                          </div> 
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
        <!-- ---------------------------------- Stage Management End --------------------------------- -->

        <!-- ---------------------------------- Order Notes Start ------------------------------------ -->

<div class="modal fade order_notes_modal_start_here" id="exampleModalLong-model-second-{{$orderitem->id}}">
  <div class="modal-dialog">
  <div class="modal-content admin-modal">

  <div class="modal-header">
  <div class="row">
      <div class="col-md-12 pb-2"><h4 class="modal-title ">Order Notes / Virtual File Cabinet</h4></div>
      <div class="col-md-12"><h6 class="modal-title">Order # {{$order->id}}</h6></div>
  </div>
  <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
  </button>
  </div>



  <div class="modal-body">
  <div class="row">
    <div class="col-md-12"><h6>Order Notes Management (these are internal notes)</h6></div>

    <div class="col-md-12 note-table">
    <table class="table table-bordered">
    <thead class="head-color">
      <tr>
        <th scope="col" class="b-none">Date</th>
        <th scope="col" class="b-none">User</th>
        <th scope="col" class="b-none">Note</th>
      </tr>
    </thead>
    <tbody class="tbody_{{$orderitem->id}}">

      @if($orderitem->order_notes!="[]")
        @foreach($orderitem->order_notes as $order_note)

          <tr>
            <td><?php echo date("m-d-Y H:i:s", strtotime($order_note->created_at)); ?></td>
            <td>
              @if($order_note->user!="")
                {{$order_note->user->name}}
              @endif
            </td>
            <td>
              <p>
                <?php echo $order_note->note; ?>
              </p>
            </td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table> 
  <style type="text/css">
    input.check_notes{
      margin-left: -15px !important;
    }
    textarea.check-notes-textarea{
      padding-top: 17px !important;
    }
    td.art_proof_mng_path_td{
      max-width: 175px !important;overflow: auto;
    }
    button.btn-add-note{
      border: 1px solid #F0F0F0;
    background-color: #F0F0F0;
    padding: 10px 10px;
    }
  </style>
    <div class="form-group form-check ">
      @php
        if($orderitem->check_notes==1){
              $checked_check_notes="checked";
        }else{
              $checked_check_notes="";
        }
      @endphp 
        <input  type="checkbox" class="form-check-input check_notes check_order_notes check_notes_checkbox_order_notes_{{$orderitem->id}}" order_item_id="{{$orderitem->id}}" id="check-notes" {{$checked_check_notes}}>&nbsp;
        <label for="check-notes">Check Notes</label>
   </div>
  </div>


  <div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

  <div class="col-md-12">
   <!-- <div id="summernote" class="pt-4 pb-4">Enter Your Data</div> -->
   <textarea class="summernote check-notes-textarea order_note_textarea_fileld_{{$orderitem->id}}"></textarea>
  </div>

  <!-- <div class="col-md-12 pb-3 pt-3">
    <button class="btn-stage">Add Note</button>
  </div> -->

  <div class="col-md-12"><hr class="short-divider short_divider"></div>
      
  <div class="col-md-12 pt-2 pb-2"><h6>Virtual File Cabinet</h6></div> 

  <div class="col-md-12 head-color pt-1 pb-1"><div class="col-md-6">Date</div><div class="col-md-6">Name</div></div>


  <div class="col-md-12 pt-4 pb-4">
  <div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input drop_virtual_file_cabinet_{{$orderitem->id}}" name="virtual_file_cabinet" type="file">
  </div>
  <input type="hidden" class="order_not_user_id_{{$orderitem->id}}" name="" value="{{$order->user_id}}">
  <div class=" pt-3 order_note">
    <button class="btn-add-note" order_item_id="{{$orderitem->id}}">Add Note</button>
  </div>
  </div>

  </div>

  </div>
  </div>
  </div>
</div>

<!-- -------------------------------------- Order Notes End ---------------------------------------- -->

<!-- --------------------------------------- Extra Payment Management Start ------------------------ -->
  
<div class="modal fade" id="exampleModalLong-model-third-{{$orderitem->id}}">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Extra Payment Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # {{$order->id}}</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
  
<div class="col-md-12 pt-5">
  <div class="form-group form-check ">
    @php
        if($orderitem->not_paid==1){
            $checked_not_paid = "checked";
        }else{
            $checked_not_paid = "";
        }
    @endphp
      <input type="checkbox" class="form-check-input order_item_payment_management_paid" order_item_id="{{$orderitem->id}}" id="check-notes" {{$checked_not_paid}} style="margin-left: -15px !important;">
      <label for="check-notes">Not Paid</label>
 </div>
</div>


<div class="col-md-12"><h6 class="modal-title">Extra billing</h6></div>
<div class="col-md-12"><span>Sorry, this customer does not have any CIM account.</span></div>

<div class="col-md-12 pt-4"><h6 class="modal-title">Apply Credit</h6></div>
<div class="col-md-12"><span>Transaction ID is not avaiable. Credit transaction disabled.</span></div>

<div class="col-md-12 pt-4">
<h6 class="modal-title pt-1 pb-1">Payment History</h6>

  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Payment Profile ID</th>
      <th >Status</th>
      <th >Transaction ID</th>
      <th >Date</th>
      <th >Type</th>
      <th >Tax</th>
      <th >Total Cost</th>
      <th >Credit</th>
      <th >Overall</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table> 

</div>



</div>
</div>
</div>
</div>
</div>

<!-- -------------------------------------- Extra Payment Management End -------------------------- -->


<!-- -------------------------------------- Art Proof Management End   ---------------------------------- -->


<div class="modal fade" id="exampleModalLong-model-fourth-{{$orderitem->id}}">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Art Proof Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # {{$order->id}}</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">
  

<div class="col-md-12">
<h6 class="modal-title pt-1 pb-2">Art Proofs</h6>

  <table class="table table-bordered" >
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Submitted On</th>
      <th >User</th>
      <th>File</th>
      <th >Admin Note</th>
      <th >Customer Note</th>
      <th >Status</th>
      <th >Date of Approval / Denial</th>
    </tr>
  </thead>
  <tbody class="art_proof_management_tbody_{{$orderitem->id}}">
    @if($orderitem->artproofs!="[]")
    @foreach($orderitem->artproofs as $artproof)
    <tr>
      <td>{{$artproof->id}}</td>
      <td><?php echo date("m-d-Y H:i:s", strtotime($artproof->created_at)); ?></td>
      <td>
        @if($artproof->user!="")
        {{$artproof->user->name}}
        @endif
      </td>
      
      @php
    $filepathstr=trim(substr($artproof->path, strpos($artproof->path, '/') + 1));
    @endphp
   
      
      <td class="art_proof_mng_path_td">{{$filepathstr}}</td>
      <td><?php echo $artproof->note; ?></td>
      <td>{{$artproof->customer_note}}</td>
      <td>
          @if($artproof->approved==1)
            Approved
          @elseif($artproof->approved==0)
            Declined
          @elseif($artproof->approved==2)
            N/A
          @endif

      </td>
      <td><?php echo date("m-d-Y H:i:s", strtotime($artproof->updated_at)); ?></td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table> 

</div>


<div class="col-md-12 pt-3"><h6>Add New Art Proof</h6></div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <!-- <input type="checkbox" class="form-check-input art_proof_request_checkbox request_approval_{{$orderitem->id}}" id="approvel">
      <label for="approvel">Request Approval</label> -->
 </div>
</div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <textarea class="summernote form-control art_proof_management_textarea_{{$orderitem->id}}"></textarea>
 </div>
</div>

<input type="hidden" class="art_proof_user_id_{{$orderitem->id}}" value="{{$order->user_id}}" name="">

<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input drop_file_art_proof_management_{{$orderitem->id}}" type="file">
</div>
<div class=" pt-3 art_proof_management">
  <button class="btn-art-proof" order_item_id="{{$orderitem->id}}">Add Art Proof</button>
</div>
</div>

<style type="text/css">
  button.btn-art-proof{
    border: 1px solid #F0F0F0;
    background-color: #F0F0F0;
    padding: 10px 10px;
  }
</style>

</div>



</div>
</div>
</div>
</div>



<!-- -------------------------------------- Art Proof Management End ---------------------------------- -->



                            
                  
                            </td>
                            <td class="status_values_{{$orderitem->id}} ">
                              @if($orderitem->not_paid==1)
                                <p class="paid-unpaid-status d-inline-block extra_payment_paid_or_not_paid_{{$orderitem->id}}">$</p>
                              
                              @endif
                              @if($orderitem->check_notes==1)
                                <span class="order_item_notes_show_{{$orderitem->id}} d-inline-block" style="background-color: #f2dede;padding:3px;" >N</span>
                              @endif
                              
                            </td>
                        </tr>
                        @endforeach
                        @endif

                      </tbody>
                      
                    </table>
                  </div>
                </div>
          @endforeach

          {{ $orders->links() }}
      @endif
                <!-- ------------------------- All Order Datatable End ---------------- -->

                <!-- ------------- Art work Datatable Content Start ----------------- -->
                @if($stage_id!="")
               <!--  <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search-art-proof" class="table nowrap">
                      <thead>
                        <tr>
                          <th>ArtProofID</th>
                           <th>Action</th>                  
                          <th>Order ID</th>
                          <th>Date & Time</th>
                          <th>Customer</th>
                          <th>Path</th>
                          <th>Approved</th>
                          <th>Image Path</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      
                    </table>
                  </div>
                </div> -->
                @endif
                <!-- -------------- Art Proof Content End ---------------------- -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!-- Modal Starting Here -->


<!-- model for first button  -->
<!-- <div class="modal fade" id="exampleModalLong">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">

<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Stage Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">

<div class="col-md-6">
<div class="col-md-12"><h6>Production Stage Management</h6></div>
<div class="col-md-12">
<div class="select-custom">
    <label class="lbl-ship">Set new stage<span class="required"></span></label>
    <select name="orderby" class="form-control border-text">
      <option selected="" disabled="">Select Production Stages</option>
      @if($production_stages!="[]")
      @foreach($production_stages as $production_stage)
        <option value="{{$production_stage->id}}">{{$production_stage->name}}</option>
      @endforeach
      @endif
    </select>
</div>
</div>
<div class="col-md-12 pt-2">
        <div class="form-group form-check ">
            <input type="checkbox" class="form-check-input " id="notifycustomer">
            <label for="notifycustomer">Notify Customer</label>
       </div>
</div>
<div class="col-md-12 pb-2 btn-stage-section">
  <button class="btn-stage">Set New Stage</button>
</div>
<div class="col-md-12 pt-2">
        <div class="form-group form-check ">
            <input type="checkbox" class="form-check-input " id="autoremind">
            <label for="autoremind">Auto Remind</label>
       </div>
</div>
</div>


<div class="col-md-6">
<div class="col-md-12"><h6>Stage History</h6></div>
 
<div class="col-md-12">
<table class="table table-bordered">
  <tbody class="stage-historydata">
    <tr>
      <td>Jan/14/2022 07:17</td>
      <td>New Sample Request</td>
      <td>Arun</td>
    </tr>
  </tbody>
</table>
</div> 
</div> 


</div>


</div>
</div>
</div>
</div> -->


<!-- model 2nd  -->
<!-- <div class="modal fade order_notes_modal_start_here" id="exampleModalLong-model-second">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
    <div class="col-md-12 pb-2"><h4 class="modal-title ">Order Notes / Virtual File Cabinet</h4></div>
    <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>
<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>

<div class="modal-body">

<div class="row">
  <div class="col-md-12"><h6>Order Notes Management (these are internal notes)</h6></div>

  <div class="col-md-12 note-table">
  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th scope="col" class="b-none">Date</th>
      <th scope="col" class="b-none">User</th>
      <th scope="col" class="b-none">Note</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>01/13/22 6:24 PM</td>
      <td>Boris</td>
      <td>
      <p>
      http://www.sgila.com/ProductDetails/?
      productId=552470103&imageId=43268598&tab=Tile&referrerPage=ProductResults&refPgId=516346636&referrerModule=PRDREB
    </p></td>
    </tr>
  </tbody>
</table> 
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="check-notes">
      <label for="check-notes">Check Notes</label>
 </div>
</div>


<div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

<div class="col-md-12">
 <div id="summernote" class="pt-4 pb-4">Enter Your Data</div>
</div>

<div class="col-md-12 pb-3 pt-3">
  <button class="btn-stage">Add Note</button>
</div>

<div class="col-md-12"><hr class="short-divider short_divider"></div>
    
<div class="col-md-12 pt-2 pb-2"><h6>Virtual File Cabinet</h6></div> 

<div class="col-md-12 head-color pt-1 pb-1"><div class="col-md-6">Date</div><div class="col-md-6">Name</div></div>


<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple>
</div>
<div class=" pt-3">
  <button class="btn-stage">Add Note</button>
</div>
</div>

</div>

</div>
</div>
</div>
</div> -->



<!-- model 3rd  -->
<!-- <div class="modal fade" id="exampleModalLong-model-third">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Extra Payment Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
  
<div class="col-md-12 pt-5">
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="check-notes">
      <label for="check-notes">Not Paid</label>
 </div>
</div>


<div class="col-md-12"><h6 class="modal-title">Extra billing</h6></div>
<div class="col-md-12"><span>Sorry, this customer does not have any CIM account.</span></div>

<div class="col-md-12 pt-4"><h6 class="modal-title">Apply Credit</h6></div>
<div class="col-md-12"><span>Transaction ID is not avaiable. Credit transaction disabled.</span></div>

<div class="col-md-12 pt-4">
<h6 class="modal-title pt-1 pb-1">Payment History</h6>

  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Payment Profile ID</th>
      <th >Status</th>
      <th >Transaction ID</th>
      <th >Date</th>
      <th >Type</th>
      <th >Tax</th>
      <th >Total Cost</th>
      <th >Credit</th>
      <th >Overall</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table> 

</div>



</div>
</div>
</div>
</div>
</div> -->








<!-- model 4th  -->
<!-- <div class="modal fade" id="exampleModalLong-model-fourth">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Art Proof Management</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>

<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">
  

<div class="col-md-12">
<h6 class="modal-title pt-1 pb-2">Art Proofs</h6>

  <table class="table table-bordered" >
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Submitted On</th>
      <th >User</th>
      <th >File</th>
      <th >Admin Note</th>
      <th >Customer Note</th>
      <th >Status</th>
      <th >Date of Approval / Denial</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table> 

</div>


<div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="approvel">
      <label for="approvel">Request Approval</label>
 </div>
</div>


<div class="col-md-12">
 <div id="summernote2" class="pt-4 pb-4">Enter Your Data</div>
</div>


<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple>
</div>
<div class=" pt-3">
  <button class="btn-stage">Add Art Proof</button>
</div>
</div>



</div>



</div>
</div>
</div>
</div> -->



<!-- model 5th-->
<!-- <div class="modal fade" id="exampleModalLong-model-fifth">
<div class="modal-dialog">
<div class="modal-content admin-modal">

<div class="modal-header">
<div class="row">
  <div class="col-md-12 pb-2"><h4 class="modal-title model-title">User Notes</h4></div>
  <div class="col-md-12"><h6 class="modal-title">Order # 51564S56907</h6></div>
</div>
<button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
</button>
</div>
<div class="modal-body">

  
<div class="row">
  
<div class="col-md-12">
<h6 class="modal-title pt-1 pb-2">User Notes Management (this is what customer will see)</h6>

  <table class="table table-bordered">
  <thead class="head-color">
    <tr>
      <th >ID </th>
      <th >Submitted On</th>
      <th >User</th>
      <th >File</th>
      <th >Admin Note</th>
      <th >Customer Note</th>
      <th >Status</th>
      <th >Date of Approval / Denial</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table> 

</div>


<div class="col-md-12 pt-3"><h6>Add New Note</h6></div>

<div class="col-md-12">
  <div class="form-group form-check ">
      <input type="checkbox" class="form-check-input " id="approvel">
      <label for="approvel">Request Approval</label>
 </div>

<div class="col-md-12">
  <div class="col-md-1">Subject</div>
  <div class="col-md-11"><input type="text" class="input-width" name="" placeholder="subject" /></div>
</div>

</div>


<div class="col-md-12 pt-4 pb-4">
<div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple>
</div>
<div class=" pt-3">
  <button class="btn-stage">Add Note</button>
</div>
</div>


</div>

</div>
</div>
</div>
</div>
 -->
<!-- Modal Ending Here -->



<!--   <div class="modal fade bd-example-modal-lg" id="select-customer" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Select customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-sm-12"> 
            
            <div class="col-sm-12" >
              <div id="tab" class="btn-group w-100" data-toggle="buttons-radio" >
                <div class="col-sm-6 p-r-0 w-100"> 
                  <a href="#existing-customer" class="btn btn-primary waves-effect waves-light w-100 " data-toggle="tab">Choose Existing Customer</a>
                </div>
                <div class="col-sm-6 p-l-0 w-100"> 
                  <a href="#guest" class="btn btn-primary waves-effect waves-light w-100" data-toggle="tab">Guest</a>
                </div>
              </div>
            </div>

            <div class="tab-content">
              <div class="tab-pane active" id="existing-customer">
                <div class="d-inline-block w-100">
                  <div class="card m-30">
                    <div class="card-header">  <h6 class="text-center">Existing Customer</h6></div>
                    <div class="card-block">
                      <div class="form-group {{ $errors->has('customer_id') ? ' has-error' : '' }}">
                        <label class="form-control-label">Search customer</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="guest">
               <div class="d-inline-block w-100">
                <div class="card m-30">
                  <div class="card-header">  <h6 class="text-center">Guest Customer</h6></div>
                  <div class="card-block">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="form-control-label">Name *</label>
                      <input type="text" name="name" value="{{old('name')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter customer name" >
                      @if ($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('contact_number') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Contact No. <span>*</span></label>
                      <input type="text" name="contact_number" value="{{old('contact_number')}}" class="form-control thresold-i" maxlength="15" placeholder="Enter customer contact number">
                      @if ($errors->has('contact_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group form-primary">
                      <span class="form-bar"></span>
                      <label for="address" class="form-control-label"> @lang("order.address") *</label>
                      <textarea class="form-control" name="address"  class="form-control"  placeholder="@lang("order.address")" value="{{old('address')}}" id="address"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>end tab
          
        </div>

      </div>
      <div class="modal-footer" id="create-order-button">

      </div>
    </div>
  </div>
</div>
 -->


@if($stage_id!="")
<!-- <script type="text/javascript">

  $(document).ready(function(){
     'use strict';

  function order_function(order_id,sub_order_id,customer_name,customer_id,purchase_order_id,vendor_id,product_id,creation_from_date,creation_to_date, check_notes, frequency, state, payment_method, stage, order_sample){
  // $(document).ready(function() {

    function sum(a,b){
      return a+b;
    }

    $(function(){

    $('#footer-search').DataTable($.extend({   
    responsive: true,   
      "ajax": {
        url: "allData?stage_id={{$stage_id}}&order_id="+order_id+"&sub_order_id="+sub_order_id+"&customer_name="+customer_name+"&customer_id="+customer_id+"&purchase_order_id="+purchase_order_id+"&vendor_id="+vendor_id+"&product_id="+product_id+"&creation_from_date="+creation_from_date+"&creation_to_date="+creation_to_date+"&check_notes="+check_notes+"&frequency="+frequency+"&state="+state+"&payment_method="+payment_method+"&stage="+stage+"&order_sample="+order_sample,
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "desc"]],
      "columns": [
  //     {
  //   "mData": "Action",
  //   "bSortable": false,
  //   "ilter":false,
  //   "mRender": function(data, type, row){
  //     return 'fghf';
  //     // return '<td><a href="/admin/artwork/all?order_item_id='+row.id+'">Art Proof</a></td>';

  //     //  $.each(row.orderitems.order_item_stage,function(key,item){
  //     //       $('.tbody_'+row.id).parents('.table_'+row.id).append('<tr><td>'+item.created_at+'</td><td>'+item.user.name+'</td><td>'+item.stage.name+'</td></tr>');
  //     //  });
  //     // return  '<td class="art-work-db-i td'+row.id+'"><div class=""><a class="" href="/admin/artwork/'+row.id+'"><i class="fa fa-pencil" style="font-size:15px;" aria-hidden="true"></i></a>&nbsp;<i class="fa fa-database modalnew" style="font-size:15px;" data-toggle="modal" data-target="#exampleModalLong'+row.id+'"></i>&nbsp;<i class="fa fa-folder-open" data-toggle="modal" data-target="#exampleModalLong-model-second'+row.id+'"></i>&nbsp;<i class="fa fa-usd" data-toggle="modal" data-target="#exampleModalLong-model-third'+row.id+'" style="font-size:15px;"></i>&nbsp;<i class="fa fa-magic" style="font-size:15px;" data-toggle="modal" data-target="#exampleModalLong-model-fourth'+row.id+'"></i><i style="font-size:15px;" class="fa fa-exclamation exclamation_click" art_id="'+row.id+'"></i></div>      <div class="modal fade stage_management_modal_start" id="exampleModalLong'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">Stage Management</h4></div><div class="col-md-12"><h6 class="modal-title">Order #'+row.id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-6"><div class="col-md-12"><h6>Production Stage Management</h6></div><div class="col-md-12"><div class="select-custom"><input class="order_item_id" type="hidden" name="order_item_id" value="'+row.id+'"><label class="lbl-ship">Set new stage<span class="required"></span></label><select style="height:35px;" name="orderby" class="form-control border-text production_stage_select_id"><option selected="" disabled="">Select Production Stages</option> @if($production_stages!="[]") @foreach($production_stages as $production_stage)<option value="{{$production_stage->id}}">{{$production_stage->name}}</option> @endforeach @endif </select></div></div><div class="col-md-12 pt-2"><div class="form-group form-check "><input type="checkbox" style="margin:0 0 0 -12px!important;" class="form-check-input" id="notifycustomer">&nbsp;&nbsp;<label for="notifycustomer">Notify Customer</label></div></div><div class="col-md-12 pb-2 btn-stage-section"><button class="btn-stage" value="'+row.id+'" id="'+row.id+'">Set New Stage</button></div><div class="col-md-12 pt-2"><div class="form-group form-check "><input style="margin:0 0 0 -12px!important;" type="checkbox" class="form-check-input" id="autoremind">&nbsp;&nbsp<label for="autoremind">Auto Remind</label></div></div></div><div class="col-md-6"><div class="col-md-12"><h6>Stage History</h6></div><div class="col-md-12"><table class="table table-bordered table_'+row.id+'"><tbody class="stage-historydata tbody_'+row.id+'"></tbody></table></div></div></div></div></div></div></div>  <div class="modal fade order_notes_modal_start_here" id="exampleModalLong-model-second'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title ">Order Notes / Virtual File Cabinet</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12"><h6>Order Notes Management (these are internal notes)</h6></div><div class="col-md-12 note-table"><table class="table table-bordered"><thead class="head-color"><tr><th scope="col" class="b-none">Date</th><th scope="col" class="b-none">User</th><th scope="col" class="b-none">Note</th></tr></thead><tbody><tr><td>01/13/22 6:24 PM</td><td>Boris</td><td><p>http://www.sgila.com/ProductDetails/?productId=552470103&imageId=43268598&tab=Tile&referrerPage=ProductResults&refPgId=516346636&referrerModule=PRDREB</p></td></tr></tbody></table><div class="form-group form-check "><input type="checkbox" class="form-check-input form_check_input" id="check-notes"><label for="check-notes">Check Notes</label></div></div><div class="col-md-12 pt-3"><h6>Add New Note</h6></div><div class="col-md-12"><div id="summernote" class="pt-4 pb-4">Enter Your Data</div></div><div class="col-md-12 pb-3 pt-3"><button class="btn-stage">Add Note</button></div><div class="col-md-12"><hr class="short-divider short_divider"></div><div class="col-md-12 pt-2 pb-2"><h6>Virtual File Cabinet</h6></div><div class="col-md-12 head-color pt-1 pb-1"><div class="col-md-6">Date</div><div class="col-md-6">Name</div></div><div class="col-md-12 pt-4 pb-4"><div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple></div><div class=" pt-3"><button class="btn-stage">Add Note</button></div></div></div></div></div></div></div>  <div class="modal fade extra_payment_management_modal_start" id="exampleModalLong-model-third'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">Extra Payment Management</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12 pt-5"><div class="form-group form-check "><input type="checkbox" class="form-check-input " id="check-notes"><label for="check-notes">Not Paid</label></div></div><div class="col-md-12"><h6 class="modal-title">Extra billing</h6></div><div class="col-md-12"><span>Sorry, this customer does not have any CIM account.</span></div><div class="col-md-12 pt-4"><h6 class="modal-title">Apply Credit</h6></div><div class="col-md-12"><span>Transaction ID is not avaiable. Credit transaction disabled.</span></div><div class="col-md-12 pt-4"><h6 class="modal-title pt-1 pb-1">Payment History</h6><table class="table table-bordered"><thead class="head-color"><tr><th >ID </th><th >Payment Profile ID</th><th >Status</th><th >Transaction ID</th><th >Date</th><th >Type</th><th >Tax</th><th >Total Cost</th><th >Credit</th><th>Overall</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></div></div>    <div class="modal fade art_proof_management" id="exampleModalLong-model-fourth'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">Art Proof Management</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12"><h6 class="modal-title pt-1 pb-2">Art Proofs</h6><table class="table table-bordered" ><thead class="head-color"><tr><th >ID </th><th >Submitted On</th><th >User</th><th >File</th><th >Admin Note</th><th >Customer Note</th><th >Status</th><th >Date of Approval / Denial</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div><div class="col-md-12 pt-3"><h6>Add New Note</h6></div><div class="col-md-12"><div class="form-group form-check "><input type="checkbox" class="form-check-input " id="approvel"><label for="approvel">Request Approval</label></div></div><div class="col-md-12"><div id="summernote2" class="pt-4 pb-4">Enter Your Data</div></div><div class="col-md-12 pt-4 pb-4"><div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple></div><div class="art_proof_management pt-3"><button class="btn-stage">Add Art Proof</button></div></div></div></div></div></div></div> </td>';
  //   }
  // },
      {
        // "data": "id"

        "mData":"product-detail",
        'bSortable':false,
        'ilter':false,
        "mRender":function(data,type,row){
          // var order_item_id_array = [];
          // var item_ids = [];
          // var item_names = [];

          // $.each(row.orderitems,function(key,item){
          //     var order_item_id = item.id;
          //     $('.order_item_data_all_'+item.order_id).append(order_item_id);
          //   });
           
            return 'ldljf';
        }

      },{ 
        // "data": "updated_at" 
         "mData":"product-detail",
        'bSortable':false,
        'ilter':false,
        "mRender":function(data,type,row){
            return 'sdf';
        }

      },{
        "data": "user.name"
      },
      {
        "data": "total_price"
      },

      // {
      //   "mData":"product-detail",
      //   'bSortable':false,
      //   'ilter':false,
      //   "mRender":function(data,type,row){
      //     return 'lsdfjl';
      //     // return '<a href="/admin/product/'+row.orderitems.product.product_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Product Detail</button></a>';
      //   }
      // },
      // {
      //   "data":"product.product_translation.product_name"
      // },

      // {
      //   "mData":"imprint-option-color-detail",
      //   "bSortable":false,
      //   "ilter":false,
      //   "mRender":function(data,type,row){
      //     // if(row.orderitems.cart_item!=""){

      //       // console.log('length');
      //       // console.log(row.cart_item.cartitemimprint);
      //       // var cartitemimprint_array = [];
      //       //       $.each(row.cart_item.cartitemimprint,function(key,item){
      //       //           var imprint_name=item['imprint_name'];
      //       //           cartitemimprint_array.push(imprint_name);
      //       //       });


      //       // if(row.cart_item.cartitemcolor!=null && row.cart_item.cartitemimprint.length!=0){
      //       //       return '<div class="row"><div class="col-12"><input style="margin-left:5px !important;" type="checkbox" name="detail_checkbox" class="detail_checkbox" order_item_id="'+row.id+'" /></div><div class="col-12 hidden show_details_'+row.id+'"><div class="row"> <div class="col-12">Colors : &nbsp;'+row.cart_item.cartitemcolor.color_name+'</div><hr><div class="col-12 color_names_'+row.id+'">Imprints : '+$.each(cartitemimprint_array,function(key,item){
      //       //                 $("div.color_names_"+row.id).append(item);
      //       //       });+'</div></div></div></div>';

      //       // }else if(row.cart_item.cartitemcolor!=null && row.cart_item.cartitemimprint.length==0 ){
      //       //       return '<div class="row"><div class="col-12"><input style="margin-left:5px !important;" type="checkbox" name="detail_checkbox" class="detail_checkbox" order_item_id="'+row.id+'" /></div><div class="col-12 hidden show_details_'+row.id+'"><div class="row"> <div class="col-12 ">Colors : &nbsp;'+row.cart_item.cartitemcolor.color_name+'</div></div></div></div>';

      //       // }else if(row.cart_item.cartitemcolor==null && row.cart_item.cartitemimprint.length!=0 ){
      //       //       return '<div class="row"><div class="col-12"><input style="margin-left:5px !important;" type="checkbox" name="detail_checkbox" class="detail_checkbox" order_item_id="'+row.id+'" /></div><div class="col-12 hidden show_details_'+row.id+'"><div class="row"> <div class="col-12 color_names_last_'+row.id+'">Imprints : '+$.each(cartitemimprint_array,function(key,item){
      //       //                 $("div.color_names_last_"+row.id).append(item);
      //       //       });+'</div></div></div></div>';
      //       // }else{
      //       //       return '<div class="row"><div class="col-12"><input type="checkbox" name="detail_checkbox" order_item_id="" /></div></div>'
      //       // }
          
      //     // }
      //   }
      // },


      // {
      //   'mData':'vendor_id',
      //   'bSortable':false,
      //   'ilter':false,
      //   "mRender":function(data,type,row){
      //     // if(row.orderitems.vendor_id!=""){

      //     //   return '<div class="row"><div class="col-12"><p class="d-inline-block">'+row.orderitems.vendor.name+'</p><input class="vendor_id_checkbox" style="margin-left:5px !important;" type="checkbox" name="vendor_id_checkbox" order_item_id="'+row.id+'" /></div><div class="col-12 hidden show_vendor_id_details"><div class="row"><div class="col-12">ID: '+row.orderitems.vendor_id+'</div><div class="col-12">Name: '+row.orderitems.vendor.name+'</div><div class="col-12">sku</div></div></div></div>';

      //     // }
      //   }
      // },


      // {
      //   "mData":'stage_id',
      //   'bSortable':false,
      //   'ilter':false,
      //   "mRender":function(data,type,row){
      //     // if(row.orderitems.stage!=null){
      //     //   return '<p>'+row.orderitems.stage.name+'</p>';
      //     // }
      //   }
      // },





      // { 
      //   "data": "user.contact_number" 
      // }
      
     
  ]
}, dataTableDesign));

  });

    // $('#customer_id').change(function(){
    //   var customer_id=$('#customer_id').val();
    //   var button='  <a > <button type="button" class="btn btn-secondary waves-effect waves-light js-programmatic-disable data-table-button" data-dismiss="modal">Close</button></a> <a href="/admin/create-order/'+customer_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Create Order</button></a>';
    //   $('#create-order-button').empty();
    //   $('#create-order-button').append($(button));
    // });


};

order_function();

  // });

  });



 
</script> -->
@endif





@if($stage_id=="")
<!-- <script type="text/javascript">
  'use strict';
  $(document).ready(function() {

    function sum(a,b){
      return a+b;
    }

    $('#footer-search-art-proof').DataTable( $.extend({      
      "ajax": {
        url: "allDataArt?stage_id={{$stage_id}}",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "desc" ]],
      "columns": [
   
      {
        "data": "id"
      },

        
      { "mRender": function(data, type, row){

        $.each(row.orderitem.order_item_stage,function(key,item){
              console.log(item);
              $('.tbody_'+row.orderitem.id).parents('.table_art_'+row.orderitem.id).append('<tr><td>created_at</td><td>user_name</td><td>stage</td></tr>');
         });
        return '<td class="art-work-db-i td'+row.id+'"><div class=""><a class="" href="/admin/artwork/'+row.id+'"><i class="fa fa-pencil" style="font-size:15px;" aria-hidden="true"></i></a>&nbsp;<i class="fa fa-database modalnew" style="font-size:15px;" data-toggle="modal" data-target="#exampleModalLong'+row.id+'"></i>&nbsp;<i class="fa fa-folder-open" data-toggle="modal" data-target="#exampleModalLong-model-second'+row.id+'"></i>&nbsp;<i class="fa fa-usd" data-toggle="modal" data-target="#exampleModalLong-model-third'+row.id+'" style="font-size:15px;"></i>&nbsp;<i class="fa fa-magic" style="font-size:15px;" data-toggle="modal" data-target="#exampleModalLong-model-fourth'+row.id+'"></i>&nbsp;<i style="font-size:15px;" class="fa fa-file-text"data-toggle="modal" data-target="#exampleModalLong-model-fifth'+row.id+'"></i>&nbsp;<i style="font-size:15px;" class="fa fa-exclamation exclamation_click" art_id="'+row.id+'"></i></div>      <div class="modal fade stage_management_modal_start" id="exampleModalLong'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">Stage Management</h4></div><div class="col-md-12"><h6 class="modal-title">Order #'+row.orderitem.order_id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-6"><div class="col-md-12"><h6>Production Stage Management</h6></div><div class="col-md-12"><div class="select-custom"><input class="order_item_id" type="hidden" name="order_item_id" value="'+row.orderitem.id+'"><label class="lbl-ship">Set new stage<span class="required"></span></label><select style="height:35px;" name="orderby" class="form-control border-text production_stage_select_id"><option selected="" disabled="">Select Production Stages</option> @if($production_stages!="[]") @foreach($production_stages as $production_stage)<option value="{{$production_stage->id}}">{{$production_stage->name}}</option> @endforeach @endif </select></div></div><div class="col-md-12 pt-2"><div class="form-group form-check "><input type="checkbox" style="margin:0 0 0 -12px!important;" class="form-check-input" id="notifycustomer">&nbsp;&nbsp;<label for="notifycustomer">Notify Customer</label></div></div><div class="col-md-12 pb-2 btn-stage-section"><button class="btn-stage" value="'+row.orderitem.id+'" id="'+row.orderitem.id+'">Set New Stage</button></div><div class="col-md-12 pt-2"><div class="form-group form-check "><input style="margin:0 0 0 -12px!important;" type="checkbox" class="form-check-input" id="autoremind">&nbsp;&nbsp<label for="autoremind">Auto Remind</label></div></div></div><div class="col-md-6"><div class="col-md-12"><h6>Stage History</h6></div><div class="col-md-12"><table id="table_art_'+row.orderitem.id+'" class="table table-bordered table_art_'+row.orderitem.id+'"><tbody class="stage-historydata tbody_'+row.orderitem.id+'"></tbody></table></div></div></div></div></div></div></div>  <div class="modal fade order_notes_modal_start_here" id="exampleModalLong-model-second'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title ">Order Notes / Virtual File Cabinet</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.orderitem.order_id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12"><h6>Order Notes Management (these are internal notes)</h6></div><div class="col-md-12 note-table"><table class="table table-bordered"><thead class="head-color"><tr><th scope="col" class="b-none">Date</th><th scope="col" class="b-none">User</th><th scope="col" class="b-none">Note</th></tr></thead><tbody><tr><td>01/13/22 6:24 PM</td><td>Boris</td><td><p>http://www.sgila.com/ProductDetails/?productId=552470103&imageId=43268598&tab=Tile&referrerPage=ProductResults&refPgId=516346636&referrerModule=PRDREB</p></td></tr></tbody></table><div class="form-group form-check "><input type="checkbox" class="form-check-input form_check_input" id="check-notes"><label for="check-notes">Check Notes</label></div></div><div class="col-md-12 pt-3"><h6>Add New Note</h6></div><div class="col-md-12"><div id="summernote" class="pt-4 pb-4">Enter Your Data</div></div><div class="col-md-12 pb-3 pt-3"><button class="btn-stage">Add Note</button></div><div class="col-md-12"><hr class="short-divider short_divider"></div><div class="col-md-12 pt-2 pb-2"><h6>Virtual File Cabinet</h6></div><div class="col-md-12 head-color pt-1 pb-1"><div class="col-md-6">Date</div><div class="col-md-6">Name</div></div><div class="col-md-12 pt-4 pb-4"><div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple></div><div class=" pt-3"><button class="btn-stage">Add Note</button></div></div></div></div></div></div></div>  <div class="modal fade extra_payment_management_modal_start" id="exampleModalLong-model-third'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">Extra Payment Management</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.orderitem.order_id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12 pt-5"><div class="form-group form-check "><input type="checkbox" class="form-check-input " id="check-notes"><label for="check-notes">Not Paid</label></div></div><div class="col-md-12"><h6 class="modal-title">Extra billing</h6></div><div class="col-md-12"><span>Sorry, this customer does not have any CIM account.</span></div><div class="col-md-12 pt-4"><h6 class="modal-title">Apply Credit</h6></div><div class="col-md-12"><span>Transaction ID is not avaiable. Credit transaction disabled.</span></div><div class="col-md-12 pt-4"><h6 class="modal-title pt-1 pb-1">Payment History</h6><table class="table table-bordered"><thead class="head-color"><tr><th >ID </th><th >Payment Profile ID</th><th >Status</th><th >Transaction ID</th><th >Date</th><th >Type</th><th >Tax</th><th >Total Cost</th><th >Credit</th><th>Overall</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></div></div>    <div class="modal fade art_proof_management" id="exampleModalLong-model-fourth'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">Art Proof Management</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.orderitem.order_id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12"><h6 class="modal-title pt-1 pb-2">Art Proofs</h6><table class="table table-bordered" ><thead class="head-color"><tr><th >ID </th><th >Submitted On</th><th >User</th><th >File</th><th >Admin Note</th><th >Customer Note</th><th >Status</th><th >Date of Approval / Denial</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div><div class="col-md-12 pt-3"><h6>Add New Note</h6></div><div class="col-md-12"><div class="form-group form-check "><input type="checkbox" class="form-check-input " id="approvel"><label for="approvel">Request Approval</label></div></div><div class="col-md-12"><div id="summernote2" class="pt-4 pb-4">Enter Your Data</div></div><div class="col-md-12 pt-4 pb-4"><div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple></div><div class=" pt-3"><button class="btn-stage">Add Art Proof</button></div></div></div></div></div></div></div>  <div class="modal fade user_notes_modal_start" id="exampleModalLong-model-fifth'+row.id+'"><div class="modal-dialog"><div class="modal-content admin-modal"><div class="modal-header"><div class="row"><div class="col-md-12 pb-2"><h4 class="modal-title model-title">User Notes</h4></div><div class="col-md-12"><h6 class="modal-title">Order # '+row.orderitem.order_id+'</h6></div></div><button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span></button></div><div class="modal-body"><div class="row"><div class="col-md-12"><h6 class="modal-title pt-1 pb-2">User Notes Management (this is what customer will see)</h6><table class="table table-bordered"><thead class="head-color"><tr><th >ID </th><th >Submitted On</th><th >User</th><th >File</th><th >Admin Note</th><th >Customer Note</th><th >Status</th><th >Date of Approval / Denial</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div><div class="col-md-12 pt-3"><h6>Add New Note</h6></div><div class="col-md-12"><div class="form-group form-check "><input type="checkbox" class="form-check-input " id="approvel"><label for="approvel">Request Approval</label></div><div class="col-md-12"><div class="col-md-1">Subject</div><div class="col-md-11"><input type="text" class="input-width" name="" placeholder="subject" /></div></div></div><div class="col-md-12 pt-4 pb-4"><div class="file-drop-area"><span class="file-message">Drop file to upload</span> <input class="file-input" type="file" multiple></div><div class=" pt-3"><button class="btn-stage">Add Note</button></div></div></div></div></div></div></div></td>';



    }, 
    },
      {
        "data": "orderitem.order_id"
      },{ 
        "data": "updated_at" 
      },{ 
        "data": "orderitem.order.user.name" 
      },
     
      {
        "mData":"data",
        "bSortable":false,
        'ilter':false,
        "mRender":function(data,type,row){
          return  row.path.substring(0,25)+"...";
        }
      },

      {
      "mRender": function(data, type, row){
        if(row.approved=="0"){  
          return '<button type="button" class="btn btn-danger waves-effect waves-light js-programmatic-disable data-table-button">Decline</button>';
        }else if(row.approved=="1"){
          return '<button type="button" class="btn btn-success waves-effect waves-light js-programmatic-disable data-table-button">Approve</button>';
        }else if(row.approved=="2"){
          return '<button type="button" class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Not Approve</button>';
        }
      },
    },
     {
    "mData": "Image Path",
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row){
      return "<a href='/storage/app/"+row.path+"'><img src='/storage/app/preview.png' style='width:100px;height:50px;'></a>";
    }
  },


  ]

}, dataTableDesign));

    // $('#customer_id').change(function(){
    //   var customer_id=$('#customer_id').val();
    //   var button='  <a > <button type="button" class="btn btn-secondary waves-effect waves-light js-programmatic-disable data-table-button" data-dismiss="modal">Close</button></a> <a href="/admin/create-order/'+customer_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Create Order</button></a>';
    //   $('#create-order-button').empty();
    //   $('#create-order-button').append($(button));
    // });





  });



</script> -->
@endif

@if($data["vendor_id"]!="")
<script type="text/javascript">
  $('#search_vendor_id option[value={{$data["vendor_id"]}}]').prop('selected',true);
</script>
@endif

@if($data["check_notes"]!="")
<script type="text/javascript">
  $('#search_check_notes option[value={{$data["check_notes"]}}]').prop('selected',true);
</script>
@endif

@if($data["frequency"]!="")
<script type="text/javascript">
  $('#search_frequency option[value={{$data["frequency"]}}]').prop('selected',true);
</script>
@endif

@if($data["state"]!="")
<script type="text/javascript">
  $('#search_state_id option[value={{$data["state"]}}]').prop('selected',true);
</script>
@endif

@if($data["payment_method"]!="")
<script type="text/javascript">
  $('#search_payment_method option[value={{$data["payment_method"]}}]').prop('selected',true);
</script>
@endif

@if($data["stage"]!="")
<script type="text/javascript">
  $('#search_stage_id option[value={{$data["stage"]}}]').prop('selected',true);
</script>
@endif

@if($data["order_sample"]!="")
<script type="text/javascript">
  $('#search_order_sample option[value={{$data["order_sample"]}}]').prop('selected',true);
</script>
@endif
<script type="text/javascript">
                      
                      
                      
                      
                      
                      
                      
                  
                </script>

<!-- for stage append  -->
<script type="text/javascript">

$(document).ready(function(){
// $('#footer-search-art-proof').on('click','.btn-stage-section button.btn-stage',function (event){


//   var stage_id = $(this).closest('td').find('.production_stage_select_id').val();
//   var order_item_id = $(this).attr('id');
//   // var stage_id = $(this).closest("tr").find("td");
//   // stage_id = JSON.stringify(stage_id);
//   // alert(stage_id);
//   if(stage_id==""){
//     alert('Please select production stage');
//     return false;
//   }

//   if(order_item_id==""){
//     alert('Not get order item id');
//     return false;
//   }

//    $.ajax({
//               type:'POST',
//               url:"/admin/order/production-stage/update",
//               data:{'stage_id':stage_id,'order_item_id':order_item_id,'_token':"{{ csrf_token() }}"},
//               success:function(data) {
                
//                 $('.tbody_'+data['order_item_id']).parents('.table_art_'+data['order_item_id']).append('<tr><td>'+data["stage"]["created_at"]+'</td><td>'+data["user_name"]+'</td><td>'+data["stage"]["name"]+'</td></tr>');
//              },
//               error: function(data){

//               } 
//           });
// // alert("hello");
// // $('.stage-historydata').append("<tr><td>Jan/14/2022 07:17</td><td>New Sample Request</td><td>Arun</td></tr>");
// });


//Order Footer search
$('.btn-stage-section').on('click','button.btn-stage',function (event){

  var order_item_id = $(this).attr('order_item_id');
  var stage_id = $('#production_stage_id_'+order_item_id).val();
  
  if(typeof(stage_id)=='object'){
    alert('Please select production stage');
    return false;
  }

  if(stage_id==""&&stage_id=="null"&&stage_id==null){
      alert('Please select production stage');
      return false;
  }

  if(order_item_id==""&&order_item_id==null&&order_item_id!="null"){
    alert('Not get order item id');
    return false;
  }

   $.ajax({
              type:'POST',
              url:"/admin/order/production-stage/update",
              data:{'stage_id':stage_id,'order_item_id':order_item_id,'_token':"{{ csrf_token() }}"},
              success:function(data) {
                
                // $('.tbody_'+data['order_item_id']).parents('.table_'+data['order_item_id']).append('<tr><td>'+data["stage"]["created_at"]+'</td><td>'+data["user_name"]+'</td><td>'+data["stage"]["name"]+'</td></tr>');
                  var created_at = data["stage"]["created_at"];

                  $('.stage-historydata-'+data['order_item_id']).parents('#stage_history_table_'+data['order_item_id']).append('<tr><td>'+data["created_at"]+'</td><td>'+data["stage"]["name"]+'</td><td>'+data["user_name"]+'</td></tr>');

             },
              error: function(data){

              } 
          });
// alert("hello");
// $('.stage-historydata').append("<tr><td>Jan/14/2022 07:17</td><td>New Sample Request</td><td>Arun</td></tr>");
});
});
</script>



<script type="text/javascript">
  $(document).ready(function(){
      // $('#footer-search').on('click','i.exclamation_click_order',function (event){
      $('i.exclamation_click_order').on('click',function (event){


        var order_item_id = $(this).attr('order_item_id');
       
        $.ajax({
            type:"POST",
            url:"/admin/order/order-item-important",
            data:{"order_item_id":order_item_id,"_token":"{{ csrf_token() }}"},
            success:function(data){
                if(data['is_important']==1){
                  $('.selection_excla_sign_'+data["id"]).addClass('color_orange');
                }else{
                  $('.selection_excla_sign_'+data["id"]).removeClass('color_orange');
                }
            },
            error:function(data){

            }

        });

      });
  });
</script>

<script type="text/javascript">

    // $(document).ready(function(){
    //     $('#footer-search').on('click','input.detail_checkbox',function(event){
    //         var order_item_id = $(this).attr('order_item_id');

    //         if($(this).is(':checked')){
    //           $(this).closest('td').find('.show_details_'+order_item_id).removeClass('hidden');
    //         }else{
    //           $(this).closest('td').find('.show_details_'+order_item_id).addClass('hidden');
    //         }
    //     });
    // });

</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>

<script type="text/javascript">
  //Order Search Method Start Here

  $(document).ready(function(){
      $('button.search-filter-button').on('click',function(){
        var order_id = $('#search_order_id').val();
        var sub_order_id = $('#search_sub_order_id').val();
        var customer_name = $('#search_user_name').val();
        var customer_id = $('#search_user_id').val();
        var purchase_order_id = $('#search_purchase_order_id').val();
        var vendor_id = $('#search_vendor_id').val();
        var product_id = $('#search_product_id').val();
        var creation_from_date = $('#search_from_date').val();
        var creation_to_date = $('#search_to_date').val();
        var check_notes = $('#search_check_notes').val();
        var frequency = $('#search_frequency').val();
        var state = $('#search_state_id').val();
        var payment_method = $('#search_payment_method').val();
        var stage = $('#search_stage_id').val();
        var order_sample = $('#search_order_sample').val();

        window.location.href = "/admin/order/all?order_id="+order_id+"&sub_order_id="+sub_order_id+"&customer_name="+customer_name+"&customer_id="+customer_id+"&purchase_order_id="+purchase_order_id+"&vendor_id="+vendor_id+"&product_id="+product_id+"&creation_from_date="+creation_from_date+"&creation_to_date="+creation_to_date+"&check_notes="+check_notes+"&frequency="+frequency+"&state="+state+"&payment_method="+payment_method+"&stage="+stage+"&order_sample="+order_sample;
      });


      //Reset order Search
      $("button.reset-filter-button").on('click',function(){
        $('#search_order_id').val('');
        $('#search_sub_order_id').val('');
        $('#search_user_name').val('');
        $('#search_user_id').val('');
        $('#search_purchase_order_id').val('');
        $('#search_vendor_id').val('');
        $('#search_product_id').val('');
        $('#search_from_date').val('');
        $('#search_to_date').val('');
        $('#search_check_notes').val('');
        $('#search_frequency').val('');
        $('#search_state_id').val('');
        $('#search_payment_method').val('');
        $('#search_stage_id').val('');
        $('#search_order_sample').val('');

        var order_id = '';
        var sub_order_id = '';
        var customer_name = '';
        var customer_id = '';
        var purchase_order_id = '';
        var vendor_id = '';
        var product_id = '';
        var creation_from_date = '';
        var creation_to_date = '';
        var check_notes = '';
        var frequency = '';
        var state = '';
        var payment_method = '';
        var stage = '';
        var order_sample = ''; 

          window.location.href = "/admin/order/all?order_id="+order_id+"&sub_order_id="+sub_order_id+"&customer_name="+customer_name+"&customer_id="+customer_id+"&purchase_order_id="+purchase_order_id+"&vendor_id="+vendor_id+"&product_id="+product_id+"&creation_from_date="+creation_from_date+"&creation_to_date="+creation_to_date+"&check_notes="+check_notes+"&frequency="+frequency+"&state="+state+"&payment_method="+payment_method+"&stage="+stage+"&order_sample="+order_sample;
      });

      //Cleart Filter Button
      $('button.clear-filter-button').on('click',function(){
        $('#search_order_id').val('');
        $('#search_sub_order_id').val('');
        $('#search_user_name').val('');
        $('#search_user_id').val('');
        $('#search_purchase_order_id').val('');
        $('#search_vendor_id').val('');
        $('#search_product_id').val('');
        $('#search_from_date').val('');
        $('#search_to_date').val('');
        $('#search_check_notes').val('');
        $('#search_frequency').val('');
        $('#search_state_id').val('');
        $('#search_payment_method').val('');
        $('#search_stage_id').val('');
        $('#search_order_sample').val('');
      });


  });
</script>

<script type="text/javascript">
  // vendor footer-search show details
  $(document).ready(function(){
    $('#footer-search').on('click','input.vendor_id_checkbox',function(){
      var vendor_id = $(this).attr('order_item_id');
      if($(this).is(':checked')){
        $(this).closest('td').find('.show_vendor_id_details').removeClass('hidden');
      }else{
        $(this).closest('td').find('.show_vendor_id_details').addClass('hidden');

      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.order_note').on('click','.btn-add-note',function(){
      
        var order_item_id = $(this).attr('order_item_id');
        // if($('.check_notes_checkbox_order_notes_'+order_item_id).is(':checked')){
        //   check_note = 1;
        // }else{
        //   check_note = 0;
        // }
        var note = $('.order_note_textarea_fileld_'+order_item_id).val();
        if(note==""){
          alert('Please Note Something');
          return false;
        }

        var user_id = $('.order_not_user_id_'+order_item_id).val();
        var virtual_file_cabinet = $('.drop_virtual_file_cabinet_'+order_item_id).val();
        
        form_data = new FormData();
        jQuery.each($(".drop_virtual_file_cabinet_"+order_item_id)[0].files, function(i, file) {
            form_data.append('files['+i+']', file);
        });

        form_data.append('user_id',user_id);
        // form_data.append('check_note',check_note);
        form_data.append('note',note);
        form_data.append('order_item_id',order_item_id);
        form_data.append( "_token", "{{ csrf_token() }}" );

        $.ajaxSetup 
            ({
                headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
            });

$.ajax({
    method: "POST",
    url: "/admin/order/order-notes",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(data){
        console.log(data['order_note']);

        var user_note = '<div>'+data['order_note']["note"]+'</div>';
        var user_note =$(user_note).text();
       
        $('tbody.tbody_'+data['order_note']["order_item_id"]).append('<tr><td>'+data["created_at"]+'</td><td>'+data['order_note']["user"]["name"]+'</td><td><p>'+user_note+'</p></td></tr>');
    },
    error: function(data){

    }           
});

      });
      
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.art_proof_management').on('click','.btn-art-proof',function(e){

        var order_item_id = $(this).attr('order_item_id');
        var art_proof_image = $('.drop_file_art_proof_management_'+order_item_id).val();
        var admin_note = $('.art_proof_management_textarea_'+order_item_id).val();
        var user_id = $('.art_proof_user_id_'+order_item_id).val();

        // if($('.request_approval_'+order_item_id).is(':checked')){
        //   var request_approval = 1;
        // }else{
        //   var request_approval = 0;
        // }

        if(art_proof_image==""){
          alert('Please select image');
          return false;
        }

        if(admin_note==""){
          alert('Please Enter Something in Note');
          return false;
        }

        form_data = new FormData();
        jQuery.each($(".drop_file_art_proof_management_"+order_item_id)[0].files, function(i, file) {

            var fileName = file['name'];
            form_data.append('files['+i+']', file);
            form_data.append('filenames['+i+']', fileName);
            
            
        });

        form_data.append('user_id',user_id);
        // form_data.append('request_approval',request_approval);
        form_data.append('admin_note',admin_note);
        form_data.append('order_item_id',order_item_id);
        form_data.append( "_token", "{{ csrf_token() }}" );

        $.ajaxSetup 
            ({
                headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
            });


        $.ajax({
            method: "POST",
            url: "/admin/order/art-proof-management-note",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
              console.log(data);

              if(data['art_proof']['approved']==0){
                  var approve = 'Declined';
              }else if(data['art_proof']['approved']==1){
                  var approve = 'Approved';
              }else if(data['art_proof']['approved']==2){
                  var approve = 'N/A';
              }



              if(data['art_proof']['customer_note']==null){
                customer_note="";
              }else{
                customer_note=data['art_proof']['customer_note'];
              }

             if(data['art_proof']['user']==null){
                username="";
              }else{
                username=data['art_proof']['user']["name"];
              }

              
              console.log(data['art_proof']);
                 var filenameimage=data['art_proof']["path"];
                 var strfilename = filenameimage.split("/").pop();
                $('.art_proof_management_tbody_'+data['art_proof']["order_item_id"]).append('<tr><td>'+data['art_proof']["id"]+'</td><td>'+data["created_at"]+'</td><td>'+username+'</td><td class="art_proof_mng_path_td">'+strfilename+'</td><td>'+data['art_proof']["note"]+'</td><td>'+customer_note+'</td><td>'+approve+'</td><td>'+data['updated_at']+'</td></tr>');
                // $('#exampleModalLong-model-fourth-'+data["order_item_id"]).modal('hide');
            },
            error: function(data){

            }           
        });






    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
      $('.select_vendor').on('change',function(){
          var order_item_id = $(this).attr('order_item_id');
          var vendor_id = $(this).val();

          alert(vendor_id);
          form_data = new FormData();
          form_data.append('order_item_id',order_item_id);
          form_data.append('vendor_id',vendor_id);
          form_data.append( "_token", "{{ csrf_token() }}" );

          $.ajax({
            method: "POST",
            url: "/admin/order/select-vendor",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                var order_item_id = data['id'];

                $('.vendor_show_data_'+order_item_id).html(''); 
                $('.vendor_show_data_'+order_item_id).append('ID: '+data["vendor_id"]+'<br> Name:'+data["vendor"]["name"]);
            },  
            error: function(data){

            }           
        });

      });
  });
</script>

<script type="text/javascript">
  // $(document).ready(function(){
  //   $('.dollar_clickable').on('click',function(){
  //     var order_item_id = $(this).attr('order_item_id');

  //   });
  // });
</script>

<script type="text/javascript">
  //order Notes Data
  $(document).ready(function(){
    $('.check_order_notes').on('click',function(){
        var order_item_id = $(this).attr('order_item_id');
        if($(this).is(':checked')){
          var check_notes = 1;
        }else{
          var check_notes = 0;
        }
          
          
          form_data = new FormData();
          form_data.append('order_item_id',order_item_id);
          form_data.append('check_notes',check_notes);
          form_data.append( "_token", "{{ csrf_token() }}" );

          $.ajax({
            method: "POST",
            url: "/admin/order/check-order-notes",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                var order_item_id = data['id'];
                if(data['check_notes']==1){
                  $('.status_values_'+order_item_id).append('<span class="d-inline-block order_item_notes_show_'+data["id"]+'" style="background-color: #f2dede;padding:3px;" >N</span>');
                }else if(data['check_notes']==0){
                   $('.order_item_notes_show_'+order_item_id).remove();
                }
                
                
            },  
            error: function(data){

            }           
        });


        
    });
  });
</script>

<script type="text/javascript">
  $('.order_item_payment_management_paid').on('click',function(){
     
      var order_item_id = $(this).attr('order_item_id');

      if($(this).is(':checked')){
        var not_paid = 1;
      }else{
        var not_paid = 0;
      }

          form_data = new FormData();
          form_data.append('order_item_id',order_item_id);
          form_data.append('not_paid',not_paid);
          form_data.append( "_token", "{{ csrf_token() }}" );

      $.ajax({
            method: "POST",
            url: "/admin/order/check-payment-not-paid",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(data){
                var order_item_id = data['id'];

                if(data['not_paid']==1){
                  $('.status_values_'+order_item_id).prepend('<p class="d-inline-block paid-unpaid-status extra_payment_paid_or_not_paid_'+data["id"]+'">$</p>');
                }else if(data['not_paid']==0){
                   $('.extra_payment_paid_or_not_paid_'+order_item_id).remove();
                }
                
                
            },  
            error: function(data){

            }           
        });



  });
</script>

@endsection