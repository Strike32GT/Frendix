<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoría') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
            <form action="{{ route('categorias.update', $categoria->_id_categories) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="Nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                    <input type="text" name="Nombre" id="Nombre" value="{{ old('Nombre', $categoria->Nombre) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>
                    @error('Nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('categorias.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
