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
            <?php echo e(__('app.general_settings')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <h2 class="text-3xl font-extrabold text-primary-header mb-6"><?php echo e(__('app.general_settings')); ?></h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white shadow-lg rounded-lg mb-4">
                                <div class="p-4 bg-primary-header text-white rounded-t-lg">
                                    <h3 class="text-xl font-bold mb-0"><?php echo e(__('app.system_settings')); ?></h3>
                                </div>
                                <div class="p-6">
                                    <form action="<?php echo e(route('configuracion.update')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        
                                        <div class="mb-4">
                                            <label for="nombre_biblioteca" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.library_name')); ?></label>
                                            <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="nombre_biblioteca" name="nombre_biblioteca" value="<?php echo e(config('app.name')); ?>" placeholder="Ej: BiblioTech Central">
                                            <p class="mt-1 text-sm text-gray-500">Define el nombre que se mostrará en toda la aplicación.</p>
                                        </div>

                                        <div class="mb-4">
                                            <label for="dias_prestamo" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.max_loan_days')); ?></label>
                                            <input type="number" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="dias_prestamo" name="dias_prestamo" value="<?php echo e(config('biblioteca.dias_prestamo', 7)); ?>" placeholder="Ej: 7">
                                            <p class="mt-1 text-sm text-gray-500">Establece la cantidad máxima de días para los préstamos de libros.</p>
                                        </div>

                                        <div class="mb-4">
                                            <label for="max_libros" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.max_books_per_user')); ?></label>
                                            <input type="number" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="max_libros" name="max_libros" value="<?php echo e(config('biblioteca.max_libros', 3)); ?>" placeholder="Ej: 3">
                                            <p class="mt-1 text-sm text-gray-500">Determina el número máximo de libros que un usuario puede tener prestados simultáneamente.</p>
                                        </div>

                                        <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                            <i class="fas fa-save mr-2"></i> <?php echo e(__('app.save_changes')); ?>

                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="bg-white shadow-lg rounded-lg mb-4">
                                <div class="p-4 bg-primary-header text-white rounded-t-lg">
                                    <h3 class="text-xl font-bold mb-0"><?php echo e(__('app.notifications')); ?></h3>
                                </div>
                                <div class="p-6">
                                    <form action="<?php echo e(route('configuracion.notificaciones')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        
                                        <div class="mb-4">
                                            <div class="flex items-center">
                                                <input class="form-checkbox h-5 w-5 text-indigo-600 rounded" type="checkbox" id="notificar_vencimiento" name="notificar_vencimiento" checked>
                                                <label class="ml-2 block text-sm font-medium text-gray-700" for="notificar_vencimiento">
                                                    <?php echo e(__('app.notify_due_dates')); ?>

                                                </label>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">Habilita las notificaciones automáticas para los préstamos próximos a vencer.</p>
                                        </div>

                                        <div class="mb-4">
                                            <div class="flex items-center">
                                                <input class="form-checkbox h-5 w-5 text-indigo-600 rounded" type="checkbox" id="notificar_disponibilidad" name="notificar_disponibilidad" checked>
                                                <label class="ml-2 block text-sm font-medium text-gray-700" for="notificar_disponibilidad">
                                                    <?php echo e(__('app.notify_availability')); ?>

                                                </label>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">Permite enviar notificaciones a los usuarios cuando un libro reservado está disponible.</p>
                                        </div>

                                        <button type="submit" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                            <i class="fas fa-bell mr-2"></i> <?php echo e(__('app.update_notifications')); ?>

                                        </button>
                                    </form>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/configuracion/general.blade.php ENDPATH**/ ?>