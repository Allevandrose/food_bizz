<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserFoodController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ✅ Home Page
Route::get('/', function () {
    return view('welcome');
});

// ✅ Dashboard (requires auth)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ✅ Profile Routes (requires auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Admin Routes (requires 'auth' and 'admin' middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Food Management
    Route::resource('foods', FoodController::class);
    
    // Category Management
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
});

// ✅ User Routes (requires 'auth' for adding to cart)
Route::controller(UserFoodController::class)->group(function () {
    Route::get('/foods', 'index')->name('foods.index'); // LIST VIEW
    Route::get('/foods/{food}', 'show')->name('foods.show'); // VIEW SINGLE FOOD
    Route::post('/cart/add/{food}', 'addToCart')->middleware('auth')->name('cart.add'); // ADD TO CART (Protected)
});

// ✅ Cart Routes (requires auth)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // View cart
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove'); // Remove item from cart
});

require __DIR__ . '/auth.php';
