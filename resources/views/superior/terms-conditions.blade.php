@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')
<style type="text/css">
	.terms-conditions{
		padding-top: 20px;
	}
</style>



<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{$base_url}}"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">@lang("navigation.terms_and_conditions")</li>
			</ol>
		</div><!-- End .container -->
	</nav>
	<!-- breadcrumb End -->

	@php

	$term_condition_translation="";
	if($term_conditions->term_condition_translation!="")
	{
	$term_condition_translation=$term_conditions->term_condition_translation;
}else
{
	$term_condition_translation=$term_conditions->default_term_condition_translation;
}


@endphp






	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p>
					<?php echo $term_condition_translation->term_condition_description; ?>

				</p>
				
			</div>
		</div>
	</div>
</main>
<script type="text/javascript">
						//Search top
        $(document).ready(function(){
            $('.header_search_button').on('click',function(){
                var search = $('.header_search_input').val();
                window.location.href = "{{$base_url}}/shop?page=&search="+search+"&cat_id=&category_id=&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=";
            });
        });
					</script>

@endsection
