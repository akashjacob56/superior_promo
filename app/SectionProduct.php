<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionProduct extends Model
{
   public $primaryKey='section_product_id';


	public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('sku')->with('brand')->with('reviewCount')->with('default_product_translation')->with('product_translation');
	}

	public function section(){
		return $this->belongsTo('App\Section','section_id','section_id')->with('default_section_translation');
	}	
}
