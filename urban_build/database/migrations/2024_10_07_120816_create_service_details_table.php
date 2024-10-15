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
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->string('service_title');
            $table->string('slug');
            $table->string('service_image');
            $table->longText('description');
            $table->string('benefit_image');
            $table->longText('benefit_description');
            $table->string('title_2');
            $table->longText('title_2_description');
            $table->string('box_01_title');
            $table->string('box_02_title');
            $table->string('box_03_title');
            $table->longText('box_01_description');
            $table->longText('box_02_description');
            $table->longText('box_03_description');
            $table->longText('last_description');
            $table->boolean('status');
            $table->integer('priority');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_details');
    }
};
