<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Header
            $table->string('header_title')->nullable();
            $table->text('header_description')->nullable();
            $table->string('header_image')->nullable();

            // About
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image_1')->nullable();
            $table->string('about_image_2')->nullable();

            // Contact data for frontend
            $table->string('contact_address')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
