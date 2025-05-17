<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moonlight & Manuscripts</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }
        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content-wrap {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div id="app">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-3">
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-800">Moonlight & Manuscripts</span>
                    </a>
                    <div class="flex items-center space-x-4">
                        <a href="<?php echo e(route('cart.index')); ?>" class="text-gray-600 hover:text-blue-500 transition duration-200">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="ml-1">Cart</span>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-200">
                            <i class="fas fa-user"></i>
                            <span class="ml-1">Login</span>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-200">
                            <i class="fas fa-user-plus"></i>
                            <span class="ml-1">Register</span>
                        </a>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="pb-4">
                    <form action="<?php echo e(route('book.search')); ?>" method="GET" class="flex items-center">
                        <input type="text" name="query" value="<?php echo e(request('search')); ?>" placeholder="Search books..."
                               class="w-full px-4 py-2 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg transition duration-200">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="content-wrap">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow-lg">
            <div class="container mx-auto px-4 py-6 text-center text-gray-600">
                <p>&copy; <?php echo e(date('Y')); ?> 🌙 Moonlight & Manuscripts 📜. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\CLARISSE\FinalProject_Backend_BNCC\resources\views/layouts/app.blade.php ENDPATH**/ ?>