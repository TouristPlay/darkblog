<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 40);
            $table->text('content');
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('favorite_counter')->default(0);
            $table->text('file')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('discount')->default(0);

            // Индексы
            $table->index('category_id', 'products_category_products_idx');
            $table->index('user_id', 'products_user_idx');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('product_categories');

            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
