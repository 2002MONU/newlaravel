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
            $table->longText('product_title');
            $table->longText('team_title');
            $table->longText('footer_title');
            $table->longText('ethical_title');
            $table->longText('otc_title');
            $table->string('reach_out_image');
            $table->string('header_logo');
            $table->string('footer_logo');
            $table->string('favicon');
            $table->string('company_background');
            $table->string('product_background');
            $table->string('export_background');
            $table->string('career_background');
            $table->string('contact_background');
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
