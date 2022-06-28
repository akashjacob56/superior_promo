@extends('superior.layouts.app',['title' => "SuperiorPromos "])
@section('keyworddescription') 
@section('description')
@section('content')
<style type="text/css"> 
.cart-txt{
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

.bold-p-txt-art{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 18px;
color: #212121;
}

.normal-txt-p{
font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 16px;
line-height: 22px;
letter-spacing: -0.017em;
color: #212121;
}

.b-bottom{
    border-bottom: 1px solid #CCCCCC;
}

.color-b{ 
    color: #01abec;
    text-decoration: underline;
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

/*.img-border{
    background: #FFFFFF;
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 5px;
    padding:20px;
}*/

.img-border {
    background: #FFFFFF;
    /* border: 1px solid #CCCCCC; */
    box-sizing: border-box;
    border-radius: 5px;
    /* padding: 20px; */
    width: 200px;
    height: 200px;
}

.art-work-li{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 15px;
line-height: 22px;
color: #212121;
}

.color-b{ 
    color: #01abec;
    text-decoration: underline;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

       
              <div class="container pb-5">
        
                <div class="row p-3">
                <span class="cart-txt">Artwork Requirements</span>
                </div>

                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2 img-border">  
                        <img src="{{$base_url}}/storage/app/{{$art_work->art_digital_revision_proofs_image}}"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt-art">
                         <!-- FULL ART SERVICES, FREE DIGITAL PROOFS, UNLIMITED PROOF REVISIONS -->
                         {{$art_work->art_digital_revision_proofs_tittle}}
                     </p>
                     <!-- <p class="normal-txt-p">
                         Here at Superior Promos we understand the right design can make all the difference when it comes to promotional products. That is why we provide an unconditional guarantee to all our clients when it comes to artwork. All art services are always FREE, there are no catches or tricks. Our job is to create or recreate a design that will not only be right for you but also have a lasting effect on the promotional product that you are buying.
                     </p>
                     <p class="normal-txt-p">
                         We house a group of talented designers that will work with you every step of the way to insure that you are satisfied with your design and layout. We offer unlimited revisions and digital proofs for your review. We will not print anything until you give us your final approval. Below are some guidelines and suggestions in regards to file types, fonts and artwork.
                     </p> -->
                     <?php echo $art_work->art_digital_revision_proofs_description; ?>
                    </div>
                </div>



                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2 img-border">  
                        <img src="{{$base_url}}/storage/app/{{$art_work->preffered_file_types_image}}"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt-art">
                         <!-- PREFERRED FILE TYPES -->
                         {{$art_work->preffered_file_types_title}}
                     </p>
                     <!-- <p class="normal-txt-p">
                         No matter what file type you currently have we will be able to produce great artwork for you product. However not all files are made equal and some are better than others. Here is a list of file types that will produce the best possible imprint.
                     </p>
                     <p class="art-work-li">
                        <li class="art-work-li">Adobe Illustrator (8.0+) .EPS or .AI files - Vector Files</li>
                        <li class="art-work-li">Adobe .PDF files - Vector Files</li>
                        <li class="art-work-li">Adobe PhotoShop (300 dpi +) .PSD files</li>
                        <li class="art-work-li">High resolution (300 dpi +) .JPG or .TIFF files. or .PNG files</li>
                    </p> -->

                    <?php echo $art_work->preffered_file_types_description; ?>
                    </div>
                </div>


                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2 img-border">  
                        <img src="{{$base_url}}/storage/app/{{$art_work->redraws_modification_file_types_image}}"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt-art">
                         <!-- FILE TYPES THAT REQUIRE REDRAWS OR MODIFICATION -->
                         {{$art_work->redraws_modification_file_types_title}}
                     </p>
                     <!-- <p class="normal-txt-p">
                        Files set up for Web presentation, such as low resolution JPEG, GIF, PNG etc.
                     </p>
                     <p class="art-work-li">
                        <li class="art-work-li">Files set up for Web presentation, such as low resolution JPEG, GIF, PNG etc. Any artwork imported into a word processing program such as: Microsoft Word, WordPerfect,</li>
                        <li class="art-work-li">PowerPoint, Publisher, etc.</li>
                        <li class="art-work-li">Note faxed artwork is NOT clear enough to reproduce on your imprint, and will require a redraw. Redraws or any other art modification services are 100% FREE.</li>
                        <li class="art-work-li">We will however accept ANY of the above files. Please allow extra time for your art art proofs to be setup. If you have questions about any file types please contact the art department via art<a href="mailto:business_email" class="color-b">@superiorpromos.com.</a></li>
                    </p> -->
                    <?php echo $art_work->redraws_modification_file_types_description; ?>
                    </div>
                </div>


                <div class="row pt-5 pb-5 b-bottom">
                    <div class="col-md-2 img-border">  
                        <img src="{{$base_url}}/storage/app/{{$art_work->font_image}}"/>
                    </div>
                    <div class="col-md-10">
                     <p class="bold-p-txt-art">
                         <!-- FONTS -->
                         {{$art_work->font_title}}
                     </p>
                     <!-- <p class="art-work-li">
                        <li class="art-work-li">If a specific font is used in your artwork, please email the actual font to the art department.</li>
                        <li class="art-work-li">If submitting an .EPS or .AI file please outline all the fonts.</li>
                        <li class="art-work-li">In some instances we have to recreate your artwork and an alternate font might be used. We have over 5000 fonts available and will present the best option to you.</li>
                    </p> -->
                    <?php echo $art_work->font_description; ?>
                    </div>
                </div>


            <div class="row pt-5 pb-5 d-flex align-items-center">
              <div class="col-md-12 text-center"><a href="{{$base_url}}/shop"><button class="btn-go-shopping">Go Shopping</button></a></div>
                  
            </div>



</div>
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