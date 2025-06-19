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
            <?php echo e(__('app.students_management')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header"><?php echo e(__('app.students_management')); ?></h2>
                            <a href="<?php echo e(route('estudiantes.create')); ?>" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
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

                        <?php
                            $universidades = ['TECSUP', 'UTP', 'UPN', 'UPC'];
                        ?>

                        <?php $__currentLoopData = $universidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-10">
                                <h3 class="text-xl font-bold text-primary-header mb-2"><?php echo e($uni); ?></h3>
                                <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-md">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr class="bg-primary-header text-white">
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.code')); ?></th>
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.name')); ?></th>
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.email')); ?></th>
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.career')); ?></th>
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.status')); ?></th>
                                                <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider"><?php echo e(__('app.actions')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <?php $hayEstudiantes = false; ?>
                                            <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($estudiante->universidad === $uni): ?>
                                                    <?php $hayEstudiantes = true; ?>
                                                    <tr>
                                                        <td class="py-3 px-4 whitespace-nowrap"><?php echo e($estudiante->id); ?></td>
                                                        <td class="py-3 px-4 whitespace-nowrap"><?php echo e($estudiante->codigo); ?></td>
                                                        <td class="py-3 px-4 whitespace-nowrap"><?php echo e($estudiante->nombre); ?></td>
                                                        <td class="py-3 px-4 whitespace-nowrap"><?php echo e($estudiante->email); ?></td>
                                                        <td class="py-3 px-4 whitespace-nowrap"><?php echo e($estudiante->carrera); ?></td>
                                                        <td class="py-3 px-4 whitespace-nowrap">
                                                            <?php if($estudiante->activo): ?>
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><?php echo e(__('app.active')); ?></span>
                                                            <?php else: ?>
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"><?php echo e(__('app.inactive')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="py-3 px-4 whitespace-nowrap text-sm font-medium">
                                                            <div class="flex space-x-2">
                                                                <a href="<?php echo e(route('estudiantes.show', $estudiante)); ?>" 
                                                                   class="btn-cta px-3 py-1 rounded-md text-xs font-semibold flex items-center gap-1" 
                                                                   title="Ver Detalles">
                                                                    <i class="fas fa-eye"></i> Ver
                                                                </a>
                                                                <a href="<?php echo e(route('estudiantes.edit', $estudiante)); ?>" 
                                                                   class="btn-confirm px-3 py-1 rounded-md text-xs font-semibold flex items-center gap-1" 
                                                                   title="Editar">
                                                                    <i class="fas fa-edit"></i> Editar
                                                                </a>
                                                                <form action="<?php echo e(route('estudiantes.destroy', $estudiante)); ?>" method="POST" class="inline eliminar-estudiante-form">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit" 
                                                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold flex items-center gap-1"
                                                                            title="Eliminar">
                                                                        <i class="fas fa-trash"></i> Eliminar
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!$hayEstudiantes): ?>
                                                <tr>
                                                    <td colspan="7" class="py-3 px-4 text-center text-gray-500">No hay estudiantes registrados en esta universidad.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="mt-4 flex justify-end">
                            <?php echo e($estudiantes->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.eliminar-estudiante-form').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const nombre = this.closest('tr').querySelector('td:nth-child(3)').textContent.trim();
                Swal.fire({
                    title: '¿Estás seguro?',
                    html: `¿Deseas eliminar a <strong>${nombre}</strong>?<br>¡Esta acción no se puede deshacer!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });

    <?php if(session('success')): ?>
        Swal.fire({
            title: '¡Eliminado!',
            text: 'El estudiante fue eliminado exitosamente.',
            icon: 'success',
            timer: 2500,
            showConfirmButton: false,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    <?php endif; ?>

    <?php if(session('error')): ?>
        Swal.fire({
            title: '<?php echo e(__('app.error')); ?>!',
            text: '<?php echo e(session('error')); ?>',
            icon: 'error',
            confirmButtonColor: '#d33'
        });
    <?php endif; ?>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/estudiantes/index.blade.php ENDPATH**/ ?>