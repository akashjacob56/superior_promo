@extends('layouts.admin')
@section('content')

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
            <a> Add Return Policy 
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
          <form id="personal-info-form" method="post" action="add" enctype='multipart/form-data'>
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div class="col-sm-12">
            <div class="card">
              <div class="card-header no-border">
                <h5>Policy</h5>
                <span class="upper-buttons">
                  <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
                  <a href="all"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
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
                <input type="hidden" name="language_id" value="1">
                <div class="form-group {{ $errors->has('return_policy_title') ? ' has-error' : '' }}">
                  <label class="form-control-label">Return Policy title *</label>
                  <input type="text" name="return_policy_title" value="{{old('return_policy_title')}}" class="form-control thresold-i" maxlength="40" placeholder="Enter Return Policy title" >
                  @if ($errors->has('return_policy_title'))
                  <span class="help-block">
                    <strong>{{ $errors->first('return_policy_title') }}</strong>
                  </span>
                  @endif
                </div>
                
               
                <div class="form-group form-primary {{ $errors->has('is_available_for_return') ? ' has-error' : '' }} col-md-6 pt-3">
                <tr>
                  <td>  
                    <div class="checkbox-fade fade-in-primary">
                      <label>
                        <input type="checkbox" id="is_bd" name="is_available_for_return" value="1">
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        Is Return Available
                      </label>
                    </div>
                  </td>
                </tr>
              </div>
              <div class="form-group form-primary {{ $errors->has('is_available_for_return_replace') ? ' has-error' : '' }} col-md-6 pt-3">
                <tr>
                  <td>  
                    <div class="checkbox-fade fade-in-primary">
                      <label>
                        <input type="checkbox" id="is_bd" name="is_available_for_return_replace" value="1">
                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                        Is Return & Replace Available
                      </label>
                    </div>
                  </td>
                </tr>
              </div>

                <div class="form-group {{ $errors->has('return_days') ? ' has-error' : '' }}">
                  <label class="form-control-label">Return days *</label>
                  <input id="return_days" type="number" name="return_days" value="{{old('return_days')}}"  class="form-control thresold-i"  placeholder="Return Days" >
                  @if ($errors->has('return_days'))
                  <span class="help-block">
                    <strong>{{ $errors->first('return_days') }}</strong>
                  </span>
                  @endif
                </div>
               

                <div class="form-group {{ $errors->has('policy_description') ? ' has-error' : '' }}">
                  <label class="form-control-label">Return Policy description *  </label>
                  <textarea name="return_policy_description" class="form-control summernote-editor" rows="" placeholder="Enter policy description">{{$return_policy->default_return_policy_translation->return_policy_description}}</textarea>
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
            <div class="main-footer">
              <span class="lower-buttons">
                <button type="submit" name="save"  class="btn btn-primary waves-effect waves-light pull-right">Save</button>
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