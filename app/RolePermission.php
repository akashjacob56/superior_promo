<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
	public $primaryKey='role_permission_id';


    public function permission(){
		return $this->hasOne('App\Permission','permission_id','permission_id');
	}
    
    public function role(){
		return $this->belongsTo('App\Role','role_id','role_id');
	}
    
}
