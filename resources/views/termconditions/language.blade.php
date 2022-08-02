@extends('layouts.admin')
@section('content')

<?php
$term_condition=$term_condition->default_term_condition_translation;
$term_condition_description="";
if($term_condition_translation!=""){
  $term_condition_description=$term_condition_translation->term_condition_description;
}
?>

<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <ul class="breadcrumb">`
          <li class="breadcrumb-item">
            <a href="">
              <i class="feather icon-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="/admin/home">Admin</a>
          </li>
          <li class="breadcrumb-item"><a href="1">Terms & conditions </a>
          </li> 
          <li class="breadcrumb-item">
            <a>Term condition details (
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
          <form class="w-100" id="personal-info-form" method="post" action="{{$language->language_code}}" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>Terms & conditions (<a>{{$language->default_language_translation->language_name}}</a>)</h5>
                  <span class="upper-buttons pull-right">
                    @if($my_permissions->contains('TERM_CONDITION_UPDATE'))
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                    @endif
                    <a href="/admin/termconditions"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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
                  <input type="hidden" name="term_condition_id" value="{{$term_condition->term_condition_id}}">

                  <div class="form-group {{ $errors->has('term_condition_description') ? ' has-error' : '' }}">
                    <label class="form-control-label">Term condition description *</label>
                    <textarea name="term_condition_description" class="form-control summernote-editor">{{old('term_condition_description')?old('term_condition_description'):$term_condition_description}}</textarea>
                    @if ($errors->has('term_condition_description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('term_condition_description') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                  @if($my_permissions->contains('TERM_CONDITION_UPDATE'))
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  @endif
                  <a href="/admin/termconditions"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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