@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')

<script type="text/javascript" src="{{asset('resources/views/superior/assets\js\notify.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="{{asset('resources/views/superior/assets/js/notify.min.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('resources/views/superior/assets/js/notify.js')}}"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">


<!-- for summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- for summernote -->


<script type="text/javascript" src="{{$base_url}}/resources/views/superior/assets/js/notify.min.js"></script>

<!-- Smooth Search City name start -->
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<!-- Smooth Search City name start -->

<style type="text/css">
div.empty_artproofs_height{
height: 172px !important;
}
</style>

<style type="text/css">


input.check-radio {
box-sizing: border-box;
padding: 0;
background-color: white;
border-radius: 50%;
vertical-align: middle;
border: 1px solid #777777;
-webkit-appearance: none;
outline: none;
cursor: pointer;
width: 18px!important;
height: 18px!important;
min-width: 18px!important;
min-height: 18px!important;
}


input.check-radio:checked {
background-color: #68BEE5;
border: solid 1px #68BEE5;
}

input.check-radio:checked {
background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
}
</style>



<style type="text/css">
button.order-history-art-proof-close-btn{
width: 95px;
height: 35px;
font-family: 'Roboto';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
border-radius: 5px;
border:1px solid #68bee5;
background-color: #68bee5;
color: #FFFFFF;
}
button.order-history-art-proof-detail-approved{
font-family: 'Roboto';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;

align-items: center;
text-align: center;
letter-spacing: -0.017em;
border:1px solid #68bee5;
border-radius: 5px;
padding:5px 10px 5px 10px;
color: #FFFFFF;
background-color: #68bee5;
margin-right: 5px;

}

button.order-history-art-proof-detail-decline{
font-family: 'Roboto';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;

align-items: center;	
text-align: center;
letter-spacing: -0.017em;
border:1px solid #575757;
border-radius: 5px;
color: #575757;padding: 5px 10px 5px 10px;
}
</style>






<style type="text/css">

textarea::-webkit-input-placeholder{
color: #575757;
}

textarea:-moz-placeholder{ /* Firefox 18- */
color: #575757;  
}

textarea::-moz-placeholder {  /* Firefox 19+ */
color: #575757;  
}

textarea:-ms-input-placeholder{
color: #575757;
}

textarea::placeholder {
color: #575757;
}
.txt-lbl {
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

.bg-color-68BEE5{
background-color: #68BEE5 !important;
}

.color-fff{
color: #fff !important;
}

.btn-save-changes{
background: #68BEE5;
border: 1px solid #68BEE5;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
width: 148px;
height: 40px;
}

.btn-cancel{



background: #FFFFFF;
border: 1px solid #575757;
box-sizing: border-box;
border-radius: 5px;

font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;

width: 120px;
height: 40px;
color: #575757;
}
.hidden{
display:none!important;
}
.contact-information{
border: 1px solid #e7e4e4;
border-radius: 2px;
padding: 15px;
}

.edit-email-address{
border: 1px solid #e7e4e4;
border-radius: 2px;
padding: 15px;
}	

.change-password{
border: 1px solid #e7e4e4;
border-radius: 2px;
padding: 15px;
}




.edit-button{
width: 143px;
padding: 10px 5px 10px 5px;
cursor: pointer;
background-color: white;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;
color: #68BEE5;

font-weight: 500;
font-size: 16px;
line-height: 19px;

}

.edit-button:hover{
background-color: #68bee5;
border: 1px solid #68bee5;

border-radius: 5px;
color: white;
cursor: pointer;
}


/*.edit_password{
padding: 10px 10px 10px 10px !important;
}*/


@media (min-width: 992px){
form, .form-footer {
margin-bottom: 0rem;
}	
}




</style>

<style type="text/css">
.art_proof_content_all{
margin-left: 50px !important;
margin-right: 20px !important;
border-radius: 5px !important;
}
</style>



<style type="text/css">
button.btn-ord{
/*width:190px;
border: 1px solid #8dceec;
border-radius: 5px;
margin: 5px 0 5px 0;
color: #8dceec;
background-color: #fff;
padding: 5px 0 5px 0;*/

background: #FFFFFF;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;


font-weight: 500;
font-size: 16px;
line-height: 19px;
/*display: flex;*/
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #68BEE5;
width: 193px;
height: 35px;
margin: 3px 0 3px 0;
cursor: pointer;
}

button.btn-track-shipment{
background: #4B7184;
border: 1px solid #4B7184;
box-sizing: border-box;
border-radius: 5px;


font-weight: 500;
font-size: 16px;
line-height: 19px;

align-items: center;
text-align: center;
letter-spacing: -0.017em;
padding: 5px 0 5px 0;
color: white;
width: 193px;
height: 35px;
margin: 3px 0 3px 0;
cursor: pointer;
}

.review-close-btn{

background: #68BEE5;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;

font-weight: 500;
font-size: 16px;
line-height: 19px;
/*display: flex;*/
align-items: center;
text-align: center;
letter-spacing: -0.017em;

color: #FFFFFF;
width: 193px;
height: 35px;
margin: 3px 0 3px 0;
cursor: pointer;
cursor: pointer;


}




button.btn-view-order-detail{
background: #68BEE5;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;

font-weight: 500;
font-size: 16px;
line-height: 19px;
/*display: flex;*/
align-items: center;
text-align: center;
letter-spacing: -0.017em;

color: #FFFFFF;
width: 193px;
height: 35px;
margin: 3px 0 3px 0;
cursor: pointer;
cursor: pointer;
}
</style>

<style type="text/css">
.order-para{
margin-top: 15px;
}

.order_search_icon{
color:gray;
background-color: #fff;
border-left: 1px solid #cccccc;
border-top:1px solid #cccccc;
border-right:0px solid #cccccc;
border-bottom: 1px solid #cccccc;
border-radius: 5px 0px 0px 5px;
padding: 11px 10px 12px 10px;
}
.order_search_input {
height: 40px;
width: 319px;
border-left: 0;
border-top: 1px solid #cccccc;
border-right: 1px solid #cccccc;
border-bottom: 1px solid #cccccc;
}


.order_search_button{
color:white;
background-color: #68bee5;
border:1px solid #68bee5;
border-radius: 0px 5px 5px 0px;
padding: 10px 10px 10px 10px;
}
</style>

<style type="text/css">
select.order-placed-select-box{
border:none;
color: #68bee5;
background-color:#f0f2f2;
}

div.order-placed-content{
border:1px solid #cccccc;
padding: 0px 15px 5px 15px;
border-radius: 5px;
margin-bottom: 10px;
/*background-color: #f0f2f2;*/
}

div.order-placed-content-header{
background-color: #f0f2f2;
padding-top: 15px;
border-bottom: 1px solid  #cccccc;
}


/*rating css*/
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>

<style type="text/css">
button.reorder-btn{
/*width:109px;
border: 1px solid #8dceec;
border-radius: 5px;
margin: 5px 0 5px 0;
color: #fff;
background-color: #8dceec;
padding: 5px 0 5px 0;*/
width:108px;

height:40px;
background: #68BEE5;
border-radius: 5px;
border: 1px solid #68BEE5;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
cursor: pointer;
}


</style>

<style type="text/css">
.view-order-detail-btn-close{
width: 95px;
height: 35px;
text-align: center;
background: #68BEE5;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;
cursor: pointer;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;

}
</style>

<style type="text/css">
img.product-img{
height: 100px;
width: 100px;
}
.wishlist-img{
position: absolute;
width: 163px !important;
height: 163px !important;
}

/*.wishlist-img-div{
border: 1;
}*/

.view-details-page{
/*margin-top: 5px;
background-color: white;
border: 1px solid #68bee5;
padding: 5px 15px 5px 15px;
border-radius: 5px;
color: #68bee5;*/
background: #FFFFFF;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #68BEE5;
width: 121px;
height: 40px;
cursor: pointer;
}

.view-details-page:hover{
background-color: #68bee5;
color: white;

}
.color-67a03c{
color: #67a03c;
}

.as_low_as_span{

font-weight: 500 !important;
font-size: 16px !important;
line-height: 16px !important;
letter-spacing: -0.017em !important;
}

.border-bottom-wishlist{
border-bottom: 1px solid #68BEE5;
/*box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);*/
}

.wishlist-img-div{
/*height: 125px;*/
}


</style>


<style type="text/css">
ul.nav li a{

font-weight: 500;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em
}

.nav.nav-tabs .nav-item .nav-link{
border-bottom: 1px solid transparent;
}

.nav.nav-tabs .nav-item .nav-link.active{
border-bottom:1.5px solid #68BEE5;
border-bottom-color: #68BEE5 !important;
}

</style>
<style type="text/css">
.add_new_payment_btn{
/*margin-left: 290px;
position: absolute;
background-color: #68bee5;
border: 1px solid #68bee5;
padding: 5px 15px 5px 15px;
border-radius: 5px;
color: white;*/
width: 167px;
height: 40px;
background: #68BEE5;
border: 1px solid #68BEE5;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
cursor: pointer;
}

.payment-information-div{
/*width: 497px;*/
height: 187px;
/*left: 366px;
top: 370px;*/

background: #FFFFFF;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 10px;



}

.payment-information-col{
padding: 5px 10px 5px 10px;
}

.payment-info-detail{
padding:10px 1px 10px 30px;
}


.padding-10{

}

.default-div{
padding:10px 10px 10px 10px;
}
.default-para{
color:#68BEE5;font-weight: bold;
}
.text_color_a{
color: #68BEE5;
}

.nav.nav-tabs .nav-item .nav-link.active{
color: #68BEE5 !important;
}
.nav.nav-tabs .nav-item .nav-link:hover{
color: #68BEE5 !important;
}
</style>

<style type="text/css">
.pending-art-proofs-menu-content{
border: 1px solid #CCCCCC;
border-radius: 5px;
padding: 10px;
}

.border-pending-art-proofs{
margin: 0px 0px 10px 0px;
border-bottom: 1px solid #CCCCCC;
}
body{
color: #212121 !important;
font-family: Roboto !important;
font-style: normal !important;
}
.a_proof_color{
color: #68BEE5;
}
</style>


<style type="text/css">
.approved_button{
/*border:1px solid #68BEE5;background: #68BEE5;border-radius: 5px;color: white;padding: 5px 10px 5px 10px;cursor: pointer;*/
background: #68BEE5;
border:1px solid #68BEE5;
border-radius: 5px;
width: 114px;
height: 40px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
}
.decline_button{
/*background: #FFFFFF;border: 1px solid #575757;box-sizing: border-box;border-radius: 5px;padding: 5px 10px 5px 10px;cursor: pointer;*/
width: 97px;
height: 40px;
background: #FFFFFF;
border: 1px solid #575757;
box-sizing: border-box;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;

color: #575757;

}

input.type-quantity{
width: 97px;
height: 40px;
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
}

.reorder-request-tr td, .reorder-request-tr th{
padding: 10px;
}

.reorder-request-tr .sale{
color: #67A03C;
}
.btn-reorder-request{
/*color: #68BEE5;
background: #FFFFFF;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;
padding-left: 15px;
padding-right: 15px;
margin-right: 10px;
padding-top:5px;
padding-bottom:5px;*/

background: #FFFFFF;
border: 1px solid #68BEE5;
box-sizing: border-box;
border-radius: 5px;

font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #68BEE5;
padding: 5px 15px 5px 15px;
margin-right: 5px;
cursor: pointer;

}

ul.reorder-request-ul .reorder-request-li{
list-style: circle;
margin: 10px;
}
.reorder-request-checkobx{
height: 20px;
width: 20px;
}

input[type=checkbox]:checked{
color: #68BEE5;
}

textarea.reorder-request-textarea{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
font-weight: normal;
font-size: 14px;
line-height: 16px;
align-items: center;
letter-spacing: -0.017em;
padding-top:10px; 
padding-left:10px; 
width: 412px;
height: 150px;
}


.btn_add_new_billing_address{
/*border:1px solid #68BEE5;background: #68BEE5;border-radius: 5px;color: white;padding: 5px 10px 5px 10px;*/
width: 140px;
height:40px;
background: #68BEE5;
border: 1px solid #68BEE5;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
cursor: pointer;
}
.btn_add_new_shipping_address{
/*border:1px solid #68BEE5;background: #68BEE5;border-radius: 5px;color: white;padding: 5px 10px 5px 10px;*/
background: #68BEE5;
border-radius: 5px;
border: 1px solid #68BEE5;
font-weight: 500;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
cursor: pointer;
color: #FFFFFF;
width: 148px;
height: 40px;
}

</style>

<style type="text/css">
.profile-text{

font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.pass-star{

font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #575757;
}

.content-text{

font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #575757;
}


</style>

<style type="text/css">
.para-edit-email{

font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}





.verify-email-button {
cursor: pointer;
background: #68BEE5;
border:1px solid #68BEE5;
border-radius: 5px;
font-weight: 500;
font-size: 15px;
line-height: 18px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
padding: 10px 18px 10px 18px;
color: #FFFFFF;
}


.verify-email-cancel-button {
border: 1px solid #3D3D3E;
box-sizing: border-box;
border-radius: 5px;
font-weight: 500;
font-size: 15px;
line-height: 18px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #3D3D3E;
background-color: white;
padding: 10px 18px 10px 18px;
cursor: pointer;
}
</style>



<style type="text/css">
.contact-info-header{
font-weight: bold;
font-size: 18px;
line-height: 21px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;

}
.contact-info-label{
font-weight: normal;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}

.input-contact-info{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
}

.contact-info-submit-btn{
border:1px solid #68BEE5;
background: #68BEE5;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
/* identical to box height */

display: flex;
align-items: center;
text-align: center;
letter-spacing: -0.017em;

padding: 10px 20px 10px 20px;

color: #FFFFFF;

}
</style>

<style type="text/css">
.change-password-verify-email{
background: #68BEE5;
border:1px solid #68BEE5;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
/* identical to box height */


align-items: center;
text-align: center;
letter-spacing: -0.017em;

color: #FFFFFF;
padding: 10px 10px 10px 10px;
cursor: pointer;
}

.change-password-verify-cancel{
background: #FFFFFF;
border: 1px solid #E7E4E4;
box-sizing: border-box;
border-radius: 5px;
font-weight: 500;
font-size: 16px;
line-height: 19px;
/* identical to box height */

align-items: center;
text-align: center;
letter-spacing: -0.017em;

padding: 10px 20px 10px 20px;

color: #3D3D3E;
}
</style>

<style type="text/css">
.main-header-my-account{
font-weight: 500;
font-size: 30px;
line-height: 35px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}

.font-nav-tab{
font-weight: 500;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}
</style>

<style type="text/css">
.input-datepicker{
height: 25px;
width: 165px;
border-top: none;
border-left: none;
border-right: none;
font-weight: normal;
font-size: 12px;
line-height: 14px;
align-items: center;
letter-spacing: -0.017em;
color: #575757;
}

.view-orders{
background: #68BEE5;
border-radius: 5px;
border:1px solid #68BEE5;
font-weight: 500;
font-size: 16px;
line-height: 19px;
/* identical to box height */

display: flex;
align-items: center;
text-align: center;
letter-spacing: -0.017em;

padding: 10px 20px 10px 20px;
color: #FFFFFF;
}

.order_paragraph{
font-weight: 500;
font-size: 16px;
line-height: 19px;
/*display: flex;*/
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}
.order-paragraph{
/*font-weight: 500;*/
font-size: 16px;
line-height: 19px;
/*display: flex;*/
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}

.select_order_list{
/*width: 140px;
height: 40px;
border: 1px solid #cccccc;
border-radius: 5px;*/

width: 178px;
height: 40px;
left: 533px;
top: 296px;
font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;

background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
}


</style>

<style type="text/css">
.order-place-paragraph-title{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #212121;
}


.order-place-paragraph-value{
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #212121;

}
</style>

<style type="text/css">
.item_content_para{
font-weight: normal;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;

color: #212121;
}

.normal-text-content{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

</style>

<style type="text/css">
.heading-size-height-weight-18-21-bold{
font-weight: bold;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.text-size-height-weight-18-21-500{
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.text-size-height-weight-18-21-normal{
font-weight: normal;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.text-size-height-weight-18-21-500{
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.sub-reference{
font-weight: bold;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #4B7184;
}

.imprint-option p .span-normal{
font-weight: normal;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.imprint-option p .span-500{
font-weight: 500;
font-size: 18px;
line-height: 21px;

letter-spacing: -0.017em;
color: #212121;
}

</style>

<style type="text/css">
.ship-to .recipient-info p .span-normal{
font-weight: normal;
font-size: 18px;
line-height: 21px;
color: #212121;
letter-spacing: -0.017em;
}

.ship-to .recipient-info p .span-500{
font-weight: 500;
font-size: 18px;
line-height: 21px;
color: #212121;
letter-spacing: -0.017em;
}


.pricing-summary .company-info p .span-normal{
font-weight: normal;
font-size: 18px;
line-height: 21px;
color: #212121;
letter-spacing: -0.017em;
}

.pricing-summary .company-info p .span-500{
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

</style>

<style type="text/css">
#reoder-request .account-sub-title{
font-weight: 500;
font-size: 30px;
line-height: 35px;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}
#reoder-request div.item-list{
border: 1px solid #CCCCCC;margin: 0px;
padding: 10px 0px;
}

#reoder-request div.item-list div p{
font-weight: normal;
font-size: 18px;
line-height: 21px;
color: #212121;
letter-spacing: -0.017em;
}

.text-font-weight-normal{
font-weight: normal !important;
}
.text-font-weight-500{
font-weight: 500 !important;
}
.text-font-weight-bold{
font-weight: bold !important;
}
</style>

<style type="text/css">
.questions-main .question-content-row p{

font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;

}
.questions-main .question-content-row input[type="checkbox"]{

}

.questions-main .question-content-row{
margin-bottom: 16px;
}

</style>

<style type="text/css">
.please-note .please-note-heading{
font-weight: bold;
font-size: 20px;
line-height: 23px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
}

.please-note ul li.reorder-request-li{
font-weight: normal;
font-size: 18px;
line-height: 22px;
color: #212121;
}
</style>


<style type="text/css">
.payment-info-detail .row{
font-size: 16px;
line-height: 19px;
align-items: center;
letter-spacing: -0.017em;
}

.default-payment-content{
font-size: 16px;
line-height: 19px;
align-items: center;
letter-spacing: -0.017em;
}
</style>

<style type="text/css">
#pending_art_proofs .pending-art-proofs-menu-content .note{
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
}


#pending_art_proofs .pending-art-proofs-menu-content .note textarea{
font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;	
}
</style>


<style type="text/css">
#pending_art_proofs .pending-art-proofs-menu-content .order-proof-heading{
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

#pending_art_proofs .pending-art-proofs-menu-content .order-proof-sub-heading{
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
}

#pending_art_proofs .pending-art-proofs-menu-content .art-proof-proof-item-detail{
font-weight: normal;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #575757;
}


</style>

<style type="text/css">
.type_quantity_input{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
width: 88px;
height: 40px;
}

.color-212121{
color: #212121;
} 

.type-quantity-main-div{
margin-top: 50px;

}
</style>	


<style type="text/css">
.order-delivered-by-date .order-delivered-by-date-input{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
width: 205px;
height: 40px;
left: 914px;
top: 529px;

font-weight: 500;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
padding-top: 2px;
padding-left: 8px;
}
</style>


<style type="text/css">
.checkbox[type="checkbox"]{
/*width:25px;
height: 25px;*/
}
.exactly-same-no{
padding-left:15px;
padding-top: 15px;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #212121;


background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
}
.pr-tb-exactly-same-no{

font-weight: 500;
font-size: 20px;
line-height: 23px;
display: flex;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}
</style>



<style type="text/css">
.add_new_shipping_address_same_as_before h4{
font-weight: 500;
font-size: 20px;
line-height: 23px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
margin-left: -5px;
color: #68BEE5;
}

.add_new_shipping_address_same_as_before form.address_shipp_same_as_before label{
font-weight: 500;
font-size: 14px;
line-height: 25px;

align-items: center;
letter-spacing: -0.017em;

color: #212121;
padding-left: 3px;

}

.add_new_shipping_address_same_as_before form.address_shipp_same_as_before input{
font-weight: normal;
font-size: 14px;
line-height: 16px;

align-items: center;
letter-spacing: -0.017em;

color: #575757;

}
</style>


<style type="text/css">
#wishlist_data{
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.fill {
font-size: 13px;
color: #68bee5 !important;
}

.unfill {
font-size: 13px;
color: #000000;
}
</style>




<style type="text/css">
.same-payment-reorder-div{


font-size: 14px;
line-height: 16px;
font-weight: normal;
align-items: center;
letter-spacing: -0.017em;

color: #212121;
}

.select_bank_account{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;

width: 308px;
height: 35px;


font-weight: normal;
font-size: 12px;
line-height: 14px;

align-items: center;
letter-spacing: -0.017em;

color: #575757;
}

.acc-add .add-new-account{
background: #68BEE5;
border-radius: 5px;
border: 1px solid #68BEE5;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;

color: #FFFFFF;
width: 161px;
height: 40px;
margin-top: 15px;
cursor: pointer;
}

.acc-add .add-new-acount-after{
background: #FFFFFF;
border-radius: 5px;
border: 1px solid #68BEE5;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;

color:#68BEE5;
width: 161px;
height: 40px;
margin-top: 15px;
cursor: pointer;
}








.same_payment_reorder_paument_input{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
width: 345px;
height: 40px;


font-weight: normal;
font-size: 14px;
line-height: 16px;
align-items: center;
letter-spacing: -0.017em;
color: #575757;

}

.col-6-input-box{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;

font-weight: normal;
font-size: 14px;
line-height: 16px;

align-items: center;
letter-spacing: -0.017em;
width: 155px;
height: 40px;
color: #575757;
}

button.btn-save-cart{
background: #68BEE5;
border-radius: 5px;
border: 1px solid #68BEE5;

font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
width: 77px;
height: 40px;
color: #FFFFFF;
}


.atrt-textarea {
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
    border-radius: 5px;
}

</style>

<style type="text/css">
.new-acc-fill-info label{

font-weight: 500;
font-size: 14px;
line-height: 16px;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}
</style>


<style type="text/css">
h4.heading-bill-address{
font-weight: 500 !important;
font-size: 18px !important;
line-height: 21px !important;
letter-spacing: -0.017em !important;

color: #212121 !important;
}

.select-billling-address{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.select-billling-address form.form-content label{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

/*label {
color: #212121;
font-size: 16px;
font-weight: normal;
line-height: 19px;
letter-spacing: -0.017em;
}*/
</style>

<style type="text/css">
.billing-address{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.billing-address form#addnewbillingaddressform label{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.billing-address form#addnewbillingaddressform input{
font-weight: normal;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #212121;
}





</style>





<style type="text/css">
div.billing_address_row{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #212121;
}
</style>



<style type="text/css">
#shipp-address-append h4{
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;

color: #212121;

}


.add-new-shipping-address{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.add-new-shipping-address form#addnewaddressform label{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

.add-new-shipping-address form#addnewaddressform input{
font-weight: normal;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #212121;
}

</style>


<style type="text/css">
#edit-address-main{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;

}


#edit-address-main form label{
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}

#edit-address-main form input{
font-size: 14px;
line-height: 16px;
font-weight: normal;

letter-spacing: -0.017em;
color: #212121;
}

</style>

<style type="text/css">
#make_default_div_add{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #212121;
}
</style>

<style type="text/css">
.shipping-address-show{
font-weight: normal;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}
.dot {
height: 25px;
width: 25px;
/*background-color: rgba(255,25,40,150);*/
border: 1px solid #eeeeee;
border-radius: 50%;
display: inline-block;
}
</style>

<style type="text/css">
.no_order_found{
margin-top: 171px !important;
margin-left: 337px !important;
}
</style>

<!-- row end -->
<style type="text/css">
div.view-art-proofs-row p{
font-family: 'Roboto';
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #575757;
}
div.view-art-proofs-row span{
font-family: 'Roboto';
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;

color: #575757;
}

.preview_pdf_class{
width: 25px;height: 25px;color: #68BEE5;
}




</style>

<style type="text/css">
div.modal_terms_condition p{
/*font-weight: 500;*/
font-family: Roboto !important;
font-style: normal !important;
font-size: 16px;
line-height: 19px !important;
letter-spacing: -0.017em;
color: #212121;
cursor: pointer;
}
}
</style>




<main class="main">

<!-- Terms And Condition Model Start -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="ArtProofTermsAndConditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel">Artwork terms</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body modal_terms_condition">

<p class="text-center text-danger">
You must read the agreement below.
</p>
<p>
Please NOTE: upon approval of your art proof you are agreeing to the art work that was provided for you. Actual colors and imprint sizes might slightly vary do to resolutions and color management of monitors.
</p>
<p>
We do not guarantee the colors that you see but it will be matched to the best of our ability to the specifications that you have provided. If you require a PMS match or have any other concerns please contact Customer Service prior to approving your art work by calling 888-577-6667.
</p>
<p>
The following approval becomes a binding agreement. Superior Promos will proceed with production of the exact art that was approved. Changes can only be made until the order goes to production. Once the order reaches production stage, changes cannot be made.
</p>
<p class="text-success">
<input type="checkbox" id="artwork_terms_satisfied_design" name="" checked="">
I have reviewed my artwork and I am satisfied with the design (including art and text).
</p>
<p class="text-success">
<input type="checkbox" id="artwork_terms_read_agreement" name="" checked="">
I have read the above agreement and would like Superior Promos to proceed with my order.
</p>

</div>


<div class="modal-footer">

<h5 class="text-info" data-dismiss="modal" style="cursor: pointer;">Ok</h5>

</div>
</div>
</div>
</div>
<!-- Terms And Condition Model End -->

<br>

<div class="container">
<div class="row">
<div class="col-md-12 col-lg-12 col-sm-12 col">
<h2 class="main-header-my-account">My Account</h2>
</div>
</div>
</div>
<!-- <style type="text/css">
.nav.nav-tabs .nav-item.active:before {
border-bottom: 1.5px solid #68BEE5;
border-bottom-color: #68BEE5 !important;
}
</style>
<li class="nav-item d-inline-block active">

<a class="nav-link font-nav-tab active d-inline-block text-left" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile </a>

<a class="nav-link d-inline-block text-right">
<button type="button" class="d-inline-flex">logout</button>
</a>


</li> -->






<div class="container account-container custom-account-container">
<div class="row">
<div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">

<ul class="nav nav-tabs flex-column mb-0" role="tablist">
<!-- <ul class="nav nav-tabs list flex-column mb-0" role="tablist"> -->
<li class="nav-item">
<a class="nav-link font-nav-tab active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
</li>

<li class="nav-item">
<a class="nav-link font-nav-tab" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">Order History</a>
</li>

<li class="nav-item">
<a class="nav-link font-nav-tab" id="reorder-tab" data-toggle="tab" href="#reorder-list" role="tab" aria-controls="reorder-list" aria-selected="true">Reorder History</a>
</li>

<li class="nav-item">
<a class="nav-link font-nav-tab" id="wishlist-tab" data-toggle="tab" href="#wishlist_data" role="tab" aria-controls="wishlist_data">Wishlist</a>
</li>

<li class="nav-item">
<a class="nav-link" id="reoder-request-tab" data-toggle="tab" href="#reoder-request" role="tab" aria-controls="reoder-request" aria-selected="false">Reorder Request</a>
</li>

<li class="nav-item">
<a class="nav-link font-nav-tab" id="save-cart-id" data-toggle="tab" href="#save_cart" role="tab" aria-controls="save_cart" aria-selected="false">Save Cart</a>
</li>

<li class="nav-item ">
<a class="nav-link font-nav-tab" id="payment-info" data-toggle="tab" href="#payment_info" role="tab" aria-controls="payment_info" aria-selected="false">Payment Information</a>
</li>

<li class="nav-item ">
<a class="nav-link font-nav-tab" id="pending-art-proofs" data-toggle="tab" href="#pending_art_proofs" role="tab" aria-controls="pending_art_proofs" aria-selected="false">Pending Art Proofs</a>
</li>

<li class="nav-item">
<a class="nav-link font-nav-tab" id="address-tab" data-toggle="tab" href="#address_book" role="tab" aria-controls="address_book" aria-selected="true">Address Book</a>
</li>

<!-- <li class="nav-item">
<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Account
details</a>
</li> -->
<!-- <li class="nav-item">
<a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="edit" aria-selected="false">Shopping Addres</a>
</li> -->

<li class="nav-item">
<!-- <a class="nav-link" href="{{ route('logout') }}">Logout</a> -->
<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" id="logout-button"> <i class="icon-power"></i>Logout</a>
</li>
</ul>
</div>



<div class="col-lg-9 order-lg-last order-1 tab-content">

<div class="tab-pane fade show active" id="profile" role="tabpanel">
<div class="profile-content">
<div class="row">
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
<div class="row border-bottom">

<div class="col-3">
<span class="font-weight-bold profile-text" style="">Name:</span><br>

<span class="content-text">{{$my_account_profile->name}}&nbsp;{{$my_account_profile->last_name}}</span>

</div>
<div class="col-3">
<span class="font-weight-bold profile-text">Phone No:</span>
<br>
<span class="content-text">@if($my_account_profile->contact_number!="" && $my_account_profile->contact_number!="0") {{$my_account_profile->contact_number}} @else - @endif</span>
</div>
<div class="col-3">
<!-- <span class="font-weight-bold profile-text">Fax:</span>
<br>
<span class="content-text">@if($my_account_profile->fax!="") {{$my_account_profile->fax}} @else - @endif</span> -->
</div>
<div class="col-3">
<button class="edit-button edit_contact_information">Edit Contact</button>
</div>
<br>
<br>
<br>
</div>
<br>
<div class="row border-bottom">

<div class="col-9">
<span class="font-weight-bold profile-text">Email</span>
<br>
<span class="content-text">@if($my_account_profile->email != "") {{$my_account_profile->email}} @else - @endif</span>

</div>

<div class="col-3">
<button class="edit-button edit_email_address"><span class="edit-button-span">Update Email</span></button>
</div>
<br>
<br>
<br>
</div>
<br>
<div class="row border-bottom">

<div class="col-9">
<span class="font-weight-bold profile-text">Password</span>
<br>
<p class="pass-star">
***************
</p>

</div>

<div class="col-3">
<button class="edit-button edit_password">Update Password</button>
</div>
<br>
<br>
<br>
</div>


</div>



<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
<div class="contact-information" >
<h3 class="contact-info-header">Contact Information</h3>
<form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<label for="name" class="contact-info-label">Name</label>
<input type="text" class="form-control input-contact-info" id="contact_info_name" aria-describedby="" placeholder="Enter Name" value="{{$my_account_profile->name}}">
</div>

<div class="form-group">
<label for="contact_number" class="contact-info-label">Phone Number</label>
<input type="number" class="form-control input-contact-info" id="contact_info_phone_number" placeholder="Enter Phone" value="{{$my_account_profile->contact_number}}">
</div>

<!-- <div class="form-group">
<label for="fax" class="contact-info-label">Fax</label>
<input type="number" class="form-control input-contact-info" id="contact_info_fax" placeholder="" value="{{$my_account_profile->fax}}">
</div>
-->
<button type="button" class="contact-info-submit-btn">Save Changes</button>
</form>
</div>

<div class="edit-email-address">
<h3 class="contact-info-header">Update Email Address</h3>
<!-- <p class="para-edit-email">Please click "Verify Email" button below to make changes to the email address associated with this account.</p> -->


<style type="text/css">
.email_verify_input{
background: #FFFFFF;
border: 1px solid #CCCCCC;
box-sizing: border-box;
border-radius: 5px;
}
</style>

<input type="email" class="form-control email_verify_input" name="verify_email" value="" placeholder="Enter New Email">

<button class="verify-email-button">Save</button>
&nbsp;
<button class="verify-email-cancel-button">Cancel</button>
</div>

<div class="change-password" >
<h3 class="contact-info-header">Change Password</h3>
<form method="post" action="" enctype="multipart/form-data">
<!-- <div class="form-group">
<label for="name" class="contact-info-label">Current Password</label>
<input type="password" class="form-control input-contact-info" id="" aria-describedby="" placeholder="Enter Current Password" value="">
</div> -->

<div class="form-group">
<label for="contact_number" class="contact-info-label">New Password</label>
<input type="password" class="form-control input-contact-info" id="password" placeholder="Enter New Password" value="">
</div>

<div class="form-group">
<label for="password" class="contact-info-label">Confirm Password</label>
<input type="password" class="form-control input-contact-info" id="confirm_password" placeholder="Confirm New Password" value="">
</div>
<ul class="password-configuration-show">
<li class="eight-to-sixty-four-char">Be between 8 and 64 characters</li>
<li class="an-uppercase-char">An uppercase character</li>
<li class="an-lowercase-char">An Lowercase character</li>
<li class="an-numbers-char">A number</li>
<li class="an-special-char">A special character</li>
</ul>	

<button type="button" class="change-password-verify-email">Update Password</button>
&nbsp;&nbsp;
<button type="button" class="change-password-verify-cancel">Cancel</button>
</form>
</div>

</div>
</div>

</div>
</div><!-- End .tab-pane -->

<style type="text/css">
ul.password-configuration-show li{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
align-items: center;
letter-spacing: -0.017em;
font-feature-settings: 'cpsp' on;

color: #575757;
margin-left: 18px;
list-style-type: disc;

}

.color-59BD8B{
color: #59BD8B !important;
};
</style>






<!-- order start -->
<div class="tab-pane fade" id="order" role="tabpanel">

<!-- Order content start -->
<div class="order-content">



<br><br>


<div class="row">
<div class="col-lg-2">
<p class="order-para"><span class="order_paragraph count_order_list">{{count($order_history)}} Order</span><span class="order-pargraph">&nbsp;Placed in</span></p>
</div>
<div class="col-lg-3">
<select class="select_order_list" name="order_history_value">
<option disabled="" selected>select</option>
<option value="90">past 3 Month</option>
<option value="180">Past 6 Month</option>
<option value="365">past 1 Year</option>
</select>
</div>

<div class="col-lg-7">
<div>
<span class="order_search_icon"><i class="fa fa-search"></i></span><input class="order_search_input order_history_search_input" type="number" name="" placeholder="Search all orders"><button class="order_history_search_button order_search_button">Search Order</button>
</div>
</div>
</div>


<!-- full order content start -->
<div class="full-order-history-content" id="full-order-history-content">





<!-- order placed content start -->
@if($order_history!="[]")
<!-- row start -->


<br><br>
@foreach($order_history as $order)

@if($order->orderitems!="[]")

@php
$review_count=0;
@endphp

@foreach($order->orderitems as $orderitem)

@php
$review_count++;
@endphp

<div class="order-placed-content">
<!-- row start -->
<div class="row order-placed-content-header">
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">Order Placed</p>
<p class="order-place-paragraph-value">



<?php echo date("m-d-Y", strtotime($orderitem->created_at)); ?>




</p>
</div>
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">Total</p>
<p class="order-place-paragraph-value">${{$orderitem->item_price}}</p>
</div>
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">Ship To</p>
<select class="order-placed-select-box order-place-paragraph-value">
<option disabled="">select</option>
<option class="" selected="">Boris Kagan</option>
<option>Kagan</option>
</select>
</div>
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">In Hand Date</p>
<p class="order-place-paragraph-value">

@php

if($orderitem->received_date=="ASAP"){
$received_date = $today_current_date;

}else{
$received_date = $orderitem->received_date;
}

@endphp

{{$received_date}}

</p>
</div>
<div class="col-12 col-md-4 col-lg-4 text-right">
<p class="order-place-paragraph-title">Order #{{$orderitem->order_id}}</p>
</div>
</div>
<!-- row end -->




<!-- order-placed-content-body start -->
<div class="order-placed-content-body">

<!-- order-history-content-main start  -->
<div class="order-history-content-main">

<div class="order-history-content order-history-content-{{$orderitem->id}} row">



<div class="col-sm-12 col-md-9 col-lg-9 col-12 order-history-content-col">
<p class="d-inline-block mt-2 item_content_para">Item - #<span style="font-weight: 500;">


@if($orderitem!="")
@if($orderitem->product!="")
{{$orderitem->product->product_id}}
@endif
@endif

</span></p>

@if($orderitem!="")
@if($orderitem->stage!="")
<p class="d-inline-block ml-5 item_content_para">
Current Status : <span style="font-weight: 500;">{{$orderitem->stage->name}}</span>
</p>
@endif
@endif


<div class="clearfix"></div>
<div class="row">
<div class="col-3">
@if($orderitem!="")
@if($orderitem->product!="")
<img src="{{$base_url}}/storage/app/{{$orderitem->product->product_image}}">
@else
<img src="{{$base_url}}/files/assets/images/product.png">
@endif
@else
<img src="{{$base_url}}/files/assets/images/product.png">
@endif


</div>
<div class="col-6">
<br>
<br>
<br>
<p class="normal-text-content">
@if($orderitem!="")
@if($orderitem->product!="")
@if($orderitem->product_translation!="")
{{$orderitem->product->product_translation->product_name}}
@endif
@endif
@endif

</p>
<div class="d-inline-flex">
<!-- <input class="reorder_checkbox_reorder_request" type="checkbox" name="reorder_request" order_id="{{$order->id}}" style="width: 25px;height: 25px;">&nbsp;&nbsp;<span class="normal-text-content" style="margin-top: 5px;">Reorder</span> -->
<button class="reorder-btn reorder_single_element" order_id="{{$order->id}}">Reorder</button>
</div>

</div>
</div>
</div>





<div class="col-sm-12 col-md-3 col-lg-3 col-12">
<button class="mt-2 btn-track-shipment">Track Shipment</button>
<button class="btn-ord">View Order Confirmation</button>
<button class="btn-view-order-detail" order_item_id="{{$orderitem->id}}">View Order Details</button>
<button class="btn-ord ">View / Print Invoice</button>
<button class="btn-ord btn_order_history_view_art_proofs" order_id="{{$orderitem->order_id}}" order_item_id="{{$orderitem->id}}">View Art Proofs</button>
<button class="btn-ord btn-write-review" order_id="{{$orderitem->order_id}}" order_item_id="{{$orderitem->id}}" >Write Product Reviews</button>
</div>
</div>
<br><br>



<!-- view-order-details-row start -->
<div class="row view-order-details-row view-order-details-row-{{$orderitem->id}}" >
<div class="col-12">
<div class="row">
<div class="col-6"><h3 class="text-left sub-reference">Sub-Reference #{{$orderitem->id}}</h3></div>
<div class="col-6">
<h3 class="text-right sub-reference">Detail - Item #{{$orderitem->product_id}}</h3>
</div>
</div>	


</div>
<div class="clearfix">

</div>
<div class="col-sm-4 col-12 text-left imprint-option">
<h5 class="heading-size-height-weight-18-21-bold">Imprint Option & Artwork</h5>
<div class="recipient-info my-2">


@if($orderitem->cart_item!="")


@if($orderitem->cart_item->cartitemimprint!="[]")

@foreach($orderitem->cart_item->cartitemimprint as $cartitemimprint)

<p><span class="span-normal">Location :</span> <span class="span-500">{{$cartitemimprint->imprint_name}}</span></p>



@if($cartitemimprint->cartitemimprintcolors!="[]")
@foreach($cartitemimprint->cartitemimprintcolors as $cartitemimprintcolor)

<p>
<span class="span-normal">
Color #{{$cartitemimprintcolor->color_id}} :
</span><span class="span-500">{{$cartitemimprintcolor->name}}</span>
</p>

@endforeach
@endif



@endforeach

@endif

@endif

<!-- <p><span class="span-normal">Location :</span><span class="span-500">Back</span></p>
<p><span class="span-normal">Color # 1 : </span><span class="span-500">Red</span></p> -->
<br>


<p class="heading-size-height-weight-18-21-bold">Art Comments:</p>
<p class="heading-size-height-weight-18-21-normal">Please center the logo</p>
<br>
<p><span class="span-normal">In-Hand Date : </span>
<span class="span-500">
@php
if($orderitem->received_date=="ASAP"){
$received_date_in_hand = $today_current_date;

}else{
$received_date_in_hand = $orderitem->received_date;
}


@endphp

{{$received_date_in_hand}}


</span>
</p>
<p><span class="span-normal">Using your own <br>shipper account:</span><span class="span-500">
@if($orderitem->own_account_number!="")
Yes, {{$orderitem->own_account_number}}
@else
No
@endif
</span></p>


</div>

</div>



<div class="col-sm-4 col-12 text-left ship-to">
<h5 class="heading-size-height-weight-18-21-bold">Ship To</h5>
<div class="recipient-info my-2">
<!-- <p><span class="span-normal">Boris Kagan</span></p>
<p><span class="span-normal">Sperior Promos</span></p>
<p><span class="span-normal">72923 Main st Main</span></p>
<p><span class="span-normal">NJ07522</span></p> -->


<p><span class="span-normal">{{$orderitem->shipping_first_name}} {{$orderitem->shipping_last_name}} <br>
{{$orderitem->shipping_address_line_1}}
<br>
@if($orderitem->shipping_city!="") 
{{$orderitem->shipping_city}}, 
@endif

@if($orderitem->shipping_state!="")
{{$orderitem->shipping_state}},
<br> 
@endif

@if($orderitem->shipping_country!="")
{{$orderitem->shipping_country}}, 
@endif

{{$orderitem->shipping_zip}}</span></p>


<br>
<p>
<span class="span-normal">Current Status :</span>
<span class="span-500">
@if($orderitem->stage!="")
{{$orderitem->stage->name}}
@endif
</span>
</p>

<p>
<span class="span-normal">Date Shipped :</span>
<span class="span-500">10/26/2021</span>
</p>
<p>
<span class="span-normal">Shipping Courier :</span>
<span class="span-500">UPS</span>
</p>
<p>
@php
if($orderitem->tracking_informations!="[]"){
$tracking_info = $orderitem->tracking_informations->first();
}else{
$tracking_info = "";
}

@endphp
<span class="span-normal">Tracking # :</span> 
<span class="span-500">
@if($tracking_info!="")
{{$tracking_info->tracking_number}}
@endif
</span>
</p>
</div>

</div>
<div class="col-sm-4 col-12 text-left pricing-summary">
<h5 class="heading-size-height-weight-18-21-bold">Pricing Summary</h5>
<div class="company-info my-2">
<p><span class="span-normal">Quantity :</span><span class="span-500">{{$orderitem->quantity}}</span></p>

<p><span class="span-normal">Unit Price :</span><span class="span-500">${{$orderitem->item_price}}</span></p>

@if($orderitem->cart_item!="")
@if($orderitem->cart_item->cartitemimprint!="[]")
@foreach($orderitem->cart_item->cartitemimprint as $cartitemimprint)





@if($cartitemimprint->cartitemimprintcolors!="[]")
@foreach($cartitemimprint->cartitemimprintcolors as $cartitemimprintcolor)

<p><span class="span-normal">{{$cartitemimprint->imprint_name}} ({{$cartitemimprintcolor->name}}) setup fee :</span><span class="span-500">${{$cartitemimprint->setup_price}}</span></p>

@endforeach
@endif




@endforeach
@endif
@endif

<!-- <p><span class="span-normal">Back (Black) setup fee :</span><span class="span-500">$50.00</span></p> -->

<p><span class="span-normal">Shipping :</span><span class="span-500"> @if($orderitem->shipping_price) ${{$orderitem->shipping_price}} @endif</span></p>
<p><span class="span-normal"><b>Item Total : </b></span><span class="span-500">${{$orderitem->price}}</span></p>
</div>



</div>
<div class="col-12 text-right">
<button class="view-order-detail-btn-close" order_item_id="{{$orderitem->id}}">close</button>
</div>

</div>
<!--  view-order-details-row end -->



<!-- view-review start -->
<div class="row write-review-details-row write-review-details-row-{{$orderitem->id}} hidden">

<div class="col-md-12 order-place-paragraph-value pt-2 pb-2">Write a product review</div>
<div class="col-md-12 order-place-paragraph-value pt-2 pb-2">Your Rating</div>
<div class="col-md-12 order-place-paragraph-value pt-2 pb-2">
	
  <div class="rate rate-product-{{$orderitem->id}}">
   
   <input type="hidden"id="rating-{{$orderitem->id}}" product_id="{{$orderitem->product_id}}" order_item_id="{{$orderitem->id}}" name="rate-all-{{$orderitem->id}}" value=""/>

    <input class="rate-click" type="radio"id="{{$review_count}}-star5-{{$orderitem->id}}" order_item_id="{{$orderitem->id}}" name="rate" value="5"/>
    <label for="{{$review_count}}-star5-{{$orderitem->id}}" title="text">5 stars</label>


    <input class="rate-click" type="radio" id="{{$review_count}}-star4-{{$orderitem->id}}" order_item_id="{{$orderitem->id}}" name="rate" value="4"/>
    <label for="{{$review_count}}-star4-{{$orderitem->id}}" title="text">4 stars</label>

    <input class="rate-click" type="radio" id="{{$review_count}}-star3-{{$orderitem->id}}" order_item_id="{{$orderitem->id}}" name="rate" value="3"/>
    <label for="{{$review_count}}-star3-{{$orderitem->id}}" title="text">3 stars</label>

    <input class="rate-click" type="radio" id="{{$review_count}}-star2-{{$orderitem->id}}" order_item_id="{{$orderitem->id}}" name="rate" value="2"/>
    <label for="{{$review_count}}-star2-{{$orderitem->id}}" title="text">2 stars</label>

    <input class="rate-click" type="radio" id="{{$review_count}}-star1-{{$orderitem->id}}" order_item_id="{{$orderitem->id}}" name="rate" value="1"/>
    <label for="{{$review_count}}-star1-{{$orderitem->id}}" title="text">1 star</label>


  </div>

</div>


<div class="col-md-12">
<textarea class="form-control atrt-textarea" id="note-editable-{{$orderitem->id}}" placeholder="Type your Review..." rows="3"></textarea>
</div>

<div class="col-12">
<button class="add-review btn-ord" order_item_id="{{$orderitem->id}}">AddReview</button>
</div>

<div class="col-12 text-right">
<button class="review-close-btn" order_item_id="{{$orderitem->id}}">close</button>
</div>

</div>
<!--  review  end -->



<!-- View Art Proof Details Start -->
<div class="  view-art-proofs-row view-art-proofs-row-{{$orderitem->id}} hidden">

@if($orderitem!="")
@if($orderitem->artproofs!="[]")
@foreach($orderitem->artproofs as $artproof)


<div class="art-proof-seperate row">
<div class="col-12">
<div class="row">
<div class="col-6"><h3 class="text-left sub-reference">Art Proofs For - Item #{{$orderitem->product_id}} </h3></div>
</div>	


</div>
<div class="clearfix">

</div>


<!-- pending art proofs start -->
<div class="col-12  pendign_art_proof_change_{{$artproof->id}}">

</div>

@if($artproof->approved==2)
<div class="col-12 pending_befor_art_proof_{{$artproof->id}}">

<div class="row"  style="margin-left: 10px;margin-right: 10px;">

<div class="col-3">
<p>Artproof #{{$artproof->id}}</p>
</div>

<div class="col-3">
<p><?php echo date("m-d-Y", strtotime($artproof->created_at)); ?></p>

</div>

<div class="col-3">
<a href="{{$base_url}}/storage/app/{{$artproof->path}}" target="_blank">
<p>
<i class="fa fa-file-pdf-o preview_pdf_class" aria-hidden="true" style=""></i> &nbsp; <span style="color: #68bee5;">Preview PDF</span> 
</p>
</a>
</div>

<div class="col-3">
<p class="pending_art_proof_collapse" artproof_id="{{$artproof->id}}">
<span class="text-font_weight-500 pending_change_order_history_name_art_proof_{{$artproof->id}}" style="color: #FF7A00;">Pending</span>
<span class="text-success text-font_weight-500 approved_change_order_history_name_art_proof_{{$artproof->id}} hidden">Approved</span>
<span class="text-danger ext-font_weight-500 delclined_change_order_history_name_art_proof_{{$artproof->id}} hidden">Declined</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  class="text-right">
<img id="pending_collapse_image_up_down_{{$artproof->id}}" class="d-inline" src="{{$base_url}}/resources/views/superior/assets/images/down-collapse.png"></span>
</p>
</div>
</div>



<div id="pending_artproof_div_{{$artproof->id}}" class="row hidden art_proof_content_all">
<div class="col-12">
<p class="pending_note_from_art_department_{{$artproof->id}}">Note from Art Department : <span class="text-font-weight-500">Proof</span></p>
<textarea style="width: 72rem;padding-left: 5px;padding-top: 5px; border-radius: 5px;" rows="3" class="art_proof_customer_note_{{$artproof->id}}"></textarea><br>
<div class="d-inline-flex pendign_terms_conditions_{{$artproof->id}}">
<input type="checkbox" class="checkbox art_prooof_order_history_terms_conditions_{{$artproof->id}}" name="">&nbsp;&nbsp;&nbsp;<span>I agree to the terms and conditions of <span style="color:#68bee5;"><a href="javascript:void(0);" class="a_proof_color" data-toggle="modal" data-target="#ArtProofTermsAndConditions">Art Approval</a></span></span>
</div>


<div class="approved_declined_button_list_{{$artproof->id}}">
<button class="order-history-art-proof-detail-approved" artproof_id="{{$artproof->id}}">Approved</button>
<button class="order-history-art-proof-detail-decline" artproof_id="{{$artproof->id}}">Decline</button>
</div>

</div>
</div>


<hr style="max-width: 1679px;margin: 2rem 1rem 1rem 1rem; border: 0;border-top: 1px solid #dfdfdf;">
</div>
@endif
<!-- pending art proofs end -->







<!-- Approved Art proofs start -->
@if($artproof->approved==1)
<div class="col-12">
<div class="row"  style="margin-left: 10px;margin-right: 10px;">
<div class="col-3">
<p>Artproof #{{$artproof->id}}</p>
</div>
<div class="col-3">
<p><?php echo date("m-d-Y", strtotime($artproof->created_at)); ?></p>
</div>
<div class="col-3">
<a href="{{$base_url}}/storage/app/{{$artproof->path}}" target="_blank">
<p>
<i class="fa fa-file-pdf-o preview_pdf_class" aria-hidden="true"></i> &nbsp; <span style="color: #68bee5;">Preview PDF</span> 
</p>
</a>
</div>
<div class="col-3">
<p class="approved_art_proof_collapse" artproof_id="{{$artproof->id}}"><span class="text-success text-font_weight-500">Approved</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right"><!-- <i class="fa fa-angle-down" aria-hidden="true"></i> --><img id="approved_collapse_image_up_down_{{$artproof->id}}" class="d-inline" src="{{$base_url}}/resources/views/superior/assets/images/down-collapse.png"></span></p>
</div>
</div>


<div id="approved_artproof_div_{{$artproof->id}}" class="hidden art_proof_content_all row">
<div class="col-12">
<!-- <textarea style="width: 72rem;padding-left: 5px;padding-top: 5px;border-radius: 5px;" rows="3"></textarea><br> -->

<div style="width: 72rem;height:64px;padding-left: 5px;padding-top: 5px;border-radius: 5px;border: 1px solid #dfdfdf;">
<?php echo $artproof->customer_note; ?>
</div><br>
</div>
</div>


<hr style="max-width: 1679px;margin: 2rem 1rem 1rem 1rem; border: 0;border-top: 1px solid #dfdfdf;">
</div>
@endif
<!-- Approved Art proofs end -->



<!-- Declined Art proofs start -->
@if($artproof->approved==0)
<div class="col-12">
<div class="row"  style="margin-left: 10px;margin-right: 10px;">
<div class="col-3">
<p>Artproof #{{$artproof->id}}</p>
</div>
<div class="col-3">
<p><?php echo date("m-d-Y", strtotime($artproof->created_at)); ?></p>
</div>
<div class="col-3">
<a href="{{$base_url}}/storage/app/{{$artproof->path}}" target="_blank">
<p>
<i class="fa fa-file-pdf-o preview_pdf_class" aria-hidden="true" ></i> &nbsp; <span style="color: #68bee5;">Preview PDF</span> 
</p>
</a>
</div>
<div class="col-3">
<p class="declined_art_proof_collapse" artproof_id="{{$artproof->id}}"><span class="text-danger ext-font_weight-500">Declined</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-right"><img id="declined_collapse_image_up_down_{{$artproof->id}}" class="d-inline" src="{{$base_url}}/resources/views/superior/assets/images/down-collapse.png"></span></p>
</div>
</div>


<div id="delined_art_proof_div_{{$artproof->id}}" class="row hidden art_proof_content_all" >
<div class="col-12">

<!-- <textarea style="width: 72rem;padding-left: 5px;padding-top: 5px;border-radius: 5px;" rows="3"></textarea><br> -->

<div style="width: 72rem;height:64px;padding-left: 5px;padding-top: 5px;border-radius: 5px;border: 1px solid #dfdfdf;">
<?php echo $artproof->customer_note; ?>
</div><br>



</div>
</div>


<hr style="max-width: 1679px;margin: 2rem 1rem 1rem 1rem; border: 0;border-top: 1px solid #dfdfdf;">
</div>
@endif
<!-- Declined Art proofs end -->

<!-- <div class="col-12 text-right">
<button class="order-history-art-proof-close-btn mr-5" order_id="{{$orderitem->order_id}}">Close</button>
</div>
-->







</div>




@endforeach

@else

<div class="empty_artproofs_height">
<p class="text-info text-center mt-5">No Artproofs Found</p>
</div>
@endif
@endif
<div class="row">
<div class="col-12 text-right">
<button class="order-history-art-proof-close-btn mr-5" order_item_id="{{$orderitem->id}}">Close</button>
</div>
</div>
</div>
<!-- View Art Proof Details Start -->

</div>
<!-- order-history-content-main end -->

<!-- view order detail content start -->
<!-- <div class="view-order-detail-content">


</div> -->
<!-- view order detail content end -->


</div>
<!-- order-placed-content-body end -->
</div>

@endforeach

@endif

@endforeach
<!-- order placed content end -->










<!-- <div class="row">
<div class="col-12 text-center">
<button class="reorder-btn btn-request-reorder">Reorder</button>
</div>
</div> -->

@else

<div class="row">
<div class="col-12 no_order_found">
No Order Found
</div>
</div>

@endif






</div>
<!-- full order content end -->


</div>

<!-- Order content end -->

</div>

<!-- order End -->







<!--============================== Reorder List Start ================================== -->

<!-- order start -->
<div class="tab-pane fade" id="reorder-list" role="tabpanel">

<!-- Order content start -->
<div class="order-content">

<br><br>

<!-- full order content start -->
<div class="full-order-content">


<!-- order placed content start -->
@if($reorder_lists!="[]")
<!-- row start -->
<!-- <div class="row">
<div class="col-lg-2">
<p class="order-para"><span class="order_paragraph">{{count($reorder_lists)}} Order</span><span class="order-pargraph">&nbsp;Placed in</span></p>
</div>
<div class="col-lg-3">
<select class="select_order_list">
<option disabled="">select</option>
<option>past 3 Month</option>
<option selected="">Past 6 Month</option>
<option>past 1 Year</option>
</select>
</div>

<div class="col-lg-7">
<div>
<span class="order_search_icon"><i class="fa fa-search"></i></span><input class="order_search_input" type="text" name="" placeholder="Search all orders"><button class="order_search_button">Search Order</button>
</div>
</div>
</div>

<br><br> -->
@foreach($reorder_lists as $order)
<div class="order-placed-content">
<!-- row start -->
<!-- <div class="row order-placed-content-header">
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">Re-Order Placed</p>
@if($order->orderitem!="")
<p class="order-place-paragraph-value">



<?php echo date("m-d-Y", strtotime($order->orderitem->created_at)); ?>



</p>
@endif
</div>
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">Total</p>
<p class="order-place-paragraph-value">order->orderitem->item_price</p>
</div>
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">Ship To</p>
<select class="order-placed-select-box order-place-paragraph-value">
<option disabled="">select</option>
<option class="" selected="">Boris Kagan</option>
<option>Kagan</option>
</select>
</div>
<div class="col-12 col-md-2 col-lg-2">
<p class="order-place-paragraph-title">In Hand Date</p>
<p class="order-place-paragraph-value">ASAP</p>
</div>
<div class="col-12 col-md-4 col-lg-4 text-right">
<p class="order-place-paragraph-title">Re-Order </p>
</div>
</div> -->
<!-- row end -->




<!-- order-placed-content-body start -->
<div    class="order-placed-content-body">

<!-- order-history-content-main start  -->
<div class="order-history-content-main">

<div class="row">
<div class="col-sm-12 col-md-9 col-lg-9 col-12 order-history-content-col">
<p class="d-inline-block mt-2 item_content_para">Item - #<span style="font-weight: 500;">


@if($orderitem!="")

@if($orderitem->product!="")

{{$orderitem->product->product_id}}
@endif
@endif

</span></p>
<p class="d-inline-block ml-5 item_content_para">Current Status :<span style="font-weight: 500;">waiting for admin approval</span></p>
<div class="clearfix"></div>
</div>

<div class="col-sm-12 col-md-3 col-lg-3 col-12">
<!-- Removed order history and all -->
@if($order->is_reorder==1)
<p class="mt-2 text-info status_of_reorder">Pending</p>
@else
<p class="mt-2 text-success status_of_reorder">Approval</p>
@endif

</div>

</div>

<div class="order-history-content order-history-content-{{$orderitem->order_id}} row">
<div class="col-sm-12 col-md-12 col-lg-12 col-12 order-history-content-col">



<div class="row">
<div class="col-3">

@if($orderitem!="")

@if($orderitem->product!="")
<img src="{{$base_url}}/storage/app/{{$orderitem->product->product_image}}">
@else

<img src="{{$base_url}}/files/assets/images/product.png">

@endif
@endif
</div>
<div class="col-2">
<br>
<br>
<br>
<p class="normal-text-content">
@if($orderitem!="")

@if($orderitem->product!="")

@if($orderitem->product->product_translation!="")

{{$orderitem->product->product_translation->product_name}}
@endif
@endif
@endif
</p>
<div class="d-inline-flex">
<!-- <input class="reorder_checkbox_reorder_request" type="checkbox" name="reorder_request" order_id="{{$order->id}}" style="width: 25px;height: 25px;">&nbsp;&nbsp;<span class="normal-text-content" style="margin-top: 5px;">Reorder</span> -->
<!-- button class="reorder-btn reorder_single_element" order_id="{{$order->id}}">Reorder</button> -->
</div>

</div>
<div class="col-7">

<style type="text/css">
ul.rorder-description-ul li.reorder_li{
font-weight: normal;
font-size: 17px;
line-height: 23px;
letter-spacing: -0.017em;
color: #212121;
margin-top: 5px;
}

ul.exaclty_no_ul li.exactly_no_li{
margin-left: 20px;
margin-top: 5px;
}
</style>

<ul class="rorder-description-ul">
<li class="reorder_li">
1. Are the contents of this reorder going to be exactly the same?<br>


@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->reorder_exactly_same=="no")
<b>:: No</b>
@endif

