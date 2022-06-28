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

.pro-desc{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 20px;
line-height: 30px;
text-align: center;
color: #212121;
}

.promotion-col {
    background: #FFFFFF;
    box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.16);
    border-radius: 5px;
    width: 299px;
    height: 387px;
    border-bottom: solid 5px #68BEE5;
    margin-right: 10px;
    margin-bottom: 20px;
    max-width: 290px;
}

.amt-row {
    padding-top: 100px;
    padding-left: 25%;
    padding-bottom: 100px;
}

.color-68BEE5{
    color: #68BEE5;
}

.display-block{
    display: block;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

       
              <div class="container pb-5">
        
                <div class="row p-3">
                <span class="cart-txt">Current Promotion</span>
                 
                 <p class="pt-4 normal-txt-p"> 
                     TEST at SuperiorPromos.com our number one goal is to provide our clients with the best customer service, top selling promotional products and best prices on the web. Every month we go beyond our already Lowest Price Guarantee! and offer even more incentives to save on great products.
                 </p>

                </div>

                <div class="row pt-5 pb-4">
                  
                    <div class="col-md-3 promotion-col">

                        <div class="row amt-row">
                            <span class="p-amt-txt">$10</span><span class="off-txt">off</span>
                        </div>

                        <p class="pro-desc">The purchase of<span class="color-68BEE5">$150</span> or more use coupon code
                            <span class="color-68BEE5">10 off</span></p>

                    </div>


                    <div class="col-md-3 promotion-col">

                        <div class="row amt-row">
                            <span class="p-amt-txt">$10</span><span class="off-txt">off</span>
                        </div>

                        <p class="pro-desc">The purchase of<span class="color-68BEE5">$150</span> or more use coupon code
                            <span class="color-68BEE5">10 off</span></p>

                    </div>


                        <div class="col-md-3 promotion-col">

                        <div class="row amt-row">
                            <span class="p-amt-txt">$10</span><span class="off-txt">off</span>
                        </div>

                        <p class="pro-desc">The purchase of<span class="color-68BEE5">$150</span> or more use coupon code
                            <span class="color-68BEE5">10 off</span></p>

                    </div>


                    <div class="col-md-3 promotion-col">

                        <div class="row amt-row">
                            <span class="p-amt-txt">$10</span><span class="off-txt">off</span>
                        </div>

                        <p class="pro-desc">The purchase of<span class="color-68BEE5">$150</span> or more use coupon code
                            <span class="color-68BEE5">10 off</span></p>

                    </div>



                    <div class="col-md-3 promotion-col">

                        <div class="row amt-row">
                            <span class="p-amt-txt">$10</span><span class="off-txt">off</span>
                        </div>

                        <p class="pro-desc">The purchase of<span class="color-68BEE5">$150</span> or more use coupon code
                            <span class="color-68BEE5">10 off</span></p>

                    </div>

                    <div class="col-md-3 promotion-col">
                        <div class="row amt-row">
                            <span class="p-amt-txt">$10</span><span class="off-txt">off</span>
                        </div>
                        <p class="pro-desc">The purchase of<span class="color-68BEE5">$150</span> or more use coupon code
                           <span class="color-68BEE5">10 off</span></p>
                    </div>

                </div>


                <div class="row  pb-3 display-block">
                <p>            
                <li class="art-work-li">Coupons are valid until 07/31/2022.</li>
                <li class="art-work-li">Cannot be used on current orders in house.</li>
                <li class="art-work-li">Discount is applied before any shipping cost.</li>
                <li class="art-work-li">Discount is applied to base price and setup charges only. (if applicable)</li>
                <li class="art-work-li">May not be combined with any other offer or Price match orders. One offer per order.</li>
                <li class="art-work-li">Must be entered at checkout or mentioned when placing an order over the phone.</li>
                </p>
                </div>

            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><button class="btn-go-shopping">Go Shopping</button></div>  
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