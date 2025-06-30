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
            Códigos de Autenticación para Bibliotecarios
        </h2>
     <?php $__env->endSlot(); ?>
    <div class="container mx-auto py-8">
        <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
            <p class="mb-4 text-gray-700">
                Estos códigos son únicos y permanentes. Todo bibliotecario debe seleccionar su universidad y luego ingresar el código correspondiente para poder registrarse. <strong>No se pueden cambiar ni eliminar.</strong>
            </p>
            <table class="table-auto w-full border-collapse">
                            <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Nombre de Universidad</th>
                        <th class="px-4 py-2 border">Código de Registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $universidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $universidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                            <td class="border px-4 py-2"><?php echo e($universidad->id); ?></td>
                            <td class="border px-4 py-2"><?php echo e($universidad->name); ?></td>
                            <td class="border px-4 py-2 font-bold"><?php echo e($universidad->codigo_registro); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/admin/codigos.blade.php ENDPATH**/ ?>