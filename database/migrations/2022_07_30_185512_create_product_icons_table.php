<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductIconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_icons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text', 255)->nullable();
            $table->string('icon_pic_src', 255)->nullable();
            $table->integer('icon_pic_width')->nullable();
            $table->integer('icon_pic_height')->nullable();
            $table->integer('position')->nullable();
            $table->integer('old_id')->nullable();
            $table->string('name', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_icons');
    }
}
