<div class="col-md-5">
    <div class="card">
        <div id="right-panel" class="card-block">
            
            <div class="form-group form-primary">
                <span class="form-bar"></span>
                <label for="address" class="form-control-label"> @lang("order.address") *</label>
                <textarea class="form-control" name="address"  class="form-control"  placeholder="@lang("order.address")" value="{{old('address')}}" id="address"></textarea>
            </div>
           
            <div class="form-group">
                <label class="form-control-label">@lang("user.country") </label>
                <select class="form-control select-box" id="country_id" name="country_id" >
                    <option disabled="true" value="">@lang("order.select_country")</option>
                </select>            
            </div> 
         
            <div class="form-group">
                <label class="form-control-label">@lang("user.state") </label>
                <select class="form-control select-box" id="state_id" name="state_id" >

                    <option disabled="true" value="">@lang("order.select_state")</option>
                </select>            
            </div>
           
            <div class="form-group">
                <label class="form-control-label">@lang("user.city") </label>
                <select class="form-control select-box" id="city_id" name="city_id" >
                    <option disabled="true" value="">@lang("order.select_city")</option>
                </select>            
            </div>
           
            <div class="form-group form-primary">
                <span class="form-bar"></span>
                <label for="pincode_id" class="form-control-label"> @lang("order.pincode")</label>
                <select class="form-control select-box" id="pincode_id" name="pincode_id" >
                    <option value="">@lang("order.select_pincode")</option>
                </select> 
            </div>
            
            <div class="form-group">
                <label class="form-control-label">@lang("user.area") </label>
                <select class="form-control select-box" id="area_id" name="area_id" >
                    <option value="">@lang("order.select_area")</option>
                </select>            
            </div> 
           

    </div>
</div>       
</div>

<script type="text/javascript">


  var sm=$('#right-panel').find('div');
 
  if(sm.length==0){
    $('#right-panel').hide();   
}

$('#city_id').empty();
$('#state_id').empty();
$('#country_id').empty();
$("#pincode_id").empty();
$('#area_id').empty();

defult_city='<option value="1" selected>Select city </option';
defult_state='<option value="1" selected>Select state </option';
defult_country='<option value="1" selected>Select country </option';
defult_area='<option value="1" selected>Select area </option';
default_pincode='<option value="1" selected>Select area </option';

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

var cities=<?php echo json_encode($cities);?>;
$.each(cities,function(index,item){
    select_text=item.default_city_translation.city_name;
    select_value=item.city_id;
    var o= new Option(select_text,select_value);
    $("#city_id").append(o);
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
           /* option='<option disabled="true" value="">@lang("order.select_state")</option>';
           $("#state_id").append(option);*/
           var states=result;
           $("#state_id").append(defult_state);
           $("#city_id").append(defult_city);
           $.each(states,function(index,item){
            select_text=item.default_state_translation.state_name;
            select_value=item.state_id;
            var o= new Option(select_text,select_value);
            $("#state_id").append(o);
        });
           $(".select-box").selectBox();
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
            $(".select-box").selectBox();
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
                $(".select-box").selectBox();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert(textStatus + ':' + errorThrown); 
            }
        });
     });
   });

</script>