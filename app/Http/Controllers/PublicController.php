<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\TermCondition;
use App\Policy;
use App\Category;
use App\Cart;
use App\CategoryHierarchy;
use App\CategoryTranslation;
use App\CategoryProduct;
use App\Sku;
use App\ProductTranslation;
use App\Contact;
use App\Product;
use App\Slider;
use App\RecentViewProduct;
use App\Label;
use App\Language;
use App\Brand;
use App\OfferBlock;
use App\ProductReview;
use App\ProductImage;
use App\ReviewImage;
use App\Toast;
use App\Variant;
use App\ShippingCharge;
use App\Wishlist;
use Auth;
use App\User;
Use Hash;
use App\Address;
use App\ComplaintType;
use App\Complaint;
use App\Comment;
use Config;
use App\Order;
use App\Pincode;
use App\Gst;
use App\OrderProduct;
use App\Country;
use App\State;
use App\City;
use App\Notification;
use App\NotificationClass;
use App\NotificationTranslation;
use App\NotificationHistory;
use DataTables;
use App\AddressSetting;
use App\PromocodeCondition;
use App\Promocode;
use Carbon\Carbon;
use App\About;
use App\ReturnPolicyTranslation;
use App\RegistrationToken;
use App\DeliveryOption;
use App\RegistrationSetting;
use App\Area;
use App\GlobalOrder;
use App\Transaction;
use App\PaymentOption;
use App\DeliveryStatus;
use App\OrderAttachment;
use App\PreserveInventory;
use App\NotificationRead;
use App\SellerDetail;
use App\Razorpay;
use App\Discount;
use App\DiscountApply;
use App\DiscountCustomerApply;
use App\DiscountApplied;
use App\CountryTranslation;
use App\StateTranslation;
use App\CityTranslation;
use App\AreaTranslation;
use Storage;
use File;
use App;
use App\NewsLetter;
use App\CategorySeller;
use App\PayUMoney;
use App\ReturnPolicy;
use App\OrderLog;
use App\DeliveryStatusTranslation;
use App\HomeAbout;
use App\Faq;
use App\SellerReview;
use App\ProductEnquiry;
use App\PayPal;
use App\Section;
use App\SectionTranslation;
use App\SectionProduct;
use App\Blog;
use App\BlogDetail;
use App\VariantOption;
use App\VariantTranslation;
use App\VariantOptionTranslation;
use App\PaytmOrder;
//mahesh
use App\ProductColorGroup;
use App\ProductColor;
use App\Color;
use App\ProductPrice;
use App\Imprint;
use App\ImprintPrice;
use App\CartItems;
use App\CartItemArtProofs;
use App\CartItemImprints;
use App\CartItemImprintColors;
use App\CartItemColors;
use View;
use App\OrderItem;
use App\ArtProof;
use App\ProductOption;
use App\ProductOptionPrice;
use App\CartItemProductOptions;
use App\CartItemSave;
use App\SubscribersEmail;
use App\ArtWork;
use App\OrderProcess;
use App\ProductSample;
use App\ImprintColor;
use App\ProductSubOption;
use App\ProductSubOptionPrices;
use App\Apparel;
use App\ProductApparel;
use App\CartItemSizeGroups;
use App\CartItemSizes;
use App\ReorderShow;
use App\ContactUs;
use App\OurGuarantee;
use App\CartitemProductSubOptions;
use DB;
use PDO;
use DateTime;

