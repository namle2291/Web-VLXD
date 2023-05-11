<?php

use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;

Route::prefix('san-pham')->middleware('auth')->group(function () {
    Route::get('/', [SanPhamController::class, 'index'])->name('admin.sanpham');
    Route::get('/them/{id?}', [SanPhamController::class, 'createOrUpdate'])->name('admin.sanpham.them');
    Route::post('/luu/{id?}', [SanPhamController::class, 'store'])->name('admin.sanpham.luu');
    Route::get('/xoa/{id?}', [SanPhamController::class, 'destroy'])->name('admin.sanpham.xoa');
});
