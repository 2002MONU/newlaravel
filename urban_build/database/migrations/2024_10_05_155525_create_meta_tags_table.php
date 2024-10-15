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
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            $table->longText('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_type')->nullable();
            $table->string('twitter_card')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_type')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('author')->nullable();
            $table->string('canonical')->nullable();
            $table->string('og_secure_url')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->longText('twitter_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
