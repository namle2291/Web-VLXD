<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('/khach-hang')->group(function () {
    Route::get('/dang-nhap', [HomeController::class, 'login'])->name('khachhang.dangnhap');
    Route::post('/dang-nhap', [HomeController::class, 'store_login'])->name('khachhang.luu_dangnhap');

    Route::get('/dang-ky', [HomeController::class, 'register'])->name('khachhang.dangky');
    Route::post('/dang-ky', [HomeController::class, 'store_register'])->name('khachhang.luu_dangky');

    Route::get('/dang-xuat', [HomeController::class, 'logout'])->name('khachhang.dangxuat');
});