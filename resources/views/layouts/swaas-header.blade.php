<style type="text/css">
  .ftco-navbar-light.scrolled .nav-item.active > a {
    color: #000000 !important;
}
.hidden{
  display: none;
}
.form-control-search {
    height: 35px !important;
    background: #fff !important;
    color: #000000 !important;
    font-size: 12px;
    border-radius: 18px;
  
}
  .section-margin{
    padding-bottom: 4%;
    padding-top: 4%;
  }
.search-navlink{
  padding-top: 1rem !important;
}
.ftco-navbar-light .navbar-nav > .nav-item > .nav-link {

padding-left: 7px;
    padding-right: 7px;

}

.form-control.form-control-search{
  height: 35px !important;
}


.ftco-navbar-light.scrolled .search-navlink{
   padding-top: 0.5rem !important;
   padding-bottom: 0.45rem !important;
}
.header-search-wrapper{
  display: inline-flex;
}
.search-btn{
  font-size: 0.7rem;
}
.ftco-navbar-light.scrolled .nav-item.cta > .search-navlink{
  color: #fff !important;
    background: #809d87 !important;
    border: none !important;

}
.navbar-expand-lg > .container, .navbar-expand-lg > .container-fluid {
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.ftco-navbar-light.scrolled {

    margin-top: -3px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container" >
        <div class="col-md-12" style="display: inline-flex;">
          <div class="col-md-6">
	      <a class="navbar-brand logo" href="">
	      	<img src="{{asset('swaas/images/logo.png')}}">
	      </a>
      </div>
        <div class="col-md-6">
         <form action="/searchProducts" id="search-form" method="post" class="nav-link search-navlink" style="float: right;width: 100%;">
          <div class="header-search-wrapper" style="width: 100%;">
            <input type="search" class="form-control form-control-search"  id="q" placeholder="Search"  name="keyword">

            <button class="btn btn-primary search-btn" type="submit"><span class="icon-search"></span></button>
          </div><!-- End .header-search-wrapper -->
        </form>
      </div>
      </div>
      
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
 <div class="col-md-12">
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="" class="nav-link">Home</a></li>
            <li class="nav-item active"><a href="/about" class="nav-link">About Us</a></li>
	        <!--   <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About us</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="">Demo 1</a> 
                <a class="dropdown-item" href="">Demo 2</a>
              </div>
            </li> -->
                   @if(count($menu_categories)>0)
       @foreach($menu_categories as $category)

       @php
       $category_translation=$category->category_translation;

       if($category_translation==""){
       $category_translation=$category->default_category_translation;    
     }


     @endphp
              @if(count($category->child_categories)>0)
    
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$category_translation->category_name}}</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                              @foreach($category->child_categories as $child_category)
                     @if($child_category->category!="")
                  @php
                  $child_category_translation=$child_category->category->category_translation;

                  if($child_category_translation==""){
                  $child_category_translation=$child_category->category->default_category_translation;    
                }
                @endphp
              	<a class="dropdown-item" href="/collection/{{$child_category_translation->category->category_url}}">{{$child_category_translation->category_name}}</a>
                @endif
 
@endforeach

               
              </div>
            </li>
            
             <!--  <li class="nav-item active"><a href="/collection/{{$category->category_url}}" class="nav-link">{{$category_translation->category_name}}</a></li>  -->
            @endif
            @endforeach
            @endif


		
	
	          <li class="nav-item cta cta-colored"><a href="/cart" class="nav-link"><span class="icon-shopping_cart cart-count"></span>[<span id="cart_count"></span>]</a></li>
			  <li class="nav-item cta cta-colored"><a href="/wishlist" class="nav-link"><span class="icon-heart"></span></a></li>
                  @if(Auth::user())
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user" style="margin-right: 3px;"></span></a>
             <div class="dropdown-menu" aria-labelledby="dropdown04">
             
               
                @if($role_id!=3)
               
                  <a class="dropdown-item" href="/admin/home">
                    @lang("navigation.switch_to_admin")
                  </a>
               
                @endif        
               
                  <a class="dropdown-item" href="/profile">
                    @lang("user.profile")
                  </a>
               
                  <a class="dropdown-item" href="/orders">
                    @lang("navigation.my_orders")
                  </a>
                

                
               
                  <a class="dropdown-item" href="/wishlist">
                    @lang("navigation.my_wishlist")
                  </a>
                
                

                
                  <a class="dropdown-item" href="/changePassword">
                    @lang("user.change_password")
                  </a>
               
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" id="logout-button"> <i class="icon-power"></i> @lang("navigation.logout") </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                
              
            </div>
          </li>

          @else
			  <li class="nav-item cta cta-colored"><a href="/login" class="nav-link"><span class="icon-user" style="margin-right: 3px;"></span>Login/Register</a></li>
        @endif
			  

	        </ul>
	      </div>
      </div>
	    </div>
	  </nav>
    <!-- END nav -->