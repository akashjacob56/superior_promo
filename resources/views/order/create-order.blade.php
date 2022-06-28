@extends('layouts.admin')
@section('content')

@php
$total_quantity=0;
$gst_total=0;
$gst_total_amount=0;
$total_net_amount=0;
$sgst_total_amount=0;
$cgst_total_amount=0;
$total_gst_net_amount=0;
@endphp
<style type="text/css">
.select-box-container{
  z-index: 2000;
}

table {
  width:400px;
}
tbody#sku-data {
  display:block;
  height:200px;
  overflow:auto;
}
thead, tbody tr {
  display:table;
  width:100%;
  table-layout:fixed;/* even columns width , fix width of table too*/
}
.table-card .card-block .table tr td:first-child, .table-card .card-block .table tr th:first-child{
  padding-left: 0px !important;
}
.md-content > div{
  padding: 15px 15px 15px 15px !important;
  font-size: 1em !important; 
}
.table td, .table th{
  padding: 0.75rem 0.50rem !important;
}
.card{
  box-shadow:none !important;
}

.admin-order-image{
  height: 50px;
  width: 50px;
}
.card .card-block{
  padding: 1.25rem !important;
}
.quantity-width{
  width: 60% !important;
}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/component.css')}}">
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
            <a href="{{$base_url}}/admin/customer/all">Customers</a>
          </li>
          <li class="breadcrumb-item">
            <a>{{$customer->name}}</a>
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
                <h5> Customers</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CUSTOMER_ADD'))
                  

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-product">
                    Add Product
                  </button>

                  @endif
                </span>
                <span class="text-muted">You can view, add, modify, and organize all of your offer blocks from the offer blocks page in the @if($appearance->is_vshopy==1) vshopy @endif admin.</span>


              </div>
              <div class="col-md-12">
                <div class="col-md-4">
                  Customer Name : {{$customer->name}}
                </div>
                <div class="col-md-4">
                  Email : {{$customer->email}}
                </div>
                <div class="col-md-4">
                  Contact Number : {{$customer->contact_number}}
                </div>
              </div>
              <div class="card-block">

                <div class="table-responsive">
                  <div class="table-content">
                    <div class="project-table">
                      <table id="e-product-list" class="table table-striped dt-responsive nowrap">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>My Price</th>
                            <th>Quantity</th>
                            <th>Taxable Amt</th>
                            <th class="gst">SGST %</th>
                            <th class="gst">CGST %</th>
                            <th>Net Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="cart-data">
                          @foreach($already_carts as $already_cart)
                          <tr id='{{$already_cart->cart_id}}'>
                            <td class="pro-list-img">
                              <img src="{{$base_url}}/storage/app/{{$already_cart->sku->product->product_image}}" class="img-fluid admin-order-image" alt="tbl">
                            </td>
                            <td class="pro-name" style="overflow: hidden;">
                              <h6>
                               @php
                               $result="";
                               $string=$already_cart->sku->product->default_product_translation->product_name;
                               if(strlen($string)>15){
                               $result =substr($string, 0, 12)."...";
                             }
                             else{
                             $result =substr($string, 0, 15);
                           }
                           @endphp 
                         {{$result}}</h6>
                         <span>{{$already_cart->sku->parent_variant->default_variant_option_translation->variant_option_name}}</span>
                         <span>{{$already_cart->sku->child_variant->default_variant_option_translation->variant_option_name}}</span>
                       </td>
                       <td>
                        <label class="text-danger my_price">{{$already_cart->sku->my_price}}</label>
                      </td>
                      <td><input type="text" id="cart-quantiy" class="form-control quantity-width quantity cart-quantity" name="quantity" value="{{$already_cart->quantity}}"></td>
                      <td>
                        <label class="text-danger">{{$already_cart->quantity * $already_cart->sku->my_price}}</label>
                      </td>
                      @if($already_cart->sku->product->gst->gst==0)
                      <td class="gst">-</td>
                      <td class="gst">-</td>
                      <td> {{$already_cart->quantity * $already_cart->sku->my_price}}</td>
                      @else
                      <td class="gst">{{$already_cart->sku->product->gst->sgst}}%</td>
                      <td class="gst">{{$already_cart->sku->product->gst->cgst}}%</td>
                      <td class="gst">{{$already_cart->sku->my_price*$already_cart->quantity+(($already_cart->sku->my_price*$already_cart->quantity)*$already_cart->sku->product->gst->gst)/100}}</td>
                      @endif
                      <td class="action-icon">
                        <button type="button" class='delete_cart btn btn-danger'><i class='fa fa-trash-o'></i></button>
                      </td> 
                    </tr>
                    @php 
                    $total_quantity=$total_quantity+$already_cart->quantity;
                    $total_net_amount=$total_net_amount+$already_cart->quantity * $already_cart->sku->my_price;

                    $gst_total=$gst_total+$already_cart->sku->product->gst->gst;
                    $gst_total_amount=$gst_total_amount+(($already_cart->sku->my_price*$already_cart->quantity)*$already_cart->sku->product->gst->gst)/100;

                    $sgst_total_amount=$sgst_total_amount+(($already_cart->sku->my_price*$already_cart->quantity)*$already_cart->sku->product->gst->sgst)/100;
                    $cgst_total_amount=$cgst_total_amount+(($already_cart->sku->my_price*$already_cart->quantity)*$already_cart->sku->product->gst->cgst)/100;

                    $total_gst_net_amount=$total_gst_net_amount+$already_cart->sku->my_price*$already_cart->quantity+(($already_cart->sku->my_price*$already_cart->quantity)*$already_cart->sku->product->gst->gst)/100;

                    @endphp
                    @endforeach

                  </tbody>
                  <tr>
                    <td class="pro-list-img">
                    </td>
                    <td class="pro-name">
                    </td>

                    <td><b>Total Quantity : <span id="total_quantity">{{$total_quantity}}</span></b></td>
                    <td></td>
                    <td id="total_net_amount">{{$total_net_amount}}</td>
                    <td class="gst">{{$appearance->default_appearance_translation->currency}}{{$sgst_total_amount}}</td>
                    <td class="gst">{{$appearance->default_appearance_translation->currency}}{{$cgst_total_amount}}</td>
                    <td>
                      <label class="text-success"><b>Total net amt. : <span id="total_gst_net_amount" >{{$appearance->default_appearance_translation->currency}}{{$total_gst_net_amount}}</span></b>
                      </label>
                    </td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#confirm-order">
            Submit Order
          </button>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="add-product" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Product to Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
            <label class="form-control-label">Search product name</label>
            <select class="form-control select-box" id="product_id" name="product_id">
              <option value="">Search product name</option>
              @foreach($products as $product)
              <option value="{{$product->product_id}}">{{$product->default_product_translation->product_name}}</option>
              @endforeach
            </select>
            @if ($errors->has('product_id'))
            <span class="help-block">
              <strong>{{ $errors->first('product_id') }}</strong>
            </span>
            @endif
          </div>

          <div class="card table-card">
            <div class="card-block" style="padding: 0rem !important;">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Market Price</th>
                      <th>My Price</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="sku-data">
                    <td colspan="3" align="center">Please selected the product</td>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="md-overlay"></div>

