<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_type_translations', function (Blueprint $table) {
            $table->increments('complaint_type_translation_id');
            $table->unsignedInteger('complaint_type_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('complaint_type_name');
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
        Schema::dropIfExists('complaint_type_translations');
    }
}
