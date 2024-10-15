<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('title');
            $table->longText('description');
            $table->string('big_image');
            $table->longText('youtube_link')->nullable();
            $table->string('image_small_01')->nullable();
            $table->string('image_small_02')->nullable();
            $table->string('p_01')->nullable();
            $table->string('p_02')->nullable();
            $table->string('h_01')->nullable();
            $table->string('h_02')->nullable();
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
        Schema::dropIfExists('why_choose_us');
    }
};
