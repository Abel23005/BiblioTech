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
            <?php echo e(__('Detalle de Alumnos Registrados')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <h2 class="h3 mb-4">Alumnos Registrados</h2>

                        <?php
                            $universidades = ['TECSUP', 'UTP', 'UPN', 'UPC'];
                        ?>
                        <?php $__currentLoopData = $universidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-4 shadow">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="h5 mb-0"><?php echo e($uni); ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover w-full text-left">
                                            <thead>
                                                <tr>
                                                    <th class="px-4 py-2">ID</th>
                                                    <th class="px-4 py-2">Nombre</th>
                                                    <th class="px-4 py-2">Email</th>
                                                    <th class="px-4 py-2">Código</th>
                                                    <th class="px-4 py-2">Universidad</th>
                                                    <th class="px-4 py-2">Fecha de Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $hayAlumnos = false; ?>
                                                <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(($alumno->universidad->nombre ?? $alumno->universidad ?? 'N/A') === $uni): ?>
                                                        <?php $hayAlumnos = true; ?>
                                                        <tr>
                                                            <td class="border px-4 py-2"><?php echo e($alumno->id); ?></td>
                                                            <td class="border px-4 py-2"><?php echo e($alumno->nombre); ?></td>
                                                            <td class="border px-4 py-2"><?php echo e($alumno->email); ?></td>
                                                            <td class="border px-4 py-2"><?php echo e($alumno->codigo); ?></td>
                                                            <td class="border px-4 py-2"><?php echo e($alumno->universidad->nombre ?? $alumno->universidad ?? 'N/A'); ?></td>
                                                            <td class="border px-4 py-2"><?php echo e($alumno->created_at->format('d/m/Y H:i')); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!$hayAlumnos): ?>
                                                    <tr>
                                                        <td class="border px-4 py-2 text-center" colspan="6">No hay alumnos registrados en esta universidad.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/reportes/alumnos.blade.php ENDPATH**/ ?>