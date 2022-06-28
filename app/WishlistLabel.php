<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistLabel extends Model
{
    
     public $primaryKey='wishlist_label_id';


    public static $translation=[

    'wishlist'=>'required|max:100',  
    'clear_wishlist'=>'required|max:100',  
    'empty_wishlist_title'=>'required|max:100',  
    'empty_wishlist_description'=>'required|max:100',    
    'move_to_wishlist'=>'required|max:100',  
    
];

public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
}
