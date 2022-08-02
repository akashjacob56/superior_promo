@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription')
    @section('description')
        @section('content')

            <style type="text/css">
                .displayNone {
                    display: none !important;
                }

            </style>

            <!-- Slider -->
            <style type="text/css">

                .color-67a03c {
                    font-family: Roboto !important;
                    font-style: normal !important;
                    font-weight: 500 !important;
                    font-size: 14px !important;
                    line-height: 16px !important;
                    letter-spacing: -0.017em !important;
                    color: #67A03C !important;
                }

                .product-cont::before {
                    border-bottom: 1px solid #eaeaea;
                }

                .as_low_as_span {
                    font-family: Roboto !important;
                    font-style: normal !important;
                    font-weight: 500 !important;
                    font-size: 16px !important;
                    line-height: 16px !important;
                    letter-spacing: -0.017em !important;
                }

                .category-content h3 {
                    text-transform: capitalize;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 12px;
                    line-height: 14px;
                    letter-spacing: -0.017em;
                    color: #212121;
                }

                .fill {
                    font-size: 13px;
                    color: #68bee5 !important;
                }

                .unfill {
                    font-size: 13px;
                    color: #000000 !important;
                }

                .fillcolor {
                    color: #68bee5 !important;
                }

                /*.category-content .item-id .item-content{
                  color:#575757;
                }*/

                #myTab .nav-link {
                    background-color: #fff !important;
                }

                #myTab {
                    margin-bottom: 20px;
                    width: 100%;
                }

                .nav.nav-tabs .nav-item .nav-link {
                    border-bottom: 1px solid #eaeaea;
                }

                .nav.nav-tabs .nav-item .nav-link.active {
                    border-bottom: 1px solid #44EFA0 !important;
                }


                .nav.nav-tabs .nav-item {
                    margin-top: -3rem;
                }

                .btn-view-all {
                    padding: 0.5rem 1rem !important;
                    font-size: 1rem !important;
                    min-width: 80px !important;

                    margin-bottom: 5px;
                }

                /* .owl-carousel .owl-nav button.owl-prev{
                   display: none;
                 }*/
                /*.owl-carousel .owl-item img.happy {
                display: block;
                width: 50%;
            }*/


                .owl-carousel .owl-nav button.owl-next {
                    background: #FFFFFF !important;
                    border: 1px solid #E1E1E1 !important;
                    box-sizing: border-box !important;
                    padding: 1rem 0.7rem !important;
                    right: -33px;
                }

                .owl-carousel .owl-nav button.owl-prev {
                    background: #FFFFFF !important;
                    border: 1px solid #E1E1E1 !important;
                    box-sizing: border-box !important;
                    padding: 1rem 0.7rem !important;
                    left: -40px;
                }

                .owl-carousel .owl-item img.happy {
                    display: block;
                    width: 94%;
                    padding: 10px;
                    border: 1px solid #E1E1E1 !important;
                    padding-top: 40px;
                    padding-bottom: 40px;
                }

                .fa-shopping-cart:before {
                    content: "\f07a";
                }

                /*   .owl-carousel .owl-nav button.owl-next{
               display: none;
                   }*/
                .owl-carousel .owl-item img {

                }

                .btn-sm {
                    min-width: 105px !important;
                }

                .margin-right {
                    margin-right: 35px !important;
                    text-align: -webkit-center;
                }

                .product-price {
                    font-size: 14px;
                    color: #67A03C !important;
                }

                .product-default .btn-add-cart:hover {
                    color: #000000 !important;
                }

                .product-default:hover .btn-add-cart {
                    border-color: #597b9a !important;
                    background-color: #ffffff !important;
                    color: #fff !important;
                }


                .product-category {
                    border: 1px solid #ddd;
                }


                .banner-offer {
                    overflow: hidden;
                    background-size: cover;
                    background-position: center;
                }

                .category-content {
                    position: relative !important;
                }

                .inner-quickview .product-details {

                    align-items: center;
                }

                .promo-section {
                    padding: 16rem 0;
                }

                .section-title {
                    margin-top: 2rem !important;
                }

                .category-content {
                    color: #465157 !important;
                }


                .vshopy-product-image:hover .hovr-img {
                    -webkit-transition: all 0.5s ease;
                    transition: all 0.5s ease;
                }

                .vshopy-product-image:hover .hovr-img {
                    -webkit-transform: scale(1.06);
                    transform: scale(1.06);
                }


                .title {

                    color: #444444;
                    font-size: 18px;
                    font-weight: bold;
                    margin-bottom: 20px;
                    text-transform: uppercase;
                    display: inline-block;
                    line-height: 1;
                    background-repeat: no-repeat;
                    -webkit-text-fill-color: transparent;

                    background-image: -webkit-linear-gradient(transparent, transparent), url(/files/assets/images/3.gif) !important;
                }

                .max_view_products {

                    margin-top: 5px !important;
                }

                .margin {
                    margin-top: 0px !important;
                }

                /*.sub-drop-menu .sm-nowrap:hover{
                  background-color: #000000;
                  }*/
                .margin-section {
                    margin-bottom: 40px;
                }

                .padding-5 {
                    padding-right: 5px !important;
                    padding-left: 5px !important;
                }

                .margin-about {
                    margin: 30px 0px 30px 0px;
                }


                .box-shadow {

                    padding: 5px !important;

                }


                .old-price {
                    color: #919aa3;
                    text-decoration: line-through;
                    font-size: 80%;
                }

                #top_categories {
                    padding: 0px !important;
                }

                .circle {
                    background-size: cover !important;
                    border-radius: 50% 50% 50% 50% !important;
                    width: 100px !important;
                    height: 100px !important;
                    /*object-fit: contain !important;*/
                }


                .card {
                    margin: 3px 33px 3px 33px !important;
                }


                /*.business_top:hover{
                  background: #4C76F1;
                  }*/

                /*top business*/

                @media only screen and (max-width: 1599px) and (min-width: 1500px) {

                    .top_business_image {
                        max-height: 190px !important;
                    }
                }


                @media only screen and (max-width: 1399px) and (min-width: 768px) {
                    .top_business_image {
                        max-height: 170px !important;
                    }
                }


                @media only screen and (max-width: 1499px) and (min-width: 1400px) {
                    .top_business_image {
                        max-height: 180px !important;
                    }
                }


                @media only screen and (max-width: 1799px) and (min-width: 1600px) {
                    .top_business_image {
                        max-height: 200px !important;
                    }
                }


                @media only screen and (max-width: 1999px) and (min-width: 1800px) {
                    .top_business_image {
                        max-height: 220px !important;
                    }
                }


                @media only screen and (max-width: 2099px) and (min-width: 2000px) {
                    .top_business_image {
                        max-height: 240px !important;
                    }
                }


                @media only screen and (max-width: 2499px) and (min-width: 2200px) {
                    .top_business_image {
                        max-height: 260px !important;
                    }
                }


                @media only screen and (min-width: 3000px) {
                    .top_business_image {
                        max-height: 280px !important;
                    }
                }


                @media only screen and (max-width: 767px) {

                    .top_business_image {
                        max-height: 280px !important;
                    }
                }


                .top_business {
                    display: table !important;
                    width: 100% !important;
                }


                @media only screen and (max-width: 1599px) and (min-width: 1500px) {
                    .top_business {
                        height: 190px !important;
                    }
                }

                @media only screen and (max-width: 1399px) and (min-width: 768px) {
                    .top_business {
                        height: 170px !important;
                    }
                }


                @media only screen and (max-width: 1499px) and (min-width: 1400px) {
                    .top_business {
                        height: 180px !important;
                    }
                }


                @media only screen and (max-width: 1799px) and (min-width: 1600px) {
                    .top_business {
                        height: 200px !important;
                    }
                }


                @media only screen and (max-width: 1999px) and (min-width: 1800px) {
                    .top_business {
                        height: 170px !important;
                    }
                }


                @media only screen and (max-width: 2099px) and (min-width: 2000px) {
                    .top_business {
                        height: 190px !important;
                    }
                }


                @media only screen and (max-width: 2499px) and (min-width: 2200px) {
                    .top_business {
                        height: 200px !important;
                    }
                }


                @media only screen and (min-width: 3000px) {
                    .top_business {
                        height: 220px !important;
                    }
                }

                @media only screen and (max-width: 767px) {
                    .top_business {
                        height: 200px !important;
                    }
                }

                /*categories*/

                @media only screen and (max-width: 1599px) and (min-width: 1500px) {

                    .product_image_collection {
                        max-height: 205px !important;
                    }
                }


                @media only screen and (max-width: 1399px) and (min-width: 768px) {
                    .product_image_collection {
                        max-height: 205px !important;
                    }
                }


                @media only screen and (max-width: 1499px) and (min-width: 1400px) {
                    .product_image_collection {
                        max-height: 205px !important;
                    }
                }


                @media only screen and (max-width: 1799px) and (min-width: 1600px) {
                    .product_image_collection {
                        max-height: 200px !important;
                    }
                }


                @media only screen and (max-width: 1999px) and (min-width: 1800px) {
                    .product_image_collection {
                        max-height: 215px !important;
                    }
                }


                @media only screen and (max-width: 2099px) and (min-width: 2000px) {
                    .product_image_collection {
                        max-height: 225px !important;
                    }
                }


                @media only screen and (max-width: 2499px) and (min-width: 2200px) {
                    .product_image_collection {
                        max-height: 235px !important;
                    }
                }


                @media only screen and (min-width: 3000px) {
                    .product_image_collection {
                        max-height: 280px !important;
                    }
                }


                @media only screen and (max-width: 767px) {

                    .product_image_collection {
                        max-height: 150px !important;
                    }
                }


                .product_image_collection {
                    display: table !important;
                    width: 100% !important;
                }


                @media only screen and (max-width: 1599px) and (min-width: 1500px) {
                    .product_collection {
                        height: 205px !important;
                    }
                }

                @media only screen and (max-width: 1399px) and (min-width: 768px) {
                    .product_collection {
                        height: 205px !important;
                    }
                }


                @media only screen and (max-width: 1499px) and (min-width: 1400px) {
                    .product_collection {
                        height: 205px !important;
                    }
                }


                @media only screen and (max-width: 1799px) and (min-width: 1600px) {
                    .product_collection {
                        height: 205px !important;
                    }
                }


                @media only screen and (max-width: 1999px) and (min-width: 1800px) {
                    .product_collection {
                        height: 215px !important;
                    }
                }


                @media only screen and (max-width: 2099px) and (min-width: 2000px) {
                    .product_collection {
                        height: 225px !important;
                    }
                }


                @media only screen and (max-width: 2499px) and (min-width: 2200px) {
                    .product_collection {
                        height: 235px !important;
                    }
                }

                @media only screen and (max-width: 1024px) and (min-width: 768px) {
                    .product_collection {
                        height: 205px !important;
                    }

                    .home-slider {
                        height: 30vh !important;
                    }

                    .home-slider-image {
                        min-height: 30vh !important;
                        height: 30vh !important;
                    }

                }


                @media only screen and (min-width: 3000px) {
                    .product_collection {
                        height: 290px !important;
                    }
                }

                @media only screen and (max-width: 767px) {
                    .product_collection {
                        height: 150px !important;
                    }

                    .home-slider {
                        height: 30vh !important;
                    }

                    .home-slider-image {
                        min-height: 30vh !important;
                        height: 30vh !important;
                    }
                }


                .product_image_collection {
                    margin-top: 10px;
                }

                @media only screen and (min-width: 769px) {
                    .banner-image {
                        height: 350px !important;
                        width: 100% !important;
                    }

                    .banners-slider img {
                        min-height: 220px;
                        object-fit: cover;
                        height: 220px;
                    }

                    .img-offer-blocks {
                        height: 500px;
                        object-fit: cover;
                    }

                    .product-list {
                        flex: 0 0 49%;
                        max-width: 49%;
                        margin-right: 4px;
                        margin-left: 4px;
                    }
                }


                .img-to-bg {
                    height: 100% !important;
                    width: 100% !important;

                }

                .img-fluid {
                    max-width: 100%;
                    height: auto;
                }

                .filled {
                    color: #ffba57;
                }

                .non-filled {
                    color: #cacaca;
                }

                .product-cell {
                    display: table-cell !important;
                    vertical-align: middle !important;
                    text-align: center !important;
                }

                @media only screen and (max-width: 767px) {

                    .image-size {

                        height: 160px !important;
                    }

                }

                @media only screen and (min-width: 768px) {
                    .image-size {

                        height: 236px !important;
                    }

                    .slide-bg {
                        height: 80vh;
                    }
                }

                img {
                    vertical-align: middle !important;
                    border-style: none !important;
                }

                #new_arrival {
                    display: table !important;
                    width: 100% !important;
                }


                #brand-image {
                    display: table !important;
                    width: 100% !important;
                }


                #brand-image {
                    height: 100px !important;
                }

                .brand-image {
                    max-height: 100px !important;
                }

                .banner-product-middle {
                    padding: 15rem;
                }

                .banner-product-top {
                    padding: 10rem;
                    margin-bottom: 1.6rem !important;
                }

                .banner-product-side {
                    padding: 20rem;

                }

                .banner-product-bottom {
                    padding: 15rem;
                }

                .banner-offer-two {
                    padding-left: 8rem !important;
                    padding-right: 8rem !important;
                    padding-top: 2rem !important;
                    margin-bottom: 1.6rem !important;
                    padding-bottom: 17.2rem !important;
                }


                @media only screen and (max-width: 1399px) and (min-width: 768px) {

                    .banner-offer-two {
                        padding-left: 8rem !important;
                        padding-right: 8rem !important;
                        padding-top: 2rem !important;
                        margin-bottom: 1.6rem !important;
                        padding-bottom: 16.2rem !important;
                    }

                    .banner-product-side {
                        padding: 19rem !important;

                    }

                }

                @media only screen and (max-width: 1479px) and (min-width: 1270px) {
                    .banner-product-top {
                        padding: 10rem !important;
                        margin-bottom: 1.6rem !important;
                    }

                    .banner-product-middle {
                        padding: 15rem !important;
                    }

                    .banner-product-side {
                        padding: 20rem !important;

                    }

                    .banner-offer-two {
                        padding-left: 8rem !important;
                        padding-right: 8rem !important;
                        padding-top: 2rem !important;
                        margin-bottom: 1.6rem !important;
                        padding-bottom: 17.2rem !important;
                    }

                    .banner-product-bottom {
                        padding: 17rem;
                    }
                }

                @media only screen and (max-width: 1679px) and (min-width: 1480px) {
                    .banner-product-top {
                        padding: 11rem !important;
                        margin-bottom: 1.6rem !important;
                    }

                    .banner-product-middle {
                        padding: 16.5rem !important;
                    }

                    .banner-product-side {
                        padding: 20rem !important;

                    }

                    .banner-offer-two {
                        padding-left: 8rem !important;
                        padding-right: 8rem !important;
                        padding-top: 2rem !important;
                        margin-bottom: 1.6rem !important;
                        padding-bottom: 17.2rem !important;
                    }

                    .banner-product-bottom {
                        padding: 19rem;
                    }
                }

                @media only screen and (max-width: 1919px) and (min-width: 1680px) {
                    .banner-product-top {
                        padding: 12rem !important;
                        margin-bottom: 1.6rem !important;
                    }

                    .banner-product-middle {
                        padding: 17.5rem !important;
                    }

                    .banner-product-side {
                        padding: 22.5rem;

                    }

                    .banner-offer-two {
                        padding-left: 8rem !important;
                        padding-right: 8rem !important;
                        padding-top: 2.5rem !important;
                        margin-bottom: 1.6rem !important;
                        padding-bottom: 18.2rem !important;
                    }

                    .banner-product-bottom {
                        padding: 21rem;
                    }
                }

                @media only screen and (max-width: 2400px) and (min-width: 1920px) {
                    .banner-product-top {
                        padding: 13rem !important;
                        margin-bottom: 1.6rem !important;
                    }

                    .banner-product-middle {
                        padding: 18.5rem !important;
                    }

                    .banner-product-side {
                        padding: 23.5rem;

                    }

                    .banner-offer-two {
                        padding-left: 8rem !important;
                        padding-right: 8rem !important;
                        padding-top: 3.5rem !important;
                        margin-bottom: 1.6rem !important;
                        padding-bottom: 19.2rem !important;
                    }

                    .banner-product-bottom {
                        padding: 23rem !important;
                    }
                }


                .nav.nav-tabs .nav-item .nav-link.active {
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 20px;
                    line-height: 16px;
                    color: #212121 !important;
                }

                .nav.nav-tabs .nav-item .nav-link {
                    padding: 0 0rem 1.6rem;
                    border: 0;
                    border-bottom: 0px solid transparent;
                    color: #222529;
                    font: 600 1.6rem/1 "Open Sans", sans-serif;
                    letter-spacing: -.01rem;
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 20px;
                    line-height: 16px;
                    color: #575757;
                }

                .top-text {
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 20px;
                    line-height: 23px;
                    color: #212121;
                }

            </style>

            <style type="text/css">
                .btn-add-cart-css {


                    font-size: 15px;
                    background: #FFFFFF;
                    border: 1px solid #E1E1E1;
                    box-sizing: border-box;
                    padding: 7px 20px 7px 20px;

                }

                .btn-add-cart-css:hover {
                    border-color: #000000 !important;
                    color: #000000 !important;

                }

                .btn-add-cart-css a:hover {
                    color: #000000 !important;
                }


                .product-title b {
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 12px;
                    line-height: 14px;
                    letter-spacing: -0.017em;
                    color: #212121;
                }

                .item-txt {
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: 300;
                    font-size: 12px;
                    line-height: 14px;
                    letter-spacing: -0.017em;
                    color: #575757;
                }

            </style>

            <style type="text/css">
                .product-default a {
                    color: #212121;
                }

                .section_title_happy_customer {
                    background-image: linear-gradient(to left, rgba(0, 0, 0, 0.08) 89%, rgb(124, 196, 236) 89%);
                    background-size: 100% 1px;
                    background-repeat: no-repeat;
                    background-position: 0% 100%;
                }


                .row.row-3ban [class*='col-'] {
                    padding-right: 5px !important;
                    padding-left: 5px !important;
                }


                .line-b-li {
                    width: 28px;
                    height: 0px;
                    border: 1px solid #E1E1E1;
                    transform: rotate(90deg);
                    position: relative;
                    bottom: 20px;
                }

                .brand-txt {
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 12px;
                    line-height: 14px;
                    letter-spacing: -0.017em;
                    color: #212121;
                }

                .d-msg-txt {
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: 300;
                    font-size: 10px;
                    line-height: 12px;
                    letter-spacing: -0.017em;
                    color: #575757;
                }


            </style>

            <script type="text/javascript">
              recent_view_products =<?php echo json_encode($data['recent_view_products']);?>;
              max_view_product =<?php echo json_encode($data['max_view_products']);?>;
              new_arrival_products =<?php echo json_encode($data['latest_products']);?>;
              categories =<?php echo json_encode($data['categories']);?>;
            </script>
            <!-- Slider -->
            <main class="main">
                @php
                    $length="";
                    $length=count($data['slider']);

                @endphp

                @if($length>0)
                    <!-- brands-slider owl-carousel bg-white owl-theme nav-circle images-center -->
                    <div class="home-top-container">
                        @if($data['slider']!="")
                            <div class="home-slider owl-carousel owl-theme owl-carousel-lazy">
                                @foreach($data['slider'] as $slider)

                                    <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">

                                        <div class="">
                                            <img class="home-slider-image"
                                                 src="/storage/app/{{$slider->default_slider_translation->slider_image}}"
                                                 alt="slider image">
                                            <div class="home-slide-content container">

                                            </div><!-- End .home-slide-content -->
                                        </div><!-- End .home-slide -->

                                    </a>

                                @endforeach
                            </div>
                        @endif

                        @endif

                        @php
                            $length="";
                            $length=count($data['offer_blocks']);


                        @endphp
                        @if($data['offer_blocks']!="")
                            <section class="home-products-intro mt-3 mb-5">
                                <div class="container">
                                    <div class="row row-sm row-3ban">
                                        @foreach($data['offer_blocks']->slice(0, 3) as $offer_block)
                                            @php
                                                $offer_block_temp=$offer_block;

                                                if($offer_block->offer_block_translation!=""){
                                                $offer_block=$offer_block->offer_block_translation;
                                              }else{
                                              $offer_block=$offer_block->default_offer_block_translation;
                                            }
                                            @endphp


                                            <div class="col-xl-4">
                                                <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">
                                                    <div class="banner-product banner-product-top banner-offer"
                                                         style="background-image: url('/storage/app/{{$offer_block->offer_block_image}}');background-position : 36%;">

                                                        <div class="mr-5">

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </section>
                        @endif


                        <style type="text/css">
                            .btn-view-all-1 {
                                height: 30px;
                                width: 77px;
                                font-family: Roboto;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 14px;
                                line-height: 16px;
                                letter-spacing: -0.017em;
                                background-color: #68bee5;
                                border: 1px solid #68bee5;
                                color: #FFFFFF;
                                margin-bottom: 10px;

                            }
                        </style>


                        <section class="new-products-section mb-5">
                            <div class="container">
                                <button class=" btn-view-all-1" style="float: right;margin-top: 18px;"><a
                                            href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=newness&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">View
                                        All</a></button>
                                <!-- <div class="section-title mb-2">
      <h2>@lang("product.latest_products") &nbsp;&nbsp;&nbsp;&nbsp;Best Selling &nbsp;&nbsp;&nbsp;&nbsp;Under $1 Deals</h2> 
      
    </div> -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link font-nav-tab active" id="latest-product-tab"
                                           data-toggle="tab" href="#latest_product_tab_panel" role="tab"
                                           aria-controls="latest_product_tab_panel" aria-selected="false">
                                            Latest Products
                                        </a>
                                    </li>  &nbsp;

                                    <li class="nav-item">
                                        <a class="nav-link font-nav-tab " id="best-selling-products" data-toggle="tab"
                                           href="#best_selling_products_tab_panel" role="tab"
                                           aria-controls="best_selling_products_tab_panel" aria-selected="false">
                                            Best Selling
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link font-nav-tab " id="under_dollar_1-tab" data-toggle="tab"
                                           href="#under_dollar_1_tab_panel" role="tab"
                                           aria-controls="under_dollar_1_tab_panel" aria-selected="false">
                                            under $1 Deals
                                        </a>
                                    </li>

                                </ul>


                                <!-- ====================================================== Latest Product Start ============================================================= -->

                                @php
                                    $length="";
                                    $length=count($data['latest_products']);
                                @endphp

                                @if($length>0)
                                    <!-- <div class="tab-content" id="myTabContent_latest_product"> -->
                                    <!-- <div class="tab-pane fade show active" id="latest_product_tab_panel" role="tabpanel" aria-labelledby="latest_products_tab"> -->
                                    <div class="tab-pane fade show active" id="latest_product_tab_panel"
                                         role="tabpanel">
                                        <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                                             data-owl-options="{
    'dots': false,
    'nav': true,
    'responsive': {
    '992': {
    'items': 5
  }
}
}">


                                            @foreach($data['latest_products'] as $product)
                                                @php
                                                    if($product->product_translation!="")
                                                    {
                                                     $product_translation=$product->product_translation;
                                                    }else
                                                    {
                                                     $product_translation=$product->default_product_translation;
                                                    }
                                                    $getproduct_id=$product->product_id;
                                                    $product_categorydata=DB::table('category_products')->where('product_id',$getproduct_id)->first();
                                                    $category_id = $product_categorydata->category_id;
                                                    $child=DB::table('category_hierarchies')->where('child_category_id',$category_id)->first();

                                                    if(empty($child)){
                                                      $prect_cat =DB::table('categories')->where('category_id',$category_id)->first()->category_url;
                                                      $url = $prect_cat.'/';
                                                    }else{
                                                      $prect_cat =DB::table('categories')->where('category_id',$child->parent_category_id)->first()->category_url;
                                                      $child_cat =DB::table('categories')->where('category_id',$child->child_category_id)->first()->category_url;
                                                      $url = $prect_cat.'/'.$child_cat.'/';
                                                    }
                                                @endphp
                                                <div class="product-default">

                                                    <div class="wishlist_content wishlist_content_{{$product->product_id}}"
                                                         style="z-index: 1;position: absolute;margin-left: 80%;margin-top:0px;cursor:pointer;"
                                                         product_id="{{$product->product_id}}">
                                                        <!-- <img src="/resources/views/superior/assets/images/my-heart.png"> -->


                                                        @if($user_wishlists!="[]" && in_array($product->product_id,$user_wishlists))
                                                            <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                                        @else
                                                            <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                                        @endif
                                                    </div>


                                                    <figure id="new_arrival">
                                                        <div class="product-cell">
                                                            <a href="/product/{{ $url }}{{$product->product_url}}?pid={{$product_translation->product_id}}">

                                                                <img src="/storage/app/{{$product->product_image}}"
                                                                     onerror="this.src='/files/assets/images/product.png';"
                                                                     class="new-arrival" alt="product"
                                                                     style="height: 216px;">
                                                            </a>
                                                            <div class="label-group">


                                                            </div>
                                                        </div>
                                                    </figure>
                                                    @php
                                                        $string=$product_translation->product_name;
                                                        if(strlen($string)>18)
                                                        {
                                                         $result =substr($string, 0, 18)."..";
                                                        }
                                                        else
                                                        {
                                                         $result =substr($string, 0, 18);
                                                        }
                                                    @endphp

                                                    <div class="product-details">
                                                        <h3 class="product-title" style="color: #212121;">
                                                            <a href="/product/{{ $url }}{{$product->product_url}}?pid={{$product_translation->product_id}}"><b>{{$result}}</b></a>
                                                        </h3>
                                                        <p class="item-txt">Item- <span
                                                                    class="brand-txt"><b>#{{$product->product_id}}</b></span>
                                                        </p>
                                                        @php
                                                            $reviewCount=4;
                                                            $rating_count=1;
                                                            if($product_translation->product->reviewCount!=""){
                                                            $reviewCount=$product_translation->product->reviewCount->rating;
                                                            $rating_count=$product_translation->product->reviewCount->rating_count;
                                                          }
                                                        @endphp
                                                        <div class="ratings-container">

                                                            <p class="d-msg-txt">{{$product->default_product_translation->delivery_message}}</p>

                                                            @if($product->product_prices!='[]')

                                                                @php
                                                                    $per_item_price_all=[];
                                                                    $per_item_sale_price_all=[];
                                                                    $setup_price_all=[];
                                                                    foreach($product->product_prices as $product_price){
                                                                      $per_item_price = $product_price->per_item_price;
                                                                      array_push($per_item_price_all, $per_item_price);

                                                                      $per_item_sale_price=$product_price->per_item_sale_price;
                                                                      array_push($per_item_sale_price_all,$per_item_sale_price);

                                                                      $setup_price=$product_price->setup_price;
                                                                      array_push($setup_price_all,$setup_price);
                                                                    }
                                                                    $min_per_item_price = min($per_item_price_all);
                                                                    $min_per_item_sale_price = min($per_item_sale_price_all);
                                                                    $min_setup_price = min($setup_price_all);
                                                                @endphp

                                                                <style type="text/css">

                                                                    .as_low_as_spna_text {
                                                                        font-family: Roboto;
                                                                        font-style: normal;
                                                                        font-weight: normal;
                                                                        font-size: 12px;
                                                                        line-height: 14px;
                                                                        letter-spacing: -0.017em;
                                                                        color: #575757;
                                                                    }

                                                                </style>
                                                                @if($min_per_item_price!="")
                                                                    <p style="color: #575757;"><span
                                                                                class="as_low_as_spna_text">As Low As </span><span
                                                                                class="color-67a03c">${{$min_per_item_price}}</span>
                                                                    </p>
                                                                @elseif($min_per_item_sale_price!="")
                                                                    <p>As Low As <span
                                                                                class="color-67a03c ">${{$min_per_item_sale_price}}</span>
                                                                    </p>
                                                                @elseif($min_setup_price!="")
                                                                    <p>As Low As <span
                                                                                class="color-67a03c ">${{$min_setup_price}}</span>
                                                                    </p>
                                                                @else
                                                                    <p>
                                                                        <br>
                                                                    </p>
                                                                @endif
                                                            @endif


                                                        </div><!-- End .product-container -->

                                                        <div class="product-action">
                                                            <!-- <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a> -->
                                                            <button class="btn-icon btn-add-cart"><a
                                                                        href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}"
                                                                        class="product-cart-hover"><i
                                                                            class="fa fa-shopping-cart"
                                                                            aria-hidden="true"
                                                                            style="color: #575757;"></i>&nbsp;&nbsp;&nbsp;Add
                                                                    to cart&nbsp;&nbsp;&nbsp;</a></button>
                                                            <!-- <a href="ajax\product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                                                        </div>


                                                    </div><!-- End .product-details -->
                                                </div>
                                            @endforeach

                                        </div><!-- End .featured-proucts -->

                                    </div>
                                @endif
                                <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div> -->
                                <!-- ====================================================== Latest Product End ============================================================= -->

                                <!-- =================================================== Best Selling Product Start ======================================================= -->


                                <div class="tab-pane fade displayNone" id="best_selling_products_tab_panel"
                                     role="tabpanel">
                                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                                         data-owl-options="{
    'dots': false,
    'nav': true,
    'responsive': {
    '992': {
    'items': 5
  }
}
}">
                                        @if($data['best_selling_products']!="[]")

                                            @foreach($data['best_selling_products'] as $product)
                                                @php
                                                    if($product->product_translation!="")
                                                    {
                                                     $product_translation=$product->product_translation;
                                                    }else
                                                    {
                                                     $product_translation=$product->default_product_translation;
                                                    }
                                                    $getproduct_id=$product->product_id;



                                                @endphp
                                                <div class="product-default">

                                                    <div class="wishlist_content wishlist_content_{{$product->product_id}}"
                                                         style="z-index: 1;position: absolute;margin-left: 80%;margin-top:0px;cursor:pointer;"
                                                         product_id="{{$product->product_id}}">
                                                        <!-- <img src="/resources/views/superior/assets/images/my-heart.png"> -->

                                                        @if($user_wishlists!="[]" && in_array($product->product_id,$user_wishlists))
                                                            <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                                        @else
                                                            <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                                        @endif
                                                    </div>


                                                    <figure id="new_arrival">
                                                        <div class="product-cell">
                                                            <a href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}">

                                                                <img src="/storage/app/{{$product->product_image}}"
                                                                     onerror="this.src='/files/assets/images/product.png';"
                                                                     class="new-arrival" alt="product"
                                                                     style="height: 216px;">
                                                            </a>
                                                            <div class="label-group">


                                                            </div>
                                                        </div>
                                                    </figure>
                                                    @php
                                                        $string=$product_translation->product_name;
                                                        if(strlen($string)>18)
                                                        {
                                                         $result =substr($string, 0, 18)."..";
                                                        }
                                                        else
                                                        {
                                                         $result =substr($string, 0, 18);
                                                        }
                                                    @endphp
                                                    <div class="product-details">
                                                        <h3 class="product-title" style="color: #212121;">
                                                            <a href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}"><b>{{$result}}</b></a>
                                                        </h3>
                                                        <p class="item-txt">Item- <span
                                                                    class="brand-txt"><b>#{{$product->product_id}}</b></span>
                                                        </p>
                                                        @php
                                                            $reviewCount=4;
                                                            $rating_count=1;
                                                            if($product_translation->product->reviewCount!=""){
                                                            $reviewCount=$product_translation->product->reviewCount->rating;
                                                            $rating_count=$product_translation->product->reviewCount->rating_count;
                                                          }
                                                        @endphp
                                                        <div class="ratings-container">

                                                            <p class="d-msg-txt">{{$product->default_product_translation->delivery_message}}</p>

                                                            @if($product->product_prices!='[]')

                                                                @php
                                                                    $per_item_price_all=[];
                                                                    $per_item_sale_price_all=[];
                                                                    $setup_price_all=[];
                                                                    foreach($product->product_prices as $product_price){
                                                                      $per_item_price = $product_price->per_item_price;
                                                                      array_push($per_item_price_all, $per_item_price);

                                                                      $per_item_sale_price=$product_price->per_item_sale_price;
                                                                      array_push($per_item_sale_price_all,$per_item_sale_price);

                                                                      $setup_price=$product_price->setup_price;
                                                                      array_push($setup_price_all,$setup_price);
                                                                    }
                                                                    $min_per_item_price = min($per_item_price_all);
                                                                    $min_per_item_sale_price = min($per_item_sale_price_all);
                                                                    $min_setup_price = min($setup_price_all);
                                                                @endphp

                                                                <style type="text/css">

                                                                    .as_low_as_spna_text {
                                                                        font-family: Roboto;
                                                                        font-style: normal;
                                                                        font-weight: normal;
                                                                        font-size: 12px;
                                                                        line-height: 14px;
                                                                        letter-spacing: -0.017em;
                                                                        color: #575757;
                                                                    }

                                                                </style>
                                                                @if($min_per_item_price!="")
                                                                    <p style="color: #575757;"><span
                                                                                class="as_low_as_spna_text">As Low As </span><span
                                                                                class="color-67a03c">${{$min_per_item_price}}</span>
                                                                    </p>
                                                                @elseif($min_per_item_sale_price!="")
                                                                    <p>As Low As <span
                                                                                class="color-67a03c ">${{$min_per_item_sale_price}}</span>
                                                                    </p>
                                                                @elseif($min_setup_price!="")
                                                                    <p>As Low As <span
                                                                                class="color-67a03c ">${{$min_setup_price}}</span>
                                                                    </p>
                                                                @else
                                                                    <p>
                                                                        <br>
                                                                    </p>
                                                                @endif
                                                            @endif


                                                        </div><!-- End .product-container -->


                                                        <div class="product-action">
                                                            <!-- <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a> -->
                                                            <button class="btn-icon btn-add-cart"><a
                                                                        href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}"
                                                                        class="product-cart-hover"><i
                                                                            class="fa fa-shopping-cart"
                                                                            aria-hidden="true"
                                                                            style="color: #575757;"></i>&nbsp;&nbsp;&nbsp;Add
                                                                    to cart&nbsp;&nbsp;&nbsp;</a></button>
                                                            <!-- <a href="ajax\product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                                                        </div>


                                                    </div><!-- End .product-details -->
                                                </div>
                                            @endforeach

                                        @endif

                                    </div><!-- End .featured-proucts -->
                                </div>

                                <!-- ====================================================== Best Selling Product End ============================================================= -->

                                <!-- ====================================================== Under $1 Deals Start ============================================================= -->


                                <!-- <div class="tab-content" id="myTabContent_under_dollar_1"> -->
                                <!-- <div class="tab-pane fade" id="under_dollar_1_tab_panel" role="tabpanel" aria-labelledby="under_dollar_1_tab"> -->
                                <div class="tab-pane fade displayNone" id="under_dollar_1_tab_panel" role="tabpanel">
                                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                                         data-owl-options="{
    'dots': false,
    'nav': true,
    'responsive': {
    '992': {
    'items': 5
  }
}
}">
                                        @if($data['under_dollar_1']!="[]")

                                            @foreach($data['under_dollar_1'] as $product)
                                                @php
                                                    if($product->product_translation!="")
                                                    {
                                                     $product_translation=$product->product_translation;
                                                    }else
                                                    {
                                                     $product_translation=$product->default_product_translation;
                                                    }
                                                    $getproduct_id=$product->product_id;



                                                @endphp
                                                <div class="product-default">

                                                    <div class="wishlist_content wishlist_content_{{$product->product_id}}"
                                                         style="z-index: 1;position: absolute;margin-left: 80%;margin-top:0px;cursor:pointer;"
                                                         product_id="{{$product->product_id}}">
                                                        <!-- <img src="/resources/views/superior/assets/images/my-heart.png"> -->

                                                        @if($user_wishlists!="[]" && in_array($product->product_id,$user_wishlists))
                                                            <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                                        @else
                                                            <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                                        @endif
                                                    </div>


                                                    <figure id="new_arrival">
                                                        <div class="product-cell">
                                                            <a href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}">

                                                                <img src="/storage/app/{{$product->product_image}}"
                                                                     onerror="this.src='/files/assets/images/product.png';"
                                                                     class="new-arrival" alt="product"
                                                                     style="height: 216px;">
                                                            </a>
                                                            <div class="label-group">


                                                            </div>
                                                        </div>
                                                    </figure>
                                                    @php
                                                        $string=$product_translation->product_name;
                                                        if(strlen($string)>18)
                                                        {
                                                         $result =substr($string, 0, 18)."..";
                                                        }
                                                        else
                                                        {
                                                         $result =substr($string, 0, 18);
                                                        }
                                                    @endphp
                                                    <div class="product-details">
                                                        <h3 class="product-title" style="color: #212121;">
                                                            <a href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}"><b>{{$result}}</b></a>
                                                        </h3>
                                                        <p class="item-txt">Item- <span
                                                                    class="brand-txt"><b>#{{$product->product_id}}</b></span>
                                                        </p>
                                                        @php
                                                            $reviewCount=4;
                                                            $rating_count=1;
                                                            if($product_translation->product->reviewCount!=""){
                                                            $reviewCount=$product_translation->product->reviewCount->rating;
                                                            $rating_count=$product_translation->product->reviewCount->rating_count;
                                                          }
                                                        @endphp
                                                        <div class="ratings-container">

                                                            <p class="d-msg-txt">{{$product->default_product_translation->delivery_message}}</p>

                                                            @if($product->product_prices!='[]')

                                                                @php
                                                                    $per_item_price_all=[];
                                                                    $per_item_sale_price_all=[];
                                                                    $setup_price_all=[];
                                                                    foreach($product->product_prices as $product_price){
                                                                      $per_item_price = $product_price->per_item_price;
                                                                      array_push($per_item_price_all, $per_item_price);

                                                                      $per_item_sale_price=$product_price->per_item_sale_price;
                                                                      array_push($per_item_sale_price_all,$per_item_sale_price);

                                                                      $setup_price=$product_price->setup_price;
                                                                      array_push($setup_price_all,$setup_price);
                                                                    }
                                                                    $min_per_item_price = min($per_item_price_all);
                                                                    $min_per_item_sale_price = min($per_item_sale_price_all);
                                                                    $min_setup_price = min($setup_price_all);
                                                                @endphp

                                                                <style type="text/css">

                                                                    .as_low_as_spna_text {
                                                                        font-family: Roboto;
                                                                        font-style: normal;
                                                                        font-weight: normal;
                                                                        font-size: 12px;
                                                                        line-height: 14px;
                                                                        letter-spacing: -0.017em;
                                                                        color: #575757;
                                                                    }

                                                                </style>
                                                                @if($min_per_item_price!="")
                                                                    <p style="color: #575757;"><span
                                                                                class="as_low_as_spna_text">As Low As </span><span
                                                                                class="color-67a03c">${{$min_per_item_price}}</span>
                                                                    </p>
                                                                @elseif($min_per_item_sale_price!="")
                                                                    <p>As Low As <span
                                                                                class="color-67a03c ">${{$min_per_item_sale_price}}</span>
                                                                    </p>
                                                                @elseif($min_setup_price!="")
                                                                    <p>As Low As <span
                                                                                class="color-67a03c ">${{$min_setup_price}}</span>
                                                                    </p>
                                                                @else
                                                                    <p>
                                                                        <br>
                                                                    </p>
                                                                @endif
                                                            @endif


                                                        </div><!-- End .product-container -->


                                                        <div class="product-action">
                                                            <!-- <a href="#" class="btn-icon-wish"><i class="icon-heart"></i></a> -->
                                                            <button class="btn-icon btn-add-cart"><a
                                                                        href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}"
                                                                        class="product-cart-hover"><i
                                                                            class="fa fa-shopping-cart"
                                                                            aria-hidden="true"
                                                                            style="color: #575757;"></i>&nbsp;&nbsp;&nbsp;Add
                                                                    to cart&nbsp;&nbsp;&nbsp;</a></button>
                                                            <!-- <a href="ajax\product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                                                        </div>


                                                    </div><!-- End .product-details -->
                                                </div>
                                            @endforeach

                                        @endif

                                    </div><!-- End .featured-proucts -->

                                </div>
                                <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                              </div> -->
                                <!-- ====================================================== Under $1 Deals End ============================================================= -->


                            </div>
                        </section>


                        @php
                            $length="";
                            $length=count($data['offer_blocks']);
                        @endphp
                        @if($length>3)
                            <section class="home-products-intro mt-3 mb-1">
                                <div class="container">
                                    <div class="row row-sm">
                                        @foreach($data['offer_blocks']->slice(3,4)->take(2) as $offer_block)
                                            @php
                                                $offer_block_temp=$offer_block;
                                                $notification_class_id=$offer_block->notification_class_id;
                                                if($offer_block->offer_block_translation!=""){
                                                $offer_block=$offer_block->offer_block_translation;
                                              }else{
                                              $offer_block=$offer_block->default_offer_block_translation;
                                            }
                                            @endphp







                                            <div class="col-xl-6">
                                                <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">
                                                    <div class="banner-product banner-offer banner-product-middle"
                                                         style="background-image: url('/storage/app/{{$offer_block->offer_block_image}}');background-position : 54%;">

                                                        <div class="mr-5">

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </section>
                        @endif


                        <section class="container mb-5">
                            @php
                                $length="";
                                $length=count($data['product_is_stock_collections']);
                            @endphp

                            @if($length>0)
                                <button class="btn-view-all-1" style="float: right;">View All</button>
                                <div class="section-title mb-2">
                                    <h2 style="margin-bottom: 5px;"
                                        class="top-txt">@lang("product.top_categories") </h2>
                                </div>
                                <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider">
                                    @foreach($data['product_is_stock_collections'] as $product_is_stock_collection)
                                        @php

                                            $default_product_translation_full="";

                                            if($product_is_stock_collection->default_product_translation_full!=""){

                                            $default_product_translation_full=$product_is_stock_collection->default_product_translation_full;
                                          }
                                          else{
                                          $default_product_translation_full=$product_is_stock_collection->default_product_translation_full;
                                        }
                                        @endphp

                                        <div class="product-category">


                                            <!-- <figure> -->

                                            <div class="wishlist_content wishlist_category_content_{{$product_is_stock_collection->product_id}}"
                                                 style="z-index: 1;position: absolute;margin-left: 90%;margin-top: 10px;cursor:pointer;"
                                                 product_id="{{$product_is_stock_collection->product_id}}">

                                                <!-- <i class="fa fa-heart-o " style="color: #000000;font-size:20px;"></i>  -->

                                                @if($user_wishlists!="[]" && in_array($product->product_id,$user_wishlists))
                                                    <i class="fa fa-heart fill wishlist_icon_{{$product_is_stock_collection->product_id}}"></i>
                                                @else
                                                    <i class="fa fa-heart-o unfill wishlist_icon_{{$product_is_stock_collection->product_id}}"></i>
                                                @endif
                                            </div>

                                            <img src="/storage/app/{{$product_is_stock_collection->product_image}}"
                                                 class="product_image_collection product_collection">


                                            <!-- </figure> -->

                                            <style type="text/css">
                                                .category-content a {
                                                    color: #212121 !important;
                                                }
                                            </style>

                                            <div class="category-content">
                                                <a href="/product/{{$product->product_url}}?pid={{$product_translation->product_id}}">

                                                    <h3>{{$product_is_stock_collection->default_product_translation_full->product_name}}</h3>
                                                    <p class="text-capitalize"><span
                                                                style="font-size: 14px;line-height: 16px;"
                                                                class="text-capitalize text-dark">Item</span> - <span
                                                                class=""
                                                                style="color: black !important;font-weight: 500;font-size: 14px;line-height: 16px;"><b>#{{$product_is_stock_collection->product_id}}</b></span>
                                                    </p>
                                                    <p class="d-msg-txt">{{$product_is_stock_collection->default_product_translation_full->delivery_message}}</p>

                                                    @if($product_is_stock_collection->product_prices!='[]')

                                                        @php
                                                            $per_item_price_all=[];
                                                            $per_item_sale_price_all=[];
                                                            $setup_price_all=[];
                                                            foreach($product_is_stock_collection->product_prices as $product_price){
                                                              $per_item_price = $product_price->per_item_price;
                                                              array_push($per_item_price_all, $per_item_price);

                                                              $per_item_sale_price=$product_price->per_item_sale_price;
                                                              array_push($per_item_sale_price_all,$per_item_sale_price);

                                                              $setup_price=$product_price->setup_price;
                                                              array_push($setup_price_all,$setup_price);
                                                            }
                                                            $min_per_item_price = min($per_item_price_all);
                                                            $min_per_item_sale_price = min($per_item_sale_price_all);
                                                            $min_setup_price = min($setup_price_all);
                                                        @endphp


                                                                <!-- @if($min_per_item_price!="")  -->
                                                        <!-- <p>As Low As <span class="color-67a03c as_low_as_span">${{$min_per_item_price}}</span></p> -->

                                                        @if($min_per_item_price!="")
                                                            <p class="as_low_as_spna_text">As Low As <span
                                                                        class="color-67a03c ">${{$min_per_item_price}}</span>
                                                            </p>
                                                        @elseif($min_per_item_sale_price!="")
                                                            <p class=".as_low_as_spna_text">As Low As <span
                                                                        class="color-67a03c ">${{$min_per_item_sale_price}}</span>
                                                            </p>
                                                        @elseif($min_setup_price!="")
                                                            <p class=".as_low_as_spna_text">As Low As <span
                                                                        class="color-67a03c ">${{$min_setup_price}}</span>
                                                            </p>
                                                        @else

                                                            <p><br></p>
                                                        @endif

                                                </a>


                                                <!-- @endif -->
                                                @endif


                                                <div class="product-action">

                                                    <button class="btn-icon btn-add-cart btn-add-cart-css"><a
                                                                href="/product/{{$product_is_stock_collection->product_url}}?pid={{$default_product_translation_full->product_id}}"
                                                                class="product-cart-hover" style="color: #777;"><i
                                                                    class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add
                                                            to cart&nbsp;&nbsp;&nbsp;</a></button>

                                                </div>


                                            </div>


                                        </div>

                                    @endforeach
                                </div>
                            @endif

                        </section>

                        @php
                            $length="";
                            $length=count($data['offer_blocks']);
                        @endphp
                        @if($length>5)
                            <section class="home-products-intro mt-3 mb-2">
                                <div class="container">
                                    <div class="row row-sm">
                                        <div class="col-xl-12">
                                            <div class="row row-sm">
                                                <div class="col-xl-4">
                                                    @foreach($data['offer_blocks']->slice(5)->take(1) as $offer_block)
                                                        @php
                                                            $offer_block_temp=$offer_block;
                                                            $notification_class_id=$offer_block->notification_class_id;
                                                            if($offer_block->offer_block_translation!=""){
                                                            $offer_block=$offer_block->offer_block_translation;
                                                          }else{
                                                          $offer_block=$offer_block->default_offer_block_translation;
                                                        }
                                                        @endphp





                                                        <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">
                                                            <div class="banner-product banner-offer banner-product-side"
                                                                 style="background-image: url('/storage/app/{{$offer_block->offer_block_image}}');background-position : 54%;">

                                                                <div class="mr-5">

                                                                </div>
                                                            </div>
                                                        </a>

                                                    @endforeach
                                                </div>

                                                <div class="col-xl-4">
                                                    @foreach($data['offer_blocks']->slice(6,7)->take(2) as $offer_block)
                                                        @php
                                                            $offer_block_temp=$offer_block;
                                                            $notification_class_id=$offer_block->notification_class_id;
                                                            if($offer_block->offer_block_translation!=""){
                                                            $offer_block=$offer_block->offer_block_translation;
                                                          }else{
                                                          $offer_block=$offer_block->default_offer_block_translation;
                                                        }
                                                        @endphp


                                                        <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">
                                                            <div class="banner-product banner-offer-two banner-offer"
                                                                 style="background-image: url('/storage/app/{{$offer_block->offer_block_image}}');">

                                                                <div class="mr-5">

                                                                </div>
                                                            </div>
                                                        </a>

                                                    @endforeach
                                                </div>
                                                <div class="col-xl-4">
                                                    @foreach($data['offer_blocks']->slice(8)->take(1) as $offer_block)
                                                        @php
                                                            $offer_block_temp=$offer_block;
                                                            $notification_class_id=$offer_block->notification_class_id;
                                                            if($offer_block->offer_block_translation!=""){
                                                            $offer_block=$offer_block->offer_block_translation;
                                                          }else{
                                                          $offer_block=$offer_block->default_offer_block_translation;
                                                        }
                                                        @endphp


                                                        <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">
                                                            <div class="banner-product banner-offer banner-product-side"
                                                                 style="background-image: url('/storage/app/{{$offer_block->offer_block_image}}');background-position : 54%;">

                                                                <div class="mr-5">

                                                                </div>
                                                            </div>
                                                        </a>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                        @endif
                        <section class="home-products-intro mt-1 mb-6">
                            <div class="container top-border d-flex align-items-center justify-content-between flex-wrap"
                                 style="background-color: #384faa !important;padding:4rem 5rem;">
                                <div class="footer-left widget-newsletter d-md-flex align-items-center">
                                    <div class="widget-newsletter-info">
                                        <h5 class="widget-newsletter-title text-capitalize m-b-1"
                                            style="font-size: 27px;">Sign Up for Great Offers!</h5>
                                        <p class="widget-newsletter-content mb-0">
                                            <!-- @lang("navigation.subscribe_to_our_latest_newsletter") -->
                                            New Trands, Clearance Items & Much More..<br>
                                            Monthly Specials
                                        </p>
                                    </div>

                                </div>
                                <div class="footer-right">
                                    <h6 class="widget-newsletter-title">Subscribe Now!</h6>
                                    <form method="post" action="/subscription-email"
                                          style="margin-top: 1rem;margin-bottom: 1rem !important;">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="footer-submit-wrapper d-flex">
                                            <input type="email" class="form-control"
                                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                   name="news_letter_email" placeholder="Enter e-mail here" size="40"
                                                   required="">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                    style="height:45.5px;">@lang("navigation.subscribe")</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </section>

                        @php
                            $length="";
                            $length=count($data['offer_blocks']);
                        @endphp
                        @if($length>8)
                            <section class="home-products-intro mt-3">
                                <div class="container">
                                    <div class="row row-sm">
                                        @foreach($data['offer_blocks']->slice(9)->take(1) as $offer_block)
                                            @php
                                                $offer_block_temp=$offer_block;
                                                $notification_class_id=$offer_block->notification_class_id;
                                                if($offer_block->offer_block_translation!=""){
                                                $offer_block=$offer_block->offer_block_translation;
                                              }else{
                                              $offer_block=$offer_block->default_offer_block_translation;
                                            }
                                            @endphp



                                            <div class="col-xl-12"
                                                 style="padding-left: 0px !important;padding-right: 0px !important;">
                                                <a href="/shop?page=1&search=&cat_id=&category_id=&color_id=&min=&max=100&orderby=&pagi_num=1&shop_cat_id=&max_quantity=16&min_quantity=&under_dollar_1=">
                                                    <div class="banner-product banner-product-bottom banner-offer"
                                                         style="background-image: url('/storage/app/{{$offer_block->offer_block_image}}');background-position : 54%;">

                                                        <div class="mr-5">

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            </section>
                        @endif

                        <section class="container mb-6">


                            <div class="section-title mb-2 section_title_happy_customer" style="">

                                <h2> Happy Customers</h2>
                            </div>
                            <div class="brands-section mt-2 mb-3 appear-animate" data-animation-delay="200"
                                 data-animation-name="fadeIn" data-animation-duration="1000"
                                 style="margin-left: 2.1%;margin-right: 2.1%;">
                                <!--  <div class="headding">
                                     <h4 class="section-title text-transform-none">Featured Brands</h4>
                                 </div> -->
                                <div class="brands-slider owl-carousel bg-white owl-theme nav-circle images-center"
                                     data-owl-options="{
                                'margin': 1,
                                'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                                'nav': true
                            }">
                                    <!-- <style type="text/css">
                                      figure.figure-content
                                      {
                                            border: 1px solid blue !important;
                                            padding: 20px;
                                            margin-right:-10px;
                                      };
                                    </style> -->
                                    <figure class="figure-content">

                                        <img style=""
                                             src="/resources/views/superior/assets/images/brands//small/brand1.png"
                                             class="happy" alt="brand">

                                    </figure>
                                    <figure><img
                                                src="/resources/views/superior/assets/images/brands//small/brand2.png"
                                                class="happy" alt="brand">
                                    </figure>
                                    <figure><img
                                                src="/resources/views/superior/assets/images/brands//small/brand3.png"
                                                class="happy" alt="brand">
                                    </figure>
                                    <figure><img
                                                src="/resources/views/superior/assets/images/brands//small/brand4.png"
                                                class="happy" alt="brand">
                                    </figure>
                                    <figure><img
                                                src="/resources/views/superior/assets/images/brands//small/brand5.png"
                                                class="happy" alt="brand">
                                    </figure>
                                    <figure><img
                                                src="/resources/views/superior/assets/images/brands//small/brand6.png"
                                                class="happy" alt="brand">
                                    </figure>
                                    <figure><img
                                                src="/resources/views/superior/assets/images/brands//small/brand4.png"
                                                class="happy" alt="brand">
                                    </figure>
                                </div>
                                <!-- End .brands-slider -->
                            </div>
                        </section>
                        @php
                            $length="";
                            $length=count($data['blogs']);
                        @endphp
                        @if($length>3)
                            <section class="blog-section">
                                <div class="container">

                                    <div class="section-title mb-2">
                                        <h2>Latest Blogs</h2>
                                    </div>

                                    <div class="owl-carousel owl-theme" data-owl-options="{
    'loop': false,
    'margin': 20,
    'autoHeight': true,
    'autoplay': false,
    'dots': false,
    'items': 2,
    'responsive': {
    '576': {
    'items': 3
  },
  '768': {
  'items': 4
}
}
}">

                                        @foreach($data['blogs'] as $blog)
                                            <article class="post">
                                                <div class="post-media">
                                                    <a href="/blog/{{$blog->url}}">
                                                        <img src="/storage/app/{{$blog->image}}" alt="Post"
                                                             width="225" height="280">
                                                    </a>
                                                    <div class="post-date">
                                                        <span class="day"><?php echo date('j',
                                                                strtotime($blog->created_at));?></span>
                                                        <span class="month"><?php echo date('M',
                                                                strtotime($blog->created_at));?></span>
                                                    </div>
                                                </div>

                                                <div class="post-body">
                                                    <h2 class="post-title">
                                                        <a href="/blog/{{$blog->url}}">{{$blog->blog_type->blog_type_name}}</a>
                                                    </h2>
                                                    <div class="post-content">
                                                        @if($blog->blog_description !='')
                                                            <?php
                                                            $string = strip_tags($blog->blog_description);
                                                            if (strlen($string) > 300) {


                                                                $stringCut = substr($string, 0, 300);
                                                                $endPoint = strrpos($stringCut, ' ');


                                                                $string = $endPoint ? substr($stringCut, 0,
                                                                    $endPoint) : substr($stringCut, 0);
                                                            }
                                                            ?>
                                                            <p>
                                                                <?php echo $string ?>...
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <i class="fa fa-heart"></i>&nbsp;{{$blog->view_count}}
                                                </div>
                                            </article>
                                        @endforeach

                                    </div>

                @endif

            </main><!-- End .main -->


            <script type="text/javascript">
              $(document).ready(function () {
                $('.main').addClass('home');
              });
            </script>

            <script type="text/javascript">
              //Wishlist latest product start------------------------------------
              $(document).ready(function () {
                $('.wishlist_content').on('click', function () {

                  var product_id = $(this).attr('product_id');


                  $.ajax({
                    type: 'post',
                    url: '/wishlist/add',
                    data: {"_token": "{{ csrf_token() }}", 'product_id': product_id},
                    success: function (result) {
                      if (result != "") {

                        if (result['success'] == "true") {

                          var product_id = result['product_id'];
                          $('.wishlist_icon_' + product_id).addClass('fill');
                          $('.wishlist_icon_' + product_id).addClass('fa-heart');
                          
                          $('.wishlist_icon_' + product_id).removeClass('unfill');
                          $('.wishlist_icon_' + product_id).removeClass('fa-heart-o');


                          $.notify('product added into wishlist successfully', 'success');

                        } else if (result['success'] == "false") {
                          
                          var product_id = result['product_id'];
                          $('.wishlist_icon_' + product_id).removeClass('fill');
                          $('.wishlist_icon_' + product_id).removeClass('fa-heart');
                          
                          $('.wishlist_icon_' + product_id).addClass('unfill');
                          $('.wishlist_icon_' + product_id).addClass('fa-heart-o');

                          
                          // alert('product already exist in wishlist');
                          $.notify('product deleted wishlist', 'danger');
                        }


                      }

                    },
                    error: function (xhr, textStatus, errorThrown) {
                      alert(textStatus + ':' + errorThrown);
                    }
                  });
                });


              });
              //Wishlist latest product end------------------------------------

            </script>


            <script type="text/javascript">
              // product is stock collections start-------------

              // $(document).ready(function(){
              //   var product_is_stock_collections = <?php echo json_encode($data['product_is_stock_collections']); ?>;
              //   $.each(product_is_stock_collections,function(index,item){
              //       $('.wishlist_category_content_'+item.product_id).on('click',function(){
              //           var product_id = item.product_id;
              //           $.ajax({
              //             type: 'post',
              //             url:'/wishlist/add',
              //             data:{"_token": "{{ csrf_token() }}",'product_id':product_id},
              //             success: function (result){
              //               if(result!=""){
              //                if(result['success']=="true"){

              //                         var product_id = result['product_id'];
              //                         $('.wishlist_icon_'+product_id).addClass('fill');
              //                         $('.wishlist_icon_'+product_id).addClass('fa-heart');

              //                         $('.wishlist_icon_'+product_id).removeClass('unfill');
              //                         $('.wishlist_icon_'+product_id).removeClass('fa-heart-o');


              //                         $.notify('product added into wishlist successfully','success');

              //                 }else if(result['success']=="false"){

              //                         var product_id = result['product_id'];
              //                         $('.wishlist_icon_'+product_id).removeClass('fill');
              //                         $('.wishlist_icon_'+product_id).removeClass('fa-heart');

              //                         $('.wishlist_icon_'+product_id).addClass('unfill');
              //                         $('.wishlist_icon_'+product_id).addClass('fa-heart-o');


              //                         // alert('product already exist in wishlist');
              //                         $.notify('product deleted wishlist','danger');
              //                 }
              //               }
              //             },
              //             error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
              //           });
              //       });
              //   });
              // });
              // product is stock collections end---------------


            </script>

            <script type="text/javascript">
              //Search top
              $(document).ready(function () {
                $('.header_search_button').on('click', function () {
                  var search = $('.header_search_input').val();
                  window.location.href = "/shop?page=&search=" + search + "&cat_id=&category_id=&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=";
                });
              });
            </script>


            <script type="text/javascript">
              $(document).ready(function () {
                //latest products
                $('#latest-product-tab').on('click', function () {
                  $('#latest_product_tab_panel').removeClass('displayNone');
                  $('#best_selling_products_tab_panel').addClass('displayNone');
                  $('#under_dollar_1_tab_panel').addClass('displayNone');
                });

                //Best Selling
                $('#best-selling-products').on('click', function () {
                  $('#best_selling_products_tab_panel').removeClass('displayNone');
                  $('#latest_product_tab_panel').addClass('displayNone');
                  $('#under_dollar_1_tab_panel').addClass('displayNone');
                });
                //under $1
                $('#under_dollar_1-tab').on('click', function () {
                  $('#under_dollar_1_tab_panel').removeClass('displayNone');
                  $('#best_selling_products_tab_panel').addClass('displayNone');
                  $('#latest_product_tab_panel').addClass('displayNone');

                });

              });

            </script>
        @endsection