require 'vendor/autoload.php'; 
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class PublicController extends Controller{


public function PostProductReview(Request $request){

$user_id=$this->getLoginUserId();
$rating=$request->rating;
$date=Carbon::now();
$product_id=$request->product_id;
$description=$request->description;

$product_review= new ProductReview();
$product_review->review=$description;
$product_review->rating=$rating;
$product_review->date=$date;
$product_review->user_id=$user_id;
$product_review->product_id=$product_id;
$product_review->save();
return true;

}



public function PostSavedCartsSingle(Request $request){  

$cart_item_id=$request->cart_item_id;
$user_id=$this->getLoginUserId();

if($cart_item_id!=""){
$item=CartItemSave::where('cart_item_id',$cart_item_id)->first();

if($item==""){ 
$Saveitem = new CartItemSave();
$Saveitem->cart_item_id=$cart_item_id;
$Saveitem->user_id=$user_id;
$Saveitem->save();
}else{
  $Saveitem="";
}
}

if($Saveitem!="")
  {
    $this->data['data']=1;
    $this->response['status']="true";
    $this->response['data']=$this->data;
 }else{

    $this->data['data']=0;
    $this->response['status']="false";
    $this->response['data']=$this->data;
 }

return $this->response;

}


public function getBlog(Request $request){
    $page_no=1;
    
    $blogs = Blog::where('is_deleted','0')->with('blog_type')->orderBy('blog_id','desc')->paginate(12);
    
    return view('superior.blog')->with('blogs',$blogs);
  }



  public function getBlogDetails(Request $request){
    $seo_title="";
    $blog_id=$request->url;

    /*$url=str_replace('-', ' ', $request->url);*/
    
    $five_blogs = Blog::where('is_deleted','0')->orderBy('blog_id','desc')->take(5)->get();

    $blogs = Blog::where('is_deleted','0')->with('blog_type')->orderBy('blog_id','desc')->get();

    $blog=Blog::where('is_deleted','0')->with('blog_type')->where('url',$blog_id)->first();
    //echo $blog;die;
    if ($blog!="") {
      $blog->view_count=$blog->view_count+1;
      $blog->save();
      $seo_title=$blog->seo_title;
    }else{
      return redirect('/');
    }

    return view('superior.blog-details')->with('blog',$blog)->with('five_blogs',$five_blogs)->with('blogs',$blogs)->with('seo_title',$seo_title);
    
  }



public function getMyAccSelectOrderHistoryDays(Request $request){
    $user_id=$this->getLoginUserId();

    $days = $request->days;
    // $orders = Order::where('created_at','>',now()->subDays(35)->endOfDay())->get();
    $order_history=Order::where('is_reorder',0)->where('user_id',$user_id)->with('orderitems')->where('created_at','>',now()->subDays($days)->endOfDay())->orderBy('id','desc')->get();

    if($order_history!="[]"){
      $order_counts = count($order_history);
      date_default_timezone_set('America/New_York');
      $today_current_date = date('m-d-Y');

      $view=View::make('superior.select-order-history')->with('order_history',$order_history)->with('today_current_date',$today_current_date);
      $sections=$view->renderSections();

    $data=array("sections"=>$sections['select-ord-hist'],'order_counts'=>$order_counts);
    return $data;

    }else{
      $order_counts = "";
      $data=array("sections"=>"",'order_counts'=>$order_counts);
      return $data;
    }

  }
  
  
  public function SearchBarHeader(Request $request){
          
        $keyword=$request->keyword;

        $product_translation = ProductTranslation::with('product')->where('product_name','like','%'.$keyword.'%')->orWhere('product_id','like','%'.$keyword.'%')->take(5)->get();
       

        $product_ids = ProductTranslation::with('product')->where('product_name','like','%'.$keyword.'%')->orWhere('product_id','like','%'.$keyword.'%')->take(5)->pluck('product_id');
      

       $products = Product::whereIn('product_id',$product_ids)->with('product_translation')->get();
      
       /*$category_translation = CategoryTranslation::with('category_product')->where('category_name','like','%'.$keyword.'%')->get();*/
       
      
       $product_ids = ProductTranslation::with('product')->where('product_name','like','%'.$keyword.'%')->pluck('product_id');  


        if($product_ids!=""){
            $category_ids=CategoryProduct::whereIn('product_id',$product_ids)->pluck('category_id');  
         }else{
            $category_ids="";
         }
        
         if($category_ids!=""){
           $category_translation= CategoryTranslation::with('category_product')->whereIn('category_id',$category_ids)->take(10)->get();
         }else{
           $category_translation="";
         }

      
        $data=array("category_translation"=>$category_translation,"product_translation"=>$product_translation,"products"=>$products);

        $view=View::make('superior.searchbar-view')->with('data',$data);
        $sections=$view->renderSections();
        

        $this->data['data']=$sections['searchbarview']; 
        $this->response['status']="true";
        $this->response['data']=$this->data;
        return $this->response;

}    




    
/*public function SearchBarHeader(Request $request){

        $keyword=$request->keyword;
        
        $category_translation = CategoryTranslation::with('category_product')->where('category_name','like','%'.$keyword.'%')->get();
        
        
        $product_translation = ProductTranslation::with('product')->where('product_name','like','%'.$keyword.'%')->take(5)->get();
        
        $product_ids = ProductTranslation::with('product')->where('product_name','like','%'.$keyword.'%')->take(5)->pluck('product_id');
        
        $products = Product::whereIn('product_id',$product_ids)->with('product_translation')->get();
        
      
        
        
        $data=array("category_translation"=>$category_translation,"product_translation"=>$product_translation,"products"=>$products);
        
       
        $view=View::make('superior.searchbar-view')->with('data',$data);
        $sections=$view->renderSections();
        
        
        $this->data['data']=$sections['searchbarview']; 
        $this->response['status']="true";
        $this->response['data']=$this->data;
        return $this->response;


}    
*/


public function getMyAccSearchOrderHistory(Request $request){
    $user_id=$this->getLoginUserId();
    $order_id = $request->order_id;

    if($order_id!=""){
        $order_history=Order::where('id',$order_id)->where('is_reorder',0)->where('user_id',$user_id)->with('orderitems')->get();
    }else{
        $order_history=Order::where('is_reorder',0)->where('user_id',$user_id)->with('orderitems')->orderBy('id','desc')->get();
    }

    if($order_history!="[]"){
      $order_counts = count($order_history);
      date_default_timezone_set('America/New_York');
      $today_current_date = date('m-d-Y');

      $view=View::make('superior.search-order-history')->with('order_history',$order_history)->with('today_current_date',$today_current_date);
      $sections=$view->renderSections();

    $data=array("sections"=>$sections['search-ord-hist'],'order_counts'=>$order_counts);
    return $data;

    }else{
      $order_counts = "";
      $data=array("sections"=>"",'order_counts'=>$order_counts);
      return $data;
    }
  }


public function getOurGuarantee(Request $request){
 $OurGuarantee= OurGuarantee::where('status_id',1)->get();
 return view('superior.our-guarantee')->with("OurGuarantee",$OurGuarantee);
}



/* edit cart item section*/
public function getEditCartItem(Request $request){

$product_id=$request->pid;

$cart_item_id=$request->cid;  

$old_cart_item_data=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('id',$cart_item_id)->first();


$CartItemProductOptions=CartItemProductOptions::with('cartitemSubproductOptions')->where('cart_item_id',$cart_item_id)->get();



$CartItemSizeGroups=CartItemSizeGroups::where('cart_item_id',$cart_item_id)->with('cartitemsize')->get();
$CartItemArtProofs=CartItemArtProofs::where('cart_item_id',$cart_item_id)->get();


$product_categorydata=CategoryProduct::where('product_id',$product_id)->with('product_translation')->with('category_link')->first();

$category_id=$product_categorydata->category_id;
$category_id;

$child_category=CategoryHierarchy::where('child_category_id',$category_id)->first();

if($child_category!=""){
  $parent_category_id=$child_category->parent_category_id;

  $parent_category=CategoryHierarchy::where('parent_category_id',$parent_category_id)->first();
}else{
    $child_category="";
    $parent_category="";
}
 
/*----------------------------------------------------------------------------------------*/

$product_option=ProductOption::where('product_id',$product_id)->with('product_sub_option')->get(); 

$product_Apparels=ProductApparel::where('product_id',$product_id)->with('apparel')->get();


$product=Product::where('product_id',$product_id)->first();

$product_translation_id=$product->product_translation_id;
$productdetails=ProductTranslation::where('product_translation_id',$product_translation_id)->first();

/*product color group id*/
$product_colors=ProductColorGroup::where('product_id',$product_id)->first();

if($product_colors!=""){
$product_color_group_id=$product_colors->id;
/*product colors*/
$product_color=ProductColor::where('product_color_group_id',$product_color_group_id)->pluck('color_id');
$all_color=Color::whereIn('id',$product_color)->get();
/*prodct color images*/

$product_sub_images=ProductColor::where('product_color_group_id',$product_color_group_id)->with('color')->get();

$get_product_colors=Color::whereIn('id',$product_color)->get();

}else{
 $all_color="";
 $product_sub_images="";
 $get_product_colors="";
}


/*product pricing*/
$product_pricing=ProductPrice::where('product_id',$product_id)->get();

/*for imprints*/
$imprints=Imprint::where('product_id',$product_id)->with('imprint_price')->with('imprint_colors')->get();


$all_product_images=ProductImage::where('product_id',$product_id)->get();

$product_review=ProductReview::where('product_id',$product_id)->get();

// Related Products Category Wise
/*$category_ids = CategoryProduct::where('product_id',$product_id)->pluck('category_id');
$category_product_ids = CategoryProduct::whereIn('category_id',$category_ids)->pluck('product_id');
$related_products = Product::whereIn('product_id',$category_product_ids)->with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->get();
*/

$category_ids = CategoryProduct::where('product_id',$product_id)->pluck('category_id');
$category_product_ids = CategoryProduct::whereIn('category_id',$category_ids)->pluck('product_id');
$related_products = Product::whereIn('product_id',$category_product_ids)->with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->take(10)->get();



/*$product_ids = Product::pluck('product_id');
$product_ids_from_prices = ProductPrice::whereIn('product_id',$product_ids)->orderBy('per_item_price','asc')->select('product_id')->groupBy('product_id')->pluck('product_id');
$product_ids_from_prices=$product_ids_from_prices->toArray();
$product_ids_ordered = implode(',', $product_ids_from_prices);
$lower_price_products = Product::whereIn('product_id', $product_ids_from_prices)->orderByRaw("FIELD(product_id, $product_ids_ordered)");
$lower_price_products = $lower_price_products->with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->get();*/


$product_ids_from_prices = ProductPrice::select('product_id')->groupBy('product_id')->take(10)->pluck('product_id');


$lower_price_products = Product::whereIn('product_id', $product_ids_from_prices);

$lower_price_products = $lower_price_products->with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->take(10)->get();



/*for all data */
$data=array("product"=>$product,"productdetails"=>$productdetails,"all_color"=>$all_color,"product_sub_images"=>$product_sub_images,"product_pricing"=>$product_pricing,"imprints"=>$imprints,"all_product_images"=>$all_product_images,"get_product_colors"=>$get_product_colors,"product_review"=>$product_review,"related_products"=>$related_products,"lower_price_products"=>$lower_price_products,"product_option"=>$product_option,"product_categorydata"=>$product_categorydata,"child_category"=>$child_category,"parent_category"=>$parent_category,"product_Apparels"=>$product_Apparels,"old_cart_item_data"=>$old_cart_item_data,"CartItemProductOptions"=>$CartItemProductOptions,"CartItemSizeGroups"=>$CartItemSizeGroups,"CartItemArtProofs"=>$CartItemArtProofs);

 return view('superior.edit-cart-item')->with('data',$data);

}





/*for checkout populate country wise sattes*/

public function getlocationsCountryCheckout(Request $request){
    $country_id=$request->country_id;
    $states=State::where('country_id',$country_id)->where('state_id','!=',1)->where('status_id',1)->with('state_translation')->get();
 
       $data = array('states'=>$states);
      return $data;

}


public function getlocationsCountry(Request $request){
    $order_id = $request->order_id;
    $country_id=$request->country_id;
    
    $states=State::where('country_id',$country_id)->where('state_id','!=',1)->where('status_id',1)->with('state_translation')->get();
    $data = array('order_id'=>$order_id,'states'=>$states);
    return $data;

  }

public function removeCartDiscount(Request $request){

$user_id=$this->getLoginUserId();
$discount_id=$request->id;
$cart=Cart::where('user_id',$user_id)->where('discount_id',$discount_id)->update(['discount_id'=>0]);
return redirect('cart');
}




public function postMyAccProfileUpdateEmail(Request $request){
    $user_id=$this->getLoginUserId();
    $email = $request->email;

    $user = User::find($user_id);
    $user->email = $email;
    $user->save();
    return $user;

  }

   public function postImprintOptionSelect(Request $request){
    $imprint_id = $request->imprint_id;
    $max_colors = $request->max_colors;


    $imprint_colors = ImprintColor::where('imprint_id',$imprint_id)->with('colors')->get();
    
    // echo $imprint_colors;die;
    


    $view=View::make('superior.imprint-add-color-btn')->with('imprint_id',$imprint_id)->with('imprint_colors',$imprint_colors)->with('max_colors',$max_colors);
    $sections=$view->renderSections();

    $data=array("sections"=>$sections['imprint-add-color-btn-section'],"imprint_id"=>$imprint_id,"max_colors"=>$max_colors);

    $this->data['data']=$data;
    $this->response['status']="true";
    $this->response['data']=$this->data;
     return $this->response;

  }


public function postReorder(Request $request){
      
      $product_id = $request->product_id;
      $order_id = $request->order_id;
      //Main working start
        $order = Order::where('id',$order_id)->first();
      
        $product = Product::where('product_id',$product_id)->first();
        $product_pricing=ProductPrice::where('product_id',$product_id)->first();

      //Exactly Same No Checkbox Start
      if($request->exactly_same_no_checkbox=="true"){

          $reorder_exactly_same = "no";

        //Quantity Going To Change Start
                if($request->exactly_same_is_quantity_change_yes=="true"){
                          $quantity_change = "yes";
                          $quantity = $request->quantity;
                   }elseif(gettype($request->exactly_same_is_quantity_change_yes)=="string"||$request->exactly_same_is_quantity_change_yes=="false"){
                        $quantity_change = "no";
                        $order_item = OrderItem::where("product_id",$product_id)->where('order_id',$order_id)->first();
                        if($order_item!=""){
                            $quantity = $order_item->quantity;
                        }

                  }
                //Quantity Going To Change End

                //item color going to change start
                if($request->item_color_going_to_change_yes=="true"){
                      $item_color_change="yes";
                     $main_selected_color = $request->main_selected_color;
                }elseif($request->item_color_going_to_change_yes=="false"||gettype($request->item_color_going_to_change_yes)=="string"){
                  $item_color_change="no";
                  $order_item = OrderItem::where("product_id",$product_id)->where('order_id',$order_id)->first();
                  
                  if($order_item!=""){

                      $cart_item_id = $order_item->cart_item_id;
                      $cart_item_colors = CartItemColors::where('cart_item_id',$cart_item_id)->first();
                     
                      if($cart_item_colors!=""){
                          $product_color = ProductColor::where('product_color_group_id',$cart_item_colors->product_color_group_id)->where('id',$cart_item_colors->product_color_id)->where('color_id',$cart_item_colors->color_id)->first();
                          if($product_color!=""){
                            $main_selected_color = $product_color->color_id;
                          }                       
                      }
                      else{
                        $main_selected_color = "";
                      }
                  }
                  
                }
                //item color going to change end


                //imprint_color going to change Start
                if($request->imprint_color_going_to_change_yes=="true"){
                      $imprint_color_change = "yes";
                      $imprint_ids = explode(',',$request->imprint_ids);
                      $imprint_color_ids = json_decode($request->imprint_color_ids);
                      

                }elseif($request->imprint_color_going_to_change_yes=="false"||gettype($request->imprint_color_going_to_change_yes)=="string"){
                      $imprint_color_change = "no";
                      $order_item = OrderItem::where("product_id",$product_id)->where('order_id',$order_id)->first();

                      if($order_item!=""){
                        $cart_item_id = $order_item->cart_item_id;
                        $cart_item_imprints = CartItemImprints::where('cart_item_id',$cart_item_id)->get();
                        // $imprint_ids = $cart_item_imprints->pluck('imprint_id');

                        $imprint_ids = [];
                        $imprint_color_ids = [];

                        if($cart_item_imprints!="[]"){
                          foreach ($cart_item_imprints as $cart_item_imprint){
                            $imprint_id = $cart_item_imprint->imprint_id;
                            array_push($imprint_ids,$imprint_id);

                            $cart_item_imprint_colors = CartItemImprintColors::where('cart_item_imprint_id',$cart_item_imprint->id)->get();

                            $cart_item_imprint_color_list = [];

                            foreach ($cart_item_imprint_colors as $cart_item_imprint_color) {
                               $color_id = $cart_item_imprint_color->color_id;
                               array_push($cart_item_imprint_color_list,$color_id);
                             } 
                              array_push($imprint_color_ids,$cart_item_imprint_color_list);
                        }
                      }else{
                        $imprint_ids = [];
                        $imprint_color_ids = [];
                      }
                        
                      }else{
                        $imprint_ids = [];
                        $imprint_color_ids = [];
                      }

                      }
                     
                // } 
                //imprint color going to change End

                //Artwork Going To Provide Start
                if($request->artwork_new_going_to_provide_yes=="true"){
                  $artwork_change = "yes";

                  if($request->files!=""){
                       if($request->hasFile("files")){
                         $i=0;
                             foreach($request['files'] as $imgs)
                             { 
                               if($i==0){
                                 $source=$imgs;
                                 $artwork_path = $this->addCompressImage($source,"artwork-images");
                               }
                                $i++;
                             }
                           } 
                       }




                }elseif($request->artwork_new_going_to_provide_yes=="false"||gettype($request->artwork_new_going_to_provide_yes)=='string'){

                      $artwork_change = "no";
                      $order_item = OrderItem::where("product_id",$product_id)->where('order_id',$order_id)->first();

                      if($order_item!=""){



                          $cart_item_id = $order_item->cart_item_id;
                          $cart_item_art_proof = CartItemArtProofs::where('cart_item_id',$cart_item_id)->first(); 
                          if($cart_item_art_proof!=""){
                            $artwork_path = $cart_item_art_proof->path;
                          }else{
                            $artwork_path = "";
                          }

                      }else{
                        $artwork_path = "";
                      }
                }
                //Artwork Going To Provide End

      }else{

            //exactly same no checkbox false
        $reorder_exactly_same = "yes";
        $quantity_change="no";
        $item_color_change="no";
        $imprint_color_change = "no";
        $artwork_change = "no";

        $order_item = OrderItem::where("product_id",$product_id)->where('order_id',$order_id)->first();

        if($order_item!=""){
            //quantity
            $quantity = $order_item->quantity;
           
            //item color selection
            $cart_item_id = $order_item->cart_item_id;
            $cart_item_colors = CartItemColors::where('cart_item_id',$cart_item_id)->first();

            if($cart_item_colors!=""){
              $product_color = ProductColor::where('product_color_group_id',$cart_item_colors->product_color_group_id)->where('id',$cart_item_colors->product_color_id)->where('color_id',$cart_item_colors->color_id)->first();
              if($product_color!=""){
                            $main_selected_color = $product_color->color_id;
              }                       
            }else{
              $main_selected_color="";
            }

            
            

            //imprint ids and imprint colors
                        $cart_item_imprints = CartItemImprints::where('cart_item_id',$cart_item_id)->get();
                        
                        $imprint_ids = [];
                        $imprint_color_ids = [];

                        if($cart_item_imprints!="[]"){
                          foreach ($cart_item_imprints as $cart_item_imprint){
                            $imprint_id = $cart_item_imprint->imprint_id;
                            array_push($imprint_ids,$imprint_id);

                            $cart_item_imprint_colors = CartItemImprintColors::where('cart_item_imprint_id',$cart_item_imprint->id)->get();

                            $cart_item_imprint_color_list = [];

                            foreach ($cart_item_imprint_colors as $cart_item_imprint_color) {
                               $color_id = $cart_item_imprint_color->color_id;
                               array_push($cart_item_imprint_color_list,$color_id);
                             } 

                            array_push($imprint_color_ids,$cart_item_imprint_color_list);

                        }
                      }else{
                        $imprint_ids = [];
                        $imprint_color_ids = [];
                      }


                  
                  //Art proofs

                      $cart_item_id = $order_item->cart_item_id;
                          $cart_item_art_proof = CartItemArtProofs::where('cart_item_id',$cart_item_id)->first(); 
                          if($cart_item_art_proof!=""){
                            $artwork_path = $cart_item_art_proof->path;
                          }else{
                            $artwork_path = "";
                          }




        }

        
      }
      //Exactly Same No Checkbox End





      //Order Deliverred By No Checkbox
      if($request->order_delivered_by_No_checkbox=="true"){
          $order_delivered_by = "no";
          if($request->as_soon_as_possible_reorder_receive_date=="true"){
              $received_date = "ASAP";
          }

          if($request->need_this_reorder_received_date=="true"){
            $received_date = $request->received_date;
            $received_date = date("m-d-Y",strtotime($received_date));
          }

      }else{
          $order_delivered_by = "yes";
          $received_date = "ASAP";
      }


      //Shippin Address
      if($request->shipp_addr_ord_same_as_befr_checkbox=="true"){
          $shipping_address_checkbox = "no";
          $user_id=$this->getLoginUserId();
          $address = Address::orderBy('address_id','desc')->where('user_id',$user_id)->where('is_shipping',1)->where('is_default_add',1)->first();
          
          $shipping_first_name = $address->name;
          $shipping_last_name = $address->last_name;
          $shipping_company_name = $address->company_name;
          $shipping_address_line_1 = $address->address;
          $shipping_address_line_2 = $address->address2;
          $shipping_zip = $address->zip_code;
          $shipping_day_telephone = $address->telephone;
          $shipping_ext = $address->ext;
          $shipping_fax = $address->fax;

          $city_translation = CityTranslation::where('city_id',$address->city_id)->first();
          $shipping_city = $city_translation->city_name;

          $state_translation = StateTranslation::where('state_id',$address->state_id)->first();
          $shipping_state = $state_translation->state_name;

          $country_translation = CountryTranslation::where("country_id",$address->country_id)->first();
          $shipping_country = $country_translation->country_name;
        
      }else{
          $shipping_address_checkbox = "no";
        
          $shipping_first_name = $order->shipping_first_name;
          $shipping_last_name = $order->shipping_last_name;
          $shipping_company_name = $order->shipping_company_name;
          $shipping_address_line_1 = $order->shipping_address_line_1;
          $shipping_address_line_2 = $order->shipping_address_line_2;
          $shipping_zip = $order->shipping_zip;
          $shipping_day_telephone = $order->shipping_day_telephone;
          $shipping_ext = $order->shipping_ext;
          $shipping_fax = $order->shipping_fax;
          $shipping_city = $order->shipping_city;
          $shipping_state = $order->shipping_state;
          $shipping_country = $order->shipping_country;

      }

      //Billing Addresss
      if($request->bill_addr_ord_same_as_befr_checkbox=="true"){
            $billing_address_checkbox = 'no';
            $user_id=$this->getLoginUserId();
            $address = Address::orderBy('address_id','desc')->where('user_id',$user_id)->where('is_billing',1)->first();
            $billing_first_name = $address->name;
            $billing_last_name = $address->last_name;
            $billing_company_name = $address->company_name;
            $billing_address_line_1 = $address->address;
            $billing_address_line_2 = $address->address2;
            $billing_zip = $address->zip_code;
            $billing_day_telephone = $address->telephone;
            $billing_ext = $address->ext;
            $billing_fax = $address->fax;

            $city_translation = CityTranslation::where('city_id',$address->city_id)->first();
            $billing_city = $city_translation->city_name;

            $state_translation = StateTranslation::where('state_id',$address->state_id)->first();
            $billing_state = $state_translation->state_name;

            $country_translation = CountryTranslation::where("country_id",$address->country_id)->first();
            $billing_country = $country_translation->country_name;
      }else{
            $billing_address_checkbox = 'yes';
            $billing_first_name = $order->billing_first_name;
            $billing_last_name = $order->billing_last_name;
            $billing_company_name = $order->billing_company_name;
            $billing_address_line_1 = $order->billing_address_line_1;
            $billing_address_line_2 = $order->billing_address_line_2;
            $billing_zip = $order->billing_zip;
            $billing_day_telephone = $order->billing_day_telephone;
            $billing_ext = $order->billing_ext;
            $billing_fax = $order->billing_fax;
            $billing_city = $order->billing_city;
            $billing_state = $order->billing_state;
            $billing_country = $order->billing_country;

      }

//Main working end



// echo $artwork_path;die;

            // Creating Cart Item Data ---------------
                      $user_id=$this->getLoginUserId();
                      
                        $cart=new Cart();
                        $cart->session="xyz";
                        $cart->user_id=$user_id;
                        $cart->discount_id=5;
                        $cart->is_order = 1;
                        $cart->save();
                      
                        $cart_id=$cart->id;

                        $cart_items=new CartItems();
                        $cart_items->cart_id=$cart_id;
                        $cart_items->product_id=$product_id;
                        $cart_items->quantity=$quantity;
                        $cart_items->regular_price=$product_pricing->per_item_price;
                        $cart_items->price=$product_pricing->per_item_sale_price;
                        $cart_items->is_sale=$product_pricing->is_sale;
                        $cart_items->setup_price=$product_pricing->setup_price;
                        // $cart_items->imprint_comment=$request->summernotedata;
                        // $cart_items->estimation_zip=$request->zipcode;

                        $cart_items->estimation_shipping_code=$product->shipping_from_zip_code;
                        $cart_items->estimation_shipping_method=$product->custom_method;
                        $cart_items->estimation_shipping_price=$product->shipping_additional_value;
                        $cart_items->shipping_method=$product->custom_method;

                        // if($request->is_ship=="true"){
                        // $cart_items->own_account_number=$request->acnumber;
                        // $cart_items->own_shipping_system=$request->method;
                        // $cart_items->own_shipping_type=$request->carrier;
                        // }
                       
                        $cart_items->received_date=$received_date;
                       
                        $cart_items->art_file_path=$artwork_path;
                        $cart_items->art_file_name="art_image";
                       
                       /*
                       $cart_items->later_size_breakdown=$request->artwork_file;
                       $cart_items->tax_exemption=$request->artwork_file;
                       $cart_items->is_sample=$request->artwork_file;
                       */

                       $cart_items->save();

                       $new_cart_item_id = $cart_items->id;
              // Creating Cart Item Data End ---------------



                        // Cart Item Art Proofs Start

                        $cart_items_proof = new CartItemArtProofs();
                        $cart_items_proof->cart_item_id=$cart_items->id;
                        $cart_items_proof->name="artimage";
                        $cart_items_proof->path=$artwork_path;
                        $cart_items_proof->save(); 




                        //Imprint Data Start


                          if($imprint_ids!="[]"){

                            for ($i=0; $i <count($imprint_ids) ; $i++){
                                  $imprint_index = $i; 

                                  $imprint_id = $imprint_ids[$i];

                                  $imprint=Imprint::where('id',$imprint_id)->with('imprint_price')->with('imprint_colors')->first();
                                        
                                        $quantity_cart=$quantity;

                                        $imprint_price_quantities=ImprintPrice::where('imprint_id',$imprint_id)->where('quantity','<=',$quantity_cart)->pluck('quantity');

                                      $closest = null;
                                     foreach ($imprint_price_quantities as $item) {
                                        $item_quantity=$item;
                                        if ($closest === null || abs($quantity_cart - $closest) > abs($item_quantity - $quantity_cart)) {
                                           $closest = $item_quantity;
                                        }
                                     }

                                      $get_imprint_price=ImprintPrice::where('imprint_id',$imprint_id)->where('quantity',$closest)->first();


                                       /*return $get_imprint_price;*/
                                       if($get_imprint_price!=""){

                                          $CartItemImprints= new CartItemImprints();
                                          $CartItemImprints->cart_item_id=$cart_items->id;
                                          $CartItemImprints->imprint_id=$imprint->id;
                                          $CartItemImprints->imprint_name=$imprint->name;
                                          $CartItemImprints->item_price=$get_imprint_price->item_price;
                                          $CartItemImprints->color_setup_price=$get_imprint_price->color_setup_price;
                                          $CartItemImprints->color_item_price=$get_imprint_price->color_item_price;
                                          $CartItemImprints->setup_price=$get_imprint_price->setup_price;
                                          $CartItemImprints->save();

                                          if($imprint_color_ids[$i]!="[]"){
                                        // for ($j=0; $j <count($imprint_color_ids) ; $j++) {
                                            $color_ids = $imprint_color_ids[$i];
                                            if($color_ids!="[]"){
                                              foreach ($color_ids as $color_id) {
                                                  if($color_id!=""){
                                                    $Color=Color::where('id',$color_id)->first();
                                                    $CartItemImprintColors= new CartItemImprintColors();
                                                    $CartItemImprintColors->cart_item_imprint_id=$CartItemImprints->id;
                                                    $CartItemImprintColors->color_id=$Color->id;
                                                    $CartItemImprintColors->name=$Color->name;
                                                    $CartItemImprintColors->save();
                                                  }
                                              }
                                            }
                                        // }


                                      }

                                       }
                                      
                                      

                                      

                            }//endfor imprint
                          }


                       
                        //Imprint Data End


                        //ITEM COLOR SELECTION START
                          if($main_selected_color!=""){
                            $selected_color=$main_selected_color;
                            $product_color_data=ProductColor::where('color_id',$selected_color)->with('color_group')->with('color')->first(); 
                            $CartItemColors= new CartItemColors();
                            $CartItemColors->cart_item_id=$cart_items->id;
                            $CartItemColors->product_color_group_id=$product_color_data->product_color_group_id;
                            $CartItemColors->color_group_name=$product_color_data->color_group->name;   
                            $CartItemColors->product_color_id=$product_color_data->id;
                            $CartItemColors->color_group_id=$product_color_data->color_id;
                            $CartItemColors->color_id=$product_color_data->color->id;
                            $CartItemColors->color_name=$product_color_data->color->name;
                            $CartItemColors->save();
                          }
                        //ITEM COLOR SELECTION END


                        //Pricing Content



                          // product Price Subtotal start
                              $Product_prices=ProductPrice::where('product_id',$product_id)->where('count_from','<=',$quantity)->pluck('count_from');
                              $closest = null;
                              foreach ($Product_prices as $item) {
                              $item_quantity=$item;
                              if ($closest === null || abs($quantity - $closest) > abs($item_quantity - $quantity)) {
                                $closest = $item_quantity;
                              }       
                              }

                              $matches_quantitydata=ProductPrice::where('product_id',$product_id)->where('count_from',$closest)->first();
                              $per_item_price=$matches_quantitydata->per_item_sale_price;
                              $product_price_subtotal=$per_item_price*$quantity;
                              // Product Price Subtotal End

                            //Imprint Product Prices Start
                              // $new_cart_item_id 

                              $cart_item_imprints = CartItemImprints::where('cart_item_id',$new_cart_item_id)->get();
                                
                              
                              $all_imprint_setup_price = 0;
                              foreach ($cart_item_imprints as $cart_item_imprint){
                                  $setup_price =  $cart_item_imprint->setup_price;

                                  $cart_item_imprint_colors = CartItemImprintColors::where('cart_item_imprint_id',$cart_item_imprint->id)->get();
                                  


                                  if($cart_item_imprint_colors!="[]"){


                                      if(count($cart_item_imprint_colors)>1){

                                          
                                        for ($i=0; $i <count($cart_item_imprint_colors) ; $i++) { 

                                              if($i==0){
                                                $color_setup_price = $cart_item_imprint->color_setup_price;
                                                $color_item_price = 0;
                                              }else{
                                                $color_setup_price = $cart_item_imprint->color_setup_price;
                                                $color_item_price = $cart_item_imprint->color_item_price;
                                              }

                                        }

                                      }else{
                                          
                                        $color_setup_price = $cart_item_imprint->color_setup_price;
                                        $color_item_price = 0;
                                      }


                                  }else{
                                        $color_setup_price =0;
                                        $color_item_price = 0;
                                  }

                                  $imprint_total = $setup_price + $color_setup_price + $color_item_price;
                                  $all_imprint_setup_price = $all_imprint_setup_price + $imprint_total;    
                              }


                          //Imprint Product Prices End
                              $product_custom_price = $product->custom_cost;
                              if($product_custom_price!=""){
                                  $product_custom_price=$product->custom_cost;
                              }else{
                                  $product_custom_price=0;
                              }

                              $new_order_price = $product_price_subtotal+$all_imprint_setup_price+$product_custom_price;


                          //Start Order And Order Item =================================
                          $new_order = new Order;
                          $new_order->user_id = $user_id;
                          $new_order->shipping_first_name = $shipping_first_name;
                          // $new_order->shipping_middle_name = "";
                          $new_order->shipping_last_name = $shipping_last_name;
                          // $new_order->shipping_title = 
                          // $new_order->shipping_suffix = 
                          $new_order->shipping_company_name = $shipping_company_name;
                          $new_order->shipping_address_line_1 = $shipping_address_line_1;
                          $new_order->shipping_address_line_2 = $shipping_address_line_2;
                          $new_order->shipping_city = $shipping_city;
                          $new_order->shipping_state = $shipping_state;
                          $new_order->shipping_zip = $shipping_zip;
                          $new_order->shipping_country = $shipping_country;
                          // $new_order->shipping_province = 
                          $new_order->shipping_day_telephone = $shipping_day_telephone;
                          $new_order->shipping_ext = $shipping_ext;
                          $new_order->shipping_fax = $shipping_fax;

                          $new_order->billing_first_name = $billing_first_name;
                          // $new_order->billing_middle_name = 
                          $new_order->billing_last_name = $billing_last_name;
                          // $new_order->billing_title = 
                          // $new_order->billing_suffix = 
                          $new_order->billing_company_name = $billing_company_name;
                          $new_order->billing_address_line_1 = $billing_address_line_1;
                          $new_order->billing_address_line_2 = $billing_address_line_2;
                          $new_order->billing_city = $billing_city;
                          $new_order->billing_state = $billing_state;
                          $new_order->billing_zip = $billing_zip;
                          $new_order->billing_country = $billing_country;
                          // $new_order->billing_province = 
                          $new_order->billing_day_telephone = $billing_day_telephone;
                          $new_order->billing_ext = $billing_ext;
                          $new_order->billing_fax = $billing_fax;
                          // $new_order->multiple_location_comment = 
                          $new_order->cart_id = $cart_id;
                          // $new_order->discount_code = 
                          // $new_order->discount_id = 
                          $new_order->price = $new_order_price;
                          $new_order->total_price = $new_order_price;
                          // $new_order->discount_amount = 
                          $new_order->is_reorder = 1;
                          
                          $new_order->save();

                          $new_order_id = $new_order->id;


                          //Cart Item


                          $cart_item_new=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('id',$new_cart_item_id)->first();

                          $price=$cart_item_new->cartitemimprint->sum('setup_price');
                          $priceprodcut=$cart_item_new->quantity*$cart_item_new->price;
                          $order_price=$priceprodcut+$price;

                          $order_item= new OrderItem();

                           
                           $order_item->order_id=$new_order_id;

                           $order_item->tracking_user_id=$user_id; 
                           $order_item->stage_id=1; 
                           $order_item->item_price=$priceprodcut;//
                           $order_item->shipping_price='0.00';
                           // $order_item->cart_item_id='';

                           $order_item->product_id=$product_id; 
                           $order_item->quantity=$quantity;
                           $order_item->price=$order_price;//
                           $order_item->options_price=2;

                           // if($request->payment_method=1){
                           //     $order_item->not_paid=0;
                           // }else{
                           //    $order_item->not_paid=1;
                           // }

                           // $order_item->art_file_name=$carts->cart_item->art_file_name;
                           // $order_item->art_file_path=$carts->cart_item->art_file_path;

                           $order_item->po_number="";
                           $order_item->invoice_file="";

                           // $order_item->tax_exempt=$request->tex_excemption;
                           // $order_item->estimation_zip=$carts->cart_item->estimation_zip;
                           // $order_item->estimation_shipping_method=$carts->cart_item->estimation_shipping_method;
                           // $order_item->estimation_shipping_price=$carts->cart_item->estimation_shipping_price;

                           // $order_item->own_shipping_type=$carts->cart_item->own_shipping_type;
                           // $order_item->own_account_number=$carts->cart_item->own_account_number;
                           // $order_item->own_shipping_system=$carts->cart_item->own_shipping_system;

                           $order_item->shipping_method=$product->custom_method;

                           $order_item->vendor_id=$product->seller_id;

                           if($received_date!=""){
                              $order_item->received_date=$received_date;
                           }
                           
                           // $order_item->imprint_comment=$carts->cart_item->imprint_comment;

                           $order_item->shipping_first_name=$shipping_first_name;
                           $order_item->shipping_last_name=$shipping_last_name;
                           $order_item->shipping_company_name=$shipping_company_name;
                           $order_item->shipping_address_line_1=$shipping_address_line_1;
                           $order_item->shipping_address_line_2=$shipping_address_line_2;
                           $order_item->shipping_city=$shipping_city;
                           $order_item->shipping_state=$shipping_state;
                           $order_item->shipping_zip=$shipping_zip;
                           $order_item->shipping_country=$shipping_country;
                           $order_item->shipping_day_telephone=$shipping_day_telephone;
                           $order_item->shipping_ext=$shipping_ext;
                           $order_item->shipping_fax=$shipping_fax;

                           $order_item->billing_first_name=$billing_first_name;
                           $order_item->billing_last_name=$billing_last_name;
                           $order_item->billing_company_name=$billing_company_name;
                           $order_item->billing_address_line_1=$billing_address_line_1;
                           $order_item->billing_address_line_2=$billing_address_line_2;
                           $order_item->billing_city=$billing_city;
                           $order_item->billing_state=$billing_state;
                           $order_item->billing_zip=$billing_zip;
                           $order_item->billing_country=$billing_country;
                           $order_item->billing_day_telephone=$billing_day_telephone;
                           $order_item->billing_ext=$billing_ext;
                           $order_item->billing_fax=$billing_fax;

                           $order_item->cart_item_id = $new_cart_item_id;
                           $order_item->art_file_name="artwork-images";
                           $order_item->art_file_path=$artwork_path;
                           $order_item->save();

                           $new_order_item_id = $order_item->id;


       

                           $reorder_show = new ReorderShow;
                           $reorder_show->reorder_exactly_same = $reorder_exactly_same;
                           $reorder_show->order_id = $new_order_id;
                           $reorder_show->order_item_id = $new_order_item_id;
                           $reorder_show->quantity_change = $quantity_change;
                           $reorder_show->item_color_change = $item_color_change;
                           $reorder_show->imprint_color_change = $imprint_color_change;
                           $reorder_show->artwork_change = $artwork_change;
                           $reorder_show->order_delivered_by = $order_delivered_by;
                           $reorder_show->shipping_address = $shipping_address_checkbox;
                           $reorder_show->billing_address = $billing_address_checkbox;
                           $reorder_show->payment_same = 'yes';
                           $reorder_show->save();


                          //End Order And Order Item ===================================

                           

                           $this->response['status']="true";
                           $this->response['order_id']=$new_order_id;
                           return $this->response;


  }




public function PostSuboptionQuantity(Request $request){

  /*return dd($request->all());*/

$product_id=$request->product_id;
$quantity_cart=$request->quantity;
$sub_option_id=$request->sub_option_id;
$option_id=$request->option_id;

$Product_suboption_prices=ProductSubOptionPrices::where('product_sub_option_id',$sub_option_id)->where('quantity','<=',$quantity_cart)->pluck('quantity');

/*return $Product_suboption_prices;*/

if($Product_suboption_prices!="[]"){
$closest = null;
foreach ($Product_suboption_prices as $item) {
$item_quantity=$item;
if ($closest === null || abs($quantity_cart - $closest) > abs($item_quantity - $quantity_cart)) {
   $closest = $item_quantity;
}        
}

$matches_quantitydata=ProductSubOptionPrices::where('product_sub_option_id',$sub_option_id)->where('quantity',$closest)->first();


$option_details=ProductOption::with("product_sub_option")->where("id",$option_id)->first();


$item_price=$matches_quantitydata->item_price;
$setup_price=$matches_quantitydata->setup_price;

$suboption_total=$quantity_cart*$setup_price;

$this->response['msg']="Suboption Added Successfully";
$this->response['status']="true";
$this->response['suboption_total']=$suboption_total;
$this->response['option_details']=$option_details;

return $this->response;

}else{
   
   $this->response['msg']="Not applicable for this quantity";
   $this->response['status']="false";
   return $this->response;
}


/*$product_id=$request->product_id;
$quantity_cart=$request->quantity;

$Product_prices=ProductPrice::where('product_id',$product_id)->where('count_from','<=',$quantity_cart)->pluck('count_from');

$closest = null;
foreach ($Product_prices as $item) {
$item_quantity=$item;
if ($closest === null || abs($quantity_cart - $closest) > abs($item_quantity - $quantity_cart)) {
$closest = $item_quantity;
}        
}

$matches_quantitydata=ProductPrice::where('product_id',$product_id)->where('count_from',$closest)->first();

$per_item_price=$matches_quantitydata->per_item_sale_price;
$subtotal=$per_item_price*$quantity_cart;

$data=array("per_item_price"=>$per_item_price,"subtotal"=>$subtotal);
return $data;*/


}




public function PostCartDiscount(Request $request){

   $user_id=$this->getLoginUserId();
   $discount_code=$request->discount_cupon;
   $total=$request->total_ammount;


   $discount_data=Discount::with('discount_types')->with('discount_apply')->with('discount_customer_apply')->where('discount_code',$discount_code)->first();

   $invalid_discount="Invalid Discount Code";

   $invalid_amount="Invalid amount";

   if($discount_data==""){
   $this->response['msg']=$invalid_discount;
   $this->response['status']="false";
   return $this->response;
   }


   if($total<$discount_data->minimum_purchase_amount){
   $this->response['msg']=$invalid_amount;
   $this->response['status']="false";
   return $this->response;
   }

   $current = Carbon::now();

   $current=$current->toDateString();
   $current_date=date('Y-m-d H:i:s');

   $start_date=date('Y-m-d H:i:s', strtotime("$discount_data->start_date $discount_data->start_time"));

   $end_date=date('Y-m-d H:i:s', strtotime("$discount_data->end_date $discount_data->end_time"));  


   //limit_number_of_times
   $applied_count_for_all_customers=DiscountApplied::where('discount_id',$discount_data->discount_id)->count();

   $limit_of_promo_code_usage_exceeded="limit of promo code usage exceeded";

   if($discount_data->is_limit_number_of_times==1){

   if($applied_count_for_all_customers>=$discount_data->limit_number_of_times){
   $this->response['msg']=$limit_of_promo_code_usage_exceeded;
   $this->response['status']="false";
   return $this->response;
   }
   }


   $promocode_has_been_expired="Promocode has been expired";

   if($end_date < $current_date ){

   $this->response['msg']=$promocode_has_been_expired;
   $this->response['status']="false";
   return $this->response;
   }


   if($discount_data->discount_type_id==1){
   //percentage
   $discount=$total*$discount_data->discount_value/100;
   }else{
   //amount
   $discount=$discount_data->discount_value;
   }

   $promocode_applied_successfully="Promocode applied successfully";

   $order=Order::where('user_id',$user_id)->first();



   if($discount_data->customer_eligibility_id==1){

   if($discount_data->applies_to_id==1){
      if($order==""){
         
        $cart=Cart::where('user_id',$user_id)->update(['discount_id'=>$discount_data->discount_id]);
         $this->response['msg']=$promocode_applied_successfully;
         $this->response['status']="true";
         $this->response['promocode']=$discount_data->discount_code;
         $this->response['total']=$total-$discount;
         $this->response['discount']=$discount;
         $this->response['discount_id']=$discount_data->discount_id;

         return $this->response;
      }else{
         $this->response['msg']="Not applicable";
         $this->response['status']="false";
         return $this->response;
      }
   }else{
      $cart=Cart::where('user_id',$user_id)->update(['discount_id'=>$discount_data->discount_id]);
      $this->response['msg']=$promocode_applied_successfully;
      $this->response['status']="true";
      $this->response['promocode']=$discount_data->discount_code;
      $this->response['total']=$total-$discount;
      $this->response['discount']=$discount;
      $this->response['discount_id']=$discount_data->discount_id;
      return $this->response;
   }
}else{
   $discount_customer_apply=DiscountCustomerApply::where('discount_id',$discount_data->discount_id)->pluck('customer_id');
   if($discount_customer_apply->contains($user_id)){
      $cart=Cart::where('user_id',$user_id)->update(['discount_id'=>$discount_data->discount_id]);
      $this->response['msg']=$promocode_applied_successfully;
      $this->response['status']="true";
      $this->response['promocode']=$discount_data->discount_code;
      $this->response['total']=$total-$discount;
      $this->response['discount']=$discount;
      $this->response['discount_id']=$discount_data->discount_id;
      return $this->response;
   }else{
      $this->response['msg']="Sorry you are not eligible";
      $this->response['status']="false";
      return $this->response;
   }
 }

}



public function getPromocode(Request $request){
      
      $language_id=1;
      
      $promocode=$request->promocode;

      $total_amount=$request->total;
      $get_total=$request->total;

      $shipping_charge=ShippingCharge::first();
      $shipping_order_amount=$shipping_charge->shipping_order_amount;
      $greater_amount_shipping=$shipping_charge->greater_amount_shipping;
      $smaller_amount_shipping=$shipping_charge->smaller_amount_shipping;
      $shipping_amount=0;
      if ($total_amount <= $shipping_order_amount) {
         $shipping_amount=$greater_amount_shipping;
      }
      if ($total_amount > $shipping_order_amount) {
         $shipping_amount=$smaller_amount_shipping;
      }

      $total_amount=$total_amount+$shipping_amount;

      $promocodes=Discount::with('discount_types')->with('discount_apply')->with('discount_customer_apply')->where('discount_code',$promocode)->first();

      $invalid_promocode="Invalid promocode";
      $invalid_amount="Invalid amount";

      if($promocodes==""){
         $this->response['msg']=$invalid_promocode;
         $this->response['status']="false";
         return $this->response;
      }

      if($get_total<$promocodes->minimum_purchase_amount){
         $this->response['msg']=$invalid_amount;
         $this->response['status']="false";
         return $this->response;
      }


      $current = Carbon::now();
      $current=$current->toDateString();
      $current_date=date('Y-m-d H:i:s');

      $start_date=date('Y-m-d H:i:s', strtotime("$promocodes->start_date $promocodes->start_time"));

      $end_date=date('Y-m-d H:i:s', strtotime("$promocodes->end_date $promocodes->end_time"));

      $discount_id=$promocodes->discount_id;
      $user_id=$this->getLoginUserId();

      //limit_number_of_times
      $applied_count_for_all_customers=DiscountApplied::where('discount_id',$promocodes->discount_id)->count();

      $limit_of_promo_code_usage_exceeded="limit of promo code usage exceeded";

      if($promocodes->is_limit_number_of_times==1){

         if($applied_count_for_all_customers>=$promocodes->limit_number_of_times){
            $this->response['msg']=$limit_of_promo_code_usage_exceeded;
            $this->response['status']="false";
            return $this->response;
         }
      }

      $you_have_already_used="You have already used";

      //limit_number_of_timesz
      if($promocodes->only_one_use_per_customer==1){
         $discount_applied=DiscountApplied::where('user_id',$user_id)->where('discount_id',$promocodes->discount_id)->first();
         if($discount_applied!=""){
            $this->response['msg']=$you_have_already_used;
            $this->response['status']="false";
            return $this->response;
         }
      }


      $promocode_has_been_expired="Promocode has been expired";

      if($end_date < $current_date ){

         $this->response['msg']=$promocode_has_been_expired;
         $this->response['status']="false";
         return $this->response;
      }


      $upcomming_promocode="Upcoming Promo Code";
      if($start_date > $current_date){
         $this->response['msg']=$upcomming_promocode;
         $this->response['status']="false";
         return $this->response;
      }



      $language_id=1;
      

      $user_id=$this->getLoginUserId();
      $discount="";
      $carts=Cart::where("user",$user_id)->with('user')->with(['sku'=>function($query) use ($language_id){
         $query->with(['product'=> function($query) use ($language_id){
            $query->with('default_product_translation')->with(['product_translation'=> function($query) use ($language_id){ 
               $query->where('language_id',$language_id);
            }])->with(['brand'=>function($query) use ($language_id){
               $query->with('default_brand_translation')->with(['brand_translation'=> function($query) use ($language_id){
                  $query->where('language_id',$language_id);
               }]);
            }]);
         }])->with(['parent_variant'=>function($query) use ($language_id){
            $query->with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
               $query->where('language_id',$language_id);
            }]);
         }])->with(['child_variant'=>function($query) use ($language_id){
            $query->with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
               $query->where('language_id',$language_id);
            }]);
         }]);
      }])->orderBy('created_at','desc')->get();

      $cart_count=$carts->count();

      $gst=0;
      $my_price=0;
      $total=0;
      

      foreach($carts as $products){

         if($products->sku->product->gst->gst <= 0){
            $total=$total + $products->quantity * $products->sku->my_price;
         }else{

            $gst=($products->sku->product->gst->gst)/100;
            $my_price=(($products->sku->my_price*$products->quantity));

            $total=$total+$my_price * $gst ;
            $total=$my_price+$total; 

         }
      }
      if ($total <= $shipping_order_amount) {
         $shipping_amount=$greater_amount_shipping;
      }
      if ($total > $shipping_order_amount) {
         $shipping_amount=$smaller_amount_shipping;
      }
      $total=$total+$shipping_amount;




      if($promocodes->discount_type_id==1){
         //percentage
         $discount=$total*$promocodes->discount_value/100;
      }else{
         //amount
         $discount=$promocodes->discount_value;
      }

      $promocode_applied_successfully="Promocode applied successfully";

      $order=Order::where('user_id',$user_id)->first();

      if($promocodes->customer_eligibility_id==1){

         if($promocodes->applies_to_id==1){
            if($order==""){
               $this->response['msg']=$promocode_applied_successfully;
               $this->response['status']="true";
               $this->response['promocode']=$promocodes->discount_code;
               $this->response['total']=$total-$discount;
               $this->response['discount']=$discount;
               return $this->response;
            }else{
               $this->response['msg']="Not applicable";
               $this->response['status']="false";
               return $this->response;
            }
         }else{
            $this->response['msg']=$promocode_applied_successfully;
            $this->response['status']="true";
            $this->response['promocode']=$promocodes->discount_code;
            $this->response['total']=$total-$discount;
            $this->response['discount']=$discount;
            return $this->response;
         }
      }else{
         $discount_customer_apply=DiscountCustomerApply::where('discount_id',$promocodes->discount_id)->pluck('customer_id');
         if($discount_customer_apply->contains($user_id)){
            $this->response['msg']=$promocode_applied_successfully;
            $this->response['status']="true";
            $this->response['promocode']=$promocodes->discount_code;
            $this->response['total']=$total-$discount;
            $this->response['discount']=$discount;
            return $this->response;
         }else{
            $this->response['msg']="Sorry you are not eligible";
            $this->response['status']="false";
            return $this->response;
         }
      }
   }


