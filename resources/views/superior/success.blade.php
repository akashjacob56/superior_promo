  @extends('superior.layouts.app',['title' => "SuperiorPromos "])
  @section('keyworddescription') 
  @section('description')
  @section('content')
<style type="text/css">
  .hidden{
    display: none !important;
  }
</style>
  <style type="text/css">
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

.shipping-add{
    background: #F5F5F5;
    border-radius: 5px;
    padding-top: 10px;
    padding-bottom: 10px;
}

.shipping-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}

.text-end{
    text-align:end;
}

.btn-address {
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
    width: 157px;
    height: 40px;
    background: #fff;
}

.edit-add{
    border: 1px solid #68BEE5;
    box-sizing: border-box;
    border-radius: 5px;
    background: #fff;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #68BEE5;
    width: 120px;
    height: 40px;
}

.form-control-superior {
    border: 1px solid #e6e6e6;
    margin-bottom: 1rem;
    max-width: 100%;
    padding: 5px;
    transition: all .3s;
    width: 100%;
    height: 40px;
}

label.check-checkout{
    color: #767f84;
    font-size: 1.4rem;
    font-weight: 400;
    margin: 0 15px 0.6rem;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 19px;
    letter-spacing: -0.017em;
    color: #575757;
}

.transaction-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 18px;
letter-spacing: -0.017em;
color: #575757;
}

p.transaction-txt>a{
    color: #01abec;
    text-decoration: underline;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 18px;
    letter-spacing: -0.017em;
}

.card-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.e-card{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 20px;
line-height: 23px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #68BEE5;
}

.form-lbl{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}

.txt-lbl {
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
}

.shipp-add-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.add-link-text {
    padding-left: 20px;
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 21px;
    display: flex;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    text-decoration-line: underline;
    color: #0759A4;
}

.bck-ord {
    background: #FFFFFF;
    border: 1px solid #0759A4;
    box-sizing: border-box;
    border-radius: 5px;
    width: 101px;
    height: 40px;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 20px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #0759A4;
}

.place-ord {
    background: #0759A4;
    border: 1px solid #0759A4;
    border-radius: 5px;
    width: 140px;
    height: 40px;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 20px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #FFFFFF;
}

.ord-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.ord-deteils-btn{
background: #68BEE5;
border: 1px solid #68BEE5;
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
width: 80px;
height: 40px;
}

.ord-left{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 21px;
align-items: center;
letter-spacing: -0.017em;
color: #575757;
}

.ord-amt-txt{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 21px;
text-align: right;
letter-spacing: -0.017em;
color: #212121;
}

.ord-t-txt{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 21px;
text-align:left;
letter-spacing: -0.017em;
color: #212121;
}

.ord-total{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 21px;
align-items: center;
text-align: right;
letter-spacing: -0.017em;
color: #5E8A57;
}

.order-details{
    background: #FFFFFF;
    border: 1px solid #DDDDDD;
    box-sizing: border-box;
    border-radius: 5px;
    height: fit-content;
}


/*for file upload input*/

.inputfile-box {
  position: relative;
}

.inputfile {
  display: none;
}


.file-box {
    display: inline-block;
    width: 100%;
    border: 1px solid;
    padding: 0px 0px 0px 10px;
    box-sizing: border-box;
    /*height: calc(2rem - 2px);
*/}

.file-button {
  background: red;
  padding: 5px;
  position: absolute;
  border: 1px solid;
  top: 0px;
  right: 0px;
}

.file-icon {
    position: absolute;
    font-size: 30px;
    line-height: 38px;
    left: 0px;
    color: #68bee5;
}

.u-here{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height:40px;
letter-spacing: -0.017em;
color: #212121;
}

.upload-text {
    width: 560px;
    height: 44px;
    background: #FFFFFF;
    border: none;
    box-sizing: border-box;
    box-shadow: none;
    position: relative;
    left: 50px;
}

/*----------------------------------------------------*/

