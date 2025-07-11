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
            <?php echo e(__('app.edit')); ?> <?php echo e($usuario->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-3xl font-extrabold text-primary-header mb-6"><?php echo e(__('app.edit')); ?> <?php echo e($usuario->name); ?></h1>

                        <?php if($errors->any()): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('usuarios.update', $usuario->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.name')); ?></label>
                                <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="name" name="name" value="<?php echo e(old('name', $usuario->name)); ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.email')); ?></label>
                                <input type="email" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="email" name="email" value="<?php echo e(old('email', $usuario->email)); ?>" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.new_password')); ?></label>
                                <input type="password" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password" name="password">
                                <p class="mt-1 text-sm text-gray-500"><?php echo e(__('Dejar en blanco para no cambiar la contraseña')); ?>.</p>
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.confirm_password')); ?></label>
                                <input type="password" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="mb-4">
                                <label for="rol" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.role')); ?></label>
                                <select id="rol" name="rol" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="administrador" <?php echo e(old('rol', $usuario->rol) == 'administrador' ? 'selected' : ''); ?>>Administrador</option>
                                    <option value="bibliotecario" <?php echo e(old('rol', $usuario->rol) == 'bibliotecario' ? 'selected' : ''); ?>>Bibliotecario</option>
                                    <option value="alumno" <?php echo e(old('rol', $usuario->rol) == 'alumno' ? 'selected' : ''); ?>>Alumno</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="universidad_id" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.university')); ?></label>
                                <select id="universidad_id" name="universidad_id" class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                    <option value="">Selecciona una universidad</option>
                                    <?php $__currentLoopData = $universidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $universidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($universidad->id); ?>" <?php echo e(old('universidad_id', $usuario->universidad_id) == $universidad->id ? 'selected' : ''); ?>><?php echo e($universidad->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="flex items-center space-x-4">
                                <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                    <i class="fas fa-save mr-2"></i> <?php echo e(__('app.save_changes')); ?>

                                </button>
                                <a href="<?php echo e(route('usuarios.index')); ?>" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                    <?php echo e(__('app.cancel')); ?>

                                </a>
                            </div>
                        </form>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/admin/usuarios/edit.blade.php ENDPATH**/ ?>