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
        Schema::create('socila_links', function (Blueprint $table) {
            $table->id();
            $table->longText('facebook');
            $table->longText('twitter');
            $table->longText('google_plus');
            $table->longText('pinerent');
            $table->longText('spanchat');
            $table->longText('linkedin');
            $table->string('open_time');
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
        Schema::dropIfExists('socila_links');
    }
};
