<?php

use App\Http\Controllers\KhachHangController;
use Illuminate\Support\Facades\Route;

Route::prefix('/khach-hang')->group(function () {
    Route::get('/dang-nhap', [KhachHangController::class, 'login'])->name('khachhang.dangnhap');
    Route::post('/dang-nhap', [KhachHangController::class, 'store_login'])->name('khachhang.luu_dangnhap');

    Route::get('/dang-ky', [KhachHangController::class, 'register'])->name('khachhang.dangky');
    Route::post('/dang-ky', [KhachHangController::class, 'store_register'])->name('khachhang.luu_dangky');

    Route::get('/dang-xuat', [KhachHangController::class, 'logout'])->name('khachhang.dangxuat');

    Route::get('/thong-tin', [KhachHangController::class, 'info'])->name('khachhang.thongtin')->middleware('khachhang');
    Route::post('/thong-tin', [KhachHangController::class, 'store_info'])->name('khachhang.luu_thongtin');
});