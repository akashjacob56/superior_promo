<style type="text/css">
 .footer .contact-info-label {
  display: block;
  color: #fff;
  font-weight: 400;
  text-transform: uppercase;
  margin-bottom: 3px;
}

.footer{
  background-color: #f7f7f7;
}

#scroll-top {
    height: 40px;
    position: static;
    right: 15px;
    width: 40px;
    z-index: 9999;
    /* bottom: 0; */
    background-color: #43494e;
    font-size: 16px;
    color: #fff;
    text-align: center;
    line-height: 1;
    padding: 11px 0;
    visibility: hidden;
    opacity: 0;
    border-radius: 0 0 0 0;
    transition: all .3s, margin-right 0s;
    -webkit-transform: translateY(40px);
    transform: translateY(40px);
}
.footer-top { 
    padding: 0.8rem 0; 
    background-color:#597B9A !important;
}


.text-white-bck{
    color: #FFFFFF;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    text-align: center;
    cursor: pointer;
    margin-top: 10px;
    margin-bottom: 10px;
}

.txt-f-welcome{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
}

.footer-p{
    font-family: Roboto;
    font-style: normal;
    font-weight: 300;
    font-size: 14px;
    line-height: 16px;
}


.footer-middle {
    padding-top: 4rem;
    border-top: 1px solid #e7e7e7;
}

.footer-middle-footer{
    padding-top: 2rem;
    border-top: 1px solid #e7e7e7;
}


footer .widget .widget-title {
    margin-bottom: 1.5rem;
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    display: flex;
    align-items: center;
    letter-spacing: -0.017em;
}

footer .widget a {
    color: #777;
    font-size: 1.3rem;
    font-family: Roboto;
    font-style: normal;
    font-weight: 300;
    font-size: 12px;
    line-height: 14px;
    align-items: center;
    letter-spacing: -0.017em;
}

.f-txt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
}

.f-link-txt {
    font-family: Roboto;
    font-style: normal;
    font-weight: 300;
    font-size: 12px;
    line-height: 14px;
    align-items: center;
    letter-spacing: -0.017em;
    border-right: 1px solid;
    padding-right: 15px;
}


.f-link{
    font-family: Roboto;
    font-style: normal;
    font-weight: 300;
    font-size: 12px;
    line-height: 14px;
    align-items: center;
    letter-spacing: -0.017em;
}

.fustxt{
    font-family: Roboto;
    font-style: normal;
    font-weight: 300;
    font-size: 18px;
    line-height: 21px;
    align-items: center;
    letter-spacing: -0.017em;
}


.widget-new
{
  margin-left: 91px;
}

</style>

<footer class="footer">
  <div class="footer-top">
    <a id="scroll-top" href="javascript:void(0);" title="Top" role="button">
      <div class="container">
        <div class="col-sm-12" style="text-align: center;">
            <h3 class="text-white-bck">Back To Top</h3>
        </div>
      </div>
    </a>
</div>

<div class="" style="padding-top: 2rem !important;">
  <div class="container footer-p">
   <!-- <img src="/storage/app/logo.png" alt="Logo" style="width:220px;"> -->
   <h4 class="txt-f-welcome">Welcome To Superior Promos</h4>
   @php

   $aboutus_translation="";
   if($about->aboutus_translation!="")
   {
     $aboutus_translation=$about->aboutus_translation;
   }else
   {
     $aboutus_translation=$about->default_aboutus_translation;
   }

   $string=$aboutus_translation->about_us_description;
   @endphp
   <p class=""><?php echo $string; ?></p>
 </div>
</div>



