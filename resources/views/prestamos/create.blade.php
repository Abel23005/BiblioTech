@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Nuevo Préstamo</h2>
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
            <form action="{{ route('prestamos.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="libro_id" class="form-label">Libro</label>
                            <select class="form-select @error('libro_id') is-invalid @enderror" 
                                    id="libro_id" 
                                    name="libro_id" 
                                    required>
                                <option value="">Seleccione un libro</option>
                                @foreach($libros as $libro)
                                    <option value="{{ $libro->id }}" {{ old('libro_id') == $libro->id ? 'selected' : '' }}>
                                        {{ $libro->titulo }} - {{ $libro->autor }}
                                    </option>
                                @endforeach
                            </select>
                            @error('libro_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="estudiante_id" class="form-label">Estudiante</label>
                            <select class="form-select @error('estudiante_id') is-invalid @enderror" 
                                    id="estudiante_id" 
                                    name="estudiante_id" 
                                    required>
                                <option value="">Seleccione un estudiante</option>
                                @foreach($estudiantes as $estudiante)
                                    <option value="{{ $estudiante->id }}" {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}>
                                        {{ $estudiante->nombre }} - {{ $estudiante->codigo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estudiante_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fecha_prestamo" class="form-label">Fecha de Préstamo</label>
                            <input type="date" 
                                   class="form-control @error('fecha_prestamo') is-invalid @enderror" 
                                   id="fecha_prestamo" 
                                   name="fecha_prestamo" 
                                   value="{{ old('fecha_prestamo', date('Y-m-d')) }}"
                                   required>
                            @error('fecha_prestamo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fecha_devolucion" class="form-label">Fecha de Devolución</label>
                            <input type="date" 
                                   class="form-control @error('fecha_devolucion') is-invalid @enderror" 
                                   id="fecha_devolucion" 
                                   name="fecha_devolucion" 
                                   value="{{ old('fecha_devolucion', date('Y-m-d', strtotime('+7 days'))) }}"
                                   required>
                            @error('fecha_devolucion')
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
                        <i class="fas fa-save"></i> Guardar Préstamo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Establecer fecha mínima para fecha de préstamo
    const fechaPrestamo = document.getElementById('fecha_prestamo');
    const fechaDevolucion = document.getElementById('fecha_devolucion');
    
    // La fecha de préstamo no puede ser futura
    fechaPrestamo.max = new Date().toISOString().split('T')[0];
    
    // Actualizar fecha mínima de devolución cuando cambie la fecha de préstamo
    fechaPrestamo.addEventListener('change', function() {
        fechaDevolucion.min = this.value;
        
        // Si la fecha de devolución es menor que la nueva fecha mínima, actualizarla
        if (fechaDevolucion.value < this.value) {
            fechaDevolucion.value = this.value;
        }
    });
});
</script>
@endpush
@endsection 