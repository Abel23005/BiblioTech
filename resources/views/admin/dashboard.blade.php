<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('app.admin_dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Información del Administrador -->
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <h5 class="text-xl font-bold text-primary-header mb-4">{{ __('app.admin_info') }}</h5>
                            <p class="text-gray-700 font-semibold mb-2">{{ auth()->user()->codigo }}</p>
                            <p class="text-gray-700 mb-1">
                                <strong>{{ __('app.name') }}:</strong> {{ auth()->user()->nombre }}
                            </p>
                            <p class="text-gray-700">
                                <strong>{{ __('app.email') }}:</strong> {{ auth()->user()->email }}
                            </p>
                        </div>

                        <!-- Estadísticas Generales -->
                        <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                            <h5 class="text-xl font-bold text-primary-header mb-4">{{ __('app.general_statistics') }}</h5>
                            <h3 class="text-5xl font-extrabold text-blue-500 mb-2">{{ $total_usuarios ?? 0 }}</h3>
                            <p class="text-gray-600">{{ __('app.registered_students') }}</p>
                        </div>

                        <!-- Acciones Rápidas -->
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <a href="{{ route('admin.codigos.index') }}" class="btn btn-primary btn-block btn-cta w-full flex items-center justify-center py-3">
                                <i class="fas fa-key mr-2"></i> {{ __('app.view_codes') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 