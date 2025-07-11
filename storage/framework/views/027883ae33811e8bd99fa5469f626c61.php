<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['disabled' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<button <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-[#D4AF37] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#B38F2E] focus:bg-[#B38F2E] active:bg-[#B38F2E] focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2 transition ease-in-out duration-150']); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\Users\HP\BiblioTech2\resources\views/components/secondary-button.blade.php ENDPATH**/ ?>