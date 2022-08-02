  @extends('superior.layouts.app')
  @section('content')

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

.btn-log:hover, .btn-log:focus, .btn-log:active, .btn-log.active, .open>.dropdown-toggle.btn-log{
    color: #fff;
    background-color: #00b3db;
    border-color: #285e8e; /*set the color you want here*/
}


.btn-register:hover, .btn-register:focus, .btn-register:active, .btn-register.active, .open>.dropdown-toggle.btn-register{
    color: #fff;
    background-color: #00b3db;
    border-color: #285e8e; /*set the color you want here*/
}

</style>

<div class="container pt-5 pb-5">
    
<div class="row background-login">
<div class="col-md-6 login-image"></div>

<div class="col-md-6 pt-5 login-col"> 
<div class="heading mb-1">
    <h2 class="log-txt">Login</h2>
</div>
<form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}

<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
  <label for="login-email">
        @lang("Email") Or @lang("Username")
    </label>
    <!-- <input type="text" name="email" value="{{old('email')}}" class="form-input form-wide" placeholder="@lang("order.email")"" id="email" required=""> -->
   <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="@lang("order.email")"/>

        @if ($errors->has('email'))
        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>


<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
    <label>@lang("order.password")</label>
    <div class="input-group" id="show_hide_password">
      <!-- <input class="form-input form-wide" id="password-field" name="password" type="password" placeholder="***********"> -->
      <input type="password" id="password-field" name="password" class="form-control" placeholder="@lang("order.password")" />
                                            
      <div class="input-group-addon">
        <a href="" class="pss-eye"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>

@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
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
       <img src="/resources/views/superior/assets/images/google-icon.png"/>
       </div>
       <div class="col-md-7">
       <span><a href="/register/google" class="txt-g-log">Sing in with google</a></span>
       </div>
   </div>


   <div class="authentication-divider pt-4 pb-4">
    <span>New to SupriorPromos</span>
   </div>

    <!-- <button class="btn-md w-100 btn-register">
        Register
    </button> -->
<a href="/register">
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
@endsection

