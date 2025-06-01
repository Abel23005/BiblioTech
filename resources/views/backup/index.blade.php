@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h2 class="h3 mb-4">Gestión de Respaldos</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="h5 mb-0">Crear Nuevo Respaldo</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('database.backup') }}" method="POST">
                        @csrf
                        <p class="text-muted mb-4">
                            Crea una copia de seguridad completa de la base de datos.
                        </p>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-download"></i> Generar Respaldo
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h3 class="h5 mb-0">Respaldos Automáticos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('backup.config') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="backup_automatico" name="backup_automatico" checked>
                                <label class="form-check-label" for="backup_automatico">
                                    Habilitar respaldos automáticos
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="frecuencia" class="form-label">Frecuencia de respaldo</label>
                            <select class="form-select" id="frecuencia" name="frecuencia">
                                <option value="diario">Diario</option>
                                <option value="semanal">Semanal</option>
                                <option value="mensual">Mensual</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-save"></i> Guardar Configuración
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h3 class="h5 mb-0">Historial de Respaldos</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tamaño</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($backups ?? [] as $backup)
                        <tr>
                            <td>{{ $backup->created_at }}</td>
                            <td>{{ $backup->size }}</td>
                            <td>
                                <span class="badge bg-success">Completado</span>
                            </td>
                            <td>
                                <a href="{{ route('backup.download', $backup->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-download"></i>
                                </a>
                                <form action="{{ route('backup.delete', $backup->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay respaldos disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 