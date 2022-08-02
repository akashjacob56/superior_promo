<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_about_translations', function (Blueprint $table) {
            $table->increments('home_about_us_translation_id');
            $table->unsignedInteger('home_about_us_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->longText('about_us_description')->nullable();
            $table->string('first_image')->nullable();
            $table->string('second_image', 255)->nullable();
            $table->string('third_image', 255)->nullable();
            $table->string('fourth_image', 255)->nullable();
            $table->string('subscription_image', 255)->nullable();
            $table->string('about_video')->nullable();
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
        Schema::dropIfExists('home_about_translations');
    }
}
