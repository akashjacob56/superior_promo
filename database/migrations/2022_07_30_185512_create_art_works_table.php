<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_works', static function (Blueprint $table) {
            $table->increments('art_work_id');

            $table->string('art_digital_revision_proofs_tittle', 255);
            $table->string('art_digital_revision_proofs_image', 255);
            $table->longText('art_digital_revision_proofs_description')->nullable();
            $table->string('preffered_file_types_title', 255);
            $table->string('preffered_file_types_image', 255);
            $table->longText('preffered_file_types_description')->nullable();
            $table->string('redraws_modification_file_types_title', 255);
            $table->string('redraws_modification_file_types_image', 255);
            $table->longText('redraws_modification_file_types_description')->nullable();
            $table->string('font_title', 255);
            $table->string('font_image', 255);
            $table->longText('font_description');
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
        Schema::dropIfExists('art_works');
    }
}
