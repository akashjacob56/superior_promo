@php
$menu_count=0;
$location_menu=0;
$pos_items=0;

@endphp

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar no-print">

 <div class="main-menu-header">
  <center>
    <a href="/admin/home">

        <img class="logo-image" style="height: 35px !important;width: 200px;" src="/storage/app/logo.png" alt="">


    </a>
</center>
<div class="user-details">
    <hr>
</div>
</div>


<div class="pcoded-inner-navbar main-menu">
    @if(Auth::user())
    @if($role_id!=3)

    <ul class="pcoded-item pcoded-left-item">

        @if($my_permissions->contains(config('permissions.HOME')))
        <li>
            <a href="/admin/home" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-home"></i>
                </span>
                <span class="pcoded-mtext">Home</span>
            </a>
        </li>
        @endif  


<li>
            <a href="/admin/analytics/dashboard" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="feather icon-home"></i>
                </span>
                <span class="pcoded-mtext">Dashboard</span>
            </a>
        </li>

        <!-- @if($my_permissions->contains(config('permissions.ORDERS')))

            @if($my_permissions->contains(config('permissions.ORDER_ALL')) || $my_permissions->contains(config('permissions.ORDER_SELLER')))
                <li>
                    <a href="/admin/order/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                        <i class="feather icon-home"></i>
                    </span>
                        <span class="pcoded-mtext">All Orders</span>
                    </a>
                </li>
            @endif

            <li>
                    <a href="/admin/order/all-reorder" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                        <i class="feather icon-home"></i>
                    </span>
                        <span class="pcoded-mtext">All Re-Orders</span>
                    </a>
                </li>

            <li>
                    <a href="/admin/production/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                    <i class="feather icon-home"></i>
                </span>
                        <span class="pcoded-mtext">Production Stage</span>
                    </a>
                </li>

        @endif -->

        @if($my_permissions->contains(config('permissions.ORDERS')))
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="icon-basket-loaded"></i></span>
                <span class="pcoded-mtext">Orders</span>
            </a>



            <ul class="pcoded-submenu">
                 

                @if($my_permissions->contains(config('permissions.ORDER_ALL')) || $my_permissions->contains(config('permissions.ORDER_SELLER')))
                <li>
                    <a href="/admin/order/all" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">All Orders</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="/admin/order/all-reorder" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                        <i class="feather icon-home"></i>
                    </span>
                        <span class="pcoded-mtext">All Re-Orders</span>
                    </a>
                </li>

                

                
            </ul>
        </li>
        @endif

<!-- 
        @if($my_permissions->contains(config('permissions.USER_MANAGEMENT')))

        @if($my_permissions->contains(config('permissions.CUSTOMERS')))
              <li>
                <a href="/admin/customer/all-Active" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">Active Customers</span>
                </a>
            </li>
            <li>
                <a href="/admin/customer/all-InActive" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">InActive Customers</span>
                </a>
            </li>
            @endif

<li>
    <a href="/admin/role/all" class="waves-effect waves-dark {{++$menu_count}}">
        <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
        <span class="pcoded-mtext">Roles</span>
    </a>
