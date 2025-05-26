<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\QrCodeController;

Route::get('qrcodes', [QrCodeController::class, 'index'])->name('admin.qrcodes.index');
Route::get('qrcodes/create', [QrCodeController::class, 'create'])->name('admin.qrcodes.create');
Route::post('qrcodes', [QrCodeController::class, 'store'])->name('admin.qrcodes.store');
