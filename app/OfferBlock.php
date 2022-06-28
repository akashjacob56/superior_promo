<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferBlock extends Model
{
    public $primaryKey='offer_block_id';

    public static $rules=[
	'offer_block_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
	'notification_class_id'=>'required',
	'section_id'=>'required',
	];

	public static $edit=[
		
		// 'slider_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
	];

	public static $translation=[
       
        'language_id'=>'required|numeric',
        'offer_block_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
    ];

    public function default_offer_block_translation(){
		return $this->belongsTo('App\OfferBlockTranslation','offer_block_translation_id','offer_block_translation_id');
	}


	public function offer_block_translation(){
		return $this->hasOne('App\OfferBlockTranslation','offer_block_id','offer_block_id');

	}

	public function notification(){
		return $this->belongsTo('App\NotificationClass','notification_class_id','notification_class_id');
	}

	public function category(){
		return $this->hasOne('App\Category','category_id','section_id');
	}

	public function product(){
		return $this->hasOne('App\Product','product_id','section_id');
	}
	public function seller(){
		return $this->hasOne('App\SellerDetail','seller_detail_id','section_id');
	}
	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}
}
