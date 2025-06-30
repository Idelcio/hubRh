<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BuscaVagaController;

// Página inicial
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->tipo === 'empresa') {
        return redirect()->route('dashboard.empresa');
    } else {
        return redirect()->route('dashboard.candidato');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard-candidato', [CandidatoController::class, 'dashboard'])->name('dashboard.candidato');
    // Nova rota para busca de vagas para candidatos autenticados
    Route::get('/busca_vagas', [BuscaVagaController::class, 'index'])->name('busca_vagas');
    // Perfil profissional do candidato
    Route::get('/perfil-profissional', [CandidatoController::class, 'editarPerfilProfissional'])->name('candidato.perfil.edit');
    Route::post('/perfil-profissional', [CandidatoController::class, 'salvarPerfilProfissional'])->name('candidato.perfil.salvar');
});

// Registro de usuários
Route::post('/register', [UserRegisterController::class, 'store'])->name('register');


// Páginas institucionais
Route::get('/lgpd', [MainController::class, 'lgpd'])->name('lgpd');
Route::get('/sobre_nos', [MainController::class, 'sobre_nos'])->name('sobre_nos');
Route::get('/politica_privacidade', [MainController::class, 'politica'])->name('politica_privacidade');
Route::get('/termos_uso', [MainController::class, 'termos'])->name('termos');
Route::get('/termos', [MainController::class, 'termos_uso'])->name('termos_uso');

Route::get('/buscar_vaga', [MainController::class, 'buscar_vaga'])->name('buscar_vaga');

Route::get('/publicar_vaga', [MainController::class, 'publicar_vaga'])->name('publicar_vaga');

Route::get('/buscar_candidato', [MainController::class, 'buscar_candidato'])->name('buscar_candidato');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard-empresa', [EmpresaController::class, 'dashboard'])->name('dashboard.empresa');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/vagas', [VagaController::class, 'store'])->name('empresa.vagas.store');
});

Route::get('/vagas/criar', [VagaController::class, 'create'])->name('empresa.vagas.create');
Route::get('/vagas/{vaga}', [VagaController::class, 'show'])->name('empresa.vagas.show');
Route::delete('/vagas/{vaga}', [VagaController::class, 'destroy'])->name('empresa.vagas.destroy');






require __DIR__ . '/auth.php';