<div class="">
  <div class="container footer-middle">
    <div class="row">
      <div class="col-lg-3 col-sm-6" style="border-right: 1px solid #ddd;">
        <div class="widget ">
          <h4 class="widget-title">Customer Services</h4>

          <ul class="links">
           
           <li><a href="/contact">Contact Us</a></li>
           <li><a href="/art-work">Artwork Requirement</a></li>
           <li><a href="/rus-services">Rush Service</a></li>
           <!-- <li><a href="/profile">@lang("navigation.my_account")</a></li> -->
         </ul>
       </div><!-- End .widget -->
     </div><!-- End .col-lg-3 -->

     <div class="col-lg-3 col-sm-6" style="border-right: 1px solid #ddd;">
      <div class="widget widget-new">
        <h4 class="widget-title">Shopping Help</h4>

        <ul class="links">
         <li><a href="/order-process">Order Process</a></li>
         <li><a href="/product-sample">Product Samples</a></li>
         <li><a href="/shipdelivery">Shipping & Delivery</a></li>
         <li><a href="/currunt-promotion">Current Promotion</a></li>
        <!--  <li><a href="/blogs">@lang("navigation.blogs")</a></li>
         <li><a href="/privacy-policy">@lang("navigation.privacy")</a></li>
         <li><a href="/terms-conditions">@lang("navigation.terms_and_conditions")</a></li> -->
         
       </ul>
     </div><!-- End .widget -->
   </div><!-- End .col-lg-3 -->
   <div class="col-lg-3 col-sm-6" style="border-right: 1px solid #ddd;">
    <div class="widget widget-new">
      <h4 class="widget-title">Company Info</h4>

      <ul class="links">
       <li><a href="/about">About Us</a></li>
       <li><a href="/our-guarantee">Our Guarantee</a></li>
       <li><a href="/privacy-policy">Privacy Policy</a></li>
       <li><a href="/terms-conditions">Terms & Conditions</a></li>
     </ul>
   </div><!-- End .widget -->
 </div><!-- End .col-lg-3 -->


  <div class="col-lg-3 col-sm-6">
    <div class="widget widget-new">
      <h4 class="widget-title">Tools & Resources</h4>
      <ul class="links">
       <li><a href="#">Site Map</a></li>
       <li><a href="/blogs">Promotional Blog</a></li>
       <li><a href="#">Case Studies</a></li>
       <!-- <li><a href="/profile">Terms & Conditions</a></li> -->
     </ul>
   </div><!-- End .widget -->
 </div><!-- End .col-lg-3 -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- End .footer-middle -->

<div class="pt-5">
  <div class="container footer-middle-footer">
   <div class="row">

     <div class="col-md-5">
     <h4 class="f-txt">superiorpromos.com Rated 4.8/5 Based on 5,018 Reviews </h4>
     </div>

<div class="col-md-4">
   <img src="/resources/views/superior/assets/images/card.png" alt="Logo">
 </div>

<div class="col-md-3">
  <div class="row"> 
   <div class="col-md-5">
    <h4 class="fustxt">Follow Us:</h4>
    </div>
   <div class="col-md-7">
   <div class="row">
     <div class="col">
      <a href="https://www.facebook.com/superiorpromos" target="_blank">
      <img src="/resources/views/superior/assets/images/facebook.png" alt="Logo"/>
      </a>
     </div>
    <div class="col">
      <a href="https://www.pinterest.com/promoItem/" target="_blank">
     <img src="/resources/views/superior/assets/images/pinterest.png" alt="Logo"/>
     </a>
    </div>
     <div class="col">
      <a href="https://twitter.com/superior_promos" target="_blank">
      <img src="/resources/views/superior/assets/images/twitter.png" alt="Logo"/>
      </a>
     </div>
   </div>
   </div>
  </div>
 </div>     

   </div>
 </div>
</div>

<div class="">
  <div class="container footer-middle-footer" style="text-align: center;">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-7">
        <div class="d-flex justify-content-between align-items-center flex-wrap">

         <a href="#"><p class="f-link-txt">Promotional Products</p></a>
         <a href="#"><p class="f-link-txt">Promotional Products</p></a>
         <a href="#"><p class="f-link-txt">Promotional Products</p></a>
         <a href="#"><p class="f-link-txt">Promotional Products</p></a>
         <a href="#"><p class="f-link-txt border-0">Promotional Products</p></a>
         
       </div>
       
     </div><!-- End .footer-bottom -->
   </div>
 </div>
