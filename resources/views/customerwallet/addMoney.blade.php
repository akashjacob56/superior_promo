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
          <li class="breadcrumb-item"><a href="/admin/customer/{{$customer->id}}">{{$customer->name}} Detail</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add Money @if($appearance->is_multilanguage==1)
              <b class="language-title-color"> ( {{$appearance->language->default_language_translation->language_name}} )</b>
            @endif </a>
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
          <form id="personal-info-form" method="post" action="/admin/customer/addWalletMoney/{{$customer->id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5> Add Money</h5>
                  <span class="upper-buttons">

                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                    <a href="/admin/customer/{{$customer->id}}"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You can add money to the customer wallet @if($appearance->is_vshopy==1) vshopy @endif admin.</span>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="language_id" value="{{$appearance->language->language_id}}">

                  <div class="form-group {{ $errors->has('country_name') ? ' has-error' : '' }}">
                    <label class="form-control-label">Amount *</label>
                    <input type="number" name="amount" value="{{old('Amount')}}" class="form-control thresold-i thresold-i" maxlength="30" placeholder="Enter Amount" >
                    @if ($errors->has('amount'))
                    <span class="help-block">
                      <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('narration') ? ' has-error' : '' }}">
                    <label class="form-control-label">Description</label>
                    <textarea name="narration" class="form-control" rows="5" placeholder="Enter description">{{old('description')}}</textarea>
                    @if ($errors->has('narration'))
                    <span class="help-block">
                      <strong>{{ $errors->first('narration') }}</strong>
                    </span>
                    @endif
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                  <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  <a href="/admin/customer/{{$customer->id}}"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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