<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME', 'HubRH') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />

    <!-- Font Awesome -->
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

        /* 🎯 AJUSTES PARA O SLIDE 1 */
        .carousel-caption img.logo-central {
            width: 300px;
            max-width: 80%;
        }

        .carousel-caption h1.slide-title {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .carousel-caption p.slide-subtitle {
            font-size: 1.25rem;
            margin-top: 0.5rem;
        }

        .carousel-caption h2.caption-title {
            font-size: 1.8rem;
            font-weight: bold;
            background: white;
            color: black;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin-top: 1rem;
        }

        .carousel-caption p.caption-subtitle {
            font-size: 1.1rem;
            margin-top: 0.5rem;
        }

        .carousel-caption.custom-position {
            top: 20%;
            transform: translateY(-30%);
        }

        @media (max-width: 768px) {
            .carousel-caption img.logo-central {
                width: 100px;
                margin-top: 5rem;
                /* um pouco mais baixo, mas não muito */
                margin-bottom: 0.5rem;
                /* aproxima do texto */
            }

            .carousel-caption h2.caption-title,
            .carousel-caption p.caption-subtitle {
                display: inline-block;
                font-size: 0.9rem;
                padding: 0.4rem 0.6rem;
                margin: 0;
                vertical-align: middle;
            }

            .carousel-caption h2.caption-title {
                background: white;
                color: black;
                border-radius: 4px;
                margin-right: 0.4rem;
            }

            .carousel-caption p.caption-subtitle {
                color: white;
                font-weight: 400;
            }

        }

        /* Dropdown fix para mobile */
        @media (max-width: 991.98px) {
            .navbar-nav .dropdown-menu {
                display: none;
                position: static !important;
                float: none;
                width: 100%;
                margin-top: 0;
                background-color: #001f4d;
                border: none;
                box-shadow: none;
            }

            .navbar-nav .dropdown-menu.show {
                display: block;
            }

            .dropdown-menu .dropdown-item {
                color: white;
                padding: 0.75rem 1.25rem;
            }

            .dropdown-menu .dropdown-item:hover {
                background-color: #003366;
            }
        }
        
          @media (max-width: 768px) {
            .carousel-item.banner-2 .carousel-caption {
                margin-top: 10rem; /* ou 6rem, ajuste como quiser */
            }
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
                    <!-- Candidato -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navParaVoce" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Candidato
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navParaVoce">
                            <li><a class="dropdown-item" href="{{ route('buscar_vaga') }}">Buscar vagas</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Cadastro</a></li>
                        </ul>
                    </li>

                    <!-- Empresa -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navParaEmpresas" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Empresa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navParaEmpresas">
                            <li><a class="dropdown-item" href="{{ route('publicar_vaga') }}">Publicar vaga</a></li>
                            <li><a class="dropdown-item" href="{{ route('buscar_candidato') }}">Buscar candidatos</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Cadastro</a></li>
                        </ul>
                    </li>

                    <!-- Sobre nós -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobre_nos') }}">Sobre nós</a>
                    </li>
                </ul>

                <!-- Botões -->
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
