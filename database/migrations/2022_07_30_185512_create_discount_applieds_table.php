<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountAppliedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_applieds', function (Blueprint $table) {
            $table->increments('discount_applied_id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('discount_id')->index();
            $table->unsignedInteger('global_order_id')->index();
            $table->double('discount_amount', 15, 2);
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
        Schema::dropIfExists('discount_applieds');
    }
}
