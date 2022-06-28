<div id="location-block" class="col-md-5">
  <div class="card">
    <div id="right-panel" class="card-block">
      <input type="hidden" name="language_id" value="1">
    
     <div class="form-group form-primary">
      <span class="form-bar"></span>
      <label for="address" class="form-control-label"> @lang("order.address")</label>
      <textarea class="form-control" name="address"  class="form-control"  placeholder="@lang("order.address")" value="{{old('address')}}" id="address"></textarea>
    </div>


   
    <!-- <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
      <label class="form-control-label">@lang("user.country") </label>
      <select class="form-control select-box" id="country_id" name="country_id" >
        <option value="">@lang("order.select_country")</option>
      </select> 
      @if ($errors->has('country_id'))
      <span class="help-block">
        <strong>{{ $errors->first('country_id') }}</strong>
      </span>
      @endif           
    </div> 
   
    <div class="form-group {{ $errors->has('state_name') ? ' has-error' : '' }}">
      <label class="form-control-label">@lang("user.state") </label>

      <input placeholder="State Name"  name="state_name"  id="state_name" class="form-control thresold-i"> 
      @if ($errors->has('state_name'))
      <span class="help-block">
        <strong>{{ $errors->first('state_name') }}</strong>
      </span>
      @endif     
    </div>
   
    <div class="form-group {{ $errors->has('city_name') ? ' has-error' : '' }}">
      <label class="form-control-label">@lang("user.city") </label>
      <input placeholder="City Name"  name="city_name"  id="city_name" class="form-control thresold-i">
      @if ($errors->has('city_name'))
      <span class="help-block">
        <strong>{{ $errors->first('city_name') }}</strong>
      </span>
      @endif         
    </div>
   
    <div class="form-group form-primary {{ $errors->has('pincode') ? ' has-error' : '' }}">
      <span class="form-bar"></span>
      <label for="pincode" class="form-control-label"> @lang("order.pincode")</label>
      <input placeholder="Pincode"  name="pincode"  id="pincode" class="form-control thresold-i">

      @if ($errors->has('pincode'))
      <span class="help-block">
        <strong>{{ $errors->first('pincode') }}</strong>
      </span>
      @endif 

    </div>
   
    <div class="form-group {{ $errors->has('area_name') ? ' has-error' : '' }}">
      <label class="form-control-label">@lang("user.area") </label>

      <input placeholder="Area"  name="area_name"  id="area_name" class="form-control thresold-i">

      @if ($errors->has('area_name'))
      <span class="help-block">
        <strong>{{ $errors->first('area_name') }}</strong>
      </span>
      @endif 


    </div> 
 -->

  </div>
</div>       
</div>

<script type="text/javascript">
  var sm=$('#right-panel').find('div');
  if(sm.length==0){
    $('#right-panel').parent().parent().hide();   
  }



</script>