@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Nuevo Mensaje</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('mensajes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="tipo" class="form-label text-white">Tipo de mensaje</label>
                            <select name="tipo" id="tipo" class="form-select bg-dark text-white @error('tipo') is-invalid @enderror" required>
                                <option value="">Selecciona un tipo...</option>
                                <option value="consulta" {{ old('tipo') == 'consulta' ? 'selected' : '' }}>Consulta</option>
                                <option value="problema" {{ old('tipo') == 'problema' ? 'selected' : '' }}>Problema</option>
                                <option value="sugerencia" {{ old('tipo') == 'sugerencia' ? 'selected' : '' }}>Sugerencia</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label text-white">Mensaje</label>
                            <textarea name="mensaje" id="mensaje" rows="5" 
                                      class="form-control bg-dark text-white @error('mensaje') is-invalid @enderror"
                                      placeholder="Escribe tu mensaje aquí..." required>{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('mensajes.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 