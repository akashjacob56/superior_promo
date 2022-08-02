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
.ftco-navbar-light.scrolled .nav-item.active > a {
    color: #fde9e0 !important;
}
</style>
  
<nav class="navbar header-navbar pcoded-header no-print" style="direction: ltr;">
  <div class="navbar-wrapper">
    <div class="navbar-logo">
      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
        <i class="feather icon-toggle-right"></i>
      </a>
      <a href="">
       
        <h4 style="font-size: 1.25rem !important;">Superior Promos</h4>
       
      </a>      
      <a class="mobile-options waves-effect waves-light">
        <i class="feather icon-more-horizontal"></i>
      </a>
    </div>

    <div class="navbar-container container-fluid">

      <ul class="nav-right">



  @if(Auth::user())
<li class="header-notification">
  <div class="dropdown-primary">
    <a href="/admin/complaint/all">Support
      <i class="fa fa-headphones"></i></a>
      
      @if( Auth::user())
      @if($complaint_count>0  )
      <span class="badge bg-c-red" id="notification_count">{{$complaint_count}} </span>
      @else
      <span class="badge bg-c-red" id="notification_count"></span>
      @endif
      @endif
    
  
    </div>
  </li>

  <li class="user-profile header-notification">
    <div class="dropdown-primary dropdown">
      <div class="dropdown-toggle" data-toggle="dropdown">
        <img src="/files/assets/images/icon.png" class="img-radius" alt="">
        <span>{{Auth::user()->name}}</span>
        <i class="fa fa-sort-desc m-l-5"></i>
      </div>
      <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

@if($role_id!=3)
<li>
  <a href="/admin/home">
    <i class="feather icon-log-out"></i> @lang("navigation.switch_to_admin")
  </a>
</li>

<li>
  <a href="">
    <i class="feather icon-log-out"></i> @lang("navigation.switch_to_website")
  </a>
</li>

@endif        
<li>
  <a href="/profile">
    <i class="fa fa-user-o" aria-hidden="true"></i> @lang("user.profile")
  </a>
</li>
<li>
  <a href="/orders">
   <i class="icon-basket-loaded"></i> @lang("navigation.my_orders")
 </a>
</li>

 
<li>
  <a href="/wishlist">
    <i class="fa fa-heart-o"></i> @lang("navigation.my_wishlist")
  </a>
</li>



<li>
  <a href="/changePassword">
    <i class="icon-lock"></i> @lang("user.change_password")
  </a>
</li>


<li>
  <a class="apply-now-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
  document.getElementById('logout-form').submit();" id="logout-button"> <i class="icon-power"></i> @lang("navigation.logout") </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
</li>
</ul>
</div>
</li>
@else
<li class="header-notification">
  <a href="/login" class="waves-effect waves-light">
    @lang("user.login") & @lang("user.sign_up")
  </a>
</li>
@endif
</ul>
</div>
</div>
</nav>

<!-- google_analytics_code -->
<script src="{{asset('swaas/js/notify.min.js')}}"></script>
<script type="text/javascript">
  $.notify.defaults({ className: "success" });
</script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '');
</script>

