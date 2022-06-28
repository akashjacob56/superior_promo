@extends('layouts.admin')
@section('content')
<?php
$category=$category->default_category_translation;
$category_name="";
$description="";
if($category_translation!=""){
  $category_name=$category_translation->category_name;
  $description=$category_translation->description;
}
?>
<!-- iconfont -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">


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
          <li class="breadcrumb-item"><a href="../all"> categories</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Category translation (
              @if($appearance->is_multilanguage==1)
              <b class="language-title-color">{{$language->default_language_translation->language_name}} )</b>
              @endif
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
                <h5>{{$category->category_name}}</h5>
                <span class="upper-buttons">
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  @endif

                  <a href="../all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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
          <div class="col-md-12 p-0">
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                  <input type="hidden" name="language_id" value="{{$language->language_id}}">
                  <input type="hidden" name="category_id" value="{{$category->category_id}}">
                  
                  <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                    <label class="form-control-label">Category * ({{$category->category_name}})</label>
                    <input type="text" name="category_name" value="{{$category_name}}"  placeholder="Categort name" class="form-control thresold-i" maxlength="25">
                    @if ($errors->has('category_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('category_name') }}</strong>
                    </span>
                    @endif
                  </div>
                   
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Description</label>
                  <textarea name="about_us_description" class="form-control summernote-editor" rows="" placeholder="Enter Category description">{{$description}}</textarea>
                  @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                  @endif
                </div>

                @php

              if($category->default_category_translation!=""){

              $meta_title=$category->default_category_translation->meta_title;
              $meta_keywords=$category->default_category_translation->meta_keywords;
              $meta_description=$category->default_category_translation->meta_description;

            }else{
             
              $meta_title="";
              $meta_keywords="";
              $meta_description="";


          }

                @endphp

                
                              @if($appearance->is_seo==1)
          <div class="card">
            <div class="card-block">
              <h6>Search engine listing preview (optional)</h6>

              <div class="form-group">
                <button id="edit-seo" class="btn btn-link pull-right" type="button">Edit website SEO</button>
                <button  id="cancel-seo" class="btn btn-link pull-right" type="button">Cancel</button>
                <p class="text-muted">Add a title and description to see how this category might appear in a search engine listing.</p>
              </div>

              <div class="meta form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                <label class="form-control-label">Meta title</label>
                <input type="text" name="meta_title" value="{{$meta_title}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta title">
                @if ($errors->has('meta_title'))
                <span class="help-block">
                  <strong>{{ $errors->first('meta_title') }}</strong>
                </span>
                @endif
              </div>

              <div class="meta form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                <label class="form-control-label">Meta keywords </label>
                <input type="text" name="meta_keywords" value="{{$meta_keywords}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta keywords">
                @if ($errors->has('meta_keywords'))
                <span class="help-block">
                  <strong>{{ $errors->first('meta_keywords') }}</strong>
                </span>
                @endif
              </div>

              <div class="meta form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                <label class="form-control-label">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="5" maxlength="1000" placeholder="Enter meta description">{{$meta_description}}</textarea>
                @if ($errors->has('meta_description'))
                <span class="help-block">
                  <strong>{{ $errors->first('meta_description') }}</strong>
                </span>
                @endif
              </div>



            </div>

          </div>
          @endif


                </div>
              </div>
            </div>
            <div class="col-md-12">
              <span class="lower-buttons">
                @if($my_permissions->contains('CATEGORY_DETAILS'))
                <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif

                <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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
