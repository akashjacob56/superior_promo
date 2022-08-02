<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->increments('product_translation_id');
            $table->unsignedInteger('language_id')->index();
            $table->unsignedInteger('product_id')->index();
            $table->string('product_name', 256);
            $table->longText('description')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('additional_information')->nullable();
            $table->string('meta_title', 2048)->nullable();
            $table->string('meta_keywords', 2048)->nullable();
            $table->string('meta_description', 2048)->nullable();
            $table->string('delivery_message', 40)->nullable();
            $table->string('google_product_category')->nullable();
            $table->string('image_alt_text')->nullable();
            $table->string('gender')->nullable();
            $table->string('age_group')->nullable();
            $table->string('material')->nullable();
            $table->string('pattern')->nullable();
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
        Schema::dropIfExists('product_translations');
    }
}
