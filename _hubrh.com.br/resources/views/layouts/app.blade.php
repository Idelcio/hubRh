<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HubRH') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Fonts (Figtree) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

  @php
    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
@endphp

<!-- CSS compilado -->
<link rel="stylesheet" href="{{ asset('build/' . $manifest['resources/css/app.css']['file']) }}">

<!-- JS compilado -->
<script type="module" src="{{ asset('build/' . $manifest['resources/js/app.js']['file']) }}"></script>
</head>


<body class="font-sans antialiased">
    <div class="min-h-screen" style="background-color: rgb(1, 57, 131);">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="shadow" style="background-color: #001f4d;">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- Bootstrap Bundle com Popper.js -->
<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>

</body>

</body>

</html>
