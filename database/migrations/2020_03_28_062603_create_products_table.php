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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')
                    ->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->text('short_description');
            $table->text('long_description')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->string('image');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('stock');
            $table->integer('status');
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
