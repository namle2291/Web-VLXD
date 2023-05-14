<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('nhanvien')->middleware('auth')->group(function () {
  Route::get('/', [UserController::class, 'index'])->name('admin.nhanvien');
  Route::get('/them/{id?}', [UserController::class, 'createOrUpdate'])->name('admin.nhanvien.them');
  Route::post('/luu/{id?}', [UserController::class, 'store'])->name('admin.nhanvien.luu');
  Route::get('/delete/{id?}', [UserController::class, 'delete'])->name('admin.nhanvien.xoa');
});
