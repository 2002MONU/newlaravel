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
            $table->string('title');
            $table->text('short_description');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('category_id');
            $table->integer('priority')->nullable();
            $table->string('soluable_concentrate')->nullable();
            $table->text('features')->nullable();
            $table->text('specification')->nullable();
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
