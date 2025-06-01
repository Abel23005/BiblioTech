@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Detalles del Estudiante</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <div class="card-header bg-warning text-dark">
                    <h3 class="h5 mb-0">Información Personal</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>Código:</dt>
                                <dd class="mb-3">{{ $estudiante->codigo }}</dd>

                                <dt>Nombre:</dt>
                                <dd class="mb-3">{{ $estudiante->nombre }}</dd>

                                <dt>Email:</dt>
                                <dd class="mb-3">{{ $estudiante->email }}</dd>

                                <dt>Teléfono:</dt>
                                <dd class="mb-3">{{ $estudiante->telefono ?? 'No especificado' }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Carrera:</dt>
                                <dd class="mb-3">{{ $estudiante->carrera }}</dd>

                                <dt>Semestre:</dt>
                                <dd class="mb-3">{{ $estudiante->semestre }}º Semestre</dd>

                                <dt>Estado:</dt>
                                <dd class="mb-3">
                                    @if($estudiante->activo)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </dd>

                                <dt>Fecha de Registro:</dt>
                                <dd class="mb-3">{{ $estudiante->created_at->format('d/m/Y H:i') }}</dd>
                            </dl>
                        </div>
                    </div>

                    @if($estudiante->direccion)
                        <div class="row">
                            <div class="col-12">
                                <dt>Dirección:</dt>
                                <dd>{{ $estudiante->direccion }}</dd>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark text-white mb-4">
                <div class="card-header bg-info">
                    <h3 class="h5 mb-0">Estadísticas</h3>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-3 bg-info bg-opacity-25 rounded">
                                <h6 class="text-info mb-1">Total Préstamos</h6>
                                <h4 class="mb-0">{{ $estudiante->prestamos->count() }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-success bg-opacity-25 rounded">
                                <h6 class="text-success mb-1">Devueltos</h6>
                                <h4 class="mb-0">{{ $estudiante->prestamos->where('estado', 'devuelto')->count() }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-warning bg-opacity-25 rounded">
                                <h6 class="text-warning mb-1">Activos</h6>
                                <h4 class="mb-0">{{ $estudiante->prestamos->where('estado', 'activo')->count() }}</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-danger bg-opacity-25 rounded">
                                <h6 class="text-danger mb-1">Vencidos</h6>
                                <h4 class="mb-0">{{ $estudiante->prestamos->where('estado', 'vencido')->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-dark text-white">
                <div class="card-header bg-primary">
                    <h3 class="h5 mb-0">Préstamos Activos</h3>
                </div>
                <div class="card-body">
                    @if($estudiante->prestamos->where('estado', 'activo')->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>Libro</th>
                                        <th>Fecha Devolución</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($estudiante->prestamos->where('estado', 'activo') as $prestamo)
                                        <tr>
                                            <td>{{ $prestamo->libro->titulo }}</td>
                                            <td>{{ $prestamo->fecha_devolucion->format('d/m/Y') }}</td>
                                            <td>
                                                @php
                                                    $diasRestantes = now()->diffInDays($prestamo->fecha_devolucion, false);
                                                @endphp
                                                @if($diasRestantes < 0)
                                                    <span class="badge bg-danger">Vencido ({{ abs($diasRestantes) }} días)</span>
                                                @elseif($diasRestantes === 0)
                                                    <span class="badge bg-warning text-dark">Vence hoy</span>
                                                @else
                                                    <span class="badge bg-success">{{ $diasRestantes }} días restantes</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No hay préstamos activos.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 