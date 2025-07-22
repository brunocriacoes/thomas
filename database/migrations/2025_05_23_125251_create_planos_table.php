<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('planos', function (Blueprint $table) {
            $table->id();

            $table->enum('periodo', ['manha', 'tarde', 'socializacao'])->nullable();

            $table->unsignedBigInteger('escola_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('aluno_id')->nullable();

            $table->decimal('valor', 10, 2)->default(0);
            $table->decimal('valor_socializacao', 10, 2)->default(0);
            $table->string('status')->default('ativo');
            $table->text('observacao')->nullable();

            $table->timestamps();

            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planos');
    }
};
