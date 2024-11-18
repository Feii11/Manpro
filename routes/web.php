<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

// Public Routes (No Authentication Required)
Route::get('/home', [ProdukController::class, 'index'])->name('home');
Route::get('/shop', [ProdukController::class, 'shop'])->name('shop');
Route::get('/shop/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/contact', function () {return view('contact');})->name('contact');
// Route for AJAX request to get product by filters
Route::get('/product/filter', [ProdukController::class, 'getProductByFilters'])->name('product.getProductByFilters');


// Routes that require authentication
Route::middleware([AuthenticateUser::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    
    // Checkout Success and Orders
    Route::post('/checkout/success', [OrderController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/orders', [OrderController::class, 'viewOrders'])->name('orders.view');

    Route::get('/payment/{order}', [OrderController::class, 'showPayment'])->name('payment.show');
    Route::post('/payment/{order}', [OrderController::class, 'submitPaymentProof'])->name('payment.submit');
});

// Admin Routes (For Admin Users Only)
Route::middleware([AuthenticateAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminhome'])->name('admin.home');
    Route::get('/admin/products', action: [AdminController::class, 'viewProducts'])->name('admin.products');
    Route::get('/admin/users', [AdminController::class, 'viewUsers'])->name('admin.users');
    Route::get('/admin/admins', [AdminController::class, 'viewAdmins'])->name('admin.admins');
    Route::get('/admin/orders', [AdminController::class, 'viewOrders'])->name('admin.orders');

    // Actions for editing products, users, orders
    Route::get('/admin/product/add', [AdminController::class, 'addProduct'])->name('admin.product.add');
    Route::post('/admin/product/add', [AdminController::class, 'storeProduct'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.product.edit');
    Route::post('/admin/product/{id}/update', [AdminController::class, 'updateProduct'])->name('admin.product.update');
    // Route::get('/admin/order/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.order.status');
    Route::post('/admin/order/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.order.status');
});

require __DIR__.'/auth.php';
