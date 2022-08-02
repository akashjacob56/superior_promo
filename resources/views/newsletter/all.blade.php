@extends('layouts.admin')
@section('content')
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
					<li class="breadcrumb-item">
						<a>NewsLetter </a>
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
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header">
								<h5>NewsLetter</h5>
								<span class="text-muted">Here you can see all NewsLetter Subscriptions details. </span>
							</div>
							<div class="card-block">
								<div class="dt-responsive table-responsive">
									<table id="footer-search" class="table nowrap">
										<thead>
											<tr>
												<th>ID</th>	
												
												<th>Email</th>
												<th>Contact Number</th>
												<th>Date</th>                      
											</tr>
										</thead>
										<tbody>
										</tbody>
										<tfoot>
											<tr>
												<th>ID</th>	
												
												<th>Email</th>
												<th>Contact Number</th>
												<th>Date</th>     
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
<script type="text/javascript">

	'use strict';
	$(document).ready(function() {
		$('#footer-search').DataTable( $.extend({     
			"ajax": {
				url: "allData",
				type: "GET",
				contentType: "application/json;charset=UTF-8",
				dataType: "json",
			},
			"order": [[ 0, "desc" ]],                                
			"columns": [{
				"data": "news_letter_id"
			},{
				"data": "news_letter_email"
			},{
				"data": "contact_number"
			},{ 
				"data": "created_at" 
			}]
		}, dataTableDesign) );
	} );
</script>
@endsection