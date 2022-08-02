<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreserveInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preserve_inventories', function (Blueprint $table) {
            $table->increments('preserve_inventory_id');
            $table->double('quantity', 15, 2);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('sku_id');
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
        Schema::dropIfExists('preserve_inventories');
    }
}