public function PostSubscribeEmail(Request $request){
$email=$request->news_letter_email;
$email_old=SubscribersEmail::where('email',$email)->first();
if($email_old==""){ 
$SubscribersEmail=new SubscribersEmail();
$SubscribersEmail->email=$email;
$SubscribersEmail->save();

$notification = array(
'message' => 'Email subscribed sucessfully',
'alert-type' => 'success'
);
return redirect()->back()->with($notification);
}
else{
$notification = array(
'message' => 'Email already exists',
'alert-type' => 'warning'
);
return redirect()->back()->with($notification);
}

}


public function PostSavedCarts(Request $request){  
$cart_item_ids=$request->cart_item_ids;
sort($cart_item_ids);
$user_id=$this->getLoginUserId();


if($cart_item_ids!=""){
$count=0;
foreach($cart_item_ids as $cart_item){
$item=CartItemSave::where('cart_item_id',$cart_item)->first();
if($item==""){ 
$Saveitem = new CartItemSave();
$Saveitem->cart_item_id=$cart_item;
$Saveitem->user_id=$user_id;
$Saveitem->save();
$count++; 
}
}
}

if($count>=1)
{
    $this->data['data']=1;
    $this->response['status']="true";
    $this->response['data']=$this->data;
 }else{

    $this->data['data']=0;
    $this->response['status']="false";
    $this->response['data']=$this->data;
 }

return $this->response;

}



public function postMyAccProfileChangePassword(Request $request){
    $auth_user = Auth::user();
    $user_id = $auth_user->id;
    $password = $request->password;

    $user = User::find($user_id);
    $user->password=Hash::make($password);
    $user->password_show = $request->password;
    $user->save();
    
    return $user; 

  }

  
  public function postMyAccProfileContactInfo(Request $request){
    $auth_user = Auth::user();
    $user_id = $auth_user->id;

    $name = $request->name;
    $contact_number = $request->contact_number;
    // $fax = $request->fax;

    $user = User::find($user_id);
    $user->name=$name;
    $user->contact_number = $contact_number;
    // $user->fax = $fax;
    $user->save();
    return $user; 
  }


public function postReorderRequestExactlySameContentChangeNo(Request $request){
    $product_id = $request->product_id;
    $order_id = $request->order_id;
    
    $product=Product::where('product_id',$product_id)->first();
    $product_prices = ProductPrice::where('product_id',$product_id)->get();
    $product_color_group = ProductColorGroup::where('product_id',$product_id)->first();
    if($product_color_group!=""){
      $product_color_group_id = $product_color_group->id;
      $product_colors = ProductColor::where('product_color_group_id',$product_color_group_id)->with('color')->get();
      // echo $product_colors;die;
    }else{
      $product_colors ="[]";
    }

    $imprints=Imprint::where('product_id',$product_id)->with('imprint_price')->with('imprint_colors')->get();

    $view=View::make('superior.reord-req-ext-same-cnt-chnge-no')->with('product_prices',$product_prices)->with('product',$product)->with('product_colors',$product_colors)->with('imprints',$imprints)->with('order_id',$order_id);
    $sections=$view->renderSections();

    $data=array("sections"=>$sections['reord_req_same_cnt_chnge_no'],"order_id"=>$order_id);

    $this->data['data']=$data;
    $this->response['status']="true";
    $this->response['data']=$this->data;
     return $this->response;
  }




public function getOrderProcess(Request $request){
    $order_processes = OrderProcess::get();
    
    return view('superior.order-process')->with('order_processes',$order_processes);
  }

  public function getProductSample(Request $request){
      $product_sample = ProductSample::first();
    return view('superior.product-sample')->with('product_sample',$product_sample);
  }

public function postOrderShippInformation(Request $request){

   $order_id = $request->order_id;
   $order = Order::find($order_id);
   $order->shipping_first_name=$request->shipping_first_name;
   $order->shipping_last_name=$request->shipping_last_name;
   $order->shipping_company_name=$request->shipping_company_name;
   $order->shipping_address_line_1=$request->shipping_address_line_1;
   $order->shipping_address_line_2=$request->shipping_address_line_2;
   $order->shipping_zip=$request->shipping_zip;
   $order->shipping_day_telephone=$request->shipping_day_telephone;
   $order->shipping_ext=$request->shipping_ext;
   // $order->shipping_fax=$request->shipping_fax;
   $order->shipping_city=$request->shipping_city;
   $order->shipping_state=$request->shipping_state;
   $order->save();
   return redirect()->back();
}

public function postOrderBillInformation(Request $request){
   
   $order_id = $request->order_id;
   $order = Order::find($order_id);
   $order->billing_first_name=$request->billing_first_name;
   $order->billing_last_name=$request->billing_last_name;
   $order->billing_company_name=$request->billing_company_name;
   $order->billing_address_line_1=$request->billing_address_line_1;
   $order->billing_address_line_2=$request->billing_address_line_2;
   $order->billing_ext=$request->billing_ext;
   // $order->billing_fax=$request->billing_fax;
   $order->billing_zip=$request->billing_zip;
   $order->billing_day_telephone=$request->billing_day_telephone;
   $order->billing_city=$request->billing_city;
   $order->billing_state=$request->billing_state;
   $order->save();
   return redirect()->back();
}

public function ShipDilevery(Request $request){
   return view("superior.shipanddelivery");
}

public function postReorderRequest(Request $request){
      $order_ids = $request->reorder_requests;
      $orders = Order::whereIn('id',$order_ids)->with('order_item')->get();
      
      $Allstates=StateTranslation::all();
      $Allcity=CityTranslation::all();
  $data=array("Allstates"=>$Allstates,"Allcity"=>$Allcity);

      $view=View::make('superior.reorderRequestItemList')->with('orders',$orders)->with('data',$data);
    $sections=$view->renderSections();

    $data = $sections["reorderRequestItems"];


    $this->data['data']=$sections['reorderRequestItems'];
  $this->response['status']="true";
  $this->response['data']=$this->data;
   return $this->response;
    }



public function postOrder(Request $request){

$user_id=$this->getLoginUserId();
$shipping_ad_id=$request->shippingadd_id;
$billingaddress_id=$request->billingaddress_id;
$shippping_address=Address::where('address_id',$shipping_ad_id)->first();
$billing_address=Address::where('address_id',$billingaddress_id)->first();

$state=StateTranslation::where('state_id',$shippping_address->state_id)->first();
$city=CityTranslation::where('city_id',$shippping_address->city_id)->first();
$country=CountryTranslation::where('country_id',$shippping_address->country_id)->first();

$billingstate=StateTranslation::where('state_id',$billing_address->state_id)->first();
$billingcity=CityTranslation::where('city_id',$billing_address->city_id)->first();
$billingcountry=CountryTranslation::where('country_id',$billing_address->country_id)->first();

$user_data=User::where('id',$user_id)->first();

$user_address=substr($user_data->address1,0,24);

// $billing_address1=substr($user_data->address1,0,24);

// $billing_address2=substr($user_data->address1,0,24);

// $shipping_address1=substr($user_data->address1,0,24);

// $shpping_address2=substr($user_data->address1,0,24);


if($request->payment_method==1){

     $card_holder_name=$request->card_holder_name;
     $card_number=$request->card_number;
     $card_security_code=$request->card_security_code;
     $expiration_date=$request->expiration_date;
     $amount=$request->all_total;
     $email=$user_data->email;

     define("AUTHORIZENET_LOG_FILE","phplog");

    /*Create a merchantAuthenticationType object with authentication details
    retrieved from the constants file*/

     $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
     
/*     $merchantAuthentication->setName('5qhGS45tJ');
     $merchantAuthentication->setTransactionKey('6MQ283gxQ7c9tP45');*/

     $merchantAuthentication->setName('3LgDguX53c');
     $merchantAuthentication->setTransactionKey('64nRckL569rk33JQ');

    // Set the transaction's refId
    $refId='ref' . time();
    //Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($card_number);
    $creditCard->setExpirationDate($expiration_date);
    $creditCard->setCardCode($card_security_code);

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);
  
    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber("10101");
    $order->setDescription("Golf Shirts"); 

    //Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($card_holder_name);
    $customerAddress->setLastName($card_holder_name);
    $customerAddress->setCompany("Superior");
    $customerAddress->setAddress($user_address);
    $customerAddress->setCity($user_data->city);
    $customerAddress->setState($user_data->state);
    $customerAddress->setZip($user_data->zipcode);
    $customerAddress->setCountry($user_data->country);
   
    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId("99999456654");
    $customerData->setEmail($email);
   
    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    $merchantDefinedField1 = new AnetAPI\UserFieldType();
    $merchantDefinedField1->setName("customerLoyaltyNum");
    $merchantDefinedField1->setValue("1128836273");

    $merchantDefinedField2 = new AnetAPI\UserFieldType();
    $merchantDefinedField2->setName("favoriteColor");
    $merchantDefinedField2->setValue("blue");

    // Create a TransactionRequestType object and add the previous objects to it
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setCustomer($customerData);
    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
    $transactionRequestType->addToUserFields($merchantDefinedField1);
    $transactionRequestType->addToUserFields($merchantDefinedField2);

    // Assemble the complete transaction request
    $request_transaction = new AnetAPI\CreateTransactionRequest();
    $request_transaction->setMerchantAuthentication($merchantAuthentication);
    $request_transaction->setRefId($refId);
    $request_transaction->setTransactionRequest($transactionRequestType);
    // Create the controller and get the response
    $controller = new AnetController\CreateTransactionController($request_transaction);

    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    
    if ($response != null) {
    // Check to see if the API request was successfully received and acted upon
    if ($response->getMessages()->getResultCode() == "Ok") {
    // Since the API request was successful, look for a transaction response
    // and parse it to display the results of authorizing the card
    $tresponse = $response->getTransactionResponse();
    if ($tresponse != null && $tresponse->getMessages() != null) {
    // echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
  // echo " Transaction Response Code: " . $tresponse->getResponseCode() ."\n";
  // echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
  // echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
  // echo " Description: " . $tresponse->getMessages()[0]->getDescription()."\n";

    $message_text= $tresponse->getMessages()[0]->getDescription().", Transaction ID: ".$tresponse->getTransId();

    $transaction_id=$tresponse->getTransId();

    $msg_type = "success_msg";
    $is_status="Success";
    
    $c_name =  $user_data->fname.' '.$user_data->last_name;
    $c_id = $user_data->id;
    $c_email =  $user_data->email;
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://api.bigmailer.io/v1/brands/ee82a5c9-fe7a-4d58-8d47-8bd6b01c7581/transactional-campaigns/abc0cf3a-8c7e-44cc-9757-227dd9f38d46/send', [
       'body' => '{"variables":[{"name":"CUSTOMER_NAME","value":"'.$c_name.'"}],"email":"'.$c_email.'"}',
       'headers' => [
          'Accept' => 'application/json',
          'Content-Type' => 'application/json',
          'X-API-Key' => '9668aebe-5513-46ff-bf19-1924952dc6c1',
       ],
    ]);
   $response->getBody(); 

    } else {
    // echo "Transaction Failed \n";
    $message_text = 'There were some issue with the payment. Please try again later.';
    $msg_type = "error_msg";                

    if ($tresponse->getErrors() != null) {
    // echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
    // echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";

    $message_text = $tresponse->getErrors()[0]->getErrorText();
    $msg_type = "error_msg"; 
    $is_status="Failed";
    }
       $profile_response="";
       $data=array('message_text'=>$message_text,'msg_type'=>$msg_type,'is_status'=>$is_status,'profile_response'=>$profile_response);

      $this->response['status']="false";
      $this->response['order_id']="";
      $this->response['data']=$data;
      return $this->response;

    }
   // Or, print errors if the API request wasn't successful
    } else {
            // echo "Transaction Failed \n";
    $message_text = 'There were some issue with the payment. Please try again later.';
    $msg_type = "error_msg";
    $is_status="Failed";

    $tresponse = $response->getTransactionResponse();    
    if ($tresponse != null && $tresponse->getErrors() != null) {
        // echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
        // echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
        $message_text = $tresponse->getErrors()[0]->getErrorText();
        $msg_type = "error_msg";
        $is_status="Failed";
    } else {
   //echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
   // echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
        $message_text = $response->getMessages()->getMessage()[0]->getText();
        $msg_type = "error_msg";
        $is_status="Failed";
    }
    
     $profile_response="";
     $data=array('message_text'=>$message_text,'msg_type'=>$msg_type,'is_status'=>$is_status,'profile_response'=>$profile_response);

      $this->response['status']="false";
      $this->response['order_id']="";
      $this->response['data']=$data;
      return $this->response;
     
    }
} else {
    // echo  "No response returned \n";
    $message_text = "No response returned";
    $msg_type = "error_msg";
    $is_status="Failed";

     $profile_response="";
     $data=array('message_text'=>$message_text,'msg_type'=>$msg_type,'is_status'=>$is_status,'profile_response'=>$profile_response);

      $this->response['status']="false";
      $this->response['order_id']="";
      $this->response['data']=$data;
      return $this->response;

}
 
    /*$card_holder_name=$request->card_holder_name;
    $card_number=$request->card_number;
    $card_security_code=$request->card_security_code;
    $expiration_date=$request->expiration_date;
    $amount=$request->all_total;

    $email="itinfonity@gmail.com";
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName("2LH56mmc4");
    $merchantAuthentication->setTransactionKey("7xhR6K4hp438RRaJ");
    // Set the transaction's refId
    $refId = 'ref' . time();*/
    // Create a Customer Profile Request
    //  1. (Optionally) create a Payment Profile
    //  2. (Optionally) create a Shipping Profile
    //  3. Create a Customer Profile (or specify an existing profile)
    //  4. Submit a CreateCustomerProfile Request
    //  5. Validate Profile ID returned
    // Set credit card information for payment profile

