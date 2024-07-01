<?php

use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('/super')->middleware('superadmin')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('super.dashboard');
    });

    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'] )->name('admin.dashboard');
    });

    Route::prefix('/user')->middleware('user')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');
    });
});


