<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_lives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->index();
            $table->integer('lft')->nullable()->index();
            $table->integer('rgt')->nullable()->index();
            $table->integer('depth')->nullable();
            $table->string('name', 255)->index();
            $table->string('slug', 255)->nullable()->index();
            $table->integer('old_id')->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('image_src', 255)->nullable();
            $table->boolean('active')->default(true);
            $table->text('froogle_description')->nullable();
            $table->boolean('is_quick_link');
            $table->boolean('is_popular');
            $table->unsignedSmallInteger('order');
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
        Schema::dropIfExists('category_lives');
    }
}
