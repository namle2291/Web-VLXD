<?php

use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;

Route::prefix('san-pham')->group(function () {
    Route::get('/', [SanPhamController::class, 'index'])->name('admin.sanpham')->middleware('auth');
    Route::get('/them', [SanPhamController::class, 'create'])->name('admin.sanpham.them');
    Route::post('/luu', [SanPhamController::class, 'store'])->name('admin.sanpham.luu');
    Route::get('/xoa/{id?}', [SanPhamController::class, 'destroy'])->name('admin.sanpham.xoa');
});