<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atributos atribuíveis em massa (fillable).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'tipo',
        'telefone',
        'cep',
        'rua',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'cpf',
        'data_nascimento',
        'nome_fantasia',
        'cnpj',
        'latitude',
        'longitude',
        'uf'
    ];


    /**
     * Atributos ocultos na serialização.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversão de tipos de atributos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'data_nascimento' => 'date',
        'password' => 'hashed',
    ];

    /**
     * Verifica se o usuário é do tipo empresa.
     */
    public function isEmpresa()
    {
        return $this->tipo === 'empresa';
    }

    /**
     * Verifica se o usuário é do tipo candidato.
     */
    public function isCandidato()
    {
        return $this->tipo === 'candidato';
    }

    public function perfilCandidato()
    {
        return $this->hasOne(PerfilCandidato::class);
    }

    public function preferenciasFuncoes()
    {
        return $this->hasMany(PreferenciaFuncaoCandidato::class);
    }

    public function limiteBuscaFuncoes()
    {
        return match ($this->plano) {
            'basico' => 2,
            'medio' => 10,
            'premium' => null, // sem limite
            default => 2,
        };
    }
}
