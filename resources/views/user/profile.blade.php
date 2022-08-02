@extends('themes.'.$theme_path.'.layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
<style type="text/css">

  .Zebra_DatePicker_Icon_Wrapper button{
   top: 9.5px !important;
   left: 630px !important;
 } 
 
</style>
<link href="{{asset('dist/css/lightgallery.css')}}" rel="stylesheet">
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          
          <li class="breadcrumb-item">
            <a> @lang("user.profile")</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <form id="personal-info-form" class="w-100" method="post" action="profile" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <!-- <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>@lang("user.profile")</h5>
                  <span class="upper-buttons pull-right" >
                    <button type="submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">@lang("global.save")</button>
                    <a href="/"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">@lang("global.cancel")
                    </button></a>
                  </span>
                </div>
              </div>
            </div> -->
            <div class="col-md-12 ">
              @include('swaas.user-contact-card')

              <div class="col-md-9">
                <div class="card">
                  <div class="card-block">
                   
                    <div class="form-group form-primary {{ $errors->has('name') ? ' has-error' : '' }}">
                      <span class="form-bar"></span>
                      <label for="name" class="form-control-label">@lang("order.name")</label>
                      <input type="text" name="name" value="{{$admin->name}}" class="form-control" required="" placeholder="@lang("order.name")">
                      @if ($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                    </div>
                  

                    <!--<div class="form-group {{ $errors->has('business_name') ? ' has-error' : '' }}">
                      <label class="form-control-label">@lang("user.business_name") *</label>
                      <input type="text" name="business_name" value="{{$admin->business_name}}" class="form-control thresold-i" maxlength="100" placeholder="Enter business name" >
                      @if ($errors->has('business_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('business_name') }}</strong>
                      </span>
                      @endif
                    </div> -->

                   
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
                      <label class="form-control-label">@lang("order.email") *</label>
                      <input type="text" name="email" value="{{$admin->email}}"  class="form-control thresold-i" maxlength="40" placeholder="@lang("order.email")">
                      @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                  
                    <div class="form-group {{ $errors->has('contact_number') ? ' has-error' : '' }} ">
                      <label class="form-control-label">@lang("order.mobile_number") <span>*</span></label>
                      <input type="text" name="contact_number" value="{{$admin->contact_number}}" class="form-control thresold-i" maxlength="15" placeholder="@lang("order.mobile_number")">
                      @if ($errors->has('contact_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                      </span>
                      @endif
                    </div>
                   

                    <div class="form-group {{ $errors->has('optional_contact_number') ? ' has-error' : '' }} ">
                      <label class="form-control-label">2nd @lang("order.mobile_number") (optional)</label>
                      <input type="text" name="optional_contact_number" value="{{$admin->optional_contact_number}}" class="form-control thresold-i" maxlength="15" placeholder="@lang("order.mobile_number") 2">
                      @if ($errors->has('optional_contact_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('optional_contact_number') }}</strong>
                      </span>
                      @endif
                    </div>

                   
                    <div class="form-group">
                      <label class="form-control-label">@lang("order.DOB") (optional)</label>
                      <input type="text" name="DOB" id="datepicker-from" value="{{$admin->DOB}}"  class="form-control thresold-i" placeholder="@lang("user.dob")" >                   
                    </div>
                   

                 
              
               

             

           

        </div>
      </div>
      @include('user.sellerLocation')
    </div>


  </div>
  <div class="col-sm-12">
    <div class="main-footer">
      <button type="submit" name="save" class="btn btn-primary waves-effect waves-light pull-right">@lang("global.save")</button>    
      <a href="/"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">@lang("global.cancel")
      </button></a>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    $('#location-block').addClass('col-md-12 p-0').removeClass('col-md-5');

    $('.show-gallery').on('click', function() {
      var slideToOpen = $(this).attr('data-index');
    });
    /* $('.lightgallery').lightGallery();*/
    $lg = $('.lightgallery');
    $lg.lightGallery();
    $lg.on('onAfterOpen.lg',function(event){
      check=$(this).attr('id');
      $('.lg-toolbar').append('<a id=\"deletebutton\" class=\"lg-icon boss-check\" href=\"javascript:toggleCaption()\">Delete</a>');
    });
    $lg.on('onBeforeSlide.lg',function(event, index, fromTouch, fromThumb){
    });

    function toggleCaption() {
      var curVal = $('.lg-sub-html').css('visibility');
      $('.lg-sub-html').css('visibility', curVal == 'hidden' ? 'visible' : 'hidden');
    }
    $('deletebutton').click(function(){
      alert("someting");
    });


  });
  
  my_address="<?php echo $address->address ?>";
  $('#address').val(my_address);

  get_gst_number="<?php echo $admin->gst_number ?>"
  $('#gst_number').val(get_gst_number);
  
  $("#country_id option[value={{$address->country->country_id}}]").prop('selected',true);

  state_id="<?php echo $address->state->default_state_translation->state_name ?>";
  $("#state_name").val(state_id)

  city_id="<?php echo $address->city->default_city_translation->city_name ?>";
  $("#city_name").val(city_id)
  
  area_id="<?php echo $address->area->default_area_translation->area ?>";
  $("#area_name").val(area_id)

  pincode="<?php echo $address->pincode->pincode ?>";
  $("#pincode").val(pincode)

</script>

<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

<script src="{{asset('files/assets/js/core.js')}}"></script>
<script src="{{asset('dist/js/lightgallery-all.min.js')}}"> </script>
<script src="{{asset('dist/js/lg-deletebutton.js')}}"></script>
@endsection
