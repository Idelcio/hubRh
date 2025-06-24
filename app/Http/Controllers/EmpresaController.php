<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Vaga;

class EmpresaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if ($user->tipo !== 'empresa') {
            abort(403, 'Acesso não autorizado');
        }

        // Busca as vagas da empresa
        $vagas = Vaga::with('funcao')->where('user_id', $user->id)->latest()->get();

        return view('empresa.dashboard', compact('user', 'vagas'));
    }
}
