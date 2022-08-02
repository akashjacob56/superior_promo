<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_id');
            $table->integer('category_translation_id')->default(1);
            $table->string('category_image')->nullable();
            $table->string('category_banner_image')->nullable();
            $table->unsignedInteger('status_id')->default(1);
            $table->integer('is_parent_category')->default(0);
            $table->integer('is_main_category')->default(0);
            $table->string('category_url')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->nullable();
            $table->integer('old_id')->nullable();
            $table->longText('footer_text')->nullable();
            $table->integer('is_active')->default(1);
            $table->longText('froogle_description')->nullable();
            $table->integer('is_quick_link')->nullable();
            $table->integer('is_popular')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
