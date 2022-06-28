  @extends('superior.layouts.app',['title' => "SuperiorPromos "])
  @section('keyworddescription') 
  @section('description')
  @section('content')
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


.btn-register:hover, .btn-register:focus, .btn-register:active, .btn-register.active, .open>.dropdown-toggle.btn-register {
    color: #ffffff;
    background-color: #00b3db;
    border-color: #285e8e;
}




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

<div class="container pt-5 pb-5">
<div class="row background-login"> 
<div class="col-md-6 login-image"></div>


<div class="col-md-6 pt-5 login-col"> 

<span class="register-text pb-4 pl-4">Account Ragistration</span>
 <p class="pl-4">Starred(*) Fields are required.</p>

<div class="row  pt-3 pl-5">
    <div class="account-content">
        <form action="{{$base_url}}/registeruser" method="post" onsubmit="return checkForm(this);">
            {{ csrf_field() }}
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
                        <label for="acc-name" class="form-lbl ">First Name<span class="required">*</span></label>
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


            <div class="form-group mb-2">
                <label for="acc-text" class="email">Email<span class="required">*</span></label>
                <input type="email" class="form-control txt-lbl" id="email" name="email" placeholder="abc@gmail.com" required="">
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
                    @foreach($Allcity as $city)
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
                    @foreach($Allstates as $state)
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
                    <div class="form-group">
                        <label for="day_telephone" class="form-lbl ">Day Telephone<span class="required">*</span></label>
                        <input type="text" class="form-control txt-lbl @error('day_telephone') is-invalid @enderror"  id="mobile-no" required="" placeholder="___-___-____"  maxlength="16" name="day_telephone"  value="{{old('day_telephone')}}">
                        @error('day_telephone')
                                <div class="alert alert-danger" style="color: red !important;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="extenssion" class="form-lbl">Ext:<span class="required"></span></label>
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
                    <div class="form-group">
                        <label for="password" class="form-lbl ">Password<span class="required">*</span></label>
                        <input type="password" class="form-control txt-lbl" placeholder="password" id="password" name="pass1" required="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="confirm_password" class="form-lbl">Confirm Password<span class="required">*</span></label>
                        <input type="password" class="form-control txt-lbl" id="confirm_password" placeholder="confirm password" name="pass2" required="">
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
                     <button type="submit" class="btn-register btn-log btn-md w-100">
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


/*validate mobile number*/
const isNumericInput = (event) => {
    const key = event.keyCode;
    return ((key >= 48 && key <= 57) || // Allow number line
        (key >= 96 && key <= 105) // Allow number pad
    );
};

const isModifierKey = (event) => {
    const key = event.keyCode;
    return (event.shiftKey === true || key === 35 || key === 36) || // Allow Shift, Home, End
        (key === 8 || key === 9 || key === 13 || key === 46) || // Allow Backspace, Tab, Enter, Delete
        (key > 36 && key < 41) || // Allow left, up, right, down
        (
            // Allow Ctrl/Command + A,C,V,X,Z
            (event.ctrlKey === true || event.metaKey === true) &&
            (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
        )
};

const enforceFormat = (event) => {
    // Input must be of a valid number format or a modifier key, and not longer than ten digits
    if(!isNumericInput(event) && !isModifierKey(event)){
        event.preventDefault();
    }
};

const formatToPhone = (event) => {
    if(isModifierKey(event)) {return;}

    // I am lazy and don't like to type things more than once
    const target = event.target;
    const input = event.target.value.replace(/\D/g,'').substring(0,10); // First ten digits of input only
    const zip = input.substring(0,3);
    const middle = input.substring(3,6);
    const last = input.substring(6,10);

    if(input.length > 6){target.value = `${zip} - ${middle} - ${last}`;}
    else if(input.length > 3){target.value = `${zip} - ${middle}`;}
    else if(input.length > 0){target.value = `${zip}`;}
};

const inputElement = document.getElementById('mobile-no');
inputElement.addEventListener('keydown',enforceFormat);
inputElement.addEventListener('keyup',formatToPhone);
</script>

<!--------------------------------------------------------->




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

@endsection

