<?php

use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\PembayaranController;
use App\Http\Controllers\admin\PesananController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubKatagoriController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\guest\FaqController;
use App\Http\Controllers\guest\HomeController as GuestHomeController;
use App\Http\Controllers\guest\katagoriController as GuestkatagoriController;
use App\Http\Controllers\guest\ProdukController as GuestProdukController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckOutController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\ProduckFavController;
use App\Http\Controllers\user\TransaksiController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

//route tanpa middleware
Route::get('/', [GuestHomeController::class, 'index'])->name('guest.dashboard');
Route::get('/product', [GuestProdukController::class, 'index'])->name('guest.product');
Route::get('/katagori', [GuestkatagoriController::class, 'index'])->name('guest.katagori');
Route::get('/product/{id}/show', [GuestProdukController::class, 'show'])->name('guest.product.show');

// about
Route::get('/about', [GuestHomeController::class, 'about'])->name('guest.about');

//faq
Route::get('/faq', [FaqController::class, 'index'])->name('guest.faq');



Route::group(['middleware' => ['auth', 'verified']], function () {
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

        //pesanan
        Route::get('/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
        Route::put('/pesanan/{id}/update', [PesananController::class, 'update'])->name('admin.pesanan.update');

        //pembayaran
        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('admin.pembayaran.index');
        Route::get('/pembayaran/{id}/Confirm', [PembayaranController::class, 'show'])->name('admin.pembayaran.show');
        Route::post('/pembayaran/{id}/Confirm', [PembayaranController::class, 'paymentConfirm'])->name('admin.pembayaran.confirm');

        //desain
        Route::get('/desain', [App\Http\Controllers\admin\DesainController::class, 'index'])->name('admin.desain.index');
        Route::get('/desain/{id}', [App\Http\Controllers\admin\DesainController::class, 'show'])->name('admin.desain.show');
        Route::post('/desain/{id}', [App\Http\Controllers\admin\DesainController::class, 'add'])->name('admin.desain.add');
    });

    Route::prefix('/user')->middleware('user')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('user.dashboard');

        //address user
        Route::get('/alamat', [AlamatController::class, 'index'])->name('user.alamat.index');
        Route::get('/alamat/create', [AlamatController::class, 'create'])->name('user.alamat.create');
        Route::post('/alamat', [AlamatController::class, 'store'])->name('user.alamat.store');
        Route::get('/alamat/{id}/edit', [AlamatController::class, 'edit'])->name('user.alamat.edit');
        Route::put('/alamat/{id}', [AlamatController::class, 'update'])->name('user.alamat.update');
        Route::get('/alamat/{id}', [AlamatController::class, 'destroy'])->name('user.alamat.destroy');
        Route::get('/alamat/{id}/default', [AlamatController::class, 'setDefault'])->name('user.alamat.default');

        //love product
        Route::get('/love', [ProduckFavController::class, 'index'])->name('user.love.index');
        Route::get('/love/add', [ProduckFavController::class, 'addLove'])->name('user.love.add');
        Route::get('/love/remove', [ProduckFavController::class, 'removeLove'])->name('user.love.remove');

        //cart product
        Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
        Route::get('/cart/{id}/delete', [CartController::class, 'destroy'])->name('user.cart.delete');
        Route::post('/cart', [CartController::class, 'store'])->name('user.cart.store');
        Route::post('/cart/update', [CartController::class, 'update'])->name('user.cart.update');

        //checkout
        Route::get('/checkout/{transaksi_code}', [CheckOutController::class, 'index'])->name('user.checkout.index');
        Route::post('/checkout/{transaksi_code}/checkout', [CheckOutController::class, 'checkout'])->name('user.checkout.make');
        Route::post('/checkout', [CheckOutController::class, 'store'])->name('user.checkout.store');
        Route::get('/checkout/{id}/product_detail', [CheckOutController::class, 'product_detail'])->name('user.checkout.product_detail');
        Route::post('/checkout/{id}/update_produck_transaksi', [CheckOutController::class, 'update_produck_transaksi'])->name('user.checkout.update_produck_transaksi');
        Route::post('/checkout/update-quantity', [CheckOutController::class, 'updateQuantity'])->name('user.checkout.update-quantity');


        //transaction payment
        Route::get('/payment/{transaksi_code}', [PaymentController::class, 'index'])->name('user.payment.index');
        Route::post('/payment/{transaksi_code}', [PaymentController::class, 'store'])->name('user.payment.store');

        //history transaction
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('user.transaksi.index');
        Route::get('/transaksi/{id}/show', [TransaksiController::class, 'show'])->name('user.transaksi.show');
    });
});

Route::prefix('/helper')->group(function () {
    Route::get('/ongkir', [App\Http\Controllers\helper\getOngkirController::class, 'index'])->name('helper.ongkir');
});
