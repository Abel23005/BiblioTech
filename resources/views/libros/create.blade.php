<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.add_new') }} {{ __('app.book') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header">{{ __('app.add_new') }} {{ __('app.book') }}</h2>
                            <a href="{{ route('libros.index') }}" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-arrow-left mr-2"></i> {{ __('app.back') }}
                            </a>
                        </div>

                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        @endif

                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <form action="{{ route('libros.store') }}" method="POST">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.title') }}</label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('titulo') border-red-500 @enderror" 
                                                   id="titulo" 
                                                   name="titulo" 
                                                   value="{{ old('titulo') }}" 
                                                   required>
                                            @error('titulo')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="autor" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.author') }}</label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('autor') border-red-500 @enderror" 
                                                   id="autor" 
                                                   name="autor" 
                                                   value="{{ old('autor') }}" 
                                                   required>
                                            @error('autor')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.isbn') }}</label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('isbn') border-red-500 @enderror" 
                                                   id="isbn" 
                                                   name="isbn" 
                                                   value="{{ old('isbn') }}" 
                                                   required>
                                            @error('isbn')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.category') }}</label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('categoria') border-red-500 @enderror" 
                                                    id="categoria" 
                                                    name="categoria" 
                                                    required>
                                                <option value="">{{ __('app.select_a_category') }}</option>
                                                <option value="Ficción" {{ old('categoria') == 'Ficción' ? 'selected' : '' }}>{{ __('app.fiction') }}</option>
                                                <option value="No Ficción" {{ old('categoria') == 'No Ficción' ? 'selected' : '' }}>{{ __('app.non_fiction') }}</option>
                                                <option value="Ciencia" {{ old('categoria') == 'Ciencia' ? 'selected' : '' }}>{{ __('app.science') }}</option>
                                                <option value="Tecnología" {{ old('categoria') == 'Tecnología' ? 'selected' : '' }}>{{ __('app.technology') }}</option>
                                                <option value="Historia" {{ old('categoria') == 'Historia' ? 'selected' : '' }}>{{ __('app.history') }}</option>
                                                <option value="Arte" {{ old('categoria') == 'Arte' ? 'selected' : '' }}>{{ __('app.art') }}</option>
                                            </select>
                                            @error('categoria')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.description') }}</label>
                                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('descripcion') border-red-500 @enderror" 
                                                  id="descripcion" 
                                                  name="descripcion" 
                                                  rows="3">{{ old('descripcion') }}</textarea>
                                        @error('descripcion')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="ubicacion" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.location') }}</label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ubicacion') border-red-500 @enderror" 
                                                   id="ubicacion" 
                                                   name="ubicacion" 
                                                   value="{{ old('ubicacion') }}" 
                                                   placeholder="{{ __('app.example_shelf') }}">
                                            @error('ubicacion')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.status') }}</label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('estado') border-red-500 @enderror" 
                                                    id="estado" 
                                                    name="estado" 
                                                    required>
                                                <option value="nuevo" {{ old('estado') == 'nuevo' ? 'selected' : '' }}>{{ __('app.new') }}</option>
                                                <option value="bueno" {{ old('estado') == 'bueno' ? 'selected' : '' }}>{{ __('app.good') }}</option>
                                                <option value="regular" {{ old('estado') == 'regular' ? 'selected' : '' }}>{{ __('app.regular') }}</option>
                                                <option value="deteriorado" {{ old('estado') == 'deteriorado' ? 'selected' : '' }}>{{ __('app.deteriorated') }}</option>
                                            </select>
                                            @error('estado')
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
                                        <i class="fas fa-save mr-2"></i> {{ __('app.save_book') }}
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
        const isbnInput = document.getElementById('isbn');
        if (isbnInput) {
            isbnInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9X-]/g, '');
            });
        }
    });
    </script>
    @endpush
</x-app-layout> 