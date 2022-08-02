<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_item_id')->index();
            $table->integer('color_group_id')->nullable()->index();
            $table->string('color_group_name', 255);
            $table->integer('color_id')->nullable()->index();
            $table->string('color_name', 255);
            $table->integer('product_color_group_id')->nullable()->index();
            $table->integer('product_color_id')->nullable()->index();
            $table->timestamps();

//            $table->unique(['cart_item_id', 'color_group_id', 'color_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_item_colors');
    }
}
