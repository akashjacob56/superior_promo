 <!DOCTYPE html>
 <html lang="en">
 <head>

  @include('layouts.preLab')
</head>
<body>
  <div class="loader-bg">
    <div class="loader-bar"></div>
  </div>
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <!--Start of Tawk.to Script-->
      @php
      use Carbon\Carbon;
      @endphp

      <!--End of Tawk.to Script-->
      <!-- [ Header ] start -->
      <style type="text/css">
        .header-navbar .navbar-wrapper .navbar-container .nav-right .user-profile i {
          margin-left: 4px !important;
        }
        a.class:hover {
         background-color: inherit !important;
       }

       @media only screen and (max-width: 576px){
         .pcoded .header-navbar .navbar-wrapper .navbar-container .header-notification .show-notification, .pcoded .header-navbar .navbar-wrapper .navbar-container .header-notification .profile-notification {
          min-width: 240px !important;
        }
        .search-keyword-header{
          width: 100px !important;
        }
      }
      .show-notification li img, .header-navbar .navbar-wrapper .navbar-container .header-notification .profile-notification li img {

        height: 40px;
      }

      @media only screen and (min-width: 576px) and (max-width: 5760px){
        .search-keyword-header{
          width: 350px !important;
        }
      }
    </style>
    <nav class="navbar header-navbar pcoded-header no-print" style="direction: ltr;">
      <div class="navbar-wrapper">
        <div class="navbar-logo">
          <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
            <i class="feather icon-toggle-right"></i>
          </a>

          <a class="mobile-options waves-effect waves-light">
            <i class="feather icon-more-horizontal"></i>
          </a>
        </div>

        <div class="navbar-container container-fluid">

                </div>
              </div>
            </nav>

            <!-- google_analytics_code -->
            <script async src="https://www.googletagmanager.com/gtag/js?id="></script>

            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', '');
            </script>

 
            <div class="pcoded-main-container">
              <div class="pcoded-wrapper">

                  @inject('super', 'App\Http\Controllers\Controller')
                  @yield('content')

              </div>
            </div>
          </div>
        </div>
        @include('flash::message')
        @include('layouts.postLab')
      </body>
      </html>