<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('discount_id');
            $table->string('title', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('discount_type_id')->index();
            $table->unsignedInteger('applies_to_id')->index();
            $table->integer('minimum_purchase_amount');
            $table->unsignedInteger('customer_eligibility_id')->index();
            $table->integer('is_limit_number_of_times')->default(0);
            $table->integer('limit_number_of_times');
            $table->integer('only_one_use_per_customer');
            $table->string('discount_code');
            $table->string('discount_value');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->integer('is_hide')->default(0);
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
        Schema::dropIfExists('discounts');
    }
}
