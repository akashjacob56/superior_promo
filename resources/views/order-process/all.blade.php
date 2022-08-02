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
            <a href="/admin/home">Order Process</a>
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
                <h5>Order Process</h5>
                <span class="upper-buttons pull-right">
                
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Order Process
                    </button>
                  </a>
              
                </span>
                <span class="text-muted">You can view all Order Processes here, good brands improves the conversions of Order Processes. add and modify a new Order Processes of the required type and representation to a selected part of your on-line store. </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Order Process Id</th>
                        <th>Order Process Image</th>
                        <th>Created At</th>
                        <th>Action</th>                    
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                   <!--  <tfoot>
                      <tr>
                       <th>Brand</th>
                       
                       <th>Disabled</th>
                      
                       <th>Created_at</th>
                       <th>Last updated on</th>
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






<script type="text/javascript">
  'use strict';
  $(document).ready(function() {
    $('#footer-search').DataTable( $.extend({      
      "ajax": "allData", 
      "order": [[ 0, "asc" ]],                     
      "columns": [{
        "data": "order_process_id",
      },
     
      {
        
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
         
          return '<img class="img-fluid" src="/storage/app/'+row.order_process_image+'" style="height:50px;width:50px;" onerror=this.src="/files/assets/images/product.png";>';
        }
      },

      { 
       "mData":"created_at",
       "bSortable": false,
       "ilter":false,
       "mRender": function(data, type, row) {
         
        return row.created_at;
      }
    },

    {
    "targets":-1,
    
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) {
    return '<a href="'+row.order_process_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
    
  }
}]
},dataTableDesign));
  });
</script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection