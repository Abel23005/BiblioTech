<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de Alumno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid p-0">
                        <!-- Hero Section con Imagen de Biblioteca -->
                        <div class="hero-section position-relative">
                            <div class="overlay"></div>
                            <div class="hero-content text-center text-white">
                                <h1 class="display-4 fw-bold mb-4">Bienvenido a tu Biblioteca Virtual</h1>
                                <h2 class="h3 mb-4">{{ auth()->user()->universidad }}</h2>
                                <button id="sidebarToggle" class="btn btn-light btn-lg px-4 py-2">
                                    <i class="fas fa-bars me-2"></i> Abrir Menú
                                </button>
                            </div>
                        </div>

                        <!-- Contenido Principal -->
                        <div class="container mt-5">
                            <div class="row g-4">
                                <!-- Información Personal -->
                                <div class="col-md-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Información Personal</h5>
                                            <p class="card-text">
                                                <strong>Código:</strong> {{ auth()->user()->codigo }}<br>
                                                <strong>Nombre:</strong> {{ auth()->user()->nombre }}<br>
                                                <strong>Email:</strong> {{ auth()->user()->email }}<br>
                                                <strong>Universidad:</strong> {{ auth()->user()->universidad }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Préstamos Activos -->
                                <div class="col-md-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Préstamos Activos</h5>
                                            <p class="card-text">
                                                @if(isset($prestamos_activos) && count($prestamos_activos) > 0)
                                                    <ul class="list-unstyled">
                                                        @foreach($prestamos_activos as $prestamo)
                                                            <li class="mb-2">{{ $prestamo->libro->titulo }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p>No tienes préstamos activos.</p>
                                                @endif
                                            </p>
                                            <a href="{{ route('alumno.prestamos') }}" class="btn btn-primary">Ver Todos</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reservas Pendientes -->
                                <div class="col-md-4">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Reservas Pendientes</h5>
                                            <p class="card-text">
                                                @if(isset($reservas_pendientes) && count($reservas_pendientes) > 0)
                                                    <ul class="list-unstyled">
                                                        @foreach($reservas_pendientes as $reserva)
                                                            <li class="mb-2">{{ $reserva->libro->titulo }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p>No tienes reservas pendientes.</p>
                                                @endif
                                            </p>
                                            <a href="{{ route('alumno.reservas') }}" class="btn btn-warning">Ver Todas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .hero-section {
        height: 60vh;
        background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 1;
        padding: 2rem;
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    #sidebarToggle {
        transition: all 0.3s;
    }

    #sidebarToggle:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 40vh;
        }
        
        .hero-content h1 {
            font-size: 2rem;
        }
    }
    </style>

    @push('scripts')
    <script>
document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }
    });
    </script>
    @endpush
</x-app-layout> 