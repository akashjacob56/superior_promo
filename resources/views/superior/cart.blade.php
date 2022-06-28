@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')

<style type="text/css">

.padding-less{
padding-right:5px;
padding-left:5px;
}

.padding-new{
padding-right:0px;
padding-left:5px;
}

.submit-button{
margin-left:10px;
}

.cart-section tbody tr td {
width: 164px !important;
}

.cart_price{
text-align: -webkit-left;
}

i.fa-trash{
font-size: 2rem !important;
margin-left: 20px !important;
}

i.fa-heart{
font-size: 2rem !important;

}

.cart_total_amount{
text-align: -webkit-right;
}

.fix-height{
max-height: 200px !important;
max-width: 200px !important;
}
.pro-list-img product-col{
height: 100px !important;
display: table-cell !important;
vertical-align: middle !important;
text-align: center !important;
}
.checked{

color:orange;
}
.filled{
color: #ffba57;
}
.non-filled{
color:#cacaca;
}
#quantity_section{
width: 150px;
}


.quantity{
line-height: 0.5 !important;
padding: 0 !important;
}
.hidden{
display: none;
}
.delete-cart{
padding: 0.3rem !important;
}

@media only screen and (max-width: 767px){
.mobile-responsive-button{
margin-left: auto;
margin-right: auto;
width: 100%;
}
.mobile-responsive{
margin-left: auto;
margin-right: auto;
width: 50%;
}
.mobile-responsive-margin{

margin-bottom: 10px;

}

}


@media only screen and (max-width: 780px) and (min-width: 600px){
h4 {
font-size: 17px;
}
}


input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
-webkit-appearance: none;
-moz-appearance: none;
appearance: none;
margin: 0; 
}

.link-top-1{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #575757;
}

.display-contents{
display: contents;
}
.checkout-link{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #68BEE5;
}

.cart-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 30px;
line-height: 35px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}

.cart-box{
background: #FFFFFF;
border: 1px solid #E1E1E1;
box-sizing: border-box;
}

.btn-save-edit{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
width: 100px;
height: 30px;
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 14px;
letter-spacing: -0.017em;
color: #575757;
}

.btn-pricing-details{
background: #68BEE5;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 14px;
align-items: center;
letter-spacing: -0.017em;
color: #FFFFFF;
height: 30px;
width: 100px;
}

.check-text {
background: #68BEE5;
border: 1px solid #68BEE5;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
align-items: center;
text-align: center;
color: #FFFFFF;
width: 150px;
height: 30px;
border-color: #68BEE5;
}

.p-text{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #212121;
}

.sub-p{
font-family: Roboto;
font-style: normal;
font-weight: 300;
font-size: 12px;
line-height: 14px;
letter-spacing: -0.017em;
color: #575757;
}

.sub-p-details{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 14px;
letter-spacing: -0.017em;
color: #212121;
}

.order-text{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
text-align: left;
background-color: #F5F5F5;
padding: 10px 0px;
background: #F5F5F5;
border: 1px solid #E1E1E1;
box-sizing: border-box;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 5px;padding-left: 7px;
}

.order-p-text{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #575757;
}

.order-price-text{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
text-align: right;
letter-spacing: -0.017em;
color: #575757;
}
.align-end{
align-items: end;
}

.discount-input{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
width: 207px;
height: 40px;
}

.btn-submit{
width: 105px;
height: 40px;
border: 1px solid #24D856;
background: #24D856;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
align-items: center;
letter-spacing: -0.017em;
color: #FFFFFF;
}

.btn-p-guide{
background: #FFFFFF;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #68BEE5;
width: 207px;
height: 40px;
}

.btn-shopping{
Width:172px;
Height :40px;
}

.btn-save-cart{
Width:107px;
Height :40px;
}
.product-img{
width: 100px;
height: 100px;
object-fit: cover;
max-width: 100px;
max-height: 100px;
}

.no-itemrow {
text-align: center;
color: #4480b4;
font-size: 24px;
}

.empty-cart-image{
max-width: 100% !important;
max-height: 100%;
}

.btn-go-shopping{
height: 40px;
width: 140px;
background: #68BEE5;
border: solid 1px #68BEE5;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
}

.item-pricing-border{
    border-right: 2px solid #eff0f7;
}

.pricing-ul{
margin: 0 0 0.1rem !important;
width: 100%;
}              

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

@if($data['products']!="[]")
<main class="main">
<div class="container">               
<div class="row p-4" style="padding-left: 0px !important;">
<span class="link-top-1">Home /</span>
<span class="link-top-1">Cart /</span>
<a href="#"><span class="checkout-link">Checkout</span></a>
</div>

