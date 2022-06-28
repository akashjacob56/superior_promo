@extends('layouts.admin')
@section('content')
<style type="text/css">
  input.input-width{
  width: 300px;
  /*border-radius: 3px;*/
}
select.select-width{
  width: 300px;
  /*border-radius: 3px;*/
}
.small-inpul-len{
  width: 134px;
}

</style>
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





              <!-- Filter Start -------------------------------------->
                <div class="card-block">
                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">ID</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" type="number" name="id" id="search_id" placeholder="ID">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Contact Phone</label></div>
                            <div class="col-8"><input id="search_contact_phone" class="input-width" type="number" name="contact_number" placeholder="Contact Phone"></div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">Email Contains</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="search_email" type="text" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Billing Phone</label></div>
                            <div class="col-8">
                                <input id="search_billing_phone" class="input-width" type="number" name="billing_phone" placeholder="Billing Phone">
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">Company Name</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="search_compony_name" type="text" name="company_name" placeholder="Company Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Shipping Zip</label></div>
                            <div class="col-8">
                                <input class="input-width" id="search_shipping_zip_code" type="number" name="shipping_zip_code" placeholder="Zip">
                                
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-4 text-right">
                              <label class="">User Name</label>
                            </div>
                            <div class="col-8">
                              <input class="input-width" id="search_user_name" type="text" name="user_name" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Creation Date</label></div>
                            <div class="col-4">
                                <input id="search_from_date" class="small-inpul-len" type="date" name="from_date" placeholder="From">
                            </div>

                            <div class="col-4">
                                <input id="search_to_date" class="small-inpul-len" type="date" name="to_date" placeholder="To">
                            </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row"> 
                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Frequency</label></div>
                            <div class="col-8">
                                <select class="select-width" name="frequency" id="search_frequency">
                                  <option selected="" disabled="">Frequency</option>
                                  <option value="today">Today</option>
                                  <option value="3">Last 3 Days</option>
                                  <option value="5">Last 5 Days</option>
                                  <option value="7">Last 7 Days</option>
                                  <option value="14">Last 14 Days</option>
                                  <option value="30">Last 30 Days</option>
                                  <option value="60">Last 60 Days</option>
                                  <option value="90">Last 90 Days</option>
                                </select>
                            </div>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-4 text-right"><label class="">Activity</label></div>
                            <div class="col-8">
                                <select class="select-width" name="activity" id="search_activity" disabled="">
                                  <option selected="" disabled="">Activity</option>
                                  <option value="1">Active Only</option>
                                  <option selected="" value="2">Inactive Only</option>
                                </select>
                            </div>
                      </div>
                    </div>



                  </div>
                  <!-- Row End -->

                  <!-- row start -->
                  <div class="row search-row">
                    <div class="col-6">
                        
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-12 text-right">
                          <button type="button" class="btn btn-secondary search-filter-button">Search</button>
                          <button type="button" class="btn btn-secondary reset-filter-button">Reset</button>
                          <button type="button" class="btn btn-secondary clear-filter-button">Clear</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- row end -->

                </div>
                <!-- Filter End ------------------------------------>


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


    'use strict';
    function customer_function(id,contact_number,email,billing_phone,company_name,shipping_zip_code,user_name,from_date,to_date,frequency,activity){
    $(function(){
      $('#footer-search').DataTable( $.extend( {     
      "ajax": {
        url: "all-InActiveData?id="+id+"&contact_number="+contact_number+"&email="+email+"&billing_phone="+billing_phone+"&company_name="+company_name+"&shipping_zip_code="+shipping_zip_code+"&user_name="+user_name+"&from_date="+from_date+"&to_date="+to_date+"&frequency="+frequency+"&activity="+activity,
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


    });


  }

  customer_function();
    
</script>


<script type="text/javascript">
  //Filter Search ,Reset & Cancel
  $(document).ready(function(){
      $('.search-filter-button').on('click',function(){

        var id = $('#search_id').val();
        var contact_number = $('#search_contact_phone').val();
        var email = $('#search_email').val();
        var billing_phone = $('#search_billing_phone').val();
        var company_name = $('#search_compony_name').val();
        var shipping_zip_code = $('#search_shipping_zip_code').val();
        var user_name = $('#search_user_name').val();
        var from_date = $('#search_from_date').val();
        var to_date = $('#search_to_date').val();
        var frequency = $('#search_frequency').val();
        var activity = $('#search_activity').val();

        $("#footer-search").DataTable();
        $("#footer-search").DataTable().clear();
        $("#footer-search").DataTable().destroy();

        customer_function(id,contact_number,email,billing_phone,company_name,shipping_zip_code,user_name,from_date,to_date,frequency,activity);
      });

       //Reset filter
      $('.reset-filter-button').on('click',function(){

          $('#search_id').val('');
          $('#search_contact_phone').val('');
          $('#search_email').val('');
          $('#search_billing_phone').val('');
          $('#search_compony_name').val('');
          $('#search_shipping_zip_code').val('');
          $('#search_user_name').val('');
          $('#search_from_date').val('');
          $('#search_to_date').val('');
          $('#search_frequency').val('');
          

          var id = "";
          var contact_number = "";
          var email = "";
          var billing_phone = "";
          var company_name = "";
          var shipping_zip_code = "";
          var user_name = "";
          var from_date = "";
          var to_date = "";
          var frequency = "";
          var activity = $('#search_activity').val();
          $("#footer-search").DataTable();
          $("#footer-search").DataTable().clear();
          $("#footer-search").DataTable().destroy();
          customer_function(id,contact_number,email,billing_phone,company_name,shipping_zip_code,user_name,from_date,to_date,frequency,activity);
      });

      $('.clear-filter-button').on('click',function(){
          $('#search_id').val('');
          $('#search_contact_phone').val('');
          $('#search_email').val('');
          $('#search_billing_phone').val('');
          $('#search_compony_name').val('');
          $('#search_shipping_zip_code').val('');
          $('#search_user_name').val('');
          $('#search_from_date').val('');
          $('#search_to_date').val('');
          $('#search_frequency').val('');
      });
  });

</script>s



@endsection
