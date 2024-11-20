<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Services\Menu\MenuService;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');

Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {


        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

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


        #slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'fix']);
            Route::post('edit/{slider}', [SliderController::class, 'update2']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });
        Route::post('upload/services', [UploadController::class, 'store2']);
    });

});