<div class="row p-0">
<span class="cart-txt" style="margin-bottom: 20px;">Cart</span>
</div>
 
<div class="row">

<div class="col-md-9">

<div class="col-md-12" style="padding-left: 0px !important">

	@php
	$main_total=0;
	@endphp

@foreach($data['products'] as $product) 

@php
$main_total= $main_total+$product->quantity*$product->price;
@endphp

 <div class="row  align-items-center cart-box p-4  mb-1 cart_item_all-{{$product->id}}">

  <div class="col-md-2  align-self-start"><img class="product-img" src="{{$base_url}}/storage/app/{{$product->product->product_image}}"/></div>

  <div class="col-md-3">

  	<input type="hidden" class="cart_item_id" name="cartitem_id" value="{{$product->id}}"/>

  	<div class="row"><P><span class="p-text">{{$product->product->product_translation->product_name}}</span></P></div>

  	<div class="row">
		<ul style="margin: 0 0 0.5rem !important;width: 100%;">
		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Item Number-</div>
		<div class="col sub-p-details">#{{$product->product->product_id}}</div>
		</div>
	    </p>
		</li>

        @if($product->cartitemcolor!=[]) 
		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Item Color-</div>
		<div class="col sub-p-details">{{$product->cartitemcolor->color_name}}</div>
		</div>
		</p>
		</li>
		@endif
        
      @if($product->cartitemimprint!="[]")
      
      @foreach($product->cartitemimprint as $imprint)
      
      @php
        $main_total=$main_total+$imprint->setup_price;
      @endphp


      @php
      $imprint_colors=$data['cart_item_imprint_color']->where('cart_item_imprint_id',$imprint->id);
		@endphp

		<li>
		<p>
		<div class="row ">
		<div class="col sub-p">{{$imprint->imprint_name}}-</div>

		
		<div class="col sub-p-details">
		@foreach($imprint_colors as $color)
			 <span>
				{{$color->name}}
			 </span>
			@endforeach
		</div>
                     
		
		</div>
		</p>
		</li>
		@endforeach
		@endif

		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">In - Hand By </div>
		@if($product->received_date!="") 
		<div class="col sub-p-details">{{$product->received_date}}</div>
		@else
		<div class="col sub-p-details">ASAP</div>
        @endif
		</div>
		</p>
		</li>


		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Shipping Cost-</div>
		<div class="col sub-p-details">TBD</div>
		</div>
		</p>
		</li>


		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Price-</div>
         <div class="col sub-p-details">$<?php echo number_format($product->price,2,);?></div>
		</div>
		</p>
		</li>

	</ul>
    </div> 

  </div>

   <div class="col-md-4">

   </div>

  <div class="col-md-3" style="left:12%;">

   <div class="row mb-1">
   <button class="btn-save-edit saved_cart_single" cid="{{$product->id}}">Save for Later</button>
   </div>

   <div class="row mb-1">
   <a href="{{$base_url}}/edit-cartitem?pid={{$product->product_id}}&cid={{$product->id}}">
   <button class="btn-save-edit">Edit</button>
    </a>
   </div>

   
   <div class="row mb-1">
   <button class="btn-pricing-details cart_item_pricing_dtails" cart_item_id="{{$product->id}}">Pricing Details</button>
   </div>

   <div class="row mb-1">
   <a href="{{$base_url}}/cartremove/{{$product->id}}"><button class="btn-save-edit">Delete</button></a>
   </div>


  </div>


<!--  <div class="col-md-2">
	<a href="{{$base_url}}/cartremove/{{$product->cart_id}}">
<svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.71875 0.25C6.26302 0.25 5.88867 0.396484 5.5957 0.689453C5.30273 0.982422 5.15625 1.35677 5.15625 1.8125V2.59375H0.46875V4.15625H1.25V16.6562C1.25 17.291 1.47786 17.8444 1.93359 18.3164C2.4056 18.7721 2.95898 19 3.59375 19H12.9688C13.6035 19 14.1488 18.7721 14.6045 18.3164C15.0765 17.8444 15.3125 17.291 15.3125 16.6562V4.15625H16.0938V2.59375H11.4062V1.8125C11.4062 1.35677 11.2598 0.982422 10.9668 0.689453C10.6738 0.396484 10.2995 0.25 9.84375 0.25H6.71875ZM6.71875 1.8125H9.84375V2.59375H6.71875V1.8125ZM2.8125 4.15625H13.75V16.6562C13.75 16.8678 13.6686 17.055 13.5059 17.2178C13.3594 17.3643 13.1803 17.4375 12.9688 17.4375H3.59375C3.38216 17.4375 3.19499 17.3643 3.03223 17.2178C2.88574 17.055 2.8125 16.8678 2.8125 16.6562V4.15625ZM4.375 6.5V15.0938H5.9375V6.5H4.375ZM7.5 6.5V15.0938H9.0625V6.5H7.5ZM10.625 6.5V15.0938H12.1875V6.5H10.625Z" fill="#FF1001"/>
</svg>
</a>
</div> -->
</div>

