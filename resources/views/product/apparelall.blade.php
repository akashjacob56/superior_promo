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
                <h5>Size</h5>
                <span class="upper-buttons pull-right">
               
                  <a href="add-apparel" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Size
                    </button>
                  </a>
               
                </span>
                <span class="text-muted">View All Size, add, upadate  as per your bussiness principle </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        
                        <th>Size Id</th>
                        <th>Size Name</th>
                        <th>Status</th>
                        <th>Action</th>                       
                      </tr>
                    </thead>
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
<script type="text/javascript">
  'use strict';
  $(document).ready(function() {
   $('#footer-search').DataTable( $.extend({     
     "ajax": {
       url: "apparel-alldata",
       type: "GET",
       contentType: "application/json;charset=UTF-8",
       dataType: "json",
     },
     "order": [[ 0, "asc" ]],                                
     "columns": [{
      "data": "id"
    },{ 
      "data": "apparel_name" 
    },
    {
        "mData": "status.status_name",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';  
        }
      },
    {
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { 
      return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>'; 
    }
  }]
}, dataTableDesign));
 } );
</script> 

@endsection