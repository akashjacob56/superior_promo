<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_translations', static function (Blueprint $table) {
            $table->increments('about_us_translation_id');
            $table->unsignedInteger('about_us_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->longText('about_us_description')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_video', 255)->nullable();
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
        Schema::dropIfExists('about_us_translations');
    }
}
