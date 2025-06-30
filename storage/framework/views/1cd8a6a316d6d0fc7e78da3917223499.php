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
        <h2 class="font-semibold text-xl text-white leading-tight">
            Libros
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-3xl font-extrabold text-primary-header">Gestión de Libros</h1>
                            <a href="<?php echo e(route('libros.create')); ?>" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-plus-circle mr-2"></i> Agregar Libro
                            </a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Título</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Autor</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Categoría</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Disponible</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="py-3 px-4 border-b border-gray-200"><?php echo e($libro->titulo); ?></td>
                                            <td class="py-3 px-4 border-b border-gray-200"><?php echo e($libro->autor->nombre ?? '-'); ?></td>
                                            <td class="py-3 px-4 border-b border-gray-200"><?php echo e($libro->categoria->nombre ?? '-'); ?></td>
                                            <td class="py-3 px-4 border-b border-gray-200">
                                                <?php if($libro->disponible): ?>
                                                    <span class="text-green-600 font-bold">Sí</span>
                                                <?php else: ?>
                                                    <span class="text-red-600 font-bold">No</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="py-3 px-4 border-b border-gray-200 flex space-x-2">
                                                <a href="<?php echo e(route('libros.edit', $libro->id)); ?>" class="btn-cta px-3 py-1 rounded-md text-xs font-semibold">Editar</a>
                                                <form action="<?php echo e(route('libros.destroy', $libro->id)); ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este libro?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5" class="py-3 px-4 text-center text-gray-500">No hay libros registrados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <?php echo e($libros->links()); ?>

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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/libros/index.blade.php ENDPATH**/ ?>