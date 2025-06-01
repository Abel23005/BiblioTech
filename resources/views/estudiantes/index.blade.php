@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Gestión de Estudiantes</h2>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-warning">
            <i class="fas fa-plus"></i> Nuevo Estudiante
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

    <div class="card bg-dark">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Carrera</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->id }}</td>
                                <td>{{ $estudiante->codigo }}</td>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->email }}</td>
                                <td>{{ $estudiante->carrera }}</td>
                                <td>
                                    @if($estudiante->activo)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('estudiantes.show', $estudiante) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('estudiantes.edit', $estudiante) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-danger" 
                                                title="Eliminar"
                                                onclick="confirmarEliminacion('{{ $estudiante->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="form-eliminar-{{ $estudiante->id }}" 
                                          action="{{ route('estudiantes.destroy', $estudiante) }}" 
                                          method="POST" 
                                          class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay estudiantes registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $estudiantes->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmarEliminacion(id) {
    if (confirm('¿Está seguro que desea eliminar este estudiante?')) {
        document.getElementById('form-eliminar-' + id).submit();
    }
}
</script>
@endpush
@endsection 