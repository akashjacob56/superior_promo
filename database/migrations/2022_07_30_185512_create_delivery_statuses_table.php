<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_statuses', function (Blueprint $table) {
            $table->increments('delivery_status_id');
            $table->integer('delivery_status_translation_id')->default(1);
            $table->string('delivery_status_color');
            $table->integer('is_email')->default(0);
            $table->integer('is_cancel')->default(0);
            $table->unsignedInteger('status_id')->default(1);
            $table->integer('state_translation_id')->default(1);
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
        Schema::dropIfExists('delivery_statuses');
    }
}
