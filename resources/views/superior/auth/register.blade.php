@extends('themes.'.$theme_path.'.layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">

<style type="text/css">
    .padding{
        padding-top: 15px !important;
    }
    .text-inverse{
        padding-left: 6px !important;
    }
    .Zebra_DatePicker_Icon_Wrapper{

        display: contents !important;
    }

    .form-control[readonly] {
        background-color: #ffffff !important;
    }

    section{
    padding-bottom: 0px !important;
}
.card {
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
  -moz-box-shadow:    3px 3px 5px 6px #ccc;  /* Firefox 3.5 - 3.6 */
  box-shadow:         3px 3px 5px 6px #ccc;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
}



</style>

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{$base_url}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang("user.register")</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 card" style="padding:0px 0px 20px 0px;">
                    <h3 class="auth-title" style="text-align: center;background-color: #000;padding: 10px;">@lang("user.sign_up")</h3>

                    @if($appearance->is_social_authentication==1)
                    <div class="row" style="padding: 10px;">
                        <div class="col-md-6">
                            <a href="{{ url('register/facebook') }}" class="btn btn-theme m-b-10 btn-block waves-effect waves-light"><i class="fa fa-facebook left"></i> facebook</a>
                        </div>
                        <div class="col-md-6">

                            <a href="{{ url('register/google') }}" class="btn btn-theme m-b-0 btn-block waves-effect waves-light"><i class="fa fa-google-plus left"></i> Google +</a>
                        </div>
                    </div>
                    <br>
                    @endif 
                    <div class="theme-card" style="padding: 10px;">
                        <form class="theme-form theme-form-one" method="post" action="registerAdd" >
                            {{ csrf_field() }} 

                            <div class="form-row">

                                @if($registration_settings->is_name==1)
                                <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="email">@lang("order.name") *</label>
                                    <input type="text" class="form-control w-100" name="name" value="{{old('name')}}" id="fname" placeholder="@lang("order.name")" required="">
                                    <div>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endif


                                @if($registration_settings->is_email==1)
                                <div class="col-md-6">
                                    <label for="email">@lang("order.email") *</label>
                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" value="{{old('email')}}" class="form-control w-100" id="email" placeholder="@lang("order.email")" required="">
                                    <div>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endif


                                @if($registration_settings->is_contact_number==1)
                                <div class="col-md-6 {{ $errors->has('contact_number') ? ' has-error' : '' }}">
                                    <span class="form-bar"></span>
                                    <label for="mobile_number">@lang("order.mobile_number") *</label>
                                    <input type="number" name="contact_number" value="{{old('contact_number')}}" class="form-control w-100" placeholder="@lang("order.mobile_number")" >
                                    <div>
                                        @if ($errors->has('contact_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_number') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endif
                                <br>
                                @if($registration_settings->is_DOB==1)
                                <div class="col-sm-6 {{ $errors->has('dob') ? ' has-error' : '' }}" >
                                    <div >
                                        <label for="dob">@lang("order.DOB")</label>
                                        <input type="date" name="dob" id="datepicker-from"  value="{{old('dob')}}" class="form-control w-100" required="" placeholder="@lang('order.DOB')">
                                        <div>
                                            @if ($errors->has('dob'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($registration_settings->is_password==1)

                                <div class="col-sm-6 {{ $errors->has('password') ? ' has-error' : '' }} ">
                                    <label for="password">@lang("order.password") *</label>
                                    <input id="password-field"  type="password" name="password" class="form-control w-100" required="" placeholder="@lang("order.password")">
                                    <div>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 {{ $errors->has('confirm_password') ? ' has-error' : '' }} ">
                                    <label for="confirm_password"> @lang("user.confirm_password") *</label>
                                    <input type="password" name="confirm_password" class="form-control w-100" required="" placeholder="@lang('user.confirm_password')">
                                    <div>
                                        @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endif


                                @if($registration_settings->is_gst_number==1)
                                <div class="col-sm-6 {{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="gst_number"> @lang("order.gst_number")</label>
                                    <input type="text" name="gst_number" value="" class="form-control w-100"  placeholder="@lang("order.gst_number")">
                                    <div>
                                        @if ($errors->has('gst_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('gst_number') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                @if($registration_settings->is_address==1)
                                <div class="col-sm-6 {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address"> @lang("order.address") *</label>
                                    <textarea class="form-control" name="address"  class="form-control w-100" required="" placeholder="@lang("order.address")" >{{old('address')}}</textarea>
                                </div>
                                @endif


                                @if($registration_settings->is_country==1)
                                <div class="col-md-6">
                                    <label for="country_id">@lang("user.country")</label>
                                    <select class="form-control"  id="country_id" name="country_id" >
                                        <option disabled="true" value="" selected="selected">@lang("order.select_country")</option>
                                    </select>  
                                </div>
                                @endif

                                @if($registration_settings->is_state==1)
                                <div class="col-md-6">
                                    <label for="state_id">@lang("user.state") </label>
                                    <select class="form-control"  id="state_id" name="state_id" >
                                        <option disabled="true" value="" selected="selected">@lang("order.select_state")</option>
                                    </select>            
                                </div>
                                @endif 
                                @if($registration_settings->is_city==1)
                                <div class="col-md-6 padding">
                                    <label for="city_id">@lang("user.city") </label>
                                    <select class="form-control"  id="city_id" name="city_id" >
                                        <option disabled="true" value="" selected="selected">@lang("order.select_city")</option>
                                    </select>            
                                </div>
                                @endif


                                @if($registration_settings->is_pincode==1)
                                <div class="col-md-6 padding">
                                    <label for="pincode_id"> @lang("order.pincode")</label>
                                    <select class="form-control"  id="pincode_id" name="pincode_id" >
                                        <option value="">@lang("order.select_pincode")</option>
                                    </select> 
                                </div>
                                @endif
                                @if($registration_settings->is_area==1)
                                <div class="col-md-6 padding">
                                    <label for="review">@lang("user.area") </label>
                                    <select class="form-control"  id="area_id" name="area_id" >
                                        <option value="">@lang("order.select_area")</option>
                                    </select>            
                                </div> 
                                @endif  


                                <div class="col-md-12 padding">
                                    <div class="checkbox-fade fade-in-primary {{ $errors->has('accept_the_terms_and_conditions') ? ' has-error' : '' }}">
                                        <label>
                                            <input id="i_read_and_accept_terms_conditions" type="checkbox" name="accept_the_terms_and_conditions" value="1" >
                                            <!-- <span class="cr"><i class="cr-icon fa fa-check"></i></span> -->
                                            <span class="text-inverse"><a target="_blabk" href="{{$base_url}}/terms-conditions">@lang("user.i_read_and_accept_terms_conditions") </a></span>

                                        </label>

                                        @if ($errors->has('accept_the_terms_and_conditions'))
                                        <p> <span class="help-block">
                                            <strong>{{ $errors->first('accept_the_terms_and_conditions') }}</strong>
                                        </span></p>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-md">@lang("user.sign_up")</button>
                            </div>
                            <p class="text-inverse text-left" style="margin-top: 10px;">@lang("user.if_you_have_an_account")<a href="login"><b>                     @lang("user.login") </b></a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{$base_url}}/files/assets/images/pattern-1.png" style="width: 100% !important;">
</section>
</main>




<script type="text/javascript">

    $('#i_read_and_accept_terms_conditions').required;
    $('#city_id').empty();
    $('#state_id').empty();
    $('#country_id').empty();
    $("#pincode_id").empty();
    $('#area_id').empty();

    defult_city='<option value="" selected>@lang("order.select_city") </option>';
    defult_state='<option value="" selected>@lang("order.select_state")  </option>';
    defult_country='<option value="" selected>@lang("order.select_country") </option>';
    defult_area='<option value="" selected>@lang("order.select_area") </option>';
    default_pincode='<option value="" selected>@lang("order.select_pincode")</optio>';

    $("#city_id").append(defult_city);
    $("#state_id").append(defult_state);
    $("#country_id").append(defult_country);
    $("#pincode_id").append(default_pincode);
    $("#area_id").append(defult_area);


    var states=<?php echo json_encode($states);?>;
    $.each(states,function(index,item){
        select_text=item.default_state_translation.state_name;
        select_value=item.state_id;
        var o= new Option(select_text,select_value);
        $("#state_id").append(o);
    });

    var countries=<?php echo json_encode($countries);?>;
    $.each(countries,function(index,item){
        select_text=item.default_country_translation.country_name;
        select_value=item.country_id;
        var o= new Option(select_text,select_value);
        $("#country_id").append(o);
    });

    var pincodes=<?php echo json_encode($pincodes);?>;

    $.each(pincodes,function(index,item){
        select_text=item.pincode;
        select_value=item.pincode_id;
        var o= new Option(select_text,select_value);
        $("#pincode_id").append(o);
    });

    var areas=<?php echo json_encode($areas);?>;
    $.each(areas,function(index,item){
        select_text=item.default_area_translation.area;
        select_value=item.area_id;
        var o= new Option(select_text,select_value);
        $("#area_id").append(o);
    });

    $(document).ready(function() {

        $.ajaxSetup
        ({
         headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
     });
        $('#country_id').change(function(){
           country_id=$('#country_id').val();
           $("#state_id").html("");
           $("#city_id").html("");

           $.ajax({
            type: "post",
            url: "{{$base_url}}/getlocations-country",
            data: {'country_id':country_id},
            success: function (result) {    
             var states=result;
             $("#state_id").append(defult_state);
             $("#city_id").append(defult_city);

             $.each(states,function(index,item){
                select_text=item.default_state_translation.state_name;
                select_value=item.state_id;
                var o= new Option(select_text,select_value);
                $("#state_id").append(o);
            });

         },
         error: function (xhr, textStatus, errorThrown) {
            alert(textStatus + ':' + errorThrown); 
        }
    });
       });

        $('#state_id').change(function(){
           state_id=$('#state_id').val();
           $("#city_id").empty();

           $.ajax({
            type: "post",
            url: "{{$base_url}}/getlocations-state",
            data: {'state_id':state_id},
            success: function (result) {
                var cities=result;

                $("#city_id").append(defult_city);

                $.each(cities,function(index,item){
                    select_text=item.default_city_translation.city_name;
                    select_value=item.city_id;
                    var o= new Option(select_text,select_value);
                    $("#city_id").append(o);
                });
                
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(textStatus + ':' + errorThrown); 
            }
        });
       });

       // pincode 
       $('#pincode_id').change(function(){
           pincode_id=$('#pincode_id').val();
           $("#area_id").empty();
           $.ajax({
            type: "post",
            url: "{{$base_url}}/getlocations-pincode-area",
            data: {'pincode_id':pincode_id},
            success: function (result) {
                var areas=result;
                $("#area_id").append(defult_area);
                $.each(areas,function(index,item){
                    select_text=item.default_area_translation.area;
                    select_value=item.area_id;
                    var o=new Option(select_text,select_value);
                    $("#area_id").append(o);
                });

            },
            error: function (xhr, textStatus, errorThrown) {
                alert(textStatus + ':' + errorThrown); 
            }
        });
       });
   });
</script>
<!-- Date-range picker js -->
<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

<script src="{{asset('files/assets/js/core.js')}}"></script>

@endsection
