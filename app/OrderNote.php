<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
   	public $primaryKey = "order_note_id";
   	protected $table="order_notes";

   	public function user(){
   		return $this->belongsTo('App\User','user_id','id');
   	}
}
