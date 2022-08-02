<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReorderShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reorder_shows', function (Blueprint $table) {
            $table->increments('reorder_show_id');
            $table->unsignedInteger('order_item_id')->index();
            $table->unsignedInteger('order_id')->index();
            $table->string('reorder_exactly_same', 255);
            $table->string('quantity_change', 255);
            $table->string('item_color_change', 11);
            $table->string('imprint_color_change', 255);
            $table->string('artwork_change', 255);
            $table->string('order_delivered_by', 255);
            $table->string('shipping_address', 255);
            $table->string('billing_address', 255);
            $table->string('payment_same', 255);
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
        Schema::dropIfExists('reorder_shows');
    }
}
