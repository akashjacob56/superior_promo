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
    border-bottom: solid 5px #68BEE5;
    border-radius: 5px;
    max-width: 280px;
    margin-right: 20px;
}
}

@media only screen and (max-width: 1679px) and (min-width: 1480px){
.col-b {
    border-bottom: solid 5px #68BEE5;
    border-radius: 5px;
    max-width: 330px;
    margin-right: 20px;
}
}

@media only screen and (max-width: 1919px) and (min-width: 1680px){
.col-b {
    border-bottom: solid 5px #68BEE5;
    border-radius: 5px;
   max-width: 380px;
    margin-right: 20px;
}
}

@media only screen and (max-width: 2400px) and (min-width: 1920px){
.col-b {
    border-bottom: solid 5px #68BEE5;
    border-radius: 5px;
    max-width: 430px;
    margin-right: 20px;
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

</style>



       
<div class="container pb-5">

    <div class="row pt-4 pb-4">
    <span class="cart-txt">About Us</span>
    </div>

    <div class="row pb-3"> 
     <span class="plain-txt">Promotional items</span>
    </div>

    <div class="row">
        <span class="txt-title">WELCOME TO SUPERIOR PROMOS</span>
    </div>
    
    <div class="row p-5"><span class="m-title">Our mission here at Superior Promos is based on 4 guarantees:</span></div>


    <div class="row">
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


        <div class="col-md-3 col-b">
             <div class="row pt-5 pb-5">
                 <div class="col-md-12 text-center">
                     <img class="mx-auto d-block" src="{{$base_url}}/resources/views/superior/assets/images/about3.png"/>
                 </div>
             </div>
             <div class="row text-center pt-5 pb-5">
                 <div class="col-md-12">
                     <span>Superior Prices</span>
                 </div>
             </div>
        </div>


        <div class="col-md-3 col-b">
             <div class="row pt-5 pb-5">
                 <div class="col-md-12 text-center">
                     <img class="mx-auto d-block" src="{{$base_url}}/resources/views/superior/assets/images/about2.png"/>
                 </div>
             </div>
             <div class="row text-center pt-5 pb-5">
                 <div class="col-md-12">
                     <span>Superior Prices</span>
                 </div>
             </div>
        </div>


        <div class="col-md-3 col-b">
             <div class="row pt-5 pb-5">
                 <div class="col-md-12 text-center">
                     <img class="mx-auto d-block" src="{{$base_url}}/resources/views/superior/assets/images/about4.png"/>
                 </div>
             </div>
             <div class="row text-center pt-5 pb-5">
                 <div class="col-md-12">
                     <span>Superior Prices</span>
                 </div>
             </div>
        </div>

    </div>


    <div class="row pt-5 pb-5">
        <p class="para-text pb-3">Our new and exciting website was designed from the ground up to accommodate our clients. We know that shopping online can sometimes be a frustrating matter. That's why at Superior Promos we had one goal in mind and that is to bring you the best, worry free shopping experience on the web.</p>

        <p class="txt-title pb-3">WE SPECIALIZE IN PROMOTIONAL GIFTS OF ALL KINDS.</p>

        <p class="para-text">Here, you will find everything you need to make your campaign successful. Our endless list of promotional items include custom calendars, corporate gifts, health care products, stress relievers, bags, writing instruments and so much more. From trade shows to company picnics, we have you covered regardless. Our website is filled with gift ideas for any occasion. Weddings, birthdays or even that special thank you that you were planning for a group, we can help make your next event a tremendous success.</p>


        <p class="para-text pb-3">Superior Promos brings you innovative features. We took out all the guess work so you can purchase your product with tremendous ease. Our My Budget feature will help you monitor your spending and plan your next promotion. Our professional art department will strive to provide you with the best art work possible. We will not stop until you are satisfied with your imprint and are ready to proceed with production of your item.</p>

        <p class="para-text pb-3">We will not be beat, if you find an advertised price online; we will match it and in most cases beat it. We are confident that you will enjoy working with us. Our experience and determination will make your next promotion a wonderful success.</p>

        <p class="para-text pb-3">Thank you for choosing the most exciting and innovative promotional company.</p>

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