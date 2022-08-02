@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('content')
<style type="text/css">
    .terms-conditions{
     padding-top: 20px;
 }
 .about-image{
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.feature-box{
    text-align: center;
}
h2.subtitle{
    text-align: center;
    padding: 20px;
}

.page-header {
    padding-top:4rem;
    padding-bottom:4rem;
}

.faq-title{
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

.question-txt{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.answer-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 22px;
letter-spacing: -0.017em;
color: #212121;
}
.padding-bottom20{
    padding-bottom:50px;
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

</style>
<meta name="title" property="og:title" content=""/>

<meta name="keywords" content=""/>

<meta name="description" content=""/>


</head>
<body>

<div class="container">
    <div class="row pt-5 pb-5">
        <span class="faq-title">Shipping & Delivery</span>
    </div>
     
     <div class="row pb-3 padding-bottom20">
         <p class="answer-txt">Superior Promos utilizes over 46 production facilities located throughout the United States in order to bring you the best selection of promotional products. Most orders are shipped via FedEx or UPS. In some instances USPS can be used as a shipping carrier, please contact customer service for availability. 
      </p>

        <p class="answer-txt">
            As part of our guarantee there is absolutely no markup on shipping. We strive to deliver the best products and the lowest rates with true shipping costs. You pay the exact UPS or FedEx rates. You also have an option of using your own shipping account for your orders. Please note all order are subject to a minimal $5 handling fee for the entire shipment. Heavier items like ceramic mugs might have extra minimal packaging fees per box. There are no surprises when it comes to shipping.

         </p>

         <p class="answer-txt">All order ship out via ground service, unless expedited method was requested or needed to meet an in-hand date. All quoted shipping costs are estimated and might vary due to occasional over & under runs on each order. To receive and estimated shipping cost for an order please contact customer service at 888-577-6667, email info@superiorpromos.com or use our Live Chat feature.
        </p>
         <p class="answer-txt">Please be aware if a close in-hand date must be met then expedited shipping may be used, in which case we will present all cost and options for you before the products ship out. Cost of shipping, any potential over/ under run charges and all tracking information is provided once the order is shipped. Full order details are always available in your superiorpromos.com online account.</p>

     </div>





            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><a href="/shop"><button class="btn-go-shopping" type="button">Go Shopping</button></a></div>
            </div>

</div>


</main>

<script type="text/javascript">
						//Search top
        $(document).ready(function(){
            $('.header_search_button').on('click',function(){
                var search = $('.header_search_input').val();
                window.location.href = "/shop?page=&search="+search+"&cat_id=&category_id=&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=";
            });
        });
					</script>
@endsection