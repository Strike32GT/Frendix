<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Película') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <form action="{{ route('peliculas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="flex gap-6">
                        {{-- Sección izquierda - Imagen --}}
                        <div class="flex-shrink-0">
                            <div class="mb-4">
                                <div class="relative">
                                    <label for="imagen" class="block w-24 h-24 bg-black rounded-lg flex items-center justify-center cursor-pointer">
                                        <div class="text-center text-white">
                                            <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </label>
                                    <input type="file" id="imagen" name="imagen" accept="image/*" class="hidden">
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <button type="button" id="remove-image" class="w-full bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                    Eliminar Imagen
                                </button>
                                <label for="imagen" class="block w-full bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors cursor-pointer text-center">
                                    Subir Imagen
                                </label>
                            </div>
                        </div>

                        {{-- Sección derecha - Formulario --}}
                        <div class="flex-1">
                            {{-- Nombre --}}
                            <div class="mb-4">
                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required 
                                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-sm bg-gray-100" 
                                       placeholder="Ingresa el nombre de la película"
                                       value="{{ old('nombre') }}">
                                @error('nombre')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Categoría --}}
                            <div class="mb-4">
                                <label for="Categoria_Pelicula" class="block text-sm font-medium text-gray-700 mb-1">Categoría:</label>
                                <select id="Categoria_Pelicula" name="Categoria_Pelicula" required 
                                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 bg-gray-100 text-sm">
                                    <option value="">Selecciona una categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->_id_categories }}" {{ old('Categoria_Pelicula') == $categoria->_id_categories ? 'selected' : '' }}>
                                            {{ $categoria->Nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('Categoria_Pelicula')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Descripción --}}
                            <div class="mb-4">
                                <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" rows="3" required 
                                          class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 resize-none text-sm bg-gray-100" 
                                          placeholder="Describe la película">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Trailer (URL) --}}
                            <div class="mb-4">
                                <label for="url_trailer" class="block text-sm font-medium text-gray-700 mb-1">Link del Trailer:</label>
                                <input type="url" id="url_trailer" name="url_trailer" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-sm bg-gray-100"
                                       placeholder="https://www.youtube.com/watch?v=..." value="{{ old('url_trailer') }}">
                                @error('url_trailer')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Película (URL) --}}
                            <div class="mb-6">
                                <label for="url_pelicula" class="block text-sm font-medium text-gray-700 mb-1">Link de la Película:</label>
                                <input type="url" id="url_pelicula" name="url_pelicula" required
                                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-sm bg-gray-100"
                                       placeholder="https://mi-servidor.com/pelicula.mp4" value="{{ old('url_pelicula') }}">
                                @error('url_pelicula')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Botones --}}
                            <div class="flex gap-3 justify-end">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-medium transition-colors text-sm">
                                    Confirmar
                                </button>
                                <a href="{{ route('peliculas.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-medium transition-colors inline-block text-center text-sm">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @vite(['resources/js/SubirPelicula.js'])
</x-app-layout>
