<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toasts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('toast_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('quantity_updated_successfully');
            $table->string('out_of_stock');
            $table->string('product_added_successfully');
            $table->string('wishlist_product_removed');
            $table->string('wishlist_product_not_available');
            $table->string('product_not_available');
            $table->string('product_not_found');
            $table->string('product_added_to_wishlist');
            $table->string('product_already_added_to_wishlist');
            $table->string('cart_item_not_available');
            $table->string('user_already_registered');
            $table->string('password_not_match');
            $table->string('user_not_match');
            $table->string('password_changed_successfully');
            $table->string('wrong_password');
            $table->string('user_not_exist');
            $table->string('pincode_not_available');
            $table->string('pincode_updated');
            $table->string('pre_limited_product');
            $table->string('products_available');
            $table->string('post_limited_product');
            $table->string('cart_item_added_successfully');
            $table->string('cart_item_deleted_successfully');
            $table->string('nothing_in_cart');
            $table->string('order_failed');
            $table->string('order_placed_sucessfully');
            $table->string('review_added_successfully');
            $table->string('review_updated_successfully');
            $table->string('profile_updated_successfully');
            $table->string('address_added_successfully');
            $table->string('product_has_removed');
            $table->string('complaint_added_successfully');
            $table->string('order_cancelled_successfully');
            $table->string('message_sent');
            $table->string('please_login_again');
            $table->string('transfered_from_bank_account');
            $table->string('amount_transfered_successfully');
            $table->string('transfered_wallet_amount_to');
            $table->string('transfered_to_another_wallet');
            $table->string('received_wallet_amount_from');
            $table->string('received_from_another_wallet');
            $table->string('image_delete_successfully');
            $table->string('wishlist_clear_successfully');
            $table->string('account_not_found_with_this_contact_number');
            $table->string('you_can_not_transfer_money_in_your_account');
            $table->string('wallet_amount_transferred_successfully');
            $table->string('email_sent');
            $table->string('already_exist');
            $table->string('username_does_not_exist');
            $table->string('item_added_successfully');
            $table->string('your_order_amount_must_be_more_than');
            $table->string('someone_already_registered_with_this_contact_number');
            $table->string('someone_already_registered_with_this_email_address');
            $table->string('sent_the_otp_on_above_email_contact_number');
            $table->string('inputed_email_contact_not_available_in_system');
            $table->string('correct_otp');
            $table->string('incorrect_otp');
            $table->string('you_just_rupee');
            $table->string('can_transfer');
            $table->string('order_returned_successfully');
            $table->string('order_returned_for_replacement_successfully');
            $table->string('do_you_have_refferal_code');
            $table->string('welcome_amount');
            $table->string('wallet_amount_added');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toasts');
    }
}
