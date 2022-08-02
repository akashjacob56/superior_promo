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
            <a href="all">Order's</a>
          </li>
          <li class="breadcrumb-item">
            <a>Order Logs </a>
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
                <h5> Order Logs</h5>

                <span> You can view all order logs here.</span>

              </div>


              <div class="col-md-12 ">
                <div class="form-group" style="margin-top:20px;">
                  <div class="col-md-4 form-group no-padding-right">
                    <div class="form-control" id="datereportrange" style="background: #fff; cursor: pointer; width: 100%">
                      <i class="fa fa-calendar"></i>&nbsp;
                      <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                  </div>



                  <div class="col-md-1 form-group"">
                    <button id="search" class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button">Submit</button>

                  </div>
                 

                  </div>
                </div>
                <div class="card-block">
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                         
                          <th>Order status</th>
                          <th>Status changed by</th>
                          <th>Date & Time</th>               
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <tr>
                         <th>Order ID</th>
                        
                         <th>Order status</th>  
                         <th>Status changed by</th>
                         <th>Date & Time</th>   
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




    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#datereportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#datereportrange').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);

    cb(start, end);

    




    function orderLogData(){
      var startDate = $('#datereportrange').data('daterangepicker').startDate._d;
      var endDate = $('#datereportrange').data('daterangepicker').endDate._d;
      var date_from=moment(startDate).format("YYYY-MM-DD");
      var date_to=moment(endDate).format("YYYY-MM-DD");
      status=$("#status").val();


     
      
      payment_mode=$('#payment_mode').val();
      source=$('#source').val();
      'use strict';
      $('#footer-search').DataTable( $.extend({      
        "ajax": {
          url: "logData?date_from="+date_from+"&date_to="+date_to,
          type: "GET",
          contentType: "application/json;charset=UTF-8",
          dataType: "json",
        },
        "order": [[ 0, "desc" ]],                                
        
        "columns": [{ 
          "data": "order_id" 
        },{ 
          "data": "order_log" 
        },{ 
          "mData": "user.name",
          "bSortable": false,
          "ilter":false,
          "mRender": function(data, type, row) {
            if(row.user.name!=null){
             return row.user.name;
           }else{
            return '<span class="">User Id-'+row.status_changed_by+'</span>';
          }
        }

      },{ 
        "data": "created_at" 
      }]
    },dataTableDesign) );
    }

    orderLogData();
    $("#search").click(function(){
      dataTable=$("#footer-search").DataTable();
      dataTable.clear();
      dataTable.destroy();
      orderLogData();
    });
    

  } );

</script>
</script>

<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
@endsection