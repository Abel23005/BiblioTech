@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="h3 mb-4">Reporte de Usuarios</h2>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="h5 mb-0">Estadísticas de Préstamos por Usuario</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Total Préstamos</th>
                            <th>Último Préstamo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->prestamos_count }}</td>
                            <td>
                                @if($usuario->prestamos->isNotEmpty())
                                    {{ $usuario->prestamos->sortByDesc('fecha_prestamo')->first()->fecha_prestamo }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($usuario->activo)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 