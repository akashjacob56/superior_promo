@extends('themes.'.$theme_path.'.layouts.app')
@section('content')


<style type="text/css">
    .terms-conditions{
     padding-top: 20px;
 }
 .text-inverse{
    padding-left: 6px !important;
}


section{
    padding-bottom: 0px !important;
}
.card {
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
  -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
  box-shadow:         3px 3px 5px 6px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
}
.short-margin{
   margin: 2.5rem auto 2.2rem;
}

</style>
@if($selected_language->language_id==4)
<style type="text/css">
    .marigin{
     margin-left: 400px !important;
 }    

</style>
@endif
<meta name="title" property="og:title" content="{{$appearance_translation->meta_title}}"/>

<meta name="keywords" content="{{$appearance_translation->meta_keywords}}"/>

<meta name="description" content="{{$appearance_translation->meta_description}}"/>
</head>
<body>

    <main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{$base_url}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang("user.login")</li>
            </ol>
        </div><!-- End .container -->
    </nav>


    <!-- Login start-->
    <section class="login-page section-b-space" >
        <div class="container">
            <div class="row">

              
                <div class="col-lg-6 card" style="padding:0px 0px 20px 0px;">
                    <h3 class="auth-title" style="text-align: center;background-color: #000;padding: 10px;">@lang("user.login")</h3>
                    <div class="theme-card" style="padding: 10px;">
                       <form class="theme-form-one theme-form mt-0" action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}

                        @if($appearance->is_social_authentication==1)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('register/facebook') }}" class="btn btn-theme m-b-10 btn-block waves-effect waves-light"><i class="fa fa-facebook left"></i> facebook</a>
                            </div>
                            <div class="col-md-6">

                                <a href="{{ url('register/google') }}" class="btn btn-theme m-b-0 btn-block waves-effect waves-light"><i class="fa fa-google-plus left"></i> Google +</a>
                            </div>
                        </div>
                        <br>
                        @endif 
                        <div  class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div>
                              <label for="email">Email/Contact Number</label>
                              <input type="text"  class="form-control w-100" name="email" value="{{old('email')}}" id="fname" placeholder="Email/Contact Number" >

                          </div>

                          @if ($errors->has('email'))
                          <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div >
                            <label for="password">@lang("order.password")</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control w-100" id="review" placeholder="@lang('order.password')" >

                        </div>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="checkbox-fade fade-in-primary" style="text-align: center;">
                        <label>
                            <input type="checkbox" value="" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <!-- <span class="cr"><i class="cr-icon fa fa-check"></i></span> -->
                            <span class="text-inverse">@lang("user.remember_me")</span>
                        </label>
                    </div>
                   <center>
                    <div class="mb-2">
                        <button ctype="submit" class="btn btn-primary btn-md marigin"> @lang("user.login")
                        </button>
                    </div>

                    <div class="form-group pd-forgot" >
                        <div class="forgot-phone">
                            <a href="{{ route('password.request') }}" class=" f-w-600" style="text-align: center;"> @lang("user.forgot_password")</a>
                        </div>
                    </div>
                    </center>
                </form>
            </div>
        </div>
       
        <div class="col-lg-5 card" style="padding:0px 0px 20px 0px;margin-left: 5%;">
            <center><a href="{{$base_url}}" class="logo"> <img src="{{$base_url}}/storage/app/{{$appearance->app_logo}}" class="img-fluid" alt="" style="margin-bottom: 10px;margin-top: 25px;" ></a></center>
           <hr class="short-margin">
           <h3 class="title-font" style="text-align: center;">@lang("global.registration_title1") {{$appearance_translation->app_name}} @lang("global.registration_title2")</h3>
            <div class="theme-card authentication-right" style="padding: 0px 20px 20px 20px;">
                
                <p>@lang("global.registration_text1") {{$appearance_translation->app_name}} @lang("global.registration_text2") {{$appearance_translation->app_name}} @lang("global.registration_text3")
                    </p>
                     <center>
                <a href="{{$base_url}}/register" class="btn btn-primary btn-md">@lang("user.register_now")</a>
            </center>
            </div>
        </div>
    </div>
</div>
 <img src="{{$base_url}}/files/assets/images/pattern-1.png" style="width: 100% !important;">
</section>
<!-- Login End -->
</main>

@endsection