</li>

        @endif -->


        

            @if($my_permissions->contains(config('permissions.CUSTOMERS')))
            <li>
                <a href="/admin/customer/all-Active" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">Customers</span>
                </a>
            </li>
             @endif

        <!-- Customer Data Start -->
        
       <!--  <li class="pcoded-hasmenu" id="user-management">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                  <i class="icon-user-follow"></i>
              </span>
              <span class="pcoded-mtext">Customers</span>
          </a>
          <ul class="pcoded-submenu">
              @if($my_permissions->contains(config('permissions.CUSTOMERS')))
              <li>
                <a href="/admin/customer/all-Active" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">Active Customers</span>
                </a>
            </li>
            <li>
                <a href="/admin/customer/all-InActive" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">InActive Customers</span>
                </a>
            </li>
            @endif

            <li>
                <a href="/admin/role/all" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-mtext">Roles</span>
                </a>
            </li>



            </ul>
            </li> -->
            
         <!-- Customer Data End -->


            

              
                    <!-- <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                          <i class="fa fa-product-hunt" aria-hidden="true"></i>
                      </span>
                      <span class="pcoded-mtext">Products</span>
                  </a> -->
                  

                        @if($my_permissions->contains(config('permissions.PRODUCT_ALL')))
                        <li>

                            <a href="/admin/product/all" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                          <i class="fa fa-product-hunt" aria-hidden="true"></i>
                      </span>
                                <span class="pcoded-mtext">Products</span>
                            </a>
                        </li>
                        @endif



                        



                        



                    



             @if($my_permissions->contains(config('permissions.VENDOR_ALL')))
                <li>
                <a href="/admin/vendor/all-vendor" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">Vendors</span>
                </a>
            </li>
            @endif

            







                        <li>
                    <a href="/admin/categories/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                          <i class="icon-user-follow"></i>
                      </span>
                        <span class="pcoded-mtext">Categories</span>
                    </a>
                </li>
   
              
                <!-- @if($my_permissions->contains(config('permissions.CATEGORIES')))
                
                 <li class="pcoded-hasmenu" id="all-categories">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                          <i class="icon-user-follow"></i>
                      </span>
                      <span class="pcoded-mtext">Categories</span>
                  </a>
                  <ul class="pcoded-submenu">




                <li>
                    <a href="/admin/categories/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="icon-grid"></i>
                        </span>
                        <span class="pcoded-mtext">All Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sub-category/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="icon-grid"></i>
                        </span>
                        <span class="pcoded-mtext">Sub Categories</span>
                    </a>
                </li>

            </ul>
        </li>
                @endif
 -->
               

                

                

           

        <!-- @if($my_permissions->contains(config('permissions.PRODUCTS')))
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                <span class="pcoded-mtext">Products</span>
            </a>
            <ul class="pcoded-submenu">



                @if($my_permissions->contains(config('permissions.PRODUCT_ALL')))
                <li>
                    <a href="/admin/product/all" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">All products</span>
                    </a>
                </li>
                @endif


              
                @if($my_permissions->contains(config('permissions.CATEGORIES')))
               

                <li>
                    <a href="/admin/categories/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="icon-grid"></i>
                        </span>
                        <span class="pcoded-mtext">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/sub-category/all" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="icon-grid"></i>
                        </span>
                        <span class="pcoded-mtext">Sub Categories</span>
                    </a>
                </li>
                @endif

               

                @if($my_permissions->contains(config('permissions.RETURN_POLICY')))  

                <li>
                    <a href="/admin/returnpolicy/all" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Return Policy</span>
                    </a>
                </li>
                @endif

                

            </ul>
        </li>
        @endif -->



        





  @if($my_permissions->contains('DASHBOARD'))
 @php
$getuser=Auth::user();
$role_id=$getuser->role_id;
@endphp
 @if($role_id!=5 && $role_id!=6)
       <!--  <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                    <i class="icon-chart"></i>
                </span>
                <span class="pcoded-mtext">Analytics</span>
            </a>
            <ul class="pcoded-submenu">

                @if($my_permissions->contains('DASHBOARD'))
                <li>
                    <a href="/admin/dashboard" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="icon-chart"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
         
                @endif
            </ul>
        </li> -->
@endif

        @endif

                



       <!--  <li class="pcoded-hasmenu" id="user-management">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-micon">
                  <i class="icon-user-follow"></i>
              </span>
              <span class="pcoded-mtext">Vendor Management</span>
          </a>
          <ul class="pcoded-submenu">
              <li>
                <a href="/admin/vendor/all-vendor" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                        <i class="icon-people"></i>
                    </span>
                    <span class="pcoded-mtext">Vendors</span>
                </a>
            </li>
        </ul>
      </li> -->



