<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSampleItemColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_sample_item_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_sample_item_id')->nullable()->index();
            $table->integer('color_group_id')->nullable()->index();
            $table->integer('color_id')->nullable()->index();
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
        Schema::dropIfExists('order_sample_item_colors');
    }
}
