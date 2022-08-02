<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('transaction_amount');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('global_order_id');
            $table->unsignedInteger('payment_status_id')->default(1);
            $table->string('payment_mode');
            $table->string('transaction_number');
            $table->unsignedInteger('transaction_type_id');
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
        Schema::dropIfExists('transactions');
    }
}
