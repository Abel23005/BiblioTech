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
            <?php echo e(__('app.admin_dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Información del Administrador -->
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <h5 class="text-xl font-bold text-primary-header mb-4"><?php echo e(__('app.admin_info')); ?></h5>
                            <p class="text-gray-700 font-semibold mb-2"><?php echo e(auth()->user()->codigo); ?></p>
                            <p class="text-gray-700 mb-1">
                                <strong><?php echo e(__('app.name')); ?>:</strong> <?php echo e(auth()->user()->nombre); ?>

                            </p>
                            <p class="text-gray-700">
                                <strong><?php echo e(__('app.email')); ?>:</strong> <?php echo e(auth()->user()->email); ?>

                            </p>
                        </div>

                        <!-- Estadísticas Generales -->
                        <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                            <h5 class="text-xl font-bold text-primary-header mb-4"><?php echo e(__('app.general_statistics')); ?></h5>
                            <h3 class="text-5xl font-extrabold text-blue-500 mb-2"><?php echo e($total_usuarios ?? 0); ?></h3>
                            <p class="text-gray-600"><?php echo e(__('app.registered_students')); ?></p>
                        </div>

                        <!-- Acciones Rápidas -->
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <a href="<?php echo e(route('admin.codigos.index')); ?>" class="btn btn-primary btn-block btn-cta w-full flex items-center justify-center py-3">
                                <i class="fas fa-key mr-2"></i> <?php echo e(__('app.view_codes')); ?>

                            </a>
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