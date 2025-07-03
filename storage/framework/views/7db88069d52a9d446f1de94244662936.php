<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

        <style>
            .bg-primary-header {
                background-color: #2C3E50;
            }
            .bg-content {
                background-color: #F5EBD0;
            }
            .btn-cta {
                background-color: #D4AF37;
                color: white;
            }
            .btn-cta:hover {
                background-color: #B38F2E;
            }
            .btn-confirm {
                background-color: #3D9970;
                color: white;
            }
            .btn-confirm:hover {
                background-color: #2E7353;
            }
            .text-primary-header {
                color: #2C3E50;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <div class="min-h-screen bg-content d-flex">
            <?php
                $rol = Auth::user()->rol ?? null;
            ?>
            <?php if($rol === 'administrador' || $rol === 'bibliotecario'): ?>
                <!-- Sidebar vertical para admin y bibliotecario -->
                <nav class="d-flex flex-column flex-shrink-0 p-3 bg-white border-end shadow-sm" style="width: 250px; min-height: 100vh;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                        <span class="fs-4 fw-bold text-primary">BiblioTech</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="<?php echo e(route($rol === 'administrador' ? 'admin.dashboard' : 'bibliotecario.dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs($rol === 'administrador' ? 'admin.dashboard' : 'bibliotecario.dashboard') ? 'active' : ''); ?>">
                                Dashboard
                            </a>
                        </li>
                        <?php if($rol === 'administrador' || $rol === 'bibliotecario'): ?>
                            <li><a href="<?php echo e(route('usuarios.index')); ?>" class="nav-link <?php echo e(request()->routeIs('usuarios.*') ? 'active' : ''); ?>">Usuarios</a></li>
                        <?php endif; ?>
                        <?php if($rol === 'administrador'): ?>
                            <li><a href="<?php echo e(route('admin.codigos.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.codigos.index') ? 'active' : ''); ?>">Códigos</a></li>
                            <li><a href="<?php echo e(route('universidads.index')); ?>" class="nav-link <?php echo e(request()->routeIs('universidads.*') ? 'active' : ''); ?>">Universidades</a></li>
                        <?php elseif($rol === 'bibliotecario'): ?>
                            <li><a href="<?php echo e(route('libros.index')); ?>" class="nav-link <?php echo e(request()->routeIs('libros.*') ? 'active' : ''); ?>">Libros</a></li>
                            <li><a href="<?php echo e(route('categorias.index')); ?>" class="nav-link <?php echo e(request()->routeIs('categorias.*') ? 'active' : ''); ?>">Categorías</a></li>
                            <li><a href="<?php echo e(route('prestamos.index')); ?>" class="nav-link <?php echo e(request()->routeIs('prestamos.*') ? 'active' : ''); ?>">Préstamos</a></li>
                            <li><a href="#" class="nav-link">Autores</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('profile.edit')); ?>" class="nav-link">Perfil</a></li>
                        <li>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="nav-link btn btn-link text-start">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </nav>
                <div class="flex-grow-1">
                    <!-- Page Heading -->
                    <?php if(isset($header)): ?>
                        <header class="bg-primary-header shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                <h2 class="font-semibold text-xl text-white leading-tight">
                                    <?php echo e($header); ?>

                                </h2>
                            </div>
                        </header>
                    <?php endif; ?>
                    <!-- Page Content -->
                    <main class="flex-1 p-4">
                        <?php echo e($slot); ?>

                    </main>
                </div>
            <?php else: ?>
                <!-- Menú horizontal para alumno (por defecto) -->
                <div class="flex flex-col w-full">
                    <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php if(isset($header)): ?>
                        <header class="bg-primary-header shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                <h2 class="font-semibold text-xl text-white leading-tight">
                                    <?php echo e($header); ?>

                                </h2>
                            </div>
                        </header>
                    <?php endif; ?>
                    <main class="flex-1 p-6">
                        <?php echo e($slot); ?>

                    </main>
                </div>
            <?php endif; ?>
        </div>
        <footer class="bg-dark text-white mt-auto py-4">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <span class="fw-bold">BiblioTech</span> &copy; <?php echo e(date('Y')); ?>. Todos los derechos reservados.
                </div>
                <div>
                    <a href="#" class="text-white me-3" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3" title="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-3" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="mailto:contacto@bibliotech.edu.pe" class="text-white" title="Correo"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
            <!-- Bootstrap Icons CDN -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        </footer>
    </body>
</html>
<?php /**PATH C:\Users\HP\BiblioTech2\resources\views/layouts/app.blade.php ENDPATH**/ ?>