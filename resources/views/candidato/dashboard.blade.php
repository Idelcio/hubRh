<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-white text-center">Bem-vindo, {{ $user->name }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="{{ route('candidato.perfil.edit') }}"
                class="bg-yellow-500 text-white p-4 rounded-lg text-center hover:bg-yellow-600">
                Editar Perfil Profissional
            </a>


            
            <a href="{{ route('buscar_vaga') }}"
                class="bg-blue-600 text-white p-4 rounded-lg text-center hover:bg-blue-700">
                Buscar Vagas
            </a>


        </div>
    </div>
</x-app-layout>
