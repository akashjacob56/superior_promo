@extends('layouts.admin')
@section('content')
<style type="text/css">
  #slider_image{
    height: 100px !important;
    width: auto;
    margin:10px;
  }
</style>
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{$base_url}}">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{$base_url}}/dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item"><a href="all">Banners</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add Banners</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="row">
          <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border ">
                  <h5> Add Banners</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('SLIDER_ADD'))
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You can add New Banner to Attract customer and get direct customer attention to special offers or Highlight your promotions by adding banners. </span>
                </div>
              </div>
            </div>

            <div class="col-sm-12 p-0">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-block">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="language_id" value="1">

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                      <label class="form-control-label">Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" maxlength="40" placeholder="Enter Banner title here">
                      @if ($errors->has('title'))
                      <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                      </span>
                      @endif
                    </div>     
                    <div class=" form-group {{ $errors->has('slider_image') ? ' has-error' : '' }}" >
                      <label class="form-control-label" for="usr">Image *</label>
                      <div class="slider_img">
                       <img   src="{{$base_url}}/files/assets/images/preview.png" id="slider_image" alt="">
                       </div>
                      <input type="file" class="form-control" name="slider_image" value="{{old('slider_image')}}" accept="image/*"  onchange="document.getElementById('slider_image').src = window.URL.createObjectURL(this.files[0])">
                      
                      @if ($errors->has('slider_image'))
                      <span class="help-block">
                        <strong>{{ $errors->first('slider_image') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('notification_class_id') ? ' has-error' : '' }}">
                      <label class="form-control-label">Slider for<span>*</span></label>
                      <select class="form-control select-box" id="notification_for" name="notification_class_id" required="">
                        <option value="">Select slider for </option>
                        @foreach($notificationclasses as $notificationclass)
                        <option value="{{$notificationclass->notification_class_id}}">{{$notificationclass->notification_for}}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('notification_class_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('notification_class_id') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('section_id') ? ' has-error' : '' }}">
                      <label class="form-control-label">Section<span>*</span></label>
                      <select class="form-control select-box" id="section_id" name="section_id" required="">
                        <option value="">Select section </option>
                      </select>
                      @if ($errors->has('section_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('section_id') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="main-footer">
                  <span class="lower-buttons">
                    @if($my_permissions->contains('SLIDER_ADD'))
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var products=<?php echo json_encode($products); ?>;
  var categories=<?php echo json_encode($categories); ?>;
  var sellers=<?php echo json_encode($sellers); ?>;


  $("#notification_for").change(function(){
    $("#select-box-section_id-container").text("Select section");
    var notification_for=$("#notification_for").val();

    $('#section_id').empty();
    var select_text="Select section";
    var select_value="";
    var o= new Option(select_text,select_value);
    $('#section_id').append(o);
    if(notification_for==1){
      $.each(products,function(i,item){
        var select_text=item.default_product_translation.product_name;
        var select_value=item.product_id;
        var o= new Option(select_text,select_value);
        $('#section_id').append(o);
      });
    }  if(notification_for==2){
      $.each(categories,function(i,item){
        var select_text=item.default_category_translation.category_name;
        var select_value=item.category_id;
        var o= new Option(select_text,select_value);
        $('#section_id').append(o);
      });
    }else{

       $.each(sellers,function(i,item){
        var select_text=item.default_seller_detail_translation.seller_name;
        var select_value=item.seller_detail_id;
        var o= new Option(select_text,select_value);
        $('#section_id').append(o);
      });

    }

  });

</script>
@endsection
