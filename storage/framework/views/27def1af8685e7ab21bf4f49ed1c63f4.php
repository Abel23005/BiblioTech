<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active']));

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

foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$classes = ($active ?? false)
            ? 'block px-4 py-2 text-sm font-medium leading-5 text-white bg-gray-800 border-b-2 border-blue-500 focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out flex items-center'
            : 'block px-4 py-2 text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-800 border-b-2 border-transparent focus:outline-none focus:text-white focus:bg-gray-800 transition duration-150 ease-in-out flex items-center';
?>

<a <?php echo e($attributes->merge(['class' => $classes])); ?>>
    <?php echo e($slot); ?>

</a>
<?php /**PATH C:\Users\HP\BiblioTech2\resources\views/components/nav-link.blade.php ENDPATH**/ ?>