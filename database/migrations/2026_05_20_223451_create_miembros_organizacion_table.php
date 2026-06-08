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
        Schema::create('miembros_organizacion', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); // e.g. Dirección General, Director de Capacitación
            $table->string('area')->nullable(); // e.g. Capacitación y Sensibilización
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_titular')->default(false); // True for the central Director/Titular node
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros_organizacion');
    }
};
