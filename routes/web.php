<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

// Home / Dashboard
Route::get('/', [BookController::class, 'index'])->name('dashboard');

// Book Search
Route::get('/search', [BookController::class, 'search'])->name('book.search');

// Book Detail
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Book CRUD
    // Create
    Route::get('/book/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/book', [BookController::class, 'store'])->name('books.store');
    // Update
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/book/{book}', [BookController::class, 'update'])->name('books.update');
    // Delete
    Route::get('/book/{book}/delete', [BookController::class, 'confirmDelete'])->name('books.confirmDelete');
    Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Category
    // Show
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    // Store (for modal form)
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    // Show the edit form
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    // Handle the update
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    // Delete Pop Up
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
   

// Cart Routes
    // Showing Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // Add Item
    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
    // Update Item
    Route::post('/cart/update/{book}', [CartController::class, 'update'])->name('cart.update');
    // Delete Item
    Route::post('/cart/remove/{book}', [CartController::class, 'remove'])->name('cart.remove');
    // Redirect to checkout(/invoice) page
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


//login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//middleware
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth');

//admin
use App\Http\Controllers\DashboardController;

Route::get('/admin-panel', [DashboardController::class, 'adminPanel'])
    ->middleware('auth');

Route::get('/admin-panel', function () {
    return view('admin.panel');
})->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});
