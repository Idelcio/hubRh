<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class BuscaVagaController extends Controller
{
    // Exibe vagas para candidatos
    public function index(Request $request)
    {
        $teste = "Teste de busca de vagas"; // Variável de teste, você pode remover depois
        // Busca todas as vagas (você pode adicionar filtros depois)
        $vagas = Vaga::latest()->paginate(10);
        return view('candidato.buscar_vaga', compact('vagas', 'teste'));
    }
}