@if($order->orderitem->reorder_show->reorder_exactly_same=="yes")
<b>:: Yes</b>
@endif

@endif
@endif

<ul class="exaclty_no_ul" style="margin-left: 15px;">
<li class="exactly_no_li">
1.1 Is the quantity going to change?<br>
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->quantity_change=="no")
<b>:: No</b>
@endif

@if($order->orderitem->reorder_show->quantity_change=="yes")
<b>:: Yes.{{$order->orderitem->quantity}}</b>
@endif

@endif
@endif
</li>

<li class="exactly_no_li">
1.2 Is item color going to change?<br>
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->item_color_change=="no")
<b>:: No</b>
@endif

@if($order->orderitem->reorder_show->item_color_change=="yes")
<b> ::Yes.</b>
@endif

@endif
@endif

</li>
<li class="exactly_no_li">
1.3 Is the imprint color going to change?<br>
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->imprint_color_change=="no")
<b>:: No</b>
@endif

@if($order->orderitem->reorder_show->imprint_color_change=="yes")
<b>
:: Yes. 

<p class="" style="margin-left: 10px;">
@if($order->orderitem->cart_item!="")

@if($order->orderitem->cart_item->cartitemimprint!="[]")
@foreach($order->orderitem->cart_item->cartitemimprint as $cartitemimprint)
{{$cartitemimprint->imprint_name}},&nbsp;
@endforeach
@endif
@endif
</p>
</b>
@endif

