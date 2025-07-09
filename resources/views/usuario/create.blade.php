<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf

                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label for="Nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                        <input type="text" id="Nombre" name="Nombre" required
                               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 bg-gray-100 text-sm"
                               placeholder="Nombre del usuario" value="{{ old('Nombre') }}">
                        @error('Nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-6">
                        <label for="Password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña:</label>
                        <input type="password" id="Password" name="Password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-orange-500 bg-gray-100 text-sm"
                               placeholder="Contraseña">
                        @error('Password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <div class="flex gap-3 justify-end">
                        <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded font-medium transition-colors text-sm">
                            Confirmar
                        </button>
                        <a href="{{ route('usuarios.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded font-medium transition-colors text-sm">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
