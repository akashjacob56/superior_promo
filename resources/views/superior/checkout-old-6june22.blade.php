@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')

<style type="text/css">


input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}


 input[type=checkbox] {
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



.hidden{
display:none!important;
}

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
color: #212121 !important;
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

label.check-checkout {
color: #767f84;
font-size: 1.4rem;
font-weight: 400;
margin: 0 22px 0.6rem;
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
width:120px;
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

textarea.form-control {
max-width: 100%;
min-height: 176px;
border-radius:10px;
}

.width-100{
width:100%;
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

/*----------------------*/


</style>


<!-- all edit address data  -->

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

/*label.check-checkout{
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
}*/

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

.add-add{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 20px;
line-height: 23px;
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

.add-link{
padding-left: 20px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
text-decoration-line: underline;
color: #68BEE5;
}

.bck-ord {
background: #FFFFFF;
border: 1px solid #0759A4;
box-sizing: border-box;
border-radius: 5px;
width:120px;
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

.select-custom:after {
display: inline-block;
position: absolute;
top: 65%;
right: 1.9rem;
-webkit-transform: translateY(-51%);
transform: translateY(-51%);
color: #34373f;
font-family: 'porto';
font-size: 1.5rem;
content: '\e81c';
}

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

.disabled-item{
cursor: not-allowed;
pointer-events: none;
}

.form-check-input {
position: absolute;
margin-top: -0.01rem;
margin-left: -1.25rem;
width: 25px;
height: 25px;
}



.card.card-accordion .card-header.collapsed:after {
content: "";
transition: 0.35s;
}

.card.card-accordion .card-header:after {
content: "";
position: absolute;
top: 50%;
right: 10px;
transform: translateY(-50%);
font-family: "porto";
transition: 0.35s;
}



.card-header:after {
display: block;
clear: both;
content: "";
}


*, ::after, ::before {
box-sizing: border-box;
}



.card.card-accordion .card-header {
cursor: pointer;
position: relative;
padding-right: 25px;
overflow: hidden;
text-overflow: ellipsis;
text-transform: none;
white-space: nowrap;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
background: #F5F5F5;
border-radius: 5px;
}


.card {
margin-bottom: 1rem;
border: none;
border-radius: 0;
font-size: 1.3rem;
}


form, .form-footer {
margin-bottom: 0rem;
}


</style>


<style type="text/css">
a.shipping_to_multiple_location_link{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5 !important;
margin-left: 15px;
}
</style>

<style type="text/css">
a.tax_exempt_link{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;

color: #68BEE5 !important;
margin-left: 15px;
}
</style>


<!--------------------------------->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

        <main class="main checkout-main">

              <div class="container">

               <div class="row p-4">
                <span class="link-top-1">Home /</span>
                <span class="link-top-1">Cart /</span>
                <a href="#"><span class="checkout-link">Checkout</span></a>
               </div>

                <div class="row p-3">
                <span class="cart-txt">Checkout</span>
                </div>

                 <div class="row ">
    
                     <div class="col-md-8 pr-5">
                     @if($data['user']!="")
                     <div class="row shipping-add p-3"> <span class="shipping-txt">Shipping Address</span> 
                     </div> 
                  
                    
                     <div class="row pt-4 pb-4 d-flex align-items-center old-add">
                         <div class="col-md-6" id="updated-address">

                            <ul id="ship-add-order" value="{{$data['user']->address_id}}">
                            <li><span id="address_name">{{$data['user']->name}}</span></li>
                            <li><span id="address_address">{{$data['user']->address}}</span></li>
                            <li><span id="address_address2">{{$data['user']->address2}}</span></li>
                            <li><span id="address_zipcode">{{$data['user']->zip_code}}</span></li>
                            </ul>

                         </div>
                         <div class="col-md-6">
                          <div class="row">

                              <div class="col-md-8 address-parent">
                              <button class="btn-address add-new-add">Add New Address</button>
                              </div>
                              
                              <div class="col-md-4 editaddress">
                               <button type="button" class="edit-add">Edit Address</button>
                              </div>
                          </div>
                         </div>
                     </div>
                    @else

                    <div class="row pt-4 pb-4 d-flex align-items-center login-checkout">
                              <a href="javascript:void(0);" class="checko">
                              <div class="col-md-3 ">
                              <button type="button" class="edit-add">Login</button>
                              </div>
                              </a>
                              <a href="javascript:void(0);"class="checkout-register">
                              <div class="col-md-3">
                              <button type="button" class="edit-add">Register</button>
                              </div> 
                              </a>
                     </div>

                    @endif
                
                <div class="row hidden add-new-address pt-3">
                        <div class="col-md-6">
                        <span class="add-add pb-3">Add a New Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-5">
                            <div class="account-content">
                                <form id="addnewaddressform">

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="form-check-input united-staten" id="united-staten" checked="">
                                            <label class="form-check-label check-checkout" for="united-staten">United States</label>
                                       
                                            <input type="checkbox" class="form-check-input canadan" id="canadan">
                                            <label class="form-check-label check-checkout" for="canadan">Canada</label>

                                          </div>
                                     </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="David" id="fname" name="fname" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname" class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="lname" placeholder="xyz" name="lname" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="companyname" name="companyname" placeholder="David" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="add1" name="add1" placeholder="2543  0042 3562 0210" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add2" name="add2" placeholder="2543  0042 3562 0210" >
                                    </div>



                                   <div class="row"> 


                                    <div class="col">
                                   
                                        <label class="form-lbl">City<span class="required">*</span></label>


<!--                                         <select name="cityn" id="cityn" class="form-control txt-lbl"  required=" ">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select> -->

                            <input placeholder="City Name"  name="cityn" list="cityn-datalist" id="cityn" class="form-control txt-lbl">
                                        <datalist id="cityn-datalist">
                                            @if($data['Allcity']!="[]")
                                                @foreach($data['Allcity'] as $city)
                                                    <option value="{{$city->city_name}}">
                                                                              
                                                @endforeach
                                            @endif
                                        </datalist>


                              
                                    </div>


                                
                                     
                                      <div class="col">
                                       <div class="select-custom">

                                        <label class="form-lbl"id="State">State<span class="required">*</span></label>

                                        <label class="form-lbl hidden"id="Province">Province<span class="required">*</span></label>

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
                                        <label for="acc-text" id="ZipCoden" class="form-lbl">ZipCode<span class="required">*</span></label>

                                       <label for="acc-text " id="PostalCoden" class="form-lbl hidden">PostalCode<span class="required ">*</span></label>

                                        <input type="text" class="form-control txt-lbl" id="zip-coden" name="zip-coden" placeholder="123456" required="">
                                    </div>                                         
                                    </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="teln" name="teln" required="" maxlength="13">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="extn" class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="extn" placeholder="Ext" name="extn" >
                                            </div>
                                        </div>

                                    </div>  



<!--                                     <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="faxn" name="faxn" placeholder="Fax" >
                                    </div>
 -->

                                    <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input default-ship-addn" id="default-ship-addn">
                                            <label class="form-check-label check-checkout" for="default-ship-addn">Make this my default shipping address</label>
                                    </div>


                                    <div class="row">
                                        <div class="col edit-ad-new">
                                         <button type="button" class="btn-save-changes">Save Change</button>   
                                        </div>
                                        <div class="col new-add-cancel">
                                          <button type="button" class="btn-cancel">Cancel</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div> 
          </div>





    <!-- edit address part  -->
        <div class="row pt-3 pb-3 hidden edit-address-main" id="edit-address-main">

                      <div class="col-md-6 " id="shippingalladress"> 
                        @foreach($data['all_address'] as $address)
                         <div class="row d-flex align-items-center pt-3 pb-3 multiple-add-{{$address->address_id}}">
                           <div class="col-md-7">
                            <ul>
                               <li><span>{{$address->name}}</span></li>
                                <li><span>{{$address->address}}</span></li>
                                <li><span>{{$address->address2}}</span></li>
                                <li><span>{{$address->zip_code}}</span></li>
                            </ul>
                           </div>

                           <div class="col-md-5 use-address">
                            <button class="edit-add  use-ship-address" value="{{$address}}">Use Address</button>
                           </div>

        <div class="row edit-delete-row">

        <a href="javascript:void(0);" class="add-link edit-addd" id="{{$address}}">Edit Address</a>

        <a href="javascript:void(0);" class="add-link delete-add" id="{{$address->address_id}}">Delete Address</a>

        </div>

                         </div>
                         @endforeach

                          <div class="row pt-5 pb-5 address-new">
                              <button class="btn-address in-edit-addnew"> Add a New Address</button>
                          </div>

                        </div>                   
                      
                     
@if($data['user']!="")
    <div class="col-md-6 s-edit-address">
        <span class="add-add pb-3">Edit Address</span>
         <p>Starred(*) Fields are required.</p>
        <div class="row  pt-3 pl-5">
            <div class="account-content">
                <form >

                      <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
                         <div class="form-group form-check">

                            <input type="checkbox" class="form-check-input united-state" id="united-state" checked="">
                            <label class="form-check-label check-checkout" for="united-state">United States</label>
                       
                            <input type="checkbox" class="form-check-input canada" id="canada">
                            <label class="form-check-label check-checkout" for="canada">Canada</label>

                          </div>
                     </div>
                     
                    <input type="hidden" class="form-control txt-lbl" placeholder="David" id="add-id" name="add-id" value="{{$data['user']->address_id}}">


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" placeholder="David" id="f-name" name="f-name" required="" value="{{$data['user']->name}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="l-name" class="form-lbl">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-control txt-lbl" id="l-name" placeholder="xyz" name="l-name" required="" value="{{$data['user']->last_name}}">
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="company-name" name="company-name" placeholder="David" value="{{$data['user']->company_name}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" id="add-1" name="add-1" placeholder="2543  0042 3562 0210" required=""
                        value="{{$data['user']->address}}">
                    </div>

                    <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="add-2" name="add-2" placeholder="2543  0042 3562 0210" value="{{$data['user']->address2}}" >
                    </div>



                   <div class="row">     
                    <div class="col">
                 
                        <label class="form-lbl">City<span class="required">*</span></label>

<!--                         <select name="city" id="city" class="form-control txt-lbl"  required=" ">
                            <option value="" selected="selected">
                                select City
                            </option>
                            @foreach($data['Allcity'] as $city)
                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
 -->
                        
                    <input placeholder="City Name"  name="city" list="city-datalist" id="city" class="form-control txt-lbl">
                        <datalist id="city-datalist">
                            @if($data['Allcity']!="[]")
                                @foreach($data['Allcity'] as $city)
                                    <option value="{{$city->city_name}}">
                                                              
                                @endforeach
                            @endif
                        </datalist>

                    </div>




                      <div class="col">
                       <div class="select-custom">

                        <label class="form-lbl" id="editState">State<span class="required">*</span></label>

                        <label class="form-lbl hidden" id="editProvince">Province<span class="required">*</span></label>



                        <select name="state" id="state" class="form-control txt-lbl" required="">
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

                    <label for="acc-text" id="ZipCode" class="form-lbl">ZipCode<span class="required">*</span></label>

                   <label for="acc-text" id="PostalCode" class="form-lbl hidden">PostalCode<span class="required">*</span></label>





                        <input type="text" class="form-control txt-lbl" id="zip-code" name="zip-code" placeholder="123456" required=""
                        value="{{$data['user']->zip_code}}">   
                    </div>                                         
                    </div>

                   </div>


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="tel" name="tel" required="" value="{{$data['user']->telephone}}" maxlength="13">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ext" class="form-lbl">Ext:<span class="required"></span></label>
                                <input type="text" class="form-control txt-lbl" id="ext" placeholder="Ext" name="ext" value="{{$data['user']->ext}}">
                            </div>
                        </div>
                    </div>  



<!--                     <div class="form-group mb-2">
                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                        <input type="text" class="form-control txt-lbl" id="fax" name="fax" placeholder="Fax" value="{{$data['user']->fax}}" >
                    </div> -->


                    <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input default-ship-add" id="default-ship-add">
                            <label class="form-check-label check-checkout" for="default-ship-add">Make this my default shipping address</label>
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
        @endif

    </div>    
                
<style type="text/css">
.purchase-order-reference-label{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;

align-items: center;
letter-spacing: -0.017em;

color: #212121;
}
.purchase-order-reference-input{
width: 215px;
height: 40px;
border:1px solid #cccccc;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;

align-items: center;
letter-spacing: -0.017em;

color: #575757;
padding: 10px;
}
</style>


                  
                    @if($data['user']!="")
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="purchase-order-reference-label">Purchase Order/ Reference#</label><br>
                            <input type="text" name="" class="purchase-order-reference-input" placeholder="David">
                        </div>
                    </div>


                   <div class="row">
                    <div class="width-100" id="accordion1">
                    <div class="card card-accordion">
                        <!-- <a class="card-header shipping-add shipping-txt" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            Ship to Multiple Location
                        </a> -->

                        <a class="shipping-txt shipping_to_multiple_location_link" href="javascript:void(0);">
                            Shipping to Multiple location?<span style="color:red;">*</span>
                        </a>

                        <!-- <div id="collapse1" class="collapse show pl-3" data-parent="#accordion1"> -->
                        <div id="shipping-data" class="shipping-data pl-3">
            
                         <div class="row pt-5 pb-3">
                           <div class="col multiple-location">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input single-location" id="single-location" checked="">
                                <label class="form-check-label check-checkout" for="single-location">No, Ship to a single location</label>
                              </div>
                            </div>

                           <div class="col multiple-location">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input m-location" id="m-location">
                                <label class="form-check-label check-checkout" for="m-location">Yes, Ship to multiple locations</label>
                              </div>
                            </div>

                       </div>

                       
                       <div class="pt-3 pb-3 is-multiplelocation hidden">
                         <div class="form-group width-100">
                                <label class="mb-1 form-check-label check-checkout" for="location-message">Please provide instruction for Multiple Location Shipping. Customer Service will contact you for more details.</label>
                                <textarea cols="30" rows="1" id="location-message" class="form-control" name="location-message" required=""></textarea>
                            </div>
                       </div>
 
                      </div>

                    </div>
                </div>
              </div>



                    

                    


                    


                   <div class="row">
                    <div class="width-100" id="accordion2">
                    <div class="card card-accordion">
                        <!-- <a class="card-header shipping-add shipping-txt" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse1">
                            Tex Exemption Certificate
                        </a> -->

                        <a class="shipping-txt tax_exempt_link" href="javascript:void(0);">
                            Tax Exempt?<span style="color:red;">*</span>
                        </a>

                        <!-- <div id="collapse2" class="collapse show pl-3" data-parent="#accordion2"> -->
                        <div id="text_exmption_data" class="text_exmption_data pl-3">

                        
                        <div class="row pt-5 pb-3">

                           <div class="col tax-exemption">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input no-certificate" id="no-certificate" checked="">
                                <label class="form-check-label check-checkout" for="no-certificate">Don’t have</label>
                              </div>
                            </div>


                           <div class="col tax-exemption">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input certificate" id="certificate">
                                <label class="form-check-label check-checkout" for="certificate">Yes, I have</label>
                              </div>
                            </div>



                           <div class="col tax-exemption">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input p-later" id="p-later">
                                <label class="form-check-label check-checkout" for="p-later">Will Provde later</label>
                              </div>
                            </div>                            

                       </div>
                      
                      <!-- for tax exemption certificate  -->

                    <div class=" is-certificate hidden"> 
                    <div class="inputfile-box pb-3">
                    <input type="file" id="file" class="inputfile" name="files[]" onchange='uploadFile(this)'>
                    <label for="file">
                    <span id="file-name" class="file-box u-here upload-text"> Choose File</span>
                    <i class="fa fa-upload file-icon" aria-hidden="true"></i>  
                    </label>
                    </div>
                    </div>


                        </div>
                    </div>
                </div>
              </div>


                    
<style type="text/css">
.card.card-accordion .card_header:after {
/*content: "";*/
position: absolute;
top: 50%;
right: 10px;
transform: translateY(-50%);
font-family: "porto";
transition: 0.35s;

}
</style>


<script type="text/javascript">
$(document).ready(function(){
$('.card.card-accordion .ship-to-multiple-location-open-close').hide();
$('a.shipp-to-mul-loc-anchor').on("click",function(){
$('.card.card-accordion .ship-to-multiple-location-open-close').toggle();
});
});
</script>

            
                   <div class="row">
                    <div class="width-100" id="accordion3">
                    <div class="card card-accordion">
                        <a class="card-header shipping-add shipping-txt" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse1">
                            Payment method
                        </a>

                        <!-- <a class="cart-header shipping-add shipping-txt shipp-to-mul-loc-anchor" href="javascript:void(0);" style="padding-left: 17px;">
                            Payment Method
                        </a> -->

                        <div id="collapse3" class="collapse show pl-3" data-parent="#accordion3">
                        <!-- <div class="pl-3 ship-to-multiple-location-open-close"> -->

                       <div class="row pt-5 pb-3">
                           <div class="col Payment-section">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input credit_card" id="credit_card" checked="">
                                <label class="form-check-label check-checkout" for="credit_card">Credit Card</label>
                              </div>
                            </div>     

                           <div class="col Payment-section">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input moneyorder" id="moneyorder">
                                <label class="form-check-label check-checkout" for="moneyorder">Check / Money Order</label>
                              </div>
                            </div>


                           <div class="col Payment-section">
                             <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input afterapproval" id="afterapproval">
                                <label class="form-check-label check-checkout" for="afterapproval">Pay AfterProof Approval</label>
                              </div>
                            </div>                            

                       </div>


   <div class="pb-3 moneyorder-section hidden">
    <p class="transaction-txt">After the order is placed, Customer Service will contact you to discuss check or money order payment options. Please feel free to check our Guarantee and Order Process pages.</p>
   </div>
    


<div class="pb-3 afterapproval-section hidden">
<p class="transaction-txt">Payment will be required after final digital proofs are approved. All proofs are free of charge with unlimited revisions. Payment can be completed in you account home page or contacting customer support after your approval, by calling <a href="tel:" class="color-b">888-577-6667</a> or email <a href="mailto:business_email" class="color-b">info@superiorpromos.com</a></p>
</div>




                      <div class="credit-card-section pl-4">
                       <div class="row pb-3">
                        <p class="transaction-txt">This transaction will be completed through a secure SSL connection and up to 256 bit encryption. Please <a href="#">Visit our FAQ Page</a> for further details and feel free to check our <a href="#">Guarantee</a>. and <a href="">Order Process Page</a>.</p>
                       </div>

                      
                       <div class="row pt-3 pb-3">
                            <span class="card-txt">Suprior Promos accepts all major Credit Card:</span>
                        </div>


                        <div class="row pt-3 pb-5">  
                            <div class="col-md-2">
                                <img src="{{$base_url}}/resources/views/superior/assets/images/BBB-Logo 2.png"/>
                            </div>
                            <div class="col-md-2">
                                <img src="{{$base_url}}/resources/views/superior/assets/images/visa.png"/> 
                            </div>
                            <div class="col-md-2">
                                <img src="{{$base_url}}/resources/views/superior/assets/images/american express.png"/> 
                            </div>
                            <div class="col-md-2">
                                <img src="{{$base_url}}/resources/views/superior/assets/images/discover.png"/>
                            </div>
                            <div class="col-md-2">
                                <img src="{{$base_url}}/resources/views/superior/assets/images/mastercard.png"/>
                            </div>
                        </div>

                         
                        <div class="row "><span class="e-card">Enter a Card</span></div>                                           
                        <div class="row  pt-3 pl-5">
                            <div class="account-content">
                                <form action="#">
                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Card Holder<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="David" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Card Number<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="2543  0042 3562 0210" required="">
                                    </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Card Security Code<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="234" id="acc-name" name="acc-name" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Expiration Date<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="cc-lastname" placeholder="01 / 2025" name="acc-lastname" requiread="">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
     
                     </div>

                </div>
            </div>
        </div>
      </div>
                     


                    @if($data['user']!="")
                    <div class="row">
                    <div class="width-100" id="accordion4">
                    <div class="card card-accordion">
                    <a class="card-header shipping-add shipping-txt" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                            Enter a Billing Address
                        </a>
                        <div id="collapse4" class="collapse show pl-3" data-parent="#accordion4">


                       <div class="row pb-2 pt-5">
                        <div class="form-group form-check pl-5">
                            <input type="checkbox" class="form-check-input same-address " id="same-address">
                            </div>
                         <p class="pl-5">
                            <span class="shipp-add-txt">Billing Address Same as Shipping Address</span>
                        </p>
                       </div>  

                      
                       <div class="row same-ship-bill hidden">               
                          <div class="col-md-6" id="used-billing-address">
                            <ul id="billing-add-order" value="">
                            <li><span id="address_name_bill">{{$data['user']->name}}</span></li>
                            <li><span id="address_address_bill">{{$data['user']->address}}</span></li>
                            <li><span id="address_address2_bill">{{$data['user']->address2}}</span></li>
                            <li><span id="address_zipcode_bill">{{$data['user']->zip_code}}</span></li>
                            </ul>
                         </div>
                       </div>

                       
                           <p class="" style="margin-left: 57px;font-weight: 500;">Or</p>
                       



                       <div class="row pb-2 ">
                        <div class="form-group form-check pl-5 select-billing-check">
                            <input type="checkbox" class="form-check-input select-billing-add-checkbox" id="select-billing-add-checkbox">
                            </div>
                         <p class="pl-5 bill-address-select">
                            <span class="shipp-add-txt">Select a Different Billing Address Or</span><a style="margin-left: -15px; font-size: 14px; line-height: 19px;" href="javascript:void(0);" class="d-inline-block add-link-text add-billing-add">Add New</a>
                        </p>
                       </div>  




                       <!-- <div class="row pl-3  pb-5 billing-links"> 
                            <a href="javascript:void(0);" class="add-link-text select-billing-add">Select Billing Address</a>
                            <a href="javascript:void(0);" class="add-link-text add-billing-add">Add Billing Address</a>
                       </div>  -->

                       <script type="text/javascript">

                            $(document).ready(function(){
                                $('.select-billing-check').on('click','.select-billing-add-checkbox',function(){
                                    $(this).prop('checked',true);
                                   $(".same-address").prop('checked',false);
                                    if($(this).is(':checked')){
                                        $('.select-billling-address').removeClass("hidden");
                                        $('.same-ship-bill').addClass('hidden');
                                    }else{
                                        $('.select-billling-address').addClass("hidden");
                                    }
                                });


                                $('.bill-address-select').on('click','.add-billing-add',function(){
                                    $('.billing-address').removeClass("hidden");
                                    $('.billing-links').addClass("hidden");
                                    $('.select-billling-address').addClass("hidden");
                                });
                            });


                           //for add new billing address 
                            // $(document).ready(function(){  
                            //     $('.billing-links').on('click','a.select-billing-add', function(event){
                            //         $('.select-billling-address').removeClass("hidden");

                            //         });
                            // });
                       </script>

            <div class="row pt-3 pb-5 select-billling-address hidden" id="updated-billing-address">

                @if($data['all_billing_address']!="[]")
                <div class="col-md-6"> 
                <span class="shipp-add-txt">Select One Billing Address</span>
                @foreach($data['all_billing_address'] as $billing_address)
                 <div class="row d-flex align-items-center pt-3 pb-3 multiple-add-bill-{{$billing_address->address_id}}">
                   <div class="col-md-7">
                    <ul>
                       <li><span>{{$billing_address->name}}</span></li>
                        <li><span>{{$billing_address->address}}</span></li>
                        <li><span>{{$billing_address->address2}}</span></li>
                        <li><span>{{$billing_address->zip_code}}</span></li>
                    </ul>
                   </div>

                   <div class="col-md-5 use-billing-address">
                    <button class="edit-add use-bill-address" value="{{$billing_address}}">Use  Address</button>
                   </div>
                                                           
                    <div class="row edit-delete-billing">

                    <a href="javascript:void(0);" class="add-link edit-add-bill" id="{{$billing_address}}">Edit Address</a>

                    <a href="javascript:void(0);" class="add-link delete-bill-add" id="{{$billing_address->address_id}}">Delete Address</a>

                    </div>

                     </div>
                     @endforeach

<!--                       <div class="row pt-5 pb-5 address-new">
                          <button class="btn-address in-edit-addnew"> Add a New Address</button>
                      </div> -->

                    </div> 
                    @else
                    <div class="col-md-6"> 
                    <span class="shipp-add-txt"> Billing Address Are Empty Please Add first Then select Address</span> 
                    </div>
                    @endif

          


                    <div class="col-md-6 edit-billing-address hidden">
                        <span class="add-add pb-3">Edit Billng Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-5">
                            <div class="account-content">
                                <form >

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="form-check-input united-state-bill-edit" id="united-state-bill-edit" checked="">
                                            <label class="form-check-label check-checkout" for="united-state-bill-edit">United States</label>
                                       
                                            <input type="checkbox" class="form-check-input canada-bill-edit" id="canada-bill-edit">
                                            <label class="form-check-label check-checkout" for="canada-bill-edit">Canada</label>

                                          </div>
                                     </div>


                        <input type="hidden" class="form-control txt-lbl" placeholder="David" id="add-id-bill" name="add-id-bill" value=" ">


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="David" id="fname-bill-edit" name="fname-bill-edit" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname-bill-edit" class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="lname-bill-edit" placeholder="xyz" name="lname-bill-edit" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="companyname-bill-edit" name="companyname-bill-edit" placeholder="David" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="add1-bill-edit" name="add1-bill-edit" placeholder="2543  0042 3562 0210" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add2-bill-edit" name="add2-bill-edit" placeholder="2543  0042 3562 0210" >
                                    </div>



                                   <div class="row">     
                                    <div class="col">
                           
                                        <label class="form-lbl">City<span class="required">*</span></label>



<!--  <select name="city-bill-edit" id="city-bill-edit" class="form-control txt-lbl"  required=" ">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select> -->
                                    
                                <input placeholder="City Name"  name="city-bill-edit" list="city-bill-edit-datalist" id="city-bill-edit" class="form-control txt-lbl">
                                    <datalist id="city-bill-edit-datalist">
                                        @if($data['Allcity']!="[]")
                                            @foreach($data['Allcity'] as $city)
                                                <option value="{{$city->city_name}}">
                                                                          
                                            @endforeach
                                        @endif
                                    </datalist>


                              </div>

                                     
                                      <div class="col">
                                       <div class="select-custom">
                                        <label class="form-lbl" id="editbill-State">State<span class="required">*</span></label>
                                        <label class="form-lbl hidden" id="editbill-Province">Province <span class="required">*</span></label>

                                        <select name="state-bill-edit" id="state-bill-edit" class="form-control txt-lbl" required="">
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

                    <label for="acc-text" id="editbill-ZipCode" class="form-lbl">ZipCode<span class="required">*</span></label>

                   <label for="acc-text" id="editbill-PostalCode" class="form-lbl hidden">PostalCode<span class="required">*</span></label>




                            <input type="text" class="form-control txt-lbl" id="zipcode-bill-edit" name="zipcode-bill-edit" placeholder="123456" required="">
                        </div>                                         
                        </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                        <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="tel-bill-edit" name="tel-bill-edit" required="" maxlength="13">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="ext-bill-edit" placeholder="Ext" name="ext-bill-edit" >
                                            </div>
                                        </div>

                                    </div>  



<!--                                     <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="fax-bill-edit" name="fax-bill-edit" placeholder="Fax" >
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
                



                 <div class="row billing-address hidden pt-3">
                   
                     <div class="col-md-6">
                        <span class="add-add pb-3">Add a New Billng Address</span>
                         <p>Starred(*) Fields are required.</p>
                        <div class="row  pt-3 pl-5">
                            <div class="account-content">
                                <form id="addnewbillingaddressform">

                                   <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>

                                         <div class="form-group form-check">

                                            <input type="checkbox" class="form-check-input united-state-bill" id="united-state-bill" checked="">
                                            <label class="form-check-label check-checkout" for="united-state-bill">United States</label>
                                       
                                            <input type="checkbox" class="form-check-input canada-bill" id="canada-bill">
                                            <label class="form-check-label check-checkout" for="canada-bill">Canada</label>

                                          </div>
                                     </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="David" id="fname-bill" name="fname-bill" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname-bill" class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="lname-bill" placeholder="xyz" name="lname-bill" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="companyname-bill" name="companyname-bill" placeholder="David" >
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="add1-bill" name="add1-bill" placeholder="2543  0042 3562 0210" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="add2-bill" name="add2-bill" placeholder="2543  0042 3562 0210" >
                                    </div>



                                   <div class="row">     
                                    <div class="col">
                              
                                        <label class="form-lbl">City<span class="required">*</span></label>


<!--                   <select name="city-bill" id="city-bill" class="form-control  txt-lbl"  required=" ">
                                            <option value="" selected="selected">
                                                select City
                                            </option>
                                            @foreach($data['Allcity'] as $city)
                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                            @endforeach
                                        </select> -->

                            <input placeholder="City Name"  name="city-bill" list="city-bill-datalist" id="city-bill" class="form-control txt-lbl">
                                    <datalist id="city-bill-datalist">
                                        @if($data['Allcity']!="[]")
                                            @foreach($data['Allcity'] as $city)
                                                <option value="{{$city->city_name}}">                        
                                            @endforeach
                                        @endif
                                    </datalist>

                                  
                                    </div>

                                     

                                      <div class="col">
                                       <div class="select-custom">
                                        <label class="form-lbl" id="billState">State<span class="required">*</span></label>
                                        <label class="form-lbl hidden" id="billProvince">Province<span class="required">*</span></label>

                                        <select name="state-bill" id="state-bill" class="form-control txt-lbl" required="">
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

                    <label for="acc-text" id="bill-ZipCode" class="form-lbl">ZipCode<span class="required">*</span></label>

                   <label for="acc-text" id="bill-PostalCode" class="form-lbl hidden">PostalCode<span class="required">*</span></label>

                        <input type="text" class="form-control txt-lbl" id="zip-code-bill" name="zip-code-bill" placeholder="123456" required="">

                                    </div>                                         
                                    </div>

                                   </div>


                                      <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                    <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                    <input type="number" class="form-control txt-lbl" placeholder="Day Telephone" id="tel-bill" name="tel-bill" required="" maxlength="13">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ext-bill" class="form-lbl">Ext:<span class="required"></span></label>
                                                <input type="text" class="form-control txt-lbl" id="ext-bill" placeholder="Ext" name="ext-bill" >
                                            </div>
                                        </div>

                                    </div>  



<!--                                     <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="fax-bill" name="faxn-bill" placeholder="Fax" >
                                    </div> -->



                                    <div class="row">
                                        <div class="col bill-ad-new">
                                         <button type="button" class="btn-save-changes">Save Change</button>   
                                        </div>
                                        <div class="col bill-add-cancel">
                                          <button type="button" class="btn-cancel">Cancel</button>  
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div> 
          
                     </div>


                </div>
            </div>
        </div>
      </div>
 
@endif

@endif

<!-- billing end -->


                        <div class="row pb-5 place-final-ord">
                        <div class="col-md-2 backord"><a href="{{$base_url}}/cart"><button class="bck-ord">Back</button></a></div>
                         @if($data['user']!="")
                        <div class="col-md-2 ord"><button class="place-ord">Place Order</button></div>
                         @endif
                        </div>

              </div>    

    <!--  left side end  -->


                    <div class="modal fade" id="order-detail-checkout">
                    <div class="modal-dialog">
                    <div class="modal-content admin-modal">
                    <div class="modal-header">
                    <div class="row">
                      <div class="col-md-12 pb-2"><h4 class="modal-title model-title">Order Details</h4></div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal"><span class="close-modal-btn">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    order details checkout
                    </div> 
                    </div>
                    </div>
                    </div>

                   
                    @if($data['user']!="")
                     <div class="col-md-4 order-details">
                     <div class="row shipping-add p-3 ">
                      <span class="ord-txt">Order Details</span> 
                     </div>
                        <ul>
                            <li>
                            <p>
                            <div class="row"> 
                            <div class="col-md-8 ord-left">Product Total</div>
                            <div class="col-md-4 ord-amt-txt product-total" value="{{$data['product_total']}}">${{$data['product_total']}}.00</div>
                            </div>
                            </p>
                            </li>

                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-left">Shipping Cost</div>
                            <div class="col-md-4 ord-amt-txt shipping-amt" value="{{$data['shipping_cost']}}">${{$data['shipping_cost']}}.00</div>
                            </div>
                            </p>
                            </li>

                            @if($data['discount']!=0)
                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-left">Discount</div>
                            <div class="col-md-4 ord-amt-txt discount-amt" value="{{$data['discount']}}">${{$data['discount']}}.00</div>
                            </div>
                            </p>
                            </li>
                            @else
                            <div class="col-md-4 ord-amt-txt discount-amt" value="0"></div>
                            @endif


                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-t-txt">Order Total</div>
                            <div class="col-md-4 ord-total" value="{{$data['order_total']}}">${{$data['order_total']}}.00</div>
                            </div>
                            </p>
                            </li>                             
                        </ul>
                         
                         <p class="pb-4"><button type="button" class="ord-deteils-btn" data-toggle="modal" data-target="#order-detail-checkout">Details</button></p>
                     </div>
                     @endif

<!-- total part end  -->


                 </div>

               







            </div>


        </main>



<!-- for login and registraion in same page  -->

<style type="text/css">
.login-image {
background-image: url(<?php echo $base_url;?>/resources/views/superior/assets/images/login-img.png);
    background-size:cover;
    background-position: center;
    background-repeat: no-repeat;
    height:auto;
}

.background-login{
    background: #FFFFFF;
    box-shadow: 0px 3px 16px rgba(0, 0, 0, 0.1);
}

.login-col{
    padding-right: 8.4rem;
}

.custom-control-log {
    position: relative;
    margin-top: 0rem;
    margin-bottom: 3rem;
    padding-left: 3rem;
}

.authentication-divider {
    color: #CCCCCC;
    position: relative;
    text-align: center;
}

.authentication-divider:before {
    content: "";
    background-color: #CCCCCC;
    width: 100%;
    height: 1px;
    position: absolute;
    top: 50%;
    left: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

.authentication-divider span {
    background-color: #F9F9F9;
    z-index: 1;
    position: relative;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
}

form, .form-footer {
    margin-bottom: 2rem;
}
.gicon{
    text-align: -webkit-right;
}

.log-txt{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 30px;
line-height: 35px;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}

label {
    margin: 6px 0px 0rem;
    font-family: Roboto;
    font-style: normal;
    font-weight:600;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #212121;
}

.pss-eye{
    position: absolute;
    right: 15px;
    top: 13px;
}

.form-wide {
    width: 100%;
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 14px;
    align-items: center;
    letter-spacing: -0.017em;
    color: #575757;
}

.rem-txt{
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

.f-pass {
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 16px;
    align-items: center;
    letter-spacing: -0.017em;
    text-decoration-line: underline;
    color: #68BEE5;
}

.btn-log{
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

.btn-register{
background: #FFFFFF;
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
color: #575757;
}

.txt-g-log{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 16px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
text-decoration-line: underline;
color: #0759A4;
}
</style>

<div class="container pt-1 pb-5 hidden login-container">
    
<div class="row background-login">
<!-- <div class="col-md-6 login-image"></div> -->

<div class="col-md-6 pt-5 login-col"> 
<div class="heading mb-1">
    <h2 class="log-txt">Login</h2>
</div>
<form action="{{$base_url}}/user-checkout-login" method="post">
    {{ csrf_field() }}
<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
  <label for="login-email">
        @lang("Email") Or @lang("Username")
    </label>
    <input type="text" name="email" value="{{old('email')}}" class="form-input form-wide" placeholder="@lang("order.email")"" id="email" required="">

        @if ($errors->has('email'))
        <span class="help-block">
        <strong class="error-msg">{{$errors->first('email')}}</strong>
        </span>
        @endif
    </div>


<!--       <input type="hidden" id="ot_checkout_main_login" name="ot" value="{{$data['order_total']}}"/>
      <input type="hidden" id="sc_checkout_main_login" name="sc" value="{{$data['shipping_cost']}}"/>
      <input type="hidden" id="pt_checkout_main_login" name="pt" value="{{$data['product_total']}}"/>
      <input type="hidden" id="discount_checkout_main_login" name="discount" value="{{$data['discount']}}"/>
      <input type="hidden" id="discode_checkout_main_login" name="discode" value="{{$data['disc_code']}}"/> -->



<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
    <label>@lang("order.password")</label>
    <div class="input-group" id="show_hide_password">
      <input class="form-input form-wide" id="password-field" name="password" type="password" placeholder="***********">
      <div class="input-group-addon">
        <a href="" class="pss-eye"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>


@if ($errors->has('password'))
<span class="help-block">
<strong class="error-msg">{{ $errors->first('password') }}</strong>
</span>
@endif
</div>



    <div class="form-footer">
        <div class="custom-control-log custom-checkbox mb-0">
            <input type="checkbox" class="custom-control-input "  value="" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label mb-0 rem-txt" for="checkbox">Remember
                me</label>
         </div>

        <a href="{{ route('password.request') }}" class="forget-password form-footer-right f-pass">@lang("user.forgot_password")</a>
    </div>

    <button type="submit" class=" btn-log btn-md w-100">
        @lang("user.login")
    </button>


    <div class="authentication-divider pt-5 pb-5">
    <span>OR</span>
   </div>

   <div class="row d-flex align-items-center pb-4">
       <div class="col-md-5 gicon">
       <img src="{{$base_url}}/resources/views/superior/assets/images/google-icon.png"/>
       </div>
       <div class="col-md-7">
       <span><a href="#" class="txt-g-log">Sing in with google</a></span>
       </div>
   </div>


   <div class="authentication-divider pt-4 pb-4">
    <span>New to SupriorPromos</span>
   </div>

    <!-- <button class="btn-md w-100 btn-register">
        Register
    </button> -->

<a href="javascript:void(0);" class="regi-check">
    <button class="btn-md w-100 btn-register" type="button">
        Register
    </button>
</a>


</form>
                    
</div>
</div>
</div>  

<script type="text/javascript">
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>

<!-- end login from -->



<!-- for registration  -->

<script type="text/javascript" src="{{asset('resources/views/superior/assets\js\notify.min.js')}}"></script>
<style type="text/css">
.login-image {
background-image:url(<?php echo $base_url;?>/resources/views/superior/assets/images/login-img.png);
     background-size:cover;
     background-position: center;
    background-repeat: no-repeat;
    height:auto;
}

.background-login{
    background: #FFFFFF;
    box-shadow: 0px 3px 16px rgba(0, 0, 0, 0.1);
}

.login-col{
    padding-right: 8.4rem;
}

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

.register-text{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 30px;
line-height: 35px;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
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

.add-link{
padding-left: 20px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
text-decoration-line: underline;
color: #68BEE5;
}

.bck-ord {
    background: #FFFFFF;
    border: 1px solid #0759A4;
    box-sizing: border-box;
    border-radius: 5px;
    width:120px;
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

.select-custom:after {
display: inline-block;
position: absolute;
top: 65%;
right: 1.9rem;
-webkit-transform: translateY(-51%);
transform: translateY(-51%);
color: #34373f;
font-family: 'porto';
font-size: 1.5rem;
content: '\e81c';
}

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

.btn-log{
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
margin-left: 38px;
list-style-type: disc;

}

.color-59BD8B{
color: #59BD8B !important;
};

</style>

<div class="container pt-1 pb-5 hidden register-container">
<div class="row background-login"> 
<!-- <div class="col-md-6 login-image"></div> -->


<div class="col-md-6 pt-5 login-col"> 
<div class="row d-flex align-items-center">
  <div class="col-md-auto"><span class="register-text pb-4 pl-4">Account Registration</span></div>
  <div class="col-md-auto pt-3 existing"><a class="form-lbl existing-log" href="javascript:void(0)">Existing User Login</a></div>
</div>
 <p class="pl-4">Starred(*) Fields are required.</p>

<div class="row  pt-3 pl-5">
    <div class="account-content">
        <form action="{{$base_url}}/registeruser-checkout" method="post" onsubmit="return checkForm(this);">
            {{ csrf_field() }}
            
<!--                    <input type="hidden" id="ot_checkout_main" name="ot" value="{{$data['order_total']}}"/>
                   <input type="hidden" id="sc_checkout_main" name="sc" value="{{$data['shipping_cost']}}"/>
                   <input type="hidden" id="pt_checkout_main" name="pt" value="{{$data['product_total']}}"/>
                   <input type="hidden" id="discount_checkout_main" name="discount" value="{{$data['discount']}}"/>
                  <input type="hidden" id="discode_checkout_main" name="discode" value="{{$data['disc_code']}}"/> -->

              <!-- <div class="form-group mb-2 ">
                <label  class="form-lbl">Country<span class="required">*</span></label>
              
                 <div class="form-group form-check country">
                                     
                    <input type="checkbox" class="form-check-input us" id="us" name="country" value="190" checked="">
                    <label class="form-check-label check-checkout " for="us">United States</label>
               
                    <input type="checkbox" class="form-check-input canada" id="canada" name="country" value="35">
                    <label class="form-check-label check-checkout" for="canada">Canada</label>
                  </div>
             </div> -->



              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="acc-name" class="form-lbl">First Name<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" placeholder="David" id="acc-name" name="fname" required="" value="{{old('fname')}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" id="acc-lastname" placeholder="Warner" name="lname" required="" value="{{old('lname')}}">
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="form-group mb-2">
                <label for="acc-text" class="email">Email<span class="required">*</span></label>
                <input type="email" class="form-control txt-lbl" id="email_r" name="email" placeholder="abc@gmail.com" required="">
            </div>

            @if ($errors->has('email'))
            <span class="help-block">
            <strong class="error-msg">{{ $errors->first('email') }}</strong>
            </span>
            @endif
            </div>




            <!-- <div class="form-group mb-2">
                <label for="acc-text" class="phone">Phone Number<span class="required"></span></label>
                <input type="text" class="form-control txt-lbl" id="phone" name="phone" required="" placeholder="123456789" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div> -->



           <!--  <div class="form-group mb-2">
                <label for="acc-text" class="company">Company Name<span class="required"></span></label>
                <input type="text" class="form-control txt-lbl" id="company" name="cname" placeholder="abc" >
            </div> -->

            <!-- <div class="form-group mb-2">
                <label for="add1" class="form-lbl">Address Line 1<span class="required">*</span></label>
                <input type="text" class="form-control txt-lbl" id="add1" name="add1" placeholder="xyz" required="">
            </div> -->

           <!--  <div class="form-group mb-2">
                <label for="add2" class="form-lbl">Address Line 2<span class="required"></span></label>
                <input type="text" class="form-control txt-lbl" id="add2" name="add2" placeholder="2543  0042" >
            </div> -->



            <!-- <div class="row">     
            <div class="col">
            <div class="select-custom">
                <label class="form-lbl">City<span class="required">*</span></label>
                <select  class="form-control txt-lbl" id="city" name="city">
                    <option value="" selected="selected" >
                      select city
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
                <select name="state" class="form-control txt-lbl" id="state" name="state">
                    <option   value="" selected="selected">select state
                    </option>
                    @foreach($data['Allstates'] as $state)
                    <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                    @endforeach
                </select>
               </div>
              </div>


            <div class="col">
            <div class="form-group mb-2">
                <label for="zip" class="form-lbl">Zip/Postal Code<span class="required">*</span></label>
                <input type="text" class="form-control txt-lbl" id="zip" name="zipcode" placeholder="413710" required="">
            </div>                                         
            </div>
           </div> -->


              <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('day_telephone') ? ' has-error' : '' }}">
                        <label for="day_telephone" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl @error('day_telephone') is-invalid @enderror" required="" placeholder="Day Telephone" id="day_telephone" name="day_telephone" required="" value="{{old('day_telephone')}}" maxlength="13">

                        @if ($errors->has('day_telephone'))
                        <span class="help-block">
                        <strong class="error-msg">{{ $errors->first('day_telephone') }}</strong>
                        </span>
                        @endif
        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="extenssion" class="form-lbl">Ext:<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl" id="extenssion" placeholder="Ext" name="extenssion" value="{{old('extenssion')}}">
                    </div>
                </div>
            </div>  



            <!-- <div class="form-group mb-2">
                <label for="fax" class="form-lbl">Fax<span class="required"></span></label>
                <input type="text" class="form-control txt-lbl" id="fax" name="fax" placeholder="Fax" >
            </div> -->



            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('pass1') ? ' has-error' : '' }}">
                        <label for="password" class="form-lbl ">Password<span class="required">*</span></label>
                        <input type="password" class="form-control txt-lbl" placeholder="password" id="password" name="pass1" required="">

                        @if ($errors->has('pass1'))
                        <span class="help-block">
                        <strong class="error-msg">{{ $errors->first('pass1') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>




                <div class="col-md-6">
                <div class="form-group form-group {{ $errors->has('pass2') ? ' has-error' : '' }}">
                        <label for="confirm_password" class="form-lbl">Confirm Password<span class="required">*</span></label>
                        <input type="password" class="form-control txt-lbl" id="confirm_password" placeholder="confirm password" name="pass2" required="">

                        @if ($errors->has('pass2'))
                        <span class="help-block">
                        <strong class="error-msg">{{ $errors->first('pass2') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>

                
                <ul class="password-configuration-show">
                    <li class="eight-to-sixty-four-char">Be between 8 and 64 characters</li>
                    <li class="an-uppercase-char">An uppercase character</li>
                    <li class="an-lowercase-char">An Lowercase character</li>
                    <li class="an-numbers-char">A number</li>
                    <li class="an-special-char">A special character</li>
                </ul>
            </div>


            <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="Checkpermission" name="mailpermission" value="1" style="width: 25px;height: 25px;">
                    <label class="form-check-label ml-5 checkpermission-label" for="Checkpermission">Yes, please send me Superior Promos e-mail updates about the latest trends, special sale announcements, online-only offers, and more</label>
            </div>

<style type="text/css">
label.checkpermission-label{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 12px !important;
line-height: 17px !important;
/* or 142% */

letter-spacing: -0.017em;

color: #575757;
}
</style>

            <div class="row">
                <div class="col-md-12 text-center">
                     <button type="submit" class=" btn-log btn-md w-100">
                        Register
                     </button>   
                </div>
            </div>



        </form>
    </div>
</div>

</div>

</div>
</div>  


<div class="container  container-back-btn pb-5 pt-3 hidden">
<div class="row place-final-ord-check">
<div class="col-md-2 backtocart"><a href="{{$base_url}}/cart"><button class="bck-ord">Back</button></a></div>
</div>
</div>




<script type="text/javascript">
// for multiple location    
$(document).ready(function(){
$('.country').on('change',' input.us',function(event){
    $(this).prop('checked', true);
    $(".canada").prop('checked',false);
});
});

$(document).ready(function(){
$('.country').on('change','input.canada',function(event){
$(this).prop('checked', true);
$(".us").prop('checked',false);
});
});

</script>



<script type="text/javascript">
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>


<script type="text/javascript">
    // var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    $(document).ready(function(){
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
    });
</script>




<script type="text/javascript">

  function checkForm(form)
  {
    
    
    if(form.pass1.value != "" && form.pass1.value == form.pass2.value) {
      if(form.pass1.value.length < 8) {
        // alert("Error: Password must contain at least six characters!");
        $.notify("Error: Password must contain at least eight characters!", "warn");
        form.pass1.focus();
        return false;
      }
    
    re = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
      if(!re.test(form.pass1.value)) {
        // alert("Error: password must contain at least one number Special Char!");
        $.notify("Error: password must contain at least one number Special Char!", "warn");
        form.pass1.focus();
        return false;
      }


      re = /[0-9]/;
      if(!re.test(form.pass1.value)) {
        // alert("Error: password must contain at least one number (0-9)!");
        $.notify("Error: password must contain at least one number (0-9)!", "warn");

        form.pass1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pass1.value)) {
        // alert("Error: password must contain at least one lowercase letter (a-z)!");
        $.notify("Error: password must contain at least one lowercase letter (a-z)!", "warn");
        form.pass1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pass1.value)) {
        // alert("Error: password must contain at least one uppercase letter (A-Z)!");
         $.notify("Error: password must contain at least one uppercase letter (A-Z)!", "warn");
        form.pass1.focus();
        return false;
      }
    } else {
      // alert("Error: Please check that you've entered and confirmed your password!");
      $.notify("Error: Please check that you've entered and confirmed your password!", "warn");
      form.pass1.focus();
      return false;
    }

    // alert("You entered a valid password: " + form.pass1.value);
    return true;
  }

</script>

<!-- end registration -->


<script type="text/javascript">   
function uploadFile(target){
    document.getElementById("file-name").innerHTML = target.files[0].name;
}
</script>

<!-- notify js -->
<script type="text/javascript" src="{{asset('resources/views/superior/assets/js/notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}"></script>

<script type="text/javascript">




//new billing address 
$('#zip-coden').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('#canadan').is(':checked')){
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
if($('#united-staten').is(':checked')){
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



//edit billing address

$('#zip-code').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('#canada').is(':checked')){
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
if($('#united-state').is(':checked')){
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




//new billing address

$('#zip-code-bill').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('#canada-bill').is(':checked')){
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
if($('#united-state-bill').is(':checked')){
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




//edit billing address

$('#zipcode-bill-edit').keypress(function (e) {
var zipcode = $(this).val();
//canada checkbox
if($('#canada-bill-edit').is(':checked')){
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
if($('#united-state-bill-edit').is(':checked')){
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




 //back to cart 

$(document).ready(function(){
$(".existing").on('click','a.existing-log',function(event){
$(".login-container").removeClass("hidden");
$(".register-container").addClass("hidden");
$(".login-checkout").addClass("hidden");
$(".checkout-register").addClass("hidden");
$(".place-final-ord").addClass("hidden");
$(".container-back-btn").removeClass("hidden");

});
});



// for log in
$(document).ready(function(){
$(".login-checkout").on('click','a.checko',function(event){

$(".login-container").removeClass("hidden");
$(".register-container").addClass("hidden");
$(this).addClass("hidden");
$(".checkout-register").addClass("hidden");
$(".place-final-ord").addClass("hidden");

$(".container-back-btn").removeClass("hidden");

});
});


/*FOR REGISTER*/


$(document).ready(function(){
$(".login-checkout").on('click','a.checkout-register',function(event){

$(".login-container").addClass("hidden");
$(".register-container").removeClass("hidden");
$(this).addClass("hidden");
$(".login-checkout").addClass("hidden");
$(".place-final-ord").addClass("hidden");

$(".container-back-btn").removeClass("hidden");

});
});


/*when we click on login register*/

$(document).ready(function(){
$(".btn-register").on('click',function(event){

$(".login-container").addClass("hidden");
$(".register-container").removeClass("hidden");

});
});



// for final order
$(document).ready(function(){
$(".place-final-ord").on('click','.ord button.place-ord',function(event){

var shippingadd_id=$('#ship-add-order').attr('value');

var is_multiplelocation=$('#single-location').is(':checked');
    if(is_multiplelocation==false){
    is_multiplelocation=$('#m-location').is(':checked');
    if(is_multiplelocation==false){
    is_multiplelocation="";
    }else{
    is_multiplelocation=1;
    } 
    }else{   
    is_multiplelocation=0;
    }


var location_data=$('#location-message').val();

var tex_excemption=$('#no-certificate').is(':checked');
    if(tex_excemption==true){
    tex_excemption=0;
    }else{
    tex_excemption=$('#certificate').is(':checked');
    if(tex_excemption==true){
    tex_excemption=1;
    }else{
    tex_excemption=$('#p-later').is(':checked');
    if(tex_excemption==true){  
    tex_excemption=2;
    }else{ 
    tex_excemption="";
    }
    }   
    }


var payment_method=$('#credit_card').is(':checked');
    if(payment_method==true){
    payment_method=1; 
    }else{
    payment_method=$('#moneyorder').is(':checked');
    if(payment_method==true){
    payment_method=2;
    }else{
    payment_method=$('#afterapproval').is(':checked');
    if(payment_method==true){
    payment_method=3;
    }else{
    payment_method="";    
    }
    }
    }


var billingaddress_id=$('#billing-add-order').attr('value');

var order_price=$('.ord-total').attr('value');
var all_total=$('.product-total').attr('value');

var discount_amt=$('.discount-amt').attr('value');
var discount_cupon="<?php echo $data['disc_code'];?>";

form_data = new FormData();
jQuery.each($("#file")[0].files, function(i, file) {
    form_data.append('files['+i+']', file);
});


form_data.append('shippingadd_id',shippingadd_id);
form_data.append('discount_cupon',discount_cupon);
form_data.append('order_price',order_price);
form_data.append('discount_amt',discount_amt);
form_data.append('is_multiplelocation',is_multiplelocation);
form_data.append('location_data',location_data);
form_data.append('tex_excemption',tex_excemption);
form_data.append('payment_method',payment_method);
form_data.append('billingaddress_id',billingaddress_id);
form_data.append('all_total',all_total);
form_data.append( "_token", "{{ csrf_token() }}" );


//for(var pair of form_data.entries()) {
   //alert(pair[0]+ ', '+ pair[1]); 
//}

/*window.location.href="{{$base_url}}/success";*/

$.ajaxSetup 
({
    headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
});


if(shippingadd_id!==""&&is_multiplelocation!==""&& tex_excemption!==""&&payment_method!==""&&billingaddress_id!==""&& all_total!==""){

  $.ajax({
    method: "POST",
    url:"{{$base_url}}/place/order",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(data){
    var order_id = data['order_id'];  
    window.location.href="{{$base_url}}/success?order_id="+order_id;
    },
    error: function(data){
    }           
});

}else{  
  $.notify("Please select mandetory fileds","error");
}

});
});



// for final order
/*$(document).ready(function(){
$(".place-final-ord").on('click','.backord button.bck-ord',function(event){
alert("hello i am back");
});
});
*/


/*for delete billing  address*/
$(document).ready(function(){
$('#updated-billing-address').on('click','.edit-delete-billing a.delete-bill-add', function(event){
var address_id=$(this).attr('id');
$.ajax({
url:"{{$base_url}}/delete/billing/address",
type:'POST',
data:{'address_id':address_id,_token:'{{csrf_token()}}'},
success:function(data){
     document.getElementById("updated-billing-address").innerHTML=data.data.data.sections;
     document.getElementById("used-billing-address").innerHTML=data.data.data.sections2;

        /*var count=$('.edit-delete-billing').length; 
            if(count==1) {
            $('.delete-bill-add').addClass('disabled-item');
        }*/
},
error: function (xhr, textStatus, errorThrown) {
}
});
}); 
});




/*all used billing 0 when load page*/
$(document).ready(function(){
$.ajax({
url:"{{$base_url}}/checkout/used/billing/address_zero",
type:'POST',
data:{_token:'{{csrf_token()}}'},
success:function(data){
},
error: function (xhr, textStatus, errorThrown) {
}
});
});


//use billing address  
$(document).ready(function(){
$('#updated-billing-address').on('click','.use-billing-address button.use-bill-address',function(event){
//alert("use address from billing");
var address=$(this).attr('value');
var address = JSON.parse(address);

var address_id=address.address_id;
$.ajax({
url:"{{$base_url}}/checkout/used/billing/address",
type:'POST',
data:{'address_id':address_id,_token:'{{csrf_token()}}'},
success:function(data){

/*for billling adress*/
$('#billing-add-order').attr('value',address.address_id);
$('#address_name_bill').text(address.name);
$('#address_address_bill').text(address.address);
$('#address_address2_bill').text(address.address2);
$('#address_zipcode_bill').text(address.zip_code);

$('.same-ship-bill').removeClass("hidden");
$(".same-address").prop('checked',false);
$('.select-billling-address').addClass("hidden");
},
error: function (xhr, textStatus, errorThrown) {
}
});
});
});


$(document).ready(function(){
$('#updated-billing-address').on('click','.edit-delete-billing a.edit-add-bill', function(event){
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
// var fax=$('#fax-bill-edit').val(address.fax);
$('.edit-billing-address').removeClass("hidden");
});
});



//add new address cancel
$(document).ready(function(){
$('#updated-billing-address').on('click','.bill-edit-cancel button.btn-cancel',function(event){
$('.edit-billing-address').addClass("hidden");
});
});









$(document).ready(function(){

        var country_id =190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill-edit").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill-edit").append(defult_state);

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





$('.select-billling-address').on('click','input.united-state-bill-edit',function(event){
    $(this).prop('checked', true);
    $(".canada-bill-edit").prop('checked',false);
    $('#editbill-State').removeClass("hidden");
    $("#editbill-Province").addClass("hidden");
    $("#zipcode-bill-edit").val("");

    $("#editbill-ZipCode").removeClas("hidden");
    $('#editbill-PostalCode').addClass("hidden");

        var country_id =190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill-edit").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill-edit").append(defult_state);

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
});
});



$(document).ready(function(){
$('.select-billling-address').on('click','input.canada-bill-edit',function(event){
    $(this).prop('checked', true);
    $(".united-state-bill-edit").prop('checked',false);
    $('#editbill-State').addClass("hidden");
    $("#editbill-Province").removeClass("hidden");
    $("#zipcode-bill-edit").val("");




    $("#editbill-ZipCode").addClass("hidden");
    $('#editbill-PostalCode').removeClass("hidden");


       var country_id =35;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill-edit").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill-edit").append(defult_state);

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
    url: "{{$base_url}}/checkout/edit/billing/address",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(data){
        document.getElementById("updated-billing-address").innerHTML=data.data.data.sections;
        document.getElementById("used-billing-address").innerHTML=data.data.data.sections2;

        $('.billing-links').removeClass("hidden");
        $(".billing-address ").addClass("hidden");


        var country_id =190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill-edit").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill-edit").append(defult_state);

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


    },

    error: function(data){
    }           
});

}
else{
     
     $.notify("Please enter all mandetory","danger");
}

});
});






//save billing address 
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
/*var fax=$('#fax-bill').val();*/


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
    url: "{{$base_url}}/checkout/addnew/billing/address",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,

    success: function(data){
        document.getElementById("updated-billing-address").innerHTML=data.data.data;
        document.getElementById("addnewbillingaddressform").reset();
        $('.billing-links').removeClass("hidden");
        $(".billing-address ").addClass("hidden");

       
        var country_id =190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill-edit").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill-edit").append(defult_state);

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


    },

    error: function(data){
    }           
});

}
else{     
     $.notify("Please enter all mandetory fileds","danger");
}

});
});


