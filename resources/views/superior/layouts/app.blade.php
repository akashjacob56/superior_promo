 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="vshopy">
  <meta name="google-site-verification" content="" />
  <link rel="icon" href="/storage/app/" type="image/x-icon"/>
  <link rel="shortcut icon" href="/storage/app/" type="image/x-icon"/>
  @if(isset($title) && $title!="" )
  <title>{{ $title }}</title>

  @endif
  <meta name="keywords" content="@hasSection('keyworddescription')@yield('keyworddescription')@endif">
  <meta name="description" content="@hasSection('description')@yield('description')@endif">
  @if(isset($title))
  <h1 style="display: none;">{{$title}}</h1>
  
  @endif
 

  <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700,800' ] }
    };
    (function(d) {
      var wf = d.createElement('script'), s = d.scripts[0];
      wf.src = '/resources/views/superior/assets/js/webfont.js';
      wf.async = true;
      s.parentNode.insertBefore(wf, s);
    })(document);
  </script>

  <!-- Plugins CSS File -->
  <link rel="stylesheet" href="{{asset('resources/views/superior/assets\css\bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('files/assets/pages/notification/notification.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/toaster.css')}}">
  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{asset('resources/views/superior/assets/css/style.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('resources/views/superior/assets\vendor\fontawesome-free\css\all.min.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<script>

    window.__lc = window.__lc || {};

    window.__lc.license = 14224737;

    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))

</script>

<noscript><a href="https://www.livechat.com/chat-with/14224737/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>

  <div class="page-wrapper">
<!--     <div class="top-notice bg-primary text-white">
      <div class="container text-center">
        <h5 class="d-inline-block mb-0 mr-2">Get Up to <b>40% OFF</b> New-Season Styles</h5>
        <a href="category.html" class="category">MEN</a>
        <a href="category.html" class="category ml-2 mr-3">WOMEN</a>
        <small>* Limited time only</small>
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
      </div>
    </div> -->





  <link rel="stylesheet" type="text/css" href="{{asset('files/assets/pages/notification/notification.css')}}">

  

     <!-- Style.css -->
     <link rel="stylesheet" type="text/css" href="{{asset('files/assets/css/fonts.css')}}" media="all">

<script src="{{asset('resources/views/superior/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/views/superior/assets/js/notify.min.js')}}"></script>

     @include('superior.layouts.css')
      @include('flash::message')

     <style type="text/css">
     p {
    margin-bottom: 1rem;
}
.menu>li>a.sf-with-ul:after {
right:5% !important;
}

    @media only screen and (max-width: 1479px) and (min-width: 1270px){
.container {
    max-width: 1260px !important;
    padding: 0 10px;
}
}

@media only screen and (max-width: 1679px) and (min-width: 1480px){
.container {
    max-width: 1420px !important;
    padding: 0 10px;
}
}

@media only screen and (max-width: 1919px) and (min-width: 1680px){
.container {
    max-width: 1600px !important;
    padding: 0 10px;
}
}

@media only screen and (max-width: 2400px) and (min-width: 1920px){
.container {
    max-width: 1810px !important;
    padding: 0 10px;
}
}

      .form-control:focus{
        box-shadow: 0 !important;
      }
      body {

        font-family:"Roboto" !important;


      }

      .product-default{
        border:1px solid #ddd !important;
        padding: 10px;
      }

      .header-navbar .navbar-wrapper .navbar-container .nav-right .user-profile i {
        font-size: 16.5px !important;
      } 
      .category-content{
        text-align: center !important;
      }

              @media only screen and (max-width: 1599px) and (min-width: 1500px){
      #new_arrival {
        height: 230px !important;
      }
    }

    @media only screen and (max-width: 1599px) and (min-width: 1500px){
      #max_view_products {
        height: 292px !important;
      }
    }
    @media only screen and (max-width: 1399px) and (min-width: 767px){
     #new_arrival {
      height: 230px !important;
    }
  }


  @media only screen and (max-width: 1399px) and (min-width: 767px){
    #max_view_products {
      height: 300px !important;
    }
  }

  @media only screen and (max-width: 1499px) and (min-width: 1400px){
   #new_arrival {
    height: 220px !important;
  }
}

@media only screen and (max-width: 1499px) and (min-width: 1400px){
  #max_view_products {
    height: 292px !important;
  }
}


@media only screen and (max-width: 1799px) and (min-width: 1600px){
  #new_arrival {
    height: 230px !important;
  }
}


@media only screen and (max-width: 1799px) and (min-width: 1600px){
  #max_view_products {
    height: 312px !important;
  }
}



@media only screen and (max-width: 1999px) and (min-width: 1800px){
  #new_arrival {
    height: 230px !important;
  }
}

@media only screen and (max-width: 1999px) and (min-width: 1800px){
  #max_view_products {
    height: 342px !important;
  }
}



@media only screen and (max-width: 2099px) and (min-width: 2000px){
  #new_arrival {
    height: 170px !important;
  }
}


@media only screen and (max-width: 2099px) and (min-width: 2000px){
  #max_view_products {
    height: 352px !important;
  }
}


@media only screen and (max-width: 2499px) and (min-width: 2200px){
  #new_arrival {
    height: 230px !important;
  }
}

@media only screen and (max-width: 2499px) and (min-width: 2200px){
  #max_view_products {
    height: 362px !important;
  }
}


