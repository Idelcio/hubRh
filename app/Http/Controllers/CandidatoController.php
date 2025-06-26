<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{PerfilCandidato, Funcao};
use App\Models\PreferenciaFuncaoCandidato;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class CandidatoController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $api = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $user->numero . "+" . $user->rua . "&key=AIzaSyAZFtWu4pyZChI2GQL2Z5Tbh7d_7QazJO8";
        $response = Http::withoutVerifying()->get($api);

        if ($response->ok() && isset($response['results'][0]['geometry'])) {
            $location = [
                'latitude' => $response['results'][0]['geometry']['location']['lat'],
                'longitude' => $response['results'][0]['geometry']['location']['lng'],
            ];
        }

        $latitude = $location['latitude'] ?? null;
        $longitude = $location['longitude'] ?? null;

        if ($user->tipo !== 'candidato') {
            abort(403, 'Acesso não autorizado');
        }

        return view('candidato.dashboard', compact('user', 'latitude', 'longitude'));
    }

    public function editarPerfilProfissional()
    {
        $user = Auth::user();

        if ($user->tipo !== 'candidato') {
            abort(403, 'Acesso negado');
        }

        $funcoes = Funcao::all();

        // Carregar preferências existentes do usuário e formatar para o Alpine.js
        $perfilFuncoes = $user->preferenciasFuncoes->map(function ($pref) {
            return [
                'funcao_id' => $pref->funcao_id,
                'tipo_contrato' => $pref->tipo_contrato,
                'dias_disponiveis' => $pref->dias_disponiveis ?? [],
                'turnos' => $pref->turnos ?? [],
            ];
        });

        return view('candidato.editar_perfil', compact('user', 'funcoes', 'perfilFuncoes'));
    }

    



    public function salvarPerfilProfissional(Request $request)
    {
        $user = Auth::user();

        if ($user->tipo !== 'candidato') {
            abort(403, 'Acesso negado');
        }

        // Validação básica dos dados enviados
        $request->validate([
            'funcoes_compostas' => 'required|array|min:1|max:5', // <= limite de 5
            'funcoes_compostas.*.funcao_id' => 'required|exists:funcoes,id',
            'funcoes_compostas.*.tipo_contrato' => 'required|in:CLT,PJ,Freelancer',
            'funcoes_compostas.*.dias_disponiveis' => 'nullable|array',
            'funcoes_compostas.*.turnos' => 'nullable|array',
        ]);

        // Proteção extra (caso bypassem a validação do formulário)
        if (count($request->funcoes_compostas) > 5) {
            return back()->withErrors(['funcoes_compostas' => 'Você só pode cadastrar até 5 cargos.'])->withInput();
        }

        // Remove as preferências antigas
        PreferenciaFuncaoCandidato::where('user_id', $user->id)->delete();

        // Cria novas
        foreach ($request->funcoes_compostas as $bloco) {
            PreferenciaFuncaoCandidato::create([
                'user_id' => $user->id,
                'funcao_id' => $bloco['funcao_id'],
                'tipo_contrato' => $bloco['tipo_contrato'],
                'dias_disponiveis' => in_array($bloco['tipo_contrato'], ['PJ', 'Freelancer']) ? $bloco['dias_disponiveis'] ?? [] : null,
                'turnos' => in_array($bloco['tipo_contrato'], ['PJ', 'Freelancer']) ? $bloco['turnos'] ?? [] : null,
            ]);
        }

        return redirect()->route('dashboard.candidato')->with('success', 'Perfil profissional atualizado com sucesso!');
    }
}
