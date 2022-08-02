<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('phone', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('country', 255);
            $table->integer('status_id')->default(1);
            $table->string('zip_code', 255);
            $table->string('address_1', 255);
            $table->string('address_2', 255)->nullable();
            $table->string('supplier_id', 255)->nullable();
            $table->string('site', 255)->nullable();
            $table->integer('payment_template')->default(3);
            $table->tinyInteger('active')->default(1);
            $table->integer('old_vendor_id')->nullable();
            $table->unsignedInteger('state_id')->nullable()->default(1)->index();
            $table->unsignedInteger('payment_information_template_id')->nullable()->index();
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
        Schema::dropIfExists('vendors');
    }
}
