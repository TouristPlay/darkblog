<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 40);
            $table->text('content');
            $table->string('status')->default('open');

            $table->unsignedBigInteger('rubric_id')->nullable(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('message_counter')->default(0);

            $table->index('rubric_id', 'topics_category_idx');
            $table->index('user_id', 'topic_user_idx');
            $table->foreign('rubric_id')->references('id')->on('rubrics');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
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
        Schema::dropIfExists('topics');
    }
}