</div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm-order" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="{{$base_url}}/admin/makeOrder" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirm Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
            <label for="message-text" class="col-form-label">Delivery Address <span>*</span> </label>
            <textarea class="form-control" name="delivery_address"></textarea>
            @if ($errors->has('delivery_address'))
            <span class="help-block">
              <strong>{{ $errors->first('delivery_address') }}</strong>
            </span>
            @endif
          </div>

          <input type="hidden" name="customer_id" value="{{$customer->id}}">
          <input type="hidden" id="order_amount" name="order_amount" value="{{$total_gst_net_amount}}">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success waves-effect waves-light add pull-right">   Submit Order
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@if($gst_total==0)
<script type="text/javascript">
  $(".gst").hide();
</script>
@endif

<script type="text/javascript">
  $("#product_id").change(function(){
    product_id=($(this).val());
    $.ajax({
      type: 'post',
      url: "{{$base_url}}/getProductVariants",
      data: {'product_id':product_id},
      success: function (result) {
        $("#sku-data").empty();
        $.each(result, function(index, item){
          var variant_option_name="";
          if(item.parent_variant.default_variant_option_translation.variant_option_name!=null){
            variant_option_name=item.parent_variant.default_variant_option_translation.variant_option_name;
          }
          var variant_option_name="";
          if(item.child_variant.default_variant_option_translation.variant_option_name!=null){
            variant_option_name=item.child_variant.default_variant_option_translation.variant_option_name;
          }

          var sku_item='<tr><td><div class="d-inline-block align-middle"><img src="{{$base_url}}/storage/app/'+item.product.product_image+'" alt="user image" class="img-radius img-40 align-top m-r-15"><div class="d-inline-block"><h6>'+variant_option_name+'</h6><p class="text-muted m-b-0">'+variant_option_name+'</p></div></div></td><td>'+item.market_price+'</td><td>'+item.my_price+'</td><td><input type="text" class="quantity form-control" name="quantity"></td><td class="text-right"><button type="button" id="'+item.sku_id+'" class="add-to-cart btn btn-success waves-effect waves-light add pull-right">Add to Cart</button></td></tr>';
          $("#sku-data").append($(sku_item));
        });
      },
      error: function (xhr, textStatus, errorThrown) {
      }
    });
  });

  $("#sku-data").on('click', 'tr td button.add-to-cart', function () {
    sku_id=this.id;
    customer_id="{{$customer->id}}";
    quantity=$(this).parent().parent().find('.quantity').val();
    if(quantity>0){
      $.ajax({
        type: 'post',
        url: "{{$base_url}}/admin/addToCart",
        data: {'customer_id':customer_id,'sku_id':sku_id,'quantity':quantity},
        success: function (result) {
          notify(result.msg);
          if(result.status=="true"){
            var updated_cart_items=result.data; 
            updateCartTable(updated_cart_items);
          }
        },
        error: function (xhr, textStatus, errorThrown) {
        }
      });
    }
    else{
      notify("@lang("product.quantity_should_be_greater_than_zero")");
    }
  });

  // cart list of customer
  $("#cart-data").on('click','tr td button.delete_cart', function(){
    cart_id=$(this).parent().parent().attr('id');
    $.ajax({
      type: 'post',
      url: "{{$base_url}}/admin/deleteCartItem",
      data: {'cart_id':cart_id},
      success: function (result) {
        notify(result.msg);
        if(result.status=="true"){
          updated_cart_items=result.data;
          updateCartTable(updated_cart_items);
        }
      },
      error: function (xhr, textStatus, errorThrown) {
      }
    });
  });

  function updateCartTable(updated_cart_items){
    var total_quantity=0;
    var total_net_amount=0;
    var cgst_total_amount=0;
    var sgst_total_amount=0;
    var total_gst_net_amount=0;
    var gst_total=0;

    $("#cart-data").empty();

    $.each(updated_cart_items,function(index,item){

      if(item.sku.product.gst.gst==0){
        cgst="-";
        sgst="-";
      }else{
        cgst=item.sku.product.gst.cgst;
        sgst=item.sku.product.gst.sgst;
      }
      product_name="";
      if(item.sku.product.default_product_translation.product_name!=null){
        string=item.sku.product.default_product_translation.product_name;
        if(string.length>15){
          product_name=string.substr(1,12)+"";
        }else{
          product_name=string;
        }
      }
      variant_option_name="";
      if(item.sku.parent_variant.default_variant_option_translation.variant_option_name!=null){
        variant_option_name='<span>'+item.sku.parent_variant.default_variant_option_translation.variant_option_name+'</span>'
      }else{
        variant_option_name='<span> </span>';
      }
      variant_option_name=""
      if(item.sku.child_variant.default_variant_option_translation.variant_option_name!=null){
        variant_option_name='<span>'+item.sku.child_variant.default_variant_option_translation.variant_option_name+'</span>';
      }else{
        variant_option_name='<span> </span>';
      }

      var cart_item='<tr id='+item.cart_id+'><td class="pro-list-img"><img src="{{$base_url}}/storage/app/'+item.sku.product.product_image+'" class="img-fluid admin-order-image" alt="tbl"></td><td class="pro-name"><h6>'+product_name+'</h6>'+variant_option_name+'<span>'+variant_option_name+'</span></td><td><label class="text-danger">'+item.sku.my_price+'</label></td><td><input type="text" class="form-control quantity-width quantity" name="quantity" value="'+item.quantity+'"></td><td><label class="text-danger">'+item.quantity*item.sku.my_price+'</label></td><td class="gst">'+cgst+'</td><td class="gst">'+sgst+'</td> <td>'+((item.sku.my_price*item.quantity)+(((item.sku.my_price*item.quantity)*item.sku.product.gst.gst)/100))+'</td><td class="action-icon"><button type="button" class="delete_cart btn btn-danger"><i class="fa fa-trash-o"></i></button></td></tr>';
      $("#cart-data").append($(cart_item));

      total_quantity=parseInt(total_quantity)+parseInt(item.quantity);
      total_net_amount=total_net_amount+(parseInt(item.quantity)*parseInt(item.sku.my_price));
      total_gst_net_amount=total_gst_net_amount+(parseInt(item.quantity)*parseInt(item.sku.my_price))+((item.sku.my_price*item.quantity)*item.sku.product.gst.gst)/100;

      sgst_total_amount=sgst_total_amount+((item.sku.my_price*item.quantity)*item.sku.product.gst.sgst)/100;
      cgst_total_amount=cgst_total_amount+((item.sku.my_price*item.quantity)*item.sku.product.gst.cgst)/100;

      gst_total=gst_total+item.sku.product.gst.gst;
    });

    if(gst_total==0){
      $(".gst").hide();
    }else{
      $(".gst").show();
    }


    $("#total_quantity").text(total_quantity);
    $("#total_net_amount").text(total_net_amount);
    $("#total_gst_net_amount").text(total_gst_net_amount);
    
    $("#order_amount").val(total_gst_net_amount);
  }

  $("#cart-data").on('change','tr td input.quantity', function(){
    var quantity=$(this).val();
    var cart_id=$(this).parent().parent().attr('id');
    var customer_id="{{$customer->id}}";
    if(quantity>0){
      $.ajax({
        type: 'post',
        url: "{{$base_url}}/admin/changeQuantity",
        data: {'cart_id':cart_id,'quantity':quantity,'customer_id':customer_id},
        success: function (result) {
          notify(result.msg);
          var updated_cart_items=result.data;

          updateCartTable(updated_cart_items);
        },
        error: function (xhr, textStatus, errorThrown) {
        }
      });
    }else{
     notify("@lang("product.quantity_should_be_greater_than_zero")");
       $(this).val(1);
    }

  });

</script>


<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
<!-- Model animation js -->
<script src="{{asset('files/assets/js/classie.js')}}"></script>
<script src="{{asset('files/assets/js/modalEffects.js')}}"></script>

@endsection