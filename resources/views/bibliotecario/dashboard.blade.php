<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Panel de Bibliotecario') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Logo Section -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="p-6 text-center">
                    <img src="{{ asset('images/Logo de Biblotech.png') }}" alt="BiblioTech Logo" class="mx-auto" style="max-height: 100px; margin-bottom: 15px;">
                    <h3 class="text-primary-header font-bold text-xl">Panel de Bibliotecario</h3>
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Información del Bibliotecario -->
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <h5 class="text-xl font-bold text-primary-header mb-4">Información del Bibliotecario</h5>
                            <p class="text-gray-700 font-semibold mb-2">{{ auth()->user()->codigo }}</p>
                            <p class="text-gray-700 mb-1">
                                <strong>Nombre:</strong> {{ auth()->user()->nombre }}
                            </p>
                            <p class="text-gray-700">
                                <strong>Email:</strong> {{ auth()->user()->email ?? 'No registrado' }}
                            </p>
                        </div>

                        <!-- Estadísticas Generales -->
                        <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                            <h5 class="text-xl font-bold text-primary-header mb-4">Estadísticas Generales</h5>
                            <h3 class="text-5xl font-extrabold text-blue-500 mb-2">{{ $totalLibros ?? 0 }}</h3>
                            <p class="text-gray-600">Libros en Biblioteca</p>
                            <h3 class="text-3xl font-extrabold text-green-500 mb-2 mt-4">{{ $prestamosActivos ?? 0 }}</h3>
                            <p class="text-gray-600">Préstamos Activos</p>
                            <h3 class="text-3xl font-extrabold text-yellow-500 mb-2 mt-4">{{ $reservasPendientes ?? 0 }}</h3>
                            <p class="text-gray-600">Reservas Pendientes</p>
                        </div>

                        <!-- Acciones Rápidas -->
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <a href="{{ route('prestamos.index') }}" class="btn btn-primary btn-block btn-cta w-full flex items-center justify-center py-3 mb-2">
                                <i class="fas fa-book mr-2"></i> Gestionar Préstamos
                            </a>
                            <a href="{{ route('reservas.index') }}" class="btn btn-info btn-block w-full flex items-center justify-center py-3 mb-2">
                                <i class="fas fa-calendar-check mr-2"></i> Gestionar Reservas
                            </a>
                            <a href="{{ route('libros.create') }}" class="btn btn-success btn-block w-full flex items-center justify-center py-3">
                                <i class="fas fa-plus mr-2"></i> Añadir Nuevo Libro
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 