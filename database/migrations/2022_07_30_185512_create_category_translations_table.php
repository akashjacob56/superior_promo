<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_translations', function (Blueprint $table) {
            $table->increments('category_translation_id');
            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('category_name');
            $table->string('title', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title', 2048)->nullable();
            $table->string('meta_keywords', 2048)->nullable();
            $table->string('meta_description', 2048)->nullable();
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
        Schema::dropIfExists('category_translations');
    }
}
