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
          <li class="breadcrumb-item"><a href="all-guarantee">Guarantee</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add Guarantee</a>
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
          <form id="personal-info-form" class="w-100" method="post" action="add-guaranteepost" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5> Add Guarantee</h5>

                  <span class="upper-buttons pull-right">
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                    <a href="all-guarantee"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You can create new Guarantee here.</span>
                </div>
              </div>
            </div>
            <div class="col-md-12 p-0">
                <div class="card">
                  <div class="card-block">
    
                   <div class="col-md-7">

                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                      <label class="form-control-label">Guarantee Title*</label>
                      <input type="text" name="title" value="{{old('title')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter Guarantee Title" >
                      @if ($errors->has('title'))
                      <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                      </span>
                      @endif
                    </div>
               


              <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                <img  src="{{$base_url}}/files/assets/images/preview.png" id="image" alt="">
                <label for="file" class="custom-file">
                  <label for="file"  class="col-form-label form-control-label">Guarantee  Image</label>
                  <input type="file" name="image" class="form-control " accept="image/x-png,image/gif,image/jpeg" value="{{old('image')}}" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"/>
                  <span class="custom-file-control"></span>
                </label>
                @if ($errors->has('image'))
                <span class="help-block">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
                @endif
              </div>



            <div class="form-group {{ $errors->has('descriprtion') ? ' has-error' : '' }}">
              <label class="form-control-label">Guarantee Discription*</label>
              <textarea name="descriprtion" class="form-control" rows="" placeholder="Enter Guarantee descriprtion"></textarea>
              @if ($errors->has('descriprtion'))
              <span class="help-block">
                <strong>{{ $errors->first('descriprtion') }}</strong>
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

                <a href="all-guarantee">
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