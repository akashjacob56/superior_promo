<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_blocks', function (Blueprint $table) {
            $table->increments('offer_block_id');
            $table->unsignedInteger('status_id')->default(1)->index();
            $table->unsignedInteger('notification_class_id')->index();
            $table->integer('offer_block_translation_id')->default(1);
            $table->integer('section_id');
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
        Schema::dropIfExists('offer_blocks');
    }
}