<!-- @if($my_permissions->contains(config('permissions.MANAGE_LOCATION')))

<li class="pcoded-hasmenu" id="manage-location">
    <a href="javascript:void(0)" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="icon-location-pin"></i>
        </span>
        <span class="pcoded-mtext">Manage Location</span>
    </a>
    <ul class="pcoded-submenu">

       @if($my_permissions->contains(config('permissions.COUNTRY')))
       <li>
        <a href="/admin/country/all" class="waves-effect waves-dark {{++$location_menu}}">
            <span class="pcoded-mtext">Countries</span>
        </a>
    </li>
    @endif

    @if($my_permissions->contains(config('permissions.STATE')))
    <li>
        <a href="/admin/state/all" class="waves-effect waves-dark {{++$location_menu}}">
            <span class="pcoded-mtext">States</span>
        </a>
    </li>
    @endif

    @if($my_permissions->contains(config('permissions.CITY')))
    <li>
        <a href="/admin/city/all" class="waves-effect waves-dark {{++$location_menu}}">
            <span class="pcoded-mtext">Cities</span>
        </a>
    </li>
    @endif 

        
    @if($my_permissions->contains(config('permissions.PINCODE')))
    <li>
        <a href="/admin/pincode/all" class="waves-effect waves-dark {{++$location_menu}}">
            <span class="pcoded-micon">
                <i class="fa fa-neuter "></i>
            </span>
            <span class="pcoded-mtext">Pincodes</span>
        </a>
    </li>
    @endif


  
        
</ul>

</li>

@endif -->



<!-- @if($my_permissions->contains(config('permissions.ORDER_ALL')))
<li class="pcoded-hasmenu" id="manage-location">
    <a href="javascript:void(0)" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="feather icon-package"></i>
        </span>
        <span class="pcoded-mtext">Product Enquiry</span>
    </a>
    <ul class="pcoded-submenu">

       @if($my_permissions->contains(config('permissions.ORDER_ALL')))
       <li>
        <a href="/admin/allProductEnquiry" class="waves-effect waves-dark">
            <span class="pcoded-mtext">All Product Enquiry</span>
        </a>
    </li>
    @endif
</ul>

</li>
@endif -->

    @if($my_permissions->contains(config('permissions.SETTING')))
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark" >
            <span class="pcoded-micon">
                <i class="icon-settings"></i>
            </span>
            <span class="pcoded-mtext">Front End <br><span style="margin-left: 32px;">Static Pages</span></span>
        </a>
        <ul class="pcoded-submenu">


            @if($my_permissions->contains(config('permissions.GUARANTEE')))
            <li>
                <a href="/admin/guarantee/all-guarantee" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-percent"></i>
                    </span>
                    <span class="pcoded-mtext">Our Guarantee</span>
                </a>
            </li>
            @endif



            @if($my_permissions->contains(config('permissions.PRODUCT_SAMPLE')))
            <li>
                <a href="/admin/productsample" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-percent"></i>
                    </span>
                    <span class="pcoded-mtext">Product Samples</span>
                </a>
            </li>
            @endif



            @if($my_permissions->contains(config('permissions.ABOUTUS_ADD')))
            <li>
                <a href="/admin/aboutus" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-sliders"></i>
                    </span>
                    <span class="pcoded-mtext">About US</span>
                </a>
            </li>
            @endif


            @if($my_permissions->contains(config('permissions.CONTACT_US')))
            <li>
                <a href="/admin/contactus/contactus-master" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-sliders"></i>
                    </span>
                    <span class="pcoded-mtext">Contact US</span>
                </a>
            </li>
            @endif



            @if($my_permissions->contains(config('permissions.ART_WORK')))
                <li>
                    <a href="/admin/art-work" classs="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-percent"></i>
                        </span>
                        <span class="pcoded-mtext">Art Requirements</span>
                    </a>
                </li>
            @endif

            @if($my_permissions->contains(config('permissions.ORDER_PROCESS')))
            <li>
                <a href="/admin/order-process/all" classs="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-percent"></i>
                    </span>
                    <span class="pcoded-mtext">Order Process Guide</span>
                </a>
            </li>
            @endif




  <!--           <li>
                <a href="/admin/homeimages" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-sliders"></i>
                    </span>
                    <span class="pcoded-mtext">Home Images</span>
                </a>
            </li>
 -->


