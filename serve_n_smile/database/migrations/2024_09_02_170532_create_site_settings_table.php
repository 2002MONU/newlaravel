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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo');
            $table->string('favicon');
            $table->longText('service_title');
            $table->longText('service_heading');
            $table->longText('howit_title');
            $table->longText('blog_title');
            $table->longText('about_banner');
            $table->longText('blog_banner');
            $table->longText('service_banner');
            $table->longText('contact_banner');
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
};
