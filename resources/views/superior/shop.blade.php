@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

<style type="text/css">
                                input.category-checkbox {
                                    width: 18px;
                                    height: 18px;
                                }
                                .product-category-span-text{
                                    /*margin-bottom: 10px;*/
                                }

                                .widget .config-swatch-list {
                                     display: block !important;
                                }
                                .price-checkbox{
                                    width: 18px;
                                    height: 18px;
                                }

                                .pagination>li>a, .pagination>li>span{
                                    border: 0px solid #ddd;
                                    padding: 0px 12px;
                                }

                                            .config-show-list{
                                                display: flex;
                                                flex-wrap: wrap;
                                                /*margin-top: 0.3rem;*/
                                                margin: 0 0 0;
                                            }
                                            .toolbox-show{
                                                margin-left: 20px;
                                            }

                                            .product-default a {
                                                    white-space: unset !important;
                                            }
                  
            .dot {
              height: 25px;
              width: 25px;
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
            .circle-rounded-ul{
                margin-bottom: 0;
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
                                                padding: 0 5px 0 5px;
                                            }

                                            .product-price{
                                                color: #67a03c;
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






        <main class="main">
            
<br><br>
            <div class="container pt-2">
                <div class="row">
                    <div class="col-lg-9 main-content">



                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewbox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                        <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                        <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                        <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                        <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                        <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    </svg>
                                    <span>Filter</span>
                                </a>


                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                        <!-- <i style="font-size: 25px;" class="fas fa-bars"></i> -->
                                    </a>
                                </div>


                               

                                <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label><strong>Show:</strong></label>

                                    
                                        <!-- <select name="count" class="form-control">
                                            <option value="12">12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                        </select> -->
                                        


                                        <ul class="config-show-list">
                                            <li class="config-li active"><a href="">16</a></li>
                                            <li class="config-li"><a href="">30</a></li>
                                            <li class="config-li"><a href="">45</a></li>
                                            <li class="config-li"><a href="">60</a></li>
                                            <li class="config-li"><a href="">75</a></li>
                                        </ul>
                                 
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->

                                

  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">Previous</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">Next</span>
      </a>
    </li>
  </ul>


                                
                                <!-- End .layout-modes -->
                            </div>
                            <!-- End .toolbox-right -->




                                
                                <!-- End .toolbox-item -->

                            </div>
                            <!-- End .toolbox-left -->

                            <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
                                            <option value="menu_order" selected="selected">Sort by popularity</option>
                                            <option value="popularity">Default sorting</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                        </nav>








                        <div class="row row-joined divide-line products-group">







                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>




                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>





                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>




                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>



                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>


                            <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                <div class="product-default inner-quickview inner-icon">

                                    <div class="text-right single-line-bar-div">
                                        <div class="single-line-bar color-033e9a"></div>
                                        <div class="single-line-bar color-ebe5d9"></div>
                                        <div class="single-line-bar color-b30909"></div>
                                        <div class="single-line-bar color-a3c823"></div>
                                    </div>

                                    <figure>
                                        <a href="demo36-product.html">
                                            <img src="{{asset('resources/views/superior/assets//images/demoes/demo36/products/product-10.jpg')}}" width="239" height="239" alt="product">
                                        </a>
                                       <!--  <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                            View</a> -->
                                    </figure>
                                    
                                   
                                    
                                    
                                    <div class="product-details">
                                        <!-- <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo36-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                        </div> -->



                                        <ul class="circle-rounded-ul" >
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
                                            <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li>
                                            
                                        </ul>

                                        <h3 class="product-title">
                                            <a href="demo36-product.html" class="text-uppercase">leeman wireless noice challenging</a>
                                        </h3>
                                        <!-- <p class="">Item - #5820</p>
                                        <p class="">Order as few as 12 ships</p>
                                        <p class="">1 - 3 Working Days</p> -->
                                        <div class="item-box">
                                            <span>Item - #5820</span>
                                        </div>
                                        <div class="order-ships">
                                            <span>Order as few as 12 ships</span>
                                        </div>
                                        <hr class="hr">
                                        <div class="working-days">
                                            <span class="">1 - 3 Working Days</span>
                                        </div>
                                        <!-- <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            
                                        </div> -->
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>





                            

                            

                            

                            
                           

                            

                            

                            

                            

                            

                           
                        </div>
                        <!-- End .row -->

                        <nav class="toolbox toolbox-pagination border-0">
                            <div class="toolbox-item toolbox-show">
                                <!-- <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div> -->
                               
                            </div>
                         
                            <div style="margin-right: 307px;">
                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
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
                                </li>
                            </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>

                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">


                            <div class="widget">
                                <h3 class="widget-title">
                                    <a class="text-capitalize" data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-2">Select Filters</a>
                                </h3>

                                <div class="collapse show" id="widget-body-1">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-category-1">
                                                    White
                                                </a>

                                                <div style="float: right;"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                
                                                <div style="clear: both;"></div>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    Black
                                                </a>

                                                <div style="float: right;"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                
                                                <div style="clear: both;"></div>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    Speakers
                                                </a>

                                                <div style="float: right;"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                
                                                <div style="clear: both;"></div>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1">
                                                    Earphone
                                                </a>

                                                <div style="float: right;"><a href="Javascript:void(0);"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                                                
                                                <div style="clear: both;"></div>
                                            </li>

                                            <li>
                                                <a href="#widget-category-1" style="border-bottom: 1px solid #b3def2;color:#b3def2;">
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
                                    <a class="text-capitalize" data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Product Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
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

                                            <li>
                                                <a style="border-bottom:1px solid #b3def2; color: #b3def2;" href="#widget-category-1">
                                                    See More
                                                </a>
                                            </li>

                                            <li class="text-right">
                                                <a style="border-bottom:1px solid #b3def2; color: #b3def2;" href="#widget-category-1">
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
                                            <li class="active">
                                                <a href="Javascript:void(0);" style="background-color: #000;"></a>&nbsp;&nbsp;<b>Black</b>
                                            </li>
                                            <li>
                                                <a href="Javascript:void(0);" style="background-color: #0188cc;"></a>&nbsp;&nbsp;<b>Purple</b>
                                            </li>
                                            <li>
                                                <a href="Javascript:void(0);" style="background-color: #81d742;"></a>&nbsp;&nbsp;<b>White</b>
                                            </li>
                                            <li>
                                                <a href="Javascript:void(0);" style="background-color: #6085a5;"></a>&nbsp;&nbsp;<b>Gray</b>
                                            </li>
                                            <li>
                                                <a href="Javascript:void(0);" style="background-color: #ab6e6e;"></a>&nbsp;&nbsp;<b>Red</b>
                                            </li>
                                            <li>
                                                <a href="Javascript:void(0);" style="background-color: #ab6e6e;"></a>&nbsp;&nbsp;<b>Crem</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->


                            <div class="widget widget-brand">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-9" role="button" aria-expanded="true" aria-controls="widget-body-7">Price Range</a>
                                </h3>

                                <div class="collapse show" id="widget-body-9">
                                    <div class="widget-body pb-0">
                                        <ul class="cat-list">
                                            <li><a href="#"><input type="checkbox" name="" class="price-checkbox">&nbsp;&nbsp;Adidas</a></li>
                                            <li><a href="#"><input type="checkbox" name="" class="price-checkbox">&nbsp;&nbsp;Asics</a></li>
                                            <li><a href="#"><input type="checkbox" name="" class="price-checkbox">&nbsp;&nbsp;Brooks</a></li>
                                            <li><a href="#"><input type="checkbox" name="" class="price-checkbox">&nbsp;&nbsp;Nike</a></li>
                                            <li><a href="#"><input type="checkbox" name="" class="price-checkbox">&nbsp;&nbsp;Puma</a></li>
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->




                           <!--  <div class="widget widget-price">
                                <h3 class=" widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body pb-0">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider"></div>
                                               
                                            </div>
                                            

                                            <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range"></span>
                                                </div>
                                         

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div> -->
                            




                            

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
        <!-- End .main -->
        @endsection