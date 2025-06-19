<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seleccionar Universidad') }}
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
                                    <div class="card-header">{{ __('Seleccionar Universidad') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('guardar.universidad') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="universidad" class="col-md-4 col-form-label text-md-end">{{ __('Universidad') }}</label>

                                                <div class="col-md-6">
                                                    <select id="universidad" class="form-control @error('universidad') is-invalid @enderror" name="universidad" required>
                                                        <option value="">Seleccione su universidad</option>
                                                        <option value="TECSUP" {{ old('universidad') == 'TECSUP' ? 'selected' : '' }}>TECSUP</option>
                                                        <option value="UTP" {{ old('universidad') == 'UTP' ? 'selected' : '' }}>UTP</option>
                                                        <option value="UPN" {{ old('universidad') == 'UPN' ? 'selected' : '' }}>UPN</option>
                                                        <option value="UPC" {{ old('universidad') == 'UPC' ? 'selected' : '' }}>UPC</option>
                                                    </select>

                                                    @error('universidad')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Guardar Universidad') }}
                                                    </button>
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