@extends('themes.'.$theme_path.'.layouts.app')
@section('content')


<main class="main" style="margin-top:30px;">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{$base_url}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
            </ol>
        </div><!-- End .container -->
    </nav>



    <section class="authentication-page pwd-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2>Reset Password</h2>
                    <form id="personal-info-form" method="post" action="{{ route('password.request') }}" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-row{{ $errors->has('email') ? ' has-error' : '' }}">
                           <label for="email"  class="form-control-label ">@lang('order.email'):</label>
                           <div class="col-md-12 pb-3">
                            <input type="text" class="form-control w-100"  name="email" id="email"  value="{{$email}}" placeholder="@lang('order.email')" required="" readonly=>
                        </div>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>

                        @endif

                    </div>



                    <div class="form-row{{ $errors->has('password') ? ' has-error' : '' }}">
                     <label for="email"  class="form-control-label ">@lang('order.password'):</label>
                     <div class="col-md-12 pb-3">
                        <input id="password" type="password" class="form-control w-100" placeholder="@lang('order.password')" name="password" required>
                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>

                <div class="form-row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                 <label for="email"  class="form-control-label ">@lang('order.confirm_password'):</label>
                 <div class="col-md-12 pb-3">
                    <input id="password-confirm" type="password" class="form-control w-100" name="password_confirmation" placeholder="@lang('order.confirm_password')">
                </div>

                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif

            </div>

            <div class="col-md-12 mt-3 text-center">

             <button type="submit" class="btn btn-primary btn-md"> @lang("user.reset_password")
             </button>
         </div>
     </form>
 </div>
</div>
</div>
</section>
</main>  
@endsection