<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilCandidatosTable extends Migration
{
    public function up(): void
    {
        Schema::create('perfil_candidatos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('funcoes'); // até 5 funções
            $table->string('tipo_contrato'); // CLT, PJ ou Freelancer
            $table->json('dias_disponiveis')->nullable(); // se for PJ/Freelancer
            $table->json('turnos')->nullable(); // se for PJ/Freelancer
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfil_candidatos');
    }
}
