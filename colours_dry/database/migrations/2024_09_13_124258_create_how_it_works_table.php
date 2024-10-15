<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHowItWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_it_works', function (Blueprint $table) {
            $table->id();
            $table->string('box_01_title');
            $table->string('box_02_title');
            $table->string('box_03_title');
            $table->string('box_04_title');
            $table->string('box_01_image');
            $table->string('box_02_image');
            $table->string('box_03_image');
            $table->string('box_04_image');
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
        Schema::dropIfExists('how_it_works');
    }
}
