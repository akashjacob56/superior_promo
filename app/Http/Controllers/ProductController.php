<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use DataTables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\User;
use App\Brand;
use App\Gst;
use App\Variant;
use App\Sku;
use Auth;
use App\Category;
use App\CategoryProduct;
use Config;
use App\ProductTranslation;
use App\BrandTranslation; 
use App\Language;
use App\Cart;
use App\Wishlist;
use App\ReturnPolicy;
use App\Slider;
use App\OfferBlock;
use App\Notification;
use App\Toast;
use App\OrderProduct;
use DB;
use App\SellerDetail;
use App\ProductReview;
use App\ReviewImage;
use App\VariantOption;
use App\VariantOptionTranslation;
use App\ProductPrice;
use Maatwebsite\Excel\Facades\Excel;
use App\ColorGroup;
use App\Color;
use App\Imprint;
use App\ImprintColor;
use App\ImprintPrice;
use App\ProductColorGroup;
use App\ColorColorGroup;
use App\ProductColor;
use App\ProductVendor;
use App\ProductOption;
use App\ProductOptionPrice;
use Storage;
use App\ProductSubOption;
use App\ProductSubOptionPrices;
use App\Apparel;
use App\ProductApparel;
use App\Vendor;

class ProductController extends Controller{

/*for price grid update*/
public function postPriceGridData(Request $request){

	$product_price_id=$request->product_price_id;
	$count_from= $request->price_count_from;
	$setup_price=$request->price_setup_price;
	$per_item_price=$request->price_per_item_price;
	$per_item_sale_price=$request->price_per_item_sale_price;
     
	$product_price=ProductPrice::find($product_price_id);
	$product_price->count_from=$count_from;
	$product_price->setup_price=$setup_price;
	$product_price->per_item_price=$per_item_price;
	$product_price->per_item_sale_price=$per_item_sale_price;
	$product_price->save();

	return $product_price;

}

   /*for apparel*/
	public function getApparel(Request $request){

	if(!$this->checkPermission(Config::get('permissions.VENDOR_ALL'))){
			return view('user.unauthorized');
	 }

	return view('product.apparelall');
	}
  
	public function getapparelData(Request $request){

	$apparel=Apparel::with('status')->get();	
	return DataTables::of($apparel)->make(true); 

	}


    public function getAddApparel(){

    if(!$this->checkPermission(Config::get('permissions.VENDOR_ADD'))){
			return view('user.unauthorized');
	 }
 
     return view('product.appareladd');

}

 
 public function postAddApparel(Request $request){

	    $this->validate($request,Apparel::$Addrule);

        $apparel=new Apparel();
		$apparel->apparel_name=$request->apparel_name;
		$apparel->save();

			flash('Apparel added successfully');
		return redirect('admin/apparel/apparel-all');
	}


    public function getAppareldetails(Request $request){
        
        if(!$this->checkPermission(Config::get('permissions.VENDOR_UPDATE'))){
			return view('user.unauthorized');
	    }

		$apprel_id=$request->id;
		$apparel=Apparel::find($apprel_id);
		return view('product.appareldetails')->with('apparel',$apparel);
	}
    


    public function postAppareldetails(Request $request){
        
        
        $this->validate($request,Apparel::$Addrule);

        $apparel=Apparel::find($request->id);
        if(isset($request['save'])){
        $apparel=Apparel::find($request->id);
		$apparel->apparel_name=$request->apparel_name;
        }

		else if(isset($request['active'])){
			flash('Customer activated successfully');
			$apparel->status_id=1;
		}else if(isset($request['inactive'])){
			flash('Customer inactivated successfully');
			$apparel->status_id=2;	
		}

		$apparel->save();

		flash('Apparel added successfully');
		return redirect('admin/apparel/apparel-all');
	}

 /*--------------------------------------------------------------*/ 

