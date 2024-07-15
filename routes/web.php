<?php

use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubKatagoriController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

//route tanpa middleware
Route::get('/', [HomeController::class, 'index'])->name('guest.dashboard');

//faq
Route::get('/faq', function () {
    return view('guest.faq');
})->name('faq');

Route::middleware('auth')->group(function () {


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

        Route::get('sub-kategori', [SubKatagoriController::class, 'index'])->name('admin.sub-kategori.index');
        Route::post('sub-kategori', [SubKatagoriController::class, 'store'])->name('admin.sub-kategori.store');
        Route::put('sub-kategori/{id}', [SubKatagoriController::class, 'update'])->name('admin.sub-kategori.update');
        Route::delete('sub-kategori/{id}', [SubKatagoriController::class, 'destroy'])->name('admin.sub-kategori.destroy');
    });

    Route::prefix('/user')->middleware('user')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');
    });
});
