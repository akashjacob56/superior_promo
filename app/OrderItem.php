<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model{
public $primaryKey='id';

 public function product(){
		return $this->belongsTo('App\Product','product_id','product_id')->with('product_translation')->with('product_color_group')->with('product_prices')->with('seller');
	}

	public function order(){
		return $this->belongsTo('App\Order','order_id','id')->with('user');
	}

	public function artproof(){
		return $this->hasOne('App\ArtProof','order_item_id','id');
	}

	public function artproofs(){
		return $this->hasMany('App\ArtProof','order_item_id','id');

	}

	public function stage(){
		return $this->belongsTo('App\Stage','stage_id','id');
	}

	// public function user(){
	// 	return $this->belongsTo('App\User','user_id','id');
	// }

	public function user_note(){
		return $this->belongsTo('App\UserNote','id','order_item_id');
	}

	public function cart_item(){
		return $this->belongsTo('App\CartItems','cart_item_id','id')->with('cartitemcolor')->with('cartitemimprint');
	}

	public function vendor(){
		return $this->belongsTo("App\User",'vendor_id','id');
	}

	public function order_item_stage(){
		return $this->hasMany('App\OrderItemStage','order_item_id','id')->with('stage')->with('user');
	}

	public function order_notes(){
		return $this->hasMany('App\OrderNote','order_item_id','id')->with('user');
	}

	public function track_user(){
		return $this->belongsTo('App\User','tracking_user_id','id');
	}

	public function reorder_show(){
		return $this->belongsTo('App\ReorderShow','id','order_item_id');
	}

	public function tracking_informations(){
		return $this->hasMany('App\TrackingInformation','order_item_id','id')->orderBy('id', 'desc');
	}

}

