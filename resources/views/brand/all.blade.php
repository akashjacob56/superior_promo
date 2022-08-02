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
                <h5> Brands</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('BRAND_ADD'))
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Brand

                    </button>
                  </a>
                  @endif
                </span>
                <span class="text-muted">You can view all Brands here, good brands improves the conversions of products. add and modify a new brand of the required type and representation to a selected part of your on-line store. </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Brand</th>
                       
                        <th>Brand Featured Image</th>
                       
                        <th>Created_at</th>
                        <th>Last updated on</th>
                        <th>Action</th>                    
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>Brand</th>
                       
                       <th>Disabled</th>
                      
                       <th>Created_at</th>
                       <th>Last updated on</th>
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
      "ajax": "allData", 
      "order": [[ 0, "asc" ]],                     
      "columns": [{
        "data": "default_brand_translation.brand_name",
      },
     
      {
        
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
         
          return '<img class="img-fluid" src="/storage/app/'+row.default_brand_translation.brand_image+'" style="height:50px;width:100px;" onerror=this.src="/files/assets/images/product.png";>';
        }
      },{ 
       "mData":"created_at",
       "bSortable": false,
       "ilter":false,
       "mRender": function(data, type, row) {
         
        return row.created_at;
      }
    },

    { 
     "mData":"updated_at",
     "bSortable": false,
     "mRender": function(data, type, row) {
       
      return row.updated_at;
    }
  },{
    "targets":-1,
    
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) { @if($my_permissions->contains('BRAND_DETAILS'))
    return '<a href="'+row.brand_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
    @else
    return "-";
    @endif
  }
}]
},dataTableDesign));
  });
</script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection