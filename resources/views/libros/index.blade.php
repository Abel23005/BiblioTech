@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Gestión de Libros</h2>
        <a href="{{ route('libros.create') }}" class="btn btn-info">
            <i class="fas fa-plus"></i> Nuevo Libro
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
                            <th>Título</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($libros as $libro)
                            <tr>
                                <td>{{ $libro->id }}</td>
                                <td>{{ $libro->titulo }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->isbn }}</td>
                                <td>{{ $libro->categoria }}</td>
                                <td>
                                    @if($libro->disponible)
                                        <span class="badge bg-success">Disponible</span>
                                    @else
                                        <span class="badge bg-danger">Prestado</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('libros.show', $libro) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('libros.edit', $libro) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-danger" 
                                                title="Eliminar"
                                                onclick="confirmarEliminacion('{{ $libro->id }}')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="form-eliminar-{{ $libro->id }}" 
                                          action="{{ route('libros.destroy', $libro) }}" 
                                          method="POST" 
                                          class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay libros registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $libros->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function confirmarEliminacion(id) {
    if (confirm('¿Está seguro que desea eliminar este libro?')) {
        document.getElementById('form-eliminar-' + id).submit();
    }
}
</script>
@endpush
@endsection 