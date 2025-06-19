@extends('layouts.main_layout')

@section('content')
    <!-- Conteúdo -->
    <div class="max-w-4xl mx-auto my-8 px-4">
        <div class="bg-white p-6 rounded-lg shadow">

            <!-- Missão -->
            <h2 class="text-2xl font-bold mb-3 flex items-center text-blue-700">
                <i class="fas fa-bullseye mr-2"></i> Missão
            </h2>
            <p class="text-gray-700 mb-6">
                Garantir <strong>acessibilidade ao trabalho</strong>, conectando empresas e talentos próximos,
                de forma direta, prática e sem burocracia.
            </p>

            <!-- Problemas que resolvemos -->
            <h2 class="text-2xl font-bold mb-3 mt-8 flex items-center text-yellow-600">
                <i class="fas fa-exclamation-triangle mr-2"></i> Problemas que Resolvemos
            </h2>
            <ul class="space-y-2 ml-5 list-none text-gray-700">
                <li class="flex items-start"><i class="fas fa-times-circle text-red-500 mr-2 mt-1"></i> Dificuldade das
                    empresas em preencher vagas rapidamente</li>
                <li class="flex items-start"><i class="fas fa-route text-red-500 mr-2 mt-1"></i> Longos deslocamentos
                    desmotivando trabalhadores</li>
                <li class="flex items-start"><i class="fas fa-plug text-red-500 mr-2 mt-1"></i> Falta de conexão eficiente
                    entre oferta e demanda</li>
            </ul>

            <!-- Soluções -->
            <h2 class="text-2xl font-bold mb-3 mt-8 flex items-center text-green-600">
                <i class="fas fa-rocket mr-2"></i> Nossas Soluções
            </h2>
            <ul class="space-y-2 ml-5 list-none text-gray-700">
                <li class="flex items-start"><i class="fas fa-map-marker-alt text-green-500 mr-2 mt-1"></i> Plataforma com
                    geolocalização integrada</li>
                <li class="flex items-start"><i class="fas fa-bolt text-green-500 mr-2 mt-1"></i> Processo de recrutamento
                    ágil e desburocratizado</li>
                <li class="flex items-start"><i class="fas fa-brain text-green-500 mr-2 mt-1"></i> Algoritmo inteligente que
                    prioriza candidatos próximos</li>
                <li class="flex items-start"><i class="fas fa-money-bill-wave text-green-500 mr-2 mt-1"></i> Redução de
                    custos operacionais com contratações</li>
            </ul>

            <!-- Impacto e diferenciais -->
            <h2 class="text-2xl font-bold mb-3 mt-8 flex items-center text-green-600">
                <i class="fas fa-leaf mr-2"></i> Impacto e Diferenciais
            </h2>
            <ul class="space-y-2 ml-5 list-none text-gray-700">
                <li class="flex items-start"><i class="fas fa-recycle text-green-500 mr-2 mt-1"></i> Sustentável: menos
                    deslocamentos, menor impacto ambiental</li>
                <li class="flex items-start"><i class="fas fa-users text-green-500 mr-2 mt-1"></i> Inclusiva: oportunidades
                    para CLT e freelancers</li>
                <li class="flex items-start"><i class="fas fa-coins text-green-500 mr-2 mt-1"></i> Monetização através de
                    assinaturas e taxas por contratação</li>
            </ul>

            <!-- Próximos passos -->
            <h2 class="text-2xl font-bold mb-3 mt-8 flex items-center text-blue-600">
                <i class="fas fa-chart-line mr-2"></i> Próximos Passos
            </h2>
            <ul class="space-y-2 ml-5 list-none text-gray-700">
                <li class="flex items-start"><i class="fas fa-users text-blue-500 mr-2 mt-1"></i> Expandir a base de
                    usuários em todo o Brasil</li>
                <li class="flex items-start"><i class="fas fa-hand-holding-usd text-blue-500 mr-2 mt-1"></i> Atrair
                    investimentos para fortalecer a plataforma</li>
                <li class="flex items-start"><i class="fas fa-industry text-blue-500 mr-2 mt-1"></i> Transformar o mercado
                    de recrutamento no setor comercial</li>
            </ul>

            <!-- Chamada final -->
            <div class="mt-8 text-center">
                <h4 class="text-xl font-bold mb-3">Venha conosco fazer parte dessa transformação!</h4>
                <a href="{{ route('register') }}"
                    class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-full shadow transition">
                    Quero me cadastrar
                </a>
            </div>

        </div>
    </div>
@endsection
