<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::prefix('/gio-hang')->group(function () {
    Route::get('/them/{id?}/{quantity?}', [CartController::class, 'add'])->name('giohang.them');
    Route::get('/capnhat/{id?}', [CartController::class, 'update'])->name('giohang.capnhat');
    Route::get('/xoa/{id?}', [CartController::class, 'delete'])->name('giohang.xoa');
    Route::get('/xoatatca', [CartController::class, 'removeAll'])->name('giohang.xoatatca');
});