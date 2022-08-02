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
            <a>All offer blocks </a>
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
                  <h5> All offer block</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('OFFER_BLOCK_ADD'))
                    <a href="add" class="pull-right">
                      <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add offer block
                      </button>
                    </a>
                    @endif
                  </span>
                  <span class="text-muted">You can view, add, modify, and organize all of your offer blocks from the offer blocks page in the  admin.</span>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Last updated on</th>
                          <th>Action</th>                
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                         <th>Disabled</th>
                         <th>Status</th>
                         <th>Updated At</th>
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
     "columns": [{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<img class="img-fluid" src="/storage/app/'+row.default_offer_block_translation.offer_block_image+'" style="height:50px;width:100px;" onerror=this.src="/files/assets/images/product.png";>';
      }
    },{
      "mData": "status.status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
      }
    },{

      "mData": "updated_at",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return row.updated_at;
      }
    },{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {  @if($my_permissions->contains('OFFER_BLOCK_DETAILS'))
      return '<a href="'+row.offer_block_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable data-table-button">Details</a>';
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