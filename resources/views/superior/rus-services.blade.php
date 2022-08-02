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

.bold-p-txt{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 22px;
color: #212121;
}

.normal-txt-p{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 22px;
letter-spacing: -0.017em;
color: #212121;
}

.b-bottom{
    border-bottom: 1px solid #CCCCCC;
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

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

              <div class="container pb-5">
                <div class="row p-3">
                <span class="cart-txt">Rus Service</span>
                </div>

                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2">  
                        <img src="/resources/views/superior/assets/images/rus-image.png"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt">
                         We know that deadlines are part of business and a special event or a promotion can be just around the corner. That's why we specialize in rush service and will deliver your product on time every time.
                     </p>
                     <p class="normal-txt-p">
                         Most of our items are available on some type of a rush service. When you find the product of interest, production time is indicated right under the product name and is also available on product detail page. If rush service information is not provided please do not hesitate to contact the customer service department at<a href="tel:" class="color-b">888-577-6667</a>for further availability.
                     </p>
                    </div>
                </div>

                <div class="row p-3">
       
                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2">  
                        <img src="/resources/views/superior/assets/images/rus-image.png"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt">
                         Every product has its own production time. Production time reflects on working days only. When a rush option is chosen we are able to reduce the amount of working days it takes to produce your product.
                     </p>
                     <p class="normal-txt-p">
                         Most items have a 5, 3 or 2 day rush option. Please note non standard Rush Service will require addition cost per item or an addition Setup Charge.
                     </p>
                    </div>
                </div>

            </div>


                <div class="row p-3">


                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2">  
                        <img src="/resources/views/superior/assets/images/rus-image.png"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt">
                         Every product has its own production time. Production time reflects on working days only. When a rush option is chosen we are able to reduce the amount of working days it takes to produce your product.
                     </p>
                     <p class="normal-txt-p">
                         All orders ship out via UPS ground service, unless expedited method is requested. If a close in-hand date must be met and a rush service is chosen, then expediting shipping might be an only option for an on time delivery. Customer service will provide all shipping options for you before the order ships.
                     </p>

                      <p class="normal-txt-p">
                          We encourage our customers to get more information on rush service availability prior to placing and order. This will expedite the order process and ensure that we can deliver the order on time for the event. - See more at:<a href="#" class="color-b">http://www.superiorpromos.com/customer_service/rush_service</a>
                      </p>
                    </div>
                </div>

            </div>


            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><a href="/shop"><button class="btn-go-shopping">Go Shopping</button></a></div>
            </div>



</div>

@endsection