</div>

<div class="container-fluid" style="background-color: #ddd;padding:10px 0px;">
  <div class=" col-sm-12" style="text-align: center;">
    <p class="footer-copyright py-3 pr-4 mb-0 f-link">&copy; {{ date('Y') }}Superior Promos Inc..</p>
  </div><!-- End .footer-bottom -->
</div><!-- End .container -->
</footer><!-- End .footer -->
</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
  <div class="mobile-menu-wrapper">
    <span class="mobile-menu-close"><i class="icon-retweet"></i></span>
    <nav class="mobile-nav">
      <ul class="mobile-menu">


        @if(count($menu_categories)>0)
        @foreach($menu_categories as $category)

        @php
        $category_translation=$category->category_translation;

        if($category_translation==""){
        $category_translation=$category->default_category_translation;    
      }


      @endphp

      @if(count($category->child_categories)>0)
      <li>
        
       <a href="/collection/{{$category_translation->category->category_url}}" > {{$category_translation->category_name}}</a>
       
       <ul>

         @foreach($category->child_categories as $child_category)

         @php
         $child_category_translation=$child_category->category->category_translation;

         if($child_category_translation==""){
         $child_category_translation=$child_category->category->default_category_translation;    
       }
       @endphp

       @if(count($child_category->sub_child_categories)>0)  

       <li>
         
        <a href="/collection/{{$child_category_translation->category->category_url}}">{{$child_category_translation->category_name}}</a>
        
        <ul>
         @foreach($child_category->sub_child_categories as $sub_child_category)
         @php
         $sub_child_category_translation=$sub_child_category->category->category_translation;
         if($sub_child_category_translation==""){
         $sub_child_category_translation=$sub_child_category->category->default_category_translation;    
       }
       @endphp
       <li> 
        <a href="/collection/{{$sub_child_category->category->category_url}}">{{$sub_child_category_translation->category_name}}</a>
      </li>
      @endforeach
    </ul>
  </li>
  @else
  <li>
    <a href="/collection/{{$child_category->category->category_url}}">
      {{$child_category_translation->category_name}}
    </a>
  </li>
  @endif
  @endforeach
</ul>
</li>
@endif
<li>

  <a href="/collection/{{$category->category_url}}">
    {{$category_translation->category_name}}
  </a>

</li>


@endforeach

@endif

@if($category_count>4)
<li>
 
  <a href="/collection">
    @lang("navigation.more")
  </a>
  
</li> 
@endif



@php
$length="";
$length=count($new_sections);
@endphp

@if($length>0)
@foreach($new_sections as $new_section)
@php  
$item="";

if($new_section->section_translation!=""){
$new_section_translation=$new_section->section_translation;
}else{
$new_section_translation=$new_section->default_section_translation;
}
@endphp

<li><a href="/products?min=&max=&category_id=&brand=&variant=&section={{$new_section->section_id}}&page=1&sort_by=&keyword=" class="px-4">{{$new_section_translation->section_name}}!<span class="tip tip-new tip-top">New</span></a></li>
@endforeach
@endif


</ul>

<ul class="mobile-menu">
 
 <li><a href="/about">@lang("navigation.about_us")</a></li>

 <li><a href="/contact">@lang("navigation.contact_us")</a></li>

 <li><a href="/faq">@lang("navigation.faq")</a></li>

 <li><a href="/blogs">@lang("navigation.blogs")</a></li>
</ul>
</nav><!-- End .mobile-nav -->

<div class="social-icons">

 <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
 
 <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>

 <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
 

 <a href="#" class="social-icon social-linkedin icon-linkedin" target="_blank"></a>

 <a href="#" class="social-icon social-youtube icon-youtube" target="_blank"></a>

</div><!-- End .social-icons -->
</div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->


