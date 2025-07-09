<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Serie') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="flex gap-6">
                        {{-- Sección izquierda - Miniatura --}}
                        <div class="flex-shrink-0">
                            <div class="mb-4">
                                <div class="relative">
                                    <label for="Miniatura" class="block w-24 h-24 bg-black rounded-lg flex items-center justify-center cursor-pointer">
                                        <div class="text-center text-white">
                                            <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </label>
                                    <input type="file" id="Miniatura" name="Miniatura" accept="image/*" class="hidden">
                                </div>
                            </div>
                            
                            <div class="space-y-2">
                                <button type="button" id="remove-image" class="w-full bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors">
                                    Eliminar Imagen
                                </button>
                                <label for="Miniatura" class="block w-full bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-xs font-medium transition-colors cursor-pointer text-center">
                                    Subir Imagen
                                </label>
                            </div>
                        </div>

                        {{-- Sección derecha - Formulario --}}
                        <div class="flex-1">
                            {{-- Nombre --}}
                            <div class="mb-4">
                                <label for="Nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                                <input type="text" id="Nombre" name="Nombre" required 
                                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-sm bg-gray-100" 
                                       placeholder="Nombre de la serie"
                                       value="{{ old('Nombre') }}">
                                @error('Nombre')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Descripción --}}
                            <div class="mb-4">
                                <label for="Descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción:</label>
                                <textarea id="Descripcion" name="Descripcion" rows="3" required 
                                          class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 resize-none text-sm bg-gray-100" 
                                          placeholder="Describe la serie">{{ old('Descripcion') }}</textarea>
                                @error('Descripcion')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Tráiler --}}
                            <div class="mb-6">
                                <label for="Trailer" class="block text-sm font-medium text-gray-700 mb-2">Tráiler:</label>
                                <div class="relative">
                                    <label for="Trailer" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-medium transition-colors cursor-pointer inline-block text-sm">
                                        Subir Tráiler
                                    </label>
                                    <input type="file" id="Trailer" name="Trailer" accept="video/*" required class="hidden">
                                    <p class="text-xs text-gray-500 mt-2">Formatos: MP4, AVI, MOV, MKV</p>
                                </div>
                                @error('Trailer')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Botones --}}
                            <div class="flex gap-3 justify-end">
                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-medium transition-colors text-sm">
                                    Confirmar
                                </button>
                                <a href="{{ route('series.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-medium transition-colors inline-block text-center text-sm">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @vite(['resources/js/SubirSerie.js'])
</x-app-layout>
