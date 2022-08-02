@extends('layouts.admin')
@section('content')

 @php 

 @endphp
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<style type="text/css">
  /*.modal-backdrop {
    position: absolute !important;

}*/
.hidden{
  display: none !important;
}

input[type=checkbox]{
    margin: 4px 0px 5px 0 !important;
}

  .search-row{
      margin-bottom:5px;
  }

input.input-width{
  width: 300px;
  /*border-radius: 3px;*/
}

select.select-width{
  width: 300px;
  /*border-radius: 3px;*/
}
/*.modal.fade.show{
  display: block;
}
*/
.modal {
  background: rgba(0, 0, 0, 0.5); 
}
.modal-backdrop {
  display: none;
}
.modal-backdrop {
  position: fixed;
  z-index: -1 !important;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #000000;
}
.small-inpul-len{
  width: 134px;
}
</style>

<style type="text/css">
.all-button-div{
    padding-top: 20px;
}

.all-button-div>i{
    color: deepskyblue;
    font-size: 30px;
    width: 50px;
}

.admin-modal{
    width: 950px;
    right: 202px;
    top: 25px;
}

.border-text{
    border: solid 1px !important;
}

 .btn-stage{
    width: 150px;
    height: 40px;
    background-color: #F0F0F0;
    border-color: #EAEAEA;
    border: solid 0px #F0F0F0;
}

.note-table{
    overflow: scroll;
}


.head-color{
    background: #6bd1fc;
}

.note-editor .note-toolbar>.note-btn-group, .note-popover .popover-content>.note-btn-group {
    margin-top: 5px;
    margin-left: 0;
    margin-right: 5px;
    overflow: visible;
}


.short_divider {
        margin: 0 0 0.2rem;
        width: 100%;
    }


.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    width:100%;
    max-width: 100%;
    padding: 25px;
    border-radius: 3px;
    transition: 0.2s
    background: #F8F8F8;
    border: 5px dashed #DDD;
    height: 150px;
    text-align: center;
    padding-top: 55px;
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

img.admin-thumbnail {
    width: 80px;
    height: 80px;
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0
}

.mt-100 {
    margin-top: 100px
}

.input-width{
    width: 100%;
}


input.art_proof_request_checkbox{
  margin-left: -15px !important;
}

  .color_orange{
    background-color: rgb(255, 130, 130) !important;
  }

  p.paid-unpaid-status{
                            border:1px solid #337ab7;background-color: #337ab7; width: 20px;height: 24px;color: white;font-weight: 500;font-size:16px;text-align: center;
                          }

  .note-editable p{
    margin-top: 38px !important;
  }
</style>

<!-- for summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- for summernote -->

  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#summernote2').summernote();
        $('.summernote').summernote();
    });
  </script>



  <script type="text/javascript">
