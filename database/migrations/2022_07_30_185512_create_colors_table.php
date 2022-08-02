<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pms_color_id')->nullable()->index();
            $table->string('name', 255)->index();
            $table->string('color_hex', 255)->nullable()->index();
            $table->integer('status_id')->default(1);
            $table->string('picture_src', 255)->nullable();
            $table->integer('picture_width')->nullable();
            $table->integer('picture_height')->nullable();
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
        Schema::dropIfExists('colors');
    }
}
