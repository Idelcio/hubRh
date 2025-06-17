@extends('layouts.main_layout')

@section('content')
    <!-- Banner em tela cheia com texto centralizado -->
    <section class="position-relative w-100" style="height: 300px; overflow: hidden;">
        <img src="{{ asset('imagens/banner_02.jpg') }}" alt="Banner Hub RH"
            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0 z-0"
            style="object-fit: cover; filter: brightness(0.5);">

        <div
            class="position-relative z-1 text-white h-100 d-flex flex-column justify-content-center align-items-center text-center px-3">
            <h1 class="display-5 fw-bold">Bem-vindo ao Hub RH</h1>
            <p class="lead">Conectando empresas e talentos com eficiência e confiança.</p>
        </div>
    </section>
@endsection
