<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.add_new') }} {{ __('app.loan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header">{{ __('app.add_new') }} {{ __('app.loan') }}</h2>
                            <a href="{{ route('prestamos.index') }}" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-arrow-left mr-2"></i> {{ __('app.back') }}
                            </a>
                        </div>

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <form action="{{ route('prestamos.store') }}" method="POST">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="libro_id" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.book') }}</label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('libro_id') border-red-500 @enderror" 
                                                    id="libro_id" 
                                                    name="libro_id" 
                                                    required>
                                                <option value="">{{ __('app.select_a_book') }}</option>
                                                @foreach($libros as $libro)
                                                    <option value="{{ $libro->id }}" {{ old('libro_id') == $libro->id ? 'selected' : '' }}>
                                                        {{ $libro->titulo }} - {{ $libro->autor }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('libro_id')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="estudiante_id" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.student') }}</label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('estudiante_id') border-red-500 @enderror" 
                                                    id="estudiante_id" 
                                                    name="estudiante_id" 
                                                    required>
                                                <option value="">{{ __('app.select_a_student') }}</option>
                                                @foreach($estudiantes as $estudiante)
                                                    <option value="{{ $estudiante->id }}" {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}>
                                                        {{ $estudiante->nombre }} - {{ $estudiante->codigo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('estudiante_id')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="fecha_prestamo" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.loan_date') }}</label>
                                            <input type="date" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('fecha_prestamo') border-red-500 @enderror" 
                                                   id="fecha_prestamo" 
                                                   name="fecha_prestamo" 
                                                   value="{{ old('fecha_prestamo', date('Y-m-d')) }}"
                                                   required>
                                            @error('fecha_prestamo')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="fecha_devolucion" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.return_date') }}</label>
                                            <input type="date" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('fecha_devolucion') border-red-500 @enderror" 
                                                   id="fecha_devolucion" 
                                                   name="fecha_devolucion" 
                                                   value="{{ old('fecha_devolucion', date('Y-m-d', strtotime('+7 days'))) }}"
                                                   required>
                                            @error('fecha_devolucion')
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
                                        <i class="fas fa-save mr-2"></i> {{ __('app.save_loan') }}
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
        const fechaPrestamo = document.getElementById('fecha_prestamo');
        const fechaDevolucion = document.getElementById('fecha_devolucion');
        
        if (fechaPrestamo) {
            fechaPrestamo.max = new Date().toISOString().split('T')[0];
            fechaPrestamo.addEventListener('change', function() {
                fechaDevolucion.min = this.value;
                if (fechaDevolucion.value < this.value) {
                    fechaDevolucion.value = this.value;
                }
            });
        }
    });
    </script>
    @endpush
</x-app-layout> 