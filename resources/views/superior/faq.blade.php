@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('content')
<style type="text/css">
    .terms-conditions{
     padding-top: 20px;
 }
 .about-image{
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.feature-box{
    text-align: center;
}
h2.subtitle{
    text-align: center;
    padding: 20px;
}

.page-header {
    padding-top:4rem;
    padding-bottom:4rem;
}

.faq-title{
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 30px;
line-height: 35px;
display: flex;
align-items: center;
letter-spacing: -0.017em;
color: #212121;
}

.question-txt{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 21px;
letter-spacing: -0.017em;
color: #212121;
}

.answer-txt{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 22px;
letter-spacing: -0.017em;
color: #212121;
}
.padding-bottom20{
    padding-bottom:50px;
}


.btn-go-shopping{
height: 40px;
width: 140px;
background: #68BEE5;
border: solid 1px #68BEE5;
border-radius: 5px;
font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 16px;
line-height: 19px;
align-items: center;
text-align: center;
letter-spacing: -0.017em;
color: #FFFFFF;
}

</style>
<meta name="title" property="og:title" content=""/>

<meta name="keywords" content=""/>

<meta name="description" content=""/>


</head>
<body>

    @php

    $faq_translation="";
    if($faq->faq_translation!="")
    {
        $faq_translation=$faq->faq_translation;
    }else
    {
        $faq_translation=$faq->default_faq_translation;
    }
    @endphp

<!--  <main class="main">
    <div class="page-header page-header-bg text-left" style="background:#D4E1EA;">
        <div class="container">
            <h1>
            @lang('navigation.faq')</h1>
            <a href="/contact" class="btn btn-dark">Contact</a>
        </div>
    </div> -->

<!--     <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('navigation.faq')</li>
            </ol>
        </div>
    </nav>
     

    <div class="about-section">
        <div class="container">
      <p class="about_spacing"><?php echo $faq_translation->faq_description; ?></p>
        </div>
    </div> -->



<div class="container">
    <div class="row pt-5 pb-5">
        <span class="faq-title">Frequently Asked Questions</span>
    </div>
     
     <div class="row pb-3">
         <span class="question-txt pb-2">Q. Miscellaneous Charges</span>
         <p class="answer-txt"> A. Most products require that a silk screen or plate be made in order to apply your custom imprint. If your artwork is more than one color, a screen must be made for each color. Screen charges are one-time charges per product, per imprint. New imprints wi</p>
     </div>


     <div class="row pb-3">
         <span class="question-txt pb-2">Q. Over Runs & Under Runs</span>
         <p class="answer-txt">A. In certain instances you may receive an overage or a shortage on your order.</p>
         <p class="answer-txt">
            Over or under runs occur do to the fact that quantity of the products are determined by weight since its not possible to actually count the exact quantities in a mass production process. The industry standard on most products is 10%. For example if you order 500 magnets you could receive 450 or 550 magnets. Superior Promos does not guarantee the exact % but will try to minimize such occurrence. In most instances the over or under run does not exceed 5%. Your account will be billed or credited to the amount of over or under run.
         </p>
     </div>


     <div class="row padding-bottom20">
         <span class="question-txt pb-2">Q. Security</span>
         <p class="answer-txt">A. SuperiorPromos.com utilizes the latest in SSL gateway security with up to 256 bit encryption on every page and full checkout process. Website is secured by industry leader GeoTrust, its active seal is present on the bottom of our website to insure that communication between your browser and sites web server is constantly secure. </p>
         <p class="answer-txt">
            All credit card transaction are processed by industry leading Authorize gateway and user profiles along with encrypted credit card information is stored on fully secured servers that comply with the Payment Card Industry (PCI) Date Security Standards.  Superior Promos does not view or store full credit card information locally. We only see the same encrypted information our clients see. Security is one of our top priorities, we want our clients to have a safe and enjoyable shopping experience.
         </p>
     </div>


            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><a href="/shop"><button class="btn-go-shopping" type="button">Go Shopping</button></a></div>
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