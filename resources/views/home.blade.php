@extends('layouts.main_layout')

@section('content')
    <!-- Carrossel com 3 banners -->
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner" style="height: 550px;">
            <!-- Slide 1 -->
            <!-- Slide 1 (sem filtro escuro) -->
            <div class="carousel-item active">
                <img src="{{ asset('imagens/banner_04.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                    style="object-fit: cover;" alt="Banner 1">
                <div
                    class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-white text-center">
                    {{-- Conteúdo opcional --}}
                </div>
            </div>


            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('imagens/banner_02.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                    style="object-fit: cover; filter: brightness(0.5);" alt="Banner 2">
                <div
                    class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-white text-center">
                    <h1 class="display-5 fw-bold">Empresas mais próximas, processos mais ágeis</h1>
                    <p class="lead">Simplifique suas contratações com geolocalização inteligente.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('imagens/banner_03.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                    style="object-fit: cover; filter: brightness(0.5);" alt="Banner 3">
                <div
                    class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-white text-center">
                    <h1 class="display-5 fw-bold">Conecte-se com o trabalho ideal</h1>
                    <p class="lead">Use sua localização para encontrar vagas perto de você.</p>
                </div>
            </div>
        </div>

        <!-- Controles (opcional) -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
@endsection
