@extends('layouts.admin')
@section('content')
<style type="text/css">


img#section_image{
  max-height: 200px !important;
  padding: 20px;
  max-width: 200px ;
}

.custom-file{
  width: 100%;
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
            <a href="{{$base_url}}/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item"><a href="all">Sections</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add section </a>
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
          <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5> Add Section</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('CATEGORY_ADD'))
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                    @endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <!-- <span>Section</span> -->
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-block">

                  <input type="hidden" name="language_id" value="1">

                  <div class="form-group {{ $errors->has('section_name') ? ' has-error' : '' }}">
                    <label class="form-control-label">section name *</label>
                    <input id="section_name" type="text" name="section_name" value="{{old('section_name')}}"  class="form-control thresold-i" maxlength="25" placeholder="section name" >
                    @if ($errors->has('section_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('section_name') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group {{ $errors->has('section_url') ? ' has-error' : '' }}">
                    <label class="form-control-label">section Url *</label>
                    <input id="section_url" type="text" name="section_url" value="{{old('section_url')}}"  class="form-control thresold-i" placeholder="Section Url" >
                    @if ($errors->has('section_url'))
                    <span class="help-block">
                      <strong>{{ $errors->first('section_url') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group {{ $errors->has('section_position') ? ' has-error' : '' }}">
                    <label class="form-control-label">section position *</label>
                    <input id="section_position" type="text" name="section_position" value="{{old('section_position')}}"  class="form-control thresold-i" maxlength="25" placeholder="e.g. 1, 2, 3.." >
                    @if ($errors->has('section_position'))
                    <span class="help-block">
                      <strong>{{ $errors->first('section_position') }}</strong>
                    </span>
                    @endif
                  </div>

                 <!--  <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="form-control-label">Description</label>
                    <textarea name="description" class="form-control summernote-editor" rows="2" placeholder="Enter product description">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                  </div> -->

                </div>
              </div>
            </div>

            <div class="col-sm-12">    
              <div class="main-footer">  
                <span class="lower-buttons">  
                  @if($my_permissions->contains('CATEGORY_ADD'))
                  <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
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

  $("#section_name").keyup(function(){
    var Text = $(this).val();
       /* Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');*/
        $("#section_url").val(Text);        
      });
</script>

@endsection