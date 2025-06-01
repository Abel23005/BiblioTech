@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Editar Préstamo</h2>
        <a href="{{ route('prestamos.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('prestamos.update', $prestamo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Libro</label>
                            <input type="text" 
                                   class="form-control" 
                                   value="{{ $prestamo->libro->titulo }} - {{ $prestamo->libro->autor }}" 
                                   readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Estudiante</label>
                            <input type="text" 
                                   class="form-control" 
                                   value="{{ $prestamo->estudiante->nombre }} - {{ $prestamo->estudiante->codigo }}" 
                                   readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Fecha de Préstamo</label>
                            <input type="date" 
                                   class="form-control" 
                                   value="{{ $prestamo->fecha_prestamo }}" 
                                   readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                            <input type="date" 
                                   class="form-control @error('fecha_devolucion') is-invalid @enderror" 
                                   id="fecha_devolucion" 
                                   name="fecha_devolucion" 
                                   value="{{ old('fecha_devolucion', $prestamo->fecha_devolucion) }}"
                                   required>
                            @error('fecha_devolucion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado del Préstamo</label>
                            <select class="form-select @error('estado') is-invalid @enderror" 
                                    id="estado" 
                                    name="estado" 
                                    required>
                                <option value="activo" {{ old('estado', $prestamo->estado) == 'activo' ? 'selected' : '' }}>
                                    Activo
                                </option>
                                <option value="devuelto" {{ old('estado', $prestamo->estado) == 'devuelto' ? 'selected' : '' }}>
                                    Devuelto
                                </option>
                                <option value="vencido" {{ old('estado', $prestamo->estado) == 'vencido' ? 'selected' : '' }}>
                                    Vencido
                                </option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Restablecer
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Préstamo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fechaDevolucion = document.getElementById('fecha_devolucion');
    const fechaPrestamo = '{{ $prestamo->fecha_prestamo }}';
    
    // La fecha de devolución debe ser posterior a la fecha de préstamo
    fechaDevolucion.min = fechaPrestamo;
});
</script>
@endpush
@endsection 