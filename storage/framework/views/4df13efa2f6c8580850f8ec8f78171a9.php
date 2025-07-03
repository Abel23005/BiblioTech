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
            <?php echo e(__('app.edit')); ?> <?php echo e(__('app.book')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12 bg-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container-fluid px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-3xl font-extrabold text-primary-header"><?php echo e(__('app.edit')); ?> <?php echo e(__('app.book')); ?></h2>
                            <a href="<?php echo e(route('libros.index')); ?>" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                <i class="fas fa-arrow-left mr-2"></i> <?php echo e(__('app.back')); ?>

                            </a>
                        </div>

                        <?php if(session('error')): ?>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                <span class="block sm:inline"><?php echo e(session('error')); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <form action="<?php echo e(route('libros.update', $libro)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.title')); ?></label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="titulo" 
                                                   name="titulo" 
                                                   value="<?php echo e(old('titulo', $libro->titulo)); ?>" 
                                                   required>
                                            <?php $__errorArgs = ['titulo'];
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

                                    <div>
                                        <div class="mb-4">
                                            <label for="autor" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.author')); ?></label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['autor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="autor" 
                                                   name="autor" 
                                                   value="<?php echo e(old('autor', $libro->autor)); ?>" 
                                                   required>
                                            <?php $__errorArgs = ['autor'];
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

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.isbn')); ?></label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['isbn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="isbn" 
                                                   name="isbn" 
                                                   value="<?php echo e(old('isbn', $libro->isbn)); ?>" 
                                                   required>
                                            <?php $__errorArgs = ['isbn'];
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

                                    <div>
                                        <div class="mb-4">
                                            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.category')); ?></label>
                                            <select class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['categoria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                    id="categoria" 
                                                    name="categoria" 
                                                    required>
                                                <option value=""><?php echo e(__('app.select_a_category')); ?></option>
                                                <option value="Ficción" <?php echo e(old('categoria', $libro->categoria) == 'Ficción' ? 'selected' : ''); ?>><?php echo e(__('app.fiction')); ?></option>
                                                <option value="No Ficción" <?php echo e(old('categoria', $libro->categoria) == 'No Ficción' ? 'selected' : ''); ?>><?php echo e(__('app.non_fiction')); ?></option>
                                                <option value="Ciencia" <?php echo e(old('categoria', $libro->categoria) == 'Ciencia' ? 'selected' : ''); ?>><?php echo e(__('app.science')); ?></option>
                                                <option value="Tecnología" <?php echo e(old('categoria', $libro->categoria) == 'Tecnología' ? 'selected' : ''); ?>><?php echo e(__('app.technology')); ?></option>
                                                <option value="Historia" <?php echo e(old('categoria', $libro->categoria) == 'Historia' ? 'selected' : ''); ?>><?php echo e(__('app.history')); ?></option>
                                                <option value="Arte" <?php echo e(old('categoria', $libro->categoria) == 'Arte' ? 'selected' : ''); ?>><?php echo e(__('app.art')); ?></option>
                                            </select>
                                            <?php $__errorArgs = ['categoria'];
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
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.description')); ?></label>
                                        <textarea class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                  id="descripcion" 
                                                  name="descripcion" 
                                                  rows="3"><?php echo e(old('descripcion', $libro->descripcion)); ?></textarea>
                                        <?php $__errorArgs = ['descripcion'];
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

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <div class="mb-4">
                                            <label for="ubicacion" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.location')); ?></label>
                                            <input type="text" 
                                                   class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 <?php $__errorArgs = ['ubicacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="ubicacion" 
                                                   name="ubicacion" 
                                                   value="<?php echo e(old('ubicacion', $libro->ubicacion)); ?>" 
                                                   placeholder="<?php echo e(__('app.example_shelf')); ?>">
                                            <?php $__errorArgs = ['ubicacion'];
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

                                    <div>
                                        <div class="mb-4">
                                            <label for="estado" class="block text-sm font-medium text-gray-700 mb-1"><?php echo e(__('app.status')); ?></label>
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
                                                <option value="nuevo" <?php echo e(old('estado', $libro->estado) == 'nuevo' ? 'selected' : ''); ?>><?php echo e(__('app.new')); ?></option>
                                                <option value="bueno" <?php echo e(old('estado', $libro->estado) == 'bueno' ? 'selected' : ''); ?>><?php echo e(__('app.good')); ?></option>
                                                <option value="regular" <?php echo e(old('estado', $libro->estado) == 'regular' ? 'selected' : ''); ?>><?php echo e(__('app.regular')); ?></option>
                                                <option value="deteriorado" <?php echo e(old('estado', $libro->estado) == 'deteriorado' ? 'selected' : ''); ?>><?php echo e(__('app.deteriorated')); ?></option>
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
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <div class="flex items-center">
                                            <input type="checkbox" 
                                                   class="form-checkbox h-5 w-5 text-indigo-600 rounded <?php $__errorArgs = ['disponible'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="disponible" 
                                                   name="disponible" 
                                                   value="1"
                                                   <?php echo e(old('disponible', $libro->disponible) ? 'checked' : ''); ?>>
                                            <label class="ml-2 block text-sm font-medium text-gray-700" for="disponible"><?php echo e(__('app.available_for_loan')); ?></label>
                                            <?php $__errorArgs = ['disponible'];
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

                                <div class="flex justify-end gap-2 mt-4">
                                    <button type="reset" class="btn-cta px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-undo mr-2"></i> <?php echo e(__('app.reset')); ?>

                                    </button>
                                    <button type="submit" class="btn-confirm px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest">
                                        <i class="fas fa-save mr-2"></i> <?php echo e(__('app.update_book')); ?>

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
        const isbnInput = document.getElementById('isbn');
        if (isbnInput) {
            isbnInput.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9X-]/g, '');
            });
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
<?php endif; ?> <?php /**PATH C:\Users\HP\BiblioTech2\resources\views/libros/edit.blade.php ENDPATH**/ ?>