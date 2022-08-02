@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/datepickercss.css')}}">
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
          <li class="breadcrumb-item"><a href="contactus-master">ContactUs</a>
          </li> 
          <li class="breadcrumb-item">
            <a>Update Contact Page details</a>
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
          <form id="personal-info-form" class="w-100" method="post" action="{{$ContactUs->id}}" enctype='multipart/form-data'>
             <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header no-border">
                  <h5>Update Contact Page Details</h5>

                  <span class="upper-buttons pull-right">
                    <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                    <a href="/admin/home"><button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">   Cancel
                    </button></a>
                  </span>
                  <span class="text-muted">You can contact page details here.</span>
                </div>
              </div>
            </div>



            <div class="col-md-12 p-0">
              
                <div class="card">
                  <div class="card-block">
                    <div class="col-md-7">

                    <h5 class="pt-3 pb-3" >Contact Information/Number Details</h5>             
                    
                    <div class="form-group {{ $errors->has('office_hours') ? ' has-error' : '' }}">
                      <label class="form-control-label">Office Hours Timing *</label>
                      <input type="text" name="office_hours" value="{{$ContactUs->office_hours}}" class="form-control thresold-i" maxlength="40" placeholder="ContactUS Office Hours Timing">
                      @if ($errors->has('office_hours'))
                      <span class="help-block">
                        <strong>{{ $errors->first('office_hours') }}</strong>
                      </span>
                      @endif
                    </div>
               
                
                    <div class="form-group {{ $errors->has('toll_free') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Toll Free Contact No <span>*</span></label>
                      <input type="text" name="toll_free" value="{{$ContactUs->toll_free}}" class="form-control thresold-i"  placeholder="ContactUS Toll Free Contact No">
                      @if ($errors->has('toll_free'))
                      <span class="help-block">
                        <strong>{{ $errors->first('toll_free') }}</strong>
                      </span>
                      @endif
                    </div>


                    <div class="form-group {{ $errors->has('local_no') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Local Contact No <span>*</span></label>
                      <input type="text" name="local_no" value="{{$ContactUs->local_no}}" class="form-control thresold-i"  placeholder="ContactUS Local Contact No">
                      @if ($errors->has('local_no'))
                      <span class="help-block">
                        <strong>{{ $errors->first('local_no') }}</strong>
                      </span>
                      @endif
                    </div>



                    <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Fax <span>*</span></label>
                      <input type="text" name="fax" value="{{$ContactUs->fax}}" class="form-control thresold-i"  placeholder="ContactUS Fax">
                      @if ($errors->has('fax'))
                      <span class="help-block">
                        <strong>{{ $errors->first('fax') }}</strong>
                      </span>
                      @endif
                    </div>


                  </div>
                </div>
              </div>    
            </div>


            <div class="col-md-12 p-0">
                <div class="card">
                  <div class="card-block">
                   <div class="col-md-7">
                    <h5 class="pt-3 pb-3" >ContactUs Email Address Details</h5>            
                   
                    <div class="form-group {{ $errors->has('general_information') ? ' has-error' : '' }}">
                      <label class="form-control-label">General Information / Order Help Email*</label>
                      <input type="email" name="general_information" value="{{$ContactUs->general_information}}" class="form-control thresold-i" maxlength="40" placeholder="General Information/Order Help Email">
                      @if ($errors->has('general_information'))
                      <span class="help-block">
                        <strong>{{ $errors->first('general_information') }}</strong>
                      </span>
                      @endif
                    </div>
               
                
                    <div class="form-group {{ $errors->has('salesandquotes') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Sales and Quotes Email <span>*</span></label>
                      <input type="text" name="salesandquotes" value="{{$ContactUs->salesandquotes}}" class="form-control thresold-i"  placeholder="Sales and Quotes Email">
                      @if ($errors->has('salesandquotes'))
                      <span class="help-block">
                        <strong>{{ $errors->first('salesandquotes') }}</strong>
                      </span>
                      @endif
                    </div>


                    <div class="form-group {{ $errors->has('art_department') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Art Department Email <span>*</span></label>
                      <input type="text" name="art_department" value="{{$ContactUs->art_department}}" class="form-control thresold-i"  placeholder="Art Department Email">
                      @if ($errors->has('art_department'))
                      <span class="help-block">
                        <strong>{{ $errors->first('art_department') }}</strong>
                      </span>
                      @endif
                    </div>


                    <div class="form-group {{ $errors->has('billing_question') ? ' has-error' : '' }} ">
                      <label class="form-control-label">Billing Question Email <span>*</span></label>
                      <input type="text" name="billing_question" value="{{$ContactUs->billing_question}}" class="form-control thresold-i"  placeholder="Billing Question Email">
                      @if ($errors->has('billing_question'))
                      <span class="help-block">
                        <strong>{{ $errors->first('billing_question') }}</strong>
                      </span>
                      @endif
                    </div>

                    <div class="form-group {{ $errors->has('samples_requests') ? ' has-error' : '' }} ">
                    <label class="form-control-label">Samples Requests Question Email <span>*</span></label>
                      <input type="text" name="samples_requests" value="{{$ContactUs->samples_requests}}" class="form-control thresold-i"  placeholder="Samples Requests Question Email">
                      @if ($errors->has('samples_requests'))
                      <span class="help-block">
                        <strong>{{ $errors->first('samples_requests') }}</strong>
                      </span>
                      @endif
                    </div>

                  </div>
                </div>
              </div>    
            </div>





            <div class="col-md-12 p-0">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-block">

                    <h5 class="pt-3 pb-3" >ContactUs Address Details</h5>            
                   
                      <div class="form-group {{ $errors->has('address_superiorpromos_inc') ? ' has-error' : '' }}">
                        <label class="form-control-label">Address Superior Promos Inc *</label>
                        <textarea name="address_superiorpromos_inc" class="form-control" rows="" placeholder="Enter address superiorpromos inc">{{$ContactUs->address_superiorpromos_inc}}</textarea>
                        @if ($errors->has('address_superiorpromos_inc'))
                        <span class="help-block">
                          <strong>{{ $errors->first('address_superiorpromos_inc') }}</strong>
                        </span>
                        @endif
                      </div>
                     

          
                   
                      <div class="form-group {{ $errors->has('mailing_address') ? ' has-error' : '' }}">
                        <label class="form-control-label">Mailing Address*</label>
                        <textarea name="mailing_address" class="form-control" rows="" placeholder="Enter mailing address">{{$ContactUs->mailing_address}}</textarea>
                        @if ($errors->has('mailing_address'))
                        <span class="help-block">
                          <strong>{{ $errors->first('mailing_address') }}</strong>
                        </span>
                        @endif
                      </div>              


                  </div>
                </div>
              </div>    
            </div>




            <div class="col-sm-12">
              <div class="main-footer">
                
                <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Save</button>

                <a href="/admin/home">
                  <button type="button" class="m-r-5 btn btn-default waves-effect waves-light add pull-right">Cancel
                </button></a>

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


<!-- Date-range picker js -->
<script src="{{asset('files/assets/js/zebra_datepicker.js')}}"></script>

<script src="{{asset('files/assets/js/core.js')}}"></script>
@endsection