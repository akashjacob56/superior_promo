<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $primaryKey='permission_id';
	public static $rules=[		
		'permission_name'=>'required|unique:permissions,permission_name|max:30',
		'permission_description'=>'required|max:100',
	];

	public static $editRules=[		
		'permission_name'=>'required',
		'permission_description'=>'required|max:100',

	];

	public function role_permission(){
        return $this->hasMany('App\RolePermission','permission_id','permission_id')->with('role');
    }
}
