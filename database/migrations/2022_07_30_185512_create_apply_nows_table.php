<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyNowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_nows', static function (Blueprint $table) {
            $table->increments('apply_now_id');

            $table->string('phone', 255);
            $table->string('product_id', 255)->nullable();
            $table->string('mutual_fund_list_id', 255)->nullable();
            $table->string('email', 199)->nullable();
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
        Schema::dropIfExists('apply_nows');
    }
}
