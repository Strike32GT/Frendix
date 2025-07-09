<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-6" style="background-color: #eaddc4;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md p-6">

                <!-- Botón Agregar Usuario -->
                <div class="flex justify-end mb-4">
                    <a href="{{ route('usuarios.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out">
                        + Agregar Usuario
                    </a>
                </div>

                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Usuarios Registrados</h2>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-gray-700 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-800 text-white text-center text-base font-semibold">
                                <th class="py-3 px-4">N°</th>
                                <th class="py-3 px-4">Nombre</th>
                                <th class="py-3 px-4">Contraseña</th>
                                <th class="py-3 px-4">Última Conexión</th>
                                <th class="py-3 px-4">Fecha de Creación</th>
                                <th class="py-3 px-4">Estado</th>
                                <th class="py-3 px-4">Interacciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($usuarios as $usuario)
                                <tr class="hover:bg-gray-50 text-center border-t border-gray-200 font-bold">
                                    <td class="py-3 px-4">{{ $usuario->id_usuarios }}</td>
                                    <td class="py-3 px-4">{{ $usuario->Nombre }}</td>
                                    <td class="py-3 px-4">{{ $usuario->Password }}</td>
                                    <td class="py-3 px-4">{{ $usuario->Ultima_conexion }}</td>
                                    <td class="py-3 px-4">{{ $usuario->Fecha_Creacion }}</td>
                                    <td class="py-3 px-4">{{ $usuario->Estado }}</td>
                                    <td class="py-3 px-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('usuarios.edit', $usuario->id_usuarios) }}"
                                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                                Editar
                                            </a>
                                            <form action="{{ route('usuarios.destroy', $usuario->id_usuarios) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
