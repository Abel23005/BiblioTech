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
            <?php echo e(__('app.messages')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row h-[70vh] border border-gray-200 rounded-lg shadow-md">
                        <!-- Columna de Conversaciones (Izquierda) -->
                        <div class="w-full md:w-1/3 border-r border-gray-200 flex flex-col bg-gray-50">
                            <div class="p-4 bg-primary-header text-white flex justify-between items-center rounded-tl-lg">
                                <h3 class="text-lg font-semibold"><?php echo e(__('app.conversations')); ?></h3>
                                <a href="<?php echo e(route('mensajes.create')); ?>" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                    <i class="fas fa-plus mr-2"></i> <?php echo e(__('app.new_message')); ?>

                                </a>
                            </div>
                            <div class="flex-1 overflow-y-auto">
                                <div class="bg-white divide-y divide-gray-200">
                                    <?php $__empty_1 = true; $__currentLoopData = $mensajes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a href="<?php echo e(route('mensajes.show', $mensaje)); ?>" 
                                           class="block px-4 py-3 hover:bg-gray-100 <?php echo e(request()->route('mensaje') && request()->route('mensaje')->id == $mensaje->id ? 'bg-blue-50' : ''); ?>">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <h4 class="text-sm font-semibold text-primary-header"><?php echo e($mensaje->estudiante->nombre); ?></h4>
                                                    <p class="text-xs text-gray-600 truncate"><?php echo e($mensaje->mensaje); ?></p>
                                                </div>
                                                <span class="text-xs text-gray-500"><?php echo e($mensaje->created_at->diffForHumans()); ?></span>
                                            </div>
                                            <?php if(!$mensaje->leido_at && auth()->user()->id === $mensaje->estudiante->usuario_id): ?>
                                                <span class="ml-auto mt-1 px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Nuevo</span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="px-4 py-3 text-center text-gray-500">
                                            <?php echo e(__('app.no_messages')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="p-4 border-t border-gray-200 bg-gray-100">
                                <?php echo e($mensajes->links()); ?>

                            </div>
                        </div>

                        <!-- Columna de Chat (Derecha) -->
                        <div class="w-full md:w-2/3 flex flex-col bg-white rounded-br-lg">
                            <?php if(request()->route('mensaje')): ?>
                                <?php echo $__env->make('mensajes.chat', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <?php else: ?>
                                <div class="flex-1 flex items-center justify-center bg-gray-50 text-gray-500 rounded-br-lg">
                                    <div class="text-center">
                                        <i class="fas fa-comments text-4xl mb-4 text-primary-header"></i>
                                        <h5 class="text-lg font-semibold text-primary-header"><?php echo e(__('app.select_conversation')); ?></h5>
                                    </div>
                                </div>
                            <?php endif; ?>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/mensajes/index.blade.php ENDPATH**/ ?>