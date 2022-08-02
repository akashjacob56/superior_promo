@extends('layouts.admin')
@section('content')
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
            <a href="all">Order's</a>
          </li>
          <li class="breadcrumb-item">
            <a>Today's orders 
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
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5> Today's Orders</h5>

                <span class="text-muted">You can view todays all orders, Process order, as well as print invoices slip for orders placed from your online business store.  
                </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                       
                        <th>Date & Time</th>
                        <th>Customer</th>
                        <th>Contact no.</th>
                        <th>Payment status</th>
                        <th>Delivery status</th>
                        <th>Order Amount</th>
                       
                        <th>Action</th>                      
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Order ID</th>
                      
                        <th>Date & Time</th>
                        <th>Customer</th>
                        <th>Contact no.</th>
                        <th>Payment Status</th>
                        <th>Delivery status</th>
                        <th>Disabled</th>
                      
                        <th>Disabled</th>
                      </tr>
                    </tfoot>
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

<script type="text/javascript">

  'use strict';
  $(document).ready(function() {
   $('#footer-search').DataTable( $.extend({
    "ajax": {
      "url": "todaysData",
      "type": "GET",
      "contentType": "application/json;charset=UTF-8",
      "dataType": "json",
    },
    "order": [[ 0, "desc" ]],
    "columns": [{
      "data": "order_id"
    },{ 
      "data": "updated_at" 
    },{ 
      "data": "user.name" 
    },{ 
      "data": "user.contact_number" 
    },{
      "mData": "payment_status.payment_status_name",
      "mRender": function(data, type, row) {
        if(row.payment_status.payment_status_id==1){
          return '<span class="label label-danger">'+row.payment_status.payment_status_name+'</span>';
        }else if(row.payment_status.payment_status_id==2){
          return '<span class="label label-warning">'+row.payment_status.payment_status_name+'</span>';  
        }else{
          return '<span class="label label-success">'+row.payment_status.payment_status_name+'</span>';  
        }
      }
    },{
      "mData": "delivery_status.default_delivery_status_translation.delivery_status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-default" style="background-color:#'+row.delivery_status.delivery_status_color+';">'+row.delivery_status.default_delivery_status_translation.delivery_status_name+'</span>';
      }
    },{ 
      "mData": "order_amount.total_my_price",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {

       if(row.order_amount!=null){
         return row.order_amount.total_amount;
       }
     }
   }, {
  "mData": "Action",
  "bSortable": false,
  "ilter":false,
  "mRender": function(data, type, row) { 
    @if($my_permissions->contains('ORDER_DETAILS'))
    return '<a href="'+row.order_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
    @else
    return "-";
    @endif
  }
}]
},dataTableDesign));
 });
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection