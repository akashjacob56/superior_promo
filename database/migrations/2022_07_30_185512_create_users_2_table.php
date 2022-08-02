<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users-2', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('status_id')->default(1)->index();
            $table->string('business_name')->nullable();
            $table->unsignedInteger('role_id')->nullable()->index();
            $table->integer('address_id')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->longText('address1')->nullable();
            $table->longText('address2')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->integer('zipcode');
            $table->string('day_telephone', 11)->nullable();
            $table->string('extension', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->integer('update_permissoin')->default(0);
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('optional_contact_number')->nullable();
            $table->string('adhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('food_license')->nullable();
            $table->string('gst_certificate')->nullable();
            $table->string('residential_certificate')->nullable();
            $table->date('DOB')->nullable();
            $table->string('password');
            $table->string('gst_number')->nullable();
            $table->double('wallet', 15, 2)->default(0);
            $table->integer('seller_id')->nullable();
            $table->integer('otp')->nullable();
            $table->dateTime('otp_time')->nullable();
            $table->integer('is_varified')->default(0);
            $table->string('reffered_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users-2');
    }
}
