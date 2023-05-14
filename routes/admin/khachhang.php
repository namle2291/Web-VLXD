<?php

use App\Http\Controllers\KhachHangController;
use Illuminate\Support\Facades\Route;

Route::prefix('khach-hang')->middleware('auth')->group(function () {
  Route::get('/', [KhachHangController::class, 'index'])->name('admin.khachhang');
  Route::get('/them/{id?}', [KhachHangController::class, 'createOrUpdate'])->name('admin.khachhang.them');
  Route::post('/luu/{id?}', [KhachHangController::class, 'store'])->name('admin.khachhang.luu');
  Route::get('/delete/{id?}', [KhachHangController::class, 'delete'])->name('admin.khachhang.xoa');
});
