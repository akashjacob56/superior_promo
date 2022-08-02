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
            <a>
              <b class="language-title-color"></b>
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
                <h5>Using  Blogs</h5>
                <span class="upper-buttons pull-right">
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Blog
                    </button>
                  </a>
                </span>
                <span class="text-muted">You can view all Blogs here </span>

              </div>

              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                       <th>Blog Image</th>
                       <th>Blog Title</th>
                       <th>Blog Type</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                   </tbody>
                   <tfoot>
                    <tr>
                      <th>Blog Image</th>
                      <th>Blog Title</th>
                      <th>Blog Type</th>
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
        "columns":[{  
        "targets":-1,
        "mData": "image",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row){
          return "<img src='/storage/app/"+row.image+"' style='width:100px;height:50px;'>";},
        },{
          "mData":"blog_title"
        },{
          "mData":"blog_type.blog_type_name"
        },{
          "mData": "row.is_deleted",
          "bSortable": false,
          "ilter":false,
          "mRender": function(data, type, row) {
           if(row.is_deleted==0){
            return "<a class=datatable-left-link href=/admin/blog/inactive/" + row.blog_id+"><span><button type='submit' class='btn btn-success'>Active</button></span></a>";
          }else{
            return "<a class=datatable-left-link href=/admin/blog/active/" + row.blog_id+"><span><button type='submit' class='btn btn-danger'>InActive</button></span></a>";
          } 
        }
      },{  
        "targets":-1,
        "mData": "Action",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row){

          return "<a class=datatable-left-link href=/admin/blog/" + row.blog_id+"><span><button class='btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button'>Details</button></span></a>";

        }

      },
      ]
},dataTableDesign) );
  });

</script>
@endsection

