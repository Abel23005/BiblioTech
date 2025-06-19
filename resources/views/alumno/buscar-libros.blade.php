<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buscar Libros
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="GET" action="{{ route('alumno.buscarLibros') }}" class="mb-6">
                        <div class="flex items-center">
                            <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Buscar por título o autor..." class="w-full px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700">Buscar</button>
                        </div>
                    </form>

                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Título</th>
                                <th class="py-2 px-4 border-b">Autor</th>
                                <th class="py-2 px-4 border-b">Disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($libros as $libro)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $libro->titulo }}</td>
                                    <td class="py-2 px-4 border-b">{{ $libro->autor ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 border-b">{{ $libro->disponible ? 'Sí' : 'No' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-2 px-4 text-center">No se encontraron libros.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 