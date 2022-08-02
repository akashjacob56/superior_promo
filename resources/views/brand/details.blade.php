@extends('layouts.admin')
@section('content')
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
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item"><a href="all">Brands</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Brand details
           
           </a>
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
          <form id="personal-info-form" method="post" action="{{$brand->brand_id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5><a>{{$brand->default_brand_translation->brand_name}}</a></h5>
                  <span class="upper-buttons">
                    @if($my_permissions->contains('BRAND_UPDATE'))
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                    @endif

                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>

              
                  </span>
                  <span>Modify Brands information here, good brands improves the conversions of products. add and modify a new brand of the required type and representation to a selected part of your on-line store..</span>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group {{ $errors->has('brand_name') ? ' has-error' : '' }}">
                    <label class="form-control-label">Brand name *</label>
                    <input type="text" name="brand_name" value="{{$brand->default_brand_translation->brand_name}}" class="form-control thresold-i" maxlength="30" placeholder="Enter brand name">
                    @if ($errors->has('brand_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('brand_name') }}</strong>
                    </span>
                    @endif
                  </div>
                 
                  <div class="checkbox-fade fade-in-primary">
                    <label>
                      <input type="checkbox" name="is_featured_brand" id="is_featured_brand" value="1">      
                      <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    </label>
                    <label class="form-control-label pull-right">Set this brand as "Featured Brand".</label>
                  </div>
                  
                  <div class="form-group">
                    <label for="file"  class="col-form-label form-control-label">Current brand image</label>
                    <div class="col-md-12 p-0">
                      <img id="brand_imgs" class="img-fluid" src="/storage/app/{{$brand->brand_translation->brand_image}}" style="height:150px;width:150px;">
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('brand_image') ? ' has-error' : '' }}">
                    <label for="file"  class="col-form-label form-control-label">Image</label>
                    <input type="file"  onchange="document.getElementById('brand_imgs').src= window.URL.createObjectURL(this.files[0])" name="brand_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                    @if ($errors->has('brand_image'))
                    <span class="help-block">
                      <strong>{{ $errors->first('brand_image')}}</strong>
                    </span>
                    @endif
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                  @if($my_permissions->contains('BRAND_UPDATE'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  @endif
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>

       

                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  if({{$brand->is_featured_brand}}==1){
    $('#is_featured_brand').prop('checked',true);
  }

</script>
@endsection