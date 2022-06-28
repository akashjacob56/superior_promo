@extends('layouts.admin')
@section('content')

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
          <li class="breadcrumb-item">
            <a>All Order Items</a>
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
                  <h5> All Order Items</h5>
                 
                  <span class="text-muted">You can view all order Items, Process order, as well as print invoices slip for orders placed from your online business store.</span>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>
                          <th>Order Item ID</th>
                          <th>Date & Time</th>
                          <!-- <th>Customer</th> -->
                          <!-- <th>Contact no.</th> -->
                          <!-- <th>Payment status</th> -->
                           <!-- <th>Payment Mode</th> -->
                          <!-- <th>Delivery status</th> -->
                          <!-- <th>Order Amount</th> -->
                          <th>Action</th>                  
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <!-- <tfoot>
                        <tr>
                          <th>Order ID</th>
                         
                          <th>Date & Time</th>
                          <th>Customer</th>
                          <th>Contact no.</th>
                          <th>Payment status</th>
                           <th>Payment Mode</th>
                          <th>Delivery status</th>
                          <th>Disabled</th>
                         
                          <th>Disabled</th>
                        </tr>
                      </tfoot> -->
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <div class="modal fade bd-example-modal-lg" id="select-customer" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
            <!-- tab for select customer -->
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
          </div>
          <!-- end tab -->
        </div>

      </div>
      <div class="modal-footer" id="create-order-button">

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  'use strict';
  $(document).ready(function() {

    function sum(a,b){
      return a+b;
    }
    $('#footer-search').DataTable( $.extend( {      
      "ajax": {
        url: "allOrderItemData/{{$order_id}}",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "desc" ]],
      "columns": [{
        "data": "id"
      },{ 
        "data": "updated_at" 
      },
      // { 
      //   "data": "user.name" 
      // },
      // { 
      //   "data": "user.contact_number" 
      // },

      // {
      //   "mData": "payment_status.payment_status_name",
      //   "mRender": function(data, type, row) {
      //     if(row.payment_status.payment_status_id==1){
      //       return '<span class="label label-danger">'+row.payment_status.payment_status_name+'</span>';
      //     }else if(row.payment_status.payment_status_id==2){
      //       return '<span class="label label-warning">'+row.payment_status.payment_status_name+'</span>';  
      //     }else{
      //       return '<span class="label label-success">'+row.payment_status.payment_status_name+'</span>';  
      //     }
      //   }
      // },

     //  { 
     //    "mData": "row.order_product.transaction_type_id",
     //    "bSortable": false,
     //    "ilter":false,
     //    "mRender": function(data, type, row) {
     //     if(row.order_product.transaction_type_id=="1"){
     //       return "Cash";
     //     } if(row.order_product.transaction_type_id=="2"){
     //       return "Online";
     //     } if(row.order_product.transaction_type_id=="3"){
     //       return "Wallet";
     //     }
     //   }
     // },

     // {
     //    "mData": "delivery_status.default_delivery_status_translation.delivery_status_name",
     //    "bSortable": false,
     //    "ilter":false,
     //    "mRender": function(data, type, row) {
     //      return '<span class="label label-default" style="background-color:#'+row.delivery_status.delivery_status_color+';">'+row.delivery_status.default_delivery_status_translation.delivery_status_name+'</span>';
     //    }
     //  },

     //  { 
     //    "mData": "order_amount.total_my_price",
     //    "bSortable": false,
     //    "ilter":false,
     //    "mRender": function(data, type, row) {
     //     if(row.order_amount!=null){
     //       return row.order_amount.total_amount;
     //     }
     //   }
     // },

     {
    "mData": "Action",
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) { 
      
      // return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>'; 

      return '<a href="{{$base_url}}/admin/order/art-proof?order_item_id='+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Art Proof</button></a><a href="{{$base_url}}/admin/order/art-proof?order_item_id='+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Art Proof</button></a>'; 
     
    }
  }]
}, dataTableDesign));

    $('#customer_id').change(function(){
      var customer_id=$('#customer_id').val();
      var button='  <a > <button type="button" class="btn btn-secondary waves-effect waves-light js-programmatic-disable data-table-button" data-dismiss="modal">Close</button></a> <a href="{{$base_url}}/admin/create-order/'+customer_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Create Order</button></a>';
      $('#create-order-button').empty();
      $('#create-order-button').append($(button));
    });

  });

</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection