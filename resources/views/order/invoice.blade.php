@extends('layouts.admin')
@section('content')

@php
$total=0;
$gst_total=0;
$gst_total_amount=0;
$sgst_total_amount=0;
$cgst_total_amount=0;
$gst_total_net_amount=0;
$total_quantity=0;
@endphp


<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
<style type="text/css">

 .product_name { 
   display: block;
   word-wrap:break-word;
   width: 200px;
   white-space: normal;
 }
 .heading{
  display: contents;
  padding: 20PX;
  margin: 20px;
}
.histories{
  display: none;
}
.logo-image-header{
  display: inline-block;
  max-height: 60px;
  max-width: 200px;
}


td p b,td p{
  font-size: 12px !important;
  margin-bottom: 5px !important;
}

.table td, .table th{
  padding: 5px 0px !important;
}

td{
  font-size: 12px !important;

}

td span{
  font-size: 11px !important;
}
.invoice-data-content .card .card-block p {
  line-height: 1.99 !important;
}
.invoive-info h6{
  margin-bottom: 7px;
}
p{
  margin-bottom: 0px !important;
}

hr{
  margin-bottom: 5px !important;
  margin-top: 5px !important;
}
.invoive-info{
  margin-bottom: 10px;
}


.left-div{
  padding-left: 0px !important;
}

.right-div{
  padding-right: 0px !important;
}

.mobile-responsive{
  padding-bottom: 0px !important;
}



.invoice-total{
  padding: 15px 0px !important;
}








@media print{ 

.pcoded-inner-content{
    margin-top:-70px !important;
    margin-bottom:-40px !important;
}
  .right-div p{
    font-size: 12px !important;
  }
.invoice-total{
    padding:0px !important;
    margin-bottom:0px !important;
}
  .invoice-total tbody{
    padding-right: 0px !important;
  }

  .no-padding-print{
    padding: 0px !important;
  }

  .card{
    border: none !important;
  }

  .left-div{
    padding-left: 0px !important;
  }

  .right-div{
    padding-right: 0px !important;
  }


  .card .card-block table tr{
    padding-bottom: 0px !important;
  } 

  .tag_line{
    font-size: 10px !important;
  }
  p{
    margin-bottom: 0px !important;
  }


  .invoive-info h6{
    margin-bottom: 7px !important;
  }



  td p b{
    font-size: 10px !important;
    margin-bottom: 5px !important;
  }

  td p{
    font-size: 10px !important;
    margin-bottom: 5px !important;
  }

  .table th{
    padding: 5px 0px !important;
  }
  
  .table td{
    padding: 1.5px 0px !important;
  }

  td{
    font-size: 12px !important;

  }

  td span{
    font-size: 9px !important;
  }


  .fixed .content-wrapper, .box-layout .content-wrapper{
    margin-top: 0px !important;

  }
  .product_name { 
   display: block;
   word-wrap:break-word;
   width: 250px;
   white-space: normal;
 }
 .invoice-data-content .card .card-block p {
  line-height: 1.5 !important;
}
.no-print{
  display: none !important;
}
.order-date{
  font-size: 8px !important;
}
.order-status{
 font-size: 10px !important;
 font-weight: bold !important;
}
table{
  padding: 0 !important;
  width: 100% !important;
}

table tr{
 width: 100% !important; 
}

#printable{
 line-height: 1!important;
}
.logo-image-header{
 max-width: 100px;
 max-height: 40px;
}
.invoice-client-info{
  line-height: 1 !important;
  font-size:10px !important;
}
.invoice-client-info > h6{
  font-size: 10px ;
}
.invoice-client-info > p{
  line-height: 1 !important;
  font-size: 10px !important;
  margin-bottom: 0.2 !important;
}
.margin{
  margin-top:1px;
}
.invoive-info{
  margin-bottom: 10px;
}
 /* table { page-break-inside:auto !important}
  tr    { page-break-inside:avoid !important; page-break-after:auto !important }

  thead { display: table-header-group !important}
  tfoot { display: table-row-group !important }*/

 /* table { page-break-inside:auto !important; }
  tr    { page-break-inside:avoid; page-break-after:auto !important; }
  thead { display:table-header-group !important;  }
  tfoot { display:table-footer-group !important;  }

  thead>.table-break{
    line-height: 1;
    font-size: 10px !important;
  }*/

  .col-md-4{
    width: 33.33% ;
  }

  .col-md-6{
    width: 50%;
  }

  .col-md-8{
    width: 65%;
  }

  p.margin-bottom{
    margin-bottom: 8px !important;
  }

  .pcoded[theme-layout="vertical"][vertical-placement="left"][vertical-nav-type="expanded"][vertical-effect="shrink"] .pcoded-content{
    margin-left: 0px !important;
    margin-right: 0px !important;
    margin-bottom: 0px !important;
  }
  .pcoded-inner-content{
    width: 100% !important;
  }

  #term-condition{
    font-size: 10px !important;

  }
  .table td {
   border-top: none !important;  
 }
 .table td p{
  font-size: 10px !important;
  margin-bottom: 0px !important;
}


td {
  font-size: 10px !important;
}
th{
  font-size: 10px !important;
}
.product_name{

  margin-top:1px;
  font-size: 9px !important;
}
.heading{
  line-height: 1 !important;
  margin: 0px;
}
}

#cancel-order-button, .order-attachment-button {
  border: 1px solid #a09898;
  background-color: #ffffff;
}
</style>

<div class="page-header no-print">
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
          <li class="breadcrumb-item"><a href="all">Orders</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Order details</a>
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
        <div class="row invoice-data-content" >
          <div class="col-sm-12">
            @if($order->delivery_status_id!=2)
            <div class="card no-print">
              <div class="invoice-contact hidden-print invoice-data-content">          
                <div class="col-md-12">
                  @if($order->payment_status_id!=3)
                  @if($my_permissions->contains('ORDER_UPDATE'))
                  <a href="paid/{{$order->order_id}}"><button type="button" class="btn btn-info waves-effect waves-light">Mark as Paid 
                  </button></a>
                  @if($order->delivery_status_id==3)
                  <button id="history-show" class="btn btn-primary no-print pull-right">Order Histories</button>
                  @endif
                  @endif
                  @endif
                
                  @if($order->delivery_status_id!=3)
                  @if($my_permissions->contains('ORDER_UPDATE'))
                  <a href="other/{{$order->order_id}}/3"><button type="button" class="btn btn-success waves-effect waves-light">Mark as Delivered
                  </button></a>
                  @endif

                 <!--  @if($my_permissions->contains('ORDER_UPDATE'))
                  <a href="paidDelivered/{{$order->order_id}}"><button type="button" class="btn btn-success waves-effect waves-light"> Mark as Delivered & Paid
                  </button></a>
                  @endif -->

                  @if($my_permissions->contains('ORDER_UPDATE'))
                  @if($order->delivery_status_id==1 || $order->delivery_status_id==6)  
                  @php
$getuser=Auth::user();
$role_id=$getuser->role_id;
@endphp
                 @if($role_id!=5 && $role_id!=6)
                  <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#exampleModalCenter">
                    Cancel Order
                  </button>