// for canada us in add new billing address    
$(document).ready(function(){

$('.form-check').on('click','input.canada-bill',function(event){
    $(this).prop('checked', true);
    $(".united-state-bill").prop('checked',false);
    $('#billState').addClass("hidden");
    $("#billProvince").removeClass("hidden");
    $("#zip-code-bill").val("");


    $("#bill-ZipCode").addClass("hidden");
    $('#bill-PostalCode').removeClass("hidden");

   
        var country_id =35;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill").append(defult_state);

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

});
});

 
$(document).ready(function(){

var country_id =190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
$("#state-bill").empty();
defult_state='<option value="" selected>Select</option';
$("#state-bill").append(defult_state);

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

$('.form-check').on('click','input.united-state-bill',function(event){
    $(this).prop('checked', true);
    $(".canada-bill").prop('checked',false);
    $('#billState').removeClass("hidden");
    $("#billProvince").addClass("hidden");
    $("#zip-code-bill").val("");

    $("#bill-ZipCode").removeClass("hidden");
    $('#bill-PostalCode').addClass("hidden");


        var country_id =190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state-bill").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state-bill").append(defult_state);

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
});
});



//cancel billing address 
$(document).ready(function(){
$('.bill-add-cancel').on('click','button.btn-cancel',function(event){
    $('.billing-address').addClass("hidden");
    $('.billing-links').removeClass("hidden");
    $('.select-billling-address').removeClass("hidden");
});
});


