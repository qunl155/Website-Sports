<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;


Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('login/store', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin');
        Route::get('main', [App\Http\Controllers\Admin\MainController::class, 'index']);

        #menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'fix']);
            Route::post('edit/{menu}', [MenuController::class, 'update2']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'fix']);
            Route::post('edit/{product}', [ProductController::class, 'update2']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });
        Route::post('upload/services', [UploadController::class, 'store2']);
    });

});


Route::get('/', [App\Http\Controllers\Customer\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\Customer\MainController::class, 'loadProduct']);