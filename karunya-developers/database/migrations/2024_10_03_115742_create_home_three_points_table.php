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
        Schema::create('home_three_points', function (Blueprint $table) {
            $table->id();
            $table->string('box_01_title');
            $table->string('box_02_title');
            $table->string('box_03_title');
            $table->string('box_01_desc');
            $table->string('box_02_desc');
            $table->string('box_03_desc');
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
        Schema::dropIfExists('home_three_points');
    }
};