@endif
                  <div class="col-sm-12" >
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <form class="w-100" action="cancel/{{$order->order_id}}/2" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #eee;">
                              <h5 class="modal-title" id="exampleModalLongTitle">Cancel Order</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <h6> Please give Reason for cancellation...!</h6>

                              <div class="form-group">
                                <textarea name="cancel_reason" class="form-control unicase-form-control " id="cancel_reason" value="{{ old('cancel_reason') }}" placeholder="Please give cancellation reason.." rows="2" required></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button style="float: right;" type="submit" class="btn btn-danger waves-effect waves-light" id="cancel_order">Cancel Order 
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  @endif
                  @endif

                  <div class="dropdown-primary dropdown">
                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Others
                    </button>
                    <div class="dropdown-menu" id="dd" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                    </div>
                  </div>
                  @if($order->delivery_status_id!=2 && $order->delivery_status_id!=3)
                  <button id="history-show" class="btn btn-primary no-print">Order Histories</button>
                  @endif
                  <!-- delivery  vendor -->
                                    
                  @if(count($delivery_vendors)!=0)
                  <div class="dropdown-primary dropdown">
                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delivery Vendors
                    </button>
                    <div class="dropdown-menu" id="delivery-vendors" aria-labelledby="dropdown2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                      @foreach($delivery_vendors as $delivery_vendor)
                      <a class="dropdown-item waves-light waves-effect" href="delivery-vendor/{{$order->order_id}}/{{$delivery_vendor->delivery_vendor_id}}">
                       @if($order->delivery_vendor_id==$delivery_vendor->delivery_vendor_id)
                       <i class="fa fa-check-square-o" aria-hidden="true"></i>
                       @else
                       <i class="fa fa-square-o" aria-hidden="true"></i>
                       @endif
                       {{$delivery_vendor->delivery_vendor_name}} </a>
                       @endforeach
                     </div>
                   </div>
                   @endif

                  
                   <div class="dropdown-primary dropdown">
                    <input id="tracking_number" type="text" name="tracking_number" value="{{old('tracking_number')}}" class="form-control thresold-i" placeholder="Tracking Number" >
                    @if ($errors->has('tracking_number'))
                    <span class="help-block">
                      <strong>{{ $errors->first('tracking_number') }}</strong>
                    </span>
                    @endif
                  </div>
                 
                  <div class="dropdown-primary dropdown">
                   <button class="btn btn-primary waves-effect waves-light " type="submit" id="tracking_number_save">Save
                   </button>
                 </div> 
                


                 <!-- end delivry  vendor -->

                         @if($order->delivery_status_id==5)
                  @if($my_permissions->contains('ORDER_UPDATE'))
                  <br>
                  <a href="other/{{$order->order_id}}/7"><button type="button" class="btn btn-success waves-effect waves-light" style="margin-top: 10px;">Money Refund
                  </button></a>
                  <a href="other/{{$order->order_id}}/8"><button type="button" class="btn btn-danger waves-effect waves-light" style="margin-top: 10px;">Return Cancel
                  </button></a>
                  @endif
                   @endif

                 @endif
               </div>

             </div>

          </div>
          @endif
          @if($order->delivery_status_id==2)
          <div class="card no-print">
            <div class="invoice-contact hidden-print invoice-data-content">          
              <div class="col-md-12">
                <button id="history-show" class="btn btn-primary mb-4 no-print pull-right">Order Histories</button>

              </div>
            </div>
          </div>
          @endif


          <div class="card histories no-print">
            <div class="card-block">
              <div class="dt-responsive table-responsive">
                <table id="footer-search" class="table nowrap">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Global order</th>
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
                     <th>Global order</th>
                     <th>Order status</th>  
                     <th>Status changed by</th>
                     <th>Date & Time</th>   
                   </tr>
                 </tfoot>
               </table>
             </div>
           </div>
         </div>

         <div class="card">
          <div class="card-block no-padding-print">
            <div class="row">
              <div class="col-md-6 no-padding-print">
                <img class="img logo-image-header pull-left no-padding-print" src="{{$base_url}}/swaas/images/logo.png"/>
               
              </div>
              <div class="col-md-6 no-padding-print" align="right">
                <p class="margin-bottom">Order ID : <b>{{$order->order_id}}</b>  <span class="label label-warning order-status no-print" style="background-color:{{$order->delivery_status->delivery_status_color}}">{{$order->delivery_status->default_delivery_status_translation->delivery_status_name}}</span>
                  @if($order->tracking_number!="")
                  <p>Order Tracking No : {{$order->tracking_number}}</p>
                  @endif
                  @if($order->delivery_vendor_id!=1)
                  <p>Delivery Vendor : <span class="label" style="background-color:#4ac9ff;font-size: 12px;">{{$order->delivery_vendor->delivery_vendor_name}}</span></p>
                  @endif
                  <p>{{$order->created_at}}</p>
                </div>
              </div>
            </div>
            <hr>

            <div class="card-block" id="printable">
              <div class="">
                <div class="row invoive-info" >
                  <div class="col-md-6 col-xs-12 invoice-client-info no-padding-print">
                    <h6>Seller Information</h6>
                    @if($seller!="")
                    <p>{{$seller->address->name}}</p>
                    <p>{{$seller->address->address}}</p>
                    <p>{{$seller->address->pincode->pincode}}</p>
                    <p>{{$seller->email}}</p>
                    <p>{{$seller->contact_number}}</p>
                     <p>GSTIN-33AACCB6689D1ZP</p>

                    
                    @endif
                  </div>

                  <div class="col-md-6 col-xs-12 invoice-client-info no-padding-print" align="right">
                    <h6>Customer Information</h6>
                    <p>{{$order->name}}</p>


                    <?php
                    $contact_number=$order->delivery_contact_number;
                    $email=$order->delivery_email;

                    if($contact_number==$email){
                      $contact_number="";
                    }
                    ?>
                    @if($email!="")
                    <p>{{$email}}</p>
                    @endif 


                    @if($contact_number!="")
                    <p>{{$contact_number}}</p>
                    @endif

                    @php
                    $string=$order->delivery_address;           

                    @endphp

                    <p>{{$order->delivery_address}},<br> {{$order->city->default_city_translation->city_name}}, {{$order->state->default_state_translation->state_name}} <br>  {{$order->pincode->pincode}}</p>

                    @if($customer!="")
                    <p>{{$customer->gst_number}}</p>
                    @endif 
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12 no-padding-print">
                  <div class="table-responsive">
                    <div class="mobile-responsive">
                      <table class="table">
                        <thead class="thead-default">
                          <tr class="table-break">
                            <th>Orderd Product</th>
                            <th>Qty</th>
                            <th style="text-align: right;">Amt(₹)</th>
                            <?php ?>
                            <th class="gst">SGST</th>
                            <th class="gst">CGST</th>
                            <th class="gst">GST </th>
                            <th style="text-align: right;">Total (₹)</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($order_products as $order_product)
                          <tr>
                            <td>
                              <?php
                              $parent_variant=$order_product->parent_variant->default_variant_option_translation->variant_option_name;
                              $child_variant=$order_product->child_variant->default_variant_option_translation->variant_option_name;
                              $variant=$parent_variant;
                              if($parent_variant!="" && $child_variant!=""){
                                $variant=$parent_variant.", ";
                              }
                              $variant=$variant.$child_variant;
                              if($variant!=""){

                                $variant="(".$variant.")";

                              }
                              ?>
                              <p class="product_name"><b>{{$order_product->product->default_product_translation->product_name}}</b> {{$variant}} 
                               @php

                               $parent_variant_id=$order_product->parent_variant->variant_option_id;
                               $child_variant_id=$order_product->child_variant->variant_option_id;

                               $sku_name=$get_sku->where('parent_variant_id',$parent_variant_id)->where('child_variant_id',$child_variant_id)->where('product_id',$order_product->product_id)->first();

                               @endphp
                                ({{$sku_name->sku_name}})
                              </p>
                              <span>{{$order_product->brand->default_brand_translation->brand_name}}</span>
                            </td>
                            <td>{{$order_product->quantity}}</td>
                            <td align="right">{{number_format($order_product->my_price,2)}}</td>

                            @if($order_product->gst==0)
                            <td class="gst">-</td>
                            <td class="gst">-</td>
                            <td class="gst">-</td>

                            @else

                            <td class="gst">{{(($order_product->my_price*$order_product->quantity)*$order_product->sgst)/100}}</td>
                            <td class="gst">{{(($order_product->my_price*$order_product->quantity)*$order_product->cgst)/100}}</td>
                            <td class="gst">{{(($order_product->my_price*$order_product->quantity)*$order_product->gst)/100}}</td>
                            @endif

                            <?php
                            $total_temp=$order_product->quantity * $order_product->my_price+ (($order_product->my_price*$order_product->quantity)*$order_product->gst)/100;
                            ?>
                            <td align="right">{{number_format($total_temp,2)}}</td>
                          </tr>
                          @php
                          $gst_total=$gst_total+$order_product->gst;
                          $total=$total+$order_product->quantity * $order_product->my_price;
                          $total_quantity=$total_quantity+$order_product->quantity;
                          $gst_total_amount=$gst_total_amount+(($order_product->my_price*$order_product->quantity)*$order_product->gst)/100;
                          $sgst_total_amount=$sgst_total_amount+(($order_product->my_price*$order_product->quantity)*$order_product->sgst)/100;
                          $cgst_total_amount=$cgst_total_amount+(($order_product->my_price*$order_product->quantity)*$order_product->cgst)/100;
                          @endphp

                          @endforeach

                        </tbody>

                    <!--   <tr>
                        <td></td>
                        <td>{{$total_quantity}}</td>
                        <td></td>

                        <td class="gst">&#x20B9;{{$sgst_total_amount}}</td>
                        <td class="gst">&#x20B9;{{$cgst_total_amount}}</td>
                        <td class="gst">&#x20B9;{{$gst_total_amount}}</td>
                        <td>&#x20B9;{{$total+$gst_total_amount}}  </td>
                      </tr> -->
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 no-padding-print">
                <table class="table table-responsive invoice-table invoice-total">
                  <tbody>

                    <tr class="txt-info">

                      <td>
                        <p class="text-primary p-0 m-0">Total: </p>
                      </td>
                      <td>
                        <p class="text-primary p-0 m-0">&#x20B9;{{number_format($total+$gst_total_amount,2)}} </p>
                      </td>

                    </tr>


                    <tr class="gst txt-info">
                      <td>
                        <p class="text-primary p-0 m-0">Taxes: &#x20B9;</p>
                      </td>

                      <td>
                        <p class="text-primary p-0 m-0">{{number_format($gst_total_amount,2)}} </p>
                      </td>



                    </tr>



                    @php
                    $global_total=0;
                    $promocode_discount=0;
                    @endphp

                    @foreach($global_orders as $order)
                    @php
                    $global_total=$global_total+$order->order_amount->total_amount;
                    @endphp
                    @endforeach

                    @php
                    if($discount_applied!=""){
                    $global_total=$global_total-$discount_applied->discount_amount;
                    $promocode_discount=$discount_applied->discount_amount;
                  }
                  @endphp

                  @php

                  $shipping_amount=0;
                  $shipping_amount=$global_order->shipping_amount;
                  if($shipping_amount>0){
                  $global_total=$global_total+$shipping_amount;
                }
                 
                @endphp


                

                

                 @if($shipping_amount>0)
                <tr class="text-info">
                  <td>
                    <p class="text-primary p-0 m-0">Shipping Amount: </p>
                  </td>
                  <td>
                    <p class="text-primary p-0 m-0">&#x20B9;{{number_format($shipping_amount,2)}} </p>
                  </td>
                </tr>

                @endif


                @if($discount_applied!="")
                <tr class="text-info">
                  <td>
                    <p class="text-primary p-0 m-0">Discount: </p>
                  </td>
                  <td>
                    <p class="text-primary p-0 m-0">&#x20B9;{{number_format($promocode_discount,2)}} </p>
                  </td>
                </tr>

                @endif




                <tr class="text-info">
                  <td>
                    <p class="text-primary p-0 m-0">Grand Total: </p>
                  </td>
                  <td>
                    <p class="text-primary p-0 m-0">&#x20B9;{{number_format($global_total,2)}} </p>(Incl.of taxes)

                  </tr>






                </tbody>
              </table>
            </div>
          </div>  
          <!-- @if($terms->count()>0)
          <div class="row">
            <div class="col-sm-12">
              <h6>Terms And Condition :</h6>    
              @foreach($terms as $term)        
              <p id="term-condition" class="text-muted">$term->default_term_condition_translation->term_condition_description</p>       
              @endforeach   
            </div>
          </div>
          @endif -->
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 hidden-print">
    <center>
      @if($my_permissions->contains('ORDER_PRINT'))
      <button type="button" onclick="window.print();" class="btn btn-success waves-effect waves-light m-r-20">Print Invoice
      </button>@endif
    </center>
  </div>