@media only screen and (min-width: 3000px){
  #new_arrival {
    height: 300px !important;
  }
}


@media only screen and (min-width: 3000px){
  #max_view_products {
    height: 430px !important;
  }
}

@media only screen and (max-width: 767px){

  #new_arrival {
    height: 190px !important;
  }
}

@media only screen and (max-width: 767px){
  #max_view_products {
    height: 190px !important;
  }
}


      @media only screen and (max-width: 1599px) and (min-width: 1500px){

        .product-image {
          max-height: 292px !important;
        }
      }
      @media only screen and (max-width: 1599px) and (min-width: 1500px){
        .new-arrival {
          max-height: 280px !important;
        }
      }

      @media only screen and (max-width: 1399px) and (min-width: 767px){
        .new-arrival {
          max-height: 270px !important;
        }
      }

      @media only screen and (max-width: 1399px) and (min-width: 767px){
        .product-image {
          max-height: 300px !important;
        }
      }

      @media only screen and (max-width: 1499px) and (min-width: 1400px){
        .new-arrival {
          max-height: 280px !important;
        }
      }
      @media only screen and (max-width: 1499px) and (min-width: 1400px){
        .product-image {
          max-height: 292px !important;
        }
      }


      @media only screen and (max-width: 1799px) and (min-width: 1600px){
        .new-arrival {
          max-height: 290px !important;
        }
      }
      @media only screen and (max-width: 1799px) and (min-width: 1600px){
        .product-image {
          max-height: 312px !important;
        }
      }



      @media only screen and (max-width: 1999px) and (min-width: 1800px){
        .new-arrival {
          max-height: 372px !important;
        }
      }
      @media only screen and (max-width: 1999px) and (min-width: 1800px){
        .product-image {
          max-height: 342px !important;
        }
      }



      @media only screen and (max-width: 2099px) and (min-width: 2000px){
        .new-arrival {
          max-height: 412px !important;
        }
      }
      @media only screen and (max-width: 2099px) and (min-width: 2000px){
        .product-image {
          max-height: 352px !important;
        }
      }


      @media only screen and (max-width: 2499px) and (min-width: 2200px){
        .new-arrival {
          max-height: 310px !important;
        }
      }
      @media only screen and (max-width: 2499px) and (min-width: 2200px){
        .product-image {
          max-height: 362px !important;
        }
      }


      @media only screen and (min-width: 3000px){
        .new-arrival {
          max-height: 400px !important;
        }
      }
      @media only screen and (min-width: 3000px){
        .product-image {
          max-height: 400px !important;
        }
      }



      @media only screen and (max-width: 767px){

        .product-image {
          max-height: 190px !important;
        }
      }
      @media only screen and (max-width: 767px){
        .new-arrival {
          max-height: 130px !important;
        }
     .product-list {
          flex: 0 0 99% !important;
          max-width: 99% !important;
          margin-right: 4px;
          margin-left: 4px;
          border: none !important;
        }

      }
    .loading-overlay{
      display: none !important;
    }


.error-msg{
    width: 100%;
    margin-top: .25rem;
    font-size: .875em;
    color: #dc3545;
}


.zoomContainer{
    display: none;
}


 
   /*for checkbox*/

/*   input[type=checkbox] {
    box-sizing: border-box;
    padding: 0;
    background-color: white;
    border-radius: 50%;
    vertical-align: middle;
    border: 1px solid #777777;
    -webkit-appearance: none;
    outline: none;
    cursor: pointer;
    width: 16px;
    height: 16px;
}*/


/*input[type=checkbox]:checked {
    background-color: #68BEE5;
    border: solid 1px #68BEE5;
}

input[type=checkbox]:checked {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='2' fill='%23fff'/%3e%3c/svg%3e");
}*/


    

    </style>

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

  </head>

  <body>
    @php
    $current_date=date('Y-m-d');
    @endphp
    <div class="se-pre-con"></div>


    <div class="loader-bg">
      <div class="loader-bar"></div>
    </div>
    <div class="page-wrapper">



    <!-- for guest user -->

    @include('superior.layouts.header')

    @inject('super', 'App\Http\Controllers\Controller')
    
    @yield('content')
    @include('superior.layouts.footer')



</div>


    


   <script type="text/javascript">
    $(document).ajaxStart(function () {
      $(".se-pre-con").fadeIn("slow");;
    }).ajaxStop(function () {
      $(".se-pre-con").fadeOut("slow");;
    });
  </script>



  <div>
    <div class="se-pre-con">
      <div class="loader">
      </div>
    </div>
  <!-- <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a> -->

  <!-- Plugins JS File -->

  
  <script src="{{asset('resources/views/superior/assets\js\bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('resources/views/superior/assets\js\optional\isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('resources/views/superior/assets\js\plugins.min.js')}}"></script>
  <script src="{{asset('resources/views/superior/assets\js\nouislider.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('resources/views/superior/assets\js\main.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('files/assets/js/bootstrap-growl.min.js')}}" ></script>

     <script type="text/javascript" src="{{asset('assets/js/toastr.js')}}" ></script>
      <script type="text/javascript" src="{{asset('assets/js/notify.min.js')}}" ></script>

   <script>
       @if(Session::has('message'))
       var type = "{{ Session::get('alert-type', 'info') }}";
       switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
      }
      @endif
    </script>
    <!-- <script src="{{asset('assets/js/button-flash.js')}}"></script> -->
  </div>
</body>

</html>