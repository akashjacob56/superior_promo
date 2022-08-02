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
                <h5> Return policy</h5>
                <span class="upper-buttons pull-right">
               
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Return Policy
                    </button>
                  </a>
               
                </span>
                <span class="text-muted">View All return policy, add, upadate return policy as per your bussiness principle </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        
                        <th>Title</th>
                        <th>Created On</th>
                          <th> Updated on</th>
                        <th>Action</th>                       
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                       
                       <th>Title</th>
                       <th>Created On</th>
                        <th> Updated on</th>
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
       url: "allData",
       type: "GET",
       contentType: "application/json;charset=UTF-8",
       dataType: "json",
     },
     "order": [[ 0, "asc" ]],                                
     "columns": [{
      "data": "default_return_policy_translation.return_policy_title"
    },{ 
      "data": "created_at" 
    },{ 
      "data": "updated_at" 
    },{
    
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { 
      return '<a href="'+row.return_policy_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
      
    }
  }]
}, dataTableDesign));
 } );
</script>

@endsection