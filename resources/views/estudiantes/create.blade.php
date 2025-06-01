@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Nuevo Estudiante</h2>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">
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
            <form action="{{ route('estudiantes.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código de Estudiante</label>
                            <input type="text" 
                                   class="form-control bg-dark text-white @error('codigo') is-invalid @enderror" 
                                   id="codigo" 
                                   name="codigo" 
                                   value="{{ old('codigo') }}" 
                                   required>
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" 
                                   class="form-control bg-dark text-white @error('nombre') is-invalid @enderror" 
                                   id="nombre" 
                                   name="nombre" 
                                   value="{{ old('nombre') }}" 
                                   required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" 
                                   class="form-control bg-dark text-white @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" 
                                   class="form-control bg-dark text-white @error('telefono') is-invalid @enderror" 
                                   id="telefono" 
                                   name="telefono" 
                                   value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="carrera" class="form-label">Carrera</label>
                            <select class="form-select bg-dark text-white @error('carrera') is-invalid @enderror" 
                                    id="carrera" 
                                    name="carrera" 
                                    required>
                                <option value="">Seleccione una carrera</option>
                                <option value="Ingeniería de Sistemas" {{ old('carrera') == 'Ingeniería de Sistemas' ? 'selected' : '' }}>Ingeniería de Sistemas</option>
                                <option value="Ingeniería Civil" {{ old('carrera') == 'Ingeniería Civil' ? 'selected' : '' }}>Ingeniería Civil</option>
                                <option value="Ingeniería Industrial" {{ old('carrera') == 'Ingeniería Industrial' ? 'selected' : '' }}>Ingeniería Industrial</option>
                                <option value="Arquitectura" {{ old('carrera') == 'Arquitectura' ? 'selected' : '' }}>Arquitectura</option>
                                <option value="Derecho" {{ old('carrera') == 'Derecho' ? 'selected' : '' }}>Derecho</option>
                                <option value="Medicina" {{ old('carrera') == 'Medicina' ? 'selected' : '' }}>Medicina</option>
                            </select>
                            @error('carrera')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="semestre" class="form-label">Semestre</label>
                            <select class="form-select bg-dark text-white @error('semestre') is-invalid @enderror" 
                                    id="semestre" 
                                    name="semestre" 
                                    required>
                                <option value="">Seleccione el semestre</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('semestre') == $i ? 'selected' : '' }}>
                                        {{ $i }}º Semestre
                                    </option>
                                @endfor
                            </select>
                            @error('semestre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <textarea class="form-control bg-dark text-white @error('direccion') is-invalid @enderror" 
                                      id="direccion" 
                                      name="direccion" 
                                      rows="2">{{ old('direccion') }}</textarea>
                            @error('direccion')
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
                                       class="form-check-input @error('activo') is-invalid @enderror" 
                                       id="activo" 
                                       name="activo" 
                                       value="1"
                                       {{ old('activo', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="activo">Estudiante Activo</label>
                                @error('activo')
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
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Guardar Estudiante
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Validación de teléfono
    const telefonoInput = document.getElementById('telefono');
    telefonoInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9+-]/g, '');
    });

    // Validación de código de estudiante
    const codigoInput = document.getElementById('codigo');
    codigoInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9A-Z-]/g, '').toUpperCase();
    });
});
</script>
@endpush
@endsection 