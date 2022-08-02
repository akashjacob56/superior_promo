<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_insurances', function (Blueprint $table) {
            $table->unsignedInteger('term_insurance_id');
            $table->integer('current_age');
            $table->decimal('annual_income', 15);
            $table->integer('annual_increment');
            $table->decimal('savings', 15);
            $table->decimal('loan', 15);
            $table->string('required_cover', 255);
            $table->string('email', 255);
            $table->string('mobile', 255);
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
        Schema::dropIfExists('term_insurances');
    }
}
