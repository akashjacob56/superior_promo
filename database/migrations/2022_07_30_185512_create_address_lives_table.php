<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_lives', static function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->string('first_name', 255);
            $table->string('middle_name', 255)->nullable();
            $table->string('last_name', 255);
            $table->string('title', 255)->nullable();
            $table->string('suffix', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->string('address_line_1', 255);
            $table->string('address_line_2', 255)->nullable();
            $table->string('city', 255);
            $table->string('state', 255)->nullable();
            $table->string('zip', 255);
            $table->string('country', 255);
            $table->string('province', 255)->nullable();
            $table->string('day_telephone', 255);
            $table->string('ext', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->boolean('is_po_box')->default(true);
            $table->string('type', 255);
            $table->boolean('is_default')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_lives');
    }
}
