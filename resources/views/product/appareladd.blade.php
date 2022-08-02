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
          <li class="breadcrumb-item">
            <a> Add Size
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
          <form id="personal-info-form" method="post" action="add-apparel" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>Size</h5>
                <span class="upper-buttons">
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  <a href="apparel-all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>
                </span>
                <span class="text-muted">You can view, add, update, and organize all of your.</span>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-block">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="language_id" value="1">


                <div class="form-group {{ $errors->has('apparel_name') ? ' has-error' : '' }}">
                  <label class="form-control-label">Size Name*</label>
                  <input type="text" name="apparel_name" value="{{old('apparel_name')}}" class="form-control thresold-i" maxlength="10" placeholder="Enter Size Name">
                  @if ($errors->has('apparel_name'))
                  <span class="help-block">
                    <strong>{{ $errors->first('apparel_name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="main-footer">
              <span class="lower-buttons">
                <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                <a href="apparel-all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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