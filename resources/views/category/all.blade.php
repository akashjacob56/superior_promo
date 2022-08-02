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
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item">
            <a>Categories
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
                <h5>Using Categories</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CATEGORY_ADD'))
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Category
                    </button>
                  </a>
                  @endif
                </span>
                <span class="text-muted">You can view all Categories of product,  Category are the primary way to combine products with similar characteristic. You can also add sub-Category(categories) if required.</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive mobile-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                       <th>Image</th>
                       <th>Category name</th>
                       <th>Status</th>
                       <th>Description</th>
                       <th>Action</th>                      
                     </tr>
                   </thead>
                   <tbody>
                   </tbody>
                   <tfoot>
                    <tr>
                     <th>Disabled</th>
                     <th>Name</th>
                     <th>Status</th>
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

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<img class="img-fluid" src="/storage/app/'+row.category_image+'" style="height:50px;width:50px;" onerror=this.src="/files/assets/images/product.png";>';
      }
    },{ 
      "data": "default_category_translation.category_name" 
    },{
      "mData": "status.status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
      }
    },{
      "mData": "default_category_translation.description",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        var myContent = '<div>'+row.default_category_translation.description+'</div>';

       var description =$(myContent).text();

        return '<p>'+description+'</p>';
      }
    },{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { @if($my_permissions->contains('CHILD_VARIANT_DETAILS'))
      return '<a href="'+row.category_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable data-table-button" >Details</a>';
      @else
      return "-";
      @endif
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