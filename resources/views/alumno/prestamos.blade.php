<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis Préstamos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Préstamos Activos</h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Libro</th>
                                <th class="py-2 px-4 border-b">Fecha de Préstamo</th>
                                <th class="py-2 px-4 border-b">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($prestamos as $prestamo)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $prestamo->libro->titulo ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 border-b">{{ $prestamo->created_at }}</td>
                                    <td class="py-2 px-4 border-b">{{ ucfirst($prestamo->estado ?? 'activo') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-2 px-4 text-center">No tienes préstamos activos.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 