<div class="row  cart-box p-4  mb-1 hidden cart_item_pricing-{{$product->id}}">

<div class="col-md-6 item-pricing-border">

 <div class="row pb-3">
 	<span>Imprint Options & Artwork</span>
 </div>



@if($product->cartitemimprint!="[]")
@foreach($product->cartitemimprint as $imprint_pricing)

@php
$imprint_colors_pricing=$data['cart_item_imprint_color']->where('cart_item_imprint_id',$imprint_pricing->id);
@endphp

<div class="row">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Location</div>
<div class="col sub-p-details">{{$imprint_pricing->imprint_name}}</div>
</div>
</p>
</li>
</ul>
</div>

@foreach($imprint_colors_pricing as $color_pricing)
<div class="row">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Color #{{$product->product->brand_id}}:</div>
<div class="col sub-p-details">{{$color_pricing->name}}</div>
</div>
</p>
</li>
</ul>
</div>
@endforeach	
@endforeach
@endif



<div class="row">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Art Comments and Typesetting:
</div>
<div class="col sub-p-details"></div>
</div>
</p>
</li>
</ul>
</div>


 <div class="row pt-3 pb-3">
 	<span>Delivery / Rush Options / Comments</span>
 </div>

<div class="row">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">When do you need your order?:
</div>
@if($product->received_date!="")
<div class="col sub-p-details">{{$product->received_date}}</div>
@else
<div class="col sub-p-details">Regular production time. ASAP</div>
@endif
</div>
</p>
</li>
</ul>
</div>


<div class="row">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Use your own shipping account?:
</div> 
@if($product->own_shipping_system!="")
<div class="col sub-p-details">Yes</div>
@else
<div class="col sub-p-details">No</div>
@endif
</div>
</p>
</li>
</ul>
</div>

</div>



<div class="col-md-6">

 <div class="row pl-4">

   <div class="col-md-3">
   	<figure>
   	<img class="product-img" src="{{$base_url}}/storage/app/{{$product->product->product_image}}"/>
   	</figure>
   </div>

   <div class="col-md-6 d-flex align-items-center ">
   	<span class="text-center">{{$product->product->product_translation->product_name}}</span>
   </div>

   <div class="col-md-3 d-flex align-items-center">
  
   <button class="btn-pricing-details close-pricing" cart_item_id="{{$product->id}}">Close</button>

   </div>

 </div>


<div class="row pl-4">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Quantity:</div>        
@if($product->quantity!="")
<div class="col sub-p-details">{{$product->quantity}}</div>
@endif

@php
$item_total=$product->quantity;
@endphp


</div>
</p>
</li>
</ul>
</div>



<div class="row pl-4">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Unit Price:</div>
@if($product->price!="") 
<div class="col sub-p-details">$<?php echo number_format($product->price,2,);?></div>
@endif
@php
$item_total=$item_total*$product->price;
@endphp
</div>
</p>
</li>
</ul>
</div>



@if($product->cartitemimprint!="[]")
@foreach($product->cartitemimprint as $imprint_pricing)

@php
$imprint_colors_pricing=$data['cart_item_imprint_color']->where('cart_item_imprint_id',$imprint_pricing->id);
@endphp

@foreach($imprint_colors_pricing as $color_pricing)
<div class="row pl-4">
<ul class="pricing-ul">
<li>
<p>
<div class="row"> 
<div class="col sub-p">{{$imprint_pricing->imprint_name}} - Spot Colors ({{$color_pricing->name}}) Setup Fee:
</div>
<div class="col sub-p-details">${{$imprint_pricing->color_setup_price}}</div>
</div>
</p>
</li>
</ul>
</div>

@php
$item_total=$item_total+$imprint_pricing->color_setup_price;
@endphp

@endforeach	
@endforeach
@endif



<div class="row pl-4">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Shipping:
</div>
<div class="col sub-p-details">$00.00
</div>
</div>
</p>
</li>
</ul>
</div>


