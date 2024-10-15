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
        Schema::create('our_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('projact_worked');
            $table->string('projact_worked_icon');
            $table->string('expert_worker');
            $table->string('expert_worker_icon');
            $table->string('happy_client');
            $table->string('happy_client_icon');
            $table->string('upcoming_project');
            $table->string('upcoming_project_icon');
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
        Schema::dropIfExists('our_achievements');
    }
};
