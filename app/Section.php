<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public $primaryKey='section_id';
	
	public static $rules=[
	'section_name'=>'required|min:3|max:25',
	'section_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	'section_url'=>'required|min:3',
	'section_position'=>'required',
	];

	public static $editRules=[
	'section_name'=>'required',
	'section_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	];


	public function default_section_translation(){
		return $this->belongsTo('App\SectionTranslation','section_translation_id','section_translation_id');
	}

	public function section_translation(){
		return $this->hasOne('App\SectionTranslation','section_id','section_id');
	}

	public function status(){
		return $this->belongsTo('App\Status','status_id','status_id');
	}

	public function section_products(){
		return $this->hasMany('App\SectionProduct','section_id','section_id')->with('section')->with('product');
	}
}
