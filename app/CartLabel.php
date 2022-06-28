<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartLabel extends Model
{
  public $primaryKey='cart_label_id';

  public static $AddRule=[

    'language_id'=> 'required|unique:cart_labels,language_id',
    'qty'=>'required|max:100',  
    'remove_lower'=>'required|max:100',  
    'remove_item'=>'required|max:100',  
    'do_you_really_want_remove_this_product'=>'required|max:100',    
    'remove_upper'=>'required|max:100',  
    'price_details'=>'required|max:100',  
    'price'=>'required|max:100',  
    'items'=>'required|max:100',  
    'delivery'=>'required|max:100',  
    'free'=>'required|max:100',  
    'total_amount'=>'required|max:100',  
    'you_will_save'=>'required|max:100',  
    'on_this_order'=>'required|max:100', 
    'cart_secure_msg'=>'required|max:100',  
    'view_price_details'=>'required|max:100',  
    'continue'=>'required|max:100',  
    'out_of_stock'=>'required|max:100',  
    'is_available'=>'required|max:100',   
    'only'=>'required|max:100|max:100',
    'do_you_have_promocode'=>'required|max:100',
    'any_special_comment_for_this_order'=>'required|max:100',
    'select'=>'required|max:100',
    'update'=>'required|max:100',
    'order_description'=>'required|max:100',
    'view_cart'=>'required|max:100',
    'update_cart'=>'required|max:100',
    'empty_cart_title'=>'required|max:100',
    'empty_cart_description'=>'required|max:100',
    'please_enter_quantity'=>'required|max:100',

];

public static $translation=[

    'qty'=>'required|max:100',  
    'remove_lower'=>'required|max:100',  
    'remove_item'=>'required|max:100',  
    'do_you_really_want_remove_this_product'=>'required|max:100',    
    'remove_upper'=>'required|max:100',  
    'price_details'=>'required|max:100',  
    'price'=>'required|max:100',  
    'items'=>'required|max:100',  
    'delivery'=>'required|max:100',  
    'free'=>'required|max:100',  
    'total_amount'=>'required|max:100',  
    'you_will_save'=>'required|max:100',  
    'on_this_order'=>'required|max:100', 
    'cart_secure_msg'=>'required|max:100',  
    'view_price_details'=>'required|max:100',  
    'continue'=>'required|max:100',  
    'out_of_stock'=>'required|max:100',  
    'is_available'=>'required|max:100',   
    'only'=>'required|max:100', 
    'do_you_have_promocode'=>'required|max:100',
    'any_special_comment_for_this_order'=>'required|max:100',
    'select'=>'required|max:100',
    'update'=>'required|max:100',
    'order_description'=>'required|max:100',
    'view_cart'=>'required|max:100',
    'update_cart'=>'required|max:100',
    'empty_cart_title'=>'required|max:100',
    'empty_cart_description'=>'required|max:100',
    'please_enter_quantity'=>'required|max:100',
];

public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
}