</div>
</div>
</div>
</div>
@if($gst_total_amount==0)
<script type="text/javascript">
  $(".gst").hide();
</script>
@endif

<script type="text/javascript">
 @if($order->delivery_status_id!=3)
 var delivery_statuses=<?php echo json_encode($delivery_statuses);?>;
 $.each(delivery_statuses,function(index,item){

  $("#dd").append('<a class="dropdown-item waves-light waves-effect" href="{{$base_url}}/admin/order/other/{{$order->order_id}}/'+item.delivery_status_id+'">'+item.default_delivery_status_translation.delivery_status_name+'</a>');
});




 @endif

 $('#printinvoice').click(function(){
  var area=document.getElementById("printable");

  printData();
});
/*$.fn.extend({
  print: function() {
    var frameName = 'printIframe';
    var doc = window.frames[frameName];
    if (!doc) {
      $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
      doc = window.frames[frameName];
    }
    doc.document.body.innerHTML = this.html();
    doc.window.print();
    return this;
  }
});*/
function printData()
{
 var divToPrint=document.getElementById("printable");
 newWin= window.open("");
 newWin.document.write(divToPrint.outerHTML);
 newWin.print();
 newWin.close();
}

$(document).ready(function(){$(".table-break  tbody th, .table-break tbody td").wrapInner("<div></div>");});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datepicker-range-start').Zebra_DatePicker({
     direction: true  
   });

  });
</script>

<script type="text/javascript">

  $("#tracking_number_save").click(function(){
    var tracking_number =$("#tracking_number").val();
    var order_id={{$order->order_id}};

    $.ajax({
      type: "post",
      url: "{{$base_url}}/admin/order/postTrackingNumber",
      data: {'tracking_number':tracking_number,'order_id':order_id},
      dataType: 'json',
      cache: false,
      success: function (result) {
        if(result.tracking_number==tracking_number){
         window.location.reload();
       }
     }

   }); 
    
  });
</script>
<script type="text/javascript">

  $('#history-show').on('click', function(e){

    $(".histories").toggle();
    // $(this).toggleClass('class1')
  });

  var id= {{$order->user_id}}
  var order_id={{$order->order_id}}
  'use strict';
  $(document).ready(function() {
   $('#footer-search').DataTable( $.extend({      
    "ajax": "log/invoiceData?id="+id+"&order_id="+order_id,
    "order": [[ 0, "desc" ]],                                

    "columns": [{ 
      "data": "order_id" 
    },{ 
      "data": "global_order_id" 
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
},dataTableDesign));
 });
</script>

<!-- Date-range picker js -->
<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>
<script src="{{asset('files/assets/js/core.js')}}"></script>

@endsection