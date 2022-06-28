@extends('layouts.admin')
@section('content')


<?php
$about=$about->default_aboutus_translation;
$aboutus_description="";
if($aboutus_translation!=""){
  $aboutus_description=$aboutus_translation->about_us_description;
}
?>
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
          <form id="personal-info-form" method="post" action="{{$language->language_code}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>About Us</h5>
                  <span class="upper-buttons">
                   
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                    
                    
                    <a href="{{$base_url}}"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                    @if($appearance->is_multilanguage==1)
                    <div class="dropdown-primary dropdown pull-right m-r-5">
                      <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Switch Language
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        @foreach($active_languages as $active_language)
                        @if($stored_translations->contains($active_language->language_id))
                        <a class="dropdown-item waves-light waves-effect" href="{{$active_language->language_code}}">{{$active_language->language_name}} <i class="fa fa-check pull-right translation-icon"></i></a>
                        @else
                        <a class="dropdown-item waves-light waves-effect" href="{{$active_language->language_code}}">{{$active_language->language_name}}</a>
                        @endif
                        @endforeach   
                      </div>
                    </div>
                    @endif

                  </span>
                  <span class="text-muted">You view, add, update, and organize all of your.</span>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="language_id" value="{{$language->language_id}}">
                  <div class="form-group {{ $errors->has('policy_description') ? ' has-error' : '' }}">
                    <label class="form-control-label">About us description *  </label>
                    <textarea name="about_us_description" class="form-control summernote-editor" rows="" placeholder="Enter about us description">{{old('about_us_description')?old('about_us_description'):$aboutus_description}} </textarea>
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
              <div class=" form-group {{ $errors->has('about_image') ? ' has-error' : '' }}" >
                <label class="form-control-label" for="usr">Image </label>
                <div class="slider_img">
                 <img   src="{{$base_url}}/files/assets/images/preview.png" id="about_image" alt="">
               </div>
               <input type="file" class="form-control" name="about_image" value="{{old('about_image')}}" accept="image/*"  onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])">

               @if ($errors->has('about_image'))
               <span class="help-block">
                <strong>{{ $errors->first('about_image') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="col-md-12">
            <div class="main-footer">
              <span class="lower-buttons">
                
                <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                

                <a href="{{$base_url}}"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                </button></a>
                @if($appearance->is_multilanguage==1)
                <div class="dropdown-primary dropdown pull-right m-r-5">
                  <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Switch Language
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    @foreach($active_languages as $active_language)
                    @if($stored_translations->contains($active_language->language_id))
                    <a class="dropdown-item waves-light waves-effect" href="{{$active_language->language_code}}">{{$active_language->language_name}} <i class="fa fa-check pull-right translation-icon"></i></a>
                    @else
                    <a class="dropdown-item waves-light waves-effect" href="{{$active_language->language_code}}">{{$active_language->language_name}}</a>
                    @endif
                    @endforeach   
                  </div>
                </div>
                @endif
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
      ['fontNames', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
['fontNamesIgnoreCheck', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
      ]
    });
    $("textarea.summernote-editor").summernote(options);
  });
</script>
@endsection