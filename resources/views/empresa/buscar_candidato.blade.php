@extends('layouts.main_layout')

@section('content')
    <div class="container py-5 my-5">
        <div class="bg-white p-5 rounded shadow-lg mx-auto" style="max-width: 900px;">
            <h1 class="text-3xl fw-bold mb-4 text-primary">
                <i class="fas fa-users me-2"></i>Encontre Candidatos com Precisão e Agilidade
            </h1>

            <p class="text-dark mb-4">
                A funcionalidade <strong>“Buscar Candidatos”</strong> do Hub RH permite que você visualize profissionais
                ideais para sua vaga com poucos cliques. Nossa busca é rápida, inteligente e baseada em geolocalização.
            </p>

            <h2 class="h5 fw-bold mt-4">
                <i class="fas fa-search-location me-2 text-success"></i>Busca por Proximidade
            </h2>
            <ul class="text-dark ms-3">
                <li><strong>Filtragem por CEP e raio:</strong> visualize apenas candidatos que estão dentro de um raio de
                    2km, 5km ou 10km da sua empresa.</li>
                <li><strong>Resultados em tempo real:</strong> a cada filtro aplicado, a lista é atualizada imediatamente.
                </li>
                <li><strong>Perfil detalhado:</strong> veja nome, preferências profissionais, turnos e disponibilidade.</li>
            </ul>

            <h2 class="h5 fw-bold mt-4">
                <i class="fas fa-bolt me-2 text-warning"></i>Por que usar a busca do Hub RH?
            </h2>
            <ul class="text-dark ms-3">
                <li><strong>Economia de tempo:</strong> evite anúncios e triagens demoradas.</li>
                <li><strong>Contrate com mais segurança:</strong> visualize perfis reais e atualizados.</li>
                <li><strong>Conecte-se com rapidez:</strong> entre em contato diretamente com os candidatos interessados.
                </li>
            </ul>

            <p class="text-muted small mt-4">
                <i class="fas fa-lightbulb me-1 text-primary"></i>
                Comece agora a <strong>buscar talentos perto de você</strong> e torne o processo de contratação mais
                eficiente com o Hub RH.
            </p>
        </div>
    </div>
@endsection
