<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLabel extends Model
{
    public $primaryKey='user_label_id';

	public static $translation=[

		'change_password'=>'required|max:100',  
		'update_profile'=>'required|max:100', 
		'my_addresses'=>'required|max:100',  
		'login'=>'required|max:100',  
		'sign_up_with'=>'required|max:100',  
		'or'=>'required|max:100',  
		'sign_in'=>'required|max:100',  
		'sign_up'=>'required|max:100',  
		'forgot_password'=>'required|max:100',  
		'register'=>'required|max:100',  
		'new_password'=>'required|max:100',  
		'confirm_password'=>'required|max:100',  
		'submit'=>'required|max:100',   
		'verification'=>'required|max:100', 
		'otp_verification'=>'required|max:100',
		'otp_msg'=>'required|max:100',
		'otp'=>'required|max:100',
		'resend_otp'=>'required|max:100',
		'retry'=>'required|max:100',
		'password_empty'=>'required|max:100',
		'pincode_empty'=>'required|max:100',
		'review_empty'=>'required|max:100',
		'contact_number_empty'=>'required|max:100',
		'please_enter_a_valid_number'=>'required|max:100',
		'email_empty'=>'required|max:100',
		'dob_empty'=>'required|max:100',
		'password_length_should_be_8_characters'=>'required|max:100',
		'address_empty'=>'required|max:100',
		'please_enter_GST_number'=>'required|max:100',
		'description_empty'=>'required|max:100',
		'name_empty'=>'required|max:100',
		'do_you_want_to_logout'=>'required|max:100',
		'continue_as_guest'=>'required|max:100',

	];

	public function language(){
		return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
	}
}
