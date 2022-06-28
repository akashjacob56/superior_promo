@extends('themes.'.$theme_path.'.layouts.app')
@section('content')

<style type="text/css">
    .no-padding{

    padding: 6px 25px !important;
  }
</style>

    <main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{$base_url}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Change password</li>
            </ol>
        </div><!-- End .container -->
    </nav>
<section class="user-profile">
  <div class="container">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
         <div class="col-md-12">
          <form class="theme-form contact-form" id="personal-info-form" method="post" action="{{$base_url}}/changePassword" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">

          

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="form-control-label">@lang('order.password')*</label>
                  <input id="password-field" type="password" name="password" value="{{old('password')}}" class="form-control thresold-i" placeholder="@lang('order.password')">
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div> 

                <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                  <label class="form-control-label">@lang('order.new_password') *</label>
                  <input id="password-field-new" type="password" name="new_password" value="{{old('password')}}" class="form-control thresold-i" maxlength="40" placeholder="@lang('order.new_password')">
                  @if ($errors->has('new_password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('new_password') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                  <label class="form-control-label">@lang('order.confirm_password')*</label>
                  <input id="password-field-confirm" type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control thresold-i" maxlength="40" placeholder="@lang('order.confirm_password')">
                  @if ($errors->has('confirm_password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('confirm_password') }}</strong>
                  </span>
                  @endif
                </div>
            

            <div class="col-md-12">    
              <span class="lower-buttons">
                <button type="submit" class="btn btn-theme waves-effect waves-light pull-right no-padding">Save</button>
                <a href="{{$base_url}}"><button type="button" class="m-r-5 btn btn-primary btn-md add pull-right">Cancel
                </button></a>
              </span>   
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</main>


@endsection