@php
use Carbon\Carbon;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.loans_management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-4xl font-bold mb-4 text-left">Gestión de Préstamos</h1>
                    <div style="display: flex; justify-content: flex-end; margin-bottom: 32px;">
                        <a href="{{ route('prestamos.create') }}" style="
                            display: flex;
                            align-items: center;
                            gap: 8px;
                            background: #38a169;
                            color: white;
                            font-weight: bold;
                            padding: 8px 20px;
                            border: none;
                            border-radius: 6px;
                            font-size: 15px;
                            cursor: pointer;
                            box-shadow: 0 2px 8px rgba(56,161,105,0.10);
                            text-decoration: none;
                            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
                            letter-spacing: 1px;
                        "
                        onmouseover="this.style.background='#2f855a';this.style.transform='translateY(-1px) scale(1.01)';this.style.boxShadow='0 4px 12px rgba(56,161,105,0.18)';"
                        onmouseout="this.style.background='#38a169';this.style.transform='none';this.style.boxShadow='0 2px 8px rgba(56,161,105,0.10)';"
                        >
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor' style='width: 18px; height: 18px;'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'/></svg>
                            AGREGAR PRÉSTAMO
                        </a>
                    </div>
                    <p class="mb-8">Aquí se mostrará la lista de préstamos de libros realizados por los usuarios.</p>
                    <div class="flex flex-col items-center justify-center py-12">
                        @if(session('success'))
                            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
                        @endif
                        <div class="w-full overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">ID</th>
                                        <th class="py-2 px-4 border-b">Libro</th>
                                        <th class="py-2 px-4 border-b">Usuario</th>
                                        <th class="py-2 px-4 border-b">Fecha Préstamo</th>
                                        <th class="py-2 px-4 border-b">Fecha Devolución</th>
                                        <th class="py-2 px-4 border-b">Estado</th>
                                        <th class="py-2 px-4 border-b">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($prestamos as $prestamo)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $prestamo->id }}</td>
                                            <td class="py-2 px-4 border-b">{{ $prestamo->libro->titulo ?? 'N/A' }}</td>
                                            <td class="py-2 px-4 border-b">{{ $prestamo->usuario->nombre ?? 'Sin usuario' }}</td>
                                            <td class="py-2 px-4 border-b">{{ $prestamo->fecha_prestamo->format('d/m/Y') }}</td>
                                            <td class="py-2 px-4 border-b">{{ $prestamo->fecha_devolucion->format('d/m/Y') }}</td>
                                            <td class="py-2 px-4 border-b">
                                                @switch($prestamo->estado)
                                                    @case('activo')
                                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Activo</span>
                                                        @break
                                                    @case('devuelto')
                                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Devuelto</span>
                                                        @break
                                                    @case('vencido')
                                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Vencido</span>
                                                        @break
                                                    @default
                                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ $prestamo->estado }}</span>
                                                @endswitch
                                            </td>
                                            <td class="py-2 px-4 border-b flex gap-2 justify-center">
                                                <a href="{{ route('prestamos.show', $prestamo) }}" style="background:#2563eb;color:white;padding:6px 14px;border-radius:5px;font-weight:500;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">Ver</a>
                                                <a href="{{ route('prestamos.edit', $prestamo) }}" style="background:#f59e42;color:white;padding:6px 14px;border-radius:5px;font-weight:500;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e42'">Editar</a>
                                                <form action="{{ route('prestamos.destroy', $prestamo) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este préstamo?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background:#ef4444;color:white;padding:6px 14px;border-radius:5px;font-weight:500;border:none;cursor:pointer;transition:background 0.2s;" onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#ef4444'">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="py-4 text-center text-gray-500">No hay préstamos registrados actualmente.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">{{ $prestamos->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    function confirmarEliminacion(id) {
        if (confirm('{{ __('app.are_you_sure') }}')) {
            document.getElementById('form-eliminar-' + id).submit();
        }
    }
    </script>
    @endpush
</x-app-layout> 