/*  $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($card_number);
    $creditCard->setExpirationDate($expiration_date);
    $creditCard->setCardCode($card_security_code);*/
  
  
   
   // $user=User::where("id",$user_id)->first();
   $user=User::where("id",$user_id)->first();

   $cim_no=$user->authorize_net_id; 
  
   if($cim_no==""){
   if($is_status=="Success"){
      
    $paymentCreditCard = new AnetAPI\PaymentType();
    $paymentCreditCard->setCreditCard($creditCard);
    // Create the Bill To info for new payment type
    $billTo = new AnetAPI\CustomerAddressType();
    $billTo->setFirstName($card_holder_name);
    $billTo->setLastName($card_holder_name);
    $billTo->setCompany($billing_address->company_name);
    $billTo->setAddress($billing_address->address);
    $billTo->setCity($billingcity->city_name);
    $billTo->setState($billingstate->state_name);
    $billTo->setZip($billing_address->zip_code);
    $billTo->setCountry($billingcountry->country_name);
    $billTo->setPhoneNumber($billing_address->telephone);
    $billTo->setfaxNumber($billing_address->fax);


    // Create a customer shipping address
    $customerShippingAddress = new AnetAPI\CustomerAddressType();
    $customerShippingAddress->setFirstName($shippping_address->name);
    $customerShippingAddress->setLastName($shippping_address->last_name);
    $customerShippingAddress->setCompany($shippping_address->company_name);
    $customerShippingAddress->setAddress($shippping_address->address);
    $customerShippingAddress->setCity($city->city_name);
    $customerShippingAddress->setState($state->state_name);
    $customerShippingAddress->setZip($shippping_address->zip_code);
    $customerShippingAddress->setCountry($country->country_name);
    $customerShippingAddress->setPhoneNumber($shippping_address->telephone);
    $customerShippingAddress->setFaxNumber($shippping_address->fax);

    // Create an array of any shipping addresses
    $shippingProfiles[] = $customerShippingAddress;
    // Create a new CustomerPaymentProfile object
    $paymentProfile = new AnetAPI\CustomerPaymentProfileType();
    $paymentProfile->setCustomerType('individual');
    $paymentProfile->setBillTo($billTo);
    $paymentProfile->setPayment($paymentCreditCard);
    $paymentProfiles[] = $paymentProfile;

    //Create a new CustomerProfileType and add the payment profile object
    $customerProfile = new AnetAPI\CustomerProfileType();
    $customerProfile->setDescription("Customer Transaction Details");
    $customerProfile->setMerchantCustomerId("M_" . time());
    $customerProfile->setEmail($email);
    $customerProfile->setpaymentProfiles($paymentProfiles);
    $customerProfile->setShipToList($shippingProfiles);

    //Assemble the complete transaction request
    $request_customer = new AnetAPI\CreateCustomerProfileRequest();
    $request_customer->setMerchantAuthentication($merchantAuthentication);
    $request_customer->setRefId($refId);
    $request_customer->setProfile($customerProfile);


    // Create the controller and get the response
    $controller = new AnetController\CreateCustomerProfileController($request_customer);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    if ($response != null && $response->getMessages()->getResultCode() == "Ok"){
      // echo "Succesfully created customer profile : " . $response->getCustomerProfileId() . "\n";
      // $paymentProfiles = $response->getCustomerPaymentProfileIdList();

      // echo "SUCCESS: PAYMENT PROFILE ID : " . $paymentProfiles[0] . "\n";
      
      $cim_number=User::where("id",$user_id)->update(['cim_no'=>$response->getCustomerProfileId()]); 
      
      $cim_number1=User::where("id",$user_id)->update(['authorize_net_id'=>$response->getCustomerProfileId()]); 


      $profile_response=$response;
    } else {
      echo "ERROR :  Invalid response\n";
      $errorMessages = $response->getMessages()->getMessage();
      echo "Response : " . $errorMessages[0]->getCode() . "  " .$errorMessages[0]->getText() . "\n";

    }  
 }
  else{
   $profile_response="";
 }
}
 else{
   $profile_response="";
 }



  /*$data=array('message_text'=>$message_text,'msg_type'=>$msg_type,'is_status'=>$is_status,'profile_response'=>$profile_response);*/


/*$carts=Cart::where("user_id",$user_id)->with('cart_item')->with('user')->first();
return $carts;
$count=$carts->count();
$cart_ids=$carts->pluck('id');*/

$carts=Cart::where("user_id",$user_id)->first();
$cart_id=$carts->id;

$cart_items=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('cart_id',$cart_id)->get();

$cart_item_ids=$cart_items->pluck('id');
/*return $cart_item_ids;*/

if($request->discount_cupon!="0"){
$discount_data=Discount::with('discount_types')->with('discount_apply')->with('discount_customer_apply')->where('discount_code',$request->discount_cupon)->first();
}


   $order= new Order();
   $order->user_id=$user_id;
   $order->cart_id=$carts->id; 
   $order->discount_code=$request->discount_cupon;

   if($request->discount_cupon!="0"){
     $order->discount_id=$discount_data->discount_id;
   }else{
      $order->discount_id=$carts->discount_id; 
   }

   $order->price=$request->order_price;
   $order->total_price=$request->all_total;
   $order->discount_amount=$request->discount_amt;
   $order->shipping_first_name=$shippping_address->name;
   $order->shipping_last_name=$shippping_address->last_name;
   $order->shipping_company_name=$shippping_address->company_name;
   $order->shipping_address_line_1=$shippping_address->address;
   $order->shipping_address_line_2=$shippping_address->address2;
   $order->shipping_zip=$shippping_address->zip_code;
   $order->shipping_day_telephone=$shippping_address->telephone;
   $order->shipping_ext=$shippping_address->ext;
   $order->shipping_fax=$shippping_address->fax;
   $order->shipping_city=$city->city_name;
   $order->shipping_state=$state->state_name;
   $order->shipping_country=$country->country_name;

   $order->billing_first_name=$billing_address->name;
   $order->billing_last_name=$billing_address->last_name;
   $order->billing_company_name=$billing_address->company_name;
   $order->billing_address_line_1=$billing_address->address;
   $order->billing_address_line_2=$billing_address->address2;
   $order->billing_ext=$billing_address->ext;
   $order->billing_fax=$billing_address->fax;
   $order->billing_zip=$billing_address->zip_code;
   $order->billing_day_telephone=$billing_address->telephone;
   $order->billing_city=$billingcity->city_name;
   $order->billing_state=$billingstate->state_name;
   $order->billing_country=$billingcountry->country_name;
   $order->multiple_location_comment=$request->location_data;
   $order->save(); 

   $order_id_new=$order->id;

  if($request->payment_method==1){
    if($is_status=="Success"){
      $transaction= new Transaction();
      $transaction->transaction_amount=$request->all_total;
      $transaction->user_id=$user_id; 
      $transaction->global_order_id=$order->id;
      $transaction->payment_status_id=3;
      $transaction->payment_mode="online";
      $transaction->transaction_number=$transaction_id;
      $transaction->transaction_type_id=2;
      $transaction->save(); 
    }
  }


  if($request->discount_cupon!="0"){
    $discount_applieds=new DiscountApplied();
    $discount_applieds->user_id=$user_id;
    $discount_applieds->discount_id=$order->discount_id; 
    $discount_applieds->global_order_id=$order->id; 
    $discount_applieds->discount_amount=$request->discount_amt; 
    $discount_applieds->save();
    
  }
 

foreach($cart_item_ids as $cart_item_id){

/*$carts=Cart::where("id",$cart_id)->where("user_id",$user_id)->with('cart_item')->with('user')->first();*/

$cart_item=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('id',$cart_item_id)->first();

$price=$cart_item->cartitemimprint->sum('setup_price');
$priceprodcut=$cart_item->quantity*$cart_item->price;
$order_price=$priceprodcut+$price;
   $order_item= new OrderItem();
   $order_item->order_id=$order->id; 
   $order_item->tracking_user_id=$user_id; 
   $order_item->stage_id=1; 
   $order_item->item_price=$priceprodcut;
   $order_item->shipping_price=$cart_item->estimation_shipping_price;
   $order_item->cart_item_id=$cart_item->id; 
   $order_item->product_id=$cart_item->product_id; 
   $order_item->quantity=$cart_item->quantity;
   $order_item->price=$order_price;
   $order_item->options_price=2;
    /*$order_item->check_notes=
     $order_item->auto_remind=*/

   if($request->payment_method=1){
       $order_item->not_paid=0;
   }else{
      $order_item->not_paid=1;
   }

   $order_item->art_file_name=$cart_item->art_file_name;
   $order_item->art_file_path=$cart_item->art_file_path;

   $order_item->po_number="";
   $order_item->invoice_file="";

   $order_item->tax_exempt=$request->tex_excemption;
   $order_item->estimation_zip=$cart_item->estimation_zip;
   $order_item->estimation_shipping_method=$cart_item->estimation_shipping_method;
   $order_item->estimation_shipping_price=$cart_item->estimation_shipping_price;

   $order_item->own_shipping_type=$cart_item->own_shipping_type;
   $order_item->own_account_number=$cart_item->own_account_number;
   $order_item->own_shipping_system=$cart_item->own_shipping_system;
   $order_item->shipping_method=$cart_item->shipping_method;
   
   // $order_item->vendor_id=$user_id;

   $order_item->vendor_id=$cart_item->product->seller_id;
   $order_item->received_date=$cart_item->received_date;
   $order_item->imprint_comment=$cart_item->imprint_comment;
   $order_item->shipping_first_name=$order->shipping_first_name;
   $order_item->shipping_last_name=$order->shipping_last_name;
   $order_item->shipping_company_name=$order->shipping_company_name;
   $order_item->shipping_address_line_1=$order->shipping_address_line_1;
   $order_item->shipping_address_line_2=$order->shipping_address_line_2;
   $order_item->shipping_city=$order->shipping_city;
   $order_item->shipping_state=$order->shipping_state;
   $order_item->shipping_zip=$order->shipping_zip;
   $order_item->shipping_country=$order->shipping_country;
   $order_item->shipping_day_telephone=$order->shipping_day_telephone;
   $order_item->shipping_ext=$order->shipping_ext;
   $order_item->shipping_fax=$order->shipping_fax;


   $order_item->billing_first_name=$order->billing_first_name;
   $order_item->billing_last_name=$order->billing_last_name;
   $order_item->billing_company_name=$order->billing_company_name;
   $order_item->billing_address_line_1=$order->billing_address_line_1;
   $order_item->billing_address_line_2=$order->billing_address_line_2;
   $order_item->billing_city=$order->billing_city;
   $order_item->billing_state=$order->billing_state;
   $order_item->billing_zip=$order->billing_zip;
   $order_item->billing_country=$order->billing_country;
   $order_item->billing_day_telephone=$order->billing_day_telephone;
   $order_item->billing_ext=$order->billing_ext;
   $order_item->billing_fax=$order->billing_fax;
   $order_item->save();

   $cart_item = CartItems::where('cart_id',$cart_id)->first();
     
    if($cart_item!=""){
       $cart_art_proof = CartItemArtProofs::where('cart_item_id',$cart_item->id)->first();
       
       if($cart_art_proof!=""){
           $art_proof_path =$cart_art_proof->path;
           $order_item_id=$order_item->id;
           $art_proof=new ArtProof;
           $art_proof->order_item_id=$order_item_id;
           $art_proof->path=$art_proof_path;
           $art_proof->approved=2;
           $art_proof->user_id=$user_id;
           $art_proof->save();
       }
       
    }           
}  
     
 
    $data=array('message_text'=>$message_text,'msg_type'=>$msg_type,'is_status'=>$is_status,'profile_response'=>$profile_response);

    return $order_id_new;

    $this->response['status']="true";
    $this->response['order_id']=$order_id_new;
    $this->response['data']=$data;
    $this->response;

}else{

/*$carts=Cart::where("user_id",$user_id)->with('cart_item')->with('user')->first();
return $carts;
$count=$carts->count();
$cart_ids=$carts->pluck('id');*/

$carts=Cart::where("user_id",$user_id)->first();
$cart_id=$carts->id;

$cart_items=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('cart_id',$cart_id)->get();

$cart_item_ids=$cart_items->pluck('id');
/*return $cart_item_ids;*/


if($request->discount_cupon!="0"){
$discount_data=Discount::with('discount_types')->with('discount_apply')->with('discount_customer_apply')->where('discount_code',$request->discount_cupon)->first();
}

   $order= new Order();
   $order->user_id=$user_id;
   $order->cart_id=$carts->id; 
   $order->discount_code=$request->discount_cupon;

   if($request->discount_cupon!="0"){
     $order->discount_id=$discount_data->discount_id;
   }else{
      $order->discount_id=$carts->discount_id; 
   }

   $order->price=$request->order_price;
   $order->total_price=$request->all_total;
   $order->discount_amount=$request->discount_amt;
   $order->shipping_first_name=$shippping_address->name;
   $order->shipping_last_name=$shippping_address->last_name;
   $order->shipping_company_name=$shippping_address->company_name;
   $order->shipping_address_line_1=$shippping_address->address;
   $order->shipping_address_line_2=$shippping_address->address2;
   $order->shipping_zip=$shippping_address->zip_code;
   $order->shipping_day_telephone=$shippping_address->telephone;
   $order->shipping_ext=$shippping_address->ext;
   $order->shipping_fax=$shippping_address->fax;
   $order->shipping_city=$city->city_name;
   $order->shipping_state=$state->state_name;
   $order->shipping_country=$country->country_name;

   $order->billing_first_name=$billing_address->name;
   $order->billing_last_name=$billing_address->last_name;
   $order->billing_company_name=$billing_address->company_name;
   $order->billing_address_line_1=$billing_address->address;
   $order->billing_address_line_2=$billing_address->address2;
   $order->billing_ext=$billing_address->ext;
   $order->billing_fax=$billing_address->fax;
   $order->billing_zip=$billing_address->zip_code;
   $order->billing_day_telephone=$billing_address->telephone;
   $order->billing_city=$billingcity->city_name;
   $order->billing_state=$billingstate->state_name;
   $order->billing_country=$billingcountry->country_name;
   $order->multiple_location_comment=$request->location_data;
   $order->save(); 

  $order_id_new=$order->id;

/*  if($request->payment_method==1){
    if($is_status=="Success"){
      $transaction= new Transaction();
      $transaction->transaction_amount=$request->all_total;
      $transaction->user_id=$user_id; 
      $transaction->global_order_id=$order->id;
      $transaction->payment_status_id=3;
      $transaction->payment_mode="online";
      $transaction->transaction_number=$transaction_id;
      $transaction->transaction_type_id=2;
      $transaction->save(); 
    }
  }*/


  if($request->discount_cupon!="0"){
    $discount_applieds=new DiscountApplied();
    $discount_applieds->user_id=$user_id;
    $discount_applieds->discount_id=$order->discount_id; 
    $discount_applieds->global_order_id=$order->id; 
    $discount_applieds->discount_amount=$request->discount_amt; 
    $discount_applieds->save();
    
  }
 

foreach($cart_item_ids as $cart_item_id){

/*$carts=Cart::where("id",$cart_id)->where("user_id",$user_id)->with('cart_item')->with('user')->first();*/

$cart_item=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('id',$cart_item_id)->first();

  $price=$cart_item->cartitemimprint->sum('setup_price');
  $priceprodcut=$cart_item->quantity*$cart_item->price;
  $order_price=$priceprodcut+$price;

   $order_item= new OrderItem();
   $order_item->order_id=$order->id; 
   $order_item->tracking_user_id=$user_id; 
   $order_item->stage_id=1; 
   $order_item->item_price=$priceprodcut;
   $order_item->shipping_price=$cart_item->estimation_shipping_price;
   $order_item->cart_item_id=$cart_item->id; 
   $order_item->product_id=$cart_item->product_id; 
   $order_item->quantity=$cart_item->quantity;
   $order_item->price=$order_price;
   $order_item->options_price=2;
    /*$order_item->check_notes=
     $order_item->auto_remind=*/

   if($request->payment_method=1){
       $order_item->not_paid=0;
   }else{
      $order_item->not_paid=1;
   }

   $order_item->art_file_name=$cart_item->art_file_name;
   $order_item->art_file_path=$cart_item->art_file_path;

   $order_item->po_number="";
   $order_item->invoice_file="";

   $order_item->tax_exempt=$request->tex_excemption;
   $order_item->estimation_zip=$cart_item->estimation_zip;
   $order_item->estimation_shipping_method=$cart_item->estimation_shipping_method;
   $order_item->estimation_shipping_price=$cart_item->estimation_shipping_price;

   $order_item->own_shipping_type=$cart_item->own_shipping_type;
   $order_item->own_account_number=$cart_item->own_account_number;
   $order_item->own_shipping_system=$cart_item->own_shipping_system;
   $order_item->shipping_method=$cart_item->shipping_method;
   
   // $order_item->vendor_id=$user_id;

   $order_item->vendor_id=$cart_item->product->seller_id;
   $order_item->received_date=$cart_item->received_date;
   $order_item->imprint_comment=$cart_item->imprint_comment;
   $order_item->shipping_first_name=$order->shipping_first_name;
   $order_item->shipping_last_name=$order->shipping_last_name;
   $order_item->shipping_company_name=$order->shipping_company_name;
   $order_item->shipping_address_line_1=$order->shipping_address_line_1;
   $order_item->shipping_address_line_2=$order->shipping_address_line_2;
   $order_item->shipping_city=$order->shipping_city;
   $order_item->shipping_state=$order->shipping_state;
   $order_item->shipping_zip=$order->shipping_zip;
   $order_item->shipping_country=$order->shipping_country;
   $order_item->shipping_day_telephone=$order->shipping_day_telephone;
   $order_item->shipping_ext=$order->shipping_ext;
   $order_item->shipping_fax=$order->shipping_fax;


   $order_item->billing_first_name=$order->billing_first_name;
   $order_item->billing_last_name=$order->billing_last_name;
   $order_item->billing_company_name=$order->billing_company_name;
   $order_item->billing_address_line_1=$order->billing_address_line_1;
   $order_item->billing_address_line_2=$order->billing_address_line_2;
   $order_item->billing_city=$order->billing_city;
   $order_item->billing_state=$order->billing_state;
   $order_item->billing_zip=$order->billing_zip;
   $order_item->billing_country=$order->billing_country;
   $order_item->billing_day_telephone=$order->billing_day_telephone;
   $order_item->billing_ext=$order->billing_ext;
   $order_item->billing_fax=$order->billing_fax;
   $order_item->save();

   $cart_item = CartItems::where('cart_id',$cart_id)->first();
     
    if($cart_item!=""){
       $cart_art_proof = CartItemArtProofs::where('cart_item_id',$cart_item->id)->first();
       
       if($cart_art_proof!=""){
           $art_proof_path =$cart_art_proof->path;
           $order_item_id=$order_item->id;
           $art_proof=new ArtProof;
           $art_proof->order_item_id=$order_item_id;
           $art_proof->path=$art_proof_path;
           $art_proof->approved=2;
           $art_proof->user_id=$user_id;
           $art_proof->save();
       }
       
    }           
} 

   $data="";
   $this->response['status']="true";
   $this->response['order_id']=$order_id_new;
   $this->response['data']=$data;
   return $this->response;
} 

}


