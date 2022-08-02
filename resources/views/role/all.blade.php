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
            <a>Roles  </a>
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
                <h5> Roles</h5>
                <span class="upper-buttons pull-right">

                 @if($my_permissions->contains('ROLE_ADD'))
                 <a href="add" class="pull-right">
                  <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add role
                  </button>
                </a>
                @endif
              </span>
              <span class="text-muted">You view, add, modify, and organize all of your roles from the Roles page in the admin.</span>

            </div>
            <div class="card-block">
              <div class="dt-responsive table-responsive">
                <table id="footer-search" class="table nowrap">
                  <thead>
                    <tr>
                     <th>ID</th>
                     <th>Role Name</th>
                     <th>Created at</th>
                     <th>Updated at</th>                      
                     <th>Action</th>                     
                   </tr>
                 </thead>
                 <tbody>
                 </tbody>
                 <tfoot>
                  <tr>
                   <th>ID</th>
                   <th>Role Name</th> 
                   <th>Created at</th>
                     <th>Updated at</th>                        
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
   $('#footer-search').DataTable($.extend( {
    "ajax": {
      url: "allData",
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      dataType: "json",
    },
    "order": [[ 0, "asc" ]],
    "columns": [{
      "data": "role_id" 
    },{
      "data": "role" 
    },{ 
        "data": "created_at" 
      },{ 
        "data": "updated_at" 
      },{
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        @if($my_permissions->contains('ROLE_DETAILS'))
        return '<a href="'+row.role_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
        @else
        return "-"; 
        @endif
      }
    }]
  },dataTableDesign)) ;
 });
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>

@endsection