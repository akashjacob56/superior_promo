<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->index();
            $table->string('reviewer_name', 255);
            $table->string('reviewer_email', 255)->nullable();
            $table->string('company_name', 255)->nullable();
            $table->date('review_date')->nullable();
            $table->text('text');
            $table->tinyInteger('rating');
            $table->boolean('approve')->nullable();
            $table->integer('user_id')->nullable()->index();
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
        Schema::dropIfExists('reviews');
    }
}
