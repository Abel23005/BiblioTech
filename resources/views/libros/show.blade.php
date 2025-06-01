@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Detalles del Libro</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card bg-dark text-white mb-4">
                <div class="card-header bg-info">
                    <h3 class="h5 mb-0">Información del Libro</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>Título:</dt>
                                <dd class="mb-3">{{ $libro->titulo }}</dd>

                                <dt>Autor:</dt>
                                <dd class="mb-3">{{ $libro->autor }}</dd>

                                <dt>ISBN:</dt>
                                <dd class="mb-3">{{ $libro->isbn }}</dd>

                                <dt>Categoría:</dt>
                                <dd class="mb-3">{{ $libro->categoria }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>Estado:</dt>
                                <dd class="mb-3">
                                    @switch($libro->estado)
                                        @case('nuevo')
                                            <span class="badge bg-success">Nuevo</span>
                                            @break
                                        @case('bueno')
                                            <span class="badge bg-info">Bueno</span>
                                            @break
                                        @case('regular')
                                            <span class="badge bg-warning">Regular</span>
                                            @break
                                        @case('deteriorado')
                                            <span class="badge bg-danger">Deteriorado</span>
                                            @break
                                        @default
                                            <span class="badge bg-secondary">{{ $libro->estado }}</span>
                                    @endswitch
                                </dd>

                                <dt>Disponibilidad:</dt>
                                <dd class="mb-3">
                                    @if($libro->disponible)
                                        <span class="badge bg-success">Disponible</span>
                                    @else
                                        <span class="badge bg-danger">Prestado</span>
                                    @endif
                                </dd>

                                <dt>Ubicación:</dt>
                                <dd class="mb-3">{{ $libro->ubicacion ?? 'No especificada' }}</dd>

                                <dt>Fecha de Registro:</dt>
                                <dd class="mb-3">{{ $libro->created_at->format('d/m/Y H:i') }}</dd>
                            </dl>
                        </div>
                    </div>

                    @if($libro->descripcion)
                        <div class="row">
                            <div class="col-12">
                                <dt>Descripción:</dt>
                                <dd>{{ $libro->descripcion }}</dd>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark text-white mb-4">
                <div class="card-header bg-primary">
                    <h3 class="h5 mb-0">Historial de Préstamos</h3>
                </div>
                <div class="card-body">
                    @if($libro->prestamos->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Estudiante</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($libro->prestamos->sortByDesc('created_at') as $prestamo)
                                        <tr>
                                            <td>{{ $prestamo->fecha_prestamo->format('d/m/Y') }}</td>
                                            <td>{{ $prestamo->estudiante->nombre }}</td>
                                            <td>
                                                @switch($prestamo->estado)
                                                    @case('activo')
                                                        <span class="badge bg-success">Activo</span>
                                                        @break
                                                    @case('devuelto')
                                                        <span class="badge bg-info">Devuelto</span>
                                                        @break
                                                    @case('vencido')
                                                        <span class="badge bg-danger">Vencido</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-secondary">{{ $prestamo->estado }}</span>
                                                @endswitch
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No hay préstamos registrados para este libro.</p>
                    @endif
                </div>
            </div>

            @if(!$libro->disponible && $libro->prestamo_actual)
                <div class="card bg-dark text-white">
                    <div class="card-header bg-warning text-dark">
                        <h3 class="h5 mb-0">Préstamo Actual</h3>
                    </div>
                    <div class="card-body">
                        <dl>
                            <dt>Estudiante:</dt>
                            <dd>{{ $libro->prestamo_actual->estudiante->nombre }}</dd>

                            <dt>Fecha de Préstamo:</dt>
                            <dd>{{ $libro->prestamo_actual->fecha_prestamo->format('d/m/Y') }}</dd>

                            <dt>Fecha de Devolución:</dt>
                            <dd>{{ $libro->prestamo_actual->fecha_devolucion->format('d/m/Y') }}</dd>

                            <dt>Estado:</dt>
                            <dd>
                                @php
                                    $diasRestantes = now()->diffInDays($libro->prestamo_actual->fecha_devolucion, false);
                                @endphp
                                @if($diasRestantes < 0)
                                    <span class="badge bg-danger">Vencido ({{ abs($diasRestantes) }} días)</span>
                                @elseif($diasRestantes === 0)
                                    <span class="badge bg-warning text-dark">Vence hoy</span>
                                @else
                                    <span class="badge bg-success">{{ $diasRestantes }} días restantes</span>
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 