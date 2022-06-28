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
          <li class="breadcrumb-item">
            <a>Product Enquiry</a>
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
                <h5> Product Enquiry</h5>
                <span class="upper-buttons pull-right">

                </span>
                <span class="text-muted">You can view all enquiry related to products .</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>

                        
                        <th>Contact no.</th>
                       
                        <th>Email</th>
                        
                        <th>Product Name</th>
                        <th>Quanity</th>
                        <th>Created At</th>

                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>

                       
                        <th>Contact no.</th>
                       
                        <th>Email</th>
                        
                       
                        <th>Product Name</th>
                        <th>Quanity</th>
                        <th>Created At</th>
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

  $(document).ready(function() {
    $('#footer-search').DataTable( $.extend( {     
      "ajax": {
        url: "allProductEnquiryData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "asc" ]],                                
      "columns": [{
        "data": "user.name",
      },
      { 
        "data": "user.contact_number" 
      }
      ,
      { 
        "data": "user.email" 
      },
      
      
      {
       "mData": "product.default_product_translation_full",
       "bSortable": false,
       "ilter":false,
       "mRender": function(data, type, row) {

        if (row.product != null) {
          return row.product.default_product_translation_full.product_name;
        }
        else{
          return "-";
        }
      }
    },{ 
      "data": "quantity" 
    },{ 
      "data": "created_at" 
    }]
  }, dataTableDesign) );
  } );
</script>

@endsection