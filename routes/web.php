<?php
/*Website*/
/*mahesh start 12jan2022*/


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    // return what you want
});



Route::get('register/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');


Route::get('register/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

/*Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');*/
Route::post('savedcarts/single','PublicController@PostSavedCartsSingle');

Route::get('bigmailer_list_content',"WebServiceController@bigmailer_list_content");

Route::get('bigmailintegration','WebServiceController@bigmailintegration');
Route::get('bigmailer_list_field','WebServiceController@bigmailer_list_field');
Route::get('bigmailer_list_message_type','WebServiceController@list_message_type');
Route::get('bigmailer_list_users','WebServiceController@bigmailer_list_users');
Route::get('bigmailer_transactional_email','WebServiceController@bigmailer_transactional_email');
Route::get('bigmailer_list_brands','WebServiceController@bigmailer_list_brands');




Route::post('admin/order/all1','OrderController@getAll');

Route::get('/blogs','PublicController@getBlog');

Route::get('/blog/{url}','PublicController@getBlogDetails');

Route::post('searchbar-view','PublicController@SearchBarHeader');

Route::get('edit-cartitem','PublicController@getEditCartItem');

Route::post('getall-country','PublicController@getlocationsCountry');

Route::post('getall-country-checkout', 'PublicController@getlocationsCountryCheckout');



Route::get('remove-discount', 'PublicController@removeCartDiscount');

Route::post('user-checkout-login','PublicController@postUserLoginChekout');

Route::post('registeruser-checkout','PublicController@postRegisterNewUserChekout');

Route::post('matched-suboption-quantity','PublicController@PostSuboptionQuantity');
Route::get('delete/main-option/{id}','ProductController@deleteProductOption');
Route::get('delete/product-suboption/{id}','ProductController@deleteProductSubOption');
Route::get('delete/suboption/subcount/{id}','ProductController@deleteProductSubOptionCount');



Route::post('discount-cart','PublicController@PostCartDiscount');

Route::post('subscription-email','PublicController@PostSubscribeEmail');
Route::post('savedcarts','PublicController@PostSavedCarts');


Route::post('checkout', 'PublicController@getCheckout');
Route::get('success', 'PublicController@getSuccess');

Route::post('reorder', 'PublicController@postReorder');
Route::post('imprint-option-select', 'PublicController@postImprintOptionSelect');

Route::get('cartremove/{id}', 'PublicController@cartremove');
Route::get('cart_remove_header/{id}','PublicController@cartRemoveHeader');
Route::post('reorder-request/reorder','PublicController@postReorderRequest');

Route::post('my-acc/profile/contact-info','PublicController@postMyAccProfileContactInfo');
Route::post('my-acc/profile/change-password','PublicController@postMyAccProfileChangePassword');
Route::post('my-acc/profile/update-email','PublicController@postMyAccProfileUpdateEmail');

Route::post('my-acc/search-order-history','PublicController@getMyAccSearchOrderHistory');
Route::post('my-acc/select-order-history-days','PublicController@getMyAccSelectOrderHistoryDays');

Route::post('my-acc/reorder-request/exactly-same-content-change-no','PublicController@postReorderRequestExactlySameContentChangeNo');


Route::get('order-process','PublicController@getOrderProcess');
Route::get('product-sample','PublicController@getProductSample');

Route::get('editaddress', 'PublicController@getEditAddress');

Route::get('orderconfirmation', 'PublicController@getOrderConfirmation');

Route::post('registeruser', 'PublicController@postRegisterNewUser');

Route::get('rus-services', 'PublicController@getRusServices');

Route::get('our-guarantee','PublicController@getOurGuarantee');

Route::get('art-work', 'PublicController@getArtWork');

Route::get('currunt-promotion', 'PublicController@getCurruntPromotoin');

Route::post('order/shipp/edit/{id}','PublicController@postOrderShippInformation');
Route::post('order/bill/edit/{id}','PublicController@postOrderBillInformation');

/*cartdata*/
Route::post('cart-data', 'PublicController@PostCartData');

Route::post('matched-quantity','PublicController@getMatchQuantity');

Route::post('checkout-edit-address', 'PublicController@postEditAdress');

Route::post('checkout/addnew/address', 'PublicController@postNewAdress');

Route::post('delete/shipping/address', 'PublicController@DeleteShipAddress');

Route::post('checkout/addnew/billing/address', 'PublicController@postNewBillingAdress');

Route::post('delete/billing/address', 'PublicController@DeleteBillingAddress');

Route::post('checkout/edit/billing/address', 'PublicController@postEditBillingAdress');

Route::post('checkout/used/billing/address', 'PublicController@postUsedBillingAdress');

Route::post('checkout/used/billing/address_zero', 'PublicController@postUsedBillingAdressZero');

Route::post('place/order', 'PublicController@postOrder');


//new
Route::post('/my-acc/bill-address/add','PublicController@postMyAccBillAddressAdd');
Route::post('/my-acc/shipp-address/add','PublicController@postMyAccShippAddressAdd');

Route::post('/my-acc/shipp-address/edit','PublicController@postMyAccShipAddressEdit');
Route::post('/my-acc/bill-address/edit','PublicController@postMyAccBillAddressEdit');

Route::post('/my-acc/bill-address/delete','PublicController@postMyAccBillAddressDelete');
Route::post('/my-acc/shipp-address/delete','PublicController@postMyAccShippAddressDelete');

Route::post('/my-acc/shipp-address/make-default','PublicController@postMyAccShippAddressMakeDefault');

Route::get('/downloadArtProof','PublicController@postDownloadArtProofs');

// art prooof
Route::post('/my-acc/art-proof/approved','PublicController@postMyAccArtProofApproved');
Route::post('/my-acc/art-proof/declined','PublicController@postMyAccArtProofDeclined');

Route::get('shipdelivery','PublicController@ShipDilevery');
/* mahesh end 12jan2022*/

Route::get('/','PublicController@index');
Route::post('/wishlist/add','PublicController@postAddWishlist');

Route::post('pr/review', 'PublicController@postProductReview');
Route::get('product/{url}','PublicController@getProductDetails');
Route::get('return-policy','PublicController@getReturnPolicy');
Route::get('/about','PublicController@getAboutus');
Route::get('/faq','PublicController@getFaq');
Route::get('terms-conditions','PublicController@getTermsConditions');
Route::get('privacy-policy','PublicController@getPrivacyPolicy');

Route::get('cart', 'PublicController@getCart');
Route::get('404','PublicController@get404');

Route::get('contact','PublicController@getContact');
Route::post('contact','PublicController@postContact');

Route::get('checkout', 'PublicController@getCheckout');

Route::get('editaddress', 'PublicController@getEditAddress');

Route::get('orderconfirmation', 'PublicController@getOrderConfirmation');

Route::post('registeruser', 'PublicController@postRegisterNewUser');


Route::get('shop','PublicController@getshop');

//After mahesh start

//Route::get('my-account-profile','PublicController@getMyProfile');
Route::get('my-account-profile', ['middleware' => 'auth','uses' => 'PublicController@getMyProfile']);
//After mahesh end

Auth::routes();

Route::get('admin/login','AdminController@getAdminLogin');

//Product Controller data delete Product Price Delete
Route::get('productPriceDelete','ProductController@postProductPriceDelete');
Route::get('/deleteEditImprint','ProductController@getDeleteEditImprint');
/*start admin prefix*/
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){

//* Blog

Route::get('blog/add', ['middleware' =>'auth', 'uses' =>'BlogController@getAddBlog']);
Route::post('blog/add', ['middleware' =>'auth', 'uses' =>'BlogController@postAddBlog']);

Route::get('blog/all', ['middleware' =>'auth', 'uses' =>'BlogController@getAllBlog']);
Route::get('blog/allData', ['middleware' =>'auth', 'uses' =>'BlogController@getAllBlogData']);

Route::get('blog/inactive/{id}', ['middleware' =>'auth', 'uses' =>'BlogController@getDeleteBlog']);
Route::get('blog/active/{id}', ['middleware' =>'auth', 'uses' =>'BlogController@getActiveBlog']);

Route::get('blog/{id}', ['middleware' =>'auth', 'uses' =>'BlogController@getEditBlog']);
Route::post('blog/{id}', ['middleware' =>'auth', 'uses' =>'BlogController@postEditBlog']);


//productsamples
Route::group(['prefix' => 'productsample'], function(){
	Route::get('/', ['middleware' => 'auth','uses' => 'ProductSampleController@getProductSample']);
	Route::post('/', ['middleware' => 'auth','uses' => 'ProductSampleController@postProductSample']);

});

//order-process
Route::group(['prefix' => 'order-process'], function(){
	
	Route::get('all', ['middleware' => 'auth','uses' => 'OrderProcessController@getAllOrderProcess']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'OrderProcessController@postAllOrderProcessData']);

	Route::get('add', ['middleware' => 'auth','uses' => 'OrderProcessController@getAddOrderProcess']);
	Route::post('add', ['middleware' => 'auth','uses' => 'OrderProcessController@postAddOrderProcess']);

	Route::get('{id}', ['middleware' => 'auth','uses' => 'OrderProcessController@getUpdateOrderProcess']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'OrderProcessController@postUpdateOrderProcess']);

});