@endif
@endif
</li>

<li class="exactly_no_li">
1.4 Are you going to be providing new artwork for this reorder?<br>
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->artwork_change=="no")
<b>:: No</b>
@endif

@if($order->orderitem->reorder_show->artwork_change=="yes")
<b>:: Yes.</b>
@endif

@endif
@endif

</li>

</ul>

</li>


<li class="reorder_li">
2. When do you need this order delivered by?<br>

@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")


@if($order->orderitem->reorder_show->order_delivered_by=="no")
<b>:: No&nbsp;&nbsp;{{$order->orderitem->received_date}}</b>
@endif

@if($order->orderitem->reorder_show->order_delivered_by=="yes")
<b>:: Yes&nbsp;&nbsp;"ASAP"</b>	  
@endif


@endif
@endif

</li>
<li class="reorder_li">
3. Is the shipping address for this order the same as before?<br>
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->shipping_address=="no")

<b>
:: No &nbsp;&nbsp;


{{$order->orderitem->shipping_first_name}} {{$order->orderitem->shipping_last_name}},
{{$order->orderitem->shipping_address_line_1}},
{{$order->orderitem->shipping_city}}, {{$order->orderitem->shipping_state}}, {{$order->orderitem->shipping_country}}, 
{{$order->orderitem->shipping_zip}}

</b> 

@endif
@if($order->orderitem->reorder_show->shipping_address=="yes")

<b>:: Yes</b>
@endif


@endif
@endif
</li>
<li class="reorder_li">
4. Is the billing address for this order the same as before?<br>
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->billing_address=="no")

<b>
:: No &nbsp;&nbsp; <br>
{{$order->orderitem->billing_first_name}} {{$order->orderitem->billing_last_name}},
{{$order->orderitem->billing_address_line_1}},

@if($order->orderitem->billing_city!="")
{{$order->orderitem->billing_city}}, 
@endif

{{$order->orderitem->billing_state}},
{{$order->orderitem->billing_country}}, 
{{$order->orderitem->billing_zip}}
</b>

@endif
@if($order->orderitem->reorder_show->billing_address=="yes")

<b>:: Yes</b>
@endif


@endif
@endif

</li>
<li class="reorder_li">
5. Should the same payment on file be used for this reorder?
@if($order->orderitem!="")
@if($order->orderitem->reorder_show!="")

@if($order->orderitem->reorder_show->payment_same=="no")
<b>:: No</b>
@endif

@if($order->orderitem->reorder_show->payment_same=="yes")
<b>:: Yes</b>
@endif

@endif
@endif


</li>

</ul>
</div>
</div>
</div>
<style type="text/css">
p.status_of_reorder{
font-weight: 500;
font-size: 16px;
line-height: 19px
}
</style>

<!-- <div class="col-sm-12 col-md-3 col-lg-3 col-12">

@if($order->is_reorder==1)
<p class="mt-2 text-info status_of_reorder">Pending</p>
@else
<p class="mt-2 text-success status_of_reorder">Approval</p>
@endif

</div> -->
</div>
<br><br>






</div>
<!-- order-history-content-main end -->

<!-- view order detail content start -->
<!-- <div class="view-order-detail-content">


</div> -->
<!-- view order detail content end -->


</div>
<!-- order-placed-content-body end -->
</div>

@endforeach
<!-- order placed content end -->










<!-- <div class="row">
<div class="col-12 text-center">
<button class="reorder-btn btn-request-reorder">Reorder</button>
</div>
</div> -->

@else

<div class="row">
<div class="col-12 no_order_found">
No Re-Order Found
</div>
</div>

@endif






</div>
<!-- full order content end -->


</div>

<!-- Order content end -->

</div>

<!-- order End -->

<!--============================== Reorder List End ==================================== -->





<div class="tab-pane fade" id="wishlist_data" role="tabpanel">
<div class="wishlist-content">
<div class="row">
@if($wishlists!="[]")
@foreach($wishlists as $wishlist)


@if($wishlist->product!="")
<div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6 remove_wishlist_{{$wishlist->product->product_id}}">
@else
<div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
@endif
<div class="product-default  inner-icon">
<!-- <div class="text-right single-line-bar-div">
<div class="single-line-bar color-033e9a"></div>
<div class="single-line-bar color-ebe5d9"></div>
<div class="single-line-bar color-b30909"></div>
<div class="single-line-bar color-a3c823"></div>
</div> -->
@if($wishlist->product!="")
<div class="wishlist_content" style="z-index: 1;position: absolute;margin-left:70%;margin-top:5px;cursor:pointer;" id="{{$wishlist->product->product_id}}">


<i class="fa fa-heart fill wishlist_icon_{{$wishlist->product->product_id}}"></i>

</div>
@endif


@if($wishlist->product!="")
<figure>
<a href="{{$base_url}}/product/{{$wishlist->product->product_url}}?pid={{$wishlist->product->product_translation->product_id}}&skuid=1&pvid=1&cvid=1" target="_blank">
<img src="{{$base_url}}/storage/app/{{$wishlist->product->product_image}}" style="height: 250px;" width="239" height="239" alt="product">
</a>
</figure>
@endif
<div class="product-details" style="">
<ul class="circle-rounded-ul" style="display: inline">

@if($wishlist->product!="")
@if($wishlist->product->product_color_group!="")
@if($wishlist->product->product_color_group->product_colors!="[]")
@foreach($wishlist->product->product_color_group->product_colors->take(6) as $product_color)

<li class="d-inline-block circle-rounded-li"><a href="javascript:void(0);"> <span class="dot" style="background-color:{{$product_color->color->color_hex}};"></span></a></li>

@endforeach
@endif
@else
<li class="d-inline-block circle-rounded-li" style="width: 25px;height: 25px;"></span></li>
@endif
@endif

<!-- <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-black"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-purple"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-orange"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-white"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot text-gray"></span></a></li> -->
</ul>

<h3 class="product-title">
@if($wishlist->product!="")
<a href="Javascript:void(0);" class="text-uppercase">{{$wishlist->product->default_product_translation->product_name}}</a>
@endif
</h3>
@if($wishlist->product!="")
<div class="item-box">
<span>Item - #{{$wishlist->product->product_id}}</span>
</div>
@endif
<!--  <div class="order-ships">
<span>Order as few as 12 ships</span>
</div> -->
<!-- <hr class="hr"> -->
@if($wishlist->product!="")
<div class="working-days">
<span class="">{{$wishlist->product->default_product_translation->delivery_message}}</span>
</div>
@endif

@if($wishlist->product!="")
@if($wishlist->product->product_prices!='[]')

@php
$per_item_price_all=[];
$per_item_sale_price_all=[];
$setup_price_all=[];
foreach($wishlist->product->product_prices as $product_price){

$per_item_price = $product_price->per_item_price;
array_push($per_item_price_all, $per_item_price);

$per_item_sale_price = $product_price->per_item_sale_price;
array_push($per_item_sale_price_all,$per_item_sale_price);

$setup_price = $product_price->setup_price;
array_push($setup_price_all,$setup_price);
}

$min_per_item_price = min($per_item_price_all);
$min_per_item_sale_price = min($per_item_sale_price_all);
$min_setup_price = min($setup_price_all);
@endphp
@if($min_per_item_price!="")
<div class="price-box">
<span class="price-txt">As Low As</span>
<span class="product-price">${{$min_per_item_price}}</span>
</div>
@elseif($min_per_item_sale_price!="")
<div class="price-box">
<span style="font-weight: 200;">As Low As</span>
<span class="product-price">${{$min_per_item_sale_price}}</span>
</div>
<!-- <div class="price-box"><br></div> -->
@elseif($min_setup_price!="")
<div class="price-box">
<span style="font-weight: 200;">As Low As</span>
<span class="product-price">${{$min_setup_price}}</span>
</div>
@else
<div class="price-box"><br></div>
@endif
@endif
@endif
</div>
</div>
</div>
@endforeach
@endif
</div>


</div>
</div><!-- End .tab-pane -->


<script type="text/javascript">
$(document).ready(function(){

$('.reorder_append_items').on('click','.btn-reorder-request-back',function(){

$('#order-tab').addClass('active').addClass('show');
$('#reoder-request-tab').removeClass('active').removeClass('show');

$('#order').addClass('active').addClass('show');
$('#reoder-request').removeClass('active').removeClass('show');

});



$('.reorder_append_items').on('click','.btn-reorder-request-clear',function(){
var order_id = $(this).attr('order_id');


$('.all_reorder_content_data_show_'+order_id).html('');

$('.exactly_same_checkbox_yes_'+order_id).prop('checked',true);
$('.exactly-same-no-checkbox-'+order_id).prop('checked',false);

$('.order_delivered_by_checkbox_yes_'+order_id).prop('checked',true);
$('.order_delivered_by_No_checkbox_'+order_id).prop('checked',false);

$('.ship_addr_ord_same_as_before_checkbox_yes_'+order_id).prop('checked',true);
$('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);

$('.bill_addr_ord_same_as_befr_checkbox_yes_'+order_id).prop('checked',true);
$('.bill_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);

$('.same_payment_reorder_checkbox_yes_'+order_id).prop('checked',true);
$('.same_payment_reorder_checkbox_'+order_id).prop('checked',false);
});
})
</script>


<div class="tab-pane fade" id="reoder-request" role="tabpanel">
<div class="reoder-request-content">
<h3 class="account-sub-title d-none d-md-block">Reorder Request</h3>

<div class="reorder_append_items" id="reorder_append_items">


</div>
<!-- <div class="row item-list">
<div class="col-2">
<img class="product-img" src="{{$base_url}}/assets/images/mgggg 1.png">
</div>
<div class="col-3">
<p>Item : </p>
<p>Product Name : </p>
<p>Status : </p>
</div>
<div class="col-7" style="float:left">
<p class="text-font-weight-500">#62555</p>
<p class="text-font-weight-500">Silicone Earbud Case With Carabiner</p>
<p class="text-font-weight-500">New Order Received - Processing</p>
</div>
</div>
<br> -->



<!-- 
<div class="row">

<div class="col-7 questions-main">
<div class="row question-content-row">
<div class="col-12">
<p class="text-font-weight-500">Are the contents of this reorder going to be exactly the same?</p>
</div>
<div class="col-12 d-inline-flex">
<input type="checkbox" name="" class="reorder-request-checkobx">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="reorder-request-checkobx exactly-same-no-checkbox" >&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>
</div>
</div>
<div class="row question-content-row">
<div class="col-12">
<p class="text-font-weight-500">When do you need this order delivered by?</p>
</div>
<div class="col-12" style="display:inline-flex;">

<input type="checkbox" name="" class="reorder-request-checkobx">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="reorder-request-checkobx order_delivered_by_No_checkbox">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>

</div>
</div>

<div class="row question-content-row">
<div class="col-12">
<p class="text-font-weight-500">Is the shipping address for this order the same as before?</p>
</div>
<div class="col-12" style="display:inline-flex;">

<input type="checkbox" name="" class="reorder-request-checkobx">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="reorder-request-checkobx shipp_addr_ord_same_as_befr_checkbox">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>

</div>
</div>

<div class="row question-content-row">
<div class="col-12">
<p class="text-font-weight-500">Is the billing address for this order the same as before?</p>
</div>
<div class="col-12" style="display:inline-flex;">

<input type="checkbox" name="" class="reorder-request-checkobx">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="reorder-request-checkobx">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>

</div>
</div>

<div class="row question-content-row">
<div class="col-12">
<p class="text-font-weight-500">Should the same payment on file be used for this reorder?</p>
</div>
<div class="col-12" style="display:inline-flex;">

<input type="checkbox" name="" class="reorder-request-checkobx">&nbsp;&nbsp;<p class="text-font-weight-normal" style="margin-right:15px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="reorder-request-checkobx same_payment_reorder_checkbox">&nbsp;&nbsp;<p class="text-font-weight-normal">No</p>

</div>
</div>

<div class="row question-content-row">
<div class="col-12">
<p class="text-font-weight-500">
Specific Comments about your reorder (shipping, billing , design etc..)
</p>
</div>
<div class="col-12">
<textarea class="reorder-request-textarea" rows="7" cols="75" placeholder="Write your comment"></textarea>
</div>
</div>

<div class="row" style="margin-top:10px;">

<div class="col-12">
<button class="btn-reorder-request">Back</button>
<button class="btn-reorder-request">Clear</button>
<button class="btn-reorder-request">Submit Reorder Request</button>
</div>
</div>
<br>
<br>
<br>
</div>


<div class="col-5">

<div class=" exactly-same-no" style="margin-right: -1px;margin-left: -15px;">
<p class="text-font-weight-500">Is the quantity going to change?</p>
<div class="row">
<div class="col-12 d-inline-flex">
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">No</p>
</div>
<div class="col-12">
<p class="pr-tb-exactly-same-no">Pricing Table</p>	
</div>

<div class="col-12">
<div class="row">
<div class="col-8">
<form>
<table class="table">
<thead>
<tr>

<th scope="col">Quantity</th>
<th scope="col">Regular Price</th>
<th scope="col">Sale</th>
</tr>
</thead>
<tbody>
<tr>

<td><span>Min</span>200</td>
<td>$2.19</td>
<td><span class="color-67a03c">$1.92</span></td>
</tr>
<tr>

<td>600</td>
<td>$2.17</td>
<td><span class="color-67a03c">$1.90</span></td>
</tr>
<tr>

<td>1200</td>
<td>$2.13</td>
<td><span class="color-67a03c">$1.87</span></td>
</tr>

<tr>
<td>2600</td>
<td>$2.09</td>
<td><span class="color-67a03c">$1.83</span></td>
</tr>

</tbody>
</table>
</form>
</div>



<div class="col-4">
<div class="type-quantity-main-div">
<label class="text-font-weight-500 color-212121">Type Quantity</label>
<input type="number" placeholder="350" name="" class="type_quantity_input">
</div>
</div>	

</div>
</div>



<div class="col-12">
<p class="text-font-weight-500">Is item color going to change?</p>
</div>
<div class="col-12 d-inline-flex">
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">No</p>
</div>


<div class="col-12">
<p class="text-font-weight-500">Is the imprint color going to change?</p>
</div>
<div class="col-12 d-inline-flex">
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">No</p>
</div>

<div class="col-12">
<p class="text-font-weight-500">Are you going to be providing new artwork for this reorder?</p>
</div>
<div class="col-12 d-inline-flex">
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">Yes</p>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="" class="checkbox">&nbsp;&nbsp;
<p style="margin-top: 5px;">No</p>
</div>
</div>
</div>





<div class="order-delivered-by-date" style="margin-right: -15px;margin-left: -15px;">
<input type="text" name="" class="datepicker order-delivered-by-date-input" placeholder="Select a date">
</div>





<div class="shipping_address_same_as_before">


<div class="row add_new_shipping_address_same_as_before pt-3">
<div class="col-md-12">



<h4>Is the shipping address for this order the same as before?</h4>
<div class="row  pt-3 pl-3">
<div class="account-content">
<form id="address_shipp_same_as_before">

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

<div class="form-group form-check">

<input type="checkbox" class="form-check-input united-staten" id="united-state-shipp-same-before" checked="">&nbsp;
<label class="form-check-label check-checkout mr-2" for="united-staten">United States</label>
&nbsp;&nbsp;
&nbsp;&nbsp;
<input type="checkbox" class="form-check-input canadan" id="canada-shipp-same-before">&nbsp;
<label class="form-check-label check-checkout" for="canadan">Canada</label>

</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" placeholder="David" id="first_name" name="fname" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="last_name" placeholder="xyz" name="lname" required="">
</div>
</div>
</div>



<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="company_name" name="companyname" placeholder="David" >
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="address_one" name="add1" placeholder="2543  0042 3562 0210" required="">
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="address_two" name="add2" placeholder="2543  0042 3562 0210" >
</div>



<div class="row">     
<div class="col">
<div class="select-custom">
<label class="form-lbl">City<span class="required">*</span></label>
<select name="cityn" id="shipp_city" class="form-control txt-lbl"  required=" ">
<option value="" selected="selected">
select City
</option>
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_id}}">{{$city->city_name}}</option>
@endforeach
</select>
</div>
</div>


