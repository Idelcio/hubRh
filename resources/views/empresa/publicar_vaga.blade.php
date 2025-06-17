@extends('layouts.main_layout')

@section('content')
    <div class="container py-5 my-5">
        <div class="bg-white p-5 rounded shadow-lg mx-auto" style="max-width: 900px;">
            <h1 class="text-3xl fw-bold mb-4 text-primary">📢 Publique suas Vagas com Facilidade</h1>

            <p class="text-dark mb-4">
                No <strong>Hub RH</strong>, publicar suas vagas é rápido, intuitivo e eficiente. Nossa plataforma foi
                desenvolvida para tornar o processo de recrutamento mais ágil e assertivo.
            </p>

            <h2 class="h5 fw-bold mt-4">✅ Como funciona?</h2>
            <ul class="text-dark ms-3">
                <li><strong>Preencha os dados da vaga:</strong> informe título, tipo de contrato, localização, salário
                    (opcional) e os requisitos desejados.</li>
                <li><strong>Escolha o perfil ideal:</strong> defina os turnos disponíveis, habilidades necessárias e
                    preferências específicas.</li>
                <li><strong>Publique com um clique:</strong> sua vaga ficará visível para candidatos próximos, com base em
                    geolocalização.</li>
                <li><strong>Receba candidaturas automaticamente:</strong> os candidatos compatíveis poderão se candidatar em
                    tempo real.</li>
            </ul>

            <h2 class="h5 fw-bold mt-4">🎯 Benefícios para sua empresa:</h2>
            <ul class="text-dark ms-3">
                <li>Encontre talentos <strong>próximos da sua localização</strong>, economizando tempo e custos de
                    deslocamento.</li>
                <li><strong>Evite burocracias</strong> e centralize todas as vagas em um único painel de controle.</li>
                <li>Receba <strong>notificações em tempo real</strong> sempre que um candidato se interessar pela sua vaga.
                </li>
            </ul>

            <p class="text-muted small mt-4">
                Pronto para encontrar o talento ideal? Clique em <strong>“Cadastrar Vaga”</strong> no seu painel e comece
                agora!
            </p>
        </div>
    </div>
@endsection
