<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryStatusTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_status_translations', function (Blueprint $table) {
            $table->increments('delivery_status_translation_id');
            $table->unsignedInteger('delivery_status_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('delivery_status_name');
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
        Schema::dropIfExists('delivery_status_translations');
    }
}
