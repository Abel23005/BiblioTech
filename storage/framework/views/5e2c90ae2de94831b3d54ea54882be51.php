<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">¿Cómo deseas registrarte?</h2>
        <form method="GET" action="" id="preRegisterForm">
            <div class="mb-6">
                <label class="block mb-2 font-semibold">Selecciona tu tipo de usuario:</label>
                <div class="flex flex-col gap-4">
                    <label class="flex items-center">
                        <input type="radio" name="tipo" value="alumno" class="mr-2" required>
                        Alumno
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="tipo" value="bibliotecario" class="mr-2">
                        Bibliotecario
                    </label>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Siguiente</button>
        </form>
    </div>
<script>
        document.getElementById('preRegisterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const tipo = document.querySelector('input[name="tipo"]:checked').value;
            if (tipo === 'alumno') {
                window.location.href = "<?php echo e(route('register')); ?>?tipo=alumno";
            } else if (tipo === 'bibliotecario') {
                window.location.href = "<?php echo e(route('register')); ?>?tipo=bibliotecario";
            }
    });
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/auth/pre-register.blade.php ENDPATH**/ ?>