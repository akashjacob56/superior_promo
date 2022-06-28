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
            <a>Active Customers</a>
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
                <h5> Active Customers</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CUSTOMER_ADD'))
                  <a href="add" class="pull-right">
                    <button type="button" class="btn btn-primary waves-effect waves-light add pull-right">   Add customer

                    </button>
                  </a>
                  @endif
                </span>
                <span class="text-muted">You can view all customers details, add and modify customer details using selected part of your online business .</span>

              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="footer-search" class="table nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Status</th>
                       
                        <th>Contact no.</th>
                       
                        <th>Email</th>
                     
                        <th>Orders</th>
                        <th>Last order</th>
                      
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Status</th>
                       
                        <th>Contact no.</th>
                        
                       
                        <th>Email</th>
                       
                       
                       
                        <th>Orders</th>
                        <th>Last order</th>
                      
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
    $('#footer-search').DataTable( $.extend( {     
      "ajax": {
        url: "all-InActiveData",
        type: "GET",
        contentType: "application/json;charset=UTF-8",
        dataType: "json",
      },
      "order": [[ 0, "asc" ]],                                
      "columns": [{
        "data": "name"
      },{
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
       "mData": "order_count.order_count",
       "bSortable": false,
       "ilter":false,
       "mRender": function(data, type, row) {

        if (row.order_count != null) {
          return row.order_count.order_count;
        }
        else{
          return "-";
        }
      }
    },{
      "mData": "order_count.order_date",
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        if ( row.order_count != null) {
          return row.order_count.order_date;
        }else{
          return "-";
        }
      }
    },
    { 
      "data": "created_at" 
    },
    {
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) { 
        var button="";
      /*  @if($my_permissions->contains('CREATE_ORDER'))
        if(row.status_id==1){
          button='<a href="{{$base_url}}/admin/create-order/'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Create Order</button></a> ';
        }
        @endif*/
        @if($my_permissions->contains('CUSTOMER_DETAILS'))
        return '<a href="'+row.id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Details</button></a> ' + button;
        @else
        return "-";
        @endif
      }
    },
    ]
  }, dataTableDesign) );
  } );
</script>



@endsection