@php
$shipping_cost=0;
$item_total=$item_total+$shipping_cost;
@endphp

<div class="row pl-4">
<ul class="pricing-ul">
<li>
<p>
<div class="row "> 
<div class="col sub-p">Total:
</div>
<div class="col sub-p-details">$<?php echo number_format($item_total,2,);?></div>
</div>
</p>
</li>
</ul>
</div>


</div>
 
</div>

              
@endforeach


</div>
</div>


<div class="col-md-3" style="padding-top: 0px !important;padding-right: 0px !important;padding-left: 0px !important">
<div class="col-md-12" style="padding-right: 0px !important">
<div class="col-md-12 cart-box mb-1" style="padding-top: 0px !important;padding-right: 0px !important;padding-left: 0px !important">

    <h5 class="order-text">Order Details</h5>
      <div style="padding:4px 10px;">
		<ul style="width:100%">
		<li>
		<p>
		<div class="row"> 
		<div class="col order-p-text">Product Total</div>
		<div class="col order-price-text">$<?php echo number_format($main_total,2,);?></div>
		</div> 
	    </p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col order-p-text">Order Total</div>
		<div class="col order-price-text ord-total">$<?php echo number_format($main_total,2,);?></div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col order-p-text">Shipping Cost</div>
		<div class="col order-price-text">$0.00</div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row discount-row hidden"> 
		<div class="col order-p-text">Discount</div>
		<div class="col order-price-text DISC-AMT"></div>
		</div>
		</p>
		</li>

	</ul>
   
    
     @php
     $shipping_cost=0;
     $discount=0;
     @endphp
   
  <!--   <a href="{{$base_url}}/checkout?ot={{$main_total}}&sc={{$shipping_cost}}&pt={{$main_total}}" target="_blank">
    <button type="button" class="check-text">Continue Checkout</button>
    </a> -->
    </div>
</div>
  </div>
</div>

</div>

  

<!-- next product -->


<!--                  <div class="row cart-box p-4 d-flex align-items-center mb-6">
	 
  <div class="col-md-2  align-self-start"><img class="product-img" src="{{$base_url}}/resources/views/superior/assets/images/mgggg 2.png"/></div>

  <div class="col-md-3">

  	<div class="row"><P><span class="p-text">Buzz Bluetooth Earbuds</span></P></div>

  	<div class="row">
		<ul>
		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Item Number-</div>
		<div class="col sub-p-details">#53429</div>
		</div>
	    </p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Item Color-</div>
		<div class="col sub-p-details">Blue</div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Imprint Back Imprient-</div>
		<div class="col sub-p-details">1 Color</div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">In - Hand By </div>
		<div class="col sub-p-details">ASAP</div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Shipping Cost-</div>
		<div class="col sub-p-details">TBD</div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col sub-p">Price-</div>
		<div class="col sub-p-details">$384.00</div>
		</div>
		</p>
		</li>

	</ul>
    </div>

  </div>

  <div class="col-md-2">

   <div class="row mb-1">
   <button class="btn-save-edit">Save for Later</button>
   </div>

   <div class="row mb-1">
   <button class="btn-save-edit">Edit</button>
   </div>


   <div class="row mb-1">
   <button class="btn-pricing-details">Pricing Details</button>
   </div>


  </div>


<div class="col-md-2">
<svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.71875 0.25C6.26302 0.25 5.88867 0.396484 5.5957 0.689453C5.30273 0.982422 5.15625 1.35677 5.15625 1.8125V2.59375H0.46875V4.15625H1.25V16.6562C1.25 17.291 1.47786 17.8444 1.93359 18.3164C2.4056 18.7721 2.95898 19 3.59375 19H12.9688C13.6035 19 14.1488 18.7721 14.6045 18.3164C15.0765 17.8444 15.3125 17.291 15.3125 16.6562V4.15625H16.0938V2.59375H11.4062V1.8125C11.4062 1.35677 11.2598 0.982422 10.9668 0.689453C10.6738 0.396484 10.2995 0.25 9.84375 0.25H6.71875ZM6.71875 1.8125H9.84375V2.59375H6.71875V1.8125ZM2.8125 4.15625H13.75V16.6562C13.75 16.8678 13.6686 17.055 13.5059 17.2178C13.3594 17.3643 13.1803 17.4375 12.9688 17.4375H3.59375C3.38216 17.4375 3.19499 17.3643 3.03223 17.2178C2.88574 17.055 2.8125 16.8678 2.8125 16.6562V4.15625ZM4.375 6.5V15.0938H5.9375V6.5H4.375ZM7.5 6.5V15.0938H9.0625V6.5H7.5ZM10.625 6.5V15.0938H12.1875V6.5H10.625Z" fill="#FF1001"/>
</svg>
</div>

  



