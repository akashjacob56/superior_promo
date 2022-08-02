<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', static function (Blueprint $table) {
            $table->increments('address_id');

            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('city_id')->nullable()->index();
            $table->unsignedInteger('state_id')->nullable()->index();
            $table->unsignedInteger('country_id')->nullable()->index();

            $table->string('name', 255)->nullable();
            $table->string('middle_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('suffix', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('address2', 255)->nullable();
            $table->string('zip_code', 255)->nullable();
            $table->string('province', 255)->nullable();
            $table->string('telephone', 255)->nullable();
            $table->string('ext', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->boolean('is_po_box')->default(true);
            $table->string('type', 255)->nullable();
            $table->boolean('is_default_add')->default(false);
            $table->integer('is_shipping')->default(0);
            $table->integer('is_billing')->default(0);
            $table->integer('used_billing')->nullable()->default(0);
            $table->string('email', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->unsignedInteger('pincode_id')->nullable();
            $table->unsignedInteger('area_id')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
