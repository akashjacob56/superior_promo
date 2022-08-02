@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('content')
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<style type="text/css">
.quantity_checkbox{
width: 18px;
height: 18px;
}
  .product-default figure img:first-child {
    opacity: 1;
    position: relative;
    object-fit: contain !important;
}
.product-title{
    text-align:center;
}

.fillcolor{
color: #68bee5 !important;
}
.fill {
    font-size: 13px;
    color: #68bee5 !important;
}

.unfill {
    font-size: 13px;
    color: #000000 !important;
}
input.category-checkbox {
width: 18px;
height: 18px;
}

.product-category-span-text {
    margin-bottom: 10px;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 21px;
    align-items: center;
    color: #212121;
}

.widget .config-swatch-list {
display: block !important;
}
.price-checkbox{
width: 18px;
height: 18px;
}
.quantity-checkbox{
width: 18px;
height: 18px;
}

.pagination>li>a, .pagination>li>span{
border: 0px solid #ddd;
padding: 0px 12px;
}

.config-show-list{
display: flex;
margin: 0 0 0;
}
.toolbox-show{
margin-left: 20px;
}

.product-default a {
    white-space: unset !important;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
    text-align: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.dot {
height: 25px;
width: 25px;
/*background-color: rgba(255,25,40,150);*/
border: 1px solid #000;
border-radius: 50%;
display: inline-block;
}

.dot-list{
height: 20px;
width: 20px;
/*background-color: rgba(255,25,40,150);*/
border: 1px solid #eeeeee;
border-radius: 50%;
display: inline-block;
}

.text-black{
background-color: #000000;
}

/*.text-white{
background-color: #ffff;
}*/

.text-purple{
background-color: #4042e2;
}
.text-orange{
background-color: #de4637;
}
.text-gray{
background-color: grey;
}

.circle-rounded-ul {
    margin-bottom: 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

hr.hr {
margin-top: 5px;
margin-bottom: 5px;

}

hr {
border: 0;
clear:both;
display:block;
width: 96%;               
background-color:#b5b5b5;
height: 1px;
}


.pagination {
margin: 0px;
}
.config-li{
padding: 0 3px 0 3px;
}

.product-price {
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 21px;
    letter-spacing: -0.017em;
    color: #67A03C;
}
</style>


<style type="text/css">
.single-line-bar-div{
margin-right: 10px;
}

.single-line-bar{
width: 16px;
height: 7px;
background-color: blue;
display: inline-block;
border-radius: 5px;


}

.color-033e9a{
background-color: #033e9a;
}

.color-ebe5d9{
background-color: #ebe5d9;
}

.color-b30909{
background-color: #b30909;
}

.color-a3c823{
background-color: #a3c823;
}

</style>


<style type="text/css">
.show_toolbox_item{
margin-top: 8px;
}
.pagination_content{
margin-top: 0px;
}
</style>


<style type="text/css">
p.sort-by-color-para{
margin-left: : 10px !important;
}

.header-userinfo {
margin-right: -35px;
}

.text-color-header{
margin-top: 5px;
}
.page-item.active .page-link {
color: white !important;
}
</style>

<style type="text/css">


.disabled{
opacity: 0.6;
cursor: not-allowed;
pointer-events: none;
}


.cart_dropdown_new{
margin-left: 30px;
}

.row-joined .product-title a:hover{
color: #58ADD5 !important;
}

.row-joined .product-default:hover {
    border-bottom: 3px solid #68bee5 !important;
    background: #FFFFFF;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}


.divide-line .product-default:hover .product-details h3 a{
color: #58ADD4 !important;
}

.sidebar-shop .widget-body {
padding-top: 1.7rem;
padding-left: 0rem;
}


.sidebar-shop.order-lg-first {
border: none;
}

.item-box span{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    letter-spacing: -0.017em;
    color: #212121;
}

.item-details span{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    letter-spacing: -0.017em;
    color: #212121;
}

.working-days span{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
text-align: center;
letter-spacing: -0.017em;
color: #212121;
}

.ship{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
text-align: center;
letter-spacing: -0.017em;
color: #212121;
}

.price-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #212121;
}

.cat-list li a:hover, .cat-list li a:focus, .cat-list li label:hover, .cat-list li label:focus {
    text-decoration: none;
    color: #68bee5;
}

.sidebar-shop .widget-title a {
    position: relative;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    display: flex;
    align-items: center;
    color: #212121;
    background: #F8FBFF;
    border-bottom: solid 2px #68BEE5;
}

.sidebar-shop .widget-body p {
    letter-spacing: inherit;
    margin-right: 2rem;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 21px;
    align-items: center;
    color: #212121;
}


.product_price_li{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 21px;
    align-items: center;
    color: #212121;
}


.product_quantity_li{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 21px;
    align-items: center;
    color: #212121;
}

.show-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    align-items: center;
    color: #212121;
}

.config-li a{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
    color: #212121;
}

.default-select-txt {
    /*width: 155px;*/
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    color: #212121;
    padding: 5px;
    height: 40px !important;
}


li.active>a {
    color: #68BEE5 !important;
}

.show_paginate_values{

}


.list-grid-icon{
    width: 13%; 
    margin-top: 5px;
}
/*.config-li {
    padding: 0 3px 0 3px;
}*/
</style>






        <main class="main">
            <div class="container pt-5">
                <div class="row">
                    <!-- <div class="col-lg-9 main-content"> -->
                    <!-- <div class="col-lg-10"> -->
                    <div class="" style="width: 79%;margin-left: 20px;">

                        <nav style="border-bottom: 1px solid #E1E1E1;"> 
                            <div class="row">

                                <!-- List Icons Start -------------------- -->
                                <div class="list-grid-icon" style="">
                                    <div class="toolbox-item layout-modes">
                                    <a id="grid_icon" href="javascript:void(0);" class="layout-btn btn-grid active" title="Grid">
                                        <!-- <i class="icon-mode-grid"></i> -->
                                        <img src="/resources/views/superior/assets/images/grid-icon.png" style="width: 28.35px;height: 28.35px">
                                    </a>
                                    <a id="list_icon" href="javascript:void(0);" class="layout-btn btn-list" title="List">
                                        <!-- <i class="icon-mode-list"></i> -->
                                        <img src="/resources/views/superior/assets/images/list-icon.png" style="width: 26.35px;height: 24.35px;margin-top: 2px;">
                                        <!-- <i style="font-size: 25px;" class="fas fa-bars"></i> -->
                                    </a>
                                </div>
                                </div>


                                <!-- List Icons End -------------------------- -->


                                <!-- Pagination Numbers Start ---------------- -->
                                <div class="show_paginate_values" style="width:24% ">
                                    <div class="toolbox-item toolbox-show show_toolbox_item">
                                    <label style="margin: 0 0 0;">
                                        <strong class="show-txt">
                                            Show:
                                        </strong>
                                    </label>
                                    @php
                                        if($pagi_num!=""){
                                            $pagi_num_active = $pagi_num;
                                        }else{
                                            $pagi_num_active="";
                                        }
                                    @endphp
                                        <ul class="config-show-list">
                                            @if($pagi_num_active==16)
                                                <li class="config-li show_paginate_by_number active" name="16" style="cursor: pointer;"><a href="javascript:void(0);">16</a></li>
                                            @else
                                                <li class="config-li show_paginate_by_number" name="16" style="cursor: pointer;"><a href="javascript:void(0);">16</a></li>
                                            @endif

                                            @if($pagi_num_active==30)
                                                <li class="config-li show_paginate_by_number active" name="30" style="cursor: pointer;"><a href="javascript:void(0);">30</a></li>
                                            @else
                                                <li class="config-li show_paginate_by_number" name="30" style="cursor: pointer;"><a href="javascript:void(0);">30</a></li>
                                            @endif

                                            @if($pagi_num_active==45)
                                                <li class="config-li show_paginate_by_number active" name="45" style="cursor: pointer;"><a href="javascript:void(0);">45</a></li>
                                            @else
                                                <li class="config-li show_paginate_by_number" name="45" style="cursor: pointer;">
                                                    <a href="javascript:void(0);">45</a>
                                                </li>
                                            @endif

                                            @if($pagi_num_active==60)
                                            <li class="config-li show_paginate_by_number active" name="60" style="cursor: pointer;"><a href="javascript:void(0);">60</a></li>
                                            @else
                                            <li class="config-li show_paginate_by_number" name="60" style="cursor: pointer;"><a href="javascript:void(0);">60</a></li>
                                            @endif

                                            @if($pagi_num_active==75)
                                            <li class="config-li show_paginate_by_number active" name="75" style="cursor: pointer;"><a href="javascript:void(0);">75</a></li>
                                            @else
                                            <li class="config-li show_paginate_by_number" name="75" style="cursor: pointer;"><a href="javascript:void(0);">75</a></li>
                                            @endif
                                        </ul>
                                </div>
                                </div>
                <!-- Pagination Numbers End ---------------------------- -->
<style type="text/css">
    div.upper_paginate{
        font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
align-items: center;
color: #575757;

    }

    .upper_paginate ul li a{
        color: #212121 !important;
    }

    .upper_paginate ul li.disabled a{
        color: #575757 !important;
    }

    .upper_paginate ul li a.pre-next{
        color: #212121 !important;
    }

    .upper_paginate ul .active a {
        color: #68BEE5 !important;
    }
    
</style>


    <!-- Pagination Upper Start ------------------------------------ -->
                                <div class="mt-1 upper_paginate" style="width: 43%;">

                                    @if ($products->hasPages())
    <ul class="pagination pagination_content" style="margin-left:0px;">
    {{-- Previous Page Link --}}
    @if ($products->onFirstPage())
        <li class="disabled"><a class=""><i class="fa fa-caret-left" style="margin-top: 2px !important;"></i>&nbsp;&nbsp;Previous</a></li>
    @else
        <li class=""><a class="pre-next" href="{{ $products->previousPageUrl() }}" rel="prev"><i class="fa fa-caret-left" style="margin-top: 2px !important;"></i>&nbsp;&nbsp; Previous</a></li>
    @endif

    @if($products->currentPage() > 3)
        <li class="hidden-xs"><a class="" href="{{ $products->url(1) }}">1</a></li>
    @endif
    @if($products->currentPage() > 4)
        <li class=""><a  class="">...</a></li>
    @endif
    @foreach(range(1, $products->lastPage()) as $i)
        @if($i >= $products->currentPage() - 2 && $i <= $products->currentPage() + 2)
            @if ($i == $products->currentPage())
                <li class="active"><a class="active">{{ $i }}</a></li>
            @else
                <li class=""><a  class="" href="{{ $products->url($i) }}">{{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($products->currentPage() < $products->lastPage() - 3)
        <li class=""><a  class="">...</a></li>
    @endif
    @if($products->currentPage() < $products->lastPage() - 2)
        <li class="hidden-xs"><a class="" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($products->hasMorePages())
        <li class=""><a class="pre-next" href="{{ $products->nextPageUrl() }}" rel="next">Next &nbsp;&nbsp;<i class="fa fa-caret-right" style="margin-top: 2px !important;"></i></a></li>
    @else
        <li class="disabled"><a class="">Next &nbsp;&nbsp;<i class="fa fa-caret-right" style="margin-top: 2px !important;"></i></a></li>
    @endif
</ul>
@endif

                                                <!-- <ul class="pagination pagination_content">
                                                    <li>
                                                        <a href="#" aria-label="Previous"><span aria-hidden="true">Previous</span></a>
                                                    </li>
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li><a href="#" aria-label="Next"><span aria-hidden="true">Next</span></a>
                                                    </li>
                                                </ul> -->
                                </div>


    <!-- Pagination Upper End --------------------------------- -->


                                <!-- Sorting Start  ------------------ -->
                                <div class="" style="width: 18%;">
                                    <div class="toolbox-sort">
                                    <!-- <label>Sort By:</label> -->

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control default-select-txt" id="orderby_content">
                                            <option value="default"  selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="avg_rating">Sort by average rating</option>
                                            <option value="newness">Sort by newness</option>
                                            <option value="LowToHighPrice">Sort by price: low to high</option>
                                            <option value="HighToLowPrice">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                </div>

                                <!-- Sorting End ------------------------ -->



                            </div>


                        </ul>
                        </nav>




                        

<style type="text/css">
.product-default .product_image_first{
height:200px;
width:200px;
}

.product-default .product_image_second{
height:210px;
width: 210px;
}

.product_default .product-details {
display: block;
}

.product_title{
margin-top: 0px;
}

.product-default {
border: 0px solid #ddd !important; 
border-bottom: 2px solid #a9ddf4 !important;
padding:5px; 
}

</style>


                        <div class="row pb-4 divided_by_list">

                        @foreach($products as $product)
                            <div class="col-sm-12 col-6 product-default product_default left-details product-list mb-2">
                                <div class="wishlist_product_content_{{$product->product_id}}" style="z-index: 1;position: absolute;margin-left:80%;margin-top:0px;cursor:pointer;" id="">
                                        @if($user_wishlists!="[]" && in_array($product->product_id,$user_wishlists))
                                         <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                        @else
                                        <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                        @endif
                                        <!-- <i class="fa fa-heart-o" style="color: #68bee5;font-weight: 800;"></i> -->
                                    </div>
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img class="product_image_first" src="/storage/app/{{$product->product_image}}" width="250" height="250" alt="product">
                                        <img class="product_image_second" src="/storage/app/{{$product->product_image}}" width="250" height="250" alt="product">
                                    </a><br>
                                    <ul class="circle-rounded-ul" >
                                        @if($product->product_color_group!="")
                               
                                                @if($product->product_color_group->product_colors!="[]")
                                                    @foreach($product->product_color_group->product_colors->take(5) as $product_color)
                                                    <!-- <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-black"></span></a></li>
                                                    <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-purple"></span></a></li>
                                                    <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-orange"></span></a></li>
                                                    <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-white"></span></a></li>
                                                    <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-gray"></span></a></li> -->
                                        <li class="d-inline-block circle-rounded-li"><a href="javascript:void(0);"> <span class="dot-list" style="background-color:{{$product_color->color->color_hex}};"></span></a></li>
                                                        
                                                    @endforeach

                                                @endif

                                                @else
                                                   <li class="d-inline-block circle-rounded-li" style="width: 25px;height: 25px;"></span></li>
                                            @endif
                                        </ul>
                                </figure>
                                <div class="product-details">
                                    <!-- <div class="category-list">
                                        <a href="category.html" class="product-category">category</a>
                                    </div> -->
                                    <h3 class="product-title product_title"> <a href="javascript:void(0);">{{$product->default_product_translation->product_name}}</a>
                                    </h3>

                                    <div class="item-details">
                                        <span>Item - <b>#{{$product->product_id}}</b></span>
                                    </div>

                                    <!-- <div class="order-content">
                                        <span>Order as few as 12,</span>
                                    </div> -->

                                    <div class="ship">
                                       <!--  Ship in  -->{{$product->default_product_translation->delivery_message}}
                                    </div>

                                    @if($product->product_prices !="[]")
                                            @php
                                                $per_item_price_all=[];
                                                $per_item_sale_price_all=[];
                                                $setup_price_all=[];
                                                foreach($product->product_prices as $product_price){

                                                  $per_item_price = $product_price->per_item_price;
                                                  array_push($per_item_price_all, $per_item_price);

                                                  $per_item_sale_price = $product_price->per_item_sale_price;
                                                  array_push($per_item_sale_price_all,$per_item_sale_price);

                                                  $setup_price = $product_price->setup_price;
                                                  array_push($setup_price_all,$setup_price);
                                                }

                                                $min_per_item_price = min($per_item_price_all);
                                                $min_per_item_sale_price = min($per_item_sale_price_all);
                                                $min_setup_price = min($setup_price_all);
                                              @endphp

                                            @if($min_per_item_price!="")
                                                <div class="price-info">
                                                    <b><span class="price-txt">As Low as </span><span style="color: #67a03c !important;font-weight: 700;font-size: 15px;">${{$min_per_item_price}}</span></b>
                                                </div>
                                            @elseif($min_per_item_sale_price!="")
                                                <div class="price-info">
                                                    <b><span class="price-txt">As Low as </span><span style="color: #67a03c !important;font-weight: 700;font-size: 15px;">${{$min_per_item_sale_price}}</span></b>
                                            </div>
                                            @elseif($min_setup_price!="")
                                                <div class="price-info">
                                                    <b><span class="price-txt">As Low as </span><span style="color: #67a03c !important;font-weight: 700;font-size: 15px;">${{$min_setup_price}}</span></b>
                                                </div>
                                            @else
                                                <div class="price-info">
                                                    <br>
                                                </div>
                                            @endif

                                @endif                           

                                </div>
                                <!-- End .product-details -->
                            </div>


                         @endforeach
                         </div>












                        <div class="row row-joined  products-group divided_by_grid">

                            @foreach($products as $product)

                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default  inner-icon">
                                    <!-- <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div> -->
                                    <div class="wishlist_product_content_{{$product->product_id}}" style="z-index: 1;position: absolute;margin-left:80%;margin-top:5px;cursor:pointer;" id="{{$product->product_id}}">
                                        @if($user_wishlists!="[]" && in_array($product->product_id,$user_wishlists))
                                         <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                        @else
                                        <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                        @endif
                                        <!-- <i class="fa fa-heart-o " style="font-size:20px;color: #68bee5;"></i> -->
                                        <!-- <i class="fa" style="font-size:20px;color: #68bee5;">&#xf004;</i> -->
                                    </div>

                                    <figure>

                                        <a href="/product/{{$product->product_url}}?pid={{$product->product_translation->product_id}}&skuid=1&pvid=1&cvid=1">
                                            <img src="/storage/app/{{$product->product_image}}" style="height: 250px;" width="239" height="239" alt="product">
                                        </a>
                                    </figure>

                                    <div class="product-details" style="">
                                        <ul class="circle-rounded-ul" style="display: inline">
                                           
                                            @if($product->product_color_group!="")
                               
                                                @if($product->product_color_group->product_colors!="[]")
                                                    @foreach($product->product_color_group->product_colors->take(6) as $product_color)

                                                        <li class="d-inline-block circle-rounded-li"><a href="javascript:void(0);"> <span class="dot" style="background-color:{{$product_color->color->color_hex}};"></span></a></li>
                                                        
                                                   
                                                    @endforeach

                                                @endif

                                                @else
                                                   <li class="d-inline-block circle-rounded-li" style="width: 25px;height: 25px;"></span></li>
                                            @endif
                                           
                                            <!-- <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li> -->
                                        </ul>
                                        
                                        <h3 class="product-title">
                                            <a href="Javascript:void(0);" class="text-uppercase">{{$product->default_product_translation->product_name}}</a>
                                        </h3>
                                        
                                        <div class="item-box">
                                            <span>Item - #{{$product->product_id}}</span>
                                        </div>
                                       <!--  <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div> -->
                                        <!-- <hr class="hr"> -->
                                        <div class="working-days">
                                            <span class="">{{$product->default_product_translation->delivery_message}}</span>
                                        </div>

                                        @if($product->product_prices!='[]')

                                              @php
                                                $per_item_price_all=[];
                                                $per_item_sale_price_all=[];
                                                $setup_price_all=[];
                                                foreach($product->product_prices as $product_price){

                                                  $per_item_price = $product_price->per_item_price;
                                                  array_push($per_item_price_all, $per_item_price);

                                                  $per_item_sale_price = $product_price->per_item_sale_price;
                                                  array_push($per_item_sale_price_all,$per_item_sale_price);

                                                  $setup_price = $product_price->setup_price;
                                                  array_push($setup_price_all,$setup_price);
                                                }

                                                $min_per_item_price = min($per_item_price_all);
                                                $min_per_item_sale_price = min($per_item_sale_price_all);
                                                $min_setup_price = min($setup_price_all);
                                              @endphp
                                              @if($min_per_item_price!="")
                                            <div class="price-box">
                                                <span class="price-txt">As Low As</span>
                                                <span class="product-price">${{$min_per_item_price}}</span>
                                            </div>
                                            @elseif($min_per_item_sale_price!="")
                                            <div class="price-box">
                                                <span style="font-weight: 200;">As Low As</span>
                                                <span class="product-price">${{$min_per_item_sale_price}}</span>
                                            </div>
                                            <!-- <div class="price-box"><br></div> -->
                                            @elseif($min_setup_price!="")
                                            <div class="price-box">
                                                <span style="font-weight: 200;">As Low As</span>
                                                <span class="product-price">${{$min_setup_price}}</span>
                                            </div>
                                            @else
                                                <div class="price-box"><br></div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @endforeach

                       

                           
                        </div>
                        <!-- End .row -->

                        <style type="text/css">
                            .toolbox-element{
                                margin-right: 450px;
                            }

                            .line-pagination{
                                border-right: 1px solid #CCCCCC !important;
                            }

                            .page-item.active .page_link {
                                border: 1px solid #212121 !important;
                                color: #212121 !important;
                                margin-left: -8px;
                                height: 38px;
                            }

                            .page-item.active .page_link {
                                background-color: #fff !important;
                            }

                            .toolbox_new .pagination{

                                font-weight: 500;
                                font-size: 14px;
                                line-height: 16px;
                                align-items: center;
                                color: #212121;
                            }

                            .page-link {
                                color: #212121;
                            }

                            .page-link:hover, .page-link:focus {
                                color: #68bee5 !important;
                            }

                            a:not([href]):not([tabindex]):hover {
                                background-color: #68bee5 !important;
                                color: #000000 !important;
                                border-color: #68bee5 !important;
                            }

                            .header-userinfo {
    margin-right: -7px;
}

                        </style>



                        <div class="toolbox_new border-0" style="/*margin-left:403px;*/margin-top: 20px;text-align: center;">
                            <!-- {{ $products->links() }} -->






                            @if ($products->hasPages())
                            <nav class="toolbox toolbox-pagination border-0" style="">
<!-- <ul class="blog-pagenation"> -->
    <ul class="pagination toolbox-item" style="margin-left:25%; border:1px solid #cccccc; height: 40px;">
    {{-- Previous Page Link --}}
    @if ($products->onFirstPage())
        <li class="page-item disabled line-pagination" ><a class="page-link"><i class="fa fa-caret-left" style="margin-top: 2px !important;"></i>&nbsp;&nbsp;Previous</a></li>

    @else
        <li class="page-item line-pagination"><a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev"><i class="fa fa-caret-left" style="margin-top: 2px !important;"></i>&nbsp;&nbsp; Previous</a></li>
       

    @endif

    @if($products->currentPage() > 3)
        <li class="page-item hidden-xs line-pagination"><a class="page-link" href="{{ $products->url(1) }}">1</a></li>
    @endif
    @if($products->currentPage() > 4)
        <li class="page-item line-pagination"><a  class="page-link">...</a></li>
    @endif
    @foreach(range(1, $products->lastPage()) as $i)
        @if($i >= $products->currentPage() - 2 && $i <= $products->currentPage() + 2)
            @if ($i == $products->currentPage())
                <li class="page-item active line-pagination"><a class="page-link page_link active">{{ $i }}</a></li>
            @else
                <li class="page-item line-pagination"><a  class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a></li>
            @endif
        @endif
    @endforeach
    @if($products->currentPage() < $products->lastPage() - 3)
        <li class="page-item line-pagination"><a  class="page-link">...</a></li>
    @endif
    @if($products->currentPage() < $products->lastPage() - 2)
        <li class="page-item hidden-xs line-pagination"><a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($products->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next &nbsp;&nbsp;<i class="fa fa-caret-right" style="margin-top: 2px !important;"></i></a></li>
    @else
        <li class="page-item disabled"><a class="page-link">Next &nbsp;&nbsp;<i class="fa fa-caret-right" style="margin-top: 2px !important;"></i></a></li>
    @endif
</ul>

</nav>
@endif

<!-- caret-right -->
                        </div>
                        
                        <!-- <nav class="toolbox toolbox-pagination border-0" style=""> -->
                                <!-- <ul class="pagination toolbox-item" style="margin-left:403px;"> -->
                                  <!--   <li class="page-item disabled">
                                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><span class="page-link">...</span></li>
                                    <li class="page-item">
                                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                    </li> -->
                                     
                                <!-- </ul> -->
                            
                        <!-- </nav> -->
                    </div>
                    <!-- End .col-lg-9 -->

                    <style type="text/css">
                        .select_fileter_show .cat_list li a{
                            font-weight: normal;
font-size: 18px;
line-height: 21px;

align-items: center;

color: #212121;
                        }
                    </style>

                    <div class="sidebar-overlay"></div>

                    <!-- <aside class="sidebar-shop col-lg-2 order-lg-first mobile-sidebar"> -->
                    <aside class="sidebar-shop order-lg-first mobile-sidebar" style="width: 19% !important;">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a class="text-capitalize" data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-2">Select Filters</a>
                                </h3>

                                <div class="collapse show select_fileter_show" id="widget-body-1">
                                    <div class="widget-body">
                                        <ul class="cat-list cat_list">
                                            @if($pagi_num!="")
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        Product Show : {{ $pagi_num }}
                                                    </a>
                                                    <div style="float: right;" class="remove_pagi_num"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                            <div style="clear: both;"></div>
                                                </li>
                                            @endif


                                                @if($total_categories!="[]")
                                                        @foreach($total_categories as $category)
                                                        @php
                                                            $cat_ids = [];
                                                            array_push($cat_ids,$cat_id);
                                                        @endphp
                                                        @if($cat_id!="" && in_array($category->category_id,$cat_ids))
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                @if($category->category_translation!="")

                                                                category search : {{$category->category_translation->category_name}}

                                                                @endif
                                                            </a>
                                                            <div style="float: right;" class="remove_cat_id" id="{{$category->category_id}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                            
                                                            <div style="clear: both;"></div>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                @endif
                                            


                                            @if($under_dollar_1!="")

                                                <li>
                                                            <a href="javascript:void(0);">
                                                                Under $1 Deals 
                                                            </a>
                                                            <div style="float: right;" class="remove_under_dollar_1"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                            
                                                            <div style="clear: both;"></div>
                                                        </li>
                                            @endif
                                            

                                            @if($search!="")
                                                <li>
                                                            <a href="javascript:void(0);">
                                                                Search : {{$search}}
                                                            </a>
                                                            <div style="float: right;" class="remove_search"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                            
                                                            <div style="clear: both;"></div>
                                                        </li>
                                            @endif

                                            @if($page!="")
                                                <li>
                                                            <a href="javascript:void(0);">
                                                                Page  {{$page}}
                                                            </a>
                                                            <div style="float: right;" class="remove_page"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                            
                                                            <div style="clear: both;"></div>
                                                        </li>
                                            @endif



                                            @if($colors!="[]")
                                            @foreach($colors as $color)

                                                   
                                                     
                                                     @if($color_ids!="" && in_array($color->id,$color_ids))
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                {{$color->name}}
                                                            </a>
                                                            <div style="float: right;" class="remove_color_id_{{$color->id}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                            
                                                            <div style="clear: both;"></div>
                                                        </li>
                                                     @endif
                                                        
                                                    
                                                 
                                            @endforeach
                                            @endif
                                            

                                            <!-- <li>
                                                <a href="#widget-category-1">
                                                    Black
                                                </a>

                                                <div style="float: right;"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                
                                                <div style="clear: both;"></div>
                                            </li> -->

                                        @if($categories!="[]")
                                            @foreach($categories as $category)
                                                     @if($category_ids!="" && in_array($category->category_id,$category_ids))
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                @if($category->category_translation!="")
                                                                    {{$category->category_translation->category_name}}
                                                                @endif
                                                            </a>
                                                            <div style="float: right;" class="remove_category_id_{{$category->category_id}}">
                                                                <a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                            </div>
                                                            
                                                            <div style="clear: both;"></div>
                                                        </li>
                                                                
                                                    @endif
                                           
                                            @endforeach
                                        @endif



                                        <!-- Price Range start -->
                                        @php
                                               $max=max($ranges);
                                               $max_value=$max['max'];
                                               @endphp

                                               
                                               @if($max_value>20)
                                               @foreach($ranges as $key=>$range)
                                               @php
                                                 $count=count($ranges);
                                                @endphp

                                            @if($max_prices!="" && in_array($range['max'],$max_prices))
                                                        
                                            @if($key==0)

                                            <li>
                                                @php
                                                    $max_value = (int) $range['max'];
                                                @endphp
                                                <a href="javascript:void(0);">Under ${{$range['max']}}</a>
                                                <div style="float: right;" class="remove_price_range_{{$max_value}}"><a href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>

                                            @elseif($key==$count-1)
                                            <li>
                                                @php
                                                    $max_value = (int) $range['max'];
                                                @endphp
                                                <a href="javascript:void(0);">&nbsp;Over ${{$range['min']}}</a>
                                                <div style="float: right;" class="remove_price_range_{{$max_value}}"><a href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>

                                            @else

                                            <li>
                                                @php
                                                    $max_value = (int) $range['max'];
                                                @endphp
                                                <a href="javascript:void(0);" >&nbsp;${{$range['min']}} - ${{$range['max']}}</a>
                                                <div style="float: right;" class="remove_price_range_{{$max_value}}"><a href="javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>

                                            @endif

                                            @endif

                                @endforeach
                                @else
                                            <li>
                                                @php
                                                    $max_value = (int) $range['max'];
                                                @endphp
                                                <a href="javascript:void(0);"> &nbsp;Above $200</a>
                                                <div style="float: right;" class="remove_price_range_{{$max_value}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>

                                 @endif
                                        <!-- Price Range Start -->



                                        <!-- Quantity filter show start -->


                                        @php

                                               $qty_max=max($qty_ranges);
                                               $qty_max_value=$qty_max['qty_max'];
                                               @endphp

                                               
                                               @if($qty_max_value>20)
                                               @foreach($qty_ranges as $key=>$range)
                                               @php
                                               $count=count($qty_ranges);
                                            @endphp

                                                @php
                                                     $check_qty="";
                                                     if($max_quantities!="" && in_array($range['qty_max'],$max_quantities)){
                                                        $check_qty="checked";
                                                    }
                                                @endphp


                                            @if($max_quantities!="" && in_array($range['qty_max'],$max_quantities))

                                            @if($key==0)
                                            <li class="product_quantity_li" >
                                                <!-- <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="0" max="{{$range['qty_max']}}" {{$check_qty}}>&nbsp; -->
                                                    
                                                    Min {{$range['qty_max']}}

                                                    @php
                                                        $max_quantity = (int) $range['qty_max'];
                                                    @endphp
                                                    <div style="float: right;" class="remove_product_quantity remove_product_quantity_{{$max_quantity}}" max="{{$max_quantity}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>
                                            @elseif($key==$count-1)
                                            <li  class="product_quantity_li">
                                                <!-- <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="{{$range['qty_min']}}" max="{{$range['qty_max']}}"  {{$check_qty}}>&nbsp; --><!-- Over  -->

                                                {{$range['qty_min']}}

                                                    @php
                                                        $max_quantity = (int) $range['qty_max'];
                                                    @endphp
                                                    <div style="float: right;" class="remove_product_quantity remove_product_quantity_{{$max_quantity}}" max="{{$max_quantity}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>
                                            @else

                                            <li  class="product_quantity_li">
                                                <!-- <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="{{$range['qty_min']}}" max="{{$range['qty_max']}}"  {{$check_qty}}>&nbsp; --><!-- ${{$range['qty_min']}} -  -->
                                                {{$range['qty_max']}}

                                                @php
                                                        $max_quantity = (int) $range['qty_max'];
                                                    @endphp
                                                    <div style="float: right;" class="remove_product_quantity remove_product_quantity_{{$max_quantity}}" max="{{$max_quantity}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>

                                                
                                            </li>

                                            @endif
                                            @endif

                                @endforeach
                                @else
                                            <li  class="product_quantity_li">
                                                <!-- <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="{{$range['qty_min']}}" max="{{$range['qty_max']}}"  {{$check_qty}}> --> &nbsp;Above 200

                                                @php
                                                        $max_quantity = (int) $range['qty_max'];
                                                    @endphp
                                                    <div style="float: right;" class="remove_product_quantity remove_product_quantity_{{$max_quantity}}" max="{{$max_quantity}}"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                <div style="clear: both;"></div>
                                            </li>
                                 @endif


                                        <!-- Quantity filter show end -->








                                        
                                            <li>
                                                <a href="/shop" style="font-family: Roboto;font-style: normal;font-weight: 500;font-size: 16px;line-height: 19px;align-items: center;text-decoration-line: underline;color: #68BEE5;">
                                                    Clear Filters
                                                </a>

                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            

                            <div class="widget">
                                <h3 class="widget-title">
                                <a class="text-capitalize" data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">SubCategories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                        @if($categories!="[]")
                                            @foreach($categories as $category)
                                                @php
                                                     $check="";
                                                     if($category_ids!="" && in_array($category->category_id,$category_ids)){

                                                        $check="checked";
                                                    }
                                            @endphp

                                            <li class="category-li">
                                                <a href="javascript:void(0);">
                                                    <input type="checkbox" name="category_id" value="{{$category->category_id}}" id="{{$category->category_id}}" class="category-checkbox"  {{$check}}>
                                                    <span class="product-category-span-text">&nbsp;
                                                        @if($category->category_translation!="")
                                                        {{$category->category_translation->category_name}}
                                                        @endif
                                                    @if($category->product_count!="")
                                                               ({{$category->product_count->total_product}})
                                                    @else
                                                    (0)
                                                    @endif
                                                    </span>
                                                </a>
                                            </li>

                                            @endforeach
                                        @endif

                                            <!--
                                            <li>
                                                <a href="#widget-category-1">
                                                    <input type="checkbox" name="" class="category-checkbox"><span class="product-category-span-text">&nbsp;&nbsp;Earphone</span>
                                                </a>
                                            </li>

                                             <li>
                                                <a href="#widget-category-1">
                                                    <input type="checkbox" name="" class="category-checkbox"><span class="product-category-span-text">&nbsp;&nbsp;Headphone</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    <input type="checkbox" name="" class="category-checkbox"><span class="product-category-span-text">&nbsp;&nbsp;Pendrive</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    <input type="checkbox" name="" class="category-checkbox"> <span class="product-category-span-text">&nbsp;&nbsp;Cameras</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    <input type="checkbox" name="" class="category-checkbox"> <span class="product-category-span-text">&nbsp;&nbsp;Speakers</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    <input type="checkbox" name="" class="category-checkbox"> <span class="product-category-span-text">&nbsp;&nbsp;Computer Items</span>
                                                </a>
                                            </li> 
                                        -->

                                            <li>
                                                <a style="font-family: Roboto;font-style: normal;font-weight: 500;font-size: 16px;line-height: 19px;align-items: center;text-decoration-line: underline;color: #68BEE5;" href="#widget-category-1">
                                                    See More
                                                </a>
                                            </li>

                                            <li class="text-right">
                                                <a style="font-family: Roboto;font-style: normal;font-weight: 500;font-size: 16px;line-height: 19px;align-items: center;text-decoration-line: underline;color: #68BEE5;" href="javascript:void(0);" class="category_clear_all">
                                                    Clear all
                                                </a>
                                            </li>


                                            <!-- <li>
                                                <a href="#widget-category-2" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-2">
                                                    Electronics<span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-2">
                                                    <ul class="cat-sublist">
                                                        <li>Accessories</li>
                                                        <li>Audio & Video</li>
                                                        <li>Camera & Photo</li>
                                                        <li>Laptops</li>
                                                    </ul>
                                                </div>
                                            </li> -->
                                           <!--  <li>
                                                <a href="#widget-category-3" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-3">
                                                    Fashion<span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-3">
                                                    <ul class="cat-sublist">
                                                        <li>Kids Fashion</li>
                                                        <li>Man</li>
                                                        <li>Woman</li>
                                                    </ul>
                                                </div>
                                            </li> -->
                                            <!-- <li>
                                                <a href="#widget-category-4">
                                                    Furniture
                                                </a>
                                            </li>
                                            <li><a href="#">Gaming</a></li>
                                            <li>
                                                <a href="#widget-category-4" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-4">
                                                    Gifts & Gadgets<span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-4">
                                                    <ul class="cat-sublist">
                                                        <li>Birthday</li>
                                                        <li>For Her</li>
                                                        <li>For Him</li>
                                                        <li>For Kids</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a href="#">Headphones</a></li>
                                            <li>
                                                <a href="#widget-category-5" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-5">
                                                    Home & Garden<span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-5">
                                                    <ul class="cat-sublist">
                                                        <li>Furniture</li>
                                                        <li>Home Accessories</li>
                                                        <li>Lighting</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a href="#">Smartphones</a></li>
                                            <li><a href="#">Sports</a></li>
                                            <li><a href="#">Toys</a></li> -->
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            

                            <div class="widget widget-color">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Sort by Color</a>
                                </h3>

                                <div class="collapse show" id="widget-body-4">
                                    <div class="widget-body pb-0">
                                        <ul class="config-swatch-list">

                                            @if($colors!="[]")
                                            @foreach($colors as $color)

                                                    @php
                                                     $active="";
                                                     if($color_ids!="" && in_array($color->id,$color_ids)){
                                                        $active="active";
                                                    }
                                                 @endphp

                                                <li class="{{$active}} d-inline-flex" id="select_color_{{$color->id}}" value="{{$color->id}}" name='color_id'>
                                                    <a href="Javascript:void(0);" style="background-color: {{$color->color_hex}};margin-right: 10px;border:1px solid gray;border-radius: 2px;"></a><b><p>{{$color->name}}</p></b>
                                                </li><br>

                                            @endforeach
                                            @endif

                                            <!-- <li class="d-inline-flex">
                                                <a href="Javascript:void(0);" style="background-color: #0188cc;margin-right: 10px;"></a>&nbsp;&nbsp;<b><p class="sort-by-color-para">Purple</p></b>
                                            </li><br>
                                            <li class="d-inline-flex">
                                                <a href="Javascript:void(0);" style="background-color: #81d742;margin-right: 10px;"></a>&nbsp;&nbsp;<b><p>White</p></b>
                                            </li><br>
                                            <li class="d-inline-flex">
                                                <a href="Javascript:void(0);" style="background-color: #6085a5;margin-right: 10px;"></a>&nbsp;&nbsp;<b><p>Gray</p></b>
                                            </li><br>
                                            <li class="d-inline-flex">
                                                <a href="Javascript:void(0);" style="background-color: #ab6e6e;margin-right: 10px;"></a>&nbsp;&nbsp;<b><p>Red</p></b>
                                            </li><br>
                                            <li class="d-inline-flex">
                                                <a href="Javascript:void(0);" style="background-color: #ab6e6e;margin-right: 10px;"></a>&nbsp;&nbsp;<b><p>Crem</p></b>
                                            </li> -->
                                            
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->


                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-9" role="button" aria-expanded="true" aria-controls="widget-body-7">Price Range</a>
                                </h3>

                           

                                <div class="collapse show" id="widget-body-9">
                                    <div class="widget-body pb-0  price_range_content">
                                        

                                        <ul class="cat-list">


                                            @php

                                               $max=max($ranges);
                                               $max_value=$max['max'];
                                               @endphp

                                               
                                               @if($max_value>20)
                                               @foreach($ranges as $key=>$range)
                                               @php
                                               $count=count($ranges);
                                            @endphp

                                                @php
                                                     $check="";
                                                     if($max_prices!="" && in_array($range['max'],$max_prices)){
                                                        $check="checked";
                                                    }
                                                @endphp

                                            @if($key==0)
                                            <li class="product_price_li" ><!-- <a href="/shop?category_id=&color_id=&min=0&max={{$range['max']}}"> --><input type="checkbox" name="range_values" class="price-checkbox" min="0" max="{{$range['max']}}" {{$check}}>&nbsp;Under${{$range['max']}}<!-- </a> --></li>
                                            @elseif($key==$count-1)
                                            <li  class="product_price_li" ><!-- <a href="/shop?category_id=&color_id=&min={{$range['min']}}&max={{$range['max']}}"> --><input type="checkbox" name="range_values" class="price-checkbox" min="{{$range['min']}}" max="{{$range['max']}}"  {{$check}}>&nbsp;Over ${{$range['min']}}<!-- </a> --></li>
                                            @else
                                            <li  class="product_price_li"><!-- <a href="/shop?category_id=&color_id=&min={{$range['min']}}&max={{$range['max']}}"> --><input type="checkbox" name="range_values" class="price-checkbox" min="{{$range['min']}}" max="{{$range['max']}}"  {{$check}}>&nbsp;${{$range['min']}} - ${{$range['max']}}<!-- </a> --></li>
                                            @endif

                                @endforeach
                                @else
                                            <li  class="product_price_li"><input type="checkbox" name="range_values" class="price-checkbox" min="{{$range['min']}}" max="{{$range['max']}}"  {{$check}}> &nbsp;Above $200</li>
                                 @endif

                                        </ul>



                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                                    


                            <div class="widget widget-price">
                                <h3 class=" widget-title">
                                    <a data-toggle="collapse" href="#quantity_show_list" role="button" aria-expanded="true" aria-controls="widget-body-3">Quantity</a>
                                </h3>



                                <div class="collapse show" id="quantity_show_list">
                                    <div class="widget-body pb-0 quantity_range_content">

                                        <ul class="quantity-list">


                                            @php

                                               $qty_max=max($qty_ranges);
                                               $qty_max_value=$qty_max['qty_max'];
                                               @endphp

                                               
                                               @if($qty_max_value>20)
                                               @foreach($qty_ranges as $key=>$range)
                                               @php
                                               $count=count($qty_ranges);
                                            @endphp

                                                @php
                                                     $check_qty="";
                                                     if($max_quantities!="" && in_array($range['qty_max'],$max_quantities)){
                                                        $check_qty="checked";
                                                    }
                                                @endphp

                                            @if($key==0)
                                            <li class="product_quantity_li" >
                                                <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="0" max="{{$range['qty_max']}}" {{$check_qty}}>&nbsp;Min ${{$range['qty_max']}}</li>
                                            @elseif($key==$count-1)
                                            <li  class="product_quantity_li" >
                                                <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="{{$range['qty_min']}}" max="{{$range['qty_max']}}"  {{$check_qty}}>&nbsp;<!-- Over  -->${{$range['qty_min']}}</li>
                                            @else
                                            <li  class="product_quantity_li">
                                                <input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="{{$range['qty_min']}}" max="{{$range['qty_max']}}"  {{$check_qty}}>&nbsp;<!-- ${{$range['qty_min']}} -  -->${{$range['qty_max']}}</li>
                                            @endif

                                @endforeach
                                @else
                                            <li  class="product_quantity_li"><input type="checkbox" name="quantity_range_values" class="quantity-checkbox" min="{{$range['qty_min']}}" max="{{$range['qty_max']}}"  {{$check_qty}}> &nbsp;Above 200</li>
                                 @endif

                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            




                            

                            <!-- <div class="widget widget-brand">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-7" role="button" aria-expanded="true" aria-controls="widget-body-7">Brand</a>
                                </h3>

                                <div class="collapse show" id="widget-body-7">
                                    <div class="widget-body pb-0">
                                        <ul class="cat-list">
                                            <li><a href="#">Adidas</a></li>
                                            <li><a href="#">Asics</a></li>
                                            <li><a href="#">Brooks</a></li>
                                            <li><a href="#">Nike</a></li>
                                            <li><a href="#">Puma</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                            </div> -->
                       


                        </div>
                        <!-- End .sidebar-wrapper -->
                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->

            <div class="mb-xl-4 mb-0"></div>
            <!-- margin -->
        </main>
        <!-- End .main -->


        <script type="text/javascript">
            $(document).ready(function(){
                var products = <?php echo json_encode($menu_products); ?>;
               
                $.each(products,function(index,item){
                    
                    $('.wishlist_product_content_'+item.product_id).on('click',function(){

                        var product_id = item.product_id;
                        $.ajax({
                              type: 'post',
                              url:'/wishlist/add',
                              data:{"_token": "{{ csrf_token() }}",'product_id':product_id},
                              success: function (result){
                                if(result!=""){
                 if(result['success']=="true"){
                         
                          var product_id = result['product_id'];
                          $('.wishlist_icon_'+product_id).addClass('fill');
                          $('.wishlist_icon_'+product_id).addClass('fa-heart');
                          
                          $('.wishlist_icon_'+product_id).removeClass('unfill');
                          $('.wishlist_icon_'+product_id).removeClass('fa-heart-o');
                         

                          $.notify('product added into wishlist successfully','success');

                  }else if(result['success']=="false"){
                          
                          var product_id = result['product_id'];
                          $('.wishlist_icon_'+product_id).removeClass('fill');
                          $('.wishlist_icon_'+product_id).removeClass('fa-heart');
                          
                          $('.wishlist_icon_'+product_id).addClass('unfill');
                          $('.wishlist_icon_'+product_id).addClass('fa-heart-o');
                        
                          
                          // alert('product already exist in wishlist');
                          $.notify('product deleted wishlist','danger');
                  }
                }
                              },
                              error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
                            });
                    });
                });
            });
        </script>

        <!-- Color selections -->
        <script type="text/javascript">
            $(document).ready(function(){
                var colors = <?php echo json_encode($colors); ?>;
                $.each(colors,function(index,item){
                    $('#select_color_'+item.id).on('click',function(){
                        if($(this).hasClass("active")){
                            $(this).removeClass('active');
                                var color_ids = $('.config-swatch-list li.active').map(function(_, el) {
                                    return $(el).val();
                                }).get();
                        }else{
                            $(this).addClass('active');
                                var color_ids = $('.config-swatch-list li.active').map(function(_, el) {
                                    return $(el).val();
                                }).get();
                        }
                        var category_ids = <?php echo json_encode($category_ids); ?>;
                        var max = <?php echo json_encode($max_prices);?>;  
                        var min = <?php echo json_encode($min_prices);?>;
                        var page = "{{$page}}";
                        var orderby = "{{$orderby}}";
                        var search = "{{$search}}";
                        var cat_id = "{{$cat_id}}";
                        var pagi_num = "{{$pagi_num}}";
                        var shop_cat_id = "{{$shop_cat_id}}";
                        var max_quantity = <?php echo json_encode($max_quantities);?>;  
                        var min_quantity = <?php echo json_encode($min_quantities);?>;
                        var under_dollar_1 = "{{$under_dollar_1}}";
                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;

                        
                    });
                });
            });
        </script>



<!-- Category Data End -->
<script type="text/javascript">
    $(document).ready(function(){
        $('ul.cat-list .category-li').on('click',function(){
            // alert($(this).find("a input").attr('value'));
            if($(this).find("a input").attr('checked')){
                $(this).find("a input").attr('checked',false);
            }else{
                $(this).find("a input").attr('checked',true);
            }
        });
    });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
            $('ul.cat-list .category-li').click(function() {
                var category_id = $('input[type=checkbox][name=category_id]:checked').map(function(_, el) {
                // alert($(el).val());
                return $(el).val();
            }).get();
            var color_ids = <?php echo json_encode($color_ids); ?>;
            var max = <?php echo json_encode($max_prices);?>;  
            var min = <?php echo json_encode($min_prices);?>;
            var page = "{{$page}}";
            var orderby = "{{$orderby}}";
            var search = "{{$search}}";
            var cat_id = "{{$cat_id}}";
            var pagi_num = "{{$pagi_num}}";
            var shop_cat_id = "{{$shop_cat_id}}";
            var max_quantity = <?php echo json_encode($max_quantities);?>;  
            var min_quantity = <?php echo json_encode($min_quantities);?>;
            var under_dollar_1 = "{{$under_dollar_1}}";
            window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_id+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
        });
    });
</script>

<!-- Category Data End -->

<script type="text/javascript">
                                            $(document).ready(function(){
                                                $('.price_range_content').on("click",'.cat-list .product_price_li',function(){
                                                    if($(this).find('input[type="checkbox"]').is(":checked")){
                                                        $(this).find('input[type="checkbox"]').attr("checked", false);
                                                    }else{
                                                        $(this).find('input[type="checkbox"]').attr("checked", true);
                                                    }
                                                    // range_values
                                                    var max_value = $('input[type=checkbox][name=range_values]:checked').map(function(_, el){
                                                        return $(el).attr('max');
                                                    }).get();

                                                    var min_value = $('input[type=checkbox][name=range_values]:checked').map(function(_, el){
                                                        return $(el).attr('min');
                                                    }).get();

                                                    var color_ids = <?php echo json_encode($color_ids); ?>;
                                                    var category_ids = <?php echo json_encode($category_ids); ?>;
                                                    var page = "{{$page}}";
                                                    var orderby = "{{$orderby}}";
                                                    var search = "{{$search}}";
                                                    var cat_id = "{{$cat_id}}";
                                                    var pagi_num = "{{$pagi_num}}";
                                                    var shop_cat_id = "{{$shop_cat_id}}";
                                                    var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                                    var min_quantity = <?php echo json_encode($min_quantities);?>;
                                                    var under_dollar_1 = "{{$under_dollar_1}}";
                                                    window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min_value+"&max="+max_value+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;

                                                });
                                            });
                                        </script>


                                        <script type="text/javascript">
                                            // category_clear_all
                                            $(document).ready(function(){
                                                $('.category_clear_all').on('click',function(){
                                                    var max = <?php echo json_encode($max_prices);?>;  
                                                    var min = <?php echo json_encode($min_prices);?>;
                                                    var color_ids = <?php echo json_encode($color_ids); ?>;
                                                    var category_ids = <?php echo json_encode($category_ids); ?>;
                                                    var page = "{{$page}}";
                                                    var orderby = "{{$orderby}}";
                                                    var search = "{{$search}}";
                                                    var cat_id = "{{$cat_id}}";
                                                    var pagi_num = "{{$pagi_num}}";
                                                    var shop_cat_id = "{{$shop_cat_id}}";
                                                    var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                                    var min_quantity = <?php echo json_encode($min_quantities);?>;
                                                    var under_dollar_1 = "{{$under_dollar_1}}";
                                                    window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id=&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                                                });
                                            });
                                        </script>

                                        <script type="text/javascript">
                                            //Removing Filter category values start---------
                                            $(document).ready(function(){
                                                var category_ids = <?php echo json_encode($category_ids); ?>;
                                                $.each(category_ids,function(index,category_id){
                                                    $('.remove_category_id_'+category_id).on('click',function(){

                                                        var category_id_new = <?php echo json_encode($category_ids); ?>;
                                                        var index = category_id_new.indexOf(category_id);
                                                        category_id_new.splice(index, 1);

                                                        var max = <?php echo json_encode($max_prices);?>;  
                                                        var min = <?php echo json_encode($min_prices);?>;
                                                        var color_ids = <?php echo json_encode($color_ids); ?>;
                                                        var page = "{{$page}}";
                                                        var orderby = "{{$orderby}}";
                                                        var search = "{{$search}}";
                                                        var cat_id = "{{$cat_id}}";
                                                        var pagi_num = "{{$pagi_num}}";
                                                        var shop_cat_id = "{{$shop_cat_id}}";
                                                        var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                                        var min_quantity = <?php echo json_encode($min_quantities);?>;
                                                        var under_dollar_1 = "{{$under_dollar_1}}";
                                                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_id_new+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                                                    });
                                                });
                                                });
                                            //Removing Filter Category valeus End -----------
                                            

                                            //Removing Filter Color values Start ------------
                                            $(document).ready(function(){
                                                var color_ids = <?php echo json_encode($color_ids); ?>;
                                                $.each(color_ids,function(index,color_id){
                                                    $('.remove_color_id_'+color_id).on('click',function(){

                                                        var color_id_new = <?php echo json_encode($color_ids); ?>;
                                                        var index = color_id_new.indexOf(color_id);
                                                        color_id_new.splice(index,1);

                                                        var max = <?php echo json_encode($max_prices);?>;  
                                                        var min = <?php echo json_encode($min_prices);?>;
                                                        var category_ids = <?php echo json_encode($category_ids); ?>;
                                                        var page = "{{$page}}";
                                                        var orderby = "{{$orderby}}";
                                                        var search = "{{$search}}";
                                                        var cat_id = "{{$cat_id}}";
                                                        var pagi_num = "{{$pagi_num}}";
                                                        var shop_cat_id = "{{$shop_cat_id}}";
                                                        var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                                        var min_quantity = <?php echo json_encode($min_quantities);?>;
                                                        var under_dollar_1 = "{{$under_dollar_1}}";
                                                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_id_new+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                                                    });
                                                });
                                            });
                                            //Removing Filter Color values End -----------------


                                            // Removing Filter Price Range Start ------------
                                            $(document).ready(function(){
                                                
                                                var max_values = <?php echo json_encode($max_prices);?>;
                                                
                                                $.each(max_values,function(index,max_value){
                                                    var max_value_click = parseInt(max_value);
                                                    $('.remove_price_range_'+max_value_click).on('click',function(){
                                                        
                                                        var max_new = <?php echo json_encode($max_prices);?>;  
                                                        var min_new = <?php echo json_encode($min_prices);?>;

                                                        var index = max_new.indexOf(max_value);
                                                        max_new.splice(index,1);
                                                        min_new.splice(index,1);

                                                        var color_ids = <?php echo json_encode($color_ids); ?>;
                                                        var category_ids = <?php echo json_encode($category_ids); ?>;
                                                        var page = "{{$page}}";
                                                        var orderby = "{{$orderby}}";
                                                        var search = "{{$search}}";
                                                        var cat_id = "{{$cat_id}}";
                                                        var pagi_num = "{{$pagi_num}}";
                                                        var shop_cat_id = "{{$shop_cat_id}}";
                                                        var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                                        var min_quantity = <?php echo json_encode($min_quantities);?>;
                                                        var under_dollar_1 = "{{$under_dollar_1}}";
                                                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min_new+"&max="+max_new+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;

                                                    });
                                                });

                                            });
                                            //Removing Filter Price Range End ---------
                                        </script>
<script type="text/javascript">
    //Order by content

    // orderby_content
    $(document).ready(function(){
        $('#orderby_content').change(function(){ 
            var orderby = $(this).val();
            var color_ids = <?php echo json_encode($color_ids); ?>;
            var category_ids = <?php echo json_encode($category_ids); ?>;
            var max = <?php echo json_encode($max_prices);?>;  
            var min = <?php echo json_encode($min_prices);?>;
            var page = "{{$page}}";
            var search = "{{$search}}";
            var cat_id = "{{$cat_id}}";
            var pagi_num = "{{$pagi_num}}";
            var shop_cat_id = "{{$shop_cat_id}}";
            var max_quantity = <?php echo json_encode($max_quantities);?>;  
            var min_quantity = <?php echo json_encode($min_quantities);?>;
            var under_dollar_1 = "{{$under_dollar_1}}";
            window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        var orderby = "{{$orderby}}";
        if(orderby!=""){
            $('#orderby_content option[value='+orderby+']').prop('selected',true);
        }
        

    });
</script>

 <script type="text/javascript">

                            $(window).on('load', function() {
                                // $('.toolbox_new nav').addClass('toolbox toolbox-pagination border-0');
                                // $('.toolbox_new nav ul').addClass('toolbox-item toolbox-element');
                                // $('.toolbox_new nav ul li').addClass('page-item');
                                // $('.toolbox_new nav ul li a').addClass('page-link');

                                $('.toolbox_new nav ul li a').on('click',function(){
                                    var a_href = $(this).attr('href');
                                    page_value = a_href.substring(a_href.indexOf("?")+1);
                                    var page_num = page_value.replace('page=','');

                                    var category_ids = <?php echo json_encode($category_ids); ?>;
                                    var color_ids = <?php echo json_encode($color_ids); ?>;
                                    var max = <?php echo json_encode($max_prices);?>;  
                                    var min = <?php echo json_encode($min_prices);?>;
                                    var orderby = "{{$orderby}}";
                                    var search = "{{$search}}";
                                    var cat_id = "{{$cat_id}}";
                                    var pagi_num = "{{$pagi_num}}";
                                    var shop_cat_id = "{{$shop_cat_id}}";
                                    var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                    var min_quantity = <?php echo json_encode($min_quantities);?>;
                                    var under_dollar_1 = "{{$under_dollar_1}}";
                                    window.location.href = "/shop?page="+page_num+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                                    return false;
                                });



                                $('.upper_paginate ul li a').on('click',function(){
                                    var a_href = $(this).attr('href');
                                    page_value = a_href.substring(a_href.indexOf("?")+1);
                                    var page_num = page_value.replace('page=','');

                                    var category_ids = <?php echo json_encode($category_ids); ?>;
                                    var color_ids = <?php echo json_encode($color_ids); ?>;
                                    var max = <?php echo json_encode($max_prices);?>;  
                                    var min = <?php echo json_encode($min_prices);?>;
                                    var orderby = "{{$orderby}}";
                                    var search = "{{$search}}";
                                    var cat_id = "{{$cat_id}}";
                                    var pagi_num = "{{$pagi_num}}";
                                    var shop_cat_id = "{{$shop_cat_id}}";
                                    var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                    var min_quantity = <?php echo json_encode($min_quantities);?>;
                                    var under_dollar_1 = "{{$under_dollar_1}}";
                                    window.location.href = "/shop?page="+page_num+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                                    return false;
                                });
                            });
                        </script>  

    <script type="text/javascript">
        
        $(document).ready(function(){
            //Remove Page Start -------------
            $('.remove_page').on('click',function(){
                page_num = '';
                var category_ids = <?php echo json_encode($category_ids); ?>;
                var color_ids = <?php echo json_encode($color_ids); ?>;
                var max = <?php echo json_encode($max_prices);?>;  
                var min = <?php echo json_encode($min_prices);?>;
                var orderby = "{{$orderby}}";
                var search = "{{$search}}";
                var cat_id = "{{$cat_id}}";
                var pagi_num = "{{$pagi_num}}";
                var shop_cat_id = "{{$shop_cat_id}}";
                var max_quantity = <?php echo json_encode($max_quantities);?>;  
                var min_quantity = <?php echo json_encode($min_quantities);?>;
                var under_dollar_1 = "{{$under_dollar_1}}";
                window.location.href = "/shop?page="+page_num+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
            });
            //Remove Page End----------------

            //Remove search star ------------------
            $('.remove_search').on('click',function(){
                var category_ids = <?php echo json_encode($category_ids); ?>;
                var color_ids = <?php echo json_encode($color_ids); ?>;
                var max = <?php echo json_encode($max_prices);?>;  
                var min = <?php echo json_encode($min_prices);?>;
                var orderby = "{{$orderby}}";
                var search = "";
                var page = "{{$page}}";
                var cat_id = "{{$cat_id}}";
                var pagi_num = "{{$pagi_num}}";
                var shop_cat_id = "{{$shop_cat_id}}";
                var max_quantity = <?php echo json_encode($max_quantities);?>;  
                var min_quantity = <?php echo json_encode($min_quantities);?>;
                var under_dollar_1 = "{{$under_dollar_1}}";
                window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
            });
            //Remove search end -------------------
        });
    </script>


    <script type="text/javascript">
        //Header part start============================================

        //Search top
        $(document).ready(function(){
            $('.header_search_button').on('click',function(){

                var search = $('.header_search_input').val();
                var page = "{{$page}}";
                var category_ids = <?php echo json_encode($category_ids); ?>;
                var color_ids = <?php echo json_encode($color_ids); ?>;
                var max = <?php echo json_encode($max_prices);?>;  
                var min = <?php echo json_encode($min_prices);?>;
                var orderby = "{{$orderby}}";
                var cat_id = "{{$cat_id}}";
                var pagi_num = "{{$pagi_num}}";
                var shop_cat_id = "{{$shop_cat_id}}";
                var max_quantity = <?php echo json_encode($max_quantities);?>;  
                var min_quantity = <?php echo json_encode($min_quantities);?>;
                var under_dollar_1 = "{{$under_dollar_1}}";
                window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
            });

            $('.header_search_input').on('keypress',function(e) {
                if(e.which == 13) {
                    var search = $(this).val();
                    var page = "{{$page}}";
                    var category_ids = <?php echo json_encode($category_ids); ?>;
                    var color_ids = <?php echo json_encode($color_ids); ?>;
                    var max = <?php echo json_encode($max_prices);?>;  
                    var min = <?php echo json_encode($min_prices);?>;
                    var orderby = "{{$orderby}}";
                    var cat_id = "{{$cat_id}}";
                    var pagi_num = "{{$pagi_num}}";
                    var shop_cat_id = "{{$shop_cat_id}}";
                    var max_quantity = <?php echo json_encode($max_quantities);?>;  
                    var min_quantity = <?php echo json_encode($min_quantities);?>;
                    var under_dollar_1 = "{{$under_dollar_1}}";
                    window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                }
            });

            //search start ------------
                var search = "{{$search}}";
                if(search!=""){
                    $('.header_search_input').val(search);
                }
            //search end --------------

            //category_select_start
                    $('.header_category_select').change(function(){
                        var cat_id = $(this).val();
                        var search = "{{$search}}";
                        var page = "{{$page}}";
                        var category_ids = <?php echo json_encode($category_ids); ?>;
                        var color_ids = <?php echo json_encode($color_ids); ?>;
                        var max = <?php echo json_encode($max_prices);?>;  
                        var min = <?php echo json_encode($min_prices);?>;
                        var orderby = "{{$orderby}}";
                        var pagi_num = "{{$pagi_num}}";
                        var shop_cat_id = "{{$shop_cat_id}}";
                        var max_quantity = <?php echo json_encode($max_quantities);?>;  
                        var min_quantity = <?php echo json_encode($min_quantities);?>;
                        var under_dollar_1 = "{{$under_dollar_1}}";
                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                    });
            //category select end

            //selected cat id start--------
                    var cat_id = "{{$cat_id}}";
                    if(cat_id!=""){
                        $('.header_category_select option[value='+cat_id+']').prop('selected',true);
                    }
            //selected cat id end----------

            //Remove cat_id start------
                    $('.remove_cat_id').on('click',function(){
                        var cat_id = "";
                        var search = "{{$search}}";
                        var page = "{{$page}}";
                        var category_ids = <?php echo json_encode($category_ids); ?>;
                        var color_ids = <?php echo json_encode($color_ids); ?>;
                        var max = <?php echo json_encode($max_prices);?>;  
                        var min = <?php echo json_encode($min_prices);?>;
                        var orderby = "{{$orderby}}";
                        var pagi_num = "{{$pagi_num}}";
                        var shop_cat_id = "{{$shop_cat_id}}";
                        var max_quantity = <?php echo json_encode($max_quantities);?>;  
                        var min_quantity = <?php echo json_encode($min_quantities);?>;
                        var under_dollar_1 = "{{$under_dollar_1}}";
                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
                    });
            //Remove cat_id end ----


        });

        //Header part end =====================================
    </script>

    <script type="text/javascript">
    // divided_by_grid
    // divided_by_list
    $(document).ready(function(){
        $('.divided_by_list').hide();

        $('#grid_icon').on('click',function(){
            $('.divided_by_grid').show();
            $('.divided_by_list').hide();
            $(this).addClass('active');
            $('#list_icon').removeClass('active');
        });

        $('#list_icon').on('click',function(){
            $('.divided_by_grid').hide();
            $('.divided_by_list').show();
            $(this).addClass('active');
            $('#grid_icon').removeClass('active');
        });
    });

    $(document).ready(function(){
        $('.show_paginate_by_number').on('click',function(){
            var pagi_num = $(this).attr('name');
            var cat_id = "{{$cat_id}}";
            var search = "{{$search}}";
            var page = "";
            var category_ids = <?php echo json_encode($category_ids); ?>;
            var color_ids = <?php echo json_encode($color_ids); ?>;
            var max = <?php echo json_encode($max_prices);?>;  
            var min = <?php echo json_encode($min_prices);?>;
            var orderby = "{{$orderby}}";
            var shop_cat_id = "{{$shop_cat_id}}";
            var max_quantity = <?php echo json_encode($max_quantities);?>;  
            var min_quantity = <?php echo json_encode($min_quantities);?>;
            var under_dollar_1 = "{{$under_dollar_1}}";
            window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
        })
    });
</script>

<script type="text/javascript">
        $(document).ready(function(){
        $('.shop_by_category_id').on('click',function(){
            shop_cat_id = $(this).attr('category_id');
            var pagi_num = "{{$pagi_num}}";
            var cat_id = "{{$cat_id}}";
            var search = "{{$search}}";
            var page = "{{$page}}";
            var category_ids = <?php echo json_encode($category_ids); ?>;
            var color_ids = <?php echo json_encode($color_ids); ?>;
            var max = <?php echo json_encode($max_prices);?>;  
            var min = <?php echo json_encode($min_prices);?>;
            var orderby = "{{$orderby}}";
            var max_quantity = <?php echo json_encode($max_quantities);?>;  
            var min_quantity = <?php echo json_encode($min_quantities);?>;
            var under_dollar_1 = "{{$under_dollar_1}}";
            window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
        })
    });
</script>

<script type="text/javascript">
    //Remove Pagination Number

    $('.remove_pagi_num').on('click',function(){
            var pagi_num = "";
            var shop_cat_id = "{{$shop_cat_id}}";
            var cat_id = "{{$cat_id}}";
            var search = "{{$search}}";
            var page = "{{$page}}";
            var category_ids = <?php echo json_encode($category_ids); ?>;
            var color_ids = <?php echo json_encode($color_ids); ?>;
            var max = <?php echo json_encode($max_prices);?>;  
            var min = <?php echo json_encode($min_prices);?>;
            var orderby = "{{$orderby}}";
            var max_quantity = <?php echo json_encode($max_quantities);?>;  
            var min_quantity = <?php echo json_encode($min_quantities);?>;
            var under_dollar_1 = "{{$under_dollar_1}}";
            window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;
    });


</script>

    

<script type="text/javascript">
                                             $(document).ready(function(){
                                                $('.quantity_range_content').on("click",'.quantity-list .product_quantity_li',function(){

                                                    // range_values
                                                    var qty_max_value = $('input[type=checkbox][name=quantity_range_values]:checked').map(function(_, el){
                                                        return $(el).attr('max');
                                                    }).get();

                                                    var qty_min_value = $('input[type=checkbox][name=quantity_range_values]:checked').map(function(_, el){
                                                        return $(el).attr('min');
                                                    }).get();


                                                    var color_ids = <?php echo json_encode($color_ids); ?>;
                                                    var category_ids = <?php echo json_encode($category_ids); ?>;
                                                    var page = "{{$page}}";
                                                    var orderby = "{{$orderby}}";
                                                    var search = "{{$search}}";
                                                    var cat_id = "{{$cat_id}}";
                                                    var pagi_num = "{{$pagi_num}}";
                                                    var shop_cat_id = "{{$shop_cat_id}}";
                                                    var max = <?php echo json_encode($max_prices);?>;  
                                                    var min = <?php echo json_encode($min_prices);?>;
                                                    var under_dollar_1 = "{{$under_dollar_1}}";
                                                    window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+qty_max_value+"&min_quantity="+qty_min_value+"&under_dollar_1="+under_dollar_1;

                                                });
                                             });
                                    </script>



                                    <script type="text/javascript">

                                            $(document).ready(function(){
                                                $('.remove_product_quantity').on('click',function(){
                                                    max_value_qty = $(this).attr('max');

                                                    var max_value_click = parseInt(max_value_qty);
                                                        
                                                        var max_quantity_new = <?php echo json_encode($max_quantities);?>;  
                                                        var min_quantity_new = <?php echo json_encode($min_quantities);?>;

                                                        
                                                        var index = max_quantity_new.indexOf(max_value_click);
                                                        max_quantity_new.splice(index,1);
                                                        min_quantity_new.splice(index,1);


                                                        var max = <?php echo json_encode($max_prices);?>;  
                                                        var min = <?php echo json_encode($min_prices);?>;
                                                        var color_ids = <?php echo json_encode($color_ids); ?>;
                                                        var category_ids = <?php echo json_encode($category_ids); ?>;
                                                        var page = "{{$page}}";
                                                        var orderby = "{{$orderby}}";
                                                        var search = "{{$search}}";
                                                        var cat_id = "{{$cat_id}}";
                                                        var pagi_num = "{{$pagi_num}}";
                                                        var shop_cat_id = "{{$shop_cat_id}}";
                                                        var under_dollar_1 = "{{$under_dollar_1}}";

                                                        window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity_new+"&min_quantity="+min_quantity_new+"&under_dollar_1="+under_dollar_1;
                                                });
                                            });
                                            
                                        </script>

                                        <script type="text/javascript">
                                            // remove_under_dollar_1


                                            $(document).ready(function(){
                                                $('.remove_under_dollar_1').on("click",function(){
                                                    var under_dollar_1 = "";

                                                    var color_ids = <?php echo json_encode($color_ids); ?>;
                                                    var category_ids = <?php echo json_encode($category_ids); ?>;
                                                    var page = "{{$page}}";
                                                    var orderby = "{{$orderby}}";
                                                    var search = "{{$search}}";
                                                    var cat_id = "{{$cat_id}}";
                                                    var pagi_num = "{{$pagi_num}}";
                                                    var shop_cat_id = "{{$shop_cat_id}}";
                                                    var max = <?php echo json_encode($max_prices);?>;  
                                                    var min = <?php echo json_encode($min_prices);?>;
                                                    var max_quantity = <?php echo json_encode($max_quantities);?>;  
                                                    var min_quantity = <?php echo json_encode($min_quantities);?>;
                                                    window.location.href = "/shop?page="+page+"&search="+search+"&cat_id="+cat_id+"&category_id="+category_ids+"&color_id="+color_ids+"&min="+min+"&max="+max+"&orderby="+orderby+"&pagi_num="+pagi_num+"&shop_cat_id="+shop_cat_id+"&max_quantity="+max_quantity+"&min_quantity="+min_quantity+"&under_dollar_1="+under_dollar_1;

                                                });
                                             });

                                        </script>

@endsection