<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard autenticado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Registro de usuários
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// Páginas institucionais
Route::get('/lgpd', [MainController::class, 'lgpd'])->name('lgpd');
Route::get('/sobre_nos', [MainController::class, 'sobre_nos'])->name('sobre_nos');
Route::get('/politica_privacidade', [MainController::class, 'politica'])->name('politica_privacidade');
Route::get('/termos_uso', [MainController::class, 'termos'])->name('termos');
Route::get('/termos', [MainController::class, 'termos_uso'])->name('termos_uso');

Route::get('/buscar_vaga', [MainController::class, 'buscar_vaga'])->name('buscar_vaga');

Route::get('/publicar_vaga', [MainController::class, 'publicar_vaga'])->name('publicar_vaga');

Route::get('/buscar_candidato', [MainController::class, 'buscar_candidato'])->name('buscar_candidato');




require __DIR__ . '/auth.php';
