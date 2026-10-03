<?php

use App\Http\Controllers\AccueilContoller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderContoller;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\shopContoller;
use Illuminate\Support\Facades\Route;

// Route::view('/about', 'about');
// Route::view('/services', 'services');
// Route::view('/porfolio', 'portfolio');
// Route::view('/contact', 'contact');

Route::get('/', [HomeController::class, "index"])->name('home.index');
Route::get('/products/{product}/show', [HomeController::class, "show"])->name('product.show');
Route::get('/shops/cart', [shopContoller::class, "cart"])->name('shops.cart');
Route::post('/shop/cart/{product}', [shopContoller::class, "add"])->name('shops.add');
Route::post('/shops.remove/{product}', [shopContoller::class, "remove"])->name('shops.remove');
Route::post('/shops.destroy/{product}', [shopContoller::class, "destroy"])->name('shops.destroy');



Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, "logout"])->name('logout');
    Route::get('/orders/index', [OrderContoller::class, "index"])->name('orders.index');
    Route::get('/orders/create', [OrderContoller::class, "checkout"])->name('orders.create');
    Route::post('orders', [OrderContoller::class, "store"])->name('orders.store');
    Route::get('/orders/{order}/show', [OrderContoller::class, "show"])->name('orders.show');
    Route::delete('/orders/{order}', [OrderContoller::class, "destroy"])->name('orders.delete');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/categories', [CategoryContoller::class, "index"])->name('categories');
    Route::get('categories/create', [CategoryContoller::class, "create"])->name('categories.create');
    Route::post('categories', [CategoryContoller::class, "store"])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryContoller::class, "edit"])->name('categories.edit');
    Route::put('categories/{category}/update', [CategoryContoller::class, "update"])->name('categories.update');
    Route::delete('categories/{category}', [CategoryContoller::class, "destroy"])->name('categories.destroy');


    Route::get('/products', [ProductContoller::class, "index"])->name('products');
    Route::get('products/create', [ProductContoller::class, "create"])->name('products.create');
    Route::post('products', [ProductContoller::class, "store"])->name('products.store');
    Route::get('products/{product}/edit', [ProductContoller::class, "edit"])->name('products.edit');
    Route::put('products/{product}/update', [ProductContoller::class, "update"])->name('products.update');
    Route::delete('products/{product}', [ProductContoller::class, "destroy"])->name('products.destroy');

    Route::get('/accueils', [AccueilContoller::class, "index"])->name('accueils.index');
    Route::get('/accueils/orders', [AccueilContoller::class, "All_orders"])->name('accueils.orders');
    Route::put('/accueils/{order}', [AccueilContoller::class, "updateStatus"])->name('accueil.store');
    Route::get('/accueils/{order}', [AccueilContoller::class, "show"])->name('accueil.show');
});
