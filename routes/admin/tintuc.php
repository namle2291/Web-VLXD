<?php

use App\Http\Controllers\TinTucController;
use Illuminate\Support\Facades\Route;


Route::prefix('tin-tuc')->middleware('auth')->group(function () {
  Route::get('/', [TinTucController::class, 'index'])->name('admin.tintuc');
  Route::get('/them', [TinTucController::class, 'create'])->name('admin.tintuc.them');
  Route::post('/luu', [TinTucController::class, 'store'])->name('admin.tintuc.luu');
});