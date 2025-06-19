@extends('layouts.main_layout')

@section('content')


    <!-- BANNERS DESKTOP -->
    <div class="hidden md:block relative w-full overflow-hidden" x-data="{ currentSlide: 1, slides: 3 }">

        <!-- Slides -->
        <div class="flex transition-transform duration-700"
            :style="'transform: translateX(-' + (currentSlide - 1) * 100 + '%)'">

            <!-- Slide 1 -->
            <div class="w-full flex-shrink-0 h-[550px] bg-cover bg-center relative"
                style="background-image: url('{{ asset('imagens/hub_.png') }}')">

                <div
                    class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black/40 px-4">
                    <img src="{{ asset('assets/images/logo_trans.png') }}" alt="Logo Central" class="w-72 mb-4">
                    <h2 class="text-3xl font-bold mb-2">O futuro do Recrutamento no Comércio</h2>
                    <p class="text-lg">Facilitamos o acesso ao trabalho perto de você</p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="w-full flex-shrink-0 h-[550px] bg-cover bg-center relative"
                style="background-image: url('{{ asset('imagens/banner_02.jpg') }}')">

                <div
                    class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black/40 px-4">
                    <h1 class="text-4xl font-bold mb-2">Empresas mais próximas, processos mais ágeis</h1>
                    <p class="text-lg">Geolocalização inteligente para contratar melhor.</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="w-full flex-shrink-0 h-[550px] bg-cover bg-center relative"
                style="background-image: url('{{ asset('imagens/banner_03.jpg') }}')">

                <div
                    class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black/40 px-4">
                    <h1 class="text-4xl font-bold mb-2">Conecte-se com o trabalho ideal</h1>
                    <p class="text-lg">Use sua localização para encontrar vagas perto de você.</p>
                </div>
            </div>

        </div>

        <!-- Prev / Next -->
        <button @click="currentSlide = currentSlide === 1 ? slides : currentSlide - 1"
            class="absolute top-1/2 left-4 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white font-bold rounded-full p-2">
            ‹
        </button>
        <button @click="currentSlide = currentSlide === slides ? 1 : currentSlide + 1"
            class="absolute top-1/2 right-4 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white font-bold rounded-full p-2">
            ›
        </button>

    </div>

    <!-- BANNER MOBILE (só no celular) -->
    <div
        class="md:hidden flex flex-col justify-center items-center min-h-screen bg-blue-700 text-white px-4 py-8 space-y-6">

        <!-- Texto principal -->
        <h1 class="text-4xl font-bold text-left leading-tight w-full">
            ENCONTRE A <br> OPORTUNIDADE MAIS <br> PERTO DE VOCÊ
        </h1>

        <!-- Imagem (homem) -->
        <img src="{{ asset('imagens/banner_homem.png') }}" alt="Encontre a oportunidade" class="w-3/4 max-w-xs">

        <!-- Botão -->
        <a href="{{ route('register') }}"
            class="inline-flex items-center justify-center h-12 px-6 rounded-full bg-orange-500 hover:bg-orange-600 text-white font-semibold text-lg shadow text-center">
            Cadastre-se aqui
        </a>

        <!-- Texto "Baixe o HubRH como App" -->
        <div class="bg-blue-800 rounded-lg p-4 text-sm space-y-3 w-full mt-6">
            <h2 class="text-lg font-bold text-orange-400">Baixe o HubRH como App no seu celular!</h2>
            <p>Você pode adicionar o HubRH na tela do seu celular, e acessar rapidinho como se fosse um aplicativo. É super
                simples!</p>

            <p class="font-semibold">No Android (Google Chrome):</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Abra o site no navegador</li>
                <li>Toque nos "3 pontinhos" no canto superior direito</li>
                <li>Clique em "Adicionar à tela inicial"</li>
                <li>Prontinho! Vai aparecer um ícone do HubRH na sua tela</li>
            </ul>

            <p class="font-semibold mt-3">No iPhone (Safari):</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Abra o site no Safari</li>
                <li>Toque no botão de compartilhar (quadrado com seta pra cima)</li>
                <li>Clique em "Adicionar à Tela de Início"</li>
                <li>O ícone do HubRH vai aparecer na tela do seu iPhone, como um app</li>
            </ul>
        </div>

    </div>
@endsection