<div class="col">
<div class="select-custom">
<label class="form-lbl">State<span class="required">*</span></label>
<select name="staten" id="shipp_state" class="form-control txt-lbl" required="">
<option value="" selected="selected">Selecte State
</option>
@foreach($data['Allstates'] as $state)
<option value="{{$state->state_id}}">{{$state->state_name}}</option>
@endforeach
</select>
</div>
</div>


<div class="col">
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Zip/PostalCode<span class="required">*</span></label>
<input type="number" class="form-control txt-lbl" id="ship_zip_code" name="zip-coden" placeholder="123456" required="">
</div>                                         
</div>

</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
<input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="day_telephone" name="teln" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="shipp_ext" placeholder="Ext" name="extn" >
</div>
</div>

</div>  



<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="shipp_fxn" name="faxn" placeholder="Fax" >
</div>


<div class="form-group form-check">
<input type="checkbox" class="form-check-input default-ship-addn" id="ship-addr-same-before-default">
<label class="form-check-label check-checkout text-font-weight-normal" for="default-ship-addn">&nbsp;&nbsp;&nbsp;Make this my default shipping address</label>
</div>


<div class="row">
<div class="col add_new_addr_shipp_same_as_before">
<button type="button" class="btn-save-changes">Save Change</button>   
</div>
<div class="col new-add-cancel">
<button type="button" class="btn-cancel btn_shipping_address_cancel">Cancel</button>  
</div>
</div>
</form>
</div>
</div>
</div> 
</div>


</div>






<div class="same-payment-reorder-div">
<select name="bank_acc" id="bank_account_select" class="select_bank_account">
<option selected="" disabled="">Select Account</option>
<option value="central">Central Bank</option>
<option value="sbi">SBI</option>
<option value="boi">BOI</option>
</select>
<div class="acc-add">
<button class="add-new-account add_new_account_main">Add New Account</button>
</div>

<div class="new-acc-fill-info">





<div class="row mt-3">
<div class="col-12">
<label>Cart Holder<span style="color:red;">*</span></label>
</div>
<div class="col-12 ">
<input type="text" name="" placeholder="David" class="same_payment_reorder_paument_input">
</div>
</div>

<div class="row mt-3">
<div class="col-12">
<label>Card Number<span style="color:red;">*</span></label>
</div>
<div class="col-12">
<input type="text" name="" placeholder="2543  0042 3562 0210" class="same_payment_reorder_paument_input">
</div>
</div>


<div class="row mt-3">
<div class="col-6">
<div class="row">
<div class="col-12">
<label>Card Security Code<span style="color:red;">*</span></label>
</div>
<div class="col-12">
<input type="text" name="" placeholder="234" class="col-6-input-box">
</div>
</div>
</div>

<div class="col-6">
<div class="row">
<div class="col-12">
<label>Expiration Date<span style="color:red;">*</span></label>
</div>
<div class="col-12">
<input type="text" name="" placeholder="01 / 2025" class="col-6-input-box">
</div>
</div>
</div>
</div>

<div class="row mt-3">
<div class="col-12">
<button class="btn-save-cart">Save</button>
</div>
</div>

</div>

</div>



</div>
</div>

-->



<div class="row please-note">
<div class="col-12">
<h5 class="please-note-heading">Please Note:</h5>
<ul class="reorder-request-ul">
<li class="reorder-request-li">
Current product pricing will apply to all reorders.
</li>

<li class="reorder-request-li">
Please check the product details page for current pricing or details.
</li>

<li class="reorder-request-li">
Setup charge(s) will be waived on all exact reorders (if imprint is the same)
</li>

<li class="reorder-request-li">
If submitting a reorder request with no actual order changes, we will setup the order for you and email you a confirmation.
</li>

<li class="reorder-request-li">
If your reorder requires specific changes to the artwork, shipping, billing or we have any questions, a customer service representative will contact you within one business day to complete the order.
</li>

<li class="reorder-request-li">
If you have any questions please contact customer service at 1-888-577-6667, or send an email to
</li>
</ul>
</div>
</div>

</div>
</div><!-- End .tab-pane -->


<div class="tab-pane fade" id="save_cart" role="tabpanel">
<div class="save-cart-content">
<!-- <h3 class="account-sub-title d-none d-md-block">Save Cart</h3> -->
<style type="text/css">
.product-default .product_image_first{
height:200px;
width:200px;
}

.product-default .product_image_second{
height:210px;
width: 210px;
}

.product_default .product-details {
display: block;
}

.product_title{
margin-top: 0px;
}

.product-default {
border: 0px solid #ddd !important; 
border-bottom: 2px solid #a9ddf4 !important;
padding:5px; 
}

</style>


<div class="row pb-4 divided_by_list">




@if($save_cart_items!="[]")

@foreach($save_cart_items as $save_cart_item)

@if($save_cart_item->cart_item!="")
@if($save_cart_item->cart_item->product!="")

<div class="col-sm-12 col-6 product-default product_default left-details product-list mb-2">

<figure>
<a href="javascript:void(0);">
<img class="product_image_first" src="{{$base_url}}/storage/app/{{$save_cart_item->cart_item->product->product_image}}" width="250" height="250" alt="product" onerror="this.src='{{$base_url}}/files/assets/images/product.png';" class="new-arrival" alt="product" style="height: 216px;">

</a><br>
<ul class="circle-rounded-ul" >
@if($save_cart_item->cart_item->product->product_color_group!="")

@if($save_cart_item->cart_item->product->product_color_group->product_colors!="[]")
@foreach($save_cart_item->cart_item->product->product_color_group->product_colors->take(5) as $product_color)
<!-- <li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-black"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-purple"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-orange"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-white"></span></a></li>
<li class="d-inline-block circle-rounded-li"><a href=""> <span class="dot-list text-gray"></span></a></li> -->
<li class="d-inline-block circle-rounded-li"><a href="javascript:void(0);"> <span class="dot-list" style="background-color:{{$product_color->color->color_hex}};"></span></a></li>

@endforeach

@endif

@else
<li class="d-inline-block circle-rounded-li" style="width: 25px;height: 25px;"></span></li>
@endif
</ul>
</figure>
<div class="product-details">
<!-- <div class="category-list">
<a href="category.html" class="product-category">category</a>
</div> -->
<h3 class="product-title product_title"> <a href="javascript:void(0);">{{$save_cart_item->cart_item->product->default_product_translation->product_name}}</a>
</h3>

<div class="item-details">
<span>Item - <b>#{{$save_cart_item->cart_item->product->product_id}}</b></span>
</div>

<!-- <div class="order-content">
<span>Order as few as 12,</span>
</div> -->

<div class="ship">
<!--  Ship in  -->{{$save_cart_item->cart_item->product->default_product_translation->delivery_message}}
</div>

@if($save_cart_item->cart_item->product->product_prices !="[]")
@php
$per_item_price_all=[];
$per_item_sale_price_all=[];
$setup_price_all=[];
foreach($save_cart_item->cart_item->product->product_prices as $product_price){

$per_item_price = $product_price->per_item_price;
array_push($per_item_price_all, $per_item_price);

$per_item_sale_price = $product_price->per_item_sale_price;
array_push($per_item_sale_price_all,$per_item_sale_price);

$setup_price = $product_price->setup_price;
array_push($setup_price_all,$setup_price);
}

$min_per_item_price = min($per_item_price_all);
$min_per_item_sale_price = min($per_item_sale_price_all);
$min_setup_price = min($setup_price_all);
@endphp

@if($min_per_item_price!="")
<div class="price-info">
<b><span class="price-txt">As Low as </span><span style="color: #67a03c !important;font-weight: 700;font-size: 15px;">${{$min_per_item_price}}</span></b>
</div>
@elseif($min_per_item_sale_price!="")
<div class="price-info">
<b><span class="price-txt">As Low as </span><span style="color: #67a03c !important;font-weight: 700;font-size: 15px;">${{$min_per_item_sale_price}}</span></b>
</div>
@elseif($min_setup_price!="")
<div class="price-info">
<b><span class="price-txt">As Low as </span><span style="color: #67a03c !important;font-weight: 700;font-size: 15px;">${{$min_setup_price}}</span></b>
</div>
@else
<div class="price-info">
<br>
</div>
@endif

@endif                           

</div>
<!-- End .product-details -->
</div>

@endif
@endif


@endforeach

@endif
</div>








</div>
</div>



<div class="tab-pane fade " id="payment_info" role="tabpanel">
<div class="payment-info-content">
<!-- Header -->
<div class="row">
<div class="col-6"><h3 class="account-sub-title d-none d-md-block">Payment Method</h3></div>
<div class="col-6 text-right"><button type="button" class="add_new_payment_btn" style="">Add New Payment</button></div>
</div>	

<!-- content row start-->
<div class="row">
<!-- col-6 payment start -->
<div class="col-6 payment-information-col">
<div class="payment-information-div">

<!-- row start payment -->
<div class="row">
<div class="col-9">
<div class="payment-info-detail">
<!-- row start -->
<div class="row mt-1 mb-1">
<div class="col-5 text-font-weight-500">
Name:
</div>
<div class="col-5 text-font-weight-500">
Akshay
</div>
<div class="col-2">

</div>
</div>
<!-- row end -->

<!-- row start -->
<div class="row mt-1 mb-1">
<div class="col-5 text-font-weight-500">
Card Type:
</div>
<div class="col-5">
Amex
</div>
<div class="col-2">

</div>
</div>
<!-- row end -->

<!-- row start -->
<div class="row mt-1 mb-1">
<div class="col-5 text-font-weight-500">
Last 4 Digits:
</div>
<div class="col-5">
**6021
</div>
<div class="col-2">

</div>
</div>
<!-- row end -->

<!-- row start -->
<div class="row mt-1 mb-1">
<div class="col-5 text-font-weight-500">
Exp. Date:
</div>
<div class="col-5">
10/25
</div>
<div class="col-2">

</div>
</div>
<!-- row end -->

<!-- row start -->
<div class="row mt-1 mb-1">
<div class="col-5">
<a href="javascript:void(0);" class="text_color_a">
<b>Edit Payment</b>
</a>

</div>
<div class="col-5">
<a href="javascript:void(0);" class="text_color_a">
<b>Make Default</b>
</a>

</div>
<div class="col-2">
<a href="javascript:void(0);" class="text_color_a">
<b>Remove</b>
</a>

</div>
</div>
<!-- row end -->

</div>
</div>
<div class="col-3 default-payment-content">
<div class="default-div">
<p class="default-para">default</p>
</div>
</div>
</div>
<!-- row end payment -->
</div>
</div>
<!-- col-6 payment end -->



</div>

<!-- content end -->

</div>
</div>



<div class="tab-pane fade" id="pending_art_proofs" role="tabpanel">
<div class="pending-art-proofs-content">
<!-- <h3 class="account-sub-title d-none d-md-block">Pending Art Proofs</h3> -->
@if($art_proofs!="[]")
@foreach($art_proofs as $art_proof)

<!-- Pending Art Proofs Menu Content start -->
<div class="pending-art-proofs-menu-content pb-5" style="margin-bottom: 20px;" id="order_item_aprv_decl_{{$art_proof->id}}">
<!-- row start -->
<div class="row order-proof-heading">
<div class="col-6">
@if($art_proof->orderitem!="")
<p><b>Order Number : #{{$art_proof->orderitem->order_id}} </b></p>
@endif

</div>
<div class="col-6 text-right">
<p><?php echo date("m-d-Y", strtotime($art_proof->created_at)); ?></p>
</div>
</div>
<!-- row end -->
<div class="border-pending-art-proofs"></div>
<!-- row start -->
<div class="row order-proof-sub-heading">
<div class="col-3 text-center text-font-weight-500">
Product Number
</div>

<div class="col-3 text-center text-font-weight-500">
Product Name

</div>
<div class="col-3 text-center text-font-weight-500">
View

</div>
<div class="col-3 text-right text-font-weight-500">
Download PDF <br> Viewer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div>
<!-- row end -->
<div class="border-pending-art-proofs"></div>


<!-- row start -->
<div class="row art-proof-proof-item-detail">
<div class="col-3">
@if($art_proof->orderitem!="")
@if($art_proof->orderitem->product!="")
<img src="{{$base_url}}/storage/app/{{$art_proof->orderitem->product->product_image}}" style="display: inline-block;width: 80px;height:80px;">&nbsp;&nbsp;{{$art_proof->orderitem->product->product_id}}
@else
<img src="{{$base_url}}/files/assets/images/product.png" style="display: inline-block;width: 80px;height:80px;">
@endif

@else
<img src="{{$base_url}}/files/assets/images/product.png" style="display: inline-block;width: 80px;height:80px;">
@endif



</div>
<div class="col-3 text-center">

@if($art_proof->orderitem!="")
@if($art_proof->orderitem->product!="")
@if($art_proof->orderitem->product->product_translation!="")

<p class="mt-3">
{{$art_proof->orderitem->product->product_translation->product_name}}
</p>
@endif
@endif
@endif
</div>
<div class="col-3 text-center">
<p class="mt-3"><a class="a_proof_color" href="{{$base_url}}/storage/app/{{$art_proof->path}}" target="_blank"><i class="fas fa-file-pdf"></i>&nbsp;&nbsp;View Atr Proof</a></p>
</div>
<div class="col-3 text-right art_proof_div">
<p class="mt-3 art_proof_para"><a class="a_proof_color art_proof_download_link" href="{{$base_url}}/downloadArtProof?link={{$art_proof->path}}" art_proof_link="{{$base_url}}/storage/app/">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
</div>
</div>
<!-- row end -->





<div class="border-pending-art-proofs"></div>

<div class="row note">
<div class="col-12">
<p>Note from Art Department : <b>Proof</b></p>
</div>
<div class="col-12 mt-2">
<textarea class="art_proof_text_area_{{$art_proof->id}}" placeholder="Write yor comment for the Art Department" style="width: 100%; border-radius: 5px;border-color: #CCCCCC; padding:10px 0px 0px 10px;" rows="4"></textarea>

<!-- @if($art_proof->note!="")
<div style="width: 100%; border-radius: 5px;border-color: #CCCCCC; padding:10px 0px 0px 10px;border: 1px solid #CCCCCC;">
<?php echo $art_proof->note; ?>

</div>
@endif -->

</div>
<div class="col-12 mt-1 d-inline-flex">
<input type="checkbox" class="terms_conditions_art_proof_checkbox_{{$art_proof->id}}" style="width: 25px; height: 25px;">&nbsp;&nbsp;<span style="margin-top:5px;">I agree to the terms and conditions of <a href="javascript:void(0);" class="a_proof_color" data-toggle="modal" data-target="#ArtProofTermsAndConditions">Art Approval</a></span>





</div>

<div class="col-12 mt-2 art-proof-save">
<button class="approved_button" art_proof_id="{{$art_proof->id}}">Approved</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="decline_button" art_proof_id="{{$art_proof->id}}">Decline</button>
</div>

</div>
</div>
<!-- Pending Art Proofs Menu Content end -->

@endforeach

@else

<style type="text/css">
.empty_art_proofs{
margin-top: 200px;
}
</style>
<div class="row">
<div class="col-12 text-center empty_art_proofs">
<h4>No Art Proof Available</h4>
</div>
</div>
@endif		


<!-- Pending Art Proofs Menu Content start -->
<!-- <div class="pending-art-proofs-menu-content pb-5">

<div class="row">
<div class="col-6">
<p><b>Order Number : #51178</b></p>
</div>
<div class="col-6 text-right">
<p>25/10/2021 12:46 PM</p>
</div>
</div>

<div class="border-pending-art-proofs"></div>

<div class="row">
<div class="col-3 text-center">
<b>Product Number </b>
</div>

<div class="col-3 text-center">
<b>Product Name</b>

</div>
<div class="col-3 text-center">
<b>View</b>

</div>
<div class="col-3 text-right">
<b>Download PDF <br> Viewer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
</div>
</div>

<div class="border-pending-art-proofs"></div>

<div class="row">
<div class="col-3">
<img src="{{$base_url}}/files/assets/images/product.png" style="display: inline-block;width: 80px;height:80px;">&nbsp;&nbsp;#62555
</div>
<div class="col-3 text-center">
<p class="mt-3">Silicone Earbud Case With Carabiner</p>
</div>
<div class="col-3 text-center">
<p class="mt-3"><a class="a_proof_color" href="javascript:void(0);"><i class="fas fa-file-pdf"></i>&nbsp;&nbsp;View Atr Proof</a></p>
</div>
<div class="col-3 text-right">
<p class="mt-3"><a class="a_proof_color" href="javascript:void(0);">Download <i class="fa fa-download" aria-hidden="true"></i></a></p>
</div>
</div>

<div class="border-pending-art-proofs"></div>
<div class="row">
<div class="col-12">
<p>Note from Art Department : <b>Proof</b></p>
</div>
<div class="col-12 mt-2">
<textarea placeholder="Write yor comment for the Art Department" style="width: 100%; border-radius: 5px;border-color: #CCCCCC; padding:10px 0px 0px 10px;" rows="4"></textarea>
</div>
<div class="col-12 mt-1">
<input type="checkbox" name="" style="width: 17px; height: 17px;">&nbsp;&nbsp;I agree to the terms and conditions of <a href="javascript:void(0);" class="a_proof_color">Art Approval</a>
</div>

<div class="col-12 mt-2">
<button class="approved_button">Approved</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button class="decline_button">Decline</button>
</div>
</div>
</div> -->
<!-- Pending Art Proofs Menu Content end -->

</div>
</div>



<!-- --------------------------------------------------Start of Address Tab-pane---------------------------------------------- -->

<div class="tab-pane fade" id="address_book" role="tabpanel">

<div class="addresses-content">



<!--  All Bill address Content Start -->
<div class="row">

<!-- ------------------------------------------------ Start of Billing Address ----------------------------------------- -->
<div class="address col-md-6"><!-- append -->



<div id="bill-address-append">

<div class="d-flex mb-2">
<h4 class="text-dark heading-bill-address mb-0">Billing address</h4>
</div>

<!-- <button class="add_new_address">Add New Address</button> -->

<style type="text/css">

button.btn_add_new_billing_address{
margin-left: -15px !important;
}

</style>

<div class="col-md-8 address-parent">
<button class="btn-address btn_add_new_billing_address add-new-add" >Add New Address</button>
</div>



<!-- ------------------------------------- Edit billing address start ------------------------------------------- -->

<div class="row pt-3 pb-5 select-billling-address hidden" id="updated-billing-address">

<div class="col-md-12 edit-billing-address">
<span class="add-add pb-3 ml-0">Edit Billng Address</span>
<p class="ml-0">Starred(*) Fields are required.</p>
<div class="row  pt-3 pl-4">
<div class="account-content">
<form class="form-content" >

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

<div class="form-group form-check">

<input type="checkbox" class="check-radio form-check-input united-state-bill-edit edit-bill-addr-united-checkbox-address-book" id="united-state-bill-edit" checked="">
<label class="form-check-label check-checkout ml-3" for="united-state-bill-edit">United States</label>

<input type="checkbox" class="check-radio ml-2 form-check-input canada-bill-edit edit-bill-addr-canada-checkbox-address-book" id="canada-bill-edit">&nbsp;&nbsp;
<label class="ml-4 form-check-label check-checkout" for="canada-bill-edit">Canada</label>

</div>
</div>




<input type="hidden" class="form-control txt-lbl" placeholder="David" id="add-id-bill" name="add-id-bill" value=" ">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" placeholder="" id="fname-bill-edit" name="fname-bill-edit" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="lname-bill-edit" placeholder="" name="lname-bill-edit" required="">
</div>
</div>
</div>



<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="companyname-bill-edit" name="companyname-bill-edit" placeholder="" >
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="add1-bill-edit" name="add1-bill-edit" placeholder="" required="">
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="add2-bill-edit" name="add2-bill-edit" placeholder="" >
</div>



<div class="row">     
<div class="col">
<!-- <div class="select-custom"> -->


<label class="form-lbl">City<span class="required">*</span></label>



<input placeholder=""  name="city-bill-edit" list="city_name_bill_edit"  id="city-bill-edit" class="form-control txt-lbl">
<datalist id="city_name_bill_edit">
@if($data['Allcity']!="[]")
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_name}}">

@endforeach
@endif
</datalist>



<!-- </div> -->
</div>


<div class="col">
<!-- <div class="select-custom"> -->
<label class="form-lbl edit_bill_addr_state_label">State<span class="required">*</span></label>
<label class="form-lbl edit_bill_addr_province_label hidden">Province<span class="required">*</span></label>
<select name="state-bill-edit" id="state-bill-edit" class="form-control txt-lbl" required="">
<option value="" selected="selected">Select State</option>
@foreach($data['Allstates'] as $state)
<option value="{{$state->state_id}}">{{$state->state_name}}</option>
@endforeach
</select>
<!-- </div> -->
</div>


<div class="col">
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl edit_bill_address_zip_code_label">Zip Code<span class="required">*</span></label>
<label for="acc-text" class="form-lbl hidden edit_bill_address_postal_code_label">Postal Code<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="zipcode-bill-edit" name="zipcode-bill-edit" placeholder="" required="">
</div>                                         
</div>

</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
<input type="number" class="form-control txt-lbl" placeholder="" id="tel-bill-edit" name="tel-bill-edit" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="ext-bill-edit" placeholder="" name="ext-bill-edit" >
</div>
</div>

</div>  



<!-- <div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="fax-bill-edit" name="fax-bill-edit" placeholder="Fax" >
</div> -->


<!--                                     <div class="form-group form-check">
<input type="checkbox" class="form-check-input default-ship-addn" id="default-ship-addn">
<label class="form-check-label check-checkout" for="default-ship-addn">Make this my default shipping address</label>
</div> -->


<div class="row">
<div class="col bill-edit-address">
<button type="button" class="btn-save-changes">Save Change</button>   
</div>
<div class="col bill-edit-cancel">
<button type="button" class="btn-cancel">Cancel</button>  
</div>
</div>
</form>
</div>
</div>
</div> 

</div>

<!-- ----------------------------------------- Edit billing Address address end --------------------------------- -->



<!-- ---------------------------------------- add new billing address start --------------------------------- -->

<div class="row billing-address hidden pt-3">

<div class="col-md-12">
<span class="add-add pb-3">Add a New Billng Address</span>
<p>Starred(*) Fields are required.</p>
<div class="row  pt-3 pl-3">
<div class="account-content">
<form id="addnewbillingaddressform">

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

<div class="form-group form-check">

<input type="checkbox" class="check-radio form-check-input united-state-bill add-new-united-bill-checkbox-address-book" id="united-state-bill" checked="">&nbsp;&nbsp;
<label class="form-check-label check-checkout mr-5" for="united-state-bill">United States</label>

<input type="checkbox" class="check-radio form-check-input canada-bill add-new-canada-bill-checkbox-address-book" id="canada-bill">&nbsp;&nbsp;
<label class="form-check-label check-checkout" for="canada-bill">Canada</label>

</div>
</div>




<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" placeholder="" id="fname-bill" name="fname-bill" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="lname-bill" placeholder="" name="lname-bill" required="">
</div>
</div>
</div>



<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="companyname-bill" name="companyname-bill" placeholder="" >
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="add1-bill" name="add1-bill" placeholder="" required="">
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="add2-bill" name="add2-bill" placeholder="" >
</div>



<div class="row">     
<div class="col">

<label class="form-lbl">City<span class="required">*</span></label>

<input placeholder=""  name="city-bill" list="cityname"  id="city-bill" class="form-control txt-lbl">
<datalist id="cityname">
@if($data['Allcity']!="[]")
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_name}}">

@endforeach
@endif
</datalist>

</div>




<div class="col">
<!-- <div class="select-custom"> -->
<label class="form-lbl select_state_label_add_bill_address">State<span class="required">*</span></label>
<label class="form-lbl hidden select_province_label_add_bill_address">Province<span class="required">*</span></label>

<select name="state-bill" id="state-bill" class="form-control txt-lbl" required="">
<!-- <option value="" selected="selected"> Select State </option> -->

@foreach($data['Allstates'] as $state)
<option value="{{$state->state_id}}">{{$state->state_name}}</option>
@endforeach
</select>
<!-- </div> -->
</div>


