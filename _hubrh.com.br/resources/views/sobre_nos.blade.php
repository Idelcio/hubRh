@extends('layouts.main_layout')

@section('content')
    <!-- Conteúdo -->
    <div class="container my-5">
        <div class="bg-white p-5 rounded shadow">
            <!-- Missão -->
            <h2 class="mb-3"><i class="fas fa-bullseye text-primary me-2"></i> Missão</h2>
            <p>Garantir <strong>acessibilidade ao trabalho</strong>, conectando empresas e talentos próximos, de forma
                direta, prática e sem burocracia.</p>

            <!-- Problemas que resolvemos -->
            <h2 class="mt-5 mb-3"><i class="fas fa-exclamation-triangle text-warning me-2"></i> Problemas que Resolvemos
            </h2>
            <ul class="list-unstyled ms-3">
                <li class="mb-2"><i class="fas fa-times-circle text-danger me-2"></i> Dificuldade das empresas em
                    preencher vagas rapidamente</li>
                <li class="mb-2"><i class="fas fa-route text-danger me-2"></i> Longos deslocamentos desmotivando
                    trabalhadores</li>
                <li class="mb-2"><i class="fas fa-plug text-danger me-2"></i> Falta de conexão eficiente entre oferta e
                    demanda</li>
            </ul>

            <!-- Soluções -->
            <h2 class="mt-5 mb-3"><i class="fas fa-rocket text-success me-2"></i> Nossas Soluções</h2>
            <ul class="list-unstyled ms-3">
                <li class="mb-2"><i class="fas fa-map-marker-alt text-success me-2"></i> Plataforma com geolocalização
                    integrada</li>
                <li class="mb-2"><i class="fas fa-bolt text-success me-2"></i> Processo de recrutamento ágil e
                    desburocratizado</li>
                <li class="mb-2"><i class="fas fa-brain text-success me-2"></i> Algoritmo inteligente que prioriza
                    candidatos próximos</li>
                <li class="mb-2"><i class="fas fa-money-bill-wave text-success me-2"></i> Redução de custos operacionais
                    com contratações</li>
            </ul>

            <!-- Impacto e diferenciais -->
            <h2 class="mt-5 mb-3"><i class="fas fa-leaf text-success me-2"></i> Impacto e Diferenciais</h2>
            <ul class="list-unstyled ms-3">
                <li class="mb-2"><i class="fas fa-recycle text-success me-2"></i> Sustentável: menos deslocamentos, menor
                    impacto ambiental</li>
                <li class="mb-2"><i class="fas fa-users text-success me-2"></i> Inclusiva: oportunidades para CLT e
                    freelancers</li>
                <li class="mb-2"><i class="fas fa-coins text-success me-2"></i> Monetização através de assinaturas e taxas
                    por contratação</li>
            </ul>

            <!-- Próximos passos -->
            <h2 class="mt-5 mb-3"><i class="fas fa-chart-line text-info me-2"></i> Próximos Passos</h2>
            <ul class="list-unstyled ms-3">
                <li class="mb-2"><i class="fas fa-users text-info me-2"></i> Expandir a base de usuários em todo o Brasil
                </li>
                <li class="mb-2"><i class="fas fa-hand-holding-usd text-info me-2"></i> Atrair investimentos para
                    fortalecer a plataforma</li>
                <li class="mb-2"><i class="fas fa-industry text-info me-2"></i> Transformar o mercado de recrutamento no
                    setor comercial</li>
            </ul>

            <!-- Chamada final -->
            <div class="mt-5 text-center">
                <h4 class="fw-bold">Venha conosco fazer parte dessa transformação!</h4>
                <a href="{{ route('register') }}" class="btn btn-laranja mt-3">Quero me cadastrar</a>
            </div>
        </div>
    </div>
@endsection
