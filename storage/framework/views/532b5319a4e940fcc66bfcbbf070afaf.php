<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    <?php if(session('success')): ?>
        <div class="mb-4 text-green-600 font-semibold"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(count($cart) > 0): ?>
        <table class="w-full table-auto mb-6 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Book</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">Subtotal</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 flex items-center space-x-4">
                            <?php if($item['cover_image']): ?>
                                <img src="<?php echo e(asset('storage/' . $item['cover_image'])); ?>" alt="<?php echo e($item['title']); ?>" class="h-16 w-12 object-cover rounded">
                            <?php endif; ?>
                            <span><?php echo e($item['title']); ?></span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">$<?php echo e(number_format($item['price'], 2)); ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST" class="flex items-center">
                                <?php echo csrf_field(); ?>
                                <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" class="w-16 border rounded px-2 py-1" />
                                <button type="submit" class="ml-2 bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Update</button>
                            </form>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">$<?php echo e(number_format($item['price'] * $item['quantity'], 2)); ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="text-right font-bold text-xl">
            Total: $<?php echo e(number_format($total, 2)); ?>

        </div>

        <div class="mt-6 flex justify-end">
            <a href="<?php echo e(route('cart.checkout')); ?>" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700">
                Proceed to Checkout
            </a>
        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    <!-- Back Button -->
    <div class="flex justify-center mt-8">
        <a href="<?php echo e(route('dashboard')); ?>"
           class="inline-block mb-6 text-sm text-blue-600 hover:text-blue-800 underline">
            ← Back to Dashboard
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\CLARISSE\FinalProject_Backend_BNCC\resources\views/cart/index.blade.php ENDPATH**/ ?>