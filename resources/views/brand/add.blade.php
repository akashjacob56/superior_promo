@extends('layouts.admin')
@section('content') 
<style type="text/css">
  img#brand_image{
    width: 200px;
    max-height: 200px;
    padding: 20px;
  }
</style>

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
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header no-border">
                    <h5> Add Brand</h5>
                    <span class="upper-buttons">
                      @if($my_permissions->contains('BRAND_ADD'))
                      <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                      @endif
                      <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">Cancel
                      </button></a>
                    </span>
                    <span class="text-muted">Add Brands here, good brands improves the conversions of products. add and modify a new brand of the required type and representation to a selected part of your on-line store.</span>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="language_id" value="1">

                    <div class="form-group {{ $errors->has('brand_name') ? ' has-error' : '' }}">
                      <label class="form-control-label">Brand name *</label>
                      <input type="text" name="brand_name" value="{{old('brand_name')}}" class="form-control thresold-i thresold-i" maxlength="30" placeholder="Enter brand name" >
                      @if ($errors->has('brand_name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('brand_name') }}</strong>
                      </span>
                      @endif
                    </div>

                   

                    <div class="checkbox-fade fade-in-primary">
                      <label class="pull-left">
                        <input type="checkbox" name="is_featured_brand" value="1">      
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                      </label>
                      <label class="form-control-label pull-left">Set this brand as "Featured Brand".</label>

                    </div>
                    
                    <div class="form-group {{ $errors->has('brand_image') ? ' has-error' : '' }}">
                      <label for="file"  class="col-form-label form-control-label">Brand Image</label>
                      <img src="/files/assets/images/preview.png" id="brand_image" alt="" width="150" height="150">
                      <label for="file" class="custom-file">

                        <input type="file" name="brand_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('brand_image').src = window.URL.createObjectURL(this.files[0])"/>
                        <span class="custom-file-control"></span>

                      </label>

                      @if ($errors->has('brand_image'))
                      <span class="help-block">
                        <strong>{{ $errors->first('brand_image') }}</strong>
                      </span>
                      @endif
                    </div>
                    

                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="main-footer">
                  <span class="lower-buttons">
                    @if($my_permissions->contains('BRAND_ADD'))
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">Cancel
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

  @endsection