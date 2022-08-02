@extends('layouts.admin')
@section('content')

<style type="text/css">

  img#category_image{
    max-height: 200px;
    padding: 20px;
    max-width: 200px ;
  }

  img#category_banner_image{
    height: 100px !important;
    width: auto;
    margin:10px;
  }

  .custom-file{
    width: 100%;
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
          <li class="breadcrumb-item"><a href="all">Category</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Category details
              
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
          <form id="personal-info-form" method="post" action="{{$category->category_id}}" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>{{$category->default_category_translation->category_name}}</h5>
                <span class="upper-buttons pull-right">
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  @if($category->status_id==1)
                  <button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
                  </button>
                  @else
                  <button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
                  @endif
                  @endif
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                  </button></a>
    
                </span>
                <span class="text-muted">You can modify information for Category according to required types and representations, also you can add product into Category from the given part of your online business  </span>
              </div>
            </div>
          </div>
          <div class="col-md-12 p-0">
            <div class="col-md-8">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}">
                    <label class="form-control-label">Category *</label>
                    <input type="text" id="category_name" name="category_name" value="{{$category->default_category_translation->category_name}}"  class="form-control thresold-i" maxlength="25" placeholder="e.g. Men, Women, Furniture, etc">
                    @if ($errors->has('category_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('category_name') }}</strong>
                    </span>
                    @endif
                  </div>

                   <!--  @php
                    $category_url = str_replace('-', ' ', $category->category_url);
                    @endphp -->

                    <div class="form-group {{ $errors->has('category_url') ? ' has-error' : '' }}">
                      <label class="form-control-label">Category Url *</label>
                      <input type="text" id="category_url" name="category_url" value="{{$category->category_url}}"   class="form-control thresold-i" placeholder="Category Url" >
                      @if ($errors->has('category_url'))
                      <span class="help-block">
                        <strong>{{ $errors->first('category_url') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                      <label class="form-control-label">Description</label>
                      <textarea name="description" class="form-control summernote-editor" rows="" placeholder="Enter Category description">{{$category->default_category_translation->description}}</textarea>
                      @if ($errors->has('description'))
                      <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                      </span>
                      @endif
                    </div>



                    <div class="form-group">
                      <div class="checkbox-fade fade-in-primary">
                        <label class="pull-left">
                          <input type="checkbox" name="is_main_category" id="is_main_category" value="1">      
                          <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        </label>
                        <span class="form-control-label pull-left">Set this Category as "Top Category".</span>

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="file"  class="col-form-label form-control-label">Category image (optional)</label>
                      <img src="/storage/app/{{$category->category_image}}" id="category_image" onerror="this.src='/files/assets/images/product.png';">
                      <label for="file" class="custom-file">
                        <input type="file" name="category_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('category_image').src = window.URL.createObjectURL(this.files[0])"/>
                        <span class="custom-file-control"></span>
                      </label>
                    </div>

                    <div class="form-group">
                      <label for="file"  class="col-form-label form-control-label">Category Banner image (optional)</label>
                      <img src="/storage/app/{{$category->category_banner_image}}" id="category_banner_image" onerror="this.src='/files/assets/images/product.png';">
                      <label for="file" class="custom-file">
                        <input type="file" name="category_banner_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" onchange="document.getElementById('category_banner_image').src = window.URL.createObjectURL(this.files[0])"/>
                        <span class="custom-file-control"></span>
                      </label>
                    </div>

                    
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
                          <input type="text" name="meta_title" value="{{$category->default_category_translation->meta_title}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta title">
                          @if ($errors->has('meta_title'))
                          <span class="help-block">
                            <strong>{{ $errors->first('meta_title') }}</strong>
                          </span>
                          @endif
                        </div>

                        <div class="meta form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                          <label class="form-control-label">Meta keywords </label>
                          <input type="text" name="meta_keywords" value="{{$category->default_category_translation->meta_keywords}}" class="form-control thresold-i" maxlength="1000" placeholder="Enter meta keywords">
                          @if ($errors->has('meta_keywords'))
                          <span class="help-block">
                            <strong>{{ $errors->first('meta_keywords') }}</strong>
                          </span>
                          @endif
                        </div>

                        <div class="meta form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                          <label class="form-control-label">Meta Description</label>
                          <textarea name="meta_description" class="form-control" rows="5" maxlength="1000" placeholder="Enter meta description">{{$category->default_category_translation->meta_description}}</textarea>
                          @if ($errors->has('meta_description'))
                          <span class="help-block">
                            <strong>{{ $errors->first('meta_description') }}</strong>
                          </span>
                          @endif
                        </div>



                      </div>

                    </div>
                    

                  </div>
                </div>
              </div>
              <div class="col-md-12 m-b-20">
                <span class="lower-buttons">
                  @if($my_permissions->contains('CATEGORY_DETAILS'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>@endif
                  @if($my_permissions->contains('CATEGORY_UPDATE'))
                  @if($category->status_id==1)
                  <button type="submit" name="inactive" class="m-r-5 btn btn-danger waves-effect waves-light add pull-right"> Inactivate
                  </button>
                  @else
                  <button type="submit" name="active" class="m-r-5 btn btn-success waves-effect waves-light add pull-right"> Activate</button>
                  @endif
                  @endif

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

<script type="text/javascript">

  if({{$category->is_main_category}}==1){
    $('#is_main_category').prop('checked',true);
  }
  

  $("#category_name").keyup(function(){
    var Text = $(this).val();
    $("#category_url").val(Text);        
  });


</script>




<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
<script src="{{asset('files/assets/pages/data-table/js/data-table-custom.js')}}"></script>

<script type="text/javascript">

$(function() {

  $("#cancel-seo").hide();
  $(".meta").hide();
  $("#edit-seo").click(function(){
    $(".meta").show();
    $("#cancel-seo").show();
    $("#edit-seo").hide();
  });

  $("#cancel-seo").click(function(){
    $("#edit-seo").show();
    $(".meta").hide();
    $("#cancel-seo").hide();
  });
});

</script>

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
