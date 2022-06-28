<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ArtProof extends Model{
	public $primaryKey='id';

	public function orderitem(){
		return $this->belongsTo('App\OrderItem','order_item_id','id')->with('product')->with('order_item_stage');
	}

	public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}

}

