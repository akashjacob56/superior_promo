<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModifierCategory extends Model
{
    public $primaryKey='modifier_category_id';

    public function modifiers(){
    	return $this->hasMany('App\Modifier','modifier_category_id','modifier_category_id');
    }
}