<!-- 
            @if($my_permissions->contains(config('permissions.ABOUTUS_ADD')))
            <li>
                <a href="/admin/faq" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-sliders"></i>
                    </span>
                    <span class="pcoded-mtext">FAQ</span>
                </a>
            </li>
            @endif -->


<!--             @if($my_permissions->contains(config('permissions.ABOUTUS_ADD')))
            <li>
                <a href="/admin/review/all" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-edit"></i>
                    </span>
                    <span class="pcoded-mtext">All Reviews</span>
                </a>
            </li>
            @endif -->
             @if($my_permissions->contains(config('permissions.TERM_CONDITION_ALL')))
            <li>
                <a href="/admin/policy" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-sliders"></i>
                    </span>
                    <span class="pcoded-mtext">Privacy Policy</span>
                </a>
            </li>
            @endif

            @if($my_permissions->contains(config('permissions.TERM_CONDITION_ALL')))
            <li>
                <a href="/admin/termconditions" class="waves-effect waves-dark">
                    <span class="pcoded-micon">
                        <i class="fa fa-sliders"></i>
                    </span>
                    <span class="pcoded-mtext">Terms & Condition</span>
                </a>
            </li>
            @endif


            @if($my_permissions->contains(config('permissions.RETURN_POLICY')))  

                        <li>
                            <a href="/admin/returnpolicy/all" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="icon-grid"></i>
                                </span>
                                <span class="pcoded-mtext">Return Policy</span>
                            </a>
                        </li>
                        @endif

                        @if($my_permissions->contains(config('permissions.OFFER_BLOCK')))
<li>
    <a href="/admin/slider/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="fa fa-percent"></i>
        </span>
        <span class="pcoded-mtext">Slider</span>
    </a>
</li>
@endif

@if($my_permissions->contains(config('permissions.OFFER_BLOCK')))
<li>
    <a href="/admin/offerblock/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="fa fa-percent"></i>
        </span>
        <span class="pcoded-mtext">Offer Blocks</span>
    </a>
</li>
@endif

            


<!-- @if($my_permissions->contains(config('permissions.OFFER_BLOCK')))
<li>
    <a href="/admin/slider/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="fa fa-percent"></i>
        </span>
        <span class="pcoded-mtext">Slider</span>
    </a>
</li>
@endif -->

<!-- @if($my_permissions->contains(config('permissions.OFFER_BLOCK')))
<li>
    <a href="/admin/offerblock/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="fa fa-percent"></i>
        </span>
        <span class="pcoded-mtext">Offer Blocks</span>
    </a>
</li>
@endif -->











<!-- @if($my_permissions->contains(config('permissions.CATEGORIES')))
<li>
    <a href="/admin/blog/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="icon-grid"></i>
        </span>
        <span class="pcoded-mtext">Media Press</span>
    </a>
</li>
@endif -->

<!-- @if($my_permissions->contains(config('permissions.CATEGORIES')))
<li>
    <a href="/admin/discount/all" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Discounts</span>
    </a>
</li>
@endif -->




<!-- @if($my_permissions->contains(config('permissions.CONTACT_US')))
<li>
    <a href="/admin/contact/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
           <i class="icon-phone"></i>
       </span>
       <span class="pcoded-mtext">Contact enquiry</span>
   </a>
