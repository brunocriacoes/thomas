<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('escola_id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_final')->nullable();
            $table->time('horario_inicio')->nullable();
            $table->time('horario_final')->nullable();
            $table->string('telefone')->nullable();
            $table->string('url_foto_evento')->nullable();
            $table->string('url_foto_evento_mesa')->nullable();
            $table->string('link_google_map')->nullable();
            $table->string('link_caralogo')->nullable();
            $table->text('scrip_js')->nullable();
            $table->timestamps();

            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
