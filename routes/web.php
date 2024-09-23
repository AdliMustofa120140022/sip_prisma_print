<?php

use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubKatagoriController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\guest\FaqController;
use App\Http\Controllers\guest\HomeController as GuestHomeController;
use App\Http\Controllers\guest\ProdukController as GuestProdukController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckOutController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

//route tanpa middleware
Route::get('/', [GuestHomeController::class, 'index'])->name('guest.dashboard');
Route::get('/product', [GuestProdukController::class, 'index'])->name('guest.product');
Route::get('/product/{id}/show', [GuestProdukController::class, 'show'])->name('guest.product.show');


//faq
Route::get('/faq', [FaqController::class, 'index'])->name('guest.faq');



Route::middleware(['auth'])->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('/super')->middleware('superadmin')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('super.dashboard');
    });

    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('admin.dashboard');

        //product

        Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/product/{id}/show', [ProductController::class, 'show'])->name('admin.product.show');
        Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');

        Route::get('sub-kategori', [SubKatagoriController::class, 'index'])->name('admin.sub-kategori.index');
        Route::post('sub-kategori', [SubKatagoriController::class, 'store'])->name('admin.sub-kategori.store');
        Route::put('sub-kategori/{id}', [SubKatagoriController::class, 'update'])->name('admin.sub-kategori.update');
        Route::delete('sub-kategori/{id}', [SubKatagoriController::class, 'destroy'])->name('admin.sub-kategori.destroy');
    });

    Route::prefix('/user')->middleware('user')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');

        Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
        Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('user.cart.delete');
        Route::post('/cart', [CartController::class, 'store'])->name('user.cart.store');



        Route::get('/checkout', [CheckOutController::class, 'index'])->name('user.checkout.index');
        Route::get('/checkout/{id}/product_detail', [CheckOutController::class, 'product_detail'])->name('user.checkout.product_detail');

        //alamat
        Route::get('/alamat', [AlamatController::class, 'index'])->name('user.alamat.index');
        Route::get('/alamat/create', [AlamatController::class, 'create'])->name('user.alamat.create');
        Route::post('/alamat', [AlamatController::class, 'store'])->name('user.alamat.store');
    });
});
