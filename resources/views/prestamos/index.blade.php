@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Gestión de Préstamos</h2>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Préstamo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Libro</th>
                            <th>Estudiante</th>
                            <th>Fecha Préstamo</th>
                            <th>Fecha Devolución</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prestamos as $prestamo)
                            <tr>
                                <td>{{ $prestamo->id }}</td>
                                <td>{{ $prestamo->libro->titulo }}</td>
                                <td>{{ $prestamo->estudiante->nombre }}</td>
                                <td>{{ Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}</td>
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
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('prestamos.show', $prestamo) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('prestamos.edit', $prestamo) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-danger" 
                                                title="Eliminar"
                                                onclick="confirmarEliminacion('{{ $prestamo->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="form-eliminar-{{ $prestamo->id }}" 
                                          action="{{ route('prestamos.destroy', $prestamo) }}" 
                                          method="POST" 
                                          class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay préstamos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $prestamos->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmarEliminacion(id) {
    if (confirm('¿Está seguro que desea eliminar este préstamo?')) {
        document.getElementById('form-eliminar-' + id).submit();
    }
}
</script>
@endpush
@endsection 