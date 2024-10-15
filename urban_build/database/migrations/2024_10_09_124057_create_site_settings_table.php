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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('header_logo');
            $table->string('favicon');
            $table->string('header_title');
            $table->string('footer_title');
            $table->string('about_banner');
            $table->string('package_banner');
            $table->string('project_banner');
            $table->string('service_banner');
            $table->string('contact_banner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
