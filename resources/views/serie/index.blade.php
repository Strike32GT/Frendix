<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Series') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-md rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Series</h3>

            <div class="bg-white rounded-xl shadow-md p-6 w-full">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Series Registradas</h2>

                <table class="w-full text-sm text-gray-700">
                    <thead>
                        <tr class="bg-gray-100 text-center text-base font-semibold">
                            <th class="py-3">N°</th>
                            <th class="py-3">Nombre</th>
                            <th class="py-3">Trailer</th>
                            <th class="py-3">Temporada</th>
                            <th class="py-3">Fecha Subida</th>
                            <th class="py-3">Descripcion</th>
                            <th class="py-3">Interacciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($series as $serie)
                        <tr class="hover:bg-gray-50 text-center border-t">
                            <td class="py-3">{{ $serie->id_series}}</td>
                            <td class="py-3">{{ $serie->Nombre}}</td>
                            <td class="py-3">{{ $serie->Trailer}}</td>
                            <td class="py-3">
                                @forelse ($serie->episodios->pluck('temporada')->unique()->sort() as $temp)
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mr-1">
                                    Temp {{ $temp }}
                                </span>
                                @empty
                                <span class="text-gray-400 italic">Sin temporadas</span>
                                @endforelse
                            </td>

                            <td class="py-3">{{ $serie->Fecha_Subida}}</td>
                            <td class="py-3">{{ $serie->Descripcion}}</td>
                            <td class="py-3 flex justify-center gap-2">
                                <a href="{{ route('series.edit', $serie->id_series) }}"
                                    class="bg-green-500 hover:bg-green-600 text-black px-3 py-1 rounded">
                                    Editar
                                </a>
                                <form action="{{ route('series.destroy', $serie->id_series) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar esta serie?')"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-red-600 text-black px-3 py-1 rounded">
                                        Eliminar
                                    </button>
                                </form>
                                <form action="{{ route('series.destroy', $serie->id_series) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar esta serie?')"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-green-600 text-black px-3 py-1 rounded">
                                        Agregar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>