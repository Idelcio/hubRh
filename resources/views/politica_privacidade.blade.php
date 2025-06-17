@extends('layouts.main_layout')

@section('content')
    <div class="container py-5 my-5">
        <div class="bg-white p-5 rounded shadow-lg mx-auto" style="max-width: 900px;">
            <h1 class="text-3xl fw-bold mb-4 text-primary">Política de Privacidade</h1>

            <p class="text-secondary mb-4">
                Esta Política de Privacidade descreve como o <strong>Hub RH</strong> coleta, usa e protege as informações
                pessoais fornecidas pelos usuários ao utilizar nossa plataforma.
            </p>

            <h2 class="h5 fw-bold mt-4">1. Coleta de informações</h2>
            <p class="text-secondary">
                Coletamos dados fornecidos diretamente pelos usuários, como nome, e-mail, telefone, CPF/CNPJ, localização
                (via CEP), entre outros dados necessários para o funcionamento da plataforma.
            </p>

            <h2 class="h5 fw-bold mt-4">2. Uso das informações</h2>
            <p class="text-secondary">
                As informações coletadas são utilizadas para:
            </p>
            <ul class="text-secondary ms-3">
                <li>Conectar empresas e candidatos próximos geograficamente</li>
                <li>Gerar recomendações de vagas ou perfis compatíveis</li>
                <li>Entrar em contato com os usuários quando necessário</li>
                <li>Melhorar nossos serviços e a experiência do usuário</li>
            </ul>

            <h2 class="h5 fw-bold mt-4">3. Compartilhamento de dados</h2>
            <p class="text-secondary">
                Não compartilhamos dados pessoais com terceiros, exceto quando necessário para fins de recrutamento
                autorizado, obrigações legais ou prestação do serviço de forma adequada.
            </p>

            <h2 class="h5 fw-bold mt-4">4. Proteção de dados</h2>
            <p class="text-secondary">
                Utilizamos medidas técnicas e organizacionais apropriadas para proteger os dados pessoais contra acesso não
                autorizado, perda ou divulgação indevida.
            </p>

            <h2 class="h5 fw-bold mt-4">5. Direitos do usuário</h2>
            <p class="text-secondary">
                Em conformidade com a LGPD (Lei Geral de Proteção de Dados), o usuário tem o direito de:
            </p>
            <ul class="text-secondary ms-3">
                <li>Acessar, corrigir ou excluir seus dados pessoais</li>
                <li>Solicitar a portabilidade ou anonimização dos dados</li>
                <li>Revogar o consentimento a qualquer momento</li>
            </ul>

            <h2 class="h5 fw-bold mt-4">6. Contato</h2>
            <p class="text-dark">
                Em caso de dúvidas, sugestões ou solicitações relacionadas à privacidade, entre em contato pelo e-mail:
                <a href="mailto:contato@hubrh.com.br"
                    class="text-decoration-underline text-primary">contato@hubrh.com.br</a>.
            </p>

            <p class="text-muted small mt-4">
                Esta política pode ser atualizada periodicamente. Recomendamos que os usuários revisem esta página
                regularmente.
            </p>
        </div>
    </div>
@endsection
