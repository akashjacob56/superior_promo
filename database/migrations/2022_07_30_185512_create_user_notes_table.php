<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_item_id')->index();
            $table->boolean('customer_read')->default(false);
            $table->boolean('admin_read')->default(false);
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->dateTime('answered_at')->nullable();
            $table->string('subject', 255);
            $table->text('note')->nullable();
            $table->text('customer_note')->nullable();
            $table->boolean('approved')->nullable();
            $table->boolean('approved_required')->nullable();
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
        Schema::dropIfExists('user_notes');
    }
}