public function postEditBillingAdress(Request $request){

   $address_id=$request->address_id;
   $user_id=$this->getLoginUserId();


   if($request->city!=""){

      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

    }




   $address=Address::find($address_id);
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   $address->fax=$request->fax; 
   $address->city_id=$city_id; 
   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->save();      
    
  $Allstates=StateTranslation::all();
  $Allcity=CityTranslation::all();
  
  $all_billing_address=Address::where('user_id',$user_id)->where("is_billing",1)->get();
  $data=array("all_billing_address"=>$all_billing_address,"Allstates"=>$Allstates,"Allcity"=>$Allcity);
 
  $view=View::make('superior.updatedbillingaddress')->with('data',$data);
  $sections=$view->renderSections();

  $user=Address::where("user_id",$user_id)->where("is_billing",1)->where("used_billing",1)->first();
  $data=array("user"=>$user);

  $view2=View::make('superior.usedbillingaddress')->with('data',$data);
  $sections2=$view2->renderSections();


  $data=array("sections"=>$sections['updatedbilladdress'],"sections2"=>$sections2['usedbillingaddress']);

         $this->data['data']=$data;
         $this->response['status']="true";
         $this->response['data']=$this->data;
         return $this->response;

/* $this->data['data']=$sections['updatedbilladdress'];
   $this->response['status']="true";
   $this->response['data']=$this->data;
   return $this->response;*/

 }

 public function getSuccess(Request $request){
    $user_id=$this->getLoginUserId();
     
    Cart::where('user_id',$user_id)->delete();

    $Allstates=StateTranslation::all();
    $Allcity=CityTranslation::all();
    $data=array("Allstates"=>$Allstates,"Allcity"=>$Allcity);
    $order_id = $request->order_id;
     


    $order = Order::where('id',$order_id)->with('orderitems')->with('cartitem')->first();
    return view('superior.success')->with('order',$order)->with('data',$data);
 }

public function DeleteBillingAddress(Request $request){
 $address_id=$request->address_id;
 $address=Address::find($address_id);
 $address->delete();

  $user_id=$this->getLoginUserId();

  $Allstates=StateTranslation::all();
  $Allcity=CityTranslation::all();
  
  $all_billing_address=Address::where('user_id',$user_id)->where("is_billing",1)->get();
  $data=array("all_billing_address"=>$all_billing_address,"Allstates"=>$Allstates,"Allcity"=>$Allcity);
 
  $view=View::make('superior.updatedbillingaddress')->with('data',$data);
  $sections=$view->renderSections();

  $user=Address::where("user_id",$user_id)->where("is_billing",1)->where("used_billing",1)->first();
  $data=array("user"=>$user);

  $view2=View::make('superior.usedbillingaddress')->with('data',$data);
  $sections2=$view2->renderSections();

  $data=array("sections"=>$sections['updatedbilladdress'],"sections2"=>$sections2['usedbillingaddress']);

         $this->data['data']=$data;
         $this->response['status']="true";
         $this->response['data']=$this->data;
         return $this->response;

/* return $data="true";*/
}


public function postUsedBillingAdressZero(Request $request){

   $user_id=$this->getLoginUserId();
   $address=Address::where("user_id",$user_id)->where("is_billing",1)->where("used_billing",1)->update(['used_billing'=>0]);

}


public function postUsedBillingAdress(Request $request){

$address_id=$request->address_id;

   $user_id=$this->getLoginUserId();
   $address=Address::where("user_id",$user_id)->where("is_billing",1)->where("used_billing",1)->update(['used_billing'=>0]);

   $address_used=Address::where("user_id",$user_id)->where("is_billing",1)->where("address_id",$address_id)->update(['used_billing'=>1]);

   return $data="true";

}



public function postNewBillingAdress(Request $request){
  
$user_id=$this->getLoginUserId();

  if($request->city!=""){

      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

    }
 

   $address= new Address();
   $address->user_id=$user_id;
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   $address->fax=$request->fax; 
   $address->city_id=$city_id; 
   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->is_billing=1;
   $address->save(); 

   
  $Allstates=StateTranslation::all();
  $Allcity=CityTranslation::all();
  
  $all_billing_address=Address::where('user_id',$user_id)->where("is_billing",1)->get();
  $data=array("all_billing_address"=>$all_billing_address,"Allstates"=>$Allstates,"Allcity"=>$Allcity);
 
  $view=View::make('superior.updatedbillingaddress')->with('data',$data);
  $sections=$view->renderSections();


   $this->data['data']=$sections['updatedbilladdress'];
   $this->response['status']="true";
   $this->response['data']=$this->data;
   return $this->response;

   
}


public function DeleteShipAddress(Request $request)
{

 $address_id=$request->address_id;
 $address=Address::find($address_id);
 $address->delete();

$user_id=$this->getLoginUserId();

$Allstates=StateTranslation::all();
$Allcity=CityTranslation::all();

$user=Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->first();

 if($user==""){
    $user=Address::where('user_id',$user_id)->where("is_default_add",1)->where("is_billing",0)->first();
 }

 if($user==""){
   $user=Address::where('user_id',$user_id)->where("is_billing",0)->first();
 }


$all_address=Address::where('user_id',$user_id)->where("is_billing",0)->orderBy('address_id','desc')->get();
$data=array("all_address"=>$all_address,"user"=>$user,"Allstates"=>$Allstates,"Allcity"=>$Allcity);

$view=View::make('superior.shippingalladress')->with('data',$data);
$sections=$view->renderSections();

$view2=View::make('superior.updatedshipaddress')->with('data',$data);
$sections2=$view2->renderSections();

$data=array("sections"=>$sections['shippingalladress'],"sections2"=>$sections2['updatedshipaddress']);

         $this->data['data']=$data;
         $this->response['status']="true";
         $this->response['data']=$this->data;
         return $this->response;

}


public function postNewAdress(Request $request){
//echo dd($request->all());
   $user_id=$this->getLoginUserId();

   if($request->is_default_add=="true"){    
   $address=Address::where("user_id",$user_id)->where("is_shipping",1)->update(['is_shipping'=>0]);
   $is_default_add=1;  
   }else{
         $is_default_add=0;
   }

   
      if($request->city!=""){

      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

    }
  


   $address= new Address();
   $address->user_id=$user_id;
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   $address->fax=$request->fax;

   $address->city_id=$city_id;

   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->is_shipping=$is_default_add;
   $address->save(); 
   
$default_address=$address->is_shipping;

$Allstates=StateTranslation::all();
$Allcity=CityTranslation::all();

   $user=Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->first();

    if($user==""){
       $user=Address::where('user_id',$user_id)->where("is_default_add",1)->where("is_billing",0)->first();
    }

    if($user==""){
      $user=Address::where('user_id',$user_id)->where("is_billing",0)->first();
    }


 $all_address=Address::where('user_id',$user_id)->where("is_billing",0)->orderBy('address_id','desc')->get();

  $data=array("all_address"=>$all_address,"user"=>$user,"Allstates"=>$Allstates,"Allcity"=>$Allcity);

  $view=View::make('superior.shippingalladress')->with('data',$data);
  $sections=$view->renderSections();

  $view2=View::make('superior.updatedshipaddress')->with('data',$data);
  $sections2=$view2->renderSections();

 $data=array("sections"=>$sections['shippingalladress'],"sections2"=>$sections2['updatedshipaddress']);

if($default_address==1){
         $this->data['data']=$data;
         $this->response['status']=1;
         $this->response['data']=$this->data;
         return $this->response;
}else{

         $this->data['data']=$sections['shippingalladress'];
         $this->response['status']=0;
         $this->response['data']=$this->data;
         return $this->response;

}


}





public function getViewAdress(Request $request){

$user_id=$this->getLoginUserId();

$all_address=Address::where('user_id',$user_id)->where("is_billing",0)->get();


return $all_address;

}



public function postEditAdress(Request $request){
    /*echo dd($request->all());*/
/*   $user_id=$this->getLoginUserId();
   $user=User::where('id',$user_id)->first();
*/             
   $address_id=$request->address_id;

   $user_id=$this->getLoginUserId();

   if($request->is_default_add=="true"){
   $address=Address::where("user_id",$user_id)->where("is_shipping",1)->update(['is_shipping'=>0]);
   $is_default_add=1;
   }else{
         $is_default_add=0;
   }

   

      if($request->city!=""){

      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

    }

    

   $address=Address::find($address_id);
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   $address->fax=$request->fax; 
   $address->city_id=$city_id;

   /*$address->city_id=$request->city; */

   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->is_shipping=$is_default_add;
   $address->save(); 
   
   

$default_address=$address->is_shipping;

$Allstates=StateTranslation::all();
$Allcity=CityTranslation::all();

   $user=Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->first();

    if($user==""){
       $user=Address::where('user_id',$user_id)->where("is_default_add",1)->where("is_billing",0)->first();
    }

    if($user==""){
      $user=Address::where('user_id',$user_id)->where("is_billing",0)->first();
    }


 $all_address=Address::where('user_id',$user_id)->where("is_billing",0)->orderBy('address_id','desc')->get();
  $data=array("all_address"=>$all_address,"user"=>$user,"Allstates"=>$Allstates,"Allcity"=>$Allcity);


  $view=View::make('superior.shippingalladress')->with('data',$data);
  $sections=$view->renderSections();


  $view2=View::make('superior.updatedshipaddress')->with('data',$data);
  $sections2=$view2->renderSections();

 $data=array("sections"=>$sections['shippingalladress'],"sections2"=>$sections2['updatedshipaddress']);

         $this->data['data']=$data;
         $this->response['status']="true";
         $this->response['data']=$this->data;
         return $this->response;
}







      public function index(Request $request){

    
             
      $language_id=1;
      $id=$this->getLoginUserId();
      $limit=20;
      $source_id=1;
      $products=Product::where('status_id',1)->select('product_id')->groupBy('product_id')->take(10);
      $product_is_stock_collections=Product::where('status_id',1)->with('wishlist')->with('product_prices')->take(20)->with('sku')->where('is_stock_collection',1)->with('default_product_translation_full')->get();
      
      $product_count=$products->count();

      

      //Sections Product
      $sections=[];
         

         $latest_products=Product::with('product_prices')->with('sku')->with('wishlist')->take(10)->with('brand:brand_id,brand_translation_id')->with('reviewCount')->with('default_product_translation')->with(['product_translation'=>function($query) use($language_id){
            $query->select('product_translations.product_id','product_translations.product_name')->where('language_id',$language_id);
         }])->where('status_id',1)->orderBy('product_id','desc')->take(10)->get();
        


                $best_selling_products = [];

             
        // Best Selling Products End ======


        //under $1 start
          $product_ids_for_under_dollar_1 = ProductPrice::where('per_item_price','<=',1)->take(10)->plucK('product_id');
          $under_dollar_1 = Product::whereIn('product_id',$product_ids_for_under_dollar_1)->take(10)->whereIn('product_id',$product_ids_for_under_dollar_1)->with('product_prices')->with('sku')->with('wishlist')->with('brand:brand_id,brand_translation_id')->with('reviewCount')->with('default_product_translation')->with(['product_translation'=>function($query) use($language_id){
              $query->select('product_translations.product_id','product_translations.product_name')->take(10)->where('language_id',$language_id);
          }])->where('status_id',1)->orderBy('product_id','desc')->take(10)->get();
        //under $1 end



        $recent_view_product_ids=[];

        


/*         foreach($latest_products as $product){
            echo $product;
         }

         echo "string";die;*/


         $recent_view_products=[];

$max_view_products=[];



         $cart_count=0;    
         
         $total_count=0;
         $page_count=ceil($total_count/$limit);



         $cart_count=0;


         
         $offer_blocks=OfferBlock::where('status_id',1)->with('default_offer_block_translation')->with(['offer_block_translation'=>function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }])->get();


         
         
      $category_id=$request->category_id;

      $categories=Category::where("is_main_category",1)->with('default_category_translation')->with(['category_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id)->orderBy('category_name','asc');
      }])->where('status_id','1')->where('is_main_category',1)->take(12)->get();

           $slider=Slider::where('status_id',1)->with('default_slider_translation')->with(['slider_translation'=>function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->with(['product'=> function($query) use ($language_id){
         $query->with('default_product_translation')->with(['product_translation'=>function($query) use ($language_id){
            $query->select('product_translations.product_id','product_translations.product_name')->where('language_id',$language_id);
         }]);
      }])->with(['category'=>function($query) use ($language_id){
         $query->with('default_category_translation')->with(['category_translation'=>function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }]);
      }])->get();

	
         

         $blogs = Blog::where('is_deleted','0')->with('blog_type')->orderBy('blog_id','desc')->take(3)->get();

         $aboutus=HomeAbout::with(['aboutus_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }])->with('default_aboutus_translation')->first();

         $data=array(
          'best_selling_products'=>$best_selling_products,
          'under_dollar_1'=>$under_dollar_1,
            'cart_count'=>$cart_count,       
            'offer_blocks'=>$offer_blocks,
            'sections'=>$sections,
         // 'section_products'=>$section_products,
            'latest_products'=>$latest_products,
         'recent_view_products'=>$recent_view_products,
         'max_view_products'=>$max_view_products,
         'categories'=>$categories,
            'blogs'=>$blogs,
            'slider'=>$slider,
            'product_is_stock_collections'=>$product_is_stock_collections
         );


         $user_id=$this->getLoginUserId();
         $user_wishlists = Wishlist::where('user_id',$user_id)->pluck('product_id')->toArray();
         // $user_wishlists = $user_wishlists->toArray();

         // $checkwishlist=$wishlist->first();
         // echo $checkwishlist;die;

/*$data=json_encode($data, JSON_FORCE_OBJECT);
*//*echo $data;die;*/

return view('superior.index')->with('data',$data)->with('aboutus',$aboutus)->with('user_wishlists',$user_wishlists);
}



  public function cartremove(Request $request){
    $cart_Item_id=$request->id;
    $cartItem=CartItems::find($cart_Item_id);
    $cartItem->delete();
    return redirect('cart');
    }


public function cartRemoveHeader(Request $request){
    
    $cart_Item_id=$request->id;
    $cartItem=CartItems::find($cart_Item_id);
    $cartItem->delete();

/*      $cart_id=$request->id;
      $cart=Cart::find($cart_id);
      if($cart!=""){
        $cart->delete();
        $cart_items = CartItems::where('cart_id',$cart_id)->get();
        if($cart_items!="[]"){
          foreach ($cart_items as $cart_item) {
            $cart_item->delete();
          }
        }
      }*/
      
      return redirect()->back();
    }

public function postAddWishlist(Request $request){
 
   $product_id = $request->product_id;
   $user_id=$this->getLoginUserId();

   $whishlist_old = Wishlist::where('product_id',$product_id)->where('user_id',$user_id)->first();

   if($whishlist_old==""){
      $wishlist = new Wishlist;
      $wishlist->product_id = $product_id;
      $wishlist->user_id = $user_id;
      $wishlist->save();

      // $data = 'true';
      $data = array('success'=>'true','product_id'=>$product_id);
      return $data;
   }else{
      $whishlist_old->delete();
      // $data = 'false';
      $data = array('success'=>'false','product_id'=>$product_id);
      return $data;
   }
}





public function getProductDetails(Request $request,$slug,$cat="",$pro=""){

$product_id=$request->pid;
$product_categorydata=CategoryProduct::where('product_id',$product_id)->with('product_translation')->with('category_link')->first();

$category_id=$product_categorydata->category_id;
$category_id;

$child_category=CategoryHierarchy::where('child_category_id',$category_id)->first();

if($child_category!=""){
   
   $parent_category =Category::where('category_id',$child_category->parent_category_id)->first();
   $child_category =Category::where('category_id',$child_category->child_category_id)->first();
   
//   $parent_category_id=$child_category->parent_category_id;

//   $parent_category=CategoryHierarchy::where('parent_category_id',$parent_category_id)->first();
}else{
   $parent_category =Category::where('category_id',$category_id)->first();
   $child_category ='';
   //  $child_category="";
   //  $parent_category="";
}
 
/*----------------------------------------------------------------------------------------*/

$product_option=ProductOption::where('product_id',$product_id)->with('product_sub_option')->get();

$product_Apparels=ProductApparel::where('product_id',$product_id)->with('apparel')->get();

/*echo $product_Apparels;die;*/

$product=Product::where('product_id',$product_id)->first();


$product_translation_id=$product->product_translation_id;
$productdetails=ProductTranslation::where('product_translation_id',$product_translation_id)->first();

/*product color group id*/
$product_colors=ProductColorGroup::where('product_id',$product_id)->first();

if($product_colors!=""){
$product_color_group_id=$product_colors->id;
/*product colors*/
$product_color=ProductColor::where('product_color_group_id',$product_color_group_id)->pluck('color_id');
$all_color=Color::whereIn('id',$product_color)->get();

/*prodct color images*/
$product_sub_images=ProductColor::where('product_color_group_id',$product_color_group_id)->with('color')->get();

$get_product_colors=Color::whereIn('id',$product_color)->get();

}else{
 $all_color="";
 $product_sub_images="";
 $get_product_colors="";
}

// echo $product_sub_images;die;

/*product pricing*/
$product_pricing=ProductPrice::where('product_id',$product_id)->get();

/*echo $product_pricing;die;*/


/*for imprints*/
$imprints=Imprint::where('product_id',$product_id)->with('imprint_price')->with('imprint_colors')->get();


$all_product_images=ProductImage::where('product_id',$product_id)->get();

$product_review=ProductReview::where('product_id',$product_id)->get();

// Related Products Category Wise
$category_ids = CategoryProduct::where('product_id',$product_id)->pluck('category_id');
$category_product_ids = CategoryProduct::whereIn('category_id',$category_ids)->pluck('product_id');
$related_products = Product::whereIn('product_id',$category_product_ids)->with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->take(10)->get();


//Lower Price Products Wise
// $lower_price_products = Product::with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->get();

//$product_ids = Product::pluck('product_id');

//$product_ids_from_prices = ProductPrice::whereIn('product_id',$product_ids)->orderBy('per_item_price','asc')->select('product_id')->groupBy('product_id')->pluck('product_id');

$product_ids_from_prices = ProductPrice::select('product_id')->groupBy('product_id')->take(10)->pluck('product_id');


$lower_price_products = Product::whereIn('product_id', $product_ids_from_prices);

$lower_price_products = $lower_price_products->with('default_product_translation_full')->with('skus')->with('product_prices')->with('product_color_group')->take(10)->get();

/*for all data */
$data=array("product"=>$product,"productdetails"=>$productdetails,"all_color"=>$all_color,"product_sub_images"=>$product_sub_images,"product_pricing"=>$product_pricing,"imprints"=>$imprints,"all_product_images"=>$all_product_images,"get_product_colors"=>$get_product_colors,"product_review"=>$product_review,"related_products"=>$related_products,"lower_price_products"=>$lower_price_products,"product_option"=>$product_option,"product_categorydata"=>$product_categorydata,"child_category"=>$child_category,"parent_category"=>$parent_category,"product_Apparels"=>$product_Apparels);

return view('superior.detail')->with('data',$data);



   $data=[];
   $limit=20;
   $post=$request->all();
   $id=$this->getLoginUserId();
   $source_id=1;
   $language_id=1;

   $product_id=$post["pid"];
   $parent_variant_id=$post["pvid"];

   $child_variant_id=$post["cvid"];
   $sku_id=$post['skuid'];
   $current_date=date('Y-m-d');
   $product=Product::with('default_product_translation')->with('default_product_translation_full')->with('product_translation')->with('product_translation_full')->where("status_id",1)->with('seller')->find($product_id);



   if(!$product){
      
      $request->session()->put('message',"Product does not exists");
      return redirect('/');
   }



   if($sku_id!=0){

      $recent_view_product=RecentViewProduct::whereDate('created_at','>=',$current_date)->where('user',$id)->where('product_id',$product_id)->first();
      if($recent_view_product==""){
         $product=Product::find($product_id);
         if($product!=""){
            $product->view_count=$product->view_count+1;
            $product->save();
         }
      }
      $recent_view_product=new RecentViewProduct();
      
      $recent_view_product->user=$id;
      $recent_view_product->source_id=$source_id;
      $recent_view_product->product_id=$product_id;
      $recent_view_product->save();
      $sku=Sku::find($sku_id);


      if($sku==""){
         $sku=Sku::where('product_id',$product_id)->first();
      }

      $parent_variant_id=$sku->parent_variant_id;
      $child_variant_id=$sku->child_variant_id;
   }elseif($parent_variant_id!=0 && $child_variant_id!=0){


      $sku=Sku::where("product_id",$product_id)->where('parent_variant_id',$parent_variant_id)->where('child_variant_id',$child_variant_id)->first();

      if($sku==""){
         $sku=Sku::where("product_id",$product_id)->where('parent_variant_id',$parent_variant_id)->first();

         if($sku==""){
            $sku=Sku::where('product_id',$product_id)->first();
         }
      }

      $parent_variant_id=$sku->parent_variant_id;
      $child_variant_id=$sku->child_variant_id;
   }


   $sku_id=$sku->sku_id;

   $parent_variants=array();
   $child_variants=array();



   if($parent_variant_id!=0){
      $skuTemp=Sku::where('product_id',$product_id)->where('parent_variant_id',$parent_variant_id)->first();

      if($skuTemp==""){
         $parent_variant_id=0;
      }
   }

   if($child_variant_id!=0){
      $skuTemp=Sku::where('product_id',$product_id)->where('child_variant_id',$child_variant_id)->first();
      if($skuTemp==""){
         $child_variant_id=0; 
      }
   }

   /*Outer If*/
   if($parent_variant_id==0){
      $parent_variant_ids=Sku::where('product_id',$product_id)->where('parent_variant_id','!=',1)->orderBy('parent_variant_id','asc')->distinct('parent_variant_id')->pluck('parent_variant_id');
      
      $parent_variants=VariantOption::with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->whereIn('variant_option_id',$parent_variant_ids)->get();

      /*Inner If*/
      if(!$parent_variant_ids->isEmpty()){
         $parent_variant_id=$parent_variant_ids[0];
         $child_variant_ids=Sku::where('product_id',$product_id)->where('parent_variant_id',$parent_variant_id)->where('child_variant_id','!=',1)->orderBy('child_variant_id','asc')->distinct('child_variant_id')->pluck('child_variant_id');
         $child_variants=VariantOption::with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }])->whereIn('variant_option_id',$child_variant_ids)->get();

         if(!$child_variant_ids->isEmpty()){
            $skuTemp=Sku::where("product_id",$product_id)->where('parent_variant_id',$parent_variant_id)->where("child_variant_id",$child_variant_id)->first();
            if($skuTemp==""){
               $child_variant_id=$child_variant_ids[0];  
            }
         }
      }else{
         /*Inner Else*/

         $child_variant_ids=Sku::where('product_id',$product_id)->where('child_variant_id','!=',1)->orderBy('child_variant_id','asc')->distinct('child_variant_id')->pluck('child_variant_id');
         $child_variants=VariantOption::with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);

         }])->whereIn('variant_option_id',$child_variant_ids)->get();
         if(!$child_variant_ids->isEmpty()){
            $skuTemp=Sku::where("product_id",$product_id)->where("child_variant_id",$child_variant_id)->first();
            if($skuTemp==""){
               $child_variant_id=$child_variant_ids[0];  
            }
         }
      }
   }else{/*Outer Else*/
      $parent_variant_ids=Sku::where('product_id',$product_id)->where('parent_variant_id','!=',1)->orderBy('parent_variant_id','asc')->distinct('parent_variant_id')->pluck('parent_variant_id');
      $parent_variants=VariantOption::with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->whereIn('variant_option_id',$parent_variant_ids)->get();
      /*Inner If*/
      if(!$parent_variant_ids->isEmpty()){
         $child_variant_ids=Sku::where('product_id',$product_id)->where('parent_variant_id',$parent_variant_id)->where('child_variant_id','!=',1)->orderBy('child_variant_id','asc')->distinct('child_variant_id')->pluck('child_variant_id');
         $child_variants=VariantOption::with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }])->whereIn('variant_option_id',$child_variant_ids)->get();
         if(!$child_variant_ids->isEmpty()){
            $skuTemp=Sku::where("product_id",$product_id)->where('parent_variant_id',$parent_variant_id)->where("child_variant_id",$child_variant_id)->first();
            if($skuTemp==""){
               $child_variant_id=$child_variant_ids[0];  
            }
         }else{
            $skuTemp=Sku::where("product_id",$product_id)->where("parent_variant_id",$parent_variant_id)->where("child_variant_id",$child_variant_id)->first();
            if($skuTemp==""){
               $child_variant_id=0;
            }
         }
      }else{/*Inner Else*/

         $child_variant_ids=Sku::where('product_id',$product_id)->where('child_variant_id','!=',1)->orderBy('child_variant_id','asc')->distinct('child_variant_id')->pluck('child_variant_id');
         $child_variants=VariantOption::with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }])->whereIn('variant_option_id',$child_variant_ids)->get();
         if(!$child_variant_ids->isEmpty()){
            $skuTemp=Sku::where("product_id",$product_id)->where("child_variant_id",$child_variant_id)->first();
            if($skuTemp==""){
               $child_variant_id=$child_variant_ids[0];  
            }

         }
      }
   }

   if($parent_variant_id==0){
      $parent_variant_id=1;
   }

   if($child_variant_id==0){
      $child_variant_id=1;
   }


   $images=ProductImage::where('product_id',$product_id);


   $images=$images->where(function($query) use($parent_variant_id){
      $query->where('parent_variant_id',$parent_variant_id)->orWhere('parent_variant_id',1);
   })->where(function($query) use ($child_variant_id){
      $query->where('child_variant_id',$child_variant_id)->orWhere('child_variant_id',1);
   })->get();



   $sku=Product::with('product_translation')->with(['product_translation_full'=> function($query) use ($language_id){
      $query->where('language_id',$language_id);
   }])->with(['return_policy'=>function($query) use ($language_id){
      $query->with('default_return_policy_translation')->with(['return_policy_translation'=>function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }]);
   }])->with(['brand'=>function($query) use ($language_id){
      $query->with('default_brand_translation')->with(['brand_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }]);
   }])->with(['parent_variant'=>function($query) use ($language_id){
      $query->with('default_variant_translation')->with(['variant_translation'=>function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }]);
   }])->with(['child_variant'=>function($query) use ($language_id){
      $query->with('default_variant_translation')->with(['variant_translation'=>function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }]);
   }])->with(['sku'=> function($query) use ($language_id,$id,$sku_id){
      $query->with('wishlist')->with(['parent_variant'=>function($query) use ($language_id){
         $query->with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }]);
      }])->with(['child_variant'=>function($query) use ($language_id){
         $query->with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
            $query->where('language_id',$language_id);
         }]);
      }])->where("sku_id",$sku_id);
   }])->whereHas('sku',function($query) use ($sku_id){
      $query=$query->where('sku_id',$sku_id);
   })->where("product_id",$product_id)->first();
   
   $wishlist=Wishlist::where('user',$id)->where('sku_id',$sku->sku->sku_id)->first();



   $reviews=ProductReview::with('images')->where('is_approved',1)->where('product_id',$product_id)->orderBy('review_id','desc')->with('user')->take('5')->get();

   $product=Product::where('status_id',1)->with('reviewCount')->with('brand')->with('gst')->find($product_id);


   $cart="";
   if(Auth::user()){
      $cart=Cart::where('sku_id',$sku->sku->sku_id)->where('user',$id)->first();
   }
   if($product==""){
      $product_not_found=Toast::where('language_id',$language_id)->first()->product_not_found;
      $this->data['msg']=$product_not_found;
      $this->response['data']=$this->data;
      return $this->response;
   }
   $variant_options=array();
   $my_rating=0;
   $product_review=ProductReview::with('images')->where('is_approved',1)->where('user_id',$id)->where('product_id',$product_id)->first();

   if($product_review!=""){
      $my_rating=$product_review['rating'];
   }

   $category_ids=CategoryProduct::where('category_id','!=',1)->where('product_id',$product_id)->distinct('category_id')->pluck('category_id');
   if ($category_ids!="[]") {
      $breadcum_category=Category::with('category_translation')->whereIn('category_id',$category_ids)->first();

      $parent_category_id=CategoryHierarchy::where('child_category_id',$breadcum_category->category_id)->first();
      
      if ($parent_category_id!="") {
         $parent_category=Category::with('category_translation')->find($parent_category_id->parent_category_id);
      }else{
         $parent_category="";
      }
   }else{
      $breadcum_category="";
      $parent_category="";
   }
   $product_ids=CategoryProduct::whereIn('category_id',$category_ids)->distinct('product_id')->take($limit)->pluck('product_id');

   $similar_products=Product::with('sku')->with('brand')->with('reviewCount')->with('default_product_translation')->with(['product_translation'=>function($query) use($language_id){
      $query->select('product_translations.product_id','product_translations.product_name')->where('language_id',$language_id);
   }])->whereIn('product_id',$product_ids)->where('status_id',1)->distinct('product_id')->orderBy('product_id','desc')->where('product_id','!=',$product_id)->take($limit)->get();


   $cart_count=Cart::where('user',$id)->count();

   $offer_blocks=OfferBlock::where('status_id',1)->with('default_offer_block_translation')->with(['offer_block_translation'=>function($query) use ($language_id){
      $query->where('language_id',$language_id);
   }])->get();


      // for notificatin reads

   if(isset($_GET['nid'])){
      $notification_id=$request->nid;
      $notification_reads=NotificationRead::where('notification_id',$notification_id)->where('user_id',$id)->first();

      if($notification_reads==""){
         $notification_read=New NotificationRead();
         $notification_read->notification_id=$notification_id;
         $notification_read->user_id=$id;
         $notification_read->save();
      }
      
   }

      //seo

   if ($product->product_translation_full!="") {

      $meta_title=$product->product_translation_full->meta_title;
      $meta_keywords=$product->product_translation_full->meta_keywords;
      $meta_description=$product->product_translation_full->meta_description;
   }else{
      $meta_title=$product->default_product_translation->meta_title;
      $meta_keywords=$product->default_product_translation->meta_keywords;
      $meta_description=$product->default_product_translation->meta_description;
   }

   $data=array("images"=>$images,"reviews"=>$reviews,"my_rating"=>$my_rating,'cart_count'=>$cart_count,'parent_variants'=>$parent_variants,'child_variants'=>$child_variants,'parent_variant_id'=>$parent_variant_id,'child_variant_id'=>$child_variant_id,'sku'=>$sku,'cart'=>$cart,"similar_products"=>$similar_products,"offer_blocks"=>$offer_blocks,'wishlist'=>$wishlist,"breadcum_category"=>$breadcum_category,'parent_category'=>$parent_category);
   
}




