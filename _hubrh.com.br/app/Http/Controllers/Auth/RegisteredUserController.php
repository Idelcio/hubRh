<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'telefone' => ['required'],
        'cep' => ['required'],
        'rua' => ['required'],
        'numero' => ['required'],
        'bairro' => ['required'],
        'complemento' => ['nullable'],
        'cidade' => ['required'],
        'cpf' => ['nullable'],
        'data_nascimento' => ['nullable', 'date'],
        'nome_fantasia' => ['nullable'],
        'cnpj' => ['nullable'],
        'tipo' => ['required', 'in:empresa,candidato'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'telefone' => $request->telefone,
        'cep' => $request->cep,
        'rua' => $request->rua,
        'numero' => $request->numero,
        'bairro' => $request->bairro,
        'complemento' => $request->complemento,
        'cidade' => $request->cidade,
        'cpf' => $request->cpf,
        'data_nascimento' => $request->data_nascimento,
        'nome_fantasia' => $request->nome_fantasia,
        'cnpj' => $request->cnpj,
        'tipo' => $request->tipo,
    ]);

    event(new Registered($user));
    Auth::login($user);

    return redirect()->route('dashboard');
}

}
