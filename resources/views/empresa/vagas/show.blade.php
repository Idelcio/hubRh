<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-center text-gray-800">
            Detalhes da Vaga: {{ $vaga->titulo }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded shadow space-y-4">
        <p><strong>Função:</strong> {{ $vaga->funcao->nome }}</p>
        <p><strong>Tipo de Contrato:</strong> {{ $vaga->tipo_contrato }}</p>
        <p><strong>Salário:</strong> R$ {{ number_format($vaga->salario, 2, ',', '.') }}</p>
        <p><strong>Horário:</strong> {{ $vaga->hora_inicio }} às {{ $vaga->hora_fim }}</p>

        @if (in_array($vaga->tipo_contrato, ['PJ', 'Freelancer']))
            <p><strong>Dias disponíveis:</strong>
                {{ implode(', ', $vaga->dias_disponiveis ?? []) }}
            </p>
            <p><strong>Turnos disponíveis:</strong>
                {{ implode(', ', $vaga->turnos ?? []) }}
            </p>
        @endif

        <p><strong>Local:</strong> {{ $vaga->empresa->bairro ?? '' }}, {{ $vaga->empresa->cidade ?? '' }}</p>

        <div class="mt-6 text-center">
            <a href="{{ route('dashboard.empresa') }}" class="text-blue-600 hover:underline">← Voltar ao painel</a>
        </div>
        <form method="POST" action="{{ route('empresa.vagas.destroy', $vaga->id) }}"
            onsubmit="return confirm('Tem certeza que deseja excluir esta vaga?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-6 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded shadow">
                Excluir Vaga
            </button>
        </form>

    </div>
</x-app-layout>
