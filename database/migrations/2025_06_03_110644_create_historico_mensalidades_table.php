<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoMensalidadesTable extends Migration
{

    public function up(): void
    {
        Schema::create('historico_mensalidades', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('escola_id');

            $table->unsignedBigInteger('mensalidade_id');

            $table->decimal('valor', 10, 2);

            $table->date('data_vencimento');

            $table->string('status');

            $table->string('codigo_referencia')->nullable();

            $table->string('pagamento_id')->nullable();

            $table->timestamps();

            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');
            $table->foreign('mensalidade_id')->references('id')->on('mensalidades')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historico_mensalidades');
    }
}