//art work front-end
Route::group(['prefix' => 'art-work'], function(){
	Route::get('/', ['middleware' => 'auth','uses' => 'ArtworkController@getArtWork']);
	Route::post('/', ['middleware' => 'auth','uses' => 'ArtworkController@postArtWork']);
});



//OfferBlock	
Route::group(['prefix' => 'offerblock'], function(){

	Route::get('add',['middleware'=> 'auth', 'uses' => 'OfferBlockController@getAddOfferBlock']);
	Route::post('add',['middleware'=> 'auth', 'uses' => 'OfferBlockController@postAddOfferBlock']);
	Route::get('all',['middleware'=> 'auth', 'uses' => 'OfferBlockController@getAllOfferBlock']);
	Route::get('allData',['middleware'=> 'auth', 'uses' => 'OfferBlockController@getAllOfferBlockData']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'OfferBlockController@getOfferBlock']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'OfferBlockController@postOfferBlock']);
	

});



// contact us
Route::get('newsletter/all',['middleware' => 'auth', 'uses' =>'AdminController@getAllNewsletter']);
Route::get('newsletter/allData',['middleware'=>'auth','uses'=>'AdminController@getAllNewsletterDetail']);
	
Route::get('/home','ReportController@getDashboard');




	Route::group(['prefix' => 'analytics'], function(){

	//  Dashboard
		Route::get('/dashboard','ReportController@getDashboard');

	//seller_dashboard
		
	});


