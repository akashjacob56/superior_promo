<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $primaryKey='role_id';

	public static $rules=[		
		'role'=>'required|unique:roles,role|max:20',
	];

	public static $editRules=[		
		'role'=>'required|max:20',
	];

}
