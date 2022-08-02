<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnPolicyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_policy_translations', function (Blueprint $table) {
            $table->increments('return_policy_translation_id');
            $table->unsignedInteger('return_policy_id')->index();
            $table->unsignedInteger('language_id')->index();
            $table->string('return_policy_title');
            $table->longText('return_policy_description');
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
        Schema::dropIfExists('return_policy_translations');
    }
}
