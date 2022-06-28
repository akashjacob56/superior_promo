@extends('layouts.admin')
@section('content')
<!-- [ breadcrumb ] start -->
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
						<a>Unauthorized Access</a>
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
								<h5>Unauthorized Access</h5>
								
								<span class="text-muted"></span>
							</div>
							<div class="card-block" align="center">
								<h6 class="f-w-600 f-45 m-b-25">You do not have permission to view this page.</h6>
								<h4 class="maintainance-subtitle f-24 m-b-25">Unauthorized Access.</h4>
								<a href="{{$base_url}}/admin/home">
									<button type="button" class="btn btn-primary waves-effect waves-light">Home
									</button>
								</a>
																<p class="f-18">still not working?&nbsp;
									<a href="#!" class="f-18 txt-primary">Contact Admin</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection