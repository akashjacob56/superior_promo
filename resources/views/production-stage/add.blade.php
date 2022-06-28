@extends('layouts.admin')
@section('content')
<!-- Tags css -->
<style type="text/css">
  .variant_weight_unit{
    width: 60px;
    padding: 5px !important;
  }
.table td{
    padding: 1rem 0.2rem !important;
}
  img#product_image{
    width: 100%;
    max-height: 300px;
    padding: 20px;
  }
  .custom-file{
    width: 100%;

  }
  .bootstrap-tagsinput{
    width: 400px !important;
  }
  .bootstrap-tagsinput input{
    width:100%!important;
  }
  .table>thead>tr>th {
    font-size: .8375rem !important;
  }

</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="{{asset('files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />
<!-- [ breadcrumb ] start -->
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
          <li class="breadcrumb-item"><a href="all">Production Stage</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Add Production Stage </a>
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
        <div class="row mobile-responsive">
          <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>Add Production Stage</h5>
                  <span class="upper-buttons pull-right">
                  </span>
                  <span>Add new product stage according to required types and representations to a given part of your online business .</span>
                </div>
              </div>
            </div>
            <div class="col-sm-12 p-0">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group ">
                                  <label class="form-control-label">Name</label>
                                  <input id="production_stage_name" type="text" name="production_stage_name" value="{{old('production_stage_name')}}" class="form-control thresold-i" placeholder="Enter Production Stage Name">
                              </div> 
                              <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                              <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right"> Cancel
                        </button></a>       
                        </div>
                    </div>
                  </div>
                  </div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



<!-- Tags js -->
<script src="{{asset('files/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>



<!-- select 2 -->
<script type="text/javascript" src="{{asset('files/bower_components/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script type="text/javascript" src="{{asset('files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
</script>
<script type="text/javascript" src="{{asset('files/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('files/assets/pages/advance-elements/select2-custom.js')}}"></script>

@endsection