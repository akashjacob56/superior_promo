@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
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
          <li class="breadcrumb-item"><a href="all-vendor">Vendor</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add Vendor</a>
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
          <form id="personal-info-form" class="w-100" method="post" action="add-vendorpost" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5> Add Vendor</h5>

                  <span class="upper-buttons pull-right">
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                    <a href="all-vendor"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You can create new vendor profile here.</span>
                </div>
              </div>
            </div>
            <div class="col-md-12 p-0">
              <div class="col-md-7">
                <div class="card">
                  <div class="card-block">
    

                    <div class="form-group {{ $errors->has('sage_id') ? ' has-error' : '' }}">
                      <label class="form-control-label">Vendor sage id*</label>
                      <input type="number" name="sage_id" value="{{old('sage_id')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter Vendor  sage_id" >
                      @if ($errors->has('sage_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('sage_id') }}</strong>
                      </span>
                      @endif
                    </div>


                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="form-control-label">Name *</label>
                      <input type="text" name="name" value="{{old('name')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter Vendor name" >
                      @if ($errors->has('name'))
                      <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                    </div>
               

                  
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Email *</label>
                      <input type="email" name="email" value="{{old('email')}}"  class="form-control thresold-i" maxlength="40" placeholder="Enter Vendor email">
                      @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                 
                
                    <div class="form-group {{ $errors->has('contact_number') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Contact No. <span>*</span></label>
                      <input type="text" name="contact_number" value="{{old('contact_number')}}" class="form-control thresold-i" maxlength="15" placeholder="Enter Vendor contact number">
                      @if ($errors->has('contact_number'))
                      <span class="help-block">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                      </span>
                      @endif
                    </div>
               

        
                  </div>
                </div>



               
                <div class="card">
                  <div class="card-block">
                    <h6>Password setting</h6>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Password *</label>
                      <input type="password" name="password" value="{{old('password')}}" class="form-control thresold-i" maxlength="20" placeholder="Enter password">
                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                      <label class=" form-control-label">Confirm Password *</label>
                      <input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control thresold-i" maxlength="20" placeholder="Confirm above password">
                      @if ($errors->has('confirm_password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('confirm_password') }}</strong>
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

                <a href="all-vendor">
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