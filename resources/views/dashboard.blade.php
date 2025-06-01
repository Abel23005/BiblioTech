@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>
            <p class="mb-0 text-gray-600">Bienvenido, {{ Auth::user()->nombre }}</p>
        </div>
        <div class="d-flex gap-2">
            <span class="badge bg-dark p-2">
                <i class="fas fa-calendar"></i> {{ now()->format('d/m/Y') }}
            </span>
        </div>
    </div>

    <!-- Estadísticas Rápidas -->
    <div class="row g-4 mb-4">
        <!-- Total Libros -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-info fw-bold mb-1">TOTAL LIBROS</h6>
                            <h4 class="display-6 fw-bold mb-0">{{ $stats['libros']['total'] ?? 0 }}</h4>
                            <p class="text-light mb-0">Disponibles: {{ $stats['libros']['disponibles'] ?? 0 }}</p>
                        </div>
                        <div class="ms-3">
                            <span class="bg-info bg-opacity-25 p-3 rounded">
                                <i class="fas fa-book fa-2x text-info"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estudiantes -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-primary fw-bold mb-1">ESTUDIANTES</h6>
                            <h4 class="display-6 fw-bold mb-0">{{ $stats['estudiantes']['total'] ?? 0 }}</h4>
                            <p class="text-light mb-0">Activos: {{ $stats['estudiantes']['activos'] ?? 0 }}</p>
                        </div>
                        <div class="ms-3">
                            <span class="bg-primary bg-opacity-25 p-3 rounded">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visitas -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-warning fw-bold mb-1">VISITAS HOY</h6>
                            <h4 class="display-6 fw-bold mb-0">{{ $stats['visitas']['hoy'] ?? 0 }}</h4>
                            <p class="text-light mb-0">Este mes: {{ $stats['visitas']['mes'] ?? 0 }}</p>
                        </div>
                        <div class="ms-3">
                            <span class="bg-warning bg-opacity-25 p-3 rounded">
                                <i class="fas fa-chart-line fa-2x text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensajes -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="text-success fw-bold mb-1">MENSAJES</h6>
                            <h4 class="display-6 fw-bold mb-0">{{ $stats['mensajes']['total'] ?? 0 }}</h4>
                            <p class="text-light mb-0">No leídos: {{ $stats['mensajes']['no_leidos'] ?? 0 }}</p>
                        </div>
                        <div class="ms-3">
                            <span class="bg-success bg-opacity-25 p-3 rounded">
                                <i class="fas fa-envelope fa-2x text-success"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Accesos Rápidos -->
    <div class="row g-4">
        <!-- Gestión de Libros -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <span class="bg-info bg-opacity-25 p-3 rounded">
                                <i class="fas fa-book fa-2x text-info"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title text-info mb-0">Gestión de Libros</h5>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('libros.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i> Nuevo Libro
                        </a>
                        <a href="{{ route('libros.index') }}" class="btn btn-outline-info">
                            <i class="fas fa-list"></i> Ver Catálogo
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gestión de Préstamos -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <span class="bg-primary bg-opacity-25 p-3 rounded">
                                <i class="fas fa-handshake fa-2x text-primary"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title text-primary mb-0">Gestión de Préstamos</h5>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('prestamos.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Préstamo
                        </a>
                        <a href="{{ route('prestamos.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list"></i> Ver Préstamos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gestión de Usuarios -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <span class="bg-warning bg-opacity-25 p-3 rounded">
                                <i class="fas fa-users fa-2x text-warning"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title text-warning mb-0">Gestión de Usuarios</h5>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('estudiantes.create') }}" class="btn btn-warning">
                            <i class="fas fa-plus"></i> Nuevo Usuario
                        </a>
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-warning">
                            <i class="fas fa-list"></i> Ver Usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reportes y Estadísticas -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <span class="bg-success bg-opacity-25 p-3 rounded">
                                <i class="fas fa-chart-bar fa-2x text-success"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title text-success mb-0">Reportes y Estadísticas</h5>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('reportes.prestamos') }}" class="btn btn-success">
                            <i class="fas fa-file-alt"></i> Reporte de Préstamos
                        </a>
                        <a href="{{ route('reportes.usuarios') }}" class="btn btn-outline-success">
                            <i class="fas fa-users"></i> Reporte de Usuarios
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Configuración del Sistema -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <span class="bg-light bg-opacity-25 p-3 rounded">
                                <i class="fas fa-cogs fa-2x text-light"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title text-light mb-0">Configuración</h5>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('configuracion.general') }}" class="btn btn-light">
                            <i class="fas fa-wrench"></i> Configuración General
                        </a>
                        <a href="{{ route('backup.index') }}" class="btn btn-outline-light">
                            <i class="fas fa-database"></i> Respaldo de Datos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Base de Datos -->
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-shrink-0">
                            <span class="bg-danger bg-opacity-25 p-3 rounded">
                                <i class="fas fa-database fa-2x text-danger"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title text-danger mb-0">Base de Datos</h5>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('database.index') }}" class="btn btn-danger">
                            <i class="fas fa-tools"></i> Gestionar BD
                        </a>
                        <a href="{{ route('database.backup') }}" class="btn btn-outline-danger">
                            <i class="fas fa-download"></i> Backup
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: transform 0.2s, box-shadow 0.2s;
    border: none;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25);
}
.display-6 {
    font-size: 2rem;
}
.bg-opacity-25 {
    --bs-bg-opacity: 0.25;
}
.btn-outline-info,
.btn-outline-primary,
.btn-outline-warning,
.btn-outline-success,
.btn-outline-light,
.btn-outline-danger {
    border-width: 2px;
}
.btn-outline-info:hover,
.btn-outline-primary:hover,
.btn-outline-warning:hover,
.btn-outline-success:hover,
.btn-outline-light:hover,
.btn-outline-danger:hover {
    transform: translateY(-2px);
}
</style>
@endsection
