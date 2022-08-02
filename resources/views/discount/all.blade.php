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
            <a>Discounts  </a>
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
                <h5> Discounts</h5>
                <span class="upper-buttons pull-right">
                
                 <a href="add"><button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Discount
                 </button></a>
               </span>
               <span>All Discounts,  You can add discounts  form volume, coupons and special offer etc to attract customers.</span>
             </div>

             <div class="col-sm-12">
            
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Discount Code</th>
                         <th>Discount type</th>
                        <th>Discount Value</th>
                          <th>Start date</th>
                          <th>End Date</th>            
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Discount Code</th>
                        <th>Discount type</th>
                        <th>Discount Value</th>
                         <th>Start date</th>
                          <th>End Date</th>             
                        <th>Disabled</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
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
</div>

<script type="text/javascript">
  'use strict';
  $(document).ready(function() {
    advance = $('#footer-search').DataTable( $.extend({        
      "ajax": {
        url: "allData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 1, "asc" ]],
      "columns": [{
        "data": "discount_code" 
      },{
        "data": "discount_types.discount_type_name",
      },{
        "data": "discount_value",
      },{
        "data": "start_date",
      },{
        "data": "end_date",
      },{
       
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) { 
        return '<a href="'+row.discount_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
        
      }
    }]
  }, dataTableDesign));
  });
</script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection