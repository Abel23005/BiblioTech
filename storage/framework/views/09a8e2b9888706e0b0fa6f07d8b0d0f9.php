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
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-4xl font-bold mb-4 text-left">Gestión de Préstamos</h1>
                    <div style="display: flex; justify-content: flex-end; margin-bottom: 32px;">
                        <a href="<?php echo e(route('prestamos.create')); ?>" style="
                            display: flex;
                            align-items: center;
                            gap: 8px;
                            background: #38a169;
                            color: white;
                            font-weight: bold;
                            padding: 8px 20px;
                            border: none;
                            border-radius: 6px;
                            font-size: 15px;
                            cursor: pointer;
                            box-shadow: 0 2px 8px rgba(56,161,105,0.10);
                            text-decoration: none;
                            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
                            letter-spacing: 1px;
                        "
                        onmouseover="this.style.background='#2f855a';this.style.transform='translateY(-1px) scale(1.01)';this.style.boxShadow='0 4px 12px rgba(56,161,105,0.18)';"
                        onmouseout="this.style.background='#38a169';this.style.transform='none';this.style.boxShadow='0 2px 8px rgba(56,161,105,0.10)';"
                        >
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor' style='width: 18px; height: 18px;'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'/></svg>
                            AGREGAR PRÉSTAMO
                        </a>
                    </div>
                    <p class="mb-8">Aquí se mostrará la lista de préstamos de libros realizados por los usuarios.</p>
                    <div class="flex flex-col items-center justify-center py-12">
                        <?php if(session('success')): ?>
                            <div class="mb-4 text-green-600 font-semibold"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <div class="w-full overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b">ID</th>
                                        <th class="py-2 px-4 border-b">Libro</th>
                                        <th class="py-2 px-4 border-b">Usuario</th>
                                        <th class="py-2 px-4 border-b">Fecha Préstamo</th>
                                        <th class="py-2 px-4 border-b">Fecha Devolución</th>
                                        <th class="py-2 px-4 border-b">Estado</th>
                                        <th class="py-2 px-4 border-b">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="py-2 px-4 border-b"><?php echo e($prestamo->id); ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo e($prestamo->libro->titulo ?? 'N/A'); ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo e($prestamo->usuario->nombre ?? 'Sin usuario'); ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo e($prestamo->fecha_prestamo->format('d/m/Y')); ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo e($prestamo->fecha_devolucion->format('d/m/Y')); ?></td>
                                            <td class="py-2 px-4 border-b">
                                                <?php switch($prestamo->estado):
                                                    case ('activo'): ?>
                                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Activo</span>
                                                        <?php break; ?>
                                                    <?php case ('devuelto'): ?>
                                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded">Devuelto</span>
                                                        <?php break; ?>
                                                    <?php case ('vencido'): ?>
                                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Vencido</span>
                                                        <?php break; ?>
                                                    <?php default: ?>
                                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded"><?php echo e($prestamo->estado); ?></span>
                                                <?php endswitch; ?>
                                            </td>
                                            <td class="py-2 px-4 border-b flex gap-2 justify-center">
                                                <a href="<?php echo e(route('prestamos.show', $prestamo)); ?>" style="background:#2563eb;color:white;padding:6px 14px;border-radius:5px;font-weight:500;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='#1d4ed8'" onmouseout="this.style.background='#2563eb'">Ver</a>
                                                <a href="<?php echo e(route('prestamos.edit', $prestamo)); ?>" style="background:#f59e42;color:white;padding:6px 14px;border-radius:5px;font-weight:500;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e42'">Editar</a>
                                                <form action="<?php echo e(route('prestamos.destroy', $prestamo)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este préstamo?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" style="background:#ef4444;color:white;padding:6px 14px;border-radius:5px;font-weight:500;border:none;cursor:pointer;transition:background 0.2s;" onmouseover="this.style.background='#b91c1c'" onmouseout="this.style.background='#ef4444'">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7" class="py-4 text-center text-gray-500">No hay préstamos registrados actualmente.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="mt-4"><?php echo e($prestamos->links()); ?></div>
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