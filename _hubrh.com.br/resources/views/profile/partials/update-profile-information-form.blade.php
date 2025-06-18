<section>
    <header>
        <h2 class="text-lg font-medium text-black">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Atualize os dados do seu perfil.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @php
            $user = Auth::user();
        @endphp

        {{-- EMPRESA --}}
        @if ($user->isEmpresa())
            <div>
                <x-input-label for="name" value="Nome do Responsável" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                    required />
            </div>

            <div>
                <x-input-label for="nome_fantasia" value="Nome Fantasia" />
                <x-text-input id="nome_fantasia" name="nome_fantasia" type="text" class="mt-1 block w-full"
                    :value="old('nome_fantasia', $user->nome_fantasia)" required />
            </div>

            <div>
                <x-input-label for="cnpj" value="CNPJ" />
                <x-text-input id="cnpj" name="cnpj" type="text" class="mt-1 block w-full" :value="old('cnpj', $user->cnpj)"
                    required />
            </div>

            <div>
                <x-input-label for="telefone" value="Telefone" />
                <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full"
                    :value="old('telefone', $user->telefone)" />
            </div>

            <div>
                <x-input-label for="email" value="Email da Empresa" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    required />
            </div>

            <div>
                <x-input-label for="cep" value="CEP" />
                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full"
                    :value="old('cep', $user->cep)" />
            </div>

            <div>
                <x-input-label for="rua" value="Rua" />
                <x-text-input id="rua" name="rua" type="text" class="mt-1 block w-full"
                    :value="old('rua', $user->rua)" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="bairro" value="Bairro" />
                    <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full"
                        :value="old('bairro', $user->bairro)" />
                </div>

                <div>
                    <x-input-label for="numero" value="Número" />
                    <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full"
                        :value="old('numero', $user->numero)" />
                </div>
            </div>

            <div>
                <x-input-label for="complemento" value="Complemento" />
                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full"
                    :value="old('complemento', $user->complemento)" />
            </div>

            <div>
                <x-input-label for="cidade" value="Cidade" />
                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full"
                    :value="old('cidade', $user->cidade)" />
            </div>

            {{-- CANDIDATO --}}
        @elseif ($user->isCandidato())
            <div>
                <x-input-label for="name" value="Nome Completo" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                    required />
            </div>

            <div>
                <x-input-label for="cpf" value="CPF" />
                <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" :value="old('cpf', $user->cpf)"
                    required />
            </div>

            <div>
                <x-input-label for="data_nascimento" value="Data de Nascimento" />
                <x-text-input id="data_nascimento" name="data_nascimento" type="date" class="mt-1 block w-full"
                    :value="old('data_nascimento', optional($user->data_nascimento)->format('Y-m-d'))" required />
            </div>

            <div>
                <x-input-label for="telefone" value="Telefone" />
                <x-text-input id="telefone" name="telefone" type="text" class="mt-1 block w-full"
                    :value="old('telefone', $user->telefone)" />
            </div>

            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                    :value="old('email', $user->email)" required />
            </div>

            <div>
                <x-input-label for="cep" value="CEP" />
                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full"
                    :value="old('cep', $user->cep)" />
            </div>

            <div>
                <x-input-label for="rua" value="Rua" />
                <x-text-input id="rua" name="rua" type="text" class="mt-1 block w-full"
                    :value="old('rua', $user->rua)" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="bairro" value="Bairro" />
                    <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full"
                        :value="old('bairro', $user->bairro)" />
                </div>

                <div>
                    <x-input-label for="numero" value="Número" />
                    <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full"
                        :value="old('numero', $user->numero)" />
                </div>
            </div>

            <div>
                <x-input-label for="complemento" value="Complemento" />
                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full"
                    :value="old('complemento', $user->complemento)" />
            </div>

            <div>
                <x-input-label for="cidade" value="Cidade" />
                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full"
                    :value="old('cidade', $user->cidade)" />
            </div>
        @endif

        {{-- BOTÃO DE SALVAR --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm text-green-500">Salvo com sucesso.</p>
            @endif
        </div>
    </form>
</section>