</style>

 <style type="text/css">
                          .print-btn{
                            width: 133px;
height: 40px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;

align-items: center;
text-align: right;
letter-spacing: -0.017em;
border:1px solid #68bee5;
border-radius: 5px;
color: #FFFFFF;
background-color: #68bee5;
box-sizing: border-box;

                          }

                          .text-font-weight-500{
                            font-weight: 500 !important;
                          }

                          .text-font-weight-bold{
                            font-weight: bold !important;
                          }

                          .text-font-weight-normal{
                            font-weight: normal !important;
                          }

                          p.confirmation_email_text{
                            font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 20px;
line-height: 23px;

align-items: center;
letter-spacing: -0.017em;

color: #212121;
                          }

                          .order-confirmation-info-text .confirmation-heading-four{
                            font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 25px;
line-height: 29px;

align-items: center;
letter-spacing: -0.017em;

color: #212121;
                          }

                          .order-confirmation-info-text .simple-text{
                            font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 21px;
/* identical to box height */

align-items: center;
letter-spacing: -0.017em;

color: #212121;
                          }

                          .main .container span.cart-text-ord-conf-main-heading{
                            font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 30px;
line-height: 35px;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
                          }

                          .confirmation_email_text .my-account-profile-link{
                            font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 20px;
line-height: 23px;

align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5;
                          }

                          .artwork-info a.art-proof-superior-link{
                            font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;

align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5 !important;
                          }

                        </style>

                        <style type="text/css">
                  div.border-bottom-main{
                    border-bottom: 2px solid #CCCCCC;
                  }
                  .requrement-detail-order-info .necessary-step-content{
                    font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
align-items: center;
letter-spacing: -0.017em;

color: #212121;

                  }


                  .requrement-detail-order-info .art-requ-and-details{
                    font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5;
                  }


                  .requrement-detail-order-info .order-processing-information{
                    font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5;
                  }


                </style>


                <style type="text/css">
                .shipping-and-billing-address .ship-to .ship-to-heading{
                  font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #000000;
                }

                .shipping-and-billing-address .ship-to p{
                  font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #575757;

                }

                .shipping-and-billing-address .ship-to .edit-ship a.edit-shipp-info-link{
                    font-family: Roboto;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 14px;
                    line-height: 16px;
                    letter-spacing: -0.017em;
                    text-decoration-line: underline;

                    color: #68BEE5;
                }


                .shipping-and-billing-address .bill-to .bill-to-heading{
                  font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;

color: #000000;
                }

                .shipping-and-billing-address .bill-to p{
                  font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #575757;
                }

                .shipping-and-billing-address .bill-to .edit-bill .edit-bill-info-link{
                  font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5;
                }

              </style>

               <style type="text/css">
                .payment-text-main-heading{
                  font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
                }

                .payment-add{
    background: #F5F5F5;
    border-radius: 5px;
    padding-top: 10px;
    padding-bottom: 10px;
}

            .payment-information .pay-after-proof-approval{
              font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #222222;
            }

            .payment-information .payment-text{
              font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;

color: #575757;
            }

            .payment-information .payment-edit-shipp-info-para .payment-edit-shipp-info-link{
              font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5;

            }


              </style>


              <style type="text/css">
                .product-information{
                  border:1px solid #e1e1e1;
                  border-radius: 5px;
                  padding: 15px;

                }

                .product-information img.item-image{
                  width: 100px;
                  height: 100px;
                }

                .product-information .product-info-side h5{
                  font-family: Roboto;
                  font-style: normal;
                  font-weight: normal;
                  font-size: 14px;
                  line-height: 16px;
                  letter-spacing: -0.017em;
                  color: #212121;
                }


                .product-information .product-info-side p{
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
                button.continue-shopping-btn{
                  width: 157px;
                  height: 40px;

                  font-family: Roboto;
                  font-style: normal;
                  font-weight: 500;
                  font-size: 16px;
                  line-height: 19px;
                  align-items: center;
                  text-align: center;
                  letter-spacing: -0.017em;
                  background-color: white;
                  border:1px solid #68BEE5;
                  border-radius: 5px;
                  color: #68BEE5;
                  cursor: pointer;
                }

                .total-order-shopping .product-info p{
                    font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 21px;
align-items: center;
letter-spacing: -0.017em;

color: #575757;
                }
                .color-212121{
                  color: #212121 !important;
                }
                .color-5E8A57{
                  color: #5E8A57 !important;
                }
              </style>

              <style type="text/css">
                
                .btn-save-changes{
width:135px;
height:40px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
border: 1px solid #68BEE5;
background: #68BEE5;
border-radius: 5px;
}

.btn-cancel{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #575757;
background: #FFFFFF;
border: 1px solid #575757;
box-sizing: border-box;
border-radius: 5px;
width: 107px;
height: 40px;
}

.form-control {
      max-width: 100%;
}

              </style>


<style type="text/css">
  @media print
{
  #print_btn_hide{
    display: none !important;
  }
  #art_req_and_detail_order_process_info{
    display: none !important; 
  }

  #edit_ship_info_div{
    display: none !important; 
  }
  #edit-bill{
    display: none !important; 
  }
 #edit_payment_info{
  display: none !important; 
 }
 header.header{
  display: none !important;
 }
 footer.footer{
  display: none !important;
 }
 .top-links{
  display: none !important;
 }

 #continue_shopping_button_anchor{
  display: none !important;
 }
} 

