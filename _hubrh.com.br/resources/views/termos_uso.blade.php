@extends('layouts.main_layout')

@section('content')
    <div class="container py-5 my-5">
        <div class="bg-white p-5 rounded shadow-lg mx-auto" style="max-width: 900px;">
            <h1 class="text-3xl fw-bold mb-4 text-primary">Termos de Uso</h1>

            <p class="text-dark mb-4">
                Este Termo de Uso regula a utilização da plataforma <strong>Hub RH</strong>, disponível por meio do site e
                serviços oferecidos aos usuários (candidatos e empresas). Ao acessar ou utilizar nossos serviços, você
                concorda com os termos aqui descritos.
            </p>

            <h2 class="h5 fw-bold mt-4">1. Aceitação dos termos</h2>
            <p class="text-dark">
                Ao se cadastrar ou utilizar os serviços do Hub RH, o usuário declara ter lido, compreendido e aceitado
                integralmente este Termo de Uso e a <a href="{{ route('politica_privacidade') }}"
                    class="text-primary text-decoration-underline">Política de Privacidade</a>

            </p>

            <h2 class="h5 fw-bold mt-4">2. Cadastro e uso da plataforma</h2>
            <p class="text-dark">
                Para acessar os recursos da plataforma, o usuário deve fornecer informações reais e atualizadas. O uso
                indevido, fornecimento de dados falsos ou atividade fraudulenta resultará em suspensão ou cancelamento do
                acesso.
            </p>

            <h2 class="h5 fw-bold mt-4">3. Responsabilidades do usuário</h2>
            <ul class="text-dark ms-3">
                <li>Manter seus dados atualizados</li>
                <li>Utilizar a plataforma de forma ética e legal</li>
                <li>Não divulgar conteúdo ofensivo, discriminatório ou ilícito</li>
                <li>Respeitar os direitos de outros usuários e das empresas</li>
            </ul>

            <h2 class="h5 fw-bold mt-4">4. Responsabilidades do Hub RH</h2>
            <p class="text-dark">
                O Hub RH se compromete a manter a plataforma em funcionamento, com segurança e proteção de dados. No
                entanto, não se responsabiliza por decisões tomadas pelas empresas com base em perfis ou candidaturas, nem
                garante a contratação de candidatos.
            </p>

            <h2 class="h5 fw-bold mt-4">5. Rescisão e cancelamento</h2>
            <p class="text-dark">
                O usuário pode solicitar a exclusão da sua conta a qualquer momento. O Hub RH também pode encerrar o acesso
                em casos de violação destes termos ou uso indevido da plataforma.
            </p>

            <h2 class="h5 fw-bold mt-4">6. Alterações nos termos</h2>
            <p class="text-dark">
                Reservamo-nos o direito de modificar estes termos a qualquer momento. Alterações relevantes serão
                comunicadas com antecedência. O uso contínuo da plataforma após as mudanças será considerado como aceitação
                dos novos termos.
            </p>

            <h2 class="h5 fw-bold mt-4">7. Contato</h2>
            <p class="text-dark">
                Em caso de dúvidas, entre em contato conosco pelo e-mail:
                <a href="mailto:contato@hubrh.com.br"
                    class="text-primary text-decoration-underline">contato@hubrh.com.br</a>.
            </p>

            <p class="text-muted small mt-4">
                Última atualização: {{ now()->format('d/m/Y') }}
            </p>
        </div>
    </div>
@endsection
