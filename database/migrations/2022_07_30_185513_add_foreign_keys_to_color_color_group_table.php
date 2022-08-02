<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToColorColorGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('color_color_group', function (Blueprint $table) {
            $table->foreign(['color_id'])->references(['id'])->on('colors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['group_id'])->references(['id'])->on('color_groups')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('color_color_group', function (Blueprint $table) {
            $table->dropForeign('color_color_group_color_id_foreign');
            $table->dropForeign('color_color_group_group_id_foreign');
        });
    }
}
