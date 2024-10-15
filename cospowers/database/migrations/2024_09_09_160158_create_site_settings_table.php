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
            $table->longText('product_heading');
            $table->longText('product_title');
            $table->longText('testimonial_title');
            $table->longText('whychoose_banner');
            $table->longText('about_banner');
            $table->longText('news_banner');
            $table->longText('service_banner');
            $table->longText('product_banner');
            $table->longText('career_banner');
            $table->longText('download_banner');
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
