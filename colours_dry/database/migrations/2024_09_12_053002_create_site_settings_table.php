<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable(); 
            $table->string('logo')->nullable(); 
            $table->string('favicon')->nullable(); 
            $table->string('ftlogo')->nullable();  
            $table->text('address')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable(); 
            $table->string('twitter')->nullable(); 
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('og_type')->nullable(); 
            $table->string('og_title')->nullable(); 
            $table->string('og_description')->nullable(); 
            $table->string('og_url')->nullable(); 
            $table->string('og_site_name')->nullable(); 
            $table->string('og_image')->nullable(); 
            $table->string('og_width')->nullable(); 
            $table->string('og_height')->nullable(); 
            $table->string('twitter_card')->nullable(); 
            $table->string('twitter_title')->nullable(); 
            $table->string('twitter_image')->nullable();
            $table->string('site_about')->nullable(); 
            $table->text('site_location')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
}