//for add new billing address 
// $(document).ready(function(){  
// $('.billing-links').on('click','a.add-billing-add', function(event){
// $('.billing-address').removeClass("hidden");
// $('.billing-links').addClass("hidden");
// $('.select-billling-address').addClass("hidden");
// });
// });



// for same adrress ship and billing    
$(document).ready(function(){
$('.form-check').on('change','input.same-address',function(event){
$(this).prop('checked',true);
$(".select-billing-add-checkbox").prop('checked',false);

var status=$(this).is(':checked');
if(status==true){
var name=$('#address_name').text();
var address=$('#address_address').text();
var address2=$('#address_address2').text();
var zip_code=$('#address_zipcode').text();

var add_id=$('#ship-add-order').attr('value');
$('#billing-add-order').attr('value',add_id);
$('#address_name_bill').text(name);
$('#address_address_bill').text(address);
$('#address_address2_bill').text(address2);
$('#address_zipcode_bill').text(zip_code);
$('.same-ship-bill').removeClass('hidden');
$('.billing-links').addClass("hidden");
$('.billing-address').addClass("hidden");
$('.select-billling-address').addClass("hidden");

}
else{
$('.same-ship-bill').addClass('hidden');
$('.billing-links').removeClass("hidden");
$('#billing-add-order').attr('value',"");   
}
});
});



