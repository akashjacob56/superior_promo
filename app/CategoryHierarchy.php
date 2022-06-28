<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class CategoryHierarchy extends Model
{
	public $primaryKey="category_hierarchy_id";
	public function category(){
		return $this->hasOne('App\Category','category_id','child_category_id')->with('default_category_translation');
	}


	public function sub_child_categories(){
		return $this->hasMany('App\CategoryHierarchy','parent_category_id','child_category_id')->with('category');
	}


	public function categoery(){
		return $this->hasMany('App\CategoryHierarchy','parent_category_id','child_category_id')->with('category');
	}

	public function sub_sub_child_categories(){
		return $this->hasMany('App\CategoryHierarchy','parent_category_id','child_category_id')->with('category');
	}
    
}
