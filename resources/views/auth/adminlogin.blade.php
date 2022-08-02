@extends('layouts.no-header')
@section('content')
<style type="text/css">

    .field-icon {
      float: left;
      margin-left: 91%;
      margin-top: -25px;
      position: relative;
      z-index: 2;
  }
  .hidden{
    display: none;
}
.btn-primary{

    background:#3E3E3E !important;
}
.btn-primary:hover{

    background:#3E3E3E !important;
}

</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">

                    <div class="col-md-5 m-auto">
                        <form class="md-float-material" action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}

                            <div class="card">
                                <div class="text-center">
                              
                                <!--  <img class="logo-image" style="height: 60px !important;" src="/storage/app/logo.png" alt=""> -->
                              </div>
                              <div class="col-md-12">
                                <div class="auth-box">
                                    <div class="card-block">
                                        <div class="row m-b-20">
                                            <div class="col-md-12">
                                                <h3 class="text-center txt-primary"> @lang("user.sign_in")</h3>
                                            </div>
                                        </div>

                                        <!-- <p class="text-muted text-center p-b-5">@lang("user.sign_in_with_your_regular_account")</p> -->
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="form-control-label">@lang("order.email") / @lang("order.mobile_number")</label>
                                            <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="@lang("order.email")"/>

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="form-control-label">@lang("order.password")</label>
                                            <input type="password" id="password-field" name="password" class="form-control" placeholder="@lang("order.password")" />
                                            <span toggle="#password-field" class="hidden fa fa-fw fa-eye field-icon toggle-password"></span>

                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" value="" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <span class="text-inverse">@lang("user.remember_me")</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right float-right">
                                                <a href="{{ route('password.request') }}" class="text-right f-w-600"> @lang("user.forgot_password")</a>
                                            </div>
                                        </div>
                                        <div class="row m-t-20">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"> @lang("user.login")
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- end of form -->
                        </div>
                        <!-- Authentication card end -->

                        <!-- end of row -->
                    </div>
                    <!-- end of container-fluid -->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">



    </script>
    @endsection
