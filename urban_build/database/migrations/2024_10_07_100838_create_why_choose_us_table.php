<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('box_01_title');
            $table->string('box_02_title');
            $table->string('box_03_title');
            $table->string('box_04_title');
            $table->string('box_05_title');
            $table->longText('box_01_description');
            $table->longText('box_02_description');
            $table->longText('box_03_description');
            $table->longText('box_04_description');
            $table->longText('box_05_description');
            $table->string('side_image');
            $table->string('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us');
    }
};
