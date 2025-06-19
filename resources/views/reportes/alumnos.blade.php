<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de Alumnos Registrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <h2 class="h3 mb-4">Alumnos Registrados</h2>

                        @php
                            $universidades = ['TECSUP', 'UTP', 'UPN', 'UPC'];
                        @endphp
                        @foreach($universidades as $uni)
                            <div class="card mb-4 shadow">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="h5 mb-0">{{ $uni }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover w-full text-left">
                                            <thead>
                                                <tr>
                                                    <th class="px-4 py-2">ID</th>
                                                    <th class="px-4 py-2">Nombre</th>
                                                    <th class="px-4 py-2">Email</th>
                                                    <th class="px-4 py-2">Código</th>
                                                    <th class="px-4 py-2">Universidad</th>
                                                    <th class="px-4 py-2">Fecha de Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $hayAlumnos = false; @endphp
                                                @foreach($alumnos as $alumno)
                                                    @if(($alumno->universidad->nombre ?? $alumno->universidad ?? 'N/A') === $uni)
                                                        @php $hayAlumnos = true; @endphp
                                                        <tr>
                                                            <td class="border px-4 py-2">{{ $alumno->id }}</td>
                                                            <td class="border px-4 py-2">{{ $alumno->nombre }}</td>
                                                            <td class="border px-4 py-2">{{ $alumno->email }}</td>
                                                            <td class="border px-4 py-2">{{ $alumno->codigo }}</td>
                                                            <td class="border px-4 py-2">{{ $alumno->universidad->nombre ?? $alumno->universidad ?? 'N/A' }}</td>
                                                            <td class="border px-4 py-2">{{ $alumno->created_at->format('d/m/Y H:i') }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @if(!$hayAlumnos)
                                                    <tr>
                                                        <td class="border px-4 py-2 text-center" colspan="6">No hay alumnos registrados en esta universidad.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 