<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->integer('category_id')->nullable();
            $table->string('title', 255);
            $table->string('seo_title', 255)->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->string('image', 255)->nullable();
            $table->string('slug', 255)->unique();
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->enum('status', ['published', 'draft', 'pending'])->default('pending');
            $table->boolean('featured')->default(false);
            $table->integer('post_category_id')->index();
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
        Schema::dropIfExists('posts');
    }
}