<div class="col">
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl zip_code_label_add_bill_address">Zip Code<span class="required">*</span></label>
<label for="acc-text" class="form-lbl postal_code_label_add_bill_address hidden">PostalCode<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="zip-code-bill" name="zip-code-bill" placeholder="" required="">
</div>                                         
</div>

</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
<input type="number" class="form-control txt-lbl" placeholder="" id="tel-bill" name="tel-bill" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="ext-bill" placeholder="" name="ext-bill" >
</div>
</div>

</div>  



<!-- <div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="fax-bill" name="faxn-bill" placeholder="Fax" >
</div>
-->

<!--                                     <div class="form-group form-check">
<input type="checkbox" class="form-check-input default-ship-addn" id="default-ship-addn">
<label class="form-check-label check-checkout" for="default-ship-addn">Make this my default shipping address</label>
</div> -->


<div class="row">
<div class="col bill-ad-new">
<button type="button" class="btn-save-changes">Save Change</button>   
</div>
<div class="col bill-add-cancel">
<button type="button" class="btn-cancel cancel_new_billing_address">Cancel</button>  
</div>
</div>
</form>
</div>
</div>
</div> 
</div>

<!-- ----------------------------------------- add new billing address end ------------------------------------ -->


@if($billing_addresses!="[]")
@foreach($billing_addresses as $address)
<!-- bill start -->
<div class="row billing_address_row" style="margin-top: 15px;" id="append_edit_billing_address_{{$address->address_id}}">
<div class="col-md-12" id="delete_billing_address_content_{{$address->address_id}}">
<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
<div class="row">
<!-- <div class="col-md-1">
<input type="checkbox" name="" style="width: 25px; height: 25px;">
</div> -->
<div class="col-md-11">
<p class="text-font-weight-500">{{$address->name}}</p>
<p>{{$address->address}}</p>
<p>Phone Number :  {{$address->telephone}}</p>
<p class="mb-2">
<a class="a_proof_color" href="javascript:void(0);">
Add Delivery Instructions
</a>
</p>
<p class="edit_address_para">
<a class="a_proof_color edit_bill_address" href="javascript:void(0);" id="{{$address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <a class="a_proof_color" class="a_proof_color" href="javascript:void(0);">Make Default</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
<a class="a_proof_color remove_bill_address" href="javascript:void(0);" address_id="{{$address->address_id}}">Remove</a>
</p>
</div>
</div>
</div>
</div>
</div>
<!-- bill end -->
@endforeach
@endif

<div class="div-bill-address-append" id="div-bill-address-append">

</div>



<!-- bill start -->
<!-- <div class="row" style="margin-top: 15px;">
<div class="col-md-12">
<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
<div class="row">
<div class="col-md-1">
<input type="checkbox" name="" style="width: 20px; height: 20px;">
</div>
<div class="col-md-11">
<p><b>Superior Promos Inc.</b></p>
<p>12-45 River Road Fair Lawn, NJ07410, United State</p>
<p>Phone Number : 1-888-544-2534</p>
<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
<p><a class="a_proof_color" href="javascript:void(0);">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="a_proof_color" class="a_proof_color" href="javascript:void(0);">Make Default</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="a_proof_color" href="javascript:void(0);">Remove</a></p>
</div>
</div>
</div>
</div>
</div> -->
<!-- bill end -->
</div>
</div>


<!-- ---------------------------------------------- End of Billing Address -------------------------------------------- -->

<!-- -----------------------------------------------Start of Shipping Address ----------------------------------------  -->

<div class="address col-md-6 mt-5 mt-md-0">

<div id="shipp-address-append">

<div class="d-flex mb-2">
<h4 class="text-dark mb-0">
Shipping address
</h4>
</div>

<style type="text/css">
button.btn_add_new_shipping_address{
margin-left: -15px !important;
}
</style>

<div class="col-md-8 address-parent">
<button class="btn_add_new_shipping_address">Add New Address</button>
</div>


<!-- Edit Shipping Address Start -->

<!-- ------------------------------------------ Add New Address Start ---------------------------------- -->

<div class="row hidden add-new-shipping-address pt-3">
<div class="col-md-12">
<span class="add-add pb-3">Add a New Address</span>
<p>Starred(*) Fields are required.</p>
<div class="row  pt-3 pl-4">
<div class="account-content">
<form id="addnewaddressform">

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

<div class="form-group form-check">

<input type="checkbox" class="check-radio form-check-input united-staten add-new-shipp-addr-united-checkbox-address-book" id="united-staten" checked="">&nbsp;
<label class="form-check-label check-checkout mr-2" for="united-staten">United States</label>
&nbsp;&nbsp;
&nbsp;&nbsp;
<input type="checkbox" class="check-radio form-check-input canadan add-new-shipp-addr-canada-checkbox-address-book" id="canadan">&nbsp;
<label class="form-check-label check-checkout" for="canadan">Canada</label>

</div>
</div>




<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" placeholder="" id="fname" name="fname" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="lname" placeholder="" name="lname" required="">
</div>
</div>
</div>



<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="companyname" name="companyname" placeholder="" >
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="add1" name="add1" placeholder="" required="">
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="add2" name="add2" placeholder="" >
</div>



<div class="row">     
<div class="col">
<!-- <div class="select-custom"> -->
<label class="form-lbl">City<span class="required">*</span></label>


<input placeholder=""  name="cityn" list="city_name_shipp_add"  id="cityn" class="form-control txt-lbl">
<datalist id="city_name_shipp_add">
@if($data['Allcity']!="[]")
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_name}}">

@endforeach
@endif
</datalist>

<!-- <select name="cityn" id="cityn" class="form-control txt-lbl"  required=" ">
<option value="" selected="selected">
select City
</option>
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_id}}">{{$city->city_name}}</option>
@endforeach
</select> -->
<!-- </div> -->
</div>


<div class="col">
<div class="select-custom">
<label class="form-lbl add_shipp_state_label_address_book">State<span class="required">*</span></label>
<label class="form-lbl hidden add_shipp_province_label_address_book"> Province <span class="required">*</span></label>
<select name="staten" id="staten" class="form-control txt-lbl" required="">
<option value="" selected="selected">Selecte State
</option>
@foreach($data['Allstates'] as $state)
<option value="{{$state->state_id}}">{{$state->state_name}}</option>
@endforeach
</select>
</div>
</div>


<div class="col">
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl add_shipp_zipcode_label_address_book">Zip Code<span class="required">*</span></label>
<label for="acc-text" class="form-lbl hidden add_shipp_postalcode_label_address_book">Postal Code<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="zip-coden" name="zip-coden" placeholder="" required="">
</div>                                         
</div>

</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
<input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="teln" name="" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="extn" placeholder="" name="extn" >
</div>
</div>

</div>  



<!-- <div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="faxn" name="faxn" placeholder="Fax" >
</div> -->


<div class="form-group form-check">
<input type="checkbox" class="form-check-input default-ship-addn" id="default-ship-addn">
<label class="form-check-label check-checkout" for="default-ship-addn">&nbsp;&nbsp;&nbsp;Make this my default shipping address</label>
</div>


<div class="row">
<div class="col edit-ad-new">
<button type="button" class="btn-save-changes">Save Change</button>   
</div>
<div class="col new-add-cancel">
<button type="button" class="btn-cancel btn_shipping_address_cancel">Cancel</button>  
</div>
</div>
</form>
</div>
</div>
</div> 
</div>

<!-- ------------------------------------- Add New Address End --------------------------------------------- -->



<!-- -------------------------------------- edit shipping part address part -------------------------------  -->
<div class="row pt-3 pb-3 edit-address-main" id="edit-address-main">

<div class="col-md-12 s-edit-address">
<span class="add-add pb-3 ml-0">Edit Address</span>
<p class="ml-0">Starred(*) Fields are required.</p>
<div class="row  pt-3 pl-4">
<div class="account-content">
<form>
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
<div class="form-group form-check">

<input type="checkbox" class="check-radio form-check-input united-state edit-shipp-address-united-checkbox-address-book" id="united-state" checked="">
<label class=" ml-3 form-check-label check-checkout" for="united-state">United States</label>

<input type="checkbox" class="check-radio ml-2 form-check-input canada edit-shipp-address-canada-checkbox-address-book" id="canada">
<label class="ml-5 form-check-label check-checkout" for="canada">Canada</label>

</div>
</div>

<input type="hidden" class="form-control txt-lbl" placeholder="David" id="add-id" name="add-id" value="">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" placeholder="" id="f-name" name="f-name" required="" value="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="l-name" placeholder="" name="l-name" required="" value="">
</div>
</div>
</div>



<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="company-name" name="company-name" placeholder="" value="">
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="add-1" name="add-1" placeholder="" required=""
value="">
</div>

<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="add-2" name="add-2" placeholder="" value="" >
</div>



<div class="row">     
<div class="col">
<!-- <div class="select-custom"> -->


<label class="form-lbl">City<span class="required">*</span></label>

<input placeholder=""  name="city" list="city_shipp_address_edit"  id="city" class="form-control txt-lbl">
<datalist id="city_shipp_address_edit">
@if($data['Allcity']!="[]")
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_name}}">

@endforeach
@endif
</datalist>




<!-- <select name="city" id="city" class="form-control txt-lbl"  required=" ">
<option value="" selected="selected">
select City
</option>
@foreach($data['Allcity'] as $city)
<option value="{{$city->city_id}}">{{$city->city_name}}</option>
@endforeach
</select> -->


<!-- </div> -->
</div>

<div class="col">
<div class="select-custom">
<label class="form-lbl select_edit_shipp_addr_state_label_add_book">State<span class="required">*</span></label>
<label class="form-lbl hidden select_edit_shipp_addr_province_label_add_book">Province<span class="required">*</span></label>
<select name="state" id="state" class="form-control txt-lbl" required="">
<option value="" selected="selected">Select State
</option>
@foreach($data['Allstates'] as $state)
<option value="{{$state->state_id}}">{{$state->state_name}}</option>
@endforeach
</select>
</div>
</div>


<div class="col">
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl edit_shipp_addr_zip_code_label">Zip Code<span class="required">*</span></label>
<label for="acc-text" class="form-lbl hidden edit_shipp_addr_postal_code_label">Postal Code<span class="required">*</span></label>
<input type="text" class="form-control txt-lbl" id="zip-code" name="zip-code" placeholder="" required=""
value="">   
</div>                                         
</div>

</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
<input type="number" class="form-control txt-lbl" placeholder="" id="tel" name="tel" required="" value="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="ext" placeholder="" name="ext" value="">
</div>
</div>
</div>

<!-- 
<div class="form-group mb-2">
<label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
<input type="text" class="form-control txt-lbl" id="fax" name="fax" placeholder="Fax" value="" >
</div> 
-->


<div class="form-group form-check">
<input type="checkbox" class="form-check-input default-ship-add" id="default-ship-add">
<label class="form-check-label check-checkout" for="default-ship-add">&nbsp;&nbsp;&nbsp;Make this my default shipping address</label>
</div>


<div class="row">
<div class="col edit-ad-check">
<button type="button" class="btn-save-changes">Save Change</button>   
</div>
<div class="col edit-add-cancel">
<button type="button" class="btn-cancel">Cancel</button>  
</div>
</div>

</form>
</div>
</div>
</div>
</div>

<!-- ------------------------------------------ Edit Shipping Address End ----------------------------- -->
@if($user_address!="")
<!-- bill start -->
<div class="make_default_div_add " id="make_default_div_add">
<div class="row make_default_div_add_child" style="margin-top: 15px;" id="append_edit_shipping_address_{{$user_address->address_id}}" address_id="{{$user_address->address_id}}">
<div class="col-md-12" id="delete_shipping_address_content_{{$user_address->address_id}}">
<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
<div class="row">
<!-- <div class="col-md-1">
<input type="checkbox" name="" style="width: 25px; height: 25px;">
</div> -->

<div class="col-md-11">
<p><b>{{$user_address->name}}</b></p>
<p>{{$user_address->address}}</p>
<p>Phone Number :  {{$user_address->telephone}}</p>
<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
<p class="edit_address_para d-inline-block">
<a class="a_proof_color edit_shipp_address d-inline-block" href="javascript:void(0);" id="{{$user_address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;

<div class="make_and_unmake_div_{{$user_address->address_id}} d-inline-block">

@if($user_address->is_shipping=="0")

<a class="a_proof_color make_default_shipping_address make_default_shipping_address_{{$user_address->address_id}} " href="javascript:void(0);" id="" address_id="{{$user_address->address_id}}" >Make Default</a>

@else

<a class="a_proof_color default_value default_value_{{$user_address->address_id}}" href="javascript:void(0);" address_id="{{$user_address->address_id}}">Default</a>

@endif

</div>




&nbsp;&nbsp;&nbsp;&nbsp;
<a class="a_proof_color remove_shipping_address d-inline-block" href="javascript:void(0);" address_id="{{$user_address->address_id}}">Remove</a>
</p>
</div>



</div>
</div>
</div>
</div>
</div>
<!-- bill end -->
@endif



@if($shipping_addresses!="[]")
@foreach($shipping_addresses as $address)
<!-- bill start -->
@php 
if($user_address!=""){
$user_address_id = $user_address->address_id;
}else{
$user_address_id = "";
}
@endphp
@if($user_address_id!=$address->address_id)

<div class="row shipping-address-show" style="margin-top: 15px;" id="append_edit_shipping_address_{{$address->address_id}}">
<div class="col-md-12" id="delete_shipping_address_content_{{$address->address_id}}">
<div class="p-3" style="border: 1px solid #CCCCCC;border-radius: 5px;">
<div class="row">
<!-- <div class="col-md-1">
<input type="checkbox" name="" style="width: 25px; height: 25px;">
</div> -->
<div class="col-md-11">
<p><b>{{$address->name}}</b></p>
<p>{{$address->address}}</p>
<p>Phone Number :  {{$address->telephone}}</p>
<p class="mb-2"><a class="a_proof_color" href="javascript:void(0);">Add Delivery Instructions</a></p>
<p class="edit_address_para d-inline-block">
<a class="a_proof_color edit_shipp_address d-inline-block" href="javascript:void(0);" id="{{$address}}">Edit Address</a>&nbsp;&nbsp;&nbsp;&nbsp;


<!-- @if($address->is_shipping=="0")
<a class="a_proof_color make_default_shipping_address" href="javascript:void(0);" address_id="{{$address->address_id}}">Make Default</a>
@else
<a class="a_proof_color" href="javascript:void(0);">Default</a>
@endif -->


<div class="make_and_unmake_div_{{$address->address_id}} d-inline-block">

@if($address->is_shipping=="0")

<a class="a_proof_color make_default_shipping_address make_default_shipping_address_{{$address->address_id}} " href="javascript:void(0);" id="" address_id="{{$address->address_id}}" >Make Default</a>

@else

<a class="a_proof_color default_value default_value_{{$address->address_id}}" href="javascript:void(0);" address_id="{{$address->address_id}}">Default</a>

@endif

</div>




&nbsp;&nbsp;&nbsp;&nbsp;
<a class="a_proof_color remove_shipping_address" href="javascript:void(0);" address_id="{{$address->address_id}}">Remove</a>
</p>
</div>
</div>
</div>
</div>
</div>

@endif
<!-- bill end -->
@endforeach
@endif


<div class="div-ship-append" id="div-ship-append"></div>



</div>
</div>

<!-- -------------------------------------End of Shipping Address -------------------------- -->



</div>
</div>
</div><!-- End .tab-pane -->

<!-- -----------------------------------------------------------End of Address tab-pane----------------------------------- -->



<div class="tab-pane fade" id="billing" role="tabpanel">
<div class="address account-content mt-0 pt-2">
<h4 class="title">Billing address</h4>

<form class="mb-2" action="#">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>First name <span class="required">*</span></label>
<input type="text" class="form-control" required="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Last name <span class="required">*</span></label>
<input type="text" class="form-control" required="">
</div>
</div>
</div>

<div class="form-group">
<label>Company </label>
<input type="text" class="form-control">
</div>

<div class="select-custom">
<label>Country / Region <span class="required">*</span></label>
<select name="orderby" class="form-control">
<option value="" selected="selected">British Indian Ocean Territory
</option>
<option value="1">Brunei</option>
<option value="2">Bulgaria</option>
<option value="3">Burkina Faso</option>
<option value="4">Burundi</option>
<option value="5">Cameroon</option>
</select>
</div>

<div class="form-group">
<label>Street address<span class="required">*</span></label>
<input type="text" class="form-control" placeholder="House number and street name" required="">
<input type="text" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" required="">
</div>

<div class="form-group">
<label>Town / City <span class="required">*</span></label>
<input type="text" class="form-control" required="">
</div>

<div class="form-group">
<label>State / Country <span class="required">*</span></label>
<input type="text" class="form-control" required="">
</div>

<div class="form-group">
<label>Postcode / ZIP <span class="required">*</span></label>
<input type="text" class="form-control" required="">
</div>

<div class="form-group mb-3">
<label>Phone <span class="required">*</span></label>
<input type="number" class="form-control" required="">
</div>

<div class="form-group mb-3">
<label>Email address <span class="required">*</span></label>
<input type="email" class="form-control" placeholder="editor@gmail.com" required="">
</div>

<div class="form-footer mb-0">
<div class="form-footer-right">
<button type="submit" class="btn btn-dark py-4">
Save Address
</button>
</div>
</div>
</form>
</div>
</div><!-- End .tab-pane -->













</div><!-- End .tab-content -->
</div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- margin -->


</main><!-- End .main -->



<script type="text/javascript">
$(document).ready(function(){
$('.contact-information').hide();
$('.edit-email-address').hide();
$('.change-password').hide();

$('.edit_contact_information').on('click',function(){
$(this).addClass('bg-color-68BEE5').addClass('color-fff');
$('.edit_email_address').removeClass('bg-color-68BEE5').removeClass('color-fff');
$('.edit_password').removeClass('bg-color-68BEE5').removeClass('color-fff');
$('.contact-information').show();
$('.edit-email-address').hide();
$('.change-password').hide();
});

$('.edit_email_address').on('click',function(){
$(this).addClass('bg-color-68BEE5').addClass('color-fff');
$('.edit_contact_information').removeClass('bg-color-68BEE5').removeClass('color-fff');
$('.edit_password').removeClass('bg-color-68BEE5').removeClass('color-fff');
$('.contact-information').hide();
$('.edit-email-address').show();
$('.change-password').hide();
});

$('.edit_password').on('click',function(){
$(this).addClass('bg-color-68BEE5').addClass('color-fff');
$('.edit_contact_information').removeClass('bg-color-68BEE5').removeClass('color-fff');
$('.edit_email_address').removeClass('bg-color-68BEE5').removeClass('color-fff');	
$('.contact-information').hide();
$('.edit-email-address').hide();
$('.change-password').show();
});


});
</script>

<script type="text/javascript">

$(function(){
$(".datepicker").datepicker();
// $('.datepicker').parents('.reorder_append_items').datepicker();
});

</script>

<script type="text/javascript">

$(document).ready(function(){
$('.view-order-details-row').hide();
$('#full-order-history-content').on('click','.btn-view-order-detail',function(){
var order_item_id = $(this).attr('order_item_id');

$('.view-order-details-row-'+order_item_id).show();
$('.order-history-content-'+order_item_id).hide();
});

$('#full-order-history-content').on('click','.view-order-detail-btn-close',function(){
var order_item_id = $(this).attr('order_item_id');
$('.view-order-details-row-'+order_item_id).hide();
$('.order-history-content-'+order_item_id).show();
});

});


$(document).ready(function(){
$('#full-order-history-content').on('click','.rate-click',function(){

var rate_value=$(this).attr('value');
var order_item_id = $(this).attr('order_item_id');
$('#rating-'+order_item_id).val(rate_value);
var final_value=$('#rating-'+order_item_id).val();
});
});




// for save review
$(document).ready(function(){
$('#full-order-history-content').on('click','.add-review',function(){

var order_item_id = $(this).attr('order_item_id');
var rating=$('#rating-'+order_item_id).val();
var description=$('#note-editable-'+order_item_id).val();
var product_id=$('#rating-'+order_item_id).attr("product_id");

if(order_item_id!=""&&product_id!=""&&rating!=""&&description!=""){
$.ajax({
url:"{{$base_url}}/product/review",
type:'POST',
data:{'order_item_id':order_item_id,'product_id':product_id,'rating':rating,'description':description,_token:'{{csrf_token()}}'},
    success: function(data)
    {                                                            
        $.notify('Product Review Added Successfully....','success');
		$('.write-review-details-row-'+order_item_id).addClass('hidden');
		$('.view-art-proofs-row-'+order_item_id).addClass('hidden');
		$('.order-history-content-'+order_item_id).removeClass('hidden');

    },
error: function (xhr, textStatus, errorThrown) {
}
});
}else{

/*		$('.write-review-details-row-'+order_item_id).addClass('hidden');
		$('.view-art-proofs-row-'+order_item_id).addClass('hidden');
		$('.order-history-content-'+order_item_id).removeClass('hidden');*/
        $.notify('Please enter all values','error');
}

});
});



</script>




<script type="text/javascript">
$('#full-order-history-content').on("click","button.btn-write-review",function(){
var order_item_id = $(this).attr('order_item_id');
$('.write-review-details-row-'+order_item_id).removeClass('hidden');
$('.order-history-content-'+order_item_id).addClass('hidden');
$('.view-art-proofs-row-'+order_item_id).addClass('hidden');

});

$('#full-order-history-content').on("click","button.review-close-btn",function(){
var order_item_id = $(this).attr('order_item_id');
$('.write-review-details-row-'+order_item_id).addClass('hidden');
$('.view-art-proofs-row-'+order_item_id).addClass('hidden');
$('.order-history-content-'+order_item_id).removeClass('hidden');
});	
</script>



<script type="text/javascript">
//add new address billing 
$(document).ready(function(){
$('.address-parent').on('click','button.btn_add_new_billing_address',function(event){
// $('.old-add').addClass("hidden");
$('.billing-address').removeClass("hidden");
$('#updated-billing-address').addClass('hidden');

});
});


//add new address billing cancel
$(document).ready(function(){
$('.bill-add-cancel').on('click','.cancel_new_billing_address',function(event){
$('.billing-address').addClass("hidden");
// $('.old-add').removeClass("hidden");
});
});




//add new shipping address  
$(document).ready(function(){
$('.address-parent').on('click','button.btn_add_new_shipping_address',function(event){

// $('.old-add').addClass("hidden");
$('.add-new-shipping-address').removeClass("hidden");
$('#edit-address-main').addClass('hidden');
});
});


//add new address Shipping cancel
$(document).ready(function(){
$('.new-add-cancel').on('click','.btn_shipping_address_cancel',function(event){
$('.add-new-shipping-address').addClass("hidden");
// $('.old-add').removeClass("hidden");
});
});


</script>

<script type="text/javascript">


//save billing address ===========================================================
$(document).ready(function(){
$(".bill-ad-new").on('click','button.btn-save-changes', function(event){ 
var UnitedStates=$('.united-state-bill').is(':checked');
var Canada=$('.canada-bill').is(':checked');
if(UnitedStates==true){
var Country=190;
}else
{
var Country=35;
}

var fname=$('#fname-bill').val();
var lname=$('#lname-bill').val();
var companyname=$('#companyname-bill').val();
var add1=$('#add1-bill').val();
var add2=$('#add2-bill').val();
var city=$('#city-bill').val();
var state=$('#state-bill').val();
var zipcode=$('#zip-code-bill').val();
var telephone=$('#tel-bill').val();
var ext=$('#ext-bill').val();
// var fax=$('#fax-bill').val();


form_data = new FormData();
form_data.append('Country',Country);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append( "_token", "{{ csrf_token() }}");


$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/bill-address/add",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){
document.getElementById("div-bill-address-append").innerHTML=data.data.data;        
$(".billing-address").addClass("hidden");
},

error: function(data){
}           
});

}
else{     
alert("Please enter all mandetory fileds!!!!");
}

});
});

//======================================================================

//add new shipping address save data   
$(document).ready(function(){
$(".edit-ad-new").on('click','button.btn-save-changes', function(event){
var UnitedStates=$('.united-staten').is(':checked');
var Canada=$('.canadan').is(':checked');
if(UnitedStates==true){
var Country=190;
}else
{
var Country=35;
}

var is_default_add=$('.default-ship-addn').is(':checked');  

var fname=$('#fname').val();
var lname=$('#lname').val();
var companyname=$('#companyname').val();
var add1=$('#add1').val();
var add2=$('#add2').val();
var city=$('#cityn').val();
var state=$('#staten').val();
var zipcode=$('#zip-coden').val();
var telephone=$('#teln').val();
var ext=$('#extn').val();
// var fax=$('#faxn').val();


form_data = new FormData();
form_data.append('Country',Country);
form_data.append('is_default_add',is_default_add);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append( "_token", "{{ csrf_token() }}");

/*for(var pair of form_data.entries()) {
console.log(pair[0]+ ', '+ pair[1]); 
}
*/

$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/shipp-address/add",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,
success: function(data)
{    

console.log(data.data.data.is_default_add);
if(data.data.data.is_default_add==1){
// alert(data.data.data.is_default_add);
var address_id_current = $('.make_default_div_add_child').attr('address_id');
$('#append_edit_shipping_address_'+address_id_current).remove();


document.getElementById("make_default_div_add").innerHTML=data.data.data.sections;
document.getElementById("div-ship-append").innerHTML=data.data.data.sections2;  
}else if(data.data.data.is_default_add==0){
// alert(data.data.data.is_default_add);
document.getElementById("div-ship-append").innerHTML=data.data.data.sections;  
$('.add-new-shipping-address').addClass("hidden");  
}

},

error: function(data){

}           
});

}
else{     
alert("Please enter all mandetory fileds!!!!");
}
});
});



