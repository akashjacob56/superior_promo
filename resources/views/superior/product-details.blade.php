@extends('layouts.app')
@section('content')

<style type="text/css">
	.product-single-details .short_divider {
		width: 100%;
	}
</style>

<style type="text/css">
                            		.steps-1-2{
										display:block;
										float: right; 
										color: #a2c1dd;

                            		}
                            		.color-a2c1dd{
                            			color: #a2c1dd;
                            		}
                            		.product-single-details .short_divider {
                            			margin: 0 0 0.2rem;
                            		}

								.item_color_select{
									border: 1px solid #e7e7e7;
									margin:0 10px 0 10px;
								}
                                .item_color_select:hover{
                                    border: 1px solid #68bee5;
                                }
								.item-selection{
									margin-bottom: 20px;
								}
                            	</style>


                                <style type="text/css">
                                    tbody {
                                      display:block;
                                      max-height:152px;
                                      overflow-y:auto;

                                  }
                                  thead, tbody tr {
                                      display:table;
                                      width:100%;
                                      table-layout:fixed;
                                  }
                                  thead {
                                      width: calc( 100% - 1em );
                                  } 
                                  table{
                                    width: 70% !important;
                                  }

                                  tr:hover {
                                        box-shadow: 2px 2px 15px -2px rgb(220,220,220);
                                }
                                  
                                  .color-5d9136{
                                    color: #5d9136;
                                  }
                        </style>

                         <style type="text/css">
                        .type-quantity{
                            margin-left: 21px;
                        }
                        .type-quantity-input{
                            width: 151px;
                            height: 35px;
                            border-radius: 4px;
                        }
                        .pricing-table{
                            margin-bottom: 20px;
                        }
                    </style>

                    <style type="text/css">
                                    .decorated-imprint{
                                        margin-right: 10px;
                                       
                                    }
                                    .blank-goods-imprint{
                                        margin-right: 10px;
                                    }

                                    input.decorated-imprint{
                                        width: 20px;
                                        height: 17px;
                                    }

                                    input.blank-goods-imprint{
                                        width: 20px;
                                        height: 17px;
                                    }

                                </style>

                                <style type="text/css">
                                            input.front-imprint-input{
                                                width: 20px;
                                                height: 17px;
                                            }
                                            .front-imprint-input{
                                                margin-right: 10px;
                                            }
                                            .front-imprint-options{
                                                margin-top: 10px;
                                            }
                                        .select-max-colors{
                                            width: 150px;
                                            height: 35px;
                                            border-radius: 4px;
                                        }
                                        .back-imprint-input{
                                            margin-right: 10px;
                                        }
                                        .back-imprint-row{
                                            margin-top: 10px;
                                        }
                                         .max-color-row{
                                             margin-top: 5px;
                                         }

                                          input.back-imprint-input{
                                        width: 20px;
                                        height: 17px;
                                    }
                                        </style>

                                        <style type="text/css">
                                        .btn-anchor{
                                            margin-right: 20px;
                                        }
                                        .cart-status-button{
                                            border: 1px solid #68bee5;
                                            border-radius: 4px;
                                            padding: 8px 5px 8px 5px;
                                            background-color: #fff;
                                            color: #68bee5;
                                            font-weight: bold;
                                        }

                                        .order-proceed-guide-button{
                                            border: 1px solid #68bee5;
                                            border-radius: 4px;
                                            padding: 8px 5px 8px 5px;
                                            background-color: #fff;
                                            color: #68bee5;
                                            font-weight: bold;
                                        }

                                        .shipping-art-upload-button{
                                            border: 1px solid #68bee5;
                                            border-radius: 4px;
                                            padding: 8px 5px 8px 5px;
                                            background-color: #68bee5;
                                            color: #fff;
                                            font-weight: bold;
                                        }
                                    </style>







                                    <!-- Category page style start -->


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


            .product-price{
                                                color: #67a03c;
                                                } 

                                                            /*hr.hr {
    margin-top: 5px;
    margin-bottom: 5px;
    
}*/

            hr {
  border: 0;
  clear:both;
  display:block;
  width: 96%;               
  background-color:#b5b5b5;
  height: 1px;
}

                                    </style>



                                    <!-- Category page style end -->



        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo36.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Electronic & Tech Items</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Earphones & Earbuds</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Silicone Earbuds Case with Carabiner</a></li>
                    </ol>
                </div>
            </nav>

            <div class="container pt-2">
                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                    		
                    	
                        <div class="col-lg-6 col-md-6 product-single-gallery">
                        	<div class="prod-thumbnail owl-dots">
                                <div class="owl-dot">
                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-1.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                </div>
                                <div class="owl-dot">
                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-2.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                </div>
                                <div class="owl-dot">
                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-3.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                </div>
                                <div class="owl-dot">
                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-4.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                </div>
                            </div>




                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">
                                        -16%
                                    </div>
                                </div>

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-1-big.jpg')}}" data-zoom-image="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-1-big.jpg')}}" width="468" height="468" alt="product">
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-2-big.jpg')}}" data-zoom-image="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-2-big.jpg')}}" width="468" height="468" alt="product">
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-3-big.jpg')}}" data-zoom-image="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-3-big.jpg')}}" width="468" height="468" alt="product">
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-4-big.jpg')}}" data-zoom-image="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-4-big.jpg')}}" width="468" height="468" alt="product">
                                    </div>
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            <style type="text/css">
                                .product-slider-description{
                                    /*background-color: #21516b;*/
                                    background: linear-gradient(0deg, #232f3d, #21546f 80%) no-repeat;
                                    padding: 20px 20px 0 20px;  
                                    color: #fff;
                                }

                                .art-sup-prom{
                                   color :#68bee5;
                                   font-weight:bold;
                                }



                                .product-slider-desc-bottom-order{
                                        height: 212px;
                                        width: 187px !important;
                                }



                            </style>

                            <div class="product-slider-description">
                                <div class="row">
                                    <div class="col-8">
                                        <p> Every Order will be presented with a Free art proof for approval before production. If you would like to see a Free pre-proof befor placing your order</p>
                                        <span>Please Email Your request to <a class="art-sup-prom" href="javascript:void(0);">art@superiorpromos.com</a></p>
                                        <p>
                                            <a class="free-pref-proof" href="javascript:void(0);">
                                                <button class="btn btn-info">Free Pref Proof</button>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-4" style="padding-left: -10px;padding-right: -10px; padding-top: -20px;">
                                        <img class="img-fluid product-slider-desc-bottom-order" src="{{asset('resources/views/superior/assets/images/product-slider-desc-bottom.png')}}">
                                    </div>
                                </div>
                            </div>




                            


                        </div>
                        <!-- End .product-single-gallery -->






                        <div class="col-lg-6 col-md-6 product-single-details">
                            <h1 class="product-title">Silicon Earbud Case With Carabiner</h1>

                            <div class="product-nav">
                                <div class="product-prev">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150" src="{{asset('resources/views/superior/assets/images/products/product-3.jpg')}}" style="padding-top: 0px;">

                                                <span>Circled Ultimate 3D Speaker</span>
                                        </span>
                                        </span>
                                    </a>
                                </div>

                                <div class="product-next">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150" src="{{asset('resources/views/superior/assets/images/products/product-4.jpg')}}" style="padding-top: 0px;">

                                                <span>Beats Solo HD Drenched</span>
                                        </span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="ratings-container">
                            	<span>Item Number : #62555</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            	<i class="fas fa-star text-yellow"></i>
                            	<i class="fas fa-star text-yellow"></i>
                            	<i class="fas fa-star text-yellow"></i>
                            	<i class="fas fa-star text-yellow"></i>
                            	<i class="fas fa-star text-yellow"></i>
                               <!--  <div class="product-ratings">
                                    <span class="ratings" style="width:60%"></span>
                                    
                                    <span class="tooltiptext tooltip-top"></span>
                                </div> -->
                                <!-- End .product-ratings -->

                                <a href="#" class="rating-link">162</a>
                            </div>
                            <!-- End .ratings-container -->

                            <hr class="short-divider short_divider">

                            <div class="price-box">
                            	

                            	<div class="item-selection">
		                            	<span class="steps-1-2">Step <a class="color-a2c1dd" href="javascript:void(0);">1</a>&nbsp;/&nbsp;<a class="color-a2c1dd" href="javascript:void(0);">2</a></span>
		                            	<br>
		                                <span>Item Color Selection</span><br><br>


			                                <div class="item_color_select d-inline-block">
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-1.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                                </a>
			                                </div>
			                                <div class="item_color_select d-inline-block">
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-2.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                                </a>
			                                </div>
			                                <div class="item_color_select d-inline-block">
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-3.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                                </a>
			                                </div>
			                                <div class="item_color_select d-inline-block">
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/zoom/product-4.jpg')}}" width="110" height="110" alt="product-thumbnail">
                                                </a>
			                                </div>
	                            </div>

	                            


                            



                            </div>
                            <!-- End .price-box -->


                            <hr class="short-divider short_divider">
                            <br>

                                <div class="pricing-table">
                                        <h5>Pricing Table</h5>



                        



                                        <table class="table table-bordered float-left" style="margin-bottom: 0;">
      <thead> <!-- Column names -->
        <tr>
          
          <th scope="col">Quantity</th>
          <th scope="col">Regular Price</th>
         
          <th scope="col">Sale</th>
        </tr>
      </thead>
      <tbody> <!-- Data -->
        <tr>
          
          <td>200</td>
          <td><strike>$2.19</strike></td>
          <td class="color-5d9136">$1.92</td>
        </tr>
        <tr>
          <td>600</td>
          <td><strike>$2.17</strike></td>
         
          <td class="color-5d9136">$1.90</td>
        </tr>
        <tr>
              <td>1200</td>
              <td><strike>$2.13</strike></td>
              <td class="color-5d9136">$1.87</td>
        </tr>
        <tr>
              <td>2600</td>
              <td><strike>$2.09</strike></td>
              <td class="color-5d9136">$1.83</td>
        </tr>
        
        <tr>
          
          <td>200</td>
          <td><strike>$2.19</strike></td>
          <td class="color-5d9136">$1.92</td>
        </tr>
        <tr>
          <td>600</td>
          <td><strike>$2.17</strike></td>
         
          <td class="color-5d9136">$1.90</td>
        </tr>
        <tr>
              <td>1200</td>
              <td><strike>$2.13</strike></td>
              <td class="color-5d9136">$1.87</td>
        </tr>
        <tr>
              <td>2600</td>
              <td><strike>$2.09</strike></td>
              <td class="color-5d9136">$1.83</td>
        </tr>
      </tbody>
    </table>
                   

                    <div class="type-quantity float-left">
                        <label>Type Quantity</label><br>
                        <input type="number" name="" class="type-quantity-input">
                    </div>


                    </div>

                            <div style="clear: both;"></div>
                            <br>

                            <hr class="short-divider short_divider">


                            <div class="imprint-options">
                                
                                <h5>Imprint Options</h5>
                                <div>
                                    <span class="float-left"><input class="decorated-imprint" type="checkbox" name="">Decorated (With Your logo or text)</span>
                                    <span class="float-right"><input class="blank-goods-imprint" type="checkbox" name="">Blank Goods (Nothing will be imprinted) </span>

                                </div>
                                <div class="clearfix mb-1"></div>

                                Please select an imprint location(s) below, additional cost may apply for multiple locations.
                            </div>

                            <br>
                            <hr class="short-divider short_divider">


                            <div class="front-imprint-options">
                               
                                <div class="row">
                                        

                                        <div class="col-6">
                                            <span class=""><input class="front-imprint-input" type="checkbox" name="">Front Imprint</span>
                                        </div>
                                        <div class="col-6 float-right">
                                            <span class="float-right">
                                                Price includes 1 color imprint
                                            </span>
                                            <span class="float-right">
                                                 <b>Set Fee : $55.00</b>
                                            </span>
                                            <span class="clearfix"></span>
                                        </div>

                                </div>
                                <div class="row max-color-row">
                                    <div class="col-12">
                                        <label>Max Colors : 1</label><br>
                                        <select class="select-max-colors">
                                            <option selected="" disabled="">Select</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row back-imprint-row">
                                    <div class="col-12">
                                        <input class="back-imprint-input" type="checkbox" name="">Back Imprint
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr class="short-divider short_divider">
                            <br>
                            <div class="cart-order-proceed">
                               <div class="row">
                                <div class="col-12">
                                    <a class="btn-anchor" href="javascript:void(0);"><button class="cart-status-button">Cart Status</button></a>
                                    <a class="btn-anchor" href="javascript:void(0);"><button class="order-proceed-guide-button">Order Proceed Guide</button></a>
                                    <a class="btn-anchor" href="javascript:void(0);"><button class="shipping-art-upload-button">Proceed to shipping and Art Upload</button></a>
                                                                        
                                    
                                </div>
                                   
                               </div>
                            </div>





                            <!-- <div class="product-desc">
                                <p>
                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                    placerat eleifend leo.
                                </p>
                            </div> -->
                            <!-- End .product-desc -->

                            <!-- <ul class="single-info-list">
                                <li>
                                    CATEGORY: <strong><a href="#" class="product-category">Audio Amplifier</a></strong>
                                </li>
                            </ul> -->

                            <!-- <div class="product-action">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text">
                                </div>


                                <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                                    Cart</a>

                                <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div> -->


                            <!-- <hr class="divider mb-0 mt-0"> -->

                            <!-- <div class="product-single-share mb-3">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                </div>
                                

                                <a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i class="icon-wishlist-2"></i><span>Add to
                                        Wishlist</span></a>
                            </div> -->
                            <!-- End .product single-share -->
                        </div>
                        <!-- End .product-single-details -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-prod-info" data-toggle="tab" href="#product-prod-info-content" role="tab" aria-controls="product-prod-info-content" aria-selected="true">Product Information</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-desc" data-toggle="tab" href="#product-description-content" role="tab" aria-controls="product-description-content" aria-selected="false">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-details" data-toggle="tab" href="#product-details-content" role="tab" aria-controls="product-details-content" aria-selected="false">Details</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-ship-est" data-toggle="tab" href="#product-ship-est-content" role="tab" aria-controls="product-ship-est-content" aria-selected="false">Shipping Estimate</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-quik-quete" data-toggle="tab" href="#product-quik-quete-content" role="tab" aria-controls="product-quik-quete-content" aria-selected="false">Quick Quete</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-samples" data-toggle="tab" href="#product-samples-content" role="tab" aria-controls="product-samples-content" aria-selected="false">Samples</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-pdf" data-toggle="tab" href="#product-pdf-content" role="tab" aria-controls="product-pdf-content" aria-selected="false">PDF</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <style type="text/css">
                            .product-prod-info-ul{
                                list-style: circle;
                            }
                            .product-prod-info-li{
                                margin-left: 20px;
                            }
                        </style>

                        <div class="tab-pane fade show active" id="product-prod-info-content" role="tabpanel" aria-labelledby="product-tab-prod-info">
                            <div class="product-prod-info-content">
                                <h5>Silkscreen Imprint Information</h5>
                                <ul class="product-prod-info-ul">
                                    <li class="product-prod-info-li">Price includes a one color, one location imprint.</li>
                                    <li class="product-prod-info-li">Step up charge is $55.00 per color, per location.</li>
                                    <li class="product-prod-info-li">For additional location, add a $45 running charge per piece</li>
                                    <li class="product-prod-info-li">For additional location, add a $45 running charge per color, per piece</li>
                                    <li class="product-prod-info-li">2 Color MAX</li>
                                </ul>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->






                        <div class="tab-pane fade " id="product-description-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="product-description-content">
                                
                                <ul class="product-description-content-ul">
                                    <li class="product-description-content-li">
                                        Silicon skin/case with Aluminum carabiner to attack to backpack, purse or belt loop so you always keeps tabs on your wireless earbuds.
                                    </li>
                                    <li>
                                        Earbuds not included.
                                    </li>
                                    <li>Carabiner measures: 1.57"w x 0.86"h x 0.125"d.
                                    </li>
                                </ul>
                            </div>
                            
                            <style type="text/css">
                                .product-description-content-ul li{
                                    list-style: circle;
                                    margin-left: 20px;
                                }

                                .product-details-content-ul li{
                                    list-style: circle;
                                    margin-left: 20px;
                                }
                            </style>
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade " id="product-details-content" role="tabpanel" aria-labelledby="product-tab-details">
                            <div class="product-details-content">
                                
                                <ul class="product-details-content-ul">
                                    <li>
                                        <div class="row">
                                            <div class="col-2">
                                                Minimum Order Amount: 
                                            </div>
                                            <div class="col-10">
                                                200
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-2">
                                                Production Time: 
                                            </div>
                                            <div class="col-10">
                                                5 - 10 working days
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-2">
                                                Product Dimenssion: 
                                            </div>
                                            <div class="col-10">
                                                1.88" x 2.16" x 0.86"
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row">
                                            <div class="col-2">
                                                Imprint Area: 
                                            </div>
                                            <div class="col-10">
                                                (Front Imprint: 1"w x .75"h), (Back Imprint:1"w x .75h")
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade " id="product-ship-est-content" role="tabpanel" aria-labelledby="product-tab-ship-est">
                            <div class="product-ship-est-content">
                               
                                <div class="row">
                                    <div class="col-12">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->


                        <div class="tab-pane fade " id="product-quik-quete-content" role="tabpanel" aria-labelledby="product-tab-quik-quete">
                            <div class="product-quik-quete-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                                </p>
                                <ul>
                                    <li>Any Product types that You want - Simple, Configurable
                                    </li>
                                    <li>Downloadable/Digital Products, Virtual Products
                                    </li>
                                    <li>Inventory Management with Backordered items
                                    </li>
                                </ul>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->


                        <div class="tab-pane fade " id="product-samples-content" role="tabpanel" aria-labelledby="product-tab-samples">
                            <div class="product-samples-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                                </p>
                                <ul>
                                    <li>Any Product types that You want - Simple, Configurable
                                    </li>
                                    <li>Downloadable/Digital Products, Virtual Products
                                    </li>
                                    <li>Inventory Management with Backordered items
                                    </li>
                                </ul>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->


                        <div class="tab-pane fade " id="product-pdf-content" role="tabpanel" aria-labelledby="product-tab-pdf">
                            <div class="product-pdf-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                                </p>
                                <ul>
                                    <li>Any Product types that You want - Simple, Configurable
                                    </li>
                                    <li>Downloadable/Digital Products, Virtual Products
                                    </li>
                                    <li>Inventory Management with Backordered items
                                    </li>
                                </ul>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->










                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                            <div class="product-reviews-content">
                                <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                                <div class="comment-list">
                                    <div class="comments">
                                        <figure class="img-thumbnail">
                                            <img src="{{asset('resources/views/superior/assets/images/blog/author.jpg')}}" alt="author" width="80" height="80">
                                        </figure>

                                        <div class="comment-block">
                                            <div class="comment-header">
                                                <div class="comment-arrow"></div>

                                                <div class="ratings-container float-sm-right">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:60%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>

                                                <span class="comment-by">
                                                    <strong>Joe Doe</strong> – April 12, 2018
                                                </span>
                                            </div>

                                            <div class="comment-content">
                                                <p>Excellent.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="divider"></div>

                                <div class="add-product-review">
                                    <h3 class="review-title">Add a review</h3>

                                    <form action="#" class="comment-form m-0">
                                        <div class="rating-form">
                                            <label for="rating">Your rating <span class="required">*</span></label>
                                            <span class="rating-stars">
                                                <a class="star-1" href="#">1</a>
                                                <a class="star-2" href="#">2</a>
                                                <a class="star-3" href="#">3</a>
                                                <a class="star-4" href="#">4</a>
                                                <a class="star-5" href="#">5</a>
                                            </span>

                                            <select name="rating" id="rating" required="" style="display: none;">
                                                <option value="">Rate…</option>
                                                <option value="5">Perfect</option>
                                                <option value="4">Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Not that bad</option>
                                                <option value="1">Very poor</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Your review <span class="required">*</span></label>
                                            <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                        </div>
                                        <!-- End .form-group -->


                                        <div class="row">
                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" required="">
                                                </div>
                                                <!-- End .form-group -->
                                            </div>

                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" required="">
                                                </div>
                                                <!-- End .form-group -->
                                            </div>

                                            <div class="col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="save-name">
                                                    <label class="custom-control-label mb-0" for="save-name">Save my
                                                        name, email, and website in this browser for the next time I
                                                        comment.</label>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>
                                </div>
                                <!-- End .add-product-review -->
                            </div>
                            <!-- End .product-reviews-content -->
                        </div>
                        <!-- End .tab-pane -->
                    </div>
                    <!-- End .tab-content -->
                </div>
                <!-- End .product-single-tabs -->

                <div class="products-section pt-0 pb-2">
                    <h2 class="section-title pb-3 text-capitalize">Related Products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                        'responsive': {
                            '768': {
                                'items': 4
                            },
                            '991': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5
                            }
                        }
                    }">


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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>

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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>

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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>

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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>

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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>

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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>

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
                                    </figure>

                                    <div class="product-details">

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
                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>






                       <!--  <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo36-product.html">
                                    <img src="{{asset('resources/views/superior/assets/images/demoes/demo36/products/product-1.jpg')}}" width="265" height="265" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">27%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo36-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="demo36-product.html">Blue High Hill</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>

                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    
                                </div>
                                
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                                
                            </div>
                            
                        </div> -->

                        
                    </div>
                    <!-- End .products-slider -->
                </div>
                <!-- End .products-section -->

                <!-- Start .products-section -->
                <div class="products-section pt-0 pb-2">
                    <h2 class="section-title pb-3 text-capitalize">Lower Priced</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                        'responsive': {
                            '768': {
                                'items': 4
                            },
                            '991': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5
                            }
                        }
                    }">


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
                                    </figure>
                                    <div class="product-details">
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

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>



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
                                    </figure>
                                    <div class="product-details">
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

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>



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
                                    </figure>
                                    <div class="product-details">
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

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>



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
                                    </figure>
                                    <div class="product-details">
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

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>


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
                                    </figure>
                                    <div class="product-details">
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

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>



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
                                    </figure>
                                    <div class="product-details">
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

                                        <div class="price-box">
                                            <!-- <span class="old-price">$29.00</span> -->
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>


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
                                    </figure>
                                    <div class="product-details">
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
                    <!-- End .products-slider -->
                </div>
                <!-- End .products-section -->


                <!-- Start .products-section -->
                <div class="products-section pt-0 pb-2">
                    <h2 class="section-title pb-3 text-capitalize">More Uscale</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                        'responsive': {
                            '768': {
                                'items': 4
                            },
                            '991': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5
                            }
                        }
                    }">


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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>




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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>


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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>




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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>




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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>



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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>


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
                                    </figure>

                                    <div class="product-details">
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
                                        <div class="price-box">
                                            <span style="font-weight: 200;">As Low As</span>
                                            <span class="product-price">$69.20</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>




                    </div>
                    <!-- End .products-slider -->
                </div>
                <!-- End .products-section -->

                <style type="text/css">
                    .star-rating-user-count{
                        margin-left: 10px;
                    }
                    
                    hr.hr {
    margin-top: 15px;
    margin-bottom: 15px;
}
                </style>
                <div class="products-section pt-0 pb-2">
                    <h2 class="section-title pb-3 text-capitalize">Customer Reviews</h2>

                    <div class="row">
                        <div class="col-1 text-center">
                            <!-- <i class="fa fa-user" style="font-size: 25px;"></i> -->
                            <img src="{{asset('resources/views/superior/assets/images/font-user.png')}}">
                        </div>
                        <div class="col-9">
                            <h5>FriendlySquirrel-5827</h5>
                            <p>
                                <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="star-rating-user-count">5/5</span>
                            </p>
                            <p>
                                "cant't describe how happy I am with this company. They are so helpful and are always easy to save me some money. If you order any type of promos, do yourself favor and try them. You will not be disappointed."
                            </p>
                            <div class="row">
                                <div class="col-5">
                                    pricing of products and services.
                                </div>
                                <div class="col-7">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-5">
                                    Likehood of customers making future purchases.
                                </div>
                                <div class="col-7">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-5">
                                    Overall Customer service
                                </div>
                                <div class="col-7">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="col-2 text-right">
                            27-09-2021
                        </div>
                    </div>


                    <hr class="hr">

                    <div class="row">
                        <div class="col-1 text-center">
                            <!-- <i class="fa fa-user" style="font-size: 25px;"></i> -->
                            <img src="{{asset('resources/views/superior/assets/images/font-user.png')}}">
                        </div>
                        <div class="col-9">
                            <h5>FriendlySquirrel-5827</h5>
                            <p>
                                <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span class="star-rating-user-count">5/5</span>
                            </p>
                            <p>
                                "cant't describe how happy I am with this company. They are so helpful and are always easy to save me some money. If you order any type of promos, do yourself favor and try them. You will not be disappointed."
                            </p>
                            <div class="row">
                                <div class="col-5">
                                    pricing of products and services.
                                </div>
                                <div class="col-7">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-5">
                                    Likehood of customers making future purchases.
                                </div>
                                <div class="col-7">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-5">
                                    Overall Customer service
                                </div>
                                <div class="col-7">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="col-2 text-right">
                            27-09-2021
                        </div>
                    </div>

                    <br>
                    <br>

                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <button type="button" class="btn-view-all">View All Reviews</button>
                        </div>
                    </div>

                    <style type="text/css">
                        .btn-view-all{
                            background-color: #68bee5;
                            color: #fff;
                            padding: 10px;
                            border:1px solid #68bee5;
                            border-radius: 5px;
                        }
                    </style>


                </div>




            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->

@endsection