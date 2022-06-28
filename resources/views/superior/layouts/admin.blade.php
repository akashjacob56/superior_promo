<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.preLab')
  <body>
    <div class="loader-bg">
      <div class="loader-bar"></div>
    </div>
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
    @include('flash::message')
    @include('layouts.postLab')
  </body>
  </html>