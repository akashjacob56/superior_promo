@extends('themes.'.$theme_path.'.layouts.app')
@section('content')


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{$base_url}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang("user.forgot_your_password")</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <!-- search start-->
    <section class="authentication-page pwd-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2>@lang("user.forgot_your_password")</h2>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="theme-form-one w-100" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-row {{ $errors->has('email') ? ' has-error' : '' }}">  
                            <div class="col-md-12">
                                <input type="text" class="form-control w-100"  name="email" id="email" placeholder="@lang('order.email')">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                            </div>
                            <div class="col-md-12 mt-3 text-center">

                               <button type="submit" class="btn btn-primary btn-md"> @lang("user.send_password_reset_link")
                               </button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </section>
   <!-- search End -->
</main>
   @endsection
