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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('project_name');
            $table->string('location');
            $table->string('built_up_area');
            $table->string('project_type');
            $table->string('project_category');
            $table->string('clients');
            $table->string('project_date');
            $table->string('avenue_end_date');
            $table->string('project_main_image');
            $table->string('project_small_image');
            $table->longText('description');
            $table->string('project_goal_image');
            $table->longText('project_goal_description');
            $table->string('project_challenge_image');
            $table->longText('project_challenge_description');
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
        Schema::dropIfExists('project_details');
    }
};
