@extends('layouts.admin')
@section('content')

<!-- [ breadcrumb ] start -->
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
            <a>Banners </a>
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
                <h5> All Banner</h5>
                @if($my_permissions->contains('SLIDER_ADD'))
                <a href="add" class="pull-right">
                  <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Banner
                  </button>
                </a>
                @endif
                <span class="text-muted">You can view all Banners, add Banners, get Banner details from the selected part of your online business </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
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
                       <th>Title</th>
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
     "order": [[ 1, "desc" ]],                                
     "columns": [{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {

        if(row.default_slider_translation!=null){
          return '<img class="img-fluid" src="{{$base_url}}/storage/app/'+row.default_slider_translation.slider_image+'" style="height:50px;width:100px;" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; >';
        }
      }
    },{ 
      "data": "default_slider_translation.title" 
    },{
      "mData": "status.status_name",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';
      }
    },{
      "data": "default_slider_translation.updated_at" 
    },{

      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {  @if($my_permissions->contains('SLIDER_DETAILS'))
      return '<a href="'+row.slider_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable data-table-button">Details</a>';
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