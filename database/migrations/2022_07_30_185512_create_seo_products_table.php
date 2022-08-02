<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_products', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->integer('product_id');
            $table->string('name', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_products');
    }
}
