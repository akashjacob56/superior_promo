<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  @if(isset($title) && $title!="" )
  <title>{{ $title }}</title>
  @else
  <title>Superior</title>
  @endif
  <meta name="keywords" content="@hasSection('keyworddescription')@yield('keyworddescription')@else Swaas  @endif">
  <meta name="description" content="@hasSection('description')@yield('description')@else Swaas @endif">
  @if(isset($title))
  <h1 style="display: none;">{{$title}}</h1>
  @else
  <h1 style="display: none;">Superior</h1>
  @endif
  
  <meta name="author" content="vshopy" />
  <!-- Favicon icon -->
  
  <link rel="icon" href="" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/custom.css')}}">

  <!-- Google font-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

  <!-- <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/google-font.css')}}"> -->
  <!-- Required Fremwork -->

  <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/bootstrap/css/bootstrap.min.css')}}">
  <!-- waves.css -->

  <link rel="stylesheet" href="{{asset('files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">  

  <!-- feather icon -->
  <link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/feather/css/feather.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('files/assets/pages/notification/notification.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/animate.css/css/animate.css')}}">
  
  <!-- Data Table Css -->
  <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" >
  <!--   
  <link rel="stylesheet" type="text/css" href="{{asset('files/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
-->  

<!--daterange filter-->


<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/widget.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/select-box.css')}}">

<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/style.css')}}" media="all">

<!-- Style.css -->
<!-- <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/fonts.css')}}" media="all"> -->


<link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/font-awesome/css/font-awesome.min.css')}}">


<!-- style 2 -->
<link rel="stylesheet" href="{{asset('files/bower_components/select2/css/select2.min.css')}}" />
<!-- browse button -->
<link href="{{asset('files/assets/pages/jquery.filer/css/jquery.filer.css')}}" type="text/css" rel="stylesheet" />



<script type="text/javascript" src="{{asset('files/bower_components/jquery/js/jquery.min.js')}}" ></script>


<script type="text/javascript" src="{{asset('files/assets/js/bootstrap-growl.min.js')}}" ></script>
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/feather/css/feather.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/icon/simple-line-icons/css/simple-line-icons.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/pages.css')}}">

<link rel="stylesheet" href="{{asset('dist/summernote.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/daterangepicker-master/daterangepicker.css')}}">







@if($selected_language->alignment=="right")
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/rtl.css')}}">
@endif

@include('layouts.admin_css')

<style type="text/css">


/*for all select padding */

.select2-container--default .select2-selection--multiple {
    padding: 0px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice span {
    color: #101010;
}


  .footer-text{
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 10px;
  }
  #keyword{
    border:none !important;
  }
  .form-control:focus{
   box-shadow: 0 !important;
 }
 body {

  font-family:"Open sans" !important;

  
  
}
.header-navbar .navbar-wrapper .navbar-container .nav-right .user-profile i {
  font-size: 16.5px !important;
}
#language{
  margin:5px !important;
}
</style>
<script type="text/javascript">
  allignment="{{$selected_language->alignment}}";
  baseURL="";
  var advance;
  var advance1;
</script>
<script type="text/javascript">
  nFrom = "bottom";
  nAlign = "center";
  nIcons = "$(this).attr('data-icon')";
  nType = "inverse";
  nAnimIn = $(this).attr('data-animation-in');
  nAnimOut = $(this).attr('data-animation-out');

  var advance;
  var advance1;
</script>

<script type="text/javascript" src="{{asset('files/assets/js/customDataTable.js')}}" ></script>
<script src="{{asset('files/assets/pages/data-table/js/data-table.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/jquery/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/daterangepicker-master/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('files/bower_components/daterangepicker-master/daterangepicker.js')}}"></script>
</head>
<body>
 @php
 $current_date=date('Y-m-d');
 @endphp
 <div class="loader-bg">
  <div class="loader-bar"></div>
</div>
@if(Auth::user())

   <!-- for not expired user -->
   <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      @include('layouts.header')
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          @include('layouts.admin-menu')
          <div class="pcoded-content" id="pcoded-content">
            @inject('super', 'App\Http\Controllers\Controller')
            @yield('content')
            @include('layouts.admin-footer')
          </div>
        </div>
      </div>
    </div>
  </div>

  @endif
  
  @include('layouts.postLab')


</body>
</html>