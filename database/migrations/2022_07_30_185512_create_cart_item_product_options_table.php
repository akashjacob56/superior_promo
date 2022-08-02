<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item_product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_item_id')->index();
            $table->integer('product_option_id')->nullable()->index();
            $table->string('name', 255);
            $table->decimal('setup_price')->default(0);
            $table->decimal('item_price')->default(0);
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
        Schema::dropIfExists('cart_item_product_options');
    }
}
