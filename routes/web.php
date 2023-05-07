<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('trangchu');
    Route::get('/san-pham', [HomeController::class, 'product'])->name('trangchu.sanpham');
    Route::get('/gio-hang', [HomeController::class, 'cart'])->name('trangchu.giohang');
    Route::get('/thanh-toan', [HomeController::class, 'checkout'])->name('trangchu.thanhtoan');

    Route::get('/tim-kiem', [HomeController::class, 'search'])->name('trangchu.timkiem');
    Route::get('/danh-muc/{id?}', [HomeController::class, 'product_category'])->name('trangchu.danhmucsp');
    Route::get('/tin-tuc', [HomeController::class, 'news'])->name('trangchu.tintuc');
    Route::get('/lien-he', [HomeController::class, 'contact'])->name('trangchu.lienhe');
    include('client/khachhang.php');
    include('client/giohang.php');
});

Route::prefix('admin')->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    Route::get('/', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/', [AdminController::class, 'store_login'])->name('admin.store_login');

    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'store_register'])->name('admin.store_register');

    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('info', [AdminController::class, 'info'])->name('admin.info');
    // Danh mục
    include('admin/danhmuc.php');
    // Sản phẩm
    include('admin/sanpham.php');
    // Banner
    include('admin/banner.php');
});
