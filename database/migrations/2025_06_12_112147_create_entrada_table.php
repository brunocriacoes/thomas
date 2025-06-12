<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->unsignedBigInteger('escola_id');
            $table->unsignedBigInteger('evento_id');
            $table->string('nome');
            $table->string('cpf', 14);
            $table->dateTime('data_hora_entrada')->nullable();
            $table->string('status')->default('pendente');
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
