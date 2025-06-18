@extends('layouts.main_layout')

@section('content')
    <div class="container py-5 my-5">
        <div class="bg-white p-5 rounded shadow-lg mx-auto" style="max-width: 900px;">
            <h1 class="text-3xl fw-bold mb-4 text-primary">Encontre vagas perto de você</h1>

            <p class="text-dark mb-4 fs-5">
                No <strong>Hub RH</strong>, você não precisa mais perder tempo procurando vagas longe de casa.
                Nosso sistema inteligente usa a sua localização (CEP) para mostrar as oportunidades de trabalho mais
                próximas, facilitando seu dia a dia.
            </p>

            <p class="text-dark fs-6">
                Você poderá filtrar as vagas por:
            </p>

            <ul class="text-dark ms-4 mb-4">
                <li>Distância em quilômetros (2km, 5km ou 10km)</li>
                <li>Tipo de contrato (CLT, freelancer, etc.)</li>
                <li>Dias e turnos disponíveis</li>
            </ul>

            <p class="text-dark">
                Tudo isso de forma simples, rápida e intuitiva. Assim, você foca no que importa: conquistar a vaga ideal
                para o seu perfil!
            </p>

            <div class="text-center mt-5">
                <a href="{{ route('register') }}" class="btn btn-laranja btn-lg px-4">
                    Comece agora e encontre sua vaga!
                </a>
            </div>
        </div>
    </div>
@endsection
