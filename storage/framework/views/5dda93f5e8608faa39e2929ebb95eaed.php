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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Ajouter nouvel agent')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="<?php echo e(route('employees.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <!-- Code Field -->
                        <div class="mb-4">
                            <label for="code" class="block text-sm font-medium text-gray-700">Code:</label>
                            <input type="text" name="code" id="code" class="mt-1 block w-full" required>
                        </div>

                        <!-- Nom Field -->
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Nom:</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full" required>
                        </div>

                        <!-- Prénom Field -->
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Prénom:</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full" required>
                        </div>

                        <!-- Address Field (replaced Employee_Area) -->
                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">La zone assignée:</label>
                            <input type="text" name="address" id="address" class="mt-1 block w-full" required>
                        </div>

                        <!-- CIN Field -->
                        <div class="mb-4">
                            <label for="cin" class="block text-sm font-medium text-gray-700">CIN:</label>
                            <input type="text" name="cin" id="cin" class="mt-1 block w-full" required>
                        </div>

                        <!-- Télephone Field -->
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Télephone:</label>
                            <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full" required>
                        </div>

                        <!-- Annex/Province Field -->
                        <div class="mb-4">
                            <label for="province_id" class="block text-sm font-medium text-gray-700">Annex:</label>
                            <select name="province_id" id="province_id" class="mt-1 block w-full" required>
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($province->id); ?>"><?php echo e($province->nom); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Picture:</label>
                            <input type="file" name="picture" id="picture" class="mt-1 block w-full" accept="image/*">
                        </div>


                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
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
<?php endif; ?>
<?php /**PATH C:\Users\dell\Downloads\province-app\province-app\resources\views/employees/create.blade.php ENDPATH**/ ?>