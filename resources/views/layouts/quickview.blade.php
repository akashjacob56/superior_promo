<style type="text/css">
  .quick_view_image {
    max-width: 100%;
    max-height: 315px !important;
  }
  .quick_view_image_parent {
    height: 390px !important;
    display: table;
  }
  .centered{
    text-align: -webkit-center !important;
  }


</style>
<div class="col-sm-12 "  >
  <div class="modal fade bd-example-modal-lg" id="testmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">@lang("product.quick_view")</h5>
          <button type="button" class="close " data-dismiss="modal">&times;</button>
        </div>
        <!-- Product detail page start -->
        <div class="card product-detail-page m-1" id="product-detail-page">
          <div class="card-block">
           <div class="row">
            <div class="col-lg-4 col-xs-12">
             <div class="port_details_all_img row">
              <div class="col-lg-12 m-b-15 centered">
               <div id="big_banner" class="quick_view_image_parent">
                <div class="product-div " id="quick-p-image">  
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-xs-12 product-detail" id="product-detail">
         <div class="row">
          <div>
           <div class="col-lg-12">
            <span id="product-barcode"> </span>
            <span class="float-right inventory-availablity" id="inventory-availablity">
              <span id="availablity">  </span>
            </span> 
          </div> 
          <div class="col-lg-12 break-word">
           <h4 class="pro-desc model-product-name" id="product-name"></h4>
         </div>
         <div class="col-lg-12">
          <span id="brand" class="text-muted"><strong></strong></span>
        </div>
        <div class="stars stars-example-css m-t-15 detail-stars col-lg-12">

          <div id="rating_star"></div>
        </div>
        <div class="col-lg-12"><span id="offer"></span>
          <hr> 
          <p class="description"></p>
        </div>
        <div class="col-md-12 m-t-20">
         <div class="col-lg-12 col-sm-12 mob-product-btn">
          <span id="product-url"></span>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- END E CART -->

</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
 

  $(document).ready(function(){
    $('.page-body').on("click",".show-modal",function(){
      product_id=$(this).attr('class').split(' ')[0];
      click_source=$(this).attr('id');
      if(click_source==1){
       $.each(recent_view_products, function( key, value ) {
        if(value.product_id==product_id){
          product=value;
        }
      });
     }else if(click_source==2){
      $.each(max_view_product, function( key, value ) {
        if(value.product_id==product_id){
          product=value;
        }
      });
    }else if (click_source==3){
      $.each(new_arrival_products, function( key, value ) {
        if(value.product_id==product_id){
          product=value;
        }
      });
    }else{
     $.each(similar_products, function( key, value ) {
      if(value.product_id==product_id){
        product=value;
      }
    });
   }

   product_name="";
   if(product.default_product_translation.product_name!=null){
    string_name=product.default_product_translation.product_name;

    if(string_name.length > 50){
      product_name=string_name.substr(0,47)+"...";
    }else{
      product_name=product.default_product_translation.product_name;
    }
  }

  var description="";
  if(product.default_product_translation.description!=null){
    string=product.default_product_translation.description;
           //string=string.replace(/[^a-zA-Z <(?:.|\n)*?> ]+/g, '');//match(/[a-zA-Z ]+/g);

           if(string.length>170)
           {
            description =string.substr(0, 167)+"...<hr>";
          }
          else
          {
            description =string.substr(0, 170)+"<hr>";
          }
        }

       var barcode="";
        if(product.sku.barcode!=null){
          barcode='<span class="txt-muted d-inline-block">'+product.sku.barcode+'</span>';
        }else{
          barcode='<span> </span>';
        }

        var offer="";
        if(product.sku.my_price>0){
          if(product.sku.market_price-product.sku.my_price >= 0)
          {

            offer=(product.sku.market_price-product.sku.my_price)*100/product.sku.market_price;
            offer=offer.toFixed(2);
            offer='<span class="text-primary product-price m-0">₹'+product.sku.my_price+'</span> <span class="done-task txt-muted">₹'+product.sku.market_price+'</span> <span class="offer text-primary"> <strong> '+offer+' % @lang("product.off") </strong> </span>';
          }else{
            offer='<span class="text-primary product-price">₹'+product.sku.my_price+'</span>';
          }
        }

       var brand="";
        if(product.brand!=null){
          brand=product.brand.default_brand_translation.brand_name;
        }
        var star_color='<span class="fa fa-star checked filled p-1"></span>';
        var star='<span class="fa fa-star non-filled p-1"></span>';

        var rating_count="1";
        if(product.review_count!=null){
          rating_count=product.review_count.rating_count;
        }
        rating_count='<span class="text-muted">('+rating_count+')</span>';

        image='<center><img class="img quick_view_image center" src="{{$base_url}}/storage/app/'+product.product_image+'" alt="Big_Details" onerror=this.src="{{$base_url}}/files/assets/images/product.png"; align="middle"> </center>';

        product_url='<a href="{{$base_url}}/product/'+product.product_url+' ?pid='+product.product_id+'&skuid='+product.sku.sku_id+'&pvid='+product.sku.parent_variant_id+'&cvid='+product.sku.child_variant_id+'" target="_blank" class="btn btn-primary waves-effect waves-light m-r-20"><span class="m-l-10">@lang("product.see_product_details")</span></a>';

        $('#quick-p-image').html("");
        $('#product-barcode').html("");
        $('#product-name').html("");
        $('#brand').html("");
        $('#offer').html("");
        $('#product-url').html("");

        $('#quick-p-image').append(image);
        $('#product-barcode').html(barcode);
        $('#product-name').text(product_name);
        if(brand!=null){
          $('#brand').html('<strong>'+brand+'</strong>');
        }
       /* else{
          $('#brand').hide();
        }*/
        
        $('#offer').html(offer);
        $('#product-url').html(product_url);

        var rting=4;
        if(product.review_count!=null){
          rting=product.review_count.rating;
        }


        if(brand==""){
          $('#brand').hide();
        }
        stock="";
        $('#inventory-availablity').show();
        if(product.track_inventory==1){
          if(product.sku.quantity <= 0){
            stock='<label class="text-danger">@lang("product.out_of_stock") </label>';
          }else{
            stock='<label class="text-success"> <strong>@lang("product.stock_in") </strong></label>';
          }
        }else{
          $('#inventory-availablity').hide();
          stock='';
        }
        $('#availablity').html("");
        $('#availablity').append($(stock));
        $("#rating_star").html("");
        for(i=1;i<=5;i++){
          if(i<=rting){
            $("#rating_star").append($(star_color));
          }
          else{
            $("#rating_star").append($(star));
          }
        }
        $("#rating_star").append($(rating_count));
        $("#testmodal").modal('show');
      })
});
</script>
