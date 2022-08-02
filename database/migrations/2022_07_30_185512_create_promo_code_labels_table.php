<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_labels', function (Blueprint $table) {
            $table->increments('promocode_label_id');
            $table->unsignedInteger('language_id')->index();
            $table->text('apply');
            $table->text('add_new');
            $table->text('promocode');
            $table->text('have_promocode');
            $table->text('promocode_has_been_expired');
            $table->text('upcomming_promocode');
            $table->text('limit_of_promo_code_usage_exceeded');
            $table->text('this_promocode');
            $table->text('sorry_you_are_not_eligible');
            $table->text('you_have_already_used');
            $table->text('invalid_amount');
            $table->text('invalid_promocode');
            $table->text('your_promocode_discount');
            $table->text('promocode_applied_successfully');
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
        Schema::dropIfExists('promo_code_labels');
    }
}
