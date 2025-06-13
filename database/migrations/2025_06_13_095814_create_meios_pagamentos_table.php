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
        Schema::create('meios_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escola_id');
            $table->enum('tipos', ['pagseguro', 'asaas', 'zoop', 'pagar-me']);
            $table->enum('status', ['produção', 'desenvolvimento']);
            $table->string('chave')->nullable();
            $table->string('codigo')->nullable();
            $table->timestamps();
            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meios_pagamentos');
    }
};
