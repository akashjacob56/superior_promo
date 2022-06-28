@extends('layouts.admin')
@section('content')
<style type="text/css">
  #about_image{
    height: 100px !important;
    width: auto;
    margin:10px;
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
          <li class="breadcrumb-item">
            <a> Product Samples 

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
          <form id="personal-info-form" method="post" action="productsample?product_sample_id={{$product_sample->product_sample_id}}" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>Product samples</h5>
                <span class="upper-buttons">

                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>


                  <a href="{{$base_url}}"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>


                </span>
                <span class="text-muted">You view, add, update, and organize all of your.</span>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-block">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('product_sample_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Production Sample Title *</label>
                  <input type="text" name="product_sample_title" class="form-control" placeholder="Enter Production Sample title" value="{{$product_sample->product_sample_title}}">
                  @if ($errors->has('product_sample_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('product_sample_title') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('product_sample_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Production Sample Description *</label>
                  <textarea name="product_sample_description" class="form-control summernote-editor" rows="" placeholder="Enter product sample description">{{$product_sample->product_sample_description}}</textarea>
                  @if ($errors->has('product_sample_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('product_sample_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="product_sample_image" src="{{$base_url}}/storage/app/{{$product_sample->product_sample_image}}" height="100" > 
            </div>

            <div class="form-group {{ $errors->has('product_sample_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Product Sample Image</label>          
              <input type="file" name="product_sample_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('product_sample_image'))
              <span class="help-block">
                <strong>{{ $errors->first('product_sample_image') }}</strong>
              </span>
              @endif
            </div>



                <div class="form-group {{ $errors->has('order_sample_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Order Sample Title *</label>
                  <input type="text" name="order_sample_title" class="form-control" placeholder="Enter Order Sample title" value="{{$product_sample->order_sample_title}}">
                  @if ($errors->has('order_sample_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('order_sample_title') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('order_sample_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Order Sample Description *</label>
                  <textarea name="order_sample_description" class="form-control summernote-editor" rows="" placeholder="Enter order sample description">{{$product_sample->order_sample_description}}</textarea>
                  @if ($errors->has('order_sample_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('order_sample_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="order_sample_image" src="{{$base_url}}/storage/app/{{$product_sample->order_sample_image}}" height="100" > 
            </div>

            <div class="form-group {{ $errors->has('order_sample_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Order Sample Image</label>          
              <input type="file" name="order_sample_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('order_sample_image'))
              <span class="help-block">
                <strong>{{ $errors->first('order_sample_image') }}</strong>
              </span>
              @endif
            </div>



            <div class="form-group {{ $errors->has('policy_sample_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Policy Sample Title *</label>
                  <input type="text" name="policy_sample_title" class="form-control" placeholder="Enter Sample Policy title" value="{{$product_sample->policy_sample_title}}">
                  @if ($errors->has('policy_sample_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('policy_sample_title') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('policy_sample_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Policy Sample Description *</label>
                  <textarea name="policy_sample_description" class="form-control summernote-editor" rows="" placeholder="Enter policy sample description">{{$product_sample->policy_sample_description}}</textarea>
                  @if ($errors->has('policy_sample_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('policy_sample_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="policy_sample_image" src="{{$base_url}}/storage/app/{{$product_sample->policy_sample_image}}" height="100" > 
            </div>

            <div class="form-group {{ $errors->has('policy_sample_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Order Sample Image</label>          
              <input type="file" name="policy_sample_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('policy_sample_image'))
              <span class="help-block">
                <strong>{{ $errors->first('policy_sample_image') }}</strong>
              </span>
              @endif
            </div>

              </div>
            </div>
          </div>


          <!-- <div class="col-md-12">

            <div class="form-group">
              <img id="about_image" src="{{$base_url}}/storage/app/" height="100" > 
            </div>

            <div class="form-group {{ $errors->has('about_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Image</label>          
              <input type="file" name="about_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('about_image'))
              <span class="help-block">
                <strong>{{ $errors->first('about_image') }}</strong>
              </span>
              @endif
            </div>
          </div> -->

         

          <div class="col-md-12">
            <div class="main-footer">
              <span class="lower-buttons">
                <button type="submit" class="btn btn-primary waves-effect waves-light pull-right"> Save </button>
                <a href="{{$base_url}}"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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

  $(function() {
    var options = $.extend(true, {lang: '' , codemirror: {theme: 'monokai', mode: 'text/html', htmlMode: true, lineWrapping: true} } , {
      "toolbar": [
      ["style", ["style"]],
      ["font", ["bold", "underline", "italic", "clear"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["table", ["table"]],
      ["insert", ["link", "picture", "video"]],
      ["view", ["fullscreen", "codeview", "help"]],
      ['fontname', ['fontname']
      ],
      ['fontNames', ['Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Thai Sans Neue Light', 'Thai Sans Neue Regular', 'Thai Sans Neue Bold']],
['fontNamesIgnoreCheck', ['Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Thai Sans Neue Light', 'Thai Sans Neue Regular', 'Thai Sans Neue Bold']],
      ]
    });
    $("textarea.summernote-editor").summernote(options);
  });
</script>
@endsection