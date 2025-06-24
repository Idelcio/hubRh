<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use App\Models\Funcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Verifica o plano e o limite permitido
        $plano = $user->plano ?? 'basico';
        $limite = match ($plano) {
            'basico' => 2,
            'medio' => 10,
            'premium' => null,
            default => 2,
        };

        $quantidadeVagas = Vaga::where('user_id', $user->id)->count();

        // Se atingiu o limite
        if (!is_null($limite) && $quantidadeVagas >= $limite) {
            return redirect()->back()->withErrors([
                'limite' => 'Você atingiu o limite de vagas publicadas no seu plano atual.',
            ])->withInput();
        }

        // Validação do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'funcao_id' => 'required|exists:funcoes,id',
            'salario' => 'nullable|numeric',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fim' => 'nullable|date_format:H:i',
            'tipo_contrato' => 'required|in:CLT,PJ,Freelancer',
            'dias_disponiveis' => 'nullable|array',
            'turnos' => 'nullable|array',
        ]);

        // Cria a vaga
        Vaga::create([
            'user_id' => $user->id,
            'titulo' => $request->titulo,
            'funcao_id' => $request->funcao_id,
            'salario' => $request->salario,
            'hora_inicio' => $request->hora_inicio,
            'hora_fim' => $request->hora_fim,
            'tipo_contrato' => $request->tipo_contrato,
            'dias_disponiveis' => in_array($request->tipo_contrato, ['PJ', 'Freelancer']) ? $request->dias_disponiveis : null,
            'turnos' => in_array($request->tipo_contrato, ['PJ', 'Freelancer']) ? $request->turnos : null,
        ]);

        return redirect()->route('dashboard.empresa')->with('success', 'Vaga publicada com sucesso!');
    }

    public function create()
    {
        $funcoes = Funcao::all();
        return view('empresa.vagas.create', compact('funcoes'));
    }

    public function show(Vaga $vaga)
    {
        // Garante que a vaga pertence à empresa logada
        if ($vaga->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para ver esta vaga.');
        }

        return view('empresa.vagas.show', compact('vaga'));
    }

    public function destroy(Vaga $vaga)
    {
        if ($vaga->user_id !== Auth::id()) {
            abort(403, 'Acesso negado.');
        }

        $vaga->delete();

        return redirect()->route('dashboard.empresa')->with('success', 'Vaga excluída com sucesso!');
    }
}
