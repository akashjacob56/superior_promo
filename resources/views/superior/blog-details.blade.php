@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')

<style type="text/css">
	.card-list-img{
		height: 500px !important;
		width: 1100px !important;
	}
</style>


<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                         <li class="breadcrumb-item" aria-current="page">Blog</li>
                        <li class="breadcrumb-item active" aria-current="page">{{$blog->blog_title}}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <article class="post single">
                            <div class="post-media">
                                <div class="post-slider owl-carousel owl-theme">
                                    <img src="/storage/app/{{$blog->image}}" alt="Post" style="max-height:500px; object-fit:cover;">
                                </div><!-- End .post-slider -->
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <div class="post-date">
                                    <span class="day"><?php echo date('j',strtotime($blog->created_at));?></span>
      <span class="month"><?php echo date('M',strtotime($blog->created_at));?></span>
                                </div><!-- End .post-date -->

                                <h2 class="post-title">
                                    {{$blog->blog_title}}
                                </h2>

                                <div class="post-meta">
                                    <span><i class="icon-calendar"></i><?php echo date('F j, Y',strtotime($blog->created_at));?> </span>
                                    <span><i class="icon-user"></i>By <a href="#">Admin</a></span>
                                   
                                </div><!-- End .post-meta -->

                                <div class="post-content">
                                     <p><?php echo $blog->blog_description ?></p>
                                </div><!-- End .post-content -->

                                <div class="post-share">
                                    <h3>
                                        <i class="icon-forward"></i>
                                        Share this post
                                    </h3>

                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook" target="_blank" title="Facebook">
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon social-linkedin" target="_blank" title="Linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                        <a href="#" class="social-icon social-mail" target="_blank" title="Email">
                                            <i class="icon-mail-alt"></i>
                                        </a>
                                    </div><!-- End .social-icons -->
                                </div><!-- End .post-share -->

                              

                                
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        
                    </div><!-- End .col-lg-9 -->

                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->
@endsection
