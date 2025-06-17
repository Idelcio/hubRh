<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('main.home');
    }

    public function lgpd()
    {
        return view('lgpd');
    }

    public function termos_uso()
    {
        return view('termos_uso');
    }

    public function politica()
    {
        return view('politica_privacidade');
    }

    public function sobre_nos()
    {
        return view('sobre_nos');
    }

    public function buscar_vaga()
    {
        return view('candidato.buscar_vaga');
    }

    public function publicar_vaga()
    {
        return view('empresa.publicar_vaga');
    }

    public function buscar_candidato()
    {
        return view('empresa.buscar_candidato');
    }
}
