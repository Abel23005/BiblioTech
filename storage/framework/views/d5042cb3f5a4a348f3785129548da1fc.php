<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard de Administrador')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="py-5 bg-light min-vh-100">
        <div class="container">
            <!-- Logo Section -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <img src="<?php echo e(asset('images/Logo de Biblotech.png')); ?>" alt="BiblioTech Logo" class="img-fluid" style="max-height: 120px; margin-bottom: 20px;">
                    <h3 class="text-primary fw-bold">Sistema de Gestión Bibliotecaria</h3>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg border-0 rounded-lg mb-5">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h1 class="display-5 fw-bold text-primary">Bienvenido al Panel de Administración</h1>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3 mb-3">
                                    <div class="card text-white bg-primary h-100 shadow">
                                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                            <i class="fas fa-users fa-2x mb-2"></i>
                                            <h5 class="card-title">Usuarios</h5>
                                            <h3><?php echo e(\App\Models\User::count()); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card text-white bg-success h-100 shadow">
                                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                            <i class="fas fa-book fa-2x mb-2"></i>
                                            <h5 class="card-title">Libros</h5>
                                            <h3><?php echo e(\App\Models\Libro::count()); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card text-white bg-warning h-100 shadow">
                                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                            <i class="fas fa-exchange-alt fa-2x mb-2"></i>
                                            <h5 class="card-title">Préstamos</h5>
                                            <h3><?php echo e(\App\Models\Prestamo::count()); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card text-white bg-info h-100 shadow">
                                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                            <i class="fas fa-university fa-2x mb-2"></i>
                                            <h5 class="card-title">Universidades</h5>
                                            <h3><?php echo e(\App\Models\Universidad::count()); ?></h3>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>