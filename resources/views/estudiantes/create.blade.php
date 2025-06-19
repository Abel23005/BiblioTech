<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.add_new') }} {{ __('app.student') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header">{{ __('app.add_new') }} {{ __('app.student') }}</h2>
                            <a href="{{ route('estudiantes.index') }}" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-arrow-left mr-2"></i> {{ __('app.back') }}
                            </a>
                        </div>

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <form action="{{ route('estudiantes.store') }}" method="POST">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="codigo" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.student_code') }}</label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('codigo') border-red-500 @enderror" 
                                                   id="codigo" 
                                                   name="codigo" 
                                                   value="{{ old('codigo') }}" 
                                                   required>
                                            @error('codigo')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.student_name') }}</label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nombre') border-red-500 @enderror" 
                                                   id="nombre" 
                                                   name="nombre" 
                                                   value="{{ old('nombre') }}" 
                                                   required>
                                            @error('nombre')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.email') }}</label>
                                            <input type="email" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror" 
                                                   id="email" 
                                                   name="email" 
                                                   value="{{ old('email') }}" 
                                                   required>
                                            @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.phone') }}</label>
                                            <input type="tel" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('telefono') border-red-500 @enderror" 
                                                   id="telefono" 
                                                   name="telefono" 
                                                   value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="carrera" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.career') }}</label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('carrera') border-red-500 @enderror" 
                                                    id="carrera" 
                                                    name="carrera" 
                                                    required>
                                                <option value="">{{ __('app.select_a_career') }}</option>
                                                <option value="Ingeniería de Sistemas" {{ old('carrera') == 'Ingeniería de Sistemas' ? 'selected' : '' }}>{{ __('app.systems_engineering') }}</option>
                                                <option value="Ingeniería Civil" {{ old('carrera') == 'Ingeniería Civil' ? 'selected' : '' }}>{{ __('app.civil_engineering') }}</option>
                                                <option value="Ingeniería Industrial" {{ old('carrera') == 'Ingeniería Industrial' ? 'selected' : '' }}>{{ __('app.industrial_engineering') }}</option>
                                                <option value="Arquitectura" {{ old('carrera') == 'Arquitectura' ? 'selected' : '' }}>{{ __('app.architecture') }}</option>
                                                <option value="Derecho" {{ old('carrera') == 'Derecho' ? 'selected' : '' }}>{{ __('app.law') }}</option>
                                                <option value="Medicina" {{ old('carrera') == 'Medicina' ? 'selected' : '' }}>{{ __('app.medicine') }}</option>
                                            </select>
                                            @error('carrera')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="semestre" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.semester') }}</label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('semestre') border-red-500 @enderror" 
                                                    id="semestre" 
                                                    name="semestre" 
                                                    required>
                                                <option value="">{{ __('app.select_a_semester') }}</option>
                                                @for($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}" {{ old('semestre') == $i ? 'selected' : '' }}>
                                                        {{ $i }}º {{ __('app.semester') }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('semestre')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.address') }}</label>
                                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('direccion') border-red-500 @enderror" 
                                                  id="direccion" 
                                                  name="direccion" 
                                                  rows="2">{{ old('direccion') }}</textarea>
                                        @error('direccion')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="universidad_id" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.university') }}</label>
                                    <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('universidad_id') border-red-500 @enderror" 
                                            id="universidad_id" 
                                            name="universidad_id" 
                                            required>
                                        <option value="">{{ __('app.select_a_university') }}</option>
                                        @foreach($universidades as $universidad)
                                            <option value="{{ $universidad->id }}" {{ old('universidad_id') == $universidad->id ? 'selected' : '' }}>
                                                {{ $universidad->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('universidad_id')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <div class="flex items-center">
                                            <input type="checkbox" 
                                                   class="form-checkbox h-5 w-5 text-indigo-600 rounded @error('activo') border-red-500 @enderror" 
                                                   id="activo" 
                                                   name="activo" 
                                                   value="1"
                                                   {{ old('activo', true) ? 'checked' : '' }}>
                                            <label class="ml-2 block text-sm font-medium text-gray-700" for="activo">{{ __('app.active_student') }}</label>
                                            @error('activo')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-undo mr-2"></i> {{ __('app.reset') }}
                                    </button>
                                    <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-save mr-2"></i> {{ __('app.save_student') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const telefonoInput = document.getElementById('telefono');
    if (telefonoInput) {
        telefonoInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9+-]/g, '');
        });
    }

    const codigoInput = document.getElementById('codigo');
    if (codigoInput) {
        codigoInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
        });
    }
});
    </script>
    @endpush
</x-app-layout> 