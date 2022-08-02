<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->increments('product_price_id');
            $table->unsignedInteger('product_id')->index();
            $table->unsignedInteger('vendor_id')->nullable()->index();
            $table->integer('count_from')->nullable();
            $table->decimal('setup_price')->default(0);
            $table->decimal('per_item_price')->default(0);
            $table->decimal('per_item_sale_price')->default(0);
            $table->integer('is_sale')->default(0);
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
        Schema::dropIfExists('product_prices');
    }
}
