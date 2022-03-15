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
            $table->id();
            $table->string('title', 40);
            $table->text('content');
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('favorite')->default(0);
            $table->timestamps();
            $table->index('category_id', 'post_category_idx');
            $table->index('user_id', 'post_user_idx');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('published')->default(1);
            $table->softDeletes();
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
