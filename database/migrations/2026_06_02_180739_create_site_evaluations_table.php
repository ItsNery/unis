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
        Schema::create('site_evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->text('comment')->nullable();
            $table->string('url')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_evaluations');
    }
};
