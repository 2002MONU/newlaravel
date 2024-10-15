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
        Schema::create('home_extras', function (Blueprint $table) {
            $table->id();
            $table->string('on_time');
            $table->string('trusted_cleaner');
            $table->string('best_quality');
            $table->string('on_time_heading');
            $table->string('trusted_heading');
            $table->string('best_heading');
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
        Schema::dropIfExists('home_extras');
    }
};
