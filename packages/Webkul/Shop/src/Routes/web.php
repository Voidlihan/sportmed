<?php

/**
 * Store front routes.
 */
require 'store-front-routes.php';

/**
 * Customer routes. All routes related to customer
 * in storefront will be placed here.
 */
require 'customer-routes.php';

/**
 * Checkout routes. All routes related to checkout like
 * cart, coupons, etc will be placed here.
 */
require 'checkout-routes.php';

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\QrCode;

Route::get('/qr-images-db', function () {
    return QrCode::all()->map(function ($qr) {
        return [
            'title' => $qr->title,
            'url' => Storage::url($qr->image_path),
        ];
    });
});

use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ContactMessageController;

Route::delete('/admin/qr-codes/{id}', [QrCodeController::class, 'destroy'])->name('admin.qr-codes.destroy');    

Route::delete('/contact-messages/{id}', [ContactMessageController::class, 'destroy'])->name('admin.contact-messages.destroy');
