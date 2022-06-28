@extends('layouts.admin')
@section('content')
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
            <a>Production Stage details
           
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
          <form id="personal-info-form" method="post" action="{{$stage->id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5><a>Product Details</a></h5>
                  <span class="upper-buttons">
                    
                   <!--  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
       

                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a> -->

              
                  </span>
                  <span>Modify Product Stage information here, good brands improves the conversions of products. add and modify a new Production Stage of the required type and representation to a selected part of your on-line store..</span>
                </div>
              </div>
            </div>
            <div class="col-md-10">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label class="form-control-label">Production Name</label>
                    <input type="text" name="production_stage_name" value="{{$stage->name}}" class="form-control thresold-i" maxlength="30" placeholder="Enter production stage Name">
                  
                  </div>
                 
                  
                 
                
                 <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>

                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                  <!-- <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a> -->

       

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