<div class="col-md-3">
  	<div class="row"><span class="order-text">Order Details</span></div>
  	<div class="row">
		<ul>
		<li>
		<p>
		<div class="row"> 
		<div class="col order-p-text">Product Total</div>
		<div class="col order-price-text">$529.00</div>
		</div>
	    </p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col order-p-text">Order Total</div>
		<div class="col order-price-text">$529.00</div>
		</div>
		</p>
		</li>

		<li>
		<p>
		<div class="row "> 
		<div class="col order-p-text">Shipping Cost</div>
		<div class="col order-price-text">$0.00</div>
		</div>
		</p>
		</li>
	</ul>
    </div>
   	<div class="row">
    <button class="check-text">Continue Checkout</button>
    </div>
  </div>
</div> -->



<div class="row align-end">

<div class="col-md-6">
<div class="row align-end">
	<div class="col-md-4"> 
     <label>Discount/Coupon</label>
     <input class="discount-input" type="text" name="coupuncode" required="">
	</div>
	<div class="col-md-2 submit-button discount-btn">
		<button class="btn-submit discount">Submit</button>
	</div>

<div class="col-md-2 submit-button discount-cancel-btn hidden">
	  <a  class="remove-discount"  href="javascript:void(0);">
		<button class="btn-submit discount-cancel">CancelDiscount</button>
		</a>
</div>


</div>
</div>

<div class="col-md-6">

<div class="row">
<!-- <div class="col-md-4 padding-less"><button class="btn-p-guide btn-shopping" style="width:100%;">Continue Shopping</button></div> -->
<div class="col-md-6 padding-new"></div>
<!-- <button class="btn-p-guide" style="width:100%;">Our Order Process Guide</button> -->
<div class="col-md-2 padding-less"><button class="btn-p-guide btn-save-cart saved_cart" style="width:100%;">Save Cart</button></div>

<div class="col-md-4 padding-less">



<a href="{{$base_url}}/checkout"><button class="btn-p-guide " type="button" style="width:100%;">Continue Checkout</button></a>

</div>

<!-- <div class="col-md-5 padding-new"><button class="btn-p-guide" style="width:100%;">Our Order Process Guide</button></div> -->
</div>

</div>

</div>


</div>

<div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->

@else

@php
$shipping_cost=0;
$discount=0;
@endphp



@php
$main_total=0;
@endphp
               

<main class="main">
<div class="container pt-5 pb-5"> 
<div class="col-md-12">
<center>
<div>
<img src="{{$base_url}}/storage/app/empty-cart.png" class="img-fluid empty-cart-image" alt="tbl" width="200">
<span class="no-itemrow">Your cart is empty!</span>
<br>
<br>
<a href="{{$base_url}}/shop">
<button class="btn-go-shopping mb-6" type="submit">Go Shopping</button>
</a>
</div>
</center>
</div>
</div>
</main>
@endif


<script type="text/javascript" src="{{asset('resources/views/superior/assets/js/notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script>

<script type="text/javascript">


// for cart item pricing details
$(document).ready(function(){
$('.cart_item_pricing_dtails').on('click',function(){
var cart_item_id = $(this).attr('cart_item_id');
$('.cart_item_all-'+cart_item_id).addClass("hidden");
$('.cart_item_pricing-'+cart_item_id).removeClass("hidden");
});

$('.close-pricing').on('click',function(){
var cart_item_id = $(this).attr('cart_item_id');
$('.cart_item_all-'+cart_item_id).removeClass("hidden");
$('.cart_item_pricing-'+cart_item_id).addClass("hidden");
});

});



