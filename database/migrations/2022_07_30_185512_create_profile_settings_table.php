<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->increments('profile_setting_id');
            $table->integer('is_adhar')->default(0);
            $table->integer('is_pan')->default(0);
            $table->integer('is_food_license')->default(0);
            $table->integer('is_gst_certificate')->default(0);
            $table->integer('is_residential_certificate')->default(0);
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
        Schema::dropIfExists('profile_settings');
    }
}
