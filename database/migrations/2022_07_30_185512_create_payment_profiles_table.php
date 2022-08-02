<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('company', 255)->nullable();
            $table->string('city', 255);
            $table->string('state', 255)->nullable();
            $table->string('zip', 255);
            $table->string('country', 255);
            $table->string('phone', 255);
            $table->string('phone_extension', 255)->nullable();
            $table->boolean('is_default')->default(false);
            $table->enum('card_type', ['visa', 'mastercard', 'discover', 'amex']);
            $table->tinyInteger('expiration_month');
            $table->integer('expiration_year');
            $table->string('card_number', 255);
            $table->string('card_holder', 255);
            $table->softDeletes();
            $table->string('address1', 255);
            $table->string('address2', 255)->nullable();
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
        Schema::dropIfExists('payment_profiles');
    }
}
