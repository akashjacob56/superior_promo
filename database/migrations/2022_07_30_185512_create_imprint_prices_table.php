<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImprintPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imprint_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imprint_id')->index();
            $table->integer('vendor_id')->nullable()->index();
            $table->integer('quantity')->nullable()->default(0);
            $table->decimal('setup_price')->default(0);
            $table->decimal('item_price')->default(0);
            $table->decimal('color_setup_price')->default(0);
            $table->decimal('color_item_price')->default(0);
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
        Schema::dropIfExists('imprint_prices');
    }
}
