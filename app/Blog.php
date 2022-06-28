<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $primaryKey='blog_id';

    public static $addRule=[
   
	'blog_title'=>'required|min:1|max:100',	
	'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',	
	];

	public static $editRule=[
   
	'blog_title'=>'required|min:1|max:100',
		
	];

    public function blog_type(){
		return $this->belongsTo('App\BlogType','blog_type_id','blog_type_id');
	}
}