//use address in 
$(document).ready(function(){
$('#edit-address-main').on('click','.use-address button.use-ship-address',function(event){
var address=$(this).attr('value');
var address = JSON.parse(address);

$('#ship-add-order').attr('value',address.address_id);
$('#address_name').text(address.name);
$('#address_address').text(address.address);
$('#address_address2').text(address.address2);
$('#address_zipcode').text(address.zip_code);

/*for billling adress*/

var same_checked=$('.same-address').is(':checked');
if(same_checked==true){
$('#billing-add-order').attr('value',address.address_id);
$('#address_name_bill').text(address.name);
$('#address_address_bill').text(address.address);
$('#address_address2_bill').text(address.address2);
$('#address_zipcode_bill').text(address.zip_code);
}

$('.edit-address-main').addClass("hidden");
$('.old-add').removeClass("hidden");
});
});


/*for edit address */
$(document).ready(function(){
// $.each(address,function(index,item){    
$('#edit-address-main').on('click','a.edit-addd', function(event){
//alert("plase edit address and click on save changes !!!!!");

var address=$(this).attr('id');
var address = JSON.parse(address);

var address_id=$('#add-id').val(address.address_id);
var fname=$('#f-name').val(address.name);
var lname=$('#l-name').val(address.last_name);
var companyname=$('#company-name').val(address.company_name);
var add1=$('#add-1').val(address.address);
var add2=$('#add-2').val(address.address2);
var zipcode=$('#zip-code').val(address.zip_code);
var telephone=$('#tel').val(address.telephone);
var ext=$('#ext').val(address.ext);
// var fax=$('#fax').val(address.fax);

/*$('.s-edit-address').removeClass("hidden");*/

});
});
// }); 


