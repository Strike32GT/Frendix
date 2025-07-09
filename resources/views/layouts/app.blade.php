<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Frendix_sin_nombre.png') }}"> 

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#eaddc4]">

    <x-banner />

    <div class="min-h-screen flex">
        {{-- Sidebar personalizado --}}
        <aside class="w-64 bg-white shadow px-6 py-8">
            {{-- Logo y título --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/Logo_Frendix_sin_nombre.png') }}" class="h-12 mx-auto mb-2" />
                <p class="font-bold text-sm text-gray-700">CINEMA CLOSER</p>
            </div>

            {{-- Menú separado del logo --}}
            <div class="mt-10"> {{-- << AQUI el ESPACIADO verdadero --}}
                <nav class="flex flex-col gap-6 text-base font-semibold text-gray-700">
                    <a href="{{ route('usuarios.index') }}" class="hover:text-orange-500 transition">Gestión de Usuarios</a>
                    <a href="{{ route('peliculas.create') }}" class="hover:text-orange-500 transition">Subir Película</a>
                    <a href="{{ route('series.create') }}" class="hover:text-orange-500 transition">Subir Serie</a>
                    <a href="{{ route('peliculas.index') }}" class="hover:text-orange-500 transition">Lista de Películas</a>
                    <a href="{{ route('series.index') }}" class="hover:text-orange-500 transition">Lista de Series</a>
                    <a href="{{ route('categorias.index') }}" class="hover:text-orange-500 transition">Lista de Categorías</a>
                </nav>
            </div>
        </aside>

        {{-- Contenido principal --}}
        <div class="flex-1 p-6 bg-[#eaddc4]">
            {{-- Header con buscador y perfil --}}
            <header class="flex justify-between items-center mb-6">
                <div class="relative w-1/2">
                    <input type="text" placeholder="Buscar película, serie o categoria" class="w-full pl-12 pr-4 py-3 text-base rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                {{-- Foto de perfil real del usuario --}}
                <div class="ml-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>
                        </span>
                    @endif
                </div>
            </header>

            {{-- Encabezado de página (opcional) --}}
            @if (isset($header))
                <div class="bg-white rounded-xl shadow px-6 py-4 mb-6">
                    {{ $header }}
                </div>
            @endif

            {{-- Contenido dinámico --}}
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>