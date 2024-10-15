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
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            $table->longText('og_description');
            $table->string('og_image');
            $table->string('og_site_name');
            $table->string('og_title');
            $table->string('og_url');
            $table->string('og_type');
            $table->string('twitter_card');
            $table->string('twitter_type');
            $table->string('twitter_site');
            $table->string('twitter_creator');
            $table->string('author');
            $table->string('canonical');
            $table->string('og_secure_url');
            $table->string('width');
            $table->string('height');
            $table->longText('twitter_description');
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
        Schema::dropIfExists('meta_tags');
    }
};
