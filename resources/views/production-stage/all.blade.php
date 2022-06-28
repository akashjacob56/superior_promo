@extends('layouts.admin')
@section('content')

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
                <h5> Production Stage</h5>
                <span class="upper-buttons pull-right">
                
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add Production

                    </button>
                  </a>
              
                </span>
                <span class="text-muted">You can view all Production Stages here, good brands improves the conversions of Production Stages. add and modify a new Production Stages of the required type and representation to a selected part of your on-line store. </span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Production name</th>
                        <th>Created_at</th>
                        <th>Last updated on</th>
                        <th>Action</th>                    
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                   <!--  <tfoot>
                      <tr>
                       <th>Brand</th>
                       
                       <th>Disabled</th>
                      
                       <th>Created_at</th>
                       <th>Last updated on</th>
                       <th>Disabled</th>
                     </tr>
                   </tfoot> -->
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
        "data": "name",
      },
     
      // {
        
      //   "bSortable": false,
      //   "ilter":false,
      //   "mRender": function(data, type, row) {
         
      //     return '<img class="img-fluid" src="{{$base_url}}/storage/app/'+row.default_brand_translation.brand_image+'" style="height:50px;width:100px;" onerror=this.src="{{$base_url}}/files/assets/images/product.png";>';
      //   }
      // },

      { 
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
    "mRender": function(data, type, row) {
    return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a>';
    
  }
}]
},dataTableDesign));
  });
</script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection