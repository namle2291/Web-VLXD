<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

Route::prefix('banner')->group(function () {
    Route::get('/{id?}', [BannerController::class, 'index'])->name('admin.banner');
    Route::post('/luu/{id?}', [BannerController::class, 'store'])->name('admin.banner.luu');
    Route::get('/xoa/{id?}', [BannerController::class, 'destroy'])->name('admin.banner.xoa');
});