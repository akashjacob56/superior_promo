@section('searchbarview')  
      <div class="modal-dialog" id="">
        <div class="modal-content">
          <div class="modal-body modal-body-search">
             <div class="row"> 
              
              <div class="col-md-9 vl">
              @if($data['product_translation']!="[]")
                <div class="row">
               @foreach($data['products'] as $product)
               @if($product!=="")
                 <div class="col-md-2">
                   <figure class="search-pro-view">
                    <a href="/product/{{$product->product_url}}?pid={{$product->product_id}}"class="product-cart-hover">
                     <img class="search_img" src="/storage/app/{{$product->product_image}}" alt="views-search"/>
                   </a>
                   </figure>
                   </div>
                 @endif
                @endforeach
                 </div>
                 @endif
              </div>
                        
              
               <div class="col-md-3 searchbar-category">
                @if($data['category_translation']!="[]")
                @foreach($data['category_translation'] as $category)
                 @if($category->category_product->count()>0)
                  <div class="row">
                    <a href="/shop?category_id={{$category->category_id}}"class="product-cart-hover display-contents">
                    <div class="col-md-8 views-search">{{$category->category_name}}</div>
                  
                    <div class="col-md-4 views-search ">{{$category->category_product->count()}}</div>
                    
                   </a>
                   </div>
                  @endif
                 @endforeach

                @else

                @if($data['product_translation']!="[]")
               
               @foreach($data['product_translation'] as $getproduct)
               @if($product!=="")
                  <div class="row">
                    <a href="/product/{{$product->product_url}}?pid={{$product->product_id}}"class="product-cart-hover display-contents">
                    <div class="col-md-8 views-search">{{$getproduct->product_name}}</div>
                   </a>
                   </div>
                 @endif
                @endforeach
                
                 @endif

                 @endif
               </div>


            </div>
          </div>
        </div>
      </div>
@endsection