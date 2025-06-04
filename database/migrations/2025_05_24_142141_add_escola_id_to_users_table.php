<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telefone')->nullable();
            $table->string('foto')->nullable();
            $table->enum('genero', ['masculino', 'feminino', 'não_binário', 'prefiro_não_informar', 'outro'])->nullable();
            $table->enum('estado_civil', ['solteiro', 'casado', 'divorciado', 'viuvo'])->nullable();
            $table->enum('parentesco', ['pai', 'mãe', 'tutor', 'outro'])->nullable();
            $table->enum('status', ['ativo', 'inativo', 'suspenso'])->default('ativo');
            $table->unsignedBigInteger('escola_id')->nullable();
            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('set null');
            $table->string('cpf', 14)->nullable();
            $table->string('rg')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('profissao')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('cargo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['escola_id']);
            $table->dropColumn('escola_id');
            $table->dropColumn([
                'telefone',
                'foto',
                'genero',
                'estado_civil',
                'parentesco',
                'status',
                'cpf',
                'rg',
                'endereco',
                'numero',
                'bairro',
                'cidade',
                'estado',
                'cep',
                'nacionalidade',
                'profissao',
                'observacoes',
                'cargo'
            ]);
        });
    }
};
