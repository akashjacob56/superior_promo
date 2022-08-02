<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refer_friends', function (Blueprint $table) {
            $table->increments('refer_friend_id');
            $table->string('referred_by', 255);
            $table->integer('loan_user_id');
            $table->integer('status_id')->default(0);
            $table->integer('loan_id');
            $table->integer('is_claim')->default(1);
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
        Schema::dropIfExists('refer_friends');
    }
}