//Redeem

// admin specific reports
Route::get('/home','ReportController@getReports');

Route::get('aboutus', ['middleware' => 'auth','uses' => 'AboutusController@getAboutus']);
Route::post('aboutus', ['middleware' => 'auth','uses' => 'AboutusController@postAboutus']);


Route::get('homeimages', ['middleware' => 'auth','uses' => 'AboutusController@getHomeAboutus']);
Route::post('homeimages', ['middleware' => 'auth','uses' => 'AboutusController@postHomeAboutus']);



Route::get('faq', ['middleware' => 'auth','uses' => 'AboutusController@getFaq']);
Route::post('faq', ['middleware' => 'auth','uses' => 'AboutusController@postFaq']);

/*Route::get('/', ['middleware' => 'auth', 'uses' => 'ReportController@getDashboard']);*/

Route::get('create-order/{id}', ['middleware' => 'auth','uses' => 'OrderController@getCreateOrder']);
/*Route::get('product-variant/{id}', ['middleware' => 'auth','uses' => 'OrderController@getCreateOrder']);*/

// contact us
Route::get('contact/all',['middleware' => 'auth', 'uses' =>'PublicController@getAllContactAll']);
Route::get('contact/allData',['middleware'=>'auth','uses'=>'PublicController@getAllContactUsDetail']);



// Return POlicy
Route::get('returnpolicy/all', ['middleware' => 'auth','uses' => 'ReturnPolicyController@getAllReturnPolicies']);

Route::get('returnpolicy/allData', ['middleware' => 'auth','uses' => 'ReturnPolicyController@getAllReturnPoliciesData']);

Route::get('returnpolicy/add', ['middleware' => 'auth','uses' => 'ReturnPolicyController@getReturnPolicy']);

Route::post('returnpolicy/add', ['middleware' => 'auth','uses' => 'ReturnPolicyController@postaddReturnPolicy']);

Route::get('returnpolicy/{id}', ['middleware' => 'auth','uses' => 'ReturnPolicyController@getReturnPolicyDetails']);

Route::post('returnpolicy/{id}', ['middleware' => 'auth','uses' => 'ReturnPolicyController@postReturnPolicyDetails']);

Route::get('returnpolicy/{id}/{language_code}', ['middleware' => 'auth','uses' => 'ReturnPolicyController@getReturnPolicyTranslation']);

Route::post('returnpolicy/{id}/{language_code}', ['middleware' => 'auth','uses' => 'ReturnPolicyController@postReturnPolicyTranslation']);


	//Role
Route::group(['prefix' => 'role'], function(){

	Route::get('add', ['middleware' => 'auth','uses' => 'RoleController@getAddRole']);
	Route::post('add', ['middleware' => 'auth','uses' => 'RoleController@postAddRole']);
	Route::get('all', ['middleware' => 'auth','uses' => 'RoleController@getAllRole']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'RoleController@getAllRoleData']);
	Route::post('removeRole', ['middleware' => 'auth','uses' => 'RoleController@postRemoveRole']);
	Route::post('changePermissionRole', ['middleware' => 'auth','uses' => 'RoleController@postChangePermissionRole']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'RoleController@getRole']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'RoleController@postRole']);

});


	//user
Route::get('user/add', ['middleware' => 'auth','uses' => 'UserController@getAddUser']);
Route::post('user/add', ['middleware' => 'auth','uses' => 'UserController@postAddUser']);
	// Route::get('user/all', ['middleware' => 'auth', 'uses' => 'UserController@getAllUser']);
	// Route::get('user/allData', ['middleware' => 'auth', 'uses' => 'UserController@getAllUserData']);
	// Route::get('user/{id}', ['middleware' => 'auth','uses' => 'UserController@getUser']);
	// Route::post('user/{id}', ['middleware' => 'auth','uses' => 'UserController@postUser']);

	//Slider 
Route::group(['prefix' => 'slider'], function(){
	Route::get('add', ['middleware' => 'auth', 'uses' => 'SliderController@getAddSlider']);
	Route::post('add', ['middleware' => 'auth', 'uses' => 'SliderController@postAddSlider']);
	Route::get('all', ['middleware' => 'auth', 'uses' => 'SliderController@getAllSliders']);
	Route::get('allData', ['middleware' => 'auth', 'uses' => 'SliderController@getAllSlidersData']);	
	Route::get('{id}', ['middleware' => 'auth', 'uses' => 'SliderController@getSlider']);
	Route::post('{id}', ['middleware' => 'auth', 'uses' => 'SliderController@postSlider']);
	Route::get('{id}/{language_code}', ['middleware' => 'auth','uses' => 'SliderController@getSliderTranslation']);
	Route::post('{id}/{language_code}', ['middleware' => 'auth','uses' => 'SliderController@postSliderTranslation']);
});




