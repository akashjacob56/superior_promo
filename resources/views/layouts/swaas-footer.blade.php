 <style type="text/css">
   .button-footer-font{
    background: #000;
    border-radius: 0px;
   }
 </style>
 <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
				<a href="#" class="mouse-icon">
					<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
				</a>
			</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <img src="{{asset('swaas/images/footer-logo.png')}}">
              <p class=" mt-3">
              	SWAAS ENTERPRISES PRIVATE LIMITED<br>
              	2/316 Kungumapalayam Pirivu,
              	Naranapuram Post,<br>
				Palladam 641664
				Tamilnadu, INDIA</p>   
				<div class="newletter-form-wrapper" style="color:#000;"> <i class="far fa-envelope"></i> <a href="mailto:care@swaaslife.com" style="color:#000;">care@swaaslife.com </a></div> 
				<div class="newletter-form-wrapper" style="color:#000;"> <i class="fas fa-mobile-alt"></i> <a href="tel:9597155255" style="color:#000;">+91 95 97 155 255</a></div>           
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">QUICK LINKS</h2>
              <ul class="list-unstyled">
                <li><a href="{{$base_url}}/about" class="py-2 d-block">About us</a></li>
                <!-- <li><a href="{{$base_url}}/support" class="py-2 d-block">Customer support</a></li> -->
                <li><a href="{{$base_url}}/contact" class="py-2 d-block">Contact us</a></li> 
                <li><a href="{{$base_url}}/media-press" class="py-2 d-block">Media and Press</a></li>
                <li><a href="{{$base_url}}/cards-gifts" class="py-2 d-block">Cards and gift set</a></li>
                <li><a href="{{$base_url}}/sales-offers" class="py-2 d-block">Sale & Offers</a></li>

              </ul>
            </div>
          </div>
          <div class="col-md-2">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Legal</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="{{$base_url}}/privacy-policy" class="py-2 d-block">Privacy Policy</a></li>
	                <li><a href="{{$base_url}}/terms-conditions" class="py-2 d-block">Terms of Use</a></li> 
	                 <li><a href="{{$base_url}}/return-policy" class="py-2 d-block">Return policy</a></li> 
	                <li><a href="{{$base_url}}/faq" class="py-2 d-block">FAQ's</a></li>  
	              </ul> 
	            </div>
            </div>
          </div>
          <div class="col-md-4">
              <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">@lang("navigation.newsletter")</h2>
                <p class="widget-newsletter-content mb-0">@lang("navigation.subscribe_to_our_latest_newsletter")</p>
        <form method="post" action="{{$base_url}}/subscription">
         <input type="hidden" name="_token" value="{{csrf_token()}}">
         <div class="footer-submit-wrapper d-flex">
          <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="news_letter_email" placeholder="@lang('order.email')" size="40">
          <button type="submit" class="btn btn-dark button-footer-font btn-sm">@lang("navigation.subscribe")</button>
        </div>
      </form>
    </div>
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Follow US</h2>
            	<div class="block-23 mb-3">
	              <ul class="ftco-footer-social d-flex list-unstyled float-md-left float-lft">
	                <li class="ftco-animate"><a href="https://twitter.com/swaas_life" target="_blank"><span class="icon-twitter"></span></a></li>
	                <li class="ftco-animate"><a href="https://www.facebook.com/SwaasLife/" target="_blank"><span class="icon-facebook"></span></a></li>
	                <li class="ftco-animate"><a href="https://wa.me/919597155255" target="_blank"><span class="fab fa-whatsapp"></span></a></li>
	                <li class="ftco-animate"><a href="https://www.instagram.com/swaas.life/" target="_blank"><span class="fab fa-instagram"></span></a></li>
	                <li class="ftco-animate"><a href="https://www.linkedin.com/company/swaaslife/" target="_blank"><span class="fab fa-linkedin"></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-left">

            <p>© 2020 Swaas is the Registered brand of BKS. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>