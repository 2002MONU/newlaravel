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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->string('layout');
            $table->string('design_name');
            $table->string('title');
            $table->string('project_category');
            $table->string('clients');
            $table->string('project_date');
            $table->string('avenue_end_date');
            $table->string('location');
            $table->string('price_after');
            $table->string('description');
            $table->string('service_benefits');
            $table->string('image');
            $table->bigInteger('priority');
            $table->boolean('status');
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
        Schema::dropIfExists('project_details');
    }
};