var address=<?php echo $data['all_address'];?>;

/*for delete address*/
$(document).ready(function(){
$('#edit-address-main').on('click','.edit-delete-row a.delete-add', function(event){
//alert($(this).attr('id'));
var address_id=$(this).attr('id');
$.ajax({
url:"{{$base_url}}/delete/shipping/address",
type:'POST',
data:{'address_id':address_id,_token:'{{csrf_token()}}'},
    success: function(data)
    {    
           $('.multiple-add-'+address_id).remove();
            var count=$('.edit-delete-row').length; 
            if(count==1) {
            $('.delete-add').addClass('disabled-item');
            }

        document.getElementById("edit-address-main").innerHTML=data.data.data.sections;
        document.getElementById("updated-address").innerHTML=data.data.data.sections2;
       
/*      $('.edit-address-main').addClass("hidden");
        $('.old-add').removeClass("hidden");*/

    },
error: function (xhr, textStatus, errorThrown) {
}
});
}); 
});



//add new address edit address button 
$(document).ready(function(){
$('#edit-address-main').on('click','.address-new button.in-edit-addnew',function(event){
$('.old-add').addClass("hidden");
$('.edit-address-main').addClass("hidden");
$('.add-new-address').removeClass("hidden");
});
});




//add new address  
$(document).ready(function(){
$('.address-parent').on('click','button.add-new-add',function(event){
$('.old-add').addClass("hidden");
$('.add-new-address').removeClass("hidden");
});
});


