  @extends('superior.layouts.app',['title' => "SuperiorPromos "])
  @section('keyworddescription') 
  @section('description')
  @section('content')

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
    width: 101px;
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

</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


        <main class="main">
              <div class="container">
               <div class="row p-4">
                <span class="link-top-1">Home /</span>
                <span class="link-top-1">Cart /</span>
                <a href="#"><span class="checkout-link">Checkout</span></a>
               </div>

                <div class="row p-3">
                <span class="cart-txt">Edit Address</span>
                </div>

                 <div class="row ">
    
                     <div class="col-md-8 pr-5">

                     <div class="row shipping-add p-3"> <span class="shipping-txt">Shipping Address</span> 
                     </div> 
                      
                      <div class="row pt-3 pb-3">

                        <div class="col-md-6"> 

                         <div class="row d-flex align-items-center pt-3 pb-3">
                           <div class="col-md-7">
                            <ul>
                               <li><span>Devid</span></li>
                                <li><span>12-45 River Road Fair Lawn, NJ 07410</span></li>
                                <li><span>1-888-544-2534</span></li>
                            </ul>
                           </div>
                           <div class="col-md-5">
                               <button class="edit-add">Use Address</button>
                           </div>
                           <div class="row">
                            <a href="#" class="add-link">Edit Address</a>
                            <a href="#" class="add-link">Delete Address</a>
                           </div>
                         </div>


<!--                          <div class="row d-flex align-items-center pt-3 pb-3">
                           <div class="col-md-7">
                            <ul>
                               <li><span>Devid</span></li>
                                <li><span>12-45 River Road Fair Lawn, NJ 07410</span></li>
                                <li><span>1-888-544-2534</span></li>
                            </ul>
                           </div>
                           <div class="col-md-5">
                               <button class="edit-add">Use Address</button>
                           </div>
                           <div class="row">
                            <a href="#" class="add-link">Edit Address</a>
                            <a href="#" class="add-link">Delete Address</a>
                           </div>
                         </div> -->

                          <div class="row pt-5 pb-5">
                              <button class="btn-address"> Add a New Address</button>
                          </div>

                        </div>




                        <div class="col-md-6">
                        <span class="add-add pb-3">Add a New Address</span>
                         <p>Starred(*) Fields are required.</p>

                        <div class="row  pt-3 pl-5">
                            <div class="account-content">
                                <form action="#">

                                      <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Country<span class="required">*</span></label>
                                      
                                         <div class="form-group form-check">

                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label check-checkout" for="exampleCheck1">United States</label>
                                       
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label check-checkout" for="exampleCheck1">Canada</label>

                                          </div>
                                     </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="David" id="acc-name" name="acc-name" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Last Name<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="acc-lastname" placeholder="01 / 2025" name="acc-lastname" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="David" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 1<span class="required">*</span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="2543  0042 3562 0210" required="">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Address Line 2<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="2543  0042 3562 0210" required="">
                                    </div>



                                    <div class="row">     
                                    <div class="col">
                                    <div class="select-custom">
                                        <label class="form-lbl">City<span class="required">*</span></label>
                                        <select name="orderby" class="form-control txt-lbl">
                                            <option value="" selected="selected">British Indian Ocean Territory
                                            </option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                    </div>
                                    </div>

                                      <div class="col">
                                       <div class="select-custom">
                                        <label class="form-lbl">State<span class="required">*</span></label>
                                        <select name="orderby" class="form-control txt-lbl">
                                            <option value="" selected="selected">British Indian Ocean Territory
                                            </option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                       </div>
                                      </div>


                                    <div class="col">
                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Company Name<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="David" required="">
                                    </div>                                         
                                    </div>
                                   </div>


                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-name" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" placeholder="Day Telephone" id="acc-name" name="acc-name" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="acc-lastname " class="form-lbl">Ext:<span class="required">*</span></label>
                                                <input type="text" class="form-control txt-lbl" id="acc-lastname" placeholder="Ext" name="acc-lastname" required="">
                                            </div>
                                        </div>
                                    </div>  



                                    <div class="form-group mb-2">
                                        <label for="acc-text" class="form-lbl">Fax<span class="required"></span></label>
                                        <input type="text" class="form-control txt-lbl" id="acc-text" name="acc-text" placeholder="Fax" required="">
                                    </div>


                                    <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label check-checkout" for="exampleCheck1">Make this my default shipping address</label>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                         <button class="btn-save-changes">Save Change</button>   
                                        </div>
                                        <div class="col">
                                          <button class="btn-cancel">Cancel</button>  
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        </div>    
                      </div>


                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Ship to Multiple Location
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select> 
                       </div>


                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Tex Exemption Certificate
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select> 
                       </div>



                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Payment Method
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select> 
                       </div>

                       <div class="row"> 
                        <select name="orderby" class="form-control-superior shipping-add shipping-txt">
                            <option value="" selected="selected">Enter a Billing Address
                            </option>
                            <option value="1">Brunei</option>
                            <option value="2">Bulgaria</option>
                            <option value="3">Burkina Faso</option>
                            <option value="4">Burundi</option>
                            <option value="5">Cameroon</option>
                        </select>
                       </div> 

                        <div class="row pt-5 pb-5">
                            <div class="col-md-2"><button class="bck-ord">Back</button></div>
                            <div class="col-md-2"><button class="place-ord">Place Order</button></div>

                        </div>

                    </div>

<!-- ----------------------------------------------- left side end  -->


<div class="modal fade" id="order-detail-editaddress">
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




                   
                     <div class="col-md-4 order-details">
                     <div class="row shipping-add p-3 ">
                      <span class="ord-txt">Order Details</span> 
                     </div>
                        <ul>
                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-left">Product Total</div>
                            <div class="col-md-4 ord-amt-txt">$529.00</div>
                            </div>
                            </p>
                            </li>

                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-left">Shipping Cost</div>
                            <div class="col-md-4 ord-amt-txt">$0.00</div>
                            </div>
                            </p>
                            </li>


                            <li>
                            <p>
                            <div class="row "> 
                            <div class="col-md-8 ord-t-txt">Order Total</div>
                            <div class="col-md-4 ord-total">$529.00</div>
                            </div>
                            </p>
                            </li>                             
                        </ul>
                         
                         <p class="pb-4"><button type="button" class="ord-deteils-btn" data-toggle="modal" data-target="#order-detail-editaddress">Details</button></p>
                         
                     </div>
<!-- -------total part end ------------------------------------------------ -->

                 </div>

            </div>


        </main>






  @endsection