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
        Schema::create('declaraciones_comite', function (Blueprint $table) {
            $table->id();
            $table->string('committee_name'); // e.g. Comité de Ética
            $table->string('title'); // Accord or declaration title
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('file_path')->nullable(); // PDF attachment
            $table->string('external_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaraciones_comite');
    }
};