/*for discount in cart*/
$(document).ready(function (){
$('.discount').on('click', function(){
var discount_cupon=$('.discount-input').val();

var total_ammount={{$main_total}};

if(discount_cupon!==""&&discount_cupon!==null){   
$.ajax({
type: 'post',
url:'{{$base_url}}/discount-cart',
data:{"_token": "{{ csrf_token() }}",'discount_cupon':discount_cupon,'total_ammount':total_ammount},
success: function (result){

if(result.status=="true"){

$('.DISC-AMT').html('$'+result.discount); 
$('.ord-total').html('$'+result.total);
$('.discount-row').removeClass('hidden');

var total=result.total;
var discount=result.discount;
var discount_code=result.promocode;


$('#ot_checkout_header').val(total);
$('#sc_checkout_header').val({{$shipping_cost}});
$('#pt_checkout_header').val({{$main_total}});
$('#discount_checkout_header').val(discount);
$('#discode_checkout_header').val(discount_code);


$('#ot_checkout').val(total);
$('#sc_checkout').val({{$shipping_cost}});
$('#pt_checkout').val({{$main_total}});
$('#discount_checkout').val(discount);
$('#discode_checkout').val(discount_code);



/* $('#checkout-link').attr('href',"{{$base_url}}/checkout?ot="+total+"&sc={{$shipping_cost}}&pt={{$main_total}}&discount="+discount+"&discode="+discount_code+"");

$('.headercheckout').attr('href',"{{$base_url}}/checkout?ot="+total+"&sc={{$shipping_cost}}&pt={{$main_total}}&discount="+discount+"&discode="+discount_code+"");*/

$('.discount-input').attr('placeholder',"Discount Applied");

$('.discount-cancel-btn').removeClass('hidden');

$(".remove-discount").attr('href',"{{$base_url}}/remove-discount?id="+result.discount_id+" ");

$.notify(result.msg,'success');
}else{
$.notify(result.msg,'error');
}

},

error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown);}
});

}else{

$.notify("please_enter_valid_value","error");
}

});
});



/*for single saved cart items*/
$(document).ready(function (){
$('.saved_cart_single').on('click', function(){

var cart_item_id=$(this).attr('cid');
$.ajax({
type: 'post',
url:'{{$base_url}}/savedcarts/single',

data:{"_token": "{{ csrf_token() }}",'cart_item_id':cart_item_id},

success: function (data){
if(data.status=="false"){
$.notify('Item already exist','error');
}
else{
$.notify('Item added cart successfully','success');
}
},

error: function (xhr, textStatus, errorThrown) { 
alert(textStatus + ':' + errorThrown);
}
});	

});
});	


/*for all saved cart items*/
$(document).ready(function (){
$('.saved_cart').on('click', function(){

var cart_item_ids= new Array();
$(".cart_item_id").each(function(i) {
cart_item_ids.push($(this).val());
});

$.ajax({

type: 'post',
url:'{{$base_url}}/savedcarts',
data:{"_token": "{{ csrf_token() }}",'cart_item_ids':cart_item_ids},
success: function (data){
if(data.status=="false"){

$.notify('Items already exist','error');

}
else{

$.notify('Items added cart successfully','success');
}
},

error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown);}
});	
});
});	


$('#cart_products').on("keypress",".quantity", function (e) {
if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {       
return false;
}
});