// for canada us in add new  address    
$(document).ready(function(){
$('.form-check').on('click','input.canadan',function(event){
    $(this).prop('checked', true);
    $(".united-staten").prop('checked',false);
    $('#Province').removeClass("hidden");
    $('#State').addClass("hidden"); 
    $("#zip-coden").val("");

    $("#ZipCoden").addClass("hidden");
    $('#PostalCoden').removeClass("hidden"); 


 var country_id =35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
  $("#staten").empty();
  defult_state='<option value="" selected>Select</option';
  $("#staten").append(defult_state);

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

  
});
});


// for us in add new address   
$(document).ready(function(){


var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
  $("#staten").empty();
  defult_state='<option value="" selected>Select</option';
  $("#staten").append(defult_state);

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



$('.form-check').on('click','input.united-staten',function(event){
    $(this).prop('checked', true);
    $(".canadan").prop('checked',false);
    $('#Province').addClass("hidden");
    $('#State').removeClass("hidden"); 
    $("#zip-coden").val(""); 

    $("#ZipCoden").removeClass("hidden");
    $('#PostalCoden').addClass("hidden"); 


 
 var country_id = 190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
  $("#staten").empty();
  defult_state='<option value="" selected>Select</option';
  $("#staten").append(defult_state);

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





 
});
});