//Category
Route::group(['prefix' => 'category'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'CategoryController@getAddCategory']);
	Route::post('add', ['middleware' => 'auth','uses' => 'CategoryController@postAddCategory']);
	Route::get('all', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategories']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoryData']);
	Route::post('drag-drop', ['middleware' => 'auth','uses' => 'CategoryController@postCategoryDragDrop']);
	Route::post('addCategoryProduct',['middleware'=>'auth','uses'=>'CategoryController@postAddCategoryProduct']);
	Route::post('addCategoryHierarchy',['middleware'=>'auth','uses'=>'CategoryController@postAddCategoryHierarchy']);
	Route::post('removeCategoryProduct',['middleware'=>'auth','uses'=>'CategoryController@postRemoveCategoryProduct']);
	Route::get('allCategoryProductData', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoryProductData']);

	Route::get('allCategoryHierarchyData', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoryHierarchyData']);

	Route::get('{id}', ['middleware' => 'auth', 'uses' => 'CategoryController@getCategory']);
	Route::post('{id}', ['middleware' => 'auth', 'uses' => 'CategoryController@postCategory']);
	Route::get('{id}/{language_code}', ['middleware' => 'auth','uses' => 'CategoryController@getCategoryTranslation']);
	Route::post('{id}/{language_code}', ['middleware' => 'auth','uses' => 'CategoryController@postCategoryTranslation']);


 
	
});


	//Categories
Route::group(['prefix' => 'categories'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'CategoryController@getAddCategoryNew']);
	Route::post('add', ['middleware' => 'auth','uses' => 'CategoryController@postAddCategoryNew']);
	Route::get('all', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoriesNew']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoryDataNew']);
	
	Route::get('{id}', ['middleware' => 'auth', 'uses' => 'CategoryController@getCategoryNew']);
	Route::post('{id}', ['middleware' => 'auth', 'uses' => 'CategoryController@postCategoryNew']);
	
});


	//Category
Route::group(['prefix' => 'sub-category'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'SubCategoryController@getAddCategory']);
	Route::post('add', ['middleware' => 'auth','uses' => 'SubCategoryController@postAddCategory']);
	Route::get('all', ['middleware' => 'auth','uses' => 'SubCategoryController@getAllCategories']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'SubCategoryController@getAllCategoryData']);
	Route::post('addCategoryProduct',['middleware'=>'auth','uses'=>'SubCategoryController@postAddCategoryProduct']);
	
	Route::post('removeCategoryProduct',['middleware'=>'auth','uses'=>'SubCategoryController@postRemoveCategoryProduct']);
	Route::get('allCategoryProductData', ['middleware' => 'auth','uses' => 'SubCategoryController@getAllCategoryProductData']);


	Route::get('{id}', ['middleware' => 'auth', 'uses' => 'SubCategoryController@getCategory']);
	Route::post('{id}', ['middleware' => 'auth', 'uses' => 'SubCategoryController@postCategory']);
	
});



	//Categories
Route::group(['prefix' => 'categories'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'CategoryController@getAddCategoryNew']);
	Route::post('add', ['middleware' => 'auth','uses' => 'CategoryController@postAddCategoryNew']);
	Route::get('all', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoriesNew']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'CategoryController@getAllCategoryDataNew']);
	
	Route::get('{id}', ['middleware' => 'auth', 'uses' => 'CategoryController@getCategoryNew']);
	Route::post('{id}', ['middleware' => 'auth', 'uses' => 'CategoryController@postCategoryNew']);
	// category/delete
	Route::post('category/delete',['middleware'=>'auth','uses'=>'CategoryController@getCategoryDelete']);
});



	//Customer
Route::group(['prefix' => 'customer'], function(){
	Route::get('all-Active', ['middleware' => 'auth','uses' => 'CustomerController@getAllActiveCustomers']);
	Route::get('all-InActive', ['middleware' => 'auth','uses' => 'CustomerController@getAllInActiveCustomers']);
	Route::get('all-ActiveData', ['middleware' => 'auth','uses' => 'CustomerController@getAllActiveCustomerData']);
	Route::get('all-InActiveData', ['middleware' => 'auth','uses' => 'CustomerController@getAllInActiveCustomerData']);
	Route::get('orderData/{id}', ['middleware' => 'auth','uses' => 'CustomerController@getCustomersOrdersData']);
	Route::get('add', ['middleware' => 'auth','uses' => 'CustomerController@getAddCustomer']);
	Route::post('add', ['middleware' => 'auth','uses' => 'CustomerController@postAddCustomer']);
	Route::get('{id}', ['middleware' => 'auth','uses' =>'CustomerController@getCustomer']);
	Route::post('{id}', ['middleware' => 'auth','uses' =>'CustomerController@postCustomer']);
	Route::get('walletData/{id}', ['middleware' => 'auth','uses' =>'CustomerController@getCustomerWallet']);
	Route::get('addWalletMoney/{id}', ['middleware' => 'auth','uses' =>'CustomerController@getAddWalletMoney']);
	Route::post('addWalletMoney/{id}', ['middleware' => 'auth','uses' =>'CustomerController@postAddWalletMoney']);

	Route::get('deductWalletMoney/{id}', ['middleware' => 'auth','uses' =>'CustomerController@getDeductWalletMoney']);
	Route::post('deductWalletMoney/{id}', ['middleware' => 'auth','uses' =>'CustomerController@postDeductWalletMoney']);

});



/*vendor*/

Route::group(['prefix' => 'vendor'], function(){

Route::get('all-vendor', ['middleware' => 'auth','uses' => 'CustomerController@getAllVendor']);
Route::get('all-vendordata', ['middleware' => 'auth','uses' => 'CustomerController@getAllVendorData']);

Route::get('add-vendor', ['middleware' => 'auth','uses' => 'CustomerController@getAddVenodor']);
Route::post('add-vendorpost', ['middleware' => 'auth','uses' => 'CustomerController@postAddVenodor']);

Route::get('{id}', ['middleware' => 'auth','uses' =>'CustomerController@getVendor']);
Route::post('{id}', ['middleware' => 'auth','uses' =>'CustomerController@postVendor']);

});



