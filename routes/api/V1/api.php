<?php

use Base\Models\Auth\AuthController;
use Base\Models\Exemplo\ExemploController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api',
], function (): void {

    Route::group([
        'namespace' => 'Auth'
    ], function (): void {
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function (): void {

        Route::get('me', [AuthController::class, 'me'])->name('me');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::group([
            'prefix' => 'exemplo',
        ], function (): void {
//            Route::apiResource('', ExemploController::class); // Substitui todos as rotas abaixo

            Route::get('', [ExemploController::class, 'index'])->name('exemplo.index');
            Route::get('{uuid}', [ExemploController::class, 'show'])->name('exemplo.show');
            Route::post('', [ExemploController::class, 'store'])->name('exemplo.store');
            Route::put('{uuid}', [ExemploController::class, 'update'])->name('exemplo.update');
            Route::delete('{uuid}', [ExemploController::class, 'destroy'])->name('exemplo.destroy');
        });

    });
});
