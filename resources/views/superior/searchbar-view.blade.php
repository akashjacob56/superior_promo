@section('searchbarview')  
      <div class="modal-dialog" id="">
        <div class="modal-content">
          <div class="modal-body-search">
                   @if($data['product_translation']!="[]")
               <ul class="list-group">
              
               @foreach($data['products'] as $product)
               @if($product!=="")
                <li class="list-group-item">
                    <a href="{{$base_url}}/product/{{$product->product_url}}?pid={{$product->product_id}}"class="product-cart-hover">{{$product->default_product_translation->product_name}}</a></li>
                 
                 @endif
                @endforeach
               </ul>
               
                 </div>
                 @endif
\
          </div>
        </div>
      </div>
@endsection