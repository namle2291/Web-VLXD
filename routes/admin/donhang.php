<?php

use App\Http\Controllers\DonHangController;
use Illuminate\Support\Facades\Route;

Route::prefix('don-hang')->middleware('auth')->group(function () {
  Route::get('/', [DonHangController::class, 'index'])->name('admin.donhang');
  Route::get('/sua/{id?}', [DonHangController::class, 'update'])->name('admin.donhang.sua');
  Route::post('/luu/{id?}', [DonHangController::class, 'store'])->name('admin.donhang.luu');
  Route::get('/chi-tiet/{id?}', [DonHangController::class, 'detail'])
    ->name('admin.donhang.chitiet');
  Route::get('/xoa/{id?}', [DonHangController::class, 'delete'])->name('admin.donhang.xoa');
  Route::get('/xoa-ctdh/{id?}', [DonHangController::class, 'delete_ctdh'])
    ->name('admin.chitietdonhang.xoa');
  Route::get('/in/{id?}', [DonHangController::class, 'print_order'])->name('admin.donhang.in');
});