/*color*/
Route::group(['prefix' => 'color'], function(){
Route::get('all-color', ['middleware' => 'auth','uses' => 'ColorController@getAllColor']);
Route::get('all-colordata', ['middleware' => 'auth','uses' => 'ColorController@getAllColorData']);
Route::get('add-color', ['middleware' => 'auth','uses' => 'ColorController@getAddColor']);
Route::post('add-colorpost', ['middleware' => 'auth','uses' => 'ColorController@postAddColor']);
Route::get('{id}', ['middleware' => 'auth','uses' =>'ColorController@getColor']);
Route::post('{id}', ['middleware' => 'auth','uses' =>'ColorController@postColor']);
});


/*contactus*/
Route::group(['prefix' => 'contactus'], function(){
Route::get('contactus-master', ['middleware' => 'auth','uses' =>'ContactUsController@getContactUs']);
Route::post('{id}', ['middleware' => 'auth','uses' =>'ContactUsController@postContactUs']);
});



/*Our Guarantee*/
Route::group(['prefix' => 'guarantee'], function(){

Route::get('all-guarantee', ['middleware' => 'auth','uses' => 'OurGuaranteeController@getAllGuarantee']);
Route::get('all-guaranteedata', ['middleware' => 'auth','uses' => 'OurGuaranteeController@getAllGuaranteeData']);


Route::get('add-guarantee', ['middleware' => 'auth','uses' => 'OurGuaranteeController@getAddGuarantee']);
Route::post('add-guaranteepost', ['middleware' => 'auth','uses' => 'OurGuaranteeController@postAddGuarantee']);

Route::get('{id}', ['middleware' => 'auth','uses' =>'OurGuaranteeController@getguarantee']);
Route::post('{id}', ['middleware' => 'auth','uses' =>'OurGuaranteeController@postguarantee']);

});



	//Admin
Route::group(['prefix' => 'admin'], function(){
	Route::get('all', ['middleware' => 'auth','uses' => 'AdminController@getAllAdmins']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'AdminController@getAllAdminData']);
	Route::get('add', ['middleware' => 'auth','uses' => 'AdminController@getAddAdmin']);
	Route::post('add', ['middleware' => 'auth','uses' => 'AdminController@postAddAdmin']);
	Route::get('{id}', ['middleware' => 'auth','uses' =>'AdminController@getAdmin']);
	Route::post('{id}', ['middleware' => 'auth','uses' =>'AdminController@postAdmin']);
});

	//Subadmin
Route::group(['prefix' => 'subadmin'], function(){
	Route::get('all', ['middleware' => 'auth','uses' => 'SubadminController@getAllSubadmins']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'SubadminController@getAllSubadminData']);
	Route::get('add', ['middleware' => 'auth','uses' => 'SubadminController@getAddSubadmin']);
	Route::post('add', ['middleware' => 'auth','uses' => 'SubadminController@postAddSubadmin']);
	Route::get('{id}', ['middleware' => 'auth','uses' =>'SubadminController@getSubadmin']);
	Route::post('{id}', ['middleware' => 'auth','uses' =>'SubadminController@postSubadmin']);
});

	//policy
Route::group(['prefix' => 'policy'], function(){
	Route::get('/', ['middleware' => 'auth','uses' => 'PolicyController@getPolicy']);
	Route::post('/', ['middleware' => 'auth','uses' => 'PolicyController@postPolicy']);

});
	//termscondition
Route::group(['prefix' => 'termconditions'], function(){
	Route::get('/', ['middleware' => 'auth','uses' => 'TermConditionController@getTermCondition']);
	Route::post('/', ['middleware' => 'auth','uses' => 'TermConditionController@postTermCondition']);

});
	//brand
Route::group(['prefix' => 'brand'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'BrandController@getAddBrand']);
	Route::post('add', ['middleware' => 'auth','uses' => 'BrandController@postAddBrand']);
	Route::get('all', ['middleware' => 'auth','uses' => 'BrandController@getAllBrand']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'BrandController@getAllBrandData']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'BrandController@getBrand']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'BrandController@postBrand']);

});

Route::group(['prefix' => 'discount'], function(){
	Route::get('all', ['middleware' => 'auth', 'uses' => 'DiscountController@getAllDiscountCode']);
	Route::get('add', ['middleware' => 'auth', 'uses' => 'DiscountController@getAddDiscountCode']);
	Route::post('add', ['middleware' => 'auth', 'uses' => 'DiscountController@postAddDiscountCode']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'DiscountController@getAllDiscountData']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'DiscountController@getDiscountCode']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'DiscountController@postDiscountCode']);
		/*Route::get('all', ['middleware' => 'auth','uses' => 'PromocodeController@getAllPromocode']);
		Route::get('allData', ['middleware' => 'auth','uses' => 'PromocodeController@getAllPromocodeData']);
		
		Route::post('{id}', ['middleware' => 'auth','uses' => 'PromocodeController@postPromocode']);*/
		Route::post('vk/showAllSpecificCategory', ['middleware' => 'auth', 'uses' => 'DiscountController@showAllSpecificCategory']);

		Route::post('vk/showAllSpecificProduct', ['middleware' => 'auth', 'uses' => 'DiscountController@showAllSpecificProduct']);
		Route::post('vk/showAllSpecificCustomer', ['middleware' => 'auth', 'uses' => 'DiscountController@showAllSpecificCustomer']);
		Route::post('vk/deleteSpecificDiscountFor', ['middleware' => 'auth', 'uses' => 'DiscountController@deleteSpecificDiscountFor']);
		
	});

