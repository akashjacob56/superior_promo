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
            <a>Vendors</a>
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
                <h5>Vendors</h5>
                <span class="upper-buttons pull-right">

                  <a href="add-vendor" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right"> Add Vendor
                    </button>
                  </a>
              

                </span>
                <span class="text-muted">You can view all customers details, add and modify customer details using selected part of your online business .</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <!-- <th>Sage Id</th> -->
                        <th>Name</th>
                        <th>Status</th>
                        <th>Contact no.</th>
                        <th>Email</th>

                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <!-- <th>Sage Id</th> -->
                        <th>Name</th>
                        <th>Status</th>
                       
                        <th>Contact no.</th>
                        
                       
                        <th>Email</th>
                      
                        <th>Created At</th>
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

  $(document).ready(function() {
    $('#footer-search').DataTable($.extend({     
      "ajax":{
        url: "all-vendordata",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "asc" ]],                                
      "columns": [

/*      {
        "data": "sage_id"
      },*/
      {
        "data": "name"
      },    
      {
        "mData": "status.status_name",
        "bSortable": false,
        "ilter":false,
        "mRender": function(data, type, row) {
          return '<span class="label label-'+row.status.status_class+'">'+row.status.status_name+'</span>';  
        }
      },

      { 
        "data": "contact_number" 
      }
      ,
    
      { 
        "data": "email" 
      },
  
    { 
      "data": "created_at" 
    },
    {
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { 
        var button="";
        
        return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a> ' + button;
      }
    },
    ]
  }, dataTableDesign) );
  } );
</script>

@endsection
