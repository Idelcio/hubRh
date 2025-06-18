@extends('layouts.main_layout')

@section('content')
    <!-- Carrossel com 3 banners -->
    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner" style="height: 550px;">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('imagens/hub_.png') }}" class="d-block w-100 h-100 object-fit-cover"
                    style="object-fit: cover;" alt="Banner 1">

                <div
                    class="carousel-caption d-flex flex-column justify-content-center align-items-center text-white text-center custom-position">
                    <img src="{{ asset('assets/images/logo_trans.png') }}" alt="Logo Central" class="logo-central">
                    <h2 class="caption-title">O futuro do Recrutamento no Comércio</h2>
                    <p class="caption-subtitle">Facilitamos o acesso ao trabalho perto de você</p>
                </div>
            </div>



           
             <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('imagens/banner_02.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                    style="object-fit: cover; filter: brightness(0.5);" alt="Banner 2">
                <div
                    class="carousel-caption text-white text-center d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="banner-text-group">
                        <h1 class="banner-title">Empresas mais próximas, processos mais ágeis</h1>
                        <p class="banner-subtitle">Geolocalização inteligente para contratar melhor.</p>
                    </div>
                </div>
            </div>

            



            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('imagens/banner_03.jpg') }}" class="d-block w-100 h-100 object-fit-cover"
                    style="object-fit: cover; filter: brightness(0.5);" alt="Banner 3">
                <div
                    class="carousel-caption text-white text-center d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="banner-text-group">
                        <h1 class="banner-title">Conecte-se com o trabalho ideal</h1>
                        <p class="banner-subtitle">Use sua localização para encontrar vagas perto de você.</p>
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