//Art-work
 Route::group(['prefix' => 'artwork'], function(){
	Route::get('all', ['middleware' => 'auth','uses' => 'ArtworkController@getAllArtWork']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'ArtworkController@AllArtWorkData']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'ArtworkController@getArtworkDetail']);
});


	//orders 
Route::group(['prefix' => 'order'], function(){
	Route::get('all', ['middleware' => 'auth','uses' => 'OrderController@getAll']);

	Route::get('all-reorder', ['middleware' => 'auth','uses' => 'OrderController@getAllReorder']);
	
	//Order edit page
	Route::get('/edit/{id}', ['middleware' => 'auth','uses' => 'OrderController@getOrderDetail']);
	Route::get('/allItemsData', ['middleware' => 'auth','uses' => 'OrderController@getOrderItemsAllData']);

	//Order item Edit Page
	Route::get('/order_item/edit/{id}', ['middleware' => 'auth','uses' => 'OrderController@getOrderItemDetail']);
	Route::get('/allOrderItemNotesData', ['middleware' => 'auth','uses' => 'OrderController@getAllOrderItemNotesData']);
	Route::get('/allOrderItemArtProofData', ['middleware' => 'auth','uses' => 'OrderController@getAllOrderItemArtProofData']);
	Route::post('/order_item/shipp-address/edit', ['middleware' => 'auth','uses' => 'OrderController@postOrderItemShippingAddressEdit']);
	Route::post('/order_item/bill-address/edit', ['middleware' => 'auth','uses' => 'OrderController@postOrderItemBillingAddressEdit']);
	Route::post('order_item/vendor/edit', ['middleware' => 'auth','uses' => 'OrderController@postOrderItemVendorEdit']);
	Route::post('order_item/tracking/add', ['middleware' => 'auth','uses' => 'OrderController@postOrderItemTrackingAdd']);
	Route::post('order_item/invoice-upload', ['middleware' => 'auth','uses' => 'OrderController@postOrderItemInvoiceUpload']);



	//select vendor
	Route::post('select-vendor', ['middleware' => 'auth','uses' => 'OrderController@postSelectVendor']);

	//order All
	
	Route::get('allData', ['middleware' => 'auth','uses' => 'OrderController@getAllData']);

	Route::post('check-order-notes', ['middleware' => 'auth','uses' => 'OrderController@postCheckOrderNotes']);
	Route::post('check-payment-not-paid', ['middleware' => 'auth','uses' => 'OrderController@postCheckOrderItemNotPaid']);
	
	// Art Proof All Data
	Route::get('allDataArt', ['middleware' => 'auth','uses' => 'OrderController@getAllDataArt']);
	Route::post('production-stage/update',['middleware'=>'auth','uses'=>'OrderController@postProductionStageUpdate']);
	
	//Order Notes //Art proof
	Route::post('order-notes', ['middleware' => 'auth','uses' => 'OrderController@postOrderNotes']);
	Route::post('art-proof-management-note', ['middleware' => 'auth','uses' => 'OrderController@postArtProofManagementNote']);

	//is_important order_item
	Route::post('order-item-important', ['middleware' => 'auth','uses' => 'OrderController@postOrderItemImportant']);

	//order items
	Route::get('order-item', ['middleware' => 'auth','uses' => 'OrderController@getAllOrderItems']);
	Route::get('allOrderItemData/{id}', ['middleware' => 'auth','uses' => 'OrderController@getAllOrderItemsData']);

	//todays orders
	Route::get('todays', ['middleware' => 'auth','uses' => 'OrderController@getTodays']);
	Route::get('todaysData', ['middleware' => 'auth','uses' => 'OrderController@getTodaysData']);

	//order pending
	Route::get('pending', ['middleware' => 'auth','uses' => 'OrderController@getPending']);
	Route::get('pendingData', ['middleware' => 'auth','uses' => 'OrderController@getPendingData']);

	//Delivered orders
	Route::get('delivered', ['middleware' => 'auth','uses' => 'OrderController@getDelivered']);
	Route::get('deliveredData', ['middleware' => 'auth','uses' => 'OrderController@getDeliveredData']);

	//Cancelled orders
	Route::get('cancelled', ['middleware' => 'auth','uses' => 'OrderController@getCancelled']);
	Route::get('cancelledData', ['middleware' => 'auth','uses' => 'OrderController@getCancelledData']);

	//return orders
	Route::get('return', ['middleware' => 'auth','uses' => 'OrderController@getReturned']);
	Route::get('returnData', ['middleware' => 'auth','uses' => 'OrderController@getReturnedData']);

	//replacement orders
	Route::get('replacement', ['middleware' => 'auth','uses' => 'OrderController@getReplacement']);
	Route::get('replacementData', ['middleware' => 'auth','uses' => 'OrderController@getReplacementData']);

	//replacement orders
	Route::get('logs', ['middleware' => 'auth','uses' => 'OrderController@getOrderLog']);
	Route::get('logData', ['middleware' => 'auth','uses' => 'OrderController@getOrderLogData']);

	Route::post('/set_order_time', ['middleware' => 'auth','uses' => 'OrderController@PostSetEstimationTime']);
	

	/*Route::get('order/{id}', ['middleware' => 'auth','uses' => 'OrderController@getDetails']);*/

	// mark order paid
	Route::get('paid/{id}', ['middleware' => 'auth','uses' => 'OrderController@getMarkPaid']);
	// mark pad & delivered
	Route::get('paidDelivered/{id}', ['middleware' => 'auth','uses' => 'OrderController@getMarkPaidDelivered']);

	// mark other
	Route::get('other/{order_id}/{delivery_status_id}', ['middleware' => 'auth','uses' => 'OrderController@getMarkOther']);

	Route::post('cancel/{order_id}/{delivery_status_id}', ['middleware' => 'auth','uses' => 'OrderController@postCancelOrder']);

	//Update delivery vendor 
	Route::get('delivery-vendor/{order_id}/{delivery_vendor_id}', ['middleware' => 'auth','uses' => 'OrderController@updateDeliveryVendor']);
	
    //invoice
	Route::get('{id}', ['middleware' => 'auth','uses' => 'OrderController@getinvoice']);
	Route::get('log/invoiceData', ['middleware' => 'auth','uses' => 'OrderController@getinvoiceData']);

	//tracking_number
	Route::post('postTrackingNumber', ['middleware' => 'auth','uses' => 'OrderController@postOrderTrackingNumber']);
});

	Route::group(['prefix' => 'production'], function(){
		Route::get('/all',['middleware' => 'auth','uses' => 'ProductionStageController@getProductionAll']);
		Route::get('/allData',['middleware' => 'auth','uses' => 'ProductionStageController@getProductAllDatatable']);
		
		Route::get('/add',['middleware' => 'auth','uses' => 'ProductionStageController@getProductionAdd']);
		Route::post('/add',['middleware' => 'auth','uses' => 'ProductionStageController@postProductionAdd']);
		Route::get('/{id}',['middleware'=>'auth','uses'=>'ProductionStageController@getProductionEdit']);
		Route::post('/{id}',['middleware'=>'auth','uses'=>'ProductionStageController@postProductionEdit']);
	});
	//Product
