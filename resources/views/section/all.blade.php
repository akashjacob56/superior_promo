@extends('layouts.admin')
@section('content')
<!-- Treeview css -->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/tree-view/css/treeview.css')}}"> -->

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
            <a>Sections
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
                <h5> Sections</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CATEGORY_ADD'))
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Section
                    </button>
                  </a>
                  @endif
                </span>
                <span class="text-muted">You can view all Sections of product,  Section are the primary way to divide products with section.</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive mobile-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                       <th>Section name</th>
                       <th>Section position</th>
                       <th>Status</th>
                     
                       <th>Action</th>                      
                     </tr>
                   </thead>
                   <tbody>
                   </tbody>
                   <tfoot>
                    <tr>
                     <th>Name</th>
                     <th>Section position</th>
                     <th>Status</th>
                    
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
  check=true;
  'use strict';
  $(document).ready(function() {
    $('#footer-search').DataTable( $.extend({
      "ajax": {
       url: "allData",
       type: "GET",
       contentType: "application/json;charset=UTF-8",
       dataType: "json",
     },
     "order": [[ 1, "asc" ]],                                
     "columns": [{ 
      "data": "default_section_translation.section_name" 
    },{ 
      "data": "section_position" 
    },{
      "mData": "status.status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
      }
    },{

    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) {
    return '<a href="'+row.section_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable data-table-button" >Details</a>';
  }
}]
},dataTableDesign) );
  });

</script>

 <!--  <script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>

 
  <script src="{{asset('assets/plugins/tree-view/js/jstree.min.js')}}"></script>
  <script src="{{asset('assets/plugins/tree-view/js/jquery.tree.js')}}"></script>
-->
@endsection