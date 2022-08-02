@extends('layouts.admin')
@section('content')
<style type="text/css">
  .all-button-div{
    padding-top: 20px;
}

.all-button-div>i{
    color: deepskyblue;
    font-size: 30px;
    width: 50px;
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
          <li class="breadcrumb-item"><a href="/admin/artwork/all">Art Work</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Art Work details
           
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
          <form id="personal-info-form" method="post" action="{{$artproof->id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5><a>Art Work Detail</a></h5>
                  <span class="upper-buttons">
                    
                    <!-- <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button> -->
                   

                    <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>

              
                  </span>
                  <span>Modify Art Proof information here, good Art Proof improves the conversions of products. add and modify a new Art Proof of the required type and representation to a selected part of your on-line store..</span>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @if($artproof->orderitem!="")
                      @if($artproof->orderitem->product!="")
                        @if($artproof->orderitem->product->product_translation!="")
                          <div class="form-group {{$errors->has('product_name')?' has-error':'' }}">
                            <label class="form-control-label">Product Name</label><br>
                            <p class="form-control">{{$artproof->orderitem->product->product_translation->product_name}}</p>
                          </div>
                        @endif
                      @endif
                    @endif



                  <div class="form-group {{$errors->has('user_id')?' has-error':'' }}">
                    <label class="form-control-label">User</label>
                    <!-- <input type="text" name="user_id" value="" class="form-control thresold-i" maxlength="30" placeholder="Enter User Name"> -->
                    @if($artproof->user!="")
                      <p class="form-control">{{$artproof->user->name}}</p>
                    @endif
                  </div>

                  <div class="form-group {{$errors->has('customer_note')?' has-error':'' }}">
                    <label class="form-control-label">Customer Note : </label>
                    <br>
                    <p class="">{{$artproof->customer_note}}</p>
                    @if ($errors->has('customer_note'))
                    <span class="help-block">
                      <strong>{{ $errors->first('customer_note') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group {{$errors->has('approved')?' has-error':'' }}">
                    <label class="form-control-label">Approve</label>
                    @if($artproof->approved==0)
                      <p class="form-control text-danger">Decline</p>
                    @elseif($artproof->approved==1)
                      <p class="form-control text-success">Approve</p>
                    @elseif($artproof->approved==2)
                      <p class="form-control text-warning">Not Mentioned</p>
                    @endif  
                    
                  </div>


                  <div class="form-group {{$errors->has('path')?' has-error':'' }}">
                    <label class="form-control-label">Art Path</label><br>
                    <!-- <input type="text" name="customer_note" value="{{$artproof->customer_note}}" class="form-control thresold-i" placeholder="Enter Customer Note"> -->
                    <a href="/storage/app/{{$artproof->path}}" class="all-button-div"><img src="http://localhost/superiorpromos.com/storage/app/preview.png" style="width:100px;height:50px;"></a>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                  <!-- <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button> -->
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

@endsection