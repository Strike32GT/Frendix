<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Película') }}
        </h2>
    </x-slot>

    <div class="py-6" style="background-color: #eaddc4;">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Editar Película</h2>

                <form action="{{ route('peliculas.update', $pelicula->id_movies) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <!-- Nombre -->
                        <div>
                            <label for="Nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre de la Película:</label>
                            <input type="text" name="nombre" id="Nombre" value="{{ old('nombre', $pelicula->Nombre) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('nombre')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Categoría -->
                        <div>
                            <label for="Categoria_Pelicula" class="block text-sm font-medium text-gray-700 mb-1">Categoría:</label>
                            <select name="Categoria_Pelicula" id="Categoria_Pelicula" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">-- Seleccione una categoría --</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->_id_categories }}"
                                        {{ $pelicula->Categoria_Pelicula == $categoria->_id_categories ? 'selected' : '' }}>
                                        {{ $categoria->Nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Categoria_Pelicula')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="Descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción:</label>
                            <textarea name="descripcion" id="Descripcion" rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      required>{{ old('descripcion', $pelicula->Descripcion) }}</textarea>
                            @error('descripcion')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Trailer -->
                        <div>
                            <label for="Trailer" class="block text-sm font-medium text-gray-700 mb-1">URL del Trailer:</label>
                            <input type="text" name="url_trailer" id="Trailer" value="{{ old('url_trailer', $pelicula->Trailer) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('url_trailer')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- URL de la Película -->
                        <div>
                            <label for="URL" class="block text-sm font-medium text-gray-700 mb-1">URL de la Película:</label>
                            <input type="text" name="url_pelicula" id="URL" value="{{ old('url_pelicula', $pelicula->URL) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                   required>
                            @error('url_pelicula')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Miniatura -->
                        <div>
                            <label for="imagen" class="block text-sm font-medium text-gray-700 mb-1">Imagen (Miniatura):</label>
                            <input type="file" name="imagen" id="imagen"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('imagen')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            @if ($pelicula->Miniatura)
                                <p class="text-sm mt-2">Imagen actual:</p>
                                <img src="{{ asset('storage/' . $pelicula->Miniatura) }}" class="w-32 h-auto mt-2 rounded-md">
                            @endif
                        </div>

                        <!-- Fecha de Subida (readonly) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de Subida:</label>
                            <input type="text" value="{{ $pelicula->Fecha_Subida }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed" readonly>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-center gap-4 mt-6">
                        <a href="{{ route('peliculas.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