</li>
@endif -->
<!-- @if($my_permissions->contains(config('permissions.CONTACT_US')))
<li>
    <a href="/admin/newsletter/all" class="waves-effect waves-dark">
        <span class="pcoded-micon">
           <i class="icon-phone"></i>
       </span>
       <span class="pcoded-mtext">NewsLetter</span>
   </a>
</li>
@endif -->

<!-- @if($my_permissions->contains(config('permissions.COMPLAINTS')) )
<li>
    <a href="/admin/complaint/all" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Complaints</span>
    </a>
</li>
@endif

@if($my_permissions->contains(config('permissions.COMPLAINTS')) )
<li>
    <a href="/admin/setting/shipping" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Shipping</span>
    </a>
</li>
@endif -->

</ul>
</li>
@endif








    @if($my_permissions->contains(config('permissions.SETTING')))
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark" >
            <span class="pcoded-micon">
                <i class="icon-settings"></i>
            </span>
            <span class="pcoded-mtext">
                Front End<br> <span style="margin-left: 32px;">Dynamic Section</span>
            </span>
        </a>
        <ul class="pcoded-submenu">


            <li>
    <a href="javascript:void(0);" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Front Page Management</span>
    </a>
</li>

<li>
    <a href="javascript:void(0);" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Product Page Upsell Section</span>
    </a>
</li>

<li>
    <a href="javascript:void(0);" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Filter Management</span>
    </a>
</li>










@if($my_permissions->contains(config('permissions.CATEGORIES')))
<!-- <li>
    <a href="/admin/discount/all" class="waves-effect waves-dark">
        <span class="pcoded-mtext">Discounts</span>
    </a>
</li> -->
@endif



</ul>
</li>
@endif

<li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark" >
            <span class="pcoded-micon">
                <i class="icon-settings"></i>
            </span>
            <span class="pcoded-mtext">
                Dynamic Sections
            </span>
        </a>
        <ul class="pcoded-submenu">
            <li>
                    <a href="javascript:void(0);" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Tax Status</span>
                    </a>
                </li>

           @if($my_permissions->contains(config('permissions.APPAREL')))

            
                        <li>
                        <a href="/admin/apparel/apparel-all" class="waves-effect waves-dark {{++$menu_count}}">
                                <span class="pcoded-micon">
                                    <i class="icon-people"></i>
                                </span>
                                <span class="pcoded-mtext">Size Groups</span>
                            </a>
                        </li>
                        @endif

            @if($my_permissions->contains(config('permissions.COLOR')))
                <li>
                    <a href="/admin/color/all-color" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Colors</span>
                    </a>
                </li>
            @endif


            <li>
                    <a href="/admin/production/all" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Production Stage</span>
                    </a>
                </li>


                <li>
                    <a href="/admin/discount/all" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Discounts</span>
                    </a>
                </li>



        </ul>
</li>

<li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark" >
            <span class="pcoded-micon">
                <i class="icon-settings"></i>
            </span>
            <span class="pcoded-mtext">
                Site Settings Admin
            </span>
        </a>

        <ul class="pcoded-submenu">
            <li>

                <a href="javascript:void(0);" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
              </span>
                    <span class="pcoded-mtext">Email Setting</span>
                </a>
            </li>

            <li>

                <a href="javascript:void(0);" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
              </span>
                    <span class="pcoded-mtext">Shipping Setting</span>
                </a>
            </li>

            <li>

                <a href="javascript:void(0);" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
              </span>
                    <span class="pcoded-mtext">Administration</span>
                </a>
            </li>


            @if($my_permissions->contains(config('permissions.BLOG')))
            <li>
                <a href="/admin/blog/all" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
                  </span>
                    <span class="pcoded-mtext">Blog</span> 
                </a>
            </li>
            @endif


        <li>

                <a href="/admin/role/all" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
              </span>
                    <span class="pcoded-mtext">Roles</span>
                </a>
            </li>
        </ul>
        <!-- <ul class="pcoded-submenu">

            <li>
                <a href="/admin/discount/all" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Discounts</span>
                </a>
            </li>

        </ul> -->
