 <!DOCTYPE html>
 <html lang="en">
 <head>
  @include('layouts.preLab')
</head>
<body>
  @php
  $current_date=date('Y-m-d');
  @endphp
  <div class="loader-bg">
    <div class="loader-bar"></div>
  </div>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      @include('layouts.header')
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
          @include('layouts.menu')
          <div class="pcoded-content" id="pcoded-content">
            @inject('super', 'App\Http\Controllers\Controller')
            @if(Auth::user())
            
            @yield('content')
            @include('layouts.footer')
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('flash::message')
  @include('layouts.postLab')
</body>
</html>