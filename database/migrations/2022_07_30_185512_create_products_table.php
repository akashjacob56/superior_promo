<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_image')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->string('product_url', 255)->nullable();
            $table->unsignedInteger('parent_variant_id')->nullable();
            $table->unsignedInteger('child_variant_id')->nullable();
            $table->unsignedInteger('status_id')->default(1);
            $table->unsignedInteger('gst_id')->nullable();
            $table->unsignedInteger('seller_id');
            $table->integer('is_product_shipping')->default(0);
            $table->integer('track_inventory')->default(0);
            $table->integer('allow_customer_stock_out')->default(0);
            $table->integer('product_translation_id')->default(1);
            $table->bigInteger('view_count')->default(0);
            $table->unsignedInteger('return_policy_id')->nullable();
            $table->integer('product_minimum_quantity')->default(1);
            $table->longText('dimension')->nullable();
            $table->longText('imprint_area')->nullable();
            $table->string('additional_specification')->nullable();
            $table->longText('pricing_information')->nullable();
            $table->string('video')->nullable();
            $table->integer('quantity_per_box')->nullable();
            $table->string('shipping_additional_type')->nullable();
            $table->integer('weight_box')->nullable();
            $table->string('shipping_additional_value')->nullable();
            $table->string('shipping_from_zip_code')->nullable();
            $table->integer('production_time_from')->nullable();
            $table->integer('production_time_to')->nullable();
            $table->string('custom_method')->nullable();
            $table->string('custom_cost')->nullable();
            $table->string('sage_id', 255)->nullable();
            $table->integer('is_stock_collection')->default(0);
            $table->unsignedInteger('old_product_id')->nullable();
            $table->integer('on_sale')->default(0);
            $table->string('zip_from', 255)->nullable();
            $table->integer('is_active')->default(0);
            $table->string('url_prefix', 255)->nullable();
            $table->integer('popularity')->default(0);
            $table->string('video_url', 255)->nullable();
            $table->unsignedInteger('product_icon_id')->nullable();
            $table->unsignedInteger('size_group_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
