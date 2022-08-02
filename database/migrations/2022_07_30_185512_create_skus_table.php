<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->unsignedInteger('sku_id');
            $table->unsignedInteger('product_id');
            $table->integer('parent_variant_id');
            $table->integer('child_variant_id');
            $table->double('my_price', 15, 2)->nullable();
            $table->double('market_price', 15, 2)->nullable();
            $table->double('product_weight', 15, 2)->default(0);
            $table->integer('weight_unit')->default(0);
            $table->double('quantity', 15, 2)->default(0);
            $table->string('sku_name')->nullable();
            $table->string('barcode')->nullable();
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
        Schema::dropIfExists('skus');
    }
}
