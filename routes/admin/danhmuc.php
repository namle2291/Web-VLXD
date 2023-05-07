<?php

use App\Http\Controllers\DanhMucController;
use Illuminate\Support\Facades\Route;

Route::prefix('danh-muc')->group(function () {
    Route::get('/{id?}', [DanhMucController::class, 'index'])->name('admin.danhmuc');
    Route::post('/luu/{id?}', [DanhMucController::class, 'store'])->name('admin.danhmuc.luu');
    Route::get('/xoa/{id?}', [DanhMucController::class, 'destroy'])->name('admin.danhmuc.xoa');
});