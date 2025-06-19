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
            <?php echo e(__('Detalles del Estudiante')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="h3 mb-0">Detalles del Estudiante</h2>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('estudiantes.edit', $estudiante)); ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="<?php echo e(route('estudiantes.index')); ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-header bg-warning text-dark">
                                        <h3 class="h5 mb-0">Información Personal</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <dl>
                                                    <dt>Código:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->codigo); ?></dd>

                                                    <dt>Nombre:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->nombre); ?></dd>

                                                    <dt>Email:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->email); ?></dd>

                                                    <dt>Teléfono:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->telefono ?? 'No especificado'); ?></dd>
                                                </dl>
                                            </div>
                                            <div class="col-md-6">
                                                <dl>
                                                    <dt>Carrera:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->carrera); ?></dd>

                                                    <dt>Semestre:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->semestre); ?>º Semestre</dd>

                                                    <dt>Estado:</dt>
                                                    <dd class="mb-3">
                                                        <?php if($estudiante->activo): ?>
                                                            <span class="badge bg-success">Activo</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Inactivo</span>
                                                        <?php endif; ?>
                                                    </dd>

                                                    <dt>Fecha de Registro:</dt>
                                                    <dd class="mb-3"><?php echo e($estudiante->created_at->format('d/m/Y H:i')); ?></dd>
                                                </dl>
                                            </div>
                                        </div>

                                        <?php if($estudiante->direccion): ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <dt>Dirección:</dt>
                                                    <dd><?php echo e($estudiante->direccion); ?></dd>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-header bg-info">
                                        <h3 class="h5 mb-0">Estadísticas</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <div class="p-3 bg-info bg-opacity-25 rounded">
                                                    <h6 class="text-info mb-1">Total Préstamos</h6>
                                                    <h4 class="mb-0"><?php echo e($estudiante->prestamos->count()); ?></h4>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 bg-success bg-opacity-25 rounded">
                                                    <h6 class="text-success mb-1">Devueltos</h6>
                                                    <h4 class="mb-0"><?php echo e($estudiante->prestamos->where('estado', 'devuelto')->count()); ?></h4>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 bg-warning bg-opacity-25 rounded">
                                                    <h6 class="text-warning mb-1">Activos</h6>
                                                    <h4 class="mb-0"><?php echo e($estudiante->prestamos->where('estado', 'activo')->count()); ?></h4>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="p-3 bg-danger bg-opacity-25 rounded">
                                                    <h6 class="text-danger mb-1">Vencidos</h6>
                                                    <h4 class="mb-0"><?php echo e($estudiante->prestamos->where('estado', 'vencido')->count()); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-dark text-white">
                                    <div class="card-header bg-primary">
                                        <h3 class="h5 mb-0">Préstamos Activos</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if($estudiante->prestamos->where('estado', 'activo')->count() > 0): ?>
                                            <div class="table-responsive">
                                                <table class="table table-dark table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Libro</th>
                                                            <th>Fecha Devolución</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $estudiante->prestamos->where('estado', 'activo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($prestamo->libro->titulo); ?></td>
                                                                <td><?php echo e($prestamo->fecha_devolucion->format('d/m/Y')); ?></td>
                                                                <td>
                                                                    <?php
                                                                        $diasRestantes = now()->diffInDays($prestamo->fecha_devolucion, false);
                                                                    ?>
                                                                    <?php if($diasRestantes < 0): ?>
                                                                        <span class="badge bg-danger">Vencido (<?php echo e(abs($diasRestantes)); ?> días)</span>
                                                                    <?php elseif($diasRestantes === 0): ?>
                                                                        <span class="badge bg-warning text-dark">Vence hoy</span>
                                                                    <?php else: ?>
                                                                        <span class="badge bg-success"><?php echo e($diasRestantes); ?> días restantes</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php else: ?>
                                            <p class="text-muted mb-0">No hay préstamos activos.</p>
                                        <?php endif; ?>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/estudiantes/show.blade.php ENDPATH**/ ?>