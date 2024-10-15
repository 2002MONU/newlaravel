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
            $table->string('site_name');
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->string('favicon');
            $table->longText('howItWork_banner');
            $table->longText('about_banner');
            $table->longText('blog_banner');
            $table->longText('project_banner');
            $table->longText('testimonial_banner');
            $table->longText('gallery_banner');
            $table->longText('contact_banner');
            $table->longText('joinwith_banner');
            $table->longText('footer_title');
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
