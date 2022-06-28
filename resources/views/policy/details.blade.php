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
          <li class="breadcrumb-item">
            <a> Policy 
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
          <form id="personal-info-form" method="post" action="policy" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>Policy</h5>
                  <span class="upper-buttons pull-right ">
                    @if($my_permissions->contains('POLICY_UPDATE'))
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                    @endif
                    
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

                  <div class="form-group {{ $errors->has('policy_description') ? ' has-error' : '' }}">
                    <label class="form-control-label">Privacy Policy description *  </label>
                    <textarea name="policy_description" class="form-control summernote-editor" rows="" placeholder="Enter policy description">{{$policy->default_policy_translation->policy_description}}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('policy_description') }}</strong>
                    </span>
                    @endif
                  </div>

                </div>
              </div>
            </div>

             <div class="col-md-12">
              <div class="card">
                <div class="card-block">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group {{ $errors->has('return_policy_description') ? ' has-error' : '' }}">
                    <label class="form-control-label">Return Policy description *  </label>
                    <textarea name="return_policy_description" class="form-control summernote-editor" rows="" placeholder="Enter policy description">{{$policy->default_policy_translation->return_policy_description}}</textarea>
                    @if ($errors->has('description'))
                    <span class="help-block">
                      <strong>{{ $errors->first('return_policy_description') }}</strong>
                    </span>
                    @endif
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="main-footer">
                <span class="lower-buttons">
                 @if($my_permissions->contains('POLICY_UPDATE'))
                    <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                    @endif
                    

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
      ['fontNames', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
['fontNamesIgnoreCheck', [ 'Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Sacramento']],
      ]
    });
    $("textarea.summernote-editor").summernote(options);
  });
</script>
@endsection