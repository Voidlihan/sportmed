<?php

use Illuminate\Support\Facades\Route;
use Webkul\Core\Http\Middleware\NoCacheMiddleware;

/**
 * Auth routes.
 */
require 'auth-routes.php';

Route::group(['middleware' => ['admin', NoCacheMiddleware::class], 'prefix' => config('app.admin_url')], function () {
    /**
     * Sales routes.
     */
    require 'sales-routes.php';

    /**
     * Catalog routes.
     */
    require 'catalog-routes.php';

    /**
     * Customers routes.
     */
    require 'customers-routes.php';

    /**
     * Marketing routes.
     */
    require 'marketing-routes.php';

    /**
     * CMS routes.
     */
    require 'cms-routes.php';

    /**
     * Reporting routes.
     */
    require 'reporting-routes.php';

    /**
     * Settings routes.
     */
    require 'settings-routes.php';

    /**
     * Configuration routes.
     */
    require 'configuration-routes.php';

    /**
     * Notification routes.
     */
    require 'notification-routes.php';

    /**
     * Remaining routes.
     */
    require 'rest-routes.php';
});

Route::prefix('admin')->middleware(['admin'])->name('admin.')->group(function () {
    Route::resource('qr-codes', \App\Http\Controllers\QrCodeController::class);
});

use App\Http\Controllers\ContactMessageController;

// Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin'], function () {
//     Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('admin.contact-messages.index');
// });

Route::prefix('admin')->middleware(['admin'])->name('admin.')->group(function () {
    Route::resource('contact-messages', \App\Http\Controllers\ContactMessageController::class);
});