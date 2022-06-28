@extends('layouts.admin')
@section('content')
<!-- <style type="text/css">

	.Zebra_DatePicker_Icon_Wrapper button{
		top: 9.5px !important;
		left: 240px !important;
	} 
</style> -->
<meta name="title" property="og:title" content="{{$appearance_translation->meta_title}}"/>

<meta name="keywords" content="{{$appearance_translation->meta_keywords}}"/>

<meta name="description" content="{{$appearance_translation->meta_description}}"/>
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-8">
				<ul class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="{{$base_url}}">
							<i class="feather icon-home"></i> 
						</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{$base_url}}/admin/home">Admin</a>
					</li>
					<li class="breadcrumb-item">
						<a>Dashboard</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{$base_url}}/admin/dashboard/seller">Seller's Dashboard
							<b class="language-title-color"></b>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<style>
	.checked{	
		color:orange;
	}
</style>
<div class="pcoded-inner-content">
	<div class="main-body">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card table-card latest-activity-card">
							<!-- datatable  -->
							<div class="table-card">
								<div class="card-header">
									<h5>Seller's Dashboard</h5>
									
								</div>
								
								<div class="card-block">
									<div class="dt-responsive table-responsive">

										<table id="footer-search" class="table nowrap">
											<thead>
												<tr>
													<th>Business Name</th>
													<th>Contact No.</th>
													<th>Sale</th>
													<th>Action</th>
													<!-- <th>Product Count</th>
													<th>Cart Count</th>
													<th>Wishlist Count</th> -->
												</tr>
											</thead>
											<tbody>
											</tbody>
											<tfoot>
												<tr>
													<th>Business Name</th>
													<th>Contact No.</th>
													<th>Disabled</th>
													<th>Disabled</th>
													<!-- <th>Disabled</th>
													<th>Disabled</th> -->
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	$(document).ready(function() {
		

		
		function SaleBySellerData(){
			
			'use strict';
			$('#footer-search').DataTable( $.extend({      
				"ajax": {
					url: "seller/allData",
					type: "GET",
					contentType: "application/json;charset=UTF-8",
					dataType: "json",
				},
				"order": [[ 0, "asc" ]],                                
				"columns": [{ 
					"data": "business_name" 
				},{
					"data": "contact_number",

				},{

					"bSortable": false,
					"ilter":false,
					"mRender":function(data,type,row){
						if(row.sale_by_seller!=null){
							return row.sale_by_seller.sum_total_amount;
						}else{
							return 0;
						}
					}
				}

				,{

					"bSortable": false,
					"ilter":false,
					"mRender": function(data, type, row) { 

						return '<a href="seller/'+row.seller_id+'" class="btn btn-primary waves-effect waves-light js-programmatic-enable data-table-button">Dashboard</a>';
					}

				}

				]
			},dataTableDesign) );
		}

		SaleBySellerData();
		$("#search").click(function(){
			dataTable=$("#footer-search").DataTable();
			dataTable.clear();
			dataTable.destroy();
			SaleBySellerData();
		});
	} );
</script>
@endsection
