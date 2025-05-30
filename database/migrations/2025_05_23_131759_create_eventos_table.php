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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('escola_id')->constrained('escolas')->cascadeOnDelete();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->string('imagem_url')->nullable();
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');
            $table->integer('andar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
