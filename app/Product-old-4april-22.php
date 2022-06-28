<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
	
	public $primaryKey='product_id';

	// public static $rules=[
	// 	'product_name'=>'required|max:1024',
	// 	'product_url'=>'required|max:1024',
	// 	'product_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	// 	'meta_title'=>'max:2000',
	// 	'meta_keywords'=>'max:2000',
	// 	'meta_description'=>'max:2000',
	// 	'my_price'=>'required|numeric|min:0|max:9999999',
	// 	'market_price'=>'numeric|min:0|max:9999999',
	// 	'quantity'=>'numeric|min:0|max:9999999',
	// 	'product_weights'=>'numeric|min:0|max:9999',
	// 	'brand_name'=>'max:30',
	// 	'delivery_message'=>'max:40',
	// 	'parent_variant'=>'max:20',
	// 	'child_variant'=>'max:20'
	// ];

	public static $Editrules=[
		'product_name'=>'required|max:1024',
		
	];

	public static $translation=[
		'product_name'=>'required|max:1024',
		'delivery_message'=>'max:40',
		
	];

	
	public function product_category(){
		return $this->hasOne('App\CategoryProduct','product_id','product_id')->with('category');
	}

	public function product_section(){
		return $this->hasOne('App\SectionProduct','product_id','product_id')->with('section');
	}

	public function brand(){
		return $this->hasOne('App\Brand','brand_id','brand_id')->with('default_brand_translation');
	}

	public function brand_short(){
		return $this->hasOne('App\Brand','brand_id','brand_id')->with('default_brand_translation_short');
	}
	


	public function gst(){
		return $this->hasOne('App\Gst','gst_id','gst_id');
	}

	public function review(){
		return $this->hasOne('App\ProductReview','product_id','product_id');
	}
	public function return_policy(){
		return $this->hasOne('App\ReturnPolicy','return_policy_id','return_policy_id');
	}

	public function reviewCount(){
		return $this->review()
		->selectRaw('product_id, count(*) as rating_count, avg(rating) as rating')
		->groupBy('product_id');
	}

	public function seller(){
		return $this->belongsTo('App\User','seller_id','id');
	}		

	public function user(){
		return $this->hasOne('App\User','id','id')->with('seller_detail');	
	}

	public function default_product_translation_full(){
		return $this->belongsTo('App\ProductTranslation','product_translation_id','product_translation_id');
	}

	public function default_product_translation(){
		return $this->belongsTo('App\ProductTranslation','product_translation_id','product_translation_id')->selectRaw('product_translation_id,product_id,product_name,delivery_message');
	}


	public function product_translation(){
		return $this->hasOne('App\ProductTranslation','product_id','product_id')->selectRaw('product_translation_id,product_id,product_name,delivery_message');
	}
	
	public function product_translation_full(){
		return $this->hasOne('App\ProductTranslation','product_id','product_id');
	}

	

	public function default_product_translation_short(){
		return $this->default_product_translation()
		->selectRaw('product_translation_id,product_id,product_name');
		
	}

	public function wishlist(){
		return $this->hasOne('App\Wishlist','product_id','product_id');	
	}

	public function sku(){
		return $this->hasOne('App\Sku','product_id','product_id')->with('cart');
	}

	public function skuCount(){
		return $this->sku()
		->selectRaw('product_id, count(*) as sku_count')
		->groupBy('product_id');
	}

	public function parent_variant(){
		return $this->belongsTo('App\Variant','parent_variant_id','variant_id')->with('default_variant_translation');
	}

	public function child_variant(){
		return $this->belongsTo('App\Variant','child_variant_id','variant_id')->with('default_variant_translation');
	}

	public function skus(){
		return $this->belongsTo('App\Sku','product_id','product_id');
	}

	public function parent_variants(){
		return $this->hasMany('App\Variant','parent_variant_id','variant_id')->with('default_variant_translation');
	}

	public function product_images(){
		return $this->hasMany('App\ProductImage','product_id','product_id');
	}

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	public function recent_view_product(){
		return $this->hasOne('App\RecentViewProduct','product_id','product_id');
	}

	public function order_product(){
		return $this->hasOne('App\OrderProduct','product_id','product_id');
	}

	public function order_sku_sale(){
		return $this->hasOne('App\OrderProduct','product_id','product_id')->with('order');
	}

	public function order_product_sale(){
		return $this->order_product()
		->selectRaw('product_id, sum(total_amount) as sum_total_amount, sum(quantity) as total_quantity')
		->groupBy('product_id');
	}

	public function product_prices(){
		return $this->hasMany('App\ProductPrice','product_id','product_id');
	}

	//ap
	public function product_categories(){
		return $this->hasMany('App\CategoryProduct','product_id','product_id')->with('category');
	}
	public function product_vendors(){
		return $this->hasMany('App\ProductVendor','product_id','product_id');
	}

	// public function get_product_vendors(){
	// 	return $this->belongsTo('App\ProductVendor','product_id','product_id');
	// }

	public function product_color_group(){
		return $this->belongsTo('App\ProductColorGroup','product_id','product_id')->with('product_colors');
	}
}