Route::group(['prefix' => 'product'], function(){

	// Route::post('/productPriceDelete','ProductController@postProductPriceDelete');
	Route::get('/product_vendor_delete/{id}',['middleware' => 'auth','uses' => 'ProductController@product_vendor_delete']);
	Route::get('/imprint_color_delete/{id}',['middleware' => 'auth','uses' => 'ProductController@imprint_color_delete']);
	Route::get('/imprintProductPriceDelete/{id}',['middleware' => 'auth','uses' => 'ProductController@imprintProductPriceDelete']);
	Route::post('/editImprintData',['middleware' => 'auth','uses' => 'ProductController@getEditImprintData']);
	Route::post('/editImprintColorData',['middleware' => 'auth','uses' => 'ProductController@getEditImprintColorData']);
	Route::post('/editImprintPriceData',['middleware' => 'auth','uses' => 'ProductController@postEditImprintPriceData']);
	Route::post('/editProductColor',['middleware' => 'auth','uses' => 'ProductController@postEditProductColor']);
	Route::post('/product-color/image_src/delete',['middleware' => 'auth','uses' => 'ProductController@postProductColorImageSrcDelete']);
	Route::post('/edit/product-option',['middleware' => 'auth','uses' => 'ProductController@postProductOptionEditData']);
	Route::post('/edit/product-option-price',['middleware' => 'auth','uses' => 'ProductController@postProductOptionPriceEditData']);
	Route::post('/product-option-price/delete',['middleware' => 'auth','uses' => 'ProductController@postProductOptionPriceDelete']);
	Route::post('/product-option/delete',['middleware' => 'auth','uses' => 'ProductController@postProductOptionDelete']);
	Route::post('/imprint/delete',['middleware' => 'auth','uses' => 'ProductController@postImprintDelete']);


	Route::post('image/add', ['middleware' => 'auth','uses' => 'ProductController@postAddProductImages']);
	Route::post('image/delete', ['middleware' => 'auth','uses' => 'ProductController@postDeleteProductImage']);

	Route::post('variantsAdd', ['middleware' => 'auth','uses' => 'ProductController@addVariants']);

	Route::post('add', ['middleware' => 'auth','uses' => 'ProductController@postAddProduct']);
	Route::get('add', ['middleware' => 'auth','uses' => 'ProductController@getAddProduct']);
	Route::get('all', ['middleware' => 'auth','uses' => 'ProductController@getAllProducts']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'ProductController@getAllProductsData']);
	Route::get('my', ['middleware' => 'auth','uses' => 'ProductController@getMyProducts']);
	Route::get('myData', ['middleware' => 'auth','uses' => 'ProductController@getMyProductsData']);
	Route::post('deleteVariant', ['middleware' => 'auth','uses' => 'ProductController@postDeleteVariant']);
	Route::post('modifier', ['middleware' => 'auth','uses' => 'ProductController@postModifier']);
	Route::post('export','ProductController@exportData');

	Route::get('{id}', ['middleware' => 'auth','uses' => 'ProductController@getProduct']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'ProductController@postProduct']);


	Route::post('active/change/status', ['middleware' => 'auth','uses' => 'ProductController@getProductStatusChange']);
	
	
	Route::get('product_color_delete/{id}',['middleware' => 'auth','uses' => 'ProductController@product_Color_Delete']);

   // Route::post('{id}/{language_code}', ['middleware' => 'auth','uses' => 'ProductController@postProductTranslation']);

});



