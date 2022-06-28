<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OrderItemStage extends Model{
public $primaryKey='id';
protected $table = "order_item_stage";

public function stage(){
	return $this->belongsTo('App\Stage','stage_id','id');
}

public function user(){
	return $this->belongsTo('App\User','user_id','id');
}

}