//add new  address save data   
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
/*var fax=$('#faxn').val();*/


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
    url: "{{$base_url}}/checkout/addnew/address",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function(data)
    {    
 
        if(data.status==1){

        document.getElementById("edit-address-main").innerHTML=data.data.data.sections;
        document.getElementById("updated-address").innerHTML=data.data.data.sections2;
        
        document.getElementById("addnewaddressform").reset();
        $(".united-staten").prop('checked',true);

        $('.add-new-address').addClass("hidden");
        $('.old-add').removeClass("hidden");

       
         var country_id = 190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state").append(defult_state);

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


        }else
        {
        document.getElementById("edit-address-main").innerHTML=data.data.data;
        document.getElementById("addnewaddressform").reset();
        $(".united-staten").prop('checked',true);

        $('.add-new-address').addClass("hidden");
        $('.old-add').removeClass("hidden");


        var country_id = 190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state").append(defult_state);

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
    },

     error: function(data){

    }           
});

}
else{     
     $.notify("Please enter all mandetory fileds","danger");
}
});
});


//add new address cancel
$(document).ready(function(){
$('.new-add-cancel').on('click','button.btn-cancel',function(event){
$('.add-new-address').addClass("hidden");
$('.old-add').removeClass("hidden");
});
});


//add new address  
$(document).ready(function(){
$('.address-parent').on('click','button.add-new-add',function(event){
$('.old-add').addClass("hidden");
$('.add-new-address').removeClass("hidden");
});
});


