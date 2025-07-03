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
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow" style="padding-bottom: 60px;">
        <h2 class="text-2xl font-bold mb-6 text-center">¿Cómo deseas registrarte?</h2>
        <form method="GET" action="" id="preRegisterForm">
            <div>
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
            <button type="submit" style="background: red; color: white; border: 2px solid black; font-size: 1rem; padding: 0.5rem; width: 100%; margin-top: 1rem; border-radius: 0.375rem; font-weight: 600;">Siguiente</button>
            <p id="errorTipo" class="text-red-600 text-sm mt-2 hidden">Por favor, selecciona un tipo de usuario.</p>
        </form>
    </div>
<script>
        document.getElementById('preRegisterForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const tipo = document.querySelector('input[name="tipo"]:checked');
            const error = document.getElementById('errorTipo');
            if (!tipo) {
                error.classList.remove('hidden');
                return;
            } else {
                error.classList.add('hidden');
            }
            if (tipo.value === 'alumno') {
                window.location.href = "<?php echo e(route('register')); ?>?tipo=alumno";
            } else if (tipo.value === 'bibliotecario') {
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