<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->index();
            $table->integer('quantity');
            $table->double('price');
            $table->double('options_price')->default(0);
            $table->boolean('check_notes')->default(false);
            $table->boolean('auto_remind')->default(false);
            $table->boolean('not_paid')->default(false);
            $table->string('art_file_name', 255)->nullable();
            $table->string('art_file_path', 255)->nullable();
            $table->string('po_number', 255)->nullable();
            $table->string('invoice_file', 255)->nullable();
            $table->boolean('tax_exempt')->default(false);
            $table->string('estimation_zip', 255)->nullable();
            $table->string('estimation_shipping_method', 255)->nullable();
            $table->string('estimation_shipping_price', 255)->nullable();
            $table->string('own_shipping_type', 255)->nullable();
            $table->string('own_account_number', 255)->nullable();
            $table->string('own_shipping_system', 255)->nullable();
            $table->string('shipping_method', 255);
            $table->integer('vendor_id')->nullable()->index();
            $table->string('received_date', 255)->nullable();
            $table->text('imprint_comment')->nullable();
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
            $table->integer('order_id')->nullable()->index();
            $table->integer('tracking_user_id')->nullable()->index();
            $table->integer('stage_id')->nullable()->index();
            $table->double('item_price');
            $table->double('shipping_price')->nullable();
            $table->integer('cart_item_id')->nullable()->index();
            $table->boolean('is_important')->default(false);
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
        Schema::dropIfExists('order_items');
    }
}
