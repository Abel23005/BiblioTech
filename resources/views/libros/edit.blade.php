@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Editar Libro</h2>
        <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('libros.update', $libro) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" 
                                   class="form-control bg-dark text-white @error('titulo') is-invalid @enderror" 
                                   id="titulo" 
                                   name="titulo" 
                                   value="{{ old('titulo', $libro->titulo) }}" 
                                   required>
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" 
                                   class="form-control bg-dark text-white @error('autor') is-invalid @enderror" 
                                   id="autor" 
                                   name="autor" 
                                   value="{{ old('autor', $libro->autor) }}" 
                                   required>
                            @error('autor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" 
                                   class="form-control bg-dark text-white @error('isbn') is-invalid @enderror" 
                                   id="isbn" 
                                   name="isbn" 
                                   value="{{ old('isbn', $libro->isbn) }}" 
                                   required>
                            @error('isbn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select bg-dark text-white @error('categoria') is-invalid @enderror" 
                                    id="categoria" 
                                    name="categoria" 
                                    required>
                                <option value="">Seleccione una categoría</option>
                                <option value="Ficción" {{ old('categoria', $libro->categoria) == 'Ficción' ? 'selected' : '' }}>Ficción</option>
                                <option value="No Ficción" {{ old('categoria', $libro->categoria) == 'No Ficción' ? 'selected' : '' }}>No Ficción</option>
                                <option value="Ciencia" {{ old('categoria', $libro->categoria) == 'Ciencia' ? 'selected' : '' }}>Ciencia</option>
                                <option value="Tecnología" {{ old('categoria', $libro->categoria) == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                                <option value="Historia" {{ old('categoria', $libro->categoria) == 'Historia' ? 'selected' : '' }}>Historia</option>
                                <option value="Arte" {{ old('categoria', $libro->categoria) == 'Arte' ? 'selected' : '' }}>Arte</option>
                            </select>
                            @error('categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control bg-dark text-white @error('descripcion') is-invalid @enderror" 
                                      id="descripcion" 
                                      name="descripcion" 
                                      rows="3">{{ old('descripcion', $libro->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" 
                                   class="form-control bg-dark text-white @error('ubicacion') is-invalid @enderror" 
                                   id="ubicacion" 
                                   name="ubicacion" 
                                   value="{{ old('ubicacion', $libro->ubicacion) }}" 
                                   placeholder="Ej: Estante A-1">
                            @error('ubicacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select bg-dark text-white @error('estado') is-invalid @enderror" 
                                    id="estado" 
                                    name="estado" 
                                    required>
                                <option value="nuevo" {{ old('estado', $libro->estado) == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
                                <option value="bueno" {{ old('estado', $libro->estado) == 'bueno' ? 'selected' : '' }}>Bueno</option>
                                <option value="regular" {{ old('estado', $libro->estado) == 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="deteriorado" {{ old('estado', $libro->estado) == 'deteriorado' ? 'selected' : '' }}>Deteriorado</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input @error('disponible') is-invalid @enderror" 
                                       id="disponible" 
                                       name="disponible" 
                                       value="1"
                                       {{ old('disponible', $libro->disponible) ? 'checked' : '' }}>
                                <label class="form-check-label" for="disponible">Disponible para préstamo</label>
                                @error('disponible')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Restablecer
                    </button>
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save"></i> Actualizar Libro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Validación de ISBN
    const isbnInput = document.getElementById('isbn');
    isbnInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9X-]/g, '');
    });
});
</script>
@endpush
@endsection 