function showcart(result){
total_my_price=0;
total_market_price=0;
string="";
item=0;
offer="";
reviewCount=0;
off=0;
save_amount=0;
total=0;
if(result.data.data.cart_count==0){
$("#cart_count").addClass("hidden");
$("#cart-empty").removeClass("hidden");
$("#cart-block").addClass("hidden");
}
$.each(result.data.data.products, function( key, value ) {
total_my_price=total_my_price+(value.sku.my_price*value.quantity);
total_market_price=total_market_price+(value.sku.market_price*value.quantity);
offer=0;
off=(value.sku.market_price-value.sku.my_price)*(value.quantity);
if(off>0){
save_amount=save_amount+ off;
}
flag=0;
if(value.sku.market_price-value.sku.my_price>0){
offer=(value.sku.market_price-value.sku.my_price)*100/value.sku.market_price;
var result = (offer - Math.floor(offer)) !== 0;

if(result){
flag=1;
offer=offer;
}

if(flag==1){
offer=offer.toFixed(2);
}

offer=offer+" % "+"  @lang("product.off")";

}

string=value.sku.product.default_product_translation.product_name;
if(string.length>20){
result =string.substr(0, 17)+"...";
}else{
result =string.substr(0, 20);
}

if(!value.sku.product.gst.gst<= 0){
gst=(value.sku.product.gst.gst)/100;
my_price=((value.sku.my_price*value.quantity));
total=total+my_price * gst ;
}

reviewCount=4;
if(value.sku.product.review_count!=null){ 
reviewCount=value.sku.product.review_count.rating; 
} 
var star_color=' <span class="fa fa-star checked filled p-1"></span>';
var star=' <span class="fa fa-star non-filled p-1"></span>';

review_count=1;
if(value.sku.product.review_count!=null){
var review='<span class="review">('+value.sku.product.review_count.rating_count+' @lang("product.review"))</span>'; 
}else{
var review='<span class="review"></span>'; 
}
stock="";

if(value.sku.product.track_inventory==1){
if(value.sku.quantity > 0){
stock='<td><label class=" text-success"> <strong>@lang("product.stock_in") </strong></label></td>';
}else if(value.sku.product.allow_customer_stock_out==1){
stock='<td><label class=" text-success"> <strong>@lang("product.stock_in") </strong></label></td>';
}else{
stock='<td><label class="text-danger">@lang("product.out_of_stock") </label></td>';
}
}else{
stock='<td> </td>';
}


if(offer<=0){
offer="";
}

market_price="";
if(value.sku.my_price < value.sku.market_price){
market_price='$<strike>'+value.sku.market_price+'</strike>';
}
parent_variant="";
child_variant=""
variant="";
variants="";

parent_variant=value.sku.parent_variant.default_variant_option_translation.variant_option_name;
child_variant=value.sku.child_variant.default_variant_option_translation.variant_option_name;
variant=parent_variant;

if(parent_variant!=null && child_variant!=null){
variant=parent_variant+", "+child_variant;
}

if(variant!=null){
variants=variant;
variants='<span class="text-muted">('+variants+')</span>';
}
delivery_message="";
if(value.sku.product.default_product_translation.delivery_message!=null){
delivery_message=value.sku.product.default_product_translation.delivery_message;
}
amount="";

amount="$ "+(value.sku.my_price*value.quantity);

var cart_items='<tr id="delete_'+value.cart_id+'" class="product-row"> <td class="pro-list-img product-col"> <img src="{{$base_url}}/storage/app/'+value.sku.product.product_image+'" class="img-fluid fix-height mobile-responsive" alt="tbl" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; /> </td> <td class="pro-name"> <a class="hvr-shrink" href="{{$base_url}}/product/'+value.sku.product.product_url+'?pid='+value.sku.product.default_product_translation.product_id+'&skuid='+value.sku.sku_id+'&pvid='+value.sku.product.parent_variant_id+'&cvid='+value.sku.product.child_variant_id+'" target="_blank"> <h6> <span></span> '+result+'</h6> </a> <span> <div class="rating" id="rating_star_'+value.cart_id+'"> <span> </span> '+review+' </div> </span> <span class="text-muted f-10">'+delivery_message+'</span>	 </td> <td>$'+value.sku.my_price+' <small class="old-price">'+market_price+' </small> <p><span class="text-info"> '+offer+'  </span></p>  </td> <td class="mobile-responsive"> <div id="quantity_section" class="input-group"> <span id="down-arrow_'+value.cart_id+'" class="'+value.sku_id+' down-arrow input-group-btn"> <button type="button" class="btn btn-default btn-number shadow-none btn-sm" data-type="minus" data-field="quant[1]"> <span id="btn-number" class="fa fa-minus"></span> </button></span><input type="text" id="'+value.sku_id+'" class="quantity form-control input-number text-center" value="'+value.quantity+'"> <span id="up-arrow_'+value.cart_id+'" class="'+value.sku_id+' up-arrow input-group-btn"> <button type="button" class="btn btn-default btn-number shadow-none btn-sm" data-type="plus" data-field="quant[1]"> <span id="btn-number" class="fa fa-plus"></span></button> </span> </div> </td>'+stock+'<td>'+amount+' </td> <td class="'+value.cart_id+'" id="'+value.sku.sku_id+'"><a id="add_wishlist" class="m-r-15 text-muted add_wishlist" data-toggle="tooltip" data-placement="top" title="Move to wishlist" data-original-title="Move to wishlist"><i class="wishlist far fa-heart"></i></a><a id="'+value.cart_id+'" class="text-muted delete-cart" data-toggle="tooltip" data-placement="top" title="Remove from cart" data-original-title="Remove from cart"><i class="fa fa-trash"></i></a></td></tr>';
$('#cart_products').append(cart_items);
for(i=1;i<=5;i++){
if(i<=reviewCount){
$("#rating_star_"+value.cart_id).append($(star_color));

}else{
$("#rating_star_"+value.cart_id).append($(star));
}
}
if(variants!=null){
$("#rating_star_"+value.cart_id).append($(variants));
}
});

var demo=total_my_price + total;
temp=0;
var result1 = (demo - Math.floor(demo)) !== 0;
if(result1){
temp=1;
demo=demo;
}

if(temp==1){
demo=demo.toFixed(2);
}

$('#new_order_amount').html(demo);
if(save_amount<=0){
$('#new_saved_amount').parent().hide();
}else{
$('#new_saved_amount').html(save_amount);
}
}

