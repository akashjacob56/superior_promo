<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->index();
            $table->integer('quantity');
            $table->double('regular_price')->nullable();
            $table->double('price');
            $table->integer('outside_us')->default(0);
            $table->boolean('is_sale')->default(false);
            $table->boolean('later_size_breakdown')->default(false);
            $table->text('imprint_comment')->nullable();
            $table->boolean('tax_exemption')->default(false);
            $table->string('estimation_zip', 10)->nullable();
            $table->string('estimation_shipping_method', 255)->nullable();
            $table->string('estimation_shipping_code', 255)->nullable();
            $table->double('estimation_shipping_price')->nullable();
            $table->string('own_account_number', 255)->nullable();
            $table->string('own_shipping_system', 255)->nullable();
            $table->string('shipping_method', 255)->nullable();
            $table->string('received_date', 255)->nullable();
            $table->integer('cart_id')->nullable()->index();
            $table->string('own_shipping_type', 255)->nullable();
            $table->decimal('setup_price')->default(0);
            $table->string('art_file_name', 255)->nullable();
            $table->string('art_file_path', 255)->nullable();
            $table->boolean('is_sample')->default(false);
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
        Schema::dropIfExists('cart_items');
    }
}
