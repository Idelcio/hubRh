<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferenciasFuncaoCandidatoTable extends Migration
{
    public function up(): void
    {
        Schema::create('preferencias_funcao_candidato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('funcao_id')->constrained('funcoes')->onDelete('cascade');
            $table->string('tipo_contrato'); // CLT, PJ ou Freelancer
            $table->json('dias_disponiveis')->nullable(); // se PJ ou Freelancer
            $table->json('turnos')->nullable(); // se PJ ou Freelancer
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preferencias_funcao_candidato');
    }
}
