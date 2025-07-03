<?php
use Carbon\Carbon;
?>

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
            <?php echo e(__('Detalles del Préstamo')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="h3 mb-0">Detalles del Préstamo</h2>
                            <div class="d-flex gap-2">
                                <a href="<?php echo e(route('prestamos.edit', $prestamo)); ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="<?php echo e(route('prestamos.index')); ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left"></i> Volver
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h3 class="h5 mb-0">Información del Libro</h3>
                                    </div>
                                    <div class="card-body">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Título:</dt>
                                            <dd class="col-sm-8"><?php echo e($prestamo->libro->titulo); ?></dd>

                                            <dt class="col-sm-4">Autor:</dt>
                                            <dd class="col-sm-8"><?php echo e($prestamo->libro->autor); ?></dd>

                                            <dt class="col-sm-4">ISBN:</dt>
                                            <dd class="col-sm-8"><?php echo e($prestamo->libro->isbn); ?></dd>

                                            <dt class="col-sm-4">Estado:</dt>
                                            <dd class="col-sm-8">
                                                <?php if($prestamo->libro->disponible): ?>
                                                    <span class="badge bg-success">Disponible</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Prestado</span>
                                                <?php endif; ?>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        <h3 class="h5 mb-0">Información del Estudiante</h3>
                                    </div>
                                    <div class="card-body">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Nombre:</dt>
                                            <dd class="col-sm-8"><?php echo e($prestamo->usuario->nombre ?? 'Sin usuario'); ?></dd>

                                            <dt class="col-sm-4">Código:</dt>
                                            <dd class="col-sm-8"><?php echo e($prestamo->usuario->codigo ?? 'Sin usuario'); ?></dd>

                                            <dt class="col-sm-4">Email:</dt>
                                            <dd class="col-sm-8"><?php echo e($prestamo->usuario->email ?? 'Sin usuario'); ?></dd>

                                            <dt class="col-sm-4">Estado:</dt>
                                            <dd class="col-sm-8">
                                                <?php if($prestamo->usuario->activo): ?>
                                                    <span class="badge bg-success">Activo</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Inactivo</span>
                                                <?php endif; ?>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h3 class="h5 mb-0">Detalles del Préstamo</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">ID Préstamo:</dt>
                                            <dd class="col-sm-8">#<?php echo e($prestamo->id); ?></dd>

                                            <dt class="col-sm-4">Fecha Préstamo:</dt>
                                            <dd class="col-sm-8"><?php echo e(Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y')); ?></dd>

                                            <dt class="col-sm-4">Fecha Devolución:</dt>
                                            <dd class="col-sm-8"><?php echo e(Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y')); ?></dd>

                                            <dt class="col-sm-4">Estado:</dt>
                                            <dd class="col-sm-8">
                                                <?php switch($prestamo->estado):
                                                    case ('activo'): ?>
                                                        <span class="badge bg-success">Activo</span>
                                                        <?php break; ?>
                                                    <?php case ('devuelto'): ?>
                                                        <span class="badge bg-info">Devuelto</span>
                                                        <?php break; ?>
                                                    <?php case ('vencido'): ?>
                                                        <span class="badge bg-danger">Vencido</span>
                                                        <?php break; ?>
                                                    <?php default: ?>
                                                        <span class="badge bg-secondary"><?php echo e($prestamo->estado); ?></span>
                                                <?php endswitch; ?>
                                            </dd>

                                            <dt class="col-sm-4">Días Restantes:</dt>
                                            <dd class="col-sm-8">
                                                <?php
                                                    $diasRestantes = Carbon::now()->diffInDays($prestamo->fecha_devolucion, false);
                                                ?>
                                                <?php if($prestamo->estado === 'devuelto'): ?>
                                                    <span class="badge bg-info">Préstamo finalizado</span>
                                                <?php elseif($diasRestantes < 0): ?>
                                                    <span class="badge bg-danger">Vencido (<?php echo e(abs($diasRestantes)); ?> días)</span>
                                                <?php elseif($diasRestantes === 0): ?>
                                                    <span class="badge bg-warning">Vence hoy</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success"><?php echo e($diasRestantes); ?> días</span>
                                                <?php endif; ?>
                                            </dd>
                                        </dl>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/prestamos/show.blade.php ENDPATH**/ ?>