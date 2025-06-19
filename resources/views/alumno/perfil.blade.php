<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">Mi Perfil</h5>
                                    </div>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('alumno.actualizar-perfil') }}">
                                            @csrf
                                            @method('PUT')

                                            <!-- Información no editable -->
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <p><strong>Código:</strong> {{ $estudiante->codigo }}</p>
                                                    <p><strong>Email:</strong> {{ $estudiante->email }}</p>
                                                    <p><strong>Universidad:</strong> {{ $estudiante->universidad }}</p>
                                                </div>
                                            </div>

                                            <!-- Carrera -->
                                            <div class="row mb-3">
                                                <label for="carrera" class="col-md-4 col-form-label text-md-end">Carrera</label>
                                                <div class="col-md-6">
                                                    <input id="carrera" type="text" class="form-control @error('carrera') is-invalid @enderror" 
                                                        name="carrera" value="{{ old('carrera', $estudiante->carrera) }}" required>
                                                    @error('carrera')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Semestre -->
                                            <div class="row mb-3">
                                                <label for="semestre" class="col-md-4 col-form-label text-md-end">Semestre</label>
                                                <div class="col-md-6">
                                                    <select id="semestre" class="form-control @error('semestre') is-invalid @enderror" 
                                                        name="semestre" required>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}" {{ old('semestre', $estudiante->semestre) == $i ? 'selected' : '' }}>
                                                                {{ $i }}º Semestre
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('semestre')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Teléfono -->
                                            <div class="row mb-3">
                                                <label for="telefono" class="col-md-4 col-form-label text-md-end">Teléfono</label>
                                                <div class="col-md-6">
                                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                                        name="telefono" value="{{ old('telefono', $estudiante->telefono) }}">
                                                    @error('telefono')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Dirección -->
                                            <div class="row mb-3">
                                                <label for="direccion" class="col-md-4 col-form-label text-md-end">Dirección</label>
                                                <div class="col-md-6">
                                                    <textarea id="direccion" class="form-control @error('direccion') is-invalid @enderror" 
                                                        name="direccion" rows="3">{{ old('direccion', $estudiante->direccion) }}</textarea>
                                                    @error('direccion')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Actualizar Perfil
                                                    </button>
                                                    <a href="{{ route('alumno.dashboard') }}" class="btn btn-secondary">
                                                        Volver al Dashboard
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 