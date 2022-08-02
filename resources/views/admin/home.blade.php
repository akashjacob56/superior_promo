@extends('layouts.admin')
@section('content')
<style type="text/css">
.review-card .review-block .cust-img {
	width: 200px !important;
	height: 150px !important;
}
.review-card .review-block .first_product .cust-img  {
	width: 160px !important;
	height: 150px !important;
}

.icon-arrow-down:before {
	content: "\e82a" !important; 
}
.icon-arrow-up:before {
	content: "\e82d" !important;
}
.product-div{
	display: block !important; 
}
</style>


<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="">
							<i class="feather icon-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="/admin/home">Admin</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<!-- subscribe start -->
					<div class="col-md-6 col-lg-3">
						<div class="card">
							<div class="card-block text-center">
								<i class="feather icon-file-text text-c-green d-block f-40"></i>
								<h4 class="m-t-20"><span class="text-c-green">{{$todays_order_count}}</span></h4>
								<p class="m-b-20">Today's Order</p>
								<a class="text-white" href="/admin/order/todays"><button class="btn btn-success btn-sm btn-round">Manage Orders</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="card">
							<div class="card-block text-center">
								<i class="feather icon-package text-warning d-block f-40"></i>
								<h4 class="m-t-20"><span class="text-c-yellow">{{$todays_sales_count}}</span></h4>
								<p class="m-b-20">Today's Sale</p>
								<a class="text-white" href="/admin/order/todays"><button class="btn btn-warning btn-sm btn-round">Manage Sales</button></a>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-3">
						<div class="card">
							<div class="card-block text-center">
								<i class="feather icon-shopping-cart text-info d-block f-40"></i>
								<h4 class="m-t-20"><span class="text-info">{{$todays_cart_count}}</span></h4>
								<p class="m-b-20">Today's Cart</p>
								<a class="text-white" href="/admin/reports/cart"><button class="btn btn-info btn-sm btn-round">Manage Cart</button></a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="card">
							<div class="card-block text-center">
								<i class="feather icon-heart-on text-c-red d-block f-40"></i>
								<h4 class="m-t-20"><span class="text-c-red">{{$todays_wishlist_count}}</span></h4>
								<p class="m-b-20">Today's Wishlist</p>
								<a class="text-white" href="/admin/reports/wishlist"><button class="btn btn-danger btn-sm btn-round">Manage Wishlist</button></a>
							</div>
						</div>
					</div>
					
				

					<div class="col-lg-6 col-md-12">
						<div class="card table-card review-card">
							<div class="review-block">
								<div class="row first_product">
									<div class="col-sm-auto" >
										<img src="/files/assets/images/product.svg" class="profile-img cust-img m-b-15">
									</div>
									<div class="col">
										@if($product_count==0)
										<h6 class="m-b-15">Add your first product for getting start </h6>
										@else
										<h6 class="m-b-15">You have added product, add another one </h6>
										@endif
										<p class="m-t-15 m-b-15 text-muted">You can add physical items, customize your services, or anything else you want to.
										</p>
										<a class="btn btn-primary btn-sm " href="/admin/product/add">Add Product</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-12">
						<div class="card table-card review-card ">
							<div class="review-block ">
								<div class="row first_product">
									<div class="col-sm-auto" >
										<img src="/files/assets/images/collection.svg" class="profile-img cust-img m-b-15">
									</div>
									<div class="col">
										<h6 class="m-b-15">Customize your online store in different collections </h6>
										<p class="m-t-15 m-b-15 text-muted">Choose different collections to manage, sort & categorize your products. 
										</p>
										<a class="btn btn-primary btn-sm " href="/admin/collection/add">Add Collection</a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- latest upadate -->
					@if(count($blogs)>0)
					<div class="col-lg-12 col-md-12">
						
						@foreach($blogs as $blog)
						<div class="col-lg-12 p-0">
							<div class="card table-card review-card">

								<div class="review-block">
									<div class="row">
										<div class="col-sm-5" >
											<div class="product-div">
												<a  class="hvr-shrink">
													<center>

														<img src="http://vshopy.com/storage/app/{{$blog->image}}" class="img-fluid o-hidden product-image m-b-15">
													</center>
												</a>
											</div>
										</div>
										<div class="col-sm-7">
											<a href="https://vshopy.com/blog/{{$blog->url}}" target="_blank">
												<h5 class="m-b-15 blog-title"> 

													@php 
													$title=$blog->blog_title;
													if(strlen($title)>70)
													{
														$result=substr($title, 0,75)."...";
													}
													else
													{	
														$result=substr($title, 0, 70);
													}
													@endphp

												
													<?php echo substr(strip_tags($result),0,75) ; ?>
												</h5></a> 

												<p class="m-t-15 m-b-15 text-muted f-15 " >
													@php 
													$description=$blog->blog_description;
													if(strlen($description)>560)
													{
														$result=substr($description, 0, 560)."...";
													}
													else
													{	
														$result=substr($description, 0, 560);
													}
													@endphp
													<?php echo substr(strip_tags($result),0,560); ?>
													<!--  -->
												</p>
												<a class="btn btn-primary btn-sm btn-round" href="https://vshopy.com/blog/{{$blog->url}}" target="_blank"><i class="feather icon-thumbs-up m-r-5"></i>View Details</a><span class=" m-l-30 f-13 text-muted"><i class="fa fa-eye"></i> {{$blog->view_count}} Views</span><span class=" m-l-20 f-13 text-muted"><i class="icon-tag"></i> {{$blog->blog_type->blog_type_name}}</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach 
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection