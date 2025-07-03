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
            <?php echo e(__('app.add_new')); ?> <?php echo e(__('app.loan')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header"><?php echo e(__('app.add_new')); ?> <?php echo e(__('app.loan')); ?></h2>
                            <a href="<?php echo e(route('prestamos.index')); ?>" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-arrow-left mr-2"></i> <?php echo e(__('app.back')); ?>

                            </a>
                        </div>

                        <?php if(session('error')): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline"><?php echo e(session('error')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <form action="<?php echo e(route('prestamos.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="libro_id" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.book')); ?></label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['libro_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="libro_id" 
                                                    name="libro_id" 
                                                    required>
                                                <option value=""><?php echo e(__('app.select_a_book')); ?></option>
                                                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($libro->id); ?>" <?php echo e(old('libro_id') == $libro->id ? 'selected' : ''); ?>>
                                                        <?php echo e($libro->titulo); ?> - <?php echo e($libro->autor); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['libro_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="estudiante_id" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.student')); ?></label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['estudiante_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="estudiante_id" 
                                                    name="estudiante_id" 
                                                    required>
                                                <option value=""><?php echo e(__('app.select_a_student')); ?></option>
                                                <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($estudiante->id); ?>" <?php echo e(old('estudiante_id') == $estudiante->id ? 'selected' : ''); ?>>
                                                        <?php echo e($estudiante->nombre); ?> - <?php echo e($estudiante->codigo); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['estudiante_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="fecha_prestamo" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.loan_date')); ?></label>
                                            <input type="date" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['fecha_prestamo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="fecha_prestamo" 
                                                   name="fecha_prestamo" 
                                                   value="<?php echo e(old('fecha_prestamo', date('Y-m-d'))); ?>"
                                                   required>
                                            <?php $__errorArgs = ['fecha_prestamo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label for="fecha_devolucion" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.return_date')); ?></label>
                                            <input type="date" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['fecha_devolucion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="fecha_devolucion" 
                                                   name="fecha_devolucion" 
                                                   value="<?php echo e(old('fecha_devolucion', date('Y-m-d', strtotime('+7 days')))); ?>"
                                                   required>
                                            <?php $__errorArgs = ['fecha_devolucion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-undo mr-2"></i> <?php echo e(__('app.reset')); ?>

                                    </button>
                                    <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-save mr-2"></i> <?php echo e(__('app.save_loan')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const fechaPrestamo = document.getElementById('fecha_prestamo');
        const fechaDevolucion = document.getElementById('fecha_devolucion');
        
        if (fechaPrestamo) {
            fechaPrestamo.max = new Date().toISOString().split('T')[0];
            fechaPrestamo.addEventListener('change', function() {
                fechaDevolucion.min = this.value;
                if (fechaDevolucion.value < this.value) {
                    fechaDevolucion.value = this.value;
                }
            });
        }
    });
    </script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/prestamos/create.blade.php ENDPATH**/ ?>