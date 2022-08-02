<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSampleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_sample_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->index();
            $table->integer('order_sample_id')->nullable()->index();
            $table->integer('stage_id')->nullable()->index();
            $table->boolean('auto_remind')->default(false);
            $table->boolean('check_notes')->default(false);
            $table->integer('quantity');
            $table->double('price');
            $table->integer('vendor_id')->nullable()->index();
            $table->string('shipping_title', 255)->nullable();
            $table->string('shipping_first_name', 255);
            $table->string('shipping_middle_name', 255)->nullable();
            $table->string('shipping_last_name', 255);
            $table->string('shipping_suffix', 255)->nullable();
            $table->string('shipping_company_name', 255)->nullable();
            $table->string('shipping_address_line_1', 255);
            $table->string('shipping_address_line_2', 255)->nullable();
            $table->string('shipping_city', 255);
            $table->string('shipping_state', 255);
            $table->string('shipping_zip', 255);
            $table->string('shipping_country', 255);
            $table->string('shipping_province', 255)->nullable();
            $table->string('shipping_day_telephone', 255);
            $table->string('billing_title', 255)->nullable();
            $table->string('billing_first_name', 255);
            $table->string('billing_middle_name', 255)->nullable();
            $table->string('billing_last_name', 255);
            $table->string('billing_suffix', 255)->nullable();
            $table->string('billing_company_name', 255)->nullable();
            $table->string('billing_address_line_1', 255);
            $table->string('billing_address_line_2', 255)->nullable();
            $table->string('billing_city', 255);
            $table->string('billing_state', 255);
            $table->string('billing_zip', 255);
            $table->string('billing_country', 255);
            $table->string('billing_province', 255)->nullable();
            $table->string('billing_day_telephone', 255);
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
        Schema::dropIfExists('order_sample_items');
    }
}
