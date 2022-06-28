@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')
<style type="text/css"> 
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



.normal-txt-p{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 20px;
line-height: 25px;
color: #212121;
}



.color-b{ 
    color: #01abec;
    text-decoration: underline;
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



.art-work-li{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 15px;
line-height: 22px;
color: #212121;
}

.color-b{ 
    color: #01abec;
    text-decoration: underline;
}

.p-amt-txt{
font-family: Roboto;
font-style: normal;
font-weight: 900;
font-size: 65px;
line-height: 30px;
align-items: center;
text-align: center;
color: #68BEE5;
}

.off-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 24px;
line-height: 30px;
text-align: center;
color: #68BEE5;
}

.pro-desc {
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 18px;
    text-align: center;
    color: #212121;
    padding-left: 10px;
    padding-right: 10px;
}

.promotion-col {
    background: #FFFFFF;
    box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.16);
    border-radius: 5px;
    /*width: 299px;*/
    height: 387px;
    /*border-bottom: solid 5px #68BEE5;*/
    margin-right: 10px;
    margin-bottom: 20px;
    max-width: 290px;
    height: 387px;
}

.amt-row {
    padding-top: 40px;
    padding-left: 30%;
    padding-bottom: 49px;
}

.color-68BEE5{
    color: #68BEE5;
}

.display-block{
    display: block;
}

img.ord-process-img{
    width: 122px;height:122px;
}
.pro-desc-anchor{
/*font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 18px;
text-decoration-line: underline;
color: #68BEE5;*/

font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 18px;
text-align: center;
text-decoration-line: underline;
color: #68BEE5;
}

.image-order-process-vertical-bar {
    position: absolute;
    z-index: -1;
    margin-left: -12px;
    margin-top: 78px;
    height: 40%;
}

.corner-fol-image{
    width: 53px;
    height: 35%;
    z-index: 1;
    position: absolute;
    margin-top: 31%;
    margin-left: -12px;
}
.container-fluid {
    /*width: 100%;*/
    padding-right: 44px;
    padding-left: 45px;
    /*margin-right: auto;
    margin-left: auto;*/
}

.text-conten-promotion{
        margin-left: 10px;
        margin-right: 10px;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

       
              <div class="container-fluid pb-5">
        
                <div class="row p-3">
                <span class="cart-txt">Full Art Services, Free Digital Proofs, Unlimited Proof Revisions</span>

                </div>

                <div class="row pt-5 pb-4">
                    @if($order_processes!="[]")
                    @foreach($order_processes as $order_process)
                        <div class="col-md-3 main-promotion-col">
                            <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">
                            <div class="promotion-col">
                                <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                                <div class="row amt-row">
                                    <span class="p-amt-txt">
                                        <img class="ord-process-img" src="{{$base_url}}/storage/app/{{$order_process->order_process_image}}">
                                    </span><!-- <span class="off-txt">off</span> -->
                                </div>

                              <div class="text-conten-promotion text-center">
                                    <!-- <p class="pro-desc">An order can be placed online or by calling our customer service department at</p>
                                    <a class="pro-desc-anchor" href="javascript:void(0);">888-577-6667</a> -->
                                    <?php echo $order_process->order_process_description;?>
                                </div> 

                                
                            </div>
                        </div>
                    @endforeach
                    @endif
                    

                <!-- <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">
                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">
                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-2.png">
                            </span>
                            
                        </div>

                        <div class="text-conten-promotion text-center">
                            <p class="pro-desc">Email your artwork/logo/text to: <span class="color-68BEE5">art@superiorpromos.com</span> include your order # in the subject line.</p>
                            <a class="pro-desc-anchor" href="javascript:void(0);">Artwork Requirements Page</a>
                        </div>
                    </div>
                </div> -->


<!-- 
                <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">
                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">
                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-3.png">
                            </span>
                            
                        </div>

                       

                        <div class="text-conten-promotion text-center">
                            <p class="pro-desc">
                                We provide unlimited FREE digital proofs.
                            </p>
                        </div>
                        <p class="pro-desc">Art proof(s) will be available within 24-48 hours via email & also uploaded to you account for approval.</p>
                    </div>
                </div>
 -->


                <!-- <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">
                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">
                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-4.png">
                            </span>
                            <
                        </div>

                        

                            <div class="text-conten-promotion text-center">
                                <p class="pro-desc">
                                    Proof approval is required before an order moves to production. Approvals woll be accepted via email or in your online account.
                                </p>
                                <p class="pro-desc">
                                    For any questions contact the art department at
                                </p>
                                <p class="pro-desc">
                                    <a class="pro-desc-anchor" href="javascript:void(0);">art@superiorpromos.com</a>
                                </p>
                            </div>

                    </div>
                </div>
 -->

               <!--  <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">
                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">
                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-5.png">
                            </span>
                            
                        </div>

                        
                        <div class="text-conten-promotion text-center">
                            <p class="pro-desc">After art approval is received, the order will move into production. Production time varies by product and is listed on the product page. If a rush option is choosen production time will be adjusted accordingly.</p>
                        </div>
                    </div>
                </div> -->


                <!-- <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">

                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">

                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-6.png">
                            </span>
                           
                        </div>
                        
                           <div class="text-conten-promotion text-center">
                               <p class="pro-desc">
                                   An estimated ship date for your order will be set within 24-48 hours after the order is sent to production. If required, contact customer service for expedited shipping options.
                               </p>
                            </div>
                    </div>
                </div> -->


                <!-- <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">

                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">

                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-7.png">
                            </span>
                        </div>
                        <div class="text-conten-promotion text-center">
                           <p class="pro-desc">
                               After the order ships will emails full tracking information and cost of shipping (if applicable).
                           </p>
                        </div>
                    </div>
                </div> -->


                <!-- <div class="col-md-3 main-promotion-col">
                    <img class="image-order-process-vertical-bar" src="{{$base_url}}/resources/views/superior/assets/images/order-process-vertical-bar.png">
                    <div class="promotion-col">
                        <img class="corner-fol-image" src="{{$base_url}}/resources/views/superior/assets/images/order-process-polygon-1.png">
                        <div class="row amt-row">
                            <span class="p-amt-txt">

                                <img class="ord-process-img" src="{{$base_url}}/resources/views/superior/assets/images/order-process-8.png">
                            </span>
                            
                        </div>
                        
                           <div class="text-conten-promotion text-center">
                               <p class="pro-desc">
                                   Final Invoice(s) will be available within 48 hours after the order ships. Invoice(s) can be viewed in your online account or requested by emailing the Billing Department at
                               </p>
                       </div>
                    </div>
                </div> -->

                </div>


                <!-- <div class="row  pb-3 display-block">
                <p>            
                <li class="art-work-li">Coupons are valid until 07/31/2022.</li>
                <li class="art-work-li">Cannot be used on current orders in house.</li>
                <li class="art-work-li">Discount is applied before any shipping cost.</li>
                <li class="art-work-li">Discount is applied to base price and setup charges only. (if applicable)</li>
                <li class="art-work-li">May not be combined with any other offer or Price match orders. One offer per order.</li>
                <li class="art-work-li">Must be entered at checkout or mentioned when placing an order over the phone.</li>
                </p>
                </div> -->

            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><a href="{{$base_url}}/shop"><button class="btn-go-shopping">Go Shopping</button></a></div>  
            </div>



</div>
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