</li>



<li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark" >
            <span class="pcoded-micon">
                <i class="icon-settings"></i>
            </span>
            <span class="pcoded-mtext">
                Marketing Data
            </span>
        </a>

        <ul class="pcoded-submenu">
        <li>

                <a href="javascript:void(0);" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
              </span>
                    <span class="pcoded-mtext">Google Shopping</span>
                </a>
            </li>

            <li>

                <a href="javascript:void(0);" class="waves-effect waves-dark {{++$menu_count}}">
                    <span class="pcoded-micon">
                  <!-- <i class="icon-user-follow"></i> -->
                  <i class="icon-settings"></i>
              </span>
                    <span class="pcoded-mtext">Sales Data</span>
                </a>
            </li>
        </ul>
        <!-- <ul class="pcoded-submenu">

            <li>
                <a href="/admin/discount/all" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Discounts</span>
                </a>
            </li>

        </ul> -->
</li>





<!-- @if($my_permissions->contains(config('permissions.REPORT')))
<li class="pcoded-hasmenu ">
    <a href="javascript:void(0)" class="waves-effect waves-dark">
        <span class="pcoded-micon">
            <i class="icon-book-open"></i>
        </span>
        <span class="pcoded-mtext">Report</span>
    </a>
    <ul class="pcoded-submenu">
        <li class="pcoded-hasmenu ">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Sale</span>
            </a>
            <ul class="pcoded-submenu">
             @if($my_permissions->contains(config('permissions.ALL_PRODUCT_REPORT')))
             <li class="">
                <a href="/admin/reports/sale/product" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Product</span>
                </a>
            </li>
            @endif

    
            @if($my_permissions->contains(config('permissions.ALL_SKU_REPORT')))
            <li class="">
                <a href="/admin/reports/sale/sku" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Sku</span>
                </a>
            </li>
            @endif
    
            @if($my_permissions->contains(config('permissions.ALL_CUSTOMER_REPORT')))
            <li class="">
                <a href="/admin/reports/sale/customer" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Customer</span>
                </a>
            </li>
            @endif
        </ul>
    </li>

    @if($my_permissions->contains(config('permissions.ALL_CART_REPORT')))
    <li class="">
        <a href="/admin/reports/cart" class="waves-effect waves-dark">
            <span class="pcoded-mtext">Cart</span>
        </a>
    </li>
    @endif

    @if($my_permissions->contains(config('permissions.ALL_WISHLIST_REPORT')))
    <li class="">
        <a href="/admin/reports/wishlist" class="waves-effect waves-dark">
            <span class="pcoded-mtext">Wishlist</span>
        </a>
    </li>
    @endif


    @if($my_permissions->contains(config('permissions.ALL_ORDER_REPORT')))
    <li class="">
        <a href="/admin/reports/order" class="waves-effect waves-dark">
            <span class="pcoded-mtext">Order</span>
        </a>
    </li>
    @endif
   

    
     @if($my_permissions->contains(config('permissions.ORDER_ALL')))
    <li>
        <a href="/admin/order/logs" class="waves-effect waves-dark">
            <span class="pcoded-mtext">Order Logs</span>
        </a>
    </li>
    @endif
    @if($my_permissions->contains(config('permissions.ALL_ORDER_REPORT')))
    <li>
        <a href="/admin/reports/transactions" class="waves-effect waves-dark">
            <span class="pcoded-mtext">Transaction</span>
        </a>
    </li>
    @endif
</ul>
</li>
@endif -->

</ul>
@endif

@endif
</div>
</nav>
<script type="text/javascript">
    user_menu_count={{$menu_count}};
    location_menu={{$location_menu}};



    if(user_menu_count==0){
        $('#user-management').css('display','none');
    }

    if(location_menu==0){
        $('#manage-location').css('display','none');
    }


</script>