</script>


<script type="text/javascript">
/*for edit address */
$(document).ready(function(){
// $.each(address,function(index,item){    
$('#bill-address-append').on('click','.edit_address_para a.edit_bill_address', function(event){
$('#updated-billing-address').removeClass('hidden');
$('.billing-address').addClass("hidden");
var address=$(this).attr('id');
var address = JSON.parse(address);
var address_id=$('#add-id-bill').val(address.address_id);
var fname=$('#fname-bill-edit').val(address.name);
var lname=$('#lname-bill-edit').val(address.last_name);
var companyname=$('#companyname-bill-edit').val(address.company_name);
var add1=$('#add1-bill-edit').val(address.address);
var add2=$('#add2-bill-edit').val(address.address2);
var zipcode=$('#zipcode-bill-edit').val(address.zip_code);
var telephone=$('#tel-bill-edit').val(address.telephone);
var ext=$('#ext-bill-edit').val(address.ext);
var fax=$('#fax-bill-edit').val(address.fax);
$('.edit-billing-address').removeClass("hidden");
$('#city-bill-edit').val(address.city.default_city_translation.city_name);
// console.log('city bill edit');
// console.log(address.city.default_city_translation.city_name);
// alert('ldfljl');
// $('#city-bill-edit option[value='+address.city_id+']').prop('selected',true);
$('#state-bill-edit option[value='+address.state_id+']').prop('selected',true);
if(address.country_id==190){
$('#united-state-bill-edit').prop('checked',true);
$('#canada-bill-edit').prop('checked',false);

$('.edit_bill_addr_state_label').removeClass('hidden');
$('.edit_bill_addr_province_label').addClass('hidden');

$('.edit_bill_address_zip_code_label').removeClass('hidden');
$('.edit_bill_address_postal_code_label').addClass('hidden');

}else if(address.country_id==35){
$('#canada-bill-edit').prop('checked',true);
$('#united-state-bill-edit').prop('checked',false);

$('.edit_bill_addr_state_label').addClass('hidden');
$('.edit_bill_addr_province_label').removeClass('hidden');

$('.edit_bill_address_zip_code_label').addClass('hidden');
$('.edit_bill_address_postal_code_label').removeClass('hidden');
}
});

$('#shipp-address-append').on('click','.edit_address_para a.edit_shipp_address', function(event){
// alert('string');return false;

//alert("plase edit address and click on save changes !!!!!");
$('#edit-address-main').removeClass('hidden');
$('.add-new-shipping-address').addClass('hidden');
// $('.addresses-content').addClass('hidden');

var address=$(this).attr('id');


var address = JSON.parse(address);
// console.log(address.address_id);

var address_id=$('#add-id').val(address.address_id);
var fname=$('#f-name').val(address.name);
var lname=$('#l-name').val(address.last_name);
var companyname=$('#company-name').val(address.company_name);
var add1=$('#add-1').val(address.address);
var add2=$('#add-2').val(address.address2);
var zipcode=$('#zip-code').val(address.zip_code);
var telephone=$('#tel').val(address.telephone);
var ext=$('#ext').val(address.ext);
var fax=$('#fax').val(address.fax);

// var country = 
if(address.country_id==190){
$('#united-state').prop('checked',true);
$('#canada').prop('checked',false);

$('.select_edit_shipp_addr_state_label_add_book').removeClass('hidden');
$('.select_edit_shipp_addr_province_label_add_book').addClass('hidden');

$('.edit_shipp_addr_zip_code_label').removeClass('hidden');
$('.edit_shipp_addr_postal_code_label').addClass('hidden');
}else if(address.country_id==35){
$('#canada').prop('checked',true);
$('#united-state').prop('checked',false);

$('.select_edit_shipp_addr_state_label_add_book').addClass('hidden');
$('.select_edit_shipp_addr_province_label_add_book').removeClass('hidden');

$('.edit_shipp_addr_zip_code_label').addClass('hidden');
$('.edit_shipp_addr_postal_code_label').removeClass('hidden');
}

$('#city').val(address.city.default_city_translation.city_name);
// $('#city option[value='+address.city_id+']').prop('selected',true);
$('#state option[value='+address.state_id+']').prop('selected',true);

if(address.is_shipping==1){
$('.default-ship-add').prop('checked',true);
}else{
$('.default-ship-add').prop('checked',false);
}

/*$('.s-edit-address').removeClass("hidden");*/

});

$('#shipp-address-append').on('click','.edit_address_para a.remove_shipping_address', function(event){
var address_id = $(this).attr('address_id');

form_data = new FormData();
form_data.append('address_id',address_id);
form_data.append("_token", "{{csrf_token()}}");
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/shipp-address/delete",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){    
if(data!=""){
if(data['success']=="true"){
var address_id = data['address_id'];
$('#append_edit_shipping_address_'+address_id).remove();
alert('Address Remove Successfully');
}else if(data['success']=="false"){
var address_id = data['address_id'];
alert("No Type of Address Available");
}
}	
},
error: function(data){
}           
});
});


$('#shipp-address-append').on('click','.edit_address_para a.make_default_shipping_address', function(event){
var address_id = $(this).attr('address_id');
form_data = new FormData();
form_data.append('address_id',address_id);
form_data.append("_token", "{{csrf_token()}}");
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/shipp-address/make-default",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){
if(data!=""){
var address_id = data.data.data.address_id;
$('#append_edit_shipping_address_'+address_id).remove();
var address_id_current = $('.make_default_div_add_child').attr('address_id');
$('#append_edit_shipping_address_'+address_id_current).remove();
document.getElementById("make_default_div_add").innerHTML=data.data.data.sections;
document.getElementById('div-ship-append').innerHTML=data.data.data.sections2;

}
},
error: function(data){

}           
});
});



$('.edit-add-cancel').on('click','.btn-cancel',function(){
$('#edit-address-main').addClass('hidden');
// $('.addresses-content').removeClass('hidden');
});


});
// }); 

$('#bill-address-append').on('click','.edit_address_para a.remove_bill_address', function(event){
var address_id = $(this).attr('address_id');
form_data = new FormData();
form_data.append('address_id',address_id);
form_data.append( "_token", "{{ csrf_token() }}");

$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/bill-address/delete",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){    

if(data!=""){
if(data['success']=="true"){
var address_id = data['address_id'];
$('#append_edit_billing_address_'+address_id).remove();
alert('Address Remove Successfully');
}else if(data['success']=="false"){
var address_id = data['address_id'];
alert("No Type of Address Available");
}
}

},

error: function(data){

}           
});
});

</script>


<script type="text/javascript">


//Shipping Address Save Start-------------------------------
$(document).ready(function(){
$('.edit-address-main').addClass("hidden");

$("#edit-address-main").on('click','.edit-ad-check button.btn-save-changes', function(event){ 

var UnitedStates=$('.united-state').is(':checked');
var Canada=$('.canada').is(':checked');

if(UnitedStates==true){
var Country=190;
}else{
var Country=35;
}

var is_default_add=$('.default-ship-add').is(':checked');

var address_id=$('#add-id').val(); 
var fname=$('#f-name').val();
var lname=$('#l-name').val();
var companyname=$('#company-name').val();
var add1=$('#add-1').val();
var add2=$('#add-2').val();
var city=$('#city').val();
var state=$('#state').val();
var zipcode=$('#zip-code').val();
var telephone=$('#tel').val();
var ext=$('#ext').val();
// var fax=$('#fax').val();


form_data = new FormData();
form_data.append('Country',Country);
form_data.append('is_default_add',is_default_add); 
form_data.append('address_id',address_id);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append( "_token", "{{ csrf_token() }}");

$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
$.ajax({
method: "POST",
// url: "{{$base_url}}/checkout-edit-address",
url: "{{$base_url}}/my-acc/shipp-address/edit",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data)
{    

if(data.data.data.is_default_add==1){

var default_address_id = $('.default_value').attr('address_id');
if(default_address_id!=""){
$('.make_and_unmake_div_'+default_address_id).html('');
$('.make_and_unmake_div_'+default_address_id).append('<a class="a_proof_color make_default_shipping_address make_default_shipping_address_'+default_address_id+' " href="javascript:void(0);" id="" address_id="'+default_address_id+'" >Make Default</a>');
}





var address_id = data.data.data.address_id;
$('#delete_shipping_address_content_'+address_id).html('');
document.getElementById("delete_shipping_address_content_"+address_id).innerHTML=data.data.data.sections;


}else if(data.data.data.is_default_add==0){
// alert(data.data.data.is_default_add);
var address_id = data.data.data.address_id;
$('#delete_shipping_address_content_'+address_id).html('');
document.getElementById("delete_shipping_address_content_"+address_id).innerHTML=data.data.data.sections;
}





// if(data.data.data.is_default_add==1){
// 		// alert(data.data.data.is_default_add);
// 		var address_id_current = $('.make_default_div_add_child').attr('address_id');
// 		$('#append_edit_shipping_address_'+address_id_current).remove();


// 		document.getElementById("make_default_div_add").innerHTML=data.data.data.sections;
// 		document.getElementById("div-ship-append").innerHTML=data.data.data.sections2;  
// 	}else if(data.data.data.is_default_add==0){
// 		// alert(data.data.data.is_default_add);
// 		document.getElementById("div-ship-append").innerHTML=data.data.data.sections;  
//     	$('.add-new-shipping-address').addClass("hidden");  
// 	}





//Not working =======
//   if(data.data.data.is_default_add==1){
// 	// alert(data.data.data.is_default_add);
// 	var address_id_current = $('.make_default_div_add_child').attr('address_id');
// 	$('#append_edit_shipping_address_'+address_id_current).remove();
// 	document.getElementById("make_default_div_add").innerHTML=data.data.data.sections;
// 	document.getElementById("div-ship-append").innerHTML=data.data.data.sections2;  
// }else if(data.data.data.is_default_add==0){
// 	// alert(data.data.data.is_default_add);
// 	document.getElementById("div-ship-append").innerHTML=data.data.data.sections;  
//    	$('.add-new-shipping-address').addClass("hidden");  
// }

//Not working =======






var address_id=$('#add-id').val(''); 
var fname=$('#f-name').val('');
var lname=$('#l-name').val('');
var companyname=$('#company-name').val('');
var add1=$('#add-1').val('');
var add2=$('#add-2').val('');
var city=$('#city').val('');
var state=$('#state').val('');
var zipcode=$('#zip-code').val('');
var telephone=$('#tel').val('');
var ext=$('#ext').val('');
// var fax=$('#fax').val('');

// document.getElementById("updated-address").innerHTML=data.data.data.address_id;

$('.edit-address-main').addClass("hidden");
// $('.old-add').removeClass("hidden");
},

error: function(data){
}           
});


}
else{

alert("Please enter all mandetory fileds!!!!");
}

});
});
//Shipping Address Save End-------------------------------




//add new address cancel
$(document).ready(function(){
$('#updated-billing-address').on('click','.bill-edit-cancel button.btn-cancel',function(event){
$('.edit-billing-address').addClass("hidden");
});
});





//edit billing address
$(document).ready(function(){
$("#updated-billing-address").on('click','.bill-edit-address button.btn-save-changes', function(event){ 

var UnitedStates=$('.united-state-bill-edit').is(':checked');
var Canada=$('.canada-bill-edit').is(':checked');

if(UnitedStates==true){
var Country=190;
}else
{
var Country=35;
}

var address_id=$('#add-id-bill').val(); 
var fname=$('#fname-bill-edit').val();
var lname=$('#lname-bill-edit').val();
var companyname=$('#companyname-bill-edit').val();
var add1=$('#add1-bill-edit').val();
var add2=$('#add2-bill-edit').val();
var city=$('#city-bill-edit').val();
var state=$('#state-bill-edit').val();
var zipcode=$('#zipcode-bill-edit').val();
var telephone=$('#tel-bill-edit').val();
var ext=$('#ext-bill-edit').val();
// var fax=$('#fax-bill-edit').val();


form_data = new FormData();
form_data.append('Country',Country);
form_data.append('address_id',address_id);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append( "_token", "{{ csrf_token() }}");


$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
$.ajax({
method: "POST",
// url: "{{$base_url}}/checkout/edit/billing/address",
url: "{{$base_url}}/my-acc/bill-address/edit",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,
success: function(data){
var address_id = data.data.data.address_id;
// alert('address_id: '+address_id);
$('#delete_billing_address_content_'+address_id).html('');
document.getElementById("delete_billing_address_content_"+address_id).innerHTML=data.data.data.sections;
var address_id=$('#add-id-bill').val(''); 
var fname=$('#fname-bill-edit').val('');
var lname=$('#lname-bill-edit').val('');
var companyname=$('#companyname-bill-edit').val('');
var add1=$('#add1-bill-edit').val('');
var add2=$('#add2-bill-edit').val('');
var city=$('#city-bill-edit').val('');
var state=$('#state-bill-edit').val('');
var zipcode=$('#zipcode-bill-edit').val('');
var telephone=$('#tel-bill-edit').val('');
var ext=$('#ext-bill-edit').val('');
// var fax=$('#fax-bill-edit').val('');
var empty = "";
$('#updated-billing-address').addClass('hidden');
// $('#city-bill-edit option[value='+empty+']').prop('selected',true);
// $('#state-bill-edit option[value='+empty+']').prop('selected',true);
},

error: function(data){
}           
});

}
else{

alert("Please enter all mandetory fileds!!!!");
}

});
});

</script>


<script type="text/javascript">
$(document).ready(function(){
//Approve the content start --------------------------------------
$('.art-proof-save').on('click','.approved_button',function(){
var art_proof_id = $(this).attr('art_proof_id');


if($('.terms_conditions_art_proof_checkbox_'+art_proof_id).is(':checked')){

}else{
alert('Please Check Terms and Conditions');
return false;
}

var customer_note = $('.art_proof_text_area_'+art_proof_id).val();

// var art_proof_textarea = $('.art_proof_text_area_'+art_proof_id).val();
form_data = new FormData();
form_data.append('art_proof_id',art_proof_id);
form_data.append('customer_note',customer_note);
form_data.append( "_token","{{csrf_token()}}");
$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/art-proof/approved",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){

if(data['success']=='true'){
alert('Approved Success');
$('#order_item_aprv_decl_'+data['art_proof_id']).remove();
}else if(data['success']=="false"){
alert('Art Proof Not Get');
}
},

error: function(data){
}           
});
});
//Approve the content end ------------------------------------------

//Decline the content start ----------------------------------------

$('.art-proof-save').on('click','.decline_button',function(){

var art_proof_id = $(this).attr('art_proof_id');
// if($('.terms_conditions_art_proof_checkbox_'+art_proof_id).is(':checked')){

// }else{
// 	alert('Please Check Terms and Conditions');
// 	return false;
// }

var customer_note = $('.art_proof_text_area_'+art_proof_id).val();
form_data = new FormData();
form_data.append('art_proof_id',art_proof_id);
form_data.append('customer_note',customer_note);
form_data.append( "_token","{{csrf_token()}}");
$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/art-proof/declined",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){

if(data['success']=='true'){
alert('Declined Successfully');
$('#order_item_aprv_decl_'+data['art_proof_id']).remove();
}else if(data['success']=="false"){
alert('Art Proof not available');
}
},

error: function(data){
}           
});
});
//Decline the content end ------------------------------------------



});
</script>



<script type="text/javascript">
$('.wishlist_content').on('click',function(){
var product_id = $(this).attr('id');
$.ajax({
type: 'post',
url:'{{$base_url}}/wishlist/add',
data:{"_token": "{{ csrf_token() }}",'product_id':product_id},
success: function (result){
if(result!=""){

if(result['success']=="true"){

var product_id = result['product_id'];
$('.wishlist_icon_'+product_id).addClass('fill');
$('.wishlist_icon_'+product_id).addClass('fa-heart');

$('.wishlist_icon_'+product_id).removeClass('unfill');
$('.wishlist_icon_'+product_id).removeClass('fa-heart-o');

$('.remove_wishlist_'+product_id).remove('');
$.notify('product added into wishlist successfully','success');

}else if(result['success']=="false"){

var product_id = result['product_id'];
$('.wishlist_icon_'+product_id).removeClass('fill');
$('.wishlist_icon_'+product_id).removeClass('fa-heart');

$('.wishlist_icon_'+product_id).addClass('unfill');
$('.wishlist_icon_'+product_id).addClass('fa-heart-o');


$('.remove_wishlist_'+product_id).remove('');
$.notify('product deleted wishlist','danger');
}


}

},
error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
});
});
</script>


<script type="text/javascript">
$(document).ready(function(){
// $('.order-delivered-by-date').hide();
//No order delivered by no checkbox
$('.reorder_append_items').on('click','.order_delivered_by_No_checkbox',function(){
var order_id = $(this).attr('order_id');
//Yes
$('.order_delivered_by_checkbox_yes_'+order_id).prop('checked',false);
//No
// $('.bill_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
// $('.exactly-same-no-checkbox-'+order_id).prop('checked',false);
// $('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
// $('.same_payment_reorder_checkbox_'+order_id).prop('checked',false);

if($(this).is(':checked')){

$('.order-delivered-by-date-'+order_id).removeClass('hidden');
$('.shipping_address_same_as_before_'+order_id).addClass('hidden');
$('.same-payment-reorder-div-'+order_id).addClass('hidden');
$('.exactly-same-no-'+order_id).addClass('hidden');
$('.billing_address_same_as_before_'+order_id).addClass('hidden');
}else{
$('.order-delivered-by-date').addClass('hidden');	
}
});

//Yes Order delivered by checkbox yes
$('.reorder_append_items').on('click','.order_delivered_by_checkbox_yes',function(){
var order_id = $(this).attr('order_id');

$('.order_delivered_by_No_checkbox_'+order_id).prop('checked',false);
$('.order-delivered-by-date-'+order_id).addClass('hidden');
});
});

</script>

<script type="text/javascript">

$(document).ready(function(){
$('.add_new_addr_shipp_same_as_before').on('click','.btn-save-changes',function(){
// alert('dfj');
});
});
</script>




<script type="text/javascript">
$(document).ready(function(){
// $('.exactly-same-no').hide();
//No Exactly-same-no-checkbox
$('.reorder_append_items').on('click','.exactly-same-no-checkbox',function(){
var order_id = $(this).attr('order_id');

//YES
$('.exactly_same_checkbox_yes_'+order_id).prop('checked',false);
//NO
// $('.bill_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
// $('.order_delivered_by_No_checkbox_'+order_id).prop('checked',false);
// $('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
// $('.same_payment_reorder_checkbox_'+order_id).prop('checked',false);

if($(this).is(':checked')){
$('.exactly-same-no-'+order_id).removeClass('hidden');
$('.order-delivered-by-date-'+order_id).addClass('hidden');
$('.shipping_address_same_as_before_'+order_id).addClass('hidden');
$('.same-payment-reorder-div-'+order_id).addClass('hidden');
$('.billing_address_same_as_before_'+order_id).addClass('hidden');


var product_id = $(this).attr('product_id');

$.ajax({
type: 'post',
url:'{{$base_url}}/my-acc/reorder-request/exactly-same-content-change-no',
data:{"_token": "{{ csrf_token() }}",'product_id':product_id,'order_id':order_id},
success: function(data){
console.log('order_id');
console.log(data.data.data.order_id);
console.log('sections');
console.log(data.data.data.sections);
var order_id = data.data.data.order_id;
// console.log('sections data');
// console.log(data.data.data.sections);
// $('.reorder_append_items')
// $('.pricing_table_quantity_color_imprint_artwork_'+order_id).parents('.reorder_append_items').parents('.reoder-request-content').append(data.data.data.sections);

document.getElementById('pricing_table_quantity_color_imprint_artwork_'+order_id).innerHTML=data.data.data.sections;


// if($('.item_color_going_to_change_no_'+data.data.data.order_id):is(':checked')){
// 	$('.price_box_'+data.data.data.order_id).addClass('hidden');
// }else{
// 	$('.price_box_'+data.data.data.order_id).removeClass('hidden');
// }

},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown);

}
});


}else{
$('.exactly-same-no').addClass('hidden');
}
});

//Yes Exaclty-same-checkbox-yes
$('.reorder_append_items').on('click','.exactly_same_checkbox_yes',function(){
var order_id = $(this).attr('order_id');
$('.exactly-same-no-checkbox-'+order_id).prop('checked',false);
$('.exactly-same-no-'+order_id).addClass('hidden');
});

});

</script>


<script type="text/javascript">
$(document).ready(function(){
$('#full-order-history-content').on('click','button.reorder_single_element',function(){

// var reorder_requests = $('input[type=checkbox][name=reorder_request]:checked').map(function(_, el){
//                                           return $(el).attr('order_id');
//                                       }).get();
// alert('sdlfkj');
// console.log(reorder_requests);

var order_id = $(this).attr('order_id');
reorder_requests =[];
reorder_requests.push(order_id);

$.ajax({
type: 'post',
url:'{{$base_url}}/reorder-request/reorder',
data:{"_token": "{{ csrf_token() }}",'reorder_requests':reorder_requests},
success: function (data){					                        
document.getElementById("reorder_append_items").innerHTML=data.data.data;
$('#order-tab').removeClass('active').removeClass('show');
$('#reoder-request-tab').addClass('active').addClass('show');

$('#order').removeClass('active').removeClass('show');
$('#reoder-request').addClass('active').addClass('show');

},
error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
});
});
});

</script>


<script type="text/javascript">
$(document).ready(function(){
// $('.shipping_address_same_as_before').hide();
//No Ship address same as before
$('.reorder_append_items').on('click','.shipp_addr_ord_same_as_befr_checkbox',function(){
var order_id = $(this).attr('order_id');
//Yes
$('.ship_addr_ord_same_as_before_checkbox_yes_'+order_id).prop('checked',false);
//No
// $('.bill_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
// $('.order_delivered_by_No_checkbox_'+order_id).prop('checked',false);
// $('.exactly-same-no-checkbox-'+order_id).prop('checked',false);
// $('.same_payment_reorder_checkbox_'+order_id).prop('checked',false);

if($(this).is(':checked')){
$('.shipping_address_same_as_before_'+order_id).removeClass('hidden');
$('.order-delivered-by-date-'+order_id).addClass('hidden');
$('.same-payment-reorder-div-'+order_id).addClass('hidden');
$('.exactly-same-no-'+order_id).addClass('hidden');
$('.billing_address_same_as_before_'+order_id).addClass('hidden');
}else{
$('.shipping_address_same_as_before_'+order_id).addClass('hidden');
}

});

//Yes Ship address Same as before
$('.reorder_append_items').on('click','.ship_addr_ord_same_as_before_checkbox_yes',function(){
var order_id = $(this).attr('order_id');

$('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
$('.shipping_address_same_as_before_'+order_id).addClass('hidden');
});

});

</script>

<script type="text/javascript">
$(document).ready(function(){
//No Bill address ord as same
$('.reorder_append_items').on('click','.bill_addr_ord_same_as_befr_checkbox',function(){
var order_id = $(this).attr('order_id');
//Yes
$('.bill_addr_ord_same_as_befr_checkbox_yes_'+order_id).prop('checked',false);
//No
// $('.order_delivered_by_No_checkbox_'+order_id).prop('checked',false);
// $('.exactly-same-no-checkbox-'+order_id).prop('checked',false);
// $('.same_payment_reorder_checkbox_'+order_id).prop('checked',false);
// $('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);

if($(this).is(':checked')){
$('.billing_address_same_as_before_'+order_id).removeClass('hidden');
$('.shipping_address_same_as_before_'+order_id).addClass('hidden');
$('.order-delivered-by-date-'+order_id).addClass('hidden');
$('.same-payment-reorder-div-'+order_id).addClass('hidden');
$('.exactly-same-no-'+order_id).addClass('hidden');
}else{
$('.billing_address_same_as_before_'+order_id).addClass('hidden');
}
});

//Yes Bill address ord as same
$('.reorder_append_items').on('click','.bill_addr_ord_same_as_befr_checkbox_yes',function(){

var order_id = $(this).attr('order_id');
$('.bill_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
$('.billing_address_same_as_before_'+order_id).addClass('hidden');
});

});
</script>


<script type="text/javascript">
//Save Shipp address Order Same as Before ---------------------------------------------------------
$(document).ready(function(){

$(".reorder_append_items").on('click','.add_new_addr_shipp_same_as_before button.btn-save-changes', function(event){
var order_id = $(this).attr('order_id');
// alert(order_id);
var UnitedStates=$('#united-state-shipp-same-before-'+order_id).is(':checked');
var Canada=$('#canada-shipp-same-before-'+order_id).is(':checked');
if(UnitedStates==true){
var Country=190;
}else
{
var Country=35;
}
// var is_default_add=$('#ship-addr-same-before-default-'+order_id).is(':checked');
var is_default_add='true';

var fname=$('#first_name_'+order_id).val();
var lname=$('#last_name_'+order_id).val();
var companyname=$('#company_name_'+order_id).val();
var add1=$('#address_one_'+order_id).val();
var add2=$('#address_two_'+order_id).val();
var city=$('#shipp_city_'+order_id).val();
var state=$('#shipp_state_'+order_id).val();
var zipcode=$('#ship_zip_code_'+order_id).val();
var telephone=$('#day_telephone_'+order_id).val();
var ext=$('#shipp_ext_'+order_id).val();
// var fax=$('#shipp_fxn_'+order_id).val();

// alert(fname);

form_data = new FormData();
form_data.append('Country',Country);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append('is_default_add',is_default_add);
form_data.append( "_token", "{{ csrf_token() }}");





$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& Country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/shipp-address/add",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){
document.getElementById("div-ship-append").innerHTML=data.data.data.sections;

// 	document.getElementById("div-bill-address-append").innerHTML=data.data.data;        
// $(".billing-address").addClass("hidden");
// if(data!=""){
// 	alert('Shipp Data Added Successfully');
// }
},

error: function(data){
}           
});

}
else{     
alert("Please enter all mandetory fileds!!!!");
}

});
});

