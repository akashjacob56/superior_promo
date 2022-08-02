<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tracking_shipping_date')->nullable();
            $table->string('tracking_number', 255)->nullable();
            $table->string('tracking_shipping_company', 255)->nullable();
            $table->text('tracking_note')->nullable();
            $table->text('tracking_url')->nullable();
            $table->integer('tracking_user_id')->nullable()->index();
            $table->integer('order_item_id')->nullable()->index();
            $table->boolean('tracking_notify_customer')->default(false);
            $table->boolean('tracking_request_rating')->default(false);
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
        Schema::dropIfExists('tracking_informations');
    }
}
