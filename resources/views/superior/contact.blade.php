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

.main-lable{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.sub-lable{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
letter-spacing: -0.017em;
color: #212121;
}

.contanit-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 19px;
letter-spacing: -0.017em;
color: #575757;
}

.col-border {
    background: #FFFFFF;
    border: 1px solid #E1E1E1;
    box-sizing: border-box;
    box-shadow: 0px 3px 16px rgba(0, 0, 0, 0.1);
    max-width: 380px;
    margin-right: 28px;
}


.color-b{ 
    color: #01abec;
    text-decoration: underline;
}

.con-text-lbl{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 20px;
line-height: 23px;
letter-spacing: -0.017em;
color: #212121;
}


textarea.form-control-contact{
    max-width: 100%;
    min-height: 176px;
}

.contact-form-border{
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
}

form{
    margin-bottom: 0rem;
}

.btn-submit-contact{
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
width:172px;
height:40px;
}

label.contact{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
} 

.input-txt {
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 14px;
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
    top: 70%;
    right: 1.9rem;
    -webkit-transform: translateY(-51%);
    transform: translateY(-51%);
    color: #34373f;
    font-family: 'porto';
    font-size: 1.5rem;
    content: '\e81c';
}

.col-border-last{
    background: #FFFFFF;
    border: 1px solid #E1E1E1;
    box-sizing: border-box;
    box-shadow: 0px 3px 16px rgba(0, 0, 0, 0.1);
    max-width: 380px;
    margin-right:0px;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<div class="main pl-3">
    <div class="container pb-5 checkout-container">
      <div class="row pt-3">
      <span class="cart-txt">Contact Us</span>
      </div>

      <div class="row pt-5 pb-5 ">
       
        <div class="col-lg-4 col-border">
           
           <div class="row p-4">
             <span class="main-lable">Contact Number</span>
           </div>

           <div class="row">
             <div class="col-md-1">
               <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 0C6.64583 0 5.38281 0.345052 4.21094 1.03516C3.07812 1.6862 2.1862 2.57812 1.53516 3.71094C0.845052 4.88281 0.5 6.14583 0.5 7.5C0.5 8.85417 0.845052 10.1172 1.53516 11.2891C2.1862 12.4219 3.07812 13.3203 4.21094 13.9844C5.38281 14.6615 6.64583 15 8 15C9.35417 15 10.6172 14.6615 11.7891 13.9844C12.9219 13.3203 13.8203 12.4219 14.4844 11.2891C15.1615 10.1172 15.5 8.85417 15.5 7.5C15.5 6.14583 15.1615 4.88281 14.4844 3.71094C13.8203 2.57812 12.9219 1.6862 11.7891 1.03516C10.6172 0.345052 9.35417 0 8 0ZM8 1.25C9.13281 1.25 10.1875 1.53646 11.1641 2.10938C12.1016 2.65625 12.8438 3.39844 13.3906 4.33594C13.9635 5.3125 14.25 6.36719 14.25 7.5C14.25 8.63281 13.9635 9.6875 13.3906 10.6641C12.8438 11.6016 12.1016 12.3438 11.1641 12.8906C10.1875 13.4635 9.13281 13.75 8 13.75C6.86719 13.75 5.8125 13.4635 4.83594 12.8906C3.89844 12.3438 3.15625 11.6016 2.60938 10.6641C2.03646 9.6875 1.75 8.63281 1.75 7.5C1.75 6.36719 2.03646 5.3125 2.60938 4.33594C3.15625 3.39844 3.89844 2.65625 4.83594 2.10938C5.8125 1.53646 6.86719 1.25 8 1.25ZM7.375 2.5V8.125H11.75V6.875H8.625V2.5H7.375Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Office Hours</li>
                 @if($ContactUs->office_hours!="")
                 <li class="contanit-txt">{{$ContactUs->office_hours}}</li>
                 @endif
               </ul>
             </div>
           </div>


           <div class="row">
             <div class="col-md-1">
              <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.875 0.5V1.75C12.112 1.75 13.2708 2.0625 14.3516 2.6875C15.3802 3.29948 16.2005 4.11979 16.8125 5.14844C17.4375 6.22917 17.75 7.38802 17.75 8.625H19C19 7.15365 18.6289 5.78646 17.8867 4.52344C17.1706 3.29948 16.2005 2.32943 14.9766 1.61328C13.7135 0.871094 12.3464 0.5 10.875 0.5ZM4.41016 2.375C4.05859 2.375 3.7526 2.48568 3.49219 2.70703L1.48047 4.75781L1.53906 4.71875C1.21354 4.99219 0.998698 5.33073 0.894531 5.73438C0.803385 6.13802 0.829427 6.52865 0.972656 6.90625C1.33724 7.92188 1.82552 8.96354 2.4375 10.0312C3.29688 11.5026 4.31901 12.8242 5.50391 13.9961C7.40495 15.9102 9.76823 17.4206 12.5938 18.5273H12.6133C12.9909 18.6576 13.3685 18.6836 13.7461 18.6055C14.1367 18.5273 14.4818 18.3581 14.7812 18.0977L16.7539 16.125C17.0143 15.8646 17.1445 15.5456 17.1445 15.168C17.1445 14.7773 17.0143 14.4518 16.7539 14.1914L14.1953 11.6133C13.9349 11.3529 13.6094 11.2227 13.2188 11.2227C12.8281 11.2227 12.5026 11.3529 12.2422 11.6133L11.0117 12.8633C10.0221 12.3945 9.16276 11.8151 8.43359 11.125C7.70443 10.4219 7.125 9.56901 6.69531 8.56641L7.94531 7.31641C8.21875 7.02995 8.35547 6.69141 8.35547 6.30078C8.35547 5.89714 8.19922 5.57161 7.88672 5.32422L7.94531 5.38281L5.32812 2.70703C5.06771 2.48568 4.76172 2.375 4.41016 2.375ZM10.875 3V4.25C11.6693 4.25 12.3984 4.44531 13.0625 4.83594C13.7396 5.22656 14.2734 5.76042 14.6641 6.4375C15.0547 7.10156 15.25 7.83073 15.25 8.625H16.5C16.5 7.60938 16.2461 6.66536 15.7383 5.79297C15.2305 4.94661 14.5534 4.26953 13.707 3.76172C12.8346 3.25391 11.8906 3 10.875 3ZM4.41016 3.625C4.44922 3.625 4.49479 3.64453 4.54688 3.68359L7.10547 6.30078C7.11849 6.35286 7.10547 6.39844 7.06641 6.4375L5.21094 8.27344L5.34766 8.66406L5.60156 9.21094C5.8099 9.65365 6.05078 10.0833 6.32422 10.5C6.70182 11.0859 7.11849 11.5872 7.57422 12.0039C8.1862 12.6029 8.92188 13.1497 9.78125 13.6445C10.2109 13.8919 10.5755 14.0742 10.875 14.1914L11.2656 14.3672L13.1602 12.4727C13.1862 12.4466 13.2057 12.4336 13.2188 12.4336C13.2318 12.4336 13.2513 12.4466 13.2773 12.4727L15.9141 15.1094C15.9401 15.1354 15.9531 15.1549 15.9531 15.168C15.9531 15.168 15.9401 15.181 15.9141 15.207L13.9609 17.1406C13.6745 17.388 13.362 17.4531 13.0234 17.3359C10.3672 16.3073 8.15365 14.901 6.38281 13.1172C5.28906 12.0234 4.33203 10.7799 3.51172 9.38672C2.92578 8.38411 2.47005 7.41406 2.14453 6.47656V6.45703C2.09245 6.33984 2.08594 6.20312 2.125 6.04688C2.16406 5.8776 2.23568 5.7474 2.33984 5.65625L4.27344 3.68359C4.3125 3.64453 4.35807 3.625 4.41016 3.625ZM10.875 5.5V6.75C11.3958 6.75 11.8385 6.93229 12.2031 7.29688C12.5677 7.66146 12.75 8.10417 12.75 8.625H14C14 8.0651 13.8568 7.54427 13.5703 7.0625C13.2969 6.58073 12.9193 6.20312 12.4375 5.92969C11.9557 5.64323 11.4349 5.5 10.875 5.5Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Toll Free</li>
                 @if($ContactUs->toll_free!="")
                 <li class="contanit-txt">{{$ContactUs->toll_free}}</li>
                 @endif
               </ul>
             </div>
           </div>


           <div class="row">
             <div class="col-md-1">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.875 0.5V1.75C12.112 1.75 13.2708 2.0625 14.3516 2.6875C15.3802 3.29948 16.2005 4.11979 16.8125 5.14844C17.4375 6.22917 17.75 7.38802 17.75 8.625H19C19 7.15365 18.6289 5.78646 17.8867 4.52344C17.1706 3.29948 16.2005 2.32943 14.9766 1.61328C13.7135 0.871094 12.3464 0.5 10.875 0.5ZM4.41016 2.375C4.05859 2.375 3.7526 2.48568 3.49219 2.70703L1.48047 4.75781L1.53906 4.71875C1.21354 4.99219 0.998698 5.33073 0.894531 5.73438C0.803385 6.13802 0.829427 6.52865 0.972656 6.90625C1.33724 7.92188 1.82552 8.96354 2.4375 10.0312C3.29688 11.5026 4.31901 12.8242 5.50391 13.9961C7.40495 15.9102 9.76823 17.4206 12.5938 18.5273H12.6133C12.9909 18.6576 13.3685 18.6836 13.7461 18.6055C14.1367 18.5273 14.4818 18.3581 14.7812 18.0977L16.7539 16.125C17.0143 15.8646 17.1445 15.5456 17.1445 15.168C17.1445 14.7773 17.0143 14.4518 16.7539 14.1914L14.1953 11.6133C13.9349 11.3529 13.6094 11.2227 13.2188 11.2227C12.8281 11.2227 12.5026 11.3529 12.2422 11.6133L11.0117 12.8633C10.0221 12.3945 9.16276 11.8151 8.43359 11.125C7.70443 10.4219 7.125 9.56901 6.69531 8.56641L7.94531 7.31641C8.21875 7.02995 8.35547 6.69141 8.35547 6.30078C8.35547 5.89714 8.19922 5.57161 7.88672 5.32422L7.94531 5.38281L5.32812 2.70703C5.06771 2.48568 4.76172 2.375 4.41016 2.375ZM10.875 3V4.25C11.6693 4.25 12.3984 4.44531 13.0625 4.83594C13.7396 5.22656 14.2734 5.76042 14.6641 6.4375C15.0547 7.10156 15.25 7.83073 15.25 8.625H16.5C16.5 7.60938 16.2461 6.66536 15.7383 5.79297C15.2305 4.94661 14.5534 4.26953 13.707 3.76172C12.8346 3.25391 11.8906 3 10.875 3ZM4.41016 3.625C4.44922 3.625 4.49479 3.64453 4.54688 3.68359L7.10547 6.30078C7.11849 6.35286 7.10547 6.39844 7.06641 6.4375L5.21094 8.27344L5.34766 8.66406L5.60156 9.21094C5.8099 9.65365 6.05078 10.0833 6.32422 10.5C6.70182 11.0859 7.11849 11.5872 7.57422 12.0039C8.1862 12.6029 8.92188 13.1497 9.78125 13.6445C10.2109 13.8919 10.5755 14.0742 10.875 14.1914L11.2656 14.3672L13.1602 12.4727C13.1862 12.4466 13.2057 12.4336 13.2188 12.4336C13.2318 12.4336 13.2513 12.4466 13.2773 12.4727L15.9141 15.1094C15.9401 15.1354 15.9531 15.1549 15.9531 15.168C15.9531 15.168 15.9401 15.181 15.9141 15.207L13.9609 17.1406C13.6745 17.388 13.362 17.4531 13.0234 17.3359C10.3672 16.3073 8.15365 14.901 6.38281 13.1172C5.28906 12.0234 4.33203 10.7799 3.51172 9.38672C2.92578 8.38411 2.47005 7.41406 2.14453 6.47656V6.45703C2.09245 6.33984 2.08594 6.20312 2.125 6.04688C2.16406 5.8776 2.23568 5.7474 2.33984 5.65625L4.27344 3.68359C4.3125 3.64453 4.35807 3.625 4.41016 3.625ZM10.875 5.5V6.75C11.3958 6.75 11.8385 6.93229 12.2031 7.29688C12.5677 7.66146 12.75 8.10417 12.75 8.625H14C14 8.0651 13.8568 7.54427 13.5703 7.0625C13.2969 6.58073 12.9193 6.20312 12.4375 5.92969C11.9557 5.64323 11.4349 5.5 10.875 5.5Z" fill="#575757"/>
                </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Local #</li>
                 @if($ContactUs->local_no!="")
                 <li class="contanit-txt">{{$ContactUs->local_no}}</li>
                 @endif
               </ul>
             </div>
           </div>


           <div class="row">
             <div class="col-md-1">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.875 0.5V1.75C12.112 1.75 13.2708 2.0625 14.3516 2.6875C15.3802 3.29948 16.2005 4.11979 16.8125 5.14844C17.4375 6.22917 17.75 7.38802 17.75 8.625H19C19 7.15365 18.6289 5.78646 17.8867 4.52344C17.1706 3.29948 16.2005 2.32943 14.9766 1.61328C13.7135 0.871094 12.3464 0.5 10.875 0.5ZM4.41016 2.375C4.05859 2.375 3.7526 2.48568 3.49219 2.70703L1.48047 4.75781L1.53906 4.71875C1.21354 4.99219 0.998698 5.33073 0.894531 5.73438C0.803385 6.13802 0.829427 6.52865 0.972656 6.90625C1.33724 7.92188 1.82552 8.96354 2.4375 10.0312C3.29688 11.5026 4.31901 12.8242 5.50391 13.9961C7.40495 15.9102 9.76823 17.4206 12.5938 18.5273H12.6133C12.9909 18.6576 13.3685 18.6836 13.7461 18.6055C14.1367 18.5273 14.4818 18.3581 14.7812 18.0977L16.7539 16.125C17.0143 15.8646 17.1445 15.5456 17.1445 15.168C17.1445 14.7773 17.0143 14.4518 16.7539 14.1914L14.1953 11.6133C13.9349 11.3529 13.6094 11.2227 13.2188 11.2227C12.8281 11.2227 12.5026 11.3529 12.2422 11.6133L11.0117 12.8633C10.0221 12.3945 9.16276 11.8151 8.43359 11.125C7.70443 10.4219 7.125 9.56901 6.69531 8.56641L7.94531 7.31641C8.21875 7.02995 8.35547 6.69141 8.35547 6.30078C8.35547 5.89714 8.19922 5.57161 7.88672 5.32422L7.94531 5.38281L5.32812 2.70703C5.06771 2.48568 4.76172 2.375 4.41016 2.375ZM10.875 3V4.25C11.6693 4.25 12.3984 4.44531 13.0625 4.83594C13.7396 5.22656 14.2734 5.76042 14.6641 6.4375C15.0547 7.10156 15.25 7.83073 15.25 8.625H16.5C16.5 7.60938 16.2461 6.66536 15.7383 5.79297C15.2305 4.94661 14.5534 4.26953 13.707 3.76172C12.8346 3.25391 11.8906 3 10.875 3ZM4.41016 3.625C4.44922 3.625 4.49479 3.64453 4.54688 3.68359L7.10547 6.30078C7.11849 6.35286 7.10547 6.39844 7.06641 6.4375L5.21094 8.27344L5.34766 8.66406L5.60156 9.21094C5.8099 9.65365 6.05078 10.0833 6.32422 10.5C6.70182 11.0859 7.11849 11.5872 7.57422 12.0039C8.1862 12.6029 8.92188 13.1497 9.78125 13.6445C10.2109 13.8919 10.5755 14.0742 10.875 14.1914L11.2656 14.3672L13.1602 12.4727C13.1862 12.4466 13.2057 12.4336 13.2188 12.4336C13.2318 12.4336 13.2513 12.4466 13.2773 12.4727L15.9141 15.1094C15.9401 15.1354 15.9531 15.1549 15.9531 15.168C15.9531 15.168 15.9401 15.181 15.9141 15.207L13.9609 17.1406C13.6745 17.388 13.362 17.4531 13.0234 17.3359C10.3672 16.3073 8.15365 14.901 6.38281 13.1172C5.28906 12.0234 4.33203 10.7799 3.51172 9.38672C2.92578 8.38411 2.47005 7.41406 2.14453 6.47656V6.45703C2.09245 6.33984 2.08594 6.20312 2.125 6.04688C2.16406 5.8776 2.23568 5.7474 2.33984 5.65625L4.27344 3.68359C4.3125 3.64453 4.35807 3.625 4.41016 3.625ZM10.875 5.5V6.75C11.3958 6.75 11.8385 6.93229 12.2031 7.29688C12.5677 7.66146 12.75 8.10417 12.75 8.625H14C14 8.0651 13.8568 7.54427 13.5703 7.0625C13.2969 6.58073 12.9193 6.20312 12.4375 5.92969C11.9557 5.64323 11.4349 5.5 10.875 5.5Z" fill="#575757"/>
                </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Fax</li>
                 @if($ContactUs->fax!="")
                 <li class="contanit-txt">{{$ContactUs->fax}}</li>
                 @endif
               </ul>
             </div>
           </div>
        </div>


<!-- ----------------------------------------------------------------------------------------- -->

        <div class="col-lg-4 col-border">
           
           <div class="row p-4">
             <span class="main-lable">Email Address</span>
           </div>

           <div class="row">
             <div class="col-md-1">
              <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.875 0.5V11.75H17.125V0.5H0.875ZM3.57031 1.75H14.4297L9 5.36328L3.57031 1.75ZM2.125 2.29688L8.64844 6.65234L9 6.86719L9.35156 6.65234L15.875 2.29688V10.5H2.125V2.29688Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">General Information / Order Help</li>
                 @if($ContactUs->general_information!="")
                 <li class="contanit-txt"><a href="mailto:business_email" class="color-b">{{$ContactUs->general_information}}</a></li>
                 @endif
               </ul>
             </div>
           </div>


           <div class="row">
             <div class="col-md-1">
              <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.875 0.5V11.75H17.125V0.5H0.875ZM3.57031 1.75H14.4297L9 5.36328L3.57031 1.75ZM2.125 2.29688L8.64844 6.65234L9 6.86719L9.35156 6.65234L15.875 2.29688V10.5H2.125V2.29688Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Sales and Quotes</li>
                 @if($ContactUs->salesandquotes!="")
                 <li class="contanit-txt"><a href="mailto:business_email" class="color-b">{{$ContactUs->salesandquotes}}</a></li>
                 @endif
               </ul>
             </div>
           </div>

           <div class="row">
             <div class="col-md-1">
              <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.875 0.5V11.75H17.125V0.5H0.875ZM3.57031 1.75H14.4297L9 5.36328L3.57031 1.75ZM2.125 2.29688L8.64844 6.65234L9 6.86719L9.35156 6.65234L15.875 2.29688V10.5H2.125V2.29688Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Art Department</li>
                 @if($ContactUs->art_department!="")
                 <li class="contanit-txt"><a href="mailto:business_email" class="color-b">{{$ContactUs->art_department}}</a></li>
                 @endif
               </ul>
             </div>
           </div>


           <div class="row">
             <div class="col-md-1">
              <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.875 0.5V11.75H17.125V0.5H0.875ZM3.57031 1.75H14.4297L9 5.36328L3.57031 1.75ZM2.125 2.29688L8.64844 6.65234L9 6.86719L9.35156 6.65234L15.875 2.29688V10.5H2.125V2.29688Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Billing Question</li>
                 @if($ContactUs->billing_question!="")
                 <li class="contanit-txt"><a href="mailto:business_email" class="color-b">{{$ContactUs->billing_question}}</a></li>
                 @endif
               </ul>
             </div>
           </div>


           <div class="row">
             <div class="col-md-1">
              <svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.875 0.5V11.75H17.125V0.5H0.875ZM3.57031 1.75H14.4297L9 5.36328L3.57031 1.75ZM2.125 2.29688L8.64844 6.65234L9 6.86719L9.35156 6.65234L15.875 2.29688V10.5H2.125V2.29688Z" fill="#575757"/>
              </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Samples Requests</li>
                  @if($ContactUs->samples_requests!="")
                 <li class="contanit-txt"><a href="mailto:business_email" class="color-b">{{$ContactUs->samples_requests}}</a></li>
                 @endif
               </ul>
             </div>
           </div>


        </div>


<!-- -------------------------------------------------------------------------------------- -->



        <div class="col-lg-4 col-border-last">
           
           <div class="row p-4">
             <span class="main-lable">Address</span>
           </div>

           <div class="row">
             <div class="col-md-1">
                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 0.375C4.98438 0.375 4.04036 0.628906 3.16797 1.13672C2.32161 1.64453 1.64453 2.32161 1.13672 3.16797C0.628906 4.04036 0.375 4.98438 0.375 6C0.375 6.40365 0.453125 6.8724 0.609375 7.40625C0.739583 7.84896 0.941406 8.3763 1.21484 8.98828C1.65755 9.99089 2.23698 11.1107 2.95312 12.3477C3.47396 13.2591 4.05339 14.1966 4.69141 15.1602C5.01693 15.6549 5.28385 16.0521 5.49219 16.3516L6 17.0938L7.30859 15.1602C7.94661 14.1966 8.52604 13.2591 9.04688 12.3477C9.76302 11.1107 10.3424 9.99089 10.7852 8.98828C11.0586 8.3763 11.2604 7.84896 11.3906 7.40625C11.5469 6.8724 11.625 6.40365 11.625 6C11.625 4.98438 11.3711 4.04036 10.8633 3.16797C10.3555 2.32161 9.67839 1.64453 8.83203 1.13672C7.95964 0.628906 7.01562 0.375 6 0.375ZM6 1.625C6.79427 1.625 7.52344 1.82031 8.1875 2.21094C8.86458 2.60156 9.39844 3.13542 9.78906 3.8125C10.1797 4.47656 10.375 5.20573 10.375 6C10.375 6.2474 10.3099 6.59896 10.1797 7.05469C10.0495 7.4974 9.8737 7.97266 9.65234 8.48047C9.27474 9.33984 8.70833 10.4206 7.95312 11.7227C7.3151 12.8164 6.67708 13.8451 6.03906 14.8086L6 14.8477L5.96094 14.8086C5.32292 13.8451 4.6849 12.8164 4.04688 11.7227C3.29167 10.4206 2.72526 9.33984 2.34766 8.48047C2.1263 7.97266 1.95052 7.4974 1.82031 7.05469C1.6901 6.59896 1.625 6.2474 1.625 6C1.625 5.20573 1.82031 4.47656 2.21094 3.8125C2.60156 3.13542 3.12891 2.60156 3.79297 2.21094C4.47005 1.82031 5.20573 1.625 6 1.625ZM6 4.75C5.64844 4.75 5.34896 4.8737 5.10156 5.12109C4.86719 5.35547 4.75 5.64844 4.75 6C4.75 6.35156 4.86719 6.65104 5.10156 6.89844C5.34896 7.13281 5.64844 7.25 6 7.25C6.35156 7.25 6.64453 7.13281 6.87891 6.89844C7.1263 6.65104 7.25 6.35156 7.25 6C7.25 5.64844 7.1263 5.35547 6.87891 5.12109C6.64453 4.8737 6.35156 4.75 6 4.75Z" fill="#575757"/>
                </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Address Superior Promos Inc</li>
                 @if($ContactUs->address_superiorpromos_inc!="")
                 <li class="contanit-txt">{{$ContactUs->address_superiorpromos_inc}}</li>
                 @endif
               </ul>
             </div>
           </div>



           <div class="row">
             <div class="col-md-1">
                <svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 0.375C4.98438 0.375 4.04036 0.628906 3.16797 1.13672C2.32161 1.64453 1.64453 2.32161 1.13672 3.16797C0.628906 4.04036 0.375 4.98438 0.375 6C0.375 6.40365 0.453125 6.8724 0.609375 7.40625C0.739583 7.84896 0.941406 8.3763 1.21484 8.98828C1.65755 9.99089 2.23698 11.1107 2.95312 12.3477C3.47396 13.2591 4.05339 14.1966 4.69141 15.1602C5.01693 15.6549 5.28385 16.0521 5.49219 16.3516L6 17.0938L7.30859 15.1602C7.94661 14.1966 8.52604 13.2591 9.04688 12.3477C9.76302 11.1107 10.3424 9.99089 10.7852 8.98828C11.0586 8.3763 11.2604 7.84896 11.3906 7.40625C11.5469 6.8724 11.625 6.40365 11.625 6C11.625 4.98438 11.3711 4.04036 10.8633 3.16797C10.3555 2.32161 9.67839 1.64453 8.83203 1.13672C7.95964 0.628906 7.01562 0.375 6 0.375ZM6 1.625C6.79427 1.625 7.52344 1.82031 8.1875 2.21094C8.86458 2.60156 9.39844 3.13542 9.78906 3.8125C10.1797 4.47656 10.375 5.20573 10.375 6C10.375 6.2474 10.3099 6.59896 10.1797 7.05469C10.0495 7.4974 9.8737 7.97266 9.65234 8.48047C9.27474 9.33984 8.70833 10.4206 7.95312 11.7227C7.3151 12.8164 6.67708 13.8451 6.03906 14.8086L6 14.8477L5.96094 14.8086C5.32292 13.8451 4.6849 12.8164 4.04688 11.7227C3.29167 10.4206 2.72526 9.33984 2.34766 8.48047C2.1263 7.97266 1.95052 7.4974 1.82031 7.05469C1.6901 6.59896 1.625 6.2474 1.625 6C1.625 5.20573 1.82031 4.47656 2.21094 3.8125C2.60156 3.13542 3.12891 2.60156 3.79297 2.21094C4.47005 1.82031 5.20573 1.625 6 1.625ZM6 4.75C5.64844 4.75 5.34896 4.8737 5.10156 5.12109C4.86719 5.35547 4.75 5.64844 4.75 6C4.75 6.35156 4.86719 6.65104 5.10156 6.89844C5.34896 7.13281 5.64844 7.25 6 7.25C6.35156 7.25 6.64453 7.13281 6.87891 6.89844C7.1263 6.65104 7.25 6.35156 7.25 6C7.25 5.64844 7.1263 5.35547 6.87891 5.12109C6.64453 4.8737 6.35156 4.75 6 4.75Z" fill="#575757"/>
                </svg>
             </div>
             <div class="col-md-11">
               <ul>
                 <li class="sub-lable  pb-2">Mailing Address</li>
                 @if($ContactUs->mailing_address!="")
                 <li class="contanit-txt">{{$ContactUs->mailing_address}}</li>
                 @endif
               </ul>
             </div>
           </div>

          </div>

    </div>

</div>
</div>
<!-- contact form section -->
<div class="main pb-5">
<div class="container contact-form-border ">

<div class="row p-4">
  <div class="col-md-12">
  <span class="con-text-lbl">Send your request</span>
  </div>
</div>

    <form method="post" action="contact" enctype='multipart/form-data' class="p-4" >
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class="row">
      <div class="col-md-4">
              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="form-group required-field">
                <label for="contact-name" class="contact">@lang("order.name")</label>
                <input type="text" class="form-control input-txt" id="contact-name"name="name"  placeholder="@lang('order.name')">
              </div><!-- End .form-group -->
              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>

      </div>
      <div class="col-md-4">
             <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">    
              <div class="form-group required-field">
                <label for="contact-email" class="contact">@lang("order.email")</label>
                <input type="email" class="form-control input-txt" id="contact-email" name="email" placeholder="@lang('order.email')">
              </div><!-- End .form-group -->
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
      </div>

      <div class="col-md-4">
            <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">  
            <div class="select-custom">
                <div class="form-group required-field">
                <label for="subject" class="contact">@lang("complaint.subject")</label>
                <select  class="form-control input-txt" name="subject">
                    <option value="" selected="selected" id="subject">@lang("complaint.subject")
                    </option>
                    <option value="Samples">Samples</option>
                    <option value="ArtWork">ArtWork</option>
                    <option value="Billing">Billing</option>
                    <option value="Orders">Orders</option>
                    <option value="Shipping">Shipping</option>
                    <option value="Comments">Comments</option>
                    <option value="Technical">Technical</option>
                    <option value="Other">Other</option>
                </select>
              </div>
            </div>

              @if ($errors->has('subject'))
              <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
              </span>
              @endif

          </div>


      </div>


   </div>

   <div class="row">
            <div class="col-md-12">
            <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}"> 
            <div class="form-group  required-field">
            <label for="contact-message" class="contact">@lang("complaint.message")</label>
            <textarea cols="30" rows="2" id="contact-message" class="form-control form-control-contact input-txt" name="comment" placeholder="@lang('complaint.message')"></textarea>
            </div>
              @if ($errors->has('comment'))
              <span class="help-block">
                <strong>{{ $errors->first('comment') }}</strong>
              </span>
              @endif
            </div>
            </div>
   </div>


   <div class="row pt-3 pb-3">
            <div class="col-md-12">
                <button type="submit" class="btn-submit-contact">Submit</button>
            </div>
   </div>

   </form>


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