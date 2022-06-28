<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $primaryKey="theme_id";


	public static $themerules=[
	'theme_name'=>'required',
	'theme_path'=>'required|unique:themes,theme_path',
	
	];

	public static $businessEditrules=[
	'theme_name'=>'required',
	'theme_path'=>'required',
	
	];

}
