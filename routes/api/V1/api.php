<?php

use Base\Models\Auth\AuthController;
use Base\Models\Product\ProductController;
use Base\Models\Supplier\SupplierController;
use Base\Models\Shopping\ShoppingController;
use Base\Models\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api',
], function (): void {

    Route::group([
        'namespace' => 'Auth'
    ], function (): void {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('register', [AuthController::class, 'register'])->name('register');
    });

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function (): void {

        Route::get('me', [AuthController::class, 'me'])->name('me');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::apiResource('products', ProductController::class)->names('products');
        Route::apiResource('suppliers', SupplierController::class)->names('suppliers');
        Route::apiResource('clients', ClientController::class)->names('clients');
        Route::apiResource('shopping', ShoppingController::class)->names('shopping');
    });
});
