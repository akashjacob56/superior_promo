<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
	public $primaryKey='comment_id';
	
	public function user(){
		return $this->hasOne('App\User','id','user_id');
	}
	public function type(){
		return $this->hasOne('App\ComplaintType','id','complaint_type_id');
	}
}
