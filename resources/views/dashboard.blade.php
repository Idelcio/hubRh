<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#01407a] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white text-lg font-medium space-y-5">
                    <h3 class="text-2xl font-bold mb-4">
                        <i class="fas fa-check-circle text-green-400"></i> Cadastro realizado com sucesso!
                    </h3>

                    <p>
                        Obrigado por se cadastrar no <strong>Hub RH</strong>! <i
                            class="fas fa-smile-beam text-yellow-300"></i><br>
                        Agora você faz parte de uma plataforma feita para <strong>conectar talentos e
                            oportunidades</strong>.
                    </p>

                    <p>
                        <i class="fas fa-envelope-open-text text-blue-300"></i>
                        Em breve, você terá acesso completo aos recursos personalizados com base no seu perfil e
                        localização.<br>
                        Fique de olho no seu e-mail — enviaremos atualizações e novidades diretamente por lá!
                    </p>

                    <p>
                        <i class="fas fa-lock text-white"></i>
                        <strong>Seus dados estão protegidos</strong> e serão utilizados exclusivamente para facilitar
                        conexões profissionais de forma segura e eficiente.
                    </p>

                    <p>
                        <i class="fas fa-headset text-white"></i>
                        Dúvidas? Fale com a gente pelo e-mail:
                        <a href="mailto:contato@hubrh.com.br" class="underline text-white hover:text-gray-200">
                            ohubrh@gmail.com
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
