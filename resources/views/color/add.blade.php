@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
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
          <li class="breadcrumb-item"><a href="all-color">Color</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add Color</a>
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
          <form id="personal-info-form" class="w-100" method="post" action="add-colorpost" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5> Add Color</h5>

                  <span class="upper-buttons pull-right">
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                    <a href="all-color"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You can create new color here.</span>
                </div>
              </div>
            </div>
            <div class="col-md-12 p-0">
              <div class="col-md-7">
                <div class="card">
                  <div class="card-block">
    

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="form-control-label">Color Name *</label>
                      <input type="text" name="name" value="{{old('name')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter Color name" >
                      @if ($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                    </div>
               

                
                    <div class="form-group {{ $errors->has('color_hex') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Color Hexadecimal code <span>*</span></label>
                      <input type="text" name="color_hex" value="{{old('color_hex')}}" class="form-control thresold-i" maxlength="15" placeholder="Enter color hexadecimal  code/number">
                      @if ($errors->has('color_hex'))
                      <span class="help-block">
                        <strong>{{ $errors->first('color_hex') }}</strong>
                      </span>
                      @endif
                    </div>
               

        
                  </div>
                </div>

              </div>    
              
            </div>
            <div class="col-sm-12">
              <div class="main-footer">
                
                <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                <a href="all-color">
                  <button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">Cancel
                </button></a>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Date-range picker js -->
<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

<script src="{{asset('files/assets/js/core.js')}}"></script>
@endsection