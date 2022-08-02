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
            <a>Reviews </a>
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
                <h5> Revies</h5>

                <span class="text-muted">You can view all Reviews here.</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                         <th>Rating</th>
                        <th>Review</th>
                         <th>Approve</th>
                        <th>Created_at</th>
                        <th>Action</th>                    
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>Product Id</th>
                       <th>Product Name</th>
                        <th>Rating</th>
                       <th>Review</th>
                        <th>Disabled</th>
                       <th>Created_at</th>
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
      "ajax": "/admin/review/allData",
      "order": [[ 0, "asc" ]],                     
      "columns": [{
        "data": "product.product_id",
      },{
        "data": "product_translation.product_name",
      },{
        "data": "rating",
      },{
        "data": "review",
      },{
    "targets":-1,
    
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) { 

       if(row.is_approved==0){
          return '<a href="approve/'+row.review_id+'"><button class="btn btn-success waves-effect waves-light js-programmatic-disable data-table-button">Approve</button></a>';
        }else{
          return '<span style="font-weight:700;color:green;">Approved</span>';
        }
      }
},
      { 
       "mData":"created_at",
       "bSortable": false,
       "ilter":false,
       "mRender": function(data, type, row) {

        return row.created_at;
      }
    },

    {
    "targets":-1,
    
    "bSortable": false,
    "ilter":false,
    "mRender": function(data, type, row) { @if($my_permissions->contains('BRAND_DETAILS'))
    return '<a href="'+row.review_id+'"><button class="btn btn-danger waves-effect waves-light js-programmatic-disable data-table-button">Delete</button></a>';
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