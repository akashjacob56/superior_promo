<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->index();
            $table->string('shipping_first_name', 255);
            $table->string('shipping_middle_name', 255)->nullable();
            $table->string('shipping_last_name', 255);
            $table->string('shipping_title', 255)->nullable();
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
            $table->string('shipping_ext', 255)->nullable();
            $table->string('shipping_fax', 255)->nullable();
            $table->string('billing_first_name', 255);
            $table->string('billing_middle_name', 255)->nullable();
            $table->string('billing_last_name', 255);
            $table->string('billing_title', 255)->nullable();
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
            $table->string('billing_ext', 255)->nullable();
            $table->string('billing_fax', 255)->nullable();
            $table->text('multiple_location_comment')->nullable();
            $table->integer('cart_id')->nullable()->index();
            $table->string('discount_code', 255)->nullable();
            $table->integer('discount_id')->nullable()->index();
            $table->decimal('price')->default(0);
            $table->decimal('total_price')->default(0);
            $table->decimal('discount_amount')->default(0);
            $table->integer('is_reorder')->nullable()->default(0);
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
        Schema::dropIfExists('orders');
    }
}
