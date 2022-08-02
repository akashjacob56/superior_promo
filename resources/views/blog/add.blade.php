@extends('layouts.admin')
@section('content')
<style type="text/css">
  img#blog_image{
    width: 200px;
    max-height: 200px;
    padding: 20px;
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
    <li class="breadcrumb-item"><a href="all">Blogs</a>
    </li> 
    <li class="breadcrumb-item">
        <a>
          <b class="language-title-color"></b>
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
            <form class="form-horizontal" role="form" method="POST" action="add" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header no-border">
                        <h5>Add Blog</h5>
                        <span class="upper-buttons">
                          <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                          <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">Cancel
                          </button></a>
                      </span>
                      <span class="text-muted">Add Blogs here.</span>
                  </div>
              </div>
          </div>
          <div class="col-md-8">
            <div class="card">
              <div class="card-block">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group {{ $errors->has('blog_type_id') ? ' has-error' : '' }}">
                    <label class="form-control-label">Blog Type *</label>
                    <select id="blog_type_id" name="blog_type_id" class='select-box form-control' required="">
                        <option value="" selected="" disabled="">Select Blog Type</option>
                       @foreach($blog_types as $blog_type)
                       <option value="{{$blog_type->blog_type_id}}">{{$blog_type->blog_type_name}}</option>
                       @endforeach
                   </select>                                        
                   @if ($errors->has('blog_type_id'))
                   <span class="help-block">
                      <strong>{{ $errors->first('blog_type_id') }}</strong>
                  </span>
                  @endif
              </div> 


              <div class="form-group {{ $errors->has('blog_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Blog Title</label>
                  <input namtype="text" class="form-control thresold-i thresold-i" required="" name="blog_title" value="{{ old('blog_title') }}" placeholder="Blog Title">
                  @if ($errors->has('blog_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('blog_title') }}</strong>
                </span>
                @endif
            </div>

            <div class="clearfix"></div>


            <div class="form-group {{ $errors->has('blog_description') ? ' has-error' : '' }}">
              <label class="form-control-label">Description</label>
              <textarea name="blog_description" class="form-control summernote-editor" rows="5" required="" placeholder="Enter blog description">{{old('blog_description')}}</textarea>
              @if ($errors->has('blog_description'))
              <span class="help-block">
                <strong>{{ $errors->first('blog_description') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('blog_image') ? ' has-error' : '' }}">
          <label for="file"  class="col-form-label form-control-label">Blog Image</label>
          <img src="/files/assets/images/preview.png" id="blog_image" alt="" width="150" height="150" required="">
          <label for="file" class="custom-file">

            <input type="file" name="image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('blog_image').src = window.URL.createObjectURL(this.files[0])"/>
            <span class="custom-file-control"></span>

        </label>

        @if ($errors->has('blog_image'))
        <span class="help-block">
            <strong>{{ $errors->first('blog_image') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
     <label class="form-control-label">URL</label>
     <input namtype="text" class="form-control thresold-i thresold-i" name="url" value="{{ old('url') }}" placeholder="URL" required="">
     @if ($errors->has('url'))
     <span class="help-block">
        <strong>{{ $errors->first('url') }}</strong>
    </span>
    @endif
</div>


<div class="form-group {{ $errors->has('seo_title') ? ' has-error' : '' }}">
    <label class="form-control-label">SEO Title</label>
    <input namtype="text" class="form-control thresold-i thresold-i" required="" name="seo_title" value="{{ old('seo_title') }}" placeholder="SEO Title">
    @if ($errors->has('seo_title'))
    <span class="help-block">
        <strong>{{ $errors->first('seo_title') }}</strong>
    </span>
    @endif
</div>

<div class="form-group {{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
    <label class="form-control-label">SEO Keywords</label>
    <input namtype="text" class="form-control thresold-i thresold-i" required="" name="seo_keywords" value="{{ old('seo_keywords') }}" placeholder="SEO Keywords">
    @if ($errors->has('seo_keywords'))
    <span class="help-block">
        <strong>{{ $errors->first('seo_keywords') }}</strong>
    </span>
    @endif
</div>


<div class="form-group {{ $errors->has('seo_description') ? ' has-error' : '' }}">
 <label class="form-control-label">SEO Description</label>
 <input namtype="text" class="form-control thresold-i thresold-i" required="" name="seo_description" value="{{ old('seo_description') }}" placeholder="SEO Description">
 @if ($errors->has('seo_description'))
 <span class="help-block">
    <strong>{{ $errors->first('seo_description') }}</strong>
</span>
@endif
</div>
</div>
</div>
</div>

<div class="col-md-12">
    <div class="main-footer">
      <span class="lower-buttons">
        @if($my_permissions->contains('BRAND_ADD'))
        <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
        <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">Cancel
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
          ["insert", ["link"]],
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