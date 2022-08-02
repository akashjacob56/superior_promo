<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_samples', function (Blueprint $table) {
            $table->increments('product_sample_id');
            $table->string('product_sample_title', 255);
            $table->string('product_sample_image', 255);
            $table->longText('product_sample_description')->nullable();
            $table->string('order_sample_title', 255);
            $table->string('order_sample_image', 255);
            $table->longText('order_sample_description')->nullable();
            $table->string('policy_sample_title', 255);
            $table->string('policy_sample_image', 255);
            $table->longText('policy_sample_description')->nullable();
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
        Schema::dropIfExists('product_samples');
    }
}
