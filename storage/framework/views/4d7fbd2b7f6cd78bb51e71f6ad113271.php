<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    

    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($category->books->count() > 0): ?>
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">
                    <?php echo e($category->name); ?>

                    <a href="<?php echo e(route('categories.show', $category->slug)); ?>" class="text-sm text-blue-500 ml-2">
                        View All
                    </a>
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php $__currentLoopData = $category->books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200">
                            <div class="h-48 bg-gray-200 overflow-hidden">
                                <?php if($book->cover_image): ?>
                                    <img src="<?php echo e(asset('storage/'.$book->cover_image)); ?>" alt="<?php echo e($book->title); ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate"><?php echo e($book->title); ?></h3>
                                <p class="text-gray-600 mb-2">by <?php echo e($book->author); ?></p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-blue-600">$<?php echo e(number_format($book->price, 2)); ?></span>
                                    <a href="<?php echo e(route('books.show', $book)); ?>"
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition duration-200">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-12">
            <p class="text-gray-500 text-xl">No categories or books found.</p>
            <?php if(!\App\Models\Book::count()): ?>
                <p class="mt-4">You need to seed your database with books.</p>
                <div class="mt-4">
                    <a href="/seed-database" class="bg-blue-500 text-white px-4 py-2 rounded">Seed Database</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CLARISSE\FinalProject_Backend_BNCC\resources\views/dashboard.blade.php ENDPATH**/ ?>