/*Apparel*/

Route::group(['prefix' => 'apparel'], function(){

Route::get('apparel-all', ['middleware' => 'auth','uses' => 'ProductController@getApparel']);
Route::get('apparel-alldata', ['middleware' => 'auth','uses' => 'ProductController@getapparelData']);

Route::get('add-apparel', ['middleware' => 'auth','uses' => 'ProductController@getAddApparel']);
Route::post('add-apparel', ['middleware' => 'auth','uses' => 'ProductController@postAddApparel']);

Route::get('{id}', ['middleware' => 'auth','uses' =>'ProductController@getAppareldetails']);
Route::post('{id}', ['middleware' => 'auth','uses' =>'ProductController@postAppareldetails']);


Route::get('/product_apparel_delete/{id}',['middleware' => 'auth','uses' => 'ProductController@product_Apparel_delete']);

});




//Section
Route::group(['prefix' => 'section'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'SectionController@getAddSection']);
	Route::post('add', ['middleware' => 'auth','uses' => 'SectionController@postAddSection']);
	Route::get('all', ['middleware' => 'auth','uses' => 'SectionController@getAllSections']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'SectionController@getAllSectionData']);
	Route::post('addSectionProduct',['middleware'=>'auth','uses'=>'SectionController@postAddSectionProduct']);
	Route::post('removeSectionProduct',['middleware'=>'auth','uses'=>'SectionController@postRemoveSectionProduct']);
	Route::get('allSectionProductData', ['middleware' => 'auth','uses' => 'SectionController@getAllSectionProductData']);


	Route::get('{id}', ['middleware' => 'auth', 'uses' => 'SectionController@getSection']);
	Route::post('{id}', ['middleware' => 'auth', 'uses' => 'SectionController@postSection']);

});


Route::post('product_inventory', ['middleware' => 'auth','uses' => 'ProductController@getInventoryModal']);
Route::get('inventory', ['middleware' => 'auth','uses' => 'ProductController@getInventory']);	
Route::get('inventoryData', ['middleware' => 'auth','uses' => 'ProductController@getInventoryData']);
Route::post('inventory/add', ['middleware' => 'auth','uses' => 'ProductController@postInventoryAdd']);
Route::post('inventory/set', ['middleware' => 'auth','uses' => 'ProductController@postInventorySet']);

	//Product Image
Route::get('deleteImage/{id},{product_id}', ['middleware' => 'auth','uses' => 'ProductController@getDeleteImage']);

	// Route::post('product/image/delete', ['middleware' => 'auth','uses' => 'ProductController@postDeleteProductImage']);

	//notification
Route::group(['prefix' => 'notification'], function(){
	Route::get('add', ['middleware' => 'auth','uses' => 'NotificationController@getAddNotification']);
	Route::post('add', ['middleware' => 'auth','uses' => 'NotificationController@postAddNotification']);
	Route::get('all', ['middleware' => 'auth','uses' => 'NotificationController@getAllNotification']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'NotificationController@getAllNotificationData']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'NotificationController@getNotification']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'NotificationController@postNotification']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'NotificationController@getNotification']);
	Route::get('send/{id}', ['middleware' => 'auth','uses' => 'NotificationController@sendNotification']);

});
	
	//Permissions
Route::group(['prefix' => 'permission'], function(){

	Route::get('add', ['middleware' => 'auth','uses' => 'PermissionController@getAddPermission']);
	Route::post('add', ['middleware' => 'auth','uses' => 'PermissionController@postAddPermission']);
	Route::get('all', ['middleware' => 'auth','uses' => 'PermissionController@getAllPermission']);
	Route::get('allData', ['middleware' => 'auth','uses' => 'PermissionController@getAllPermissionData']);
	Route::get('{id}', ['middleware' => 'auth','uses' => 'PermissionController@getPermission']);
	Route::post('{id}', ['middleware' => 'auth','uses' => 'PermissionController@postPermission']);
});
	






});

	




	


Route::post('getProductVariants',['middleware'=> 'auth', 'uses' => 'OrderController@getProductVariants']);
Route::post('admin/addToCart',['middleware'=> 'auth', 'uses' => 'OrderController@addToCart']);
Route::post('admin/deleteCartItem',['middleware'=> 'auth', 'uses' => 'OrderController@deleteCartItem']);
Route::post('admin/changeQuantity',['middleware'=> 'auth', 'uses' => 'OrderController@changeQuantity']);
Route::post('admin/makeOrder',['middleware'=> 'auth', 'uses' => 'OrderController@makeOrder']);

//myprofile
Route::get('profile', ['middleware' => 'auth','uses' => 'ProfileController@getMyProfile']);
Route::post('profile', ['middleware' => 'auth','uses' => 'ProfileController@PostMyProfile']);

//Change Password
Route::get('/changePassword', ['middleware' => 'auth', 'uses' => 'HomeController@getChangePassword']);
Route::post('changePassword', ['middleware' => 'auth', 'uses' => 'HomeController@postChangePassword']);

Route::get('/register', 'PublicController@register');
Route::get('{url}','UserController@redirectHome');






