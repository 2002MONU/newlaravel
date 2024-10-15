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
            $table->longText('og_description')->nullable();
            $table->longText('og_image')->nullable();
            $table->longText('og_site_name')->nullable();
            $table->longText('og_title')->nullable();
            $table->longText('og_url')->nullable();
            $table->longText('og_type')->nullable();
            $table->longText('twitter_card')->nullable();
            $table->longText('twitter_type')->nullable();
            $table->longText('twitter_site')->nullable();
            $table->longText('twitter_creator')->nullable();
            $table->longText('twitter_title')->nullable();
            $table->longText('twitter_description')->nullable();
            $table->longText('twitter_image')->nullable();
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