//======================================================================
</script>





<script type="text/javascript">
$(document).ready(function(){
// $('.same-payment-reorder-div').hide();

//No same payment reorder checkbox
$('.reorder_append_items').on('click','.same_payment_reorder_checkbox',function(){

var order_id = $(this).attr('order_id');
//Yes
$('.same_payment_reorder_checkbox_yes_'+order_id).prop('checked',false);
//No
// $('.bill_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);
// $('.order_delivered_by_No_checkbox_'+order_id).prop('checked',false);
// $('.exactly-same-no-checkbox-'+order_id).prop('checked',false);
// $('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).prop('checked',false);

if($(this).is(':checked')){
$('.same-payment-reorder-div-'+order_id).removeClass('hidden');
$('.order-delivered-by-date-'+order_id).addClass('hidden');
$('.shipping_address_same_as_before_'+order_id).addClass('hidden');
$('.exactly-same-no-'+order_id).addClass('hidden');
$('.billing_address_same_as_before_'+order_id).addClass('hidden');
}else{
$('.same-payment-reorder-div-'+order_id).addClass('hidden');
}
});

//Yes Same Payment Reorder Checkbox
$('.reorder_append_items').on('click','.same_payment_reorder_checkbox_yes',function(){
var order_id = $(this).attr('order_id');
$('.same_payment_reorder_checkbox_'+order_id).prop('checked',false);
$('.same-payment-reorder-div-'+order_id).addClass('hidden');
});


// $('.new-acc-fill-info').hide();
$('.reorder_append_items').on('click','.add_new_account_main',function(){
var order_id = $(this).attr('order_id');
if ($(this).hasClass("add-new-acount-after")) {
$(this).removeClass('add-new-acount-after');
$(this).addClass('add-new-account');
$('.new-acc-fill-info').addClass('hidden');

}else{
$('.new-acc-fill-info').removeClass('hidden');
$(this).addClass('add-new-acount-after');
$(this).removeClass('add-new-account');
}

});

});


</script>





<script type="text/javascript">
$(document).ready(function(){
var order_histories = <?php echo json_encode($order_history); ?>;
$.each(order_histories,function(index,item){

});
});
</script>


<script type="text/javascript">
//Bill addr Reorder concept
$(document).ready(function(){
$('.reorder_append_items').on('click','.bill-addr-new-reorder .btn-save-changes',function(){
var order_id = $(this).attr('order_id');

var UnitedStates=$('#united_state_bill_address_reorder_'+order_id).is(':checked');
var canada=$('#canada_bill_address_reorder_'+order_id).is(':checked');
if(UnitedStates==true){
var country=190;
}else
{
var country=35;
}

var fname=$('#first_name_bill_addr_reorder_'+order_id).val();
var lname=$('#last_name_bill_addr_reorder_'+order_id).val();
var companyname=$('#companyname_bill_addr_reorder_'+order_id).val();
var add1=$('#address_line_1_bill_addr_reorder_'+order_id).val();
var add2=$('#address_line_2_bill_addr_reorder_'+order_id).val();
var city=$('#city_bill_addr_reorder_'+order_id).val();
var state=$('#state_bill_addr_reorder_'+order_id).val();
var zipcode=$('#zip_code_bill_addr_reorder_'+order_id).val();
var telephone=$('#tel_bill_addr_reorder_'+order_id).val();
var ext=$('#ext_bill_addr_reorder_'+order_id).val();
// var fax=$('#fax_bill_addr_reorder_'+order_id).val();

form_data = new FormData();
form_data.append('Country',country);
form_data.append('fname',fname);
form_data.append('lname',lname);
form_data.append('companyname',companyname);
form_data.append('add1',add1);
form_data.append('add2',add2);
form_data.append('city',city);
form_data.append('state',state);
form_data.append('telephone',telephone);
form_data.append('zipcode',zipcode);
form_data.append('ext',ext);
// form_data.append('fax',fax);
form_data.append( "_token", "{{ csrf_token() }}");


$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

if(fname!==""&&lname!==""&& country!==""&&add1!==""&&city!==""&& state!==""&&zipcode!==""){
alert(fname);
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/bill-address/add",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){
// console.log('dflsld');
// console.log(data.data.data);
document.getElementById("div-bill-address-append").innerHTML=data.data.data;        
$(".billing-address").addClass("hidden");
},

error: function(data){
}           
});

}
else{     
alert("Please enter all mandetory fileds!!!!");
}
});
});
</script>


<script type="text/javascript">

// for cart status quantity wise calculations
$(document).ready(function(){
$('.reorder_append_items').on('keyup','.type_quantity_input', function(){

var product_id=$(this).attr('product_id');
var quantity=$(this).val();

$.ajax({
url:"{{$base_url}}/matched-quantity",
type:'POST',
data:{'product_id':product_id,'quantity':quantity,_token:'{{csrf_token()}}'},
success:function(data){
},
error: function (xhr, textStatus, errorThrown){
// $("#per_item_price_modal").text("");
// $("#subtotal-modal").text("");
// $('#subtotal-modal').attr('subtotal',"");
}
});

});
});
</script>




<script type="text/javascript">
$(document).ready(function(){
//Yes
$('.reorder_append_items').on('click','.exactly_same_is_quantity_change_yes',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.pricing_and_quantity_table_'+order_id).removeClass('hidden');

// $('.pricing_table_quantity_color_imprint_artwork_'+order_id).removeClass('hidden');
$('.exactly_same_is_quantity_change_no_'+order_id).prop('checked',false);
}else{
$('.pricing_and_quantity_table_'+order_id).addClass('hidden');


// $('.pricing_table_quantity_color_imprint_artwork_'+order_id).addClass('hidden');
$('.exactly_same_is_quantity_change_no_'+order_id).prop('checked',true);
}
});

//No
$('.reorder_append_items').on('click','.exactly_same_is_quantity_change_no',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.pricing_and_quantity_table_'+order_id).addClass('hidden');

// $('.pricing_table_quantity_color_imprint_artwork_'+order_id).addClass('hidden');
$('.exactly_same_is_quantity_change_yes_'+order_id).prop('checked',false);
}else{

$('.pricing_and_quantity_table_'+order_id).removeClass('hidden');
// $('.pricing_table_quantity_color_imprint_artwork_'+order_id).removeClass('hidden');
$('.exactly_same_is_quantity_change_yes_'+order_id).prop('checked',true);
}
});
});
</script>		


<script type="text/javascript">
//Reorder Request 

$(document).ready(function(){
//Reorder Request Item_Color_Change Yes-Box
$('.reorder_append_items').on('click','.item_color_going_to_change_yes',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.price_box_'+order_id).removeClass('hidden');
$('.item_color_going_to_change_no_'+order_id).prop('checked',false);
}else{
$('.price_box_'+order_id).addClass('hidden');
$('.item_color_going_to_change_no_'+order_id).prop('checked',true);
}
});

//Reorder Request Item Color Change No-Box
$('.reorder_append_items').on('click','.item_color_going_to_change_no',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.price_box_'+order_id).addClass('hidden');
$('.item_color_going_to_change_yes_'+order_id).prop('checked',false);
}else{
$('.item_color_going_to_change_yes_'+order_id).prop('checked',true);
$('.price_box_'+order_id).removeClass('hidden');
}
});

});
</script>

<script type="text/javascript">
//Reorder Request--reord-req-ext-same-cnt-chnge-no.blade.php
$(document).ready(function(){
//Yes
$('.reorder_append_items').on('click','.imprint_color_going_to_change_yes',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.imprint_data_options_'+order_id).removeClass('hidden');
$('.imprint_color_going_to_change_no_'+order_id).prop('checked',false);
}else{
$('.imprint_data_options_'+order_id).addClass('hidden');
$('.imprint_color_going_to_change_no_'+order_id).prop('checked',true);
}
});

//No
$('.reorder_append_items').on('click','.imprint_color_going_to_change_no',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.imprint_data_options_'+order_id).addClass('hidden');
$('.imprint_color_going_to_change_yes_'+order_id).prop('checked',false);
}else{
$('.imprint_data_options_'+order_id).removeClass('hidden');
$('.imprint_color_going_to_change_yes_'+order_id).prop('checked',true);
}
});


});
</script>	

<script type="text/javascript">
//Reorder Request--reord-req-ext-same-cnt-chnge-no.blade.php
//Artwork
$('.reorder_append_items').on('click','.artwork_new_going_to_provide_yes',function(){
var order_id = $(this).attr('order_id');

if($(this).is(':checked')){
$('.artwork_going_to_providing_reorder_'+order_id).removeClass('hidden');
$('.artwork_new_going_to_provide_no_'+order_id).prop('checked',false);
}else{
$('.artwork_going_to_providing_reorder_'+order_id).addClass('hidden');
$('.artwork_new_going_to_provide_no_'+order_id).prop('checked',true);
}
});

$('.reorder_append_items').on('click','.artwork_new_going_to_provide_no',function(){
var order_id = $(this).attr('order_id');

if($(this).is(':checked')){
$('.artwork_going_to_providing_reorder_'+order_id).addClass('hidden');
$('.artwork_new_going_to_provide_yes_'+order_id).prop('checked',false);
}else{
$('.artwork_going_to_providing_reorder_'+order_id).removeClass('hidden');
$('.artwork_new_going_to_provide_yes_'+order_id).prop('checked',true);
}
});
</script>


<script type="text/javascript">
//Reorder Request--reord-req-ext-same-cnt-chnge-no.blade.php
$(document).ready(function(){

//Yes Decorated Imprint
$('.reorder_append_items').on('click','.decorated_imprint',function(){
var order_id = $(this).attr('order_id');

if($(this).is(':checked')){
$('.blank_goods_imprint_'+order_id).prop('checked',false);
$('.imprint_content_show_hide_'+order_id).removeClass('hidden');
}else{
$('.blank_goods_imprint_'+order_id).prop('checked',true);
$('.imprint_content_show_hide_'+order_id).addClass('hidden');
}
});


//No Decorated Imprint
$('.reorder_append_items').on('click','.blank_goods_imprint',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.decorated_imprint_'+order_id).prop('checked',false);
$('.imprint_content_show_hide_'+order_id).addClass('hidden');
}else{
$('.decorated_imprint_'+order_id).prop('checked',true);
$('.imprint_content_show_hide_'+order_id).removeClass('hidden');
}
});

});
</script>	

<script>
$(document).ready(function() {
$('.summernote').summernote();
});
</script>	



<script type="text/javascript">
// var password = document.getElementById("password")
//   , confirm_password = document.getElementById("confirm_password");

// function validatePassword(){
//   if(password.value != confirm_password.value) {
//     confirm_password.setCustomValidity("Passwords Don't Match");
//   } else {
//     confirm_password.setCustomValidity('');
//   }
// }

// password.onchange = validatePassword;
// confirm_password.onkeyup = validatePassword;
</script>



<script type="text/javascript">

//Password Confirmation Profile Page
// var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

$(document).ready(function(){

//password and confirm password chack


$('#password').keyup(function(){
var password = $(this).val();

var upperCase= new RegExp('[A-Z]');
var lowerCase= new RegExp('[a-z]');
var numbers = new RegExp('[0-9]');
var special_char = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
if(password.length >= 8) {
$('ul.password-configuration-show>li.eight-to-sixty-four-char').addClass('color-59BD8B');
}else{
$('ul.password-configuration-show>li.eight-to-sixty-four-char').removeClass('color-59BD8B');
}

if(password.match(upperCase)){
$('ul.password-configuration-show>li.an-uppercase-char').addClass('color-59BD8B');
}else{
$('ul.password-configuration-show>li.an-uppercase-char').removeClass('color-59BD8B');
}

if(password.match(lowerCase)){
$('ul.password-configuration-show>li.an-lowercase-char').addClass('color-59BD8B');
}else{
$('ul.password-configuration-show>li.an-lowercase-char').removeClass('color-59BD8B');
}

if(password.match(numbers)){
$('ul.password-configuration-show>li.an-numbers-char').addClass('color-59BD8B');
}else{
$('ul.password-configuration-show>li.an-numbers-char').removeClass('color-59BD8B');
}

if(password.match(special_char)){

$('ul.password-configuration-show>li.an-special-char').addClass('color-59BD8B');
}else{
$('ul.password-configuration-show>li.an-special-char').removeClass('color-59BD8B');
}


});

//profile Confirmation
$('.contact-info-submit-btn').on("click",function(){
var name = $('#contact_info_name').val();
var phone_number = $('#contact_info_phone_number').val();
// var fax = $('#contact_info_fax').val();
if(name==""){
alert('Name Mandetory');
return false;
}
if(phone_number==""){
alert('Phone Number Mandetory');
return false;
}


$.ajax({
url:"{{$base_url}}/my-acc/profile/contact-info",
type:'POST',
data:{'name':name,'contact_number':phone_number,'_token':'{{csrf_token()}}'},
// data:{'name':name,'contact_number':phone_number,'fax':fax,'_token':'{{csrf_token()}}'},
success:function(data){
if(data!=""){
var name = data['name'];
var contact_number = data['contact_number'];
// var fax = data['fax'];
$('#contact_info_name').val(name);
$('#contact_info_phone_number').val(contact_number);
// $('#contact_info_fax').val(fax);
alert('Data Successfully Changed');
}

},
error: function (xhr, textStatus, errorThrown){

}
});
});
//profile confirmation End


//Email Verification End

$('.verify-email-button').on('click',function(){
email = $('.email_verify_input').val();

var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

if(!regex.test(email)){
alert("Enter a valid email");
return false;
}

$.ajax({
url:"{{$base_url}}/my-acc/profile/update-email",
type:'POST',
data:{'email':email,'_token':'{{csrf_token()}}'},
success:function(data){
if(data!=""){
$('.email_verify_input').val(data["email"]);
alert('Email Update Successfully');
}
},
error: function (xhr, textStatus, errorThrown){

}
});


});

//Email Verification End

$('.change-password-verify-email').on('click',function(){
var password = $('#password').val();
var confirm_password = $('#confirm_password').val();






if(password != "" && password == confirm_password) {



if(password.length < 8) {
alert("Error: Password must contain at least six characters!");
// alert("Error: Password must contain at least eight characters!", "warn");
// password.focus();
return false;
}

re = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
if(!re.test(password)) {
alert("Error: password must contain at least one number Special Char!");
// $.notify("Error: password must contain at least one number Special Char!", "warn");
// password.focus();
return false;
}


re = /[0-9]/;
if(!re.test(password)) {
alert("Error: password must contain at least one number (0-9)!");
// $.notify("Error: password must contain at least one number (0-9)!", "warn");

// password.focus();
return false;
}
re = /[a-z]/;
if(!re.test(password)) {
alert("Error: password must contain at least one lowercase letter (a-z)!");
// $.notify("Error: password must contain at least one lowercase letter (a-z)!", "warn");
// password.focus();
return false;
}
re = /[A-Z]/;
if(!re.test(password)) {
alert("Error: password must contain at least one uppercase letter (A-Z)!");
// $.notify("Error: password must contain at least one uppercase letter (A-Z)!", "warn");
// password.focus();
return false;
}
} else {
alert("Error: Please check that you've entered and confirmed your password!");
// $.notify("Error: Please check that you've entered and confirmed your password!", "warn");
// password.focus();
return false;
}


$.ajax({
url:"{{$base_url}}/my-acc/profile/change-password",
type:'POST',
data:{'password':password,'_token':'{{csrf_token()}}'},
success:function(data){
if(data!=""){
alert('Password Change Successfully');
}
},
error: function (xhr, textStatus, errorThrown){

}
});

});



});
</script>


<script type="text/javascript">
$('#full-order-history-content').on("click","button.btn_order_history_view_art_proofs",function(){
var order_item_id = $(this).attr('order_item_id');
$('.view-art-proofs-row-'+order_item_id).removeClass('hidden');
$('.order-history-content-'+order_item_id).addClass('hidden');
});

$('#full-order-history-content').on("click","button.order-history-art-proof-close-btn",function(){
var order_item_id = $(this).attr('order_item_id');
$('.view-art-proofs-row-'+order_item_id).addClass('hidden');
$('.order-history-content-'+order_item_id).removeClass('hidden');
});	
</script>



<script type="text/javascript">
//COllapse Concept
$(document).ready(function () {
$('.collapse')
.on('shown.bs.collapse', function() {
// $(this)
//     .parent().parent()
//     .find(".fa-eye")
//     .removeClass("fa-eye")
//     .addClass("fa-eye-slash");
alert('shown');
})
.on('hidden.bs.collapse', function() {
// $(this)
//     .parent().parent()
//     .find(".fa-eye-slash")
//     .removeClass("fa-eye-slash")
//     .addClass("fa-eye");

alert('hidden');
});
}
</script>



<script type="text/javascript">
$(document).ready(function(){
//Pending data Show
$('.pending_art_proof_collapse').click(function() {
var artproof_id = $(this).attr('artproof_id');

if($('#pending_artproof_div_'+artproof_id).hasClass("hidden")){
$('#pending_collapse_image_up_down_'+artproof_id).attr('src', '{{$base_url}}/resources/views/superior/assets/images/up-collapse.png');
$('#pending_artproof_div_'+artproof_id).removeClass('hidden');
}else{
$('#pending_collapse_image_up_down_'+artproof_id).attr('src', '{{$base_url}}/resources/views/superior/assets/images/down-collapse.png');
$('#pending_artproof_div_'+artproof_id).addClass('hidden');
}
});

//Approved Data show


$('.approved_art_proof_collapse').click(function() {

var art_proof_id = $(this).attr('artproof_id');
if($('#approved_artproof_div_'+art_proof_id).hasClass("hidden")){
$('#approved_collapse_image_up_down_'+art_proof_id).attr('src', '{{$base_url}}/resources/views/superior/assets/images/up-collapse.png');
$('#approved_artproof_div_'+art_proof_id).removeClass('hidden');
}else{
$('#approved_collapse_image_up_down_'+art_proof_id).attr('src', '{{$base_url}}/resources/views/superior/assets/images/down-collapse.png');
$('#approved_artproof_div_'+art_proof_id).addClass('hidden');
}
});


$('.approved_art_proof_collapse_new').on("click",function(){
alert('dlfj');
});







//Delined Order History Art Proofs
$('.declined_art_proof_collapse').on('click',function(){
var artproof_id = $(this).attr('artproof_id');
if($('#delined_art_proof_div_'+artproof_id).hasClass("hidden")){							
$('#declined_collapse_image_up_down_'+artproof_id).attr('src', '{{$base_url}}/resources/views/superior/assets/images/up-collapse.png');
$('#delined_art_proof_div_'+artproof_id).removeClass('hidden');
}else{
$('#declined_collapse_image_up_down_'+artproof_id).attr('src', '{{$base_url}}/resources/views/superior/assets/images/down-collapse.png');
$('#delined_art_proof_div_'+artproof_id).addClass('hidden');
}
});
});
</script>
<script type="text/javascript">
$('.reorder_append_items').on('click','.submit_reorder_request_button',function(){


var order_id = $(this).attr('order_id');
var product_id=$(this).attr('product_id');
var quantity=$('.type_quantity_input_'+order_id).val();
var min_quantity = $('.min-quantity-'+order_id).val();
var max_quantity = $('.max_quantity_'+order_id).val();

//Pricing Table
var exactly_same_no_checkbox = $('.exactly-same-no-checkbox-'+order_id).is(':checked');
var exactly_same_is_quantity_change_yes = $(".exactly_same_is_quantity_change_yes_"+order_id).is(':checked');

if(exactly_same_no_checkbox==true){
if(exactly_same_is_quantity_change_yes==true){
if(quantity>=min_quantity && quantity<=max_quantity){ //start quantiyt


}else if(quantity<=0 ){//quantity match end
// $.notify("Please fill valid values","danger");
alert("Please fill valid values","danger");
return false;
}else{
// $.notify("Please fill min-quantity","danger");
alert("Please fill quantity between "+min_quantity+" to "+max_quantity);

return false;
}//quantity match end
}
}







//item Color Selection
var item_color_going_to_change_yes = $('.item_color_going_to_change_yes_'+order_id).is(':checked');
var main_selected_color=$('input[name=address]:checked').attr('value');

//Imrpint colors
var imprint_color_going_to_change_yes = $('.imprint_color_going_to_change_yes_'+order_id).is(':checked');
var is_decorated=$('.decorated_imprint_'+order_id).is(':checked');


var imprint_ids= new Array();
var imprint_color_ids = new Array();

$("input[name='imprintcheck']:checked").each(function(i){

imprint_id = $(this).val();
imprint_ids.push($(this).val());

var color_id_diff=new Array();
$(".imp_color_"+imprint_id).each(function(){
color_id = $(this).val();
color_id_diff.push(color_id);
});
imprint_color_ids.push(color_id_diff);
});

var imprint_colors= new Array();

$(".select-max-colors").each(function(i) {
imprint_colors.push($(this).attr('name'));
});

imprint_color_ids = JSON.stringify(imprint_color_ids);



var artwork_new_going_to_provide_yes = $(".artwork_new_going_to_provide_yes_"+order_id).is(':checked');

var artwork_file=$("#file-name").text();
var artwork_textarea = $('.artwork_textarea').val();

//order_delivered by
var order_delivered_by_No_checkbox = $('.order_delivered_by_No_checkbox_'+order_id).is(":checked");

var as_soon_as_possible_reorder_receive_date = $('.as_soon_as_possible_reorder_receive_date_'+order_id).is(':checked');
var need_this_reorder_received_date = $('.need_this_reorder_received_date_'+order_id).is(':checked');

var received_date = $('.ship-date-'+order_id).val();

var shipp_addr_ord_same_as_befr_checkbox = $('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).is(":checked");
var bill_addr_ord_same_as_befr_checkbox = $('.bill_addr_ord_same_as_befr_checkbox_'+order_id).is(':checked');

// if($('.shipp_addr_ord_same_as_befr_checkbox_'+order_id).is(":checked")){
// 		var shipping_address = "no";
// }else{
// 		var shipping_address = "yes";
// }

// if($('.bill_addr_ord_same_as_befr_checkbox_'+order_id).is(':checked')){
// 	var billing_address = "no";
// }else{
// 	var billing_address = "yes";
// }

form_data = new FormData();
if(exactly_same_no_checkbox==true){
jQuery.each($("#file")[0].files, function(i, file) {	



const fileSize = file.size / 1024 / 1024; // in MiB
if (fileSize > 3) {
alert('File size exceeds 3 MiB. Please select less than 3 MiB');
return false;
}



console.log(file.size / 1024 / 1024);
form_data.append('files['+i+']', file);
});
}

form_data.append('order_id',order_id);
form_data.append('product_id',product_id);
form_data.append('quantity',quantity);
form_data.append('exactly_same_no_checkbox',exactly_same_no_checkbox);
form_data.append('exactly_same_is_quantity_change_yes',exactly_same_is_quantity_change_yes);
form_data.append('item_color_going_to_change_yes',item_color_going_to_change_yes);
form_data.append('main_selected_color',main_selected_color);
form_data.append('imprint_color_going_to_change_yes',imprint_color_going_to_change_yes);
form_data.append('is_decorated',is_decorated);
form_data.append('imprint_ids',imprint_ids);
form_data.append('imprint_color_ids',imprint_color_ids);
form_data.append('artwork_new_going_to_provide_yes',artwork_new_going_to_provide_yes);
form_data.append('artwork_file',artwork_file);
// form_data.append('artwork_textarea',artwork_textarea);
form_data.append('order_delivered_by_No_checkbox',order_delivered_by_No_checkbox);
form_data.append('as_soon_as_possible_reorder_receive_date',as_soon_as_possible_reorder_receive_date);
form_data.append('need_this_reorder_received_date',need_this_reorder_received_date);
form_data.append('received_date',received_date);
form_data.append('shipp_addr_ord_same_as_befr_checkbox',shipp_addr_ord_same_as_befr_checkbox);
form_data.append('bill_addr_ord_same_as_befr_checkbox',bill_addr_ord_same_as_befr_checkbox);
form_data.append("_token","{{csrf_token()}}");








// form_data = new FormData();

// $("#file").files, function(file) {
//     form_data.append('files',file);
// };

// // form_data = new FormData();
// // jQuery.each($("#file")[0].files, function(i, file) {
// //     form_data.append('files['+i+']', file);
// // });

// /*for(var pair of form_data.entries()) {
//    console.log(pair[0]+ ','+ pair[1]); 
// }*/

// form_data.append('product_id',product_id);
// form_data.append('order_id',order_id);
// // form_data.append('shipping_address',shipping_address);
// // form_data.append('billing_address',billing_address);
// form_data.append('main_selected_color',main_selected_color);
// form_data.append('artwork_file',artwork_file);
// form_data.append('quantity',quantity);
// form_data.append('is_decorated',is_decorated);//--
// form_data.append('imprint_ids',imprint_ids);
// form_data.append('received_date',received_date);
// // form_data.append('product_option_prices_ids',product_option_prices_ids);//--
// form_data.append('imprint_color_ids',imprint_color_ids);
// form_data.append('summernotedata',artwork_textarea);

// form_data.append( "_token", "{{ csrf_token() }}" );

$.ajaxSetup({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});

$.ajax({
method: "POST",
url: "{{$base_url}}/reorder",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,
success: function(data){
var order_id = data['order_id'];
window.location.href="{{$base_url}}/success?order_id="+order_id;
},
error: function(result){

}           
});








});








//Check-Uncheck Data

$('.reorder_append_items').on('click','.need_this_order_date',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$(".as_soon_as_possible_reorder_receive_date_"+order_id).prop('checked',false);

}else{
$(".as_soon_as_possible_reorder_receive_date_"+order_id).prop('checked',true);

}
});

