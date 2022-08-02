<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_sample', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->index();
            $table->decimal('total_price')->default(0);
            $table->string('own_shipping_type', 255);
            $table->string('own_account_number', 255)->nullable();
            $table->string('own_shipping_system', 255)->nullable();
            $table->string('shipping_method', 255);
            $table->string('quantity', 255)->nullable();
            $table->string('attraction', 255)->nullable();
            $table->string('event_date', 255)->nullable();
            $table->string('frequency', 255)->nullable();
            $table->string('sample', 255)->nullable();
            $table->string('sample_comment', 255)->nullable();
            $table->string('upcoming_event', 255)->nullable();
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
        Schema::dropIfExists('order_sample');
    }
}
