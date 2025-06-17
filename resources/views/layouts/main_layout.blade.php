<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME', 'HubRH') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpg') }}" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: url('/imagens/mapa.png') no-repeat center center fixed;

            background-size: cover;
            background-color: #f8f9fa;
        }


        main {
            flex: 1;
            padding: 2rem 0;
        }

        .navbar-hub {
            background-color: #001f4d;
        }

        .btn-laranja {
            background-color: #ff6600;
            color: white;
            border: none;
        }

        .btn-laranja:hover {
            background-color: #e55c00;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-hub shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo_trans.png') }}" alt="Hub RH" height="50">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHub"
                aria-controls="navbarHub" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHub">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navParaVoce" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Candidato
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('buscar_vaga') }}">Buscar vagas</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Cadastro</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navParaEmpresas" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Empresa
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('publicar_vaga') }}">Publicar vaga</a></li>
                            <li><a class="dropdown-item" href="{{ route('buscar_candidato') }}">Buscar candidatos</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Cadastro</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobre_nos') }}">Sobre nós</a>
                    </li>

                </ul>

                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-laranja">Registre-se</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Central -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="bg-dark text-white pt-4 pb-3" style="background-color: #001f4d;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-3 mb-md-0 text-center text-md-start">
                <strong>Hub RH</strong> &copy; {{ date('Y') }} - Todos os direitos reservados.
            </div>
            <div class="text-center text-md-end">
                <a href="{{ route('lgpd') }}" class="text-white text-decoration-none me-3">LGPD</a>

                <a href="{{ route('termos_uso') }}" class="text-white text-decoration-none me-3">Termos de Uso</a>

                <a href="{{ route('politica_privacidade') }}" class="text-white text-decoration-none me-3">Política de
                    Privacidade</a>
                <a href="https://www.instagram.com/_hubrh/" target="_blank"
                    class="text-white text-decoration-none me-3">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="mailto:contato@hubrh.com.br" class="text-white text-decoration-none">
                    <i class="fas fa-envelope"></i> ohubrh@gmail.com
                </a>
            </div>
        </div>
    </footer>




    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
