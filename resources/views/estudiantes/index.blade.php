<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.students_management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header">{{ __('app.students_management') }}</h2>
                            <a href="{{ route('estudiantes.create') }}" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-plus-circle mr-2"></i> {{ __('app.add_new') }}
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        @php
                            $universidades = ['TECSUP', 'UTP', 'UPN', 'UPC'];
                        @endphp

                        @foreach($universidades as $uni)
                            <div class="mb-10">
                                <h3 class="text-xl font-bold text-primary-header mb-2">{{ $uni }}</h3>
                        <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-md">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.code') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.name') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.email') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.career') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.status') }}</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">{{ __('app.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                            @php $hayEstudiantes = false; @endphp
                                            @foreach($estudiantes as $estudiante)
                                                @if($estudiante->universidad === $uni)
                                                    @php $hayEstudiantes = true; @endphp
                                        <tr>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $estudiante->id }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $estudiante->codigo }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $estudiante->nombre }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $estudiante->email }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">{{ $estudiante->carrera }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                @if($estudiante->activo)
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ __('app.active') }}</span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ __('app.inactive') }}</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('estudiantes.show', $estudiante) }}" 
                                                                   class="btn-cta px-3 py-1 rounded-md text-xs font-semibold flex items-center gap-1" 
                                                                   title="Ver Detalles">
                                                                    <i class="fas fa-eye"></i> Ver
                                                    </a>
                                                    <a href="{{ route('estudiantes.edit', $estudiante) }}" 
                                                                   class="btn-confirm px-3 py-1 rounded-md text-xs font-semibold flex items-center gap-1" 
                                                                   title="Editar">
                                                                    <i class="fas fa-edit"></i> Editar
                                                    </a>
                                                                <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="inline eliminar-estudiante-form">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" 
                                                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold flex items-center gap-1"
                                                                            title="Eliminar">
                                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                                @endif
                                            @endforeach
                                            @if(!$hayEstudiantes)
                                        <tr>
                                                    <td colspan="7" class="py-3 px-4 text-center text-gray-500">No hay estudiantes registrados en esta universidad.</td>
                                        </tr>
                                            @endif
                                </tbody>
                            </table>
                        </div>
                            </div>
                        @endforeach

                        <div class="mt-4 flex justify-end">
                            {{ $estudiantes->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.eliminar-estudiante-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const nombre = this.closest('tr').querySelector('td:nth-child(3)').textContent.trim();
        Swal.fire({
                    title: '¿Estás seguro?',
                    html: `¿Deseas eliminar a <strong>${nombre}</strong>?<br>¡Esta acción no se puede deshacer!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                        form.submit();
            }
                });
            });
        });
    });

    @if(session('success'))
        Swal.fire({
            title: '¡Eliminado!',
            text: 'El estudiante fue eliminado exitosamente.',
            icon: 'success',
            timer: 2500,
            showConfirmButton: false,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    @endif

    @if(session('error'))
        Swal.fire({
            title: '{{ __('app.error') }}!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonColor: '#d33'
        });
    @endif
    </script>
    @endpush
</x-app-layout> 