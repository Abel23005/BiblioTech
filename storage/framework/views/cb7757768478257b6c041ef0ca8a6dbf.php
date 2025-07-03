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
            <?php echo e(__('app.edit')); ?> <?php echo e(__('app.loan')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header"><?php echo e(__('app.edit')); ?> <?php echo e(__('app.loan')); ?></h2>
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
                            <form action="<?php echo e(route('prestamos.update', $prestamo)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.book')); ?></label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" 
                                                   value="<?php echo e(optional($prestamo->libro)->titulo ?? 'Sin libro'); ?>" 
                                                   readonly>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.student')); ?></label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" 
                                                   value="<?php echo e(optional($prestamo->estudiante)->nombre ?? 'Sin usuario'); ?> - <?php echo e(optional($prestamo->estudiante)->codigo); ?>" 
                                                   readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.loan_date')); ?></label>
                                            <input type="date" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100 cursor-not-allowed" 
                                                   value="<?php echo e($prestamo->fecha_prestamo); ?>" 
                                                   readonly>
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
                                                   value="<?php echo e(old('fecha_devolucion', $prestamo->fecha_devolucion)); ?>"
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

                                <div>
                                    <div class="mb-4">
                                        <label for="estado" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.status')); ?> <?php echo e(__('app.loan')); ?></label>
                                        <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['estado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                id="estado" 
                                                name="estado" 
                                                required>
                                            <option value="activo" <?php echo e(old('estado', $prestamo->estado) == 'activo' ? 'selected' : ''); ?>>
                                                <?php echo e(__('app.active')); ?>

                                            </option>
                                            <option value="devuelto" <?php echo e(old('estado', $prestamo->estado) == 'devuelto' ? 'selected' : ''); ?>>
                                                <?php echo e(__('app.returned')); ?>

                                            </option>
                                            <option value="vencido" <?php echo e(old('estado', $prestamo->estado) == 'vencido' ? 'selected' : ''); ?>>
                                                <?php echo e(__('app.expired')); ?>

                                            </option>
                                        </select>
                                        <?php $__errorArgs = ['estado'];
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

                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-undo mr-2"></i> <?php echo e(__('app.reset')); ?>

                                    </button>
                                    <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-save mr-2"></i> <?php echo e(__('app.update_loan')); ?>

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
        const fechaDevolucion = document.getElementById('fecha_devolucion');
        const fechaPrestamo = '<?php echo e($prestamo->fecha_prestamo); ?>';
        
        if (fechaDevolucion) {
            fechaDevolucion.min = fechaPrestamo;
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/prestamos/edit.blade.php ENDPATH**/ ?>