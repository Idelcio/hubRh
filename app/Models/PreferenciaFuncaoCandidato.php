<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferenciaFuncaoCandidato extends Model
{
    use HasFactory;

    protected $table = 'preferencias_funcao_candidato';

    protected $fillable = [
        'user_id',
        'funcao_id',
        'tipo_contrato',
        'dias_disponiveis',
        'turnos',
    ];

    protected $casts = [
        'dias_disponiveis' => 'array',
        'turnos' => 'array',
    ];

    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com função
    public function funcao()
    {
        return $this->belongsTo(Funcao::class);
    }
}
