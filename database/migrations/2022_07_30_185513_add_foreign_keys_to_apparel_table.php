<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToApparelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apparel', function (Blueprint $table) {
            $table->foreign('status_id', 'apparel_ibfk_1')
                ->references('status_id')
                ->on('statuses');
//            $table->foreign('size_group_id', 'sizes_size_group_id_foreign')
//                ->references('id')
//                ->on('size_groups')
//                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apparel', function (Blueprint $table) {
            $table->dropForeign('apparel_ibfk_1');
            $table->dropForeign('sizes_size_group_id_foreign');
        });
    }
}
