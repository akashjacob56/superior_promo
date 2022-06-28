Y Sy
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerEnquiry extends Model
{


	public static $sellerEnquiryRule=[
	'name'=>'required|max:40|min:2|regex:/^[a-zA-Z ]{2,40}$/',
	'business_name'=>'required|max:100',
	'email'=>'required|email|unique:users,email|max:40|regex:/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/',
	'contact_number'=>'required|unique:users,contact_number|numeric|digits_between:10,15',
	'optional_contact_number'=>'nullable|numeric|digits_between:10,15',
	'address'=>'required|max:200',
	];
}
