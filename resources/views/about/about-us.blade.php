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
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item">
            <a> About Us 

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
          <form id="personal-info-form" method="post" action="aboutus" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>About Us</h5>
                <span class="upper-buttons">

                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>


                  <a href=""><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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

                <div class="form-group {{ $errors->has('policy_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">About us description *  </label>
                  <textarea name="about_us_description" class="form-control summernote-editor" rows="" placeholder="Enter about us description">{{$about->default_aboutus_translation->about_us_description}} </textarea>
                  @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('about_us_description') }}</strong>
                  </span>
                  @endif
                </div>

              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="form-group">
              <img id="about_image" src="/storage/app/{{$about_translation->about_image}}" height="100" >
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
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <img id="about_video" src="/storage/app/{{$about_translation->about_video}}" height="100" >
            </div>

            <div class="form-group {{ $errors->has('about_video') ? ' has-error' : '' }}">
              <label class="form-control-label">Video</label>          
              <input type="file" name="about_video" class="form-control">  
              @if ($errors->has('about_video'))
              <span class="help-block">
                <strong>{{ $errors->first('about_video') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="col-md-12">
            <div class="main-footer">
              <span class="lower-buttons">

                <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                

                <a href=""><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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