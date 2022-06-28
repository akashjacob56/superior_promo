@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')
<link rel="stylesheet" href="{{asset('resources/views/superior/assets/css/productsliderdetail.css')}}">

<script src="{{asset('resources/views/superior/assets/js/productsliderjs.js')}}"></script>

<style type="text/css">
/*for remove input type number icons*/
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}


.true-qauntity{
    border: solid 3px green;
} 

.false-qauntity{
      border: solid 3px red;
}


/*---------------------------------*/
/*input[type=checkbox] {
    box-sizing: border-box;
    padding: 0;
    background-color: white;
    border-radius: 50%;
    vertical-align: middle;
    border: 1px solid #777777;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
    width: 16px;
    height: 16px;
}


input[type=checkbox]:checked {
    background-color: #68BEE5;
    border: solid 1px #68BEE5;
}

input[type=checkbox]:checked {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
}
*/

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


.product-thumbs-wrap img {
    display: block;
    width: 100px;
    height: 75px;
}

.mfp-ready {
    overflow: hidden !important;
}

.product-thumbs-wrap img {
    display: block;
    max-height: 100px;
}

.pg-vertical .owl-dot:before {
    content: "";
    transition: border-color 0.2s;
    border: 1px solid #DDDDDD;
}

.selected-filename {
    border: solid 1px #CCCCCC;
    margin: 0px 10px 10px 0px;
    padding: 2px 5px;
    width: auto;
    display: -webkit-inline-box;
    border-radius: 10px;
    font-family: Roboto;
    font-style: normal;
    font-size: 12px;
    color: #575757;
}

.pg-vertical .vertical-thumbs {
    position: relative;
    padding-top: 3px;
    margin: auto 1rem auto 0;
    order: -1;
    max-width: 100px;
    width: 100%;
}


.icon-angle-down {
width:40.02px;
height:28.01px;
margin-top:5px;
}


.icon-angle-up {
background-color: #e8e8e8;
color: #222529;
width: 40.02px;
height: 28.01px;
margin-bottom: 5px;
}


.pg-vertical .owl-dot.active:before {
    border: 1px solid #44EFA0;
}

.zoomContainer{
    display: none;
}


.owl-carousel .owl-nav.disabled button.owl-prev, .owl-carousel .owl-nav.disabled button.owl-next {
    padding: 0.7rem 0.7rem !important;
}

.owl-dots.disabled{
    display:none !important;
}

    body{
        color: #212121 !important;
        font-family: Roboto !important;
    }
    .text-font-weight-500{
        font-weight: 500 !important;
    }
    .text-yellow{
        color:#FFA800;
    }
.product-single-details .short_divider {
    width: 100%;
}
.product-prod-info-ul{
    margin: 0 0 0.50rem !important;
}

.product-details-content-ul{
    margin: 0 0 0.50rem !important;
}
.owl-carousel .owl-nav.disabled{
    display: block !important;
}
.product-default{
border: none !important;
}

.hidden{
    display: none;
}
.brands-section .owl-stage-outer{
    padding: 20px 28px 8px 8px !important;
    margin-left: 8% !important;
    margin-right: 8% !important;
}
.owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next {
    padding: 1rem 1rem !important;
}
</style>

<style type="text/css">
.btn-view-all{
    background-color: #68bee5;
    color: #fff;
    padding: 10px;
    border:1px solid #68bee5;
    border-radius: 5px;
}

.product-default a {
    white-space: unset !important;
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

  /*  .item_color_select{
        border: 1px solid #e7e7e7;
        margin:0 10px 0 10px;
        }*/
  /*  .item_color_select:hover{
        border: 1px solid #68bee5;
        }*/
        .item-selection{
            margin-bottom: 20px;
        }
    </style>

    <style type="text/css">
    tbody.pricing_table_tbody{
        display:block;
        max-height:152px;
        overflow-y:auto;

    }
    thead, tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;
    }

/*    thead {
        width: calc( 100% - 1em );
    } 
    */
    .pricing_table_content{
        width: 70% !important;
    }

    tr:hover {
        box-shadow: 2px 2px 15px -2px rgb(220,220,220);
    }

    .color-5d9136 {
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 16px;
        align-items: center;
        text-align: center;
        letter-spacing: -0.017em;
        color: #67A03C !important;
    }
</style>

<style type="text/css">
.type-quantity{
    margin-left: 21px;
}

.type-quantity-input {
    width: 151px;
    height: 35px;
    border-radius: 4px;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    padding: 10px;
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
    width: 16px;
    height: 16px;
}

