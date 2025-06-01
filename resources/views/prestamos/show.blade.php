@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Detalles del Préstamo</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('prestamos.edit', $prestamo) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('prestamos.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Información del Libro</h3>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Título:</dt>
                        <dd class="col-sm-8">{{ $prestamo->libro->titulo }}</dd>

                        <dt class="col-sm-4">Autor:</dt>
                        <dd class="col-sm-8">{{ $prestamo->libro->autor }}</dd>

                        <dt class="col-sm-4">ISBN:</dt>
                        <dd class="col-sm-8">{{ $prestamo->libro->isbn }}</dd>

                        <dt class="col-sm-4">Estado:</dt>
                        <dd class="col-sm-8">
                            @if($prestamo->libro->disponible)
                                <span class="badge bg-success">Disponible</span>
                            @else
                                <span class="badge bg-danger">Prestado</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h3 class="h5 mb-0">Información del Estudiante</h3>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $prestamo->estudiante->nombre }}</dd>

                        <dt class="col-sm-4">Código:</dt>
                        <dd class="col-sm-8">{{ $prestamo->estudiante->codigo }}</dd>

                        <dt class="col-sm-4">Email:</dt>
                        <dd class="col-sm-8">{{ $prestamo->estudiante->email }}</dd>

                        <dt class="col-sm-4">Estado:</dt>
                        <dd class="col-sm-8">
                            @if($prestamo->estudiante->activo)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Inactivo</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white">
            <h3 class="h5 mb-0">Detalles del Préstamo</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">ID Préstamo:</dt>
                        <dd class="col-sm-8">#{{ $prestamo->id }}</dd>

                        <dt class="col-sm-4">Fecha Préstamo:</dt>
                        <dd class="col-sm-8">{{ Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</dd>

                        <dt class="col-sm-4">Fecha Devolución:</dt>
                        <dd class="col-sm-8">{{ Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}</dd>

                        <dt class="col-sm-4">Estado:</dt>
                        <dd class="col-sm-8">
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
                        </dd>

                        <dt class="col-sm-4">Días Restantes:</dt>
                        <dd class="col-sm-8">
                            @php
                                $diasRestantes = Carbon\Carbon::now()->diffInDays($prestamo->fecha_devolucion, false);
                            @endphp
                            @if($prestamo->estado === 'devuelto')
                                <span class="badge bg-info">Préstamo finalizado</span>
                            @elseif($diasRestantes < 0)
                                <span class="badge bg-danger">Vencido ({{ abs($diasRestantes) }} días)</span>
                            @elseif($diasRestantes === 0)
                                <span class="badge bg-warning">Vence hoy</span>
                            @else
                                <span class="badge bg-success">{{ $diasRestantes }} días</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 