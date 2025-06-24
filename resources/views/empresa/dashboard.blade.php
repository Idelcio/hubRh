<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white text-center">Painel da Empresa</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded shadow text-center">
        <p class="text-lg text-gray-700 font-semibold">Bem-vindo, {{ $user->name }}</p>
        <p class="mt-2 text-sm text-gray-500">Seu plano atual: <strong>{{ ucfirst($user->plano ?? 'basico') }}</strong>
        </p>

        {{-- Botões de ação --}}
        <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('empresa.vagas.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow">
                + Publicar nova vaga
            </a>

            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">
                Ver plano e pagamentos
            </a>
        </div>
        @if ($vagas->count())
            <div class="mt-10 text-left">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Vagas publicadas</h3>

                <div class="space-y-4">
                    @foreach ($vagas as $vaga)
                        <div class="border rounded p-4 bg-gray-50 shadow-sm">
                            <h4 class="text-md font-semibold text-gray-700">{{ $vaga->titulo }}</h4>
                            <p class="text-sm text-gray-600">
                                <strong>Função:</strong> {{ $vaga->funcao->nome }} |
                                <strong>Tipo:</strong> {{ $vaga->tipo_contrato }}
                            </p>
                            <div class="mt-2">
                                <a href="{{ route('empresa.vagas.show', $vaga->id) }}"
                                    class="text-blue-600 hover:underline text-sm">Ver detalhes</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="mt-10 text-gray-500 text-sm">Você ainda não publicou nenhuma vaga.</p>
        @endif

    </div>
</x-app-layout>
