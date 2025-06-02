<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BiblioTech')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #2c3136;
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 10px 20px;
            font-size: 1.1em;
            display: block;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar ul li a:hover {
            background: #2c3136;
        }

        #sidebar ul li a.active {
            background: #2c3136;
            border-left: 4px solid #007bff;
        }

        #sidebar ul li a i {
            margin-right: 10px;
        }

        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        @auth
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="mb-0">BiblioTech</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('libros.index') }}" class="{{ request()->routeIs('libros.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i> Libros
                    </a>
                </li>
                <li>
                    <a href="{{ route('estudiantes.index') }}" class="{{ request()->routeIs('estudiantes.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Estudiantes
                    </a>
                </li>
                <li>
                    <a href="{{ route('prestamos.index') }}" class="{{ request()->routeIs('prestamos.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i> Préstamos
                    </a>
                </li>
                <li>
                    <a href="{{ route('mensajes.index') }}" class="{{ request()->routeIs('mensajes.*') ? 'active' : '' }}">
                        <i class="fas fa-comments"></i> Mensajes
                        @php
                            $mensajesPendientes = \App\Models\Mensaje::where('estado', 'pendiente')->count();
                        @endphp
                        @if($mensajesPendientes > 0)
                            <span class="badge bg-danger float-end">{{ $mensajesPendientes }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a href="{{ route('reportes.prestamos') }}" class="{{ request()->routeIs('reportes.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar"></i> Reportes
                    </a>
                </li>
                <li>
                    <a href="{{ route('configuracion.general') }}" class="{{ request()->routeIs('configuracion.*') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i> Configuración
                    </a>
                </li>
            </ul>
        </nav>
        @endauth

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    @auth
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-bars"></i>
                    </button>
                    @endauth

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"></i> {{ Auth::user()->nombre }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('mensajes.index') }}">
                                            <i class="fas fa-comments"></i> Mensajes
                                            @if($mensajesPendientes > 0)
                                                <span class="badge bg-danger">{{ $mensajesPendientes }}</span>
                                            @endif
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarCollapse && sidebar) {
                sidebarCollapse.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }
        });
    </script>
</body>
</html>
