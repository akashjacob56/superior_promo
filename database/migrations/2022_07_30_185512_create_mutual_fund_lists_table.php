<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutualFundListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutual_fund_lists', function (Blueprint $table) {
            $table->increments('mutual_fund_list_id');
            $table->string('mutual_fund_name', 199);
            $table->string('mutual_fund_type', 199);
            $table->string('logo', 199);
            $table->string('aum_cr', 199);
            $table->string('rating', 255);
            $table->decimal('one_year')->nullable();
            $table->decimal('three_year')->nullable();
            $table->decimal('five_year')->nullable();
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
        Schema::dropIfExists('mutual_fund_lists');
    }
}
