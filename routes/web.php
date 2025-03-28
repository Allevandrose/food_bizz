<?php
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserFoodController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/submit-order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{order}/pay', [OrderController::class, 'payWithStripe'])->name('order.pay');
    Route::get('/order/{order}/success', [OrderController::class, 'paymentSuccess'])->name('order.success');
    Route::get('/order/{order}/cancel', [OrderController::class, 'paymentCancel'])->name('order.cancel');
    Route::get('/order/{order}/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('foods', FoodController::class);
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
});

Route::controller(UserFoodController::class)->group(function () {
    Route::get('/foods', 'index')->name('foods.index');
    Route::get('/foods/{food}', 'show')->name('foods.show');
    Route::post('/cart/add/{food}', 'addToCart')->middleware('auth')->name('cart.add');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'remove'])->name('cart.remove');
});

require __DIR__ . '/auth.php';