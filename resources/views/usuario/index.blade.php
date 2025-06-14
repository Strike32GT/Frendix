<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-md rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Usuarios</h3>

            <div class="bg-white rounded-xl shadow-md p-6 w-full">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Usuarios Registradas</h2>

                <table class="w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-100 text-center text-base font-semibold">
                            <th class="py-3">N°</th>
                            <th class="py-3">Nombre</th>
                            <th class="py-3">Contraseña</th>
                            <th class="py-3">Fecha de Creación</th>
                            <th class="py-3">Interacciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr class="hover:bg-gray-50 text-center border-t">
                            <td class="py-3">{{ $usuario->id_movies}}</td>
                            <td class="py-3">{{ $usuario->Nombre}}</td>
                            <td class="py-3">{{ $usuario->Password}}</td>
                            <td class="py-3">{{ $usuario->Fecha_Creacion}}</td>
                            <td class="py-3">
                                {{--
                                <a href="{{ route('categorias.edit', ['categoria' => $categoria->id_categoria]) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded mr-2">
                                    Editar
                                </a>
                                <form
                                    action="{{ route('categorias.destroy', ['categoria' => $categoria->id_categoria]) }}"
                                    method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Eliminar
                                    </button>
                                </form>
                                --}}
                                <span class="text-gray-400 italic">Pendiente</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>