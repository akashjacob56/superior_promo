@extends('layouts.admin')
@section('content')

<div class="col-sm-12">
  <div class="main-header">
    <h4>All orders</h4>
    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
      <li class="breadcrumb-item">
        <a href="/">
          <i class="icofont icofont-home"></i>
        </a>
      </li>
      <li class="breadcrumb-item"><a>All orders</a>
      </li>
     
    </ol>
  </div>
</div>

<div class="col-sm-12">
  <div class="card">
    <div class="card-block">
      <table id="advanced-table" class="table dt-responsive photo-table nowrap">
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
        <tfoot>
          <tr>
            <th>Order ID</th>
            <th>Date & Time</th>
            <th>Customer</th>
            <th>Contact no.</th>
            <th>Disabled</th>
            <th>Disabled</th>
            <th>Order Amount</th>
            <th>Disabled</th>
          </tr>
        </tfoot>  
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">

  'use strict';
  $(document).ready(function() {
    advance = $('#advanced-table').DataTable( $.extend( {      
      "ajax": {
        url: "/order/myData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 1, "desc" ]],
      "columns": [{
        "data": "order_id"
      },{ 
        "data": "created_at" 
      },{ 
        "data": "user.name" 
      },{ 
        "data": "user.contact_number" 
      },{
        "mData": "status",
        "bSortable": false,
        "ilter":false,
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
        "mData": "status",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<span class="label label-default" style="background-color:#'+row.delivery_status.delivery_status_color+';">'+row.delivery_status.default_delivery_status_translation.delivery_status_name+'</span>';
        }
      },{ 
        "data": "amount" 
      },{
        "mData": "Action",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) { 
          @if($my_permissions->contains('ORDER_DETAILS'))
        return '<a href="{{config("app.baseURL")}}/order/'+row.order_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
        @else
        return "-";
        @endif
      }
    }]
  }, dataTableDesign));
  });
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection