<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_policies', function (Blueprint $table) {
            $table->increments('return_policy_id');
            $table->integer('return_policy_translation_id')->default(1);
            $table->string('return_days')->nullable();
            $table->boolean('is_available_for_return')->default(false);
            $table->boolean('is_available_for_return_replace')->default(false);
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
        Schema::dropIfExists('return_policies');
    }
}
