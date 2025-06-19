<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.add_user') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-3xl font-extrabold text-primary-header mb-6">{{ __('app.add_user') }}</h1>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('usuarios.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.name') }}</label>
                                <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.email') }}</label>
                                <input type="email" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.password') }}</label>
                                <input type="password" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password" name="password" required>
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.confirm_password') }}</label>
                                <input type="password" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <div class="mb-4">
                                <label for="rol" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.role') }}</label>
                                <select id="rol" name="rol" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="administrador">Administrador</option>
                                    <option value="bibliotecario">Bibliotecario</option>
                                    <option value="alumno">Alumno</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="universidad_id" class="block text-sm font-medium text-gray-700 mb-1">{{ __('app.university') }}</label>
                                <select id="universidad_id" name="universidad_id" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">Selecciona una universidad</option>
                                    @foreach($universidades as $universidad)
                                        <option value="{{ $universidad->id }}" {{ old('universidad_id') == $universidad->id ? 'selected' : '' }}>{{ $universidad->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex items-center space-x-4">
                                <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                    <i class="fas fa-save mr-2"></i> {{ __('app.save') }}
                                </button>
                                <a href="{{ route('usuarios.index') }}" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                    {{ __('app.cancel') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 