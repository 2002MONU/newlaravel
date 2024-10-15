<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyChoosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_chooses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('step_01_title');
            $table->string('step_02_title');
            $table->string('step_03_title');
            $table->longText('step_01_desc');
            $table->longText('step_02_desc');
            $table->longText('step_03_desc');
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
        Schema::dropIfExists('why_chooses');
    }
}
