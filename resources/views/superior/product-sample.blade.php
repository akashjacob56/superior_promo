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
.plain-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 20px;
line-height: 25px;
color: #212121;
}

.txt-title{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 20px;
line-height: 21px;
color: #212121;
}


.m-title{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 25px;
line-height: 21px;
color: #212121;
}



 @media only screen and (max-width: 1479px) and (min-width: 1270px){
.col-b {
    /*border-bottom: solid 5px #68BEE5;
    border-radius: 5px;*/
    max-width: 280px;
    /*margin-right: 20px;*/
}
}

@media only screen and (max-width: 1679px) and (min-width: 1480px){
.col-b {
    /*border-bottom: solid 5px #68BEE5;
    border-radius: 5px;*/
    max-width: 330px;
    /*margin-right: 20px;*/
}
}

@media only screen and (max-width: 1919px) and (min-width: 1680px){
.col-b {
    /*border-bottom: solid 5px #68BEE5;
    border-radius: 5px;*/
   max-width: 380px;
    /*margin-right: 20px;*/
}
}

@media only screen and (max-width: 2400px) and (min-width: 1920px){
.col-b {
    /*border-bottom: solid 5px #68BEE5;
    border-radius: 5px;*/
    max-width: 430px;
    /*margin-right: 20px;*/
}
}


.para-text{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 20px;
line-height: 25px;
color: #212121;
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


h5.product-h5-content{
    font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 18px;
/* identical to box height, or 100% */


color: #212121;
}


 .product-sample-img{
    position: absolute;
width: 200px;
height: 200px;
 }

 div.row-product-sample{
    border-bottom: 2px solid #CCCCCC;
    margin-bottom: 25px;
 }

 div.product-sample-col-10{
    padding-left: 25px;
 }
</style>



       
<div class="container pb-5">

    <div class="row pt-4 pb-4">
    <span class="cart-txt">Product Samples</span>
    </div>

    


    <!-- <div class="row">
        <div class="col-md-3 col-b">
             <div class="row pt-5 pb-5">
                 <div class="col-md-12 text-center">
                     <img class="mx-auto d-block" src="{{$base_url}}/resources/views/superior/assets/images/about1.png"/>
                 </div>
             </div>
             <div class="row text-center pt-5 pb-5">
                 <div class="col-md-12">
                     <span>Superior Prices</span>
                 </div>
             </div>
        </div>

    </div> -->


    <div class="row pt-5 pb-5">
        <div class="col-12">


            <div class="row row-product-sample">
                <div class="col-2 col-b">
                    <img class="mx-auto d-block product-sample-img" src="{{$base_url}}/storage/app/{{$product_sample->product_sample_image}}"/>
                </div>
                <div class="col-10 product-sample-col-10">
                        <!-- <h5 class="product-h5-content">NOT SURE IF THE PRODUCT IS RIGHT FOR YOU?</h5> -->
                        <h5 class="product-h5-content">{{$product_sample->product_sample_title}}</h5>

                        <?php echo $product_sample->product_sample_description; ?>
                        <!-- <p class="para-text pb-3">
                            A sample can make that decision easier.
                        </p>
                       <p class="para-text pb-3">
                                We understand that choosing the right product for your next event or promotion can be challenging. To help you decide which product is right for you we offer imprinted and non-imprinted samples. Ordering a Product Sample is fast and easy on our advanced ecommerce website. To order simply click on the Order Sample button located on every product page throughout the website.
                        </p>
                        <p class="para-text pb-3">
                                We thank you for choosing Superior Promos for all your promotional needs!
                        </p> -->
                    
                </div>
            </div>

            

            <div class="row row-product-sample">
                <div class="col-2">
                    <img class="mx-auto d-block product-sample-img" src="{{$base_url}}/storage/app/{{$product_sample->order_sample_image}}"/>
                </div>
                <div class="col-10 product-sample-col-10">
                        <!-- <h5 class="product-h5-content">HOW TO ORDER A SAMPLE</h5> -->
                        <h5 class="product-h5-content">{{$product_sample->order_sample_title}}</h5>
                        <?php echo $product_sample->order_sample_description; ?>
                        <!-- <ul>
                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                To order a sample please go to a specific product page and select Order Sample link. Create and account and follow the steps required to complete your request. You can also request a sample by emailing your request to samples@superiorpromos.com
                            </li>
                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                In your request please include the following: Item #(s), Quantity, Any Specific Color, Billing, Shipping & Contact Information and Shippers Account (if available).
                            </li>
                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                The samples department will contact you regarding your request within 24 hours. They will provide you with cost (if applies) and shipping options.
                            </li>
                        </ul> -->
                    
                </div>
            </div>

           

            <div class="row row-product-sample">
                <div class="col-2">
                    <img class="mx-auto d-block product-sample-img" src="{{$base_url}}/storage/app/{{$product_sample->policy_sample_image}}"/>
                </div>
                <div class="col-10 product-sample-col-10">
                        <!-- <h5 class="product-h5-content">SAMPLE POLICY</h5> -->
                        <h5 class="product-h5-content">{{$product_sample->policy_sample_title}}</h5>
                        <?php echo $product_sample->policy_sample_description; ?>
                        <!-- <ul>
                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                The cost of sample including shipping must be paid at the time of the sample request (if pricing applies)
                            </li>
                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                If you choose to place an order for an item which you have sampled. Superior Promos will credit the cost of that sample and the cost of its ground shipping towards your order.
                            </li>
                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                All samples are shipped either blank or with a random imprint. Samples may not be customized with personal information. If an actual Pre-Production proof is needed please email info@superiorpromos.com for details and pricing.
                            </li>

                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                All sample orders are shipped by Ground Service. If you need to expedite shipping please provide a shipping account number or request more information when ordering a sample.
                            </li>

                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                Limit 5 items. Maximum 3 pieces of each item.
                            </li>

                            <li class="para-text mb-1 ml-5" style="list-style-type: circle;">
                                Superior Promos reserves the right to reject any sample request.
                            </li>
                        </ul> -->
                    
                </div>
            </div>




        </div>
    </div>

     
            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><a href="{{$base_url}}/shop"><button class="btn-go-shopping" type="button">Go Shopping</button></a></div>  
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