   	public function deleteProductOption(Request $request){

		$id=$request->id;    
        $option=ProductOption::find($id);
        $option->delete();
		$notification = array(
		'message' => 'Product Option Removed  sucessfully',
		'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	}


   	public function deleteProductSubOption(Request $request){

		$id=$request->id;    
        $suboption=ProductSubOption::find($id);
        $suboption->delete();
		$notification = array(
		'message' => 'Suboption Removed  sucessfully',
		'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	}


	public function deleteProductSubOptionCount(Request $request){

		$id=$request->id;
        $subcount=ProductSubOptionPrices::find($id);
        $subcount->delete();
		$notification = array(
		'message' => 'Suboption Count Removed  sucessfully',
		'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	}


	public function exportData(){
		Excel::create('Products-export', function($excel) {

            // Set the title
			$excel->setTitle('vshopy-products');

            // Chain the setters
			$excel->setCreator('vshopy')->setCompany('vshopy');

			$excel->setDescription('A demonstration to change the file properties');

			$products=DB::table('products')
			->join('statuses', 'products.status_id', '=', 'statuses.status_id')
			->join('brand_translations', 'products.brand_id', '=', 'brand_translations.brand_id')
			->join('product_translations', 'products.product_translation_id', '=', 'product_translations.product_translation_id')
			->join('skus', 'skus.product_id', '=', 'products.product_id')
			->join('parent_variant_translations', 'parent_variant_translations.parent_variant_id', '=', 'skus.parent_variant_id')
			->join('child_variant_translations', 'child_variant_translations.child_variant_id', '=', 'skus.child_variant_id')
			->join('gsts', 'products.gst_id', '=', 'gsts.gst_id')
			->join('return_policy_translations', 'products.return_policy_id', '=', 'return_policy_translations.return_policy_id')
			
			->select('products.product_id','product_translations.product_name','product_translations.description','products.product_image','products.product_image','products.is_product_shipping','products.track_inventory','products.allow_customer_stock_out','products.view_count','product_translations.meta_title','product_translations.meta_keywords','product_translations.meta_description','products.product_url','product_translations.delivery_message','brand_translations.brand_name','skus.my_price','skus.market_price','skus.product_weight','skus.weight_unit','skus.quantity','skus.sku_name','skus.barcode','parent_variant_translations.parent_variant_name','child_variant_translations.child_variant_name','statuses.status_name','gsts.gst','gsts.sgst','gsts.igst','gsts.cgst','return_policy_translations.return_policy_title','return_policy_translations.return_policy_description')
			->get();
			
			$products=json_decode(json_encode($products), true);

			$excel->sheet('Sheet 1', function ($sheet) use ($products) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($products, NULL, 'A3');
			});

		})->download('xlsx');
	}


	public function getAddProduct(Request $request){
		
		if(!$this->checkPermission(Config::get('permissions.PRODUCT_ADD'))){
			return view('user.unauthorized');
		}


		
		$brands=Brand::where('brand_id','!=',1)->with('default_brand_translation')->get();
		$categories=Category::where('category_id','!=',1)->with('default_category_translation')->get();
		$gst=Gst::all();
		$return_policies=ReturnPolicy::with('default_return_policy_translation')->get();

		$variants=Variant::where('variant_id','!=',1)->where('status_id',1)->with('default_variant_translation')->get();
		// $vendors = User::where('role_id',4)->get();

		$vendors=Vendor::all();

		$color_groups = ColorGroup::get();
		$colors = Color::get();
		$apparel=Apparel::all();
		return view('product.add')->with('brands',$brands)->with('gst',$gst)->with('variants',$variants)->with('categories',$categories)->with('return_policies',$return_policies)->with('vendors',$vendors)->with('color_groups',$color_groups)->with('colors',$colors)->with('apparel',$apparel);

	}




	public function addVariants(Request $request){
		
		
		$parent_variant_value=$request->parent_variant_values;
		$child_variant_value=$request->child_variant_values;

		$my_price=$request->my_price;
		$market_price=$request->market_price;
		$parent_variant=VariantOptionTranslation::where('parent_variant_name',$variant_option_name)->first();
		return "parent_variant: ".$request->parent_variant_value." ".$request->parent_variant_id ;

	}



	public function postAddProduct(Request $request){
	    
	   // dd($request->all());

       	if(!$this->checkPermission(Config::get('permissions.PRODUCT_ADD'))){
			return view('user.unauthorized');
		}  


        $this->validate($request,Product::$rules);

	    // print_r($request->imprint_name);
		/*dd($request->all());*/

		$option_name = $request->option_name;
		$sub_option_name = $request->sub_option_name;
		$show_as=$request->show_as;
         
		$show_blank = $request->show_blank;
		$remarks = $request->remarks;
		$option_count_from = $request->option_count_from;
		$option_setup_fee = $request->option_setup_fee;
		$option_additional_fee = $request->option_additional_fee;


        
		// dd($request->all());
		//custom color data
		$item_color_group_id=$request->item_color_group_id;

		$item_color_group_name=$request->item_color_group_name;


		// Imprint data Start
		$imprint_names =$request->imprint_name;
		$max_colors = $request->max_colors;
		$imprint_color_group_ids=$request->color_group_id;
		$imprint_color_ids=$request->color_id;
		
		$imprint_count_from = $request->imprint_count_from;
		$imprint_location_setup_fee = $request->imprint_location_setup_fee;
		$imprint_additinal_location_running_fee = $request->imprint_additinal_location_running_fee;
		$imprint_additional_setup_fee = $request->imprint_additional_setup_fee;
		$imprint_additional_running_fee = $request->imprint_additional_running_fee;
		// Imprint data End


		//product vendors
		$vendor_ids = $request->vendor_id;
		$sage_id = $request->sage_id;

        //Apparel 
        $apparel_ids= $request->apparel_id;
		// dd($request->all());

		//price product grid
		$is_sale = $request->is_sale;
		$count_from = $request->count_from;
		$setup_price = $request->setup_price;
		$per_item_price = $request->per_item_price;
		$per_item_sale_price = $request->per_item_sale_price;
		//end price grid

		$dimension = $request->dimension;
		$imprint_area = $request->imprint_area;
		$additional_specification = $request->additional_specification;
		$pricing_information = $request->pricing_information;
		$video = $request->video;

		$quantity_per_box = $request->quantity_per_box;
		$shipping_additional_type = $request->shipping_additional_type;
		$weight_box = $request->weight_box;
		$shipping_additional_value = $request->shipping_additional_value;
		$shipping_from_zip_code = $request->shipping_from_zip_code;
		$production_time_from = $request->production_time_from;
		$production_time_to = $request->production_time_to;
		$custom_method = $request->custom_method;
		$custom_cost = $request->custom_cost;



		//Seo data  new
		$google_product_category = $request->google_product_category;
		$image_alt_text = $request->image_alt_text;
		$gender = $request->gender;
		$age_group = $request->age_group;
		$material = $request->material;
		$pattern = $request->pattern;

		//products data
		$is_stock_collection = $request->is_stock_collection;
		if($is_stock_collection!=""){
			$is_stock_collection=1;
		}else{
			$is_stock_collection=0;
		}



		if($request->market_price==""){
			$request->merge(['market_price'=>0]);
		}

		if($request->quantity==""){
			$request->merge(['quantity'=>0]);
		}

		if($request->product_weight==""){
			$request->merge(['product_weights'=>0]);
		}

		
		$language_id=$this->getLanguageId();


		
		
		$product_count=1000;
		$total_product=Product::where('status_id',1)->count();


		if ($product_count<=$total_product) {

			if($this->checkPermission(Config::get('permissions.PRODUCT_ALL'))){
				flash('Product Limit Exceeded');
				return redirect("admin/product/all");
			}else if($this->checkPermission(Config::get('permissions.PRODUCT_SELLER'))){
				flash('Product Limit Exceeded');
				return redirect("admin/product/my");
			}else{
				flash('Product Limit Exceeded');
				return redirect("admin/product/all");
			}
		}



		

		$allow_customer_stock_out=$request->allow_customer_stock_out;

		$is_product_shipping=$request->is_product_shipping;


		if($allow_customer_stock_out==""){
			$allow_customer_stock_out=0;
		}

		if($is_product_shipping==""){
			$is_product_shipping=0;
		}

		$product_url=Str::slug($request->product_url);
		$request->merge(['product_url' => $product_url]);

		// $this->validate($request,['product_url' => 'unique:products,product_url,NULL,id']);

		// $this->validate($request,Product::$rules);

		$parent_variant_id=1;

		$child_variant_id=1;

		if($request->parent_variant!=""){

			$parent_variant_id=$request->parent_variant;
		}


		if($request->child_variant!=""){
			$child_variant_id=$request->child_variant;
		}

		$product_minimum_quantity=$request->product_minimum_quantity;

		if ($product_minimum_quantity=="") {
			$product_minimum_quantity=1;
		}

		$product=new Product();


		$product->is_stock_collection=$is_stock_collection;
		if($dimension !=""){
			$product->dimension = $dimension;
		}

		if($imprint_area!=""){
			$product->imprint_area = $imprint_area;
		}

		if($additional_specification !=""){
			// $product->additional_specification = $additional_specification;
			if($request->hasFile("additional_specification")){
                $additional_specification = $request->additional_specification;
                $path = $additional_specification->store('additional-specification');
                $product->additional_specification=$path;
            }
		}

		if($pricing_information!=""){
			$product->pricing_information = $pricing_information;
		}

		if($video !=""){
			// $product->video = $video;

			if($request->hasFile("video")){
                $video = $request->video;
                $path = $video->store('product-video');
                $product->video=$path;
            }
		}

		if($quantity_per_box !=""){
			$product->quantity_per_box = $quantity_per_box;
		}

		if($shipping_additional_type !=""){
			$product->shipping_additional_type = $shipping_additional_type;
		}

		if($weight_box !=""){
			$product->weight_box = $weight_box;
		}

		if($shipping_additional_value !=""){
			$product->shipping_additional_value = $shipping_additional_value;
		}

		if($shipping_from_zip_code !=""){
			$product->shipping_from_zip_code = $shipping_from_zip_code;
		}

		if($production_time_from !=""){
			$product->production_time_from = $production_time_from;
		}

		if($production_time_to !=""){
			$product->production_time_to = $production_time_to;
		}

		if($custom_method !=""){
			$product->custom_method = $custom_method;
		}

		if($custom_cost !=""){
			$product->custom_cost = $custom_cost;
		}

		$product->allow_customer_stock_out=$allow_customer_stock_out;
		$product->is_product_shipping=$is_product_shipping;
		$product->product_minimum_quantity=$product_minimum_quantity;

		if(isset($request->product_image)){
			$source=$request->product_image;
			$image_name=$this->addCompressImage($source,"product-image");
			$product->product_image=$image_name;
		}
		
		//brand
		$brand_id=1;
		if($request->brand_id!=""){
			$brand_id=$request->brand_id;
		}
		$product->brand_id=$brand_id;

		// return policy
		$return_policy_id=1;

		if($request->return_policy_id!=""){
			$return_policy_id=$request->return_policy_id;
		}
		$product->return_policy_id=$return_policy_id;


		//Gst
		$gst_id=1;
		if($request->gst_id!=""){
			$gst_id=$request->gst_id;	
		}
		$product->gst_id=$gst_id;

		//seller id
		$seller_id=Auth::user()->seller_id;
		$product->seller_id=$seller_id;
		
		
		if($request->track_inventory!=""){
			$product->track_inventory=$request->track_inventory;
		}

		//Parent Variant
		$product->parent_variant_id=$parent_variant_id;


		//Child Variant
		$product->child_variant_id=$child_variant_id;

		$product->sage_id=$request->sage_id;
		$product->product_url=Str::slug($request->product_url);

		$product->sku_hit=$request->sku_HIT;
        
		$product->save();

		$count_from_total = count($count_from);

        if($count_from!=[0]){
		for($i=0;$i<count($count_from);$i++){
			$product_price = new ProductPrice;
			$product_price->product_id = $product->product_id;
			if($count_from[$i]!=""){
				$product_price->count_from = $count_from[$i];
			}
			if($setup_price[$i]!=""){
				$product_price->setup_price = $setup_price[$i];
			}
			if($per_item_price[$i]!=""){
				$product_price->per_item_price = $per_item_price[$i];
			}
			if($per_item_sale_price[$i]!=""){
				$product_price->per_item_sale_price = $per_item_sale_price[$i];
			}
			if($is_sale!=""){
				$product_price->is_sale = $is_sale;
			}

			$product_price->save();
		}
        }




		$product_translation=new ProductTranslation();

		$product_translation->language_id=1;
		$product_translation->product_id=$product->product_id;

		$description=$request->description;


		$product_translation->product_name=$request->product_name;

		if($description!=""){
			$product_translation->description= $description;
		}
		

		if($request->long_description!=""){
			$product_translation->long_description= $request->long_description;
		}

		if($request->additional_information!=""){
			$product_translation->additional_information= $request->additional_information;
		}
		

		
		
		if ($request->meta_title!="") {
			$product_translation->meta_title=$request->meta_title;
		}
		
		if ($request->meta_keywords!="") {
			$product_translation->meta_keywords=$request->meta_keywords;
		}

		if ($request->meta_description!="") {
			$product_translation->meta_description=$request->meta_description;
		}

		if ($request->delivery_message!="") {
			$product_translation->delivery_message=$request->delivery_message;
		}



		if($google_product_category!=""){
			$product_translation->google_product_category = $google_product_category;
		}

		if($image_alt_text!=""){
			$product_translation->image_alt_text = $image_alt_text;
		}

		if($gender!=""){
			$product_translation->gender = $gender;
		}

		if($age_group!=""){
			$product_translation->age_group = $age_group;
		}

		if($material!=""){
			$product_translation->material = $material;
		}

		if($pattern!=""){
			$product_translation->pattern = $pattern;
		}

		$product_translation->save();
		$product->product_translation_id=$product_translation->product_translation_id;

		$product->save();

		//category
		if($request->category_id!=""){

			$categories=$request->category_id;
			
			for($i=0;$i<count($categories);$i++){
				$category=new CategoryProduct();
				$category->category_id=$categories[$i];
				$category->product_id=$product->product_id;
				$category->save();
			}
		}
		$category_product=new CategoryProduct();
		$category_product->category_id=1;
		$category_product->product_id=$product->product_id;
		$category_product->save();


		// Imprints Start

		$product_id=$product->product_id;

		if($imprint_names!="[]"&&$imprint_names!=null&&$imprint_names!="null"){


		for($i=0;$i<count($imprint_names);$i++){

			if($imprint_names[$i]!=""){

			$i_value=$i;
			
			$imprint_count_from_value=$imprint_count_from[$i_value];
			$imprint_location_setup_fee_value=$imprint_location_setup_fee[$i_value];
			$imprint_additinal_location_running_fee_value=$imprint_additinal_location_running_fee[$i_value];
			$imprint_additional_setup_fee_value=$imprint_additional_setup_fee[$i_value];
			$imprint_additional_running_fee_value=$imprint_additional_running_fee[$i_value];

			$imprint=new Imprint();
			$imprint->product_id=$product_id;
			$imprint->position=1;

			if($imprint_names!="[]"&&$imprint_names!=""){
				$imprint->name=$imprint_names[$i];
			}
			
			if($max_colors!="[]"){
				$imprint->max_colors=$max_colors[$i];
			}
			
			if($imprint_color_group_ids!="[]"&&$imprint_color_group_ids!=""){
				$imprint->color_group_id=$imprint_color_group_ids[$i];
			}

			$imprint->save();

			$imprint_id=$imprint->id;
			
			if($imprint_color_ids!="[]"&&$imprint_color_ids!=""){
				$imprint_color_id_values=$imprint_color_ids[$i_value];
				for ($x=0; $x<count($imprint_color_id_values); $x++){
					$imprint_color=new ImprintColor();
					$imprint_color->imprint_id=$imprint_id;
					$imprint_color->color_id=$imprint_color_id_values[$x];
					$imprint_color->save();
				}
			}
			



			// echo $imprint_from_value;die;
			for($j=0;$j<count($imprint_count_from_value);$j++){

             if($imprint_count_from_value[$j]!=""){

				$imprint_price=new ImprintPrice();
				$imprint_price->imprint_id=$imprint_id;
				if($imprint_count_from_value[$j]!=""){
					$imprint_price->quantity=$imprint_count_from_value[$j];
				}
				if($imprint_location_setup_fee_value[$j]!=""){
					$imprint_price->setup_price=$imprint_location_setup_fee_value[$j];
				}
				if($imprint_additinal_location_running_fee_value[$j]!=""){
					$imprint_price->item_price=$imprint_additinal_location_running_fee_value[$j];
				}
				if($imprint_additional_setup_fee_value[$j]!=""){
					$imprint_price->color_setup_price=$imprint_additional_setup_fee_value[$j];
				}
				if($imprint_additional_running_fee_value[$j]!=""){
					$imprint_price->color_item_price=$imprint_additional_running_fee_value[$j];
				}
				$imprint_price->save();

			  }

			}


		}

		}

	}


    // Imprints End


	// Option Start
	// $option_name = $request->option_name;
	// 	$show_as = $request->show_as;
	// 	$show_blank = $request->show_blank;
	// 	$remarks = $request->remarks;
	// 	$option_count_from = $request->option_count_from;
	// 	$option_setup_fee = $request->option_setup_fee;
	// 	$option_additional_fee = $request->option_additional_fee;

        if(!empty($option_name)){
        
        for($i=0;$i<count($option_name);$i++){
         
         if($option_name[$i]!=""){
                
               $i_value=$i;

               $product_id=$product_id;

				$product_option = new ProductOption;

				$product_option->product_id=$product_id;
				if($option_name!="[]"){
					$product_option->name = $option_name[$i];
				}

				if($show_as!="[]"&&$show_as!=""){
					$product_option->show_as=$show_as[$i_value];
				}	

				if($show_blank!="[]"&&$show_blank!=""){
					$product_option->required=$show_blank[$i_value];
				}
				$product_option->position=1;
				$product_option->save();

                
                if(!empty($sub_option_name)){
                if($sub_option_name!=""&&$sub_option_name!="[]"){
                for($j=0;$j<count($sub_option_name);$j++){

                  $j_value=$j;

                 $name=$sub_option_name[$i_value][$j_value];


                $option_count_from_value=$option_count_from[$i_value][$j_value];
				$option_setup_fee_value = $option_setup_fee[$i_value][$j_value];
				$option_additional_fee_value = $option_additional_fee[$i_value][$j_value];

                  
                  $product_sub_options = new ProductSubOption;

                  $product_sub_options->product_option_id=$product_option->id; 
               
                  $product_sub_options->position=$product_option->position;  

                  $product_sub_options->name=$name; 

                  $product_sub_options->save(); 

                

                if(!empty($option_count_from)){ 
                if($option_count_from!=""&&$option_count_from!="[]"){

                for($k=0;$k<count($option_count_from[$i_value][$j_value]);$k++){
                 
                 $k_value=$k;

				$product_sub_option_prices = new ProductSubOptionPrices;

		        $product_sub_option_prices->product_sub_option_id =$product_sub_options->id;
		          
				if($option_count_from_value[$k_value]!=""){
					$product_sub_option_prices->quantity=$option_count_from_value[$k_value];
				}

				if($option_setup_fee_value[$k_value]!=""){
				 $product_sub_option_prices->setup_price=$option_setup_fee_value[$k_value];

				}

				if($option_additional_fee_value[$k_value]!=""){
					$product_sub_option_prices->item_price=$option_additional_fee_value[$k_value];

				}

				$product_sub_option_prices->save();

                }

                }

              }
            }

         } 

       }
    
    }
  
  }

}    
       /*$apparel_ids= $request->apparel_id;*/
        if(!empty($apparel_ids)){
		foreach ($apparel_ids as $apparel_id) {
			$product_apparel = new ProductApparel;
			$product_apparel->product_id=$product_id;
			$product_apparel->apparel_id=$apparel_id;
			$product_apparel->save();
		}
	}





/*          if(!empty($option_name)){

			for($i=0;$i<count($option_name);$i++){

				if($option_name[$i]!=""){
				$i_value=$i;

				$option_count_from_value = $option_count_from[$i_value];
				$option_setup_fee_value = $option_setup_fee[$i_value];
				$option_additional_fee_value = $option_additional_fee[$i_value];

				$product_option = new ProductOption;

				$product_option->product_id = $product_id;

				if($option_name!="[]"){
					$product_option->name = $option_name[$i];
				}
				
				if($show_as!="[]"&&$show_as!=""){
					$product_option->show_as = $show_as[$i];
				}
				
				if($show_blank!="[]"&&$show_blank!=""){
					$product_option->required = $show_blank[$i];
				}

				$product_option->position = 1;
				$product_option->save();



				if($option_count_from_value!=""&&$option_count_from_value!="[]"){
				for($j=0;$j<count($option_count_from_value);$j++){

						if($vendor_ids!="[]"&&$vendor_ids!=""){
							foreach ($vendor_ids as $vendor_id) {
								$product_option_prices = new ProductOptionPrice;
								$product_option_prices->product_option_id = $product_option->id;
								if($option_count_from_value[$j]!=""){
									$product_option_prices->quantity=$option_count_from_value[$j];
								}
								if($option_setup_fee_value[$j]!=""){
									$product_option_prices->setup_price=$option_setup_fee_value[$j];
								}
								if($option_additional_fee_value[$j]!=""){
									$product_option_prices->item_price=$option_additional_fee_value[$j];
								}
								if($vendor_id!=""){
									$product_option_prices->vendor_id=$vendor_id;
								}
								$product_option_prices->save();
							}
						}else{
								$product_option_prices = new ProductOptionPrice;
								$product_option_prices->product_option_id = $product_option->id;
								if($option_count_from_value[$j]!=""){
									$product_option_prices->quantity=$option_count_from_value[$j];
								}
								if($option_setup_fee_value[$j]!=""){
									$product_option_prices->setup_price=$option_setup_fee_value[$j];
								}
								if($option_additional_fee_value[$j]!=""){
									$product_option_prices->item_price=$option_additional_fee_value[$j];
								}
								$product_option_prices->save();					

					}
				  
				  }
			    
			    }

			}

		
		  }
		}

		*/

	// Option End




// Product Colors
if($item_color_group_id!=""&& $item_color_group_name!=""){

		$product_color_group = new ProductColorGroup;
		$product_color_group->product_id=$product_id;
		$product_color_group->name=$item_color_group_name;
		$product_color_group->save();

		$product_color_group_id=$product_color_group->id;

		/*$color_group_ids=ColorColorGroup::where('group_id',$item_color_group_id)->pluck('color_id');*/
  
        $color_group_ids=$item_color_group_id;

		for ($color=0; $color<count($color_group_ids); $color++){ 

			$product_color = new ProductColor;
			$product_color->product_color_group_id=$product_color_group_id;
			$product_color->color_id=$color_group_ids[$color];
			$product_color->save();

		}
	 }


		//parent_variant_values 
		$parent_variant_values=$request->parent_variant_values;
		$child_variant_values=$request->child_variant_values;
		$parent_variant_values="";
		$child_variant_values="";

		if(!empty($parent_variant_values)){
			for($i=0;$i<count($parent_variant_values);$i++) {

				$parent_variant_name=$parent_variant_values[$i];

				if($parent_variant_name!=""){

					$variant_option=VariantOptionTranslation::where('variant_option_translation_id','!=',1)->where('variant_option_name',$parent_variant_name)->first();
					if ($variant_option=="") {
						$variant_option=new VariantOption();
						$variant_option->variant_id=$parent_variant_id;
						
						$variant_option->variant_option_translation_id=1;
						$variant_option->save();

						$variant_option_translation=new VariantOptionTranslation();
						$variant_option_translation->variant_option_name=$parent_variant_name;
						
						$variant_option_translation->language_id=$language_id;
						$variant_option_translation->variant_option_id=$variant_option->variant_option_id;
						$variant_option_translation->save();

						$variant_option_translation_id=$variant_option_translation->variant_option_translation_id;
						$variant_option->variant_option_translation_id=$variant_option_translation_id;
						$variant_option->save();


					}

				}
			}
		}




		if(!empty($child_variant_values)){
			for($i=0;$i<count($child_variant_values);$i++) {

				$child_variant_name=$child_variant_values[$i];
				if($child_variant_name!=""){
					$variant_option=VariantOptionTranslation::where('variant_option_translation_id','!=',1)->where('variant_option_name',$child_variant_name)->first();
					if ($variant_option==""){
						$variant_option=new VariantOption();
						$variant_option->variant_id=$child_variant_id;						
						$variant_option->variant_option_translation_id=1;
						$variant_option->save();

						$variant_option_translation=new VariantOptionTranslation();
						$variant_option_translation->variant_option_name=$child_variant_name;
						
						$variant_option_translation->language_id=$language_id;
						$variant_option_translation->variant_option_id=$variant_option->variant_option_id;
						$variant_option_translation->save();

						$variant_option_translation_id=$variant_option_translation->variant_option_translation_id;
						$variant_option->variant_option_translation_id=$variant_option_translation_id;
						$variant_option->save();

					}	

				}

			}
		}
		$parent_variant_values=$request->parent_variant_values;
		$child_variant_values=$request->child_variant_values;
		$variant_my_prices=$request->variant_my_prices;
		$variant_market_prices=$request->variant_market_prices;
		$variant_quantities=$request->variant_quantities;
		$variant_skues=$request->variant_skues;
		$variant_barcodes=$request->variant_barcodes;
		$variant_weights=$request->variant_weights;
		$variant_weight_units=$request->variant_weight_units;

		$variant_my_price=$request->my_price;
		$variant_market_price=$request->market_price;

		$variant_quantity=$request->quantity;
		$variant_sku=$request->sku;
		$variant_barcode=$request->barcode;
		$variant_weight=$request->product_weight;
		$variant_weight_unit=$request->weight_unit;

		if($variant_quantity==""){
			$variant_quantity=0;
		}

		if($variant_weight==""){
			$variant_weight=0;
		}

		if($variant_weight_unit==""){
			$variant_weight_unit=0;
		}
		
		$parent_variant_id=1;
		$child_variant_id=1;
		if(!empty($parent_variant_values)){

			for($i=0;$i<count($parent_variant_values);$i++) {

				
				$parent_variant_id=1;
				$child_variant_id=1;
				if (isset($parent_variant_values[$i])) {
					$parent_variant_name=$parent_variant_values[$i];
				}
				if (isset($child_variant_values[$i])) {
					$child_variant_name=$child_variant_values[$i];
				}
				if (isset($variant_my_prices[$i])) {
					$variant_my_price=$variant_my_prices[$i];
				}
				if (isset($variant_market_prices[$i])) {
					$variant_market_price=$variant_market_prices[$i];
				}
				if (isset($variant_weights[$i])) {
					$variant_weight=$variant_weights[$i];
				}
				if (isset($variant_weight_units[$i])) {
					$variant_weight_unit=$variant_weight_units[$i];
				}
				if (isset($variant_quantities[$i])) {
					$variant_quantity=$variant_quantities[$i];
				}
				if (isset($variant_skues[$i])) {
					$variant_sku=$variant_skues[$i];
				}
				if (isset($variant_barcodes[$i])) {
					$variant_barcode=$variant_barcodes[$i];
				}

				if($variant_quantity==""){
					$variant_quantity=0;
				}

				if($variant_weight==""){
					$variant_weight=0;
				}
				if($parent_variant_name!=""){
					$parent_variant=VariantOptionTranslation::where('variant_option_name',$parent_variant_name)->first();
					$parent_variant_id=$parent_variant->variant_option_id;
					
				}else{
					$parent_variant_id=1;
				}

				if($child_variant_name!=""){
					$child_variant=VariantOptionTranslation::where('variant_option_name',$child_variant_name)->first();
					
					$child_variant_id=$child_variant->variant_option_id;
					
				}else{
					$child_variant_id=1;
				}

				$sku=new Sku();
				$sku->product_id=$product->product_id;
				$sku->parent_variant_id=$parent_variant_id;
				$sku->child_variant_id=$child_variant_id;
				$sku->my_price=$variant_my_price;
				$sku->market_price=$variant_market_price;
				$sku->product_weight=$variant_weight;
				$sku->weight_unit=$variant_weight_unit;
				$sku->quantity=$variant_quantity;
				$sku->sku_name=$variant_sku;
				$sku->barcode=$variant_barcode;
				$sku->save();
			}
		}else{
			$sku=new Sku();
			
			$sku->product_id=$product->product_id;
			$sku->parent_variant_id=$parent_variant_id;
			$sku->child_variant_id=$child_variant_id;
			$sku->my_price=$variant_my_price;
			$sku->market_price=$variant_market_price;
			$sku->product_weight=$variant_weight;
			$sku->weight_unit=$variant_weight_unit;

			$sku->quantity=$variant_quantity;
			$sku->sku_name=$variant_sku;
			$sku->barcode=$variant_barcode;
			$sku->save();
		}


		if($request->hasFile("files")){
			foreach($request['files'] as $imgs)
			{
				
				$product_image=new ProductImage();
				$source=$imgs;
				

				$image_name=$this->addCompressImage($source,"product-image");
				$product_image->product_image=$image_name;


				$child_variant_id=1;
				$parent_variant_id=1;
				
				$product_image->product_id=$product_id;
				$product_image->parent_variant_id=$parent_variant_id;
				$product_image->child_variant_id=$child_variant_id;
				$product_image->save();
			}
			
		}


		if(!empty($vendor_ids)||!empty($sage_id)){

		foreach ($vendor_ids as $vendor_id) {
			$product_vendor = new ProductVendor;
			$product_vendor->product_id=$product_id;
			$product_vendor->vendor_id=$vendor_id;
			$product_vendor->sage_id=$sage_id;
			// $product_vendor->sku_id=$sku->sku_id;
			$product_vendor->save();
		}
	}

		//flash("Product added successfully");
		return redirect("admin/product/".$product->product_id);
	}




	public function	getProduct(Request $request){
		die;
		if(!$this->checkPermission(Config::get('permissions.PRODUCT_DETAILS'))){
			return view('user.unauthorized');
		}

		
		$login_user_seller_id=Auth::user()->seller_id;
		$product_id=$request->id;

		$brands=Brand::where('brand_id','!=',1)->with('default_brand_translation')->get();

		$categories=Category::where('category_id','!=',1)->with('default_category_translation')->get();

		$gst=Gst::all();

		$variants=Variant::where('variant_id','!=',1)->where('status_id',1)->with('default_variant_translation')->get();
		

		$product=Product::with('default_product_translation_full')->with('parent_variant')->with('child_variant')->find($product_id);

		

		if(!$this->checkPermission("PRODUCT_ALL")){
			if($product!=""){
				if($product->seller_id!=$login_user_seller_id){
					return redirect('admin/product/my');
				}
			}else{
				return redirect('admin/product/my');	
			}
		}else{
			if($product==""){
				return redirect('admin/product/all');
			}
		}
			

		$parent_variant_ids=Sku::where('product_id',$product_id)->pluck('parent_variant_id');
		$parent_variants=VariantOption::whereIn('variant_option_id',$parent_variant_ids)->with('default_variant_option_translation')->get();

		$child_variant_ids=Sku::where('product_id',$product_id)->pluck('child_variant_id');
		$child_variants=VariantOption::whereIn('variant_option_id',$child_variant_ids)->with('default_variant_option_translation')->get();

		$product_images=ProductImage::where('product_id',$product_id)->with('parent_variant')->with('child_variant')->orderBy('created_at','desc')->get();

		$category_products=CategoryProduct::where('category_id','!=',1)->where('product_id',$product_id)->with('category')->get();

		$skus=Sku::where('product_id',$product_id)->with('parent_variant')->with('child_variant');



		$is_parent_variant=1;
		$is_child_variant=1;
		$parent_variant_id=$skus->distinct('parent_variant_id')->pluck('parent_variant_id');
		$stored_translations=ProductTranslation::where('product_id',$request)->pluck('language_id');
		if(count($parent_variant_id)==1){
			if($parent_variant_id[0]==1){
				$is_parent_variant=0;
			}
		}


		$child_variant_id=$skus->distinct('child_variant_id')->pluck('child_variant_id');
		if(count($child_variant_id)==1){
			if($child_variant_id[0]==1){
				$is_child_variant=0;
			}
		}
		
		$return_policies=ReturnPolicy::with('default_return_policy_translation')->get();

		$skus=$skus->orderBy('created_at','asc')->get();
        //$variants=Variant::where('product_id',$product_id)->get();
		$product=Product::with('brand')->with('return_policy')->with('product_prices')->find($product_id);
		
		// $product_prices = Product::where('product_id',$product_id)->get();
		/*$vendors = User::where('role_id',4)->get();*/
         
        $vendors=Vendor::all();
		$product_vendors = ProductVendor::where("product_id",$product_id)->with('vendors')->get();
		 
    
    
		$color_groups = ColorGroup::get();
		$colors = Color::get();

		
		//==============================Custom Colors Start ==================================

		$product_color_group = ProductColorGroup::where('product_id',$product_id)->first();

		if($product_color_group!=""){
			$product_color_name = $product_color_group->name;
			$product_color_group_id=$product_color_group->id;
           
			
			$product_color_ids=ProductColor::where('product_color_group_id',$product_color_group_id)->pluck('color_id');
			
			//foreach($product_color_ids as $product_color_id){
					//echo $product_color_id."<br>";
			//}
			//die;

			$get_product_colors = ProductColor::where('product_color_group_id',$product_color_group_id)->with('color')->get();

			if($product_color_ids!="[]"){
			
				$color_color_group=ColorColorGroup::whereIn('color_id',$product_color_ids)->select('group_id')
			    ->groupBy('group_id')
			    ->orderByRaw('COUNT(*) DESC')
			    ->limit(1)
			    ->first();

				

			
				

			    if($color_color_group!=""){
			    	$item_color_group=array('group_id'=>$color_color_group->group_id,"product_color_name"=>$product_color_name);
			    }else{
			    	$item_color_group=array('group_id'=>"","product_color_name"=>"");
			    }
			    
			}else{
				$item_color_group=array('group_id'=>"","product_color_name"=>"");
			}

			

		//====
			$product_color_group_new = ProductColorGroup::where('product_id',$product_id)->first();
			$product_color_new = ProductColor::where('product_color_group_id',$product_color_group_id)->with('color')->get();
		//====
		}else{
			 $item_color_group=array('group_id'=>"","product_color_name"=>"");
			 $get_product_colors="[]";
			 $product_color_new="[]";
		}

	


		//============================== Custom Colors End ===================================

		//Imprint data start=============================
		$imprints = Imprint::where('product_id',$product_id)->with('imprint_colors')->with('imprint_price')->get();

		$imprint_counts = Imprint::where('product_id',$product_id)->with('imprint_colors')->with('imprint_price')->count();
		//Imprint data end===============================

		
		//Product Option Start =============
		$product_options = ProductOption::where('product_id',$product_id)->with('product_sub_option')->get();
		
        	/*product apparel*/
		$product_Apparel=ProductApparel::where('product_id',$product_id)->with('apparel')->get();
		$All_Apparel=Apparel::where('status_id',1)->get();
		
		

 
	$product_colors=ProductColorGroup::where('product_id',$product_id)->with('product_colors')->first();
	
	$product_option_counts = $product_options->count();
	//Product Option End ========
	
	

	return view('product.details')->with('product',$product)->with('variants',$variants)->with('brands',$brands)->with('gst',$gst)->with('skus',$skus)->with('is_parent_variant',$is_parent_variant)->with('is_child_variant',$is_child_variant)->with('categories',$categories)->with('category_products',$category_products)->with('parent_variants',$parent_variants)->with('child_variants',$child_variants)->with('product_images',$product_images)->with('stored_translations',$stored_translations)->with('return_policies',$return_policies)->with('vendors',$vendors)->with('product_vendors',$product_vendors)->with('color_groups',$color_groups)->with('colors',$colors)->with('imprints',$imprints)->with('imprint_counts',$imprint_counts)->with('item_color_group',$item_color_group)->with('get_product_colors',$get_product_colors)->with('product_color_new',$product_color_new)->with('product_options',$product_options)->with('product_option_counts',$product_option_counts)->with('product_Apparel',$product_Apparel)->with('All_Apparel',$All_Apparel)->with('product_colors',$product_colors);
	}




     public function product_Color_Delete(Request $request){
		$product_color=ProductColor::where('color_id',$request->id)->first();
		if($product_color!=""){
			$product_color->delete();
		}
		return redirect()->back();	
	}





     
     public function product_Apparel_delete(Request $request){
		$product_apparel = ProductApparel::find($request->id);
		if($product_apparel!=""){
			$product_apparel->delete();
		}
		return redirect()->back();
		
	}
   




	public function postProductColorImageSrcDelete(Request $request){
		$product_color_id=$request->product_color_id;
		$product_color = ProductColor::find($product_color_id);
		$product_color_image_src = $product_color->image_src;
        Storage::delete($product_color_image_src);
		// if($product_color_image_src!=""&&$product_color_image_src!=null&&$product_color_image_src!="null"){
		// 	Storage::delete($product_color_image_src);
		// }
		/*$product_color->image_src=null;*/
		$product_color->delete();
		return $product_color;
	}

	public function product_vendor_delete(Request $request){
		$product_vendor = ProductVendor::find($request->id);
		if($product_vendor!=""){
			$product_vendor->delete();
		}
		return redirect()->back();
		
	}

	public function imprint_color_delete(Request $request){

		$product_color = ImprintColor::find($request->id);
		if($product_color!=""){
			$product_color->delete();
		}
		return redirect()->back();
	}

	public function getEditImprintData(Request $request){
		
		$imprint_id=$request->imprint_id;
		$imprint_name=$request->imprint_name;
		$max_colors=$request->max_colors;
		$color_group_id=$request->color_group_id;

		$imprint = Imprint::find($imprint_id);

		if($imprint_name!=""){
			$imprint->name = $imprint_name;
		}else{
			$imprint->name = "";
		}
		if($max_colors!=""){
			$imprint->max_colors = $max_colors;
		}else{
			$imprint->max_colors = "";
		}
		if($color_group_id!=""){
			$imprint->color_group_id = $color_group_id;
		}else{
			$imprint->color_group_id = "";
		}		
		$imprint->save();
		return $imprint;
		
	}

	public function getEditImprintColorData(Request $request){
		$imprint_color_id_values = $request->color_ids;
		$imprint_id = $request->imprint_id;
		for ($x=0; $x<count($imprint_color_id_values); $x++){
				$imprint_color=new ImprintColor();
				$imprint_color->imprint_id=$imprint_id;
				$imprint_color->color_id=$imprint_color_id_values[$x];
				$imprint_color->save();
			}
		$imprint_colors = ImprintColor::where('imprint_id',$imprint_id)->get();
		return $imprint_colors;
	}

	public function postEditImprintPriceData(Request $request){
					$imprint_price_id = $request->imprint_price_id;
					$imprint_count_from = $request->imprint_count_from;
					$imprint_location_setup_fee = $request->imprint_location_setup_fee;
					$imprint_additinal_location_running_fee = $request->imprint_additinal_location_running_fee;
					$imprint_additional_setup_fee = $request->imprint_additional_setup_fee;
					$imprint_additional_running_fee = $request->imprint_additional_running_fee;

				
				$imprint_price = ImprintPrice::find($imprint_price_id);
				$imprint_price->quantity=$imprint_count_from;
				$imprint_price->setup_price=$imprint_location_setup_fee;
				$imprint_price->item_price=$imprint_additinal_location_running_fee;
				$imprint_price->color_setup_price=$imprint_additional_setup_fee;
				$imprint_price->color_item_price=$imprint_additional_running_fee;
				$imprint_price->save();

				return $imprint_price;
	}


	public function getDeleteEditImprint(Request $request){
		dd($request->all());
	}

	public function postEditProductColor(Request $request){

		//dd($request->all());
		$post=$request->all();

		$product_id=$post['product_id'];
		$product_color_id = $post['product_color_id'];
		
		

				$product_color_group = ProductColorGroup::where('product_id',$product_id)->first();


				$product_color_group_id = $product_color_group->id;

				$product_color = ProductColor::where('product_color_group_id',$product_color_group_id)->where('color_id',$product_color_id)->first();

				// $product_color = ProductColor::where('product_color_group_id',$product_color_group_id)->first();

				/*if($product_color==""){*/
					
					$product_color=new ProductColor();
					if($request->hasFile("files")){
						// print_r($request['files'][0]);die;
						// foreach($request['files'] as $imgs)
						// {
						$source=$request['files'][0];
						
						// $source=$imgs;
						$image_name=$this->addCompressImage($source,"product-color");
						$product_color->image_src=$image_name;
						// }
					}
					$product_color->product_color_group_id=$product_color_group_id;
					$product_color->color_id=$product_color_id;
					$product_color->save();
					$data = array('success'=>'true','message'=>'Product Color Image Added Successfully','product_color'=>$product_color);
					return $data;





/*				}else{
					
					$product_color_id = $product_color->id;
					$old_image_src = $product_color->image_src;

					$product_color = ProductColor::find($product_color_id);
					// $product_image_src = $product_color->image_src;
					// echo $product_image_src;die;
					// Storage::delete($product_image_src);
					if($request->hasFile("files")){
						$source=$request['files'][0];

						if($source!=""){
							Storage::delete($old_image_src);
						}

						$image_name=$this->addCompressImage($source,"product-color");
						$product_color->image_src=$image_name;

					}
					$product_color->save();

					$data = array('success'=>'false','message'=>"Product Color Image Already Exist",'product_color'=>$product_color);
					return $data;
				}*/

				

	}
	//product update page end



	public function imprintProductPriceDelete(Request $request){

		$product_price = ImprintPrice::find($request->id);
		if($product_price!=""){
			$product_price->delete();
		}
		return redirect()->back();
	}

	public function getProductTranslation($product_id, $language_code){
		if(!$this->checkPermission(Config::get('permissions.PRODUCT_UPDATE'))){
			return view('user.unauthorized');
		}
		

		$language=Language::where('language_code',$language_code)->with('default_language_translation')->first();
		$product=Product::with('default_product_translation')->find($product_id);

		if($language!="" && $product!=""){
			$product_translation=ProductTranslation::where('language_id',$language->language_id)->where('product_id',$product_id)->first();
			$stored_translations=ProductTranslation::where('product_id',$product_id)->pluck('language_id');


			return view('product.language')->with('product_translation',$product_translation)->with('language',$language)->with('product',$product)->with('stored_translations',$stored_translations);
		}
		return redirect('admin/product/all');
	}


	public function postProductTranslation(Request $request){
		if(!$this->checkPermission(Config::get('permissions.PRODUCT_UPDATE'))){
			return view('user.unauthorized');
		}
		

		$post=$request->all();	
		$meta_title="";
		$meta_keywords="";
		$meta_description="";
		$language_id=$post['language_id'];
		$product_name=$post['product_name'];
		$description=$post['description'];

		if(isset($post['meta_title'])){
			$meta_title=$post['meta_title'];
		}

		if(isset($post['meta_keywords'])){
			$meta_keywords=$post['meta_keywords'];
		}
		if(isset($post['meta_description'])){
			$meta_description=$post['meta_description'];
		}
		/*$product_url=Str::slug($product_name);*/
		$delivery_message=$post['delivery_message'];		
		$product_id=$post['product_id'];
		$language=Language::find($language_id);
		$product_translation=ProductTranslation::where('language_id',$language_id)->where('product_id',$product_id)->first();
		if($product_translation!=""){

			$this->validate($request,['product_name'=>'required']);

			$product_translation->product_name=$product_name;
			$product_translation->description=$description;
			$product_translation->long_description= $request->long_description;
			$product_translation->additional_information= $request->additional_information;

			$product_translation->meta_title=$meta_title;
			$product_translation->meta_keywords=$meta_keywords;
			$product_translation->meta_description=$meta_description;
			/*$product_translation->product_url=Str::slug($request->product_name);*/
			$product_translation->delivery_message=$delivery_message;
			$product_translation->save();
			flash('Product updated successfully');
		}
		else{
			$this->validate($request,Product::$translation);
			$product_translation=new ProductTranslation();
			
			$product_translation->language_id=$language_id;
			$product_translation->product_name=$product_name;
			$product_translation->description=$description;
			$product_translation->meta_title=$meta_title;
			$product_translation->meta_keywords=$meta_keywords;
			$product_translation->meta_description=$meta_description;
			/*	$product_translation->product_url=Str::slug($request->product_name);*/
			$product_translation->delivery_message=$delivery_message;			

			$product_translation->product_id=$product_id;
			$product_translation->save();
			flash('Product details added for new language');
		}
		return redirect('admin/product/'.$product_id.'/'.$language->language_code);

	}

	public function	postDeleteVariant(Request $request){
		$sku_id=$request->id;
		
		$sku=Sku::find($sku_id);
		if($sku!=''){
			$order_product=OrderProduct::where('sku_id',$sku_id)->get();
			if($order_product!="[]"){
				return 4;
			}else{
				$product_id=$sku->product_id;
				$skus_count=Sku::where('product_id', $product_id)->count();

				$carts=Cart::where('sku_id',$sku->sku_id)->get();

				foreach($carts as $cart) { 

					$cart->delete();
				}

				if($skus_count>1){

					$sku->delete();
					return 1;

				}else{
					return 2;
				}
			}
		}	
		return 3;
	}

	public function getAllProducts(Request $request){
		
		

		if($this->checkPermission(Config::get('permissions.PRODUCT_ALL'))){
		}else if($this->checkPermission(Config::get('permissions.PRODUCT_SELLER'))){
			return redirect("admin/product/my");
		}else{
			return view('user.unauthorized');
		}
		
		$login_user_seller_id=Auth::user()->seller_id;
		$product_ids=Product::where('track_inventory',1)->where('seller_id',$login_user_seller_id)->pluck('product_id');

		$skus=Sku::whereIn('product_id',$product_ids)->with('product')->with('parent_variant')->with('child_variant');

		//filter data start
		$categories = Category::where('status_id',1)->with('category_translation')->get();
		$vendors = User::where('role_id',4)->get();
		// echo $vendors;die;
		//filter data end

		
		return view('product.all')->with('skus',$skus)->with('categories',$categories)->with('vendors',$vendors);
	}

	public function getAllProductsData(Request $request){
		

		
		if($this->checkPermission(Config::get('permissions.PRODUCT_ALL'))){
			
			$products=Product::with('default_product_translation')->with('default_product_translation_full')->with(['product_category'=>function($query){
						$query->where('category_id','!=',1)->with('category');
					}])->whereHas('default_product_translation_full', function($query){
					    $query->where('product_name','!=','');
					})->with('seller')->with('status')->with('skus');
				}else{
					return view('user.unauthorized');
				}

				$products = $products->with('product_vendors')->with('product_categories');


				//filter method start
				if($request->vendor_id!=""&&$request->vendor_id!="undefined"&&$request->vendor_id!=null&&$request->vendor_id!="null"&&$request->vendor_id!="[]"){
					$product_ids = ProductVendor::where('vendor_id',$request->vendor_id)->pluck('product_id');
					$products = $products->whereIn('product_id',$product_ids);
				}


				if($request->id!=""&&$request->id!="undefined"&&$request->id!="[]"&&$request->id!="null"&&$request->id!=null){
					$products = $products->where('product_id',$request->id);
				}

				if($request->name!=""&&$request->name!="undefined"&&$request->name!=null&&$request->name!="null"&&$request->name!="[]"){
					$name = $request->name;
					$products = $products->whereHas('default_product_translation_full', function($q) use($name){
					    $q->where('product_name', 'like', '%' .$name. '%');
					});
				}

				

				//Vendor sku
				// if($request->vendor_sku!=""&&$request->vendor_sku!="undefined"&&$request->vendor_sku!=null&&$request->vendor_sku!="null"&&$request->vendor_sku!="[]"){
				// 	echo 'vendor_sku';die;
				// 	$vendor_sku = $request->vendor_sku;
				// }

				//Category id
				if($request->category_id!=""&&$request->category_id!="undefined"&&$request->category_id!="null"&&$request->category_id!=null&&$request->category_id!="[]"){
					$category_id = $request->category_id;
					$product_ids = CategoryProduct::where('category_id',$category_id)->pluck('product_id');
					$products = $products->whereIn('product_id',$product_ids);
				}

				//Color Image
				if($request->color_image!=""&&$request->color_image!="undefined"&&$request->color_image!="[]"&&$request->color_image!=null&&$request->color_image!="null"){
					$color_image = $request->color_image;
					if($color_image=="complete"){
						$product_color_group_ids = ProductColor::where('image_src',"!=","")->pluck('product_color_group_id');
					}elseif($color_image=="empty"){
						$product_color_group_ids = ProductColor::where('image_src',NULL)->pluck('product_color_group_id');
					}elseif($color_image=="none"){
						$product_color_group_ids = ProductColor::where('image_src',NULL)->pluck('product_color_group_id');
					}
						$product_ids = ProductColorGroup::whereIn('id',$product_color_group_ids)->pluck('product_id');
						$products = $products->whereIn('product_id',$product_ids);
				}

				
				//date to and date from
				if($request->date_to!=""&&$request->date_to!="undefined"&&$request->date_to!="[]"&&$request->date_to!="null"&&$request->date_to!=null&&$request->date_from!=""&&$request->date_from!="undefined"&&$request->date_from!="[]"&&$request->date_from!="null"&&$request->date_from!=null){

					$products=$products->whereBetween('created_at', [$request->date_from, $request->date_to]);
				}

				//activity status
				if($request->activity_status!=""&&$request->activity_status!="undefined"&&$request->activity_status!="null"&&$request->activity_status!=null&&$request->activity_status!="[]"){
					if($request->activity_status==1){
						$activity_status=1;
					}else{
						$activity_status=2;
					}
					$products=$products->where('status_id',$activity_status);
				}

				//sage_id
				if($request->sage_id!=""&&$request->sage_id!="undefined"&&$request->sage_id!="null"&&$request->sage_id!=null&&$request->sage_id!="[]"){
						$product_ids = ProductVendor::where('sage_id',$request->sage_id)->pluck('product_id');
						$products = $products->whereIn('product_id',$product_ids);
				}

				
				//filter method end
				$products = $products;


		return DataTables::of($products)->make(true);
	}


	public function getInventoryModal(Request $request){
		$product_id=$request->product_id;
		
		$skus=Sku::where('product_id',$product_id)->with('product')->with('parent_variant')->with('child_variant')->get();
		return $skus;
	}


	public function getInventoryData(){
		
		if(!$this->checkPermission(Config::get('permissions.INVENTORY_ALL'))){
			return view('user.unauthorized');
		}
		

		$login_user_seller_id=Auth::user()->seller_id;
		$product_ids=Product::where('track_inventory',1)->where('seller_id',$login_user_seller_id)->pluck('product_id');
		$skus=Sku::whereIn('product_id',$product_ids)->with('product')->with('parent_variant')->with('child_variant')->get();
		return DataTables::of($skus)->make(true);
	}


	public function getMyProducts(Request $request){
		if(!$this->checkPermission(Config::get('permissions.PRODUCT_SELLER'))){
			return view('user.unauthorized');
		}
		return view('product.my');
	}

	public function getMyProductsData(){
		if($this->checkPermission(Config::get('permissions.PRODUCT_SELLER'))){
			$login_user_seller_id=Auth::user()->seller_id;
			

			$user_id=Auth::user()->id;
			$products=Product::with('default_product_translation')->with(['product_category'=>function($query){
				$query->where('category_id','!=',1)->with('category');
			}])->where('seller_id',$login_user_seller_id)->with('seller')->with('status')->get();
		}else{
			return view('user.unauthorized');
		}
		return DataTables::of($products)->make(true);
	}

	public function postProductDelete(Request $request){
		if(!$this->checkPermission(Config::get('permissions.PRODUCT_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$id=$request->product_id;
		$is_deleted=$request->is_deleted;
		$product=Product::find($id);
		
		$product_count=1000;
		$total_product=Product::where('status_id',1)->count();

		if ($is_deleted==0) {
			if ($product_count<=$total_product) {

				if($this->checkPermission(Config::get('permissions.PRODUCT_ALL'))){
					flash('Product Limit Exceeded');
					return redirect("admin/product/all");
				}else if($this->checkPermission(Config::get('permissions.PRODUCT_SELLER'))){
					flash('Product Limit Exceeded');
					return redirect("admin/product/my");
				}else{
					flash('Product Limit Exceeded');
					return redirect("admin/product/all");
				}
			}

		}

		if($product!=""){
			$product->is_deleted=$is_deleted;
			$product->save();
			if($is_deleted==0){
				flash('Product Activated Successfully...','success')->important();
				return redirect('product/all');
			}else{
				flash('Product Inactivated Successfully...','danger')->important();
				return redirect('product/all');
			}
		}else{
			return redirect('product/all');
		}
	}

	//Product Images
	public function getAddProductImages($id){
		
		$product=Product::find($id);
		return view('product.addProductImages')->with('product',$product);
	}

	public function postAddProductImages(Request $request){
		// dd($request->all());
		$this->validate($request,ProductImage::$addRules);

		

		$post=$request->all();

		$product_id=$post['product_id'];


		if($request->hasFile("files")){
			foreach($request['files'] as $imgs)
			{
				
				$product_image=new ProductImage();
				$source=$imgs;
				

				$image_name=$this->addCompressImage($source,"product-image");
				$product_image->product_image=$image_name;


				$child_variant_id=1;
				$parent_variant_id=1;
				
				$product_image->product_id=$product_id;
				$product_image->parent_variant_id=$parent_variant_id;
				$product_image->child_variant_id=$child_variant_id;
				$product_image->save();
			}

			$product_images=ProductImage::where('product_id',$product_id)->orderBy('product_image_id','desc')->get();

			$this->response['status']='true';
			$this->data['msg']='Product image added successfully';
			$this->data['data']=$product_images;
			$this->response['data']=$this->data;
			return $this->response;


		}else{


			$this->response['status']='false';
			$this->data['msg']='no image selected';
			$this->response['data']=$this->data;
			return $this->response;


		}

		
		
		/*return $product_images;*/
	}

	public function postDeleteProductImage(Request $request){
		$post=$request->all();
		$product_image_id=$post['product_image_id'];
		$product_id=$post['product_id'];
		$product_image=ProductImage::find($product_image_id);


		if($product_image!=""){
			$product_image->delete();
		}

		$product_images=ProductImage::where('product_id',$product_id)->with('child_variant')->with('parent_variant')->orderBy('product_image_id','desc')->get();
		return $product_images;

	}


	public function getDeleteImage($id,$product_id){
		$product_image=ProductImage::where('id',$id)->delete();
		$product_image=ProductImage::where('product_id',$product_id)->get();
		return $product_image;
	}
	public function getApproveReviews(Request $request){
		$review_id=$request->id;
		$product_review=ProductReview::find($review_id);
		$product_review->is_approved=1;
		$product_review->save();

		return redirect()->back();
	}



	public function postProduct(Request $request){	


		/*dd($request->all());die;*/
		//products data

		$is_stock_collection = $request->is_stock_collection;

		if($is_stock_collection!=""){
			$is_stock_collection=1;
		}else{
			$is_stock_collection=0;
		}
		//product vendors
		$vendor_ids = $request->vendor_id;
		$sage_id = $request->sage_id;
		/*product apprel*/

        /*product apparel*/
		$apparel_ids=$request->apparel_id;

		//product product options
		$option_name = $request->option_name;
     
        $sub_option_name=$request->sub_option_name;

		$show_as = $request->show_as;
		$show_blank = $request->show_blank;
		$remarks = $request->remarks;
		$option_count_from = $request->option_count_from;
		$option_setup_fee = $request->option_setup_fee;
		$option_additional_fee = $request->option_additional_fee;

		//=====
		$item_color_group_id = $request->item_color_group_id;
		$item_color_group_name = $request->item_color_group_name;

		// Imprint data Start
		$imprint_names = $request->imprint_name;
		$max_colors = $request->max_colors;
		$imprint_color_group_ids=$request->color_group_id;
		$imprint_color_ids=$request->color_id;
		
		$imprint_count_from = $request->imprint_count_from;
		$imprint_location_setup_fee = $request->imprint_location_setup_fee;
		$imprint_additinal_location_running_fee = $request->imprint_additinal_location_running_fee;
		$imprint_additional_setup_fee = $request->imprint_additional_setup_fee;
		$imprint_additional_running_fee = $request->imprint_additional_running_fee;
		// Imprint data End
		// dd($request->all());

		//price product grid
		$is_sale = $request->is_sale;
		if($is_sale!=""){
			$is_sale = $request->is_sale;
		}else{
			$is_sale =0;
		}

		// echo $is_sale;die;
		$count_from = $request->count_from;
		$setup_price = $request->setup_price;
		$per_item_price = $request->per_item_price;
		$per_item_sale_price = $request->per_item_sale_price;
		//end price grid

		$dimension = $request->dimension;
		$imprint_area = $request->imprint_area;
		$additional_specification = $request->additional_specification;
		$pricing_information = $request->pricing_information;
		$video = $request->video;

		$quantity_per_box = $request->quantity_per_box;
		$shipping_additional_type = $request->shipping_additional_type;
		$weight_box = $request->weight_box;
		$shipping_additional_value = $request->shipping_additional_value;
		$shipping_from_zip_code = $request->shipping_from_zip_code;
		$production_time_from = $request->production_time_from;
		$production_time_to = $request->production_time_to;
		$custom_method = $request->custom_method;
		$custom_cost = $request->custom_cost;

		//Seo data  new
		$google_product_category = $request->google_product_category;
		$image_alt_text = $request->image_alt_text;
		$gender = $request->gender;
		$age_group = $request->age_group;
		$material = $request->material;
		$pattern = $request->pattern;


		if(!$this->checkPermission(Config::get('permissions.PRODUCT_UPDATE'))){
			return view('user.unauthorized');
		}
		
		$language_id=$this->getLanguageId();

		$this->validate($request,Product::$Editrules);

			$product_id=$request->id;
			$product=Product::find($product_id);
			$return_policy_id=1;

		$product->is_stock_collection = $is_stock_collection;

		if($request->return_policy_id!=$product->return_policy_id && $request->return_policy_id!=""){
			$return_policy_id=$request->return_policy_id;
		}
		else{
			$return_policy_id=$product->return_policy_id;
		}

		//New product data start

		if($dimension !=""){
			$product->dimension=$dimension;
		}

		if($imprint_area !=""){
			$product->imprint_area = $imprint_area;
		}

		if($additional_specification !=""){
			// $product->additional_specification = $additional_specification;
			if($request->hasFile("additional_specification")){
                $additional_specification = $request->additional_specification;
                $path = $additional_specification->store('additional-specification');
                $product->additional_specification=$path;
            }
		}

		if($pricing_information !=""){
			$product->pricing_information = $pricing_information;
		}

		if($video !=""){
			// $product->video = $video;
			if($request->hasFile("video")){
                $video = $request->video;
                $path = $video->store('product-video');
                $product->video=$path;
            }
		}

		if($quantity_per_box !=""){
			$product->quantity_per_box = $quantity_per_box;
		}

		if($shipping_additional_type !=""){
			$product->shipping_additional_type = $shipping_additional_type;
		}

		if($weight_box !=""){
			$product->weight_box = $weight_box;
		}

		if($shipping_additional_value !=""){
			$product->shipping_additional_value = $shipping_additional_value;
		}

		if($shipping_from_zip_code !=""){
			$product->shipping_from_zip_code = $shipping_from_zip_code;
		}

		if($production_time_from !=""){
			$product->production_time_from = $production_time_from;
		}

		if($production_time_to !=""){
			$product->production_time_to = $production_time_to;
		}

		if($custom_method !=""){
			$product->custom_method = $custom_method;
		}

		if($custom_cost !=""){
			$product->custom_cost = $custom_cost;
		}

		//New product data End
		if(isset($request['save'])){
			
			$product_url=Str::slug($request->product_url);
			$request->merge(['product_url' => $product_url]);

		$this->validate($request,['product_url'=>'unique:products,product_url,'.$product->product_id.',product_id']);


			if($product!=""){
				$product_translation=ProductTranslation::find($product->product_translation_id);

				$product_translation->product_name=$request->product_name;
				if($request->description!=""){
					$product_translation->description=$request->description;
				}
				
				if($request->long_description!=""){
					$product_translation->long_description= $request->long_description;
				}
				
				if($request->additional_information!=""){
					$product_translation->additional_information= $request->additional_information;
				}
				
				if($request->delivery_message!=""){
					$product_translation->delivery_message=$request->delivery_message;
				}

				/*	$product_translation->product_url=$product_url=Str::slug($request->product_name);*/
				if ($request->meta_title!="") {
					$product_translation->meta_title=$request->meta_title;
				}

				if ($request->meta_keywords!="") {
					$product_translation->meta_keywords=$request->meta_keywords;
				}

				if ($request->meta_description!="") {
					$product_translation->meta_description=$request->meta_description;
				}

				if($google_product_category!=""){
					$product_translation->google_product_category = $google_product_category;
				}

				if($image_alt_text!=""){
					$product_translation->image_alt_text = $image_alt_text;
				}

				if($gender!=""){
					$product_translation->gender = $gender;
				}

				if($age_group!=""){
					$product_translation->age_group = $age_group;
				}

				if($material!=""){
					$product_translation->material = $material;
				}

				if($pattern!=""){
					$product_translation->pattern = $pattern;
				}

				$product_translation->save();


				$brand_id=1;
				if($request->brand_id!=""){
					$brand_id=$request->brand_id;
				}
				$product->brand_id=$brand_id;
				$product_minimum_quantity=$request->product_minimum_quantity;

				if ($product_minimum_quantity=="") {
					$product_minimum_quantity=1;
				}
				$product->product_minimum_quantity=$product_minimum_quantity;

				$product->product_url=Str::slug($request->product_url);
				$product->return_policy_id=$return_policy_id;

				$product_image=$product->product_image;
				if(isset($request->product_image)){
					if ($product_image!="") {
						$product_image_name=substr($product_image, strrpos($product_image, '/') + 1);
						if(file_exists(storage_path("app/product-image/".$product_image_name))){
							unlink(storage_path("app/product-image/".$product_image_name));
						}
					}
					$source=$request->product_image;
					$image_name=$this->addCompressImage($source,"product-image");
					$product->product_image=$image_name;
				}
				$gst_id=1;
				if($request->gst_id!=""){
					$gst_id=$request->gst_id;	
				}
				$allow_customer_stock_out=$request->allow_customer_stock_out;
				$is_product_shipping=$request->is_product_shipping;

				if($allow_customer_stock_out==""){
					$allow_customer_stock_out=0;
				}

				if($is_product_shipping==""){
					$is_product_shipping=0;
				}
				if($request->track_inventory!=""){
					$product->track_inventory=$request->track_inventory;
				}

				$product->gst_id=$gst_id;
				
				if ($request->seller_id!="") {
					$product->seller_id=$request->seller_id;
				}else{
					$seller_id=Auth::user()->seller_id;
					$product->seller_id=$seller_id;
					
				}
				
				$product->allow_customer_stock_out=$allow_customer_stock_out;
				$product->save();

				// echo 'product_id: '.$product_id;die;


				$count_from_total = count($count_from);

				if($count_from[0]!=""){

					for($i=0;$i<count($count_from);$i++){
						$product_price = new ProductPrice;
						$product_price->product_id = $product->product_id;

						if($count_from[$i]!=""){
							$product_price->count_from = $count_from[$i];
						}

						if($setup_price[$i]!=""){
							$product_price->setup_price = $setup_price[$i];
						}

						if($per_item_price[$i]!=""){
							$product_price->per_item_price = $per_item_price[$i];
						}

						if($per_item_sale_price[$i]!=""){
							$product_price->per_item_sale_price = $per_item_sale_price[$i];
						}

						if($is_sale!=""){
							$product_price->is_sale = $is_sale;
						}
						


						$product_price->save();
					}

				}else{
					$product_price_ids =  ProductPrice::where('product_id',$product_id)->pluck('product_price_id');
					
					// $product_prices = ProductPrices::whereIn('product_id',$product_prices)->get();
					foreach ($product_price_ids as $product_price_id) {
						$product_price = ProductPrice::find($product_price_id);
						if($product_price!=""){
							$product_price->is_sale=$is_sale;
							$product_price->save();
						}
					}


				}


				$category_id=$request->category_id;

				if ($category_id!="") {
					
					$categories=CategoryProduct::where('product_id',$product->product_id)->get();

					if($categories!=""){

						foreach ($categories as $category){

							$category->delete();

						}

						for($i=0;$i<count($category_id);$i++){
							$seller_category=new CategoryProduct();
							$seller_category->category_id=$category_id[$i];
							$seller_category->product_id=$product->product_id;
							$seller_category->save();
						}
					}else{

						for($i=0;$i<count($category_id);$i++){
							$seller_category=new CategoryProduct();
							$seller_category->category_id=$category_id[$i];
							
							$seller_category->product_id=$product->product_id;
							$seller_category->save();
						}
					}
				}


				// Imprints Start
				// print_r($imprint_names);echo "<br>";
				// print_r($imprint_color_ids);die;

		$product_id=$product->product_id;

		
		if($imprint_names!="[]"&&$imprint_names!=""){

		for($i=0;$i<count($imprint_names);$i++){

			if($imprint_names[$i]!=""){

			$i_value=$i;
          
			$imprint_count_from_value=$imprint_count_from[$i_value];

			$imprint_location_setup_fee_value=$imprint_location_setup_fee[$i_value];
			$imprint_additinal_location_running_fee_value=$imprint_additinal_location_running_fee[$i_value];
			$imprint_additional_setup_fee_value=$imprint_additional_setup_fee[$i_value];
			$imprint_additional_running_fee_value=$imprint_additional_running_fee[$i_value];

			$imprint=new Imprint();
			$imprint->product_id=$product_id;
			$imprint->position=1;
			if($imprint_names!="[]"&&$imprint_names!=""){
				$imprint->name=$imprint_names[$i];
			}
			
			if($max_colors!="[]"&&$max_colors!=""){
				$imprint->max_colors=$max_colors[$i];
			}

			if($imprint_color_group_ids!="[]"&&$imprint_color_group_ids!=""){
				$imprint->color_group_id=$imprint_color_group_ids[$i];
			}

			$imprint->save();

			$imprint_id=$imprint->id;

			if($imprint_color_ids!="[]"&&$imprint_color_ids!=""){
				$imprint_color_id_values=$imprint_color_ids[$i_value];
				if($imprint_color_id_values!="[]"){
					for ($x=0; $x<count($imprint_color_id_values); $x++){
						$imprint_color=new ImprintColor();
						$imprint_color->imprint_id=$imprint_id;
						$imprint_color->color_id=$imprint_color_id_values[$x];
						$imprint_color->save();
					}
				}
			}
			
			

			
			for($j=0;$j<count($imprint_count_from_value);$j++){

            if($imprint_count_from_value[$j]!=""){

				$imprint_price=new ImprintPrice();
				$imprint_price->imprint_id=$imprint_id;
				if($imprint_count_from_value[$j]!=""){
					$imprint_price->quantity=$imprint_count_from_value[$j];
				}
				if($imprint_location_setup_fee_value[$j]!=""){
					$imprint_price->setup_price=$imprint_location_setup_fee_value[$j];
				}
				if($imprint_additinal_location_running_fee_value[$j]!=""){
					$imprint_price->item_price=$imprint_additinal_location_running_fee_value[$j];
				}
				if($imprint_additional_setup_fee_value[$j]!=""){
					$imprint_price->color_setup_price=$imprint_additional_setup_fee_value[$j];
				}
				if($imprint_additional_running_fee_value[$j]!=""){
					$imprint_price->color_item_price=$imprint_additional_running_fee_value[$j];
				}
				$imprint_price->save();


              }

			}
		
			}

		}

	}


		// Imprints End
				$sku_ids=$request->sku_ids;	
				$variant_my_prices=$request->variant_my_prices;
				$variant_market_prices=$request->variant_market_prices;

				$variant_barcodes=$request->variant_barcodes;

				$variant_skues=$request->variant_skues;
				if($product->track_inventory==1){
					$variant_quantities=$request->variant_quantities;


				}
				if($product->is_product_shipping==1){
					$variant_weights=$request->variant_weights;
					$variant_weight_units=$request->variant_weight_units;
				}

				// echo gettype($sku_ids);die;
				if(!empty($sku_ids)){
				for($i=0;$i<count($sku_ids);$i++){

					$sku=Sku::find($sku_ids[$i]);
					if($sku!=""){

						$sku->my_price=$variant_my_prices[$i];

						$sku->market_price=$variant_market_prices[$i];
						if($variant_barcodes!=""){
							$sku->barcode=$variant_barcodes[$i];
						}
						
						$sku->sku_name=$variant_skues[$i];
						if($product->track_inventory==1){
							$sku->quantity=$variant_quantities[$i];
						}
						if($product->is_product_shipping==1){
							$sku->product_weight=$variant_weights[$i];
							$sku->weight_unit=$variant_weight_units[$i];
						}
						$sku->save();
					}
				}
				}
			}

		}elseif(isset($request['active'])){
			
			$product_count=1000;
			$total_product=Product::where('status_id',1)->count();
			if ($product_count<=$total_product) {

				if($this->checkPermission(Config::get('permissions.PRODUCT_ALL'))){
					flash('Product Limit Exceeded');
					return redirect("admin/product/all");
				}else if($this->checkPermission(Config::get('permissions.PRODUCT_SELLER'))){
					flash('Product Limit Exceeded');
					return redirect("admin/product/my");
				}else{
					flash('Product Limit Exceeded');
					return redirect("admin/product/all");
				}
			}
			flash('Product activated successfully');
			$product->status_id=1;

		}else if(isset($request['inactive'])){
			flash('Product inactivated successfully');
			$sku_ids=Sku::where('product_id',$product_id)->pluck('sku_id');
			Cart::whereIn('sku_id',$sku_ids)->delete();
			Slider::where("notification_class_id",1)->where('section_id',$product_id)->update(['status_id' => 2]);
			OfferBlock::where("notification_class_id",1)->where('section_id',$product_id)->update(['status_id' => 2]);
			Notification::where("notification_class_id",1)->where('section_id',$product_id)->update(['status_id' => 2]);

			Wishlist::whereIn('sku_id',$sku_ids)->delete();
			$product->status_id=2;
		}



		if ($request->parent_variant_new!="") {
			$product->parent_variant_id=$request->parent_variant_new;

		}

		if ($request->child_variant_new!="") {
			$product->child_variant_id=$request->child_variant_new;
		}


        if ($request->sku_HIT!="") {
			$product->sku_hit=$request->sku_HIT;
		}
        


		$product->save();

		$parent_variant_id=$product->parent_variant_id;
		$child_variant_id=$product->child_variant_id;



		//flash('Product updated successfully');

		//parent_variant_values 
		$parent_variant_values=$request->parent_variant_values_new;
		$child_variant_values=$request->child_variant_values_new;

		$variant_my_prices=$request->variant_my_prices_new;
		$variant_market_prices=$request->variant_market_prices_new;
		$variant_quantities=$request->variant_quantities_new;
		$variant_skues=$request->variant_skues_new;
		$variant_barcodes=$request->variant_barcodes_new;
		$variant_weights=$request->variant_weights_new;
		$variant_weight_units=$request->variant_weight_units_new;

		if(!empty($parent_variant_values)){
			for($i=0;$i<count($parent_variant_values);$i++) {

				$parent_variant_name=$parent_variant_values[$i];


				if($parent_variant_name!=""){

					$variant_option=VariantOptionTranslation::where('variant_option_translation_id','!=',1)->where('variant_option_name',$parent_variant_name)->first();
					if ($variant_option=="") {
						$variant_option=new VariantOption();
						$variant_option->variant_id=$parent_variant_id;
						
						$variant_option->variant_option_translation_id=1;
						$variant_option->save();

						$variant_option_translation=new VariantOptionTranslation();
						$variant_option_translation->variant_option_name=$parent_variant_name;
						
						$variant_option_translation->language_id=$language_id;
						$variant_option_translation->variant_option_id=$variant_option->variant_option_id;
						$variant_option_translation->save();

						$variant_option_translation_id=$variant_option_translation->variant_option_translation_id;
						$variant_option->variant_option_translation_id=$variant_option_translation_id;
						$variant_option->save();

					}

				}

			}
		}

		if(!empty($child_variant_values)){
			for($i=0;$i<count($child_variant_values);$i++) {

				$child_variant_name=$child_variant_values[$i];

				if($child_variant_name!=""){

					$variant_option=VariantOptionTranslation::where('variant_option_translation_id','!=',1)->where('variant_option_name',$child_variant_name)->first();
					if ($variant_option=="") {
						$variant_option=new VariantOption();
						$variant_option->variant_id=$child_variant_id;
						
						$variant_option->variant_option_translation_id=1;
						$variant_option->save();

						$variant_option_translation=new VariantOptionTranslation();
						$variant_option_translation->variant_option_name=$child_variant_name;
						
						$variant_option_translation->language_id=$language_id;
						$variant_option_translation->variant_option_id=$variant_option->variant_option_id;
						$variant_option_translation->save();

						$variant_option_translation_id=$variant_option_translation->variant_option_translation_id;
						$variant_option->variant_option_translation_id=$variant_option_translation_id;
						$variant_option->save();

					}
					
					

				}

			}
		}

		$parent_variant_id=1;
		$child_variant_id=1;
		if(!empty($parent_variant_values)){

			for($i=0;$i<count($parent_variant_values);$i++) {
				$parent_variant_id=1;
				$child_variant_id=1;
				$variant_quantity="";
				$variant_weight="";
				if (isset($parent_variant_values[$i])) {
					$parent_variant_name=$parent_variant_values[$i];
				}
				if (isset($child_variant_values[$i])) {
					$child_variant_name=$child_variant_values[$i];
				}
				if (isset($variant_my_prices[$i])) {
					$variant_my_price=$variant_my_prices[$i];
				}
				if (isset($variant_market_prices[$i])) {
					$variant_market_price=$variant_market_prices[$i];
				}
				if (isset($variant_weights[$i])) {
					$variant_weight=$variant_weights[$i];
				}
				if (isset($variant_weight_units[$i])) {
					$variant_weight_unit=$variant_weight_units[$i];
				}
				if (isset($variant_quantities[$i])) {
					$variant_quantity=$variant_quantities[$i];
				}
				if (isset($variant_skues[$i])) {
					$variant_sku=$variant_skues[$i];
				}
				if (isset($variant_barcodes[$i])) {
					$variant_barcode=$variant_barcodes[$i];
				}

				if($variant_quantity==""){
					$variant_quantity=0;
				}

				if($variant_weight==""){
					$variant_weight=0;
				}
				if($parent_variant_name!=""){
					$parent_variant=VariantOptionTranslation::where('variant_option_name',$parent_variant_name)->first();
					$parent_variant_id=$parent_variant->variant_option_id;
				}else{
					$parent_variant_id=1;
				}

				if($child_variant_name!=""){
					$child_variant=VariantOptionTranslation::where('variant_option_name',$child_variant_name)->first();
					
					$child_variant_id=$child_variant->variant_option_id;
				}else{
					$child_variant_id=1;
				}

				$sku=Sku::where('parent_variant_id',$parent_variant_id)->where('child_variant_id',$child_variant_id)->where('product_id',$product_id)->first();
				if ($sku) {
					

					if (isset($variant_my_prices[$i])) {
						$sku->my_price=$variant_my_prices[$i];
					}
					if (isset($variant_market_prices[$i])) {
						$sku->market_price=$variant_market_prices[$i];
					}
					
					if (isset($variant_skues[$i])) {
						$sku->sku_name=$variant_skues[$i];
					}
					if (isset($variant_barcodes[$i])) {
						$sku->barcode=$variant_barcodes[$i];
					}
					if($product->track_inventory==1){
						if (isset($variant_quantities[$i])) {
							$sku->quantity=$variant_quantities[$i];
						}

					}
					if($product->is_product_shipping==1){
						if (isset($variant_weights[$i])) {
							$sku->product_weight=$variant_weights[$i];
						}
						if (isset($variant_weight_units[$i])) {
							$sku->weight_unit=$variant_weight_units[$i];
						}
					}
					$sku->save();
				}else{
					$sku=new Sku();
					$sku->product_id=$product_id;
					
					$sku->parent_variant_id=$parent_variant_id;
					$sku->child_variant_id=$child_variant_id;
					
					if (isset($variant_my_prices[$i])) {
						$sku->my_price=$variant_my_prices[$i];
					}
					if (isset($variant_market_prices[$i])) {
						$sku->market_price=$variant_market_prices[$i];
					}
					
					if (isset($variant_skues[$i])) {
						$sku->sku_name=$variant_skues[$i];
					}
					if (isset($variant_barcodes[$i])) {
						$sku->barcode=$variant_barcodes[$i];
					}
					if($product->track_inventory==1){
						if (isset($variant_quantities[$i])) {
							$sku->quantity=$variant_quantities[$i];
						}

					}
					if($product->is_product_shipping==1){
						if (isset($variant_weights[$i])) {
							$sku->product_weight=$variant_weights[$i];
						}
						if (isset($variant_weight_units[$i])) {
							$sku->weight_unit=$variant_weight_units[$i];
						}
					}
					$sku->save();
				}
			}

		}



//===================
		
		if(!empty($vendor_ids)&&!empty($sage_id)){

		foreach ($vendor_ids as $vendor_id){
			$product_vendor = ProductVendor::where('vendor_id',$vendor_id)->where('product_id',$product_id)->first();
			if($product_vendor!=""){
				$product_vendor_id=$product_vendor->id;
				$product_vendor_edit = ProductVendor::find($product_vendor_id);
				$product_vendor_edit->sage_id=$sage_id;
				$product_vendor_edit->save();
			}else{
				$product_vendor = new ProductVendor;
				$product_vendor->product_id=$product_id;
				$product_vendor->vendor_id=$vendor_id;
				$product_vendor->sage_id=$sage_id;
				$product_vendor->save();
			}
			
		}
	}

//===================

	// Option Start
	// $option_name = $request->option_name;
	// 	$show_as = $request->show_as;
	// 	$show_blank = $request->show_blank;
	// 	$remarks = $request->remarks;
	// 	$option_count_from = $request->option_count_from;
	// 	$option_setup_fee = $request->option_setup_fee;
	// 	$option_additional_fee = $request->option_additional_fee;
	// echo gettype($option_name);die;
	// if($option_name!="[]"){
	// 	echo "not empty";die;
	// }else{
	// 	echo "empty";die;
	// }

// echo gettype($option_name);die;
$product_vendors_ids = ProductVendor::where('product_id',$product_id)->pluck('vendor_id');


 if(!empty($option_name)){
        
        for($i=0;$i<count($option_name);$i++){
         
         if($option_name[$i]!=""){
                
               $i_value=$i;

               $product_id=$product_id;

				$product_option = new ProductOption;

				$product_option->product_id=$product_id;
				if($option_name!="[]"){
					$product_option->name = $option_name[$i];
				}

				if($show_as!="[]"&&$show_as!=""){
					$product_option->show_as=$show_as[$i_value];
				}	

				if($show_blank!="[]"&&$show_blank!=""){
					$product_option->required=$show_blank[$i_value];
				}
				$product_option->position=1;
				$product_option->save();

                
                if(!empty($sub_option_name)){
                if($sub_option_name!=""&&$sub_option_name!="[]"){
                for($j=0;$j<count($sub_option_name);$j++){

                  $j_value=$j;

                 $name=$sub_option_name[$i_value][$j_value];


                $option_count_from_value=$option_count_from[$i_value][$j_value];
				$option_setup_fee_value = $option_setup_fee[$i_value][$j_value];
				$option_additional_fee_value = $option_additional_fee[$i_value][$j_value];

                  
                  $product_sub_options = new ProductSubOption;

                  $product_sub_options->product_option_id=$product_option->id; 
               
                  $product_sub_options->position=$product_option->position;  

                  $product_sub_options->name=$name; 

                  $product_sub_options->save(); 

                

                if(!empty($option_count_from)){ 
                if($option_count_from!=""&&$option_count_from!="[]"){

                for($k=0;$k<count($option_count_from[$i_value][$j_value]);$k++){
                 
                 $k_value=$k;

				$product_sub_option_prices = new ProductSubOptionPrices;

		        $product_sub_option_prices->product_sub_option_id =$product_sub_options->id;
		          
				if($option_count_from_value[$k_value]!=""){
					$product_sub_option_prices->quantity=$option_count_from_value[$k_value];
				}

				if($option_setup_fee_value[$k_value]!=""){
				 $product_sub_option_prices->setup_price=$option_setup_fee_value[$k_value];

				}

				if($option_additional_fee_value[$k_value]!=""){
					$product_sub_option_prices->item_price=$option_additional_fee_value[$k_value];

				}

				$product_sub_option_prices->save();

                }
               }
              }
             }
            } 
           }
          }
         }
        }


	// echo $product_vendors_ids;die;
/*		if($option_name!="[]"&&$option_name!=""){

			$option_name_count = count($option_name);
			for($i=0;$i<$option_name_count;$i++){
				if($option_name[$i]!=""){

				$i_value=$i;
				$option_count_from_value = $option_count_from[$i_value];
				$option_setup_fee_value = $option_setup_fee[$i_value];
				$option_additional_fee_value = $option_additional_fee[$i_value];

				$product_option = new ProductOption;
				$product_option->product_id = $product_id;
					$product_option->name = $option_name[$i];
				if($show_as!="[]"&&$show_as!=""){
					if($show_as[$i]==0){
						$product_option->show_as = "drop_down";
					}elseif ($show_as[$i]==1) {
						$product_option->show_as = "radio";
					}elseif ($show_as[$i]==2) {
						$product_option->show_as = "checkbox";
					}
					
				}
				if($show_blank!="[]"&&$show_blank!=""){
					$product_option->required = $show_blank[$i];
				}
				$product_option->position = 1;
				$product_option->save();


				// if($option_count_from_value!=""&&$option_count_from_value!="[]"){
				for($j=0;$j<count($option_count_from_value);$j++){

						if($product_vendors_ids!="[]"){
							
							foreach ($product_vendors_ids as $vendor_id) {
								$product_option_prices = new ProductOptionPrice;
								$product_option_prices->product_option_id = $product_option->id;
								if($option_count_from_value[$j]!=""){
									$product_option_prices->quantity=$option_count_from_value[$j];
								}
								if($option_setup_fee_value[$j]!=""){
									$product_option_prices->setup_price=$option_setup_fee_value[$j];
								}
								if($option_additional_fee_value[$j]!=""){
									$product_option_prices->item_price=$option_additional_fee_value[$j];
								}
								if($vendor_id!=""){
									$product_option_prices->vendor_id=$vendor_id;
								}
								$product_option_prices->save();
							}
						}else{
							
								$product_option_prices = new ProductOptionPrice;
								$product_option_prices->product_option_id = $product_option->id;
								if($option_count_from_value[$j]!=""){
									$product_option_prices->quantity=$option_count_from_value[$j];
								}
								if($option_setup_fee_value[$j]!=""){
									$product_option_prices->setup_price=$option_setup_fee_value[$j];
								}
								if($option_additional_fee_value[$j]!=""){
									$product_option_prices->item_price=$option_additional_fee_value[$j];
								}
								$product_option_prices->save();


						}
				  }
				

			    }

			  }
		  }
*/                  

       /*$apparel_ids= $request->apparel_id;*/
        if(!empty($apparel_ids)){
		foreach ($apparel_ids as $apparel_id) {
			$product_apparel = new ProductApparel;
			$product_apparel->product_id=$product_id;
			$product_apparel->apparel_id=$apparel_id;
			$product_apparel->save();
		}
	}



	     // Option End

		// Product Colors
if($item_color_group_id!=""&&$item_color_group_name!=""){


	$product_color_group=ProductColorGroup::where('product_id',$product_id)->first();
      
     /*echo  $product_color_group;die;*/
  

		if($product_color_group==""){
			$product_color_group = new ProductColorGroup;
			$product_color_group->product_id = $product_id;
			$product_color_group->name = $item_color_group_name;
			$product_color_group->save();
		}else{
            
            

			$product_color_group_id=$product_color_group->id;
			$product_color_group = ProductColorGroup::find($product_color_group_id);
			$product_color_group->name = $item_color_group_name;
			$product_color_group->save();
		}


		$product_color_group_id=$product_color_group->id;
		
		/*$color_group_ids=ColorColorGroup::where('group_id',$item_color_group_id)->pluck('color_id');*/
           
           $color_group_ids=$item_color_group_id;
 
		for ($color=0; $color < count($color_group_ids); $color++) { 

			$product_color = ProductColor::where('product_color_group_id',$product_color_group_id)->where('color_id',$color_group_ids[$color])->first();

			if($product_color==""){
				$product_color = new ProductColor;
				$product_color->product_color_group_id=$product_color_group_id;
				$product_color->color_id=$color_group_ids[$color];
				$product_color->save();
			}

		}


	}

		if($this->checkPermission(Config::get('permissions.PRODUCT_ALL'))){
			return redirect("admin/product/all");
		}else{
			return redirect("admin/product/my");
		}
	}




	public function postImprintDelete(Request $request){

		$imprint_id = $request->imprint_id;
		$imprint = Imprint::find($imprint_id);
		if($imprint!=""){
			$imprint_id = $imprint->id;
			$imprint->delete();
			$data = array('imprint_id'=>$imprint_id,'message'=>'true');
			return $data;
		}else{
			$imprint_id="";
			$data = array('imprint_id'=>$imprint_id,'message'=>'false');
			return $data;
		}
	}


	public function postProductOptionDelete(Request $request){
		$product_option_id = $request->product_option_id;

		$product_option = ProductOption::find($product_option_id);
		if($product_option!=""){
			$product_option_id=$product_option->id;
			$product_option->delete();
			$data = array('product_option_id'=>$product_option_id,'message'=>'true');
			return $data;
		}else{
			$product_option_id="";
			$data = array('product_option_id'=>$product_option_id,'message'=>'false');
			return $data;
		}
	}


	public function postProductOptionEditData(Request $request){
		// dd($request->all());
		$product_id =$request->product_id;
		$product_option_id =$request->product_option_id;
		$option_name = $request->option_name;
		$show_as_value = $request->show_as;
		$show_blank = $request->show_blank;

		if($show_as_value==0){
			$show_as = 'drop_down';
		}elseif($show_as_value==1) {
			$show_as = 'radio';
		}elseif($show_as_value==2){
			$show_as = 'checkbox';
		}
		$product_option = ProductOption::find($product_option_id);
		if($option_name!=""){
			$product_option->name = $option_name;
		}else{
			$product_option->name = "";
		}
		
		$product_option->show_as = $show_as;
		if($show_blank!=""){
			$product_option->required = $show_blank;
		}
		$product_option->save();
		return $product_option;
	}

	public function postProductOptionPriceEditData(Request $request){
		
		$product_option_price_id = $request->product_option_price_id;
		$count_from = $request->count_from;
		$setup_fee = $request->setup_fee;
		$additional_fee = $request->additional_fee;

		$product_option_price = ProductOptionPrice::find($product_option_price_id);
		if($count_from!=""){
			$product_option_price->quantity = $count_from;
		}
		if($setup_fee!=""){
			$product_option_price->setup_price = $setup_fee;
		}
		if($additional_fee!=""){
			$product_option_price->item_price = $additional_fee;
		}
		
		$product_option_price->save();

		return $product_option_price;
	}

	public function postProductOptionPriceDelete(Request $request){
		
		$product_option_price_id = $request->product_option_price_id;
		$product_option_price = ProductOptionPrice::find($product_option_price_id);
		if($product_option_price!=""){
			$product_option_price_id = $product_option_price->id;
			$product_option_price->delete();
			$data = array('product_option_price_id'=>$product_option_price_id,'message'=>'true');
			return $data;
		}else{
			$product_option_price_id = $product_option_price->id;
			$data = array('product_option_price_id'=>$product_option_price_id,'message'=>'false');
			return $data;
		}

	}



	public function postProductPriceDelete(Request $request){
		$product_price_id = $request->product_price_id;
		$product_price = ProductPrice::find($product_price_id);

		if($product_price!=""){
			$product_price->delete();
		}
		return redirect()->back();

	}



	public function getInventory(){
		
		if(!$this->checkPermission(Config::get('permissions.INVENTORY_ALL'))){
			return view('user.unauthorized');
		}
		return view('product.inventory');
	}



	public function postInventoryAdd(Request $request){
		
		if(!$this->checkPermission(Config::get('permissions.INVENTORY_UPDATE'))){
			return view('user.unauthorized');
		}
		$language_id=$this->getLanguageId();
		
		$post=$request->all();
		$quantity=$post['quantity'];
		$sku_id=$post['sku_id'];
		$sku=Sku::with('product')->find($sku_id);

		$quantity_updated_successfully=Toast::where('language_id',$language_id)->first()->quantity_updated_successfully;

		if(($sku->quantity+$quantity)<0){

			if($sku->product->allow_customer_stock_out==1){
				$sku->quantity=$sku->quantity+$quantity;
				$sku->save();
				$this->data['msg']=$quantity_updated_successfully;
				$this->data['status']="true";
				$this->data['sku']=$sku;
				$this->response['data']=$this->data;
				return $this->response;
			}else{

				$pre_limited_product=Toast::where('language_id',$language_id)->first()->pre_limited_product;
				$products_available=Toast::where('language_id',$language_id)->first()->products_available;
				$this->data['status']="false";
				$this->data['msg']=$pre_limited_product." ".$sku->quantity." ".$products_available;	
				$this->response['data']=$this->data;
				return $this->response;
			}
		}else{

			$sku->quantity=$sku->quantity+$quantity;
			$sku->save();

			$this->data['status']="true";
			$this->data['msg']=$quantity_updated_successfully;
			$this->data['sku']=$sku;
			$this->response['data']=$this->data;
			return $this->response;
		}
	}

	public function postInventorySet(Request $request){
		
		if(!$this->checkPermission(Config::get('permissions.INVENTORY_UPDATE'))){
			return view('user.unauthorized');
		}
		$language_id=$this->getLanguageId();
		
		$post=$request->all();
		$quantity=$post['quantity'];

		$sku_id=$post['sku_id'];
		$sku=Sku::with('product')->find($sku_id);

		$quantity_updated_successfully=Toast::where('language_id',$language_id)->first()->quantity_updated_successfully;

		if($quantity<0){
			if($sku->product->allow_customer_stock_out==1){
				$sku->quantity=$quantity;
				$sku->save();
				$this->data['status']="true";
				$this->data['msg']=$quantity_updated_successfully;
				$this->data['sku']=$sku;
				$this->response['data']=$this->data;
				return $this->response;
			}else{
				$quantity_more_than_zero="Quantity should be greater than zero";
				$this->data['msg']=$quantity_more_than_zero;
				$this->data['status']="false";
				$this->response['data']=$this->data;
				return $this->response;
			}

		}else{
			$sku->quantity=$quantity;
			$sku->save();
			$this->data['status']="true";
			$this->data['msg']=$quantity_updated_successfully;
			$this->data['sku']=$sku;
			$this->response['data']=$this->data;
			return $this->response;
		}

	}

	public function getAllReviews(Request $request){

		return view('product.allReviews');
	}

	public function getAllReviewsData(Request $request){
		
		$product_review=ProductReview::with('product')->with('product_translation')->whereHas('product',function($query){

			$query->with('product_translation');

		})->get();

		return DataTables::of($product_review)->make(true);
	}

	public function getDeleteReviews(Request $request){

		$id=$request->id;

		$product_review=ProductReview::find($id);

		$product_review_images=ReviewImage::where('review_id',$id)->get();

		foreach ($product_review_images as $product_review_image) {
			$product_review_image->delete();
		}

		$product_review->delete();
		flash('Review Deleted Successfully');
		return redirect('admin/review/all');
	}

	public function getProductStatusChange(Request $request){


		$post=$request->all();
		
		$product_id=$request->product_id;
		$product=Product::find($product_id);
		if($product!=""){
			if ($product->status_id==1) {
				$product->status_id=2;
			}else{

				$product->status_id=1;
			}

			$product->save();
			return $product;
		}else{
			return 0;
		}

	}


}