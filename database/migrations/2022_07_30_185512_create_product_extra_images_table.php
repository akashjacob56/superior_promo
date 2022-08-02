<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductExtraImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_extra_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->index();
            $table->string('image_src', 255)->nullable();
            $table->string('image_main', 255)->nullable();
            $table->string('image_thumb', 255)->nullable();
            $table->string('image_list', 255)->nullable();
            $table->string('image_cart', 255)->nullable();
            $table->string('image_color', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_extra_images');
    }
}
