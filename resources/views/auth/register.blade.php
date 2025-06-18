<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" x-data="{ tipo: '{{ old('tipo', 'candidato') }}' }">
        @csrf

        <!-- Tipo de usuário -->
        <div class="mt-4">
            <x-input-label for="tipo" value="Você é:" />
            <select id="tipo" name="tipo" class="block mt-1 w-full" x-model="tipo" required>
                <option value="candidato">Candidato</option>
                <option value="empresa">Empresa</option>
            </select>
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
        </div>

        <!-- Nome -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700"
                x-text="tipo === 'empresa' ? 'Nome do Responsável' : 'Nome Completo'"></label>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" value="Telefone" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')"
                required />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- CPF -->
        <div class="mt-4" x-show="tipo === 'candidato'">
            <x-input-label for="cpf" value="CPF" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>

        <!-- Data de Nascimento -->
        <div class="mt-4" x-show="tipo === 'candidato'">
            <x-input-label for="data_nascimento" value="Data de Nascimento" />
            <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento"
                :value="old('data_nascimento')" x-bind:required="tipo === 'candidato'" />
            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
        </div>


        <!-- CNPJ -->
        <div class="mt-4" x-show="tipo === 'empresa'">
            <x-input-label for="cnpj" value="CNPJ" />
            <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" />
            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
        </div>

        <!-- Nome Fantasia -->
        <div class="mt-4" x-show="tipo === 'empresa'">
            <x-input-label for="nome_fantasia" value="Nome da Empresa" />
            <x-text-input id="nome_fantasia" class="block mt-1 w-full" type="text" name="nome_fantasia"
                :value="old('nome_fantasia')" />
            <x-input-error :messages="$errors->get('nome_fantasia')" class="mt-2" />
        </div>

        <!-- CEP -->
        <div class="mt-4">
            <x-input-label for="cep" value="CEP" />
            <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')"
                required />
            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
        </div>

        <!-- Rua -->
        <div class="mt-4">
            <x-input-label for="rua" value="Rua" />
            <x-text-input id="rua" class="block mt-1 w-full" type="text" name="rua" :value="old('rua')"
                required />
            <x-input-error :messages="$errors->get('rua')" class="mt-2" />
        </div>

        <!-- Número -->
        <div class="mt-4">
            <x-input-label for="numero" value="Número" />
            <x-text-input id="numero" class="block mt-1 w-full" type="text" name="numero" :value="old('numero')"
                required />
            <x-input-error :messages="$errors->get('numero')" class="mt-2" />
        </div>

        <!-- Bairro -->
        <div class="mt-4">
            <x-input-label for="bairro" value="Bairro" />
            <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')"
                required />
            <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
        </div>

        <!-- Complemento -->
        <div class="mt-4">
            <x-input-label for="complemento" value="Complemento (opcional)" />
            <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento"
                :value="old('complemento')" />
            <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
        </div>

        <!-- Cidade -->
        <div class="mt-4">
            <x-input-label for="cidade" value="Cidade" />
            <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')"
                required />
            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
        </div>

        <!-- Aceitação dos termos -->
        <div class="mt-4">
            <label class="inline-flex items-start">
                <input type="checkbox" name="aceita_termos" required class="mt-1">
                <span class="ml-2 text-sm text-gray-700">
                    Eu li e aceito os
                    <a href="{{ route('termos_uso') }}" target="_blank" class="text-blue-600 underline">Termos de
                        Uso</a>
                    e a
                    <a href="{{ route('politica_privacidade') }}" target="_blank"
                        class="text-blue-600 underline">Política de Privacidade</a>.
                </span>
            </label>
            @error('aceita_termos')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" value="Senha" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Senha -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar Senha" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botões -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Já tem conta?
            </a>

            <x-primary-button class="ml-4">
                Registrar
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cepInput = document.getElementById('cep');
            const ruaInput = document.getElementById('rua');
            const bairroInput = document.getElementById('bairro');
            const cidadeInput = document.getElementById('cidade');

            cepInput.addEventListener('blur', function() {
                const cep = cepInput.value.replace(/\D/g, '');

                if (cep.length !== 8) {
                    return; // não é um CEP válido
                }

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.erro) {
                            console.log('CEP não encontrado.');
                            return;
                        }

                        ruaInput.value = data.logradouro || '';
                        bairroInput.value = data.bairro || '';
                        cidadeInput.value = data.localidade || '';
                    })
                    .catch(error => {
                        console.error('Erro ao buscar CEP:', error);
                    });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const cpfInput = document.getElementById('cpf');
            const cnpjInput = document.getElementById('cnpj');
            const cepInput = document.getElementById('cep');
            const telefoneInput = document.getElementById('telefone');

            // CPF
            if (cpfInput) {
                cpfInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '').slice(0, 11);
                    this.value = value
                        .replace(/(\d{3})(\d)/, '$1.$2')
                        .replace(/(\d{3})(\d)/, '$1.$2')
                        .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                });
            }

            // CNPJ
            if (cnpjInput) {
                cnpjInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '').slice(0, 14);
                    this.value = value
                        .replace(/^(\d{2})(\d)/, '$1.$2')
                        .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
                        .replace(/\.(\d{3})(\d)/, '.$1/$2')
                        .replace(/(\d{4})(\d)/, '$1-$2');
                });
            }

            // CEP
            if (cepInput) {
                cepInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '').slice(0, 8);
                    this.value = value
                        .replace(/(\d{5})(\d)/, '$1-$2');
                });
            }

            // Telefone
            if (telefoneInput) {
                telefoneInput.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '').slice(0, 11);

                    // Se for celular (11 dígitos)
                    if (value.length > 10) {
                        this.value = value
                            .replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
                    } else if (value.length > 6) {
                        this.value = value
                            .replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
                    } else if (value.length > 2) {
                        this.value = value
                            .replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
                    } else {
                        this.value = value.replace(/^(\d{0,2})$/, '($1');
                    }
                });
            }
        });
    </script>

</x-guest-layout>
