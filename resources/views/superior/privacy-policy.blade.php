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
        <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang("navigation.policy")</li>
      </ol>
    </div><!-- End .container -->
  </nav>



	@php
	$policy_translation="";
	if($policies->policy_translation!="")
	{
	$policy_translation=$policies->policy_translation;
}else
{
	$policy_translation=$policies->default_policy_translation;
}
@endphp



	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			
					<p><?php echo $policy_translation->policy_description; ?></p>
				


			</div>
		</div>
	</div>
</main>
<script type="text/javascript">
						//Search top
        $(document).ready(function(){
            $('.header_search_button').on('click',function(){
                var search = $('.header_search_input').val();
                window.location.href = "/shop?page=&search="+search+"&cat_id=&category_id=&color_id=&min=&max=&orderby=&pagi_num=&shop_cat_id=";
            });
        });
					</script>
@endsection