//edit address 
$(document).ready(function(){
$("#edit-address-main").on('click','.edit-ad-check button.btn-save-changes', function(event){ 
var UnitedStates=$('.united-state').is(':checked');
var Canada=$('.canada').is(':checked');

if(UnitedStates==true){
    var Country=190;
}else
{
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
    url: "{{$base_url}}/checkout-edit-address",
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,

    success: function(data)
    {    
        document.getElementById("edit-address-main").innerHTML=data.data.data.sections;
        document.getElementById("updated-address").innerHTML=data.data.data.sections2;
        $('.edit-address-main').addClass("hidden");
        $('.old-add').removeClass("hidden");
      

        var country_id =190;
        $.ajax({
        type: "post",
        url: "{{$base_url}}/getall-country-checkout",
        data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
        success: function (result) {    
        var state=result['states'];
          $("#state").empty();
          defult_state='<option value="" selected>Select</option';
          $("#state").append(defult_state);

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
           

    },

    error: function(data){
    }           
});


}
else{
     
     $.notify("Please enter all mandetory fileds","danger");
}

});
});




// for canada us in edit address    
$(document).ready(function(){
$('.edit-address-main').on('click','input.canada',function(event){
    $(this).prop('checked', true);
    $(".united-state").prop('checked',false);
    $('#editState').addClass('hidden');
    $('#editProvince').removeClass('hidden');
    $("#zip-code").val("");

    $("#ZipCode").addClass("hidden");
    $('#PostalCode').removeClass("hidden"); 



 var country_id =35;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
  $("#state").empty();
  defult_state='<option value="" selected>Select</option';
  $("#state").append(defult_state);

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





});

});


// for us in edit address   
$(document).ready(function(){

var country_id =190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
  $("#state").empty();
  defult_state='<option value="" selected>Select</option';
  $("#state").append(defult_state);

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



$('.edit-address-main').on('click','input.united-state',function(event){
    $(this).prop('checked', true);
    $(".canada").prop('checked',false);
    $('#editState').removeClass('hidden');
    $('#editProvince').addClass('hidden');
    $("#zip-code").val("");

    $("#ZipCode").removeClass("hidden");
    $('#PostalCode').addClass("hidden"); 


var country_id =190;
$.ajax({
type: "post",
url: "{{$base_url}}/getall-country-checkout",
data: {'country_id':country_id,"_token":"{{ csrf_token()}}"},
success: function (result) {    
var state=result['states'];
  $("#state").empty();
  defult_state='<option value="" selected>Select</option';
  $("#state").append(defult_state);

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



});
});




$(document).ready(function(){
$('#edit-address-main').on('click','.edit-add-cancel button.btn-cancel',function(event){
$('.edit-address-main').addClass("hidden");
$('.old-add').removeClass("hidden");
/*$('.s-edit-address').addClass("hidden");*/
});
});


$(document).ready(function(){
$('.editaddress').on('click','button.edit-add',function(event){    
$('.edit-address-main').removeClass("hidden");
$('.old-add').addClass("hidden");

var count=$('.edit-delete-row').length; 

if(count==1) {
    $('.delete-add').addClass('disabled-item');
}

});
});



// for multiple location    
$(document).ready(function(){
$('.multiple-location').on('change','.form-check input.single-location',function(event){
    $(this).prop('checked', true);
    $(".m-location").prop('checked',false);
    $('.is-multiplelocation').addClass("hidden");
});
});



$(document).ready(function(){
$('.multiple-location').on('change','.form-check input.m-location',function(event){
$(this).prop('checked', true);
$(".single-location").prop('checked',false);
$('.is-multiplelocation').removeClass("hidden");
});
});


/*tax exemption*/

$(document).ready(function(){
$('.tax-exemption').on('change','.form-check input.no-certificate',function(event){

$(this).prop('checked', true);
$(".certificate").prop('checked',false);
$(".p-later").prop('checked',false);
$('.is-certificate').addClass("hidden");
});
});


$(document).ready(function(){
$('.tax-exemption').on('change','.form-check input.certificate',function(event){
$(this).prop('checked', true);
$(".no-certificate").prop('checked',false);
$(".p-later").prop('checked',false);
$('.is-certificate').removeClass("hidden");
});
});



$(document).ready(function(){
$('.tax-exemption').on('change','.form-check input.p-later',function(event){
$(this).prop('checked', true);
$(".no-certificate").prop('checked',false);
$(".certificate").prop('checked',false);
$('.is-certificate').addClass("hidden");
});
});



/*for payment process*/
$(document).ready(function(){
$('.Payment-section').on('change','.form-check input.credit_card',function(event){
$(this).prop('checked', true);
$(".afterapproval").prop('checked',false);
$(".moneyorder").prop('checked',false);
$('.credit-card-section').removeClass('hidden');
$('.afterapproval-section').addClass('hidden');
$('.moneyorder-section').addClass('hidden');
});
});

    

$(document).ready(function(){
$('.Payment-section').on('change','.form-check input.moneyorder',function(event){
$(this).prop('checked', true);
$(".credit_card").prop('checked',false);
$(".afterapproval").prop('checked',false);
$('.credit-card-section').addClass('hidden');
$('.afterapproval-section').addClass('hidden');
$('.moneyorder-section').removeClass('hidden');
});
});


$(document).ready(function(){
$('.Payment-section').on('change','.form-check input.afterapproval',function(event){
$(this).prop('checked', true);
$(".moneyorder").prop('checked',false);
$(".credit_card").prop('checked',false);
$('.credit-card-section').addClass('hidden');
$('.moneyorder-section').addClass('hidden');
$('.afterapproval-section').removeClass('hidden');
});
});


</script>

<script type="text/javascript">
$(document).ready(function(){
$('.shipping-data').hide();
$('a.shipping_to_multiple_location_link').on('click',function(){
$('.shipping-data').toggle();
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('.text_exmption_data').hide();
$('a.tax_exempt_link').on('click',function(){
$('.text_exmption_data').toggle();
});
});
</script>
@endsection