<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Serie') }}
        </h2>
    </x-slot>

    <div class="py-6" style="background-color: #eaddc4;">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <!-- Título del Modal -->
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Editar Serie</h2>

                <!-- Formulario -->
                <form action="{{ route('series.update', $serie->id_series) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <!-- Nombre de la Película -->
                        <div>
                            <label for="Nombre" class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre de la Serie:
                            </label>
                            <input type="text" 
                                   name="Nombre" 
                                   id="Nombre" 
                                   value="{{ old('Nombre', $serie->Nombre) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   required>
                            @error('Nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="Descripcion" class="block text-sm font-medium text-gray-700 mb-1">
                                Descripción:
                            </label>
                            <textarea name="Descripcion" 
                                      id="Descripcion" 
                                      rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      required>{{ old('Descripcion', $serie->Descripcion) }}</textarea>
                            @error('Descripcion')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Trailer -->
                        <div>
                            <label for="Trailer" class="block text-sm font-medium text-gray-700 mb-1">
                                URL del Trailer:
                            </label>
                            <input type="text" 
                                   name="Trailer" 
                                   id="Trailer" 
                                   value="{{ old('Trailer', $serie->Trailer) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('Trailer')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        
                        

                        <!-- Miniatura -->
                        <div>
                            <label for="Miniatura" class="block text-sm font-medium text-gray-700 mb-1">
                                URL de la Miniatura:
                            </label>
                            <input type="text" 
                                   name="Miniatura" 
                                   id="Miniatura" 
                                   value="{{ old('Miniatura', $serie->Miniatura) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @error('Miniatura')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Subida (solo lectura) -->
                        <div>
                            <label for="Fecha_Subida" class="block text-sm font-medium text-gray-700 mb-1">
                                Fecha de Subida:
                            </label>
                            <input type="text" 
                                   value="{{ $serie->Fecha_Subida }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100 cursor-not-allowed"
                                   readonly>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-center gap-4 mt-6">
                        <a href="{{ route('series.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 ease-in-out">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 ease-in-out">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>