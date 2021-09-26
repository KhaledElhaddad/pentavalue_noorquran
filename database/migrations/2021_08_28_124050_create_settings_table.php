<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('current_version');
            $table->string('platform');
            $table->boolean('current');
            $table->string('user_msg');
            $table->string('about');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('message');
            $table->timestamps();
        });

        Schema::create('privacies', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('data_ar');
            $table->string('data_en');
            $table->timestamps();

        });

        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('data_ar');
            $table->string('data_en');
            $table->timestamps();
        });

        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('data_ar');
            $table->string('data_en');
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
        Schema::dropIfExists('settings');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('privacy-plicy');
        Schema::dropIfExists('about-us');
        Schema::dropIfExists('terms-and-condations');


    }
}