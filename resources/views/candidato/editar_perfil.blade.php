<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800 text-center">Editar Perfil Profissional</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('candidato.perfil.salvar') }}" x-data="formPerfilProfissional()"
            x-init='initBlocos(@json($perfilFuncoes ?? []))'>
            @csrf

            {{-- Adicionar nova função --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Adicionar nova função</label>
                <div class="flex space-x-2">
                    <select x-model="novaFuncao" class="w-full border rounded px-3 py-2">
                        <option value="">Selecione...</option>
                        @foreach ($funcoes as $funcao)
                            <option value="{{ $funcao->id }}">{{ $funcao->nome }}</option>
                        @endforeach
                    </select>
                    <button type="button" @click="adicionar"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Adicionar
                    </button>
                </div>

                {{-- Erro ao ultrapassar 5 --}}
                <template x-if="erroLimite">
                    <p class="text-red-600 text-sm mt-2">Você só pode adicionar até 5 funções.</p>
                </template>
            </div>

            {{-- Blocos dinâmicos --}}
            <template x-for="(bloco, index) in blocos" :key="index">
                <div class="mb-6 border rounded p-4 bg-gray-50 space-y-4">
                    {{-- Função --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Função</label>
                        <select :name="`funcoes_compostas[${index}][funcao_id]`" x-model="bloco.funcao_id"
                            class="w-full border rounded px-3 py-2 bg-white">
                            <option value="">Selecione...</option>
                            @foreach ($funcoes as $funcao)
                                <option value="{{ $funcao->id }}">{{ $funcao->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tipo de contrato --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo de contrato</label>
                        <select :name="`funcoes_compostas[${index}][tipo_contrato]`" x-model="bloco.tipo_contrato"
                            class="w-full border rounded px-3 py-2 bg-white">
                            <option value="CLT">CLT</option>
                            <option value="PJ">PJ</option>
                            <option value="Freelancer">Freelancer</option>
                        </select>
                    </div>

                    {{-- Dias disponíveis --}}
                    <div x-show="['PJ', 'Freelancer'].includes(bloco.tipo_contrato)">
                        <label class="block text-sm font-medium text-gray-700">Dias disponíveis</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach (['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'] as $dia)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" :name="`funcoes_compostas[${index}][dias_disponiveis][]`"
                                        value="{{ $dia }}"
                                        @change="(e) => {
                                            if (e.target.checked) {
                                                bloco.dias_disponiveis.push('{{ $dia }}');
                                            } else {
                                                bloco.dias_disponiveis = bloco.dias_disponiveis.filter(d => d !== '{{ $dia }}');
                                            }
                                        }"
                                        :checked="bloco.dias_disponiveis.includes('{{ $dia }}')">
                                    <span>{{ $dia }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Turnos disponíveis --}}
                    <div x-show="['PJ', 'Freelancer'].includes(bloco.tipo_contrato)">
                        <label class="block text-sm font-medium text-gray-700 mt-4">Turnos disponíveis</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach (['Manhã', 'Tarde', 'Noite'] as $turno)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" :name="`funcoes_compostas[${index}][turnos][]`"
                                        value="{{ $turno }}"
                                        @change="(e) => {
                                            if (e.target.checked) {
                                                bloco.turnos.push('{{ $turno }}');
                                            } else {
                                                bloco.turnos = bloco.turnos.filter(t => t !== '{{ $turno }}');
                                            }
                                        }"
                                        :checked="bloco.turnos.includes('{{ $turno }}')">
                                    <span>{{ $turno }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Remover função --}}
                    <div class="text-right">
                        <button type="button" @click="remover(index)" class="text-red-600 text-sm hover:underline">
                            Remover função
                        </button>
                    </div>
                </div>
            </template>

            {{-- Botão de envio --}}
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 w-full">
                    Salvar Perfil Profissional
                </button>
            </div>
        </form>
    </div>

    {{-- Script Alpine --}}
    <script>
        function formPerfilProfissional() {
            return {
                blocos: [],
                novaFuncao: '',
                erroLimite: false,
                initBlocos(valores) {
                    this.blocos = valores;
                },
                adicionar() {
                    if (this.blocos.length >= 5) {
                        this.erroLimite = true;
                        setTimeout(() => this.erroLimite = false, 3000);
                        return;
                    }
                    if (this.novaFuncao && !this.blocos.find(b => b.funcao_id == this.novaFuncao)) {
                        this.blocos.push({
                            funcao_id: parseInt(this.novaFuncao),
                            tipo_contrato: 'Freelancer',
                            dias_disponiveis: [],
                            turnos: []
                        });
                        this.novaFuncao = '';
                    }
                },
                remover(index) {
                    this.blocos.splice(index, 1);
                }
            }
        }
    </script>
</x-app-layout>
