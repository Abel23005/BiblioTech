<?php
use Carbon\Carbon;
?>

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
            <?php echo e(__('app.loans_management')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header"><?php echo e(__('app.loans_management')); ?></h2>
                            <a href="<?php echo e(route('prestamos.create')); ?>" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-plus-circle mr-2"></i> <?php echo e(__('app.add_new')); ?>

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

                        <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-md">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="bg-primary-header text-white">
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.book')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.student')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.loan_date')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.return_date')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.status')); ?></th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.actions')); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__empty_1 = true; $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="py-3 px-4 whitespace-nowrap"><?php echo e($prestamo->id); ?></td>
                                            <td class="py-3 px-4 whitespace-nowrap"><?php echo e($prestamo->libro->titulo); ?></td>
                                            <td class="py-3 px-4 whitespace-nowrap"><?php echo e($prestamo->usuario->nombre); ?></td>
                                            <td class="py-3 px-4 whitespace-nowrap"><?php echo e(Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y')); ?></td>
                                            <td class="py-3 px-4 whitespace-nowrap"><?php echo e(Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y')); ?></td>
                                            <td class="py-3 px-4 whitespace-nowrap">
                                                <?php switch($prestamo->estado):
                                                    case ('activo'): ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><?php echo e(__('app.active')); ?></span>
                                                        <?php break; ?>
                                                    <?php case ('devuelto'): ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800"><?php echo e(__('app.returned')); ?></span>
                                                        <?php break; ?>
                                                    <?php case ('vencido'): ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"><?php echo e(__('app.expired')); ?></span>
                                                        <?php break; ?>
                                                    <?php default: ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800"><?php echo e($prestamo->estado); ?></span>
                                                <?php endswitch; ?>
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="<?php echo e(route('prestamos.show', $prestamo)); ?>" 
                                                       class="btn-cta px-3 py-1 rounded-md text-xs font-semibold" 
                                                       title="<?php echo e(__('app.details')); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('prestamos.edit', $prestamo)); ?>" 
                                                       class="btn-confirm px-3 py-1 rounded-md text-xs font-semibold" 
                                                       title="<?php echo e(__('app.edit')); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" 
                                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold"
                                                            title="<?php echo e(__('app.delete')); ?>"
                                                            onclick="confirmarEliminacion('<?php echo e($prestamo->id); ?>')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="py-3 px-4 text-center text-gray-500"><?php echo e(__('app.no_results')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 flex justify-end">
                            <?php echo e($prestamos->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
    function confirmarEliminacion(id) {
        if (confirm('<?php echo e(__('app.are_you_sure')); ?>')) {
            document.getElementById('form-eliminar-' + id).submit();
        }
    }
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/prestamos/index.blade.php ENDPATH**/ ?>