<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
	public $primaryKey='category_product_id';


	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('sku');
	}


	public function product_translation(){
		return $this->belongsTo('App\ProductTranslation','product_id','product_id');
	}


	public function category(){
		return $this->belongsTo('App\Category','category_id','category_id')->with('default_category_translation');
	}	


	public function category_link(){
		return $this->belongsTo('App\Category','category_id','category_id')->with('category_translation');
	}	

	public function parent_category(){
		return $this->belongsTo('App\CategoryHierarchy','category_id','parent_category_id');
	}

}	
