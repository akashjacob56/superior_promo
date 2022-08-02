<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubOptionPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_option_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_sub_option_id')->index();
            $table->integer('quantity');
            $table->decimal('setup_price')->default(0);
            $table->decimal('item_price')->default(0);
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
        Schema::dropIfExists('product_sub_option_prices');
    }
}