$(document).on('change', '.file-input', function() {
var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
});
  </script>
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
            <a>Order Detail</a>
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
                  <h4 >Order #{{$order->id}}</h4>
                  <span class="text-muted">You can view all orders, Process order, as well as print invoices slip for orders placed from your online business store.</span>
                </div>

               

                

              

                <style type="text/css">
                  #footer-search{
                    /*border: 1px solid black;*/
                  }
                  select.production_stage_select_box{
                        padding: 0px 12px;
                  }
                  input.stage_management_input_checkbox{
                    margin-left: -15px !important;
                  }

                </style>















                <!-- <div class="card-block">
                	<div class="row search-row">
                		<div class="col-6">
                			<table>
                				<thead>
                					
                				</thead>
                				<tbody>
                					<tr>
                						
                						<td>jsdfj</td>
                					</tr>
                				</tbody>
                			</table>
                		</div>

                		<div class="col-6">
                			xdfdsf
                		</div>
                	</div>
               	</div>
 -->




                            
                  
                
                <!-- Filter Start -------------------------------------->
                <div class="card-block">

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                              <label class="">Order Date</label>
                            </div>
                            <div class="col-6">
                             <p> <?php echo date("m-d-Y H:i:s", strtotime($order->created_at)); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Product Total</label></div>
                            <div class="col-6">
                            	{{$order->total_price}}
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                              <label class="">Customer</label>
                            </div>
                            <div class="col-6">
                              <p>
                              	@if($order->user!="")
                              		{{$order->user->name}}
                              	@endif
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Discount Amount</label></div>
                            <div class="col-6">
                                <p>{{$order->discount_amount}}</p>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                              <label class="">Customer ID</label>
                            </div>
                            <div class="col-6">
                              <p>{{$order->user_id}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Billed Total</label></div>
                            <div class="col-6">
                                <p>{{$order->total_price}}</p>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                              <label class="">CIM Profile ID</label>
                            </div>
                            <div class="col-6">
                              <p>-</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Discount Used</label></div>
                            

                            <div class="col-6">
                                <p>
                                	@if($order->discount_id!="")
                                		Yes
                                	@else
                                		None
                                	@endif
                                </p>
                            </div>
                        
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Customer Email</label></div>
                            <div class="col-6">
                                <p>
                                	@if($order->user!="")
                                		{{$order->user->email}}
                                	@endif
                                </p>
                            </div>
                      </div>
                    </div>  
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Payment Type</label></div>
                            <div class="col-6">
                                <p>No</p>
                            </div>
                      </div>
                    </div>
                  </div>
                  <!-- Row End -->

                  <!-- Row Start -->
                  <div class="row search-row">
                    <div class="col-6">
                      <div class="row">
                        <div class="col-6"><label class="">Tax Exemption Document</label></div>
                            <div class="col-6">
                                <p>Tax ext</p>
                            </div>
                      </div>
                    </div>  
                  </div>
                  <!-- Row End -->
                </div>
                <!-- Filter End ------------------------------------>



                <!-- Shipping and Billing Address Start -->

                <div class="card-block">
                	
                	<div class="row search-row">


                		<!-- Shipping Address Start -->
                    	<div class="col-6">
                    		<h5 class="font-weight-bold">Shipping Address</h5>
                    		<p>
                    			{{$order->shipping_first_name}} {{$order->shipping_last_name}} <br>
                    			{{$order->shipping_address_line_1}} <br>
                    			{{$order->shipping_city}}, {{$order->shipping_state}},<br> {{$order->shipping_country}}, 
                    			{{$order->shipping_zip}}
                    		</p>
                    	</div>
                    	<!-- Shipping Address End -->
                    	<!-- Billing Address Start -->
                    	<div class="col-6">
                    		<h5 class="font-weight-bold">Billing Address</h5>

                    		<p>
                    			{{$order->billing_first_name}} {{$order->billing_last_name}} <br>
                    			{{$order->billing_address_line_1}} <br>
                    			{{$order->billing_city}}, {{$order->billing_state}},<br> {{$order->billing_country}}, 
                    			{{$order->billing_zip}}
                    		</p>
                    	</div>
                    	<!-- Billing Address End -->

                	</div>

                </div>

                <!-- Shipping and Billing Address End -->

                <!-- Order Contents Start -->
                	
 <style type="text/css">
 	#footer-search th.info{
 		    background-color: #d9edf7;
 		    color: #09486b;
 	}

 	#footer-search tbody tr td{
 		border:1px solid #d9edf7;
 	}

 </style>
                	 <div class="card-block">
                	 	<h5 class="font-weight-bold">Order Contents</h5>
                  <div class="dt-responsive table-responsive">
                    <table id="footer-search" class="table nowrap">
                      <thead>
                        <tr>
                          		<th class="info">Reference #</th>
                				<th class="info">Product</th>
                				<th class="info">In Hand Date</th>
                				<th class="info">Shipping Cost</th>
                				<th class="info">Price</th>
                				<th class="info">Actions</th>
                         
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      
                    </table>
                  </div>
                </div>
                <!-- Order Contents End -->


                <div class="card-block">
                	<h5 class="font-weight-bold">Shipp To Multiple Locations Notes</h5>
                	@if($order->multiple_location_comment!="")
                		<?php echo $order->multiple_location_comment; ?>
                	else
                		empty
                	@endif
                </div>




              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>







<script type="text/javascript">

  'use strict';
  $(document).ready(function() {
   $('#footer-search').DataTable($.extend( {
   	responsive: true,
    "ajax": {
      url: "/admin/order/allItemsData?order_id={{$order->id}}",
      type: "GET",
      contentType: "application/json;charset=UTF-8",
      dataType: "json",
    },
    "order": [[ 0, "asc" ]],
    "columns": [

    {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
       
        return row.order_id+' S '+row.id;
        
    }
},

    {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
        return "<p class='d-inline-block'>"+row.product.product_translation.product_name+"</p>&nbsp;&nbsp;&nbsp;<img class='img-fluid admin-thumbnail d-inline-block' src='/storage/app/"+row.product.product_image+"'/>&nbsp;&nbsp;&nbsp; <p class='d-inline-block'>(Item #"+row.product.product_id+")</p>";
    }
},

    { 
        "data": "received_date" 
      },{ 
        "data": "shipping_price" 
      },

      {
      	"data": "price"
      },
      {
      
      "bSortable": false,
      "ilter":false,
      "mRender": function(data, type, row) {
       
        return '<a href="/admin/product/'+row.product_id+'"><button class="btn btn-primary waves-effect waves-light js-programmatic-disable data-table-button"><i class="voyager-edit"></i>Edit</button></a>';
        
      }
    }

    ]
  },dataTableDesign)) ;
 });
</script>




                      
                      
                      
            

@endsection
