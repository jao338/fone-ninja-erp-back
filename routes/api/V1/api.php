<?php

use Base\Models\Auth\AuthController;
use Base\Models\Product\ProductController;
use Base\Models\Supplier\SupplierController;
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

        Route::apiResource('products', ProductController::class);
        Route::apiResource('supplier', SupplierController::class);

    });
});
