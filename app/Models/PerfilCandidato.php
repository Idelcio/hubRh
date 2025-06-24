<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilCandidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'funcoes',
        'tipo_contrato',
        'dias_disponiveis',
        'turnos',
    ];

    protected $casts = [
        'funcoes' => 'array',
        'dias_disponiveis' => 'array',
        'turnos' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