$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

carts=<?php echo json_encode($data['products'])?>;
if(carts.length==0){
$("#cart-empty").removeClass("hidden");
}

$(document).ready(function(){
$('#cart_products').on("click",".up-arrow",function(){
var quantity = $(this).parent().find(".quantity").val();
var sku_id=$(this).attr('class').split(' ')[0];
++quantity;
setquntity=$(this).attr('id');
$.ajax({
type: "post",
url: "{{$base_url}}/postAddToCart",
data: {'quantity':quantity,'sku_id':sku_id},
dataType: 'json',
cache: false,
success: function (result) {

if(result.status=="true"){

$("#cart_products").empty();
showcart(result);
$('#'+setquntity).parent().find(".quantity").val(result.data.data.cart.quantity);
}
notify(result.data.msg);

},
error: function (error) {
}
});	
});

$('#cart_products').on("click",".down-arrow",function(){
var quantity =$(this).parent().find(".quantity").val();

sku_id=$(this).attr('class').split(' ')[0];
if(quantity>1)
{
--quantity;			
var setquntity=$(this).attr('id');

$.ajax({
type: "post",
url: "{{$base_url}}/postAddToCart",
data: {'quantity':quantity,'sku_id':sku_id},
dataType: 'json',
cache: false,
success: function (result) {
if(result.status=="true"){
	$("#cart_products").empty();
	showcart(result);
	$('#'+setquntity).parent().find(".quantity").val(result.data.data.cart.quantity);
}
notify(result.data.msg);
},
error: function (error) {
}
});	
}
});


$('#cart_products').on("keyup",".quantity",function(){
quantity=$(this).val();
var sku_id=$(this).attr('id');
if(quantity<1)
{
notify("@lang("global.please_enter_valid_quantity")");

}
else{
$.ajax({
type: "post",
url: "{{$base_url}}/postAddToCart",
data: {'quantity':quantity,'sku_id':sku_id},
dataType: 'json',
cache: false,
success: function (result) {
if(result.status=="true"){
	$("#cart_products").empty();
	showcart(result);
	$('#'+sku_id).parent().find(".quantity").val(result.data.data.cart.quantity);
}
notify(result.data.msg);
},
error: function (error) {
}
});	
}
});

$('#cart_products').on("click",".delete-cart",function(){
quantity=$(this).parent().parent().find('.quantity').val();
cart_id=$(this).attr('id');
$('#new_order_amount').html(" ");
$.ajax({
type: "post",
url: "{{$base_url}}/wdeleteFromCart",
data: {'cart_id':cart_id},
dataType: 'json',
cache: false,
success: function (result) {
$("#cart_products").empty();

$("#cart_count").text(result.data.cart_count);
$("#new_item").text(result.data.cart_count);
if(result.data.cart_count>0){
showcart(result);
}
if(result.data.cart_count<=0){
$("#cart_count").addClass("hidden");
$("#cart-empty").removeClass("hidden");
$("#cart-block").addClass("hidden");
}

notify(result.data.msg);
},
error: function (error) {
}
});
});


$('#cart_products').on("click",".add_wishlist",function(){
sku_id=$(this).parent().attr('id');	
cart_id=$(this).parent().attr('class');
quantity=$(this).parent().parent().find('.quantity').val();
click_source=2;

$.ajax({
type: "post",
url: "{{$base_url}}/waddToWishlist",
data: {'sku_id':sku_id,'click_source':click_source},
success: function (result) {	
notify(result.data.msg);
//now delete from cart
$.ajax({
type: "post",
url: "{{$base_url}}/wdeleteFromCart",
data: {'cart_id':cart_id},
dataType: 'json',
cache: false,
success: function (result) {
	$("#cart_products").empty();
	showcart(result);
	$("#cart_count").text(result.data.cart_count);
	if(result.data.cart_count<=0){
		$("#cart_count").addClass("hidden");
		$("#cart-empty").removeClass("hidden");
		$("#cart-block").addClass("hidden");
	}
	//notify(result.data.msg);
},
error: function (error) {
}
});
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
});
});

</script>
<script type="text/javascript">
	//Search top
$(document).ready(function(){
$('.header_search_button').on('click',function(){
var search = $('.header_search_input').val();
window.location.href = "{{$base_url}}/shop?page=&search="+search+"&cat_id=&category_id=&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=";
});
});
</script>
@endsection