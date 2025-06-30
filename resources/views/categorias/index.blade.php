<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Categorías
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-extrabold text-primary-header">Gestión de Categorías</h1>
                        <a href="{{ route('categorias.create') }}" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                            <i class="fas fa-plus-circle mr-2"></i> Agregar Categoría
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-primary-header text-white">
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Nombre</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Descripción</th>
                                    <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categorias as $categoria)
                                    <tr>
                                        <td class="py-3 px-4 border-b border-gray-200">{{ $categoria->nombre }}</td>
                                        <td class="py-3 px-4 border-b border-gray-200">{{ $categoria->descripcion }}</td>
                                        <td class="py-3 px-4 border-b border-gray-200 flex space-x-2">
                                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn-cta px-3 py-1 rounded-md text-xs font-semibold">Editar</a>
                                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-3 px-4 text-center text-gray-500">No hay categorías registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $categorias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 