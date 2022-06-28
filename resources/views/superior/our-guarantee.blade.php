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

.bold-p-txt-art{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 18px;
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

.img-border{
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    padding:20px;
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

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

       
              <div class="container pb-5">
        
                <div class="row p-3">
                <span class="cart-txt">Our Guarantee</span>
                </div>
                @if($OurGuarantee!="")
                @foreach($OurGuarantee as $Guarantee)
                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2 img-border">  
                        <img src="{{$base_url}}/storage/app/{{$Guarantee->image}}" alt="OurGuarantee" />
                    </div>
                    <div class="col-md-10">
                    @if($Guarantee->title!="")
                     <p class="bold-p-txt-art">
                         {{$Guarantee->title}}
                     </p>
                     @endif
                     @if($Guarantee->descriprtion!="")
                     <p class="normal-txt-p">
                         {{$Guarantee->descriprtion}}
                     </p>
                     @endif
                    </div>
                </div>
                @endforeach
                @endif



            <div class="row pt-5 pb-5 d-flex align-items-center">

            
            <div class="col-md-12 text-center">
                <a href="{{$base_url}}/shop">
                <button class="btn-go-shopping">Go Shopping</button>
                </a>
            </div>  
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