<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('plano_id')->nullable();
            $table->unsignedBigInteger('escola_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('aluno_id')->nullable();

            $table->decimal('valor', 10, 2)->default(0);
            $table->string('referencia')->nullable();
            $table->string('referencia_pagamento')->nullable();
            $table->text('descricao')->nullable();

            $table->string('link_pdf')->nullable();
            $table->string('link_comprovante')->nullable();

            $table->string('barcode')->nullable();
            $table->text('qr_payload')->nullable();
            $table->longText('qr_image_64')->nullable();

            $table->string('status_pagamento')->default('pendente');
            $table->date('data_vencimento')->nullable();

            $table->timestamps();

            $table->foreign('plano_id')->references('id')->on('planos')->onDelete('set null');
            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faturas');
    }
};
