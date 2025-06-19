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

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#001f4d">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/icon-512.png') }}">
</head>

<body class="flex flex-col min-h-screen bg-cover bg-center" style="background-image: url('/imagens/mapa.png')">


    <!-- Navbar (mobile + desktop) -->
    <nav x-data="{ open: false }" class="bg-[#001f4d] text-white px-4 md:px-8 py-3 shadow">
        <div class="flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('assets/images/logo_trans.png') }}" alt="Hub RH" class="h-12">
            </a>

            <!-- Botões mobile -->
            <div class="flex items-center space-x-2 md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <ul class="flex space-x-6 font-medium items-center">

                    <!-- Candidato -->
                    <li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <a href="#" class="hover:text-orange-400 cursor-pointer">Candidato</a>
                        <div x-show="open" x-transition
                            class="absolute left-0 mt-2 bg-[#001f4d] rounded shadow w-44 z-50">
                            <a href="{{ route('buscar_vaga') }}" class="block px-4 py-2 hover:bg-[#003366]">Buscar
                                vagas</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-[#003366]">Cadastro</a>
                        </div>
                    </li>

                    <!-- Empresa -->
                    <li x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <a href="#" class="hover:text-orange-400 cursor-pointer">Empresa</a>
                        <div x-show="open" x-transition
                            class="absolute left-0 mt-2 bg-[#001f4d] rounded shadow w-52 z-50">
                            <a href="{{ route('publicar_vaga') }}" class="block px-4 py-2 hover:bg-[#003366]">Publicar
                                vaga</a>
                            <a href="{{ route('buscar_candidato') }}" class="block px-4 py-2 hover:bg-[#003366]">Buscar
                                candidatos</a>
                            <a href="#" class="block px-4 py-2 hover:bg-[#003366]">Cadastro</a>
                        </div>
                    </li>

                    <!-- Sobre nós -->
                    <li>
                        <a href="{{ route('sobre_nos') }}" class="hover:text-orange-400">Sobre nós</a>
                    </li>
                </ul>

                <!-- Botões -->
                <div class="flex space-x-3 ml-6">
                    <a href="{{ route('login') }}"
                        class="border border-white px-4 py-2 rounded hover:bg-white hover:text-[#001f4d] transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-orange-500 px-4 py-2 rounded text-white hover:bg-orange-600 transition">
                        Registre-se
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition class="md:hidden mt-4 space-y-2">
            <a href="{{ route('buscar_vaga') }}" class="block px-4 py-2 hover:bg-[#003366]">Buscar vagas</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 hover:bg-[#003366]">Cadastro Candidato</a>
            <a href="{{ route('publicar_vaga') }}" class="block px-4 py-2 hover:bg-[#003366]">Publicar vaga</a>
            <a href="{{ route('buscar_candidato') }}" class="block px-4 py-2 hover:bg-[#003366]">Buscar candidatos</a>
            <a href="#" class="block px-4 py-2 hover:bg-[#003366]">Cadastro Empresa</a>
            <a href="{{ route('sobre_nos') }}" class="block px-4 py-2 hover:bg-[#003366]">Sobre nós</a>
            <div class="border-t border-gray-600 mt-2 pt-2 flex flex-col space-y-2">
                <a href="{{ route('login') }}"
                    class="border border-white px-4 py-2 rounded text-center hover:bg-white hover:text-[#001f4d] transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="bg-orange-500 px-4 py-2 rounded text-center text-white hover:bg-orange-600 transition">
                    Registre-se
                </a>
            </div>
        </div>
    </nav>


    <!-- Conteúdo Central -->
    <main class="flex-grow w-full">
        @yield('content')
    </main>

    <!-- Rodapé (desktop only) -->
    <footer
        class="hidden md:flex flex-col md:flex-row justify-between items-center bg-[#001f4d] text-white px-6 py-4 text-sm">
        <div class="mb-2 md:mb-0 text-center md:text-left">
            <strong>Hub RH</strong> &copy; {{ date('Y') }} - Todos os direitos reservados.
        </div>
        <div class="flex flex-wrap items-center gap-4 justify-center md:justify-end text-center">
            <a href="{{ route('lgpd') }}" class="hover:text-orange-400">LGPD</a>
            <a href="{{ route('termos_uso') }}" class="hover:text-orange-400">Termos de Uso</a>
            <a href="{{ route('politica_privacidade') }}" class="hover:text-orange-400">Política de Privacidade</a>
            <a href="https://www.instagram.com/_hubrh/" target="_blank"
                class="hover:text-orange-400 flex items-center space-x-1">
                <i class="fab fa-instagram"></i><span>Instagram</span>
            </a>
            <a href="mailto:contato@hubrh.com.br" class="hover:text-orange-400 flex items-center space-x-1">
                <i class="fas fa-envelope"></i><span>ohubrh@gmail.com</span>
            </a>
        </div>
    </footer>


</body>

</html>
