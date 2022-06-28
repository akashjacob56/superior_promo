<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
	public $primaryKey='product_label_id';

	public static $translation=[

		'latest_products'=>'required|max:100',  
		'recently_viewed_products'=>'required|max:100', 
		'sort'=>'required|max:100',  
		'sort_by'=>'required|max:100',  
		'newest_first'=>'required|max:100',  
		'ascending_order'=>'required|max:100',  
		'low_to_high'=>'required|max:100',  
		'high_to_low'=>'required|max:100',  
		'filter'=>'required|max:100',  
		'min'=>'required|max:100',  
		'max'=>'required|max:100', 
		'search_by_brand_name'=>'required|max:100',  
		'select_brands'=>'required|max:100',  
		'none_selected'=>'required|max:100',  
		'selected'=>'required|max:100',  
		'apply'=>'required|max:100',   
		'add'=>'required|max:100', 
		'off'=>'required|max:100',
		'add_more'=>'required|max:100',
		'enter_quantity'=>'required|max:100',
		'quantity'=>'required|max:100',
		'reviews_and_ratings'=>'required|max:100',
		'similar'=>'required|max:100',
		'highlights'=>'required|max:100',
		'ratings_and_reviews'=>'required|max:100',
		'your_rating'=>'required|max:100',
		'rate_and_write_a_review'=>'required|max:100',
		'enter_your_review'=>'required|max:100',
		'add_review'=>'required|max:100',
		'view_all_reviews'=>'required|max:100',
		'all_reviews'=>'required|max:100',
		'out_of_stock'=>'required|max:100',
		'search'=>'required|max:100',
		'products'=>'required|max:100',
		'similar_products_of'=>'required|max:100',
		'available_variations_for'=>'required|max:100',
		'empty_category_product_title'=>'required|max:100',
		'empty_category_product_description'=>'required|max:100',
		'no_more_products_available'=>'required|max:100',
		'max_viewed_products'=>'required|max:100',
		'shop_by_category'=>'required|max:100',
		'all_categories'=>'required|max:100',
		'buy_now'=>'required|max:100',
		'search_empty_title'=>'required|max:100',
		'search_empty_description'=>'required|max:100',
		'max_viewed'=>'required|max:100',
		'featured_brands'=>'required|max:100',
		'write_a_review'=>'required|max:100',

	];

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}
}
