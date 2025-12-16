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

        Route::apiResource('suppliers', SupplierController::class)
            ->only(['index', 'show'])
            ->names('suppliers');
        Route::apiResource('clients', ClientController::class)
            ->only(['index', 'show'])
            ->names('clients');

        Route::get('shopping', [ShoppingController::class, 'index'])->name('shopping.index');
        Route::get('shopping/{uuid}', [ShoppingController::class, 'show'])->name('shopping.show');
        Route::post('shopping', [ShoppingController::class, 'store'])->name('shopping.store');
        Route::delete('shopping/{uuid}', [ShoppingController::class, 'destroy'])->name('shopping.destroy');
    });
});