public function register(){
    $Allstates=StateTranslation::all();
    $Allcity=CityTranslation::all();  
   return view('auth.register')->with('Allstates',$Allstates)->with('Allcity',$Allcity);
}


   public function getAboutUs(Request $request){
      
      $post=$request->all();
      $language_id=1;

      $aboutus=About::with('default_aboutus_translation')->with(['aboutus_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->first();

      return view("superior.aboutus")->with('aboutus',$aboutus);
   }

   public function getFaq(Request $request){
      
      $post=$request->all();
      $language_id=1;

      $faq=Faq::with('default_faq_translation')->with(['faq_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->first();
     
      return view("superior.faq")->with('faq',$faq);
   }


public function getCart(Request $request){

      $post=$request->all();
      $language_id=1;
      $id=$this->getLoginUserId();

      /*echo $id;die;*/

      $carts=Cart::where("user_id",$id)->with('cart_item')->with('user')->first();
       
      $cart_item_imprint_color=CartItemImprintColors::where('color_id','!=',"")->get();

      if($carts!=[]){
      $cart_id=$carts->id;  
      $cart_items=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('cart_id',$cart_id)->orderBy('created_at','desc')->get();
      }else{    
        $cart_items="[]";  
      }
      
      if($carts!=[]){
      $cart_count=$carts->count();
       }else{
         $cart_count=0;
       }
      $data=array(
         "products"=>$cart_items,
         "is_gst"=>1,
         "cart_count"=>$cart_count,
         "cart_item_imprint_color"=>$cart_item_imprint_color,     
      );
      return view('superior.cart')->with('data',$data);
   }
   


   //old get cart
   // public function getCart(Request $request){
   //    $post=$request->all();

   //    $language_id=1;

   //    $id=$this->getLoginUserId();


   //    $carts=Cart::where("user",$id)->with('user')->with(['sku'=>function($query) use ($language_id){
   //       $query->with(['product'=> function($query) use ($language_id){
   //          $query->with('default_product_translation')->with(['product_translation'=> function($query) use ($language_id){
   //             $query->select('product_translations.product_id','product_translations.product_name','delivery_message')->where('language_id',$language_id);
   //          }])->with(['brand'=>function($query) use ($language_id){
   //             $query->with('default_brand_translation')->with(['brand_translation'=> function($query) use ($language_id){
   //                $query->where('language_id',$language_id);
   //             }]);
   //          }]);
   //       }])->with(['parent_variant'=>function($query) use ($language_id){
   //          $query->with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
   //             $query->where('language_id',$language_id);
   //          }]);
   //       }])->with(['child_variant'=>function($query) use ($language_id){
   //          $query->with('default_variant_option_translation')->with(['variant_option_translation'=> function($query) use ($language_id){
   //             $query->where('language_id',$language_id);
   //          }]);
   //       }]);
   //    }])->orderBy('created_at','desc')->get();

   //    $cart_id=$carts->pluck('cart_id');
      


   //    $cart_count=$carts->count();
   //    $data=array(
   //       "products"=>$carts,
   //       "is_gst"=>1,
   //       "cart_count"=>$cart_count,
         
   //    );
   //    return view('superior.cart')->with('data',$data);
   // }




public function getTermsConditions(Request $request){
      

      $post=$request->all();
      
      $language_id=1;
      $theme_path=$this->getThemePath();

      $term_conditions=TermCondition::with('default_term_condition_translation')->with(['term_condition_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->where('status_id',1)->first();

      return view('superior.terms-conditions')->with('term_conditions',$term_conditions);
   }

   public function getPrivacyPolicy(Request $request){
      
      $post=$request->all();
      $language_id=1;
      
      $theme_path=$this->getThemePath();
      $policies=Policy::with('default_policy_translation')->with(['policy_translation'=> function($query) use ($language_id){
         $query->where('language_id',$language_id);
      }])->first();

      return view('superior.privacy-policy')->with('policies',$policies);
   }

    public function get404(){ 
      return view('superior.404');  
   }



   public function getContact(Request $request){
      
      $id=1;//$this->getLoginUserId();
      $address=Address::find($id);
      $theme_path=$this->getThemePath();
      $ContactUs=ContactUs::first();
      return view('superior.contact')->with('address',$address)->with('ContactUs',$ContactUs);  
   }

   public function postContact(Request $request){
      
      $language_id=1;
      $email=$request->email;
      $this->validate($request,Contact::$rules);

      $contact = new Contact();
      $contact->name = $request->name;
      $contact->email = $request->email;
      $contact->contact_number=$request->contact_number;
      $contact->subject = $request->subject;
      $contact->comment = $request->comment;
      $contact->save(); 
      
      $request->session()->put('message',"Thank you for contacting us");
      return redirect('contact');
   }


public function getshop(Request $request){
   $client = new \GuzzleHttp\Client();
  
      //Filter Data
      $shop_cat_id = $request->shop_cat_id;
      $pagi_num = $request->pagi_num;
      $cat_id = $request->cat_id;
      $search = $request->search;
      $page=$request->page;
      $category_id = $request->category_id;
     
      $color_id = $request->color_id;
      $category_ids=explode(',',$category_id);
      
      $color_ids = explode(',',$color_id);
      $under_dollar_1 = $request->under_dollar_1;

        $max_prices=explode(',',$request->max);
        $min_prices=explode(',',$request->min);

        $max_price = max($max_prices);
        $min_price = min($min_prices);

        $max_quantities = explode(',',$request->max_quantity);
        $min_quantities = explode(',',$request->min_quantity);

        $max_quantity = max($max_quantities);
        $min_quantity = min($min_quantities);

        $orderby = $request->orderby;

          $product = Product::with('product_categories')->take(1)->get();
	
       	//$products=Product::with('default_product_translation')->with('wishlist')->with('default_product_translation_full')->with(['product_category'=>function($query){
        //    $query->where('category_id','!=',1)->with('category');
        // }])->with('seller')->with('status')->with('skus')->with('product_prices')->with('product_color_group');

      $products=Product::with('default_product_translation')->with('wishlist')->with('default_product_translation_full')->with(['product_category'=>function($query){
            $query->where('category_id','!=',1)->with('category');
         }])->with('seller')->with('status')->with('skus')->with('product_prices')->with('product_color_group');
	
	

      $user_id=$this->getLoginUserId();
      $wishlist = Wishlist::where('user_id',$user_id);

      // $products = $products->get();
      // foreach ($products as $product) {
      //          // echo $product->product_color_group;die;
      //       }  

      if($under_dollar_1!="" && $under_dollar_1==1){
          $under_dollar_1 = 1;
          $product_ids_for_under_dollar_1 = ProductPrice::where('per_item_price','<=',1)->plucK('product_id');
          $products = $products->whereIn('product_id',$product_ids_for_under_dollar_1);
      }

      //search and cat_id content start-------------------------
      // if($search!=""&&$cat_id!=""){
      //    $product_ids = CategoryProduct::where('category_id',$cat_id)->distinct()->pluck('product_id');
      //    $products = $products->whereIn('product_id',$product_ids);
      // }

      // if($search!=""&&$cat_id==""){
      if($search!=""){
        
        
        
        // $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $search = str_replace(' ', ',', $search);
        
        $search_content = preg_replace('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]+/', ',', $search); // Removes special chars.
        
        $searches = explode(',',$search_content);
        
        
        $category_ids_from_translation_list =[];
        $product_ids_from_translation_list =[];

        foreach($searches as $search_item){
            
                $category_ids_from_translation = CategoryTranslation::where('category_name','like','%'.$search_item.'%')->pluck('category_id');
                
                $product_id_from_category = CategoryProduct::whereIn('category_id',$category_ids_from_translation)->distinct()->pluck('product_id');
                
                $product_id_from_category = $product_id_from_category->toArray();
                foreach($product_id_from_category as $product_id){
                    array_push($category_ids_from_translation_list,$product_id);
                }
                

                // product
                $product_ids_from_translation = ProductTranslation::where('product_name','like','%'.$search_item.'%')->orWhere('product_id','like','%'.$search_item.'%')->pluck('product_id');
                
                $product_ids_from_translation = $product_ids_from_translation->toArray();
                foreach($product_ids_from_translation as $product_id){
                    array_push($product_ids_from_translation_list,$product_id);
                }
        }
        
         
         $merged_product_ids = array_merge($category_ids_from_translation_list, $product_ids_from_translation_list);
         
        
         
         $products = $products->whereIn('product_id',$merged_product_ids);
      }
      // if($search==""&&$cat_id!=""){
      //    $products = $products->whereHas('product_categories',function($q) use($cat_id){
      //       $q->where('category_id', $cat_id)->where('status_id',1);
      //    });
      // }
      //search and cat_id content end-------------------------

      if($category_id!=""){   

         $products = $products->whereHas('product_categories',function($q) use($category_ids){
            $q->whereIn('category_id', $category_ids)->where('status_id',1);
         });
      }

      if($color_id!=""){

         $product_color_group_ids=ProductColor::whereIn('color_id',$color_ids)->pluck('product_color_group_id');
         $products = $products->whereHas("product_color_group",function($query) use($product_color_group_ids){
            $query->whereIn('id',$product_color_group_ids);
         });
      }

      $max_product_price = ProductPrice::where('product_id',"!=",'')->where('per_item_price',"!=",'')->orderBy('per_item_price', 'desc')->first();

      if ($max_product_price!=""){
            $max_product_price=$max_product_price->per_item_sale_price;
            
        }else{
            $max_product_price=2000;
        }

        if($max_price==""){
         $max_price=$max_product_price;
        }

        if($min_price==""){
         $min_price=0;
        }

        if($max_price!=""){

         $products=$products->whereHas('product_prices',function($query) use($max_price){
            $query->where('per_item_price',"<=",$max_price);
         });
        }



        if($min_price!=""){
         
         $products=$products->whereHas('product_prices',function($query) use($min_price){
            $query->where('per_item_price',">=",$min_price);
         });
        }



        $min_value=$min_price;
        $max_value=$max_product_price;

        $max1=$max_value*0.10;
        if((ceil($max1 / 100) * 100)<$min_value){
            $min_value=$max1;
        }
        $max2=$max_value*0.25;
        $max3=$max_value*0.50;
        $max4=$max_value*0.75;

        // $rangeLimits = array($min_value,ceil($max1 / 100)*100,ceil($max2 / 100)*100,ceil($max3 / 100)*100,ceil($max4 / 100)*100,$max_value);
      $rangeLimits = array($min_value,$max1,$max2,$max3,$max4,$max_value);
        $ranges = array();

        for($i = 0; $i < count($rangeLimits); $i++){
            if($i == count($rangeLimits)-1){
                break;
            }
            $lowLimit = $rangeLimits[$i];
            $highLimit = $rangeLimits[$i+1];

            $ranges[$i]['min'] = $lowLimit;
            $ranges[$i]['max'] = $highLimit;
        }





        // Quantity Start ========

          $max_product_price_count_from = ProductPrice::where('product_id',"!=",'')->where('count_from',"!=",'')->orderBy('count_from', 'desc')->first();

          if($max_product_price_count_from!=""){
              $max_product_price_count_from = $max_product_price_count_from->count_from;
          }else{
              $max_product_price_count_from = 1000000;
          }


          if($max_quantity==""){
             $max_quantity=$max_product_price_count_from;
          }

          if($min_quantity==""){
            $min_quantity=0;
          }


          if($max_quantity!=""){
            $products=$products->whereHas('product_prices',function($query) use($max_quantity){
              $query->where('count_from',"<=",$max_quantity);
           });
          }



        if($min_quantity!=""){
         
         $products=$products->whereHas('product_prices',function($query) use($min_quantity){
            $query->where('count_from',">=",$min_quantity);
         });

        }

 

         if($min_quantity!=""&&$max_quantity!=""){
         
         $products=$products->whereHas('product_prices',function($query) use($min_quantity,$max_quantity){
            $query->where('count_from',">=",$min_quantity)->where('count_from',"<=",$max_quantity)->orderBy('count_from','asc');
            /*$query->whereBetween('count_from',[$min_quantity,$max_quantity])->orderBy('count_from','asc');*/
         });
        }

        // $min_value=$min_quantity;
        // $max_value=$max_product_price_count_from;

        $min_quantity_value=$min_quantity;
        $max_quantity_value=$max_product_price_count_from;

        $max_qty_1=$max_quantity_value*0.10;
        if((ceil($max_qty_1 / 100) * 100)<$min_quantity_value){
            $min_quantity_value=$max_qty_1;
        }
        $max_qty_2=$max_quantity_value*0.25;
        $max_qty_3=$max_quantity_value*0.50;
        $max_qty_4=$max_quantity_value*0.75;

        // $qty_rangeLimits = array($min_quantity_value,ceil($max_qty_1 / 100)*100,ceil($max_qty_2 / 100)*100,ceil($max_qty_3 / 100)*100,ceil($max_qty_4 / 100)*100,$max_quantity_value);
      $qty_rangeLimits = array($min_quantity_value,$max_qty_1,$max_qty_2,$max_qty_3,$max_qty_4,$max_quantity_value);
        $qty_ranges = array();

        for($i = 0; $i < count($qty_rangeLimits); $i++){
            if($i == count($qty_rangeLimits)-1){
                break;
            }
            $qty_lowLimit = $qty_rangeLimits[$i];
            $qty_highLimit = $qty_rangeLimits[$i+1];

            $qty_ranges[$i]['qty_min'] = $qty_lowLimit;
            $qty_ranges[$i]['qty_max'] = $qty_highLimit;
        }



        //Quantity End ===========

        // print_r($qty_ranges);die;



        if($orderby!=""){
         if($orderby=="popularity"){
            $products=$products->where('is_stock_collection',1);
         }
         if($orderby=="avg_rating"){

            // $product_ids = $products->pluck('product_id');
            // $product_ids_from_reviews = ProductReview::orderBy('rating','desc')->select('product_id')->groupBy('product_id')->take(100)->pluck('product_id');
            // echo $product_ids;die;
            // $product_ids_from_reviews=$product_ids_from_reviews->toArray();
            // $product_ids_ordered = implode(',',$product_ids_from_reviews);
            // $products = $products->whereIn('product_id',$product_ids_from_reviews)->orderByRaw("FIELD(product_id,$product_ids_ordered)");



            $products=$products->whereHas('product_review',function($q) {
            $q->orderBy('rating','desc');
         });

         }

         if($orderby=="newness"){

            $products=$products->orderBy('created_at','desc');

         }

         if($orderby=="LowToHighPrice"){

            $product_ids = $products->pluck('product_id');
            $product_ids_from_prices = ProductPrice::whereIn('product_id',$product_ids)->orderBy('per_item_price','asc')->select('product_id')->pluck('product_id');
            $product_ids_from_prices=$product_ids_from_prices->toArray();
            $product_ids_ordered = implode(',', $product_ids_from_prices);
            $products = $products->whereIn('product_id', $product_ids_from_prices)->orderByRaw("FIELD(product_id, $product_ids_ordered)");
            
         }

         if($orderby=="HighToLowPrice"){
            
            $product_ids = $products->pluck('product_id');
            $product_ids_from_prices = ProductPrice::whereIn('product_id',$product_ids)->orderBy('per_item_price','desc')->select('product_id')->pluck('product_id');
            $product_ids_from_prices=$product_ids_from_prices->toArray();
            $product_ids_ordered = implode(',', $product_ids_from_prices);
            $products = $products->whereIn('product_id', $product_ids_from_prices)->orderByRaw("FIELD(product_id, $product_ids_ordered)");
            
         }
      }
	
      if($shop_cat_id!=""){
         $child_category_ids = CategoryHierarchy::where('parent_category_id',$shop_cat_id)->pluck('child_category_id');
         $shop_category_ids = [];
         array_push($shop_category_ids, $shop_cat_id);
         $merge_shop_category_ids = array_merge($shop_category_ids,$child_category_ids->toArray());

         $products = $products->whereHas('product_categories',function($q) use($merge_shop_category_ids){
            $q->whereIn('category_id', $merge_shop_category_ids)->where('status_id',1);
         });
      }  

     
	
      if($pagi_num!=""){
         $pagi_num = (int) $pagi_num;
      $products_count = $products->count();
       if($pagi_num>=$products_count){
            $menu_products = $products->get();
            $products = $products->paginate($pagi_num);
        }else{
            $menu_products = $products->get();
            $products = $products->paginate(12);
         }
      }else{
        $menu_products = $products->get();
        $products = $products->paginate(12);
     }


      

//       $users = User::whereHas('posts', function($q){
//     $q->where('created_at', '>=', '2015-01-01 00:00:00');
// })->get();

      $categories = Category::where('status_id',1)->with('category_translation')->with('product_count')->get();
      $product_color_ids = ProductColor::Select('color_id')->groupBy('color_id')->pluck('color_id');
      $colors = Color::whereIn('id',$product_color_ids)->get();

      //wishlist
      $user_id=$this->getLoginUserId();
      $user_wishlists = Wishlist::where('user_id',$user_id)->pluck('product_id')->toArray();

	

      return view('superior.category')->with('products',$products)->with('categories',$categories)->with('category_ids',$category_ids)->with('colors',$colors)->with('color_ids',$color_ids)->with('ranges',$ranges)->with('max_prices',$max_prices)->with('min_prices',$min_prices)->with('orderby',$orderby)->with('page',$page)->with('search',$search)->with('cat_id',$cat_id)->with('pagi_num',$pagi_num)->with('shop_cat_id',$shop_cat_id)->with('menu_products',$menu_products)->with('user_wishlists',$user_wishlists)->with('wishlist',$wishlist)->with('max_quantities',$max_quantities)->with('min_quantities',$min_quantities)->with('qty_ranges',$qty_ranges)->with('under_dollar_1',$under_dollar_1);
   }





public function getMyProfile(){
    $user = Auth::user();

    if($user!=""){
      $user_id=$user->id;
      $wishlists = Wishlist::where('user_id',$user->id)->with('product')->get();
      $wishlist = Wishlist::where('user_id',$user->id);
      $billing_addresses = Address::where("user_id",$user->id)->where('is_billing',1)->with('city')->with('state')->with('country')->with('user')->get();
      $shipping_addresses=Address::where("user_id",$user->id)->where('is_billing',0)->with('city')->with('state')->with('country')->with('user')->get();

      // use is shipping
      $user_address=Address::where('user_id',$user->id)->where("is_shipping",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first();
      if($user_address==""){
         $user_address=Address::where('user_id',$user->id)->where("is_default_add",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first();
      }

      if($user==""){
      $user=Address::where('user_id',$user_id)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first();
      }
      

      $Allstates=StateTranslation::whereHas('state',function($query){
          $query->where('country_id',190);
      })->get();
      
      $Allcity=CityTranslation::all();

    $order_history=Order::where('is_reorder',0)->where('user_id',$user->id)->with('orderitems')->orderBy('id','desc')->get();

      // foreach ($order_history as $order) {
        
      // } 




      $order_items = OrderItem::with('artproofs')->whereHas('artproofs',function($q){
        $q->where('approved',2);
      })->with('product')->whereHas('order', function($q) use($user_id){
        $q->where('user_id',$user_id);
      })->orderBy('order_id','desc')->get();

      $art_proofs = ArtProof::where('user_id',$user_id)->where('approved',2)->with('orderitem')->with('user')->get();

//       $users = User::whereHas('posts', function($q){
//     $q->where('created_at', '>=', '2015-01-01 00:00:00');
// })->get();
      
  $my_account_profile = User::where('id',$user->id)->first();

  $reorder_lists = Order::where('user_id',$user->id)->where('is_reorder',1)->with('orderitem')->orderBy('id','desc')->get();
  // echo $reorder_lists;die;

    // $data=array("all_billing_address"=>$all_billing_address,"all_address"=>$all_address,"user"=>$user,"product_total"=>$product_total,"order_total"=>$order_total,"shipping_cost"=>$shipping_cost,"Allstates"=>$Allstates,"Allcity"=>$Allcity);

      $data=array("Allstates"=>$Allstates,"Allcity"=>$Allcity);


      date_default_timezone_set('America/New_York');
      $today_current_date = date('m-d-Y');
        
    $save_cart_items = CartItemSave::where('user_id',$user->id)->with('cart_item')->get();
    


      return view('superior.my-account-profile')->with('my_account_profile',$my_account_profile)->with('user',$user)->with('wishlists',$wishlists)->with('wishlist',$wishlist)->with('billing_addresses',$billing_addresses)->with('shipping_addresses',$shipping_addresses)->with('data',$data)->with('order_history',$order_history)->with('user_address',$user_address)->with('art_proofs',$art_proofs)->with('reorder_lists',$reorder_lists)->with('today_current_date',$today_current_date)->with('save_cart_items',$save_cart_items);
    }else{
      return redirect('/');
    }

    
  }

  

  

   //New Changes My acc Start
  public function postMyAccBillAddressAdd(Request $request){
  // dd($request->all());
    // $user_id=$this->getLoginUserId();
     $auth_user = Auth::user();
    if($auth_user->role_id==1){
       $user_id = $request->customer_id; 
    }else{
      $user_id = $auth_user->id;
    }


if($request->city!=""){

      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }
    }


     $address= new Address();
     $address->user_id=$user_id;
     $address->address=$request->add1;
     $address->name=$request->fname;
     $address->last_name=$request->lname; 
     $address->company_name=$request->companyname; 
     $address->address2=$request->add2; 
     $address->zip_code=$request->zipcode; 
     $address->telephone=$request->telephone; 
     $address->ext=$request->ext; 
     //$address->fax=$request->fax;
     $address->city_id=$city_id;
     $address->state_id=$request->state;
     $address->country_id=$request->Country;
     $address->is_billing=1;
     $address->save(); 

     $address_new = Address::where('address_id',$address->address_id)->with('city')->with('state')->with('country')->with('user')->first();

     $view=View::make('superior.addNewBillingAddress')->with('address_new',$address_new);
    $sections=$view->renderSections();

    $data = $sections["addNewBillAddress"];


    $this->data['data']=$sections['addNewBillAddress'];
  $this->response['status']="true";
  $this->response['data']=$this->data;
   return $this->response;

     // return $data;
}


public function postMyAccShippAddressAdd(Request $request){

  // $user_id=$this->getLoginUserId();
  $auth_user = Auth::user();

  if($auth_user->role_id==1){
     $user_id = $request->customer_id; 
  }else{
    $user_id = $auth_user->id;
  }


if($request->city!=""){
      
      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

    }



   if($request->is_default_add=="true"){  

    $before_default_shipping_address =Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first(); 
      if($before_default_shipping_address!=""){
            $view2=View::make('superior.unMakeDefaultShippingAddress')->with('address',$before_default_shipping_address);
            $sections2=$view2->renderSections();
      }else{
            $sections2['unMakeDefaultShippAddress']="";
      }

    
    $address=Address::where("user_id",$user_id)->where("is_shipping",1)->update(['is_shipping'=>0]);

   $is_default_add=1;  
   }else{
       $is_default_add=0;
       $sections2['unMakeDefaultShippAddress']="";
   }

   $address= new Address();
   $address->user_id=$user_id;
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   //$address->fax=$request->fax;
   $address->city_id=$city_id;
   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->is_shipping=$is_default_add;
   $address->save(); 

   // $address_new = Address::where('address_id',$address->address_id)->with('city')->with('state')->with('country')->first();
   $address_new = Address::where('address_id',$address->address_id)->with('city')->with('state')->with('country')->first();

     $view=View::make('superior.addNewShippingAddress')->with('address',$address_new);
    $sections=$view->renderSections();

    
    $data=array("sections"=>$sections['addNewShipAddress'],'sections2'=>$sections2['unMakeDefaultShippAddress'],'is_default_add'=>$is_default_add);


    $this->data['data']=$data;
  $this->response['status']="true";
  $this->response['data']=$this->data;
   return $this->response;
}

public function postMyAccShipAddressEdit(Request $request){
     
   $address_id=$request->address_id;
   $user_id=$this->getLoginUserId();


  if($request->city!=""){
      
      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

  }






   if($request->is_default_add=="true"){
      
          $before_default_shipping_address =Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first();

            if($before_default_shipping_address!=""){
                $before_default_shipping_address_id = $before_default_shipping_address->address_id;
                $address=Address::where("user_id",$user_id)->where("is_shipping",1)->update(['is_shipping'=>0]);
                $before_default_shipping_address =Address::where('address_id',$before_default_shipping_address_id)->with('city')->with('state')->with('country')->with('user')->first();
                if($before_default_shipping_address!=""){
                      $view2=View::make('superior.unMakeDefaultShippingAddress')->with('address',$before_default_shipping_address);
                      $sections2=$view2->renderSections();
                }else{
                      $sections2['unMakeDefaultShippAddress']="";
                }

                $before_make_default_address_id = $before_default_shipping_address->addressid;
            }else{
              $sections2['unMakeDefaultShippAddress']="";
              $before_make_default_address_id = "";
            }




       $is_default_add=1;
   }else{
       $is_default_add=0;
       $sections2['unMakeDefaultShippAddress']="";
       $before_make_default_address_id = "";






   }

   $address=Address::find($address_id);
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   //$address->fax=$request->fax; 
   $address->city_id=$city_id; 
   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->is_shipping=$is_default_add;
   
   $address->save(); 

   $new_address_id  = $address->address_id;
   $address = Address::where('address_id',$new_address_id)->with('city')->with('state')->with('country')->with('user')->first();
   


  $view=View::make('superior.editShippingAddressMyAcc')->with('address',$address);
  $sections=$view->renderSections();

  $data=array("sections"=>$sections['editShippAddressMyAcc'],"sections2"=>$sections2['unMakeDefaultShippAddress'],"address_id"=>$address_id,'is_default_add'=>$is_default_add,'before_make_default_address_id'=>$before_make_default_address_id);

      $this->data['data']=$data;
      $this->response['status']="true";
      $this->response['data']=$this->data;
         return $this->response;

}




public function postMyAccBillAddressEdit(Request $request){
  // dd($request->all());

   $address_id=$request->address_id;
   // $user_id=$this->getLoginUserId();
   $auth_user = Auth::user();

  if($auth_user->role_id==1){
     $user_id = $request->customer_id; 
  }else{
    $user_id = $auth_user->id;
  }





if($request->city!=""){
      
      $city_name=ucwords($request->city);
      $existing_city=CityTranslation::where('city_name',$request->city)->first();

      if ($existing_city=="") {

        $city = new City();
        $city->state_id=$request->state;  
        $city-> save();

        $city_translation= new CityTranslation();
        $city_translation->city_id=$city->city_id;
        
        $city_translation->language_id=1;
        $city_translation->city_name=$city_name;

        $city_translation->save();

        $city->city_translation_id=$city_translation->city_translation_id;            
        $city->save();
        $city_id=$city->city_id;
      }else{
        $city_id=$existing_city->city_id;
      }

    }




   $address=Address::find($address_id);
   $address->address=$request->add1;
   $address->name=$request->fname;
   $address->last_name=$request->lname; 
   $address->company_name=$request->companyname; 
   $address->address2=$request->add2; 
   $address->zip_code=$request->zipcode; 
   $address->telephone=$request->telephone; 
   $address->ext=$request->ext; 
   //$address->fax=$request->fax; 
   $address->city_id=$city_id;
   $address->state_id=$request->state; 
   $address->country_id=$request->Country;
   $address->save();

   $new_address_id = $address->address_id;
   $address = Address::where('address_id',$new_address_id)->with('city')->with('state')->with('country')->with('user')->first();
    
  // $Allstates=StateTranslation::all();
  // $Allcity=CityTranslation::all();
  
  // $all_billing_address=Address::where('user_id',$user_id)->where("is_billing",1)->get();
  // $data=array("all_billing_address"=>$all_billing_address,"Allstates"=>$Allstates,"Allcity"=>$Allcity);


   
 
  $view=View::make('superior.editBillingAddressMyAcc')->with('address',$address);
  $sections=$view->renderSections();

  // $user=Address::where("user_id",$user_id)->where("is_billing",1)->where("used_billing",1)->first();
  // $data=array("user"=>$user);

  // $view2=View::make('superior.usedbillingaddress')->with('data',$data);
  // $sections2=$view2->renderSections();


  $data=array("sections"=>$sections['editBillAddressMyAcc'],"address_id"=>$address_id);

         $this->data['data']=$data;
         $this->response['status']="true";
         $this->response['data']=$this->data;
         return $this->response;

}


public function postMyAccBillAddressDelete(Request $request){
  $address_id = $request->address_id;
  $address = Address::where('address_id',$address_id)->first();
  if($address!=""){
      $address->delete();
      $data = array('address_id'=>$address_id,'success'=>'true');
      return $data;
  }else{
    $data = array('address_id'=>$address_id,'success'=>'false');
      return $data;
  }

}


public function postMyAccShippAddressDelete(Request $request){
  // dd($request->all());
      $address_id = $request->address_id;
      $address = Address::where('address_id',$address_id)->first();
      if($address!=""){
          $address->delete();
          $data = array('address_id'=>$address_id,'success'=>'true');
          return $data;
      }else{
        $data = array('address_id'=>$address_id,'success'=>'false');
          return $data;
      }
}


public function postMyAccShippAddressMakeDefault(Request $request){
        // $user_id=$this->getLoginUserId();
        $auth_user = Auth::user();

  

    if($auth_user->role_id==1){
       $user_id = $request->customer_id; 
    }else{
      $user_id = $auth_user->id;
    }


      $before_default_shipping_address =Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->with('city')->with('state')->with('country')->with('user')->first(); 
      if($before_default_shipping_address!=""){
            $view2=View::make('superior.unMakeDefaultShippingAddress')->with('address',$before_default_shipping_address);
            $sections2=$view2->renderSections();
      }else{
            $sections2['unMakeDefaultShippAddress']="";
      }

      $address=Address::where("user_id",$user_id)->where("is_shipping",1)->update(['is_shipping'=>0]);
      $address=Address::where("user_id",$user_id)->where("is_default_add",1)->update(['is_default_add'=>0]);

      
      $address_id = $request->address_id;
      $address = Address::where('address_id',$address_id)->with('city')->with('state')->with('country')->with('user')->first();
        if($address!=""){
            $address = Address::find($address_id);
            $address->is_default_add=1;
            $address->is_shipping=1;
            $address->save();
            $address_new = Address::where('address_id',$address->address_id)->with('city')->with('state')->with('country')->with('user')->first();

            $view=View::make('superior.makeDefaultShippingAddress')->with('user_address',$address_new);
            $sections=$view->renderSections();

            

            $data=array("sections"=>$sections['makeDefaultShippAddress'],'sections2'=>$sections2['unMakeDefaultShippAddress'],"address_id"=>$address_id);

            $this->data['data']=$data;
            $this->response['status']="true";
            $this->response['data']=$this->data;
         return $this->response;
        }

}


public function postDownloadArtProofs(Request $request){
    $link = $request->link;
  return Storage::download($link);
}


public function postMyAccArtProofApproved(Request $request){
      $art_proof_id = $request->art_proof_id;
      $customer_note = $request->customer_note;
      $art_proof = ArtProof::where('id',$art_proof_id)->first();
      if($art_proof!=""){
        $art_proof_id = $art_proof->id;
        $art_proof=ArtProof::find($art_proof_id);
        $art_proof->customer_note=$customer_note;
        $art_proof->approved = 1;
        $art_proof->save();

        $data = array('success'=>'true','art_proof_id'=>$art_proof_id,'art_proof'=>$art_proof);
        return $data;
      }else{
        $data=array('success'=>'false','art_proof_id'=>$art_proof_id);
        return $data;
      }
  }


public function postMyAccArtProofDeclined(Request $request){

      $art_proof_id = $request->art_proof_id;
      $customer_note = $request->customer_note;
      $art_proof = ArtProof::where('id',$art_proof_id)->first();
      if($art_proof!=""){
        $art_proof_id = $art_proof->id;
        $art_proof=ArtProof::find($art_proof_id);
        $art_proof->customer_note=$customer_note;
        $art_proof->approved = 0;
        $art_proof->save();
        $data = array('success'=>'true','art_proof_id'=>$art_proof_id,'art_proof'=>$art_proof);
        return $data;
      }else{
        $data=array('success'=>'false','art_proof_id'=>$art_proof_id);
  }
}


  //New Changes My acc End


public function postRegisterNewUser(Request $request){

$request->validate([
'day_telephone' => 'required|unique:users|',
]);

$mbno=str_replace('-',' ',$request->day_telephone);
if($request->mailpermission==""&&$request->mailpermission==null){
          $mailpermission=0;
        }else{
         $mailpermission=1;
        }

         $user= new User();
         $user->name=$request->fname;
         $user->role_id=3;
         $user->last_name=$request->lname;
         $user->country=190;
         $user->email=$request->email;
         $user->password=Hash::make($request->pass1);
         $user->contact_number=$request->day_telephone;
         $user->company_name='Superior Promos';
         $user->address1="Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130 USA";
         $user->address2="Mr James Smith Flat 7 118 Blackhorse Grove London W6 7HB UK";
         $user->city="New York";
         $user->state="Alaska";
         $user->zipcode=443001;
         $user->day_telephone=$request->day_telephone;
         $user->extension=$request->extenssion;
         $user->fax="fax 111";
         $user->seller_id=1;
         $user->update_permissoin=$mailpermission;
         $user->password_show = $request->pass1;
         $user->save();

         // $user= new User();
         // $user->name=$request->fname;
         // $user->role_id=3;
         // $user->last_name=$request->lname;
         // $user->country=$request->country;
         // $user->email=$request->email;
         // $user->password=Hash::make($request->pass1);
         // $user->contact_number=$request->phone;
         // $user->company_name=$request->cname;
         // $user->address1=$request->add1;
         // $user->address2=$request->add2;
         // $user->city=$request->city;
         // $user->state=$request->state;
         // $user->zipcode=$request->zipcode;
         // $user->day_telephone=$request->day_telephone;
         // $user->extension=$request->extenssion;
         // $user->fax=$request->fax;
         // $user->seller_id=1;
         // $user->update_permissoin=$request->mailpermission;
         // $user->save();


         $address= new Address();
         $is_default_add=1;
         $address->user_id=$user->id;
         $address->address="Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130 USA";
         $address->address2="Mr James Smith Flat 7 118 Blackhorse Grove London W6 7HB UK"; 
         $address->name=$request->fname;
         $address->last_name=$request->lname;
         $address->email=$request->email; 
         $address->country_id="USA";
         $address->company_name='Superior Promos'; 
         $address->zip_code=443001; 

                   $address->contact_number=$request->day_telephone;
                   $address->pincode_id=1;
                   $address->city_id=1;
                   $address->area_id=1;
                   $address->country_id=1;
                 
         $address->telephone=$request->day_telephone; 
         $address->ext=$request->extenssion; 
         /*$address->fax='fax'; 
*/        $address->is_default_add=1;
         $address->city_id=1; 
         $address->state_id=1; 
         $address->is_shipping=1;

         $address->save();

       // $address= new Address();
       // $is_default_add=1;
       // $address->user_id=$user->id;
       // $address->address=$request->add1;
       // $address->address2=$request->add2; 
       // $address->name=$request->fname;
       // $address->last_name=$request->lname;
       // $address->email=$request->email; 
       // $address->country_id=$request->country;
       // $address->company_name=$request->cname; 
       // $address->zip_code=$request->zipcode; 
       //             $address->contact_number=$request->phone;
       //             $address->pincode_id=1;
       //             $address->city_id=1;
       //             $address->area_id=1;
       //             $address->country_id=1;
                 
       // $address->telephone=$request->day_telephone; 
       // $address->ext=$request->extenssion; 
       // $address->fax=$request->fax; 
       // $address->is_default_add=$is_default_add;
       // $address->city_id=$request->city; 
       // $address->state_id=$request->state; 
       // $address->save();
         
         return redirect('login');
   }


   public function postUserLoginChekout(Request $request){
   
          $request->validate([
           'email'=>'required|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
            'password' => 'required|max:20',
          ]);



         $email=$request->email;
         $password=$request->password;
         $user=User::where('email',$email)->first();
         if($user!=""){
           $is_true=Hash::check($password,$user->password);
         }else{
           $is_true=0;
         }  
         

         if($user!=""&&$is_true==1){
          
         Auth::login($user);
         $token =Session::token();
         $user=Auth::user();
         

         $login_user=Cart::where('user_id',$user->id)->first();
         $tokan_cart=Cart::where('user_id',$token)->first();

         if($login_user!=""&&$tokan_cart!=""){
         $tokan_cart=Cart::where('user_id',$token)->first();
         $tokan_cart->delete();

        /*Cart::where('user_id',$token)->update(['user_id'=> $user->id]);*/
         
        CartItems::where('cart_id',$tokan_cart->id)->update(['cart_id'=>$login_user->id]); 
        CartItemSave::where('user_id',$token)->update(['user_id'=>$user->id]);
        Wishlist::where('user_id',$token)->update(['user_id' => $user->id]);

        $product_ids=RecentViewProduct::where('user',$token)->pluck('product_id');
        RecentViewProduct::where('user',$user->id)->whereIn('product_id',$product_ids)->delete();
        RecentViewProduct::where('user',$token)->update(['user' => $user->id]);
        
        }else{


         Auth::login($user);
         $token =Session::token();
   
        $user=Auth::user();

        Cart::where('user_id',$token)->update(['user_id'=> $user->id]);

        CartItemSave::where('user_id',$token)->update(['user_id'=> $user->id]);

        Wishlist::where('user_id',$token)->update(['user_id' => $user->id]);

        $product_ids=RecentViewProduct::where('user',$token)->pluck('product_id');
        RecentViewProduct::where('user',$user->id)->whereIn('product_id',$product_ids)->delete();
        RecentViewProduct::where('user',$token)->update(['user' => $user->id]);
           

      $notification = array(
      'message' => 'login sucessfully!!.',
      'alert-type' => 'success'
      );


        }
 

     $notification = array(
      'message' => 'login sucessfully!!.',
      'alert-type' => 'success'
      );

     return redirect('checkout')->with($notification);

  }else{

      $notification = array(
      'message' => 'These credentials do not match our records.',
      'alert-type' => 'warning'
      );

    return redirect('checkout')->with($notification);

   }
 }




  public function postRegisterNewUserChekout(Request $request){
    

    $request->validate([
    'day_telephone' =>'required|unique:users|max:13',
    'email'=>'required|unique:users||max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
    'pass1'=>'required|max:20|min:6',
    'pass2' =>'required|max:20|same:pass1',

    ]);
      

if($request->mailpermission==""&&$request->mailpermission==null){
          $mailpermission=0;
        }else{
         $mailpermission=1;
        }

   
         $user= new User();
         $user->name=$request->fname;
         $user->role_id=3;
         $user->last_name=$request->lname;
         $user->country=190;
         $user->email=$request->email;
         $user->password=Hash::make($request->pass1);
         $user->contact_number=$request->day_telephone;
         $user->company_name='Superior Promos';

         $user->address1="Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130 USA";
         $user->address2="Mr James Smith Flat 7 118 Blackhorse Grove London W6 7HB UK";

         $user->city="New York";
         $user->state="Alaska";

         $user->zipcode=443001;
         $user->day_telephone=$request->day_telephone;
         $user->extension=$request->extenssion;
         /*$user->fax="fax 111";*/
         $user->seller_id=1;
         $user->update_permissoin=$mailpermission;
         $user->save();

  
         $address= new Address();
         $is_default_add=1;
         $address->user_id=$user->id;
         $address->address="Ms Alice Smith Apartment 1c 213 Derrick Street Boston, MA 02130 USA";
         $address->address2="Mr James Smith Flat 7 118 Blackhorse Grove London W6 7HB UK"; 
         $address->name=$request->fname;
         $address->last_name=$request->lname;
         $address->email=$request->email; 
         $address->country_id="USA";
         $address->company_name='Superior Promos'; 
         $address->zip_code=443001; 

         $address->contact_number=$request->day_telephone;
         $address->pincode_id=1;
         $address->city_id=1;
         $address->area_id=1;
         $address->country_id=1;
                 
         $address->telephone=$request->day_telephone; 
         $address->ext=$request->extenssion; 
         /*$address->fax='fax'; */
         $address->is_default_add=0;
         $address->city_id=1; 
         $address->state_id=1; 
         $address->save();

      
        Auth::login($user);
        $token =Session::token();

        $user=Auth::user();

        Cart::where('user_id',$token)->update(['user_id'=> $user->id]);

        CartItemSave::where('user_id',$token)->update(['user_id'=> $user->id]);

        Wishlist::where('user_id',$token)->update(['user_id' => $user->id]);

        $product_ids=RecentViewProduct::where('user',$token)->pluck('product_id');
        RecentViewProduct::where('user',$user->id)->whereIn('product_id',$product_ids)->delete();
        RecentViewProduct::where('user',$token)->update(['user' => $user->id]);

      $notification = array(
      'message' => 'Registerd  sucessfully!!.',
      'alert-type' => 'success'
      );

      return redirect('checkout')->with($notification);

   }




   public function getCheckout(Request $request){ 

    $Allstates=StateTranslation::all();
    $Allcity=CityTranslation::all();
    $user_id=$this->getLoginUserId();

    $user=Address::where('user_id',$user_id)->where("is_shipping",1)->where("is_billing",0)->first();

    if($user==""){
       $user=Address::where('user_id',$user_id)->where("is_default_add",1)->where("is_billing",0)->first();     
    }

    if($user==""){
      $user=Address::where('user_id',$user_id)->where("is_billing",0)->first();
    }
   
   $all_address=Address::where('user_id',$user_id)->where("is_billing",0)->orderBy('address_id','desc')->get();

   $all_billing_address=Address::where('user_id',$user_id)->where("is_billing",1)->get();



        $carts=Cart::where('user_id',$user_id)->with('user')->with('cart_item')->first();
        
        if ($carts!=""){
        $cart_id=$carts->id;

        $total_carts=CartItems::with('product')->with('cartitemcolor')->with('cartitemimprint')->where('cart_id',$cart_id)->orderBy('created_at','desc')->get();

        $total_cart_price_sum = 0;
        foreach ($total_carts as $cart) {
            $cart_id = $cart->id;
            $cart_item = CartItems::where('id',$cart_id)->first();
            $total_cart_price_sum=$total_cart_price_sum+$cart_item->price;
        }
        
        }else{
           $total_carts=[];
           $total_cart_price_sum = 0;
        }

        /*for discount in checkout*/
         $main_total_app=0;
         if($total_carts!=[]){
         foreach($total_carts as $product){
         $main_total_app=$main_total_app+$product->quantity*$product->price;
              if($product->cartitemimprint!="[]"){
                 foreach($product->cartitemimprint as $imprint){
                  $main_total_app=$main_total_app+$imprint->setup_price;
              }
             }             
           }
         }else{
           
           $main_total_app=0;
         }

        $shipping_cost_app=0;
       

    if($carts!=""){
        $discount_data=Discount::with('discount_types')->with('discount_apply')->with('discount_customer_apply')->where('discount_id',$carts->discount_id)->first();
     
         if($discount_data!=""){
          if($discount_data->discount_type_id==1){
         //percentage
           $discount_code=$discount_data->discount_code;
         $discount=$main_total_app*$discount_data->discount_value/100;
         }else{
         //amount
         $discount=$discount_data->discount_value;
         $discount_code=$discount_data->discount_code;
         }
         }else{
         $discount=0;
         $discount_code="0";
         }  
     
         }
         else{
            $discount=0;
            $discount_code="0";
         }
          
    $product_total=$main_total_app;
    $shipping_cost=$shipping_cost_app;
    $order_total=$main_total_app;
    $disc_code=$discount_code;
    
    // echo gettype($disc_code);die;
    if($discount!=""){
     $order_total=$order_total+$shipping_cost;
     $order_total=$order_total-$discount;
    }else{
       $order_total=$order_total+$shipping_cost;
    }
    


    $data=array("all_billing_address"=>$all_billing_address,"all_address"=>$all_address,"user"=>$user,"product_total"=>$product_total,"order_total"=>$order_total,"shipping_cost"=>$shipping_cost,"discount"=>$discount,"disc_code"=>$disc_code,"Allstates"=>$Allstates,"Allcity"=>$Allcity);
    
    return view('superior.checkout')->with('data',$data); 

   }



   public function getEditAddress(Request $request){ 
       return view('superior.editaddress');
   }


    public function getOrderConfirmation(Request $request){
        $order_id = $request->order_id;
        $order = Order::where('id',$order_id)->with('orderitem')->with('cart')->first();

       return view('superior.orderconfirmation')->with('order',$order);
    }

   //Mahesh data start 12jan2022------------------

public function getMatchQuantity(Request $request){ 

$product_id=$request->product_id;
$quantity_cart=$request->quantity;

$Product_prices=ProductPrice::where('product_id',$product_id)->where('count_from','<=',$quantity_cart)->pluck('count_from');

$closest = null;
foreach ($Product_prices as $item) {
$item_quantity=$item;
if ($closest === null || abs($quantity_cart - $closest) > abs($item_quantity - $quantity_cart)) {
$closest = $item_quantity;
}        
}


if($closest!== null &&$closest!=[]){
$matches_quantitydata=ProductPrice::where('product_id',$product_id)->where('count_from',$closest)->first();
$per_item_price=$matches_quantitydata->per_item_sale_price;
$subtotal=$per_item_price*$quantity_cart;

$data=array("per_item_price"=>$per_item_price,"subtotal"=>$subtotal);
return $data;
}
else{
return $data="";
}
            
}    


 public function PostCartData(Request $request){
     
    $user_id=$this->getLoginUserId();
     
    if (Auth::user()){
    $user_id=Auth::user()->id;
    $usr=1;
    }else{
    $user_id=$this->getLoginUserId();
    $usr=0;
    }
     
    $product_apparel_ids = explode(',',$request->apparel_ids);
    $apparel_quantiyes = explode(',',$request->apparel_quantiyes);


    $cart=Cart::where('user_id',$user_id)->first();
    
    if($cart==""){
    if($usr==1){
    $cart=new Cart();
    /*$cart->session="xyz";*/
    $cart->user_id=$user_id;
    $cart->discount_id=0;
    $cart->save();
    }
    
    if($usr==0){
    $cart=new Cart();
    $cart->session=$user_id;
    /*$cart->user_id=$user_id;*/
    $cart->discount_id=0;
    $cart->save();
    }
    }

    $cart_id=$cart->id;
 
    $product_id=$request->product_id;
    $product=Product::where('product_id',$product_id)->first();
    /*product pricing*/
    $product_pricing=ProductPrice::where('product_id',$product_id)->first();
    $cart_items=new CartItems();
    $cart_items->cart_id=$cart_id;
    $cart_items->product_id=$product_id;
    $cart_items->quantity=$request->quantity;
    $cart_items->regular_price=$product_pricing->per_item_price;
    $cart_items->price=$product_pricing->per_item_sale_price;
    $cart_items->is_sale=$product_pricing->is_sale;
    $cart_items->setup_price=$product_pricing->setup_price;

    $cart_items->imprint_comment=$request->summernotedata;

    if($request->is_zip=="true"){
      $cart_items->estimation_zip=$request->zipcode;
    }
    

    $cart_items->estimation_shipping_code=$product->shipping_from_zip_code;
    $cart_items->estimation_shipping_method=$product->custom_method;
    $cart_items->shipping_method=$product->custom_method;

    if($request->is_custom_shipp_cost=="true"){
    $cart_items->estimation_shipping_price=$request->custom_shipping_cost;
    }

    if($request->is_ship=="true"){
    $cart_items->own_account_number=$request->acnumber;
    $cart_items->own_shipping_system=$request->method;
    $cart_items->own_shipping_type=$request->carrier;
    }
   

   if ($request->nodeadline=="true") {
      $cart_items->received_date="ASAP";
   }else{
      /*$cart_items->received_date=$request->deadlinedate;*/
      $cart_items->received_date=date("m-d-Y",strtotime($request->deadlinedate));
   } 

   /*$cart_items->received_date=Carbon::now();*/

   if($request->files!=""){
   if($request->hasFile("files")){
   $i=0;
   foreach($request['files'] as $imgs)
   { 
   if($i==0){
   $source=$imgs;
   $image_name=$this->addCompressImage($source,"artwork-images");
   $cart_items->art_file_path=$image_name;
   $cart_items->art_file_name="art_image";
   }
   $i++;
   }
   } 
   }
   
          
   /*$cart_items->later_size_breakdown=$request->artwork_file;
   $cart_items->tax_exemption=$request->artwork_file;
   $cart_items->is_sample=$request->artwork_file;
   */

   $cart_items->save();


         $product_option_prices_ids=(explode(",",$request->product_option_prices_ids));

          if($product_option_prices_ids!=""){
          foreach($product_option_prices_ids as $option_prices_id){
          if($option_prices_id!=""&&$option_prices_id!=0){

          $quantity_cart= $request->quantity;
 
          $Product_suboption_prices=ProductSubOptionPrices::where('product_sub_option_id',$option_prices_id)->where('quantity','<=',$quantity_cart)->pluck('quantity');

          if($Product_suboption_prices!="[]"){
          $closest = null;
          foreach ($Product_suboption_prices as $item) {
          $item_quantity=$item;
          if ($closest === null || abs($quantity_cart - $closest) > abs($item_quantity - $quantity_cart)) {
             $closest = $item_quantity;
          }        
          }


        $matches_quantitydata=ProductSubOptionPrices::where('product_sub_option_id',$option_prices_id)->where('quantity',$closest)->first();

          $suboptoin_id=$matches_quantitydata->product_sub_option_id;

          $optiondata=ProductSubOption::with('product_option')->where('id',$suboptoin_id)->first();
           

          $CartItemProductOptions=new CartItemProductOptions();
          $CartItemProductOptions->cart_item_id=$cart_items->id;
          $CartItemProductOptions->product_option_id=$optiondata->product_option->id;
          $CartItemProductOptions->name=$optiondata->product_option->name;
          $CartItemProductOptions->setup_price=$matches_quantitydata->setup_price;
          $CartItemProductOptions->item_price=$matches_quantitydata->item_price;
          $CartItemProductOptions->save();
          
          $CartitemProductSubOptions= new CartitemProductSubOptions();
          $CartitemProductSubOptions->cart_item_product_option_id= $CartItemProductOptions->id; 
          $CartitemProductSubOptions->product_sub_option_id=$suboptoin_id; 
          $CartitemProductSubOptions->name=$optiondata->name;
          $CartitemProductSubOptions->setup_price=$matches_quantitydata->setup_price;
          $CartitemProductSubOptions->item_price=$matches_quantitydata->item_price;

          $CartitemProductSubOptions->save();

         }
         }
         }
         }



      if(!empty($product_apparel_ids)){
      for($i=0;$i<count($product_apparel_ids);$i++){
       if($product_apparel_ids[$i]!=""){
        if($apparel_quantiyes[$i]!=""&&$apparel_quantiyes[$i]!=0){ 

           $apparel_id=$product_apparel_ids[$i];
           $apparel_id=(int)$apparel_id;
           $qty=$apparel_quantiyes[$i];
           $qty=(int)$qty;

           $apparel_data=ProductApparel::with('apparel')->where('id',$apparel_id)->first();
           if($apparel_data!=""){
           $cart_item_size_group= new CartItemSizeGroups();
           $cart_item_size_group->cart_item_id=$cart_items->id;
           $cart_item_size_group->size_group_id=$apparel_data->apparel->size_group_id;
           $cart_item_size_group->save();

           $cart_item_sizes= new CartItemSizes();
           $cart_item_sizes->cart_item_size_group_id=$cart_item_size_group->id;
           $cart_item_sizes->size_id=$apparel_data->apparel->id;
           $cart_item_sizes->qty=$qty;
           $cart_item_sizes->save();
           }
     } 
    }
   }
  }


            if($request->files!=""){
            if($request->hasFile("files")){

            foreach($request['files'] as $imgs)
            {

            $cart_items_proof=new CartItemArtProofs();

            $source=$imgs;
            $image_name=$this->addCompressImage($source,"artwork-images");
            $cart_items_proof->cart_item_id=$cart_items->id;
            $cart_items_proof->name="artimage";
            $cart_items_proof->path=$image_name;
            $cart_items_proof->save();            
           }
          }
         }


          if($request->is_decorated=="true"){
          if($request->imprint_ids!=""){

          $imprint_ids=(explode(",",$request->imprint_ids)); 
             
          $imprint_color_ids_col=json_decode($request->imprint_color_ids_color);
          $imprint_ids_col=explode(',',$request->imprint_ids_color);

            if($imprint_ids_col!="[]"){

            for($i=0; $i<count($imprint_ids_col); $i++){

          $imprint_index=$i;

          $imprint_id= $imprint_ids_col[$imprint_index];

          $imprint=Imprint::where('id',$imprint_id)->with('imprint_price')->with('imprint_colors')->first();
              
          $quantity_cart=$request->quantity;

          $imprint_price_quantities=ImprintPrice::where('imprint_id',$imprint_id)->where('quantity','<=',$quantity_cart)->pluck('quantity');

           
          $closest = null;
           foreach ($imprint_price_quantities as $item) {
            $item_quantity=$item;
              if ($closest === null || abs($quantity_cart - $closest) > abs($item_quantity - $quantity_cart)) {
                 $closest = $item_quantity;
              }
           }
            
          $get_imprint_price=ImprintPrice::where('imprint_id',$imprint_id)->where('quantity',$closest)->first();

          if($get_imprint_price!=""){

            $CartItemImprints= new CartItemImprints();
            $CartItemImprints->cart_item_id=$cart_items->id;
            $CartItemImprints->imprint_id=$imprint->id;
            $CartItemImprints->imprint_name=$imprint->name;
            $CartItemImprints->item_price=$get_imprint_price->item_price;
            $CartItemImprints->color_setup_price=$get_imprint_price->color_setup_price;
            $CartItemImprints->color_item_price=$get_imprint_price->color_item_price;
            $CartItemImprints->setup_price=$get_imprint_price->setup_price;
            $CartItemImprints->save();
            

            $imprint_colors=(explode(",",$request->imprint_colors));

 /*           foreach($imprint_colors as $color_id)
             {  
             if($color_id!=""){
             $Color=Color::where('id',$color_id)->first();
             $CartItemImprintColors= new CartItemImprintColors();
             $CartItemImprintColors->cart_item_imprint_id=$CartItemImprints->id;
             $CartItemImprintColors->color_id=$Color->id;
             $CartItemImprintColors->name=$Color->name;
             $CartItemImprintColors->save();
            }
            }
*/

            if($imprint_color_ids_col!="[]"){
              $color_ids =$imprint_color_ids_col[$i];

            if($color_ids!="[]"){
            foreach($color_ids as $color_id){
            if($color_id!=""){
            $Color=Color::where('id',$color_id)->first();
            $CartItemImprintColors= new CartItemImprintColors();
            $CartItemImprintColors->cart_item_imprint_id=$CartItemImprints->id;
            $CartItemImprintColors->color_id=$Color->id;
            $CartItemImprintColors->name=$Color->name;
            $CartItemImprintColors->save();
             }
             }
            }
           }
       }
     }
   }


 }

}

        $selected_color=$request->main_selected_color;
          if($selected_color!="undefined"){
          $product_color_data=ProductColor::where('color_id',$selected_color)->with('color_group')->with('color')->first(); 
          $CartItemColors= new CartItemColors();
          $CartItemColors->cart_item_id=$cart_items->id;
          $CartItemColors->product_color_group_id=$product_color_data->product_color_group_id;
          $CartItemColors->color_group_name=$product_color_data->color_group->name;   
          $CartItemColors->product_color_id=$product_color_data->id;
          $CartItemColors->color_group_id=$product_color_data->color_id;
          $CartItemColors->color_id=$product_color_data->color->id; 
          $CartItemColors->color_name=$product_color_data->color->name;
          $CartItemColors->save(); 
          }

      $cart_count=CartItems::where('cart_id',$cart_id)->count();
      $count=$cart_count;

      $msg="Added to cart successfully";
      $this->response['msg']=$msg;
      $this->response['status']="true";
      $this->response['count']=$count;
      return $this->response;

}

   

  public function getCurruntPromotoin(Request $request){

      return view ('superior.curruntpromotion');
   }

   public function getArtWork(Request $request){
      $art_work = ArtWork::first();
      return view('superior.art-work')->with('art_work',$art_work);

   }

   public function getRusServices(Request $request){

      return view('superior.rus-services');
   }



   // Mahesh data end 12jan2022------------------


    /*--------------------------------------------------*/

}
