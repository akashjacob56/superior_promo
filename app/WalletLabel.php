<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletLabel extends Model
{
	public $primaryKey='wallet_label_id';

	

	public static $translation=[
		
		'transfer' => 'required',
		'to' => 'required',
		'send' => 'required',
		'sent' => 'required',
		'successfully' => 'required',
		'you_have_successfully_paid' => 'required',
		'transaction_id' => 'required',
		'wallet_transfer' => 'required',
		'wallet_transfer_confirmation' => 'required',
		'wallet_transfer_sucessful' => 'required',
		'transaction_list_empty' => 'required',
		'wallet_amount' => 'required',
		'have_a_promocode_Enter_here' => 'required',
		'please_enter_amount' => 'required',
		'enter_amount' => 'required',
		'narration' => 'required',
		'mobile_number' => 'required',
		'add' => 'required',
		'contact_number_empty' => 'required',
		'please_enter_a_valid_number' => 'required',
		'transfer_money' => 'required',
		'amount' => 'required',
		'confirm' => 'required',

		'total_balance'=>'required|max:100',
		'add_money'=>'required|max:100',
		'transaction_history'=>'required|max:100',
		'description_optional'=>'required|max:100',
		'proceed'=>'required|max:100',
		'confirm_payment'=>'required|max:100',
		'proceed_to_pay'=>'required|max:100',
		'wallet'=>'required|max:100',
		'continue_to_pay'=>'required|max:100',
		'cancel_payment'=>'required|max:100',
		'pay_using'=>'required|max:100',
		'pay_using_wallet'=>'required|max:100',
		'order_amount'=>'required|max:100',
		'pay_without_wallet'=>'required|max:100',
		'place_order_with_wallet'=>'required|max:100',
	];


	public function language(){
    return $this->belongsTo('App\Language','language_id','language_id')->with('default_language_translation');
}
}
