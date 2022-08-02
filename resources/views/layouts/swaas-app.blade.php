<!DOCTYPE html>
<html lang="en">
<head>
  @if(isset($title) && $title!="" )
  <title>{{ $title }}</title>
  @else
  <title>Swaas Life</title>
  @endif
  <meta name="keywords" content="@hasSection('keyworddescription')@yield('keyworddescription')@else Swaas Life, Swaas Care, Swaas 247, Swaas One @endif">
  <meta name="description" content="@hasSection('description')@yield('description')@else Swaas is a premium home and lifestyle brand that takes great care of its designs & quality and through its sustainable practices it also deeply cares for the environment. For we at Swaas believe, today sustainability is not a mere luxury, its a basic need! @endif">
  @if(isset($title))
  <h1 style="display: none;">{{$title}}</h1>
  @else
   <h1 style="display: none;">Swaas Life</h1>
  @endif
  <meta charset="utf-8">
  <link rel="icon" href="/swaas/images/logo.png" type="image/x-icon"/>
  <link rel="shortcut icon" href="/swaas/images/logo.png" type="image/x-icon"/>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('swaas/css/fontawesome-all.min.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/open-iconic-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/animate.css')}}">

  <link rel="stylesheet" href="{{asset('swaas/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/magnific-popup.css')}}">

  <link rel="stylesheet" href="{{asset('swaas/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('swaas/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('swaas/css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/jquery.timepicker.css')}}">


  <link rel="stylesheet" href="{{asset('swaas/css/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/icomoon.css')}}">
  <link rel="stylesheet" href="{{asset('swaas/css/style.css')}}">
  <script src="{{asset('swaas/js/jquery.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('swaas/css/fontawesome-all.min.css')}}">

  <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css'>
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
  <link href="{{asset('swaas/css/toastr.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{asset('swaas/js/toastr.js')}}"></script>



  <style type="text/css">
@media only screen and (min-width: 768px){
.ftco-section {
padding: 3em 0 !important; 
}

}

    @media only screen and (max-width: 767px){
    .mobile-hide{
      display: none !important; 
    }
    .px-3 {
padding-right: 0.5rem !important;
padding-left: 0.5rem !important;

}
.topper {
    font-size: 13px !important;
}
.products-grid.two-columns:not(.carousel-ul) .item {
       padding: 0 6px !important;
   }
    .float-right{
      width: auto !important;
    }
    .mobile-topper{
      margin-bottom: 0px !important;
    }
a.navbar-brand.logo img {
    width: 100px; 
}
.sidebar-box-2 { 
margin-bottom: 10px;
}
.shop__sidebar__accordion .card-heading a{
font-size:13px !important;
font-weight:600 !important;
}
.refresh-button{font-size:13px !important;
}
.product .text .bottom-area a.add-to-cart {
    border: 1px solid #809d87 !important;
}
.product .text .bottom-area a.buy-now{
border: 1px solid #809d87 !important;

}
  }
 @media only screen and (min-width: 768px){
  .desktop-hide{
    display: none !important; 
  }
}
    .notifyjs-bootstrap-success {
      color: white !important;
      background-color: #809d87 !important;
      border-radius: 0 !important;
    }
    .toast-success{
      color: white !important;
      background-color: #809d87 !important;
      border-radius: 0 !important;
      opacity: 1 !important;
      padding: 10px 10px 10px 50px !important;
    }
    .fixedsocialbar #collapseExample li:first-child a {
    background: #aec6cf;
}
.fixedsocialbar #collapseExample li:nth-child(2) a {
    background: #fdfd96;
}
.fixedsocialbar #collapseExample li:nth-child(3) a {
    background: #77dd77;
}

.fixedsocialbar #collapseExample li:nth-child(4) a {
    background: #ff6961;
}
@media only screen and (max-width: 1024px){
.table {
     min-width: 100px !important; 
    width: 100%;
    text-align: center;
}
}
ol.breadcrumb{
  background-color: #f8f9fa;
}
.breadcrumb-item a{
  color: #6c757d !important;
}
  </style>
</head>
<body class="goto-here">
  <div class="py-2 bg-black">
   <div class="container">
    <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
     <div class="col-lg-12 d-block">
      <div class="row d-flex">
       <div class="col-md pr-3 d-flex topper align-items-center mobile-topper">
        <a href="tel:+919597155255" class="d-flex">
          <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
          <span class="text">+91 95 97 155 255</span>
        </a>
           <a href="/cart" class="nav-link desktop-hide float-right"><span class="icon-shopping_cart cart-count desktop-hide"></span>[<span id="mobile_cart_count"></span>]</a>
        <a href="/wishlist" class="nav-link desktop-hide float-right"><span class="icon-heart desktop-hide"></span></a>
      </div>

      <div class="col-md pr-3 d-flex topper align-items-center  mobile-hide">
        <a href="mailto:info@swaaslife.com" class="d-flex">
          <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
          <span class="text">care@swaaslife.com</span>
        </a>
      </div>
      <div class="col-md-6 pr-4 d-flex topper align-items-center text-lg-right  mobile-hide">
        <!-- <span class="text">3-5 Business days delivery &amp; Free Returns</span> -->
         <marquee class="text">Due to lockdown restrictions, orders might be slightly delayed.</marquee>
        <ul class="head-footer-social d-flex list-unstyled">
         <li><a href="https://twitter.com/swaas_life" target="_blank"><span class="icon-twitter"></span></a></li>
         <li><a href="https://www.facebook.com/SwaasLife/" target="_blank"><span class="icon-facebook"></span></a></li>
         <li><a href="https://wa.me/919597155255" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
         <li><a href="https://www.instagram.com/swaas.life/" target="_blank"><span class="fab fa-instagram"></span></a></li>
         <li><a href="https://www.linkedin.com/company/swaaslife/" target="_blank"><span class="fab fa-linkedin"></span></a></li>
       </ul>
     </div>
   </div>
 </div>
