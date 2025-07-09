<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda: {{ $query }} - FRENDIX</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js', 'resources/js/home.js'])
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="bg-black shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home.index') }}" class="flex items-center">
                        <i class="fas fa-film text-red-500 text-2xl mr-2"></i>
                        <span class="text-2xl font-bold">FRENDIX</span>
                        <span class="text-sm text-gray-400 ml-2">CINEMA CENTER</span>
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-md mx-8">
                    <form action="{{ route('home.search') }}" method="GET" class="relative">
                        <input type="text" 
                               name="q" 
                               value="{{ $query }}"
                               placeholder="Busca una serie o película..."
                               class="w-full px-4 py-2 pl-10 bg-gray-800 border border-gray-700 rounded-full focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </form>
                </div>

                <!-- User Menu -->
                <div class="flex items-center">
                    <div class="bg-gray-800 p-2 rounded-full hover:bg-gray-700 transition duration-200">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Search Results -->
    <section class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Info -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold mb-2">Resultados de búsqueda</h1>
                <p class="text-gray-400">
                    Mostrando {{ $peliculas->count() }} resultado(s) para: 
                    <span class="text-white font-semibold">"{{ $query }}"</span>
                </p>
            </div>
            
            @if($peliculas->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                    @foreach($peliculas as $pelicula)
                    <div class="movie-card bg-gray-800 rounded-lg overflow-hidden">
                        <div class="relative group">
                            <img src="{{ $pelicula->Miniatura ?? 'https://via.placeholder.com/300x450/1a1a1a/ffffff?text=No+Image' }}" 
                                 alt="{{ $pelicula->Nombre }}" 
                                 class="w-full h-64 object-cover">
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition duration-300 flex items-center justify-center">
                                <div class="opacity-0 group-hover:opacity-100 transition duration-300 text-center">
                                    <a href="{{ $pelicula->URL }}" 
                                       class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-semibold transition duration-200 inline-flex items-center">
                                        <i class="fas fa-play mr-2"></i>
                                        Ver ahora
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Age Rating Badge -->
                            <div class="absolute top-2 left-2 bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold">
                                18+
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-semibold text-lg mb-2 truncate">{{ $pelicula->Nombre }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-2">
                                {{ Str::limit($pelicula->Descripcion, 80) }}
                            </p>
                            <div class="flex items-center mt-2 text-sm text-gray-500">
                                <i class="fas fa-calendar mr-1"></i>
                                {{ \Carbon\Carbon::parse($pelicula->Fecha_Subida)->format('Y') }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <!-- No Results -->
                <div class="text-center py-16">
                    <i class="fas fa-search text-6xl text-gray-600 mb-4"></i>
                    <h2 class="text-2xl font-bold mb-2">No se encontraron resultados</h2>
                    <p class="text-gray-400 mb-6">
                        No pudimos encontrar ninguna película que coincida con tu búsqueda: "{{ $query }}"
                    </p>
                    <a href="{{ route('home.index') }}" 
                       class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200 inline-flex items-center">
                        <i class="fas fa-home mr-2"></i>
                        Volver al inicio
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fas fa-film text-red-500 text-xl mr-2"></i>
                    <span class="text-xl font-bold">FRENDIX</span>
                    <span class="text-sm text-gray-400 ml-2">CINEMA CENTER</span>
                </div>
                <div class="text-sm text-gray-400">
                    © 2024 FRENDIX Cinema Center. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>