$('.reorder_append_items').on('click','.ASAP_date_format',function(){

var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('.need_this_reorder_received_date_'+order_id).prop('checked',false);
}else{
$('.need_this_reorder_received_date_'+order_id).prop('checked',true);
}
});
</script>




<script type="text/javascript">
//Is the imprint color going to change?
//reord-req-ext-same-cnt-chnge-no.blade.php



$('.reorder_append_items').on('click','.imprint_option_select_change',function(){
var imprint_id = $(this).attr('imprint_id');
var max_colors = $(this).attr('max_colors');

var max_colors = max_colors-1;
if(max_colors!=""&&max_colors>0){

if($(this).is(":checked")){

$('.add_max_color_button_'+imprint_id).append('<div class="append_imprint_colors_and_button_'+imprint_id+'"><button class="add_imprint_color add_imprint_color_'+imprint_id+' cart-status-button mt-2 mb-2" id="add-color-btn-'+imprint_id+'" imprint_id="'+imprint_id+'" max_colors="'+max_colors+'">Add color +</button></div>');

}else{
$('.add_max_color_button_'+imprint_id).text('');
}
}

});
</script>


<script type="text/javascript">
//Is the imprint color going to change?
//reord-req-ext-same-cnt-chnge-no.blade.php
//Add Imprint Color
$('.reorder_append_items').on('click','.add_imprint_color',function(){
var imprint_id = $(this).attr('imprint_id');
var max_colors = $(this).attr('max_colors');

if(max_colors!=""&&max_colors>0){

form_data = new FormData();
form_data.append('imprint_id',imprint_id);
form_data.append('max_colors',max_colors);
form_data.append("_token", "{{csrf_token()}}");
$.ajax({
method: "POST",
url: "{{$base_url}}/imprint-option-select",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,
success: function(data){
// document.getElementById('add_max_color_button_'+data.data.data.imprint_id).innerHTML=data.data.data.sections;
$('.add_imprint_color_'+data.data.data.imprint_id).remove();
// console.log(data.data.data.sections);
$('#add_max_color_button_'+data.data.data.imprint_id).append(data.data.data.sections);

},
error: function(result){

}           
});

}else{
return false;
}

});

</script>

<script type="text/javascript">
$('.reorder_append_items').on('click','.close_imprint_color_select',function(){
var imprint_id = $(this).attr('imprint_id');
var max_colors = $(this).attr('max_colors');
$(this).parent('div').remove();
$('.add_imprint_color_'+imprint_id).remove();

$('.add_max_color_button_'+imprint_id).append('<div class="append_imprint_colors_and_button_'+imprint_id+'"><button class="add_imprint_color add_imprint_color_'+imprint_id+' cart-status-button mt-2 mb-2" id="add-color-btn-'+imprint_id+'" imprint_id="'+imprint_id+'" max_colors="'+max_colors+'">Add color +</button></div>');
});
</script>

<script type="text/javascript">
function uploadFile(target){

const fileSize = target.files[0].size / 1024 / 1024; // in MiB
if (fileSize > 3) {
alert('File size exceeds 3 MiB. Please select less than 3 MiB');

}
document.getElementById("file-name").innerHTML = target.files[0].name;
}
</script>


<script type="text/javascript">
//reorder-request-item-list
$('.reorder_append_items').on('click','.shipp_united_state_checkbox_reorder',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('#ship_zip_code_'+order_id).val('');
$('.shipping_address_state_label_reoder_'+order_id).removeClass('hidden');
$('.shipping_address_province_label_reoder_'+order_id).addClass('hidden');
$('#canada-shipp-same-before-'+order_id).prop('checked',false);


$('.shipping_address_zipcode_label_reorder_'+order_id).removeClass('hidden');
$('.shipping_address_postalcode_label_reorder_'+order_id).addClass('hidden');


var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];

// $("#getlocationsCountry").append("");
document.getElementById("shipp_state_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#shipp_state_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}else{
$('.shipping_address_state_label_reoder_'+order_id).addClass('hidden');
$('.shipping_address_province_label_reoder_'+order_id).removeClass('hidden');
$('#canada-shipp-same-before-'+order_id).prop('checked',true);

$('.shipping_address_zipcode_label_reorder_'+order_id).addClass('hidden');
$('.shipping_address_postalcode_label_reorder_'+order_id).removeClass('hidden');

var country_id = 35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];
// $("#getlocationsCountry").append("");
document.getElementById("shipp_state_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#shipp_state_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}

});

$('.reorder_append_items').on('click','.shipp_canada_state_checkbox_reorder',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('#ship_zip_code_'+order_id).val('');
$('.shipping_address_state_label_reoder_'+order_id).addClass('hidden');
$('.shipping_address_province_label_reoder_'+order_id).removeClass('hidden');
$('#united-state-shipp-same-before-'+order_id).prop('checked',false);

$('.shipping_address_zipcode_label_reorder_'+order_id).addClass('hidden');
$('.shipping_address_postalcode_label_reorder_'+order_id).removeClass('hidden');

var country_id = 35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];
// $("#getlocationsCountry").append("");
document.getElementById("shipp_state_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#shipp_state_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}else{
$('.shipping_address_state_label_reoder_'+order_id).removeClass('hidden');
$('.shipping_address_province_label_reoder_'+order_id).addClass('hidden');
$('#united-state-shipp-same-before-'+order_id).prop('checked',true);

$('.shipping_address_zipcode_label_reorder_'+order_id).removeClass('hidden');
$('.shipping_address_postalcode_label_reorder_'+order_id).addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];

document.getElementById("shipp_state_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#shipp_state_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}

});
</script>

<script type="text/javascript">
$(document).ready(function(){
//united state
$('.reorder_append_items').on('click','.united_state_bill_address_reorder',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('#zip_code_bill_addr_reorder_'+order_id).val('');
$('.bill_address_state_label_'+order_id).removeClass('hidden');
$('.bill_address_province_label_'+order_id).addClass('hidden');
$('#canada_bill_address_reorder_'+order_id).prop('checked',false);

$('.bill_address_zipcode_label_'+order_id).removeClass('hidden');
$('.bill_address_postalcode_label_'+order_id).addClass('hidden');
var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];

document.getElementById("state_bill_addr_reorder_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state_bill_addr_reorder_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}else{
$('.bill_address_state_label_'+order_id).addClass('hidden');
$('.bill_address_province_label_'+order_id).removeClass('hidden');
$('#canada_bill_address_reorder_'+order_id).prop('checked',true);

$('.bill_address_zipcode_label_'+order_id).addClass('hidden');
$('.bill_address_postalcode_label_'+order_id).removeClass('hidden');
var country_id = 35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];

document.getElementById("state_bill_addr_reorder_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state_bill_addr_reorder_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});

//canada 
$('.reorder_append_items').on('click','.canada_bill_address_reorder',function(){
var order_id = $(this).attr('order_id');
if($(this).is(':checked')){
$('#zip_code_bill_addr_reorder_'+order_id).val('');
$('.bill_address_state_label_'+order_id).addClass('hidden');
$('.bill_address_province_label_'+order_id).removeClass('hidden');
$('#united_state_bill_address_reorder_'+order_id).prop('checked',false);

$('.bill_address_zipcode_label_'+order_id).addClass('hidden');
$('.bill_address_postalcode_label_'+order_id).removeClass('hidden');
var country_id = 35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];

document.getElementById("state_bill_addr_reorder_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state_bill_addr_reorder_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});

}else{
$('.bill_address_state_label_'+order_id).removeClass('hidden');
$('.bill_address_province_label_'+order_id).addClass('hidden');

$('#united_state_bill_address_reorder_'+order_id).prop('checked',true);

$('.bill_address_zipcode_label_'+order_id).removeClass('hidden');
$('.bill_address_postalcode_label_'+order_id).addClass('hidden');
var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'order_id':order_id,'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
var order_id = result['order_id'];

document.getElementById("state_bill_addr_reorder_"+order_id).options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state_bill_addr_reorder_"+order_id).append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});

});
</script>


<script type="text/javascript">
//Address Book ========================
$(document).ready(function(){
$('.add-new-united-bill-checkbox-address-book').on('click',function(){
if($(this).is(':checked')){
$('#zip-code-bill').val('');
$('.add-new-canada-bill-checkbox-address-book').prop('checked',false);
$('.select_state_label_add_bill_address').removeClass('hidden');
$('.select_province_label_add_bill_address').addClass('hidden');

$('.zip_code_label_add_bill_address').removeClass('hidden');
$('.postal_code_label_add_bill_address').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});

}else{
$('.add-new-canada-bill-checkbox-address-book').prop('checked',true);
$('.select_province_label_add_bill_address').removeClass('hidden');
$('.select_state_label_add_bill_address').addClass('hidden');

$('.zip_code_label_add_bill_address').addClass('hidden');
$('.postal_code_label_add_bill_address').removeClass('hidden');

var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}


});
$('.add-new-canada-bill-checkbox-address-book').on('click',function(){
if($(this).is(':checked')){
$('#zip-code-bill').val('');
$('.add-new-united-bill-checkbox-address-book').prop('checked',false);
$('.select_province_label_add_bill_address').removeClass('hidden');
$('.select_state_label_add_bill_address').addClass('hidden');

$('.zip_code_label_add_bill_address').addClass('hidden');
$('.postal_code_label_add_bill_address').removeClass('hidden');
var country_id = 35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
// $("#state-bill").append("");
document.getElementById("state-bill").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});




}else{
$('.add-new-united-bill-checkbox-address-book').prop('checked',true);
$('.select_state_label_add_bill_address').removeClass('hidden');
$('.select_province_label_add_bill_address').addClass('hidden');

$('.zip_code_label_add_bill_address').removeClass('hidden');
$('.postal_code_label_add_bill_address').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});
});
</script>

<script type="text/javascript">
//address book 
//shipp address
$(document).ready(function(){
$('.add-new-shipp-addr-united-checkbox-address-book').on('click',function(){
if($(this).is(':checked')){
$('#zip-coden').val('');
$('.add-new-shipp-addr-canada-checkbox-address-book').prop('checked',false);
$('.add_shipp_province_label_address_book').addClass('hidden');
$('.add_shipp_state_label_address_book').removeClass('hidden');

$('.add_shipp_zipcode_label_address_book').removeClass('hidden');
$('.add_shipp_postalcode_label_address_book').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("staten").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#staten").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});

}else{
$('.add-new-shipp-addr-canada-checkbox-address-book').prop('checked',true);
$('.add_shipp_province_label_address_book').removeClass('hidden');
$('.add_shipp_state_label_address_book').addClass('hidden');

$('.add_shipp_zipcode_label_address_book').addClass('hidden');
$('.add_shipp_postalcode_label_address_book').removeClass('hidden');

var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {   
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("staten").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#staten").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown);
}
});
}
});	

$('.add-new-shipp-addr-canada-checkbox-address-book').on('click',function(){
if($(this).is(':checked')){
$('#zip-coden').val('');
$('.add-new-shipp-addr-united-checkbox-address-book').prop('checked',false);
$('.add_shipp_province_label_address_book').removeClass('hidden');
$('.add_shipp_state_label_address_book').addClass('hidden');

$('.add_shipp_zipcode_label_address_book').addClass('hidden');
$('.add_shipp_postalcode_label_address_book').removeClass('hidden');

var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {   
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("staten").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#staten").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown);
}
});

}else{
$('.add-new-shipp-addr-united-checkbox-address-book').prop('checked',true);
$('.add_shipp_province_label_address_book').addClass('hidden');
$('.add_shipp_state_label_address_book').removeClass('hidden');

$('.add_shipp_zipcode_label_address_book').removeClass('hidden');
$('.add_shipp_postalcode_label_address_book').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("staten").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#staten").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});
});
</script>


<script type="text/javascript">
//Address Book =====   ====
$(document).ready(function(){
$('.edit-bill-addr-united-checkbox-address-book').on("click",function(){
if($(this).is(':checked')){
$('#zipcode-bill-edit').val('');
$('.edit-bill-addr-canada-checkbox-address-book').prop('checked',false);
$('.edit_bill_addr_state_label').removeClass('hidden');
$('.edit_bill_addr_province_label').addClass('hidden');

$('.edit_bill_address_zip_code_label').removeClass('hidden');
$('.edit_bill_address_postal_code_label').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill-edit").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill-edit").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}else{
$('.edit-bill-addr-canada-checkbox-address-book').prop('checked',true);
$('.edit_bill_addr_state_label').addClass('hidden');
$('.edit_bill_addr_province_label').removeClass('hidden');

$('.edit_bill_address_zip_code_label').addClass('hidden');
$('.edit_bill_address_postal_code_label').removeClass('hidden');

var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill-edit").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill-edit").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});

$('.edit-bill-addr-canada-checkbox-address-book').on("click",function(){
if($(this).is(':checked')){
$('#zipcode-bill-edit').val('');
$('.edit-bill-addr-united-checkbox-address-book').prop('checked',false);
$('.edit_bill_addr_state_label').addClass('hidden');
$('.edit_bill_addr_province_label').removeClass('hidden');

$('.edit_bill_address_zip_code_label').addClass('hidden');
$('.edit_bill_address_postal_code_label').removeClass('hidden');
var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill-edit").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill-edit").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}else{
$('.edit-bill-addr-united-checkbox-address-book').prop('checked',true);
$('.edit_bill_addr_state_label').removeClass('hidden');
$('.edit_bill_addr_province_label').addClass('hidden');

$('.edit_bill_address_zip_code_label').removeClass('hidden');
$('.edit_bill_address_postal_code_label').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state-bill-edit").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state-bill-edit").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});


}
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
//Address Book
//Edit Shipping 
$('.edit-shipp-address-united-checkbox-address-book').on('click',function(){
if($(this).is(':checked')){
$('#zip-code').val('');
$('.edit-shipp-address-canada-checkbox-address-book').prop('checked',false);
$('.select_edit_shipp_addr_state_label_add_book').removeClass('hidden');
$('.select_edit_shipp_addr_province_label_add_book').addClass('hidden');

$('.edit_shipp_addr_zip_code_label').removeClass('hidden');
$('.edit_shipp_addr_postal_code_label').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});

}else{
$('.edit-shipp-address-canada-checkbox-address-book').prop('checked',true);
$('.select_edit_shipp_addr_state_label_add_book').addClass('hidden');
$('.select_edit_shipp_addr_province_label_add_book').removeClass('hidden');

$('.edit_shipp_addr_zip_code_label').addClass('hidden');
$('.edit_shipp_addr_postal_code_label').removeClass('hidden');

var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});

$('.edit-shipp-address-canada-checkbox-address-book').on('click',function(){
if($(this).is(':checked')){
$('#zip-code').val('');
$('.edit-shipp-address-united-checkbox-address-book').prop('checked',false);
$('.select_edit_shipp_addr_state_label_add_book').addClass('hidden');
$('.select_edit_shipp_addr_province_label_add_book').removeClass('hidden');

$('.edit_shipp_addr_zip_code_label').addClass('hidden');
$('.edit_shipp_addr_postal_code_label').removeClass('hidden');

var country_id = 35;

$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state").options.length=0;

$.each(state,function(index,item){
console.log(item);
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});


}else{
$('.edit-shipp-address-united-checkbox-address-book').prop('checked',true);
$('.select_edit_shipp_addr_state_label_add_book').removeClass('hidden');
$('.select_edit_shipp_addr_province_label_add_book').addClass('hidden');

$('.edit_shipp_addr_zip_code_label').removeClass('hidden');
$('.edit_shipp_addr_postal_code_label').addClass('hidden');

var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result["states"];
// $("#getlocationsCountry").append("");
document.getElementById("state").options.length=0;

$.each(state,function(index,item){
select_text=item.state_translation.state_name;
select_value=item.state_id;
var o= new Option(select_text,select_value);
$("#state").append(o);
});
// $(".select-box").selectBox();
},
error: function (xhr, textStatus, errorThrown) {
alert(textStatus + ':' + errorThrown); 
}
});
}
});

});
</script>

<script type="text/javascript">
//Approved Order History
$('.order-history-art-proof-detail-approved').on('click',function(){
var artproof_id = $(this).attr('artproof_id');

if($('.art_prooof_order_history_terms_conditions_'+artproof_id).is(':checked')){

}else{
alert('Please Select Terms and Condition');
return false;
}

customer_note = $('.art_proof_customer_note_'+artproof_id).val();

form_data = new FormData();
form_data.append('art_proof_id',artproof_id);
form_data.append('customer_note',customer_note);
form_data.append( "_token","{{csrf_token()}}");
$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/art-proof/approved",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){

$('.approved_change_order_history_name_art_proof_'+data['art_proof_id']).removeClass('hidden');
$('.pending_change_order_history_name_art_proof_'+data['art_proof_id']).addClass('hidden');
// $('.art_proof_customer_note_').
$(".art_proof_customer_note_"+data['art_proof_id']).attr("disabled","");
$('.pending_note_from_art_department_'+data['art_proof_id']).addClass('hidden');
$('.pendign_terms_conditions_'+data['art_proof_id']).addClass('hidden');
$('.approved_declined_button_list_'+data['art_proof_id']).addClass('hidden');

},	

error: function(data){
}           
});

});

//Delined Order History
$('.order-history-art-proof-detail-decline').on('click',function(){
var artproof_id = $(this).attr('artproof_id');

// if($('.art_prooof_order_history_terms_conditions_'+artproof_id).is(':checked')){

// }else{
// 	alert('Please Select Terms and Condition');
// 	return false;
// }

customer_note = $('.art_proof_customer_note_'+artproof_id).val();

form_data = new FormData();
form_data.append('art_proof_id',artproof_id);
form_data.append('customer_note',customer_note);
form_data.append( "_token","{{csrf_token()}}");
$.ajaxSetup
({
headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});
$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/art-proof/declined",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){
$('.delclined_change_order_history_name_art_proof_'+data['art_proof_id']).removeClass('hidden');
$('.pending_change_order_history_name_art_proof_'+data['art_proof_id']).addClass('hidden');
$(".art_proof_customer_note_"+data['art_proof_id']).attr("disabled","");
$('.pending_note_from_art_department_'+data['art_proof_id']).addClass('hidden');
$('.pendign_terms_conditions_'+data['art_proof_id']).addClass('hidden');
$('.approved_declined_button_list_'+data['art_proof_id']).addClass('hidden');

},

error: function(data){
}           
});

});
</script>



<!-- ================ Zip Code Validation Start========================= -->
<script type="text/javascript">
//Zip code validation All

//Add New Bill Address Zipcode Address Book Start
$('#zip-code-bill').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('.add-new-canada-bill-checkbox-address-book').is(':checked')){
if(zipcode.length>5){
return false;
}
var regex = new RegExp("^[a-zA-Z0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;

}
//United Checkbox
if($('.add-new-united-bill-checkbox-address-book').is(':checked')){


if(zipcode.length>4){
return false;
}
var regex = new RegExp("^[0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;


}

});

//Add New Bill Address Zipcode Address Book End


//Edit Bill Address Zipcode Address Book Start
$('#zipcode-bill-edit').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('.edit-bill-addr-canada-checkbox-address-book').is(':checked')){
if(zipcode.length>5){
return false;
}
var regex = new RegExp("^[a-zA-Z0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;

}
//United Checkbox
if($('.edit-bill-addr-united-checkbox-address-book').is(':checked')){


if(zipcode.length>4){
return false;
}
var regex = new RegExp("^[0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;


}

});

//Edit Bill Address Zipcode Address Book End



//Add Shipping Address Zipcode Address Book Start

$('#zip-coden').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('.add-new-shipp-addr-canada-checkbox-address-book').is(':checked')){
if(zipcode.length>5){
return false;
}
var regex = new RegExp("^[a-zA-Z0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;

}
//United Checkbox
if($('.add-new-shipp-addr-united-checkbox-address-book').is(':checked')){


if(zipcode.length>4){
return false;
}
var regex = new RegExp("^[0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;


}

});

//Add shipping Address Zipcode Address Book End

//Edit shipping Address Zipcode Address Book Start

$('#zip-code').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('.edit-shipp-address-canada-checkbox-address-book').is(':checked')){
if(zipcode.length>5){
return false;
}
var regex = new RegExp("^[a-zA-Z0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;

}
//United Checkbox
if($('.edit-shipp-address-united-checkbox-address-book').is(':checked')){


if(zipcode.length>4){
return false;
}
var regex = new RegExp("^[0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;


}

});

//Edit shipping Address Zipcode Address Book End


//Shipping Reorder Request Start----						
$('.reorder_append_items').on('keypress','.shipp_address_order_same_before_zip_code',function(e){
var order_id = $(this).attr('order_id');
order_id = parseInt(order_id);

var zipcode = $(this).val();

//canada checkbox
if($('#canada-shipp-same-before-'+order_id).is(':checked')){
if(zipcode.length>5){
return false;
}
var regex = new RegExp("^[a-zA-Z0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;

}
//United Checkbox
if($('#united-state-shipp-same-before-'+order_id).is(':checked')){


if(zipcode.length>4){
return false;
}
var regex = new RegExp("^[0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;


}




});
//Shipping Reorder Request End----						

//Billing Reorder Request Start----		

$('.reorder_append_items').on('keypress','.bill_address_order_same_before_zip_code',function(e){
var order_id = $(this).attr('order_id');
order_id = parseInt(order_id);

var zipcode = $(this).val();

//canada checkbox
if($('#canada_bill_address_reorder_'+order_id).is(':checked')){
if(zipcode.length>5){
return false;
}
var regex = new RegExp("^[a-zA-Z0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;

}
//United Checkbox
if($('#united_state_bill_address_reorder_'+order_id).is(':checked')){


if(zipcode.length>4){
return false;
}
var regex = new RegExp("^[0-9]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

if (regex.test(str)) {

return true;
}

e.preventDefault();
return false;


}

});			
//Billing Reorder Request End----						





</script>
<!-- ================ Zip Code Validation Start========================= -->



<script type="text/javascript">
//Search top
$(document).ready(function(){
$('.header_search_button').on('click',function(){
var search = $('.header_search_input').val();
window.location.href = "{{$base_url}}/shop?page=&search="+search+"&cat_id=&category_id=&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=";
});
});
</script>







<script type="text/javascript">
$(document).ready(function(){
$('.order_history_search_button').on('click',function(){
var order_id = $('.order_history_search_input').val();
// if(order_id==""){
// 	alert('please Enter Order Id');
// 	return false;
// }

form_data = new FormData();
form_data.append('order_id',order_id);
form_data.append( "_token", "{{ csrf_token() }}");

$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/search-order-history",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){
if(data.sections!=""){
$('#full-order-history-content').html('');
$('#full-order-history-content').append(data.sections);
$('.count_order_list').html('');
$('.count_order_list').append(data['order_counts']+" Order");
}else{
alert('This order Id Not Found');
}
},
error: function(data){
}           
});
});
});
</script>

<script type="text/javascript">
$('.select_order_list').on('change', function() {
var days = $(this).val();
alert(days);

if(days==""){
return false;
}

alert('ldf');

form_data = new FormData();
form_data.append('days',days);
form_data.append( "_token", "{{ csrf_token() }}");


$.ajax({
method: "POST",
url: "{{$base_url}}/my-acc/select-order-history-days",
dataType: 'json',
cache: false,
contentType: false,
processData: false,
data: form_data,

success: function(data){

if(data.sections!=""){
$('#full-order-history-content').html('');
$('#full-order-history-content').append(data.sections);
$('.count_order_list').html('');
$('.count_order_list').append(data['order_counts']+" Order");

}else{
alert('Orders Not Found');
}
},
error: function(data){
}           
});

});
</script>
@endsection