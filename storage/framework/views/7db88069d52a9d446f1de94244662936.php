<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

        <style>
            .bg-primary-header {
                background-color: #2C3E50;
            }
            .bg-content {
                background-color: #F5EBD0;
            }
            .btn-cta {
                background-color: #D4AF37;
                color: white;
            }
            .btn-cta:hover {
                background-color: #B38F2E;
            }
            .btn-confirm {
                background-color: #3D9970;
                color: white;
            }
            .btn-confirm:hover {
                background-color: #2E7353;
            }
            .text-primary-header {
                color: #2C3E50;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-content flex flex-col">
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-primary-header shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-white leading-tight">
                            <?php echo e($header); ?>

                        </h2>
                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                <?php echo e($slot); ?>

            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\HP\BiblioTech2\resources\views/layouts/app.blade.php ENDPATH**/ ?>