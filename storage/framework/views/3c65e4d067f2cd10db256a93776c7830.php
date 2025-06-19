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
            <?php echo e(__('app.user_management')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-3xl font-extrabold text-primary-header"><?php echo e(__('app.user_management')); ?></h1>
                            <a href="<?php echo e(route('usuarios.create')); ?>" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-plus-circle mr-2"></i> <?php echo e(__('app.add_user')); ?>

                            </a>
                        </div>

                        <?php if(session('success')): ?>
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline"><?php echo e(session('error')); ?></span>
                            </div>
                        <?php endif; ?>

                        <!-- Alumnos -->
                        <h2 class="text-xl font-bold text-primary-header mb-2 mt-6">Alumnos</h2>
                        <div class="overflow-x-auto mb-8">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.name')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.email')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.university')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.role')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $hayAlumnos = false; ?>
                                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($usuario->rol === 'alumno'): ?>
                                            <?php $hayAlumnos = true; ?>
                                            <tr>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->name); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->email); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->universidad->nombre ?? 'Sin universidad'); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->rol); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200 flex space-x-2">
                                                    <a href="<?php echo e(route('usuarios.edit', $usuario->id)); ?>" class="btn-cta px-3 py-1 rounded-md text-xs font-semibold"><?php echo e(__('app.edit')); ?></a>
                                                    <form action="<?php echo e(route('usuarios.destroy', $usuario->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('app.are_you_sure')); ?>');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold"><?php echo e(__('app.delete')); ?></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!$hayAlumnos): ?>
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-center text-gray-500">No hay alumnos registrados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Bibliotecarios -->
                        <h2 class="text-xl font-bold text-primary-header mb-2 mt-6">Bibliotecarios</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.name')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.email')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.university')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.role')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $hayBiblios = false; ?>
                                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($usuario->rol === 'bibliotecario'): ?>
                                            <?php $hayBiblios = true; ?>
                                            <tr>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->name); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->email); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->universidad->nombre ?? 'Sin universidad'); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200"><?php echo e($usuario->rol); ?></td>
                                                <td class="py-3 px-4 border-b border-gray-200 flex space-x-2">
                                                    <a href="<?php echo e(route('usuarios.edit', $usuario->id)); ?>" class="btn-cta px-3 py-1 rounded-md text-xs font-semibold"><?php echo e(__('app.edit')); ?></a>
                                                    <form action="<?php echo e(route('usuarios.destroy', $usuario->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(__('app.are_you_sure')); ?>');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold"><?php echo e(__('app.delete')); ?></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!$hayBiblios): ?>
                                        <tr>
                                            <td colspan="4" class="py-3 px-4 text-center text-gray-500">No hay bibliotecarios registrados.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <?php echo e($usuarios->links()); ?>

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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>