<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('image_2')->nullable();
            $table->string('title_1');
            $table->string('short_description_1');
            $table->string('title_2');
            $table->string('short_description_2');
            $table->string('title_3');
            $table->string('short_description_3');
            $table->string('year_of_exprience');
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
        Schema::dropIfExists('abouts');
    }
}
