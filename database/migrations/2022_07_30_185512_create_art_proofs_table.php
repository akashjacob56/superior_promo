<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_proofs', static function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_item_id')->index();
            $table->boolean('customer_read')->default(false);
            $table->boolean('admin_read')->default(false);
            $table->integer('user_id')->nullable()->index();
            $table->dateTime('answered_at')->nullable();
            $table->text('note')->nullable();
            $table->text('customer_note')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('approve_required')->nullable();
            $table->string('path', 255)->nullable();
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
        Schema::dropIfExists('art_proofs');
    }
}