</div>
</div>
</div>
@include('layouts.swaas-header')
<div class="icon-bar fixedsocialbar"> 
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><img src="{{asset('swaas/images/menu.png')}}"></a>
  <div class="collapse" id="collapseExample">
   <ul>
    <li><a class="dropdown-item" title="BedSheet" href="/collection/bedsheets-all"><img src="/swaas/images/bed.png"></a></li>
    <li> <a class="dropdown-item" title="Quilt" href="/collection/quilts"><img src="/swaas/images/quilt.png"></a></li>
    <li><a class="dropdown-item" title="Pillow" href="/collection/pillow-covers"><img src="/swaas/images/pillow.png"></a> </li>
    <li><a class="dropdown-item" title="Mask" href="/collection/protective-mask"><img src="/swaas/images/mask.png"></a> </li>
  </ul>
</div>
</div>
@yield('content')
@include('layouts.swaas-footer')
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script>
  @if(Session::has('message'))
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "100000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  toastr.success("{{ Session::get('message') }}");

  {{Session::flush()}}
  @endif
</script>
<script src="{{asset('swaas/js/notify.min.js')}}"></script>
<script type="text/javascript">
  $.notify.defaults({ className: "success" });
</script>
<script src="{{asset('swaas/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('swaas/js/popper.min.js')}}"></script>
<script src="{{asset('swaas/js/bootstrap.min.js')}}"></script>
<script src="{{asset('swaas/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('swaas/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('swaas/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('swaas/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('swaas/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('swaas/js/aos.js')}}"></script>
<script src="{{asset('swaas/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('swaas/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('swaas/js/scrollax.min.js')}}"></script>
<script src="{{asset('swaas/js/main.js')}}"></script>

<script src="{{asset('swaas/js/jquery.nicescroll.min.js')}}"></script>

<script src='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js'></script>
<script src="{{asset('swaas/js/zoomsl.js')}}"></script>
<script type="text/javascript">

  baseURL="";


</script>
<script type="text/javascript">
  $(".nice-scroll").niceScroll({
    cursorcolor: "#0d0d0d",
    cursorwidth: "5px",
    background: "#e5e5e5",
    cursorborder: "",
    autohidemode: true,
    horizrailenabled: false
  });


  $(document).ready(function(){

    $(".add-to-cart").click( function( event ) {
      sku_id=$(this).attr('id');

      
      quantity=1;


      $.ajax({
        type: "post",
        url: "/postAddToCart",
        data: {'sku_id':sku_id,'quantity':quantity},
        dataType: 'json',
        cache: false,
        success: function (result) {
          $.notify(result.data.msg);
          $.ajax({
            type: "post",
            url: "/wdeleteWishlist",
            data: {'sku_id':sku_id},
            dataType: 'json',
            cache: false,
            success: function (result) {
              if(result.data.wishlists_count<=0){
                $("#wishlist-empty").removeClass("hidden");
                $("#wishlist-block").addClass("hidden");
              }
              $("#product_"+sku_id).remove();
              $("#cart_count").text(result.data.data.cart_count);
              $("#mobile_cart_count").text(result.data.data.cart_count);

            },
            error: function (error) {
              console.log(error);
            }
          });
        },
        error: function (error) {
          console.log(error);
        }
      });
    });
    $('.add-wishlist').click(function(){
     sku_id=$(this).attr('id');
     click_source=1; 

     var app_color='FF0000';


     $.ajax({
      type: "post",
      url: "/waddToWishlist",
      data: { "_token": "{{ csrf_token() }}",'sku_id':sku_id,'click_source':click_source},
      success: function (result) {
        if(result.status=="true"){
          $(".wishlist").css("color","#"+app_color+"");

        }else{
          $(".wishlist").css("color","black");
        }
        $.notify(result.data.msg);
      },
      error: function (xhr, textStatus, errorThrown) {

        alert(textStatus + ':' + errorThrown); 
      }
    });

   });
    cart_count="{{$cart_count}}";
    $('#cart_count').text(cart_count);
    $("#mobile_cart_count").text(cart_count);
    $('[data-toggle="tooltip"]').tooltip();
    $(".zoom").imagezoomsl({
      zoomrange: [4, 4]
    });

    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav',
      autoplay: false
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',

    });

    var quantitiy=0;
    $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined

            $('#quantity').val(quantity + 1);


                // Increment

              });

    $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined

                // Increment
                if(quantity>0){
                  $('#quantity').val(quantity - 1);
                }
              });

  }); 

 
</script> 

</body>
</html>