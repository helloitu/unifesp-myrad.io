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
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('autor');
            $table->string('genero');
            $table->string('path');
            $table->time('duracao');
            $table->string('img');
            $table->integer('votos')->nullable();
            $table->foreignId('artista_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};