</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

        <main class="main">
              <div class="container">
               <div class="row p-4 top-links">
                <span class="link-top-1">Home /</span>
                <span class="link-top-1">Cart /</span>
                <a href="#"><span class="checkout-link">Checkout</span></a>
               </div>

                <div class="row p-3">
                <span class="cart-txt cart-text-ord-conf-main-heading">Order Confirmation</span>
                </div>

                <div class="print_pdf_div" id="print_pdf_div">
                  
                

                <!-- Order Confirmation Information Text Start --------------- -->
                <div class="order-confirmation-info-text">
                  
                  <div class="row mb-2">

                    <!-- col-9 start -->
                    <div class="col-10"> 
                      <!-- heading ord-confi start -->
                      <div class="row">
                        <div class="col-12">
                            <h4 class="confirmation-heading-four">Thank you for choosing Superior Promos for all promotional needs!</h4>
                        </div>
                      </div>
                      <!-- heading ord-confi end -->

                      <div class="row">
                          <div class="col-12">
                            <p class="simple-text">Your Order #{{$order->id}}</p>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <p class="confirmation_email_text">A confirmation email was sent to devid.itinfonity@gmail.com and fill order details are available in <a class="my-account-profile-link" href="{{$base_url}}/my-account-profile">My Account</a> Section</p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <p class="simple-text">Please also add @superiorpromos.com domain to your email Safe List, to ensure delivery of all correspondance</p>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <p class="simple-text artwork-info" style="margin:0rem;">
                            If artwork and/or text was not uploaded during checkout, please submit it via email to the following address — <a class="art-proof-superior-link" href="javascript:void(0);">art@superiorpromos.com</a>
                          </p>
                          <p class="simple-text" style="margin:0rem;">
                            Include your Order # in the subject line. Proof approval is required before production starts.
                          </p>
                          <p class="simple-text" style="margin:0rem;">
                            Here are some helpful links
                          </p>
                        </div>
                      </div>




                  </div> 
                  <!-- col-9 end -->

                  <div class="col-2">
                    <div class="print-btn-div text-right noPrint" id="print_btn_hide">
                      <button class="print-btn" id="print-btn" onclick="printDiv()"><img class="d-inline-block" src="{{$base_url}}/resources/views/superior/assets/images/print-icon.png" style="width:30px;height: 30px;">&nbsp;&nbsp;<span style="">Print PDF</span></button>
                    </div>
                      
                  </div>

                    

                </div>
              </div>
                <!-- Order Confirmation Information Text End ----------------- -->


                
                <br>
                <div class="border-bottom-main"></div>
                <br><br>

                <!-- Requirement Details and Order Information Start ----------------------- -->
                <div class="requrement-detail-order-info">
                  <div class="row">
                    <div class="col-12">
                      <p class="necessary-step-content">Please follow the link review the NECESSARY STEPS required to complete the order.</p>
                    </div>
                    <div class="col" id="art_req_and_detail_order_process_info">
                      <a class="art-requ-and-details" href="javascript:void(0);">Art Requirements and Details</a>&nbsp;&nbsp;&nbsp;
                      <a class="order-processing-information" href="javascript:void(0);">Order processing information</a>
                    </div>
                  </div>
                </div>

                <!-- Requirement Details and Order Information Start ----------------------- -->

                 <br>
                <div class="border-bottom-main"></div>
                <br><br>



              <!-- Shipping and Billing Address Information Start ----------------------- -->
              
              <div class="shipping-and-billing-address">
                <div class="row">
                     <div class="col-3">
                        <div class="ship-to">
                          <h5 class="ship-to-heading">Shipping To</h5>
                          <p class="text-font-weight-500">{{$order->shipping_company_name}}</p>
                          
                          <p>
                            <!-- 12-45 River Road Fair Lawn,
                            NJ07410, United State -->
                            @if($order->shipping_address_line_1!="")
                                {{$order->shipping_address_line_1}},
                            @endif

                            @if($order->shipping_city!="")
                                {{$order->shipping_city}},
                            @endif

                            @if($order->shipping_state!="")
                                {{$order->shipping_state}},
                            @endif
                            
                            @if($order->shipping_country!="")
                                {{$order->shipping_country}},
                            @endif

                            @if($order->shipping_zip!="")
                                {{$order->shipping_zip}}
                            @endif
                          </p>
                          <p>
                            Phone Number : {{$order->shipping_day_telephone}}
                          </p>
                          <p class="edit-ship" id="edit_ship_info_div">
                            <a class="edit-shipp-info-link" href="javascript:void(0);">Edit Shipping Information</a>
                          </p>
                        </div>
                    </div>


                    




                    <div class="col-3">
                        <div class="bill-to">
                          <h5 class="bill-to-heading">Billing To</h5>
                          <p class="text-font-weight-500">{{$order->billing_company_name}}</p>
                          <p>
                            <!-- 12-45 River Road Fair Lawn,
                            NJ07410, United State -->
                            @if($order->billing_address_line_1!="")
                                {{$order->billing_address_line_1}},
                            @endif

                            @if($order->billing_city!="")
                                {{$order->billing_city}},
                            @endif

                            @if($order->billing_state!="")
                                {{$order->billing_state}},
                            @endif
                            
                            @if($order->billing_country!="")
                                {{$order->billing_country}},
                            @endif

                            @if($order->billing_zip!="")
                                {{$order->billing_zip}}
                            @endif

                          </p>
                          <p>
                            Phone Number : {{$order->billing_day_telephone}}
                          </p>
                          <p class="edit-bill" id="edit-bill">
                            <a class="edit-bill-info-link" href="javascript:void(0);">Edit Billing Information</a>
                          </p>
                        </div>
                    </div>
                </div>  


                




      <!-- Edit Shipping Address Row Start ------------------------------------ -->
      <div class="row">
          <div class="col-md-6 edit-shipping-address">
        <span class="add-add pb-3">Edit Shipping Address</span>
         <p>Starred(*) Fields are required.</p>
        <div class="row pt-3 pl-5">
            <div class="account-content">
                <form method="post" action="{{$base_url}}/order/shipp/edit/{{$order->id}}">
                      @csrf
                      <!-- <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
                         <div class="form-group form-check">

                            <input type="checkbox" class="form-check-input united-state-shipping" id="united-state-shipping" checked="">
                            <label class="form-check-label check-checkout" for="united-state">United States</label>
                       
                            <input type="checkbox" class="form-check-input canada-shipping" id="canada-shipping">
                            <label class="form-check-label check-checkout" for="canada">Canada</label>

                          </div>
                     </div> -->
                     
                    <input type="hidden" class="form-control txt-lbl" placeholder="David" id="shipp_address_id" name="order_id" value="{{$order->id}}">


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" placeholder="David" id="shipping_first_name" name="shipping_first_name" required="" value="{{$order->shipping_first_name}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" id="shipping_last_name" placeholder="xyz" name="shipping_last_name" required="" value="{{$order->shipping_last_name}}">
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="shipping_company_name" name="shipping_company_name" placeholder="David" value="{{$order->shipping_company_name}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" id="shipping_address_line_1" name="shipping_address_line_1" placeholder="2543  0042 3562 0210" required=""
                        value="{{$order->shipping_address_line_1}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="shipping_address_line_2" name="shipping_address_line_2" placeholder="2543  0042 3562 0210" value="{{$order->shipping_address_line_2}}" >
                    </div>



                   <div class="row">     
                    <div class="col">
                    <div class="select-custom">
                        <label class="form-lbl">City<span class="required">*</span></label>
                        <select name="shipping_city" id="shipping_city" class="form-control txt-lbl"  required=" ">
                            <option value="" selected="selected">
                                select City
                            </option>
                            @foreach($data['Allcity'] as $city)
                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                      <div class="col">
                       <div class="select-custom">
                        <label class="form-lbl">State<span class="required">*</span></label>
                        <select name="shipping_state" id="shipping_state" class="form-control txt-lbl" required="">
                            <option value="" selected="selected">Selecte State
                            </option>
                            @foreach($data['Allstates'] as $state)
                            <option value="{{$state->state_name}}">{{$state->state_name}}</option>
                            @endforeach
                        </select>
                       </div>
                      </div>


                    <div class="col">
                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
                        <input type="number" class="form-control txt-lbl" id="shipping_zip_code" name="shipping_zip" placeholder="123456" required=""
                        value="{{$order->shipping_zip}}">   
                    </div>                                         
                    </div>

                   </div>


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="shipping_day_telephone" name="shipping_day_telephone" required="" value="{{$order->shipping_day_telephone}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                <input type="text" class="form-control txt-lbl" id="shipping_ext" placeholder="Ext" name="shipping_ext" value="{{$order->shipping_ext}}">
                            </div>
                        </div>
                    </div>  



                    <!-- <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="shipping_fax" name="shipping_fax" placeholder="Fax" value="{{$order->shipping_fax}}" >
                    </div> -->


                    <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input default-ship-add-shipping" id="default-ship-add-shipping">
                            <label class="form-check-label check-checkout" for="default-ship-add">Make this my default shipping address</label>
                    </div>
 -->

                    <div class="row">
                        <div class="col edit-ad-check-shipping">
                         <button type="submit" class="btn-save-changes">Save Change</button>   
                        </div>
                        <div class="col edit-add-cancel-shipping">
                          <button type="button" class="btn-cancel">Cancel</button>  
                        </div>
                    </div>

                </form>
            </div>
        </div>

        </div>
                </div>
      <!-- Edit Shipping Address Row End --------------------------------------------------- -->

     


      <!-- Edit Billing Address Row Start ------------------------------------------------- -->

      <div class="row">
          <div class="col-md-6 billing-edit-address">
        <span class="add-add pb-3">Edit Billing Address</span>
         <p>Starred(*) Fields are required.</p>
        <div class="row  pt-3 pl-5">
            <div class="account-content">
                <form method="POST" action="{{$base_url}}/order/bill/edit/{{$order->id}}">
                      @csrf
                      <!-- <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
                         <div class="form-group form-check">

                            <input type="checkbox" class="form-check-input united-state-billing" id="united-state-billing" checked="">
                            <label class="form-check-label check-checkout" for="united-state">United States</label>
                       
                            <input type="checkbox" class="form-check-input canada-billing" id="canada-billing">
                            <label class="form-check-label check-checkout" for="canada">Canada</label>

                          </div>
                     </div> -->
                     
                    <input type="hidden" class="form-control txt-lbl" placeholder="David" id="billing_order_id" name="order_id" value="{{$order->id}}">


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" placeholder="David" id="billing_first_name" name="billing_first_name" required="" value="{{$order->billing_first_name}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname" class="form-lbl">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" id="billing_last_name" placeholder="xyz" name="billing_last_name" required="" value="{{$order->billing_last_name}}">
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="billing_company_name" name="billing_company_name" placeholder="David" value="{{$order->billing_company_name}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" id="billing_address_line_1" name="billing_address_line_1" placeholder="2543  0042 3562 0210" required=""
                        value="{{$order->billing_address_line_1}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="billing_address_line_2" name="billing_address_line_2" placeholder="2543  0042 3562 0210" value="{{$order->billing_address_line_2}}" >
                    </div>



                   <div class="row">     
                    <div class="col">
                    <div class="select-custom">
                        <label class="form-lbl">City<span class="required">*</span></label>
                        <select name="billing_city" id="billing_city" class="form-control txt-lbl"  required=" ">
                            <option value="" selected="selected">
                                select City
                            </option>
                            @foreach($data['Allcity'] as $city)
                            <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                      <div class="col">
                       <div class="select-custom">
                        <label class="form-lbl">State<span class="required">*</span></label>
                        <select name="billing_state" id="billing_state" class="form-control txt-lbl" required="">
                            <option value="" selected="selected">Selecte State
                            </option>
                            @foreach($data['Allstates'] as $state)
                            <option value="{{$state->state_name}}">{{$state->state_name}}</option>
                            @endforeach
                        </select>
                       </div>
                      </div>


                    <div class="col">
                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
                        <input type="number" class="form-control txt-lbl" id="billing_zip_code" name="billing_zip" placeholder="123456" required=""
                        value="{{$order->billing_zip}}">  
                    </div>                                         
                    </div>

                   </div>


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="billing_day_telephone" name="billing_day_telephone" required="" value="{{$order->billing_day_telephone}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                <input type="text" class="form-control txt-lbl" id="billing_ext" placeholder="Ext" name="billing_ext" value="{{$order->billing_ext}}">
                            </div>
                        </div>
                    </div>  



                    <!-- <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="billing_fax" name="billing_fax" placeholder="Fax" value="{{$order->billing_fax}}" >
                    </div> -->


                    <!-- <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input default-ship-add-billing" id="default-ship-add-billing">
                            <label class="form-check-label check-checkout" for="default-ship-add">Make this my default shipping address</label>
                    </div> -->


                    <div class="row">
                        <div class="col edit-ad-check-billing">
                         <button type="submit" class="btn-save-changes">Save Change</button>   
                        </div>
                        <div class="col edit-add-cancel-billing">
                          <button type="button" class="btn-cancel">Cancel</button>  
                        </div>
                    </div>

                </form>
            </div>
        </div>

        </div>
                </div>

      <!-- Edit Billing Address Row End ---------------------------------------------------- -->

               
              </div>  





              <!-- Shipping and Billing Address Information End ----------------------- -->



              <!-- Payment Information Start ------------------------- -->
             
              <div class="payment-information">
                
                  <div class="row payment-add p-3"> <span class="payment-text-main-heading">Payment Information</span></div> 
                  <div class="row mt-2">
                    <div class="col-12">
                    <h5 class="pay-after-proof-approval">Pay after Proof Approval</h5>
                    <p class="payment-text">
                      Payment will be required after an approval and before order moves to production.
                    </p>
                    <p class="payment-text">
                      For any questions please contact customer service and check our Order Process page.
                    </p>
                    <p class="payment-text payment-edit-shipp-info-para mt-2"><a id="edit_payment_info" href="javascript:void(0);" class="payment-edit-shipp-info-link">Edit Shipping Information</a></p>
                    </div>
                  </div>
              </div>


              <!-- Payment Information End ------------------------- -->

                
                @if($order->orderitems!="[]")

                  @foreach($order->orderitems as $orderitem)
                  


              <!-- Product Information Start ------------------------- -->
                <div class="row product-information mt-2 mb-2">
                  <div class="col-12">
                    <div class="row">
                        <div class="col-2">
                         
                            @if($orderitem->product!="")
                              <img class="item-image" src="{{$base_url}}/storage/app/{{$orderitem->product->product_image}}" style="width: 100px;height: 100px;">
                            @endif
                     
                      </div>
                      <div class="col-10 product-info-side">
                        
                            @if($orderitem->product!="")
                              @if($orderitem->product->product_translation!="")
                                <h5>{{$orderitem->product->product_translation->product_name}}</h5>
                              @endif
                            @endif
                       
                        <div class="row">
                          <div class="col-2">
                              <p>Item Number -</p>
                          </div>
                         
                            @if($orderitem->product!="")
                            <div class="col-2">
                                <p class="text-font-weight-500">#{{$orderitem->product->product_id}}</p>
                            </div>
                            @endif
                         
                        </div>



                        <div class="row">
                          @if($orderitem->cart_item!="")

                          

                            @if($orderitem->cart_item->cartitemcolor!="")
                            <div class="col-2">
                                <p>Item Color -</p>
                            </div>
                            
                            <div class="col-2">
                              <p class="text-font-weight-500">{{$orderitem->cart_item->cartitemcolor->color_name}}</p>
                            </div>
                            @endif
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- Product Information End --------------------------- -->
              @endforeach
              @endif




              <!-- Order total Start ---------------------------- -->
             
              <div class="row mb-4 total-order-shopping">
                <div class="col-3">
                  <a href="{{$base_url}}/shop" id="continue_shopping_button_anchor">
                    <button class="continue-shopping-btn" id="">Continue Shopping</button>
                  </a>
                </div>
                <div class="col-6">
                  
                </div>
                <div class="col-3 product-info">
                    <div class="row">
                      <div class="col-6">
                        <p>Product Total</p>
                      </div>
                      <div class="col-6 ">
                        <p class="text-font-weight-500 text-right color-212121">${{$order->price}}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <p>Shipping Cost</p>
                      </div>
                      <div class="col-6 ">
                        <p class="text-font-weight-500 text-right color-212121">$0.00</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6 ">
                        <p class="color-212121">Order Total</p>
                      </div>
                      <div class="col-6 ">

                        <p class="text-font-weight-500 text-right color-5E8A57">${{$order->price}}</p>

                      </div>
                    </div>
                </div>
              </div>

              <!-- Order total Start ---------------------------- -->





                <!--  <div class="row ">
    
                     <div class="col-md-8 pr-5">

                     <div class="row shipping-add p-3"> <span class="shipping-txt">Shipping Address</span> 
                     </div> 
                  
                     <div class="row pt-4 pb-4 d-flex align-items-center">
                         <div class="col-md-12">
                            <ul>
                               <li><span>Devid</span></li>
                                <li><span>12-45 River Road Fair Lawn, NJ 07410</span></li>
                                <li><span>1-888-544-2534</span></li>
                            </ul>
                         </div>
                     </div>


                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Ship to Multiple Location
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select> 
                       </div>


                       <div class="row pt-3 pb-3">
                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">No, Ship to a single location</label>
                              </div>
                            </div>

                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Yes, Ship to multiple locations</label>
                              </div>
                            </div>

                       </div>



                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Tex Exemption Certificate
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select> 
                       </div>


                       <div class="row pt-3 pb-3">
                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Don’t have</label>
                              </div>
                            </div>

                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Yes, I have</label>
                              </div>
                            </div>


                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Will Provde later</label>
                              </div>
                            </div>                            

                       </div>


                    <div class="row">

                    <div class="inputfile-box pt-10 ">
                    <input type="file" id="file" class="inputfile " multiple="" onchange='uploadFile(this)'>
                    <label for="file">
                    <span id="file-name" class="file-box u-here upload-text"> Choose File</span>
                    <i class="fa fa-upload file-icon" aria-hidden="true"></i>  
                    </label>
                    </div>

                    </div> 




                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Payment Method
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select> 
                       </div>


                       <div class="row pt-3 pb-3">
                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Credit Card</label>
                              </div>
                            </div>

                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Check / Money Order</label>
                              </div>
                            </div>


                           <div class="col">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-checkout" for="exampleCheck1">Pay AfterProof Approval</label>
                              </div>
                            </div>                            

                       </div>

                       <div class="row pb-3">
                        <p class="transaction-txt">This transaction will be completed through a secure SSL connection and up to 256 bit encryption. Please <a href="#">Visit our FAQ Page</a> for further details and feel free to check our <a href="#">Guarantee</a>. and <a href="">Order Process Page</a>.</p>
                       </div>

                                             
                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Enter a Billing Address
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select>
                       </div> 

                       <div class="row">
                        <p class="pl-5">
                            <div class="form-group form-check pr-3">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>
                            <span class="shipp-add-txt">Same as Shipping Address</span>
                        </p>
                       </div> 
                    

                    <div class="row pl-5 pt-3">
                         <div class="col-md-12">
                            <ul>
                               <li><span>Devid</span></li>
                                <li><span>12-45 River Road Fair Lawn, NJ 07410</span></li>
                                <li><span>1-888-544-2534</span></li>
                            </ul>
                         </div>
                     </div>




                       <div class="row pl-3  pb-5"> 
                            <a href="#" class="add-link-text">Select Billing Address</a>
                            <a href="#" class="add-link-text">Add Billing Address</a>
                       </div>                  

                        <div class="row pb-5">
                            <div class="col-md-2"><button class="bck-ord">Back</button></div>
                            <div class="col-md-2"><button class="place-ord">Place Order</button></div>
                        </div>


                       </div>

     
                     <div class="col-md-4 order-details">
                     <div class="row shipping-add p-3 ">
                      <span class="ord-txt">Order Details</span> 
                     </div>
                        <ul>
                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-left">Product Total</div>
                            <div class="col-md-4 ord-amt-txt">$529.00</div>
                            </div>
                            </p>
                            </li>

                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-left">Shipping Cost</div>
                            <div class="col-md-4 ord-amt-txt">$0.00</div>
                            </div>
                            </p>
                            </li>


                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-t-txt">Order Total</div>
                            <div class="col-md-4 ord-total">$529.00</div>
                            </div>
                            </p>
                            </li>                             
                        </ul>     
                        <p class="pb-4"><button class="ord-deteils-btn">Details</button></p> 
                     </div>

                 </div>
 -->

                  </div>

            </div>
        </main>




<script type="text/javascript">   
function uploadFile(target){
    document.getElementById("file-name").innerHTML = target.files[0].name;
}
</script>

 <script type="text/javascript">
        $(document).ready(function(){
            var city_name = "{{$order->shipping_city}}";
            $('#shipping_city option[value='+city_name+']').prop('selected',true);

            var state_name = "{{$order->shipping_state}}";
            $('#shipping_state option[value='+state_name+']').prop('selected',true);
        });
      </script>


 <script type="text/javascript">
                $(document).ready(function(){
                    var billing_city = "{{$order->billing_city}}";
                    $('#billing_city option[value='+billing_city+']').prop('selected',true);

                    var billing_state = "{{$order->billing_state}}";
                    $('#billing_state option[value='+billing_state+']').prop('selected',true);
                });
              </script>

              <script type="text/javascript">
                      $(document).ready(function(){
                          $('.edit-ship').on('click','.edit-shipp-info-link',function(){

                          })
                      });
                    </script>

                    <script type="text/javascript">
                  $(document).ready(function(){

                    // Shipping Edit Order
                     $('.edit-shipping-address').hide();
                     $(".edit-ship").on('click','.edit-shipp-info-link',function(){
                        $('.billing-edit-address').hide();
                        $('.edit-shipping-address').toggle();
                     });

                     //Billing Edit Order
                     $('.billing-edit-address').hide();
                    $('.edit-bill').on('click','.edit-bill-info-link',function(){
                      $('.edit-shipping-address').hide();
                      $('.billing-edit-address').toggle();
                    });


                    //Shipping Cancel Order
                    $('.edit-add-cancel-shipping').on('click','.btn-cancel',function(){
                        $('.edit-shipping-address').hide();
                    });

                    //Billing Cancel Order
                    
                    $('.edit-add-cancel-billing').on('click','.btn-cancel',function(){
                        $('.billing-edit-address').hide();
                    });

                  });
                </script>


                <script>
    // function print() {
    //     var frame = document.getElementById('print_pdf_div');
    //     frame.contentWindow.focus();
    //     frame.contentWindow.print();
    // }

//     function printDiv(divName) {
//       // document.getElementById('print_btn_hide').classList.add("hidden");
//       // document.getElementById('art_req_and_detail_order_process_info').classList.add("hidden");
//       // document.getElementById('edit_ship_info_div').classList.add("hidden");
//       // document.getElementById('edit-bill').classList.add("hidden");
//       // document.getElementById('edit_payment_info').classList.add("hidden");
//       // document.getElementById('continue_shopping_button_anchor').classList.add("hidden");



//      var printContents = document.getElementById(divName).innerHTML;
//      var originalContents = document.body.innerHTML;

//      document.body.innerHTML = printContents;

//      window.print();

//      document.body.innerHTML = originalContents;


// }




</script>


<script>
        function printDiv() {
            var divContents = document.getElementById("print_pdf_div").innerHTML;
            // var a = window.open('', '', 'height=500, width=500');
            // a.document.write('<html>');
            // a.document.write('<body > <h1>Div contents are <br>');
            // a.document.write(divContents);
            // a.document.write('</body></html>');
            // a.document.close();
            window.print();
        }
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