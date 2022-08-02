<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurGuaranteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_guarantee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->longText('descriprtion')->nullable();
            $table->string('image', 250)->nullable();
            $table->unsignedInteger('status_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_guarantee');
    }
}