input.blank-goods-imprint{
    width: 16px;
    height: 16px;
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


.select-max-colors {
    width: 150px;
    height: 35px;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
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
    width: 16px;
    height: 16px;
}
</style>

<style type="text/css">
.btn-anchor{
    margin-right: 20px;
}
.cart-status-button {
    border: 1px solid #68bee5;
    border-radius: 4px;
    padding: 8px 5px 8px 5px;
    background-color: #fff;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #68BEE5;
}

.order-proceed-guide-button {
    border: 1px solid #68bee5;
    border-radius: 4px;
    padding: 8px 5px 8px 5px;
    background-color: #fff;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #68BEE5;
}

.shipping-art-upload-button {
    border: 1px solid #68bee5;
    border-radius: 4px;
    padding: 8px 5px 8px 5px;
    background-color: #68bee5;
    color: #fff;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
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


<style type="text/css">
.star-color-yellow{
    color:#ffa800;
}
</style>


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


<style type="text/css">
.product-prod-info-ul{
    list-style: circle;
}
.product-prod-info-li{
    font-size: 18px !important;

}
</style>

<style type="text/css">
.btn-shop-cost{
    padding: 4px;
    border: 1px solid #68bee5;
    border-radius: 5px;
    background-color:#68bee5; 
    color: #fff;
}

.shipping-estimate-table-tbody .shipping-estimate-table-td {
    border-bottom: 1px solid #68bee5;
    padding: 5px 0 5px 0;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 29px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #464646;
}

/*table.shipping-estimate-table-show{
width: 70% !important;
}*/

</style>

<style type="text/css">
.star-rating-user-count{
    margin-left: 10px;
}

hr.hr {
    margin-top: 15px;
    margin-bottom: 15px;
}
</style>

<!-- Category page style end -->

<style type="text/css">

.sub-image-border{
    opacity: 0.8;
    border: 1px solid #DDDDDD;
    box-sizing: border-box;
}

.prod-thumbnail .active img, .prod-thumbnail img:hover {
    border: 1px solid #44EFA0 !important;
}

.nav.nav-tabs {
    margin: 0;
    border: 0;
    border-bottom: none;
}


/*step2*/

.art-work{
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

.file-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
    display: flex;
}

.maxcolor-txt {
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
    margin: 0 0px 0.6rem;
}



.doc-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 10px;
    line-height: 12px;
    display: flex;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
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
.tabelquantity > thead > tr > th{
    text-align: center;
}
/*.tabelquantity > td{
    text-align: center;
}
*/
/*----------------------*/

.color-b{ 
    color: #01abec;
    text-decoration: underline;
}


.mail-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}


.p-time{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height:15px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.day-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

label.file-txt {
    margin: 0 20px -0.7rem;
}

.date-input {
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    background:#fff;
    border-radius: 4px;
    max-width:100px;
    width: 100%;
    height: 30px;
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    justify-content: center;
}

.form-check-input {
    position: absolute;
    margin-top: 0.3rem;
    margin-left: -0.25rem;
    min-width: 20px;
    min-height: 20px;
}



.lbl-ship{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
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


.select-custom:after {
    display: inline-block;
    position: absolute;
    top: 66%;
    right: 1.9rem;
    -webkit-transform: translateY(-51%);
    transform: translateY(-51%);
    color: #34373f;
    font-family: 'porto';
    font-size: 1.5rem;
    content: '\e81c';
}

.custom-cost{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}


.ship-cost{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
}

.btn-back{
    width: 101px;
}


.btn-giud{
    width:167px;
}


.nav.nav-tabs .nav-item .step-link {
    padding: 0px;
    border: 0;
    border-bottom: none;
    font: 600 1.6rem/1 "Open Sans",sans-serif;
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #0759A4;
}


select.form-control:not([size]):not([multiple]) {
    height: 35px;
    padding: 10px;
}

.btn-sm {
    font-size: 1.3rem;
    padding: 1rem 1.5rem;
    letter-spacing: 1px;
    min-width: 40px;
}


/*for description links*/
.nav.nav-tabs-description-part .nav-item .nav-link {
    background: #E1E1E1;
    border: 1px solid #ADADAD;
    box-sizing: border-box;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 41px;
    letter-spacing: -0.017em;
    color: #212121;
    width: 171px;
    text-align: center;
    height: 50px;
}
.nav.nav-tabs-description-part ul {
    margin: 0 0 0.5rem !important;

    }

.nav.nav-tabs-description-part .nav-link.active {
    background: #F3F3F3;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    line-height: 41px;
    letter-spacing: -0.017em;
    color: #000000!important;
    border: none !important;
    border-radius: 5px;
}

.mfp-close {
    width: 44px;
    height: 44px;
    line-height: 44px;
    position: absolute;
    top: 0;
    right: 0;
    text-decoration: none;
    text-align: center;
    color: black;
    font-style: normal;
    font-size: 28px;
    font-family: Arial, Baskerville, monospace;
}

.cart-status-model{
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    box-shadow: 0px 3px 16px rgba(0, 0, 0, 0.3);
    border-radius: 5px;
    width: 650px;
    height: auto;
}

.modal {
    position: fixed;
    top:50px;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    outline: 0;
}

.model-title{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 25px;
    line-height: 29px;
    letter-spacing: -0.017em;
    color: #212121;
}

.modal-header{
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    height:50px;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
}

.modal-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem;
    border-bottom: 1px solid  #68BEE5;
    border-top-left-radius: .3rem;
    border-top-right-radius: .3rem;
}

.cart-modal-head{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    letter-spacing: -0.017em;
    color: #212121;
}

.cart-sub-item-modal{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
    letter-spacing: -0.017em;
    color: #212121;
}

.subtotal-txt{
    color: #67A03C;
}

.close-modal-btn {
    color: #FF5C01;
    border: solid;
    padding: 0px 8px;
}



/*radio buttton*/
@media only screen and (min-width: 1024px){
    .radios.proposerAddress {
      justify-content: flex-start;
  }
  .radios.proposerAddress label {
      margin-right: 15px;
  }

  .radios label {
      width: 50px;
      height: 50px;
      cursor: pointer;
  }
}
@media only screen and (max-width: 768px){
  .mobile-responsive-address{
    margin-left: 20%;
}
}
@media only screen and (min-width: 1024px){
    .radios {
      flex-wrap: wrap;
  }
}
.radios label input[type=radio] {
    opacity: 0;
    visibility: hidden;
    position: absolute;
    z-index: 1;
}
.radios.proposerAddress label input[type=radio]+span {
    display: block;
    padding-top:0px;
    text-align: center;
}

.radios label input[type=radio]+span {
    background: #fff;
    border-radius: 8px;
    box-shadow: none;
    display: block;
    position: absolute;
    z-index: 2;
    width: 80px;
    height: 82px;
    padding: 0px;
    display: flex;
    align-items: center;
    border:2px solid transparent;
    transition: border .3s ease-in;
}


.radios.proposerAddress label {
    margin-right: 60px;
    margin-bottom: 25px;
}

.radios label input[type=radio]:checked+span {
    border: 4px solid #68BEE5;
    background: -moz-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: -webkit-gradient(left top,left bottom,color-stop(0,#e5e5e56e),color-stop(100%,#e5e5e56e));
    background: -webkit-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: -o-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: -ms-linear-gradient(top,#e5e5e56e 0,#e5e5e56e 100%);
    background: linear-gradient(to bottom,#e5e5e56e 0,#e5e5e56e 100%);
    color: #fff;
}



.radios.proposerAddress label input[type=radio]+span .address_icon {
    margin: 0px auto; 
}

.radios label input[type=radio]+span .address_icon {
    width:100%;
    height:100%;
    display: block;
    margin-right:12px;
}


.radios {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}


.optional-fields{
 display: none !important; 
}


.product-name-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 30px;
    line-height: 35px;
    letter-spacing: -0.017em;
    color: #212121;
}

.item-selection{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}


.priceing-title{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.table-head-txt{
   font-family: Roboto;
   font-style: normal;
   font-weight: 500;
   font-size: 16px;
   line-height: 19px;
   align-items: center;
   letter-spacing: -0.017em;
   color: #000000;
}


table,thead,tr,tbody,td,th{
    border: none!important;
}
.pricing_table_content>tr,td{
    width: 10px;
}
.pricing_table_tbody>tr{
    background: #FFFFFF;
    box-shadow: 0px 2px 4px rgb(0 0 0 / 10%);
}

.qty-text{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height:25px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #464646;
}

tbody>tr{ 
    border-bottom: 1px solid #A9DDF4 !important;
}

.warning-msg{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    color: #575757;
}

.fill{
    font-size:16px;
    color: #68bee5 !important;
}

.unfill{
  font-size:16px;
  color: #000000;
}


.breadcrumb-item a, .breadcrumb-item.active {
    color: #212121;
}

.breadcrumb-item {
    text-transform: capitalize;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121 !important;
}

.currunt-dir{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #68BEE5 !important;
}

.breadcrumb-item+.breadcrumb-item:before {
    content: '/';
    font-family: 'porto';
    padding-right: 1rem;
    font-size: 2.4rem;
    vertical-align: middle;
    margin-top: -.5rem;
    color: #212121;
}

.tab-des-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 23px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}



.description-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 21px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #464646;
}

.esti-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.des-txt{
    width: 154px;
    height: 35px;
    left: 83px;
    top: 1365px;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
}

.th-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #000000;
}

.form-check {
    position: relative;
    display: block;
    padding-left: 0.25rem;
}

.dead-lbl{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
    padding-left: 30px;
    padding-top: 6px;
}

.active > .imrintcheck{
    background-color: #68BEE5;
    border-color:  #68BEE5 !important;
}

.product-slider-desc-bottom-order{
    max-height: 87%;
}
/*.decorated-imprint { filter: hue-rotate(0deg)   }*/

/*.decorated-imprint { filter: hue-rotate(30deg)  }*/
 /*input[type="checkbox"]:checked {  filter: invert(71%) sepia(98%) saturate(1714%) hue-rotate(173deg) brightness(106%) contrast(80%) !important;  }*/
/*.decorated-imprint  { filter: hue-rotate(90deg)  }
.decorated-imprint  { filter: hue-rotate(120deg) }
.decorated-imprint  { filter: hue-rotate(150deg) }
.decorated-imprint  { filter: hue-rotate(180deg) }
.decorated-imprint  { filter: hue-rotate(210deg) }
.decorated-imprint { filter: hue-rotate(240deg) }
*/


.item-details span{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    letter-spacing: -0.017em;
    color: #212121;
}

.ship{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
text-align: center;
letter-spacing: -0.017em;
color: #212121;
}

.price-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #212121;
}


.inner-quickview .product-details {
    align-items: center !important;
}

.inner-quickview .product-title a{
    font-weight: 500;
font-size: 18px;
line-height: 21px;
text-align: center;
letter-spacing: -0.017em;

color: #212121;
}

.inner-quickview .product-title a:hover {
    color: #58ADD5;
}

.related_products .product_default{
    border-bottom: 2px solid #a9ddf4 !important;
}


.related_products .product_default:hover{
    border-bottom: 3px solid #68bee5 !important;
    background: #FFFFFF;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}


.lower_priced .product_default{
    border-bottom: 2px solid #a9ddf4 !important;
}

.lower_priced .product_default:hover{
    border-bottom: 3px solid #68bee5 !important;
    background: #FFFFFF;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.p-option-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.product-option-slct{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
    height: 40px!important;
}

.modal-dialog-ord-process{
    max-width: 95%;
}

.img-curve{    
max-height: 155px;
}

.process-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 18px;
color: #212121;
}

.no-process{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 22px;
line-height: 18px;
text-decoration-line: underline;
color: #0759A4;
}

.caption-centered {
    position: absolute;
    top: 45%;
    left: 45%;
    transform: translate(-50%, -50%);
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 25px;
    line-height: 8px;
    letter-spacing: -0.017em;
    color: #FFFFFF;
}


.email-txt{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
color: #0759A4;
}

.modal-fullscreen-sm-down {
    border-radius: 5px;
}

.ac-notice{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 12px;
line-height: 14px;
align-items: center;
letter-spacing: -0.017em;
color: #575757;
}


.zipcode-input {
background: #FFFFFF;
border: 1px solid #CCCCCC;
height: 30px;
border-radius: 6px;
position: relative;
z-index: 10;
padding: 10px;
display: inline-block;
vertical-align: top;
box-sizing: border-box;
box-shadow: none;
width: 100%;
min-width: 310px;
}

/*.color-image {
max-width: 70px;
max-height: 70px;
object-fit: fill;
margin-right: 15px;
border-radius: 5px;
margin-bottom: 5px;
}*/


.color-image {
/*max-width: 70px;
max-height: 70px;*/
object-fit: contain;
margin-right: 15px;
border-radius: 5px;
margin-bottom: 5px;
}



.free-proof{
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 21px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #FFFFFF;
}

.btn-proof{
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #FFFFFF;
    background: #00C4C4;
    border-radius: 5px;
}

.file-cancel-btn {
    border-radius: 50%!important;
    line-height: 15px;
    color: #FF5C01;
    border: solid 2px #FF5C01 !important;
    width: 20px;
    height: 20px;
    position: relative;
    top: 10px;
    left: 3px;
}

.horizontal-scroll-table{
overflow: scroll;
overflow-y: hidden;
overflow-x: auto;
flex-wrap: unset !important;
max-width: 360px;
}

.line-of-row:before {
    content: "";
    position: absolute;
    border-bottom: 1px solid;
    width: 95%;
    margin-top: 17px;
    color: #e7e7e7;
}

.cursor-none{
  cursor: none;
  pointer-events: none;
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

.apparelText {
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    text-align: center;
    letter-spacing: -0.017em;
    color: #575757;
    width: 75px;
    height: 40px;
    padding: 0px;
}

.zip-checkbox{
    z-index:111;
}


.ac-input{
    width:auto;
    height: 35px;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
}



.qoute-email{
    height: 35px;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
}

.uppercase-txt{
    text-transform: capitalize;

}


.close-notification{
    float: none;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}


.modal-header-notification{
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: center;
    padding: 1rem;
    border-bottom:none !important;
    border-radius: 10px !important;
}

.please-note{
    font-weight: 400;
    line-height: 1.5;
}


.btn-close-notification{
    font-size: 21px;
    font-weight: 700;
    color: #fff;
    border: none;
    background: #000;
    opacity: .2;
    -ms-flex-item-align: center;
    -ms-grid-row-align: center;
    align-self: center;
    margin-top: 15px;
    padding: 6px 20px;
    border-radius: 4px;
    cursor: pointer;
}

.date-section-row{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
    padding-left: 25px;
    padding-top: 3px;
}


.clickable-qty-border {
    border: 4px solid #e6eef2;
    border-radius: 5px;
}


</style>

<!-- for summernote -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
<!-- for summernote -->

<!-- <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script> -->

<main class="main" id="topelement">

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{$base_url}}/">Home</a></li>

                @if($data['product_categorydata']->category_link->is_parent_category==1)
                @if($data['parent_category']=="")
                <li class="breadcrumb-item"><a href="{{$base_url}}/shop?page=&search=&cat_id=&category_id={{$data['product_categorydata']->category_id}}&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=">{{$data['product_categorydata']->category_link->category_translation->category_name}}</a></li>
                @endif
                @endif

                @if($data['product_categorydata']->category_link->is_parent_category==1)
                @if($data['parent_category']!="")
                <li class="breadcrumb-item">
                <a href="{{$base_url}}/shop?page=&search=&cat_id=&category_id={{$data['product_categorydata']->category_id}}&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=">{{$data['parent_category']->name}}</a></li>

                @if($data['child_category']!="")
                <li class="breadcrumb-item">
                <a href="{{$base_url}}/shop?page=&search=&cat_id=&category_id={{$data['product_categorydata']->category_id}}&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=">{{$data['child_category']->name}}</a></li>
                @endif

                @endif
                @endif



                @if($data['product_categorydata']->product_translation->product_name!=="")
                <li class="breadcrumb-item"><a href="javascript:void(0);" class="currunt-dir"><?php echo $data['product_categorydata']->product_translation->product_name; ?></a></li>
                @endif

            </ol>
        </div>
    </nav>


        <div class="container pt-2 p-0">

        <div class="product-single-container product-single-default product-transparent-image">

        <div class="cart-message d-none">
        <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
        <span>has been added to your cart.</span>
        </div>

        <div class="row">

        <div class=" col-md-6 product-single-gallery pg-vertical">
            
        <div class="row">

        <div class="col-md-3">
         <div class="vertical-thumbs">
            @if($data['all_product_images']!="[]")
            <button class="thumb-up "><i class="icon-angle-up"></i></button>
            <div class="product-thumbs-wrap">
            <div class="product-thumbs owl-dots" id='carousel-custom-dots'>
                @foreach($data['all_product_images'] as $all_product_image)
                    <div class="owl-dot">
                      <img src="{{$base_url}}/storage/app/{{$all_product_image->product_image}}"width="128" height="128" alt="product-thumbnail-img">
                    </div>
                 @endforeach
<!--                     <div class="owl-dot">
                        <img src="{{$base_url}}/storage/app/{{$data['product']->product_image}}" width="128" height="128" alt="product-thumbnail-img">
                    </div> -->
                    
                </div>
            </div>
            <button class="thumb-down "><i class="icon-angle-down"></i></button>
            @else
            <div class="product-thumbs-wrap">
            <div class="product-thumbs owl-dots" id='carousel-custom-dots'>

            <div class="owl-dot">
            <img src="{{$base_url}}/storage/app/{{$data['product']->product_image}}" width="128" height="128" alt="product-thumbnail-img">
            </div>
            </div>
            </div>
             @endif
        </div>
       
     </div>


    @php
    $product_id=$data['product']->product_id;
    @endphp



<div class="col-md-9">
<div class="product-slider-container">
<div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
@if($data['all_product_images']!="[]")
@foreach($data['all_product_images'] as $all_product_image)
<div class="product-item">

<div class="wishlist_product_content" style="z-index: 1;position: absolute;margin-left:95%;margin-top: 17px;cursor:pointer;" id="{{$product_id}}">
@if($data['product']->wishlist!="")
<i class="fa fa-heart fill wishlist_icon_{{$product_id}}"></i>
@else
<i class="fa fa-heart-o unfill wishlist_icon_{{$product_id}}"></i>
@endif
</div>

<figure class="prod-full-screen">
<img class="product-single-image icon-plus" src="{{$base_url}}/storage/app/{{$all_product_image->product_image}}"data-zoom-image="{{$base_url}}/storage/app/{{$all_product_image->product_image}}" width="540" height="540" alt="product-img"/>
</figure>

</div>
@endforeach
@else
<div class="product-item active ">
<figure class="prod-full-screen">
<img class="product-single-image icon-plus" src="{{$base_url}}/storage/app/{{$data['product']->product_image}}" data-zoom-image="{{$base_url}}/storage/app/{{$data['product']->product_image}}" width="540" height="540" alt="product-img">
</figure>
</div>

@endif

</div>
<!-- End .product-single-carousel -->

<!-- <span class="prod-full-screen">
<i class="icon-plus"></i>
</span> -->


</div>

</div>

   
</div>


        <div class="product-slider-description mt-3">

            <div class="row">                   
                <div class="col-8">
                <p class="free-proof">
                Every order will be presented with a Free art proof for approval before production If you would like to see a Free pre-proof before placing your order Please email your request to <a class="art-sup-prom" href="mailto:business_email">art@superiorpromos.com</a></p>

                        <a class="free-pref-proof" href="javascript:void(0);">
                            <button class="btn btn-info btn-proof">Free Pref Proof</button>
                        </a>
                    </p>
                </div>

                <div class="col-4" style="">
                    <img class="img-fluid product-slider-desc-bottom-order" src="{{asset('resources/views/superior/assets/images/equipment.png')}}">
                </div>


            </div>
        </div>

</div>


    <!-- End .product-single-gallery -->



    <div class="col-lg-6 col-md-6 product-single-details">
        <h1 class=" product-name-txt"><?php echo $data['productdetails']->product_name; ?></h1>


<style type="text/css">
.ratings-container span{
font-family: Roboto;
font-style: normal;

font-size: 20px;
line-height: 23px;

align-items: center;
letter-spacing: -0.017em;

color: #212121;
}



.color-selection-error{
    border: solid 2px red;
    border-radius: 5px;
}

.ml-zip{
margin-left:2rem!important;
}


</style>
            <div class="ratings-container">
                <span>Item Number :</span> <span class="item_id text-font-weight-500">#{{$data['product']->product_id}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="product_id" class="product_id" value="{{$data['product']->product_id}}"/>
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

            <!-- step 1 step 2 section  -->

            <!-- <span class="main-color"><b><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalLong">*terms & conditions</a></b></span> -->

            <div class="modal fade" id="exampleModalLong">
                <div class="modal-dialog">
                    <div class="modal-content cart-status-model">

                        <div class="modal-header">

                        <h5 class="modal-title model-title model-title-status">Cart Status</h5>

                        <h5 class="modal-title model-title hidden uppercase-txt model-title-quote">QuickQuote/Pdf</h5>

                            <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                            </button>
                        </div>

                    <div class="modal-body">

                    <div id="generate-quote-print">

                    <div class="generate-quote-section hidden pb-4">

                    <div class="col-md-12  model-title pt-2 pb-2">SuperiorPromos</div> 

                    <hr class="short-divider short_divider with-imprints">

                    <div class="row pb-4 pt-4">

                    <div class="col-md-4">
                    @if($data['product']->product_image!="")
                    <figure>
                    <img class="product-single-image" src="{{$base_url}}/storage/app/{{$data['product']->product_image}}" data-zoom-image="{{$base_url}}/storage/app/{{$data['product']->product_image}}" width="200" height="200" alt="product-img">
                    </figure>
                    @endif
                    </div>


                    <div class="col-md-8">

                    <ul> 
                        @if($data['productdetails']->product_name!="")
                        <li>
                            <div class="row pt-2 pb-2"> 
                                <div class="col-md-12  model-title uppercase-txt">{{$data['productdetails']->product_name}}</div>
                            </div>
                        </li>
                        @endif
                        
                        @if($data['product']->brand_id!="")
                        <li>
                            <div class="row pt-2 pb-2"> 
                                <div class="col-md-12 cart-sub-item-modal">Quick Quote for # {{$data['product']->brand_id}}</div>
                            </div>
                        </li>
                        @endif

                        <li>
                            <div class="row pt-2 pb-2"> 
                                <div class="col-md-12 cart-sub-item-modal">Production time:</div>
                                <div class="col-md-12 currunt-dir">(After Art & Order Confirmation)*</div>
                            </div>
                        </li>

                    </ul>

                    </div>


                    </div> 

<hr class="short-divider short_divider with-imprints">

</div>


                            <div class="row ">
                                <div class="col-md-12 pb-3"><span class="cart-modal-head">Price Details</span></div>
                                <div class="col-md-12">
                                    <ul>
                                        <li>
                                            <div class="row pt-2 pb-2"> 
                                                <div class="col-md-9 cart-sub-item-modal">Quantity :</div>
                                                <div class="col-md-3 cart-sub-item-modal"id="modal_quantity"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row pt-2 pb-2"> 
                                                <div class="col-md-9 cart-sub-item-modal">Price Per Item :</div>
                                                <div class="col-md-3 cart-sub-item-modal" id="per_item_price_modal"></div>
                                            </div>
                                        </li>


                                        <li class="imprint-setprice-li">
                                           
                                            

                                        </li>


                               <li class="additional-color-peritem-li">

<!--                                <div class="row pt-2 pb-2"> 
                                    <div class="col-md-9 cart-sub-item-modal">Imprint Additional Color fee(per item):</div>
                                    <div class="col-md-3 cart-sub-item-modal">fwerfgerwg</div>
                                </div>  -->   

                               </li>
                        



                              <li class="imprint-additional-color-li">

<!--                                   <div class="row pt-2 pb-2"> 
                                    <div class="col-md-10 cart-sub-item-modal">Imprint Additional Color Setup fee:</div>
                                    <div class="col-md-2 cart-sub-item-modal"></div>
                                </div>  --> 

                               </li>


<li>
    <div class="row pt-2 pb-2"> 
        <div class="col-md-9 cart-sub-item-modal">Subtotal</div>
        <div class="col-md-3 cart-sub-item-modal subtotal-txt" id="subtotal-modal"></div>
    </div>
</li>
</ul> 
<hr class="short-divider short_divider with-imprints">
</div> 
</div>



<div class="row pt-3 pb-2 selected-all-suboptions">
    <div class="col-md-12 pb-3"><span class="cart-modal-head">Selected Product Options</span></div>

    <div class="col-md-12">
        <ul>
            <li class="selected-option-data">

<!--                  <div class="row pt-2 pb-2"> 
                    <div class="col-md-9 cart-sub-item-modal">Option Name(suboption name)</div>
                    <div class="col-md-3 cart-sub-item-modal">$500</div>
                </div> -->

           </li>
</ul> 
<hr class="short-divider short_divider with-imprints">
</div> 
</div>





<div class="row pt-3 pb-2">
    <div class="col-md-12 pb-3"><span class="cart-modal-head">Selected Options</span></div>
    <div class="col-md-12">
        <ul>
            <li>
                <div class="row pt-2 pb-2"> 
                    <div class="col-md-9 cart-sub-item-modal">Item Color</div>
                    <div class="col-md-3 cart-sub-item-modal "id="select-color"></div>
                </div>
            </li>




            <li>
                <div class="row pt-2 pb-2"> 
                    <div class="col-md-9 cart-sub-item-modal">Delivery Date :</div>
                    <div class="col-md-3 cart-sub-item-modal" id="asap">ASAP</div>
                </div>
            </li>


        </ul> 
        <hr class="short-divider short_divider with-imprints">
    </div> 
</div>


<div class="row pt-3 pb-2">
    <div class="col-md-12 pb-3"><span class="cart-modal-head">Imprints</span></div>

    <div class="col-md-12">
        <ul>
            <li class="main-imprint-location">

<!--<div class="row pt-2 pb-2"> 
    <div class="col-md-10 cart-sub-item-modal">Main Imprint Location :</div>
    <div class="col-md-2 cart-sub-item-modal">$529.00</div>
</div> -->


</li>
</ul> 
<hr class="short-divider short_divider with-imprints">
</div> 
</div>

</div>



<div class="row genrate-lower-buttons hidden">
     
                    <ul>
                    <li>
                        <div class="row pt-2 pb-2"> 
                            
                            <div class="col-md-auto cart-sub-item-modal gnt-quote"><button class="shipping-art-upload-button uppercase-txt show-quote-option">generate quote</button></div>

                            <div class="col-md-auto cart-sub-item-modal cancel-qte"><button class="cart-status-button btn-back uppercase-txt hidden cancel-qoute">Cancel</button></div>

                        </div>
                    </li>
                    </ul>


                    <ul class="quote-buttons-section hidden">
                    <li>
                        <div class="row pt-2 pb-2"> 
                            
                          <div class="col-md-auto cart-sub-item-modal print-quote-gen"><button class="cart-status-button btn-back uppercase-txt print-quote"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26"><g fill="#4AC9FF" fill-rule="evenodd"><path fill-rule="nonzero" d="M20.9 5.324h-.668V3.838A3.843 3.843 0 0 0 16.394 0H8.336a3.843 3.843 0 0 0-3.838 3.838v1.486h-.609A3.843 3.843 0 0 0 .051 9.162v6.19A3.843 3.843 0 0 0 3.89 19.19h.603v4.867a1.92 1.92 0 0 0 1.916 1.916H18.31a1.92 1.92 0 0 0 1.917-1.916V19.19h.673a3.843 3.843 0 0 0 3.838-3.838v-6.19A3.843 3.843 0 0 0 20.9 5.324zM5.946 3.838A2.39 2.39 0 0 1 8.33 1.453h8.053a2.39 2.39 0 0 1 2.385 2.385v1.486H5.946V3.838zm12.827 20.23c0 .252-.21.462-.463.462H6.408a.466.466 0 0 1-.462-.463v-8.026h12.827v8.026zm4.511-8.71a2.39 2.39 0 0 1-2.384 2.384h-.668v-1.7h.958a.724.724 0 0 0 .727-.727.724.724 0 0 0-.727-.727H3.426a.724.724 0 0 0-.726.727c0 .403.323.726.726.726h1.072v1.701h-.609a2.39 2.39 0 0 1-2.384-2.384v-6.19a2.39 2.39 0 0 1 2.384-2.385H20.9a2.39 2.39 0 0 1 2.385 2.384v6.19z"/><path d="M7.706 19.616h9.253a.724.724 0 0 0 .727-.727.724.724 0 0 0-.727-.727H7.706a.727.727 0 0 0 0 1.453zm9.312 1.518H7.76a.724.724 0 0 0-.727.726c0 .404.323.727.727.727h9.253a.724.724 0 0 0 .727-.727.723.723 0 0 0-.722-.726zm3.865-12.957h-1.475a.724.724 0 0 0-.726.727c0 .403.323.726.726.726h1.475a.724.724 0 0 0 .727-.726.724.724 0 0 0-.727-.727z"/></g></svg></button></div>


                            <div class="col-md-auto cart-sub-item-modal pdf-quote-gen"><button class="cart-status-button btn-back uppercase-txt pdf-quote"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 26"><g fill="#4AC9FF" fill-rule="evenodd" stroke="#4AC9FF" stroke-width=".4"><path fill-rule="nonzero" d="M23.522 7.495L17.408 1.14a.462.462 0 0 0-.332-.14H7.963c-1.02 0-1.85.83-1.85 1.849v6.459H2.42c-.763 0-1.384.62-1.384 1.383v6.926c0 .762.62 1.383 1.384 1.383h3.693v4.154A1.85 1.85 0 0 0 7.963 25h13.839a1.85 1.85 0 0 0 1.85-1.845V7.815a.462.462 0 0 0-.13-.32zM17.19 2.246l5.02 5.216h-5.02V2.246zM2.42 18.076a.461.461 0 0 1-.46-.46v-6.925a.46.46 0 0 1 .46-.46h12.463a.46.46 0 0 1 .46.46v6.926a.46.46 0 0 1-.46.46H2.42zm20.308 5.08a.925.925 0 0 1-.926.92H7.962a.926.926 0 0 1-.926-.922V19h7.847c.763 0 1.384-.62 1.384-1.383V10.69c0-.763-.62-1.383-1.384-1.383H7.036v-6.46c0-.51.416-.925.927-.925h8.304v6c0 .255.206.462.461.462h6v14.77z"/><path fill-rule="nonzero" d="M6.554 12.714a1.04 1.04 0 0 0-.57-.388c-.149-.04-.466-.06-.953-.06H3.747v3.965h.8v-1.496h.522c.363 0 .64-.019.83-.057a1.132 1.132 0 0 0 .752-.578c.089-.166.133-.37.133-.614 0-.316-.077-.573-.23-.772zm-.686 1.091a.525.525 0 0 1-.25.195c-.106.041-.317.062-.633.062h-.438v-1.125h.387c.288 0 .48.009.576.027a.55.55 0 0 1 .322.176.512.512 0 0 1 .127.357c0 .117-.03.22-.09.308zm4.764-.455a1.732 1.732 0 0 0-.379-.643 1.326 1.326 0 0 0-.597-.365c-.173-.05-.425-.076-.755-.076H7.438v3.965h1.506c.296 0 .532-.028.709-.084.236-.076.424-.181.562-.316a1.75 1.75 0 0 0 .425-.7c.081-.237.122-.518.122-.845 0-.371-.044-.683-.13-.937zm-.779 1.627c-.054.178-.124.305-.21.383a.739.739 0 0 1-.323.165 2.19 2.19 0 0 1-.484.038H8.24v-2.626h.36c.326 0 .545.013.656.038.15.032.274.094.37.186.098.092.174.22.228.384.054.164.081.4.081.706 0 .307-.027.549-.081.726z"/><path d="M14.164 12.937v-.67h-2.718v3.964h.8v-1.685h1.655v-.67h-1.655v-.94z"/></g></svg></button></div>
                                        
                            <div class="col-md-auto cart-sub-item-modal qoute-email-div"><button class="cart-status-button btn-back uppercase-txt qoute-email-send"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"><g fill="#4AC9FF" fill-rule="evenodd" stroke="#4AC9FF" stroke-width=".5"><path fill-rule="nonzero" d="M24.994 10.175a.378.378 0 0 0-.016-.082.4.4 0 0 0-.023-.068.359.359 0 0 0-.04-.062.377.377 0 0 0-.053-.062c-.007-.005-.01-.013-.016-.018l-3.847-2.988V3.799a1.2 1.2 0 0 0-1.2-1.2h-4.335L13.728 1.25a1.186 1.186 0 0 0-1.458 0l-1.736 1.348H6.199a1.2 1.2 0 0 0-1.2 1.2v3.096L1.153 9.883c-.007.005-.01.013-.016.018a.375.375 0 0 0-.053.062.357.357 0 0 0-.04.062.395.395 0 0 0-.023.068.38.38 0 0 0-.016.08c0 .009-.005.016-.005.024V23.8c0 .254.083.502.235.706l.005.01.013.012c.225.296.574.47.946.472h21.6c.373-.002.724-.177.949-.474.003-.004.008-.005.01-.01.003-.003.004-.007.006-.01a1.19 1.19 0 0 0 .235-.706V10.2c0-.009-.005-.016-.005-.024zM12.759 1.882a.384.384 0 0 1 .477 0l.923.717h-2.32l.92-.717zM2.299 24.2l10.46-8.125c.14-.11.337-.11.477 0L23.698 24.2H2.3zm21.9-.624l-10.47-8.132a1.187 1.187 0 0 0-1.46 0L1.8 23.575V10.808l6.555 5.09a.4.4 0 1 0 .49-.633l-6.66-5.17L5 7.908v3.09a.4.4 0 0 0 .8 0v-7.2a.4.4 0 0 1 .4-.4h13.6c.22 0 .4.18.4.4v7.2a.4.4 0 1 0 .8 0v-3.09l2.814 2.187-6.671 5.18a.4.4 0 1 0 .49.632l6.567-5.1v12.768z"/><path d="M17.799 10.599v-1.6a4.8 4.8 0 1 0-4.8 4.8.4.4 0 1 0 0-.8 4 4 0 1 1 4-4v1.6a.8.8 0 1 1-1.6 0v-1.6a.4.4 0 1 0-.8 0 1.6 1.6 0 1 1-1.6-1.6.4.4 0 1 0 0-.8 2.4 2.4 0 1 0 1.617 4.168 1.596 1.596 0 0 0 3.183-.168z"/></g></svg></button></div>
                            
                        </div>
                    </li>

                    </ul>





                     <div class="row align-items-center qoute-email-section hidden">

                        <div class="col-md-4">  

                          <label for="quote-sender" class="form-label maxcolor-txt">Sender's Name</label>
                          <input type="email" class="form-control qoute-email" id="quote-sender">

                        </div>

                        <div class="col-md-5">    
                          <label for="quote-reciver" class="form-label maxcolor-txt">Receiver's email</label>
                          <input type="email" class="form-control qoute-email" id="quote-reciver">  
                        </div>

                    <div class="col-md-3 pt-4 send-email-q">
                        <button type="button" class="cart-status-button btn-back uppercase-txt send-email-quote">Send</button>
                    </div>

                    </div>
       </div>









</div>
</div>
</div>
</div>


<div class="tabs mb-1">

    <ul class="nav nav-tabs justify-content-end" role="tablist">

        <li class="nav-item">
            <a class="nav-link step-link">Step</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active step-link step-link1 cursor-none" id="tab-popular1" data-toggle="tab" href="#popular-content1" role="tab" aria-controls="popular-content1"  aria-selected="true">1/</a>
        </li>
        <li class="nav-item">
            <a class="nav-link step-link cursor-none" id="recent-tab1" data-toggle="tab" href="#recent-content1" role="tab" aria-controls="recent-content1" aria-selected="true">2</a>
        </li>
    </ul>

    
    <!-- step 1 section -->

    <div class="tab-content">
        <div class="tab-pane fade show active" id="popular-content1" role="tabpanel" aria-labelledby="tab-popular1">
       
       @if($data['product_sub_images']!="")

        
        <?php $color_count=0;?>
        @foreach($data['product_sub_images'] as $product_sub_image1)
        <?php $color_count++;?>
        @if($color_count==1)
        <input type="hidden" name="iscolor" value="1" id="is_color"/>
        @endif
        @endforeach
 


            <div class="price-box">
               <div class="item-selection">
                <span class="item-selection">Item Color Selection</span><br><br>

                <div class="brands-section mt-2 mb-3 appear-animate color-error-section" data-animation-delay="200" data-animation-name="fadeIn" data-animation-duration="1000">
                       <!--  <div class="headding">
                            <h4 class="section-title text-transform-none">Featured Brands</h4>
                        </div> -->
                        <div class="brands-slider owl-carousel bg-white owl-theme nav-circle images-center" data-owl-options="{
                                'margin': 1,
                                'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                                'nav': true,
                                'autoplay':false
                            }">

                     
               @foreach($data['product_sub_images'] as $product_sub_image)

               @if($product_sub_image->image_src!="")
                <style type="text/css">
                .radios label input[type=radio]:checked+span.address_icon.select_icon {
                    background: url({{$base_url}}/storage/app/{{$product_sub_image->image_src}}) no-repeat -4px 0px;
                }

                .radios label input[type=radio]+span.address_icon.select_icon {
                    background: url({{$base_url}}/storage/app/{{$product_sub_image->image_src}}) no-repeat -4px 0px;
                }

                .owl-carousel .owl-item {
                position: relative;
                min-height: 0px;
                float: left;
                -webkit-backface-visibility: hidden;
                -webkit-tap-highlight-color: transparent;
                -webkit-touch-callout: none;
                 }

            </style>

            <figure class="figure-content">
             <div class="item_color_select d-inline-block radios proposerAddress">
             <label> <input type="radio" name="address" c-name="{{$product_sub_image->color->name}}" value="{{$product_sub_image->color_id}}" class="color-id-selected"> 
                <span><i class="address_icon select_icon" id="selected-color-main">
                    <img class="color-image" src="{{$base_url}}/storage/app/{{$product_sub_image->image_src}}" width="80" height="110" alt="product-thumbnail">
                </i>
            </span>
        </label>
    </div>
</figure>
@else
<figure class="figure-content">
<div class="item_color_select d-inline-block radios proposerAddress mb-2">
<label><input type="radio" name="address" c-name="{{$product_sub_image->color->name}}" value="{{$product_sub_image->color_id}}" class="color-id-selected" id=""> <span style="background-color:{{$product_sub_image->color->color_hex}}; margin: 0px 2px 0px 2px!important;">
</span></label> 
</div>
</figure>
@endif
@endforeach

</div>
<!-- End .brands-slider -->
</div>       
</div>

<div class="col-md-12 text-center pt-2 pb-2 color-error-lable hidden"><span class="text-danger">Colors selection is required</span></div>
</div>

<!-- End .price-box -->

<hr class="short-divider short_divider">
<br>
@else
<input type="hidden" name="iscolor" value="0" id="is_color"/>
@endif


<div class="pricing-table">


<h5 class="priceing-title">Pricing Table</h5>

<div class="row">

<div class="col-md-8">

<div class="pricing-table-container pl-5">

   <div class="row">

    <div class="col-md-2">
     <div class="table-col-price">
     <div class="row table-head-txt qty-text">QTY</div> 
     <div class="row table-head-txt qty-text">REG</div>  
     <div class="row table-head-txt qty-text">SALE</div>  
    </div>
    </div>
    



    <div class="row horizontal-scroll-table">
    <?php $count=0;?>
    @foreach($data['product_pricing'] as $price)
    <?php $count++;?>
     <div class="quantity-container-price" value="{{$price->count_from}}">
    @if($count==1)
    <input type="hidden" class="min-quantity" name="min-quantity" value="{{$price->count_from}}">
    @endif
    @if($count==1)
     <div class="col Quantity-table qty-text">{{$price->count_from}}Min</div> 
    @else
     <div class="col Quantity-table qty-text">{{$price->count_from}}</div>
    @endif
     <div class="col qty-text"><strike class="regular-price">${{$price->per_item_price}}</strike></div> 
     <div class="col color-5d9136 sale-price sale-price-table qty-text">${{$price->per_item_sale_price}}</div>
     </div>
    @endforeach
    </div>
  
  </div>

</div>

</div>


<!--<table class="table tabelquantity table-bordered float-left pricing_table_content" style="margin-bottom: 0;">
        <thead> 
            <tr>
                <th scope="col" style="width:1%;" class="table-head-txt qty-text">Quantity</th>
                <th scope="col"   style="width:1%;" class="table-head-txt qty-text">Regular Price</th>
                <th scope="col"  style="width:1%;" class="table-head-txt qty-text">Sale</th>
            </tr>
        </thead>

        <tbody class="pricing_table_tbody"> 
            <?php $count=0;?>
            @foreach($data['product_pricing'] as $price)
            <?php $count++;?>
            <tr>
                @if($count==1)
                <input type="hidden" class="min-quantity" name="min-quantity" value="{{$price->count_from}}">
                @endif
                @if($count==1)
                <td   style="width:7%;" class="Quantity-table qty-text">Min {{$price->count_from}}</td>
                @else
                <td  style="width:7%;" class="Quantity-table qty-text">{{$price->count_from}}</td>
                @endif
                <td   style="width:7%;" class="qty-text"><strike class="regular-price ">${{$price->per_item_price}}</strike></td>
                <td  style="width:7%;"  class="color-5d9136 sale-price sale-price-table qty-text" value="{{$price->per_item_sale_price}}">${{$price->per_item_sale_price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table> -->

<div class="col-md-4">
    <div class="type-quantity float-left">
        <label class="table-head-txt">Type Quantity</label><br>
        <input type="number" id="user-quanity" name="" class="type-quantity-input" placeholder="">
         <label class="text-danger pt-2 min-error hidden">Min qty:</label>
    </div>
</div>

</div> 

</div>


<div style="clear: both;"></div>
@if($data['product_option']!="[]")
<br>
<hr class="short-divider short_divider">
<br>
@endif

@if($data['product_option']!="[]")
<div class="product-options">
 <span class="priceing-title" >Product Options</span>
<div class="row pt-5">
@foreach($data['product_option'] as $option) 
<div class="col-md-6">  
<div class="select-custom">
<label class="form-lbl p-option-txt">{{$option->name}}</label>
<select name="orderby" class="form-control txt-lbl product-option-slct suboption-select suboptionnotavailable{{$option->id}}" optn_id="{{$option->id}}">
<option value="0" selected="selected" disabled="">Select
</option>
@foreach($option->product_sub_option as $sub_option)
<option value="{{$sub_option->id}}">{{$sub_option->name}}</option>
@endforeach
</select>
</div>  
</div>
@endforeach
</div>
</div>
@endif

<div style="clear: both;"></div>
<br>
<hr class="short-divider short_divider">
<br>


<div style="clear: both;"></div>
<!-- for product details -->
@if($data['product_Apparels']!="[]")
<div class="product-apparel">
 <span class="priceing-title" >Product Apparel</span>


<div class="row pt-3">
      @foreach($data['product_Apparels'] as $Apparel)
      <div class="col-md-auto text-center">
          <div class="form-group">
        <label class="form-control-label price-txt  product_apparel-lbl"pa-id="{{$Apparel->id}}">{{$Apparel->apparel->apparel_name}}</label>
              <input type="number" name="apparel-qty[]"  class="form-control thresold-i apparelText app-qty" placeholder="Qunatity">
          </div>        
    </div>
    @endforeach
</div>

</div>

<div style="clear: both;"></div>
<br>
<hr class="short-divider short_divider">
<br>
@endif



<div class="imprint-options">
    <h5 class="priceing-title">Imprint Options</h5>
    <div class="pb-4">
<!-- 
<ul class="config-swatch-list">
<li class="active d-inline-flex decorated-imprint"  id="decorated-imprint" tabindex="1" value="sdfsdag" name='color_id'>
<a href="Javascript:void(0);" class="imrintcheck" style="margin-right: 10px;border:1px solid gray;border-radius: 2px;"></a><b><p>Decorated (With Your logo or text)</p></b>
</li><br>
</ul> -->
        @if($data['imprints']!="[]")
        <span class="float-left file-txt"><input class="decorated-imprint form-check-input check-radio" type="checkbox" name="decorated" checked="" id="decorated">
            <label class="form-check-label file-txt" for="decorated">Decorated (With Your logo or text)</label>
        </span>
        @else
        <span class="float-left file-txt">
        <label class="form-check-label file-txt ml-0" for="decorated">Imprint options not available</label>
      </span>
        @endif



        @if($data['imprints']!="[]")
        <span class="float-right file-txt"> <input class="blank-goods-imprint form-check-input check-radio" type="checkbox" name="blank-goods" id="blank-product"> 
           <label class="form-check-label file-txt" for="blank-product">Blank Goods (Nothing will be imprinted) </label>
       </span>
       @else
        <span class="float-right file-txt"> <input class="blank-goods-imprint form-check-input check-radio" type="checkbox" name="blank-goods" checked="" id="blank-product"> 
           <label class="form-check-label file-txt" for="blank-product">Blank Goods (Nothing will be imprinted) </label>
       </span>
       @endif


   </div>
   <div class="clearfix mb-1"></div>
   @if($data['imprints']!="[]")

   <span class="warning-msg pt-2 pb-2">
    Please select an imprint location(s) below, additional cost may apply for multiple locations.
   </span>
 
     <div class="col-md-12 imprint-error pt-3 pb-3 text-center hidden">
       <span class="warning-msg text-danger">
        <b>Location selection is required</b>
       </span>
    </div>

   <hr class="short-divider short_divider">
@endif
</div>



@if($data['imprints']!="[]")
@foreach($data['imprints'] as $imprint)
<div class="front-imprint-options">
    <div class="row">
        <div class="col-6 available-imnt pt-3">
            <span class="file-txt"><input class="form-check-input front-imprint-input imprint-main-check-<?php echo $imprint->id;?>" type="checkbox" name="imprintcheck[]" value="<?php echo $imprint->id;?>"id="{{$imprint->id}}impnt" >
                <label class="form-check-label file-txt" for="{{$imprint->id}}impnt">{{$imprint->name}}</label>
            </span>
        </div>

        @php
        $imprint_prices=$imprint->imprint_price;

        if($imprint_prices!="[]"){

            $setup_price=$imprint_prices[0]->setup_price;
            $item_price=$imprint_prices[0]->item_price;
            $color_setup_price=$imprint_prices[0]->color_setup_price;
            $color_item_price=$imprint_prices[0]->color_item_price;

        }else{
            
            $setup_price="";
            $item_price="";
            $color_setup_price="";
            $color_item_price="";
         }


        @endphp
        <div class="col-6 float-right">
            <span class="float-right warning-msg">
                Price includes 1 color imprint
            </span>

            <span class="float-right file-txt">
             <b class="set-fee-{{$imprint->id}} file-txt" value="{{$setup_price}}">Set Fee : ${{$setup_price}}</b>
         </span>
         <span class="float-right file-txt">
            <b class="file-txt">Additional Color Setup fee : ${{$color_setup_price}}</b>
        </span>
        <span class="float-right file-txt">
         <b class="file-txt">Additional Color fee (per item): ${{$color_item_price}}</b>  
     </span>
     <span class="clearfix"></span>
 </div>

</div>



<div class="row max-color-row">

    <div class="col-12" id="select-color-option-<?php echo $imprint->id;?>">
        <label class="maxcolor-txt">Max Colors :{{$imprint->max_colors}}</label><br>
        
        <div class="col-md-12 pl-0">
            <select class="select-max-colors select-max-colors-{{$imprint->id}}" name="imp_color[]">
                <?php  $count=0;?>
                @foreach($imprint->imprint_colors as $imprint_color)
                <?php $count++;?>
                @if($count==1)
                <option selected="true" value="{{$imprint_color->colors->id}}">{{$imprint_color->colors->name}}</option>
                @else
                <option value="{{$imprint_color->colors->id}}">{{$imprint_color->colors->name}}</option>
                @endif
                @endforeach
            </select>
        </div>

    </div>

    

    <div class="col-md-12 ">
     <button class="cart-status-button mt-2 mb-2 hidden" id="add-color-btn-<?php echo $imprint->id;?>">Add color +</button>
    </div>

</div>


</div>
@endforeach
@endif    


<br>
<hr class="short-divider short_divider with-imprints">
<br>


<div class="cart-order-proceed">
    <div class="row">
        <div class="col-12 nextstep">
            <a class="btn-anchor" href="javascript:void(0);"data-toggle="modal" data-target="#exampleModalLong"><button class="cart-status-button">Cart Status</button></a>

            <a class="btn-anchor" href="javascript:void(0);" data-toggle="modal" data-target="#order_process_guid"><button class="order-proceed-guide-button">Order Proceed Guide</button></a>

            <a class="btn-anchor step2" href="javascript:void(0);"><button class="shipping-art-upload-button" >Proceed to shipping and Art Upload</button></a>

        </div>
    </div>
</div>
</div>



<!-- for order process guide -->


            <div class="modal fade" id="order_process_guid">
                <div class="modal-dialog modal-dialog-ord-process">
                    <div class="modal-content modal-fullscreen-sm-down">

                        <div class="modal-header">
                            <h5 class="modal-title model-title">Order Proceed Guide</h5>
                            <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          
                         <div class="row pt-3">
                             <div class="col-md-6">
                              
                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">1</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-1.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                      An order can be placed online or by calling our customer service department at 
                                </p>
                                <p class="no-process">
                                   888-577-6667 
                                </p>
                               </div>
                              </div>  


                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>


                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">2</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-2.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                Email your artwork/logo/text to:<a href="mailto:business_email" class="email-txt">art@superiorpromos.com </a> include your order # in the subject line.
                                </p>
                               </div>
                              </div>

                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>


                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">3</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-3.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                      We provide unlimited FREE digital proofs.
                                      Art proof(s) will be available within 24-48 hours via email & also uploaded to you account for approval.
                                </p>
                               </div>
                              </div>

                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>


                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">4</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-4.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                      Proof approval is required before an order moves to production. Approvals woll be accepted via email or in your online account.
                                      For any questions contact the art department at 
                                      <a href="mailto:business_email" class="email-txt">art@superiorpromos.com</a>
                                </p>
                               </div>
                              </div>

                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>

                             </div>



                             <div class="col-md-6">
                              
                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">5</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-5.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                      After art approval is received, the order will move into production. Production time varies by product and is listed on the product page. If a rush option is choosen production time will be adjusted accordingly.
                                </p>
                               </div>
                              </div>  


                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>


                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">6</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-6.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                      An estimated ship date for your order will be set within 24-48 hours after the order is sent to production. If required, contact customer service for expedited shipping options.
                                </p>
                               </div>
                              </div>

                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>


                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">7</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-7.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                After the order ships will emails full tracking information and cost of shipping(if applicable).
                                </p>
                               </div>
                              </div>

                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>


                              <div class="row d-flex align-items-center">
                               <div class="col-md-2">
                                <figure>
                                <img class="img-curve" src="{{$base_url}}/resources/views/superior/assets/images/Capture.png"/>
                                <div class="caption-centered">8</div> 
                                </figure>
                               </div>

                               <div class="col-md-3">
                                <figure>
                                <img src="{{$base_url}}/resources/views/superior/assets/images/order-process-8.png"/> 
                                </figure>
                               </div>
                               <div class="col-md-7 ">
                                <p class="process-txt">
                                Final Invoice(s) will be available within 48 hours after the order ships. Invoice(s) can be viewed in your online account or requested by emailing the Billing Department at 
                                <a href="mailto:business_email" class="email-txt">art@superiorpromos.com</a>
                                </p>
                               </div>
                              </div>

                                <br>
                                <hr class="short-divider short_divider with-imprints">
                                <br>
                                
                             </div>

                            </div>
                        </div>
                      </div>
                  </div>
              </div>

<!-- step 2 section -->

<div class="tab-pane fade" id="recent-content1" role="tabpanel" aria-labelledby="recent-tab1">

    <span class="art-work pt-2 pb-2">Artwork/ Comments</span>

    <span class="file-txt">Click here to upload your art files.</span>

    <span class="doc-txt pt-2 pb-2">Uploaded Format : JPGE, PNG, PDF, DOC, PSD, EPS, AI, GIF,  TIFF</span>



    <div class="inputfile-box pt-3 pb-3">
        <input type="file" id="file" class="inputfile" name="files[]" onchange='javascript:updateList()' multiple="">

        <label for="">
            <span id="file-name" class="file-box u-here upload-text" >Upload File</span>
            <label for="file" style="display:revert;"><i class="fa fa-upload file-icon" aria-hidden="true"></i></label>  
        </label>

    </div>

    <div class="pt-3 pb-3">
        <span class="mail-txt">Or Click here to email your artwork/logo or email directly to<a href="mailto:business_email" class="color-b">art@superiorpromos.com</a></span>
    </div>


    <!-- <textarea class="artproof_box" id="note-editable"></textarea> -->


      <div class="form-group">
      <textarea class="form-control atrt-textarea" id="note-editable" placeholder="Type your comments, instruction or quesions here" rows="3"></textarea>
     </div>




    <br>
    <hr class="short-divider short_divider">
    <br>
    
    <span class="art-work">In Hand Date and Shipping Selection</span>
    <div class="pt-3 pb-3">
        <span class="p-time">Production Time :</span>
          @if($data['product']->production_time_from == $data['product']->production_time_to)
          <span class="day-txt"><?php echo $data['product']->production_time_from ?> Working Days</span>
          @else
          <span class="day-txt"><?php echo $data['product']->production_time_from ?> - <?php echo $data['product']->production_time_to ?> Working Days</span>
          @endif
    </div>

    <span class="day-txt">When do you need to receive your order?</span>

    <div class="row pt-3 pb-3 orderbydate">
        <div class="col-md-7">
            <div class="form-group form-check ">
                <input type="checkbox" class="form-check-input nodeadline check-radio" id="exampleCheck1" checked="">
                <label class="form-check-label date-section-row" for="exampleCheck1">ASAP-No Deadline.Regular production time</label> 
            </div>

        </div>   

        <div class="col-md-5 orderbydate orderbydate-yes"> 
           
           <div class="row">
            <div class="col-md-7 p-0">
            <div class="form-group form-check">
            <input type="checkbox" class="form-check-input deadline-date check-radio" id="exampleCheck3">
            <label class="form-check-label date-section-row" for="exampleCheck3">Need this order by</label>
            </div>
            </div>
         <div class="col-md-5 p-0">
          <input  type="date" class="date-input ship-date" id="ship-delivery-date" name="trip-start"value="">
         </div>
        
        </div>

       <div class="col-md-12 date-error text-center hidden"><span class="text-danger"><b>Please Select Order</b></span></div>

        </div>
     
 </div>



 <div class="form-group form-check">
    <input type="checkbox" class="form-check-input check-radio zip-checkbox" id="zip-checkbox" checked="">
    <div class="row">
     <div class="col-md-6"> <label class="form-check-label p-time p-2 ml-zip" for="zip">Enter Zip Code to Get Shipping Cost</label></div>
     <div class="col-md-6 p-0">
    <input  type="number" class="date-input zipcode-input zipcode " id="zip" name="zipcode" value="" placeholder="">
    </div>
    </div>

    <div class="col-md-12 zip-error text-center hidden"><span class="text-danger"><b>Please Enter Zip Code</b></span></div>

</div>


<div class="form-group form-check">
    <input type="checkbox" class="form-check-input is-ship check-radio" id="shipperac">
    <label class="form-check-label file-txt p-time p-2" for="shipperac">Select if would like to Use Own Shipper Account</label>
</div> 




<div class="row pl-5">   

    <div class="col">

            <label class="lbl-ship">Account Number<span class="required"></span></label>
            <input  type="text" class="form-control txt-lbl ac-input acnumber" id="acnumber" name="acnumber" value="" placeholder="Account No">


<!--         <div class="select-custom">
            <label class="lbl-ship">Account Number<span class="required"></span></label>
            <select name="orderby" class="form-control txt-lbl acnumber">
                <option value="" selected="selected">Account Number</option>
                <option value="123456789">123456789</option>
            </select>
        </div> -->

    </div>

    <div class="col">
     <div class="select-custom">
        <label class="lbl-ship">Carrier<span class="required"></span></label>
        <select name="orderby" class="form-control txt-lbl carrier">
           <option disabled="" value="" selected="selected">Select Carrier</option>
           <option value="fedfx">Fedex</option>
           <option value="ups">ups</option>
       </select>
   </div>
</div>


<div class="col">
 <div class="select-custom">
    <label class="lbl-ship">Method<span class="required"></span></label>
    <select name="orderby" class="form-control txt-lbl method">
        <option disabled="" value="" selected="selected">Select Method</option>
        <option value="Ground">Ground</option>
        <option value="2 Day Air">2 Day Air</option>
        <option value="3 Day Air">3 Day Air</option>
        <option value="Overnight">Overnight</option>
    </select>
</div>
</div>
</div>  

<div class="col-md-12 account-error text-center hidden"><span class="text-danger"><b>Please select all won shipping account options</b></span></div> 

<p class="pt-2 pl-5 mail-txt">Please NOTE the following: (Only for Ceramic Goods).</p>

<p class="pt-2 pl-5 ac-notice">If you are purchasing <b>Ceramic Mugs</b> and will be using <b>Your Own Carrier</b> account for shipping, a <b>$5 per box</b> charge will apply for break resistant packaging. Most ceramic mugs are packaged 36/per box or 24/box depending on the size of the mug. This fee will be added after the order ships.</p>


<div class="form-group form-check">
    <input type="checkbox" class="form-check-input outside check-radio" id="outside">
    <label class="form-check-label file-txt p-time p-2" for="outside">Shipping Outside of the US (Canada or other)</label>

    <p class="pt-2 pl-5"><span class="mail-txt ">Taxes, duties & shipping will be billed at time of shipment. To request a quote email<a href="mailto:business_email" class="color-b">info@superiorpromos.com</a></span></p>
</div> 

<br>
<hr class="short-divider short_divider">
<br>

@if($data['product']->custom_method!=="null")
<div class="form-group form-check pb-3">
    <input type="checkbox" class="form-check-input coustomship check-radio" id="coustomship" cost="{{$data['product']->custom_cost}}">
    <label class="form-check-label file-txt p-time p-2" for="coustomship">Custom Shipping Cost - {{$data['product']->custom_method}} - ${{$data['product']->custom_cost}}</label>
</div> 
@endif

<div class="cart-order-proceed pt-3 pb-3 ">
   <div class="row">
    <div class="col-12 previousstep">
        <a class="btn-anchor step1" href="javascript:void(0);"><button class="cart-status-button btn-back">Back</button></a>
        <a class="btn-anchor" href="javascript:void(0);"data-toggle="modal" data-target="#exampleModalLong"><button class="cart-status-button btn-back">Cart Status</button></a>

        <a class="btn-anchor" href="javascript:void(0);"data-toggle="modal" data-target="#exampleModalLong"><button class="order-proceed-guide-button btn-guid"> Generate Quote</button></a>

        <a class="btn-anchor"><button class="shipping-art-upload-button cart-add" type="button" >Add to Cart</button></a>

    </div>
</div>
</div>



</div>

</div>


</div>
</div>



<br>



<!-- for notification -->
<button type="button" style="visibility:hidden;" class="date-notification-btn" data-toggle="modal" data-target="#date-notification">DateNotification</button>
<div class="modal fade" id="date-notification">
<div class="modal-dialog pt-10">
<div class="modal-content admin-modal" style="border-radius: 10px; min-height: 171px;">
<div class="modal-header modal-header-notification">
<div class="row">
<div class="col-md-12"><h4 class="modal-title model-title text-danger">PLEASE NOTE!</h4></div>
</div>
</div>
<div class="modal-body p-0">
<div class="col-md-12 please-note">
In-hand date is determined by the item's production time, transit time and type of shipping method selected. Number of imprint colors / locations can also be a factor. If there is an issue with the selected in-hand date based on any of the aforementioned factors. Customer Service will review the order and contact you to insure the order arrives on time.
</div>
<div class="col-md-12 text-center pt-4">
<button type="button" class="close close-notification" data-dismiss="modal"><span class="close-modal-btn btn-close-notification">Ok</span>
</button>
</div>
</div> 
</div>
</div>
</div>
<!-- for notification-->

<!--       <hr class="short-divider short_divider">
            <br>

            <div class="cart-order-proceed">
             <div class="row">
                <div class="col-12">
                    <a class="btn-anchor" href="javascript:void(0);"><button class="cart-status-button">Cart Status</button></a>
                    <a class="btn-anchor" href="javascript:void(0);"><button class="order-proceed-guide-button">Order Proceed Guide</button></a>
                    <a class="btn-anchor" href="javascript:void(0);"><button class="shipping-art-upload-button">Proceed to shipping and Art Upload</button></a>

                    
                </div>

            </div>
        </div> -->





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
            <!-- End .product-single-container -->

            <div class="product-single-tabs ">
                <ul class="nav nav-tabs-description-part" role="tablist">
                    <li class="nav-item" style="width: 100%;">
                        <a class="nav-link active" id="product-tab-prod-info" data-toggle="tab" href="#product-prod-info-content" role="tab" aria-controls="product-prod-info-content" aria-selected="true" style="width: 100%;text-align: left;">Product Information</a>
                    </li>

                    <!-- <li class="nav-item">
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
                    </li> -->

        <!-- <li class="nav-item">
            <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
        </li> -->
    </ul>

    <div class="tab-content" style="margin-left: 2%;">

        <div class="tab-pane fade show active" id="product-prod-info-content" role="tabpanel" aria-labelledby="product-tab-prod-info">
            <div class="product-prod-info-content">
                <h5 class="tab-des-txt" style="font-size:20px;margin-bottom: 0.5rem;margin-top: 1.5rem;">Description:</h5>
                <ul class="product-prod-info-ul">
                    <li class="product-prod-info-li description-txt">
                     <i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Silicone skin/case with Aluminum carabiner to attach to backpack, purse or belt loop so you always keep tabs on your wireless earbuds.
                     
                 </li>
                 <li class="product-prod-info-li description-txt"><i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Earbuds not included.</li>
                 <li class="product-prod-info-li description-txt"><i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Carabiner measures: 1.57"w x 0.86"h x 0.125"d.</li>
<!--                     <li class="product-prod-info-li">Step up charge is $55.00 per color, per location.</li>
                    <li class="product-prod-info-li">For additional location, add a $45 running charge per piece</li>
                    <li class="product-prod-info-li">For additional location, add a $45 running charge per color, per piece</li>
                    <li class="product-prod-info-li">2 Color MAX</li> -->
                </ul>
                <h5 class="tab-des-txt" style="font-size:20px; margin-bottom: 0.5rem;margin-top: 1.5rem;">Details:</h5>
                 <ul class="product-prod-info-ul">
                    <li class="product-prod-info-li description-txt">
                   <i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Minimum Order Amount: &nbsp;<b>200</b>
                     
                 </li>
                 <li class="product-prod-info-li description-txt">
                   <i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Production time: &nbsp;<b>5 - 10 working days</b>
                     
                 </li>
                 <li class="product-prod-info-li description-txt">
                  <i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i> Product Dimensions: &nbsp;<b>1.88" x 2.16" x 0.86"</b>
                     
                 </li>  
                    <li class="product-prod-info-li description-txt">
                   <i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Imprint Area:  &nbsp;<b>(Front Imprint:1" w x .75" h), (Back Imprint:1" w x .75" h)  </b>
                     
                 </li>  


                </ul>

                
            <h5 class="tab-des-txt" style="font-size:20px; margin-bottom: 0.5rem;margin-top: 1.5rem;">Pricing Information:</h5>
             <ul class="product-prod-info-ul">
                    <li class="product-prod-info-li description-txt">
                    <i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Price includes a one color, one location imprint.
                     
                 </li>
                 <li class="product-prod-info-li description-txt"><i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>Setup charge is $55.00 per color, per location.</li>
                 <li class="product-prod-info-li description-txt"><i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>For additional location, add a $.45 running charge per piece.</li>
                  <li class="product-prod-info-li description-txt"><i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>For additional colors, add a $.45 running charge per color, per piece.</li>
                  <li class="product-prod-info-li description-txt"><i class="fa fa-circle" style="font-size:6px;margin-right: 10px;"></i>2 Color Max.</li>

                </ul>

            
            </div>
            <!-- End .product-desc-content -->
        </div>
        <!-- End .tab-pane -->






        <div class="tab-pane fade " id="product-description-content" role="tabpanel" aria-labelledby="product-tab-desc">
            <div class="product-description-content">
                <ul class="product-description-content-ul">
                    <li class="product-description-content-li description-txt">       
                       <?php echo $data['productdetails']->description ?>                   
                   </li>


<!--                     <li>
                        Earbuds not included.
                    </li>
                    <li>Carabiner measures: 1.57"w x 0.86"h x 0.125"d.
                    </li>
                -->
            </ul>
        </div>
        

    </div>
    <!-- End .tab-pane -->
    <div class="tab-pane fade " id="product-details-content" role="tabpanel" aria-labelledby="product-tab-details">
        <div class="product-details-content">
            <ul class="product-details-content-ul">
                <li>
                    <div class="row">
                        <?php
                        $minammount=$data['product_pricing']->where('per_item_sale_price')->first();
                        ?>
                        @if($minammount!=[])
                        <div class="col-2 description-txt">
                            Minimum Order Amount: 
                        </div>
                        <div class="col-10 description-txt">
                            $<?php echo $minammount->per_item_sale_price; ?>
                        </div>
                        @endif
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-2 description-txt">
                            Production Time: 
                        </div>
                        <div class="col-10 description-txt">
                            <?php echo $data['product']->production_time_from ?> - 
                            <?php echo $data['product']->production_time_to ?> working days
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row description-txt">
                        <div class="col-2">
                            Product Dimenssion: 
                        </div>
                        <div class="col-10 description-txt">
                            <?php echo $data['product']->dimension ?>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="row">
                        <div class="col-2 description-txt">
                            Imprint Area: 
                        </div>
                        <div class="col-10 description-txt">
                            <?php echo $data['product']->imprint_area ?>
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
                <div class="col-8">
                    <form action="" method=""  enctype="multipart/form-data">
                        <table id="shipping-estimate-table-input">
                            <thead>
                                <tr>
                                    <th class="esti-txt">Type Quantity</th>
                                    <th class="esti-txt">Zip Code</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-0">
                                    <td><input class="des-txt" type="number" name="quanity" placeholder="Type Quantity"></td>
                                    <td><input class="des-txt" type="text" name="" placeholder="Zip code"></td>
                                    <td><button type="button" class="btn-shop-cost">Shopping Cost</button></td> 
                                </tr>

                            </tbody>
                        </table>    
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <table id="shipping-estimate-table-show">
                        <thead class="shipping-estimate-table-thead">
                            <tr>
                                <th class="th-txt">Service</th>
                                <th class="th-txt">Cost</th>
                                <th class="th-txt">Time in Transit</th>
                            </tr>
                        </thead>
                        <tbody class="shipping-estimate-table-tbody">
                            <tr>
                                <td class="shipping-estimate-table-td">Fedex Ground</td>
                                <td class="shipping-estimate-table-td">$95.85</td>
                                <td class="shipping-estimate-table-td">4 Business Days</td>
                            </tr>
                            <tr>
                                <td class="shipping-estimate-table-td">Fedex 3 day select</td>
                                <td class="shipping-estimate-table-td">$229.79</td>
                                <td class="shipping-estimate-table-td">3 Business Days</td>
                            </tr>
                            <tr>
                                <td class="shipping-estimate-table-td">Fedex 2nd day Air</td>
                                <td class="shipping-estimate-table-td">$229.56</td>
                                <td class="shipping-estimate-table-td">2 Business Days</td>
                            </tr>
                            <tr>
                                <td class="shipping-estimate-table-td">Fedex Next Day Air Saver</td>
                                <td class="shipping-estimate-table-td">$629.44</td>
                                <td class="shipping-estimate-table-td">1 Business Day</td>
                            </tr>
                            <tr>
                                <td class="shipping-estimate-table-td">Fedex Next Day Air</td>
                                <td class="shipping-estimate-table-td">$656.27</td>
                                <td class="shipping-estimate-table-td">1 Business Day</td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div class="col-4">

                </div>
                
            </div>
        </div>
        <!-- End .product-desc-content -->
    </div>
    <!-- End .tab-pane -->


    <div class="tab-pane fade " id="product-quik-quete-content" role="tabpanel" aria-labelledby="product-tab-quik-quete">
        <div class="product-quik-quete-content">
            <p class="description-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
            </p>
            <ul>
                <li class="description-txt">Any Product types that You want - Simple, Configurable
                </li>
                <li class="description-txt">Downloadable/Digital Products, Virtual Products
                </li>
                <li class="description-txt">Inventory Management with Backordered items
                </li>
            </ul>
            <p class="description-txt">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <!-- End .product-desc-content -->
    </div>
    <!-- End .tab-pane -->


    <div class="tab-pane fade " id="product-samples-content" role="tabpanel" aria-labelledby="product-tab-samples">
        <div class="product-samples-content">
            <p class="description-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
            </p>
            <ul>
                <li class="description-txt">Any Product types that You want - Simple, Configurable
                </li>
                <li class="description-txt">Downloadable/Digital Products, Virtual Products
                </li>
                <li class="description-txt">Inventory Management with Backordered items
                </li>
            </ul>
            <p class="description-txt">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <!-- End .product-desc-content -->
    </div>
    <!-- End .tab-pane -->


    <div class="tab-pane fade " id="product-pdf-content" role="tabpanel" aria-labelledby="product-tab-pdf">
        <div class="product-pdf-content">
            <p class="description-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
            </p>
            <ul>
                <li class="description-txt">Any Product types that You want - Simple, Configurable
                </li>
                <li class="description-txt">Downloadable/Digital Products, Virtual Products
                </li>
                <li class="description-txt">Inventory Management with Backordered items
                </li>
            </ul>
            <p class="description-txt">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <!-- End .product-desc-content -->
    </div>
    <!-- End .tab-pane -->




<!-- 
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
  
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>

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
       


                        <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" class="form-control form-control-sm" required="">
                                </div>
                  
                            </div>

                            <div class="col-md-6 col-xl-12">
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="text" class="form-control form-control-sm" required="">
                                </div>
                         
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
        
            </div>
    
        </div>
    -->


</div>
<!-- End .tab-content -->
</div>
<!-- End .product-single-tabs -->

<div class="products-section pt-0 pb-2 related_products">
    <h2 class="section-title pb-3 text-capitalize" style="font-size: 30px;border-bottom: 1px solid #CCCCCC"> Related Items </h2>

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



    @if($data['related_products']!="[]")
    @foreach($data['related_products'] as $product)
    <div class="product-default inner-quickview inner-icon product_default">

        <div class="wishlist_product_content" style="z-index: 1;position: absolute;margin-left:80%;margin-top:5px;cursor:pointer;" id="{{$product->product_id}}">
                                        @if($product->wishlist!="")
                                         <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                        @else
                                        <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                        @endif
                                        <!-- <i class="fa fa-heart-o " style="font-size:20px;color: #68bee5;"></i> -->
                                        <!-- <i class="fa" style="font-size:20px;color: #68bee5;">&#xf004;</i> -->
                                    </div>
        <figure>
            <a href="{{$base_url}}/product/{{$product->product_url}}?pid={{$product->product_translation->product_id}}&skuid=1&pvid=1&cvid=1" target="_blank">
                <img src="{{$base_url}}/storage/app/{{$product->product_image}}" style="height: 250px;" width="239" height="239" alt="product">
            </a>
        </figure>
        <div class="product-details">
            <ul class="circle-rounded-ul" >
                  @if($product->product_color_group!="")
                                                @if($product->product_color_group->product_colors!="[]")
                                                    @foreach($product->product_color_group->product_colors->take(6) as $product_color)

                                                        <li class="d-inline-block circle-rounded-li"><a href="javascript:void(0);"> <span class="dot" style="background-color:{{$product_color->color->color_hex}};"></span></a></li>
                                                        
                                                   
                                                    @endforeach

                                                @endif

                                                @else
                                                   <li class="d-inline-block circle-rounded-li" style="width: 25px;height: 25px;"></li>
                                            @endif

            </ul>
            <h3 class="product-title">
                <a href="javascript:void(0);" class="text-uppercase">{{$product->default_product_translation->product_name}}</a>
            </h3>
            <div class="item-details">
                <span>Item - <b>#{{$product->product_id}}</b></span>
            </div>
            <div class="ship">
                {{$product->default_product_translation->delivery_message}}
            </div>
            @if($product->product_prices !="[]")
                                            @php
                                                $per_item_price_all=[];
                                                $per_item_sale_price_all=[];
                                                $setup_price_all=[];
                                                foreach($product->product_prices as $product_price){

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
    </div>
    @endforeach
    @endif






   <!--  <div class="product-default inner-quickview inner-icon">
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
        </div>
    </div> -->



        
    </div>
    <!-- End .products-slider -->
</div>
<!-- End .products-section -->

<!-- Start .products-section -->
<div class="products-section pt-0 pb-2 lower_priced">
    <h2 class="section-title pb-3 text-capitalize" style="font-size: 30px;border-bottom: 1px solid #CCCCCC">Lower Priced</h2>

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

@if($data['lower_price_products']!="[]")
@foreach($data['lower_price_products']->take(10) as $product)
    
    <div class="product-default inner-quickview inner-icon product_default">

        <div class="wishlist_product_content" style="z-index: 1;position: absolute;margin-left:80%;margin-top:5px;cursor:pointer;" id="{{$product->product_id}}">
                                        @if($product->wishlist!="")
                                         <i class="fa fa-heart fill wishlist_icon_{{$product->product_id}}"></i>
                                        @else
                                        <i class="fa fa-heart-o unfill wishlist_icon_{{$product->product_id}}"></i>
                                        @endif
                                        <!-- <i class="fa fa-heart-o " style="font-size:20px;color: #68bee5;"></i> -->
                                        <!-- <i class="fa" style="font-size:20px;color: #68bee5;">&#xf004;</i> -->
                                    </div>
        <figure>
            <a href="{{$base_url}}/product/{{$product->product_url}}?pid={{$product->product_translation->product_id}}&skuid=1&pvid=1&cvid=1" target="_blank">
                <img src="{{$base_url}}/storage/app/{{$product->product_image}}" style="height: 250px;" width="239" height="239" alt="product">
            </a>
        </figure>
        <div class="product-details">
            <ul class="circle-rounded-ul" >
             @if($product->product_color_group!="")
                @if($product->product_color_group->product_colors!="[]")
                    @foreach($product->product_color_group->product_colors->take(6) as $product_color)

                        <li class="d-inline-block circle-rounded-li"><a href="javascript:void(0);"> <span class="dot" style="background-color:{{$product_color->color->color_hex}};"></span></a></li>
                        
                   
                    @endforeach

                @endif

                @else
                   <li class="d-inline-block circle-rounded-li" style="width: 25px;height: 25px;"></li>
            @endif

            </ul>
            <h3 class="product-title">
                <a href="javascript:void(0);" class="text-uppercase">{{$product->default_product_translation->product_name}}</a>
            </h3>
            <div class="item-details">
                <span>Item - <b>#{{$product->product_id}}</b></span>
            </div>
            <div class="ship">
                {{$product->default_product_translation->delivery_message}}
            </div>
            @if($product->product_prices !="[]")
                                            @php
                                                $per_item_price_all=[];
                                                $per_item_sale_price_all=[];
                                                $setup_price_all=[];
                                                foreach($product->product_prices as $product_price){

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
    </div>

    @endforeach
@endif

    <!-- <div class="product-default inner-quickview inner-icon">

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
        </div>
    </div>
 -->

</div>
<!-- End .products-slider -->
</div>
<!-- End .products-section -->


<!-- Start .products-section -->

<!-- <div class="products-section pt-0 pb-2">
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
        </div>
    </div>
</div>
</div> -->




@if($data['product_review']!="[]")
<div class="products-section pt-0 pb-2">
    <h2 class="section-title pb-3 text-capitalize" style="font-size: 30px;border-bottom: 1px solid #CCCCCC">Customer Reviews</h2>

    @foreach($data['product_review'] as $review)
    <div class="row">
        <div class="col-1 text-center">
            <!-- <i class="fa fa-user" style="font-size: 25px;"></i> -->
            <img src="{{asset('resources/views/superior/assets/images/font-user.png')}}" style="height: 60px;">
        </div>
        <div class="col-9">
            <h5><?php echo $review->review;?></h5>
            <p>
                @if($review->rating==1)
                <i class="fa fa-star star-color-yellow"></i>
                @endif

                @if($review->rating==2)
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                @endif

                @if($review->rating==3)
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                @endif
                
                @if($review->rating==4)
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                @endif

                @if($review->rating==5)
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                <i class="fa fa-star star-color-yellow"></i>
                @endif
                <span class="star-rating-user-count"><?php echo $review->rating;?>/5</span>
            </p>
            <p>
                <?php echo $review->review_description;?>
            </p>

<!--             <div class="row">
                <div class="col-5">
                    pricing of products and services.
                </div>
                <div class="col-7">
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5">
                    Likehood of customers making future purchases.
                </div>
                <div class="col-7">
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5">
                    Overall Customer service
                </div>
                <div class="col-7">
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                    <i class="fa fa-star star-color-yellow"></i>
                </div>
            </div> -->
            
            
            
        </div>
        <div class="col-2 text-right">
            <?php echo $review->date; ?>
        </div>
        
        <hr class="hr">

    </div>
    @endforeach

    <br>
    <br>

    <div class="row mb-4">
        <div class="col-12 text-center">
            <button type="button" class="btn-view-all">View All Reviews</button>
        </div>
    </div>


</div>
@endif

</div>
<!-- End .container -->
</main>
<!-- End .main -->

<script type="text/javascript">   

    function uploadFile(target){
        document.getElementById("file-name").innerHTML = target.files[0].name;
    }

updateList = function(){
    var input = document.getElementById('file');
    var output = document.getElementById('file-name');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
        children += '<div class="selected-filename">' + input.files.item(i).name + '<button type="button" class="close file-cancel-btn" id="'+i+'"> <span  class="file-remove" ">&times;</span></button> </div>';
    }

    if(input.files.length==0){
     output.innerHTML="Upload File"; 
    }else{
      output.innerHTML=children;  
    }


$('#file-name').on('click','.selected-filename button.file-cancel-btn',function(){
var id=$(this).attr('id');



$(this).parent().remove();


var filesCount=$('.selected-filename').length;
if(filesCount==0){
      $('#file-name').text("Upload Files");  
  }


/*const input = document.getElementById('files');*/
/*var input = document.getElementById('file');


var newFileList = Array.from(input.files);

alert(id);

newFileList.splice(id);
console.log(newFileList);*/

/* $('#example-file').val("");*/

/*var  fileListArr = Array.from(input.files);
fileListArr.splice(index, id);
console.log(fileListArr);*/

});

}




/*$('#file').change(function(){
  $('#file-name').html('');
  var attachments = document.getElementById('file');
  var item = '';
  for(var i=0; i<attachments.files.length; i++) {
    item +='<div class="selected-filename">'+ attachments.files.item(i).name +'<button type="button" class="close file-cancel-btn"><span class="file-remove" id="'+i+'">&times;</span></button> </div>';
    console.log(attachments.files.item(i).name);
  }
  $('#file-name').append(item);



  $('.file-remove').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    console.log(attachments.files);
    $(this).parent().remove();
  });

});*/





/*for shop intigration*/
$(document).ready(function(){
$('#zip').on('keyup', function(){

/*var input=$(this).val();

form_data = new FormData();

form_data.append('input',input);
form_data.append( "_token", "{{ csrf_token() }}" );

 
$.ajaxSetup
({
    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});


    $.ajax({
    method: "POST",
    url: "{{$base_url}}/shipping-api-datail",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,

    success: function(result){
    console.log(result);
    },

    error: function(result){
        console.log(result);
    }           
    });*/



});
});




/*for clicable quantity*/
$(document).ready(function(){
$(".pricing-table-container").on('click',".quantity-container-price", function(event){

  $(".quantity-container-price").removeClass("clickable-qty-border")
  $(this).addClass("clickable-qty-border");
  var quantity=$(this).attr("value");
  $("#user-quanity").val(parseInt(quantity));
  $("#user-quanity").trigger("keyup");
  
});
});



/*for cart status*/
$(document).ready(function(){
$(".btn-anchor").on('click','button.cart-status-button', function(event){

  $(".model-title-status").removeClass("hidden");
  $(".model-title-quote").addClass("hidden");
  $(".generate-quote-section").addClass("hidden");
   $(".genrate-lower-buttons").addClass("hidden");
 });
 });



/*for genrate quote*/
$(document).ready(function(){
$(".btn-anchor").on('click','button.btn-guid', function(event){

  $(".model-title-status").addClass("hidden");
  $(".model-title-quote").removeClass("hidden");
  $(".generate-quote-section").removeClass("hidden");
  $(".genrate-lower-buttons").removeClass("hidden");


 });
 });


/*for genrate quote*/
$(document).ready(function(){
$(".gnt-quote").on('click','button.show-quote-option', function(event){
  $(".cancel-qoute").removeClass("hidden");
  $(".quote-buttons-section").removeClass("hidden");
  
 });
 });



/*for cancel genrate quote*/
$(document).ready(function(){
$(".cancel-qte").on('click','button.cancel-qoute', function(event){
  $(this).addClass("hidden");
  $(".quote-buttons-section").addClass("hidden");
  $(".qoute-email-section").addClass("hidden");
  $(".qoute-email-send").removeClass("cancel-email-qoute");
 });
 });

 
/*for show mail text box*/
$(document).ready(function(){
  $(".qoute-email-div").on('click','button.qoute-email-send', function(event){
  $(".qoute-email-section").removeClass("hidden");
  $(this).addClass("cancel-email-qoute");

 });
 });



/*when double click on email*/
$(document).ready(function(){
$(".qoute-email-div").on('click','button.cancel-email-qoute', function(event){
   $(".qoute-email-section").addClass("hidden");
   $(".qoute-email-send").removeClass("cancel-email-qoute");
 });
 });


/*Send qoute-email button*/
$(document).ready(function(){
$(".send-email-q").on('click','button.send-email-quote', function(event){

  alert("send email");

 });
 });


   
/*for print Qoute*/
$(document).ready(function(){

$(".print-quote-gen").on('click','button.print-quote ', function(event){
var divToPrint=document.getElementById("generate-quote-print");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
 });
 });


  

/*for pdf Quote*/
$(document).ready(function(){
$(".pdf-quote-gen ").on('click','button.pdf-quote', function(event){

  var divToPrint=document.getElementById("generate-quote-print");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();

 });
 });


/*for product apparel*/
$(document).ready(function(){
$('.app-qty').on('keyup', function(){

 var quantity=$("#user-quanity").val();
 if(quantity==""){
   $.notify("Please enter quantity first","warning");
   $('.app-qty').val("");
 }else{
    
   var sum=0;
    $(".app-qty").each(function(){
        sum += +$(this).val();
    });

    if(sum<=quantity){

     }else{ 
       $.notify("Apparel total quantity must leass than product quantity","error");
       $(this).val("");

     }
 }

});
});



/*script for after select sub optiom match quantity to suboption price */

$(document).ready(function(){
$('.suboption-select').change( function(e){
    var quantity=$("#user-quanity").val();
    var minquantity=$('.min-quantity').val();

    var quantity=parseFloat(quantity);
    var minquantity=parseFloat(minquantity);

    if(quantity>0 && quantity!=="" && quantity>=minquantity){
    var product_id=$('.product_id').val();
    var sub_option_id=$(this).val();
    var option_id=$(this).attr("optn_id");
    var selected_sub_option=$(this).find('option:selected').text();

    $.ajax({
    url:"{{$base_url}}/matched-suboption-quantity",
    type:'POST',
    data:{'option_id':option_id,'product_id':product_id,'quantity':quantity,'sub_option_id':sub_option_id,_token:'{{csrf_token()}}'},
    success:function(result){
     
     if(result.status=="true"){

       var old_option= $('.selected-optn-'+option_id).length;

       if(old_option>=1){

            var old_option_amt=$('.selected-optn-price'+option_id).attr("value");
            var total=$('#subtotal-modal').text();
            var total_amt=total.substring(1);
            var ftotal=parseInt(total_amt)-parseInt(old_option_amt);
            var ftotal = parseFloat(ftotal).toFixed(2);
            $('#subtotal-modal').text('$'+ftotal);  
            $('.selected-optn-'+option_id).remove();
         
       }

       
     $('.selected-option-data').append('<div class="row pt-2 pb-2 selected-optn-'+option_id+'"> <div class="col-md-9 cart-sub-item-modal">'+result.option_details.name+'('+selected_sub_option+')</div><div class="col-md-3 cart-sub-item-modal selected-optn-price'+option_id+'" value="'+result.suboption_total+'">$'+result.suboption_total+'</div> </div>');
    
               var total=$('#subtotal-modal').text();
               var total_amt=total.substring(1);
               var ftotal=parseInt(total_amt)+parseInt(result.suboption_total);
               var ftotal = parseFloat(ftotal).toFixed(2);
             $('#subtotal-modal').text('$'+ftotal);
 
               $.notify(result.msg,"success");
      }else{
            
            var old_option= $('.selected-optn-'+option_id).length;

            if(old_option>=1){
            var old_option_amt=$('.selected-optn-price'+option_id).attr("value");
            var total=$('#subtotal-modal').text();
            var total_amt=total.substring(1);
            var ftotal=parseInt(total_amt)-parseInt(old_option_amt);
            var ftotal = parseFloat(ftotal).toFixed(2);
            $('#subtotal-modal').text('$'+ftotal);  
            $('.selected-optn-'+option_id).remove();
            }

            $(".suboptionnotavailable"+option_id).val(0);
            $.notify(result.msg,"error");
            
      }

    }
    });
    
    }

    else{

    if(quantity==""){
    $(this).val(0);
    $.notify("Please enter quantity first","danger");
    }else{
    if(quantity<=minquantity){
    $(this).val(0);
    $.notify("Please enter minquantity","danger"); 
    }else{ 
    if(quantity<0){
    $(this).val(0);
    $.notify("Please enter valid quantity","danger");
    }else{
    $(this).val(0);
    $.notify("Please enter quantity","danger");
    }
    }
    }

    }

});
});



</script>


<script type="text/javascript">

var product_id="{{$product_id}}";
$('.decorated-imprint').on('click',function(){
var value=$(this).attr('tabindex');
if (value==1){
$('.decorated-imprint').removeClass('active');
$('.decorated-imprint').addClass('addactive');
$(this).attr('tabindex',2);
}else{
$('.decorated-imprint').addClass('active');
$('.decorated-imprint').removeClass('addactive');
$(this).attr('tabindex',1);
}
});



 $('.detail-unfill'+product_id).on('click',function(){
  var value=$(this).attr('id');
  if (value==1) {
   $(this).removeClass('fa-heart-o');
   $(this).addClass('fa-heart');
   $(this).attr('id',2);

    var product_id=$(this).attr('value');
    $.ajax({
      type: 'post',
      url:'{{$base_url}}/wishlist/add',
      data:{"_token": "{{ csrf_token() }}",'product_id':product_id},
      success: function (result){
        if(result!=""){
          if(result=="true"){
            $.notify('product added into wishlist successfully','success');
          }else{
            $.notify('product removed from wishlist','danger');
          }
        }
      },
      error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
    });

}else{
 $(this).addClass('fa-heart-o');
 $(this).removeClass('fa-heart');
 $(this).attr('id',1);

    var product_id=$(this).attr('value');
    $.ajax({
      type: 'post',
      url:'{{$base_url}}/wishlist/add',
      data:{"_token": "{{ csrf_token() }}",'product_id':product_id},
      success: function (result){
        if(result!=""){
          if(result=="true"){
            $.notify('product added into wishlist successfully','success');
          }else{
            $.notify('product removed from wishlist','danger');
          }
        }
      },
      error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
    });
}
});



// for cart status quantity wise calculations
$(document).ready(function(){
$('#user-quanity').on('keyup', function(){
    
        var product_id=$('.product_id').val();
        $('.app-qty').val("");
        var quantity=$(this).val();
        /*var quantity = parseFloat(quantity).toFixed(2);*/
        if(quantity!=""){
            $('#modal_quantity').text("$"+quantity);   
        }
        else{
            $('#modal_quantity').text(quantity);
        }
        var selected_color_name=$('input[name=address]:checked').attr('c-name');
        $('#select-color').text(selected_color_name);

  $.ajax({
    url:"{{$base_url}}/matched-quantity",
    type:'POST',
    data:{'product_id':product_id,'quantity':quantity,_token:'{{csrf_token()}}'},
    success:function(data){
        
        if(data!=""){
        var selected_imprint_price= new Array();
        $(".cart-sub-item-modal-set").each(function(i) {
            selected_imprint_price.push($(this).attr('value'));
        });

         $('.selected-option-data').empty();
         $('.suboption-select').val(0);
  
        if(selected_imprint_price.length === 0){
          $("#per_item_price_modal").text('$'+ parseFloat(data.per_item_price).toFixed(2));
          var amt = parseFloat(data.subtotal).toFixed(2);
          $("#subtotal-modal").text("$"+amt);
          $('#subtotal-modal').attr('subtotal',data.subtotal);
        }else{

        var total = 0;
        $('.cart-sub-item-modal-set').each(function (index, element) {
            total = total + parseFloat($(element).attr('value'));
        });


       
        var sum_allperitem = 0;
        $('.peritempricecart-default').each(function(){
            sum_allperitem += parseInt(($(this).attr("value")));
        })

        sum_allperitem=(sum_allperitem*parseInt(quantity));

        var sum_alladitional = 0;
        $('.additionalpricecart-default').each(function(){
            sum_alladitional += parseInt(($(this).attr("value")));
        })

        var additional_amt=(sum_allperitem+sum_alladitional);

        $("#subtotal-modal").text("$"+ (data.subtotal+total+additional_amt));
        $('#subtotal-modal').attr('subtotal',(data.subtotal)+(additional_amt));


        $("#per_item_price_modal").text('$'+ parseFloat(data.per_item_price).toFixed(2));
/*        $("#subtotal-modal").text("$"+ (data.subtotal+total));
        $('#subtotal-modal').attr('subtotal',data.subtotal);*/
    }
     $(".min-error").addClass("hidden");
     $(".type-quantity-input").removeClass("false-qauntity");
     $(".type-quantity-input").addClass("true-qauntity");  

  }else{
      
      var minquantity=$('.min-quantity').val();
      $(".min-error").text("Min qty:"+minquantity);
      $(".min-error").removeClass("hidden");
      $(".type-quantity-input").removeClass("true-qauntity");
      $(".type-quantity-input").addClass("false-qauntity");
      $('.suboption-select').val(0);
      $("#per_item_price_modal").text("");
      $("#subtotal-modal").text("");
      $('#subtotal-modal').attr('subtotal',"");

  } 
},
error: function (xhr, textStatus, errorThrown) {

    $.notify("quantity should greter zero","error");

}

});

});
});


/*for next previousstep step */ 
$(document).ready(function(){            
    $(".nextstep").on('click','a.step2', function(event){ 

    var quantity=$('.type-quantity-input').val();
    var minquantity=$('.min-quantity').val();
    var quantity=parseFloat(quantity);
    var minquantity=parseFloat(minquantity);
    var color_status=$('input[name=address]:checked').is(':checked');

    var is_color=parseFloat($('#is_color').val());

    if(is_color==1)
     {
     
    if(color_status==true)
       { 

        $(".color-error-section").removeClass("color-selection-error");
        $(".color-error-lable").addClass("hidden"); 

        if(quantity>=minquantity){ 

         $(".min-error").addClass("hidden");
         $(".type-quantity-input").removeClass("false-qauntity");
         $(".type-quantity-input").addClass("true-qauntity");  
         $(".type-quantity-input").removeClass("false-qauntity");
         $(".type-quantity-input").addClass("true-qauntity");  

        var is_decorated=$('.decorated-imprint').is(':checked');
        if(is_decorated==true){
        var location=$("input[name='imprintcheck[]']").is(':checked');

        if(location==true){
        $(".imprint-error").addClass("hidden");
        $("#recent-tab1").trigger('click');
        $(window).scrollTop(210);
        }
        else{
        /*$.notify("Imprint location selection is required","danger");*/
          $(window).scrollTop(295);
          $(".imprint-error").removeClass("hidden");
        }

        }else{

        $("#recent-tab1").trigger('click');
        $(window).scrollTop(210);
        }

        }

        else if(quantity<=0 ){
        $.notify("Please fill valid values","danger");
        }

        else{
        /*$.notify("Please fill min-quantity","danger");*/
            var minquantity=$('.min-quantity').val();
            $(".min-error").text("Min qty:"+minquantity);
            $(".min-error").removeClass("hidden");
            $(".type-quantity-input").removeClass("true-qauntity");
            $(".type-quantity-input").addClass("false-qauntity");
            $(window).scrollTop(240);
        }

        }

        else{

            /*$.notify("Colors selection is required","danger");*/
            $(".color-error-section").addClass("color-selection-error");
            $(".color-error-lable").removeClass("hidden");
            $(window).scrollTop(210);
        }

       }else{

        if(quantity>=minquantity){ 

        var is_decorated=$('.decorated-imprint').is(':checked');
        if(is_decorated==true){
        var location=$("input[name='imprintcheck[]']").is(':checked');

        if(location==true){
        $(".imprint-error").addClass("hidden");
        $('.step-link1').text("2/");
        $("#recent-tab1").trigger('click');
        $(window).scrollTop(210);
        }
        else{
        /*$.notify("Imprint location selection is required","danger");*/
          $(window).scrollTop(295);
          $(".imprint-error").removeClass("hidden");

        }

        }else{
     
        $("#recent-tab1").trigger('click');
        $('.step-link1').text("2/");
        $(window).scrollTop(210);

        }

        }

        else if(quantity<=0 ){
        $.notify("Please fill valid values","danger");
        }

        else{

        /*$.notify("Please fill min-quantity","danger");*/
            var minquantity=$('.min-quantity').val();
            $(".min-error").text("Min qty:"+minquantity);
            $(".min-error").removeClass("hidden");
            $(".type-quantity-input").removeClass("true-qauntity");
            $(".type-quantity-input").addClass("false-qauntity");
            $(window).scrollTop(240);

        }

        }
       
       
    });


    $(".previousstep").on('click','a.step1', function(event){ 
        $("#tab-popular1").trigger('click');
        $('.step-link1').text("1/");
        $(window).scrollTop(210);
    });

}); 




/*when we check blank document checkbox*/
$(document).ready(function(){
    $('.imprint-options').on('change','.float-right input.blank-goods-imprint', function() {
        var status=$(this).is(':checked');
        $(this).prop('checked', true);
        $(".decorated-imprint").prop('checked', false); 
        if(status="true"){
            $('.front-imprint-options').addClass('hidden');
            $('.with-imprints').addClass('hidden');
            $('.imprint-error').addClass('hidden');
        }
    });
});



/*for decorated imprints*/
$(document).ready(function(){
    $('.imprint-options').on('change','.float-left input.decorated-imprint', function() {
        var status=$(this).is(':checked');
        $(this).prop('checked', true);
        $(".blank-goods-imprint").prop('checked',false);
        if(status="true"){
            $('.front-imprint-options').removeClass('hidden');
            $('.with-imprints').removeClass('hidden');
        }
    });
});




/*for order date check imprints*/
$(document).ready(function(){
    $('.orderbydate-yes').on('change','.form-check input.deadline-date', function(){
        /*$.notify("Afrter this selection date selection is mandetory","warning");*/
        $(".date-notification-btn").trigger("click");
        $(this).prop('checked', true);
        $(".nodeadline").prop('checked',false);
        var shippingdate=$('.ship-date').val();
        $('#asap').text(shippingdate);   
    });
});


    
$(document).ready(function(){
    $('.orderbydate').on('change','.form-check input.nodeadline', function(){
        // $.notify("One receive order option is mandetory","warning");
        $(this).prop('checked', true);
        $(".date-error").addClass('hidden');
        $(".account-error").addClass('hidden');

        $(".deadline-date").prop('checked',false);
        $('#asap').text("ASAP");
    });
});


    /*for shipping date*/
    $('#ship-delivery-date').on('change', function(){
      var is_dead_line=$('.deadline-date').is(':checked');
      if(is_dead_line==true){
       $('#asap').text($(this).val());   
   }
   else{
      $('#asap').text("ASAP");
  }
});

/*for shipping account and outside us checkbox*/
$(document).ready(function(){
    $('.form-group').on('change','input.is-ship', function(){
        $(this).prop('checked', true);
        $('.zip-error').addClass('hidden');
        $(".outside").prop('checked',false);
        $(".coustomship").prop('checked',false);
        $(".zip-checkbox").prop('checked',false);   
    });
});


$(document).ready(function(){
    $('.form-group').on('change','input.outside', function(){
        $(this).prop('checked', true);
        $('.zip-error').addClass('hidden');
        $(".account-error").addClass('hidden');
        $(".is-ship").prop('checked',false);
        $(".coustomship").prop('checked',false);
        $(".zip-checkbox").prop('checked',false);
    });
});


$(document).ready(function(){
    $('.form-group').on('change','input.coustomship', function(){
        $(this).prop('checked', true);
        $(".is-ship").prop('checked',false);
        $(".outside").prop('checked',false);
        $(".zip-checkbox").prop('checked',false);
    });
});


/*when we click on zip*/  
$(document).ready(function(){
    $('.form-group').on('change','input.zip-checkbox', function(){
        $(this).prop('checked', true);
        $('.account-error').addClass('hidden');
        $(".is-ship").prop('checked',false);
        $(".outside").prop('checked',false);
        $(".coustomship").prop('checked',false);
    });
});




/*for selected imprint option*/
$(document).ready(function(){
    var imprints=<?php echo $data['imprints'];?>;
    $.each(imprints,function(index,item){  
        $('.available-imnt').on('change','input.imprint-main-check-'+item.id, function() {
           var qty=$("#user-quanity").val();
           if(qty!=""){
            var status=$(this).is(':checked');
            if(status==true){ 

            console.log(item);

 

               $('#add-color-btn-'+item.id).removeClass("hidden"); 

    $('.imprint-setprice-li').append('<li class="imprint-setprice-li-'+item.id+'"><div class="row pt-2 pb-2 setup-price-row-'+item.id+'"><div class="col-md-9 cart-sub-item-modal">'+item.name+'<span class="impt-color-'+item.id+'-'+"0"+'">('+item.imprint_colors[0].colors.name+')</span>Setup Fee :</div><div class="col-md-3 cart-sub-item-modal cart-sub-item-modal-set"id="setup-fee-modal-'+item.id+'"></div></div></li>');


               var set_fee=$('.set-fee-'+item.id).attr('value');
               $('#setup-fee-modal-'+item.id).attr('value',parseFloat(set_fee));
               $('#setup-fee-modal-'+item.id).text('$'+ parseFloat(set_fee));

               var total=$('#subtotal-modal').text();
               var total_amt=total.substring(1);
               /* console.log(total_amt+"total_amt");*/
               var ftotal=parseInt(total_amt)+parseInt(set_fee);
               var ftotal = parseFloat(ftotal).toFixed(2);
               $('#subtotal-modal').text('$'+ftotal);

               $('.main-imprint-location').append('<div class="row pt-2 pb-2 imprint-location-modal-'+item.id+'"><div class="col-md-9 cart-sub-item-modal"> '+item.name+' :</div><div class="col-md-3 cart-sub-item-modal imprintallcolor-'+item.id+'"><span class="impt-color-'+item.id+'-'+"0"+'">('+item.imprint_colors[0].colors.name+')</span></div></div>');


           }   

           else{
                 
                    var sum_allperitem = 0;
                    $('.peritempricecart-'+item.id).each(function(){
                        sum_allperitem += parseInt(($(this).attr("value")));
                    })

                    sum_allperitem=(sum_allperitem*parseInt(qty));

                    var sum_alladitional = 0;
                    $('.additionalpricecart-'+item.id).each(function(){
                        sum_alladitional += parseInt(($(this).attr("value")));
                    })

                    var additional_amt=(sum_allperitem+sum_alladitional);

                    var set_fee=$('.set-fee-'+item.id).attr('value');
                    $('#setup-fee-modal-'+item.id).attr('value',parseFloat(set_fee));
                    $('#setup-fee-modal-'+item.id).text('$'+ parseFloat(set_fee));

                    var total=$('#subtotal-modal').text();
                    var total_amt=total.substring(1);
                    /*console.log(total_amt+"total_amt");*/
                    var ftotal=parseInt(total_amt)-parseInt(set_fee);
                    ftotal=(ftotal-additional_amt);
                    var ftotal = parseFloat(ftotal).toFixed(2);
                    $('#subtotal-modal').text('$'+ftotal);
                    $('#add-color-btn-'+item.id).addClass("hidden");
                    $('.cancel-color-row-'+item.id).remove(); 
                    $('.setup-price-row-'+item.id).remove();
                    $('.imprint-location-modal-'+item.id).remove();
                    $(".imprint-setprice-li-"+item.id).remove();            
        }

    }else{
        $(this).prop('checked', false);
        $.notify("Please select quantity first","warning");
    }

    });
          

        /*for add color option*/

        $('#add-color-btn-'+item.id).on('click', function(){
            var max_color_count=$('.select-max-colors-'+item.id).length;
            var max_color_count=max_color_count+1;
            var max_color_lgenth=item.max_colors;

        var select_count=max_color_count-1;

        if(max_color_count<=max_color_lgenth){    

$("#select-color-option-"+item.id).append('<div class=" select_imprint-'+item.id+'-'+select_count+'  col-md-12 pt-2 pb-2  cancel-color pl-0 cancel-color-row-'+item.id+'"><select class="select-max-colors select_imprint1-'+item.id+'-'+select_count+' select-max-colors-'+item.id+'" id="select_imprint1-'+item.id+'-'+select_count+'"></select><button title="Close(Esc)"type="button"class="mfp-close">×</button></div>');
            }


    var imptid=item.id;
    $.each(item.imprint_colors,function(index,item1){
    var  select_text=item1.colors.name;
    var  select_value=item1.colors.id;
    var o= new Option(select_text,select_value);
    $("#select_imprint1-"+imptid+'-'+select_count).append(o);
    });
                


/*$("#select-color-option-"+item.id).append('<div class=" select_imprint-'+item.id+'-'+select_count+'  col-md-12 pt-2 pb-2  cancel-color pl-0 cancel-color-row-'+item.id+'"><select class="select-max-colors select_imprint1-'+item.id+'-'+select_count+' select-max-colors-'+item.id+'">@php $count=0;@endphp @if($data['imprints']!="[]") @foreach($data['imprints'] as $imprint1)@foreach($imprint1->imprint_colors as $imprint_color1) $count++; @if($count==1)<option selected="true" value="{{$imprint_color1->colors->id}}">{{$imprint_color1->colors->name}}</option>@else<option value="{{$imprint_color1->colors->id}}">{{$imprint_color1->colors->name}}</option> @endif @endforeach @endforeach @endif</select><button title="Close(Esc)"type="button"class="mfp-close">×</button></div>');
}*/
       

         var per_item_color_fee=item.imprint_price[0].color_item_price;
         var additional_color_fee=item.imprint_price[0].color_setup_price;

         // console.log(item.imprint_price);

        $(".imprint-setprice-li-"+item.id).append('<div class="additional-color-peritem-li-'+item.id+'-'+select_count+' row pt-2 pb-2"><div class="col-md-9 cart-sub-item-modal">'+item.name+' Additional Color <span class="impt-color-'+item.id+'-'+select_count+'">('+item.imprint_colors[0].colors.name+')</span> fee(per item):</div><div class="col-md-3 cart-sub-item-modal peritempricecart-default peritempricecart-'+item.id+'" value="'+per_item_color_fee+'">$'+per_item_color_fee+'</div></div>');


        $(".imprint-setprice-li-"+item.id).append('<div class=" imprint-additional-color-li-'+item.id+'-'+select_count+' row pt-2 pb-2"><div class="col-md-9 cart-sub-item-modal">'+item.name+'Additional Color<span class="impt-color-'+item.id+'-'+select_count+'">('+item.imprint_colors[0].colors.name+')</span> Setup fee:</div><div class="col-md-3 cart-sub-item-modal additionalpricecart-default additionalpricecart-'+item.id+'" value="'+additional_color_fee+'">$'+additional_color_fee+'</div></div>');
         
         $('.imprintallcolor-'+item.id).append('<span class="impt-color-'+item.id+'-'+select_count+'">('+item.imprint_colors[0].colors.name+')</span>');

            /*for additional color and per item values*/
            var oldalltotal=$('#subtotal-modal').text();
            var old_total_amt= parseInt(oldalltotal.substring(1));
            var product_Quantity=parseInt($("#user-quanity").val());
            var per_item_all=(per_item_color_fee*product_Quantity);
            var new_total=(old_total_amt+per_item_all+parseInt(additional_color_fee));
            var new_total = parseFloat(new_total).toFixed(2);
            $('#subtotal-modal').text("$"+new_total);
                     

 if(max_color_count==max_color_lgenth){
    $(this).addClass("hidden");
}


/*when we click on cancel color*/


$('.select_imprint-'+item.id+'-'+select_count).on('click','.mfp-close',function(event){
    $(this).parent('div').remove();
    var color_input_lenght=$('.select-max-colors-'+item.id).length;

    if(color_input_lenght<max_color_lgenth){
      $('#add-color-btn-'+item.id).removeClass("hidden")
     }


            /*for additional color and per item values*/
            
            var per_item_color_fee=item.imprint_price[0].color_item_price;
            var additional_color_fee=item.imprint_price[0].color_setup_price;
              


            var oldalltotal=$('#subtotal-modal').text();
            var old_total_amt= parseInt(oldalltotal.substring(1));
            var product_Quantity=parseInt($("#user-quanity").val());
            var per_item_all=(per_item_color_fee*product_Quantity);

           
            var new_total=(old_total_amt-(per_item_all+parseInt(additional_color_fee)));

             var new_total = parseFloat(new_total).toFixed(2);
             $('#subtotal-modal').text("$"+new_total);
             $(".additional-color-peritem-li-"+item.id+"-"+select_count).remove();
             $(".imprint-additional-color-li-"+item.id+"-"+select_count).remove();
             $('.impt-color-'+item.id+"-"+select_count).remove();

     
});



$("#select-color-option-"+item.id).on('change','.select_imprint1-'+item.id+'-'+select_count, function(e){
var color=$(this).children("option").filter(":selected").text();
$('.impt-color-'+item.id+"-"+select_count).text("("+color+")");
});


});


/*for default color*/
$('.select-max-colors-'+item.id).change( function(e){
var color=$(this).children("option").filter(":selected").text();
$('.impt-color-'+item.id+"-"+"0").text("("+color+")");
});
 

});
});



/*when we select color*/
$(document).ready(function(){
    $(".item_color_select").on('click','input.color-id-selected', function(event){ 
        var selected_color_name=$(this).attr('c-name');
        $('#select-color').text(selected_color_name);
    });
});




/*for add to cart */
$(document).ready(function(){
    $(".btn-anchor").on('click','button.cart-add', function(event){ 
        var product_id=$('.product_id').val(); 
        var quantity=$('.type-quantity-input').val();
        var is_decorated=$('.decorated-imprint').is(':checked');

        if(is_decorated==true){

            var imprint_ids= new Array();
            $("input[name='imprintcheck[]']:checked").each(function(i) {
                imprint_ids.push($(this).val());
            });

            var imprint_colors= new Array();
            $(".select-max-colors").each(function(i) {
                imprint_colors.push($(this).val());
            });
                 


            var imprint_ids_color= new Array();
            var imprint_color_ids_color = new Array();
            $("input[name='imprintcheck[]']:checked").each(function(i){
            imprint_id=$(this).val();
            imprint_ids_color.push($(this).val());
            var color_id_diff=new Array();
            $(".select-max-colors-"+imprint_id).each(function(){
            color_id = $(this).val();
            color_id_diff.push(color_id);
            });
            imprint_color_ids_color.push(color_id_diff);
            });
            imprint_color_ids_color = JSON.stringify(imprint_color_ids_color);

        }

          var product_option_prices_ids= new Array();
            $(".product-option-slct").each(function(i) {
                product_option_prices_ids.push($(this).val());
            });


         var apparel_ids=new Array();
               $(".product_apparel-lbl").each(function(i) {
                apparel_ids.push($(this).attr('pa-id'));
            });


        var apparel_quantiyes=$('input[name="apparel-qty[]"]').map(function(){
            return this.value;
            }).get();


        var main_selected_color=$('input[name=address]:checked').attr('value');

        var artwork_file=$("#file-name").text();

        var summernotedata=$('.note-editable').text();

        var nodeadline=$('.nodeadline').is(':checked');

        var deadlinedate=$('.ship-date').val();

        var zipcode=$('.zipcode').val();

        var is_ship=$('.is-ship').is(':checked');

        var is_zip=$('.zip-checkbox').is(':checked');

        var outsideof_us=$('.outside').is(':checked');

        var is_custom_shipp_cost=$('#coustomship').is(':checked');

        var acnumber=$('.acnumber').val(); 

        var carrier=$('.carrier').val(); 

        var method=$('.method').val();
        
        var custom_shipping_cost=$("#coustomship").attr('cost');

        var is_deadline=$(".deadline-date").is(':checked');

        form_data = new FormData();

        form_data = new FormData();
        jQuery.each($("#file")[0].files, function(i, file) {
            form_data.append('files['+i+']', file);
        });
    

form_data.append('imprint_ids_color',imprint_ids_color);

form_data.append('imprint_color_ids_color',imprint_color_ids_color);

form_data.append('apparel_ids',apparel_ids);
form_data.append('apparel_quantiyes',apparel_quantiyes);

form_data.append('is_zip',is_zip);
form_data.append('is_custom_shipp_cost',is_custom_shipp_cost);
form_data.append('custom_shipping_cost',custom_shipping_cost);

form_data.append('product_id',product_id);
form_data.append('main_selected_color',main_selected_color);
form_data.append('artwork_file',artwork_file);
form_data.append('quantity',quantity);
form_data.append('is_decorated',is_decorated);
form_data.append('imprint_ids',imprint_ids);
form_data.append('product_option_prices_ids',product_option_prices_ids);
form_data.append('imprint_colors',imprint_colors);
form_data.append('summernotedata',summernotedata);
form_data.append('nodeadline',nodeadline);
form_data.append('deadlinedate',deadlinedate);
form_data.append('zipcode',zipcode);
form_data.append('is_ship',is_ship);
form_data.append('acnumber',acnumber);
form_data.append('carrier',carrier);
form_data.append('method',method);
form_data.append('outsideof_us',outsideof_us);
form_data.append( "_token", "{{ csrf_token() }}" );

    
$.ajaxSetup
({
    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});


if(is_deadline==true){

  if(deadlinedate!==""){
    $(".date-error").addClass("hidden");
     if(is_zip==true){
       $(".zip-error").addClass("hidden");
      if(zipcode!==""){
            $.ajax({
            method: "POST",
            url: "{{$base_url}}/cart-data",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(result){
            $.notify(result.msg,'success');
            window.location.href="{{$base_url}}/cart";
            },
            error: function(result){
            }           
            });

            }else{
             // $.notify("Please enter zipcode","warning");
             $(".zip-error").removeClass("hidden");
             $(window).scrollTop(320);
            }
            }
            else{

             if(is_ship==true){
              $(".account-error").addClass("hidden");
              if(acnumber!==""&&carrier!==""&&method!==""){

                    $.ajax({
                    method: "POST",
                    url: "{{$base_url}}/cart-data",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(result){
                    $.notify(result.msg,'success');
                    window.location.href="{{$base_url}}/cart";
                    },
                    error: function(result){
                    }           
                    });

              }else{
                  // $.notify("Please select all won shipping account options","warning");
                  $(".account-error").removeClass("hidden");
                  $(window).scrollTop(340);
              }

             }else{

                 if(outsideof_us==true){
                    $.ajax({
                    method: "POST",
                    url: "{{$base_url}}/cart-data",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(result){
                    $.notify(result.msg,'success');
                    window.location.href="{{$base_url}}/cart";
                    },
                    error: function(result){
                    }           
                    });

                 }else{

                   
                   if(is_custom_shipp_cost==true){

                    $.ajax({
                    method: "POST",
                    url: "{{$base_url}}/cart-data",
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(result){
                    $.notify(result.msg,'success');
                    window.location.href="{{$base_url}}/cart";
                    },
                    error: function(result){
                    }           
                    });

                   }
                 }
             }
            
            }
            }else{  
            // $.notify("Please select order date","warning");
            $(".date-error").removeClass("hidden");
            $(window).scrollTop(320);
            }
            }else{

            if(is_zip==true){
            $(".zip-error").addClass("hidden");
            if(zipcode!==""){
            $.ajax({
            method: "POST",
            url: "{{$base_url}}/cart-data",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function(result){
            $.notify(result.msg,'success');
            window.location.href="{{$base_url}}/cart";
            },
            error: function(result){
            }           
            });
            }else{
             // $.notify("Please enter zipcode","warning");
             $(".zip-error").removeClass("hidden");
             $(window).scrollTop(320);
            }
  
            }else{
            
             if(is_ship==true){
                $(".account-error").addClass("hidden");
              if(acnumber!==""&&carrier!==""&&method!==""){
                $.ajax({
                method: "POST",
                url: "{{$base_url}}/cart-data",
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(result){
                $.notify(result.msg,'success');
                window.location.href="{{$base_url}}/cart";
                },
                error: function(result){
                }           
                });
               }else{
               // $.notify("Please select all won shipping account options","warning");
                  $(".account-error").removeClass("hidden");
                  $(window).scrollTop(340);
              }

             }else{
                $.ajax({
                method: "POST",
                url: "{{$base_url}}/cart-data",
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(result){
                $.notify(result.msg,'success');
                window.location.href="{{$base_url}}/cart";
                },
                error: function(result){
                }           
                });

             }
            
            }
      }
});
});

</script>


<!-- <script type="text/javascript">
    //Wishlist content in detail page

    $(document).ready(function(){
        $('.wishlist_product_content').on('click',function(){
            var product_id = $(this).attr('id');
            $.ajax({
              type: 'post',
              url:'{{$base_url}}/wishlist/add',
              data:{"_token": "{{ csrf_token() }}",'product_id':product_id},
              success: function (result){
                if(result!=""){

                  if(result=="true"){
                    // alert('product added into wishlist successfully');
                    $.notify('product added into wishlist successfully','success');
                  }else{
                    // alert('product already exist in wishlist');
                    $.notify('product deleted wishlist','danger');
                  }
                  
                  
                }
                
              },
              error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
            });


        });
    });
</script> -->

<script type="text/javascript">
    //Wishlist content in detail page

    $(document).ready(function(){
        $('.wishlist_product_content').on('click',function(){
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
                         

                          $.notify('product added into wishlist successfully','success');

                  }else if(result['success']=="false"){
                          
                          var product_id = result['product_id'];
                          $('.wishlist_icon_'+product_id).removeClass('fill');
                          $('.wishlist_icon_'+product_id).removeClass('fa-heart');
                          
                          $('.wishlist_icon_'+product_id).addClass('unfill');
                          $('.wishlist_icon_'+product_id).addClass('fa-heart-o');
                        
                          
                          // alert('product already exist in wishlist');
                          $.notify('product deleted wishlist','danger');
                  }
                }
                
              },
              error: function (xhr, textStatus, errorThrown) { alert(textStatus + ':' + errorThrown); }
            });


        });
    });
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

