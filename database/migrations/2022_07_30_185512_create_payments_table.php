<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_item_id')->nullable()->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('order_id')->nullable()->index();
            $table->bigInteger('payment_profile_id')->nullable()->index();
            $table->string('status', 255);
            $table->string('transaction_id', 255)->nullable();
            $table->dateTime('shipping_date')->nullable();
            $table->string('type', 255);
            $table->decimal('tax')->nullable();
            $table->string('shipping_company', 255)->nullable();
            $table->integer('shipping_quantity')->nullable();
            $table->integer('over_quantity')->nullable();
            $table->decimal('over_fees')->nullable();
            $table->decimal('price');
            $table->decimal('credit_amount')->nullable();
            $table->boolean('notify_customer')->default(false);
            $table->text('notify_message')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
