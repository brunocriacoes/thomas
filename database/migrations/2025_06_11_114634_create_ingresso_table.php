<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingressos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('mesa_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->decimal('preco', 10, 2)->default(0.00);
            $table->integer('quantidade')->default(1);
            $table->string('status_pagamento')->default('pendente');
            $table->dateTime('data_compra')->nullable();
            $table->timestamps();

            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingressos');
    }
};
