<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:candidato,empresa',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'telefone' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'cep' => 'required|string',
            'cpf' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'cnpj' => 'nullable|string',
            'nome_fantasia' => 'nullable|string',
            'aceita_termos' => 'accepted',
        ]);

        $user = User::create([
            'tipo' => $request->tipo,
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'cpf' => $request->tipo === 'candidato' ? $request->cpf : null,
            'data_nascimento' => $request->tipo === 'candidato' ? $request->data_nascimento : null,
            'cnpj' => $request->tipo === 'empresa' ? $request->cnpj : null,
            'nome_fantasia' => $request->tipo === 'empresa' ? $request->nome_fantasia : null,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
