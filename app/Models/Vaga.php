<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'user_id',
        'titulo',
        'funcao_id',
        'salario',
        'hora_inicio',
        'hora_fim',
        'tipo_contrato',
        'dias_disponiveis',
        'turnos',
    ];

    protected $casts = [
        'dias_disponiveis' => 'array',
        'turnos' => 'array',
    ];

    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }

    public function empresa()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
