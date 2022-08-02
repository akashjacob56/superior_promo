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
            <a> Art Work Front End 

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
          <form id="personal-info-form" method="post" action="art-work?art_work_id={{$art_work->art_work_id}}" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>Art Work</h5>
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

                <div class="form-group {{ $errors->has('art_digital_revision_proofs_tittle') ? ' has-error' : '' }}">
                  <label class="form-control-label">Art Digital Revision Proofs Title *</label>
                  <input type="text" name="art_digital_revision_proofs_tittle" class="form-control" placeholder="Enter Art Digital Revision Title" value="{{$art_work->art_digital_revision_proofs_tittle}}">
                  @if ($errors->has('art_digital_revision_proofs_tittle'))
                  <span class="help-block">
                    <strong>{{ $errors->first('art_digital_revision_proofs_tittle') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('art_digital_revision_proofs_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Art Digital Revision Prooofs Description *</label>
                  <textarea name="art_digital_revision_proofs_description" class="form-control summernote-editor" rows="" placeholder="Enter Art Digital Revision Prooofs Description">{{$art_work->art_digital_revision_proofs_description}}</textarea>
                  @if ($errors->has('art_digital_revision_proofs_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('art_digital_revision_proofs_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="product_sample_image" src="/storage/app/{{$art_work->art_digital_revision_proofs_image}}" height="100" >
            </div>

            <div class="form-group {{ $errors->has('art_digital_revision_proofs_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Art Digital Revision Proofs Image</label>          
              <input type="file" name="art_digital_revision_proofs_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('art_digital_revision_proofs_image'))
              <span class="help-block">
                <strong>{{ $errors->first('art_digital_revision_proofs_image') }}</strong>
              </span>
              @endif
            </div>



                <div class="form-group {{ $errors->has('preffered_file_types_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Preffered File Types title *</label>
                  <input type="text" name="preffered_file_types_title" class="form-control" placeholder="Enter Preffered File Types Title" value="{{$art_work->preffered_file_types_title}}">
                  @if ($errors->has('preffered_file_types_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('preffered_file_types_title') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group {{ $errors->has('preffered_file_types_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Preffered File Type Description *</label>
                  <textarea name="preffered_file_types_description" class="form-control summernote-editor" rows="" placeholder="Enter Preffered File Type Description">{{$art_work->preffered_file_types_description}}</textarea>
                  @if ($errors->has('preffered_file_types_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('preffered_file_types_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="preffered_file_types_image" src="/storage/app/{{$art_work->preffered_file_types_image}}" height="100" >
            </div>

            <div class="form-group {{ $errors->has('preffered_file_types_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Preffered File Types Image</label>          
              <input type="file" name="preffered_file_types_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('preffered_file_types_image'))
              <span class="help-block">
                <strong>{{ $errors->first('preffered_file_types_image') }}</strong>
              </span>
              @endif
            </div>



              <div class="form-group {{ $errors->has('redraws_modification_file_types_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Redraws Modification File Types Title *</label>
                  <input type="text" name="redraws_modification_file_types_title" class="form-control" placeholder="Enter Redraws Modification File Types Title" value="{{$art_work->redraws_modification_file_types_title}}">
                  @if ($errors->has('redraws_modification_file_types_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('redraws_modification_file_types_title') }}</strong>
                  </span>
                  @endif
              </div>

                <div class="form-group {{ $errors->has('redraws_modification_file_types_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Redraws Modification File Types Description *</label>
                  <textarea name="redraws_modification_file_types_description" class="form-control summernote-editor" rows="" placeholder="Enter Redraws Modification File Types Description">{{$art_work->redraws_modification_file_types_description}}</textarea>
                  @if ($errors->has('redraws_modification_file_types_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('redraws_modification_file_types_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="redraws_modification_file_types_image" src="/storage/app/{{$art_work->redraws_modification_file_types_image}}" height="100">
            </div>

            <div class="form-group {{ $errors->has('redraws_modification_file_types_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Redraws Modification File Type Image</label>          
              <input type="file" name="redraws_modification_file_types_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('redraws_modification_file_types_image'))
              <span class="help-block">
                <strong>{{ $errors->first('redraws_modification_file_types_image') }}</strong>
              </span>
              @endif
            </div>



            <div class="form-group {{ $errors->has('font_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Font Title *</label>
                  <input type="text" name="font_title" class="form-control" placeholder="Enter Sample Policy title" value="{{$art_work->font_title}}">
                  @if ($errors->has('font_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('font_title') }}</strong>
                  </span>
                  @endif
              </div>

                <div class="form-group {{ $errors->has('font_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Font Description *</label>
                  <textarea name="font_description" class="form-control summernote-editor" rows="" placeholder="Enter Font Description">{{$art_work->font_description}}</textarea>
                  @if ($errors->has('font_description'))
                  <span class="help-block">
                    <strong>{{$errors->first('font_description')}}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group">
              <img id="font_image" src="/storage/app/{{$art_work->font_image}}" height="100" >
            </div>



            <div class="form-group {{ $errors->has('font_image') ? ' has-error' : '' }}">
              <label class="form-control-label">Font Image</label>          
              <input type="file" name="font_image" class="form-control" onchange="document.getElementById('about_image').src = window.URL.createObjectURL(this.files[0])" >  
              @if ($errors->has('font_image'))
              <span class="help-block">
                <strong>{{ $errors->first('font_image') }}</strong>
              </span>
              @endif
            </div>





              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="main-footer">
              <span class="lower-buttons">
                <button type="submit" class="btn btn-primary waves-effect waves-light pull-right"> Save </button>
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