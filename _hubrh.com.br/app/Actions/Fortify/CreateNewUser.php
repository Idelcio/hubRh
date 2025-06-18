<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo' => ['required', 'in:candidato,empresa'],
            'telefone' => ['nullable', 'string', 'max:20'],
            'cep' => ['nullable', 'string', 'max:10'],
            'cpf' => ['nullable', 'string', 'max:20'],
            'data_nascimento' => ['nullable', 'date'],
            'nome_fantasia' => ['nullable', 'string', 'max:255'],
            'cnpj' => ['nullable', 'string', 'max:20'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'tipo' => $input['tipo'],
            'level' => 'user',
            'telefone' => $input['telefone'] ?? null,
            'cep' => $input['cep'] ?? null,
            'cpf' => $input['cpf'] ?? null,
            'data_nascimento' => $input['data_nascimento'] ?? null,
            'nome_fantasia' => $input['nome_fantasia'] ?? null,
            'cnpj' => $input['cnpj'] ?? null,
        ]);
    }
}
