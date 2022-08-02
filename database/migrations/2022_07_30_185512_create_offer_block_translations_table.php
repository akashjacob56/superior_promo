<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferBlockTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_block_translations', function (Blueprint $table) {
            $table->increments('offer_block_translation_id');
            $table->unsignedInteger('offer_block_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('offer_block_image');
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
        Schema::dropIfExists('offer_block_translations');
    }
}
