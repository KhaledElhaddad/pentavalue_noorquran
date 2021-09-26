<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sounds', function (Blueprint $table) {
            $table->id();
            $table->string('sound_clip');
            $table->string('duration')->default('50:02');
            $table->integer('listen')->default(0);
            $table->integer('like')->default(0);
            $table->string('category_ar')->nullable();
            $table->string('category_en')->nullable();
            $table->boolean('download');
            $table->foreignId('reader_id')->nullable();
            $table->foreignId('surah_id')->nullable();
            $table->foreignId('remembrance_id')->nullable();
            $table->foreignId('dua_id')->nullable();
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
        Schema::dropIfExists('sounds');
    }
}
