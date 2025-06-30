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
        <h1 class="text-3xl font-bold text-blanco-humo"><?php echo app('translator')->get('app.universities_management'); ?></h1>
     <?php $__env->endSlot(); ?>
<div class="container mx-auto px-4 py-8 bg-principal rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-blanco-humo">Gestionar Universidades</h1>
            <a href="#" class="bg-cta hover:bg-cta-dark text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                + Nueva Universidad
            </a>
        </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary-header">
                <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Dirección</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Teléfono</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Correo Electrónico</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">UTP</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. Arequipa 265, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 315-9600</td>
                        <td class="px-6 py-4 whitespace-nowrap">contacto@utp.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">UPC</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. San Isidro 123, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 313-3333</td>
                        <td class="px-6 py-4 whitespace-nowrap">info@upc.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">UPN</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. Alfredo Mendiola 6062, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 512-0000</td>
                        <td class="px-6 py-4 whitespace-nowrap">contacto@upn.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-800">TECSUP</td>
                        <td class="px-6 py-4 whitespace-nowrap">Av. Cascanueces 222, Lima</td>
                        <td class="px-6 py-4 whitespace-nowrap">(01) 317-5300</td>
                        <td class="px-6 py-4 whitespace-nowrap">informes@tecsup.edu.pe</td>
                        <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900 font-bold">Ver</a>
                            <a href="#" class="text-confirmar hover:text-green-700 font-bold">Editar</a>
                            <button class="text-red-600 hover:text-red-900 font-bold focus:outline-none">Eliminar</button>
                        </td>
                    </tr>
            </tbody>
        </table>
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/universidads/index.blade.php ENDPATH**/ ?>