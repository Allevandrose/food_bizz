<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserFoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requires auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes (requires auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Admin Routes (requires 'auth' and 'admin' middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Food Management Routes
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index'); // LIST VIEW
    Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create'); // CREATE FORM
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store'); // STORE FOOD
    Route::get('/foods/{food}', [FoodController::class, 'show'])->name('foods.show'); // VIEW SINGLE FOOD
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit'); // EDIT FORM
    Route::put('/foods/{food}', [FoodController::class, 'update'])->name('foods.update'); // UPDATE FOOD
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy'); // DELETE FOOD
});

// ✅ User Routes (requires 'auth' for addToCart only)
Route::controller(UserFoodController::class)->group(function () {
    Route::get('/foods', 'index')->name('foods.index'); // LIST VIEW
    Route::get('/foods/{food}', 'show')->name('foods.show'); // VIEW SINGLE FOOD
    Route::post('/cart/add/{food}', 'addToCart')->middleware('auth')->name('cart.add'); // ADD TO CART (Protected)
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // View cart
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove'); // Remove item from cart
});
require __DIR__ . '/auth.php';
