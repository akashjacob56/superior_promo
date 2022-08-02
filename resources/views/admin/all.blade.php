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
            <a>Admins</a>
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
                <h5> All Admin</h5>
                <span class="upper-buttons pull-right">
              
               @if($my_permissions->contains('ADMIN_ADD'))
                <a href="add" class="pull-right">
                  <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">Add admin
                  </button>
                </a>
                @endif
              </span>

                <span class="text-muted">You view, add, modify, and organize admin  from the selected page in the @if($appearance->is_vshopy==1) vshopy @endif admin.</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Business Name</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Contact no.</th>
                        <th>Action</th>                    
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>Name</th>
                       <th>Business Name</th>
                       <th>Status</th>
                       <th>Email</th>
                       <th>Contact no.</th>
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
      "data": "name"
    },{
      "data": "business_name"
    },{
      "mData": "status.status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';  
      }
    },{ 
      "data": "email" 
    },{ 
      "data": "contact_number" 
    },{
    
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { @if($my_permissions->contains('ADMIN_DETAILS'))
      return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
      @else
      return "-";
      @endif
    }
  }]
}, dataTableDesign) );
 } );
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>

@endsection