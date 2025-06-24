<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-center text-gray-800">Nova Vaga</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded shadow" x-data="{ tipoContrato: 'CLT' }">
        @if ($errors->has('limite'))
            <div class="mb-4 text-sm text-red-600 font-medium">
                {{ $errors->first('limite') }}
            </div>
        @endif

        <form method="POST" action="{{ route('empresa.vagas.store') }}">
            @csrf

            {{-- Título da vaga --}}
            <div class="mb-4">
                <x-input-label for="titulo" value="Título da Vaga" />
                <x-text-input id="titulo" name="titulo" type="text" class="block mt-1 w-full" required />
            </div>

            {{-- Função --}}
            <div class="mb-4">
                <x-input-label for="funcao_id" value="Função" />
                <select name="funcao_id" id="funcao_id" required class="w-full border rounded px-3 py-2">
                    <option value="">Selecione...</option>
                    @foreach ($funcoes as $funcao)
                        <option value="{{ $funcao->id }}">{{ $funcao->nome }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Salário --}}
            <div class="mb-4">
                <x-input-label for="salario" value="Salário (R$)" />
                <x-text-input id="salario" name="salario" type="number" step="0.01" class="block mt-1 w-full" />
            </div>

            {{-- Horário --}}
            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <x-input-label for="hora_inicio" value="Início" />
                    <x-text-input id="hora_inicio" name="hora_inicio" type="time" class="w-full" />
                </div>
                <div class="flex-1">
                    <x-input-label for="hora_fim" value="Fim" />
                    <x-text-input id="hora_fim" name="hora_fim" type="time" class="w-full" />
                </div>
            </div>

            {{-- Tipo de contrato --}}
            <div class="mb-4">
                <x-input-label for="tipo_contrato" value="Tipo de Contrato" />
                <select name="tipo_contrato" id="tipo_contrato" x-model="tipoContrato"
                    class="w-full border rounded px-3 py-2">
                    <option value="CLT">CLT (Fixo)</option>
                    <option value="PJ">PJ</option>
                    <option value="Freelancer">Freelancer</option>
                </select>
            </div>

            {{-- Dias disponíveis (exibido se PJ ou Freelancer) --}}
            <div class="mb-4" x-show="tipoContrato === 'PJ' || tipoContrato === 'Freelancer'">
                <label class="block font-medium text-sm text-gray-700 mb-1">Dias disponíveis</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach (['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'] as $dia)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="dias_disponiveis[]" value="{{ $dia }}">
                            <span>{{ $dia }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Turnos disponíveis (exibido se PJ ou Freelancer) --}}
            <div class="mb-4" x-show="tipoContrato === 'PJ' || tipoContrato === 'Freelancer'">
                <label class="block font-medium text-sm text-gray-700 mb-1">Turnos disponíveis</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach (['Manhã', 'Tarde', 'Noite'] as $turno)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="turnos[]" value="{{ $turno }}">
                            <span>{{ $turno }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Localização (somente leitura) --}}
            <div class="mb-4">
                <x-input-label for="localizacao" value="Localização" />
                <x-text-input id="localizacao" type="text" class="block mt-1 w-full bg-gray-100" :value="Auth::user()->bairro . ', ' . Auth::user()->cidade"
                    disabled />
            </div>

            {{-- Botão --}}
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 w-full">
                    Publicar Vaga
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
