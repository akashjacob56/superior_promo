@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')

<style type="text/css">
	.card-list-img{
		height: 400px !important;
		width: 600px !important;
	}
</style>

<!-- breadcrumb start -->

<main class="main">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0);"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog</li>
					</ol>
				</div><!-- End .container -->
			</nav>

			<div class="container">
				<div class="row">
					

						@foreach($blogs as $blog)
						<div class="col-lg-6">
						<article class="post">
							<div class="post-media">
								<a href="/blog/{{$blog->url}}">
									<img src="/storage/app/{{$blog->image}}" alt="Post" style="width: 100%;max-height: 350px; object-fit: cover;">
								</a>
							</div><!-- End .post-media -->

							<div class="post-body">
								<div class="post-date">
									<span class="day"><?php echo date('j',strtotime($blog->created_at));?></span>
                          <span class="month"><?php echo date('M',strtotime($blog->created_at));?></span>
								</div><!-- End .post-date -->

								<h2 class="post-title">
									 <a href="/blog/{{$blog->url}}">{{$blog->blog_type->blog_type_name}}</a>
								</h2>

								<div class="post-content">
									@if($blog->blog_description !='')
                      <?php
                      $string = strip_tags($blog->blog_description);
                      if (strlen($string) > 300) {


                        $stringCut = substr($string, 0, 300);
                        $endPoint = strrpos($stringCut, ' ');


                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                      }
                      ?>
                      <p>
                        <?php echo $string ?>...  
                      </p>
                      @endif

									<a href="/blog/{{$blog->url}}" class="read-more">Read More <i class="icon-angle-double-right"></i></a>
								</div><!-- End .post-content -->

								<div class="post-meta">
									<span><i class="icon-calendar"></i><?php echo date('F j, Y',strtotime($blog->created_at));?></span>
									<span><i class="icon-user"></i>By <a href="#">Admin</a></span>
									<span><i class="fa fa-heart"></i>&nbsp;{{$blog->view_count}}</span>
									<!-- <span><i class="icon-folder-open"></i>
										<a href="#">Haircuts & hairstyles</a>,
										<a href="#">Fashion trends</a>,
										<a href="#">Accessories</a>
									</span> -->
								</div><!-- End .post-meta -->
							</div><!-- End .post-body -->
						</article><!-- End .post -->
						</div><!-- End .col-lg-9 -->
                        	@endforeach
						

						<nav class="toolbox toolbox-pagination border-0">
							<ul class="pagination">
								{{ $blogs->links() }}
							</ul>
						</nav>
					

				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->

@endsection
