<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermConditionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_condition_translations', function (Blueprint $table) {
            $table->unsignedInteger('term_condition_translation_id');
            $table->unsignedInteger('term_condition_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->longText('term_condition_description');
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
        Schema::dropIfExists('term_condition_translations');
    }
}
