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
    <link rel="stylesheet" href="<?php echo e(asset('fontawesome-free-6.6.0-web/css/all.min.css')); ?>">

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Annexes')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="add-btn" onclick="window.location.href='<?php echo e(route('provinces.create')); ?>'" style="vertical-align:middle">
                <span>Ajouter nouvel Annex</span>
            </button>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="table-container">
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Rechercher d'Annex..." onkeyup="filterProvinces()">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Télephone</th>
                                <th>N° of Agents</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="provincesTable">
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($province->code); ?></td>
                                    <td><?php echo e($province->nom); ?></td>
                                    <td><?php echo e($province->adresse); ?></td>
                                    <td><?php echo e($province->adresse_tel); ?></td>
                                    <td><?php echo e($province->employees_count); ?></td>
                                    <td>
                                        <button class="show-btn" data-province-id="<?php echo e($province->id); ?>" onclick="window.location.href='<?php echo e(route('provinces.employees', ['provinceId' => $province->id])); ?>'">Affichier&nbsp;&nbsp;<i class="fa-regular fa-eye"></i></button>
                                        <a href="<?php echo e(route('provinces.edit', $province->id)); ?>">
                                            <button class="update-btn">Modifier&nbsp;&nbsp;<i class="fa-regular fa-pen-to-square"></i></button>
                                        </a>
                                        <button class="delete-btn" data-province-id="<?php echo e($province->id); ?>">Supprimer&nbsp;&nbsp;<i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?php echo e(asset('assets/style/table.css')); ?>">
    <script src="<?php echo e(asset('js/provinces.js')); ?>"></script>
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
<?php /**PATH C:\Users\dell\Downloads\province-app\province-app\resources\views/provinces/index.blade.php ENDPATH**/ ?>